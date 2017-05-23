<?php

$safe_inserted_id = intval( $_GET['wpunity_scene'] );
$safe_inserted_id = sanitize_text_field( $safe_inserted_id );
$scene_id = $safe_inserted_id;

$scene_post = get_post($scene_id);
$sceneSlug = $scene_post->post_title;


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
        <li><a class="mdc-typography--caption mdc-theme--accent" href="#">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">Game Editor</span></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">Scene Editor</span></li>
    </ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><?php echo $sceneSlug; ?></h2>

    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__cell--span-12">

            <div name="scene-vr-editor" id="scene-vr-editor" style="margin-bottom:30px;">
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


    <script type="text/javascript">
        window.mdc.autoInit();
    </script>


<?php get_footer(); ?>