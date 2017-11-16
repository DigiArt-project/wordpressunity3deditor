/*
     3D viewer for all types of files
 */
class wu_webw_3d_view {

    constructor(elementToBindTo) {

        this.renderer = null;
        this.canvas = elementToBindTo;
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
        this.cameraTarget = this.cameraDefaults.posCameraTarget;

        this.controls = null;

        this.flatShading = false;
        this.doubleSide = false;
        this.streamMeshes = true;


        this.pivot = null;


        // - PDB specific -
        // Here all chemistry 3D and 2D labels items are stored
        this.root = new THREE.Group();


        // - OBJ Specific -
        this.wwObjLoader2 = new THREE.OBJLoader2.WWOBJLoader2();
        this.wwObjLoader2.setCrossOrigin('anonymous');

        // Check for the various File API support.
        this.fileApiAvailable = true;
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            console.log('File API is supported! Enabling all features.');
        } else {
            this.fileApiAvailable = false;
            console.warn('File API is not supported! Disabling file loading.');
        }
        // - End of OBJ specific -
    }

    initGL() {
        this.renderer = new THREE.WebGLRenderer({
            canvas: this.canvas,
            antialias: true
        });

        this.scene = new THREE.Scene();
        this.scene.background = new THREE.Color(0xddb59b);


        // - PDB Specific -
        this.scene.add(this.root);

        // Label renderer
        this.labelRenderer = new THREE.CSS2DRenderer();
        //this.labelRenderer.setSize(this.windowW, this.windowH);
        //this.labelRenderer.setSize( this.canvas.offsetWidth, this.canvas.offsetHeight); //window.innerWidth, window.innerHeight );
        this.labelRenderer.domElement.style.position = 'absolute';
        this.labelRenderer.domElement.style.top = '0';
        this.labelRenderer.domElement.style.pointerEvents = 'none';

        document.getElementById("previewCanvasDiv").appendChild(this.labelRenderer.domElement);

        // - End of PDB specific -

        this.camera = new THREE.PerspectiveCamera(this.cameraDefaults.fov,
            this.aspectRatio, this.cameraDefaults.near, this.cameraDefaults.far);

        this.resetCamera();

        this.controls = new THREE.TrackballControls(this.camera, this.renderer.domElement);
        this.controls.zoomSpeed = 1.02;
        this.controls.dynamicDampingFactor = 0.3;

        var ambientLight = new THREE.AmbientLight(0x404040);
        var directionalLight1 = new THREE.DirectionalLight(0xA0A050);
        var directionalLight2 = new THREE.DirectionalLight(0x909050);
        var directionalLight3 = new THREE.DirectionalLight(0xA0A050);

        directionalLight1.position.set(-1000,  -550,  1000);
        directionalLight2.position.set( 1000,   550, -1000);
        directionalLight3.position.set(    0,   550,     0);

        this.scene.add(directionalLight1);
        this.scene.add(directionalLight2);
        this.scene.add(directionalLight3);
        this.scene.add(ambientLight);

        // var helper = new THREE.GridHelper( 1200, 60, 0xFF4444, 0xcca58b );
        // this.scene.add( helper );

        this.createPivot();
    }

    createPivot() {
        this.pivot = new THREE.Object3D();
        this.pivot.name = 'Pivot';
        this.scene.add(this.pivot);
    }

    initPostGL() {

        var scope = this;

        var materialsLoaded = function (materials) {

            // REM : Check the materials here
            console.log("+++ Report on the materials loaded +++")

            console.log(materials);

            // for (var key in materials) {
            //     if (materials.hasOwnProperty(key)) {
            //         if (materials[key].map != null)
            //             console.log( materials[key].map.image);
            //     }
            // }

            console.log("++++++++++++++++++++++++++++");
        };

        var meshLoaded = function (name, bufferGeometry, material) {
            console.log("----- Report of mesh loaded -------");
            console.log('Loaded mesh: ' + name);
            for (var i = 0; i < material.length; i++)
                console.log('Material ', i, material[i]);


            console.log("----------------------------------")
        };

        var completedLoading = function () {
            console.log('Loading complete!');

            jQuery('#previewProgressSlider').hide();
            document.getElementById('previewProgressSliderLine').style.width = 0;
            document.getElementById('previewProgressLabel').innerHTML = "";
            scope._reportProgress('');
            scope.zoomer();
        };
        this.wwObjLoader2.registerCallbackProgress(this._reportProgress);
        this.wwObjLoader2.registerCallbackCompletedLoading(completedLoading);
        this.wwObjLoader2.registerCallbackMaterialsLoaded(materialsLoaded);
        this.wwObjLoader2.registerCallbackMeshLoaded(meshLoaded);

        return true;
    }

    _reportProgress(text) {
        console.log('Progress: ' + text);
    }

    loadFiles(prepData) {
        prepData.setSceneGraphBaseNode(this.pivot);
        prepData.setStreamMeshes(this.streamMeshes);
        this.wwObjLoader2.prepareRun(prepData);
        this.wwObjLoader2.run();
    }

    loadFilesUser(objDef) {

        var prepData = new THREE.OBJLoader2.WWOBJLoader2.PrepDataArrayBuffer(
            objDef.name,
            objDef.objAsArrayBuffer,
            objDef.pathTexture,  // if it is already uploaded this is a url. If it is on client side, this is an array of raw images
            objDef.mtlAsString,
        );
        prepData.setSceneGraphBaseNode(this.pivot);
        prepData.setStreamMeshes(this.streamMeshes);
        this.wwObjLoader2.prepareRun(prepData);
        this.wwObjLoader2.run();
    }

    resizeDisplayGL() {
        this.controls.handleResize();

        this.recalcAspectRatio();
        this.renderer.setSize(this.canvas.offsetWidth, this.canvas.offsetHeight, false);
        this.labelRenderer.setSize(this.canvas.offsetWidth, this.canvas.offsetHeight, false);

        this.updateCamera();
    };

    recalcAspectRatio() {
        this.aspectRatio = ( this.canvas.offsetHeight === 0 ) ? 1 : this.canvas.offsetWidth / this.canvas.offsetHeight;
    };

    resetCamera() {
        this.camera.position.copy(this.cameraDefaults.posCamera);
        this.cameraTarget.copy(this.cameraDefaults.posCameraTarget);

        this.updateCamera();
    }

    updateCamera() {
        this.camera.aspect = this.aspectRatio;
        this.camera.lookAt(this.cameraTarget);
        this.camera.updateProjectionMatrix();
    }




    render() {
        if (!this.renderer.autoClear)
            this.renderer.clear();

        this.controls.update();
        this.renderer.render(this.scene, this.camera);
        this.labelRenderer.render(this.scene, this.camera);
    }

    alterShading() {

        var scope = this;
        scope.flatShading = !scope.flatShading;
        console.log(scope.flatShading ? 'Enabling flat shading' : 'Enabling smooth shading');

        scope.traversalFunction = function (material) {
            material.flatShading = scope.flatShading;
            material.needsUpdate = true;
        };
        var scopeTraverse = function (object3d) {
            scope.traverseScene(object3d);
        };
        scope.pivot.traverse(scopeTraverse);
    }

    alterDouble() {

        var scope = this;
        scope.doubleSide = !scope.doubleSide;
        console.log(scope.doubleSide ? 'Enabling DoubleSide materials' : 'Enabling FrontSide materials');

        scope.traversalFunction = function (material) {
            material.side = scope.doubleSide ? THREE.DoubleSide : THREE.FrontSide;
        };

        var scopeTraverse = function (object3d) {
            scope.traverseScene(object3d);
        };
        scope.pivot.traverse(scopeTraverse);
    }

    traverseScene(object3d) {
        if (object3d.material instanceof THREE.MultiMaterial) {
            var materials = object3d.material.materials;
            for (var name in materials) {
                if (materials.hasOwnProperty(name)) this.traversalFunction(materials[name]);
            }
        } else if (object3d.material) {
            this.traversalFunction(object3d.material);
        }
    }

    // Clear Previous
    clearAllAssets() {
        var scope = this;

        // PDB Specific
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


    /**
     * Molecule simple loader
     *
     * @param url_or_text_pdb
     * @param post_title
     */
    loadMolecule(url_or_text_pdb) {

        // Clear Previous
        this.clearAllAssets();

        var loader = new THREE.PDBLoader();



        var scope = this;

        // Load new
        loader.load(url_or_text_pdb, function (pdb) {


            var geometryAtoms = pdb.geometryAtoms;
            var geometryBonds = pdb.geometryBonds;
            var json = pdb.json;

            var boxGeometry = new THREE.BoxBufferGeometry(1, 1, 1);
            var sphereGeometry = new THREE.IcosahedronBufferGeometry(1, 2);

            var offset = geometryAtoms.center();
            geometryBonds.translate(offset.x, offset.y, offset.z);

            var positions = geometryAtoms.getAttribute('position');
            var colors = geometryAtoms.getAttribute('color');

            var position = new THREE.Vector3();
            var color = new THREE.Color();

            for (var i = 0; i < positions.count; i++) {

                // Make the atoms
                position.x = positions.getX(i);
                position.y = positions.getY(i);
                position.z = positions.getZ(i);

                color.r = colors.getX(i);
                color.g = colors.getY(i);
                color.b = colors.getZ(i);

                var material = new THREE.MeshPhongMaterial({color: color});

                var object = new THREE.Mesh(sphereGeometry, material);
                object.position.copy(position);
                object.position.multiplyScalar(75);
                object.scale.multiplyScalar(25);
                scope.root.add(object);

                // Make the label of the atom
                var atom = json.atoms[i];

                var text = document.createElement('div');
                text.className = 'label';
                text.style.color = 'rgb(' + atom[3][0] + ',' + atom[3][1] + ',' + atom[3][2] + ')';
                text.textContent = atom[4];

                var label = new THREE.CSS2DObject(text);
                label.position.copy(object.position);

                scope.root.add(label);
            }

            // Make the bonds
            positions = geometryBonds.getAttribute('position');

            var start = new THREE.Vector3();
            var end = new THREE.Vector3();

            for (var i = 0; i < positions.count; i += 2) {

                start.x = positions.getX(i);
                start.y = positions.getY(i);
                start.z = positions.getZ(i);

                end.x = positions.getX(i + 1);
                end.y = positions.getY(i + 1);
                end.z = positions.getZ(i + 1);

                start.multiplyScalar(75);
                end.multiplyScalar(75);

                var object = new THREE.Mesh(boxGeometry, new THREE.MeshPhongMaterial(0xffffff));
                object.position.copy(start);
                object.position.lerp(end, 0.5);
                object.scale.set(5, 5, start.distanceTo(end));
                object.lookAt(end);
                scope.root.add(object);

            }

            scope.render();
        });
    }


    /**
     * Auto zoom on obj with multiple meshes
     *
     * @param myGroupObj
     * @returns {[*,*]}
     */
    computeSceneBoundingSphereAll(myGroupObj)
    {
        var sceneBSCenter = new THREE.Vector3(0,0,0);
        var sceneBSRadius = 0;

        myGroupObj.traverse( function (object)
        {
             if (object instanceof THREE.Mesh)
             {
                 object.geometry.computeBoundingSphere();

                 // Object radius
                 var radius = object.geometry.boundingSphere.radius;

                 if (radius) {

                     // Object center in world space
                     var objectCenterLocal = object.position.clone();

                     var objectCenterWorld = object.localToWorld(objectCenterLocal);

                     // // New center in world space
                     var newCenter = new THREE.Vector3();

                     newCenter.addVectors(sceneBSCenter, objectCenterWorld);
                     newCenter.divideScalar(2.0);

                     // New radius in world space
                     var dCenter = newCenter.distanceTo(sceneBSCenter);

                     var newRadius = Math.max(dCenter + radius, dCenter + sceneBSRadius);
                     //sceneBSCenter = dCenter;
                     sceneBSCenter = newCenter;
                     sceneBSRadius = newRadius;
                 }
            }
        } );

        return [sceneBSCenter, sceneBSRadius];

    }

    /**
     * Zoom to the whole object
     */
    zoomer(){
          // child 4 is the added object
          var totalradius = this.computeSceneBoundingSphereAll( this.scene.children[5] )[1];

          this.controls.minDistance = 0.5*totalradius;
          this.controls.maxDistance = 8*totalradius;
    }
}