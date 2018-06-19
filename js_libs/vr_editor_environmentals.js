"use strict";
class vr_editor_environmentals {

    constructor(container_3D_all){

        this.is2d = true;
        this.isDebug = false; // Debug mode

        this.thirdPersonView = false;



        this.ctx = this;

        this.container_3D_all = container_3D_all;

        this.SCREEN_WIDTH = this.container_3D_all.clientWidth; // 500; //window.innerWidth;
        this.SCREEN_HEIGHT = this.container_3D_all.clientHeight; // 500; //window.innerHeight;
        this.VIEW_ANGLE = 60;

        this.ASPECT = this.SCREEN_WIDTH / this.SCREEN_HEIGHT;
        this.FRUSTUM_SIZE = 100; // For orthographic camera only
        this.SCENE_DIMENSION_SURFACE = 100; // It is the max of x z dimensions of the scene (found when all objects are loaded)


        this.NEAR = 0.01;
        this.FAR = 0.01; // keep the camera empty until everything is loaded

        this.setScene();
        this.setRenderer();
        this.setOrbitCamera();
        this.setAvatarCamera();

        //this.setRecycleBin();
        //this.setAxisText();
        //this.setArtificialFloor();
        this.setLight();
//         this.setStats();
        this.setSky();
        this.setSunSphere();

        this.setComposer();

        // this.setTerrain(); // test after 74

        // Window resize event (container was added)
        //THREEx.WindowResize( this.renderer, this.cameraOrbit, this.container_3D_all);
        //THREEx.WindowResize( this.renderer, this.cameraAvatar, this.container_3D_all);

        // renderer.setSize( dom.clientWidth, dom.clientHeight );
        // // update the camera
        // camera.aspect	= dom.clientWidth/ dom.clientHeight;
        // camera.updateProjectionMatrix();
    }


    turboResize(){
        this.SCREEN_WIDTH = this.container_3D_all.clientWidth; // 500; //window.innerWidth;
        this.SCREEN_HEIGHT = this.container_3D_all.clientHeight; // 500; //window.innerHeight;

        this.ASPECT_NEW_RATIO = (this.SCREEN_WIDTH/this.SCREEN_HEIGHT) / this.ASPECT ;

        this.ASPECT = this.SCREEN_WIDTH/this.SCREEN_HEIGHT;


        this.renderer.setSize(this.SCREEN_WIDTH, this.SCREEN_HEIGHT);
        this.renderer.setPixelRatio(this.ASPECT);

        this.labelRenderer.setSize(this.SCREEN_WIDTH, this.SCREEN_HEIGHT);

        //        console.log(this.renderer.context.canvas.getContext("webgl").MAX_TEXTURE_SIZE);

        //console.log("TURBO RESIZE");

        //----------------------------------------------

        updateCameraGivenSceneLimits();

        // this.cameraOrbit.aspect = this.ASPECT;
        //
        // this.cameraOrbit.left = this.cameraOrbit.left * this.ASPECT_NEW_RATIO;
        // this.cameraOrbit.right = this.cameraOrbit.right * this.ASPECT_NEW_RATIO;
        //
        // this.cameraOrbit.updateProjectionMatrix();


        //----------------------------------------------------------------
         this.cameraAvatar.aspect = this.ASPECT;
         this.cameraAvatar.updateProjectionMatrix();


        this.cameraThirdPerson.aspect = this.ASPECT;
        this.cameraThirdPerson.updateProjectionMatrix();


         //---------------------------------------------------------------

        this.composer.renderer.setSize( envir.SCREEN_WIDTH, envir.SCREEN_HEIGHT );
        this.composer.renderer.setPixelRatio(this.ASPECT);
        this.effectFXAA.uniforms['resolution'].value.set(1 / this.SCREEN_WIDTH / this.ASPECT , 1 / this.SCREEN_HEIGHT / this.ASPECT);
    }

