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

$project_saved_keys = wpunity_getProjectKeys($project_id, $project_scope);

if (!$project_saved_keys['gioID'] && $project_scope === 1) { // In Envisage only
	echo "<script type='text/javascript'>alert(\"APP KEY not found. Please make sure that your user account has been registered correctly, and you have loaded the correct page\");</script>";
}

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
$editscenePage = wpunity_getEditpage('scene');
$editscene2DPage = wpunity_getEditpage('scene2D');
$editsceneExamPage = wpunity_getEditpage('sceneExam');


$urlforAssetEdit = esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id . '&wpunity_scene=' .$current_scene_id . '&wpunity_asset=' ); // . asset_id


// Get 'parent-game' taxonomy with the same slug as Game (in order to show scenes that belong here)
$game_post = get_post($project_id);
$gameSlug = $game_post->post_name;
$allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
$allScenePGameID = $allScenePGame->term_id;

if ($game_type_obj->string === "Chemistry") {

	$analytics_molecule_list = array('HCL','H2O','NaF','NaCl','KBr','CH4','CaCl2','CF4');
	$analytics_molecule_checklist = array(0,0,0,0,0,0,0,0);
	$molecules = wpunity_get_all_molecules_of_game($project_id);
	$molecule_list = [];
	foreach ($molecules as $molecule) {
		array_push($molecule_list, $molecule['moleculeType']);
	}

	foreach ($analytics_molecule_list as $idx => $molecule) {
		if (in_array( $molecule, $molecule_list)) {
			$analytics_molecule_checklist[$idx] = 1;
		}
	}
	$analytics_molecule_checklist = implode("", $analytics_molecule_checklist);

}



$upload_dir = wp_upload_dir()['basedir'];
$upload_dir = str_replace('\\','/',$upload_dir);

// Ajax for fetching game's assets within asset browser widget at vr_editor // user must be logged in to work, otherwise ajax has no privileges
$pluginpath = dirname (plugin_dir_url( __DIR__  ));
$pluginpath = str_replace('\\','/',$pluginpath);

// COMPILE Ajax
if(wpunity_getUnity_local_or_remote() != 'remote') {

	$gameUnityProject_dirpath = $upload_dir . '\\' . $gameSlug . 'Unity';
	$gameUnityProject_urlpath = $pluginpath . '/../../uploads/' . $gameSlug . 'Unity/';

} else {

	$ftp_cre = wpunity_get_ftpCredentials();
	$ftp_host = $ftp_cre['address'];

	$gamesFolder = 'COMPILE_UNITY3D_GAMES';

	$gameUnityProject_dirpath = $gamesFolder."/".$gameSlug."Unity";
	$gameUnityProject_urlpath = "http://".$ftp_host."/".$gamesFolder."/".$gameSlug."Unity";
}


