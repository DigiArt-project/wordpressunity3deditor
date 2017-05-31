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


get_header(); ?>


    <div class="EditPageHeader">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>

        <!--<a class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
            Add a new 3D asset
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
    <form name="2dSceneForm">
        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__cell--span-5">
                <div class="mdc-textfield mdc-form-field FullWidth" data-mdc-auto-init="MDCTextfield">
                    <input id="title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" aria-controls="title-validation-msg" required minlength="6" style="box-shadow: none; border-color:transparent;">
                    <label for="title" class="mdc-textfield__label">
                        Enter a title
                </div>
            </div>
            <div class="mdc-layout-grid__cell--span-2"></div>

            <div class="mdc-layout-grid__cell--span-5">

                <!-- ADD MORE DEPENDING ON THE SCENE -->

            </div>
        </div>
    </form>
    <script type="text/javascript">
        window.mdc.autoInit();
    </script>

<?php get_footer(); ?>