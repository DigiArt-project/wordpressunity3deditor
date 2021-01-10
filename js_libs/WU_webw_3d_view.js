/*
     3D viewer for all types of files
 */
class WU_webw_3d_view {

    // wu_webw_3d_view.scene.children :
        // 0: is for pdb
        // 1: Directional light 1
        // 2: Directional light 2
        // 3: Directional light 3
        // 4: Ambient light
        // 5: OBJ 3D model

    recalcAspectRatio() {
        this.aspectRatio = ( this.canvas.offsetHeight === 0 ) ? 1 : this.canvas.offsetWidth / this.canvas.offsetHeight;
    };

    constructor(canvasToBindTo, back_3d_color, audioElement) {

        this.renderer = null;
        this.audioElement = audioElement;
        this.canvas = canvasToBindTo;
        this.aspectRatio = 1;
        this.recalcAspectRatio();

        this.scene = null;
        this.cameraDefaults = {
            posCamera: new THREE.Vector3(0.0, 175.0, 500.0),
            posCameraTarget: new THREE.Vector3(0, 0, 0),
            near: 0.01,
            far: 10000,
            fov: 45
        };
        this.camera = null;
        this.listener = null;
        this.cameraTarget = this.cameraDefaults.posCameraTarget;

        this.controls = null;

        this.flatShading = false;

        this.clock = new THREE.Clock();

        // Make a pivot to ensure that the object is centered correctly
        this.pivot = null;

        // - PDB and FBX specific -
        // Here all chemistry 3D and 2D labels items are stored
        this.root = new THREE.Group();

        // - OBJ Specific - Setup loader
        try {
            this.wwObjLoader2 = new THREE.OBJLoader2.WWOBJLoader2();
            this.wwObjLoader2.setCrossOrigin('anonymous');
        } catch (e) {

        }



        // Check for the various File API support.
        this.fileApiAvailable = true;
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            console.log('File API is supported! Enabling all features.');
        } else {
            this.fileApiAvailable = false;
            console.warn('File API is not supported! Disabling file loading.');
        }
        // - End of OBJ specific -


