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

$isUserloggedIn = is_user_logged_in();
$isUserAdmin = current_user_can('administrator');
$isJokerGame = strpos($gameSlug, 'joker') !== false ;




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

// DELETE ASSET AJAX
wp_enqueue_script( 'ajax-script_deleteasset', $pluginpath.'/js_libs/delete_ajaxes/delete_asset.js', array('jquery') );
wp_localize_script( 'ajax-script_deleteasset', 'my_ajax_object_deleteasset',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
);


$project_saved_keys = wpunity_getProjectKeys($project_id, $project_scope);

if (!$project_saved_keys['gioID'] && $project_scope === 1) {
	echo "<script type='text/javascript'>alert(\"APP KEY not found. Please make sure that your are logged in, and your user account has been registered correctly.\");</script>";
}


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

    $default_json = '';
	$thegameType = wp_get_post_terms($project_id, 'wpunity_game_type');
	if($thegameType[0]->slug == 'archaeology_games'){$newscene_yaml_tax = get_term_by('slug', 'wonderaround-yaml', 'wpunity_scene_yaml');$default_json = wpunity_getDefaultJSONscene('archaeology');}
    elseif($thegameType[0]->slug == 'energy_games'){$newscene_yaml_tax = get_term_by('slug', 'educational-energy', 'wpunity_scene_yaml');$default_json = wpunity_getDefaultJSONscene('energy');}
    elseif($thegameType[0]->slug == 'chemistry_games'){$newscene_yaml_tax = get_term_by('slug', 'wonderaround-lab-yaml', 'wpunity_scene_yaml');$default_json = wpunity_getDefaultJSONscene('chemistry');}

	$scene_taxonomies = array(
		'wpunity_scene_pgame' => array(
			$allScenePGameID,
		),
		'wpunity_scene_yaml' => array(
			$newscene_yaml_tax->term_id,
		)
	);

    $sceneMetaType = 'scene';//default 'scene' MetaType (3js)

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

    //SCENE TYPE FOR CHEMISTRY GAMES (Lab = scene)
    if($thegameType[0]->slug == 'chemistry_games'){
        if($_POST['sceneTypeRadio'] == '2d'){$sceneMetaType = 'sceneExam2d';}
        elseif($_POST['sceneTypeRadio'] == '3d'){$sceneMetaType = 'sceneExam3d';}
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
		$newpost = get_post($scene_id);

		wp_redirect(esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ));
		exit;
	}
}

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

get_header();



    if (!$isJokerGame) {?>
        <div class="PageHeaderStyle">
            <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light">
                <a title="Back" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>"> <i class="material-icons" style="font-size: 36px; vertical-align: top;" >arrow_back</i> </a>
                <?php echo $game_post->post_title; ?>
            </h1>
        </div>
        <hr class="mdc-list-divider">
    <?php }
    
    if($isUserloggedIn){?>
        <a class="mdc-button mdc-button--primary AddNewAssetBtnStyle"
           href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id ); ?>"
           data-mdc-auto-init="MDCRipple">Add New 3D Asset</a>
    <?php } ?>

<h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Assets</h2>

<?php $assets = wpunity_getAllassets_byGameProject($gameSlug, $project_id);

//      $assets_joker_game = wpunity_getAllassets_byGameProject('archaeology-joker');
//      $assets = array_merge($assets_game, $assets_joker_game);

// Output custom query loop
if ( $assets ) :  ?>

    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
			<?php foreach ($assets as $asset) {
			    ?>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3" style="position:relative">

                    <div class="mdc-card mdc-theme--background" id="<?php echo $asset['assetid']; ?>">
                        <div class="SceneThumbnail">
                            <a href="#">

								<?php if ($asset['screenImagePath']){ ?>

                                    <img width="495" height="330" src="<?php echo $asset['screenImagePath']; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">

								<?php } else { ?>
                                    <div style="min-height: 226px;" class="DisplayBlock mdc-theme--secondary-bg CenterContents">
                                        <i style="font-size: 64px; padding-top: 80px;" class="material-icons mdc-theme--text-icon-on-background">insert_photo</i>
                                    </div>
								<?php } ?>

                            </a>
                        </div>

                        <div class="mdc-card__primary">
                            <h1 class="mdc-card__title mdc-typography--title" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <a class="mdc-theme--secondary" href=""><?php echo $asset['assetName'];?></a>
                            </h1>

                            <p class="mdc-card__title mdc-typography--body1" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
								<?php echo $asset['categoryName'];?>
                            </p>

                        </div>

						<?php

						//echo current_user_can('administrator');
						// For joker assets, If the user is not administrator he should not be able to delete or edit them.
						$shouldHideDELETE_EDIT = $asset['isJoker'] && !$isUserAdmin;
						
						if ($asset['isJoker']){
						?>
                        
                        <span class="mdc-typography--subheading1" style="background:lightblue; top:0;right:0;position:absolute">Shared</span>
                        <?php } ?>
                        
                        
                        <section class="mdc-card__actions">
                            <a id="deleteAssetBtn" data-mdc-auto-init="MDCRipple" title="Delete asset" class="mdc-button mdc-button--compact mdc-card__action" onclick="wpunity_deleteAssetAjax(<?php echo $asset['assetid'];?>,'<?php echo $gameSlug ?>',<?php echo $asset['isCloned'];?>)"
                               style="display:<?php echo $shouldHideDELETE_EDIT?'none':'';?>">DELETE</a>
                            <a data-mdc-auto-init="MDCRipple" title="Edit asset" class="mdc-button mdc-button--compact mdc-card__action mdc-button--primary" href="<?php echo $urlforAssetEdit.$asset['assetid']; ?>&<?php echo $shouldHideDELETE_EDIT?'editable=false':'editable=true' ?>">
								<?php
								echo $shouldHideDELETE_EDIT ? 'VIEW':'EDIT';
								?>
                            </a>
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
            insert_photo
        </i>

        <h3 class="mdc-typography--headline">No Assets available</h3>
        <hr class="WhiteSpaceSeparator">

    </div>


<?php endif; ?>



    <script type="text/javascript">

        var mdc = window.mdc;
        mdc.autoInit();

        var helpDialog = document.querySelector('#help-dialog');

        if (helpDialog) {
            helpDialog = new mdc.dialog.MDCDialog(helpDialog);

            jQuery( "#helpButton" ).click(function() {
                helpDialog.show();

            });
        }
    </script>
<?php get_footer(); ?>