<?php

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}
$parameter_assetpass = $perma_structure ? '?wpunity_asset=' : '&wpunity_asset=';

$project_id = intval( $_GET['wpunity_game'] );
$project_id = sanitize_text_field( $project_id );

if( isset($_GET['wpunity_asset']) ) {

	$asset_inserted_id = sanitize_text_field( intval( $_GET['wpunity_asset'] ));
	$asset_post = get_post($asset_inserted_id);
	if($asset_post->post_type == 'wpunity_asset3d') {
		$create_new = 0;
		$asset_checked_id = $asset_inserted_id;
	}
}


$game_post = get_post($project_id);
$gameSlug = $game_post->post_name;

$isAdmin = is_admin() ? 'back' : 'front';
echo '<script>';
echo 'isAdmin="'.$isAdmin.'";'; // This variable is used in the request_game_assemble.js
echo '</script>';


$pluginpath = dirname (plugin_dir_url( __DIR__  ));
$pluginpath = str_replace('\\','/',$pluginpath);

//--Uploads/myGameProjectUnity--
$upload_dir = wp_upload_dir()['basedir'];
$upload_dir = str_replace('\\','/',$upload_dir);


// COMPILE Ajax
$gameUnityProject_dirpath = $upload_dir . '/' . $gameSlug . 'Unity';

$thepath = $pluginpath . '/js_libs/assemble_compile_commands/request_game_assepile.js';
wp_enqueue_script( 'ajax-script_assepile', $thepath, array('jquery') );
wp_localize_script( 'ajax-script_assepile', 'my_ajax_object_assepile',
	array( 'ajax_url' => admin_url( 'admin-ajax.php'),
	       'id' => $project_id,
	       'slug' => $gameSlug,
	       'gameUnityProject_dirpath' => $gameUnityProject_dirpath,
	       'gameUnityProject_urlpath' => $pluginpath.'/../../uploads/'. $gameSlug . 'Unity/'
	)
);

// DELETE SCENE AJAX
wp_enqueue_script( 'ajax-script_deletescene', $pluginpath . '/js_libs/delete_ajaxes/delete_scene.js', array('jquery') );
wp_localize_script( 'ajax-script_deletescene', 'my_ajax_object_deletescene',
	array( 'ajax_url' => admin_url( 'admin-ajax.php'))
);

//FOR SAVING extra keys
wp_enqueue_script( 'ajax-script_savegio', $pluginpath.'/js_libs/save_scene_ajax/wpunity_save_scene_ajax.js', array('jquery') );
wp_localize_script( 'ajax-script_savegio', 'my_ajax_object_savegio',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'project_id' => $project_id )
);


$project_saved_keys = wpunity_getProjectKeys($project_id);

//Get 'parent-game' taxonomy with the same slug as Game (in order to show scenes that belong here)
$allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
$allScenePGameID = $allScenePGame->term_id;

$game_type_obj = wpunity_return_game_type($project_id);

$editscenePage = wpunity_getEditpage('scene');
$editscene2DPage = wpunity_getEditpage('scene2D');
$editsceneExamPage = wpunity_getEditpage('sceneExam');
$editgamePage = wpunity_getEditpage('game');
$newAssetPage = wpunity_getEditpage('asset');
$allGamesPage = wpunity_getEditpage('allgames');

$urlforAssetEdit = esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id . '&wpunity_scene=' .$scene_id . '&wpunity_asset=' ); // . asset_id


if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	$credentials_yaml_tax = get_term_by('slug', 'credentials-yaml', 'wpunity_scene_yaml');
	$menu_yaml_tax = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml');
	$options_yaml_tax = get_term_by('slug', 'options-yaml', 'wpunity_scene_yaml');

	$thegameType = wp_get_post_terms($project_id, 'wpunity_game_type');
	if($thegameType[0]->slug == 'archaeology_games'){$newscene_yaml_tax = get_term_by('slug', 'wonderaround-yaml', 'wpunity_scene_yaml');}
    elseif($thegameType[0]->slug == 'energy_games'){$newscene_yaml_tax = get_term_by('slug', 'educational-energy', 'wpunity_scene_yaml');}
    elseif($thegameType[0]->slug == 'chemistry_games'){$newscene_yaml_tax = get_term_by('slug', 'wonderaround-lab-yaml', 'wpunity_scene_yaml');}

	$default_json = '{
	"metadata": {
		"formatVersion" : 4.0,
		"type"		    : "scene",
		"generatedBy"	: "SceneExporter.js",
		"objects"       : 1},

	"urlBaseType": "relativeToScene",

	"objects" :
	{
		"avatarYawObject" : {
			"position" : [0,0,0],
			"rotation" : [0,0,0],
			"scale"	   : [1,1,1],
			"visible"  : true,
			"children" : {
			}
		}

	}

}
';
	$scene_taxonomies = array(
		'wpunity_scene_pgame' => array(
			$allScenePGameID,
		),
		'wpunity_scene_yaml' => array(
			$newscene_yaml_tax->term_id,
		)
	);

	$scene_metas = array(
		'wpunity_scene_default' => 0,
		'wpunity_scene_metatype' => 'scene',
		'wpunity_scene_json_input' => $default_json,
		'wpunity_isRegional' => 0,
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

		wp_redirect(esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ));
		exit;
	}
}


