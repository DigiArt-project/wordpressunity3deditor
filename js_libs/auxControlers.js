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
function onMouseDownSelect( event ) {



    var i;

    // calculate mouse position in normalized device coordinates
    // (-1 to +1) for both components

    /* Keep mouse clicks */
    var mouse = new THREE.Vector2();

    //console.log("EVA123", event.clientY, , jQuery(window).scrollTop() );

    //mouse.x =   ( (event.clientX - envir.container_3D_all.offsetLeft) / envir.container_3D_all.clientWidth ) * 2 - 1;
    mouse.x =   ( (event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft()) / envir.container_3D_all.clientWidth ) * 2 - 1;
    mouse.y = - ( (event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop()) / envir.container_3D_all.clientHeight ) * 2 + 1;

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

    // This should be a global variable because it is referenced inside pops
    arrNameObjInter = [];

    // ------------ TRS sprite mode changer ---------
    if (intersects.length > 0) {

        if (intersects[0].object.name === 'trs_modeChanger') {

            if (transform_controls.getMode() === 'rotate')
                transform_controls.setMode("scale");

            else if (transform_controls.getMode() === 'scale')
                transform_controls.setMode("translate");

            else if (transform_controls.getMode() === 'translate')
                transform_controls.setMode("rotate");

            jQuery('input:radio[name=object-manipulation-switch]').val([transform_controls.getMode()]);
            showObjectPropertiesPanel(transform_controls.getMode());

            return;
        }
    }

    // --------- Enlist deleted items ----------
    if (intersects.length>0)
        if(intersects[0].object.name === 'recycleBin') {
            if (!isRecycleBinDeployed)
                enlistDeletedObjects();
            else
                delistDeletedObjects();
            return;
        }


    //--------- Click item from recycle Bin ? --------------------------------
    if (intersects.length>0) {

        if (intersects[0].object.parent.isInRecycleBin == true) {

            intersects[0].object.parent.isInRecycleBin = false;

            var nameToRestore = intersects[0].object.parent.name;

            var trs = delArchive[nameToRestore]["trs"];

            addAssetToCanvas(nameToRestore, delArchive[nameToRestore]["path"],
                delArchive[nameToRestore]["obj"], delArchive[nameToRestore]["objID"],
                delArchive[nameToRestore]["mtl"], delArchive[nameToRestore]["mtlID"],
                delArchive[nameToRestore]["categoryName"], delArchive[nameToRestore]["categoryID"],
                delArchive[nameToRestore]["diffImage"], delArchive[nameToRestore]["diffImageID"],
                delArchive[nameToRestore]["image1id"],
                delArchive[nameToRestore]["doorName_source"],
                delArchive[nameToRestore]["doorName_target"],
                delArchive[nameToRestore]["sceneName_target"],
                trs["translation"][0], trs["translation"][1], trs["translation"][2],
                trs["rotation"][0], trs["rotation"][1], trs["rotation"][2],
                trs["scale"]);

            // Make trs box visible
            transform_controls.traverse(function(node){if(node.name=='trs_modeChanger') node.visible=true});

            return;
        }
    }

    //-------------------- Select object in scene by raycasting ----------------------------------------------------
    for ( i = 0; i < intersects.length; i++ ) {

        // selected_object_name = intersects[i].object.name;
        // arrNameObjInter[selected_object_name] = intersects[i].object;

        //---------------- Steve -------------------------------
        //if (intersects[i].object.parent.name == 'Steve')
        //    return;

        // for group
        if (intersects[i].object.parent instanceof THREE.Group) {
            selected_object_name = intersects[i].object.parent.name;
            arrNameObjInter[selected_object_name] = intersects[i].object.parent;
            // for object3D

        } else {
            // selected_object_name = intersects[i].object.parent.parent.name;
            // arrNameObjInter[selected_object_name] = intersects[i].object.parent.parent;
        }
    }


    var nameL;

    // If only one object is intersected
    if (Object.keys(arrNameObjInter).length == 1) {
        nameL = Object.keys(arrNameObjInter)[0];
        transform_controls.attach(arrNameObjInter[nameL]);

        // highlight
        envir.outlinePass.selectedObjects = [arrNameObjInter[nameL].children[0]];
        envir.renderer.setClearColor( 0xffffff, 0.9 );




        if(event.button === 1 && arrNameObjInter[nameL].categoryName === 'Door') // Middle button show also properties
            displayDoorProperties(event, nameL);


        if(event.button === 1 && (arrNameObjInter[nameL].categoryName === 'Microscope' ||
                                  arrNameObjInter[nameL].categoryName === 'Textbook')) // Middle button show also properties
            displayMicroscopeTextbookProperties(event, nameL);







        // If more than 2 objects are intersected
    } else if (Object.keys(arrNameObjInter).length > 1) {
        var popupSelect = document.getElementById("popupSelect");

        // Clear options
        for (i = document.getElementById("popupSelect").options.length; i-->0;)
            document.getElementById("popupSelect").options[i] = null;

        // Auto open Selection
        popupSelect.dispatchEvent(new MouseEvent('click', {
            'view': window,
            'bubbles': true,
            'cancelable': true
        }));


        // Add options
        var option;

        // Prompt "Select"
        option = document.createElement("option");
        option.text = "Select";
        option.value = "Select";
        popupSelect.add(option);

        // Add options for each intersected object
        for (nameL in  arrNameObjInter ) {
            option = document.createElement("option");
            option.text = nameL;
            option.value = nameL;
            option.style.background = "#5f8";
            popupSelect.add(option);
        }

        // Prompt "Cancel"
        option = document.createElement("option");
        option.text = "Cancel";
        option.value = "Cancel";
        option.style.background = "#f59";
        popupSelect.add(option);

        // Show Selection
        jQuery("#popUpDiv").show();
        var ppDiv = document.getElementById("popUpDiv");

        ppDiv.style.left = event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft() + 'px';
        ppDiv.style.top = event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop() + 'px';

        // On popup change
        jQuery("#popupSelect").change(function(e) {
            var nameL = jQuery("#popupSelect").val();

            if (nameL != "Cancel" && nameL != "Select") {
                transform_controls.attach(arrNameObjInter[nameL]);

                // highlight
                envir.outlinePass.selectedObjects = [ arrNameObjInter[nameL].children[0] ];
                envir.renderer.setClearColor( 0xffffff, 0.9 );

                // Name of door should be added
                if (event.button == 1 && arrNameObjInter[nameL].categoryName == 'Door')
                    displayDoorProperties(event, nameL);

            }
            jQuery("#popUpDiv").hide();
        });
    }
}// onMouseDown