        this.mixers = [];
    }


    // Create Pivot for 3D objects to rotate around (to avoid non-centered 3D model problems)
    createPivot() {
        this.pivot = new THREE.Object3D();
        this.pivot.name = 'Pivot';
        this.scene.add(this.pivot);
    }

    _reportProgress(text) {
        console.log('Progress: ' + text);
    }



    // Start loader
    loadObjStream(objDef) {

        let prepData = new THREE.OBJLoader2.WWOBJLoader2.PrepDataArrayBuffer(
            objDef.name,
            objDef.objAsArrayBuffer,
            objDef.pathTexture,  // if it is already uploaded this is a url. If it is on client side, this is an array of raw images
            objDef.mtlAsString
        );

        prepData.setSceneGraphBaseNode(this.pivot);
        prepData.setStreamMeshes(true);
        this.wwObjLoader2.prepareRun(prepData);
        this.wwObjLoader2.run();
    }

    // Resize Renderer and Label Renderer
    resizeDisplayGL() {
        this.controls.handleResize();

        this.recalcAspectRatio();
        this.renderer.setSize(this.canvas.offsetWidth, this.canvas.offsetHeight, false);
        this.labelRenderer.setSize(this.canvas.offsetWidth, this.canvas.offsetHeight, false);

        this.updateCamera();
    };


    // Reset Camera
    resetCamera() {
        this.camera.position.copy(this.cameraDefaults.posCamera);
        this.cameraTarget.copy(this.cameraDefaults.posCameraTarget);
        this.updateCamera();
    }

    // Update camera aspect
    updateCamera() {
        this.camera.aspect = this.aspectRatio;
        this.camera.lookAt(this.cameraTarget);
        this.camera.updateProjectionMatrix();
    }

    // Start Renderer amd label Renderer
    render() {
        if (!this.renderer.autoClear)
            this.renderer.clear();

        this.controls.update();
        this.renderer.render(this.scene, this.camera);
        this.labelRenderer.render(this.scene, this.camera);

        if ( this.mixers.length > 0 ) {

            for ( let i = 0; i < this.mixers.length; i ++ ) {
                this.mixers[ i ].update( this.clock.getDelta() );
            }
        }
    }


    // Clear Previous model
    clearAllAssets() {
        var scope = this;

        console.log("CLEARING");

        // Clear animations
        this.mixers = [];

        // PDB and FBX Specific
        while (scope.root.children.length > 0) {
            var object = scope.root.children[0];
            object.parent.remove(object);
        }

        // OBJ Specific
        var remover = function (object3d) {

            if (object3d === scope.pivot) {
                return;
            }
            console.log('Removing: ' + object3d.name);
            scope.scene.remove(object3d);

            if (object3d.hasOwnProperty('geometry')) {
                object3d.geometry.dispose();
            }
            if (object3d.hasOwnProperty('material')) {

                var mat = object3d.material;
                if (mat.hasOwnProperty('materials')) {
                    var materials = mat.materials;
                    for (var name in materials) {
                        if (materials.hasOwnProperty(name)) materials[name].dispose();
                    }
                }
            }
            if (object3d.hasOwnProperty('texture')) {
                object3d.texture.dispose();
            }
        };

        scope.scene.remove(scope.pivot);
        scope.pivot.traverse(remover);
        scope.createPivot();

    }

    /* FBX loader */
    loadFbxStream(fbxBuffer, texturesStreams) {

        // Clear Previous
        this.clearAllAssets();

        var manager = new THREE.LoadingManager();
        manager.onProgress = function( item, loaded, total ) {
            console.log( item, loaded, total );
        };

        let fbxloader = new THREE.FBXLoader( manager );

        let fbxobject = fbxloader.parseStream(fbxBuffer, texturesStreams);

        fbxobject.mixer = new THREE.AnimationMixer( fbxobject );
        this.mixers.push( fbxobject.mixer );

        if (fbxobject.animations.length>0) {
            let action = fbxobject.mixer.clipAction(fbxobject.animations[0]);
            action.play();
        } else {
            console.log("Your FBX does not have animation");
        }

        let scope = this;
        scope.root.add(fbxobject);
        scope.render();

        //jQuery('#previewProgressSlider')[0].style.visibility = "hidden";

        // setTimeout(function(){
        //     jQuery("#button_qrcode").click(); // close qr code
        //     jQuery("#createModelScreenshotBtn").click();
        // },1000);
    }

    /* FBX loader */
    loadGlbStream(GlbBuffer) {
        let scope = this;
        // Clear Previous
        this.clearAllAssets();

        var manager = new THREE.LoadingManager();
        manager.onProgress = function( item, loaded, total ) {
            console.log( item, loaded, total );
        };

        let glbloader = new THREE.GLTFLoader( manager );

        console.log("WU webw GlbBuffer", GlbBuffer);

        // Load a glTF resource
        glbloader.load(
            GlbBuffer,
            // called when the resource is loaded
            function ( gltf ) {

                //scene.add( gltf.scene );

                // gltf.animations; // Array<THREE.AnimationClip>
                // gltf.scene; // THREE.Group
                // gltf.scenes; // Array<THREE.Group>
                // gltf.cameras; // Array<THREE.Camera>
                // gltf.asset; // Object
                if (gltf.animations.length>0) {
                    let glbmixer = new THREE.AnimationMixer( gltf.scene );
                    scope.mixers.push( glbmixer );
                    let action = glbmixer.clipAction(gltf.animations[0]);
                    action.play();
                }

                scope.root.add(gltf.scene);

                scope.render();
                //jQuery('#previewProgressSlider')[0].style.visibility = "hidden";
                scope.zoomer(gltf.scene);
            },
            '',
            // called when loading has errors
            function ( error ) {

                console.log( 'An error happened' );

            }
        );



        // setTimeout(function(){
        //     jQuery("#button_qrcode").click(); // close qr code
        //     jQuery("#createModelScreenshotBtn").click();
        // },1000);
    }


    /* Molecule loader */
    loadMolecule(url_or_text_pdb, calledFromWhere) {

        // Clear Previous
        this.clearAllAssets();

        var loader = new THREE.PDBLoader();

        var scope = this;

        // Load new
        loader.load(url_or_text_pdb, function (pdb) {

            let geometryAtoms = pdb.geometryAtoms;

            var positions = geometryAtoms.getAttribute('position').array;
            var colors = geometryAtoms.getAttribute('color').array;
            let geometryBonds = pdb.geometryBonds;
            let json = pdb.json;

            var sphereGeometry = new THREE.IcosahedronBufferGeometry(1, 4);

            //var offset = geometryAtoms.center();
            //geometryBonds.translate(offset.x, offset.y, offset.z);

            var position = new THREE.Vector3();
            var color = new THREE.Color();
            var colorArchive = [];

            for (let i = 0; i < positions.length ; i += 3) {

                // Make the atoms
                position.x = positions[i];
                position.y = positions[i + 1];
                position.z = positions[i + 2];

                color.r = colors[ i ] ;
                color.g = colors[ i + 1 ];
                color.b = colors[ i + 2 ];

                colorArchive.push( color );

                var material = new THREE.MeshPhongMaterial({color: color, flatShading: false});

                var object = new THREE.Mesh(sphereGeometry, material);

                // Name of the atom
                var atom = json.atoms[i/3];

                object.name = "AtomBall:" + atom[4];
                object.position.copy(position);
                object.position.multiplyScalar(75);
                object.scale.multiplyScalar(25);
                scope.root.add(object);


                // Make the Atom Text CSS2D label
                var text = document.createElement('div');
                text.className = 'label';
                text.style.color = 'rgb(' + color.r* 255 + ',' + color.g* 255+ ',' + color.b * 255 + ')';
                text.textContent =  atom[4];

                var label = new THREE.CSS2DObject(text);
                label.name = "Label:" + text.textContent;
                label.position.copy(object.position);

                // console.log("label",label);
                // const axesHelper = new THREE.AxesHelper( 55 );
                // scope.root.add( axesHelper );
                scope.root.add(label);
            }

            // Make the bonds
            positions = geometryBonds.getAttribute('position');



            positions.count = positions.array.length;

            var start = new THREE.Vector3();
            var end = new THREE.Vector3();

            let colorsStart = geometryBonds.getAttribute('colorStart');
            let colorsEnd = geometryBonds.getAttribute('colorEnd');



            for (let i = 0; i < positions.count; i += 6) {

                start.x = positions.array[i];
                start.y = positions.array[i+1];
                start.z = positions.array[i+2];

                end.x = positions.array[i+3];
                end.y = positions.array[i+4];
                end.z = positions.array[i+5];

                start.multiplyScalar(75);
                end.multiplyScalar(75);

                var HALF_PI = + Math.PI * .5;
                var distance = start.distanceTo(end);


                var cylinder = new THREE.CylinderGeometry(16, 16, distance/2, 20, 5, false);

                var orientation = new THREE.Matrix4();//a new orientation matrix to offset pivot
                var offsetRotation = new THREE.Matrix4();//a matrix to fix pivot rotation
                var offsetPosition = new THREE.Matrix4();//a matrix to fix pivot position

                orientation.lookAt( start, end, new THREE.Vector3(0,1,0));//look at destination
                offsetRotation.makeRotationX(HALF_PI);//rotate 90 degs on X
                orientation.multiply(offsetRotation);//combine orientation with rotation transformations
                cylinder.applyMatrix4(orientation);



                var object1 = new THREE.Mesh(cylinder, new THREE.MeshPhongMaterial({
                    color: new THREE.Color(colorsStart[i/6][0], colorsStart[i/6][1], colorsStart[i/6][2]),
                    flatShading: false,
                }));


                object1.name = "Bond:" + i;

                object1.position.copy(start);
                object1.position.lerp(end, 0.25);

                scope.root.add(object1);


                var object2 = new THREE.Mesh(cylinder, new THREE.MeshPhongMaterial({
                    color: new THREE.Color(colorsEnd[i/6][0], colorsEnd[i/6][1], colorsEnd[i/6][2]),
                    flatShading: false,
                }));

                object2.name = "Bond:" + (i+1);

                object2.position.copy(start);
                object2.position.lerp(end, 0.75);

                scope.root.add(object2);
            }



            scope.render();


            // ------------ Find bounding sphere ----
            let sphere = wu_webw_3d_view.computeSceneBoundingSphereAll(scope.root);

            console.log("sphere", sphere[1]);

            // const geometryBall = new THREE.SphereGeometry( sphere[1], 32, 32 );
            // const materialBall = new THREE.MeshBasicMaterial( {color: 0xffff00, wireframe: true} );
            // const sphereBall = new THREE.Mesh( geometryBall, materialBall );
            // sphereBall.position.copy(sphere[0]);
            // sphereBall.name = "Center Ball"
            // scope.root.add( sphereBall );

            // translate object to the center
            scope.root.traverse(function (object) {
                //object.position.x = object.position.y = object.position.z = 0;

                if (object instanceof THREE.Mesh || object instanceof THREE.Object3D ) {


                    if (object.name==='')
                        return;

                   object.position.add(new THREE.Vector3(-sphere[0].x, -sphere[0].y, -sphere[0].z));

                    // if(object.geometry) {
                    //     object.geometry.translate(-sphere[0].x, -sphere[0].y, -sphere[0].z);
                    // }
                }
            });

            // Add to pivot
            wu_webw_3d_view.pivot.add(scope.root);
            //
            // let axHelp = new THREE.AxesHelper(35);
            // wu_webw_3d_view.pivot.add(axHelp);


            // console.log("====================================");
            //
            // console.log("pivot", wu_webw_3d_view.pivot);
            // console.log("scope.root", scope.root);
            // console.log("sphere", sphere);
            // console.log("sphereBall", sphereBall.position);

            console.log("====================================");


            // Find new zoom
            let totalRadius = sphere[1];
            console.log(totalRadius);
            wu_webw_3d_view.controls.minDistance = 0.001 * totalRadius;
            wu_webw_3d_view.controls.maxDistance = 35 * totalRadius;

            //---------------------------------------


        });
    }

    /*  Auto zoom on obj with multiple meshes */
    computeSceneBoundingSphereAll(myGroupObj)
    {
        let sceneBSCenter = new THREE.Vector3(0,0,0);
        let sceneBSRadius = 0;
        let nObjects = 0;

        myGroupObj.traverse( function (object)
        {
            if (object instanceof THREE.Mesh)
            {
                //console.log(object.position);
                sceneBSCenter.add(object.position);
                nObjects ++;
            }
        } );

        //console.log(nObjects, sceneBSCenter);
        sceneBSCenter.divideScalar(nObjects);

        myGroupObj.traverse( function (object)
        {
            if (object instanceof THREE.Mesh)
            {
                object.geometry.computeBoundingSphere();

                // Object radius
                let radius = object.geometry.boundingSphere.radius;

                if (radius) {
                     sceneBSRadius = Math.max(sceneBSRadius, radius + object.position.length());
                }
            }
        } );

        console.log("sceneBSCenter", sceneBSCenter);
        console.log("sceneBSRadius",sceneBSRadius);

        return [sceneBSCenter, sceneBSRadius];
    }

    /* Zoom to object */
    zoomer(towhatObj){ // FBX obj

        if(towhatObj == null) {
            towhatObj = this.scene.children[5]; // Obj is loaded at 5
        }

        let sphere = this.computeSceneBoundingSphereAll( towhatObj );

        // translate object to the center
        towhatObj.traverse( function (object) {

            console.log("object", object);
            if (object instanceof THREE.Mesh) {
                //object.position.add(new THREE.Vector3(-sphere[0].x, -sphere[0].y, -sphere[0].z));
                object.geometry.translate( - sphere[0].x, - sphere[0].y, - sphere[0].z) ;
            }
        });

        var totalradius = sphere[1];

        let axHelp = new THREE.AxesHelper(35);
        wu_webw_3d_view.pivot.add(axHelp);

        // const geometryBall = new THREE.SphereGeometry( sphere[1], 32, 32 );
        // const materialBall = new THREE.MeshBasicMaterial( {color: 0xffff00, wireframe: true} );
        // const sphereBall = new THREE.Mesh( geometryBall, materialBall );
        // sphereBall.position.copy(sphere[0]);
        // sphereBall.name = "Center Ball"
        // wu_webw_3d_view.pivot.add(sphereBall);


        this.controls.minDistance = 0.001*totalradius;
        this.controls.maxDistance = 35*totalradius;
    }

    // Initialize
    initGL(back_3d_color_local) {
        this.renderer = new THREE.WebGLRenderer({
            canvas: this.canvas,
            antialias: true,
            logarithmicDepthBuffer: true
        });

        this.scene = new THREE.Scene();

        this.scene.background = new THREE.Color(back_3d_color_local);



        // - Label renderer -
        this.labelRenderer = new THREE.CSS2DRenderer();
        this.labelRenderer.domElement.style.position = 'absolute';
        this.labelRenderer.domElement.style.top = '0';
        this.labelRenderer.domElement.style.fontSize = "25pt";
        this.labelRenderer.domElement.style.textShadow = "-1px -1px #000, 1px -1px #000, -1px 1px  #000, 1px 1px #000";
        this.labelRenderer.domElement.style.pointerEvents = 'none';

        // add label renderer
        document.getElementById("previewCanvasLabels").appendChild(this.labelRenderer.domElement);

        // - End of PDB specific -

        // Set up camera
        this.camera = new THREE.PerspectiveCamera(this.cameraDefaults.fov,
            this.aspectRatio, this.cameraDefaults.near, this.cameraDefaults.far);

        // Add audio listener to the camera
        //console.log("this.audioElement", this.audioElement);

        if (this.audioElement!=null) {
            this.listener = new THREE.AudioListener();
            this.camera.add(this.listener);

            this.audioElement.play();
            this.positionalAudio = new THREE.PositionalAudio(this.listener);
            this.positionalAudio.setMediaElementSource(this.audioElement);
            this.positionalAudio.setRefDistance(200);
            this.positionalAudio.setDirectionalCone(330, 230, 0.01);

            // // - PDB, FBX Specific -
            // This adds the audio element to loaded 3D object
            this.root.add(this.positionalAudio);
        } else {

        }
        this.scene.add(this.root);


        this.resetCamera();

        // Trackball controls
        this.controls = new THREE.TrackballControls(this.camera, this.renderer.domElement);
        this.controls.zoomSpeed = 1.02;

        this.controls.dynamicDampingFactor = 0.3;

        // Light
        var ambientLight = new THREE.AmbientLight(0x404040,2);
        var directionalLight1 = new THREE.DirectionalLight(0xA0A050);
        var directionalLight2 = new THREE.DirectionalLight(0x909050);
        var directionalLight3 = new THREE.DirectionalLight(0xA0A050);

        directionalLight1.position.set(-1000,  -550,  1000);
        directionalLight2.position.set( 1000,   550, -1000);
        directionalLight3.position.set(    0,   550,     0);

        // Add to scene
        this.scene.add(directionalLight1);
        this.scene.add(directionalLight2);
        this.scene.add(directionalLight3);
        this.scene.add(ambientLight);

        // Grid
        //var helper = new THREE.GridHelper( 1200, 60, 0xFF4444, 0xcca58b );
        //this.scene.add( helper );

        // Create new pivot point to remedy non centered objects
        this.createPivot();
    }



    // Initialize Post GL
    initPostGL() {

        var scope = this;

        // Function for OBJ: Function to load materials
        var materialsLoaded = function (materials) {
            for (var key in materials) {
                //console.log( materials[key]);
                materials[key].transparent = true;
                materials[key].alphaTest = 0.1;
            }
        };

        // Function for OBJ: Report for meshes
        var meshLoaded = function (name, bufferGeometry, material) {

            console.log("----- Report of mesh loaded -------");
            console.log('Loaded mesh: ' + name);

            // for (var i = 0; i < material.length; i++) {
            //     console.log('Material ', i, material[i]);
            // }

            console.log("----------------------------------");

        };

        // Function on Completed Loading
        var completedLoading = function () {
            console.log('Loading complete!');

            //jQuery('#previewProgressSlider').hide();

            document.getElementById('previewProgressSliderLine').style.width = 0;
            document.getElementById('previewProgressLabel').innerHTML = "";

            scope.zoomer();

            // // Auto create screenshot;
            // setTimeout(function(){
            //     jQuery("#button_qrcode").click(); // close qr code
            //     jQuery("#createModelScreenshotBtn").click();
            // },1000);

        };

        try {
            this.wwObjLoader2.registerCallbackProgress(this._reportProgress);
            this.wwObjLoader2.registerCallbackCompletedLoading(completedLoading);
            this.wwObjLoader2.registerCallbackMaterialsLoaded(materialsLoaded);
            this.wwObjLoader2.registerCallbackMeshLoaded(meshLoaded);
        } catch (e){

        }

        return true;
    }



    // alterShading() {
    //
    //     var scope = this;
    //     scope.flatShading = !scope.flatShading;
    //     console.log(scope.flatShading ? 'Enabling flat shading' : 'Enabling smooth shading');
    //
    //     scope.traversalFunction = function (material) {
    //         material.flatShading = scope.flatShading;
    //         material.needsUpdate = true;
    //     };
    //     var scopeTraverse = function (object3d) {
    //         scope.traverseScene(object3d);
    //     };
    //     scope.pivot.traverse(scopeTraverse);
    // }
    //
    // alterDouble() {
    //
    //     var scope = this;
    //     scope.doubleSide = !scope.doubleSide;
    //     console.log(scope.doubleSide ? 'Enabling DoubleSide materials' : 'Enabling FrontSide materials');
    //
    //     scope.traversalFunction = function (material) {
    //         material.side = scope.doubleSide ? THREE.DoubleSide : THREE.FrontSide;
    //     };
    //
    //     var scopeTraverse = function (object3d) {
    //         scope.traverseScene(object3d);
    //     };
    //     scope.pivot.traverse(scopeTraverse);
    // }


    // traverseScene(object3d) {
    //     if (object3d.material instanceof THREE.MultiMaterial) {
    //         var materials = object3d.material.materials;
    //         for (var name in materials) {
    //             if (materials.hasOwnProperty(name)) this.traversalFunction(materials[name]);
    //         }
    //     } else if (object3d.material) {
    //         this.traversalFunction(object3d.material);
    //     }
    // }
}





