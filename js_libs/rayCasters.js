// ------------------------ raycasting for picking objects --------------------------------

// Main Raycast object
var raycasterPick = new THREE.Raycaster();

// Show or not the ray line
var showRayPickLine = false; // Do not show raycast line


// function onContextMenu(event ){
//     console.log(event);
//     event.preventDefault();
// }

/**
 * Detect mouse events
 *
 * @param event
 */
function onMouseDownSelect( event ) {

    event.preventDefault();
    event.stopPropagation();

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



    // If only one object is intersected
    if(intersects.length === 1){
        selectorMajor(event, intersects[0]);
        return;
    }



    // More than one objects intersected
    var prevSelected = transform_controls.object.name;
    var selectNext = false;

    var i = 0;

    for (i = 0; i<intersects.length; i++) {
        console.log(intersects[i].object.parent.name,intersects.length);
        selectNext = prevSelected === intersects[i].object.parent.name;
        if(selectNext)
            break;
    }

    if (!selectNext || i===intersects.length-1)
        i = -1;



    selectorMajor(event, intersects[i+1]);

}// onMouseDown



function selectorMajor(event, inters){

    transform_controls.attach(inters.object.parent);

    findDimensions(transform_controls.object);

    // highlight
    envir.outlinePass.selectedObjects = [ inters.object.parent.children[0] ];
    envir.renderer.setClearColor( 0xffffff, 0.9 );

    //  Check for Door, MicroscopeTextbook, Box when right click
    if (event.button === 2) {
        activeOverides(event, inters);
    }


}