    makeFullScreen() {

        if (this.container_3D_all.style.width!=="100%") {
            this.container_3D_all.style.position = 'fixed';
            this.container_3D_all.style.width = '100%';
            this.container_3D_all.style.height = '100%';
            this.container_3D_all.style.overflow = 'hidden';
            this.container_3D_all.style.zIndex = '9999';
            this.container_3D_all.style.top = '0';
            this.container_3D_all.style.left = '0';
            this.container_3D_all.style.right = '0';
            this.container_3D_all.style.bottom = '0';

            jQuery("#fullScreenBtn").html('Exit Full Screen');

            jQuery("body#header").css("display", "none" );


            if (document.getElementById('wpadminbar')) {
                document.getElementById('wpadminbar').style.zIndex = 0;
            }

            if (document.getElementById('adminmenuback')) {
                document.getElementById('adminmenuback').style.zIndex = 0;
            }

            if (document.getElementById('adminmenuwrap')) {
                document.getElementById('adminmenuwrap').style.zIndex = 0;
            }

            if (document.getElementById('wpfooter')) {
                document.getElementById('wpfooter').style.display='none';
            }

            if (document.getElementById('postcustom')) {
                document.getElementById('postcustom').style.display='none';
            }

            if (document.getElementById('postdivrich')) {
                document.getElementById('postdivrich').style.display='none';
            }


        } else {

            this.container_3D_all.style.position = 'relative';
            this.container_3D_all.style.width = '99%';
            this.container_3D_all.style.height = '600px';
            //this.container_3D_all.style.overflow = 'auto';
            this.container_3D_all.style.height = envir.container_3D_all.clientWidth * 2 / 3 + 'px';
            this.container_3D_all.style.zIndex = '999';

            jQuery("#fullScreenBtn").html('Full Screen');

            jQuery("body#header").css("display", "block" );

            if (document.getElementById('wpadminbar')) {
                document.getElementById('wpadminbar').style.zIndex = 9999;
            }
            if (document.getElementById('adminmenuback')) {
                document.getElementById('adminmenuback').style.zIndex = 9999;
            }
            if (document.getElementById('adminmenuwrap')) {
                document.getElementById('adminmenuwrap').style.zIndex = 9999;
            }
            if (document.getElementById('wpfooter')) {
                document.getElementById('wpfooter').style.display = 'block';
            }
            if (document.getElementById('postcustom')) {
                document.getElementById('postcustom').style.display = 'block';
            }
            if (document.getElementById('postdivrich')) {
                document.getElementById('postdivrich').style.display = '';
            }
        }

        envir.turboResize();
    }


    // addCubeToControls(transform_controls){
    //
    //     // Change trs mode by click on the purple cube
    //     var cubeForModeChangeDetectGEO = new THREE.BoxGeometry( 0.2, 0.2, 0.2 );
    //     var cubeForModeChangeDetectMAT = new THREE.MeshBasicMaterial( { color: 0xff8c00 } );
    //
    //     var cubeForModeChangeDetec = new THREE.Mesh( cubeForModeChangeDetectGEO, cubeForModeChangeDetectMAT );
    //     cubeForModeChangeDetec.position.set( 1.1, 1.1, 0);
    //     cubeForModeChangeDetec.name = "trs_modeChanger";
    //     transform_controls.add( cubeForModeChangeDetec );
    // }