get_header();
?>

    <div class="PageHeaderStyle">

        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light">
            <a title="Back" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>"> <i class="material-icons" style="font-size: 36px; vertical-align: top;" >arrow_back</i> </a>
			<?php echo $game_post->post_title; ?>
        </h1>

        <a id="compileGameBtn" class="mdc-button mdc-button--raised mdc-button--primary HeaderButtonStyle" data-mdc-auto-init="MDCRipple">
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

    <a class="mdc-button mdc-button--primary AddNewAssetBtnStyle" href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id ); ?>" data-mdc-auto-init="MDCRipple">Add New 3D Asset</a>


    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Game analytics keys</h2>
    <a class="mdc-button mdc-button--primary EditPageAccordion" data-mdc-auto-init="MDCRipple"><i class="material-icons ButtonIcon" >add</i> Change keys</a>


    <div class="EditPageAccordionPanel">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">

                    <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">GIO app_key</h3>

                    <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                        <input id="app-key" name="app-key" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                               style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;" value="<?php if($project_saved_keys['gioID'] != ''){echo $project_saved_keys['gioID'];} ?>">
                        <label for="app-key" class="mdc-textfield__label">Insert a valid app_key</label>
                        <div class="mdc-textfield__bottom-line"></div>
                    </div>

                    <button id="save-gio-button" class="mdc-button mdc-button--raised mdc-theme--primary-bg FullWidth" data-mdc-auto-init="MDCRipple" type="submit">
                        SAVE
                    </button>
                </div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2"></div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                    <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">Experiment ID (GUID)</h3>

                    <a id="guid-generator-btn" class="mdc-button mdc-button--primary" data-mdc-auto-init="MDCRipple">
                        GENERATE NEW
                    </a>
                    <div class="mdc-textfield mdc-textfield--disabled mdc-text" style="max-width: 70%; width: 100%;" data-mdc-auto-init="MDCTextfield">
                        <input id="exp-id" name="exp-id" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                               style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;"  value="<?php if($project_saved_keys['expID'] != ''){echo $project_saved_keys['expID'];} ?>">
                        <label for="exp-id" class="mdc-textfield__label"></label>
                        <div class="mdc-textfield__bottom-line"></div>
                    </div>

                    <br>
                    <button id="save-expid-button" class="mdc-button mdc-button--raised mdc-theme--primary-bg FullWidth" data-mdc-auto-init="MDCRipple" type="submit">
                        SAVE
                    </button>

                </div>
            </div>
        </div>
    </div>


    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Scenes</h2>
    <a class="mdc-button mdc-button--primary EditPageAccordion" data-mdc-auto-init="MDCRipple"><i class="material-icons ButtonIcon" >add</i> Add New Scene</a>


    <div class="EditPageAccordionPanel">
        <form name="create_new_scene_form" action="" id="create_new_scene_form" method="POST" enctype="multipart/form-data">
            <div class="mdc-layout-grid">

                <div class="mdc-layout-grid__inner">

                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">
                        <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                            <input id="title" name="scene-title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                                   aria-controls="title-validation-msg" required minlength="3" maxlength="25" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                            <label for="title" class="mdc-textfield__label"> Enter a scene title</label>
                            <div class="mdc-textfield__bottom-line"></div>
                        </div>
                        <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                           id="title-validation-msg">
                            Between 3 - 25 characters
                        </p>
                    </div>

                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>

                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">

                        <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                            <input id="desc" name="scene-description" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                                   maxlength="50" aria-controls="desc-validation-msg" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                            <label for="desc" class="mdc-textfield__label"> Enter a scene description </label>
                            <div class="mdc-textfield__bottom-line"></div>
                        </div>

                    </div>
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>

                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">

						<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                        <button style="float:right;" class="mdc-button mdc-button--raised mdc-theme--primary-bg" data-mdc-auto-init="MDCRipple" type="submit">
                            ADD SCENE
                        </button>

                    </div>
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

        <div class="mdc-layout-grid__inner">

			<?php while ( $custom_query->have_posts() ) :
				$custom_query->the_post();
				$scene_id = get_the_ID();
				$scene_title = get_the_title();
				$scene_desc = get_the_content();

				?>

                <div id="scene-<?php echo $scene_id; ?>" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3 SceneCardContainer">
                    <div class="mdc-card mdc-theme--background">
                        <div class="SceneThumbnail">
							<?php

							$default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true ); //=true Default scene - NOT DELETE-ABLE
							$scene_type    = get_post_meta( $scene_id, 'wpunity_scene_metatype', true ); //=menu,scene,credits - EDITABLE

							//create permalink depending the scene yaml category
							$edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
							if($scene_type == 'sceneExam' ){$edit_scene_page_id = $editsceneExamPage[0]->ID;}
							$edit_page_link     = esc_url( get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . $scene_type );
							?>
                            <a href="<?php echo $edit_page_link; ?>">

								<?php if(has_post_thumbnail($scene_id)) { ?>
									<?php echo get_the_post_thumbnail( $scene_id ); ?>

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
                                <a class="mdc-theme--primary" href="<?php echo $edit_page_link; ?>"><?php echo $scene_title; ?></a>
                            </h1>
                            <h2 class="mdc-card__subtitle mdc-theme--text-secondary-on-light SceneCardDescriptionStyle">
                                &#8203;<?php echo $scene_desc; ?>
                            </h2>

                        </section>
                        <section class="mdc-card__actions">
							<?php if (!$default_scene) { ?>
                                <a id="deleteSceneBtn" data-mdc-auto-init="MDCRipple" title="Delete scene" class="mdc-button mdc-button--compact mdc-card__action" onclick="deleteScene(<?php echo $scene_id; ?>)">DELETE</a>
							<?php } ?>
                            <a data-mdc-auto-init="MDCRipple" title="Edit scene" class="mdc-button mdc-button--compact mdc-card__action mdc-button--primary" href="<?php echo $edit_page_link; ?>">EDIT</a>
                        </section>
                    </div>
                </div>

			<?php endwhile;?>

            <!--Delete Scene Dialog-->
            <aside id="delete-dialog"
                   class="mdc-dialog"
                   role="alertdialog"
                   aria-labelledby="Delete scene dialog"
                   aria-describedby="You can delete the selected from the current game project" data-mdc-auto-init="MDCDialog">
                <div class="mdc-dialog__surface">
                    <header class="mdc-dialog__header">
                        <h2 id="delete-dialog-title" class="mdc-dialog__header__title">
                            Delete scene?
                        </h2>
                    </header>
                    <section id="delete-dialog-description" class="mdc-dialog__body">
                        Are you sure you want to delete this scene? There is no Undo functionality once you delete it.
                    </section>

                    <section id="delete-scene-dialog-progress-bar" class="CenterContents mdc-dialog__body" style="display: none;">
                        <h3 class="mdc-typography--title">Deleting...</h3>

                        <div class="progressSlider">
                            <div class="progressSliderLine"></div>
                            <div class="progressSliderSubLine progressIncrease"></div>
                            <div class="progressSliderSubLine progressDecrease"></div>
                        </div>
                    </section>

                    <footer class="mdc-dialog__footer">
                        <a class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button" id="deleteSceneDialogCancelBtn">Cancel</a>
                        <a class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-button--raised" id="deleteSceneDialogDeleteBtn">Delete</a>
                    </footer>
                </div>
                <div class="mdc-dialog__backdrop"></div>
            </aside>

            <!--Compile Dialog-->
            <aside id="compile-dialog"
                   class="mdc-dialog"
                   role="alertdialog"
                   data-game-slug="<?php echo $gameSlug; ?>"
                   data-project-id="<?php echo $project_id; ?>"
                   aria-labelledby="my-mdc-dialog-label"
                   aria-describedby="my-mdc-dialog-description" data-mdc-auto-init="MDCDialog">
                <div class="mdc-dialog__surface">

                    <header class="mdc-dialog__header">
                        <h2 class="mdc-dialog__header__title">
                            Compile game
                        </h2>
                    </header>

                    <section class="mdc-dialog__body">

                        <h3 class="mdc-typography--subheading2"> Platform </h3>

                        <div id="platform-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 40%;">
                            <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Select a platform</span>
                            <div class="mdc-simple-menu mdc-select__menu" style="position: initial; max-height: none; ">
                                <ul class="mdc-list mdc-simple-menu__items">
                                    <li class="mdc-list-item mdc-theme--text-hint-on-light" role="option" id="platforms" aria-disabled="true" style="pointer-events: none;" tabindex="-1">
                                        Select a platform
                                    </li>
                                    <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="platform-windows" tabindex="0">
                                        Windows
                                    </li>
                                    <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="platform-linux" tabindex="0">
                                        Linux
                                    </li>
                                    <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="platform-mac" tabindex="0">
                                        Mac OS
                                    </li>
                                    <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="platform-web" tabindex="0">
                                        Web
                                    </li>
                                    <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="platform-android" tabindex="0">
                                        Android
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <input id="platformInput" type="hidden">


                        <div class="mdc-typography--caption mdc-theme--text-primary-on-background" style="float: right;"> <i title="Memory Usage" class="material-icons AlignIconToBottom">memory</i> <span  id="unityTaskMemValue">0</span> KB </div>

                        <hr class="WhiteSpaceSeparator">

                        <h2 id="compileProgressTitle" style="display: none" class="CenterContents mdc-typography--headline">
                            Step: 1/4
                        </h2>

                        <div class="progressSlider" id="compileProgressDeterminate" style="display: none;">
                            <div class="progressSliderLine"></div>
                            <div class="progressSliderSubLineDeterminate" id="progressSliderSubLineDeterminateValue"></div>
                        </div>

                        <div class="progressSlider" id="compileProgressSlider" style="display: none;">
                            <div class="progressSliderLine"></div>
                            <div class="progressSliderSubLine progressIncrease"></div>
                            <div class="progressSliderSubLine progressDecrease"></div>
                        </div>


                        <div id="compilationProgressText" class="CenterContents mdc-typography--title"></div>

                        <div class="CenterContents">
                            <a class="mdc-typography--title" href="" id="wpunity-ziplink" style="display:none;"> <i style="vertical-align: text-bottom" class="material-icons">file_download</i> Download Zip</a>
                            <a class="mdc-typography--title" href="" id="wpunity-weblink" style="display:none;margin-left:30px" target="_blank">Web link</a>
                        </div>

                    </section>

                    <footer class="mdc-dialog__footer">
                        <a id="compileCancelBtn" class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button">Cancel</a>
                        <a id="compileProceedBtn" type="button" class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-button--raised LinkDisabled">Proceed</a>
                    </footer>
                </div>
                <div class="mdc-dialog__backdrop"></div>
            </aside>

        </div>
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
$wp_query = $temp_query; ?>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Assets</h2>




<?php $assets = wpunity_getAllassets_byGameProject($gameSlug);

// Output custom query loop
if ( $assets ) :?>

    <div class="mdc-layout-grid">

        <div class="mdc-layout-grid__inner">

			<?php foreach ($assets as $asset) {	?>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">

                    <div class="mdc-card mdc-theme--background" id="<?php echo $asset[assetid]; ?>">
                        <div class="SceneThumbnail">
                            <a href="#">

								<?php if ($asset[screenImagePath]){ ?>

                                    <img width="495" height="330" src="<?php echo $asset[screenImagePath]; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">

								<?php } else { ?>
                                    <div style="min-height: 226px;" class="DisplayBlock mdc-theme--secondary-bg CenterContents">
                                        <i style="font-size: 64px; padding-top: 80px;" class="material-icons mdc-theme--text-icon-on-background">insert_photo</i>
                                    </div>
								<?php } ?>

                            </a>
                        </div>

                        <div class="mdc-card__primary">
                            <h1 class="mdc-card__title mdc-typography--title" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <a class="mdc-theme--secondary" href=""><?php echo $asset[assetName];?></a>
                            </h1>
                        </div>

                        <!--TODO: Check the urls for edit and delete-->
                        <section class="mdc-card__actions">
                            <a id="deleteAssetBtn" data-mdc-auto-init="MDCRipple" title="Delete asset" class="mdc-button mdc-button--compact mdc-card__action" onclick="wpunity_deleteAssetAjax(<?php echo $asset[assetid]; ?> , <?php echo $gameSlug ?>)">DELETE</a>
                            <a data-mdc-auto-init="MDCRipple" title="Edit asset" class="mdc-button mdc-button--compact mdc-card__action mdc-button--primary" href="<?php echo $urlforAssetEdit; ?>&<?php echo $asset[assetid]; ?>\'">EDIT</a>
                        </section>

                    </div>
                </div>
			<?php } ?>

        </div>
    </div>

<?php else : ?>

    <hr class="WhiteSpaceSeparator">

    <div class="CenterContents">

        <i class="material-icons mdc-theme--text-icon-on-light" style="font-size: 96px;" aria-hidden="true" title="No assets available">
            landscape
        </i>

        <h3 class="mdc-typography--headline">No Assets available</h3>
        <hr class="WhiteSpaceSeparator">

    </div>


<?php endif; ?>



    <script type="text/javascript">

        // Convert scene to json and put the json in the wordpress field wpunity_scene_json_input
        jQuery('#save-gio-button').click(function() {
            wpunity_saveGIOApKeyAjax();
        });

        jQuery('#save-expid-button').click(function() {
            wpunity_saveExpIDAjax();
        });

        var mdc = window.mdc;
        mdc.autoInit();

        var deleteDialog = new mdc.dialog.MDCDialog(document.querySelector('#delete-dialog'));
        var compileDialog = new mdc.dialog.MDCDialog(document.querySelector('#compile-dialog'));
        compileDialog.focusTrap_.deactivate();
        deleteDialog.focusTrap_.deactivate();


        jQuery( "#compileGameBtn" ).click(function() {
            compileDialog.show();
        });

        jQuery( "#compileCancelBtn" ).click(function(e) {

            var pid = jQuery( "#compileCancelBtn" ).attr("data-unity-pid");

            console.log(pid);

            if (pid) {
                wpunity_killtask_compile(pid);
            }
        });

        jQuery( "#compileProceedBtn" ).click(function() {

            jQuery( "#platform-select" ).addClass( "mdc-select--disabled" ).attr( "aria-disabled","true" );
            jQuery( "#compileProgressSlider" ).show();
            jQuery( "#compileProgressTitle" ).show();

            jQuery( "#compileProceedBtn" ).addClass( "LinkDisabled" );
            jQuery( "#compileCancelBtn" ).addClass( "LinkDisabled" );

            jQuery( "#wpunity-ziplink" ).hide();
            jQuery( "#wpunity-weblink" ).hide();

            jQuery( "#compilationProgressText" ).html("");

            jQuery('#unityTaskMemValue').html("0");

            wpunity_assepileAjax();
        });

        var MDCSelect = mdc.select.MDCSelect;
        var platformDropdown = document.getElementById('platform-select');
        var platformSelect = MDCSelect.attachTo(platformDropdown);

        platformDropdown.addEventListener('MDCSelect:change', function() {
            jQuery( "#platformInput" ).attr( "value", platformSelect.selectedOptions[0].getAttribute("id") );
            jQuery( "#compileProceedBtn" ).removeClass( "LinkDisabled" );
        });


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

        jQuery("#guid-generator-btn").click(function (e) {
            document.getElementById('exp-id').value = guid();
        });


        jQuery("#deleteSceneDialogDeleteBtn").click(function (e) {

            //console.log("ID:", deleteDialog.id);

            jQuery('#delete-scene-dialog-progress-bar').show();

            jQuery( "#deleteSceneDialogDeleteBtn" ).addClass( "LinkDisabled" );
            jQuery( "#deleteSceneDialogCancelBtn" ).addClass( "LinkDisabled" );

            wpunity_deleteSceneAjax(deleteDialog.id);
        });

        jQuery("#deleteSceneDialogCancelBtn").click(function (e) {

            jQuery('#delete-scene-dialog-progress-bar').hide();
            deleteDialog.close();
        });

        function deleteScene(id) {

            var dialogTitle = document.getElementById("delete-dialog-title");
            var dialogDescription = document.getElementById("delete-dialog-description");
            var sceneTitle = document.getElementById(id+"-title").textContent.trim();

            dialogTitle.innerHTML = "<b>Delete " + sceneTitle+"?</b>";
            dialogDescription.innerHTML = "Are you sure you want to delete your scene '" +sceneTitle + "'? There is no Undo functionality once you delete it.";
            deleteDialog.id = id;
            deleteDialog.show();
        }

        function hideCompileProgressSlider() {
            jQuery( "#compileProgressSlider" ).hide();
            jQuery( "#compileProgressTitle" ).hide();
            jQuery( "#compileProgressDeterminate" ).hide();
            jQuery( "#platform-select" ).removeClass( "mdc-select--disabled" ).attr( "aria-disabled","false" );

            jQuery( "#compileProceedBtn" ).removeClass( "LinkDisabled" );
            jQuery( "#compileCancelBtn" ).removeClass( "LinkDisabled" );
        }

        function guid() {
            return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
                s4() + '-' + s4() + s4() + s4();
        }

        function s4() {
            return Math.floor((1 + Math.random()) * 0x10000)
                .toString(16)
                .substring(1);
        }

    </script>
<?php get_footer(); ?>