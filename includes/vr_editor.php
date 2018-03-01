<!-- For some reason these scripts can not be enqued : Try again when php -> js -->
<!--<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/TransformControls.js"></script>-->
<!--<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/PointerLockControls.js"></script>-->
<!--<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/dat.gui.js'></script>-->
<!--<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/stats.min.js'></script>-->
<!---->
<!--<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/CopyShader.js'></script>-->
<!--<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/FXAAShader.js'></script>-->
<!---->
<!--<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/EffectComposer.js'></script>-->
<!--<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/RenderPass.js'></script>-->
<!--<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/OutlinePass.js'></script>-->
<!--<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/ShaderPass.js'></script>-->


<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/TransformControls.js"></script>
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/PointerLockControls.js"></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/dat.gui.js'></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/stats.min.js'></script>

<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/CopyShader.js'></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/FXAAShader.js'></script>

<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/EffectComposer.js'></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/RenderPass.js'></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/OutlinePass.js'></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/ShaderPass.js'></script>


<!-- vr_editor.php -->
<?php
wp_enqueue_style('wpunity_vr_editor');
wp_enqueue_style('wpunity_vr_editor_filebrowser');

wp_enqueue_script('wpunity_load_threejs');
wp_enqueue_script('wpunity_load_objloader');
wp_enqueue_script('wpunity_load_mtlloader');
wp_enqueue_script('wpunity_load_orbitcontrols');

wp_enqueue_script('wpunity_load_sceneexporterutils');
wp_enqueue_script('wpunity_load_sceneexporter');

// Define current path
$PLUGIN_PATH_VR = plugins_url().'/wordpressunity3deditor';
$UPLOAD_DIR = wp_upload_dir()['baseurl'];
$UPLOAD_DIR_C = wp_upload_dir()['basedir'];
$UPLOAD_DIR_C = str_replace('/','\\',$UPLOAD_DIR_C);

// Also available in Javascript side
echo '<script>';
echo 'var PLUGIN_PATH_VR="'.$PLUGIN_PATH_VR.'";';
echo 'var UPLOAD_DIR="'.wp_upload_dir()['baseurl'].'";';
echo 'var scenefolder="'.$scenefolder.'";';
echo 'var gamefolder="'.$gamefolder.'";';
echo 'var sceneID="'.$sceneID.'";';
echo 'var gameProjectID="'.$project_id.'";';
echo 'var gameProjectSlug="'.$projectGameSlug.'";';
echo 'var isAdmin="'.$isAdmin.'";';
echo 'var urlforAssetEdit="'.$urlforAssetEdit.'";';
echo "var doorsAll=".json_encode($doorsAllInfo).";";
echo "var scenesMarkerAll=".json_encode($scenesMarkerAllInfo).";";
echo '</script>';

?>



<!-- Todo: put these js libraries in wp_register -->
<!-- JS libraries -->
<!--<link rel="import" href="--><?php //echo $PLUGIN_PATH_VR?><!--/includes/vr_editor_header_js.html">-->

<!--  My libraries  -->
<!-- Scene Environmentals -->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/vr_editor_environmentals.js'></script>

<!-- Handle keyboard buttons shortcuts -->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/keyButtons.js'></script>


<!-- Functions for clicking on 3D objects -->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/rayCasters.js'></script>

<!-- Functions for controllers (axes, dat.gui, phpForm) -->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/auxControlers.js'></script>

<!-- Load multiple objs -->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/LoaderMulti.js'></script>

<!-- Controls for walking in the model -->
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/movePointerLocker.js"></script>

<!-- Add one more item -->
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/addRemoveOne.js"></script>