    /**
     Set the Orbit Camera
     */
    setOrbitCamera() {

        this.cameraOrbit =
            new THREE.OrthographicCamera( this.FRUSTUM_SIZE * this.ASPECT / - 2,
                                                          this.FRUSTUM_SIZE * this.ASPECT /   2,
                                                          this.FRUSTUM_SIZE /   2,
                                                          this.FRUSTUM_SIZE / - 2, -1400, this.FAR);

        //     new THREE.PerspectiveCamera(this.VIEW_ANGLE, this.ASPECT, this.NEAR, this.FAR);

        this.cameraOrbit.name = "orbitCamera";
        this.scene.add(this.cameraOrbit);

        this.cameraOrbit.position.set( 0, 50, 0);

        this.orbitControls = new THREE.OrbitControls( this.cameraOrbit, this.renderer.domElement );
        this.orbitControls.userPanSpeed = 1;
        //this.orbitControls.target.set( 0, 0, 0);
        this.orbitControls.object.zoom = 1;
        this.orbitControls.object.updateProjectionMatrix();
        this.orbitControls.name = "orbitControls";
        this.orbitControls.enableRotate = false;

        // Add a helper for debug purpose
        // this.cameraOrbitHelper = new THREE.CameraHelper( this.cameraOrbit );
        // this.scene.add( this.cameraOrbitHelper );
    }

    /**
     *  Set the Avatar camera
     *
     */
    setAvatarCamera() {

        this.cameraAvatar = new THREE.PerspectiveCamera(this.VIEW_ANGLE, this.ASPECT, 0.01, 4000);
        this.cameraAvatar.name = "avatarCamera";
        this.cameraAvatar.rotation.y = Math.PI;



        this.scene.add(this.cameraAvatar);

        this.avatarControls = new THREE.PointerLockControls( this.cameraAvatar, this.renderer.domElement );
        this.avatarControls.name = "avatarControls";

        this.initAvatarPosition = new THREE.Vector3( 0, 0, 0);

        var avatarControlsYawObject = this.avatarControls.getObject();

        avatarControlsYawObject.position.set(this.initAvatarPosition.x, this.initAvatarPosition.y, this.initAvatarPosition.z);

        this.scene.add(avatarControlsYawObject);


        this.cameraThirdPerson = new THREE.PerspectiveCamera(this.VIEW_ANGLE, this.ASPECT, 0.01, 3000);
        this.cameraThirdPerson.position.set(0, 4, 5);
        this.cameraThirdPerson.rotation.x = -0.2;
        this.cameraThirdPerson.name = "cameraThirdPerson";

        avatarControlsYawObject.add(this.cameraThirdPerson);


        //this.orbitControls.target =  avatarControlsYawObject.position; //new THREE.Vector3(0,0,0) ;//

        // Add a helper for this camera
        //  this.cameraAvatarHelper = new THREE.CameraHelper( this.cameraAvatar );
        //  this.cameraAvatarHelper.name = "cameraAvatarHelper";
        //  this.scene.add( this.cameraAvatarHelper );
    }


    setSteveToAvatarControls(){
        var Steve = envir.scene.getObjectByName("Steve");
        Steve.rotation.set(0, Math.PI/2, 0);
        this.avatarControls.getObject().add(Steve );
    }
    //STATHIS TEMP
    setSteveOldToAvatarControls(){
        //var SteveOld = envir.scene.getObjectByName("SteveOld");
        //SteveOld.rotation.set(0, Math.PI/2, 0);
        //this.avatarControls.getObject().add(SteveOld );
    }


    getSteveWorldPosition(){
        return envir.avatarControls.getObject().position;
    }

    getSteveFrustum(){
        return envir.avatarControls.getObject();
    }




    setSteveWorldPosition(x,y,z,rx,ry){
        envir.avatarControls.getObject().position.x = x;
        envir.avatarControls.getObject().position.y = y;
        envir.avatarControls.getObject().position.z = z;


        envir.avatarControls.getObject().children[0].rotation.x = rx;
        envir.avatarControls.getObject().rotation.y = ry;

    }

    //================= Static Environmentals ==============================

    /**
     Set the scene
     */
    setScene() {
        this.scene = new THREE.Scene();
        this.scene.name = "digiartScene";

        // // Add Grid
        this.gridHelper = new THREE.GridHelper(2000, 40);
        this.gridHelper.name = "myGridHelper";
        this.scene.add(this.gridHelper);
        this.gridHelper.visible = false;

        //
        // // Add Axes helper
        //  this.axisHelper = new THREE.AxisHelper( 1 );
        //  this.axisHelper.name = "myAxisHelper";
        //  this.scene.add(this.axisHelper);
    }


