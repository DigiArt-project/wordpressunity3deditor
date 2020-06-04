<?php
if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}
$parameter_assetpass = $perma_structure ? '?wpunity_asset=' : '&wpunity_asset=';
?>

<!--Three js staff: Several modifications on OBJLoader, MTLLoader, OrbitControls, TransformControls, PointerLockControls-->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/three.js'></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/OBJLoader.js'></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/MTLLoader.js'></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/OrbitControls.js'></script>

<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/CSS2DRenderer.js"></script>
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/TransformControls.js"></script>
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/PointerLockControls.js"></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/dat.gui.js'></script>
<!--<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/stats.min.js'></script>-->

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

//wp_enqueue_script('wpunity_load87_threejs');
//wp_enqueue_script('wpunity_load87_objloader');
//wp_enqueue_script('wpunity_load87_mtlloader');
//wp_enqueue_script('wpunity_load87_orbitcontrols');


wp_enqueue_script('wpunity_load_sceneexporterutils');
wp_enqueue_script('wpunity_load_scene_importer_utils');
wp_enqueue_script('wpunity_load_sceneexporter');


// Define current path
$PLUGIN_PATH_VR = plugins_url().'/wordpressunity3deditor';
$UPLOAD_DIR = wp_upload_dir()['baseurl'];
$UPLOAD_DIR_C = wp_upload_dir()['basedir'];
$UPLOAD_DIR_C = str_replace('/','\\',$UPLOAD_DIR_C);

$meta_json = get_post($current_scene_id)->post_content;

// Load default scenes if no content
// Do not put esc_attr, crashes the universe in 3D
if ( $game_type_obj->string === "Energy" ) {
    $sceneToLoad = $meta_json ? $meta_json : wpunity_getDefaultJSONscene('energy');
}else{
    $sceneToLoad = $meta_json ? $meta_json : wpunity_getDefaultJSONscene('chemistry');
}

// Find scene dir string
$parentGameSlug = wp_get_object_terms( $current_scene_id, 'wpunity_scene_pgame')[0]->slug;
$parentGameId = $_REQUEST['wpunity_game']; //wp_get_object_terms( $current_scene_id, 'wpunity_scene_pgame')[0]->term_id;

$projectGameSlug = $parentGameSlug;

$scenesNonRegional = wpunity_getNonRegionalScenes($_REQUEST['wpunity_game']);

$doorsAllInfo = wpunity_get_all_doors_of_game_fastversion($parentGameId);

$scenesMarkerAllInfo = wpunity_get_all_scenesMarker_of_game_fastversion($parentGameId);

$scenefolder = $sceneTitle;
$gamefolder = $parentGameSlug;
$sceneID = $current_scene_id;

$isAdmin = is_admin() ? 'back' : 'front';

// Also available in Javascript side
echo '<script>';
echo 'var PLUGIN_PATH_VR="'.$PLUGIN_PATH_VR.'";';
echo 'var UPLOAD_DIR="'.wp_upload_dir()['baseurl'].'";';
echo 'var scenefolder="'.$scenefolder.'";';
echo 'var gamefolder="'.$gamefolder.'";';
echo 'var sceneID="'.$sceneID.'";';
echo 'console.log(sceneID);';
echo 'var gameProjectID="'.$parentGameId.'";';
echo 'console.log(gameProjectID);';
echo 'var gameProjectSlug="'.$projectGameSlug.'";';
echo 'var isAdmin="'.$isAdmin.'";';
echo 'var isUserAdmin="'.current_user_can('administrator').'";';
echo 'var urlforAssetEdit="'.$urlforAssetEdit.'";';
echo "var doorsAll=".json_encode($doorsAllInfo).";";
echo "var scenesMarkerAll=".json_encode($scenesMarkerAllInfo).";";
echo "var scenesNonRegional=".json_encode($scenesNonRegional).";";
echo "var scenesTargetChemistry=".json_encode(wpunity_getAllexams_byGame($joker_project_id, true)).";";
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
    post_revision_no = 1;
    isComposerOn = true;
    isPaused = false;
    window.isAnyLight = true;

    game_type = parseInt("<?php echo strtolower($project_scope);?>");
    
    //  Save Button implemented with Ajax
    jQuery(document).ready(function(){

        // var vr_editor = jQuery('#vr_editor_main_div');
        // var cw = vr_editor.width();
        // vr_editor.css({'height':cw*2/3+'px'});
        envir.turboResize();

        // make filebrowser draggable
        var filemanager = jQuery('#fileBrowserToolbar'),
            breadcrumbs = jQuery('.breadcrumbs'),
            fileList = filemanager.find('.data');

        // Make filemanager draggable
        filemanager.draggable({cancel : 'ul'});

        
        //if (!envir.isDebug)
            wpunity_fetchSceneAssetsAjax(isAdmin, gameProjectSlug, urlforAssetEdit, gameProjectID);
    });

    // function removeSavedText(){
    //     jQuery(".result").html("");
    // }

    //========== Drag and drop 3D objects into scene for INSERT  =========================================
    //var raycasterDrag = new THREE.Raycaster();

    // find all indexes of the needle inside the str
    function allIndexOf(needle, str){
        var indices = [];
        for(var i=0; i<str.length;i++)
            if (str[i] === needle) indices.push(i);
        return indices;
    }

    function drop_handler(ev) {

        var dataDrag = JSON.parse(ev.dataTransfer.getData("text"));

        var categoryName = dataDrag.categoryName;
        
        var nameModel = dataDrag.title;
        
        // REM HERE
        if(dataDrag.categoryName==="lightSun"){
            // SUN

            var path = objFname = objID = mtlID = mtlFname = assetid = categoryIcon = '';
            
            var categoryID = diffImages = diffImageIDs = image1id = doorName_source = '';
            var doorName_target = sceneName_target = sceneID_target = archaeology_penalty = '';
            var hv_penalty = natural_penalty = '';
            var isreward = isCloned = isJoker = 0;
            
            
        } else {

            var path = dataDrag.obj.substring(0, dataDrag.obj.lastIndexOf("/") + 1);

            var objFname = dataDrag.obj.substring(dataDrag.obj.lastIndexOf("/") + 1);
            var mtlFname = dataDrag.mtl.substring(dataDrag.mtl.lastIndexOf("/") + 1);

            var objID = dataDrag.objID;
            var mtlID = dataDrag.mtlID;

            var assetid = dataDrag.assetid;
            
            var categoryDescription = dataDrag.categoryDescription;
            var categoryIcon = dataDrag.categoryIcon;
            var categoryID = dataDrag.categoryID;
            var diffImages = dataDrag.diffImages;
            var diffImageIDs = dataDrag.diffImageIDs;

            var image1id = dataDrag.image1id;

            var doorName_source = dataDrag.doorName_source;
            var doorName_target = dataDrag.doorName_target;
            var sceneName_target = dataDrag.sceneName_target;
            var sceneID_target = dataDrag.sceneID_target;
            var archaeology_penalty = dataDrag.archaeology_penalty;
            var hv_penalty = dataDrag.hv_penalty;
            var natural_penalty = dataDrag.natural_penalty;

            var isreward = dataDrag.isreward;
            var isCloned = dataDrag.isCloned;
            var isJoker = dataDrag.isJoker;
        }

        var coordsXYZ = dragDropVerticalRayCasting(ev);

        
        // Asset is added to canvas
        addAssetToCanvas(nameModel, assetid, path, objFname, objID, mtlFname, mtlID,
            categoryName, categoryDescription, categoryIcon, categoryID, diffImages, diffImageIDs, image1id, doorName_source, doorName_target, sceneName_target,
            sceneID_target,
            archaeology_penalty,
            hv_penalty,
            natural_penalty,
            isreward, isCloned, isJoker,
            coordsXYZ[0],
            coordsXYZ[1],
            coordsXYZ[2]);

        // Show options
        jQuery('#object-manipulation-toggle').show();
        jQuery('#axis-manipulation-buttons').show();
        jQuery('#double-sided-switch').show();

        showObjectPropertiesPanel(transform_controls.getMode());

        if (envir.is2d) {
            transform_controls.setMode("rottrans");
            jQuery("#translatePanelGui").show();
        }
        
        
        
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

        // var vr_editor = jQuery('#vr_editor_main_div');
        // var cw = vr_editor.width();
        // vr_editor.css({'height':cw*2/3+'px'});
        envir.turboResize();
    }

    window.addEventListener('resize', resize_handler, true);

    //===================== End of drag n drop for INSERT ========================================================