function displayMicroscopeTextbookProperties(event, nameMicroscopeTextbookSource) {

    clearAndUnbindMicroscopeTextbookProperties();

    var ppDiv = document.getElementById("chemistrySceneSelectPopupDiv");
    var ppSelect = document.getElementById("chemistrySceneSelectComponent");


    // Show Selection
    jQuery("#chemistrySceneSelectPopupDiv").show();

    ppDiv.style.left = event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft() + 'px';
    ppDiv.style.top = event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop() + 'px';

    // Add options
    var option;

    // Prompt "Select"
    option = document.createElement("option");
    option.text = "Select a scene";
    option.value = "Select a scene";
    option.selected = true;
    option.disabled = true;
    ppSelect.add(option);


    // Add doors from other scenes
    var OtherExamMicroScenesNames = ['First ExamMicro Scene'];


    // Add options for each intersected object
    for (var sceneName of OtherExamMicroScenesNames ) {
        option = document.createElement("option");
        option.text = sceneName;
        option.value = sceneName;
        option.style.background = "#fff";
        ppSelect.add(option);
    }

    // - Prompt "Cancel" -
    option = document.createElement("option");
    option.text = "Cancel";
    option.value = "Cancel";
    option.style.background = "#b7afaa";
    ppSelect.add(option);
    // -------------------



    // On popup change
    jQuery("#chemistrySceneSelectComponent").change(function(e) {

        // Get the value
        var valTargetScene = jQuery("#chemistrySceneSelectComponent").val();

        if (!valTargetScene)
            return;

        if (valTargetScene && valTargetScene != "Cancel" && valTargetScene != "Select") {

            envir.scene.getObjectByName(nameMicroscopeTextbookSource).sceneName_target = valTargetScene.trim();
        }
        jQuery("#chemistrySceneSelectPopupDiv").hide();

        clearAndUnbindMicroscopeTextbookProperties();
    });

}

/**
 * Selecting a DoorTarget for the DoorSource
 *
 * @param event
 * @param nameDoorSource
 */