<script type="text/javascript">


    isComposerOn = true;

    //  Save Button implemented with Ajax
    jQuery(document).ready(function(){

        var vr_editor = jQuery('#vr_editor_main_div');
        var cw = vr_editor.width();
        vr_editor.css({'height':cw*2/3+'px'});

        envir.turboResize();

        // make filebrowser draggable
        var filemanager = jQuery('#fileBrowserToolbar'),
            breadcrumbs = jQuery('.breadcrumbs'),
            fileList = filemanager.find('.data');

        // Make filemanager draggable
        filemanager.draggable({cancel : 'ul'});

        //------------- File Browser Toolbar close button -------------
        var closeButton = jQuery('.bt_close_file_toolbar');

        closeButton.on('click', function(e){
            // e.preventDefault();

            if (fileList[0].style.display === "") {
                fileList[0].style.display = 'none';
                fileList[0].style.height = '0';
                filemanager[0].style.height = '0';
                closeButton[0].innerHTML = 'Open';
            } else {
                fileList[0].style.display = '';
                fileList[0].style.height = '27vw';
                filemanager[0].style.height = 'auto';
                closeButton[0].innerHTML = 'Close';
            }

        });

        wpunity_fetchSceneAssetsAjax(isAdmin, gameProjectSlug, urlforAssetEdit);
    });

    function removeSavedText(){
        jQuery(".result").html("");
    }

    //========== Drag and drop 3D objects into scene for INSERT  =========================================
    var raycasterDrag = new THREE.Raycaster();

    // find all indexes of the needle inside the str
    function allIndexOf(needle, str){
        var indices = [];
        for(var i=0; i<str.length;i++)
            if (str[i] === needle) indices.push(i);
        return indices;
    }

    function drop_handler(ev) {
        var dataDrag = JSON.parse( ev.dataTransfer.getData("text"));
        var path =     dataDrag.obj.substring(0, dataDrag.obj.lastIndexOf("/")+1);

        var objFname = dataDrag.obj.substring(dataDrag.obj.lastIndexOf("/")+1);
        var mtlFname = dataDrag.mtl.substring(dataDrag.mtl.lastIndexOf("/")+1);

        var objID = dataDrag.objID;
        var mtlID = dataDrag.mtlID;

        var assetid = dataDrag.assetid;

        var categoryName = dataDrag.categoryName;
        var categoryID = dataDrag.categoryID;
        var diffImages = dataDrag.diffImages;
        var diffImageIDs = dataDrag.diffImageIDs;

        var image1id = dataDrag.image1id;

        var doorName_source = dataDrag.doorName_source;
        var doorName_target = dataDrag.doorName_target;
        var sceneName_target = dataDrag.sceneName_target;
        var isreward = dataDrag.isreward;

        // we take the behavior type from the path of the obj
        var slashesArr = allIndexOf("/", path);

        var type_behavior = path.substring(slashesArr[slashesArr.length-3]+1, slashesArr[slashesArr.length-2]);

        // Asset is added to canvas
        addAssetToCanvas(dataDrag.title, assetid, path, objFname, objID, mtlFname, mtlID,
            categoryName, categoryID, diffImages, diffImageIDs, image1id, doorName_source, doorName_target, sceneName_target,
            isreward,
            envir.getSteveWorldPosition().x,
            envir.getSteveWorldPosition().y,
            envir.getSteveWorldPosition().z);

        // Show options
        jQuery('#object-manipulation-toggle').show();
        jQuery('#axis-manipulation-buttons').show();
        jQuery('#double-sided-switch').show();

        showObjectPropertiesPanel(transform_controls.getMode());

        ev.preventDefault();
    }

    function dragover_handler(ev) {
        ev.preventDefault();
    }

    /**
     * Resize div and renderer
     *
     * @param ev
     */
    function resize_handler(ev){

        var vr_editor = jQuery('#vr_editor_main_div');
        var cw = vr_editor.width();
        vr_editor.css({'height':cw*2/3+'px'});

        envir.turboResize();
    }

    window.addEventListener('resize', resize_handler, true);

    //===================== End of drag n drop for INSERT ========================================================
</script>

