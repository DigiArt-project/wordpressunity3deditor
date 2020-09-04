<script type="text/javascript">

    // Drag and drop 3D objects into scene for INSERT
    function drop_handler(ev) {

        let dataDrag = JSON.parse(ev.dataTransfer.getData("text"));
        let categoryName = dataDrag.categoryName;
        let nameModel = dataDrag.title;

        // SUN or LAMP or Spot
        if(dataDrag.categoryName==="lightSun" ||
            dataDrag.categoryName==="lightLamp" ||
            dataDrag.categoryName==="lightSpot"){

            var path = objFname = mtlFname = '';
            dataDrag.objID = dataDrag.mtlID = dataDrag.assetid = dataDrag.categoryIcon = '';
            
            dataDrag.categoryID = dataDrag.diffImages = dataDrag.diffImageIDs = dataDrag.image1id = dataDrag.doorName_source = '';
            dataDrag.doorName_target = dataDrag.sceneName_target = dataDrag.sceneID_target = dataDrag.archaeology_penalty = '';
            dataDrag.hv_penalty = dataDrag.natural_penalty = '';
            dataDrag.isreward = dataDrag.isCloned = dataDrag.isJoker = 0;
            
        } else {

            var path     = dataDrag.obj.substring(0, dataDrag.obj.lastIndexOf("/") + 1);
            var objFname = dataDrag.obj.substring(dataDrag.obj.lastIndexOf("/") + 1);
            var mtlFname = dataDrag.mtl.substring(dataDrag.mtl.lastIndexOf("/") + 1);
        }

        let translation = dragDropVerticalRayCasting(ev);
        
        // Asset add to canvas
        addAssetToCanvas(nameModel, path, objFname,  mtlFname, categoryName, dataDrag, translation, pluginPath);

        // Show options
        jQuery('#object-manipulation-toggle').show();
        jQuery('#axis-manipulation-buttons').show();

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
    // End of drag n drop
</script>


<!-- 3D editor  -->
<div id="vr_editor_main_div" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">

    <!-- Close all 2D UIs-->
    <a id="toggleUIBtn" data-toggle='on' type="button"
       class="ToggleUIButtonStyle mdc-theme--secondary" title="Toggle interface">
        <i class="material-icons" style="background: #ffffff; opacity:0.2">visibility</i>
    </a>

    <!-- Lights -->
    <div class="lightcolumns hidable">
        <div class="lightcolumn" data-light="Sun" draggable="true">
            <header draggable="false">Sun</header><img draggable="false"
                                                       src="<?php echo $pluginpath?>/images/lights/sun.png" class="lighticon"/>
        </div>
        <div class="lightcolumn" data-light="Lamp" draggable="true">
            <header draggable="false">Lamp</header><img draggable="false"
                                                        src="<?php echo $pluginpath?>/images/lights/lamp.png" draggable="false" class="lighticon"/>
        </div>
        <div class="lightcolumn" data-light="Spot" draggable="true"><header draggable="false">Spot</header>
            <img draggable="false" src="<?php echo $pluginpath?>/images/lights/spot.png" draggable="false"
                 class="lighticon"/>
        </div>
    </div>

    <!-- Remove game object from scene -->
    <a type="button" id="removeAssetBtn"
       class="RemoveAssetFromSceneBtnStyle hidable mdc-button mdc-button--raised mdc-button--primary mdc-button--dense"
       title="Remove selected asset from the scene" data-mdc-auto-init="MDCRipple">
        <i class="material-icons">delete</i>
    </a>

    <!--  Open/Close Right Hierarchy panel-->
    <a id="hierarchy-toggle-btn" data-toggle='on' type="button"
       class="HierarchyToggleStyle HierarchyToggleOn hidable mdc-button mdc-button--raised mdc-button--primary mdc-button--dense"
       title="Toggle hierarchy viewer" data-mdc-auto-init="MDCRipple">
        <i class="material-icons">menu</i>
    </a>

    <!-- Right Panel -->
    <div id="right-elements-panel" class="right-elements-panel-style">

        <!-- Title -->
        <div id="vr_editor_right_panel_title" class="row-right-panel">Scene controls</div>

        <!-- Cogwheel options -->
        <div id="row_cogwheel" class="row-right-panel">
            <a type="button" id="optionsPopupBtn"
               class="VrEditorOptionsBtnStyle mdc-button mdc-button--raised mdc-button--primary mdc-button--dense"
               title="Edit scene options" data-mdc-auto-init="MDCRipple">
                <i class="material-icons">settings</i>
            </a>
        </div>

        <!-- 4 Buttons in a row -->
        <div id="row2" class="row-right-panel">

            <!--  Toggle Around Tour -->
            <a type="button" id="toggle-tour-around-btn" data-toggle='off' data-mdc-auto-init="MDCRipple"
               title="Auto-rotate 3D tour"
               class="EditorTourToggleBtn mdc-button mdc-button--raised mdc-button--dense mdc-button--primary">
                <i class="material-icons">rotate_90_degrees_ccw</i>
            </a>

            <!--  Dimensionality 2D 3D toggle -->
            <a id="dim-change-btn" data-mdc-auto-init="MDCRipple"
               title="Toggle between 2D mode (top view) and 3D mode (view with angle)."
               class="EditorDimensionToggleBtn mdc-button mdc-button--raised mdc-button--dense mdc-button--primary">
                2D
            </a>

            <!-- The button to start walking in the 3d environment -->
            <div id="firstPersonBlocker" class="VrWalkInButtonStyle">
                <a type="button" id="firstPersonBlockerBtn" data-toggle='on'
                   class="mdc-button mdc-button--dense mdc-button--raised mdc-button--primary"
                   title="Change camera to First Person View - Move: W,A,S,D,Q,E,R,F keys"
                   data-mdc-auto-init="MDCRipple">
                    VIEW
                </a>
            </div>

            <!-- Third person button -->
            <a type="button" id="thirdPersonBlockerBtn"
               class="ThirdPersonVrWalkInButtonStyle mdc-button mdc-button--dense mdc-button--raised mdc-button--primary"
               title="Change camera to Third Person View - Move: W,A,S,D,Q,E keys, Orientation: Mouse"
               data-mdc-auto-init="MDCRipple">
                <i class="material-icons">person</i>
            </a>
        </div>

        <!--  Object Controls T,R,S -->
        <div id="row3" class="row-right-panel" style="display:block">

            <div style="padding-left:5px; padding-top:10px;"> Object controls</div>

            <!-- Translate, Rotate, Scale Buttons -->
            <div id="object-manipulation-toggle"
                 class="ObjectManipulationToggle mdc-typography" style="display: none;">
                <!-- Translate -->
                <input type="radio" id="translate-switch" name="object-manipulation-switch" value="translate" checked/>
                <label for="translate-switch">Move</label>
                <!-- Rotate -->
                <input type="radio" id="rotate-switch" name="object-manipulation-switch" value="rotate" />
                <label for="rotate-switch">Rotate</label>
                <!-- Scale -->
                <input type="radio" id="scale-switch" name="object-manipulation-switch" value="scale" />
                <label for="scale-switch">Scale</label>
            </div>
        </div>

        <!-- Numerical input for Move rotate scale -->
        <div id="row4" class="row-right-panel">
            <div id="numerical_gui-container" class="VrGuiContainerStyle mdc-typography mdc-elevation--z1"></div>
        </div>

        <!--  Axes resize -->
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
        <a id="pauseRendering" class="mdc-button mdc-button--dense mdc-button--raised mdc-button--primary"
           title="Pause rendering" data-mdc-auto-init="MDCRipple">
            <i class="material-icons">play_arrow</i>
        </a>
    </div>


    <!--  Make form to submit user changes -->
    <div id="infophp" class="VrInfoPhpStyle" style="visibility: visible">
        <div id="progress" class="ProgressContainerStyle mdc-theme--text-primary-on-light mdc-typography--subheading1">
        </div>

        <div id="result_download" class="result"></div>
        <div id="result_download2" class="result"></div>
    </div>


    <!--  Asset browse Left panel  -->

    <!-- Open/Close button-->
    <a id="bt_close_file_toolbar" data-toggle='on' type="button"
       class="AssetsToggleStyle AssetsToggleOn hidable mdc-button mdc-button--raised mdc-button--primary mdc-button--dense mdc-ripple-upgraded"
       title="Toggle asset viewer" data-mdc-auto-init="MDCRipple">
        <i class="material-icons">menu</i>
    </a>

    <!-- The panel -->
    <div class="filemanager" id="assetBrowserToolbar">

        <!-- Categories of assets -->
        <div id="assetCategTab">
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
           href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) .
               $parameter_pass . $project_id . '&wpunity_scene=' .  $current_scene_id. '&scene_type=scene'); ?>">
            <i class="material-icons" style="cursor: pointer; font-size:54px; color:orangered; ">add_circle</i>
        </a>

    </div>
    
    <?php include 'vr_editor_popups.php'; ?>

    <!--  Open/Close Scene list panel-->
    <a id="scenesList-toggle-btn" data-toggle='on' type="button" class="scenesListToggleStyle scenesListToggleOn hidable mdc-button mdc-button--raised mdc-button--primary mdc-button--dense" title="Toggle scenes list" data-mdc-auto-init="MDCRipple">
        <i class="material-icons" style="margin:auto">menu</i>
    </a>

    <!-- Scenes Credits and Main menu List -->
    <div id="scenesInsideVREditor" class="" style="">
        
        <?php $custom_query = getProjectScenes($allScenePGameID);?>
        
        <?php if ( $custom_query->have_posts() ) :
            while ( $custom_query->have_posts() ) :
                
                $custom_query->the_post();
                $scene_id = get_the_ID();
                $scene_title = get_the_title();
                $scene_desc = get_the_content();
                $is_regional = get_post_meta($scene_id,'wpunity_isRegional', true);
                $current_card_bg = $current_scene_id == $scene_id ? 'mdc-theme--primary-light-bg' : '';
                $scene_type = get_post_meta( $scene_id, 'wpunity_scene_metatype', true );
                
                $default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true );
                
                //create permalink depending the scene yaml category
                $edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
                
                if($scene_type == 'sceneExam2d' ||  $scene_type == 'sceneExam3d'){
                    $edit_scene_page_id = $editsceneExamPage[0]->ID;
                }
                
                $url_redirect_delete_scene = get_permalink($edit_scene_page_id) . $parameter_Scenepass .
                    $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . $scene_type;
                
                if($scene_type !== 'menu' && $scene_type !== 'credits') {
                    if ($default_scene) {
                        echo '<script>';
                        echo 'var url_scene_redirect="' . $url_redirect_delete_scene . '";'; // not possible with escape
                        echo '</script>';
                    }
                }
                
                $edit_page_link = esc_url( $url_redirect_delete_scene );
                
                ?>

                <div id="scene-<?php echo $scene_id; ?>" class="SceneCardContainer">
                    <div class="sceneTab mdc-card mdc-theme--background <?php echo $current_card_bg;?> ">
                        <div class="SceneThumbnail">
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
                                 style="background:<?php echo $scene_id == $_GET['wpunity_scene'] ? 'lightgreen':'';?>">
                         <span id="<?php echo $scene_id;?>-title"
                               class="cardTitle mdc-card__title mdc-typography--title"
                               title="<?php echo $scene_title;?>">
                             <a class="mdc-theme--primary"
                                href="<?php echo $edit_page_link; ?>">
                                 <?php echo $scene_title; ?>
                             </a>
                             <?php if ($is_regional) { ?>
                                 <i title="Regional scene"
                                    class="material-icons AlignIconToBottom CursorDefault mdc-theme--primary"
                                    style="float: right;">
                                     public
                                 </i>
                             <?php } ?>
                         </span>

                            <!-- Delete button for non-default scenes -->
                            <?php if (!$default_scene) { ?>
                                <a id="deleteSceneBtn" data-mdc-auto-init="MDCRipple"
                                   title="Delete scene"
                                   class="cardDeleteIcon mdc-button mdc-button--compact mdc-card__action"
                                   onclick="deleteScene(<?php echo $scene_id; ?>)">
                                    <i class="material-icons deleteIconMaterial">
                                        delete_forever
                                    </i>
                                </a>
                            <?php } ?>

                        </section>
                    </div>
                </div>
            <?php
            endwhile;
        endif;
        ?>

        <!-- Analytics key input card -->
        <?php include 'vr_editor_analytics.php';?>

        <!--ADD NEW SCENE card for all but Energy project that has fixed scenes-->
        <?php if($project_type !== "Energy") { ?>

            <div id="add-new-scene-card" class="SceneCardContainer">

                <form name="create_new_scene_form" action="" id="create_new_scene_form"
                      method="POST" enctype="multipart/form-data">
                    
                    <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>

                    <input type="hidden" name="submitted" id="submitted" value="true" />

                    <div class="mdc-card mdc-theme--secondary-light-bg">

                        <section class="mdc-card__primary" style="padding:8px;">
                            <!--Title-->
                            <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield"
                                 style="padding:0px; height:25px;">
                                <input id="title" name="scene-title" type="text"
                                       class="mdc-textfield__input mdc-theme--text-primary-on-secondary-light cardNewSceneInput"
                                       aria-controls="title-validation-msg" required minlength="3" maxlength="25">
                                <label for="title" class="mdc-textfield__label" style="font-size:12px;">Enter a scene title</label>
                                <div class="mdc-textfield__bottom-line"></div>
                            </div>
                        </section>

                        <section class="mdc-card__primary" style="display:none">
                            <!-- Chemistry has 3 new possible new Scene Types -->
                            <?php
                            if($project_type === "Chemistry"){
                                
                                $chemistryTypes = new stdClass();
                                $chemistryTypes->label = ['Molecule Naming','Molecule Construction','Lab'];
                                $chemistryTypes->id = ['sceneType2DRadio','sceneType3DRadio','sceneTypeLabRadio'];
                                $chemistryTypes->value = ['2d','3d','lab'];
                                
                                ?>
                                <label class="mdc-typography--subheading2 mdc-theme--text-primary">Scene type</label>
                                <ul>
                                    <?php for ($i=0; $i<3; $i++){?>
                                        <li class="mdc-form-field">
                                            <div class="mdc-radio">
                                                <input class="mdc-radio__native-control" type="radio"
                                                       id="<?php echo $chemistryTypes->id[$i];?>"
                                                       name="sceneTypeRadio"
                                                       value="<?php echo $chemistryTypes->value[$i];?>"
                                                >
                                                <div class="mdc-radio__background">
                                                    <div class="mdc-radio__outer-circle"></div>
                                                    <div class="mdc-radio__inner-circle"></div>
                                                </div>
                                            </div>
                                            <label id="<?php echo $chemistryTypes->id[$i];?>-label"
                                                   for="<?php echo $chemistryTypes->id[$i];?>" style="padding: 0; margin: 0;">
                                                <?php echo $chemistryTypes->label[$i];?>
                                            </label>
                                        </li>
                                        &nbsp;
                                    <?php } ?>

                                </ul>
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
               aria-describedby="You can delete the selected from the current game project"
               data-mdc-auto-init="MDCDialog">
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
                    <a class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button"
                       id="deleteSceneDialogCancelBtn">Cancel</a>
                    <a class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-button--raised"
                       id="deleteSceneDialogDeleteBtn">Delete</a>
                </footer>
            </div>
            <div class="mdc-dialog__backdrop"></div>
        </aside>
    </div>   <!-- Scenes List Div -->

</div>   <!--   VR DIV   -->


<!--    Start 3D with Javascript   -->
<script>
    // all 3d dom
    let container_3D_all = document.getElementById( 'vr_editor_main_div' );

    // Selected object name
    var selected_object_name = '';

    // Add gui to gui container_3D_all
    let guiContainer = document.getElementById('numerical_gui-container');
    guiContainer.appendChild(controlInterface.translate.domElement);
    guiContainer.appendChild(controlInterface.rotate.domElement);
    guiContainer.appendChild(controlInterface.scale.domElement);

    // camera, scene, renderer, lights, stats, floor, browse_controls are all children of CaveEnvironmentals instance
    var envir = new vr_editor_environmentals(container_3D_all);
    envir.is2d = true;

    // Controls with axes (Transform, Rotate, Scale)
    var transform_controls = new THREE.TransformControls( envir.renderer.domElement );
    transform_controls.name = 'myTransformControls';

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

    jQuery("#removeAssetBtn").click(function(){
        deleterFomScene(transform_controls.object.name);
    });

    jQuery("#axis-size-increase-btn").click(function() {
        transform_controls.setSize( transform_controls.size * 1.1 );
    });

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

    
    // Toggle 3rd person view
    jQuery('#thirdPersonBlockerBtn').click(function() {

        envir.thirdPersonView = true;

        envir.scene.getObjectByName("SteveOld").visible = true;
        envir.scene.getObjectByName("Steve").visible = false;

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

    // Load all 3D including Steve
    var loaderMulti;

    // id of animation frame is used for canceling animation when dat-gui changes
    var id_animation_frame;

    var resources3D  = [];// This holds all the resources to load. Generated in Parse JSON

    // Load Manager
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

        
        // Get the last inserted object
        for ( name in resources3D  ) {
            trs_tmp = resources3D[name]['trs'];
            objItem = envir.scene.getObjectByName(name);
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
                
                if (selected_object_name.includes("lightSun") || selected_object_name.includes("lightLamp") ||
                    selected_object_name.includes("lightSpot")){
                    transform_controls.children[6].children[0].children[1].visible = false; // ROTATE GIZMO: Sun and lamp can not be rotated
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


        // Set Target light for Spots
        for (var n in resources3D) {
            (function (name) {
                if (resources3D[name]['categoryName'] === 'lightSpot') {
                    var lightSpot = envir.scene.getObjectByName(name);
                    lightSpot.target = envir.scene.getObjectByName(resources3D[name]['lighttargetobjectname']);
                }
            })(n);
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

</script>

<!-- Load Scene - javascript var resources3D[] -->
<?php require( "vr_editor_ParseJSON.php" );

    /* Initial load as php*/
    $formRes = new ParseJSON($upload_url);
    $formRes->init($sceneToLoad);
?>

<script>

    loaderMulti = new LoaderMulti();
    
    loaderMulti.load(manager, resources3D, pluginPath);
    
    
    
    // Only in Undo redo as javascript not php!
    function parseJSON_LoadScene(scene_json){

        resources3D = parseJSON_javascript(scene_json, uploadDir);
        
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

        if (envir.isComposerOn)
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
        var clickEvent = document.createEvent ('MouseEvents');
        clickEvent.initEvent ("mouseup", true, true);
        jQuery("#vr_editor_main_div canvas").get(0).dispatchEvent(clickEvent);
    }
    
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
    
    // Pause rendering (to cool down the machine sometimes)
    jQuery("#pauseRendering").get(0).addEventListener('mousedown', function (event) {
        pauseClickFun();
    }, false);
    
    function pauseClickFun(){
        isPaused = !isPaused;
        jQuery("#pauseRendering").get(0).childNodes[1].innerText = isPaused?"pause":"play_arrow";

        if(!isPaused) {
            animate();
            document.getElementById('pauseRendering').style.background = '';
        }else {
            document.getElementById('pauseRendering').style.background = 'red';
        }
    }
    
    animate();

</script>

<?php
//echo get_post_meta($_GET['wpunity_scene'], "wpunity_scene_environment")[0];
$sceneType = get_post_meta($_GET['wpunity_scene'], "wpunity_scene_environment");
if (count($sceneType)>0) {
    echo '<script>';
    echo 'envir.sceneType="' . $sceneType[0] . '";';
    echo '</script>';
}
?>

<!-- Change dat GUI style: Override the inside js style -->
<link rel="stylesheet" type="text/css" href="<?php echo $pluginpath?>/css/dat-gui.css">
