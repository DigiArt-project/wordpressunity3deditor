<?php

$safe_inserted_id = intval( $_GET['wpunity_scene'] );
$safe_inserted_id = sanitize_text_field( $safe_inserted_id );
$scene_id = $safe_inserted_id;

$scene_post = get_post($scene_id);
$sceneSlug = $scene_post->post_title;

wp_enqueue_script('wpunity_dropzone');

get_header(); ?>

	<div class="EditPageHeader">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>

        <h4 class="mdc-typography--subheading1 mdc-theme--text-primary-on-light">Here you can upload a new 3D Asset to the project</h4>
	</div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Add category title & icon"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string; ?></span>

	<hr class="mdc-list-divider">

	<ul class="EditPageBreadcrumb">
		<li><a class="mdc-typography--caption mdc-theme--primary" href="#" title="Go back to Project selection">Home</a></li>
		<li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li><a class="mdc-typography--caption mdc-theme--primary" href="#" title="Go back to Project editor">Project Editor</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
		<li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">3D Asset Manager</span></li>
	</ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">3D Asset Manager</h2>

	<div class="CenterContents">

		<div class="DropzoneStyle" id="fileUploaderDropzone">

			<div class="DropzoneDescriptivePlaceholder">
				<i class="material-icons mdc-theme--text-icon-on-background">insert_drive_file</i>
				<h4 class="dz-message mdc-theme--text-primary-on-background">Drop your asset file(s) here to upload them</h4>
				<h6 class="dz-message mdc-typography--subheading1 mdc-theme--text-secondary-on-background">You can drop a single .FBX file or a group of three files (.MTL, .OBJ, .JPG/PNG) that describe your asset</h6>
			</div>

			<input type="hidden" name="file" />

			<input type="hidden" name="fbxFile" />
			<input type="hidden" name="mtlFile" />
			<input type="hidden" name="objFile" />
			<input type="hidden" name="textureFile" />

			<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>

		</div>
	</div>


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

        var myDropzone = new Dropzone("div#fileUploaderDropzone", {
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

                    jQuery( '.DropzoneDescriptivePlaceholder' ).hide();

                    if (this.files.length > 3 || this.files.length === 2) {
                        var btnContainer = jQuery( '#submitBtnContainer' );

                        if (btnContainer) {
                            btnContainer.remove();
                            jQuery( '.DropzoneDescriptivePlaceholder' ).show();
                        }
                    }
                });

                this.on("removedfile", function (file) {

                    var flags = [];
                    var btnContainer = jQuery( '#submitBtnContainer' );

                    if (this.files.length === 0) {
                        if (btnContainer) {
                            btnContainer.remove();
                            jQuery( '.DropzoneDescriptivePlaceholder' ).show();
                        }
                    } else if (this.files.length < 3) {
                        if (btnContainer) {
                            btnContainer.remove();

                        }
                    }

                    if (this.files.length === 3) {

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
            jQuery( '#fileUploaderDropzone' ).append( '' +
                '<div id="submitBtnContainer" class="mdc-layout-grid__cell">' +
                '<h6 class="mdc-typography--caption">'+ string +'</h6> ' +
                '<a id="deleteAllBtn" class="mdc-button mdc-button mdc-button--primary" onclick="myDropzone.removeAllFiles();" data-mdc-auto-init="MDCRipple"> Remove all</a>' +
                '<a id="submitBtn" class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple"> Upload</a>' +
                '</div>' );

        }

        var strings = [];
        strings.fbx = 'You have selected an Autodesk FBX model';
        strings.three = 'You have selected a group of the three components describing your asset';

	</script>
<?php  get_footer(); ?>