</script>



<!-- 3D editor  -->
<div id="vr_editor_main_div" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">



    <!--Canvas center-->
<!--    <a id="toggleUIBtn" data-toggle='on' type="button" class="ToggleUIButtonStyle mdc-theme--secondary" title="Toggle interface">-->
<!--        <i class="material-icons">visibility</i>-->
<!--    </a>-->


<!-- Lights -->
<div class="lightcolumns">
    <div class="lightcolumn" draggable="true"><header draggable="false">Sun</header><img draggable="false" src="<?php echo $PLUGIN_PATH_VR?>/images/lights/sun.png" class="lighticon"/></div>
    <div class="lightcolumn" draggable="true"><header draggable="false">Lamp</header><img src="<?php echo $PLUGIN_PATH_VR?>/images/lights/lamp.png" draggable="false" class="lighticon"/></div>
    <div class="lightcolumn" draggable="true"><header draggable="false">Spot</header><img src="<?php echo $PLUGIN_PATH_VR?>/images/lights/spot.png" draggable="false" class="lighticon"/></div>
</div>

<!-- Remove game object-->
<a type="button" id="removeAssetBtn" class="RemoveAssetFromSceneBtnStyle mdc-button mdc-button--raised mdc-button--primary mdc-button--dense"
   title="Remove selected asset from the scene" data-mdc-auto-init="MDCRipple">
    <i class="material-icons">delete</i>
</a>

<!--  Open/Close Right Hierarchy panel-->
<a id="hierarchy-toggle-btn" data-toggle='on' type="button" class="HierarchyToggleStyle HierarchyToggleOn mdc-button mdc-button--raised mdc-button--primary mdc-button--dense" title="Toggle hierarchy viewer" data-mdc-auto-init="MDCRipple">
    <i class="material-icons">menu</i>
</a>


<div id="right-elements-panel" class="right-elements-panel-style">

    <div id="row0" class="row-right-panel" style="height:65px;vertical-align: bottom; bottom:0; display:table-cell; padding-left:5px;">
        Scene controls
    </div>
    
    <div id="row1" class="row-right-panel">
            <!-- Options -->
            <a type="button" id="optionsPopupBtn" class="VrEditorOptionsBtnStyle mdc-button mdc-button--raised mdc-button--primary mdc-button--dense" title="Edit scene options" data-mdc-auto-init="MDCRipple">
                <i class="material-icons">settings</i>
            </a>
    </div>

    <div id="row2" class="row-right-panel">

        <!--  Toggle Around Tour -->
        <a type="button" id="toggle-tour-around-btn" data-toggle='off' data-mdc-auto-init="MDCRipple" title="Auto-rotate 3D tour"
           class="EditorTourToggleBtn mdc-button mdc-button--raised mdc-button--dense mdc-button--primary">
            <i class="material-icons">rotate_90_degrees_ccw</i>
        </a>

        <!--  Dimensionality 2D 3D toggle -->
        <a id="dim-change-btn" data-mdc-auto-init="MDCRipple" title="Toggle between 2D mode (top view) and 3D mode (view with angle). 3D mode is more difficult to manipulate but allows for more modifications in assets of the scenes." class="EditorDimensionToggleBtn mdc-button mdc-button--raised mdc-button--dense mdc-button--primary">2D</a>

        <!-- The button to start walking in the 3d environment -->
        <div id="firstPersonBlocker" class="VrWalkInButtonStyle">
            <a type="button" id="firstPersonBlockerBtn" data-toggle='on' class="mdc-button mdc-button--dense mdc-button--raised mdc-button--primary"
               title="Change camera to First Person View - Move: W,A,S,D,Q,E,R,F keys" data-mdc-auto-init="MDCRipple">
                VIEW
            </a>
        </div>
        
        
        
        <a type="button" id="thirdPersonBlockerBtn" class="ThirdPersonVrWalkInButtonStyle mdc-button mdc-button--dense mdc-button--raised mdc-button--primary" title="Change camera to Third Person View - Move: W,A,S,D,Q,E keys, Orientation: Mouse" data-mdc-auto-init="MDCRipple">
            <i class="material-icons">person</i></a>
    </div>


    <!--  Object Controls  -->
    <div id="row3" class="row-right-panel" style="display:block">
        
        <div style="padding-left:5px; padding-top:10px;"> Object controls</div>

        <!-- Move, Rotate, Scale Buttons -->
        <div id="object-manipulation-toggle" class="ObjectManipulationToggle mdc-typography" style="display: none;">
            <input type="radio" id="translate-switch" name="object-manipulation-switch" value="translate" checked/>
            <label for="translate-switch">Move</label>
            <input type="radio" id="rotate-switch" name="object-manipulation-switch" value="rotate" />
            <label for="rotate-switch">Rotate</label>
            <input type="radio" id="scale-switch" name="object-manipulation-switch" value="scale" />
            <label for="scale-switch">Scale</label>
        </div>
    </div>

    <!-- Numerical input for Move rotate scale -->
    <div id="row4" class="row-right-panel">
        <div id="gui-container" class="VrGuiContainerStyle mdc-typography mdc-elevation--z1"></div>
    </div>

    <!--  Axis controls size -->
    <div id="row5" class="row-right-panel" style="padding-top:12px; padding-left:5px; padding-bottom:10px">
        <span class="mdc-typography--subheading1" style="font-size:12px">Axes controls size:</span>
        <div id="axis-manipulation-buttons" class="AxisManipulationBtns mdc-typography" style="display: none;">
            <a id="axis-size-decrease-btn" data-mdc-auto-init="MDCRipple" title="Decrease axes size" class="mdc-button mdc-button--raised mdc-button--dense mdc-button--primary">-</a>
            <a id="axis-size-increase-btn" data-mdc-auto-init="MDCRipple" title="Increase axes size" class="mdc-button mdc-button--raised mdc-button--dense mdc-button--primary">+</a>
        </div>
    </div>

    <!-- Hierarchy viewer -->
    <div id="row6" class="row-right-panel">
        <div class="HierarchyViewerStyle mdc-card" id="hierarchy-viewer-container">
            <span class="hierarchyViewerTitle mdc-typography--subheading1 mdc-theme--text-primary-on-background" style="">Hierarchy Viewer</span>
            <hr class="mdc-list-divider">
            <ul class="mdc-list" id="hierarchy-viewer" style="max-height: 460px; overflow-y: scroll"></ul>
        </div>
    </div>
    
