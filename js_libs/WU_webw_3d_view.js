/* 3D viewer for all types of files in assetEditor */
class WU_webw_3d_view {

    // wu_webw_3d_view.scene.children :
        // 0: root (pdb, audio, fbx, GLB, OBJ)
        // 1,2,3,4: Directional light 1,2,3, 4: Ambient light

    // PDB is the same loader for url and client side
    // OBJ, FBX, and GLB call first an xhr loader in editor_scripts.js and then the streaming version here

    constructor(canvasToBindTo, back_3d_color, audioElement) {

        this.canvas = canvasToBindTo;
        this.scene = new THREE.Scene();

        this.renderer = new THREE.WebGLRenderer({
            canvas: this.canvas,
            antialias: true,
            logarithmicDepthBuffer: true
        });
        this.camera = null;
        this.listener = null;

        this.audioElement = audioElement;


        this.aspectRatio = 1;
        this.recalcAspectRatio();

        this.cameraDefaults = {
            posCamera: new THREE.Vector3(0.0, 175.0, 500.0),
            posCameraTarget: new THREE.Vector3(0, 0, 0),
            near: 0.01,
            far: 10000,
            fov: 45
        };

        // Set up camera
        this.camera = new THREE.PerspectiveCamera(this.cameraDefaults.fov,
            this.aspectRatio, this.cameraDefaults.near, this.cameraDefaults.far);

        this.cameraTarget = this.cameraDefaults.posCameraTarget;

        // Trackball controls
        this.controls = new THREE.TrackballControls(this.camera, this.renderer.domElement);
        this.controls.zoomSpeed = 1.02;
        this.controls.dynamicDampingFactor = 0.3;


        // For the animation
        this.clock = new THREE.Clock();
        this.mixers = [];

        // Scene.children[0] is root: Here all chemistry 3D and 2D labels items are stored
        let root = new THREE.Group();
        root.name = "root";
        this.scene.add( root );


        // - OBJ Specific - Setup loader
        try {
            this.wwObjLoader2 = new THREE.OBJLoader2.WWOBJLoader2();
            this.wwObjLoader2.setCrossOrigin('anonymous');
        } catch (e) {
            console.log("ERROR WW15", "Web Workers for OBJ not found")
        }
    }

    // Initialize Scene
    initGL(back_3d_color_local) {

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

        // Add audio listener to the camera
        if (this.audioElement!=null) {
            this.listener = new THREE.AudioListener();
            this.camera.add(this.listener);

            this.positionalAudio.name = "audio1";
            this.positionalAudio = new THREE.PositionalAudio(this.listener);
            this.positionalAudio.setMediaElementSource(this.audioElement);
            this.positionalAudio.setRefDistance(200);
            this.positionalAudio.setDirectionalCone(330, 230, 0.01);

            // This adds the audio element to loaded 3D object
            this.scene.getChildByName('root').add(this.positionalAudio);

        } else {
            console.log("ERROR Audio 111", "No Audio Element is found");
        }



        this.resetCamera();



        // Light
        var ambientLight = new THREE.AmbientLight(0x404040,2);
        var directionalLight1 = new THREE.DirectionalLight(0xA0A050);
        var directionalLight2 = new THREE.DirectionalLight(0x909050);
        var directionalLight3 = new THREE.DirectionalLight(0xA0A050);

        directionalLight1.position.set(-1000,  -550,  1000);
        directionalLight2.position.set( 1000,   550, -1000);
        directionalLight3.position.set(    0,   550,     0);

        // Scene.children[1],[2],[3],[4] are lights
        this.scene.add(directionalLight1);
        this.scene.add(directionalLight2);
        this.scene.add(directionalLight3);
        this.scene.add(ambientLight);

        // Grid
        //var helper = new THREE.GridHelper( 1200, 60, 0xFF4444, 0xcca58b );
        //this.scene.add( helper );

        // scene.children[5] is Pivot
        //this.createPivot();
    }