function displayDoorProperties(event, nameDoorSource){

    // Save the previous door values (in case of  direct mouse click on another door)
    jQuery("#doorid").trigger("change");
    jQuery("#popupDoorSelect").trigger("change");

    clearAndUnbindDoorProperties();

    // Add options
    var option;

    // // Prompt "Select"
    option = document.createElement("option");
    option.text = "Select a scene";
    option.value = "Select a scene";
    option.selected = true;
    option.disabled = true;
    popupDoorSelect.add(option);

    // Add doors from other scenes
    var doorsFromOtherScenes = [];

    for (var l=0; l<doorsAll.length; l++){
        doorsFromOtherScenes.push ( doorsAll[l].door + " at " + doorsAll[l].scene );
    }

    // Add options for each intersected object
    for (var doorName of doorsFromOtherScenes ) {
        option = document.createElement("option");
        option.text = doorName;
        option.value = doorName;
        option.style.background = "#fff";
        popupDoorSelect.add(option);
    }

    // Prompt "Cancel"
    option = document.createElement("option");
    option.text = "Cancel";
    option.value = "Cancel";
    option.style.background = "#b7afaa";
    popupDoorSelect.add(option);


    // Set doorid from existing values
    if (envir.scene.getObjectByName(nameDoorSource).doorName_source)
        jQuery("#doorid").val( envir.scene.getObjectByName(nameDoorSource).doorName_source );

    if(envir.scene.getObjectByName(nameDoorSource).doorName_target)
        jQuery("#popupDoorSelect").val ( envir.scene.getObjectByName(nameDoorSource).doorName_target + " at " +
                                     envir.scene.getObjectByName(nameDoorSource).sceneName_target );

    // Show Selection
    jQuery("#popUpObjectPropertiesDiv").show();
    var ppPropertiesDiv = document.getElementById("popUpObjectPropertiesDiv");

    ppPropertiesDiv.style.left = event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft() + 'px';
    ppPropertiesDiv.style.top = event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop() + 'px';

    mdc.textfield.MDCTextfield.attachTo(document.getElementById('doorInputTextfield'));

    jQuery("#doorid").change(function(e) {
        var nameDoorSource_simple = jQuery("#doorid").val();

        // nameDoorSource is the scene object generated automatically e.g.    "mydoora_1231214515"
        // doorName_source is more simplified given by the user  e.g.  "doorToCave"
        envir.scene.getObjectByName(nameDoorSource).doorName_source = nameDoorSource_simple;
    });

    // On popup change
    jQuery("#popupDoorSelect").change(function(e) {
        var valDoorScene = jQuery("#popupDoorSelect").val();

        if (!valDoorScene)
            return;

        if (valDoorScene && valDoorScene != "Cancel" && valDoorScene != "Select") {

            var nameDoor_Target = valDoorScene.split("at")[0];
            var sceneName_Target = valDoorScene.split("at")[1];

            envir.scene.getObjectByName(nameDoorSource).doorName_target = nameDoor_Target.trim();
            envir.scene.getObjectByName(nameDoorSource).sceneName_target = sceneName_Target.trim();
        }
        jQuery("#popUpObjectPropertiesDiv").hide();
        clearAndUnbindDoorProperties();
    });
}

/**
 * Clear Door properties
 */
function clearAndUnbindDoorProperties() {
    // Clear past options

    // door target
    var popupDoorSelect = document.getElementById("popupDoorSelect");
    for (var i = popupDoorSelect.options.length; i-->0;)
        popupDoorSelect.options[i] = null;

    // door source title & remove listeners
    jQuery("#doorid").val( null ).unbind('change');

    jQuery("#popupDoorSelect").unbind('change');
}


function clearAndUnbindMicroscopeTextbookProperties(){


    var ppSelect = document.getElementById("chemistrySceneSelectComponent");

    for (var i = ppSelect.options.length; i-->0;)
        ppSelect.options[i] = null;


}


function clearAndUnbindBoxProperties(){



}


/**
 *
 * Dat-gui controls variables initialize
 *
 * @type {gui_controls_funs}
 */
var gui_controls_funs = new function() {

    /*  this.bt_translate = function(){ transform_controls.setMode( "translate" ); };
     this.bt_rotate = function(){ transform_controls.setMode( "rotate" ); };
     this.bt_scale = function(){ transform_controls.setMode( "scale" ); };*/

    /*this.bt_axes_setbigger = function(){ transform_controls.setSize( transform_controls.size + 0.1 );};
     this.bt_axes_setsmaller = function(){ transform_controls.setSize( Math.max(transform_controls.size - 0.1, 0.1 )  );};*/

    this.dg_tx = 0;
    this.dg_ty = 0;
    this.dg_tz = 0;
    this.dg_rx = 0;
    this.dg_ry = 0;
    this.dg_rz = 0;
    this.dg_scale = 0;
};