$thepath = $pluginpath . '/js_libs/assemble_compile_commands/request_game_assepile.js';
wp_enqueue_script( 'ajax-script_assepile', $thepath, array('jquery') );
wp_localize_script( 'ajax-script_assepile', 'my_ajax_object_assepile',
	array( 'ajax_url' => admin_url( 'admin-ajax.php'),
	       'id' => $project_id,
	       'slug' => $gameSlug,
	       'gameUnityProject_dirpath' => $gameUnityProject_dirpath,
	       'gameUnityProject_urlpath' => $gameUnityProject_urlpath
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

wp_enqueue_script( 'ajax-script_filebrowse', $pluginpath.'/js_libs/scriptFileBrowserToolbarWPway.js', array('jquery') );
wp_localize_script( 'ajax-script_filebrowse', 'my_ajax_object_fbrowse', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

wp_enqueue_script( 'ajax-script_savescene', $pluginpath.'/js_libs/save_scene_ajax/wpunity_save_scene_ajax.js', array('jquery') );
wp_localize_script( 'ajax-script_savescene', 'my_ajax_object_savescene',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'scene_id' => $current_scene_id )
);

wp_enqueue_script( 'ajax-script_deleteasset', $pluginpath.'/js_libs/delete_ajaxes/delete_asset.js', array('jquery') );
wp_localize_script( 'ajax-script_deleteasset', 'my_ajax_object_deleteasset',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
);


wp_enqueue_media($scene_post->ID);
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

if ($project_scope == 0) {
	$single_lowercase = "tour";
	$single_first = "Tour";
} else if ($project_scope == 1){
	$single_lowercase = "lab";
	$single_first = "Lab";
} else {
	$single_lowercase = "project";
	$single_first = "Project";
}

if(isset($_POST['submitted2']) && isset($_POST['post_nonce_field2']) && wp_verify_nonce($_POST['post_nonce_field2'], 'post_nonce')) {
	$expID = $_POST['exp-id'];
	update_post_meta( $project_id, 'wpunity_project_expID', $expID);

	$loadMainSceneLink = get_permalink($editscenePage[0]->ID) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . 'scene';
	wp_redirect( $loadMainSceneLink );
	exit;
}

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	$newSceneType = $_POST['sceneTypeRadio'];

	$sceneMetaType = 'scene';//default 'scene' MetaType (3js)
	$game_type_chosen_slug = '';

	$default_json = '';
	$thegameType = wp_get_post_terms($project_id, 'wpunity_game_type');
	if($thegameType[0]->slug == 'archaeology_games'){$newscene_yaml_tax = get_term_by('slug', 'wonderaround-yaml', 'wpunity_scene_yaml');$game_type_chosen_slug = 'archaeology_games';$default_json = wpunity_getDefaultJSONscene('archaeology');}
    elseif($thegameType[0]->slug == 'energy_games'){$newscene_yaml_tax = get_term_by('slug', 'educational-energy', 'wpunity_scene_yaml');$game_type_chosen_slug = 'energy_games';$default_json = wpunity_getDefaultJSONscene('energy');}
    elseif($thegameType[0]->slug == 'chemistry_games'){
		$game_type_chosen_slug = 'chemistry_games';
		$default_json = wpunity_getDefaultJSONscene('chemistry');
		if($newSceneType == 'lab'){$newscene_yaml_tax = get_term_by('slug', 'wonderaround-lab-yaml', 'wpunity_scene_yaml');}
        elseif($newSceneType == '2d'){$newscene_yaml_tax = get_term_by('slug', 'exam2d-chem-yaml', 'wpunity_scene_yaml');$sceneMetaType = 'sceneExam2d';}
        elseif($newSceneType == '3d'){$newscene_yaml_tax = get_term_by('slug', 'exam3d-chem-yaml', 'wpunity_scene_yaml');$sceneMetaType = 'sceneExam3d';}
	}

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
		'wpunity_scene_json_input' => $default_json,
	);

	//REGIONAL SCENE EXTRA TYPE FOR ENERGY GAMES
	$isRegional = 0;//default value
	if($thegameType[0]->slug == 'energy_games'){
		if($_POST['regionalSceneCheckbox'] == 'on'){$isRegional = 1;}
		$scene_metas['wpunity_isRegional']= $isRegional;
		$scene_metas['wpunity_scene_environment'] = 'fields';
	}

	//Add the final MetaType of the Scene
	$scene_metas['wpunity_scene_metatype']= $sceneMetaType;

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
		if($sceneMetaType == 'sceneExam2d' || $sceneMetaType == 'sceneExam3d'){$edit_scene_page_id = $editsceneExamPage[0]->ID;}
		else{$edit_scene_page_id = $editscenePage[0]->ID;}
		$loadMainSceneLink = get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . $sceneMetaType;
		wp_redirect( $loadMainSceneLink );
		exit;
	}
}

$goBackTo_AllProjects_link = esc_url( get_permalink($allGamesPage[0]->ID));

get_header(); ?>

    <style>
        .panel { display: none; }
        .panel.active { display: block; }
        .navigation-top {display:none;}
        .mdc-tab { min-width: 0; }
        .custom-header { display:none; }
        .main-navigation a { padding: 0.2em 1em; font-size:9pt !important;}
        .site-branding {display:none;}
        #content {padding:0px;}
        
        
    </style>

