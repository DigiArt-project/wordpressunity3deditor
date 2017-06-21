<?php

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$project_id = intval( $_GET['wpunity_game'] );
$project_id = sanitize_text_field( $project_id );

$game_post = get_post($project_id);
$game_type_obj = wpunity_return_game_type($project_id);

$scene_post = get_post($scene_id);
$sceneSlug = $scene_post->post_title;

wp_enqueue_script('wpunity_dropzone');


$editgamePage = wpunity_getEditpage('game');
$allGamesPage = wpunity_getEditpage('allgames');


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
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">3D Asset Manager</span></li>
    </ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><span>Create a new 3D asset</span></h2>


    <form name="3dAssetForm">

        <div class="mdc-layout-grid">


            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                <div id="category-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                    <i class="material-icons mdc-theme--text-icon-on-light">web_asset</i>&nbsp; <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Select a category</span>
                    <div class="mdc-simple-menu mdc-select__menu" style="left: 48px; top: 0; transform-origin: center 8px 0; transform: scale(0, 0);">
                        <ul class="mdc-list mdc-simple-menu__items" style="transform: scale(1, 1);">

                            <li class="mdc-list-item" role="option" id="grains" aria-disabled="true">
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
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <span class="mdc-typography--subheading2" id="categoryDescription"></span>
            </div>
        </div>

        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input id="title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                           aria-controls="title-validation-msg" required minlength="6" maxlength="25" style="box-shadow: none; border-color:transparent;">
                    <label for="title" class="mdc-textfield__label">
                        Enter a title for your asset
                </div>
                <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                   id="title-validation-msg">
                    Between 6 - 25 characters
                </p>

                <div class="mdc-textfield mdc-textfield--multiline" data-mdc-auto-init="MDCTextfield">
                    <textarea id="multi-line" class="mdc-textfield__input" rows="6" cols="40" style="box-shadow: none;"></textarea>
                    <label for="multi-line" class="mdc-textfield__label">Add a description</label>
                </div>

                <hr class="WhiteSpaceSeparator">



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


                <h3 id="actionsTitle" class="mdc-typography--subheading1 mdc-theme--text-primary-on-light" style="display: none;">Additional settings</h3>

                <hr class="WhiteSpaceSeparator">

                <div id="next-scene-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%; display: none;" >
                    <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Next scene</span>
                    <div class="mdc-simple-menu mdc-select__menu" style="left: 48px; top: 0; transform-origin: center 8px 0; transform: scale(0, 0);">
                        <ul class="mdc-list mdc-simple-menu__items" style="transform: scale(1, 1);">
                            <li class="mdc-list-item" role="option" id="grains" aria-disabled="true">
                                Next scene
                            </li>

                            <li class="mdc-list-item" role="option" id="" tabindex="0">
                                Dummy
                            </li>

                        </ul>
                    </div>
                </div>

                <hr class="WhiteSpaceSeparator">

                <h3 id="physicsTitle" class="mdc-typography--title">Physics</h3>

                <h4 class="mdc-typography--subheading2">Wind Speed</h4>

                <div class="mdc-textfield mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input id="minWindSpeed" type="number" min="0" max="50" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                           style="box-shadow: none; border-color:transparent; width: 100px;">
                    <label for="minWindSpeed" class="mdc-textfield__label">
                        Minimum
                </div>

                <div class="mdc-textfield mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input id="maxWindSpeed" type="number" min="0" max="50" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                           style="box-shadow: none; border-color:transparent; width: 100px;">
                    <label for="maxWindSpeed" class="mdc-textfield__label">
                        Maximum
                </div>


                <div id="slider-range"></div>


            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                <h2 class="mdc-typography--subheading2">Object type</h2>

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
                        <input class="FullWidth" type="file" name="mtlFileInput" value="" id="mtlFileInput" />
                    </div>


                    <div id="objFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label  for="objFileInput" > Select an OBJ file</label>
                        <input class="FullWidth" type="file" name="objFileInput" value="" id="objFileInput" />
                    </div>
                </div>

                <hr class="WhiteSpaceSeparator">

                <div id="modelPreviewBtn" class="mdc-layout-grid__cell CenterContents" style="display: none;">
                    <a id="previewBtn" class="mdc-button mdc-button--primary" data-mdc-auto-init="MDCRipple"> Preview model</a>
                </div>

                <div class="mdc-layout-grid">

                    <div id="textureFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label for="textureFileInput"> Select a texture</label>
                        <input class="FullWidth" type="file" name="textureFileInput" value="" id="textureFileInput" />
                    </div>

                    <div id="sshotFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label  for="sshotFileInput" > Select a screenshot (or auto generate)</label>
                        <input class="FullWidth" type="file" name="sshotFileInput" value="" id="sshotFileInput" />
                    </div>

                </div>

				<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                <input type="hidden" name="submitted" id="submitted" value="true" />
                <button class="mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" type="submit">
                    Create
                </button>

            </div>

        </div>
    </form>
    <script type="text/javascript">

        var mdc = window.mdc;
        mdc.autoInit();

        var fbxInputContainer = jQuery('#fbxFileInputContainer');
        var fbxInput = jQuery('#fbxFileInput');
        var mtlInputContainer = jQuery('#mtlFileInputContainer');
        var mtlInput = jQuery('#mtlFileInput');
        var objInputContainer = jQuery('#objFileInputContainer');
        var objInput = jQuery('#objFileInput');
        var modelPreviewButton = jQuery('#modelPreviewBtn');

        (function() {
            var MDCSelect = mdc.select.MDCSelect;
            var categoryDropdown = document.getElementById('category-select');
            var nextSceneDropdown = document.getElementById('next-scene-select');

            var categorySelect = MDCSelect.attachTo(categoryDropdown);
            var nextSceneSelect = MDCSelect.attachTo(nextSceneDropdown);

            categoryDropdown.addEventListener('MDCSelect:change', function() {
                var item = categorySelect.selectedOptions[0];
                var index = categorySelect.selectedIndex;

                var descText = document.getElementById('categoryDescription');
                descText.innerHTML = categorySelect.selectedOptions[0].getAttribute("data-cat-desc");

                var cat = categorySelect.selectedOptions[0].getAttribute("data-cat-slug");

                switch(cat) {
                    case 'doors':

                        break;
                    case 'dynamic3dmodels':

                        break;
                    case 'pois_imagetext':

                        break;
                    case 'pois_video':

                        break;
                    case 'static3dmodels':

                        break;
                    default:

                }

                console.log(cat, index);
            });
        })();

        jQuery( "input[name=objectTypeRadio]" ).click(function() {

            var objectType = jQuery('input[name=objectTypeRadio]:checked').val();

            if (objectType === 'fbx') {
                console.log("FBX");

                clearFiles();
                fbxInputContainer.show();
                mtlInputContainer.hide();
                objInputContainer.hide();
            }
            else if (objectType === 'mtl') {
                console.log("MTL");

                clearFiles();
                fbxInputContainer.hide();
                mtlInputContainer.show();
                objInputContainer.show();
            }
        });


        fbxInput.change(function() {
            console.log(fbxInput.val());

            if (fileExtension(fbxInput.val()) === 'fbx') {

                modelPreviewButton.show();
            } else {
                document.getElementById("fbxFileInput").value = "";
                modelPreviewButton.hide();
            }
        });


        mtlInput.change(function() {
            console.log(mtlInput.val(), objInput.val());

            if (fileExtension(mtlInput.val()) === 'mtl') {
                console.log('mtl');
            } else {
                document.getElementById("mtlFileInput").value = "";
                modelPreviewButton.hide();
            }


            if (fileExtension(mtlInput.val()) === 'mtl' && objInput.val()==='obj') {
                modelPreviewButton.show();
            }

        });

        objInputContainer.change(function() {
            console.log(mtlInput.val(), objInput.val());

            if (fileExtension(objInput.val()) === 'obj') {
                console.log('obj');
            } else {
                document.getElementById("objFileInput").value = "";
                modelPreviewButton.hide();
            }

            if (fileExtension(mtlInput.val()) === 'mtl' && objInput.val()==='obj') {
                modelPreviewButton.show();
            }
        });


        function clearFiles() {
            document.getElementById("fbxFileInput").value = "";
            document.getElementById("mtlFileInput").value = "";
            document.getElementById("objFileInput").value = "";
            modelPreviewButton.hide();
        }

        function fileExtension(fn) {
            if (fn) {
                return fn.split('.').pop().toLowerCase();
            } else {
                return '';
            }

        }

        function appendSubmitBtnToDropzone(string) {
            jQuery( '#fileUploadSubmitArea' ).append( '' +
                '<div id="submitBtnContainer" class="mdc-layout-grid__cell">' +
                '<h6 class="mdc-typography--caption">'+ string +'</h6> ' +
                '<a id="deleteAllBtn" class="mdc-button mdc-button--primary" onclick="objectDropzone.removeAllFiles();" data-mdc-auto-init="MDCRipple"> Remove all</a>' +
                '<a id="submitBtn" class="mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple"> Upload</a>' +
                '</div>' );

            jQuery( '#fileUploaderDropzone' ).append( '' +
                '<div id="modelPreviewBtn" class="mdc-layout-grid__cell">' +
                '<a id="submitBtn" class="mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple"> Preview model</a>' +
                '</div>' );

        }

        var strings = [];
        strings.fbx = 'You have selected an Autodesk FBX model';
        strings.two = 'You have selected a group of the two components describing your asset';

        jQuery( function() {
            jQuery( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 75, 300 ],
                slide: function( event, ui ) {
                    jQuery( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            jQuery( "#amount" ).val( "$" + jQuery( "#slider-range" ).slider( "values", 0 ) +
                " - $" + jQuery( "#slider-range" ).slider( "values", 1 ) );
        } );

    </script>
<?php  get_footer(); ?>