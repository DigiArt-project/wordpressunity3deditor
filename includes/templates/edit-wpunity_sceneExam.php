<?php

function load2DSceneEditorScripts() {
	wp_enqueue_script('wpunity_scripts');
	/*wp_enqueue_script( 'tinymce_js', includes_url( 'js/tinymce/' ) . 'wp-tinymce.php', array( 'jquery' ), false, true );*/
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
$moleculesSavedfield = get_post_meta($scene_id, 'wpunity_input_molecules');
$moleculesSaved = json_decode($moleculesSavedfield[0]);

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
                        <div class="mdc-layout-grid__cell--span-5">

                            <h2 class="mdc-typography--title">Available molecules</h2>

                            <div class="select-manager">

                                <select title="Available Molecules" multiple size="6" class="mdc-multi-select mdc-list" id="allMoleculesSelectManager">
                                    <optgroup class="mdc-list-group" label="All Molecules" id="allMoleculesGroup">

										<?php foreach ($molecules as $molecule) { ?>

                                            <option class="mdc-list-item" data-molecule-id="<?php echo $molecule['moleculeID']; ?>" id="<?php echo 'molecule-'.$molecule['moleculeID']; ?>">
												<?php echo $molecule['moleculeName']; ?>
                                            </option>

										<?php } ?>
                                    </optgroup>
                                    <option class="mdc-list-divider" role="presentation" disabled />
                                </select>
                            </div>

                        </div>
                        <div class="mdc-layout-grid__cell--span-2" style="position: relative">


                            <div style="position: absolute; top:120px; width: 100%;">

                                <a type="button" id="moleculeAddBtn" class="ToggleMoleculeBtnStyle mdc-button mdc-button--raised mdc-button--primary mdc-button--dense" title="Add molecule to active list" data-mdc-auto-init="MDCRipple">
                                    <i class="material-icons">arrow_forward</i>
                                </a>

                                <a type="button" id="moleculeRemoveBtn" class="ToggleMoleculeBtnStyle mdc-button mdc-button--raised mdc-button--primary mdc-button--dense" title="Remove molecule from active list " data-mdc-auto-init="MDCRipple">
                                    <i class="material-icons">arrow_back</i>
                                </a>


                            </div>
                        </div>
                        <div class="mdc-layout-grid__cell--span-5">

                            <h2 class="mdc-typography--title">Active molecules</h2>

                            <select title="Active Molecules" multiple size="6" class="mdc-multi-select mdc-list" id="selectedMoleculesSelectManager">
                                <optgroup class="mdc-list-group" label="Active Molecules" id="activeMoleculesGroup">

                                </optgroup>
                                <option class="mdc-list-divider" role="presentation" disabled />
                            </select>
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

        (function() {

            jQuery( "#moleculeAddBtn" ).click(function() {

                var availableMolecules = [];
                var activeMolecules = [];

                // Populate the two lists;
                jQuery("#allMoleculesSelectManager option").each(function() {
                    if(this.dataset.moleculeId) {
                        availableMolecules.push(parseInt(this.dataset.moleculeId, 10));
                    }
                });
                jQuery("#selectedMoleculesSelectManager option").each(function() {
                    if(this.dataset.moleculeId) {
                        activeMolecules.push(parseInt(this.dataset.moleculeId, 10));
                    }
                });

                // Intersect 2 arrays in destructive manner (faster)
                // If no intersection in all xchecks, then add item
                if (intersection_destructive(availableMolecules, activeMolecules).length === 0) {
                    jQuery('#allMoleculesSelectManager option:selected').clone().appendTo('#activeMoleculesGroup');
                    updateSelectedMolecules();
                }

            });

            jQuery( "#moleculeRemoveBtn" ).click(function() {
                jQuery('#selectedMoleculesSelectManager option:selected').remove();
                updateSelectedMolecules();
            });

            function updateSelectedMolecules() {

                var values = jQuery.map(jQuery('#activeMoleculesGroup option'), function(el) {

                    var id = jQuery(el).data('molecule-id');

                    return {
                        name: jQuery(el).val(),
                        id: id
                    }
                });

                jQuery('#active-molecules-input').val(JSON.stringify(values));
            }
        })();

        function intersection_destructive(a, b)
        {
            var result = [];
            while( a.length > 0 && b.length > 0 )
            {
                if      (a[0] < b[0] ){ a.shift(); }
                else if (a[0] > b[0] ){ b.shift(); }
                else /* they're equal */
                {
                    result.push(a.shift());
                    b.shift();
                }
            }

            return result;
        }

    </script>

<?php get_footer(); ?>