    /**
     Set the renderer
     */
    setRenderer() {

        this.renderer = new THREE.WebGLRenderer({antialias: true, alpha: false, logarithmicDepthBuffer: false});

        this.labelRenderer = new THREE.CSS2DRenderer();
        this.labelRenderer.domElement.style.position = 'absolute';
        this.labelRenderer.domElement.style.top = '0';
        this.labelRenderer.domElement.style.fontSize = "25pt";

        this.labelRenderer.domElement.style.textShadow = "-1px -1px #000, 1px -1px #000, -1px 1px  #000, 1px 1px #000";
        this.labelRenderer.domElement.style.pointerEvents = 'none';

        this.labelRenderer.setSize(this.SCREEN_WIDTH, this.SCREEN_HEIGHT);

        this.renderer.sortObjects = true;
        //this.renderer.setPixelRatio(this.ASPECT); //window.devicePixelRatio);
        this.renderer.setSize(this.SCREEN_WIDTH, this.SCREEN_HEIGHT);

        // This does  work well for outlining objects in white background
        this.renderer.setClearColor( 0xeeeeee, 1);

            // This don't
        //this.scene.background = new THREE.Color( 0xffffff );

        this.renderer.sortObjects = true;
        this.renderer.name = "myRenderer";
        this.container_3D_all.appendChild( this.renderer.domElement );

        this.container_3D_all.appendChild(this.labelRenderer.domElement);
    }

    setComposer(){
        this.composer = new THREE.EffectComposer( this.renderer );

        this.renderPass = new THREE.RenderPass( this.scene, this.cameraOrbit );
        this.composer.addPass( this.renderPass );

        this.outlinePass = new THREE.OutlinePass(
            new THREE.Vector2(this.SCREEN_WIDTH, this.SCREEN_HEIGHT), this.scene, this.cameraOrbit);

        this.outlinePass.visibleEdgeColor = new THREE.Color( 0x00aa00 );

        this.outlinePass.edgeGlow = 5;
        this.outlinePass.edgeStrength = 5;
        this.outlinePass.edgeThickness = 2;

        this.composer.addPass( this.outlinePass );

         this.effectFXAA = new THREE.ShaderPass(THREE.FXAAShader);
         this.effectFXAA.uniforms['resolution'].value.set(1 / this.SCREEN_WIDTH ,
                                                          1 / this.SCREEN_HEIGHT );
         this.effectFXAA.renderToScreen = true;
         this.composer.addPass( this.effectFXAA );
    }

    addInHierarchyViewer(obj){

        // ADD in the Hierarchy viewer
        var deleteButtonHTML =
            '<a href="javascript:void(0);" class="mdc-list-item" aria-label="Delete game"' +
            ' title="Delete game object" onclick="' +
            // Delete object from scene and remove it from the hierarchy viewer
            'deleterFomScene(\'' + obj.name + '\');'
            + '">' +
            '<i class="material-icons mdc-list-item__end-detail" aria-hidden="true" title="Delete">delete </i>'+
            '</a>';


        var game_object_nameA_assetName = obj.name.substring(0, obj.name.length - 11);
        var game_object_nameB_dateCreated = unixTimestamp_to_time(obj.name.substring(obj.name.length - 10, obj.name.length));

        // get its type also
        //var game_object_nameC_Type = obj.type;

        // Add as a list item
        jQuery('#hierarchy-viewer').append(
            '<li class="mdc-list-item" id="'+ obj.name  + '">' +
                '<a href="javascript:void(0);" class="mdc-list-item" style="font-size: 9pt; line-height:12pt" '+
                    'data-mdc-auto-init="MDCRipple" title="" onclick="onMouseDoubleClickFocus(event,\'' + obj.name + '\')">'+
                        '<span id="" class="mdc-list-item__text">' +
                            game_object_nameA_assetName + '<br />' +
                            '<span style="font-size:7pt; color:grey">' + game_object_nameB_dateCreated + '</span>' +
                        '</span>'+
                '</a>' +
                deleteButtonHTML +
            '</li>'
        );

    }

