// ------------------------ raycasting for picking objects --------------------------------

// Main Raycast object
var raycasterPick = new THREE.Raycaster();

// Show or not the ray line
var showRayPickLine = false; // Do not show raycast line

// Names of objects intersected
var arrNameObjInter = [];

/**
 * Detect mouse events
 *
 * @param event
 */
function onMouseDownSelect( event ) {

    // if (event.button==2)
    //     return;





    /* Keep mouse clicks */
    var mouse = new THREE.Vector2();

    // calculate mouse position in normalized device coordinates
    // (-1 to +1) for both components
    mouse.x =   ( (event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft()) / envir.container_3D_all.clientWidth ) * 2 - 1;
    mouse.y = - ( (event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop()) / envir.container_3D_all.clientHeight ) * 2 + 1;

    // calculate objects intersecting the picking ray
    raycasterPick.setFromCamera( mouse, envir.cameraOrbit );

    // Show the myBulletLine (raycast)
    if (showRayPickLine)
        raylineVisualize();

    var activMeshAndFloor = getActiveMeshes().concat(
        [  transform_controls.getObjectByName('trs_modeChanger')]); //envir.avatarControls, //envir.scene.getObjectByName("Steve"),

    // Find the intersections (it can be more than one)
    var intersects = raycasterPick.intersectObjects( activMeshAndFloor , true );

    // Names of objects intersected
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

    // ------ Select object in scene by raycasting -----------
    for ( var i = 0; i < intersects.length; i++ ) {
        // for group
        if (intersects[i].object.parent instanceof THREE.Group) {
            selected_object_name = intersects[i].object.parent.name;
            arrNameObjInter[selected_object_name] = intersects[i].object.parent;
            // for object3D
        }
    }


    var nameL;

    // If only one object is intersected
    if (Object.keys(arrNameObjInter).length == 1) {
        nameL = Object.keys(arrNameObjInter)[0];
        transform_controls.attach(arrNameObjInter[nameL]);

        findDimensions(transform_controls.object);

        // highlight
        envir.outlinePass.selectedObjects = [arrNameObjInter[nameL].children[0]];
        envir.renderer.setClearColor( 0xffffff, 0.9 );

        //  Check for Door, MicroscopeTextbook, Box
        activeOverides(event, arrNameObjInter, nameL );


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

                findDimensions(transform_controls.object);

                // highlight
                envir.outlinePass.selectedObjects = [ arrNameObjInter[nameL].children[0] ];
                envir.renderer.setClearColor( 0xffffff, 0.9 );

                //  Check for Door, MicroscopeTextbook, Box
                activeOverides(event, arrNameObjInter, nameL );
            }
            jQuery("#popUpDiv").hide();
        });
    }
}// onMouseDown


// Middle click raycast operations
function activeOverides(event, arrNameObjInter, nameL ){

    if(event.button === 1 && arrNameObjInter[nameL].categoryName === 'Door') // Middle button show also properties
        displayDoorProperties(event, nameL);

    if(event.button === 1 && (arrNameObjInter[nameL].categoryName === 'Microscope' ||
            arrNameObjInter[nameL].categoryName === 'Textbook')) // Middle button show also properties
        displayMicroscopeTextbookProperties(event, nameL);

    if(event.button === 1 && (arrNameObjInter[nameL].categoryName === 'Box') ) // Middle button show also properties
        displayBoxProperties(event, nameL);
}


/**
 *  Box label set
 */
function displayBoxProperties(event, nameBoxSource){

    // Save the previous Box values (in case of  direct mouse click on another Box)
    jQuery("#chemistryBoxComponent").trigger("change");


    clearAndUnbindBoxProperties();

    var ppDiv = document.getElementById("chemistryBoxPopupDiv");
    var ppSelect = document.getElementById("chemistryBoxComponent");

    // Show Selection
    jQuery("#chemistryBoxPopupDiv").show();

    ppDiv.style.left = event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft() + 'px';
    ppDiv.style.top = event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop() + 'px';

    // Add options
    var option;

    // Prompt "Select"
    option = document.createElement("option");
    option.text = "Select a functional group";
    option.value = "Select a functional group";
    option.selected = true;
    option.disabled = true;
    ppSelect.add(option);

    // Add available Functional Groups from database
    var availFunctionalGroups = ['Various', 'Alcohol', 'Ketone'];


    // Add options for each intersected object
    for (var fgroup of availFunctionalGroups ) {
        option = document.createElement("option");
        option.text = fgroup;
        option.value = fgroup;
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

    // Set from saved value
    // if(envir.scene.getObjectByName(nameDoorSource).doorName_target)
    //     jQuery("#popupDoorSelect").val ( envir.scene.getObjectByName(nameDoorSource).doorName_target + " at " +
    //         envir.scene.getObjectByName(nameDoorSource).sceneName_target );

    // mdc.textfield.MDCTextfield.attachTo(document.getElementById('doorInputTextfield'));

    // On popup change
    jQuery("#chemistryBoxComponent").change(function(e) {

        // Get the value
        var valfgroup = jQuery("#chemistryBoxComponent").val();

        if (!valfgroup)
            return;

        if (valfgroup && valfgroup != "Cancel" && valfgroup != "Select") {

            envir.scene.getObjectByName(nameBoxSource).chemical_functional_group = valfgroup.trim();
        }
        jQuery("#chemistryBoxPopupDiv").hide();

        clearAndUnbindBoxProperties();
    });




}


/**
 *  Microscope and Textbook
 *
 * @param event
 * @param nameMicroscopeTextbookSource
 */
function displayMicroscopeTextbookProperties(event, nameMicroscopeTextbookSource) {


    // Save the previous MicroscopeTextbook values (in case of  direct mouse click on another microscope or textbook)
    jQuery("#chemistrySceneSelectComponent").trigger("change");

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

    // Set from saved value
    // if(envir.scene.getObjectByName(nameDoorSource).doorName_target)
    //     jQuery("#popupDoorSelect").val ( envir.scene.getObjectByName(nameDoorSource).doorName_target + " at " +
    //         envir.scene.getObjectByName(nameDoorSource).sceneName_target );

    // mdc.textfield.MDCTextfield.attachTo(document.getElementById('doorInputTextfield'));



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
    option.text = "Select a door";
    option.value = "Select a door";
    option.selected = true;
    option.disabled = true;
    popupDoorSelect.add(option);

    // Add doors from other scenes
    var doorsFromOtherScenes = [];



    for (var l=0; l < doorsAll.length; l++){

        console.log(l, envir.scene.getObjectByName(nameDoorSource).doorName_source , doorsAll[l].door);

        if (envir.scene.getObjectByName(nameDoorSource).doorName_source !== doorsAll[l].door)
            doorsFromOtherScenes.push ( doorsAll[l].door + " at " + doorsAll[l].scene + " (" + doorsAll[l].sceneSlug + ")" );
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

    jQuery("#chemistrySceneSelectComponent").unbind('change');
}


function clearAndUnbindBoxProperties(){

    var ppSelect = document.getElementById("chemistryBoxComponent");

    for (var i = ppSelect.options.length; i-->0;)
        ppSelect.options[i] = null;


    jQuery("#chemistryBoxComponent").unbind('change');
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


function raylineVisualize(){

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

    setTimeout(function () {
        envir.scene.getObjectByName('orbitCamera').position.x -= 0.001;
    }, 500);

    // Remove the line
    setTimeout(function () {
        envir.scene.remove(envir.scene.getObjectByName('rayLine'));
    }, 500);

}