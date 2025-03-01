// Local and Global scope functions

// Local
function loadButtonActions() {

    // Compile Project button
    jQuery("#compileGameBtn").click(function () {
        compileDialog.show();

        // Pause Rendering
        isPaused = true;
        jQuery("#pauseRendering").get(0).childNodes[1].innerText = "play_arrow";
    });

    // Cogwheel options button
    jQuery("#optionsPopupBtn").click(function () {
        (new mdc.dialog.MDCDialog(document.querySelector('#options-dialog'))).show();
    });

    // Select platform for compile
    var platformSelect = MDCSelect.attachTo(document.getElementById('platform-select'));

    document.getElementById('platform-select').addEventListener('MDCSelect:change',
        function () {
            jQuery("#platformInput").attr("value", platformSelect.selectedOptions[0].getAttribute("id"));
            jQuery("#compileProceedBtn").removeClass("LinkDisabled");
        }
    );


    // Compile Proceed
    jQuery("#compileProceedBtn").click(function () {

        jQuery("#platform-select").addClass("mdc-select--disabled").attr("aria-disabled", "true");
        jQuery("#compileProgressSlider").show();
        jQuery("#compileProgressTitle").show();

        jQuery("#compileProceedBtn").addClass("LinkDisabled");
        jQuery("#compileCancelBtn").addClass("LinkDisabled");

        jQuery("#wpunity-ziplink").hide();
        jQuery("#wpunity-weblink").hide();

        jQuery("#compilationProgressText").html("");

        jQuery('#unityTaskMemValue').html("0");

        wpunity_assepileAjax();
    });

    // Compile Cancel
    jQuery("#compileCancelBtn").click(function (e) {

        //Start Rendering
        isPaused = false;
        jQuery("#pauseRendering").get(0).childNodes[1].innerText = "pause";
        animate();

        // Get Pid of compile process
        var pid = jQuery("#compileCancelBtn").attr("data-unity-pid");

        console.log(pid);

        if (pid) {
            wpunity_killtask_compile(pid);
        }
    });

    // Compile Backdrop
    jQuery(".mdc-dialog__backdrop").click(function (e) {
        jQuery("#compileCancelBtn").click();
    });

    // Hierarchy close button
    jQuery("#hierarchy-toggle-btn").click(function () {

        if (jQuery("#hierarchy-toggle-btn").hasClass("HierarchyToggleOn")) {
            jQuery("#hierarchy-toggle-btn").addClass("HierarchyToggleOff").removeClass("HierarchyToggleOn");
        } else {
            jQuery("#hierarchy-toggle-btn").addClass("HierarchyToggleOn").removeClass("HierarchyToggleOff");
        }

        jQuery("#right-elements-panel").toggle("slow");
    });

    // File Browser Toolbar close button
    jQuery("#bt_close_file_toolbar").click(function () {
        if (jQuery("#bt_close_file_toolbar").hasClass("AssetsToggleOn")) {
            jQuery("#bt_close_file_toolbar").addClass("AssetsToggleOff").removeClass("AssetsToggleOn");
        } else {
            jQuery("#bt_close_file_toolbar").addClass("AssetsToggleOn").removeClass("AssetsToggleOff");
        }
        jQuery("#assetBrowserToolbar").toggle("slow");
        jQuery("#filemanager").toggle("slow");
    });

    // Scenes List Toolbar close button
    jQuery("#scenesList-toggle-btn").click(function () {
        if (jQuery("#scenesList-toggle-btn").hasClass("scenesListToggleOn")) {
            jQuery("#scenesList-toggle-btn").addClass("scenesListToggleOff").removeClass("scenesListToggleOn");
        } else {
            jQuery("#scenesList-toggle-btn").addClass("scenesListToggleOn").removeClass("scenesListToggleOff");
        }
        jQuery("#scenesInsideVREditor").toggle("slow");
    });


    // Save experiment id: Convert scene to json and put the json in the wordpress field wpunity_scene_json_input
    jQuery('#save-expid-button').click(function () {
        wpunity_saveExpIDAjax();
    });


    // Take SCREENSHOT OF SCENE
    jQuery("#takeScreenshotBtn").click(function () {
        takeScreenshot();
        is_scene_icon_manually_selected = false;
    });

    // Select image as Scene icon
    jQuery("#wpunity_scene_sshot_manual_select").change(function () {
        readLocalImageAsSceneIcon(this);
    });

    function readLocalImageAsSceneIcon(input) {

        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                jQuery('#wpunity_scene_sshot').attr('src', e.target.result);
                is_scene_icon_manually_selected = true;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    // DELETE SCENE DIALOGUE
    jQuery("#deleteSceneDialogDeleteBtn").click(function (e) {
        jQuery('#delete-scene-dialog-progress-bar').show();
        jQuery("#deleteSceneDialogDeleteBtn").addClass("LinkDisabled");
        jQuery("#deleteSceneDialogCancelBtn").addClass("LinkDisabled");
        wpunity_deleteSceneAjax(deleteDialog.id, url_scene_redirect);
    });

    jQuery("#deleteSceneDialogCancelBtn").click(function (e) {
        jQuery('#delete-scene-dialog-progress-bar').hide();
        deleteDialog.close();
    });


    // Select image as Scene icon
    jQuery(".cardDeleteIcon").each(function (index) {
        jQuery(this).on("click", function () {
            console.log(index, this);
            deleteScene(this);
        });
    });

    // Delete scene
    function deleteScene(btn) {

        let scene_id = btn.dataset.sceneid;
        console.log(scene_id);
        var dialogTitle = document.getElementById("delete-dialog-title");
        var dialogDescription = document.getElementById("delete-dialog-description");
        var sceneTitle = document.getElementById(scene_id + "-title").textContent.trim();

        dialogTitle.innerHTML = "<b>Delete " + sceneTitle + "?</b>";
        dialogDescription.innerHTML = "Are you sure you want to delete your scene '" + sceneTitle + "'? There is no Undo functionality once you delete it.";
        deleteDialog.id = scene_id;
        deleteDialog.show();
    }

    // Toggle UIs to clear out vision
    jQuery('#toggleViewSceneContentBtn').click(function () {
        var btn = jQuery('#toggleViewSceneContentBtn');
        var icon = jQuery('#toggleViewSceneContentBtn i');

        if (btn.data('toggle') === 'on') {

            // Hide
            btn.addClass('mdc-theme--text-hint-on-light');
            btn.removeClass('mdc-theme--secondary');
            icon.html('<i class="material-icons" style="background: none; opacity:1; font-size:11pt">visibility_off</i>');
            btn.data('toggle', 'off');

            jQuery("#sceneJsonContent").hide();  // Lights bar

        } else {
            // Show
            btn.removeClass('mdc-theme--text-hint-on-light');
            btn.addClass('mdc-theme--secondary');
            icon.html('<i class="material-icons" style="background: none; opacity:1; font-size:11pt">visibility</i>');
            btn.data('toggle', 'on');

            jQuery("#sceneJsonContent").show(); // Lights bar

        }
    });

    // Drag elements inside VR Editor
    document.getElementById('vr_editor_main_div').ondrop =
        function (ev) {


            let dataDrag = JSON.parse(ev.dataTransfer.getData("text"));


            let categoryName = dataDrag.categoryName;
            let nameModel = dataDrag.title;

            // SUN or LAMP or Spot
            if (dataDrag.categoryName === "lightSun" ||
                dataDrag.categoryName === "lightLamp" ||
                dataDrag.categoryName === "lightSpot") {

                var path = objFname = mtlFname = '';
                dataDrag.objID = dataDrag.mtlID = dataDrag.assetid = dataDrag.categoryIcon = '';

                dataDrag.fbxID = '';
                dataDrag.audioID = '';

                dataDrag.categoryID = dataDrag.diffImages = dataDrag.diffImageIDs = dataDrag.image1id = dataDrag.doorName_source = '';
                dataDrag.doorName_target = dataDrag.sceneName_target = dataDrag.sceneID_target = dataDrag.archaeology_penalty = '';
                dataDrag.hv_penalty = dataDrag.natural_penalty = '';
                dataDrag.isreward = dataDrag.isCloned = dataDrag.isJoker = 0;

            } else {

                var path = dataDrag.obj.substring(0, dataDrag.obj.lastIndexOf("/") + 1);
                var objFname = dataDrag.obj.substring(dataDrag.obj.lastIndexOf("/") + 1);
                var mtlFname = dataDrag.mtl.substring(dataDrag.mtl.lastIndexOf("/") + 1);
            }

            let translation = dragDropVerticalRayCasting(ev);

            // Asset add to canvas
            addAssetToCanvas(nameModel, path, objFname, mtlFname, categoryName, dataDrag, translation, pluginPath);

            // Show options
            jQuery('#object-manipulation-toggle').show();
            jQuery('#axis-manipulation-buttons').show();

            showObjectPropertiesPanel(transform_controls.getMode());

            if (envir.is2d) {
                transform_controls.setMode("rottrans");
                jQuery("#translatePanelGui").show();
            }

            ev.preventDefault();
        };


    // VR Editor Drag Over
    document.getElementById('vr_editor_main_div').ondragover =
        function(ev){
            ev.preventDefault();
        };


    // Pause rendering (to cool down the machine sometimes)
    jQuery("#pauseRendering").get(0).addEventListener('mousedown', function (event) {
        pauseClickFun();
    }, false);


    // Convert scene to json and put the json in the wordpress field wpunity_scene_json_input
    jQuery('#save-scene-button').click(function() {

        jQuery('#save-scene-button').html("Saving...").addClass("LinkDisabled");

        // Export using a custom variant of the old deprecated class SceneExporter
        let exporter = new THREE.SceneExporter();

        document.getElementById('wpunity_scene_json_input').value = exporter.parse(envir.scene);

        //console.log(document.getElementById('wpunity_scene_json_input').value);

        if(!is_scene_icon_manually_selected)
            takeScreenshot();

        wpunity_saveSceneAjax();
    });


    // UNDO button
    jQuery('#undo-scene-button').click(function() {

        jQuery('#undo-scene-button').html("...").addClass("LinkDisabled");

        post_revision_no += 1;

        wpunity_undoSceneAjax(uploadDir, post_revision_no);
    });

    // REDO button
    jQuery('#redo-scene-button').click(function() {

        if(post_revision_no>1)
            post_revision_no -= 1;

        jQuery('#redo-scene-button').html("...").addClass("LinkDisabled");

        wpunity_undoSceneAjax();
    });


    // Toggle 3rd person view
    jQuery('#thirdPersonBlockerBtn').click(function() {

        envir.thirdPersonView = true;
        envir.scene.getObjectByName("SteveOld").visible = true;
        envir.scene.getObjectByName("Camera3Dmodel").visible = false;

        jQuery('#firstPersonBlockerBtn')[0].click();
        jQuery("#firstPersonBlockerBtn").toggleClass('mdc-theme--secondary-bg');
        jQuery("#thirdPersonBlockerBtn").toggleClass('mdc-theme--secondary-bg');
    });

    // // FULL SCREEN Toggle
    jQuery('#fullScreenBtn').click(function() {

        if (container_3D_all.style.position=="absolute") {
            envir.makeFullScreen();
        } else {
            envir.makeWindowedScreen();
        }

    });

    // Autorotate in 3D
    jQuery('#toggle-tour-around-btn').click(function() {

        var btn = jQuery('#toggle-tour-around-btn');

        if (envir.is2d)
            jQuery("#dim-change-btn").click();

        if (btn.data('toggle') === 'off') {

            envir.orbitControls.autoRotate = true;
            envir.orbitControls.autoRotateSpeed = 0.6;
            btn.data('toggle', 'on');

        } else {

            envir.orbitControls.autoRotate = false;
            btn.data('toggle', 'off');
        }

        btn.toggleClass('mdc-theme--secondary-bg');
    });

    firstPersonBlockerBtn.addEventListener('click', function (event) {

        firstPersonViewWithoutLock();
        jQuery("#firstPersonBlockerBtn").toggleClass('mdc-theme--secondary-bg');

    }, false);


    // 3D Widgets change mode (Translation-Rotation-Scale)
    jQuery("#object-manipulation-toggle").click(function() {

        let mode = jQuery("input[name='object-manipulation-switch']:checked").val();

        // Sun and Target spot can not change control manipulation mode
        if (transform_controls.object.categoryName.includes("lightTargetSpot") ||
            transform_controls.object.categoryName.includes("lightSun") ||
            transform_controls.object.categoryName.includes("lightLamp") ||
            transform_controls.object.categoryName.includes("lightSpot")){

            if (mode === 'rotate')
                return;
        }
        transform_controls.setMode(mode);
        showObjectPropertiesPanel(mode);
    });

    // Remove asset from scene
    jQuery("#removeAssetBtn").click(function(){
        deleterFomScene(transform_controls.object.name);
    });

    // Axis Increase size btn
    jQuery("#axis-size-increase-btn").click(function() {
        transform_controls.setSize( transform_controls.size * 1.1 );
    });

    // Axis Decrease size btn
    jQuery("#axis-size-decrease-btn").click(function() {
        transform_controls.setSize( Math.max(transform_controls.size * 0.9, 0.1 ) );
    });

    // Toggle 2D vs 3D button
    jQuery("#dim-change-btn").click(function() {

        jQuery("#translate-switch").click();

        if (envir.is2d) {
            //3d
            envir.orbitControls.enableRotate = true;
            envir.gridHelper.visible = true;
            envir.axesHelper.visible = true;

            jQuery("#object-manipulation-toggle")[0].style.display = "";
            jQuery("#dim-change-btn").text("3D").attr("title", "3D mode");

            envir.is2d = false;
            transform_controls.setMode("translate");

        } else {

            // envir.cameraOrbit.rotation._x = - Math.PI/2;
            // envir.cameraOrbit.rotation._y = 0;
            // envir.cameraOrbit.rotation._z = 0;

            // ToDo: Zoom
            envir.orbitControls.reset();

            //envir.orbitControls.object.quaternion = new THREE.Quaternion(0.707, 0 , 0, 0.707);

            // envir.avatarControls.getObject().quaternion.set(0,0,0,1);
            // envir.avatarControls.getObject().children[0].rotation.set(0,0,0);


            envir.orbitControls.enableRotate = false;
            envir.gridHelper.visible = false;
            envir.axesHelper.visible = false;

            jQuery("#object-manipulation-toggle")[0].style.display = "none";
            jQuery("#dim-change-btn").text("2D").attr("title", "2D mode");

            envir.is2d = true;
            transform_controls.setMode("rottrans");

            envir.scene.getObjectByName("SteveOld").visible = false;
            envir.scene.getObjectByName("Camera3Dmodel").visible = true;
        }

        findSceneDimensions();
        envir.updateCameraGivenSceneLimits();

        envir.orbitControls.object.updateProjectionMatrix();
        jQuery("#dim-change-btn").toggleClass('mdc-theme--secondary-bg');
    });



    // Main canvas handlers
    // Select event listener
    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'dblclick', onMouseDoubleClickFocus, false );

    // Mouse Up
    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'mouseup', saveScene, false );

    // Capture save events on scene: envir.scene.dispatchEvent({type:"save"});
    envir.scene.addEventListener("modificationPendingSave", saveScene);

    // To detect enter button press for saving scene
    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'keypress', saveScene, false );

    /*jQuery("#vr_editor_main_div").get(0).addEventListener( 'mousedown', onMouseDown );*/
    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'mousedown', onMouseSelect, false );

    // Context Menu click (right click)
    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'contextmenu', contextMenuClick, false );

    // Prevent showing the context menu (normal behaviour when rightclicking in web items)
    jQuery("#popUpArtifactPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popUpDoorPropertiesDiv").bind('contextmenu', function(e) { return false; });

    jQuery("#popUpPoiImageTextPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popUpPoiVideoPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popUpSunPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popUpLampPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popUpSpotPropertiesDiv").bind('contextmenu', function(e) { return false; });


}