    setBackgroundColorHierarchyViewer(name){

        jQuery('#hierarchy-viewer li').each (
            function(idx, li) {
                jQuery(li)[0].style.background = 'rgb(244,244,244)';
            }
        );

        jQuery('#hierarchy-viewer').find('#' + name )[0].style.background = '#a4addf';

    }


    setHierarchyViewer(){

        jQuery('#hierarchy-viewer').empty();

        this.scene.traverse(function(obj) {
            if(obj.isDigiArt3DModel || obj.name === "avatarYawObject") {

                // Find also children
                // var s = '';
                // var obj2 = obj;
                // while (obj2 !== envir.scene) {
                //     s += '-';
                //     obj2 = obj2.parent;
                // }
                //console.log(); // + " " + obj.type + ' ' + obj.name


                // Make the html for the delete button Avatar should not be deleted
                var deleteButtonHTML =  '';

                if (obj.name != 'avatarYawObject'){
                    var deleteButtonHTML =
                        '<a href="javascript:void(0);" class="mdc-list-item" aria-label="Delete game"' +
                        ' title="Delete game object" onclick="' +
                        // Delete object from scene and remove it from the hierarchy viewer
                        'deleterFomScene(\'' + obj.name + '\');'
                        + '">' +
                        '<i class="material-icons mdc-list-item__end-detail" aria-hidden="true" title="Delete">delete </i>'+
                        '</a>';
                }

                // Split the object name into 2 parts: The first part is the asset name and the second the date inserted in the scene
                if (obj.name != 'avatarYawObject') {
                    var game_object_nameA_assetName = obj.name.substring(0, obj.name.length - 11);
                    var game_object_nameB_dateCreated = unixTimestamp_to_time(obj.name.substring(obj.name.length - 10, obj.name.length));

                    // get its type also
                    //var game_object_nameC_Type = obj.type;
                } else {
                    var game_object_nameA_assetName = "Player";
                    var game_object_nameB_dateCreated = "";
                }

                // Add as a list item
                jQuery('#hierarchy-viewer').append(
                    '<li class="mdc-list-item" id="'+ obj.name  + '">' +
                    '<a href="javascript:void(0);" class="mdc-list-item" style="font-size: 9pt; line-height:12pt" '+
                    'data-mdc-auto-init="MDCRipple" title="" onclick="onMouseDoubleClickFocus(event,\'' + obj.name + '\')">'+
                    '<span id="" class="mdc-list-item__text">' +
                    game_object_nameA_assetName + '<br />' +
                    '<span style="font-size:7pt; color:grey">' + game_object_nameB_dateCreated + '</span>' +
                    '</span>'+
                    '</a>' +
                    deleteButtonHTML +
                    '</li>');
            }
        });

    }

    /**
     Set the Light
     */
    setLight() {

        // this.lightSun = new THREE.DirectionalLight( 0xffffff, 1 );
        // this.lightSun.position.set( 500, 500, 100 );
        // this.lightSun.name = "mylightSun";
        // this.scene.add(this.lightSun);
        //
        // this.lightSun2 = new THREE.DirectionalLight( 0xffffff, 1 );
        // this.lightSun2.position.set( -500, 500, 100 );
        // this.lightSun2.name = "mylightSun2";
        // this.scene.add(this.lightSun2);
        //
        // this.lightOrbit = new THREE.DirectionalLight( 0xffffff, 0.2 );
        // this.lightOrbit.position.copy( this.cameraOrbit.position );
        // this.lightOrbit.name = "mylightOrbit";
        // this.scene.add(this.lightOrbit);
        // //this.scene.add( new THREE.DirectionalLightHelper( this.lightOrbit, 150 ));
        //
        // this.lightAvatar = new THREE.PointLight( 0xC0C090, 0.4, 1000, 0.01 ); //THREE.DirectionalLight( 0xffffff, 1 );
        // this.lightAvatar.name = "mylightAvatar";
        // this.lightAvatar.position.x =  this.cameraAvatar.position.x;
        // this.lightAvatar.position.y =  this.cameraAvatar.position.y;
        // this.lightAvatar.position.z =  this.cameraAvatar.position.z;
        // this.scene.add(this.lightAvatar);

        //this.scene.add( new THREE.PointLightHelper( this.lightAvatar, 1 ));
    }