    // Initialize Post GL only for OBJ async loading
    initPostGL() {

        let scope = this;

        // Function for OBJ: Function to load materials
        let materialsLoaded = function (materials) {
            for (let k in materials) {
                if(materials.hasOwnProperty(k)) {
                    materials[k].transparent = true;
                    materials[k].alphaTest = 0.1;
                }
            }
        };

        // Function for OBJ: Report for meshes
        let meshLoaded = function (name, bufferGeometry, material) {};

        // Function on Completed Loading
        let completedLoading = function () {
            console.log('Loading complete!');

            document.getElementById('previewProgressSliderLine').style.width = '0';
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
            console.log("Can load OBJ", "ERROR O151");
        }

        return true;
    }


    // Clear Previous model
    clearAllAssets() {

        console.log("CLEARING");

        // Hide animation button
        document.getElementById("animButton1").style.display = "none";

        // Clear animations
        this.mixers = [];

        // Clear any GLB, FBX, PDB or OBJ
        this.scene.getObjectByName('root').clear(); // remove all children of root

        // OBJ specific
        //this.scene.getChildByName('Pivot').clear();

        // OBJ Specific
        // var remover = function (object3d) {
        //
        //     if (object3d === scope.pivot) {
        //         return;
        //     }
        //     console.log('Removing: ' + object3d.name);
        //     scope.scene.remove(object3d);
        //
        //     if (object3d.hasOwnProperty('geometry')) {
        //         object3d.geometry.dispose();
        //     }
        //     if (object3d.hasOwnProperty('material')) {
        //
        //         var mat = object3d.material;
        //         if (mat.hasOwnProperty('materials')) {
        //             var materials = mat.materials;
        //             for (var name in materials) {
        //                 if (materials.hasOwnProperty(name)) materials[name].dispose();
        //             }
        //         }
        //     }
        //     if (object3d.hasOwnProperty('texture')) {
        //         object3d.texture.dispose();
        //     }
        // };

        //scope.scene.remove(scope.pivot);
        //scope.pivot.traverse(remover);
        //scope.createPivot();

    }

    /* OBJ Loader */
    loadObjStream(objDef) {

        let prepData = new THREE.OBJLoader2.WWOBJLoader2.PrepDataArrayBuffer(
            objDef.name,
            objDef.objAsArrayBuffer,
            objDef.pathTexture,  // URL if already uploaded or array of raw images if in preview (client side)
            objDef.mtlAsString
        );

        prepData.setSceneGraphBaseNode(this.scene.getChildByName('root'));
        prepData.setStreamMeshes(true);
        this.wwObjLoader2.prepareRun(prepData);
        this.wwObjLoader2.run();
    }


    /* FBX loader */
    loadFbxStream(fbxBuffer, texturesStreams) {

        // Clear Previous
        this.clearAllAssets();

        let manager = new THREE.LoadingManager();
        manager.onProgress = function( item, loaded, total ) {
            console.log( item, loaded, total );
        };

        let fbxLoader = new THREE.FBXLoader( manager );

        let fbxObject = fbxLoader.parseStream(fbxBuffer, texturesStreams);

        if ( fbxObject.animations.length > 0 ) {

            fbxObject.mixer = new THREE.AnimationMixer( fbxObject );

            this.mixers.push( fbxObject.mixer );

            this.action = fbxObject.mixer.clipAction( fbxObject.animations[0] );

            // Display button to start animation inside the Asset 3D previewer
            document.getElementById("animButton1").style.display = "inline-block";
        } else {

            document.getElementById("animButton1").style.display = "none";
            console.log("Your FBX does not have animation");
        }

        // FBX is added to root
        this.scene.getChildByName("root").add(fbxObject);
        this.render();

        let centerRadius = this.computeSceneBoundingSphereAll(this.scene.getChildByName('root'));

        const geometryBall = new THREE.SphereGeometry( centerRadius[1], 32, 32 );
        const materialBall = new THREE.MeshBasicMaterial( {color: 0xffff00, wireframe: true} );
        const sphereBall = new THREE.Mesh( geometryBall, materialBall );
        sphereBall.position.copy( centerRadius[0] );
        sphereBall.name = "Center Ball"
        this.scene.getChildByName('root').add( sphereBall );

        this.zoomer(this.scene.getChildByName('root'));

        //jQuery('#previewProgressSlider')[0].style.visibility = "hidden";

        // setTimeout(function(){
        //     jQuery("#button_qrcode").click(); // close qr code
        //     jQuery("#createModelScreenshotBtn").click();
        // },1000);
    }

