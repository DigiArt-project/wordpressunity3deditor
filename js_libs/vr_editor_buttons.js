function loadButtonActions() {


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

}