<?php if ( !is_user_logged_in() ) { ?>

    <div class="DisplayBlock CenterContents">
        <i style="font-size: 64px; padding-top: 80px;" class="material-icons mdc-theme--text-icon-on-background">account_circle</i>
        <p class="mdc-typography--title"> Please <a class="mdc-theme--secondary" href="<?php echo wp_login_url( get_permalink() ); ?>">login</a> to use platform</p>
        <p class="mdc-typography--title"> Or <a class="mdc-theme--secondary" href="<?php echo wp_registration_url(); ?>">register</a> if you don't have an account</p>
    </div>

    <hr class="WhiteSpaceSeparator">

<?php } else { ?>


    <!-- START PAGE -->
    <div class="EditPageHeader">
        
        <!-- ADD NEW ASSET FROM JOKER PROJECT -->
        <a id="addNewAssetBtn" style="visibility: hidden;" class="HeaderButtonStyle mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id . '&wpunity_scene=' .  $current_scene_id); ?>">
            Add a new 3D asset
        </a>
        
    </div>

    <span class="mdc-typography--caption" style="font-size:16pt">
        

    </span>

<!--    <ul class="EditPageBreadcrumb">-->
<!--        <li><a class="mdc-typography--caption mdc-theme--primary" href="--><?php //echo $goBackTo_AllProjects_link; ?><!--" title="Go back to Project selection">Home</a></li>-->
<!--        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>-->
<!--        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">3D Scene Editor</span></li>-->
<!--    </ul>-->

    <div class="mdc-toolbar" style="display:block;position:fixed;z-index:1000;">

        
        
        <div class="" style="width:90%">
            <div class="mdc-toolbar__section mdc-toolbar__section--shrink-to-fit mdc-toolbar__section--align-start"
                    style="width:80%; vertical-align: middle;line-height:1.8em">
                
                
                <div id="gameInfoBreadcrump" class="mdc-textfield mdc-theme--text-primary-on-dark mdc-form-field" data-mdc-auto-init="MDCTextfield"
                     style="height:30px; margin:0; font-size: 14px; vertical-align: middle;display:block" >

                    <div id="gameClassGameName" style="float:left;max-width:50%;line-height:1.8em">
                        <a title="Back" href="<?php echo $goBackTo_AllProjects_link; ?>"> <i class="material-icons mdc-theme--text-primary-on-dark"
                                                                                             style="font-size: 20px; vertical-align: middle;" >arrow_back</i> </a>
    
                        <i class="material-icons mdc-theme--text-icon-on-dark"
                           style="font-size: 16px; vertical-align: middle;margin-bottom:3px;"
                           title="<?php echo $game_type_obj->string; ?>"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php
        
                        //        if ($game_type_obj->string === "Archaeology")
                        //            echo "Museum";
                        //        else
                            echo $game_type_obj->string;
                        //echo $game_type_obj->string;
                        ?>
                        <i class="material-icons mdc-theme--text-icon-on-dark" title="" style="font-size:20px;vertical-align:middle">chevron_right</i>&nbsp;
                        <?php
                            echo $game_post->post_title;
                        ?>
                        <i class="material-icons mdc-theme--text-icon-on-dark" title="" style="font-size:20px;vertical-align:middle">chevron_right</i>

                    </div>
                    
                    <input title="Scene title" placeholder="Scene title" value="<?php echo $scene_post->post_title; ?>" id="sceneTitleInput" name="sceneTitleInput" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-dark"
                           aria-controls="title-validation-msg" minlength="3" required
                           style="display:block; float:left; width:35%; margin-left:0px; padding:0px; border: none; font-size:14px; border-bottom: 1px solid rgba(255, 255, 255, 0.3); box-shadow: none; border-radius: 0;">
                    
                    <p class="mdc-textfield-helptext mdc-textfield-helptext--validation-msg"
                       style="height:25px;max-width:10%;display:block;float:left;"
                       id="title-validation-msg">
                        Must be at least 3 characters long
                    </p>
                    <div class="mdc-textfield__bottom-line"></div>
                </div>

<!--                <div class="mdc-toolbar__section" style="display:block;float:left">-->
<!--                    <nav id="dynamic-tab-bar" class="mdc-tab-bar--indicator-secondary" style="text-transform: uppercase" role="tablist">-->
<!--                        <a role="tab" aria-controls="panel-1" class="mdc-tab mdc-tab-active mdc-tab--active" href="#panel-1" >Editor</a>-->
<!--                        --><?php //if ( $game_type_obj->string === "Energy" || $game_type_obj->string === "Chemistry" ) { ?>
<!---->
<!--                            <a role="tab" aria-controls="panel-2" class="mdc-tab" href="#panel-2" onclick="">Analytics</a>-->
<!--        -->
<!--                            --><?php //if($project_saved_keys['expID'] != ''){ ?>
<!--                                <a role="tab" aria-controls="panel-3" class="mdc-tab" href="#panel-3">at-risk prediction</a>-->
<!--                            --><?php //} ?>
<!--        -->
<!--        -->
<!--                            --><?php //if($game_type_obj->string === "Chemistry"){ ?>
<!--                                <a role="tab" aria-controls="panel-4" class="mdc-tab" href="#panel-4">Content adaptation</a>-->
<!--                            --><?php //} ?>
<!--    -->
<!--                        --><?php //} ?>
<!---->
<!--                        <span class="mdc-tab-bar__indicator"></span>-->
<!--                    </nav>-->
<!--                </div>-->
            </div>

            <!--Set tab buttons-->
<!--            <div class="mdc-toolbar__section" style="display:block;max-width:10%">-->
<!--                <nav id="dynamic-tab-bar" class="mdc-tab-bar mdc-tab-bar--indicator-secondary" role="tablist">-->
<!--                -->
<!--                </nav>-->
<!--            </div>-->



<!--            <div class="SaveSceneBtnStyle">-->
<!--                <div id="saveSceneBtn" class="SaveBtnContainerStyle">-->
                    <a data-mdc-auto-init="MDCRipple" title="Save all changes you made to the current scene"
                       id="save-scene-button"
                       class="mdc-button mdc-button--raised mdc-theme--text-primary-on-dark mdc-theme--secondary-bg">Save</a>
<!--                </div>-->
<!--            </div>-->
            
            
            <a id="compileGameBtn" class="mdc-button mdc-button--raised mdc-theme--text-primary-on-dark mdc-theme--secondary-bg w3-display-right" data-mdc-auto-init="MDCRipple"
               title="When you are finished compile the <?php echo $single_lowercase; ?> into a standalone binary">
                COMPILE
<!--                --><?php //echo $single_lowercase; ?>
            </a>
            

        </div>
    </div>

    <div class="panels">
        <div class="panel active" id="panel-1" role="tabpanel" aria-hidden="false">

            <div class="mdc-layout-grid" style="padding:0px;">
                <div class="mdc-layout-grid__inner">
                    <div class="mdc-layout-grid__cell--span-12">
                        <div id="scene-vr-editor">
							<?php

							$meta_json = get_post_meta($current_scene_id, 'wpunity_scene_json_input', true);

							// Do not put esc_attr, crashes the universe in 3D
							if ( $game_type_obj->string === "Energy" ) {
								$sceneToLoad = $meta_json ? $meta_json : wpunity_getDefaultJSONscene('energy');
							}else{
								$sceneToLoad = $meta_json ? $meta_json : wpunity_getDefaultJSONscene('chemistry');
							}

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
							require( plugin_dir_path( __DIR__ ) .  '/vr_editor.php' );
                            require( plugin_dir_path( __DIR__ ) .  '/vr_editor_scenes_wrapper.php' );
							?>
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

												if ($screenshotImgUrl) {

													$dataScreenshot = file_get_contents($screenshotImgUrl);
													$dataScreenshotbase64 = 'data:image/jpeg;base64,' . base64_encode($dataScreenshot);
													?>

                                                    <div id="featureImgContainer" class="ImageContainer">
                                                        <img id="wpunity_scene_sshot" name="wpunity_scene_sshot" src="<?php echo $dataScreenshotbase64;?>">
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

            <textarea title="wpunity_scene_json_input" id="wpunity_scene_json_input" style="visibility:hidden; width:0; height:0; display: none;"
                      name="wpunity_scene_json_input"> <?php echo get_post_meta( $current_scene_id, 'wpunity_scene_json_input', true ); ?></textarea>


            <!--Add information for Wind Energy games-->
			<?php if($game_type_obj->string === "Energy") { ?>
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner mdc-theme--text-primary-on-light">

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
                            <h2 class="mdc-typography--title">Average wind speed</h2>
                            <p class="mdc-typography--subheading2">Mountains: 10 m/s</p>
                            <p class="mdc-typography--subheading2">Fields: 8.5 m/s</p>
                            <p class="mdc-typography--subheading2">Seashore: 7.5 m/s</p>
                        </div>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
                            <h2 class="mdc-typography--title">Access cost</h2>
                            <p class="mdc-typography--subheading2">Mountains: 3 $</p>
                            <p class="mdc-typography--subheading2">Fields: 2 $</p>
                            <p class="mdc-typography--subheading2">Seashore: 1 $</p>
                        </div>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
                            <h2 class="mdc-typography--title">Turbine Types</h2>
                            <p class="mdc-typography--subheading2">Mountains ( Wind class I ): A, B, C</p>
                            <p class="mdc-typography--subheading2">Fields ( Wind class II ): D, E, F</p>
                            <p class="mdc-typography--subheading2">Seashore ( Wind class III ): G, H, I</p>
                        </div>

                    </div>
                </div>
			<?php } ?>


		<?php if ( $game_type_obj->string === "Energy" || $game_type_obj->string === "Chemistry" ) {  ?>

            <div class="panel" id="panel-2" role="tabpanel" aria-hidden="true">

                <div id="analyticsIframeFallback" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                </div>

                <div id="analyticsIframeContainer" style="position: relative; overflow: hidden; padding-top: 150%; display: none;">
                    <iframe id="analyticsIframeContent" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"></iframe>
                </div>
            </div>

			<?php if($project_saved_keys['expID'] != ''){ ?>

                <div class="panel" id="panel-3" role="tabpanel" aria-hidden="true">
                    <div id="atRiskIframeContainer" style="position: relative; overflow: hidden; padding-top: 180%;">
                        <iframe id="atRiskIframeContent" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"></iframe>
                    </div>
                </div>

			<?php } ?>

			<?php if($game_type_obj->string === "Chemistry"){ ?>
                <div class="panel" id="panel-4" role="tabpanel" aria-hidden="true">
                    <div style="position: relative; overflow: hidden; padding-top: 100%;">
                        <iframe id="ddaIframeContent" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"></iframe>
                    </div>
                </div>
			<?php } ?>

		<?php } ?>


        <!--Compile Dialog-->
        <aside id="compile-dialog"
               class="mdc-dialog"
               role="alertdialog"
               style="z-index: 1000;"
               data-game-slug="<?php echo $gameSlug; ?>"
               data-project-id="<?php echo $project_id; ?>"
               aria-labelledby="my-mdc-dialog-label"
               aria-describedby="my-mdc-dialog-description" data-mdc-auto-init="MDCDialog">
            <div class="mdc-dialog__surface">

                <header class="mdc-dialog__header">
                    <h2 class="mdc-dialog__header__title">
                        Compile <?php echo $single_lowercase; ?>
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

        var compileDialog = document.querySelector('#compile-dialog');
        if (compileDialog) {

            compileDialog = new mdc.dialog.MDCDialog(compileDialog);
            compileDialog.focusTrap_.deactivate();


            jQuery( "#compileGameBtn" ).click(function() {
                compileDialog.show();

                // Pause Rendering
                isPaused = true;
                jQuery("#pauseRendering").get(0).childNodes[1].innerText = "play_arrow";
            });
        }


        jQuery(".mdc-dialog__backdrop").click(function(e){
            jQuery( "#compileCancelBtn" ).click();
        });


        jQuery( "#compileCancelBtn" ).click(function(e) {

            //Start Rendering
            isPaused = false;
            jQuery("#pauseRendering").get(0).childNodes[1].innerText = "pause";
            animate();

            // Get Pid of compile process
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

        if (platformDropdown) {

            var platformSelect = MDCSelect.attachTo(platformDropdown);

            platformDropdown.addEventListener('MDCSelect:change', function() {
                jQuery( "#platformInput" ).attr( "value", platformSelect.selectedOptions[0].getAttribute("id") );
                jQuery( "#compileProceedBtn" ).removeClass( "LinkDisabled" );
            });

        }

        var project_id = <?php echo $project_id; ?>;

        var project_keys = [];
        project_keys = <?php echo json_encode(wpunity_getProjectKeys($project_id, $project_scope)); ?>;
        var scene_id = <?php echo $current_scene_id; ?>;
        var game_type = "<?php echo strtolower($game_type_obj->string);?>";
        var user_email = "<?php echo $user_email; ?>";

        // Convert scene to json and put the json in the wordpress field wpunity_scene_json_input
        jQuery('#save-expid-button').click(function() {
            wpunity_saveExpIDAjax();
        });

        if (project_keys.gioID && game_type === "chemistry") {
            ddaIframe(user_email, project_keys.extraPass, project_keys.gioID);
        }

        if (document.getElementById('regional-checkbox-component')) {
            var regionalCheckbox = mdc.checkbox.MDCCheckbox.attachTo(document.getElementById('regional-checkbox-component'));

            jQuery('#regional-checkbox-component').click(function () {
                jQuery('#regional-scene-checkbox').prop('checked', regionalCheckbox.checked);
            });
        }

        if (game_type === "energy" || game_type === "chemistry") {
            var game_master_id = "<?php echo get_current_user_id();?>";

            var energy_stats = <?php echo json_encode(wpunity_windEnergy_scene_stats($current_scene_id)); ?>;

            loadAnalyticsIframe(game_type);

            loadAtRiskIframe(project_keys.expID);

            function loadAnalyticsIframe(game_type) {

                jQuery('#analyticsIframeFallback').hide();
                jQuery('#analyticsIframeContainer').show();

                var type = game_type === 'chemistry' ? game_type : 'energy3d' ;

                var url = "https://analytics.envisage-h2020.eu/?" +
                    "wpunity_game=" + project_id +
                    "&wpunity_scene=" + scene_id +
                    "&scene_type=scene" +
                    "&lab=" + type +
                    /*"&version=" + version +
                    "&location=" + location +*/
                    "&gamemaster_id=" + game_master_id;

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

                if (exp_id) {

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
        }

        //var dynamicTabBar = window.dynamicTabBar = new mdc.tabs.MDCTabBar(document.querySelector('#dynamic-tab-bar'));
        var dots = document.querySelector('.dots');
        var panels = document.querySelector('.panels');

        //dynamicTabBar.preventDefaultOnClick = true;

        // dynamicTabBar.listen('MDCTabBar:change', function (t) {
        //     var dynamicTabBar = t.detail;
        //     var nthChildIndex = dynamicTabBar.activeTabIndex;
        //
        //     if (nthChildIndex === 1) {
        //         loadAnalyticsIframe(game_type);
        //     }
        //
        //     updatePanel(nthChildIndex);
        // });

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

        function hideCompileProgressSlider() {
            jQuery( "#compileProgressSlider" ).hide();
            jQuery( "#compileProgressTitle" ).hide();
            jQuery( "#compileProgressDeterminate" ).hide();
            jQuery( "#platform-select" ).removeClass( "mdc-select--disabled" ).attr( "aria-disabled","false" );

            jQuery( "#compileProceedBtn" ).removeClass( "LinkDisabled" );
            jQuery( "#compileCancelBtn" ).removeClass( "LinkDisabled" );
        }
    </script>

<?php } ?>

<?php get_footer(); ?>