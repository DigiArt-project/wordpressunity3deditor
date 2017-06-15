<?php

$scene_id = intval( $_GET['wpunity_scene'] );
$scene_id = sanitize_text_field( $scene_id );

$scene_type = sanitize_text_field( $_GET['scene_type'] );

$project_id = intval( $_GET['wpunity_game'] );
$project_id = sanitize_text_field( $project_id );

$game_post = get_post($project_id);
$game_type_obj = wpunity_return_game_type($project_id);

$scene_post = get_post($scene_id);
$sceneSlug = $scene_post->post_title;

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

}

wp_enqueue_media($scene_post->ID);
require_once(ABSPATH . "wp-admin" . '/includes/media.php');


get_header(); ?>


    <div class="EditPageHeader">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>

        <!--<a class="mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
            Save
        </a>-->
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Add category title & icon"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string; ?></span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="#" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li><a class="mdc-typography--caption mdc-theme--primary" href="#" title="Go back to Project editor">Project Editor</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">2D Scene Editor</span></li>
    </ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><?php echo $sceneSlug; ?></h2>
    <form name="edit_scene_form" action="" id="create_new_scene_form" method="POST" enctype="multipart/form-data">
        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__cell--span-6">

                <h2 class="mdc-typography--title">Title</h2>
                <div class="mdc-textfield mdc-form-field FullWidth" data-mdc-auto-init="MDCTextfield">
                    <input id="title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" aria-controls="title-validation-msg" required minlength="6" style="box-shadow: none; border-color:transparent;">
                    <label for="title" class="mdc-textfield__label">
                        Enter a title
                </div>
                <hr class="WhiteSpaceSeparator">

                <h2 class="mdc-typography--title">Credits</h2>
                <div class="mdc-textfield mdc-textfield--multiline" data-mdc-auto-init="MDCTextfield">
                    <textarea id="multi-line" name="scene-description" class="mdc-textfield__input" rows="6" cols="40" style="box-shadow: none;"></textarea>
                    <label for="multi-line" class="mdc-textfield__label">Add text for Credits</label>
                </div>

            </div>

            <div class="mdc-layout-grid__cell--span-1"></div>


            <div class="mdc-layout-grid__cell--span-5">

                <!-- ADD MORE DEPENDING ON THE SCENE -->

                <h2 class="mdc-typography--title">Featured image</h2>
                <input type="file" title="Featured image">

                <hr class="WhiteSpaceSeparator">

                <h2 class="mdc-typography--title">Enable sections</h2>

                <div class="mdc-switch">
                    <input type="checkbox" id="options-switch" class="mdc-switch__native-control" />
                    <div class="mdc-switch__background">
                        <div class="mdc-switch__knob"></div>
                    </div>
                </div>
                <label for="options-switch" class="mdc-switch-label">Options</label>

                <hr class="WhiteSpaceSeparator">

                <div class="mdc-switch">
                    <input type="checkbox" id="login-switch" class="mdc-switch__native-control" />
                    <div class="mdc-switch__background">
                        <div class="mdc-switch__knob"></div>
                    </div>
                </div>
                <label for="login-switch" class="mdc-switch-label">Login</label>

                <hr class="WhiteSpaceSeparator">

                <div class="mdc-switch">
                    <input type="checkbox" id="help-switch" class="mdc-switch__native-control" />
                    <div class="mdc-switch__background">
                        <div class="mdc-switch__knob"></div>
                    </div>
                </div>
                <label for="help-switch" class="mdc-switch-label">Help</label>

                <hr class="WhiteSpaceSeparator">

	            <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                <input type="hidden" name="submitted" id="submitted" value="true" />
                <button style="float: right" class="mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" type="submit">
                    Save changes
                </button>

            </div>
        </div>
    </form>
    <script type="text/javascript">
        window.mdc.autoInit();
    </script>

<?php get_footer(); ?>