<!-- All go here -->
<div id="vr_editor_main_div" class="VrEditorMainStyle" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">

    <div id="xlengthText"></div>
    <div id="ylengthText"></div>
    <div id="zlengthText"></div>

    <!-- Controlling 3d items transition-rotation-scale (trs) -->
    <div id="gui-container" class="VrGuiContainerStyle mdc-typography mdc-elevation--z1"></div>

    <div id="object-manipulation-toggle" class="ObjectManipulationToggle mdc-typography" style="display: none;">
        <input type="radio" id="translate-switch" name="object-manipulation-switch" value="translate" checked/>
        <label for="translate-switch">Move (T)</label>
        <input type="radio" id="rotate-switch" name="object-manipulation-switch" value="rotate" />
        <label for="rotate-switch">Rotate (Y)</label>
        <input type="radio" id="scale-switch" name="object-manipulation-switch" value="scale" />
        <label for="scale-switch">Scale (U)</label>
    </div>

    <div id="axis-manipulation-buttons" class="AxisManipulationBtns mdc-typography" style="display: none;">
        <a id="axis-size-decrease-btn" data-mdc-auto-init="MDCRipple" title="Decrease axes size" class="mdc-button mdc-button--raised mdc-button--dense mdc-button--primary">-</a>
        <a id="axis-size-increase-btn" data-mdc-auto-init="MDCRipple" title="Increase axes size" class="mdc-button mdc-button--raised mdc-button--dense mdc-button--primary">+</a>
    </div>


    <a type="button" id="removeAssetBtn" class="RemoveAssetFromSceneBtnStyle mdc-button mdc-button--raised mdc-button--primary mdc-button--dense"
       title="Remove selected asset from the scene" data-mdc-auto-init="MDCRipple">
        <i class="material-icons">delete</i>
    </a>

    <!--Canvas center-->
    <a id="toggleUIBtn" data-toggle='on' type="button" class="ToggleUIButtonStyle mdc-theme--secondary" title="Toggle interface">
        <i class="material-icons">visibility</i>
    </a>

    <!-- The button to start walking in the 3d environment -->
    <div id="blocker" class="VrWalkInButtonStyle">
        <a type="button" id="instructions" class="mdc-button mdc-button--dense mdc-button--raised mdc-button--primary" title="Change camera to First Person View - Move: W,A,S,D,Q,E keys, Orientation: Mouse" data-mdc-auto-init="MDCRipple">
            <i class="material-icons">face</i>
        </a>
    </div>

    <a id="fullScreenBtn" class="VrEditorFullscreenBtnStyle mdc-button mdc-button--raised mdc-button--primary mdc-button--dense" title="Toggle full screen" data-mdc-auto-init="MDCRipple">
        Full Screen
    </a>

    <!--  Make form to submit user changes -->
    <div id="infophp" class="VrInfoPhpStyle">
        <div id="progress" class="ProgressContainerStyle mdc-theme--text-primary-on-light mdc-typography--subheading1">
            <span id="scene_loading_message">Downloading ...</span>
            <div id="progressbar">
                <div id="scene_loading_bar"></div>
            </div>
        </div>

        <div class="result"></div>
        <div id="result_download"></div>
    </div>

    <!--  FileBrowserToolbar  -->
    <div class="filemanager" id="fileBrowserToolbar">

        <div class="mdc-textfield search" data-mdc-auto-init="MDCTextfield">
            <input type="search" class="mdc-textfield__input mdc-typography--title" placeholder="Find an asset.." >
            <i class="material-icons mdc-theme--text-primary-on-background">search</i>
            <div class="mdc-textfield__bottom-line"></div>
        </div>

        <div class="breadcrumbs"></div>

        <!--            <div class="nothingfound">-->
        <!--                <div class="nofiles"></div>-->
        <!--                <span>Nothing found</span>-->
        <!--            </div>-->

        <ul class="data mdc-list mdc-list--two-line mdc-list--avatar-list" id="filesList"></ul>

        <div class="bt_close_file_toolbar mdc-typography">
            Open
        </div>
    </div>

    <!-- Interface for Picking two overlapping objects -->