    /**
     Set the stats
     */
    // setStats() {
    //     // // Rendering stats (FPS)
    //     this.stats = new Stats();
    //     this.stats.name = "myStats";
    //     this.stats.domElement.style.position = 'absolute';
    //     this.stats.domElement.style.bottom = '35px';
    //     this.stats.domElement.style.left = '10px';
    //     this.stats.domElement.style.zIndex = 100;
    //
    //     this.container_3D_all.appendChild( this.stats.domElement );
    // }


    setSky(){

        //// Add Sky Mesh
        //this.sky = new THREE.Sky();
        //this.scene.add( this.sky.mesh );
        //
        //var uniforms = this.sky.uniforms;
        //uniforms.turbidity.value = 10;
        //uniforms.reileigh.value = 2;
        //uniforms.luminance.value = 1;
        //uniforms.mieCoefficient.value = 0.005;
        //uniforms.mieDirectionalG.value = 0.8;
    }


    setSunSphere(){

        //// Add Sun Helper
        //this.sunSphere = new THREE.Mesh(
        //    new THREE.SphereBufferGeometry( 20000, 16, 8 ),
        //    new THREE.MeshBasicMaterial( { color: 0xffffff } )
        //);
        //
        //this.sunSphere.position.y = - 700000;
        //this.sunSphere.visible = false;
        //this.scene.add( this.sunSphere );
        //
        //var inclination = 0.49;
        //var azimuth = 0.25;
        //var sun = true;
        //var distance = 400000;
        //
        //var theta = Math.PI * ( inclination - 0.5 );
        //var phi = 2 * Math.PI * (azimuth - 0.5 );
        //
        //this.sunSphere.position.x = distance * Math.cos( phi );
        //this.sunSphere.position.y = distance * Math.sin( phi ) * Math.sin( theta );
        //this.sunSphere.position.z = distance * Math.sin( phi ) * Math.cos( theta );
        //
        //this.sunSphere.visible = sun;
        //
        //this.sky.uniforms.sunPosition.value.copy( this.sunSphere.position );

    }




    /*
     X, Y ,Z letters
     */
    // setAxisText(){
    //
    //     var loader = new THREE.FontLoader();
    //     loader.scene = this.scene;
    //
    //     loader.load('js_libs/threejs79/helvetiker_bold.typeface.json', function ( font ) {
    //
    //         for (let letterAx of ['X','Y','Z']) {
    //             var textGeo = new THREE.TextGeometry("100 m",{
    //                 font: font ,
    //                 size: 5,
    //                 //height: 50,
    //                 //curveSegments: 12,
    //                 //bevelThickness: 2,
    //                 //bevelSize: 5,
    //                 //bevelEnabled: true
    //             });
    //             var color = new THREE.Color();
    //             color.setRGB(255, 250, 250);
    //             var textMaterial = new THREE.MeshBasicMaterial({color: color});
    //             var text = new THREE.Mesh(textGeo, textMaterial);
    //             text.position.x = letterAx=='X'?100:0;
    //             text.position.y = letterAx=='Y'?100:0;
    //             text.position.z = letterAx=='Z'?100:0;
    //             text.scale.z = 0.01;
    //             text.name = "myAxisText" +  letterAx;
    //             loader.scene.add(text)
    //         }
    //     } );
    // }

}