    /* GLB loader */
    loadGlbStream(GlbBuffer) {
        let scope = this;

        // Clear Previous
        this.clearAllAssets();

        let manager = new THREE.LoadingManager();
        manager.onProgress = function( item, loaded, total ) {};

        let glbLoader = new THREE.GLTFLoader( manager );

        // Load a glTF resource
        glbLoader.load(
            GlbBuffer,
            // called when the resource is loaded
            function ( gltf ) {

                //scene.add( gltf.scene );

                // gltf.animations; // Array<THREE.AnimationClip>
                // gltf.scene; // THREE.Group
                // gltf.scenes; // Array<THREE.Group>
                // gltf.cameras; // Array<THREE.Camera>
                // gltf.asset; // Object

                if ( gltf.animations.length > 0) {

                    let glbMixer = new THREE.AnimationMixer( gltf.scene );
                    scope.mixers.push( glbMixer );
                    scope.action = glbMixer.clipAction( gltf.animations[0] );

                    // Display button to start animation inside the Asset 3D previewer
                    document.getElementById("animButton1").style.display = "inline-block";

                } else {

                    // Display button to start animation inside the Asset 3D previewer
                    document.getElementById("animButton1").style.display = "none";

                }

                scope.scene.getChildByName('root').add( gltf.scene );

                scope.render();


                let centerRadius = scope.computeSceneBoundingSphereAll(scope.scene.getChildByName('root'));
                console.log("Estimated center", centerRadius[0]);
                console.log("Estimated radius", centerRadius[1]);

                const geometryBall = new THREE.SphereGeometry( centerRadius[1], 32, 32 );
                const materialBall = new THREE.MeshBasicMaterial( {color: 0xffff00, wireframe: true} );
                const sphereBall = new THREE.Mesh( geometryBall, materialBall );
                sphereBall.position.copy( centerRadius[0] );
                sphereBall.name = "Center Ball"
                scope.scene.getChildByName('root').add( sphereBall );


                scope.zoomer(scope.scene.getChildByName('root'));
            },
            '',
            // called when loading has errors
            function ( error ) {

                console.log( 'An error happened' );

            }
        );

    }

