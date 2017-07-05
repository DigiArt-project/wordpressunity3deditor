<?php

// Three js : for simple rendering
wp_enqueue_script('wpunity_load_threejs');
wp_enqueue_script('wpunity_load_objloader');
wp_enqueue_script('wpunity_load_mtlloader');
wp_enqueue_script('wpunity_load_orbitcontrols');
wp_enqueue_script('wu_3d_view');


$create_new = 1;//1=NEW ASSET 0=EDIT ASSET
$perma_structure = get_option('permalink_structure') ? true : false;

$parameter_pass = $perma_structure ? '?wpunity_game=' : '&wpunity_game=';
$parameter_scenepass = $perma_structure ? '?wpunity_scene=' : '&wpunity_scene=';

$project_id = sanitize_text_field( intval( $_GET['wpunity_game'] ));
$asset_id = sanitize_text_field( intval( $_GET['wpunity_asset'] ));

$game_post = get_post($project_id);
$gameSlug = $game_post->post_name;
$game_type_obj = wpunity_return_game_type($project_id);

//Get 'parent-game' taxonomy with the same slug as Game
$assetPGame = get_term_by('slug', $gameSlug, 'wpunity_asset3d_pgame');
$assetPGameID = $assetPGame->term_id;
$assetPGameSlug = $assetPGame->post_name;

$scene_post = get_post($asset_id);
if($scene_post->post_type == 'wpunity_asset3d') {$create_new = 0;}

//$scene_post = get_post($scene_id);
//$sceneSlug = $scene_post->post_title;

$editgamePage = wpunity_getEditpage('game');
$allGamesPage = wpunity_getEditpage('allgames');

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	$assetCatID = $_POST['term_id'];

    $asset_taxonomies = array(
        'wpunity_asset3d_pgame' => array(
            $assetPGameID,
        ),
        'wpunity_asset3d_cat' => array(
            $assetCatID,
        )
    );

    $asset_information = array(
        'post_title' => esc_attr(strip_tags($_POST['assetTitle'])),
        'post_content' => esc_attr(strip_tags($_POST['assetDesc'])),
        'post_type' => 'wpunity_asset3d',
        'post_status' => 'publish',
        'tax_input' => $asset_taxonomies,
    );

    $asset_id = wp_insert_post($asset_information);
    update_post_meta( $asset_id, 'wpunity_asset3d_pathData', $gameSlug );

    $mtlFile = $_FILES['mtlFileInput'];
    $objFile = $_FILES['objFileInput'];
    $textureFile = $_FILES['textureFileInput'];


    if($asset_id) {
        //Upload All files as attachments of asset
        $mtlFile_id = wpunity_upload_Assetimg( $mtlFile, $asset_id, $gameSlug);
        $objFile_id = wpunity_upload_Assetimg( $objFile, $asset_id, $gameSlug);
        $textureFile_id = wpunity_upload_Assetimg( $textureFile, $asset_id, $gameSlug);

        //Set value of attachment IDs at custom fields
        update_post_meta( $asset_id, 'wpunity_asset3d_mtl', $mtlFile_id );
        update_post_meta( $asset_id, 'wpunity_asset3d_obj', $objFile_id );
        update_post_meta( $asset_id, 'wpunity_asset3d_diffimage', $textureFile_id );


        wp_redirect(esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ));
        exit;
    }




}

