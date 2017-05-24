<?php

$safe_inserted_id = intval( $_GET['wpunity_scene'] );
$safe_inserted_id = sanitize_text_field( $safe_inserted_id );
$scene_id = $safe_inserted_id;

$scene_post = get_post($scene_id);
$sceneSlug = $scene_post->post_title;

wp_enqueue_script('wpunity_dropzone');

wp_enqueue_media($scene_post->ID);
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

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

                <div class="mdc-layout-grid__cell--span-3"></div>
                <div class="mdc-layout-grid__cell--span-6">


                    <form name="newAssetForm" action="<?php echo plugin_dir_url( __FILE__ ); ?>/edit-wpunity_scene-file-upload.php"
                          class="dropzone" enctype="multipart/form-data"
                          id="fileUploaderDropzone">

                        <div class="CenterContents">
                            <i class="material-icons mdc-theme--text-icon-on-background">insert_drive_file</i>
                            <h4 class="dz-message mdc-theme--text-primary-on-background">Drop your asset file(s) here to upload them</h4>
                        </div>
                        <input type="hidden" name="media-ids" value="">

                        <!--<input type="submit" id="submit" name="Upload" onclick="uploadFiles();return false;">-->


                    </form>

                </div>
                <div class="mdc-layout-grid__cell--span-3"></div>
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
            addRemoveLinks: true,

            init: function() {
                this.on("addedfile", function(file) {

                });

                this.on("queuecomplete", function (file) {

                    if (this.files.length === 1) {

                        console.log("single file!");

                        if (((this.files[0].name).split('.').pop()).toLowerCase() === 'fbx') {

                            // Autodesk fbx file!
                            console.log("It's a fbx!");

                        }

                    }
                });
            }
        };

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