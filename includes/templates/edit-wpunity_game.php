<?php

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$project_id = intval( $_GET['wpunity_game'] );
$project_id = sanitize_text_field( $project_id );


$game_post = get_post($project_id);
$gameSlug = $game_post->post_name;

//Get 'parent-game' taxonomy with the same slug as Game (in order to show scenes that belong here)
$allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
$allScenePGameID = $allScenePGame->term_id;

$game_type_obj = wpunity_return_game_type($project_id);

$editscenePage = wpunity_getEditpage('scene');
$editscene2DPage = wpunity_getEditpage('scene2D');
$editgamePage = wpunity_getEditpage('game');
$newAssetPage = wpunity_getEditpage('asset');
$allGamesPage = wpunity_getEditpage('allgames');

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	$credentials_yaml_tax = get_term_by('slug', 'credentials-yaml', 'wpunity_scene_yaml');
	$menu_yaml_tax = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml');
	$options_yaml_tax = get_term_by('slug', 'options-yaml', 'wpunity_scene_yaml');
	$wonderaround_yaml_tax = get_term_by('slug', 'wonderaround-yaml', 'wpunity_scene_yaml');

	$scene_taxonomies = array(
		'wpunity_scene_pgame' => array(
			$allScenePGameID,
		),
		'wpunity_scene_yaml' => array(
			$wonderaround_yaml_tax->term_id,
		)
	);

	$scene_metas = array(
		'wpunity_scene_default' => 0,
		'wpunity_scene_metatype' => 'scene',
	);

	$scene_information = array(
		'post_title' => esc_attr(strip_tags($_POST['scene-title'])),
		'post_content' => esc_attr(strip_tags($_POST['scene-description'])),
		'post_type' => 'wpunity_scene',
		'post_status' => 'publish',
		'tax_input' => $scene_taxonomies,
		'meta_input' => $scene_metas,
	);

	$scene_id = wp_insert_post($scene_information);

	if($scene_id){
		$newpost = get_post($scene_id);
		wpunity_create_unityfile_noAssets('scene',$newpost->post_name,$scene_id,$gameSlug,$allScenePGameID,$yamlTermID);
		wp_redirect(esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ));
		exit;
	}
}


get_header();
?>

    <div class="EditPageHeader">

        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>

        <a class="mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
            COMPILE GAME
        </a>
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Category"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string;?>
    </span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">Project Editor</span></li>
    </ul>

    <a class="mdc-button mdc-button--primary mdc-theme--primary" style="float: right;" href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id ); ?>" data-mdc-auto-init="MDCRipple">Add New 3D Asset</a>


    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Scenes</h2>
    <a class="mdc-button mdc-button--primary mdc-theme--primary EditPageAccordion" data-mdc-auto-init="MDCRipple"><i class="material-icons mdc-theme--primary ButtonIcon" >add</i> Add New Scene</a>


    <!--<h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">My Scenes</h3>-->


    <div class="EditPageAccordionPanel">
        <form name="create_new_scene_form" action="" id="create_new_scene_form" method="POST" enctype="multipart/form-data">
            <div class="mdc-layout-grid">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">
                    <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                        <input id="title" name="scene-title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                               aria-controls="title-validation-msg" required minlength="6" maxlength="25" style="box-shadow: none; border-color:transparent;">
                        <label for="title" class="mdc-textfield__label">
                            Enter a scene title
                    </div>
                    <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                       id="title-validation-msg">
                        Between 6 - 25 characters
                    </p>

                    <hr class="WhiteSpaceSeparator">

                    <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                        <input id="desc" name="scene-description" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                               maxlength="50" aria-controls="desc-validation-msg" style="box-shadow: none; border-color:transparent;">
                        <label for="desc" class="mdc-textfield__label">
                            Enter a scene description
                    </div>

                </div>
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">


                    <h2 class="mdc-typography--title">Screenshot image</h2>
                    <input type="file" title="Scene screenshot image" accept="image/png, image/jpeg">

                    <hr class="WhiteSpaceSeparator">

					<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                    <button style="float:right;" class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" type="submit">
                        ADD SCENE
                    </button>

                </div>
            </div>
        </form>
    </div>



    <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">All Scenes</h3>

    <!-- LOAD STANDARD SCENES HERE-->

<?php
// Define custom query parameters
$custom_query_args = array(
	'post_type' => 'wpunity_scene',
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'wpunity_scene_pgame',
			'field'    => 'term_id',
			'terms'    => $allScenePGameID,
		),
	),
	'orderby' => 'ID',
	'order' => 'DESC',
	/*'paged' => $paged,*/
);

// Get current page and append to custom query parameters array
//$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