    /* Molecule loader */
    loadMolecule(url_or_text_pdb, calledFromWhere) {

        // Clear Previous
        this.clearAllAssets();

        let loader = new THREE.PDBLoader();

        let scope = this;

        // Load new
        loader.load(url_or_text_pdb, function (pdb) {

            let geometryAtoms = pdb.geometryAtoms;

            let positions = geometryAtoms.getAttribute('position').array;
            let colors = geometryAtoms.getAttribute('color').array;
            let geometryBonds = pdb.geometryBonds;
            let json = pdb.json;

            let sphereGeometry = new THREE.IcosahedronBufferGeometry(1, 4);

            let colorArchive = [];

            for (let i = 0; i < positions.length ; i += 3) {

                // Atom position and color
                let atomPosition = new THREE.Vector3(positions[i], positions[i + 1], positions[ i + 2 ]);
                let atomColor    = new THREE.Color  (   colors[i], colors   [i + 1], colors   [ i + 2 ]);

                colorArchive.push( atomColor );

                let material = new THREE.MeshPhongMaterial({color: atomColor, flatShading: false});

                let atomObject = new THREE.Mesh(sphereGeometry, material);

                let atomName = json.atoms[i/3][4];

                atomObject.name = "AtomBall:" + atomName;
                atomObject.position.copy(atomPosition);

                // atomObject.position.multiplyScalar(75);
                // atomObject.scale.multiplyScalar(25);

                scope.scene.getChildByName('root').add(atomObject);


                // Make the Atom Text CSS2D label
                let atomLabelCSS = document.createElement('div');
                atomLabelCSS.className = 'label';
                atomLabelCSS.style.color = 'rgb(' + atomColor.r* 255 + ',' + atomColor.g* 255+ ',' + atomColor.b * 255 + ')';
                atomLabelCSS.textContent =  atomName;

                let atomlabelObj = new THREE.CSS2DObject(atomLabelCSS);
                atomlabelObj.name = "Label:" + atomLabelCSS.textContent;
                atomlabelObj.position.copy( atomObject.position );

                // console.log("label",label);
                // const axesHelper = new THREE.AxesHelper( 55 );
                // scope.scene.getChildByName('root').add( axesHelper );
                scope.scene.getChildByName('root').add(atomlabelObj);
            }

            // Make the bonds


            let positionsBonds = geometryBonds.getAttribute('position');

            positionsBonds.count = positions.array.length;




            let colorsStart = geometryBonds.getAttribute('colorStart');
            let colorsEnd = geometryBonds.getAttribute('colorEnd');

            for (let i = 0; i < positionsBonds.count; i += 6) {

                let start = new THREE.Vector3( positionsBonds.array[i], positionsBonds.array[i+1], positionsBonds.array[i+2]);
                let end   = new THREE.Vector3( positionsBonds.array[i+3],positionsBonds.array[i+4],positionsBonds.array[i+5]);

                // start.multiplyScalar(75);
                // end.multiplyScalar(75);

                let HALF_PI = + Math.PI * .5;
                let distance = start.distanceTo(end);

                let cylinder = new THREE.CylinderGeometry(16, 16, distance/2, 20, 5, false);

                let orientation = new THREE.Matrix4();//a new orientation matrix to offset pivot
                let offsetRotation = new THREE.Matrix4();//a matrix to fix pivot rotation
                let offsetPosition = new THREE.Matrix4();//a matrix to fix pivot position

                orientation.lookAt( start, end, new THREE.Vector3(0,1,0));//look at destination
                offsetRotation.makeRotationX(HALF_PI);//rotate 90 degs on X
                orientation.multiply(offsetRotation);//combine orientation with rotation transformations
                cylinder.applyMatrix4(orientation);



                let bond1 = new THREE.Mesh(cylinder, new THREE.MeshPhongMaterial({
                    color: new THREE.Color(colorsStart[i/6][0], colorsStart[i/6][1], colorsStart[i/6][2]),
                    flatShading: false,
                }));

                bond1.name = "Bond:" + i;
                bond1.position.copy(start);
                bond1.position.lerp(end, 0.25);

                scope.scene.getChildByName('root').add(bond1);


                let bond2 = new THREE.Mesh(cylinder, new THREE.MeshPhongMaterial({
                    color: new THREE.Color(colorsEnd[i/6][0], colorsEnd[i/6][1], colorsEnd[i/6][2]),
                    flatShading: false,
                }));

                bond2.name = "Bond:" + (i+1);
                bond2.position.copy(start);
                bond2.position.lerp(end, 0.75);
                scope.scene.getChildByName('root').add(bond2);
            }

            scope.render();


            // ------------ Find bounding sphere and zoom ----
            let sphere = scope.computeSceneBoundingSphereAll(scope.scene.getChildByName('root'));
            // Find new zoom
            let totalRadius = sphere[1];
            console.log(totalRadius);
            scope.controls.minDistance = 0.001 * totalRadius;
            scope.controls.maxDistance = 35 * totalRadius;

            // console.log("sphere", sphere[1]);
            //
            // const geometryBall = new THREE.SphereGeometry( sphere[1], 32, 32 );
            // const materialBall = new THREE.MeshBasicMaterial( {color: 0xffff00, wireframe: true} );
            // const sphereBall = new THREE.Mesh( geometryBall, materialBall );
            // sphereBall.position.copy(sphere[0]);
            // sphereBall.name = "Center Ball"
            // scope.scene.getChildByName('root').add( sphereBall );

            // translate object to the center
            // scope.scene.getChildByName('root').traverse(function (object) {
            //     //object.position.x = object.position.y = object.position.z = 0;
            //
            //     if (object instanceof THREE.Mesh || object instanceof THREE.Object3D ) {
            //
            //
            //         if (object.name==='')
            //             return;
            //
            //        object.position.add(new THREE.Vector3(-sphere[0].x, -sphere[0].y, -sphere[0].z));
            //
            //         // if(object.geometry) {
            //         //     object.geometry.translate(-sphere[0].x, -sphere[0].y, -sphere[0].z);
            //         // }
            //     }
            // });

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
                sceneBSCenter.add( object.position );
                nObjects ++;
            }
        } );

