function wu_3d_view_main(modeBeforeOrAfterSave, curr_path, textmtl, url_or_text_obj, post_title, canvas_id){

    // get the dom
    var container3d_previewer = document.getElementById(canvas_id);

    // sizes
    var windowW = container3d_previewer.clientWidth;
    var windowH = windowW * 2 / 3;

    // Camera position and view
    var camera = new THREE.PerspectiveCamera(45, windowW / windowH, 0.5, 20000);

    camera.position.z = 10;
    camera.position.x = 0;
    camera.position.y = 10;
    camera.lookAt(new THREE.Vector3(0, 0, 0));

    // scene
    var scene = new THREE.Scene();
    scene.background = new THREE.Color(0xffffff);

    // Light
    var directionalLight = new THREE.DirectionalLight(0xffffff);
    directionalLight.position.set(0, 30, 0);
    scene.add(directionalLight);

    // Add Grid
    var gridHelper = new THREE.GridHelper(2000, 40);
    gridHelper.name = "myGridHelper";
    scene.add(gridHelper);

    // Add Axes helper
    var axisHelper = new THREE.AxisHelper(100);
    axisHelper.name = "myAxisHelper";
    scene.add(axisHelper);

    var renderer = new THREE.WebGLRenderer();

    renderer.setSize(windowW - 14, windowH);
    container3d_previewer.appendChild(renderer.domElement);

    // Orbit controls
    var controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.addEventListener('change', render); // add this only if there is no animation loop (requestAnimationFrame)
    controls.enableDamping = true;
    controls.dampingFactor = 0.25;
    controls.enableZoom = true;

    // Resize callback
    window.addEventListener('resize', onWindowResize, false);

    // start rendering
    animate();

    // ------------ Total Manager -----------------
    var manager = new THREE.LoadingManager();
    manager.onProgress = function (item, loaded, total) {
        //console.log( item, loaded, total );
    };

    var mtlLoader = new THREE.MTLLoader();
    mtlLoader.setPath(curr_path);


    if (textmtl != '')
        mtlLoader.loadfromtext(textmtl, function (materials) {

            materials.preload();

            var objLoader = new THREE.OBJLoader(manager);
            objLoader.setMaterials(materials);

            objLoader.load(url_or_text_obj, modeBeforeOrAfterSave,

                // OnObjLoad
                function (object) {
                    // This makes the obj double sided (put it in a dat.gui button better)
                    object.traverse(function (node) {

                        //if (node.material)
                        //    node.material.side = THREE.DoubleSide;

                        if (node instanceof THREE.Mesh)
                            node.isDigiArt3DMesh = true;
                    });

                    object.name = post_title;

                    scene.add(object);
                },

                //onObjProgressLoad
                function (xhr) {

                    if (xhr.lengthComputable) {
                        var percentComplete = Math.round(xhr.loaded / xhr.total * 100);
                        var pctDOM = jQuery("#vr-preview-progress-content")[0];
                        pctDOM.innerHTML = percentComplete + "%";
                        if (xhr.loaded == xhr.total) // in bytes
                            pctDOM.hidden = true;
                    }
                },

                //onObjErrorLoad
                function (xhr) {
                }
            );

        });


    function onWindowResize() {
        var windowW = container3d_previewer.clientWidth;
        var windowH = windowW * 2 / 3;

        camera.aspect = windowW / windowH;
        camera.updateProjectionMatrix();

        renderer.setSize(windowW, windowH, true);
    }

    function animate() {
        requestAnimationFrame(animate);
        //scene.rotation.y += 0.01;
        // No need to render continuously because there are no changes. Render only when OrbitControls change
        render();
    }

    function render() {
        renderer.render(scene, camera);
    }
}



