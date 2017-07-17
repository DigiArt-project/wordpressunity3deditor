<!-- For some reason these scripts can not be enqued : Try again when php -> js -->
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/TransformControls.js"></script>
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/PointerLockControls.js"></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/dat.gui.js'></script>
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/stats.min.js'></script>

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
echo 'PLUGIN_PATH_VR="'.$PLUGIN_PATH_VR.'";';
echo 'UPLOAD_DIR="'.wp_upload_dir()['baseurl'].'";';
echo 'scenefolder="'.$scenefolder.'";';
echo 'gamefolder="'.$gamefolder.'";';
echo 'sceneID="'.$sceneID.'";';
echo 'gameProjectID="'.$project_id.'";';
echo 'gameProjectSlug="'.$projectGameSlug.'";';
echo 'isAdmin="'.$isAdmin.'";';
echo '</script>';

?>

<!-- Todo: put these js libraries in wp_register -->
<!-- JS libraries -->
<!--<link rel="import" href="--><?php //echo $PLUGIN_PATH_VR?><!--/includes/vr_editor_header_js.html">-->

<!-- 3rd party libraries -->
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/jquery/jquery-ui1.11.4.min.js"></script>


<!-- 3rd Party with some customizations -->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/threejs79/THREEx.WindowResize.js'></script>

<!--  My libraries  -->
<!-- Scene Environmentals -->
<script src='../wp-content/plugins/wordpressunity3deditor/js_libs/vr_editor_environmentals.js'></script>

<!-- Handle keyboard buttons shortcuts -->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/keyButtons.js'></script>

<!-- Functions for controllers (axes, dat.gui, phpForm) -->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/auxControlers.js'></script>

<!-- Load multiple objs -->
<script type="text/javascript" src='../wp-content/plugins/wordpressunity3deditor/js_libs/LoaderMulti.js'></script>

<!-- Controls for walking in the model -->
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/movePointerLocker.js"></script>

<!-- Add one more item -->
<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/addRemoveOne.js"></script>

<script type="text/javascript">

    //  Save Button implemented with Ajax
    jQuery(document).ready(function(){

        var vr_editor = jQuery('#vr_editor_main_div');
        var cw = vr_editor.width();
        vr_editor.css({'height':cw*2/3+'px'});

        envir.SCREEN_WIDTH = envir.container_3D_all.clientWidth; // 500; //window.innerWidth;
        envir.SCREEN_HEIGHT = envir.container_3D_all.clientHeight; // 500; //window.innerHeight;
        envir.renderer.setSize(envir.SCREEN_WIDTH, envir.SCREEN_HEIGHT);

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

        wpunity_fetchSceneAssetsAjax(isAdmin, gameProjectSlug, gameProjectID, gamefolder, scenefolder, sceneID);
    });

    // Convert scene to json and put the json in the wordpress field wpunity_scene_json_input
    function save_scene(){

        document.getElementById('save-scene-button').style.backgroundColor = 'green';

        // Export using a custom variant of the old deprecated class SceneExporter
        var exporter = new THREE.SceneExporter();
        document.getElementById('wpunity_scene_json_input').value = exporter.parse(envir.scene);
        document.getElementById('wpunity_scene_theForm').submit();
        //document.getElementsByClassName("wpunity_scene_theForm")[0].submit();

        setInterval(function() {
            document.getElementById('save-scene-button').style.backgroundColor = 'black';
        } , 300);
    }


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
        var dataDrag =JSON.parse( ev.dataTransfer.getData("text"));

        var path =     dataDrag.obj.substring(0, dataDrag.obj.lastIndexOf("/")+1);

        var objFname = dataDrag.obj.substring(dataDrag.obj.lastIndexOf("/")+1);
        var mtlFname = dataDrag.mtl.substring(dataDrag.mtl.lastIndexOf("/")+1);

        var objID = dataDrag.objID;
        var mtlID = dataDrag.mtlID;

        var assetid = dataDrag.assetid;

        var categoryName = dataDrag.categoryName;
        var categoryID = dataDrag.categoryID;
        var diffImage = dataDrag.diffImage;

        var diffImageID = dataDrag.diffImageID;

        var image1id = dataDrag.image1id;

        // we take the behavior type from the path of the obj
        var slashesArr = allIndexOf("/", path);

        var type_behavior = path.substring(slashesArr[slashesArr.length-3]+1, slashesArr[slashesArr.length-2]);



        addOne(dataDrag.title, assetid, path, objFname, objID, mtlFname, mtlID,
            categoryName, categoryID, diffImage, diffImageID, image1id,
            envir.getSteveWorldPosition().x,
            envir.getSteveWorldPosition().y,
            envir.getSteveWorldPosition().z);

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

        envir.SCREEN_WIDTH = envir.container_3D_all.clientWidth; // 500; //window.innerWidth;
        envir.SCREEN_HEIGHT = envir.container_3D_all.clientHeight; // 500; //window.innerHeight;
        envir.ASPECT = envir.SCREEN_WIDTH / envir.SCREEN_HEIGHT;
        envir.renderer.setSize(envir.SCREEN_WIDTH, envir.SCREEN_HEIGHT);
    }


    window.addEventListener('resize', resize_handler, true);

    //===================== End of drag n drop for INSERT ========================================================
</script>

