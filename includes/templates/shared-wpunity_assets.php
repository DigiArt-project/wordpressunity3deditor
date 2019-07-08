<?php

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}
$parameter_assetpass = $perma_structure ? '?wpunity_asset=' : '&wpunity_asset=';

if ($project_scope == 0) {
//	$single_lowercase = "tour";
//	$single_first = "Tour";
} else if ($project_scope == 1){
//	$single_lowercase = "lab";
//	$single_first = "Lab";
} else {
//	$single_lowercase = "project";
//	$single_first = "Project";
}

$project_id = get_page_by_path( 'archaeology-joker', OBJECT, 'wpunity_game' )->ID;

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
$current_user = wp_get_current_user();

$login_username = $current_user->user_login;

$isUserAdmin = current_user_can('administrator');

$pluginpath = dirname (plugin_dir_url( __DIR__  ));
$pluginpath = str_replace('\\','/',$pluginpath);

//--Uploads/myGameProjectUnity--
$upload_dir = wp_upload_dir()['basedir'];
$upload_dir = str_replace('\\','/',$upload_dir);

// DELETE ASSET AJAX
wp_enqueue_script( 'ajax-script_deleteasset', $pluginpath.'/js_libs/delete_ajaxes/delete_asset.js', array('jquery') );
wp_localize_script( 'ajax-script_deleteasset', 'my_ajax_object_deleteasset',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
);


//Get 'parent-game' taxonomy with the same slug as Game (in order to show scenes that belong here)
$allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
$allScenePGameID = $allScenePGame->term_id;


$editgamePage = wpunity_getEditpage('game');
$newAssetPage = wpunity_getEditpage('asset');

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

get_header();

?>

<span class="mdc-typography--display1 mdc-theme--text-primary-on-background" style="display:inline-table;margin-top:10px"><?php echo $full_title; ?> Assets</span>
<a href="#" class="helpButton" onclick="alert('Login to a) add a Shared Asset or b) to create a Project and add your private Assets there')">
        ?
</a>

<?php
if($isUserloggedIn){ ?>
    <span style="float:right; right:0; font-family: 'Comic Sans MS'; display:inline-table;margin-top:10px">Welcome,
        <a href="https://heliosvr.mklab.iti.gr/account/">
              <?php echo $login_username;?>
        </a>
    </span>
<?php } ?>






<?php

$user_id = get_current_user_id();

$user_games_slugs = wpunity_get_user_game_projects($user_id);
$assets = get_games_assets($user_games_slugs);

// Output custom query loop
if ( $assets ) : ?>
    
    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
        
            <!-- Card to add asset -->
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2" style="position:relative;background: orangered">

                <a href="<?php
                    if($isUserloggedIn)
                        echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id );
                    else
                        echo wp_login_url(  );
                ?>">
                
                <i class="addAssetCardIcon material-icons"
                   style="<?php if(!$isUserloggedIn){?> filter:invert(30%) <?php }?>">add_circle</i>
                <span class="addAssetCardWords" style="<?php if(!$isUserloggedIn){?> filter:invert(30%) <?php }?>">Shared Asset</span>
                </a>
            </div>
            
			<?php foreach ($assets as $asset) {
			    
			    ?>

                
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2" style="position:relative">

                    <div class="mdc-card mdc-theme--background" id="<?php echo $asset['assetid']; ?>">
                        <div class="SceneThumbnail">
                            <a href="#">
								<?php if ($asset['screenImagePath']){ ?>
                                    
                                    <img src="<?php echo $asset['screenImagePath']; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
                                    
								<?php } else { ?>
                                    <div style="min-height: 226px;" class="DisplayBlock mdc-theme--secondary-bg CenterContents">
                                        <i style="font-size: 64px; padding-top: 80px;" class="material-icons mdc-theme--text-icon-on-background">insert_photo</i>
                                    </div>
								<?php } ?>
                            </a>

                            


                        </div>

                        <div class="assetsListCard mdc-card__primary">
                            
                            <h1 class="assetsListCardTitle mdc-card__title mdc-typography--title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <a class="mdc-theme--secondary" href=""><?php echo $asset['assetName'];?></a>
                            </h1>

                            <p class="sharedAssetsUsername mdc-typography--caption"
                                  style="position:relative"><?php echo 'by: '.$asset['author_username']; ?></p>
                            
                            <p class="assetsListCardCategory mdc-card__title mdc-typography--body1" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
								<?php echo $asset['categoryName'];?>
                            </p>

                        </div>

						<?php
						//echo current_user_can('administrator');
						// For joker assets, If the user is not administrator he should not be able to delete or edit them.
						$canDELETE_EDIT = $isUserAdmin || ($user_id == $asset['author_id']);
						?>
                        
                        
                        <?php if ($asset['isJoker']=='true') { ?>
                            <span class="sharedAssetsIndicator mdc-typography--subheading1"
                                  style="background: rgba(144,238,144,0.3);">Shared</span>
                        <?php } else { ?>
                            <span class="sharedAssetsIndicator mdc-typography--subheading1"
                                  style="background: rgba(250,250,210,0.3);">
                                <?php echo "Personal @ ". $asset['assetParentGame']; ?></span>
                        <?php } ?>

                        
                        
                        <section class="assetsListCardActions mdc-card__actions">
                            <a id="deleteAssetBtn" data-mdc-auto-init="MDCRipple" title="Delete asset" class="deleteAssetListButton mdc-button mdc-button--compact mdc-card__action" onclick="wpunity_deleteAssetAjax(<?php echo $asset['assetid'];?>,'<?php echo $gameSlug ?>',<?php echo $asset['isCloned'];?>)"
                               style="display:<?php echo $canDELETE_EDIT?'':'none';?>">DELETE</a>
                            <a data-mdc-auto-init="MDCRipple" title="Edit asset" class="editAssetListButton mdc-button mdc-button--compact mdc-card__action mdc-button--primary" href="<?php echo $urlforAssetEdit.$asset['assetid']; ?>&<?php echo $canDELETE_EDIT?'editable=true':'editable=false' ?>">
								<?php
								echo $canDELETE_EDIT ? 'EDIT':'VIEW';
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
        
        var deleteDialog = document.querySelector('#delete-dialog');
        if (deleteDialog) {
            deleteDialog = new mdc.dialog.MDCDialog(deleteDialog);
            deleteDialog.focusTrap_.deactivate();
        }


    </script>
<?php get_footer(); ?>