        // console.log(nObjects, sceneBSCenter);
        sceneBSCenter.divideScalar(nObjects);

        myGroupObj.traverse( function (object)
        {
            if (object instanceof THREE.Mesh)
            {
                object.geometry.computeBoundingSphere();

                // Object radius
                let radius = object.geometry.boundingSphere.radius;

//                console.log(object.name + " " + radius, object.position);


                if (radius) {
                     sceneBSRadius = Math.max(sceneBSRadius, radius + object.position.length());
                }
            }
        } );

        // console.log("sceneBSCenter", sceneBSCenter);
        // console.log("sceneBSRadius",sceneBSRadius);

        return [sceneBSCenter, sceneBSRadius];
    }

    /* Zoom to object */
    zoomer(towhatObj){ // FBX or OBJ

        if(towhatObj == null) {
            towhatObj = this.scene.children[5]; // Obj is loaded at 5
        }

        let sphere = this.computeSceneBoundingSphereAll( towhatObj );

        // translate object to the center
        // towhatObj.traverse( function (object) {
        //     if (object instanceof THREE.Mesh) {
        //         //object.position.add(new THREE.Vector3(-sphere[0].x, -sphere[0].y, -sphere[0].z));
        //         //object.geometry.translate( - sphere[0].x, - sphere[0].y, - sphere[0].z) ;
        //     }
        // });

        let totalRadius = sphere[1];
        this.controls.minDistance = 0.001*totalRadius;
        this.controls.maxDistance = 35*totalRadius;
    }


    // ----------------- Auxiliary ---------------------------

    // Start Renderer amd label Renderer
    render() {
        if (!this.renderer.autoClear)
            this.renderer.clear();

        this.controls.update();
        this.renderer.render(this.scene, this.camera);
        this.labelRenderer.render(this.scene, this.camera);

        // Animation
        if ( this.mixers.length > 0 ) {
            //for ( let i = 0; i < this.mixers.length; i ++ ) {
            this.mixers[ 0 ].update( this.clock.getDelta() );
            //}
        }
    }

    // Resize Renderer and Label Renderer
    resizeDisplayGL() {
        this.controls.handleResize();

        this.recalcAspectRatio();
        this.renderer.setSize(this.canvas.offsetWidth, this.canvas.offsetHeight, false);
        this.labelRenderer.setSize(this.canvas.offsetWidth, this.canvas.offsetHeight, false);

        this.updateCamera();
    }

    // Recalculate canvas aspect ratio
    recalcAspectRatio() {
        this.aspectRatio = ( this.canvas.offsetHeight === 0 ) ? 1 : this.canvas.offsetWidth / this.canvas.offsetHeight;
    }

    // Create Pivot for 3D objects to rotate around (to avoid non-centered 3D model problems)
    // createPivot() {
    //     let pivot = new THREE.Object3D();
    //     pivot.name = 'Pivot';
    //
    //     // scene.children[5] is the pivot
    //     this.scene.add( pivot );
    // }

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

    // Report in console
    _reportProgress(text) {
        console.log('Progress: ' + text);
    }

    // Play or Stop animation
    playStopAnimation(){

        if (!this.action.isRunning()) {

            // Play the audio
            if (document.getElementById("audioFile")) {
                document.getElementById("audioFile").play();
            }

            // Play the animation
            this.action.paused = false;
            this.action.play();

        } else {
            if (document.getElementById("audioFile")) {
                document.getElementById("audioFile").pause();
            }
            this.action.paused = true;
        }
    }


    //function autoScreenshot() {
        // setTimeout(function(){
        //     jQuery("#button_qrcode").click(); // close qr code
        //     jQuery("#createModelScreenshotBtn").click();
        // },1000);
    //}


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





