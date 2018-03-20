// OBSOLETE

// 16/10/2017 by Ververidis: This function is obsolete. IT is replaced with WU_webw_3d_view.js
// Back-end: Remove 3d viewer from back-end, leave only json.

class wu_3d_view {

    constructor(modeBeforeOrAfterSave, curr_path, textmtl, url_or_text_obj, textureFileContent, post_title, canvas_id) {

        // var ctx = this;
        //
        // // get the dom
        // this.container3d_previewer = document.getElementById(canvas_id);
        // this.container3d_previewer.style.height = "256px";
        // this.container3d_previewer.style.width = "256px";
        //
        // // sizes
        // this.windowW = this.container3d_previewer.clientWidth;
        // this.windowH = this.windowW;
        //
        // // Camera position and view
        // this.camera = new THREE.PerspectiveCamera(45, this.windowW / this.windowH, 0.5, 20000);
        //
        // this.camera.position.z = 10;
        // this.camera.position.x = 0;
        // this.camera.position.y = 10;
        // this.camera.lookAt(new THREE.Vector3(0, 0, 0));
        //
        // // scene
        // this.scene = new THREE.Scene();
        // this.scene.background = new THREE.Color(0xffffff);
        //
        // // Light
        // this.directionalLight = new THREE.DirectionalLight(0xffffff);
        // this.directionalLight.position.set(0, 120, 0);
        // this.scene.add(this.directionalLight);
        //
        // // Add Grid
        // this.gridHelper = new THREE.GridHelper(2000, 40);
        // this.gridHelper.name = "myGridHelper";
        // //this.scene.add(this.gridHelper);
        //
        // // Add Axes helper
        // this.axisHelper = new THREE.AxisHelper(100);
        // this.axisHelper.name = "myAxisHelper";
        // //this.scene.add(this.axisHelper);
        //
        // this.renderer = new THREE.WebGLRenderer({
        //     preserveDrawingBuffer: true
        // });
        //
        // this.renderer.setSize(this.windowW - 14, this.windowH);
        // this.container3d_previewer.appendChild(this.renderer.domElement);
        //
        // // Orbit controls
        // this.controls = new THREE.OrbitControls(this.camera, this.renderer.domElement);
        // //controls.addEventListener('change', render); // add this only if there is no animation loop (requestAnimationFrame)
        // this.controls.enableDamping = true;
        // this.controls.dampingFactor = 0.25;
        // this.controls.enableZoom = true;
        // this.controls.enableRotate = true;
        //
        //
        // //this.transform_controls = new THREE.TransformControls( this.camera, this.renderer );
        //
        // // Resize callback
        // window.addEventListener('resize', this.onWindowResize, false);
        //
        // // start rendering
        // this.animate();
        //
        // // ------------ Total Manager -----------------
        // ctx.manager = new THREE.LoadingManager();
        // ctx.manager.onProgress = function (item, loaded, total) {
        //     console.log(item, loaded, total);
        // };
        //
        // this.mtlLoader = new THREE.MTLLoader();
        // this.mtlLoader.setPath(curr_path);
        //
        // if (textmtl !== '')
        //     this.mtlLoader.loadfromtext(textmtl, textureFileContent, function (materials) {
        //
        //         materials.preload();
        //
        //         ctx.objLoader = new THREE.OBJLoader(ctx.manager);
        //         ctx.objLoader.setMaterials(materials);
        //
        //         ctx.objLoader.load(url_or_text_obj, modeBeforeOrAfterSave,
        //
        //             // OnObjLoad
        //             function (object) {
        //
        //                 ctx.globalObject = object;
        //
        //                 // transform_controls.attach(object);
        //                 // ctx.scene.add(transform_controls);
        //                 // transform_controls.setMode("rotate");
        //
        //                 // This makes the obj double sided (put it in a dat.gui button better)
        //                 object.traverse(function (node) {
        //
        //                     //if (node.material)
        //                     //    node.material.side = THREE.DoubleSide;
        //
        //                     if (node instanceof THREE.Mesh)
        //                         node.isDigiArt3DMesh = true;
        //                 });
        //
        //                 object.name = post_title;
        //
        //                 ctx.scene.add(object);
        //                 ctx.render();
        //             },
        //
        //             //onObjProgressLoad : Only when the file is on the server
        //             function (xhr) {
        //
        //                 console.log(xhr.lengthComputable);
        //                 console.log(xhr.loaded , xhr.total);
        //
        //                 if (xhr.lengthComputable) {
        //                     var percentComplete = Math.round(xhr.loaded / xhr.total * 100);
        //                     var pctDOM = jQuery("#vr-preview-progress-content")[0];
        //                     pctDOM.innerHTML = percentComplete + "%";
        //                     if (xhr.loaded == xhr.total) // in bytes
        //                         pctDOM.hidden = true;
        //                 }
        //             },
        //
        //             //onObjErrorLoad
        //             function (xhr) {
        //             },
        //
        //             false
        //         );
        //
        //     });
    }


    onWindowResize(){
            // this.windowW = this.container3d_previewer.clientWidth;
            // this.windowH = windowW; // * 2 / 3;
            //
            // this.camera.aspect = this.windowW / this.windowH;
            // this.camera.updateProjectionMatrix();
            //
            // this.renderer.setSize(this.windowW, this.windowH, true);
    }

//     animate() {
//
//         var id_animation_frame = requestAnimationFrame(this.animate.bind(this));
//         this.render();
//     }
//
//    render() {
//        this.renderer.render(this.scene, this.camera);
//    }
//
//
//
//     newTexture(textureFileContent) {
//
//         var ctx = this;
//         var material = new THREE.MeshBasicMaterial(); // create a material
//
//         var texture = new THREE.Texture();
//         texture.format = THREE.RGBFormat; // isJPEG ? RGBFormat : RGBAFormat;
//
//         var image = document.createElementNS( 'http://www.w3.org/1999/xhtml', 'img' );
//         image.src = textureFileContent;
//
//         texture.image = image;
//         texture.needsUpdate = true;
//
//         // texture.wrapS = THREE.RepeatWrapping;
//         // texture.wrapT = THREE.RepeatWrapping;
//         // texture.offset.x = 90/(2*Math.PI);
//         material.map = texture; // set the material's map when when the texture is loaded
//
//         ctx.globalObject.traverse( function ( child ) {
//             if (child instanceof THREE.Mesh) {
//                 //apply texture
//                 child.material = material; // .map =  THREE.ImageUtils. loadTexture(newTexturePath);
// //                        child.material.needsUpdate = true;
//             }
//         });
//     }

}