</div>

<!-- Pause rendering-->
<div id="divPauseRendering" class="pauseRenderingDivStyle">
    <a type="button" id="pauseRendering" class="mdc-button mdc-button--dense mdc-button--raised mdc-button--primary" title="Pause rendering" data-mdc-auto-init="MDCRipple">
        <i class="material-icons">pause</i>
    </a>
</div>


<!--  Make form to submit user changes -->
<div id="infophp" class="VrInfoPhpStyle" style="visibility: visible">
    <div id="progress" class="ProgressContainerStyle mdc-theme--text-primary-on-light mdc-typography--subheading1">
        <!--            <span id="scene_loading_message">Downloading ...</span>-->
        <!--            <div id="progressbar">-->
        <!--                <div id="scene_loading_bar"></div>-->
        <!--            </div>-->
    </div>

    <!--        <div id="downloadIndicator" class="result"></div>-->
    <div id="result_download" class="result"></div>
    <div id="result_download2" class="result"></div>
</div>




<!--   ================================= FileBrowserToolbar ============================================ -->

<!--  Open/Close button-->
<a id="bt_close_file_toolbar" data-toggle='on' type="button" class="AssetsToggleStyle AssetsToggleOn mdc-button mdc-button--raised mdc-button--primary mdc-button--dense mdc-ripple-upgraded" title="Toggle asset viewer" data-mdc-auto-init="MDCRipple">
    <i class="material-icons">menu</i>
</a>

<div class="filemanager" id="fileBrowserToolbar">

    <!-- Categories of assets -->
    <div id="assetCategTab"  >
        <button id="allAssetsViewBt" class="tablinks active">All</button>
    </div>

    <!-- Search bar -->
    <div class="mdc-textfield search" data-mdc-auto-init="MDCTextfield" style="margin-top:0px; height:40px;margin-left:10px;">
        <input type="search" class="mdc-textfield__input mdc-typography--subheading2" placeholder="Find...">
        <i class="material-icons mdc-theme--text-primary-on-background">search</i>
        <div class="mdc-textfield__bottom-line"></div>
    </div>
    
    <ul id="filesList" class="data mdc-list mdc-list--two-line mdc-list--avatar-list"></ul>


    <!-- ADD NEW ASSET FROM ASSETS LIST -->
    <a id="addNewAssetBtnAssetsList"
       style="" class="addNewAsset3DEditor" data-mdc-auto-init="MDCRipple"
       title="Add new private asset"
       href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $joker_project_id . '&wpunity_scene=' .  $current_scene_id); ?>">
        <i class="material-icons" style="cursor: pointer; font-size:54px; color:orangered; ">add_circle</i>
    </a>
    
</div>

<!-- Interface for Picking two overlapping objects -->
<!--    <div id="popUpDiv" class="EditorObjOverlapSelectStyle">-->
<!--        <select title="Select an object" id="popupSelect" class="mdc-select"></select>-->
<!--    </div>-->

<!-- Interface for Changing the door properties -->
<div id="popUpDoorPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2"
     style="min-width: 240px; max-width:300px; display:none">

    <a style="float: right;" type="button" class="mdc-theme--primary"
       onclick='this.parentNode.style.display = "none"; clearAndUnbind("popupDoorSelect", "doorid", ""); return false;'>

    <!-- clearAndUnbindDoorProperties(); -->
        
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

<!--======================= Interface for Changing the Marker properties : WindEnergy ======================= -->

<div id="popUpMarkerPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2"
     style="min-width: 100%; width: auto; bottom: auto;">

    <a style="float: right;" type="button" class="mdc-theme--primary"
       onclick='this.parentNode.style.display = "none"; clearAndUnbind("archaeology_penalty", null, null); clearAndUnbind("hv_distance_penalty", null, null); clearAndUnbind("natural_resource_proximity_penalty", null, null); return false;'>
        <i class="material-icons" style="cursor: pointer; float: right;">close</i>
    </a>

