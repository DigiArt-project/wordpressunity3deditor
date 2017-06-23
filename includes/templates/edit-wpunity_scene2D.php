<?php

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$scene_id = intval( $_GET['wpunity_scene'] );
$scene_id = sanitize_text_field( $scene_id );

$scene_type = sanitize_text_field( $_GET['scene_type'] );

$project_id = intval( $_GET['wpunity_game'] );
$project_id = sanitize_text_field( $project_id );

$game_post = get_post($project_id);
$game_type_obj = wpunity_return_game_type($project_id);

$scene_post = get_post($scene_id);
$sceneSlug = $scene_post->post_title;

$editgamePage = wpunity_getEditpage('game');
$allGamesPage = wpunity_getEditpage('allgames');

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

    if($scene_type == 'credits'){
        $post_content = esc_attr(strip_tags($_POST['scene-description']));
        $post_image =  $_FILES['scene-featured-image'];
        //UPDATE THE ISSUE TO DB
        $scene_information = array(
            'ID' => $scene_id,
            'post_content' => $post_content,
        );

        $post_id = wp_update_post( $scene_information, true );
        if (is_wp_error($post_id)) {
            $errors = $post_id->get_error_messages();
            foreach ($errors as $error) {
                echo $error;
            }
        }

        $attachment_id = wpunity_upload_img( $post_image, $scene_id);
        set_post_thumbnail( $scene_id, $attachment_id );

    }elseif($scene_type == 'menu'){
        //$post_content = esc_attr(strip_tags($_POST['scene-description']));
        //UPDATE THE ISSUE TO DB
        $scene_information = array(
            'ID' => $scene_id,
            'post_content' => $post_content,
        );

        //wpunity_upload_img()

        update_post_meta($scene_id, 'wpunity_menu_has_options', 1);
        update_post_meta($scene_id, 'wpunity_menu_has_login', 1);
        update_post_meta($scene_id, 'wpunity_menu_has_help', 1);
    }




    if($post_id){
        wp_redirect(esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ));
        exit;
    }

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
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>" title="Go back to Project editor">Project Editor</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">2D Scene Editor</span></li>
    </ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><?php echo $sceneSlug; ?></h2>

    <form name="edit_scene_form" action="" id="edit_scene_form" method="POST" enctype="multipart/form-data">
        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__cell--span-5">

                <?php if ($scene_type == 'credits') { ?>

                    <h2 class="mdc-typography--title">Credits</h2>
                    <div class="mdc-textfield mdc-textfield--multiline" data-mdc-auto-init="MDCTextfield">
                        <textarea id="multi-line" name="scene-description" class="mdc-textfield__input" rows="6" cols="40" style="box-shadow: none;"><?php echo $scene_post->post_content; ?></textarea>
                        <label for="multi-line" class="mdc-textfield__label">Edit Credits text</label>
                    </div>

                <?php } else { ?>

                    <h2 class="mdc-typography--title">Enable sections</h2>

                    <div class="mdc-switch">
                        <input type="checkbox" name="options" value="true" id="options-switch" class="mdc-switch__native-control" />
                        <div class="mdc-switch__background">
                            <div class="mdc-switch__knob"></div>
                        </div>
                    </div>
                    <label for="options-switch" class="mdc-switch-label">Options</label>

                    <hr class="WhiteSpaceSeparator">

                    <div class="mdc-switch">
                        <input type="checkbox" name="login" value="true" id="login-switch" class="mdc-switch__native-control" />
                        <div class="mdc-switch__background">
                            <div class="mdc-switch__knob"></div>
                        </div>
                    </div>
                    <label for="login-switch" class="mdc-switch-label">Login</label>

                    <hr class="WhiteSpaceSeparator">

                    <div class="mdc-switch">
                        <input type="checkbox" name="help" value="true" id="help-switch" class="mdc-switch__native-control" />
                        <div class="mdc-switch__background">
                            <div class="mdc-switch__knob"></div>
                        </div>
                    </div>
                    <label for="help-switch" class="mdc-switch-label">Help</label>

                <?php } ?>
            </div>

            <div class="mdc-layout-grid__cell--span-1"></div>
            <div class="mdc-layout-grid__cell--span-6">

                <!-- ADD MORE DEPENDING ON THE SCENE -->

                <h2 class="mdc-typography--title">Featured image</h2>
                <input type="file" name="scene-featured-image" title="Featured image">

                <hr class="WhiteSpaceSeparator">

                <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                <input type="hidden" name="submitted" id="submitted" value="true" />
                <button  class="mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" type="submit">
                    Submit changes
                </button>

            </div>
        </div>
    </form>
    <script type="text/javascript">
        window.mdc.autoInit();

        function handleCheckbox(id) {
            var checkbox = jQuery("#"+id);

            console.log(checkbox);

            if (checkbox.is(':checked')) {
                console.log("checked!");
                /*checkbox.prop('checked', true);*/
                document.getElementById('options-switch').checked = true;
            } else {
                checkbox.prop('checked', false);
                document.getElementById('options-switch').checked = false;
            }
        }

    </script>

<?php get_footer(); ?>