<!--    <div id="popUpDiv" class="EditorObjOverlapSelectStyle">-->
<!--        <select title="Select an object" id="popupSelect" class="mdc-select"></select>-->
<!--    </div>-->



    <!-- Interface for Changing the door properties -->
    <div id="popUpDoorPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2"
         style="min-width: 240px; max-width:300px">

        <a style="float: right;" type="button" class="mdc-theme--primary" onclick='this.parentNode.style.display = "none"; clearAndUnbindDoorProperties(); return false;'>
            <i class="material-icons" style="cursor: pointer; float: right;">close</i>
        </a>

        <p class="mdc-typography--subheading1" style=""> Door options </p>
        <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield" id="doorInputTextfield">
            <input id="doorid" name="doorid" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                   style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
            <label for="doorid" class="mdc-textfield__label">Enter a door name </label>
            <div class="mdc-textfield__bottom-line"></div>
        </div>



        <i title="Select a destination" class="material-icons mdc-theme--text-icon-on-background"
           style="vertical-align: text-bottom;">directions</i>
        <select title="Select a destination" id="popupDoorSelect" name="popupDoorSelect"
                class="mdc-select--subheading1" style="min-width: 70%; max-width:85%; overflow:hidden; border: none; border-bottom: 1px solid rgba(0,0,0,.23);">
        </select>




        <input type="checkbox" title="Select if it is a reward item" id="door_reward_checkbox" name="door_reward_checkbox"
               class="mdc-textfield__input mdc-theme--text-primary-on-light" style="margin-top:20px; margin-left:10px;">
        <label for="door_reward_checkbox" class="mdc-textfield__label" style="margin-left:15px;">Is a reward item?</label>


    </div>

    <!-- Interface for Changing the Marker properties -->
    <div id="popUpMarkerPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2"
         style="min-width: 240px; max-width:300px">

        <a style="float: right;" type="button" class="mdc-theme--primary" onclick='this.parentNode.style.display = "none"; clearAndUnbindMarkerProperties(); return false;'>
            <i class="material-icons" style="cursor: pointer; float: right;">close</i>
        </a>

        <p class="mdc-typography--subheading1" style=""> Marker options </p>
        <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield" id="markerInputTextfield">
            <input id="markerid" name="markerid" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                   style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
            <label for="markerid" class="mdc-textfield__label">Enter a marker name </label>
            <div class="mdc-textfield__bottom-line"></div>
        </div>



        <i title="Select a destination" class="material-icons mdc-theme--text-icon-on-background"
           style="vertical-align: text-bottom;">directions</i>
        <select title="Select a destination" id="popupMarkerSelect" name="popupMarkerSelect"
                class="mdc-select--subheading1" style="min-width: 70%; max-width:85%; overflow:hidden; border: none; border-bottom: 1px solid rgba(0,0,0,.23);">
        </select>




        <input type="checkbox" title="Select if it is a reward item" id="marker_reward_checkbox" name="marker_reward_checkbox"
               class="mdc-textfield__input mdc-theme--text-primary-on-light" style="margin-top:20px; margin-left:10px;">
        <label for="marker_reward_checkbox" class="mdc-textfield__label" style="margin-left:15px;">Is a reward item?</label>


    </div>

    <!-- Popup menu to Select a scene to go, from Microscope or Textbook -->
    <div id="chemistrySceneSelectPopupDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 360px;">

        <a style="float: right;" type="button" class="mdc-theme--primary"
           onclick='this.parentNode.style.display = "none"; clearAndUnbindMicroscopeTextbookProperties(); return false;'>
            <i class="material-icons" style="cursor: pointer; float: right;">close</i>
        </a>

        <i title="Select a scene to load" class="material-icons mdc-theme--text-icon-on-background" style="vertical-align: text-bottom">directions</i>
        <select title="Select a scene" id="chemistrySceneSelectComponent" class="mdc-select">
        </select>
    </div>


    <!-- Popup menu to Select a scene to go, from Microscope or Textbook -->
    <div id="chemistryBoxPopupDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 360px;">

        <a style="float: right;" type="button" class="mdc-theme--primary"
           onclick='this.parentNode.style.display = "none"; clearAndUnbindBoxProperties(); return false;'>
            <i class="material-icons" style="cursor: pointer; float: right;">close</i>
        </a>

        <i title="Select a functional Category label" class="material-icons mdc-theme--text-icon-on-background" style="vertical-align: text-bottom">label</i>
        <select title="Select a functional category label" id="chemistryBoxComponent" class="mdc-select">
        </select>
    </div>


    <!-- Popup menu to for Reward item checkbox, from Artifact -->
    <div id="popUpArtifactPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 200px;">

        <!-- The close button-->
        <a style="float: right;" type="button" class="mdc-theme--primary"
           onclick='this.parentNode.style.display = "none"; clearAndUnbindCheckBoxProperties("artifact_reward_checkbox"); return false;'>
            <i class="material-icons" style="cursor: pointer; float: right;">close</i>
        </a>

        <!-- The checkbox-->
            <input type="checkbox" title="Select if it is a reward item"  id="artifact_reward_checkbox" name="artifact_reward_checkbox"
                   class="mdc-textfield__input mdc-theme--text-primary-on-light"
                   style="width: 100px !important; float: right; margin-left: 80px; margin-top: 20px;">
            <label for="artifact_reward_checkbox" class="mdc-textfield__label"
                   style="margin-left: 10px; bottom: 8px; margin-bottom: 0px;">Is a reward item?</label>

        
    </div>


    <!-- Popup menu to for Reward item checkbox, from POI IT -->
    <div id="popUpPoiImageTextPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 200px;">

        <!-- The close button-->
        <a style="float: right;" type="button" class="mdc-theme--primary"
           onclick='this.parentNode.style.display = "none"; clearAndUnbindCheckBoxProperties("poi_image_text_reward_checkbox"); return false;'>
            <i class="material-icons" style="cursor: pointer; float: right;">close</i>
        </a>

        <!-- The checkbox-->
        <input type="checkbox" title="Select if it is a reward item"  id="poi_image_text_reward_checkbox" name="poi_image_text_reward_checkbox"
                   class="mdc-textfield__input mdc-theme--text-primary-on-light" style="width: 100px !important; float: right; margin-left: 80px; margin-top: 20px;">
        <label for="poi_image_text_reward_checkbox" class="mdc-textfield__label"
               style="margin-left: 10px; bottom: 8px; margin-bottom: 0px;">Is a reward item?</label>


    </div>


    <!-- Popup menu to for Reward item checkbox, from POI Video -->
    <div id="popUpPoiVideoPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 200px;">

        <!-- The close button-->
        <a style="float: right;" type="button" class="mdc-theme--primary"
           onclick='this.parentNode.style.display = "none"; clearAndUnbindCheckBoxProperties("poi_video_reward_checkbox"); return false;'>
            <i class="material-icons" style="cursor: pointer; float: right;">close</i>
        </a>

        <!-- The checkbox-->
        
            <input type="checkbox" title="Select if it is a reward item"  id="poi_video_reward_checkbox" name="poi_image_text_reward_checkbox"
                   class="mdc-textfield__input mdc-theme--text-primary-on-light"
                   style="margin-left: 29px; width: 150px !important; float: right;">
            <label for="poi_video_reward_checkbox" class="mdc-textfield__label" style="margin-left: 10px; bottom: 8px; margin-bottom: 0px;">
                Is a reward item?</label>
    

    </div>