<!--    <p class="mdc-typography--title"> Marker options</p>-->


    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">

            <?php if ($project_scope == 1) { ?>
            
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                <table>
                    <tr>
                        <td>
                            <label for="archaeology_penalty" class="mdc-textfield__label" style="position:inherit">Archaeology penalty</label>
                        </td>
                        <td>
                            <select title="" id="archaeology_penalty" name="archaeology_penalty" style="width:50px" ></select>
                        </td>
                        <td>
                            <i title="Define penalties" class="material-icons mdc-theme--text-icon-on-background" style="vertical-align: text-bottom;">attach_money</i>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="hv_distance_penalty" class="mdc-textfield__label" style="position:inherit">Distance from High voltage lines penalty</label>
                        </td>
                        <td>
                            <select title="" id="hv_distance_penalty" name="hv_distance_penalty" style="width:50px">
                            </select>
                        </td>
                        <td>
                            <i title="Define penalties" class="material-icons mdc-theme--text-icon-on-background" style="vertical-align: text-bottom;">attach_money</i>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="natural_resource_proximity_penalty" class="mdc-textfield__label" style="position:inherit">Natural park proximity penalty</label>
                        </td>
                        <td>
                            <select title="" id="natural_resource_proximity_penalty" name="natural_resource_proximity_penalty" style="width:50px">
                            </select>
                        </td>
                        <td>
                            <i title="Define penalties" class="material-icons mdc-theme--text-icon-on-background" style="vertical-align: text-bottom;">attach_money</i>
                        </td>
                    </tr>
                </table>
            </div>

            <?php } ?>
            
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
<!--                <p class="mdc-typography--title">Small Turbine</p>-->
                <iframe style="height: 400px; width: 100%; border:none;" id="turbine1-iframe"></iframe>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
<!--                <p class="mdc-typography--title">Normal Turbine</p>-->
                <iframe style="height: 400px; width: 100%; border:none;" id="turbine2-iframe"></iframe>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
<!--                <p class="mdc-typography--title">Big Turbine</p>-->
                <iframe style="height: 400px; width: 100%; border:none;" id="turbine3-iframe"></iframe>
            </div>

        </div>
    </div>

    <!--        <i title="Select a destination" class="material-icons mdc-theme--text-icon-on-background"-->
    <!--           style="vertical-align: text-bottom;">directions</i>-->
    <!--        <select title="Select a destination" id="popupMarkerSelect" name="popupMarkerSelect"-->
    <!--                class="mdc-select--subheading1" style="min-width: 70%; max-width:85%; overflow:hidden; border: none; border-bottom: 1px solid rgba(0,0,0,.23);">-->
    <!--        </select>-->

</div>