// GUI controls
/*var gui = new dat.GUI( {autoPlace: false} );*/

var controlInterface = [];
controlInterface.translate = new dat.GUI( { autoPlace: false });
controlInterface.translate.domElement.id = 'translatePanelGui';

controlInterface.rotate = new dat.GUI( { autoPlace: false });
controlInterface.rotate.domElement.id = 'rotatePanelGui';

controlInterface.scale = new dat.GUI( { autoPlace: false });
controlInterface.scale.domElement.id = 'scalePanelGui';


/*var cbt_translate = gui.add( gui_controls_funs, 'bt_translate').name('Translate (T)');
 var cbt_rotate = gui.add( gui_controls_funs, 'bt_rotate').name('Rotate (R)');
 var cbt_scale = gui.add( gui_controls_funs, 'bt_scale').name('Scale (E)');*/

var dg_controller_tx = controlInterface.translate.add( gui_controls_funs, 'dg_tx').step(0.001).name('Move x');//.listen();
var dg_controller_ty = controlInterface.translate.add( gui_controls_funs, 'dg_ty').step(0.001).name('Move y');//.listen();
var dg_controller_tz = controlInterface.translate.add( gui_controls_funs, 'dg_tz').step(0.001).name('Move z');//.listen();

var dg_controller_rx = controlInterface.rotate.add( gui_controls_funs, 'dg_rx', -179, 180, 0.001).name('Rotate x');//.listen();
var dg_controller_ry = controlInterface.rotate.add( gui_controls_funs, 'dg_ry', -179, 180, 0.001).name('Rotate y');//.listen();
var dg_controller_rz = controlInterface.rotate.add( gui_controls_funs, 'dg_rz', -179, 180, 0.001).name('Rotate z');//.listen();

var dg_controller_sc = controlInterface.scale.add( gui_controls_funs, 'dg_scale').min(0.001).max(1000).step(0.001).name('Scale');//.listen();
/*var cbt_axes_setbigger = gui.add( gui_controls_funs, 'bt_axes_setbigger').name('Increase axes (+)');
 var cbt_axes_setsmaller = gui.add( gui_controls_funs, 'bt_axes_setsmaller').name('Decrease axes (-)');*/
/*var cbt_doublesided = gui.add( gui_controls_funs, 'bt_doublesided').name('Double sided');*/

/*cbt_doublesided.onChange(function(value) {
 var sel_obj = envir.scene.getObjectByName(selected_object_name);
 sel_obj.traverse(function (node) {

 if (node.material)
 if (node.material.side == THREE.DoubleSide)
 node.material.side = THREE.SingleSide;
 else
 node.material.side = THREE.DoubleSide;

 });
 });*/

//gui.close();


/**
 *  Update php, javascript and transform_controls when dat.gui changes
 */
function controllerDatGuiOnChange() {

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

    // Make slider-text controllers more interactive
    setKeyPressControllerUnconstrained(dg_controller_tx);
    setKeyPressControllerUnconstrained(dg_controller_ty);
    setKeyPressControllerUnconstrained(dg_controller_tz);
    setKeyPressControllerConstrained(dg_controller_rx);
    setKeyPressControllerConstrained(dg_controller_ry);
    setKeyPressControllerConstrained(dg_controller_rz);
    setKeyPressControllerConstrained(dg_controller_sc);
}

/**
 * This function allows the dat gui text element of the slider to be clickable and interactive
 *  This is for translation which is not constrained (no slider) with limits
 * @param element
 */
function setKeyPressControllerUnconstrained(element){

    var div = element.domElement.children;

    div[0].onclick = function(event){
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
* This function allows the dat gui text element of the slider to be clickable and interactive
* @param element
*/
function setKeyPressControllerConstrained(element) {

    var div = element.domElement.children;

    div[0].children[0].onclick = function (event) {
        cancelAnimationFrame(id_animation_frame);
    };
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
        val = transform_controls.object.scale.x;
    } else if (transform_controls.object.scale.y != gui_controls_funs.dg_scale){
        val = transform_controls.object.scale.y
    } else if (transform_controls.object.scale.z != gui_controls_funs.dg_scale){
        val = transform_controls.object.scale.z
    }

    //console.log("val", val);

    if (val > 0) {
        gui_controls_funs.dg_scale = val;
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