// ==================== Global scope functions ================

function pauseClickFun(){
    isPaused = !isPaused;
    jQuery("#pauseRendering").get(0).childNodes[1].innerText = isPaused?"pause":"play_arrow";

    if(!isPaused) {
        animate();
        document.getElementById('pauseRendering').style.background = '';
    }else {
        document.getElementById('pauseRendering').style.background = 'red';
    }

    envir.scene.traverse( function ( node ) {
        if ( node instanceof THREE.PositionalAudio  ) {
            if(isPaused)
                node.pause();
            else
                node.play();
        }
    } );

}



// Hide right click panel for object properties
function hideObjectPropertiesPanels() {
    jQuery("#translatePanelGui").hide();
    jQuery("#rotatePanelGui").hide();
    jQuery("#scalePanelGui").hide();
}

function showObjectPropertiesPanel(type) {
    hideObjectPropertiesPanels();
    jQuery("#"+type+"PanelGui").show();
}

// Take screenshot of scene
function takeScreenshot(){

    //envir.cameraAvatarHelper.visible = false;
    if (envir.scene.getObjectByName("myTransformControls"))
        envir.scene.getObjectByName("myTransformControls").visible=false;

    // Save screenshot data to input
    envir.renderer.render( envir.scene, avatarControlsEnabled ? envir.cameraAvatar : envir.cameraOrbit);

    // if no manually selected file for icon, then take a screenshot of the 3D canvas
    //if (document.getElementById("wpunity_scene_sshot").src.includes("noimagemagicword"))
    document.getElementById("wpunity_scene_sshot").src = envir.renderer.domElement.toDataURL("image/jpeg");

    //envir.cameraAvatarHelper.visible = true;
    //envir.axisHelper.visible = true;
    //envir.gridHelper.visible = true;

    if (envir.scene.getObjectByName("myTransformControls"))
        envir.scene.getObjectByName("myTransformControls").visible=true;
}




// Save scene
function saveScene(e) {
    // A change has been made and mouseup then save
    if (e.type ==  'modificationPendingSave')
        mapActions[e.type] = true;

    if (e.type == 'mouseup') {
        mapActions[e.type] = true;

        if (mapActions['mouseup'] && mapActions['modificationPendingSave']) {
            jQuery('#save-scene-button').click();
            mapActions = {};
            return;
        }
    }
}

// trigger autosave for the automatic cases (insert, delete asset from scene)
function triggerAutoSave(){
    envir.scene.dispatchEvent({type:"modificationPendingSave"});
    let clickEvent = document.createEvent ('MouseEvents');
    clickEvent.initEvent ("mouseup", true, true);
    jQuery("#vr_editor_main_div canvas").get(0).dispatchEvent(clickEvent);
}