// Middle click raycast operations
function activeOverides(event, inters){

    var objectParent  = inters.object.parent;
    var name = objectParent.name;

    if( objectParent.categoryName === 'Artifact')
        displayArtifactProperties(event, name);

    if( objectParent.categoryName === 'Points of Interest (Image-Text)')
        displayPoiImageTextProperties(event, name);

    if( objectParent.categoryName === 'Points of Interest (Video)')
        displayPoiVideoProperties(event, name);

    if( objectParent.categoryName === 'Door')
        displayDoorProperties(event, name);

    if( objectParent.categoryName === 'Marker')
        displayMarkerProperties(event, name);

    if( objectParent.categoryName === 'Microscope' || objectParent.categoryName === 'Textbook')
        displayMicroscopeTextbookProperties(event, name);

    if( objectParent.categoryName === 'Box' ) // for chemistry box
        displayBoxProperties(event, name);
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
 *  Artifact properties
 *
 * @param event
 * @param name
 */
function displayArtifactProperties(event, name){

    // The whole popup div
    var ppPropertiesDiv = jQuery("#popUpArtifactPropertiesDiv");

    // The checkbox only
    var chbox = jQuery("#artifact_reward_checkbox");

    // Save the previous artifact properties values (in case of  direct mouse click on another item)
    chbox.trigger("change");

    clearAndUnbindCheckBoxProperties("artifact_reward_checkbox");

    chbox.prop('checked', envir.scene.getObjectByName(name).isreward == 1);

    // Show Selection
    ppPropertiesDiv.show();
    ppPropertiesDiv[0].style.left = event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft() + 'px';
    ppPropertiesDiv[0].style.top  = event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop() + 'px';

    // Add change listener
    chbox.change(function(e) { envir.scene.getObjectByName(name).isreward = this.checked ? 1 : 0; });
}


/**
 * Poi image text properties
 *
 * @param event
 * @param name
 */
function displayPoiImageTextProperties(event, name){

    // The whole popup div
    var ppPropertiesDiv = jQuery("#popUpPoiImageTextPropertiesDiv");

    // The checkbox only
    var chbox = jQuery("#poi_image_text_reward_checkbox");

    // Save the previous artifact properties values (in case of  direct mouse click on another item)
    chbox.trigger("change");

    clearAndUnbindCheckBoxProperties("poi_image_text_reward_checkbox");

    chbox.prop('checked', envir.scene.getObjectByName(name).isreward == 1);

    // Show Selection
    ppPropertiesDiv.show();
    ppPropertiesDiv[0].style.left = event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft() + 'px';
    ppPropertiesDiv[0].style.top  = event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop() + 'px';

    // Add change listener
    chbox.change(function(e) { envir.scene.getObjectByName(name).isreward = this.checked ? 1 : 0; });
}

/**
 * Poi video properties
 *
 * @param event
 * @param name
 */
function displayPoiVideoProperties(event, name){

    // The whole popup div
    var ppPropertiesDiv = jQuery("#popUpPoiVideoPropertiesDiv");

    // The checkbox only
    var chbox = jQuery("#poi_video_reward_checkbox");

    // Save the previous artifact properties values (in case of  direct mouse click on another item)
    chbox.trigger("change");

    clearAndUnbindCheckBoxProperties("poi_video_reward_checkbox");

    chbox.prop('checked', envir.scene.getObjectByName(name).isreward == 1);

    // Show Selection
    ppPropertiesDiv.show();
    ppPropertiesDiv[0].style.left = event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft() + 'px';
    ppPropertiesDiv[0].style.top  = event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop() + 'px';

    // Add change listener
    chbox.change(function(e) { envir.scene.getObjectByName(name).isreward = this.checked ? 1 : 0; });

}



// Clear past options
function clearAndUnbindCheckBoxProperties( chkboxname ) {
    var chbox = jQuery("#" + chkboxname);
    chbox.prop('checked',false);
    chbox.unbind('change');     // Remove listeners
}




/**
 * Selecting a DoorTarget for the DoorSource
 *
 * @param event
 * @param name
 */
function displayDoorProperties(event, name){

    var popUpDoorPropertiesDiv = jQuery("#popUpDoorPropertiesDiv");
    var doorid = jQuery("#doorid");
    var popupDoorSelect = jQuery("#popupDoorSelect");
    var chbox = jQuery("#door_reward_checkbox");

    // Save the previous door values (in case of  direct mouse click on another door)
    doorid.trigger("change");
    popupDoorSelect.trigger("change");
    chbox.trigger("change");


    clearAndUnbindCheckBoxProperties("door_reward_checkbox");

    chbox.prop('checked', envir.scene.getObjectByName(name).isreward == 1);
    // Add change listener
    chbox.change(function(e) { envir.scene.getObjectByName(name).isreward = this.checked ? 1 : 0;});


    clearAndUnbindDoorProperties();

    // Add doors from other scenes
    var doorsFromOtherScenes = [];

    for (var l=0; l < doorsAll.length; l++)
        if (envir.scene.getObjectByName(name).doorName_source !== doorsAll[l].door)
            doorsFromOtherScenes.push ( doorsAll[l].door + " at " + doorsAll[l].scene + " (" + doorsAll[l].sceneSlug + ")" );

    // Add options for each intersected object
    createOption(popupDoorSelect[0], "Select a door", "Select a door", true, true, "#fff");
    for (var doorName of doorsFromOtherScenes )
        createOption(popupDoorSelect[0], doorName, doorName, false, false, "#fff");


    // Set doorid from existing values
    if (envir.scene.getObjectByName(name).doorName_source)
        doorid.val( envir.scene.getObjectByName(name).doorName_source );

    if(envir.scene.getObjectByName(name).doorName_target)
        popupDoorSelect.val ( envir.scene.getObjectByName(name).doorName_target + " at " +
            envir.scene.getObjectByName(name).sceneName_target );

    // Show Selection
    popUpDoorPropertiesDiv.show();
    popUpDoorPropertiesDiv[0].style.left = event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft() + 'px';
    popUpDoorPropertiesDiv[0].style.top = event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop() + 'px';

    mdc.textfield.MDCTextfield.attachTo(document.getElementById('doorInputTextfield'));

    doorid.change(function(e) {
        var nameDoorSource_simple = jQuery("#doorid").val();

        // name is the scene object generated automatically e.g.    "mydoora_1231214515"
        // doorName_source is more simplified given by the user  e.g.  "doorToCave"
        envir.scene.getObjectByName(name).doorName_source = nameDoorSource_simple;
    });

    // On popup change
    popupDoorSelect.change(function(e) {
        var valDoorScene = popupDoorSelect.val();

        if (!valDoorScene)
            return;

        if (valDoorScene && valDoorScene != "Select a door") {

            var nameDoor_Target = valDoorScene.split("at")[0];
            var sceneName_Target = valDoorScene.split("at")[1];

            envir.scene.getObjectByName(name).doorName_target = nameDoor_Target.trim();
            envir.scene.getObjectByName(name).sceneName_target = sceneName_Target.trim();
        }
    });
}

function displayMarkerProperties(event, name){

    var popUpDoorPropertiesDiv = jQuery("#popUpMarkerPropertiesDiv");
    var doorid = jQuery("#markerid");
    var popupDoorSelect = jQuery("#popupMarkerSelect");
    var chbox = jQuery("#marker_reward_checkbox");

    // Save the previous door values (in case of  direct mouse click on another door)
    doorid.trigger("change");
    popupDoorSelect.trigger("change");
    chbox.trigger("change");


    clearAndUnbindCheckBoxProperties("marker_reward_checkbox");

    chbox.prop('checked', envir.scene.getObjectByName(name).isreward == 1);
    // Add change listener
    chbox.change(function(e) { envir.scene.getObjectByName(name).isreward = this.checked ? 1 : 0;});


    clearAndUnbindMarkerProperties();

    // Add doors from other scenes
    var doorsFromOtherScenes = [];

    for (var l=0; l < doorsAll.length; l++)
        if (envir.scene.getObjectByName(name).doorName_source !== doorsAll[l].door)
            doorsFromOtherScenes.push ( doorsAll[l].door + " at " + doorsAll[l].scene + " (" + doorsAll[l].sceneSlug + ")" );

    // Add options for each intersected object
    createOption(popupDoorSelect[0], "Select a door", "Select a door", true, true, "#fff");
    for (var doorName of doorsFromOtherScenes )
    createOption(popupDoorSelect[0], doorName, doorName, false, false, "#fff");


    // Set doorid from existing values
    if (envir.scene.getObjectByName(name).doorName_source)
        doorid.val( envir.scene.getObjectByName(name).doorName_source );

    if(envir.scene.getObjectByName(name).doorName_target)
        popupDoorSelect.val ( envir.scene.getObjectByName(name).doorName_target + " at " +
            envir.scene.getObjectByName(name).sceneName_target );

    // Show Selection
    popUpDoorPropertiesDiv.show();
    popUpDoorPropertiesDiv[0].style.left = event.clientX - jQuery('#vr_editor_main_div').offset().left + jQuery(window).scrollLeft() + 'px';
    popUpDoorPropertiesDiv[0].style.top = event.clientY - jQuery('#vr_editor_main_div').offset().top + jQuery(window).scrollTop() + 'px';

    mdc.textfield.MDCTextfield.attachTo(document.getElementById('doorInputTextfield'));

    doorid.change(function(e) {
        var nameDoorSource_simple = jQuery("#doorid").val();

        // name is the scene object generated automatically e.g.    "mydoora_1231214515"
        // doorName_source is more simplified given by the user  e.g.  "doorToCave"
        envir.scene.getObjectByName(name).doorName_source = nameDoorSource_simple;
    });

    // On popup change
    popupDoorSelect.change(function(e) {
        var valDoorScene = popupDoorSelect.val();

        if (!valDoorScene)
            return;

        if (valDoorScene && valDoorScene != "Select a door") {

            var nameDoor_Target = valDoorScene.split("at")[0];
            var sceneName_Target = valDoorScene.split("at")[1];

            envir.scene.getObjectByName(name).doorName_target = nameDoor_Target.trim();
            envir.scene.getObjectByName(name).sceneName_target = sceneName_Target.trim();
        }
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

function clearAndUnbindMarkerProperties() {
    // Clear past options

    // door target
    var popupMarkerSelect = document.getElementById("popupMarkerSelect");
    for (var i = popupMarkerSelect.options.length; i-->0;)
        popupMarkerSelect.options[i] = null;

    // door source title & remove listeners
    jQuery("#markerid").val( null ).unbind('change');

    jQuery("#popupMarkerSelect").unbind('change');
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


// Create options for the door destination select dom element
function createOption(container, txt, val, sel, dis, backgr){
    var option = document.createElement("option");
    option.text = txt;
    option.value = val;
    option.selected = sel;
    option.disabled = dis;
    option.style.background = backgr;
    option.style.fontSize = "9pt";
    container.add(option);
}