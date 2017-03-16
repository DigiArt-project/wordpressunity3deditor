// Notice:
// JS: tx_container is js var for the phpform container of the tx value  = document.getElementById( 'form_translate_x' );
// All containers assignments are found in setupForm.php

// ------------------------ raycasting for picking objects --------------------------------


// Raycasting on mouse down for selecting object
var raycasterPick = new THREE.Raycaster();

/**
 * Detect mouse events
 *
 * @param event
 */
function onMouseDown( event ) {

    // calculate mouse position in normalized device coordinates
    // (-1 to +1) for both components

    /* Keep mouse clicks */
    var mouse = new THREE.Vector2();

    //console.log("EVA123", event.clientY, , $(window).scrollTop() );

    //mouse.x =   ( (event.clientX - envir.container_3D_all.offsetLeft) / envir.container_3D_all.clientWidth ) * 2 - 1;
    mouse.x =   ( (event.clientX - $('#vr_editor_main_div').offset().left + $(window).scrollLeft()) / envir.container_3D_all.clientWidth ) * 2 - 1;
    mouse.y = - ( (event.clientY - $('#vr_editor_main_div').offset().top + $(window).scrollTop()) / envir.container_3D_all.clientHeight ) * 2 + 1;

    // calculate objects intersecting the picking ray
    raycasterPick.setFromCamera( mouse, envir.cameraOrbit );


    var geolinecast = new THREE.Geometry();

    var c = -150;
    geolinecast.vertices.push(raycasterPick.ray.origin,
                                 new THREE.Vector3((raycasterPick.ray.origin.x -c*raycasterPick.ray.direction.x),
                                                   (raycasterPick.ray.origin.y -c*raycasterPick.ray.direction.y),
                                                   (raycasterPick.ray.origin.z -c*raycasterPick.ray.direction.z))
                             );

    var myBulletLine = new THREE.Line( geolinecast, new THREE.LineBasicMaterial({color: 0x0000ff}));
    myBulletLine.name = 'rayLine';

    envir.scene.add(myBulletLine);

    // This will force scene to update and show the line
    envir.scene.getObjectByName('orbitCamera').position.x += 0.001;
    setTimeout(function() { envir.scene.getObjectByName('orbitCamera').position.x -= 0.001; }, 500);

    // Remove the line
    setTimeout(function() { envir.scene.remove(envir.scene.getObjectByName('rayLine')); }, 500);


    var activMeshAndFloor = getActiveMeshes().concat(
        [envir.cameraOrbit.children[0], transform_controls.getObjectByName('trs_modeChanger')]);

    // add the recycle bin and the mode change cube
    var intersects = raycasterPick.intersectObjects( activMeshAndFloor , true );
            // recycle bin                       // mode changer purple cube

    var arrNameObj = [];

    // ------------ TRS sprite mode changer ---------
    if (intersects.length>0) {
        if (intersects[0].object.name == 'trs_modeChanger') {
            if (transform_controls.getMode() == 'rotate')
                transform_controls.setMode("scale");
            else if (transform_controls.getMode() == 'scale')
                transform_controls.setMode("translate");
            else if (transform_controls.getMode() == 'translate')
                transform_controls.setMode("rotate");

            return;
        }
    }

    // --------- Enlist deleted items ----------
    if (intersects.length>0)
        if(intersects[0].object.name == 'recycleBin') {
            if (!isRecycleBinDeployed)
                enlistDeletedObjects();
            else
                delistDeletedObjects();
            return;
        }


    //--------- Click item from recycle Bin ? --------------------------------
    if (intersects.length>0)
        if (intersects[0].object.parent.isInRecycleBin == true) {

            intersects[0].object.parent.isInRecycleBin = false;

            nameToRestore = intersects[0].object.parent.name;

            var trs = delArchive[nameToRestore]["trs"];

            addOne(nameToRestore, delArchive[nameToRestore]["path"],
                delArchive[nameToRestore]["obj"], delArchive[nameToRestore]["objID"],
                delArchive[nameToRestore]["mtl"], delArchive[nameToRestore]["mtlID"],
                delArchive[nameToRestore]["categoryName"], delArchive[nameToRestore]["categoryID"],
                delArchive[nameToRestore]["diffImage"], delArchive[nameToRestore]["diffImageID"],
                delArchive[nameToRestore]["image1id"],
                trs["translation"][0], trs["translation"][1], trs["translation"][2],
                trs["rotation"][0], trs["rotation"][1], trs["rotation"][2],
                trs["scale"]);

            // Make trs box visible
            transform_controls.traverse(function(node){if(node.name=='trs_modeChanger') node.visible=true});

            return;
        }




    //-------------------- Select object in scene by raycasting ----------------------------------------------------
    for ( var i = 0; i < intersects.length; i++ ) {

        // selected_object_name = intersects[i].object.name;
        // arrNameObj[selected_object_name] = intersects[i].object;

        //---------------- Steve -------------------------------
        //if (intersects[i].object.parent.name == 'Steve')
        //    return;

        //for group
        if (intersects[i].object.parent instanceof THREE.Group) {
           selected_object_name = intersects[i].object.parent.name;
           arrNameObj[selected_object_name] = intersects[i].object.parent;
           // for object3D
        } else {
           // selected_object_name = intersects[i].object.parent.parent.name;
           // arrNameObj[selected_object_name] = intersects[i].object.parent.parent;
        }
    }


    // If only one object is intersected
    if (Object.keys(arrNameObj).length == 1) {
        var nameL = Object.keys(arrNameObj)[0];

        console.log("nameL Simple------------->", nameL);

        transform_controls.attach(arrNameObj[nameL]);

        // If more than 2 objects are intersected
    } else if (Object.keys(arrNameObj).length > 1){
        var popupSelect = document.getElementById("popupSelect");

        // Clear options
        for (var i=document.getElementById("popupSelect").options.length; i-->0;)
            document.getElementById("popupSelect").options[i] = null;

        // Auto open Selection
        popupSelect.dispatchEvent(new MouseEvent('click', {
            'view': window,
            'bubbles': true,
            'cancelable': true
        }));


        // Add options

        // Prompt "Select"
        var option = document.createElement("option");
        option.text = "Select";
        option.value = "Select";
        option.style.background = "#555";
        popupSelect.add(option);

        // Add options for each intersected object
        for (var nameL in  arrNameObj ) {
            var option = document.createElement("option");
            option.text = nameL;
            option.value = nameL;
            option.style.background = "#5f8";
            popupSelect.add(option);
        }

        // Prompt "Cancel"
        var option = document.createElement("option");
        option.text = "Cancel";
        option.value = "Cancel";
        option.style.background = "#f59";
        popupSelect.add(option);

        // Show Selection
        $("#popUpDiv").show();
        var ppDiv = document.getElementById("popUpDiv");

        ppDiv.style.left = event.clientX - $('#vr_editor_main_div').offset().left + $(window).scrollLeft() + 'px';
        ppDiv.style.top = event.clientY - $('#vr_editor_main_div').offset().top + $(window).scrollTop() + 'px';

        // On popup change
        $("#popupSelect").change(function(e) {
            var nameL = $("#popupSelect").val();

            if (nameL != "Cancel" || nameL != "Select") {
                transform_controls.attach(arrNameObj[nameL]);
                console.log("nameL", nameL);

                $("#popUpDiv").hide();
            }
        });
    }
}// onMouseDown


