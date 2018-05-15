<?php

//---------------------------------------------------------------------
if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else {$parameter_Scenepass = '&wpunity_scene=';}
$parameter_assetpass = $perma_structure ? '?wpunity_asset=' : '&wpunity_asset=';

$current_scene_id = intval( $_GET['wpunity_scene'] );
$current_scene_id = sanitize_text_field( $current_scene_id );

$project_id    = intval( $_GET['wpunity_game'] );
$project_id    = sanitize_text_field( $project_id );
$game_post     = get_post($project_id);
$game_type_obj = wpunity_return_game_type($project_id);

$project_saved_keys = wpunity_getProjectKeys($project_id);

$userid = get_current_user_id();
$user_data = get_userdata( $userid );
$user_email = $user_data->user_email;


$scene_post = get_post($current_scene_id);
$sceneTitle = $scene_post->post_name;

//$asset_inserted_id = sanitize_text_field( intval( $_GET['wpunity_asset'] ));
//$asset_post = get_post($asset_inserted_id);
//if($asset_post->post_type == 'wpunity_asset3d') {$create_new = 0;$asset_checked_id=$asset_inserted_id;}


$editgamePage = wpunity_getEditpage('game');
$allGamesPage = wpunity_getEditpage('allgames');
$newAssetPage = wpunity_getEditpage('asset');


$urlforAssetEdit = esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id . '&wpunity_scene=' .$current_scene_id . '&wpunity_asset=' ); // . asset_id


// Get 'parent-game' taxonomy with the same slug as Game (in order to show scenes that belong here)
$game_post = get_post($project_id);
$gameSlug = $game_post->post_name;
$allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
$allScenePGameID = $allScenePGame->term_id;

// Ajax for fetching game's assets within asset browser widget at vr_editor // user must be logged in to work, otherwise ajax has no privileges
$pluginpath = dirname (plugin_dir_url( __DIR__  ));
$pluginpath = str_replace('\\','/',$pluginpath);


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

wp_enqueue_script( 'ajax-script_filebrowse', $pluginpath.'/js_libs/scriptFileBrowserToolbarWPway.js', array('jquery') );
wp_localize_script( 'ajax-script_filebrowse', 'my_ajax_object_fbrowse', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

wp_enqueue_script( 'ajax-script_savescene', $pluginpath.'/js_libs/save_scene_ajax/wpunity_save_scene_ajax.js', array('jquery') );
wp_localize_script( 'ajax-script_savescene', 'my_ajax_object_savescene',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'scene_id' => $current_scene_id )
);


//$scene_new_info = array(
//    'ID' => $current_scene_id,
//    'post_title' => esc_attr(strip_tags()),
//    'post_content' => esc_attr(strip_tags()),
//);
//
//wp_update_post($scene_new_info);



wp_enqueue_script( 'ajax-script_deleteasset', $pluginpath.'/js_libs/delete_ajaxes/delete_asset.js', array('jquery') );
wp_localize_script( 'ajax-script_deleteasset', 'my_ajax_object_deleteasset',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
);


wp_enqueue_media($scene_post->ID);
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

if ($project_scope == 0) {
	$single_first = "Tour";
} else if ($project_scope == 1){
	$single_first = "Lab";
} else {
	$single_first = "Project";
}