<?php include 'vr_editor_popups.php'; ?>

    


    <!--  Open/Close Right Hierarchy panel-->
    <a id="scenesList-toggle-btn" data-toggle='on' type="button" class="scenesListToggleStyle scenesListToggleOn mdc-button mdc-button--raised mdc-button--primary mdc-button--dense" title="Toggle scenes list" data-mdc-auto-init="MDCRipple">
        <i class="material-icons" style="margin:auto">menu</i>
    </a>


    <!-- Scenes List -->
    <div id="scenesInsideVREditor" class="" style="">

            <!-- Game Settings Scenes -->
            <?php
            $custom_query_args = array(
                'post_type' => 'wpunity_scene',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'wpunity_scene_pgame',
                        'field'    => 'term_id',
                        'terms'    => $allScenePGameID,
                    ),
                ),
                'orderby' => 'ID',
                'order' => 'DESC',
                /*'paged' => $paged,*/
            );
            
            $custom_query = new WP_Query( $custom_query_args );
            
            // Pagination fix
            $temp_query = $wp_query;
            $wp_query   = NULL;
            $wp_query   = $custom_query;
            ?>
            
            <?php if ( $custom_query->have_posts() ) :
                while ( $custom_query->have_posts() ) :
                $custom_query->the_post();
                $scene_id = get_the_ID();
                $scene_title = get_the_title();
                $scene_desc = get_the_content();
                
                $current_card_bg = $current_scene_id == $scene_id ? 'mdc-theme--primary-light-bg' : '';
                
                $scene_type = get_post_meta( $scene_id, 'wpunity_scene_metatype', true );
                
                if($scene_type == 'menu' || $scene_type == 'credits') { ?>

                    <div id="scene-<?php echo $scene_id; ?>" class="SceneCardContainer">

                        <div class="sceneTab mdc-card mdc-theme--background <?php echo $current_card_bg;?> ">

                            <div class="SceneThumbnail">
                                <?php
                                
                                $default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true ); //=true Default scene - NOT DELETE-ABLE
                                $scene_type    = get_post_meta( $scene_id, 'wpunity_scene_metatype', true ); //=menu,scene,credits - EDITABLE
                                //create permalink depending the scene yaml category
                                $edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
                                if($scene_type == 'sceneExam2d' ||  $scene_type == 'sceneExam3d'){$edit_scene_page_id = $editsceneExamPage[0]->ID;}
                                
                                $edit_page_link = esc_url( get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $joker_project_id . '&scene_type=' . $scene_type );
                                ?>
                                <div style="" class="sceneDisplayBlock mdc-theme--primary-bg CenterContents">
                                <a href="<?php echo $edit_page_link; ?>">
                                    
                                    <?php if(has_post_thumbnail($scene_id)) {
                                            echo get_the_post_thumbnail( $scene_id );
                                          } else { ?>
                                            <i class="landscapeIcon material-icons mdc-theme--text-icon-on-background">landscape</i>
                                      
                                    <?php } ?>
                                </a>
                                </div>
                                
                            </div>

                            <section class="cardTitleDeleteWrapper">
                                    <span class="cardTitle mdc-card__title mdc-typography--title">
                                        <a class="mdc-theme--primary" href="<?php echo $edit_page_link; ?>">
                                            <?php echo $scene_title; ?>
                                        </a>
                                    </span>
                            </section>
                        </div>
                    </div>
                
                
                <?php } ?>
            <?php endwhile; ?>
            
            <?php if ($project_scope === 1) {?>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">

                    <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">GIO APP KEY</h3>

                    <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                        <input id="app-key" name="app-key" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light mdc-textfield--disabled"
                               style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;" value="<?php if($project_saved_keys['gioID'] != ''){echo $project_saved_keys['gioID'];} ?>">
                        <label for="app-key" class="mdc-textfield__label">APP KEY</label>
                        <div class="mdc-textfield__bottom-line"></div>
                    </div>


                    <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">Experiment ID (GUID)</h3>
                    <form name="create_new_expid_form" action="" id="create_new_expid_form" method="POST" enctype="multipart/form-data">

                        <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                            <input id="exp-id" name="exp-id" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                                   style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;"  value="<?php if($project_saved_keys['expID'] != ''){echo $project_saved_keys['expID'];} ?>">
                            <label for="exp-id" class="mdc-textfield__label">Insert a valid exp id</label>
                            <div class="mdc-textfield__bottom-line"></div>
                        </div>

                        <br>
                        <?php wp_nonce_field('post_nonce', 'post_nonce_field2'); ?>
                        <input type="hidden" name="submitted2" id="submitted2" value="true" />
                        <button id="save-expid-button" type="submit" class="mdc-button mdc-button--primary mdc-button--raised FullWidth" data-mdc-auto-init="MDCRipple"> SAVE</button>
                    </form>
                </div>
            
            <?php } ?>

        
        
        <?php endif;
        wp_reset_query();
        ?>





    <!-- Scenes -->
    <?php
    $custom_query_args = array(
        'post_type' => 'wpunity_scene',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_scene_pgame',
                'field'    => 'term_id',
                'terms'    => $allScenePGameID,
            ),
        ),
        'orderby' => 'ID',
        'order' => 'DESC',
        /*'paged' => $paged,*/
    );
    
    $custom_query = new WP_Query( $custom_query_args );
    
    // Pagination fix
    $temp_query = $wp_query;
    $wp_query   = NULL;
    $wp_query   = $custom_query;
    ?>
    
    <?php if ( $custom_query->have_posts() ) :
        while ( $custom_query->have_posts() ) :
            $custom_query->the_post();
            $scene_id = get_the_ID();
            $scene_title = get_the_title();
            $scene_desc = get_the_content();
            $is_regional = get_post_meta($scene_id,'wpunity_isRegional', true);
            $current_card_bg = $current_scene_id == $scene_id ? 'mdc-theme--primary-light-bg' : '';
            $scene_type = get_post_meta( $scene_id, 'wpunity_scene_metatype', true );
            
            if($scene_type !== 'menu' && $scene_type !== 'credits') {
                ?>

                <div id="scene-<?php echo $scene_id; ?>" class="SceneCardContainer">
                    <div class="sceneTab mdc-card mdc-theme--background <?php echo $current_card_bg;?> ">
                        <div class="SceneThumbnail">
                            <?php
                            
                            $default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true ); //=true Default scene - NOT DELETE-ABLE
                            
                            //create permalink depending the scene yaml category
                            $edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
                            if($scene_type == 'sceneExam2d' ||  $scene_type == 'sceneExam3d'){$edit_scene_page_id = $editsceneExamPage[0]->ID;}
                            
                            
                            
                            $editurl = get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $joker_project_id . '&scene_type=' . $scene_type;
                            $edit_page_link = esc_url( $editurl );

                            if($default_scene) {
                                //echo urlencode($edit_page_link);
    
                                
                                
                                echo '<script>';
                                echo 'var url_scene_redirect="'.$editurl.'";';
                                echo '</script>';
                            }
                            
                            
                            ?>
                            <div class="sceneDisplayBlock mdc-theme--primary-bg CenterContents">
                                <a href="<?php echo $edit_page_link; ?>">
                                    <?php if(has_post_thumbnail($scene_id)) {
                                        echo get_the_post_thumbnail( $scene_id );
                                            } else { ?>
                                                <i class="landscapeIcon material-icons mdc-theme--text-icon-on-background">landscape</i>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>

                        <section class="cardTitleDeleteWrapper"
                                 style="<?php
                                        if($scene_id==$_GET['wpunity_scene']){?>
                                                background:lightgreen; <?php } ?>">
                            
                                    <span id="<?php echo $scene_id;?>-title" class="cardTitle mdc-card__title mdc-typography--title"
                                           title="<?php echo $scene_title; ?>">
                                        <a class="mdc-theme--primary" href="<?php echo $edit_page_link; ?>"><?php echo $scene_title; ?></a>
                                        <?php if ($is_regional) { ?>
                                            <i title="Regional scene" class="material-icons AlignIconToBottom CursorDefault mdc-theme--primary" style="float: right;">public</i>
                                        <?php } ?>
                                    </span>

<!--                            <span class="cardDescription mdc-card__subtitle mdc-theme--text-secondary-on-light SceneCardDescriptionStyle">-->
<!--                                            &#8203;(--><?php //echo $scene_desc; ?><!--)-->
<!--                                        </span>-->
                            <!-- DELETE SCENE  -->
                            <!--                        <section class="mdc-card__actions">-->
                            <?php if (!$default_scene) { ?>
                                <a id="deleteSceneBtn" data-mdc-auto-init="MDCRipple"
                                   title="Delete scene" class="cardDeleteIcon mdc-button mdc-button--compact mdc-card__action"
                                   onclick="deleteScene(<?php echo $scene_id; ?>)"><i class="material-icons deleteIconMaterial">delete_forever</i></a>
                            <?php } ?>
                            <!--                        </section>-->

                        </section>


                    </div>
                </div>
            <?php } ?>
        <?php endwhile;?>

        <!--ADD NEW SCENE-->
        <?php if($game_type_obj->string !== "Energy") { ?>

        <div id="add-new-scene-card" class="SceneCardContainer">
            <form name="create_new_scene_form" action="" id="create_new_scene_form" method="POST" enctype="multipart/form-data">
                <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                <input type="hidden" name="submitted" id="submitted" value="true" />
                <div class="mdc-card mdc-theme--secondary-light-bg">

                    <section class="mdc-card__primary" style="padding:8px;">

                        <!--  PLus icon-->
<!--                        <span class="mdc-card__title mdc-typography--title"-->
<!--                              style="font-size:14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; " title="Add new">-->
<!--                                        <i class="material-icons AlignIconToMiddle" style="font-size:14px;">add</i>-->
<!--                                        Add new scene-->
<!--                        </span>-->

                        <!--Title-->
                        <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield" style="padding:0px; height:25px;">
                            <input id="title" name="scene-title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-secondary-light"
                                   aria-controls="title-validation-msg" required minlength="3" maxlength="25" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                            <label for="title" class="mdc-textfield__label" style="font-size:12px;"> Enter a scene title</label>
                            <div class="mdc-textfield__bottom-line"></div>
                        </div>
                    </section>

                    <section class="mdc-card__primary" style="display:none">
                        <?php if($game_type_obj->string != "Archaeology"){ ?>
                            <label class="mdc-typography--subheading2 mdc-theme--text-primary">Scene type</label>
                        <?php } ?>
                        <!--Scene Type-->
                        <?php if($game_type_obj->string === "Chemistry"){ ?>
                            <ul>
                                <li class="mdc-form-field">
                                    <div class="mdc-radio">
                                        <input class="mdc-radio__native-control" type="radio" id="sceneType2DRadio" name="sceneTypeRadio" value="2d">
                                        <div class="mdc-radio__background">
                                            <div class="mdc-radio__outer-circle"></div>
                                            <div class="mdc-radio__inner-circle"></div>
                                        </div>
                                    </div>
                                    <label id="sceneType2DRadio-label" for="sceneType2DRadio" style="padding: 0; margin: 0;">Molecule Naming</label>
                                </li>
                                &nbsp;
                                <li class="mdc-form-field">
                                    <div class="mdc-radio">
                                        <input class="mdc-radio__native-control" type="radio" id="sceneType3DRadio" checked="" name="sceneTypeRadio" value="3d">
                                        <div class="mdc-radio__background">
                                            <div class="mdc-radio__outer-circle"></div>
                                            <div class="mdc-radio__inner-circle"></div>
                                        </div>
                                    </div>
                                    <label id="sceneType3DRadio-label" for="sceneType3DRadio" style="padding: 0; margin: 0;">Molecule Construction</label>
                                </li>
                                &nbsp;
                                <li class="mdc-form-field">
                                    <div class="mdc-radio">
                                        <input class="mdc-radio__native-control" type="radio" id="sceneTypeLabRadio" checked="" name="sceneTypeRadio" value="lab">
                                        <div class="mdc-radio__background">
                                            <div class="mdc-radio__outer-circle"></div>
                                            <div class="mdc-radio__inner-circle"></div>
                                        </div>
                                    </div>
                                    <label id="sceneTypeLabRadio-label" for="sceneTypeLabRadio" style="padding: 0; margin: 0;">Lab</label>
                                </li>
                            </ul>
                        <?php } ?>
                        
                        <?php if($game_type_obj->string === "Energy"){ ?>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox" id="regional-checkbox-component">
                                    <input name="regionalSceneCheckbox" type="checkbox" id="regional-scene-checkbox" class="mdc-checkbox__native-control">
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                <label class="" for="regional-scene-checkbox" style="padding: 0; margin: 0;">Regional scene</label>
                            </div>
                        <?php } ?>
                    </section>

                    <!-- ADD NEW SCENE BUTTON -->
                    <section class="mdc-card__primary" style="padding:0px;">
                        <button style="float:right; background-image:none;" class="mdc-button--raised mdc-button mdc-button-primary"
                                data-mdc-auto-init="MDCRipple" type="submit">
                            ADD NEW
                        </button>
                    </section>

                </div>
            </form>
        </div>
    
    <?php } ?>

        <!--Delete Scene Dialog-->
        <aside id="delete-dialog"
               class="mdc-dialog"
               role="alertdialog"
               style="z-index: 1000;"
               aria-labelledby="Delete scene dialog"
               aria-describedby="You can delete the selected from the current game project" data-mdc-auto-init="MDCDialog">
            <div class="mdc-dialog__surface">
                <header class="mdc-dialog__header">
                    <h2 id="delete-dialog-title" class="mdc-dialog__header__title">
                        Delete scene?
                    </h2>
                </header>
                <section id="delete-dialog-description" class="mdc-dialog__body">
                    Are you sure you want to delete this scene? There is no Undo functionality once you delete it.
                </section>

                <section id="delete-scene-dialog-progress-bar" class="CenterContents mdc-dialog__body" style="display: none;">
                    <h3 class="mdc-typography--title">Deleting...</h3>

                    <div class="progressSlider">
                        <div class="progressSliderLine"></div>
                        <div class="progressSliderSubLine progressIncrease"></div>
                        <div class="progressSliderSubLine progressDecrease"></div>
                    </div>
                </section>

                <footer class="mdc-dialog__footer">
                    <a class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button" id="deleteSceneDialogCancelBtn">Cancel</a>
                    <a class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-button--raised" id="deleteSceneDialogDeleteBtn">Delete</a>
                </footer>
            </div>
            <div class="mdc-dialog__backdrop"></div>
        </aside>
    
    <?php endif;
    wp_reset_query();
    ?>
    <!--    End of Scenes-->

    </div>   <!-- Scenes List Div -->