/**
 *
 * Dat-gui controls variables initialize
 *
 * @type {gui_controls_funs}
 */
var gui_controls_funs = new function(){

    this.bt_translate = function(){ transform_controls.setMode( "translate" ); };
    this.bt_rotate = function(){ transform_controls.setMode( "rotate" ); };
    this.bt_scale = function(){ transform_controls.setMode( "scale" ); };

    this.bt_axes_setbigger = function(){ transform_controls.setSize( transform_controls.size + 0.1 );}
    this.bt_axes_setsmaller = function(){ transform_controls.setSize( Math.max(transform_controls.size - 0.1, 0.1 )  );}

    this.dg_tx = 0;
    this.dg_ty = 0;
    this.dg_tz = 0;
    this.dg_rx = 0;
    this.dg_ry = 0;
    this.dg_rz = 0;
    this.dg_scale = 0;

    this.bt_doublesided = false ;
};



// GUI controls
var gui = new dat.GUI( {autoPlace: false} );

var cbt_translate = gui.add( gui_controls_funs, 'bt_translate').name('Translate (T)');
var cbt_rotate = gui.add( gui_controls_funs, 'bt_rotate').name('Rotate (R)');
var cbt_scale = gui.add( gui_controls_funs, 'bt_scale').name('Scale (E)');
var dg_controller_tx = gui.add( gui_controls_funs, 'dg_tx', -1000, 1000, 1).name('Translate x');//.listen();
var dg_controller_ty = gui.add( gui_controls_funs, 'dg_ty', -1000, 1000, 0.1).name('Translate y');//.listen();
var dg_controller_tz = gui.add( gui_controls_funs, 'dg_tz', -1000, 1000, 0.1).name('Translate z');//.listen();
var dg_controller_rx = gui.add( gui_controls_funs, 'dg_rx', -179, 180, 0.001).name('Rotate x');//.listen();
var dg_controller_ry = gui.add( gui_controls_funs, 'dg_ry', -179, 180, 0.001).name('Rotate y');//.listen();
var dg_controller_rz = gui.add( gui_controls_funs, 'dg_rz', -179, 180,0.001).name('Rotate z');//.listen();
var dg_controller_sc = gui.add( gui_controls_funs, 'dg_scale', 0.001, 1000, 0.001).name('Scale');//.listen();
var cbt_axes_setbigger = gui.add( gui_controls_funs, 'bt_axes_setbigger').name('Increase axes (+)');
var cbt_axes_setsmaller = gui.add( gui_controls_funs, 'bt_axes_setsmaller').name('Decrease axes (-)');
var cbt_doublesided = gui.add( gui_controls_funs, 'bt_doublesided').name('Double sided');