get_header(); ?>

    <style>
        .panel { display: none; }
        .panel.active { display: block; }
        .mdc-tab { min-width: 0; }
    </style>

    <!-- START PAGE -->
    <div class="EditPageHeader">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light">
            <a title="Back" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>"> <i class="material-icons" style="font-size: 36px; vertical-align: top;" >arrow_back</i> </a>
			<?php echo $game_post->post_title; ?>
        </h1>

        <a id="addNewAssetBtn" style="visibility: hidden;" class="HeaderButtonStyle mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id . '&wpunity_scene=' .  $current_scene_id); ?>">
            Add a new 3D asset
        </a>
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="<?php echo $game_type_obj->string; ?>"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string; ?></span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>" title="Go back to Project editor"><?php echo $single_first; ?> Editor</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">3D Scene Editor</span></li>
    </ul>

    <div class="mdc-toolbar">
        <div class="mdc-toolbar__row" style="min-height: 0;">
            <div class="mdc-toolbar__section mdc-toolbar__section--shrink-to-fit mdc-toolbar__section--align-start">

                <div class="mdc-textfield mdc-textfield--fullwidth--theme-dark mdc-form-field" data-mdc-auto-init="MDCTextfield" style="margin-top: 0; margin-bottom:0;">
                    <input title="Scene title" placeholder="Scene title" value="<?php echo $scene_post->post_title; ?>" id="sceneTitleInput" name="sceneTitleInput" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-dark mdc-toolbar__title"
                           aria-controls="title-validation-msg" minlength="3" required style="border: none; border-bottom: 1px solid rgba(255, 255, 255, 0.3); box-shadow: none; border-radius: 0;">
                    <p class="mdc-textfield-helptext mdc-textfield-helptext--validation-msg"
                       id="title-validation-msg">
                        Must be at least 3 characters long
                    </p>
                    <div class="mdc-textfield__bottom-line"></div>
                </div>

            </div>

            <!--Set tab buttons-->
            <div class="mdc-toolbar__section mdc-toolbar__section--align-start" style="justify-content: flex-end">
                <nav id="dynamic-tab-bar" class="mdc-tab-bar mdc-tab-bar--indicator-secondary" role="tablist">
                    <a role="tab" aria-controls="panel-1" class="mdc-tab mdc-tab-active mdc-tab--active" href="#panel-1" >Editor</a>
					<?php if ( $game_type_obj->string === "Energy" || $game_type_obj->string === "Chemistry" ) { ?>

                        <a role="tab" aria-controls="panel-2" class="mdc-tab" href="#panel-2">Analytics</a>
                        <a role="tab" aria-controls="panel-3" class="mdc-tab" href="#panel-3">at-risk Student</a>
                        <a role="tab" aria-controls="panel-4" class="mdc-tab" href="#panel-4">DDA</a>

					<?php } ?>

                    <span class="mdc-tab-bar__indicator"></span>
                </nav>
            </div>

            <div class="mdc-toolbar__section mdc-toolbar__section--align-end">
                <div id="saveSceneBtn" class="SaveBtnContainerStyle">
                    <a data-mdc-auto-init="MDCRipple" title="Save all changes you made to the current scene"
                       id="save-scene-button"
                       class="mdc-button mdc-button--raised mdc-theme--text-primary-on-dark mdc-theme--secondary-bg">Save scene</a>
                </div>
            </div>

        </div>
    </div>

    <div class="panels">
        <div class="panel active" id="panel-1" role="tabpanel" aria-hidden="false">

            <div class="mdc-layout-grid">
                <div class="mdc-layout-grid__inner">
                    <div class="mdc-layout-grid__cell--span-12">
                        <div id="scene-vr-editor">
							<?php

							$meta_json = get_post_meta($current_scene_id, 'wpunity_scene_json_input', true);

							// Do not put esc_attr, crashes the universe in 3D
							$sceneToLoad = $meta_json ? $meta_json : file_get_contents( plugins_url()."/wordpressunity3deditor/assets/standard_scene.json");

							// Find scene dir string
							$parentGameSlug = wp_get_object_terms( $current_scene_id, 'wpunity_scene_pgame')[0]->slug;
							$parentGameId = wp_get_object_terms( $current_scene_id, 'wpunity_scene_pgame')[0]->term_id;
							$projectGameSlug = $parentGameSlug;

							$scenesNonRegional = wpunity_getNonRegionalScenes($_REQUEST['wpunity_game']);

							$doorsAllInfo = wpunity_get_all_doors_of_game_fastversion($parentGameId);

							$scenesMarkerAllInfo = wpunity_get_all_scenesMarker_of_game_fastversion($parentGameId);

							$scenefolder = $sceneTitle;
							$gamefolder = $parentGameSlug;
							$sceneID = $current_scene_id;

							$isAdmin = is_admin() ? 'back' : 'front';

							// vr_editor loads the $sceneToLoad
							require( plugin_dir_path( __DIR__ ) .  '/vr_editor.php' ); ?>
                        </div>
                    </div>

                    <!-- Scene Options Dialog-->
                    <aside id="options-dialog"
                           class="mdc-dialog"
                           role="alertdialog"
                           style="z-index: 1000;"
                           aria-labelledby="Scene options dialog"
                           aria-describedby="Set the settings of the scene" data-mdc-auto-init="MDCDialog">
                        <div class="mdc-dialog__surface">
                            <header class="mdc-dialog__header">
                                <h2 id="options-dialog-title" class="mdc-dialog__header__title">
                                    Scene options
                                </h2>
                            </header>
                            <section id="options-dialog-description" class="mdc-dialog__body">

                                <div class="mdc-layout-grid">
                                    <div class="mdc-layout-grid__inner">
                                        <div class="mdc-layout-grid__cell--span-6">

                                            <h2 class="mdc-typography--title">Description</h2>

                                            <div class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield" style="border: 1px solid rgba(0, 0, 0, 0.3);">
                                            <textarea id="sceneDescriptionInput" name="sceneDescriptionInput" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                                      type="text" form="3dAssetForm"><?php echo $scene_post->post_content; ?></textarea>
                                                <label for="sceneDescriptionInput" class="mdc-textfield__label" style="background: none;">Add a description</label>

                                            </div>

                                        </div>

                                        <div class="mdc-layout-grid__cell--span-6">

                                            <h2 class="mdc-typography--title">Screenshot</h2>
                                            <br>
                                            <div class="CenterContents">

												<?php $screenshotImgUrl = get_the_post_thumbnail_url( $current_scene_id );

												echo '<script>var is_scene_icon_manually_selected = false;</script>';

												if($screenshotImgUrl=='') {
													echo '<script type="application/javascript">is_scene_icon_manually_selected=false</script>';
												}else{
													echo '<script type="application/javascript">is_scene_icon_manually_selected=true</script>';
												}

												if ($screenshotImgUrl) { ?>

                                                    <div id="featureImgContainer" class="ImageContainer">
                                                        <img id="wpunity_scene_sshot" name="wpunity_scene_sshot" src="<?php echo $screenshotImgUrl; ?>">
                                                    </div>

												<?php } else { ?>
                                                    <div id="featureImgContainer">
                                                        <img style="width: 160px;" id="wpunity_scene_sshot" name="wpunity_scene_sshot" src="<?php echo plugins_url( '../images/ic_sshot.png', dirname(__FILE__)  ); ?>">
                                                    </div>
												<?php } ?>


                                                <input type="file"
                                                       style="margin: auto;"
                                                       name="wpunity_scene_sshot_manual_select"
                                                       title="Featured image"
                                                       value=""
                                                       id="wpunity_scene_sshot_manual_select"
                                                       accept="image/x-png,image/gif,image/jpeg" >

                                                <div class="CenterContents">

                                                    <p class="mdc-typography--subheading1"> <b>or</b> </p>
                                                    <!-- Clear selected image and take screenshot from 3D canvas-->
                                                    <a title="Capture screenshot from 3D editor"
                                                       id="clear-image-button" class="mdc-button mdc-button--primary mdc-button--raised">Take a screenshot</a>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="mdc-layout-grid">
                                    <div class="mdc-layout-grid__inner">

                                    </div>
                                </div>

                            </section>

                            <footer class="mdc-dialog__footer">
                                <a class=" mdc-button mdc-button--primary mdc-dialog__footer__button mdc-dialog__footer__button--accept mdc-button--raised" id="sceneDialogOKBtn">OK</a>
                            </footer>
                        </div>
                        <div class="mdc-dialog__backdrop"></div>
                    </aside>

                </div>
            </div>

            <!--<div class="mdc-layout-grid__cell--span-4" style="position: relative;  padding-bottom: 56.25%; /* 16:9 */  padding-top: 25px; height: 0;">
						<iframe id="scene-analytics-iframe" style=" position: absolute; top: 0; left: 0; width: 400px; height: 500px;"></iframe>
					</div>-->

            <textarea title="wpunity_scene_json_input" id="wpunity_scene_json_input" style="visibility:hidden; width:0; height:0; display: none;"
                      name="wpunity_scene_json_input"> <?php echo get_post_meta( $current_scene_id, 'wpunity_scene_json_input', true ); ?></textarea>


            <div class="mdc-layout-grid">


                <!-- Scenes -->
				<?php
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

				$custom_query = new WP_Query( $custom_query_args );

				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $custom_query;
				?>

				<?php if ( $custom_query->have_posts() ) :?>

                <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Scenes</h2>
                <div class="mdc-layout-grid__inner">

					<?php while ( $custom_query->have_posts() ) :
						$custom_query->the_post();
						$scene_id = get_the_ID();
						$scene_title = get_the_title();
						$scene_desc = get_the_content();

						$current_card_bg = $current_scene_id == $scene_id ? 'mdc-theme--primary-light-bg' : '';

						$scene_type = get_post_meta( $scene_id, 'wpunity_scene_metatype', true );

						if($scene_type !== 'menu' && $scene_type !== 'credits') { ?>

                            <div id="scene-<?php echo $scene_id; ?>" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3 SceneCardContainer">

                                <div class="mdc-card mdc-theme--background <?php echo $current_card_bg;?> ">

                                    <div class="SceneThumbnail">
										<?php

										$default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true ); //=true Default scene - NOT DELETE-ABLE
										$scene_type    = get_post_meta( $scene_id, 'wpunity_scene_metatype', true ); //=menu,scene,credits - EDITABLE

										//create permalink depending the scene yaml category
										$edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
										if($scene_type == 'sceneExam2d' ||  $scene_type == 'sceneExam3d'){$edit_scene_page_id = $editsceneExamPage[0]->ID;}
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
						<?php } ?>
					<?php endwhile;?>

                    <div id="add-new-scene-card" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3 SceneCardContainer">

                        <div class="mdc-card mdc-theme--secondary-light-bg">

                            <section class="mdc-card__primary">

                                <h1 class="mdc-card__title mdc-typography--title"
                                    style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="Add new">
                                    <i class="material-icons AlignIconToMiddle">add</i>
                                    Add new scene
                                </h1>

                                <!--Title-->
                                <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                                    <input id="title" name="scene-title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-secondary-light"
                                           aria-controls="title-validation-msg" required minlength="3" maxlength="25" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                                    <label for="title" class="mdc-textfield__label"> Enter a scene title</label>
                                    <div class="mdc-textfield__bottom-line"></div>
                                </div>
                                <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                                   id="title-validation-msg">
                                    Between 3 - 25 characters
                                </p>

                                <!--Description-->
                                <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                                    <input id="desc" name="scene-description" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-secondary-light"
                                           maxlength="50" aria-controls="desc-validation-msg" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                                    <label for="desc" class="mdc-textfield__label"> Enter a scene description </label>
                                    <div class="mdc-textfield__bottom-line"></div>
                                </div>

                                <br>
                            </section>

                            <section class="mdc-card__primary">

                                <label class="mdc-typography--subheading2 mdc-theme--text-primary">Scene type</label>

                                <!--Scene Type-->
								<?php if($game_type_obj->string === "Chemistry"){ ?>
                                    <ul>
                                        <li class="mdc-form-field">
                                            <div class="mdc-radio">
                                                <input class="mdc-radio__native-control" type="radio" id="sceneType2DRadio" name="sceneTypeRadio" value="2d">
                                                <div class="mdc-radio__background">
                                                    <div class="mdc-radio__outer-circle"></div>
                                                    <div class="mdc-radio__inner-circle"></div>
                                                </div>
                                            </div>
                                            <label id="sceneType2DRadio-label" for="sceneType2DRadio" style="padding: 0; margin: 0;">2D</label>
                                        </li>
                                        &nbsp;
                                        <li class="mdc-form-field">
                                            <div class="mdc-radio">
                                                <input class="mdc-radio__native-control" type="radio" id="sceneType3DRadio" checked="" name="sceneTypeRadio" value="3d">
                                                <div class="mdc-radio__background">
                                                    <div class="mdc-radio__outer-circle"></div>
                                                    <div class="mdc-radio__inner-circle"></div>
                                                </div>
                                            </div>
                                            <label id="sceneType3DRadio-label" for="sceneType3DRadio" style="padding: 0; margin: 0;">3D</label>
                                        </li>
                                        &nbsp;
                                        <li class="mdc-form-field">
                                            <div class="mdc-radio">
                                                <input class="mdc-radio__native-control" type="radio" id="sceneTypeLabRadio" checked="" name="sceneTypeRadio" value="lab">
                                                <div class="mdc-radio__background">
                                                    <div class="mdc-radio__outer-circle"></div>
                                                    <div class="mdc-radio__inner-circle"></div>
                                                </div>
                                            </div>
                                            <label id="sceneTypeLabRadio-label" for="sceneTypeLabRadio" style="padding: 0; margin: 0;">Lab</label>
                                        </li>
                                    </ul>
								<?php } ?>

								<?php if($game_type_obj->string === "Energy"){ ?>
                                    <div class="mdc-form-field">
                                        <div class="mdc-checkbox" id="regional-checkbox-component">
                                            <input name="regionalSceneCheckbox" type="checkbox" id="regional-scene-checkbox" class="mdc-checkbox__native-control">
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                    <path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                        </div>
                                        <label class="" for="regional-scene-checkbox" style="padding: 0; margin: 0;">Regional scene</label>
                                    </div>
								<?php } ?>
                            </section>

                            <section class="mdc-card__primary">
                                <a style="float: right;" data-mdc-auto-init="MDCRipple" title="Add new scene"
                                   class="mdc-button mdc-button--compact mdc-card__action mdc-theme--primary"
                                   href="#">ADD NEW</a>

                            </section>
                        </div>
                    </div>

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


                </div>
            </div>
			<?php endif;
			wp_reset_query();
			?>


            <div class="mdc-layout-grid">

                <!-- Scenes -->
				<?php
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

				$custom_query = new WP_Query( $custom_query_args );

				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $custom_query;
				?>

				<?php if ( $custom_query->have_posts() ) :?>

                    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Game settings</h2>
                    <div class="mdc-layout-grid__inner">

						<?php while ( $custom_query->have_posts() ) :
							$custom_query->the_post();
							$scene_id = get_the_ID();
							$scene_title = get_the_title();
							$scene_desc = get_the_content();

							$current_card_bg = $current_scene_id == $scene_id ? 'mdc-theme--primary-light-bg' : '';

							$scene_type = get_post_meta( $scene_id, 'wpunity_scene_metatype', true );

							if($scene_type == 'menu' || $scene_type == 'credits') { ?>

                                <div id="scene-<?php echo $scene_id; ?>" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3 SceneCardContainer">

                                    <div class="mdc-card mdc-theme--background <?php echo $current_card_bg;?> ">

                                        <div class="SceneThumbnail">
											<?php

											$default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true ); //=true Default scene - NOT DELETE-ABLE
											$scene_type    = get_post_meta( $scene_id, 'wpunity_scene_metatype', true ); //=menu,scene,credits - EDITABLE

											//create permalink depending the scene yaml category
											$edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
											if($scene_type == 'sceneExam2d' ||  $scene_type == 'sceneExam3d'){$edit_scene_page_id = $editsceneExamPage[0]->ID;}
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


							<?php } ?>
						<?php endwhile; ?>

                        <?php if ($game_type_obj->string === "Chemistry") { ?>

                            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">

                                <h3 class="mdc-typography--title">Strategy JSON</h3>
                                <div class="mdc-textfield" data-mdc-auto-init="MDCTextfield">
                                    <input id="molecule-json-field" name="molecule-json-field" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-secondary-light"
                                           style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                                    <label for="molecule-json-field" class="mdc-textfield__label"> </label>
                                    <div class="mdc-textfield__bottom-line"></div>
                                </div>
                                <br>


                            </div>

                        <?php } ?>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">

                            <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">GIO APP KEY</h3>

                            <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                                <input id="app-key" name="app-key" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light mdc-textfield--disabled"
                                       style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;" value="<?php if($project_saved_keys['gioID'] != ''){echo $project_saved_keys['gioID'];} ?>">
                                <label for="app-key" class="mdc-textfield__label">APP KEY</label>
                                <div class="mdc-textfield__bottom-line"></div>
                            </div>


                            <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">Experiment ID (GUID)</h3>

                            <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                                <input id="exp-id" name="exp-id" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                                       style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;"  value="<?php if($project_saved_keys['expID'] != ''){echo $project_saved_keys['expID'];} ?>">
                                <label for="exp-id" class="mdc-textfield__label">Insert a valid exp id</label>
                                <div class="mdc-textfield__bottom-line"></div>
                            </div>

                            <br>

                            <a title="Save Experiment ID"
                               id="save-expid-button" class="mdc-button mdc-button--primary mdc-button--raised FullWidth">SAVE</a>

                        </div>

                    </div>

				<?php endif; ?>
            </div>
        </div>
		<?php if ( $game_type_obj->string === "Energy" || $game_type_obj->string === "Chemistry" ) {  ?>

            <div class="panel" id="panel-2" role="tabpanel" aria-hidden="true">
                <div class="mdc-layout-grid">

                    <div class="mdc-layout-grid__inner CenterContents">
                        <div class="mdc-layout-grid__cell--span-6">
                            <select id="analyticsVersionSelector" title="Select a version" class="mdc-select">
                                <option value="0.0.0.1 - 17/8/2017 15:55" selected>0.0.0.1 - 17/8/2017 15:55</option>
                                <option value="0.0.0.2 - 18/8/2017 05:55">0.0.0.2 - 18/8/2017 05:55</option>
                            </select>
                        </div>
                        <div class="mdc-layout-grid__cell--span-6">
                            <select id="analyticsLocationSelector" title="Select a location" class="mdc-select">
                                <option value="Greece" selected>Greece</option>
                                <option value="England">England</option>
                                <option value="Italy">Italy</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div style="min-height: 1240px;">
                    <iframe id="analyticsIframeContent" style="min-width: 100%; min-height: inherit;"></iframe>
                </div>

            </div>

            <div class="panel" id="panel-3" role="tabpanel" aria-hidden="true">
                <div style="min-height: 1240px;">
                    <iframe id="atRiskIframeContent" style="min-width: 100%; min-height: inherit;"></iframe>
                </div>
            </div>

            <div class="panel" id="panel-4" role="tabpanel" aria-hidden="true">
                <div style="min-height: 1240px;">
                    <iframe id="ddaIframeContent" style="min-width: 100%; min-height: inherit;"></iframe>
                </div>
            </div>

		<?php } ?>

    </div>


    <script type="text/javascript">

        var mdc = window.mdc;
        mdc.autoInit();

        var optionsDialog = document.querySelector('#options-dialog');
        if (optionsDialog) {
            optionsDialog = new mdc.dialog.MDCDialog(optionsDialog);
            jQuery( "#optionsPopupBtn" ).click(function() {
                optionsDialog.show();
            });
        }

        var deleteDialog = document.querySelector('#delete-dialog');
        if (deleteDialog) {
            deleteDialog = new mdc.dialog.MDCDialog(deleteDialog);
            deleteDialog.focusTrap_.deactivate();
        }

        var project_id = <?php echo $project_id; ?>;

        var project_keys = [];
        project_keys = <?php echo json_encode(wpunity_getProjectKeys($project_id)); ?>;
        var scene_id = <?php echo $current_scene_id; ?>;
        var game_type = "<?php echo strtolower($game_type_obj->string);?>";
        var user_email = "<?php echo $user_email; ?>";

        // Convert scene to json and put the json in the wordpress field wpunity_scene_json_input
        jQuery('#save-expid-button').click(function() {
            wpunity_saveExpIDAjax();
        });

        if (project_keys.gioID) {
            ddaIframe(user_email, project_keys.extraPass, project_keys.gioID);
        }

        if (document.getElementById('regional-checkbox-component')) {
            var regionalCheckbox = mdc.checkbox.MDCCheckbox.attachTo(document.getElementById('regional-checkbox-component'));

            jQuery('#regional-checkbox-component').click(function () {
                jQuery('#regional-scene-checkbox').prop('checked', regionalCheckbox.checked);
            });
        }


        // For the time being we have analytics only for Energy
        if (game_type === "energy" || game_type === "chemistry") {
            var game_master_id = "<?php echo get_current_user_id();?>";

            var energy_stats = <?php echo json_encode(wpunity_windEnergy_scene_stats($current_scene_id)); ?>;

            var versionSelector = document.getElementById("analyticsVersionSelector");
            var locationSelector = document.getElementById("analyticsLocationSelector");

            var analyticsVersionValue = versionSelector.options[versionSelector.selectedIndex].value;
            var analyticsLocationValue = locationSelector.options[locationSelector.selectedIndex].value;

            loadSceneAnalyticsIframe('energytool', energy_stats);

            loadAnalyticsIframe(analyticsVersionValue, analyticsLocationValue);

            // Start Goedle Iframes
            if (project_keys.expID) {
                loadAtRiskIframe(project_keys.expID);
            }
            // End Goedle Iframes


            jQuery('#analyticsVersionSelector').on('change', function () {
                analyticsVersionValue = this.value;
                loadAnalyticsIframe(analyticsVersionValue, analyticsLocationValue);
            });

            jQuery('#analyticsLocationSelector').on('change', function () {
                analyticsLocationValue = this.value;
                loadAnalyticsIframe(analyticsVersionValue, analyticsLocationValue);
            });


            function loadSceneAnalyticsIframe(lab, fields) {

                console.log(fields);

                if (!fields.env) {fields.env = 'mountain';}

                var url = "http://52.59.219.11/?" +
                    "lab=" + lab +
                    "&env=" + fields.env +
                    "&map=" + parseInt(fields.map, 10) +
                    "&watts=" + fields.watts +
                    "&area=" + fields.area +
                    "&cost=" + fields.cost;

                window.open(url, "_blank", "width=520,height=600");
                /*win.document.write('<iframe width="520" height="600" src="'+ url +'" frameborder="0"></iframe>');*/

                /*var iframe = jQuery('#scene-analytics-iframe');
                if (iframe.length) {
                    iframe.attr('src', url);
                    return false;
                }*/
                return true;
            }

            function loadAnalyticsIframe(version, location) {

                var url = "http://52.59.219.11/?" +
                    "wpunity_game=" + project_id +
                    "&wpunity_scene=" + scene_id +
                    "&scene_type=scene" +
                    "&lab=" + game_type + //"&game_type="+game_type+
                    "&version=" + version +
                    "&gamemaster_id=" + game_master_id +
                    "&location=" + location;

                var iframe = jQuery('#analyticsIframeContent');

                if (iframe.length) {
                    iframe.attr('src', url);
                    return false;
                }

                // In Firefox iframe causes the 3D not to display textures and the analytics charts are not showing
                // The following patch
                // Firefox iframe bug: https://stackoverflow.com/questions/3253362/iframe-src-caching-issue-on-firefox
                // makes 3D editor to work, however Analytics charts still not render
                jQuery(parent.document).find("analyticsIframeContent").each(function () {
                    if (this.contentDocument == window.document) {
                        // if the href of the iframe is not same as
                        // the value of src attribute then reload it
                        if (this.src != url) {
                            this.src = this.src;
                        }
                    }
                });
                return true;
            }

            function loadAtRiskIframe(exp_id) {

                var url = "https://envisage.goedle.io/at-risk/index.htm?" +
                    "exp_id=" + exp_id;

                var iframe = jQuery('#atRiskIframeContent');
                if (iframe.length) {
                    iframe.attr('src', url);
                    return false;
                }

                jQuery(parent.document).find("atRiskIframeContent").each(function () {
                    if (this.contentDocument == window.document) {
                        // if the href of the iframe is not same as
                        // the value of src attribute then reload it
                        if (this.src != url) {
                            this.src = this.src;
                        }
                    }
                });
                return true;
            }
        }

        var dynamicTabBar = window.dynamicTabBar = new mdc.tabs.MDCTabBar(document.querySelector('#dynamic-tab-bar'));
        var dots = document.querySelector('.dots');
        var panels = document.querySelector('.panels');

        dynamicTabBar.preventDefaultOnClick = true;

        dynamicTabBar.listen('MDCTabBar:change', function (t) {
            var dynamicTabBar = t.detail;
            var nthChildIndex = dynamicTabBar.activeTabIndex;

            updatePanel(nthChildIndex);
        });

        function ddaIframe(email, pwd, app_key) {

            var url = "https://envisage.goedle.io/dda/index.htm?" +
                "email=" + email +
                "&pwd=" + pwd +
                "&app_key=" + app_key;

            var iframe = jQuery('#ddaIframeContent');
            if (iframe.length) {
                iframe.attr('src', url);
                return false;
            }

            jQuery(parent.document).find("ddaIframeContent").each(function () {
                if (this.contentDocument == window.document) {
                    // if the href of the iframe is not same as
                    // the value of src attribute then reload it
                    if (this.src != url) {
                        this.src = this.src;
                    }
                }
            });
            return true;
        }

        function updatePanel(index) {
            var activePanel = panels.querySelector('.panel.active');
            if (activePanel) {
                activePanel.classList.remove('active');
            }
            var newActivePanel = panels.querySelector('.panel:nth-child(' + (index + 1) + ')');
            if (newActivePanel) {
                newActivePanel.classList.add('active');
            }
        }


        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    jQuery('#wpunity_scene_sshot').attr('src', e.target.result);
                    is_scene_icon_manually_selected = true;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        jQuery("#wpunity_scene_sshot_manual_select").change(function() {
            readURL(this);

        });

        jQuery("#clear-image-button").click(function() {
            //document.getElementById("wpunity_scene_sshot").src = "noimagemagicword";
            //document.getElementById("wpunity_scene_sshot").src = envir.renderer.domElement.toDataURL("image/jpeg");
            //document.getElementById("wpunity_scene_sshot").style.display = "none";

            takeScreenshot();
            is_scene_icon_manually_selected = false;
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


    </script>
<?php get_footer(); ?>