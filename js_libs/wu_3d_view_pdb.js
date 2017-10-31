// Read pdb either as url or text already read

class wu_3d_view_pdb {

    constructor(elementToBindTo) {

        this.renderer = null;
        this.canvas = elementToBindTo;
        this.aspectRatio = 1;
        this.recalcAspectRatio();

        this.scene = null;
        this.cameraDefaults = {
            posCamera: new THREE.Vector3( 0.0, 175.0, 500.0 ),
            posCameraTarget: new THREE.Vector3( 0, 0, 0 ),
            near: 0.1,
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


        // Here all chemistry 3D and 2D labels items are stored
        this.root = new THREE.Group();

    }


    initGL(){

        this.renderer = new THREE.WebGLRenderer( {
            canvas: this.canvas,
            antialias: true
        } );

        // Scene
        this.scene = new THREE.Scene();
        this.scene.background = new THREE.Color( 0xddb59b );
        this.scene.add(this.root);

        // Label renderer
        this.labelRenderer = new THREE.CSS2DRenderer();
        this.labelRenderer.setSize(this.windowW, this.windowH);
        this.labelRenderer.domElement.style.position = 'absolute';
        this.labelRenderer.domElement.style.top = '0';
        this.labelRenderer.domElement.style.pointerEvents = 'none';
        this.canvas.appendChild(this.labelRenderer.domElement);

        // Camera
        this.camera = new THREE.PerspectiveCamera( this.cameraDefaults.fov,
            this.aspectRatio, this.cameraDefaults.near, this.cameraDefaults.far );

        this.resetCamera();

        this.controls = new THREE.TrackballControls(this.camera, this.renderer.domElement);
        // this.controls.minDistance = 500;
        // this.controls.maxDistance = 2000;

        var ambientLight = new THREE.AmbientLight( 0x404040 );
        var directionalLight1 = new THREE.DirectionalLight( 0xffffff, 0.8 );
        directionalLight1.position.set( 1, 1, 1 );

        var directionalLight2 = new THREE.DirectionalLight( 0xffffff, 0.5 );
        directionalLight2.position.set( -1, -1, 1 );

        this.scene.add( directionalLight1 );
        this.scene.add( directionalLight2 );
        this.scene.add( ambientLight );

        // var helper = new THREE.GridHelper( 1200, 60, 0xFF4444, 0xcca58b );
        // this.scene.add( helper );

        this.createPivot();
    }


    createPivot(){
        this.pivot = new THREE.Object3D();
        this.pivot.name = 'Pivot';
        this.scene.add( this.pivot );
    }

    initPostGL(){
    }

    recalcAspectRatio () {
        this.aspectRatio = ( this.canvas.offsetHeight === 0 ) ? 1 : this.canvas.offsetWidth / this.canvas.offsetHeight;
    }


    clearAllAssets(){

        var ctx = this;

        // Clear Previous
        while (ctx.root.children.length > 0) {
            var object = ctx.root.children[0];
            object.parent.remove(object);
        }

    }

    resetCamera(){

        this.camera.position.copy( this.cameraDefaults.posCamera );
        this.cameraTarget.copy( this.cameraDefaults.posCameraTarget );

        this.updateCamera();

    }

    updateCamera(){

        this.camera.aspect = this.aspectRatio;
        this.camera.lookAt( this.cameraTarget );
        this.camera.updateProjectionMatrix();
    }

    resizeDisplayGL(){
        this.controls.handleResize();

        this.recalcAspectRatio();
        this.renderer.setSize( this.canvas.offsetWidth, this.canvas.offsetHeight, false );

        this.updateCamera();

    }



    animate() {
        var id_animation_frame = requestAnimationFrame(this.animate.bind(this));
        this.controls.update();
        this.render();
    }

    render() {

        if ( ! this.renderer.autoClear ) this.renderer.clear();
        this.controls.update();
        this.renderer.render( this.scene, this.camera );
        this.labelRenderer.render(this.scene, this.camera);
    }


    loadMolecule(url_or_text_pdb, post_title) {


        // Clear Previous
        while (this.root.children.length > 0) {
            var object = this.root.children[0];
            object.parent.remove(object);
        }

        this.root.name = post_title;

        var loader = new THREE.PDBLoader();

        var ctx = this;

        // Load new
        loader.load(url_or_text_pdb, function (pdb) {


            console.log("pdb", pdb);

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
                ctx.root.add(object);

                // Make the label of the atom
                var atom = json.atoms[i];

                var text = document.createElement('div');
                text.className = 'label';
                text.style.color = 'rgb(' + atom[3][0] + ',' + atom[3][1] + ',' + atom[3][2] + ')';
                text.textContent = atom[4];

                var label = new THREE.CSS2DObject(text);
                label.position.copy(object.position);

                console.log(label);

                ctx.root.add(label);

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
                ctx.root.add(object);

            }

            ctx.render();

        });

    }
}