//gui.close();


/**
 *  Update php, javascript and transform_controls when dat.gui changes
 */
function controllerDatGuiOnChange(){

    // When gui values changes then stop animating else won't be able to type with keyboard
    dg_controller_tx.onChange(function(value) { 
        
        // Stop animating 
        cancelAnimationFrame( id_animation_frame );
        
        // update object position
        transform_controls.object.position.x = gui_controls_funs.dg_tx;

        // start animating again
        animate();
        }
    );

    dg_controller_ty.onChange(function(value) { 
        cancelAnimationFrame( id_animation_frame );
        transform_controls.object.position.y = gui_controls_funs.dg_ty;
        animate();
        }
    );

    dg_controller_tz.onChange(function(value) { 
        cancelAnimationFrame( id_animation_frame );
        transform_controls.object.position.z = gui_controls_funs.dg_tz;
        animate();
        }
    );

    dg_controller_rx.onChange(function(value) { 
        cancelAnimationFrame( id_animation_frame );
        transform_controls.object.rotation.x = gui_controls_funs.dg_rx/180*Math.PI;
        animate();
        }
    );

    dg_controller_ry.onChange(function(value) { 
        cancelAnimationFrame( id_animation_frame );
        transform_controls.object.rotation.y = gui_controls_funs.dg_ry / 180*Math.PI;
        animate();
        }
    );

    dg_controller_rz.onChange(function(value) { 
        cancelAnimationFrame( id_animation_frame );
        transform_controls.object.rotation.z = gui_controls_funs.dg_rz / 180*Math.PI;
        animate();
        }
    );


    dg_controller_sc.onChange(function(value) {
        cancelAnimationFrame( id_animation_frame );
        transform_controls.object.scale.set(gui_controls_funs.dg_scale, gui_controls_funs.dg_scale, gui_controls_funs.dg_scale);
        animate();
        }
    );

    cbt_doublesided.onChange(function(value){
        var sel_obj = envir.scene.getObjectByName(selected_object_name);
        sel_obj.traverse(function (node) {

                if (node.material)
                    if (node.material.side == THREE.DoubleSide)
                        node.material.side = THREE.SingleSide;
                    else
                        node.material.side = THREE.DoubleSide;

        });
    });

    // Make slider-text controllers more interactive
    setKeyPressController(dg_controller_tx);
    setKeyPressController(dg_controller_ty);
    setKeyPressController(dg_controller_tz);
    setKeyPressController(dg_controller_rx);
    setKeyPressController(dg_controller_ry);
    setKeyPressController(dg_controller_rz);
    setKeyPressController(dg_controller_sc);
}

