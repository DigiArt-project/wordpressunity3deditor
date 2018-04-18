<?php

function load2DSceneEditorScripts() {
	wp_enqueue_script('wpunity_scripts');
}
add_action('wp_enqueue_scripts', 'load2DSceneEditorScripts' );



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
	$input_molecules = $_POST['active-molecules-input'];
	update_post_meta($scene_id, 'wpunity_input_molecules', $input_molecules);

	wp_redirect(esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ));
	exit;

}

wp_enqueue_media($scene_post->ID);
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

$scene_title = 'Exam';
$molecules = wpunity_get_all_molecules_of_game($project_id);
$savedMolecules = get_post_meta($scene_id, 'wpunity_input_molecules');
$savedMolecules = json_decode($savedMolecules[0]);

get_header(); ?>


    <div class="PageHeaderStyle">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light">
            <a title="Back" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>"> <i class="material-icons" style="font-size: 36px; vertical-align: top;" >arrow_back</i> </a>
			<?php echo $game_post->post_title; ?>
        </h1>

    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Add category title & icon"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string; ?></span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>" title="Go back to Project editor">Project Editor</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected"><?php echo $scene_title; ?> Editor</span></li>

    </ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><?php echo $sceneSlug; ?></h2>

    <form name="edit_exam_scene_form" action="" id="edit_exam_scene_form" method="POST" enctype="multipart/form-data">
        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__inner">

                <div class="mdc-layout-grid__cell--span-12">

                    <h2 class="mdc-typography--title">Molecule selector</h2>
                    <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
                            Select molecules to insert them into the Exam. The active molecules order dictates the sequence of appearance in the Unity game.</span>

                    <div class="WhiteSpaceSeparator"></div>

                    <div class="mdc-layout-grid__inner">

                        <div class="mdc-layout-grid__cell--span-12 mdc-theme--primary-light-bg" style="border: 4px solid rgba(63,81,181, .23);">

                            <ul id="sortable1" class="connectedSortable mdc-layout-grid__inner">
                                <li style="visibility: hidden; min-height: 110px;" class="ui-state-default mdc-layout-grid__cell mdc-layout-grid__cell--span-2">No items</li>

                            </ul>
                        </div>


                        <div class="mdc-layout-grid__cell--span-12">


							<?php /*$molecules = wpunity_get_all_molecules_of_game($project_id); */?>
							<?php $molecules = wpunity_get_all_molecules_of_game('14'); ?>

							<?php print_r($molecules); ?>

                            <ul id="sortable2" class="connectedSortable mdc-layout-grid__inner">

                                <li class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2" style="min-height: 110px;">

                                    <!-- TODO: Each molecule is of this form-->
                                    <div class="mdc-card mdc-theme--background" id="<?php echo 'molecule-id' ?>">
                                        <div style="min-height: 110px; min-width: 100%; max-height: 110px; text-align: center; overflow: hidden; position: relative; ">

											<?php if ($molecules){ ?>
                                                <img width="495" height="330" src="<?php echo 'src'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
											<?php } else { ?>
                                                <div style="min-height: 110px;" class="DisplayBlock mdc-theme--secondary-bg CenterContents">
                                                    <i style="font-size: 48px; padding-top: 30px;" class="material-icons mdc-theme--text-icon-on-background">insert_photo</i>
                                                </div>
											<?php } ?>
                                        </div>

                                        <div class="mdc-card__primary">
                                            <p class="mdc-card__title mdc-typography--subheading2" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
												<?php echo 'TITLE';?>
                                            </p>
                                        </div>
                                    </div>

                                </li>


                                <li class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">Item 2</li>
                                <li class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">Item 3</li>
                                <li class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">Item 4</li>
                                <li class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">Item 5</li>
                                <li class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">Item 6</li>
                                <li class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">Item 7</li>
                                <li class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">Item 8</li>

                            </ul>

                        </div>
                    </div>

                </div>


                <input type="hidden" name="active-molecules-input" id="active-molecules-input" value="[]" />

                <div class="mdc-layout-grid__cell--span-12">

                    <hr class="WhiteSpaceSeparator">

					<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                    <input type="hidden" name="submitted" id="submitted" value="true" />

                    <button style="margin-bottom: 24px; width: 100%; height: 48px;" class="mdc-button mdc-elevation--z2 mdc-button--raised" data-mdc-auto-init="MDCRipple" type="submit">
                        Submit changes
                    </button>
                </div>
            </div>
        </div>
    </form>




    <script type="text/javascript">

        var mdc = window.mdc;
        mdc.autoInit();

        jQuery( function() {
            jQuery( "#sortable1, #sortable2" ).sortable({
                connectWith: ".connectedSortable",
                change: function(event, ui) {
                    ui.placeholder.css({visibility: 'visible', background : 'rgba(255, 64, 129, .54)'});
                }
            }).disableSelection();


        } );

    </script>

<?php get_footer(); ?>