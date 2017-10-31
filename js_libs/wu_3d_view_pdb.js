// Read pdb either as url or text already read

class wu_3d_view_pdb {

    constructor(url_or_text_pdb, post_title, canvas_id) {

        var ctx = this;

        this.loader = new THREE.PDBLoader();
        this.root = THREE.Group();
        this.root.name = post_title;

        // get the dom
        this.container3d_previewer = document.getElementById(canvas_id);
        this.container3d_previewer.style.height = "256px";
        this.container3d_previewer.style.width = "256px";

        // sizes
        this.windowW = this.container3d_previewer.clientWidth;
        this.windowH = this.windowW;

        // Camera position and view
        this.camera = new THREE.PerspectiveCamera(45, this.windowW / this.windowH, 0.5, 20000);

        this.camera.position.z = 10;
        this.camera.position.x = 0;
        this.camera.position.y = 10;
        this.camera.lookAt(new THREE.Vector3(0, 0, 0));

        // scene
        this.scene = new THREE.Scene();
        this.scene.background = new THREE.Color(0xaaaaaa);

        // Light
        this.directionalLight = new THREE.DirectionalLight(0xffffff);
        this.directionalLight.position.set(0, 120, 0);
        this.scene.add(this.directionalLight);

        // Add Grid
        this.gridHelper = new THREE.GridHelper(2000, 40);
        this.gridHelper.name = "myGridHelper";
        //this.scene.add(this.gridHelper);

        // Add Axes helper
        this.axisHelper = new THREE.AxisHelper(100);
        this.axisHelper.name = "myAxisHelper";
        //this.scene.add(this.axisHelper);

        this.renderer = new THREE.WebGLRenderer({
            preserveDrawingBuffer: true
        });

        this.renderer.setSize(this.windowW - 14, this.windowH);
        this.container3d_previewer.appendChild(this.renderer.domElement);


        this.root = new THREE.Group();
        this.scene.add(root);


        this.labelRenderer = new THREE.CSS2DRenderer();
        this.labelRenderer.setSize(this.window.innerWidth, this.window.innerHeight);
        this.labelRenderer.domElement.style.position = 'absolute';
        this.labelRenderer.domElement.style.top = '0';
        this.labelRenderer.domElement.style.pointerEvents = 'none';
        this.container3d_previewer.appendChild(this.labelRenderer.domElement);


        this.controls = new THREE.TrackballControls(this.camera, this.renderer.domElement);
        this.controls.minDistance = 500;
        this.controls.maxDistance = 2000;

        // Resize callback
        window.addEventListener('resize', this.onWindowResize, false);



        this.animate();

        loadMolecule(url_or_text_pdb);
    }


    onWindowResize() {
        this.windowW = this.container3d_previewer.clientWidth;
        this.windowH = this.windowW;

        this.camera.aspect = this.windowW / this.windowH;
        this.camera.updateProjectionMatrix();

        this.renderer.setSize(this.windowW, this.windowH, true);
        this.labelRenderer.setSize(this.windowW, this.windowHt);

        this.render();
    }

    animate() {
        var id_animation_frame = requestAnimationFrame(this.animate.bind(this));
        this.controls.update();
        this.render();
    }

    render() {
        this.renderer.render(this.scene, this.camera);
        this.labelRenderer.render(this.scene, this.camera);
    }

    loadMolecule(url_or_text_pdb) {

        // Clear Previous
        while (this.root.children.length > 0) {
            var object = this.root.children[0];
            object.parent.remove(object);
        }

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
                this.root.add(object);

                // Make the label of the atom
                var atom = json.atoms[i];

                var text = document.createElement('div');
                text.className = 'label';
                text.style.color = 'rgb(' + atom[3][0] + ',' + atom[3][1] + ',' + atom[3][2] + ')';
                text.textContent = atom[4];

                var label = new THREE.CSS2DObject(text);
                label.position.copy(object.position);
                this.root.add(label);

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
                this.root.add(object);

            }

            this.render();

        });

    }
}