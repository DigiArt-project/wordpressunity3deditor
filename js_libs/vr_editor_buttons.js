function loadButtonActions() {

    // Compile Project button
    jQuery( "#compileGameBtn" ).click(function() {
        compileDialog.show();

        // Pause Rendering
        isPaused = true;
        jQuery("#pauseRendering").get(0).childNodes[1].innerText = "play_arrow";
    });

    // Cogwheel options button
    jQuery( "#optionsPopupBtn" ).click(function() {
        (new mdc.dialog.MDCDialog(document.querySelector('#options-dialog'))).show();
    });

    // Select platform for compile
    var platformSelect = MDCSelect.attachTo(document.getElementById('platform-select'));

    document.getElementById('platform-select').addEventListener('MDCSelect:change',
        function() {
            jQuery( "#platformInput" ).attr( "value", platformSelect.selectedOptions[0].getAttribute("id") );
            jQuery( "#compileProceedBtn" ).removeClass( "LinkDisabled" );
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
    jQuery(".mdc-dialog__backdrop").click(function(e){
        jQuery( "#compileCancelBtn" ).click();
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
    jQuery('#save-expid-button').click(function() {
        wpunity_saveExpIDAjax();
    });


    // Take SCREENSHOT OF SCENE
    jQuery("#takeScreenshotBtn").click(function() {
        takeScreenshot();
        is_scene_icon_manually_selected = false;
    });

    // Select image as Scene icon
    jQuery("#wpunity_scene_sshot_manual_select").change(function() {
        readLocalImageAsSceneIcon(this);
    });

    function readLocalImageAsSceneIcon(input) {

        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                jQuery('#wpunity_scene_sshot').attr('src', e.target.result);
                is_scene_icon_manually_selected = true;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    // DELETE SCENE DIALOGUE
    jQuery("#deleteSceneDialogDeleteBtn").click(function (e) {
        jQuery('#delete-scene-dialog-progress-bar').show();
        jQuery( "#deleteSceneDialogDeleteBtn" ).addClass( "LinkDisabled" );
        jQuery( "#deleteSceneDialogCancelBtn" ).addClass( "LinkDisabled" );
        wpunity_deleteSceneAjax(deleteDialog.id, url_scene_redirect);
    });

    jQuery("#deleteSceneDialogCancelBtn").click( function (e) {
        jQuery('#delete-scene-dialog-progress-bar').hide();
        deleteDialog.close();
    });

    function deleteScene(id) {

        var dialogTitle = document.getElementById("delete-dialog-title");
        var dialogDescription = document.getElementById("delete-dialog-description");
        var sceneTitle = document.getElementById(id+"-title").textContent.trim();

        dialogTitle.innerHTML = "<b>Delete " + sceneTitle+"?</b>";
        dialogDescription.innerHTML = "Are you sure you want to delete your scene '" +sceneTitle + "'? There is no Undo functionality once you delete it.";
        deleteDialog.id = id;
        deleteDialog.show();
    }


    // Hide compile progress slider
    function hideCompileProgressSlider() {
        jQuery( "#compileProgressSlider" ).hide();
        jQuery( "#compileProgressTitle" ).hide();
        jQuery( "#compileProgressDeterminate" ).hide();
        jQuery( "#platform-select" ).removeClass( "mdc-select--disabled" ).attr( "aria-disabled","false" );

        jQuery( "#compileProceedBtn" ).removeClass( "LinkDisabled" );
        jQuery( "#compileCancelBtn" ).removeClass( "LinkDisabled" );
    }



    // // Toggle UIs to clear out vision
    // jQuery('#toggleViewSceneContentBtn').click(function() {
    //     var btn = jQuery('#toggleViewSceneContentBtn');
    //     var icon = jQuery('#toggleViewSceneContentBtn i');
    //
    //     if (btn.data('toggle') === 'on') {
    //
    //         // Hide
    //         btn.addClass('mdc-theme--text-hint-on-light');
    //         btn.removeClass('mdc-theme--secondary');
    //         icon.html('<i class="material-icons" style="background: none; opacity:1; font-size:11pt">visibility_off</i>');
    //         btn.data('toggle', 'off');
    //
    //         jQuery("#sceneContent").hide();  // Lights bar
    //
    //     } else {
    //         // Show
    //         btn.removeClass('mdc-theme--text-hint-on-light');
    //         btn.addClass('mdc-theme--secondary');
    //         icon.html('<i class="material-icons" style="background: none; opacity:1; font-size:11pt">visibility</i>');
    //         btn.data('toggle', 'on');
    //
    //         jQuery("#sceneContent").show(); // Lights bar
    //
    //     }
    // });

}