/**
 * This function allows the dat gui text element of the slider to be clickable and interactive
 *
 * @param element
 */
function setKeyPressController(element){

    var div = element.domElement.children;

    div[0].children[0].onclick = function(event){
        cancelAnimationFrame( id_animation_frame );
    };

    // div[0].children[0].onkeyup= function(event){
    //                             if(event.keyCode == 13){ // 13 is "Enter" button
    //                                 //requestAnimationFrame(animate);
    //                             } else{ // other buttons
    //                                 //requestAnimationFrame(animate);
    //                                 //cancelAnimationFrame( id_animation_frame );
    //                             }
    //                       };
}

/**
 *  When you change trs from axes controls then automatically the dat.gui and the php form are updated
 */
function updatePositionsPhpAndJavsFromControlsAxes(){

    //--------- translate_x ---------------
    if (transform_controls.object.position.x!= gui_controls_funs.dg_tx){
        gui_controls_funs.dg_tx = transform_controls.object.position.x;
    }

    //--------- translate_y ---------------
    if (transform_controls.object.position.y!= gui_controls_funs.dg_ty){
        gui_controls_funs.dg_ty = transform_controls.object.position.y;
    }

    //--------- translate_z ---------------
    if (transform_controls.object.position.z!= gui_controls_funs.dg_tz){
        gui_controls_funs.dg_tz = transform_controls.object.position.z;
    }

    //--------- rotate_x ----------------------
    if (transform_controls.object.rotation._x*180/Math.PI != gui_controls_funs.dg_rx){
        gui_controls_funs.dg_rx = transform_controls.object.rotation._x * 180/Math.PI;
    }

    //---------rotate_y -------------------------------
    if (transform_controls.object.rotation._y*180/Math.PI != this.dg_ry){
        gui_controls_funs.dg_ry = transform_controls.object.rotation._y * 180/Math.PI;
    }

    //---------rotate_z -------------------------------
    if (transform_controls.object.rotation._z*180/Math.PI != gui_controls_funs.dg_rz){
        gui_controls_funs.dg_rz = transform_controls.object.rotation._z * 180/Math.PI;
    }

    //---------scale by TransformTools-------------------------------
    var val = 0;
    if (transform_controls.object.scale.x != gui_controls_funs.dg_scale){
        var val = transform_controls.object.scale.x;
    } else if (transform_controls.object.scale.y != gui_controls_funs.dg_scale){
        var val = transform_controls.object.scale.y
    } else if (transform_controls.object.scale.z != gui_controls_funs.dg_scale){
        var val = transform_controls.object.scale.z
    }

    if (val > 0){
        gui_controls_funs.dg_scale = val;
        //sc_container.value = val;
        transform_controls.object.scale.set( val, val, val);
    }
    //--------- end of scale ------------------------
}

/**
 * Get active meshes for raycast picking method
 *
 * @returns {Array}
 */
function getActiveMeshes(){

    var activeMeshes = [];

    // ToDo: Is it possible to avoid traversing scene object in each drag event?
    envir.scene.traverse( function(child) {
        if (child.hasOwnProperty('isDigiArt3DMesh'))
            activeMeshes.push(child);
    });

    return activeMeshes;
}
