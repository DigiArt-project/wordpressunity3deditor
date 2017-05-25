<?php

$safe_inserted_id = intval( $_GET['wpunity_scene'] );
$safe_inserted_id = sanitize_text_field( $safe_inserted_id );
$scene_id = $safe_inserted_id;

$scene_post = get_post($scene_id);
$sceneSlug = $scene_post->post_title;

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

}



wp_enqueue_media($scene_post->ID);
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

wp_enqueue_script('wpunity_dropzone');

get_header(); ?>

    <!-- START PAGE -->
    <div class="EditPageHeader">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>

        <!--<a class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
            ???
        </a>-->
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Add category title & icon"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string; ?></span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="#" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected" title="Go back to Project editor">Game Editor</span></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">Scene Editor</span></li>
    </ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><?php echo $sceneSlug; ?></h2>

    <div class="mdc-layout-grid">

        <!-- ENABLE SECTION ONLY IF USER PRIVILEGES ALLOW -->
        <div class="mdc-layout-grid__cell--span-12">

            <a class="mdc-button mdc-button--primary mdc-theme--primary EditPageAccordion"><i class="material-icons mdc-theme--primary ButtonIcon">add</i> Add Assets</a>

            <div class="EditPageAccordionPanel">

            </div>

            <div class="mdc-layout-grid">

                <div class="mdc-layout-grid__cell--span-2"></div>
                <div class="mdc-layout-grid__cell--span-8">


                    <div class="dropzone" id="fileUploaderDropzone">

                        <div class="CenterContents">
                            <i class="material-icons mdc-theme--text-icon-on-background">insert_drive_file</i>
                            <h4 class="dz-message mdc-theme--text-primary-on-background">Drop your asset file(s) here to upload them</h4>
                            <h6 class="dz-message mdc-typography--subheading1 mdc-theme--text-secondary-on-background">You can drop a single .FBX file or a group of three files (.MTL, .OBJ, .JPG/PNG) that describe your asset</h6>

                            <input type="hidden" name="file" />


							<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>

                        </div>

                    </div>

                </div>
                <div class="mdc-layout-grid__cell--span-2"></div>
            </div>
        </div>


        <hr class="WhiteSpaceSeparator">



        <div class="mdc-layout-grid__cell--span-12">

            <div name="scene-vr-editor" id="scene-vr-editor">
				<?php
				$meta_json = get_post_meta(get_post()->ID, 'wpunity_scene_json_input', true);

				// do not put esc_attr, crashes the universe in 3D
				$sceneToLoad = $meta_json ? $meta_json : $wpunity_databox4['fields'][0]['std'];

				//Find scene dir string
				$sceneSlug = $post->post_name;
				$parentGameSlug = wp_get_object_terms( $post->ID, 'wpunity_scene_pgame')[0]->slug;

				$scenefolder = $sceneSlug;
				$gamefolder = $parentGameSlug;
				$sceneID = $post->ID;

				// vr_editor loads the $sceneToLoad
				require( plugin_dir_path( __DIR__ ) .  '/vr_editor.php' ); ?>
            </div>
        </div>
    </div>

    <hr class="WhiteSpaceSeparator">

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
        window.mdc.autoInit();

        var acc = document.getElementsByClassName("EditPageAccordion");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            }
        }

        Dropzone.options.fileUploaderDropzone = {
            url: '<?php echo get_permalink(); ?>',
            clickable: true,
            maxFiles: 3,
            previewTemplate: document.getElementById('preview-template').innerHTML,
            init: function() {



                this.on("addedfile", function(file) {

                    console.log("added file:", file.name);

                    for (i=0; i < this.files.length; i++) {

                    }

                });

                this.on("queuecomplete", function (file) {

                    var flags = [];

                    if (this.files.length === 1 && (fileExtension(this.files[0].name) === 'fbx') && this.files[0].status === 'success') {
                        console.log("single fbx file! It's a fbx!");

                        jQuery( '#fileUploaderDropzone' ).append( '' +
                            '<div id="submitBtnContainer" class="mdc-layout-grid__cell CenterContents">' +
                                '<h6 class="mdc-typography--caption">You have selected an Autodesk FBX model</h6> ' +
                            '<a id="submitBtn" class="mdc-button mdc-button mdc-button--raised mdc-button--primary" onclick="" data-mdc-auto-init="MDCRipple"> Upload</a>' +
                            '</div>' );

                    } else {

                        console.log(this.files.length);

                        var i;
                        for (i=0; i < this.files.length; i++) {

                            if (!flags.mtl) {
                                flags.mtl = fileExtension(this.files[i].name) === 'mtl';
                            }
                            if (!flags.obj) {
                                flags.obj = fileExtension(this.files[i].name) === 'obj';
                            }
                            if (!flags.texture) {
                                flags.texture = fileExtension(this.files[i].name) === ('png' || 'jpg');
                            }

                        }
                        console.log(flags);

                    }
                    console.log("total files: ", this.files.length);
                });


                this.on("removedfile", function (file) {
                    if (this.files.length === 0) {
                        var btnContainer = jQuery( '#submitBtnContainer' );
                        if (btnContainer) {
                            btnContainer.remove();
                        }
                    }
                });

                this.on("sending", function(file, xhr, formData) {
                });

            }
        };

        function fileExtension(fn) {
            return fn.split('.').pop().toLowerCase();
        }

        function uploadFiles(){
            var formData = new FormData();
            formData.append("action", "upload-attachment");

            var fileInputElement = document.getElementById("file");
            formData.append("async-upload", fileInputElement.files[0]);
            formData.append("name", fileInputElement.files[0].name);

            //also available on page from _wpPluploadSettings.defaults.multipart_params._wpnonce
			<?php $my_nonce = wp_create_nonce('media-form'); ?>
            formData.append("_wpnonce", "<?php echo $my_nonce; ?>");
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange=function(){
                if (xhr.readyState==4 && xhr.status==200){
                    console.log(xhr.responseText);
                }
            };
            xhr.open("POST", '<?php echo ABSPATH;?>/wp-admin/async-upload.php',true);
            xhr.send(formData);
        }
    </script>


<?php get_footer(); ?>