get_header(); ?>

    <div class="EditPageHeader">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Add category title & icon"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string; ?></span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>" title="Go back to Project editor">Project Editor</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">3D Asset Creator</span></li>
    </ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><span>Create a new 3D asset</span></h2>

    <form name="3dAssetForm" id="3dAssetForm" method="POST" enctype="multipart/form-data">

        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                <div id="category-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                    <i class="material-icons mdc-theme--text-icon-on-light">web_asset</i>&nbsp; <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Select a category</span>
                    <div class="mdc-simple-menu mdc-select__menu">
                        <ul class="mdc-list mdc-simple-menu__items">

                            <li class="mdc-list-item mdc-theme--text-primary-on-light" role="option" id="categories" aria-disabled="true" style="pointer-events: none;">
                                Select a category
                            </li>
							<?php
							$args = array('hide_empty' => false);
							$cat_terms = get_terms('wpunity_asset3d_cat', $args);
							foreach ( $cat_terms as $term ) { ?>

                                <li class="mdc-list-item" role="option" data-cat-desc="<?php echo $term->description; ?>" data-cat-slug="<?php echo $term->slug; ?>" id="<?php echo $term->term_id?>" tabindex="0">
									<?php echo $term->name; ?>
                                </li>

							<?php } ?>

                        </ul>
                    </div>
                </div>

            </div>
            <input id="termIdInput" type="hidden" name="term_id" value="">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <span class="mdc-typography--subheading2" id="categoryDescription"></span>
            </div>
        </div>

        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                <h3 id="physicsTitle" class="mdc-typography--title">Information</h3>

                <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input id="assetTitle" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="assetTitle"
                           aria-controls="title-validation-msg" required minlength="6" maxlength="25" style="box-shadow: none; border-color:transparent;">
                    <label for="assetTitle" class="mdc-textfield__label">
                        Enter a title for your asset
                </div>
                <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                   id="title-validation-msg">
                    Between 6 - 25 characters
                </p>

                <div id="assetDescription" class="mdc-textfield mdc-textfield--multiline" data-mdc-auto-init="MDCTextfield">
                    <textarea id="multi-line" class="mdc-textfield__input" rows="6" cols="40" style="box-shadow: none;" name="assetDesc" form="3dAssetForm"></textarea>
                    <label for="multi-line" class="mdc-textfield__label">Add a description</label>
                </div>

                <!-- FALLBACK: Use this if you cannot validate the above on submit -->
                <!--<select title="I am a title" class="mdc-select" required>
                    <option value="" default selected>Pick a food</option>
                    <option value="grains">Bread, Cereal, Rice, and Pasta</option>
                    <option value="vegetables">Vegetables</option>
                    <optgroup label="Fruits">
                        <option value="apple">Apple</option>
                        <option value="oranges">Orange</option>
                        <option value="banana">Banana</option>
                    </optgroup>
                    <option value="dairy">Milk, Yogurt, and Cheese</option>
                    <option value="meat">Meat, Poultry, Fish, Dry Beans, Eggs, and Nuts</option>
                    <option value="fats">Fats, Oils, and Sweets</option>
                </select>-->

                <hr class="WhiteSpaceSeparator">

                <div id="doorDetailsPanel">
                    <h3 class="mdc-typography--title">Door options</h3>

                    <div class="mdc-layout-grid">

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                            <div id="next-scene-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                                <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Next scene</span>
                                <div class="mdc-simple-menu mdc-select__menu" style="left: 48px; top: 0; transform-origin: center 8px 0; transform: scale(0, 0);">
                                    <ul class="mdc-list mdc-simple-menu__items" style="transform: scale(1, 1);">
                                        <li class="mdc-list-item" role="option" id="scenes" aria-disabled="true">
                                            Next scene
                                        </li>

                                        <li class="mdc-list-item" role="option" id="" tabindex="0">
                                            Dummy
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                            <div id="entry-point-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                                <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Entry point</span>
                                <div class="mdc-simple-menu mdc-select__menu">
                                    <ul class="mdc-list mdc-simple-menu__items">
                                        <li class="mdc-list-item" role="option" id="entryPoints" aria-disabled="true">
                                            Entry point
                                        </li>

                                        <li class="mdc-list-item" role="option" id="" tabindex="0">
                                            Dummy
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <input id="nextSceneInput" type="hidden" name="next_scete_id" value="" disabled>
                        <input id="entryPointInput" type="hidden" name="entry_point_id" value="" disabled>
                    </div>
                </div>

                <div id="poiImgDetailsPanel" style="display: none;">
                    <h3 class="mdc-typography--title">Image POI Details</h3>

                    <div id="poiImgDetailsWrapper">
                        <a id="poiAddFieldBtn" class="mdc-button mdc-button--primary mdc-theme--primary" data-mdc-auto-init="MDCRipple">
                            <i class="material-icons mdc-theme--primary ButtonIcon">add</i> Add Field
                        </a>

                        <hr class="WhiteSpaceSeparator">
                    </div>
                </div>

                <div id="poiVideoDetailsPanel" style="display: none;">
                    <h3 class="mdc-typography--title">Video POI Details</h3>

                    <div id="videoFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label for="videoFileInput"> Select a video</label>
                        <input class="FullWidth" type="file" name="videoFileInput" value="" id="videoFileInput" accept="video/mp4" disabled=""/>
                    </div>
                </div>

                <div id="physicsPanel" class="PhysicsPanel" style="display: none;">
                    <h3 class="mdc-typography--title">Physics</h3>

                    <label for="wind-speed-range-label" class="mdc-typography--subheading2">Wind Speed Range:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="wind-speed-range-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                    <div id="wind-speed-range"></div>
                    <input type="hidden" id="physicsWindMinVal" value="" disabled>
                    <input type="hidden" id="physicsWindMaxVal" value="" disabled>

                    <hr class="WhiteSpaceSeparator">

                    <label for="wind-mean-slider-label" class="mdc-typography--subheading2">Wind Speed Mean:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="wind-mean-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                    <div id="wind-mean-slider"></div>
                    <input type="hidden" id="physicsWindMeanVal" value="" disabled>

                    <hr class="WhiteSpaceSeparator">

                    <label for="wind-variance-slider-label" class="mdc-typography--subheading2">Wind Variance:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="wind-variance-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                    <div id="wind-variance-slider"></div>
                    <input type="hidden" id="physicsWindVarianceVal" value="" disabled="">
                </div>

            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                <h3 class="mdc-typography--title">Object Properties</h3>

                <ul class="RadioButtonList">
                    <li class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="fbxRadio"  name="objectTypeRadio" value="fbx">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="fbxRadio-label" for="fbxRadio" style="margin-bottom: 0;">FBX file</label>
                    </li>
                    <li class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="mtlRadio" checked="" name="objectTypeRadio" value="mtl">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="mtlRadio-label" for="mtlRadio" style="margin-bottom: 0;">MTL & OBJ files</label>
                    </li>
                </ul>

                <div class="mdc-layout-grid">

                    <div id="fbxFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12" style="display: none;">
                        <label for="fbxFileInput"> Select an FBX file</label>
                        <input class="FullWidth" type="file" name="fbxFileInput" value="" id="fbxFileInput"/>
                    </div>

                    <div id="mtlFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label for="mtlFileInput"> Select an MTL file</label>
                        <input class="FullWidth" type="file" name="mtlFileInput" value="" id="mtlFileInput" accept=".mtl"/>
                    </div>

                    <div id="objFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label  for="objFileInput" > Select an OBJ file</label>
                        <input class="FullWidth" type="file" name="objFileInput" value="" id="objFileInput" accept=".obj"/>
                    </div>
                </div>

                <h3 class="mdc-typography--title" id="objectPreviewTitle" style="display: none;">Object Preview</h3>
                <div id="assetPreviewContainer"></div>

                <div class="mdc-layout-grid">

                    <div id="textureFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label for="textureFileInput"> Select a texture</label><br>
                        <img id="texturePreviewImg" style="width:100px; height:100px" src="<?php echo plugins_url( '../images/ic_texture.png', dirname(__FILE__)  ); ?>">
                        <input class="FullWidth" type="file" name="textureFileInput" value="" id="textureFileInput" accept="image/jpeg"/>
                    </div>

                    <div id="sshotFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label for="sshotFileInput"> Screenshot</label><br>
                        <img id="sshotPreviewImg" style="width:100px; height:100px" src="<?php echo plugins_url( '../images/ic_sshot.png', dirname(__FILE__)  ); ?>">
                        <input class="FullWidth" type="hidden" name="sshotFileInput" value="" id="sshotFileInput" accept="image/jpeg"/>

                        <a style="display: none;" id="createModelScreenshotBtn" type="button" class="mdc-button mdc-button--primary mdc-theme--primary" data-mdc-auto-init="MDCRipple">Create screenshot</a>
                    </div>

                </div>

                <hr class="WhiteSpaceSeparator">

				<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                <input type="hidden" name="submitted" id="submitted" value="true" />

                <button style="float: right;" class="mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" type="submit">
                    Create asset
                </button>

            </div>

        </div>
    </form>

    <script type="text/javascript">
        'use strict';

        var mdc = window.mdc;
        mdc.autoInit();

        resetPanels();

        var fbxInputContainer = jQuery('#fbxFileInputContainer');
        var fbxInput = jQuery('#fbxFileInput');
        var mtlInputContainer = jQuery('#mtlFileInputContainer');
        var mtlInput = jQuery('#mtlFileInput');
        var objInputContainer = jQuery('#objFileInputContainer');
        var objInput = jQuery('#objFileInput');
        var textureInputContainer = jQuery('#textureFileInputContainer');
        var textureInput = jQuery('#textureFileInput');
        var texturePreviewDefaultImg = document.getElementById("texturePreviewImg").src;
        var sshotInput = jQuery('#sshotFileInput');
        var sshotPreviewDefaultImg = document.getElementById("sshotPreviewImg").src;
        var createScreenshotBtn = jQuery("#createModelScreenshotBtn");

        var mtlFileContent = '';
        var objFileContent = '';
        var textureFileContent = '';
        var fbxFileContent = '';
        var previewRenderer;

        createScreenshotBtn.click(function() {
            createModelScreenshot(previewRenderer);
        });

        (function() {
            var MDCSelect = mdc.select.MDCSelect;
            var categoryDropdown = document.getElementById('category-select');
            var nextSceneDropdown = document.getElementById('next-scene-select');
            var entryPointDropdown = document.getElementById('entry-point-select');

            var categorySelect = MDCSelect.attachTo(categoryDropdown);
            var nextSceneSelect = MDCSelect.attachTo(nextSceneDropdown);
            var entryPointSelect = MDCSelect.attachTo(entryPointDropdown);

            nextSceneDropdown.addEventListener('MDCSelect:change', function() {
                jQuery("#nextSceneInput").attr( "value", nextSceneSelect.selectedOptions[0].getAttribute("id") );
            });

            entryPointDropdown.addEventListener('MDCSelect:change', function() {
                jQuery("#entryPointInput").attr( "value", entryPointSelect.selectedOptions[0].getAttribute("id") );
            });

            categoryDropdown.addEventListener('MDCSelect:change', function() {
                var item = categorySelect.selectedOptions[0];
                var index = categorySelect.selectedIndex;

                resetPanels();

                var descText = document.getElementById('categoryDescription');
                descText.innerHTML = categorySelect.selectedOptions[0].getAttribute("data-cat-desc");

                jQuery("#termIdInput").attr( "value", categorySelect.selectedOptions[0].getAttribute("id") );

                var cat = categorySelect.selectedOptions[0].getAttribute("data-cat-slug");

                switch(cat) {
                    case 'doors':

                        jQuery("#doorDetailsPanel").show();

                        jQuery("#nextSceneInput").removeAttr("disabled");
                        jQuery("#entryPointInput").removeAttr("disabled");

                        break;
                    case 'dynamic3dmodels':


                        break;
                    case 'pois_imagetext':

                        jQuery("#assetDescription").hide();
                        jQuery("#poiImgDetailsPanel").show();

                        break;
                    case 'pois_video':

                        jQuery("#poiVideoDetailsPanel").show();
                        jQuery("#videoFileInput").removeAttr("disabled");


                        break;
                    case 'static3dmodels':

                        jQuery("#physicsPanel").show();
                        jQuery("#physicsWindMinVal").removeAttr("disabled");
                        jQuery("#physicsWindMaxVal").removeAttr("disabled");
                        jQuery("#physicsWindMeanVal").removeAttr("disabled");
                        jQuery("#physicsWindVarianceVal").removeAttr("disabled");

                        break;
                    default:

                }

                console.log(cat, index);
            });
        })();

        fbxInput.change(function() {
            document.getElementById("assetPreviewContainer").innerHTML = "";

            if (fileExtension(fbxInput.val()) === 'fbx') {

            } else {
                document.getElementById("fbxFileInput").value = "";
            }
        });

        mtlInput.click(function() {
            document.getElementById("mtlFileInput").value = "";
            readFile('', 'mtl', loadFileCallback);
            resetModelScreenshotField();
        });
        mtlInput.change(function() {
            document.getElementById("assetPreviewContainer").innerHTML = "";

            if (fileExtension(mtlInput.val()) === 'mtl') {
                readFile(document.getElementById('mtlFileInput').files[0], 'mtl', loadFileCallback);
            }
        });

        objInput.click(function() {
            document.getElementById("objFileInput").value = "";
            readFile('', 'obj', loadFileCallback);
            resetModelScreenshotField();
        });
        objInput.change(function() {
            document.getElementById("assetPreviewContainer").innerHTML = "";

            if (fileExtension(objInput.val()) === 'obj') {
                readFile(document.getElementById('objFileInput').files[0], 'obj', loadFileCallback);
            }
        });

        textureInput.click(function() {
            document.getElementById("textureFileInput").value = "";
            jQuery("#texturePreviewImg").attr('src', texturePreviewDefaultImg);
            textureFileContent = '';
            document.getElementById("assetPreviewContainer").innerHTML = "";
            previewRenderer = wu_3d_view_main('before', '', mtlFileContent, objFileContent, '', document.getElementById('assetTitle').value, 'assetPreviewContainer');
        });
        textureInput.change(function() {
            document.getElementById("assetPreviewContainer").innerHTML = "";

            if (fileExtension(textureInput.val()) === 'jpg') {
                readFile(document.getElementById('textureFileInput').files[0], 'texture', loadFileCallback);
            }
        });

        // Callback is fired when obj & mtl inputs have files. Preview is loaded automatically.
        // We can expand this for 'fbx' files too.
        function loadFileCallback(content, type) {

            if(type === 'fbx') {
                fbxFileContent = content ? content : '';
            }

            if(type === 'mtl') {
                mtlFileContent = content ? content : '';
            }

            if(type === 'obj') {
                objFileContent = content ? content : '';
            }

            if (content) {

                if(type === 'texture') {
                    jQuery("#texturePreviewImg").attr('src', '').attr('src', content);
                    textureFileContent = content;
                }

                if (objFileContent && mtlFileContent) {
                    jQuery("#objectPreviewTitle").show();

                    createScreenshotBtn.show();

                    previewRenderer = wu_3d_view_main('before', '', mtlFileContent, objFileContent, textureFileContent, document.getElementById('assetTitle').value, 'assetPreviewContainer');

                } else {
                    resetModelScreenshotField();
                }

            } else {
                document.getElementById("assetPreviewContainer").innerHTML = "";

            }
        }

        function createModelScreenshot(renderer) {
            document.getElementById("sshotPreviewImg").src = renderer.domElement.toDataURL("image/jpeg");
            document.getElementById("sshotFileInput").value = renderer.domElement.toDataURL("image/jpeg");
        }

        function resetModelScreenshotField(){
            document.getElementById("sshotPreviewImg").src = sshotPreviewDefaultImg;
            createScreenshotBtn.hide();
            jQuery("#objectPreviewTitle").hide();
        }

        function clearFiles() {
            document.getElementById("fbxFileInput").value = "";
            document.getElementById("mtlFileInput").value = "";
            document.getElementById("objFileInput").value = "";
            document.getElementById("textureFileInput").value = "";
            jQuery("#texturePreviewImg").attr('src', texturePreviewDefaultImg);
            jQuery("#sshotPreviewImg").attr('src', sshotPreviewDefaultImg);
            jQuery("#objectPreviewTitle").hide();

            objFileContent = '';
            textureFileContent = '';
            fbxFileContent = '';
            mtlFileContent = '';
            previewRenderer = '';

            document.getElementById("assetPreviewContainer").innerHTML = "";
        }

        function resetPanels() {
            clearFiles();

            jQuery("#assetDescription").show();

            jQuery("#doorDetailsPanel").hide();
            jQuery("#nextSceneInput").attr('disabled', 'disabled');
            jQuery("#entryPointInput").attr('disabled', 'disabled');


            jQuery("#physicsPanel").hide();
            jQuery("#physicsWindMinVal").attr('disabled', 'disabled');
            jQuery("#physicsWindMaxVal").attr('disabled', 'disabled');
            jQuery("#physicsWindMeanVal").attr('disabled', 'disabled');
            jQuery("#physicsWindVarianceVal").attr('disabled', 'disabled');

            jQuery("#poiImgDetailsPanel").hide();

            jQuery("#poiVideoDetailsPanel").hide();
            jQuery("#videoFileInput").attr('disabled', 'disabled');

            jQuery("#objectPreviewTitle").hide();
        }

        function fileExtension(fn) {
            return fn ? fn.split('.').pop().toLowerCase() : '';
        }

        jQuery( function() {

            // FBX / MTL Toggles
            jQuery( "input[name=objectTypeRadio]" ).click(function() {

                var objectType = jQuery('input[name=objectTypeRadio]:checked').val();

                if (objectType === 'fbx') {
                    clearFiles();
                    fbxInputContainer.show();
                    mtlInputContainer.hide();
                    objInputContainer.hide();
                }
                else if (objectType === 'mtl') {
                    clearFiles();
                    fbxInputContainer.hide();
                    mtlInputContainer.show();
                    objInputContainer.show();
                }
            });


            // Physics Sliders
            var speedRangeSlider = jQuery( "#wind-speed-range" );
            var windMeanSlider = jQuery( "#wind-mean-slider" );
            var windVarianceSlider =  jQuery( "#wind-variance-slider" );

            speedRangeSlider.slider({
                range: true,
                min: 0,
                max: 40,
                values: [ 0, 40 ],
                slide: function( event, ui ) {
                    jQuery( "#wind-speed-range-label" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] + " m/sec" );
                    jQuery( "#physicsWindMinVal" ).val(ui.values[ 0 ]);
                    jQuery( "#physicsWindMaxVal" ).val(ui.values[ 1 ]);
                }
            });
            jQuery( "#wind-speed-range-label" ).val( speedRangeSlider.slider( "values", 0 ) +
                " - " + speedRangeSlider.slider( "values", 1 ) + " m/sec" );

            windMeanSlider.slider({
                min: 0,
                max: 40,
                value: 14,
                slide: function( event, ui ) {
                    jQuery( "#wind-mean-slider-label" ).val( ui.value + " m/sec" );
                    jQuery( "#physicsWindMeanVal" ).val(ui.value);

                }
            });
            jQuery( "#wind-mean-slider-label" ).val( windMeanSlider.slider( "option", "value" ) + " m/sec" );

            windVarianceSlider.slider({
                min: 1,
                max: 100,
                value: 30,
                slide: function( event, ui ) {
                    jQuery( "#wind-variance-slider-label" ).val( ui.value + " " );
                    jQuery( "#physicsWindVarianceVal" ).val(ui.value);

                }
            });
            jQuery( "#wind-variance-slider-label" ).val( windVarianceSlider.slider( "option", "value" ) + " " );


            // POI Image panels - Add/remove POI inputs
            var poiMaxFields      = 3; // max input boxes allowed
            var poiImgDetailsWrapper         = jQuery("#poiImgDetailsWrapper"); // Fields wrapper
            var addPoiFieldBtn      = jQuery("#poiAddFieldBtn"); // Add button ID
            var i = 0; // Initial text box count

            addPoiFieldBtn.click(function(e){ // On add input button click
                e.preventDefault();
                if(i < poiMaxFields) { // Max input box allowed
                    i++; // Text box increment
                    poiImgDetailsWrapper.append(
                        '<div class="mdc-layout-grid">'+
                        '<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-10">' +
                        '<input type="file" name="poi-input-file-'+i+'" class="FullWidth" value="" accept="image/jpeg"/>' +
                        '<div class="mdc-textfield mdc-form-field FullWidth " data-mdc-auto-init="MDCTextfield">' +
                        '<input id="poi-input-text-'+i+'" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="poi-input-text-'+i+'" ' +
                        'aria-controls="title-validation-msg" minlength="6" maxlength="25" style="box-shadow: none; border-color:transparent;">' +
                        '<label for="poi-input-text-'+i+'" class="mdc-textfield__label">Enter an image description' +
                        '</div>' +
                        '<p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg" id="title-validation-msg">Between 6 - 25 characters</p></div>' +
                        '<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2"><a href="#" class="remove_field"><i title="Delete field" style="font-size: 36px" class="material-icons">clear</i></a></div></div>'
                    ); // Add input box
                }
                // Run autoInit with noop to suppress warnings.
                mdc.autoInit(document, () => {});
            });

            poiImgDetailsWrapper.on("click",".remove_field", function(e) { // User click on remove text
                e.preventDefault();
                jQuery(this).parent('div').parent('div').remove(); i--;
            })
        } );

        function readFile(file, type, callback) {
            var content = '';
            var reader = new FileReader();

            if (file) {
                reader.readAsDataURL(file);

                // Closure to capture the file information.
                reader.onload = (function(reader) {
                    return function() {

                        content = reader.result;

                        if (type !== 'texture') {
                            content = content.replace('data:;base64,', '');
                            content = window.atob(content);
                        }

                        callback(content, type);
                    };
                })(reader);
            } else {
                callback(content, type);
            }
        }

    </script>
<?php  get_footer(); ?>