// Instantiate custom query
$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;

// Output custom query loop
if ( $custom_query->have_posts() ) :?>

    <div class="mdc-layout-grid">

		<?php while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			$scene_id = get_the_ID();
			$scene_title = get_the_title();
			$scene_desc = get_the_content();

			?>

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">
                <div class="mdc-card SceneCardContainer mdc-theme--background">
                    <div class="SceneThumbnail">
						<?php

						$default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true ); //=true Default scene - NOT DELETE-ABLE
						$scene_type    = get_post_meta( $scene_id, 'wpunity_scene_metatype', true ); //=menu,scene,credits - EDITABLE

						//create permalink depending the scene yaml category
						$edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
						$edit_page_link     = esc_url( get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . $scene_type );
						?>
                        <a href="<?php echo $edit_page_link; ?>">

							<?php if ($scene_thumb) { ?>

                                <img src="<?php echo site_url();?>">

							<?php } else { ?>

                                <div style="min-height: 226px;" class="DisplayBlock mdc-theme--primary-bg CenterContents">
                                    <i style="font-size: 64px; padding-top: 80px;" class="material-icons mdc-theme--text-icon-on-background">landscape</i>
                                </div>

							<?php } ?>
                        </a>
                    </div>
                    <section class="mdc-card__primary">
                        <h1 id="<?php echo $scene_id;?>-title" class="mdc-card__title mdc-typography--title"
                            style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo $scene_title; ?>">
							<?php echo $scene_title; ?>
                        </h1>
                        <h2 class="mdc-card__subtitle mdc-theme--text-secondary-on-light" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            &#8203;<?php echo $scene_desc; ?>
                        </h2>

                    </section>
                    <section class="mdc-card__actions">
						<?php if (!$default_scene) { ?>
                            <a data-mdc-auto-init="MDCRipple" title="Delete scene" class="mdc-button mdc-button--compact mdc-card__action" onclick="deleteScene(<?php echo $scene_id; ?>)">DELETE</a>
						<?php } ?>
                        <a data-mdc-auto-init="MDCRipple" title="Edit scene" class="mdc-button mdc-button--compact mdc-card__action mdc-button--primary" href="<?php echo $edit_page_link; ?>">EDIT</a>
                    </section>
                </div>
            </div>

		<?php endwhile;?>

        <!--Delete Game Dialog-->
        <aside id="delete-dialog"
               style="visibility:hidden"
               class="mdc-dialog"
               role="alertdialog"
               aria-labelledby="my-mdc-dialog-label"
               aria-describedby="my-mdc-dialog-description" data-mdc-auto-init="MDCDialog">
            <div class="mdc-dialog__surface">
                <header class="mdc-dialog__header">
                    <h2 id="delete-dialog-title" class="mdc-dialog__header__title">
                        Delete scene?
                    </h2>
                </header>
                <section id="delete-dialog-description" class="mdc-dialog__body mdc-typography--body1">
                    Are you sure you want to delete this scene? There is no Undo functionality once you delete it.
                </section>
                <footer class="mdc-dialog__footer">
                    <a class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button" onclick="dismissDialog();">Cancel</a>
                    <a class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-dialog__footer__button--accept mdc-button--raised">Delete</a>
                </footer>
            </div>
            <div class="mdc-dialog__backdrop"></div>
        </aside>


    </div>

<?php else : ?>

    <hr class="WhiteSpaceSeparator">

    <div class="CenterContents">

        <i class="material-icons mdc-theme--text-icon-on-light" style="font-size: 96px;" aria-hidden="true" title="No scenes found">
            landscape
        </i>

        <h3 class="mdc-typography--headline">No Scenes found</h3>
        <hr class="WhiteSpaceSeparator">

    </div>


<?php endif;

wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query;
?>

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

        var dialog = new mdc.dialog.MDCDialog(document.querySelector('#delete-dialog'));

        function deleteScene(id) {

            var dialogTitle = document.getElementById("delete-dialog-title");
            var dialogDescription = document.getElementById("delete-dialog-description");
            var sceneTitle = document.getElementById(id+"-title").innerHTML;

            dialogTitle.innerHTML = "<b>Delete " + sceneTitle+"?</b>";
            dialogDescription.innerHTML = "Are you sure you want to delete your scene '" +sceneTitle + "'? There is no Undo functionality once you delete it.";
            dialog.id = id;
            dialog.show();
        }

        dialog.listen('MDCDialog:accept', function(evt) {

            console.log("ID:", dialog.id);
        });

        function dismissDialog() {
            dialog.close();
            console.log("Dialog closed");
        }

    </script>
<?php get_footer(); ?>