</div>


<!--    Start 3D    -->
<script>

    // all 3d dom
    var container_3D_all = document.getElementById( 'vr_editor_main_div' );

    // Selected object name
    var selected_object_name = '';


    // Add gui to gui container_3D_all
    var guiContainer = document.getElementById('gui-container');
    guiContainer.appendChild(controlInterface.translate.domElement);
    guiContainer.appendChild(controlInterface.rotate.domElement);
    guiContainer.appendChild(controlInterface.scale.domElement);


    // camera, scene, renderer, lights, stats, floor, browse_controls are all children of CaveEnvironmentals instance
    var envir = new vr_editor_environmentals(container_3D_all);

    // Controls with axes (Transform, Rotate, Scale)
    var transform_controls = new THREE.TransformControls( envir.cameraOrbit, envir.renderer.domElement );
    transform_controls.name = 'myTransformControls';

    //transform_controls.addEventListener( 'change', checkForRecycle );

    envir.addCubeToControls(transform_controls);

    jQuery("#object-manipulation-toggle").click(function() {
        var value = jQuery("input[name='object-manipulation-switch']:checked").val();
        transform_controls.setMode(value);
        showObjectPropertiesPanel(value);
    });

    jQuery("#removeAssetBtn").click(function(){

        deleterFomScene(transform_controls.object.name);

    });

    jQuery("#axis-size-increase-btn").click(function() {
        transform_controls.setSize( transform_controls.size + 0.1 );
    });

    jQuery("#axis-size-decrease-btn").click(function() {
        transform_controls.setSize( Math.max(transform_controls.size - 0.1, 0.1 ) );
    });

    jQuery('#toggleUIBtn').click(function() {
        var btn = jQuery('#toggleUIBtn');
        var icon = jQuery('#toggleUIBtn i');

        if (btn.data('toggle') === 'on') {
            btn.addClass('mdc-theme--text-hint-on-light');
            btn.removeClass('mdc-theme--secondary');
            icon.html('<i class="material-icons">visibility_off</i>');
            btn.data('toggle', 'off');

            hideEditorUI();

        } else {
            btn.removeClass('mdc-theme--text-hint-on-light');
            btn.addClass('mdc-theme--secondary');
            icon.html('<i class="material-icons">visibility</i>');
            btn.data('toggle', 'on');

            showEditorUI();
        }
    });

    jQuery('#fullScreenBtn').click(function() {
        envir.makeFullScreen();
    });

    // Convert scene to json and put the json in the wordpress field wpunity_scene_json_input
    jQuery('#save-scene-button').click(function() {

        jQuery('#save-scene-button').html("Saving...").addClass("LinkDisabled");


        // Export using a custom variant of the old deprecated class SceneExporter
        var exporter = new THREE.SceneExporter();
        document.getElementById('wpunity_scene_json_input').value = exporter.parse(envir.scene);

        envir.cameraAvatarHelper.visible = false;
        envir.axisHelper.visible = false;
        envir.gridHelper.visible = false;
        if (envir.scene.getObjectByName("myTransformControls"))
            envir.scene.getObjectByName("myTransformControls").visible=false;

        //envir.scene.getObjectByName("recycleBin").visible = false;

        // Save screenshot data to input
        envir.renderer.render( envir.scene, avatarControlsEnabled ? envir.cameraAvatar : envir.cameraOrbit);
        document.getElementById("wpunity_scene_sshot").value = envir.renderer.domElement.toDataURL("image/jpeg");

        envir.cameraAvatarHelper.visible = true;
        envir.axisHelper.visible = true;
        envir.gridHelper.visible = true;

        if (envir.scene.getObjectByName("myTransformControls"))
            envir.scene.getObjectByName("myTransformControls").visible=true;

        //envir.scene.getObjectByName("recycleBin").visible=true;

        wpunity_saveSceneAjax();

        //document.getElementById('wpunity_scene_theForm').submit();

    });

    hideObjectPropertiesPanels();

    // When Dat.Gui changes update php, javascript vars and transform_controls
    controllerDatGuiOnChange();

    // Is Recycle Bin deployed
    // var isRecycleBinDeployed = false;

    /* The items in the recycle bin */
    // var delArchive = [];

    // Load all 3D including Steve
    var loaderMulti;

    // id of animation frame is used for canceling animation when dat-gui changes
    var id_animation_frame;

    var resources3D  = [];// This holds all the resources to load. Generated in Parse JSON

    //====================== Load Manager =======================================================
    // Make progress bar visible
    jQuery("#progress").get(0).style.display = "block";

    var manager = new THREE.LoadingManager();

    manager.onProgress = function ( item, loaded, total ) {
        //console.log( item, loaded, total );
    };

    // When all are finished loading place them in the correct position
    manager.onLoad = function () {

        var objItem;
        var trs_tmp;
        var name;

        for (name in resources3D  ) {

            if (name == 'avatarYawObject')
                continue;

            trs_tmp = resources3D[name]['trs'];
            objItem = envir.scene.getObjectByName(name);

            objItem.position.set( trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
            objItem.rotation.set( trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
            objItem.scale.set( trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);
        }

        // place controls to last inserted obj
        if (objItem) {
            transform_controls.attach(objItem);

            findDimensions(transform_controls.object);

            // highlight
            envir.outlinePass.selectedObjects = [objItem];
            envir.renderer.setClearColor( 0xffffff, 0.9 );

            envir.scene.add(transform_controls);

            transform_controls.object.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
            transform_controls.object.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
            transform_controls.object.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);

            jQuery('#object-manipulation-toggle').show();
            jQuery('#axis-manipulation-buttons').show();
            jQuery('#double-sided-switch').show();
            showObjectPropertiesPanel(transform_controls.getMode());

            selected_object_name = name;
        }
    };

    function hideObjectPropertiesPanels() {
        jQuery("#translatePanelGui").hide();
        jQuery("#rotatePanelGui").hide();
        jQuery("#scalePanelGui").hide();
    }

    function showObjectPropertiesPanel(type) {
        hideObjectPropertiesPanels();
        jQuery("#"+type+"PanelGui").show();
    }

    function showEditorUI() {
        jQuery("#"+transform_controls.getMode()+"PanelGui").show();
        jQuery("#object-manipulation-toggle").show();
        jQuery("#axis-manipulation-buttons").show();
        jQuery("#double-sided-switch").show();
        jQuery("#removeAssetBtn").show();
        jQuery("#fullScreenBtn").show();
        jQuery("#blocker").show();
        isComposerOn = true;
        jQuery("#infophp").show();
        jQuery("#fileBrowserToolbar").show();
    }

    function hideEditorUI() {
        hideObjectPropertiesPanels();
        jQuery("#object-manipulation-toggle").hide();
        jQuery("#axis-manipulation-buttons").hide();
        jQuery("#double-sided-switch").hide();
        jQuery("#removeAssetBtn").hide();
        jQuery("#fullScreenBtn").hide();
        jQuery("#blocker").hide();
        isComposerOn = false;
        jQuery("#infophp").hide();
        jQuery("#fileBrowserToolbar").hide();
    }
</script>

<!-- Load Scene - javascript var resources3D[] -->
<?php require( "vr_editor_ParseJSON.php" );
$formRes = new ParseJSON($UPLOAD_DIR);
$formRes->init($sceneToLoad);
?>

<script>

    loaderMulti = new LoaderMulti();
    loaderMulti.load(manager, resources3D);

    //=================== End of loading ============================================
    //--- initiate PointerLockControls ---------------
    initPointerLock();

    //--------------------------- UPDATERS ---------------------------------------------------------------------
    // ANIMATE

    function animate()
    {
        // 60fps
        id_animation_frame = requestAnimationFrame( animate );

        // XX fps (avoid due to dat-gui unable to intercept rendering (limited scope of id_animation_frame)
//        setTimeout( function() {
//            id_animation_frame = requestAnimationFrame( animate );
//        }, 1000 / 25 );

        // Render it
        envir.renderer.render( envir.scene, avatarControlsEnabled ? envir.cameraAvatar : envir.cameraOrbit);

        if (isComposerOn)
            envir.composer.render();

        // Update it
        update();
    }

    // UPDATE
    function update()
    {
        var i;

        // Only for orbit ?
        // if (avatarControlsEnabled == false)
        envir.orbitControls.update();

        updatePointerLockControls();

        transform_controls.update(); // update the axis controls based on the browse controls
        envir.stats.update();

        // light is from camera towards object
        envir.lightOrbit.position.copy(envir.orbitControls.object.position);
        envir.lightAvatar.position.copy(envir.avatarControls.getObject().position);
        envir.lightAvatar.position.y += 1.8;

        // Now update the translation and rotation input texts
        if (transform_controls.object) {

            for (i in controlInterface.translate.__controllers)
                controlInterface.translate.__controllers[i].updateDisplay();

            for (i in controlInterface.rotate.__controllers)
                controlInterface.rotate.__controllers[i].updateDisplay();

            for (i in controlInterface.scale.__controllers)
                controlInterface.scale.__controllers[i].updateDisplay();

            updatePositionsPhpAndJavsFromControlsAxes();
        }
    }

    // Select event listener
    /*jQuery("#vr_editor_main_div").get(0).addEventListener( 'mousedown', onMouseDown );*/
    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'mousedown', onMouseDownSelect, false );
   
    jQuery("#popUpArtifactPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popUpDoorPropertiesDiv").bind('contextmenu', function(e) { return false; });

    jQuery("#popUpPoiImageTextPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popUpPoiVideoPropertiesDiv").bind('contextmenu', function(e) { return false; });
    
    
    
    animate();

</script>

<!-- Change dat GUI style: Override the inside js style -->
<link rel="stylesheet" type="text/css" href="<?php echo $PLUGIN_PATH_VR?>/css/dat-gui.css">