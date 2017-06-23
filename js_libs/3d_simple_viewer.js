// // input vars = $curr_path, $textmtl, $url_obj, $post_title
//
//
// var curr_path = '<?php echo $curr_path?>';
// var textmtl = <?php echo json_encode($textmtl)?>;
//
// if (textmtl == '')
//     return;
//
// //<script src="<?php echo plugins_url() ?>/wordpressunity3deditor/js_libs/threejs79/three.js"></script>
// //<script src="<?php echo plugins_url() ?>/wordpressunity3deditor/js_libs/threejs79/OBJLoader.js"></script>
// //<script src="<?php echo plugins_url() ?>/wordpressunity3deditor/js_libs/threejs79/MTLLoader.js"></script>
// //<script src="<?php echo plugins_url() ?>/wordpressunity3deditor/js_libs/threejs79/OrbitControls.js"></script>
//
// container3d_previewer = document.getElementById('vr-preview');
// windowW = container3d_previewer.clientWidth;
// windowH = windowW * 2/3;
//
// var camera, scene, renderer;
//
// // Camera position and view
// camera = new THREE.PerspectiveCamera( 45, windowW / windowH, 0.5, 20000);
// camera.position.z = 10;
// camera.position.x = 0;
// camera.position.y = 10;
// camera.lookAt(new THREE.Vector3(0, 0, 0));
//
// // scene
// scene = new THREE.Scene();
// scene.background = new THREE.Color(0xffffff);
//
//  // Light
// var directionalLight = new THREE.DirectionalLight(0xffffff);
// directionalLight.position.set(0, 30, 0);
// scene.add(directionalLight);
//
// // Add Grid
// this.gridHelper = new THREE.GridHelper(2000, 40);
// this.gridHelper.name = "myGridHelper";
// this.scene.add(this.gridHelper);
//
// // Add Axes helper
// this.axisHelper = new THREE.AxisHelper( 100 );
// this.axisHelper.name = "myAxisHelper";
// this.scene.add(this.axisHelper);
//
// renderer = new THREE.WebGLRenderer();
//
// renderer.setSize(windowW-14, windowH);
// container3d_previewer.appendChild(renderer.domElement);
//
// // Orbit controls
// controls = new THREE.OrbitControls(camera, renderer.domElement);
// controls.addEventListener('change', render); // add this only if there is no animation loop (requestAnimationFrame)
// controls.enableDamping = true;
// controls.dampingFactor = 0.25;
// controls.enableZoom = true;
//
// // Resize callback
// window.addEventListener('resize', onWindowResize, false);
//
// // start rendering
// animate();
//
// // ------------ Total Manager -----------------
// var manager = new THREE.LoadingManager();
// manager.onProgress = function (item, loaded, total) {
//       //console.log( item, loaded, total );
// };
//
// var mtlLoader = new THREE.MTLLoader();
// mtlLoader.setPath(curr_path);
//
// mtlLoader.loadfromtext(textmtl, function (materials) {
//
//     materials.preload();
//
//     var objLoader = new THREE.OBJLoader(manager);
//     objLoader.setMaterials(materials);
//
//     objLoader.load('<?php echo $url_obj?>',
//
//         // OnObjLoad
//         function (object) {
//             // This makes the obj double sided (put it in a dat.gui button better)
//             object.traverse(function (node) {
//                 //if (node.material)
//                 //    node.material.side = THREE.DoubleSide;
//
//                 if (node instanceof THREE.Mesh)
//                     node.isDigiArt3DMesh = true;
//             });
//
//
//             object.name = '<?php echo $post_title ?>';
//             scene.add(object);
//         },
//
//         //onObjProgressLoad
//         function (xhr) {
//             if (xhr.lengthComputable) {
//                 var percentComplete = xhr.loaded / xhr.total * 100;
//             }
//         },
//
//         //onObjErrorLoad
//         function (xhr) {
//         }
//     );
// });
//
// // ---- Auxiliary functions -------
// function onWindowResize() {
//     var windowW = container3d_previewer.clientWidth;
//     var windowH = windowW*2/3;
//
//     camera.aspect = windowW / windowH;
//     camera.updateProjectionMatrix();
//
//     renderer.setSize(windowW, windowH, true);
// }
//
// function animate() {
//     requestAnimationFrame(animate);
//     //scene.rotation.y += 0.01;
//     // No need to render continuously because there are no changes. Render only when OrbitControls change
//     render();
// }
//
// function render() {
//     renderer.render(scene, camera);
// }