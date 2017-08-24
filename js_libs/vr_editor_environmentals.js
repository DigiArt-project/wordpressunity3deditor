"use strict";
class vr_editor_environmentals {

    constructor(container_3D_all){

        this.ctx = this;

        this.container_3D_all = container_3D_all;

        this.SCREEN_WIDTH = this.container_3D_all.clientWidth; // 500; //window.innerWidth;
        this.SCREEN_HEIGHT = this.container_3D_all.clientHeight; // 500; //window.innerHeight;
        this.VIEW_ANGLE = 45;

        this.ASPECT = this.SCREEN_WIDTH / this.SCREEN_HEIGHT;
        this.NEAR = 0.1;
        this.FAR = 20000;
        this.scene;

        this.renderer;
        this.stats;
        this.light;
        //this.floor;
        this.sky;
        this.sunSphere;


        this.browse_controls;
        this.initAvatarPosition;
        this.cameraOrbit;
        this.cameraAvatar;
        this.cameraOrbitHelper;
        this.cameraAvatarHelper;

        this.outlinePass;
        this.composer;
        this.renderPass;
        this.effectFXAA;



        this.setScene();
        this.setRenderer();
        this.setOrbitCamera();
        this.setAvatarCamera();

        this.setRecycleBin();
        //this.setAxisText();
        //this.setArtificialFloor();
        this.setLight();
        this.setStats();
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
        this.ASPECT = this.SCREEN_WIDTH/this.SCREEN_HEIGHT;

        this.renderer.setSize(this.SCREEN_WIDTH, this.SCREEN_HEIGHT);
        this.renderer.setPixelRatio(this.ASPECT);

        this.cameraOrbit.aspect = this.ASPECT;
        this.cameraOrbit.updateProjectionMatrix();

         this.cameraAvatar.aspect = this.ASPECT;
         this.cameraAvatar.updateProjectionMatrix();

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
            this.container_3D_all.style.overflow = 'auto';
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


    addCubeToControls(transform_controls){

        // Change trs mode by click on the purple cube
        var cubeForModeChangeDetectGEO = new THREE.BoxGeometry( 0.2, 0.2, 0.2 );
        var cubeForModeChangeDetectMAT = new THREE.MeshBasicMaterial( { color: 0xff00ff } );

        var cubeForModeChangeDetec = new THREE.Mesh( cubeForModeChangeDetectGEO, cubeForModeChangeDetectMAT );
        cubeForModeChangeDetec.position.set( 1.4, 1.4, 0);
        cubeForModeChangeDetec.name = "trs_modeChanger";
        transform_controls.add( cubeForModeChangeDetec );
    }


    /**
     Set the Orbit Camera
     */
    setOrbitCamera() {
        this.cameraOrbit = new THREE.PerspectiveCamera(this.VIEW_ANGLE, this.ASPECT, this.NEAR, this.FAR);
        this.cameraOrbit.name = "orbitCamera";
        this.scene.add(this.cameraOrbit);

        this.cameraOrbit.position.set( 50, 50, 50);

        this.orbitControls = new THREE.OrbitControls( this.cameraOrbit, this.renderer.domElement );
        this.orbitControls.userPanSpeed = 1;
        this.orbitControls.target.set( 0, 0, 0);
        this.orbitControls.name = "orbitControls";

        // Add a helper for debug purpose
        //this.cameraOrbitHelper = new THREE.CameraHelper( this.cameraOrbit );
        //this.scene.add( this.cameraOrbitHelper );
    }




    /**
     *  Set the Avatar camera
     *
     */
    setAvatarCamera() {
        this.cameraAvatar = new THREE.PerspectiveCamera(this.VIEW_ANGLE, this.ASPECT, 1.2, 3000);
        this.cameraAvatar.name = "avatarCamera";
        this.cameraAvatar.rotation.y = Math.PI;

        this.scene.add(this.cameraAvatar);

        this.avatarControls = new THREE.PointerLockControls( this.cameraAvatar, this.renderer.domElement );
        this.avatarControls.name = "avatarControls";

        this.initAvatarPosition = new THREE.Vector3( 0, 0, 0);

        var avatarControlsYawObject = this.avatarControls.getObject();

        avatarControlsYawObject.position.set(this.initAvatarPosition.x, this.initAvatarPosition.y, this.initAvatarPosition.z);

        this.scene.add(avatarControlsYawObject);

        this.orbitControls.target = avatarControlsYawObject.position;

        // Add a helper for this camera
        this.cameraAvatarHelper = new THREE.CameraHelper( this.cameraAvatar );
        this.scene.add( this.cameraAvatarHelper );
    }


    setSteveToAvatarControls(){

        var Steve = envir.scene.getObjectByName("Steve");
        Steve.rotation.set(0, Math.PI/2, 0);

        this.avatarControls.getObject().add(Steve );
    }

    getSteveWorldPosition(){
        return envir.avatarControls.getObject().position;
    }


    setSteveWorldPosition(x,y,z,ry){
        envir.avatarControls.getObject().position.x = x;
        envir.avatarControls.getObject().position.y = y;
        envir.avatarControls.getObject().position.z = z;
        envir.avatarControls.getObject().rotation.y = ry;
    }

    //================= Static Environmentals ==============================

    /**
     Set the scene
     */
    setScene() {

        this.scene = new THREE.Scene();
        this.scene.name = "digiartScene";

        // Add Grid
        this.gridHelper = new THREE.GridHelper(2000, 40);
        this.gridHelper.name = "myGridHelper";
        this.scene.add(this.gridHelper);

        // Add Axes helper
        this.axisHelper = new THREE.AxisHelper( 100 );
        this.axisHelper.name = "myAxisHelper";
        this.scene.add(this.axisHelper);

    }


    setRecycleBin(){

        var ctx = this.ctx;
        var loader = new THREE.TextureLoader();
        loader.load(PLUGIN_PATH_VR + "/images/recycle.png", function ( texture ) {
            texture.wrapS = THREE.RepeatWrapping;
            texture.wrapT = THREE.RepeatWrapping;
            texture.repeat.set( 1, 1 );
            texture.offset = new THREE.Vector2( 0.45, 0 );
            //texture.generateMipmaps = true;

            var radiusTop = 1.3,
                radiusBottom=1.1,
                height=3.5,
                radiusSegments=64,
                heightSegments=16,
                openEnded=true;

            var geometry = new THREE.CylinderGeometry(radiusTop, radiusBottom, height, radiusSegments, heightSegments, openEnded);

            var material    = new THREE.MeshPhongMaterial({transparent:true, opacity:0.6, color: 0xaea6ca, map:texture, side:THREE.DoubleSide});
            var recycleBin = new THREE.Mesh( geometry, material );

            recycleBin.position.set( -0.3, -0.3, -1 );
            recycleBin.scale.set( 0.03, 0.03, 0.03 );

            // recycleBin.position.set( -0.08, -0.08, -0.25 );
            // recycleBin.scale.set( 0.005, 0.005, 0.005 );
            recycleBin.name = "recycleBin";




            // var light = new THREE.DirectionalLight(0xffffff);
            // light.position.set(10, 5, 20);
            // recycleBin.add(light);

            //ctx.scene.add( new THREE.DirectionalLightHelper(light, 5));


            ctx.cameraOrbit.add( recycleBin );
        });

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


    /**
     Set the renderer
     */
    setRenderer() {

        this.renderer = new THREE.WebGLRenderer({antialias: true, alpha: false});

        //console.log("1 window.devicePixelRatio", window.devicePixelRatio);

        //this.renderer.setPixelRatio(this.ASPECT); //window.devicePixelRatio);
        this.renderer.setSize(this.SCREEN_WIDTH, this.SCREEN_HEIGHT);
        this.renderer.setClearColor( 0xffffff, 0.9 );

        this.renderer.sortObjects = false;
        this.renderer.name = "myRenderer";
        this.container_3D_all.appendChild( this.renderer.domElement );
    }

    setComposer(){
        this.composer = new THREE.EffectComposer( this.renderer );

        this.renderPass = new THREE.RenderPass( this.scene, this.cameraOrbit );
        this.composer.addPass( this.renderPass );

        this.outlinePass = new THREE.OutlinePass(
            new THREE.Vector2(this.SCREEN_WIDTH, this.SCREEN_HEIGHT), this.scene, this.cameraOrbit);

        this.outlinePass.visibleEdgeColor = new THREE.Color( 0xffff00 );

        this.outlinePass.edgeGlow = 1;
        this.outlinePass.edgeStrength = 2;
        this.outlinePass.edgeThickness = 2;

        this.composer.addPass( this.outlinePass );

         this.effectFXAA = new THREE.ShaderPass(THREE.FXAAShader);
         this.effectFXAA.uniforms['resolution'].value.set(1 / this.SCREEN_WIDTH ,
                                                          1 / this.SCREEN_HEIGHT );
         this.effectFXAA.renderToScreen = true;
         this.composer.addPass( this.effectFXAA );
    }


    /**
     Set the Light
     */
    setLight() {

        this.lightOrbit = new THREE.DirectionalLight( 0xffffff, 1.5 ); //THREE.DirectionalLight( 0xffffff, 1 );
        this.lightOrbit.position.copy( this.cameraOrbit.position ); //.set( 500, 500, 500 );
        this.lightOrbit.name = "mylightOrbit";
        this.scene.add(this.lightOrbit);

        this.lightAvatar = new THREE.PointLight( 0xffffff, 1, 1000, 0.5 ); //THREE.DirectionalLight( 0xffffff, 1 );

        this.lightAvatar.name = "mylightAvatar";

        this.lightAvatar.position.x =  this.cameraAvatar.position.x;
        this.lightAvatar.position.y =  this.cameraAvatar.position.y;
        this.lightAvatar.position.z =  this.cameraAvatar.position.z;


        this.scene.add(this.lightAvatar);


        //this.scene.add( new THREE.PointLightHelper( this.lightAvatar, 0.2 ));


    }

    /**
     Set the stats
     */
    setStats() {
        // Rendering statis (FPS)
        this.stats = new Stats();
        this.stats.name = "myStats";
        this.stats.domElement.style.position = 'absolute';
        this.stats.domElement.style.bottom = '35px';
        this.stats.domElement.style.left = '10px';
        this.stats.domElement.style.zIndex = 100;

        this.container_3D_all.appendChild( this.stats.domElement );
    }


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


    setTerrain(){
        var data = this.generateHeight( 1024, 1024 );
        var texture = new THREE.CanvasTexture( this.generateTexture( data, 1024, 1024 ) );
        var material = new THREE.MeshBasicMaterial( { map: texture, overdraw: 0.5 } );
        var quality = 16, step = 1024 / quality;
        var geometry = new THREE.PlaneGeometry( 2000, 2000, quality - 1, quality - 1 );
        geometry.rotateX( - Math.PI / 2 );
        for ( var i = 0, l = geometry.vertices.length; i < l; i ++ ) {
            var x = i % quality, y = Math.floor( i / quality );
            geometry.vertices[ i ].y = data[ ( x * step ) + ( y * step ) * 1024 ] * 2 - 128;
        }
        var mesh = new THREE.Mesh( geometry, material );
        mesh.name = "myTerrain";
        this.scene.add( mesh );


    }

    generateHeight( width, height ) {
        var data = new Uint8Array( width * height ), perlin = new ImprovedNoise(),
            size = width * height, quality = 2, z = Math.random() * 100;
        for ( var j = 0; j < 4; j ++ ) {
            quality *= 4;
            for ( var i = 0; i < size; i ++ ) {
                var x = i % width, y = ~~ ( i / width );
                data[ i ] += Math.abs( perlin.noise( x / quality, y / quality, z ) * 0.5 ) * quality + 10;
            }
        }
        return data;
    }

    generateTexture( data, width, height ) {
        var canvas, context, image, imageData, level, diff, vector3, sun, shade;
        vector3 = new THREE.Vector3( 0, 0, 0 );
        sun = new THREE.Vector3( 1, 1, 1 );
        sun.normalize();
        canvas = document.createElement( 'canvas' );
        canvas.width = width;
        canvas.height = height;
        context = canvas.getContext( '2d' );
        context.fillStyle = '#000';
        context.fillRect( 0, 0, width, height );
        image = context.getImageData( 0, 0, width, height );
        imageData = image.data;
        for ( var i = 0, j = 0, l = imageData.length; i < l; i += 4, j ++  ) {
            vector3.x = data[ j - 1 ] - data[ j + 1 ];
            vector3.y = 2;
            vector3.z = data[ j - width ] - data[ j + width ];
            vector3.normalize();
            shade = vector3.dot( sun );
            imageData[ i ] = ( 96 + shade * 128 ) * ( data[ j ] * 0.007 );
            imageData[ i + 1 ] = ( 32 + shade * 96 ) * ( data[ j ] * 0.007 );
            imageData[ i + 2 ] = ( shade * 96 ) * ( data[ j ] * 0.007 );
        }
        context.putImageData( image, 0, 0 );
        return canvas;
    }


    // /**
    //  Set the floor (debug only)
    //  */
    // setArtificialFloor() {
    //
    //     var floorSize = 32;
    //
    //     // Floor
    //     var fpath_texture = "images/DigiArt_512sq.png";
    //
    //     var ctx = this.ctx;
    //     var loader = new THREE.TextureLoader();
    //     loader.load( fpath_texture, function ( floorTexture ) {
    //
    //         //var geometry = new THREE.SphereGeometry( 200, 20, 20 );
    //         //
    //         //var material = new THREE.MeshBasicMaterial( { map: texture, overdraw: 0.5 } );
    //         //var mesh = new THREE.Mesh( geometry, material );
    //         //group.add( mesh );
    //
    //
    //         floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping;
    //         floorTexture.repeat.set(floorSize, floorSize);
    //         var floorMaterial = new THREE.MeshBasicMaterial({
    //             map: floorTexture,
    //             visible:false,
    //             side: THREE.DoubleSide,
    //             transparent: true,
    //             opacity: 0.01
    //
    //         });
    //         var floorbufferGeometry = new THREE.PlaneBufferGeometry(floorSize * 512, floorSize * 512, 4, 4);
    //
    //         ctx.floor = new THREE.Mesh(floorbufferGeometry, floorMaterial);
    //         ctx.floor.name = 'myfloor';
    //         ctx.floor.position.y = 0;
    //         ctx.floor.rotation.x = -Math.PI / 2;
    //
    //         ctx.scene.add(ctx.floor);
    //     } );
    //
    // }
}