<!-- All go here -->
<div id="vr_editor_main_div" class="VrEditorMainStyle" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">

    <!-- TASOS ADDITION: Add new components - migrate from dat.gui-->

    <div id="object-manipulation-toggle" class="ObjectManipulationToggle mdc-typography">
        <input type="radio" id="translate-switch" name="object-manipulation-switch" value="translate" checked/>
        <label for="translate-switch">Move</label>
        <input type="radio" id="rotate-switch" name="object-manipulation-switch" value="rotate" />
        <label for="rotate-switch">Rotate</label>
        <input type="radio" id="scale-switch" name="object-manipulation-switch" value="scale" />
        <label for="scale-switch">Scale</label>
    </div>


    <!-- Controlling 3d items transition-rotation-scale (trs) -->
    <div id="dat-gui-container" class="VrGuiContainerStyle"></div>

    <!-- The button to start walking in the 3d environment -->
    <div id="blocker" class="VrWalkInButtonStyle">
        <div id="instructions" class="VrWalkInButtonTextStyle CenterContents">
            <span class="mdc-typography--subheading2">Walk In</span>
            <br>
            <span class="mdc-typography--caption">Move: W,A,S,D,Q,E keys</span>
            <br>
            <span class="mdc-typography--caption">Orientation: Mouse</span>
        </div>
    </div>

    <!--  Make form to submit user changes -->
    <div id="infophp" class="VrInfoPhpStyle">
        <div id="progress" class="ProgressContainerStyle mdc-theme--text-primary-on-light mdc-typography--subheading1">
            <span id="scene_loading_message">Downloading ...</span>
            <div id="progressbar">
                <div id="scene_loading_bar"></div>
            </div>
        </div>

        <div id="save-scene-button" class="bt_textify mdc-typography--caption" onclick="save_scene();">Save scene</div>

        <div class="result"></div>
        <div id="result_download"></div>
    </div>

    <!--  FileBrowserToolbar  -->
    <div class="filemanager" id="fileBrowserToolbar">

        <div class="mdc-textfield search">
            <input type="search" class="mdc-textfield__input mdc-typography--title" placeholder="Find an asset.." >
            <i class="material-icons mdc-theme--text-primary-on-background">search</i>
        </div>

        <div class="breadcrumbs"></div>

        <!--            <div class="nothingfound">-->
        <!--                <div class="nofiles"></div>-->
        <!--                <span>Nothing found</span>-->
        <!--            </div>-->

        <ul class="data mdc-list mdc-list--two-line mdc-list--avatar-list" id="filesList"></ul>

        <div class="bt_close_file_toolbar">
            Close
        </div>

    </div>

    <!-- Full screen bar button -->
    <div class="VrEditorFullscreenBtnBGStyle">
        <div class="VrEditorFullscreenBtnStyle" title="Toggle Full Screen" onclick="envir.makeFullScreen();">
            <i class="material-icons">fullscreen</i>
        </div>
    </div>

    <!-- Interface for Picking two overlapping objects -->
    <div id="popUpDiv">
        <select title="Select an object" id="popupSelect"></select>
    </div>

</div>


<!--    Start 3D    -->
<script>
    // all 3d dom
    var container_3D_all = document.getElementById( 'vr_editor_main_div' );

    // Selected object name
    var selected_object_name = '';

    // Add gui to gui container_3D_all
    var datguiContainer = document.getElementById('dat-gui-container');
    datguiContainer.appendChild(gui.domElement);

    // camera, scene, renderer, lights, stats, floor, browse_controls are all children of CaveEnvironmentals instance
    var envir = new vr_editor_environmentals(container_3D_all);

    // Controls with axes (Transform, Rotate, Scale)
    var transform_controls = new THREE.TransformControls( envir.cameraOrbit, envir.renderer.domElement );
    transform_controls.name = 'myTransformControls';
    transform_controls.addEventListener( 'change', checkForRecycle );
    envir.addCubeToControls(transform_controls);


    jQuery("#object-manipulation-toggle").click(function() {

        var value = jQuery("input[name='object-manipulation-switch']:checked").val();

        console.log(value);

        transform_controls.setMode(value);

    });


    // When Dat.Gui changes update php, javascript vars and transform_controls
    controllerDatGuiOnChange();

    // Is Recycle Bin deployed
    var isRecycleBinDeployed = false;

    /* The items in the recycle bin */
    var delArchive = [];

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
    manager.onLoad = function (){

        var objItem;
        var trs_tmp;
        var name;

        for (name in resources3D ) {

            trs_tmp = resources3D[name]['trs'];

            objItem = envir.scene.getObjectByName(name);

            objItem.position.set( trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
            objItem.rotation.set( trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
            objItem.scale.set( trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);
        }

        // place controls to last inserted obj
        if (objItem) {
            transform_controls.attach(objItem);
            envir.scene.add(transform_controls);

            transform_controls.object.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
            transform_controls.object.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
            transform_controls.object.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);

            selected_object_name = name;
        }
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

        // Update it
        update();


    }

    // UPDATE
    function update()
    {
        // Only for orbit ?
        //if (avatarControlsEnabled == false)
        envir.orbitControls.update();

        updatePointerLockControls();

        transform_controls.update();// update the axis controls based on the browse controls
        envir.stats.update();

        // light is from camera towards object
        envir.lightOrbit.position.copy(envir.orbitControls.object.position);
        envir.lightAvatar.position.copy(envir.avatarControls.getObject().position);
        envir.lightAvatar.position.y += 1.8;

        // Now update the translation and rotation input texts
        if (transform_controls.object != null){

            for (var i in gui.__controllers)
                gui.__controllers[i].updateDisplay();

            updatePositionsPhpAndJavsFromControlsAxes();
        }
    }
    // Select event listener
    jQuery("#vr_editor_main_div").get(0).addEventListener( 'mousedown', onMouseDown );

    animate();
</script>

<!-- Change dat GUI style: Override the inside js style -->
<link rel="stylesheet" type="text/css" href="<?php echo $PLUGIN_PATH_VR?>/css/dat-gui.css">