</div>   <!--   VR DIV   -->




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
    envir.is2d = true;

    // Controls with axes (Transform, Rotate, Scale)
    var transform_controls = new THREE.TransformControls( envir.renderer.domElement );
    transform_controls.name = 'myTransformControls';

    jQuery("#hierarchy-toggle-btn").click(function() {

        if (jQuery("#hierarchy-toggle-btn").hasClass("HierarchyToggleOn")) {

            jQuery("#hierarchy-toggle-btn").addClass("HierarchyToggleOff").removeClass("HierarchyToggleOn");
        } else {
            jQuery("#hierarchy-toggle-btn").addClass("HierarchyToggleOn").removeClass("HierarchyToggleOff");
        }

        jQuery("#right-elements-panel").toggle("slow");
    });

    //------------- File Browser Toolbar close button -------------

    jQuery("#bt_close_file_toolbar").click(function() {

        if (jQuery("#bt_close_file_toolbar").hasClass("AssetsToggleOn")) {

            jQuery("#bt_close_file_toolbar").addClass("AssetsToggleOff").removeClass("AssetsToggleOn");
        } else {

            jQuery("#bt_close_file_toolbar").addClass("AssetsToggleOn").removeClass("AssetsToggleOff");
        }

        jQuery("#fileBrowserToolbar").toggle("slow");
        jQuery("#filemanager").toggle("slow");
        
    });

    //------------- Scenes List Toolbar close button -------------

    jQuery("#scenesList-toggle-btn").click(function() {

        if (jQuery("#scenesList-toggle-btn").hasClass("scenesListToggleOn")) {

            jQuery("#scenesList-toggle-btn").addClass("scenesListToggleOff").removeClass("scenesListToggleOn");
        } else {

            jQuery("#scenesList-toggle-btn").addClass("scenesListToggleOn").removeClass("scenesListToggleOff");
        }

        jQuery("#scenesInsideVREditor").toggle("slow");
        

    });
    
    


    // var closeButton = jQuery('#bt_close_file_toolbar');
    //
    // closeButton.on('click', function(e){
    //     console.log("1111");
    //     // e.preventDefault();
    //
    //     // if (fileList[0].style.display === "") {
    //     //     fileList[0].style.display = 'none';
    //     //     fileList[0].style.height = '0';
    //     //     filemanager[0].style.height = '0';
    //     //     // closeButton[0].innerHTML = 'Open';
    //     // } else {
    //     //     fileList[0].style.display = '';
    //     //     fileList[0].style.height = '27vw';
    //     //     filemanager[0].style.height = 'auto';
    //     //     // closeButton[0].innerHTML = 'Close';
    //     // }
    //
    // });

    jQuery("#object-manipulation-toggle").click(function() {
        
        console.log("categoryName", transform_controls.object.categoryName);
        
        // Sun and Target spot can not change control manipulation mode
        if (transform_controls.object.categoryName.includes("lightTargetSpot") ||
            transform_controls.object.categoryName.includes("lightSun")){
            return;
        }
        
        var value = jQuery("input[name='object-manipulation-switch']:checked").val();
        transform_controls.setMode(value);
        showObjectPropertiesPanel(value);
    });

    jQuery("#removeAssetBtn").click(function(){
        deleterFomScene(transform_controls.object.name);
    });

    jQuery("#axis-size-increase-btn").click(function() {
        transform_controls.setSize( transform_controls.size * 1.1 );
    });

    jQuery("#axis-size-decrease-btn").click(function() {
        transform_controls.setSize( Math.max(transform_controls.size * 0.9, 0.1 ) );
    });

    jQuery("#dim-change-btn").click(function() {

        jQuery("#translate-switch").click();

        if (envir.is2d) {
            //3d
            envir.orbitControls.enableRotate = true;
            envir.gridHelper.visible = true;
            envir.axisHelper.visible = true;

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
            envir.axisHelper.visible = false;

            jQuery("#object-manipulation-toggle")[0].style.display = "none";
            jQuery("#dim-change-btn").text("2D").attr("title", "2D mode");

            envir.is2d = true;
            transform_controls.setMode("rottrans");

            envir.scene.getObjectByName("SteveOld").visible = false;
            envir.scene.getObjectByName("Steve").visible = true;
        }

        findSceneDimensions();
        envir.updateCameraGivenSceneLimits();
        
        envir.orbitControls.object.updateProjectionMatrix();
        jQuery("#dim-change-btn").toggleClass('mdc-theme--secondary-bg');
    });


    //var firstPersonBlocker = document.getElementById('firstPersonBlocker');
    var firstPersonBlockerBtn = document.getElementById('firstPersonBlockerBtn');

    firstPersonBlockerBtn.addEventListener('click', function (event) {

        //firstPersonBlockerBtn.style.display = 'none';

        //var element = document.body;

        // Ask the browser to lock the pointer
        // element.requestPointerLock = element.requestPointerLock || element.mozRequestPointerLock || element.webkitRequestPointerLock;
        // element.requestPointerLock();

        firstPersonViewWithoutLock();
        jQuery("#firstPersonBlockerBtn").toggleClass('mdc-theme--secondary-bg');

    }, false);

    // // // First person view
    // jQuery('#toggleUIBtn').click(function() {
    //     var btn = jQuery('#toggleUIBtn');
    //     var icon = jQuery('#toggleUIBtn i');
    //
    //     if (btn.data('toggle') === 'on') {
    //
    //         btn.addClass('mdc-theme--text-hint-on-light');
    //         btn.removeClass('mdc-theme--secondary');
    //         icon.html('<i class="material-icons">visibility_off</i>');
    //         btn.data('toggle', 'off');
    //         hideEditorUI();
    //
    //     } else {
    //         btn.removeClass('mdc-theme--text-hint-on-light');
    //         btn.addClass('mdc-theme--secondary');
    //         icon.html('<i class="material-icons">visibility</i>');
    //         btn.data('toggle', 'on');
    //
    //         showEditorUI();
    //     }
    // });


    // Toggle 3rd person view
    jQuery('#thirdPersonBlockerBtn').click(function() {

        envir.thirdPersonView = true;

        envir.scene.getObjectByName("SteveOld").visible = true;
        envir.scene.getObjectByName("Steve").visible = false;

        // var btnDiv = jQuery('#thirdPersonBlocker');
        // btnDiv[0].style.display = "none";

        var btnFirst = jQuery('#firstPersonBlockerBtn')[0];
        btnFirst.click();
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

    // Autor rotate in 3D
    jQuery('#toggle-tour-around-btn').click(function() {

        var btn = jQuery('#toggle-tour-around-btn');

        if (envir.is2d)
            jQuery("#dim-change-btn").click();


        if (btn.data('toggle') === 'off') {

            //console.log("ROTATING !!!");

            // envir.orbitControls.enableRotate = true;
            envir.orbitControls.autoRotate = true;
            envir.orbitControls.autoRotateSpeed = 0.6;

            btn.data('toggle', 'on');

        } else {

            envir.orbitControls.autoRotate = false;
            btn.data('toggle', 'off');
        }

        btn.toggleClass('mdc-theme--secondary-bg');
    });



    jQuery('#undo-scene-button').click(function() {

        jQuery('#undo-scene-button').html("...").addClass("LinkDisabled");

        post_revision_no += 1;
        
        wpunity_undoSceneAjax(UPLOAD_DIR, post_revision_no);
    });

    jQuery('#redo-scene-button').click(function() {

        if(post_revision_no>1)
            post_revision_no -= 1;
        
        jQuery('#redo-scene-button').html("...").addClass("LinkDisabled");

        wpunity_undoSceneAjax();
    });
    
    
    
    // Convert scene to json and put the json in the wordpress field wpunity_scene_json_input
    jQuery('#save-scene-button').click(function() {

        jQuery('#save-scene-button').html("Saving...").addClass("LinkDisabled");

        // Export using a custom variant of the old deprecated class SceneExporter
        var exporter = new THREE.SceneExporter();
        
        document.getElementById('wpunity_scene_json_input').value = exporter.parse(envir.scene);
        
        //console.log(document.getElementById('wpunity_scene_json_input').value);

        if(!is_scene_icon_manually_selected)
            takeScreenshot();

        wpunity_saveSceneAjax();
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
        //console.log(item, loaded, total);
        if (total >= 2)
            document.getElementById("result_download").innerHTML = "Loading " + (loaded-1) + " out of " + (total-2);
    };

    // When all are finished loading place them in the correct position
    manager.onLoad = function () {

        jQuery("#infophp").get(0).style.visibility= "hidden";

        var objItem;
        var trs_tmp;
        var name;

        
        for ( name in resources3D  ) {
            trs_tmp = resources3D[name]['trs'];
            objItem = envir.scene.getObjectByName(name);
           //if (name != 'avatarYawObject' && typeof objItem !== "undefined") {
                // objItem.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
                // objItem.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
                //objItem.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);
            //}
        }

        // In the case the last asset is missing then put controls on the camera
        if (typeof objItem === "undefined"){
            name = 'avatarYawObject';
            trs_tmp = resources3D[name]['trs'];
            objItem = envir.scene.getObjectByName(name);
        }
        
        
        // place controls to last inserted obj
        if (typeof objItem !== "undefined") {
            
            transform_controls.attach(objItem);

            // highlight
            envir.outlinePass.selectedObjects = [objItem];

            envir.scene.add(transform_controls);

            if (selected_object_name != 'avatarYawObject') {
                transform_controls.object.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
                transform_controls.object.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
                transform_controls.object.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);
            }

            jQuery('#object-manipulation-toggle').show();
            jQuery('#axis-manipulation-buttons').show();
            jQuery('#double-sided-switch').show();
            showObjectPropertiesPanel(transform_controls.getMode());

            selected_object_name = name;

            transform_controls.setMode("rottrans");

            if (selected_object_name != 'avatarYawObject') {
                var dims = findDimensions(transform_controls.object);
                var sizeT = Math.max(...dims);
                jQuery("#removeAssetBtn").show();
                transform_controls.children[6].handleGizmos.XZY[0][0].visible = true;
                
                if (selected_object_name.includes("lightSun")){
                    transform_controls.children[6].children[0].children[1].visible = false; // ROTATE GIZMO: Sun can not be rotated
                }
                
            } else {
                var sizeT = 1;
                transform_controls.children[6].handleGizmos.XZY[0][0].visible = false;
                jQuery("#removeAssetBtn").hide();
            }

            transform_controls.setSize( sizeT > 1 ? sizeT : 1 );
        }

        // Find scene dimension in order to configure camera in 2D view (Y axis distance)
        findSceneDimensions();
        envir.updateCameraGivenSceneLimits();
        
        envir.setHierarchyViewer();
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

</script>

<!-- Load Scene - javascript var resources3D[] -->
<?php require( "vr_editor_ParseJSON.php" );

    /* Initial load as php*/
    $formRes = new ParseJSON($UPLOAD_DIR);
    $formRes->init($sceneToLoad);
?>

<script>

    loaderMulti = new LoaderMulti();
    
    loaderMulti.load(manager, resources3D);
    
    if (!isUserAdmin)
        document.getElementById("vr_editor_main_div").style.top = "28px";
   
    
    // Only in Undo redo as javascript not php!
    function parseJSON_LoadScene(scene_json){

        resources3D = parseJSON_javascript(scene_json, UPLOAD_DIR);
        
        // CLEAR SCENE
        //var keepNames = ['myAxisHelper', 'myGridHelper', 'orbitCamera', 'avatarYawObject', 'myTransformControls'];

        var mAh = envir.scene.getObjectByName('myAxisHelper');
        var mGH = envir.scene.getObjectByName('myGridHelper');
        var oc = envir.scene.getObjectByName('orbitCamera');
        var aYO = envir.scene.getObjectByName('avatarYawObject');
        var mTC = envir.scene.getObjectByName('myTransformControls');
        
        
        while(envir.scene.children.length > 0){
            envir.scene.remove(envir.scene.children[0]);
        }
        
        envir.scene.add(mAh);
        envir.scene.add(mGH);
        envir.scene.add(oc);
        envir.scene.add(aYO);
        envir.scene.add(mTC);
        
        envir.setHierarchyViewer();

        transform_controls = envir.scene.getObjectByName('myTransformControls');
        
        transform_controls.attach(envir.scene.getObjectByName("avatarYawObject"));
        
        //console.log(transform_controls.children[4].handleGizmos); //.XZY[0][0].visible = false;
        
        jQuery("#removeAssetBtn").hide();

        loaderMulti = new LoaderMulti();
        loaderMulti.load(manager, resources3D);
    }
    
    
    function takeScreenshot(){

        //envir.cameraAvatarHelper.visible = false;
        //envir.axisHelper.visible = false;
        //envir.gridHelper.visible = false;
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


    //=================== End of loading ============================================
    //--- initiate PointerLockControls ---------------
    initPointerLock();

    //--------------------------- UPDATERS ---------------------------------------------------------------------
    // ANIMATE

    function animate()
    {
        if(isPaused)
            return;

        id_animation_frame = requestAnimationFrame( animate );
        
        // Select the proper camera (orbit, or avatar, or thirdPersonView)
        var curr_camera = avatarControlsEnabled ? (envir.thirdPersonView ? envir.cameraThirdPerson : envir.cameraAvatar) : envir.cameraOrbit;
        
        // Render it
        envir.renderer.render( envir.scene, curr_camera);

        envir.labelRenderer.render( envir.scene, curr_camera);

        if (isComposerOn)
            envir.composer.render();

        // Update it
        update();
    }

    // UPDATE
    function update()
    {
        var i;

        envir.orbitControls.update();

        updatePointerLockControls();

        transform_controls.update(); // update the axis controls based on the browse controls
        //envir.stats.update();

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


    var mapActions = {}; // You could also use an array
    function saveScene(e) {
        // console.log("Event", event.type);
        // console.log("Saved time: " + Date.now());

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
        var clickEvent = document.createEvent ('MouseEvents');
        clickEvent.initEvent ("mouseup", true, true);
        jQuery("#vr_editor_main_div canvas").get(0).dispatchEvent(clickEvent);
    }
    
    
    // Select event listener
    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'dblclick', onMouseDoubleClickFocus, false );

    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'mouseup', saveScene, false );

    // Capture save events on scene: envir.scene.dispatchEvent({type:"save"});
    envir.scene.addEventListener("modificationPendingSave", saveScene);

    // To detect enter button press for saving scene
    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'keypress', saveScene, false );
    
    
    /*jQuery("#vr_editor_main_div").get(0).addEventListener( 'mousedown', onMouseDown );*/
    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'mousedown', onMouseSelect, false );

    jQuery("#vr_editor_main_div canvas").get(0).addEventListener( 'contextmenu', contextMenuClick, false );

    jQuery("#popUpArtifactPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popUpDoorPropertiesDiv").bind('contextmenu', function(e) { return false; });

    jQuery("#popUpPoiImageTextPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popUpPoiVideoPropertiesDiv").bind('contextmenu', function(e) { return false; });
    jQuery("#popSunPropertiesDiv").bind('contextmenu', function(e) { return false; });

    jQuery("#pauseRendering").get(0).addEventListener('mousedown', function (event) {

        isPaused = !isPaused;
        jQuery("#pauseRendering").get(0).childNodes[1].innerText = isPaused?"play_arrow":"pause";

        if(!isPaused)
            animate();

    }, false);

    animate();

</script>



<?php
//echo get_post_meta($_GET['wpunity_scene'], "wpunity_scene_environment")[0];
echo '<script>';
echo 'envir.sceneType="'.get_post_meta($_GET['wpunity_scene'], "wpunity_scene_environment")[0].'";';
echo '</script>';
?>

<!-- Change dat GUI style: Override the inside js style -->
<link rel="stylesheet" type="text/css" href="<?php echo $PLUGIN_PATH_VR?>/css/dat-gui.css">
