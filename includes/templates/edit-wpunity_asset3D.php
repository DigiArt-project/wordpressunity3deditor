<?php

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '/?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '/?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$safe_inserted_id = intval( $_GET['wpunity_game'] );
$safe_inserted_id = sanitize_text_field( $safe_inserted_id );
$game_id = $safe_inserted_id;

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
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $game_id ); ?>" title="Go back to Project editor">Project Editor</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">3D Asset Manager</span></li>
    </ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><span>Create a new 3D asset</span></h2>


    <form name="3dAssetForm">

        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input id="title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" aria-controls="title-validation-msg" required minlength="6" style="box-shadow: none; border-color:transparent;">
                    <label for="title" class="mdc-textfield__label">
                        Enter a title for your asset
                </div>
                <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                   id="title-validation-msg">
                    Must be at least 6 characters long
                </p>

                <hr class="WhiteSpaceSeparator">

                <div id="js-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                    <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Select a category</span>
                    <div class="mdc-simple-menu mdc-select__menu" style="left: 48px; top: 0; transform-origin: center 8px 0; transform: scale(0, 0);">
                        <ul class="mdc-list mdc-simple-menu__items" style="transform: scale(1, 1);">
                            <li class="mdc-list-item" role="option" id="grains" aria-disabled="true">
                                Select a category
                            </li>
                            <li class="mdc-list-item" role="option" id="grains" tabindex="0">
                                Bread, Cereal, Rice, and Pasta
                            </li>
                            <li class="mdc-list-item" role="option" id="vegetables" tabindex="0">
                                Vegetables
                            </li>
                            <li class="mdc-list-item" role="option" id="fruit" tabindex="0">
                                Fruit
                            </li>
                            <li class="mdc-list-item" role="option" id="dairy" tabindex="0">
                                Milk, Yogurt, and Cheese
                            </li>
                            <li class="mdc-list-item" role="option" id="meat" tabindex="0">
                                Meat, Poultry, Fish, Dry Beans, Eggs, and Nuts
                            </li>
                            <li class="mdc-list-item" role="option" id="fats" tabindex="0">
                                Fats, Oils, and Sweets
                            </li>
                        </ul>
                    </div>
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


                <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">Actions</h3>
                <h6> show them based on selected category</h6>


                <hr class="WhiteSpaceSeparator">

                <div class="mdc-textfield mdc-textfield--multiline" data-mdc-auto-init="MDCTextfield">
                    <textarea id="multi-line" class="mdc-textfield__input" rows="6" cols="40" style="box-shadow: none;"></textarea>
                    <label for="multi-line" class="mdc-textfield__label">Add a scene description</label>
                </div>

            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                <div class="DropzoneStyle CenterContents" id="fileUploaderDropzone">

                    <div class="DropzoneDescriptivePlaceholder">
                        <i class="material-icons mdc-theme--text-icon-on-background">insert_drive_file</i>
                        <h4 class="dz-message mdc-theme--text-primary-on-background">Drop your asset file(s) here to upload them</h4>
                        <h6 class="dz-message mdc-typography--subheading1 mdc-theme--text-secondary-on-background">You can drop a single .FBX file</h6>
                        <h6 class="dz-message mdc-typography--subheading1 mdc-theme--text-secondary-on-background">or</h6>
                        <h6 class="dz-message mdc-typography--subheading1 mdc-theme--text-secondary-on-background">Three files:<br>.MTL - model<br>.OBJ - object<br>.JPG/PNG - screenshot that describe your asset</h6>
                    </div>

                    <input type="hidden" name="file" />

                    <input type="hidden" name="fbxFile" />
                    <input type="hidden" name="mtlFile" />
                    <input type="hidden" name="objFile" />
                    <input type="hidden" name="textureFile" />

					<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>

                </div>

                <div id="fileUploadSubmitArea" class="DisplayBlock CenterContents">

                </div>

            </div>


        </div>

        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__cell--span-12">

            </div>
        </div>
    </form>


    <!-- Preview template for Dropzone -->
    <div id="preview-template" style="display: none;">
        <div class="dz-preview dz-file-preview CenterContents CustomDropZoneAssetStyle">
            <div class="dz-details">
                <img src="<?php echo site_url();?>/wp-content/plugins/WordpressUnity3DEditor/images/default-asset.png" data-dz-thumbnail>
                <div class="dz-filename mdc-typography--body1"><span data-dz-name></span></div>
                <div class="dz-size mdc-theme--text-secondary-on-background mdc-typography--caption">Size: <span data-dz-size></span></div>
            </div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
            <div class="dz-error-message"><span data-dz-errormessage></span></div>
            <a class="mdc-button mdc-button--primary" data-dz-remove>Remove</a>
        </div>
    </div>

    <script type="text/javascript">

        var mdc = window.mdc;
        mdc.autoInit();

        (function() {
            var MDCSelect = mdc.select.MDCSelect;
            var root = document.getElementById('js-select');

            var select = MDCSelect.attachTo(root);
            root.addEventListener('MDCSelect:change', function() {
                var item = select.selectedOptions[0];
                var index = select.selectedIndex;

                console.log(item, index);
            });
        })();


        var objectDropzone = new Dropzone("div#fileUploaderDropzone", {
            url: '<?php echo get_permalink(); ?>',
            clickable: true,
            maxFiles: 3,
            autoDiscover: false,
            previewTemplate: document.getElementById('preview-template').innerHTML,
            init: function() {

                this.on("queuecomplete", function (file) {

                    var flags = [];

                    if (this.files.length === 1 && (fileExtension(this.files[0].name) === 'fbx') && this.files[0].status === 'success') {

                        appendSubmitBtnToDropzone(strings.fbx);

                    } else {

                        var i;
                        if (this.files.length === 3) {

                            for (i=0; i < this.files.length; i++) {
                                flags = checkFlags(flags, this.files[i].name);
                            }

                            if (flags.mtl && flags.obj && flags.texture) {

                                appendSubmitBtnToDropzone(strings.three);
                            }
                            console.log(flags);
                        }
                    }
                    console.log("total files: ", this.files.length);
                });

                this.on("addedfile", function(file) {

                    var placeholder = jQuery( '.DropzoneDescriptivePlaceholder' );

                    placeholder.hide();

                    if (this.files.length > 3 || this.files.length === 2) {
                        var btnContainer = jQuery( '#submitBtnContainer' );


                        if (btnContainer) {
                            btnContainer.remove();
                            jQuery( '#modelPreviewBtn' ).remove();
                            placeholder.show();
                        }
                    }
                });

                this.on("removedfile", function (file) {

                    var flags = [];
                    var btnContainer = jQuery( '#submitBtnContainer' );

                    if (this.files.length === 0) {
                        if (btnContainer) {
                            btnContainer.remove();
                            jQuery( '#modelPreviewBtn' ).remove();
                            jQuery( '.DropzoneDescriptivePlaceholder' ).show();
                        }
                    } else if (this.files.length < 3) {
                        if (btnContainer) {
                            jQuery( '#modelPreviewBtn' ).remove();
                            btnContainer.remove();

                        }
                    }

                    if (this.files.length === 3) {

                        var i;

                        for (i=0; i < this.files.length; i++) {
                            flags = checkFlags(flags, this.files[i].name);
                        }

                        if (flags.mtl && flags.obj && flags.texture) {

                            appendSubmitBtnToDropzone(strings.three);
                        }
                    }

                    if (this.files.length === 1 && (fileExtension(this.files[0].name) === 'fbx') && this.files[0].status === 'success') {

                        appendSubmitBtnToDropzone(strings.fbx);
                    }

                });

                this.on("canceled", function (file) {

                });

                this.on("sending", function(file, xhr, formData) {

                });
            }
        });

        function fileExtension(fn) {
            return fn.split('.').pop().toLowerCase();
        }

        function checkFlags(flags, fn) {
            if (!flags.mtl) {
                flags.mtl = fileExtension(fn) === 'mtl';
            }
            if (!flags.obj) {
                flags.obj = fileExtension(fn) === 'obj';
            }
            if (!flags.texture) {
                flags.texture = fileExtension(fn) === ('png' || 'jpg');
            }
            return flags;
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
        strings.three = 'You have selected a group of the three components describing your asset';

    </script>
<?php  get_footer(); ?>