<?php

//Create asset
function loadAsset3DManagerScripts() {
	// Three js : for simple rendering
	wp_enqueue_script('wpunity_scripts');
	wp_enqueue_script('wpunity_load87_threejs');
	// For loading on clicking on image of previously uploaded obj
	wp_enqueue_script('wpunity_load87_objloader');

	// For loading on newly uploaded model
	wp_enqueue_script('wpunity_load87_objloader2');
	wp_enqueue_script('wpunity_load87_wwobjloader2');
	wp_enqueue_script('wpunity_load87_pdbloader');
	wp_enqueue_script('wpunity_load87_mtlloader');
	wp_enqueue_script('wpunity_load87_orbitcontrols');
	wp_enqueue_script('wpunity_load87_trackballcontrols');

	// For the PDB files to annotate molecules in 3D
	wp_enqueue_script('wpunity_CSS2DRenderer');
	wp_enqueue_script('WU_webw_3d_view');
	wp_enqueue_script('wu_3d_view_pdb');
	wp_enqueue_script('wpunity_asset_editor_scripts');

	// scroll for images
	wp_enqueue_script('wpunity_lightslider');

	// to capture screenshot of the 3D molecule and its tags
	wp_enqueue_script('wpunity_html2canvas');

	$pluginpath = dirname (plugin_dir_url( __DIR__  ));

	// content interlinking ajax
	wp_enqueue_script( 'ajax-wpunity_content_interlinking_request',
		$pluginpath.'/js_libs/content_interlinking_commands/content_interlinking.js', array('jquery') );

	// ajax php admin url
	wp_localize_script( 'ajax-wpunity_content_interlinking_request', 'my_ajax_object_fetch_content',
		array( 'ajax_url' => admin_url( 'admin-ajax.php' ), null )
	);
}
add_action('wp_enqueue_scripts', 'loadAsset3DManagerScripts' );


$mean_speed_wind = 14;$var_speed_wind = 30;$min_speed_wind = 0;$max_speed_wind = 40;$income_when_overpower = 0.5;
$income_when_correct_power = 1;$income_when_under_power = 0;$access_penalty = 0;$archaeology_penalty = 0;
$natural_reserve_penalty = 0;$hvdistance_penalty = 0;$min_consumption = 50;$max_consumption = 150;
$mean_consumption = 100;$var_consumption = 50;$optCosts_size = 90;$optCosts_dmg = 0.005;$optCosts_cost = 3;
$optCosts_repaid = 1;$optGen_class = 'A';$optGen_speed = 10;$optGen_power = 3;$optProductionVal = null;


$perma_structure = get_option('permalink_structure') ? true : false;
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$project_id = isset($_GET['wpunity_game']) ? sanitize_text_field( intval( $_GET['wpunity_game'] )) : null ;
$asset_id = isset($_GET['wpunity_asset']) ? sanitize_text_field( intval( $_GET['wpunity_asset'] )) : null ;
$scene_id = isset($_GET['wpunity_scene']) ? sanitize_text_field( intval( $_GET['wpunity_scene'] )) : null ;



$game_post = get_post($project_id);
$gameSlug = $game_post->post_name;
$game_type_obj = wpunity_return_game_type($project_id);

$isJokerGame = strpos($gameSlug, 'joker') !== false ;

//Get 'parent-game' taxonomy with the same slug as Game
$assetPGame = get_term_by('slug', $gameSlug, 'wpunity_asset3d_pgame');
$assetPGameID = $assetPGame->term_id;
$assetPGameSlug = $assetPGame->slug;

$isJoker = (strpos($assetPGameSlug, 'joker') !== false) ? "true":"false";

$asset_id_avail_joker = wpunity_get_assetids_joker($game_type_obj->string);

if (!isset($_GET['wpunity_asset'])) {
	$isEditable = true;
}else {
	if (!isset($_REQUEST['editable'])) {
		$isEditable = true;
	}else {
		$isEditable = $_REQUEST['editable'] === 'true' ? true : false;
	}
}



// When asset was created in the past and now we want to edit it. We should get the attachments obj, mtl
if($asset_id != null) {

	$asset_post = get_post($asset_id);
	$assetpostMeta = get_post_meta($asset_id);

	if (array_key_exists('wpunity_asset3d_obj', $assetpostMeta)) {
		$mtlpost = get_post($assetpostMeta['wpunity_asset3d_mtl'][0]);
		$objpost = get_post($assetpostMeta['wpunity_asset3d_obj'][0]);
		$mtl_file_name = basename($mtlpost->guid);
		$obj_file_name = basename($objpost->guid);
		$path_url = pathinfo($mtlpost->guid)['dirname'];

		echo '<script>';
		echo 'var mtl_file_name="'.$mtl_file_name.'";';
		echo 'var obj_file_name="'.$obj_file_name.'";';
		echo 'var path_url="'.$path_url . '/'    .'";';
		echo '</script>';
	}

	if (array_key_exists('wpunity_asset3d_pdb', $assetpostMeta)){
		$pdbpost = get_post($assetpostMeta['wpunity_asset3d_pdb'][0]);
		$pdb_file_name = $pdbpost->guid;

		echo '<script>';
		echo 'var pdb_file_name="'.$pdb_file_name.'";';
		echo '</script>';
	}
}
//--------------------------------------------------------


$editgamePage = wpunity_getEditpage('game');
$allGamesPage = wpunity_getEditpage('allgames');
$editscenePage = wpunity_getEditpage('scene');
$newAssetPage = wpunity_getEditpage('asset');
$editscene2DPage = wpunity_getEditpage('scene2D');
$editsceneExamPage = wpunity_getEditpage('sceneExam');


$archaeology_tax = get_term_by('slug', 'archaeology_games', 'wpunity_game_type');

$all_game_category = get_the_terms( $project_id, 'wpunity_game_type' );

$game_category  = $all_game_category[0]->slug;

$scene_data = wpunity_getFirstSceneID_byProjectID($project_id,$game_category);//first 3D scene id
$edit_scene_page_id = $editscenePage[0]->ID;
$goBackTo_MainLab_link = get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_data['id'] . '&wpunity_game=' . $project_id . '&scene_type=' . $scene_data['type'];
$goBackTo_AllProjects_link = esc_url( get_permalink($allGamesPage[0]->ID));
$goBackTo_SharedAssets = home_url()."/wpunity-list-shared-assets/?wpunity_game=".$project_id;

// If form is submitted
if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	$assetTitleForm = esc_attr(strip_tags($_POST['assetTitle'])); //Title of the Asset (Form value)
	$assetDescForm = esc_attr(strip_tags($_POST['assetDesc'],"<b><i>")); //Description of the Asset (Form value)

	$assetCatID = intval($_POST['term_id']);//ID of Asset Category (hidden input)
	$assetCatTerm = get_term_by('id', $assetCatID, 'wpunity_asset3d_cat');
    
    
    $assetCatIPRID = intval($_POST['term_id_ipr']); //ID of Asset Category IPR (hidden input)
    $assetCatIPRTerm = get_term_by('id', $assetCatIPRID, 'wpunity_asset3d_ipr_cat');

	// NEW
	if($asset_id == null){
		//It's a new Asset, let's create it (returns newly created ID, or 0 if nothing happened)
		$asset_id = wpunity_create_asset_frontend($assetPGameID, $assetCatID, $assetTitleForm, $assetDescForm, $gameSlug, $assetCatIPRID);
	}else {
		// Edit an existing asset: Return true if updated, false if failed
		$asset_updatedConf = wpunity_update_asset_frontend($assetPGameID, $assetCatID, $asset_id, $assetTitleForm, $assetDescForm, $assetCatIPRID, $assetCatIPRID);
	}
	
	// Create new or updated of main fields edit successfull
	if($asset_id != 0 || $asset_updatedConf == 1) {
		if ($_POST['asset_sourceID']=='') {
			// NoCloning
			wpunity_create_asset_3DFilesExtra_frontend($asset_id, $assetTitleForm, $gameSlug);
			update_post_meta($asset_id, 'wpunity_asset3d_isCloned', 'false');
			update_post_meta($asset_id, 'wpunity_asset3d_isJoker', $isJoker);
		}else {
			// Cloning
			wpunity_copy_3Dfiles($asset_id, $_POST['asset_sourceID']);
			update_post_meta($asset_id, 'wpunity_asset3d_isCloned', 'true');
			update_post_meta($asset_id, 'wpunity_asset3d_isJoker', "false");
		}
	}


	// Save parameters
	if($assetCatTerm->slug == 'consumer') {
		wpunity_create_asset_consumerExtra_frontend($asset_id);
	}elseif($assetCatTerm->slug == 'terrain') {
		wpunity_create_asset_terrainExtra_frontend($asset_id);
	}elseif ($assetCatTerm->slug == 'producer') {
		wpunity_create_asset_producerExtra_frontend($asset_id);
	}elseif ($assetCatTerm->slug == 'pois_imagetext') {
		wpunity_create_asset_poisITExtra_frontend($asset_id);
	}elseif ($assetCatTerm->slug == 'pois_video') {
		wpunity_create_asset_poisVideoExtra_frontend($asset_id);
	}elseif ($assetCatTerm->slug == 'molecule') {
		wpunity_create_asset_moleculeExtra_frontend($asset_id);
	}

	if($scene_id == 0)
		echo '<script>alert("Asset created");</script>';
//	else
//		wp_redirect($goBackTo_MainLab_link);

	//exit;
}

if ($project_scope == 0) {
	$single_first = "Tour";
} else if ($project_scope == 1){
	$single_first = "Lab";
} else {
	$single_first = "Project";
}

get_header();
?>

    <div class="PageHeaderStyle">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light">
            <a title="Back" href="<?php
            
                if(!$isJokerGame )
                    echo $goBackTo_MainLab_link;
                else
                    echo $goBackTo_SharedAssets;
            
            ?>"> <i class="material-icons" style="font-size: 36px; vertical-align: top;" >arrow_back</i></a>
			<?php
                if(!$isJokerGame )
                    echo $game_post->post_title;
                else
                    echo "Shared Asset";
			?>
        </h1>
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Add category title & icon"><?php echo $game_type_obj->icon; ?> </i>&nbsp;
        <?php echo $game_type_obj->string; ?>
    </span>

    <hr class="mdc-list-divider">

    <!-- Breadcrumps -->
    <?php if(!$isJokerGame ){    ?>
        <ul class="EditPageBreadcrumb">
            <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo $goBackTo_AllProjects_link; ?>" title="Go back to Project selection">Home</a></li>
            <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
            <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo $goBackTo_MainLab_link; ?>" title="Go back to Project editor"><?php echo $single_first; ?> Editor</a></li>
            <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
            <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">Asset Manager</span></li>
        </ul>

    <?php } ?>

<?php
$breacrumbsTitle = ($asset_id == null ? "Create a new asset" : "Edit an existing asset");
$dropdownHeading = ($asset_id == null ? "Select a category" : "Category");
$asset_title_saved = ($asset_id == null ? "" : get_the_title( $asset_id ));
$asset_title_label = ($asset_id == null ? "Enter a title for your asset" : "Edit the title of your asset");
$asset_desc_saved = ($asset_id == null ? "" : get_post_field('post_content', $asset_id));
$asset_desc_label = ($asset_id == null ? "Add a small description for your asset" : "Edit the description of your asset");

//print_r(get_allowed_mime_types());

//Check if its new/saved and get data for Terrain Options
if($asset_id != null) {
	$saved_term = wp_get_post_terms( $asset_id, 'wpunity_asset3d_cat' );
	if($saved_term[0]->slug == 'terrain'){
		$physics = get_post_meta($asset_id,'wpunity_physicsValues',true);
		if($physics) {
			$mean_speed_wind = $physics['mean'];
			$var_speed_wind = $physics['variance'];
			$min_speed_wind = $physics['min'];
			$max_speed_wind = $physics['max'];
		}
		$energy_income = get_post_meta($asset_id,'wpunity_energyConsumptionIncome',true);
		if($energy_income) {
			$income_when_overpower = $energy_income['over'];
			$income_when_correct_power = $energy_income['correct'];
			$income_when_under_power = $energy_income['under'];
		}
		$constr_pen = get_post_meta($asset_id,'wpunity_constructionPenalties',true);
		if($constr_pen){
			$access_penalty = $constr_pen['access'];
			$archaeology_penalty = $constr_pen['arch'];
			$natural_reserve_penalty = $constr_pen['natural'];
			$hvdistance_penalty = $constr_pen['hiVolt'];
		}
	}elseif($saved_term[0]->slug == 'consumer'){
		$consumptions = get_post_meta($asset_id,'wpunity_energyConsumption',true);
		if($consumptions) {
			$min_consumption = $consumptions['min'];
			$max_consumption = $consumptions['max'];
			$mean_consumption = $consumptions['mean'];
			$var_consumption = $consumptions['var'];
		}
	}elseif($saved_term[0]->slug == 'producer') {
		$optCosts = get_post_meta($asset_id,'wpunity_producerOptCosts',true);
		if($optCosts) {
			$optCosts_size = $optCosts['size'];
			$optCosts_dmg = $optCosts['dmg'];
			$optCosts_cost = $optCosts['cost'];
			$optCosts_repaid = $optCosts['repaid'];
		}
		$optGen = get_post_meta($asset_id,'wpunity_producerOptGen',true);
		if($optGen) {
			$optGen_class = $optGen['class'];
			$optGen_speed = $optGen['speed'];
			$optGen_power = $optGen['power'];
		}
		$optProductionVal = get_post_meta($asset_id,'wpunity_producerPowerProductionVal',true);
	}elseif ($saved_term[0]->slug == 'pois_imagetext') {
		//load the already saved featured image for POI image-text
		$the_featured_image_id =  get_post_thumbnail_id($asset_id);
		$the_featured_image_url = get_the_post_thumbnail_url($asset_id);
	} elseif ($saved_term[0]->slug == 'pois_video') {
		//upload the featured image for POI video
		//$asset_featured_image =  $_FILES['poi-video-featured-image'];
		//$attachment_id = wpunity_upload_img( $asset_featured_image, $asset_id);
		//set_post_thumbnail( $asset_id, $attachment_id );

		//upload video file for POI video
		//$asset_video = $_FILES['videoFileInput'];
		//$attachment_video_id = wpunity_upload_img( $asset_video, $asset_id);
		//update_post_meta( $asset_id, 'wpunity_asset3d_video', $attachment_video_id );
	}
}

?>
    <div class="PageHeaderStyle">
        <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><span><?php echo $breacrumbsTitle; ?></span></h2>
		<?php if($asset_id != null ) { ?>
            <a class="mdc-button mdc-button--primary mdc-theme--primary" href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id ); ?>" data-mdc-auto-init="MDCRipple">Add New 3D Asset</a>
		<?php } ?>
    </div>

    <form name="3dAssetForm" id="3dAssetForm" method="POST" enctype="multipart/form-data">

        <!-- CATEGORY -->
        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__inner">

                <div  class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                    <h3 class="mdc-typography--title"><?php echo $dropdownHeading; ?></h3>
                    <div id="category-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                        <i class="material-icons mdc-theme--text-hint-on-light">label</i>&nbsp;

						<?php
						$myGameType = 0;
						$all_game_types = get_the_terms( $project_id, 'wpunity_game_type' );
						$game_type_slug = $all_game_types[0]->slug;

						switch ($game_type_slug) {
							case 'archaeology_games':
								$myGameType=1;
								break;
							case 'energy_games':
								$myGameType=2;
								break;
							case 'chemistry_games':
								$myGameType=3;
								break;
						}

						$args = array(
							'hide_empty' => false,
							'meta_query' => array(
								array(
									'key'       => 'wpunity_assetcat_gamecat',
									'value'     => $myGameType,
									'compare'   => '='
								)
							),
							'orderby' => 'name',
							'order' => 'DESC',
						);

						$cat_terms = get_terms('wpunity_asset3d_cat', $args);
						$saved_term = wp_get_post_terms( $asset_id, 'wpunity_asset3d_cat' );
						?>

						<?php if($asset_id == null) { ?>
                            <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">No category selected</span>
						<?php } else { ?>
                            <span data-cat-desc="<?php echo $saved_term[0]->description; ?>" data-cat-slug="<?php echo $saved_term[0]->slug; ?>" data-cat-id="<?php echo $saved_term[0]->term_id; ?>" id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2"><?php echo $saved_term[0]->name; ?></span>
						<?php } ?>


                        <div class="mdc-simple-menu mdc-select__menu">
                            <ul class="mdc-list mdc-simple-menu__items">

                                <li class="mdc-list-item mdc-theme--text-hint-on-light" role="option" aria-disabled="true" tabindex="-1" style="pointer-events: none;">
                                    No category selected
                                </li>

								<?php foreach ( $cat_terms as $term ) { ?>

                                    <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" data-cat-desc="<?php echo $term->description; ?>" data-cat-slug="<?php echo $term->slug; ?>" id="<?php echo $term->term_id?>" tabindex="0">
										<?php echo $term->name; ?>
                                    </li>

								<?php } ?>

                            </ul>
                        </div>
                    </div>

                    <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light" id="categoryDescription"> </span>
                </div>
                <input id="termIdInput" type="hidden" name="term_id" value="">

            </div>

        </div>

        <!--   TITLE , DESCRIPTION , 3D files  -->
        <div class="mdc-layout-grid" id="informationPanel" style="display: none;">

            <div class="mdc-layout-grid__inner">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                    <!-- TITLE , DESCRIPTION -->
                    <h3 class="mdc-typography--title">Information</h3>

                    <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                        <input id="assetTitle" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light" name="assetTitle"
                               aria-controls="title-validation-msg" required minlength="3" maxlength="40" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;"
                               value="<?php echo trim($asset_title_saved); ?>">
                        <label for="assetTitle" class="mdc-textfield__label"><?php echo $asset_title_label; ?> </label>
                        <div class="mdc-textfield__bottom-line"></div>
                    </div>
                    <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                       id="title-validation-msg">
                        Between 3 - 25 characters
                    </p>

                    <div id="assetDescription" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield" style="border: 1px solid rgba(0, 0, 0, 0.3);">
                <textarea id="multi-line" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                          name="assetDesc" form="3dAssetForm"><?php echo trim($asset_desc_saved); ?></textarea>
                        <label for="multi-line" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_label; ?></label>

                    </div>

                    <!-- WIKIPEDIA  -->
                    <button type="button" class="FullWidth mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple"
                            onclick="wpunity_fetchDescriptionAjaxFrontEnd('Wikipedia', assetTitle.value,
                    jQuery('#assetDescription')[0].children)">
                        Fetch description from Wikipedia</button>

                    <!-- EUROPEANA (shown only in DigiArt)-->
					<?php if ($project_scope === 0){ ?>
                        <button type="button" class="FullWidth mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple"
                                onclick="wpunity_fetchDescriptionAjaxFrontEnd('Europeana', assetTitle.value,
                        jQuery('#assetDescription')[0].children)"
                                style="margin-top:30px" >Fetch description from Europeana</button>
					<?php } ?>

                    <hr class="WhiteSpaceSeparator">


                    <!--  POI Image-Text -->

					<?php $showIMT = $saved_term[0]->slug == 'pois_imagetext'?'':'none';  ?>

                    <div id="poiImgDetailsPanel" style="display: <?php echo ($asset_id == null)?'none':$showIMT; ?>">

                        <h3 class="mdc-typography--title">Featured Image</h3>

						<?php if($asset_id == null){ ?>
                            <img id="poiImgFeaturedImgPreview" src="<?php echo plugins_url( '../images/ic_sshot.png', dirname(__FILE__)  ); ?>">
						<?php }else{ ?>
                            <img id="poiImgFeaturedImgPreview" src="<?php echo $the_featured_image_url; ?>">
						<?php } ?>
                        <input type="file" name="poi-img-featured-image" title="Featured image" value="" id="poiImgFeaturedImgInput" accept="image/x-png,image/gif,image/jpeg">
                        <br />
                        <span id="video-description-label" class="mdc-typography--subheading1 mdc-theme--text-secondary-on-background">jpg is recommended </span>

                        <hr class="WhiteSpaceSeparator">

                        <!--<h3 class="mdc-typography--title">Image POI Details</h3>

						<div id="poiImgDetailsWrapper">
							<a id="poiAddFieldBtn" class="mdc-button mdc-button--primary" data-mdc-auto-init="MDCRipple">
								<i class="material-icons ButtonIcon">add</i> Add Field
							</a>
						</div>-->
                    </div>




                    <!-- Video for POI video -->

                    <!-- Show only if the asset is poi video else do not show at all (it will be shown when the categ is selected) -->
					<?php $showVid = $saved_term[0]->slug == 'pois_video'?'':'none';  ?>

                    <div id="poiVideoDetailsPanel" style="display:<?php echo ($asset_id == null)?'none':$showVid; ?>;">

                        <!--
                <img id="poiVideoFeaturedImgPreview" src="<?php /*echo plugins_url( '../images/ic_sshot.png', dirname(__FILE__)  ); */?>">
                <label for="poiVideoFeaturedImgInput"> Select a featured image</label>
                <input type="file" name="poi-video-featured-image" title="Featured image" value="" id="poiVideoFeaturedImgInput" accept="image/x-png,image/gif,image/jpeg">
                -->

                        <h3 class="mdc-typography--title">Video POI Details</h3>

                        <div id="videoFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">


							<?php
							$videoID = get_post_meta($asset_id, 'wpunity_asset3d_video', true);
							$attachment_post = get_post($videoID);
							$attachment_file = $attachment_post->guid;
							?>

							<?php if(strpos($attachment_file, "mp4" )!==false || strpos($attachment_file, "ogg" )!==false){?>
                                <video width="320" height="240" controls>
                                    <source src="<?php echo $attachment_file;?>" type="video/mp4">
                                    <source src="<?php echo $attachment_file;?>" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
							<?php } ?>

                            <label for="videoFileInput"> Select a new video</label>
                            <input class="FullWidth" type="file" name="videoFileInput" value="" id="videoFileInput" accept="video/*"/>
                            <br />
                            <span id="video-description-label" class="mdc-typography--subheading1 mdc-theme--text-secondary-on-background">mp4 is recommended </span>
                        </div>
                    </div>

                    <!-- MOLECULE -->
					<?php $showMolType = $saved_term[0]->slug == 'molecule'?'':'none'; ?>

                    <div id="moleculeOptionsPanel" style="display: <?php echo ($asset_id == null)?'none':$showMolType; ?>;">

                        <h3 class="mdc-typography--title">Molecule Options</h3>

                        <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                            <input id="moleculeChemicalType" name="moleculeChemicalType" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                                   style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                            <label for="moleculeChemicalType" class="mdc-textfield__label"> Chemical Type (e.g.: H2O)</label>
                            <div class="mdc-textfield__bottom-line"></div>
                        </div>

                        <div style="display: none;">

                            <hr class="WhiteSpaceSeparator">

                            <h3 class="mdc-typography--title">Functional Group</h3>

                            <div id="moleculeFunctionalGroupSelect" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                                <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Select a functional group</span>
                                <div class="mdc-simple-menu mdc-select__menu">
                                    <ul class="mdc-list mdc-simple-menu__items">
                                        <li class="mdc-list-item mdc-theme--text-hint-on-light" role="option" aria-disabled="true" style="pointer-events: none;" tabindex="-1">
                                            Select a functional group
                                        </li>
                                        <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="functionalGroupNone" tabindex="0">
                                            None
                                        </li>
                                        <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="functionalGroupAlcohol" tabindex="0">
                                            Alcohol
                                        </li>
                                        <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="functionalGroupKetone" tabindex="0">
                                            Ketone
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <input id="moleculeFunctionalGroupInput" name="moleculeFunctionalGroupInput" type="hidden">

                            <hr class="WhiteSpaceSeparator">

                            <h3 class="mdc-typography--title">Fluid Options</h3>

                            <label for="molecule-fluid-viscosity-slider-label" class="mdc-typography--subheading2">Viscosity: </label>
                            <div class="mdc-textfield" data-mdc-auto-init="MDCTextfield">
                                <input id="molecule-fluid-viscosity-slider-label" name="molecule-fluid-viscosity-slider-label" type="number" step="0.1" value="1" min="0" max="2000" minlength="1" maxlength="4" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                                       style="font-weight:bold; border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                                <div class="mdc-textfield__bottom-line"></div>
                            </div>

                            <!--<input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="molecule-fluid-viscosity-slider-label" style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">-->
                            <div id="molecule-fluid-viscosity-slider"></div>
                            <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
                    1 = Water like viscosity, bigger values mean thicker liquid.</span>
                            <input type="hidden" id="moleculeFluidViscosityVal" name="moleculeFluidViscosityVal" value="">

                        </div>
                    </div>

                    <div id="chemistryBoxOptionsPanel" style="display: none;">

                        <div style="display: none;">

                            <h3 class="mdc-typography--title">Known Group</h3>

                            <div id="boxKnownGroupSelect" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                                <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Select a known group</span>
                                <div class="mdc-simple-menu mdc-select__menu">
                                    <ul class="mdc-list mdc-simple-menu__items">
                                        <li class="mdc-list-item mdc-theme--text-hint-on-light" role="option" aria-disabled="true" style="pointer-events: none;" tabindex="-1">
                                            Select a known group
                                        </li>
                                        <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="knownGroupAlcohol" tabindex="0">
                                            Alcohol
                                        </li>
                                        <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="knownGroupKetone" tabindex="0">
                                            Ketone
                                        </li>
                                        <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="knownGroupVarious" tabindex="0">
                                            Various
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <input id="boxKnownGroupInput" type="hidden">

                        </div>

                    </div>


                </div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6" id="objectPropertiesPanel">

                    <h3 class="mdc-typography--title">Object Properties</h3>

                    <ul class="RadioButtonList">
                        <!--<li class="mdc-form-field" style="pointer-events: none; " disabled>
						  <div class="mdc-radio" >
							  <input class="mdc-radio__native-control" type="radio" id="fbxRadio"  name="objectTypeRadio" value="fbx" disabled>
							  <div class="mdc-radio__background">
								  <div class="mdc-radio__outer-circle"></div>
								  <div class="mdc-radio__inner-circle"></div>
							  </div>
						  </div>
						  <label id="fbxRadio-label" for="fbxRadio" style="margin-bottom: 0;">FBX file</label>
					  </li>-->

                        <li class="mdc-form-field" id="mtlRadioListItem">
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="mtlRadio" name="objectTypeRadio" value="mtl">
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label id="mtlRadio-label" for="mtlRadio" style="margin-bottom: 0;">MTL & OBJ files</label>
                        </li>
                        <li class="mdc-form-field" style="display: none;" id="pdbRadioListItem">
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="pdbRadio" name="objectTypeRadio" value="pdb">
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label id="pdbRadio-label" for="pdbRadio" style="margin-bottom: 0;">Protein Data Bank file</label>
                        </li>

                    </ul>

                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">

                            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                                <h3 class="mdc-typography--title">Object Preview</h3>


                                <div id="previewProgressSlider" style="display: none; position: relative;" class="CenterContents">
                                    <h6 class="mdc-theme--text-primary-on-light mdc-typography--title" style="position: absolute; left:0; right: 0;">Loading 3D object</h6>
                                    <h6 id="previewProgressLabel" class="mdc-theme--text-primary-on-light mdc-typography--subheading1" style="position: absolute; left:0; right: 0; top: 26px;"></h6>

                                    <div class="progressSlider">
                                        <div id="previewProgressSliderLine" class="progressSliderSubLine" style="width: 0;"></div>
                                    </div>
                                </div>

                                <div id="wrapper_3d_inner">
                                    <div style="position: absolute;">
                                        <div id="previewCanvasDiv" style="height: 300px; width:100%; position: relative"></div>
                                    </div>

                                    <canvas id="previewCanvas" style="height: 300px; width:100%;"></canvas>
                                </div>

                                <label>Select an asset to insert</label>
                                <ul id="lightSlider">
                                    <!--put php loop here for every li item-->

									<?php
									foreach ( $asset_id_avail_joker as $myAssetID ) {
										$mtlID = get_post_meta($myAssetID, 'wpunity_asset3d_mtl', true);
										$objID = get_post_meta($myAssetID, 'wpunity_asset3d_obj', true);
										$pdbID = get_post_meta($myAssetID, 'wpunity_asset3d_pdb', true);
										$screenimgID = get_post_meta($myAssetID, 'wpunity_asset3d_screenimage', true);
										$diffimgID = get_post_meta($myAssetID, 'wpunity_asset3d_diffimage', true);
										$screenimgURL = wp_get_attachment_url($screenimgID) ? wp_get_attachment_url($screenimgID) : plugins_url( '../images/thumb-no-asset.png', dirname(__FILE__) );


										$pdb_sample_file_contents = $pdbID ? file_get_contents(wp_get_attachment_url( $pdbID )) : '';

										echo '<li data-thumb="'. $screenimgURL . '">';
										echo '<img class="asset-image-tile-style" src="'. $screenimgURL .'"'.
										     ' data-asset-id="'. $myAssetID .'"'.
										     ' data-mtl-file="'. basename( get_attached_file( $mtlID ) ) .'"'.
										     ' data-obj-file="'. basename( get_attached_file( $objID ) ) .'"'.
										     ' data-pdb-content="'. $pdb_sample_file_contents  .'"'.
										     ' data-path-url="'. pathinfo(wp_get_attachment_url($mtlID))['dirname'] .'/"'.
										     ' onclick="loader_asset_exists(this.dataset.pathUrl, this.dataset.mtlFile, this.dataset.objFile, this.dataset.pdbContent);'.
										     'document.getElementById(\'asset_sourceID\').value = this.dataset.assetId;'.
										     '"/>';
										echo '</li>';
									}	?>


                                </ul>

                                <input type="hidden" id="asset_sourceID" name="asset_sourceID" value=""/>

                                <label id="fileUploadInputLabel" for="multipleFilesInput"> Or select an a) obj, b) mtl, & c) optional texture file</label>
                                <input id="fileUploadInput" class="FullWidth" type="file" name="multipleFilesInput" value=""
                                       multiple accept=".obj,.mtl,.jpg,.png"/>


                                
                                
                                
                                

                                <input type="hidden" name="fbxFileInput" value="" id="fbxFileInput" />
                                <input type="hidden" name="objFileInput" value="" id="objFileInput" />
                                <input type="hidden" name="mtlFileInput" value="" id="mtlFileInput" />
                                <input type="hidden" name="pdbFileInput" value="" id="pdbFileInput" />

                            </div>


                            <div id="sshotFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                                <h3 class="mdc-typography--title">Screenshot</h3>

								<?php

								if($asset_id==null) {

									// If asset is not created load a predefault image
									echo '<img id = "sshotPreviewImg" style = "width: auto; height: 100px" src="'.
									     plugins_url( '../images/ic_sshot.png', dirname(__FILE__)  ).'">';

								} else {
									// if asset is edited load the existing screenshot url
									$scrnImageURL = wp_get_attachment_url( get_post_meta($asset_id, "wpunity_asset3d_screenimage",true) );
									echo '<img id = "sshotPreviewImg" style = "width: auto; height: 100px" src="'.$scrnImageURL.'">';

									// There is no need to resend the image. I ignore the field operations if it is empty.
//                                        $scrImgData = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($scrnImageURL));
//                                        echo '<input class="FullWidth" type="hidden" name="sshotFileInput" value="'.$scrImgData.'" id="sshotFileInput" accept="image/jpeg"/>';
								}
								?>

                                <input class="FullWidth" type="hidden" name="sshotFileInput" value="" id="sshotFileInput" accept="image/jpeg"/>

                                <a id="createModelScreenshotBtn" type="button" class="mdc-button mdc-button--primary mdc-theme--primary" data-mdc-auto-init="MDCRipple">Create screenshot</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--     FLUID PROPERTIES    -->
        <div class="mdc-layout-grid" id="moleculeFluidPanel" style="display:none">
            <div class="mdc-layout-grid__inner" style="display: none;">

                <div  class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                    <h3 class="mdc-typography--title">Fluid Color</h3>
                    <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
                Create a color for the fluid that will be displayed inside the vial.
            </span>
                    <div class="mdc-layout-grid__inner">

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                            <div id="fluidColorRedSlider" class="ColorPickerSliderRed"></div>
                            <div id="fluidColorGreenSlider" class="ColorPickerSliderGreen"></div>
                            <div id="fluidColorBlueSlider" class="ColorPickerSliderBlue"></div>
                            <div id="fluidColorAlphaSlider" class="ColorPickerSliderAlpha"></div>
                        </div>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
                            <ul class="mdc-list">
                                <li class="mdc-list-item">
                                    <label for="fluidColorRedVal" class="mdc-typography--subheading2">Red:</label>
                                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="fluidColorRedVal" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;"
                                </li>
                                <li class="mdc-list-item">
                                    <label for="fluidColorGreenVal" class="mdc-typography--subheading2">Green:</label>
                                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="fluidColorGreenVal" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;"
                                </li>
                                <li class="mdc-list-item">
                                    <label for="fluidColorBlueVal" class="mdc-typography--subheading2">Blue:</label>
                                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="fluidColorBlueVal" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;"
                                </li>
                                <li class="mdc-list-item">
                                    <label for="fluidColorAlphaVal" class="mdc-typography--subheading2">Alpha:</label>
                                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="fluidColorAlphaVal" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;"
                                </li>
                            </ul>
                        </div>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
                            <div id="fluidColorPreview" class="ui-widget-content ui-corner-all ColorPickerPreview"></div>
                        </div>

                    </div>
                    <input type="hidden" id="moleculeFluidColorVal" name="moleculeFluidColorVal">
                </div>
            </div>

        </div>

        <!-- Terrain properties -->
        <div id="terrainPanel" class="mdc-layout-grid" style="display: none;">

            <div class="mdc-layout-grid__inner" style="display: none;">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                    <h3 class="mdc-typography--title">Physics</h3>
                    <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
            Change the terrain physics properties.</span>

                    <br>

                    <label for="wind-speed-range-label" class="mdc-typography--subheading2">Wind Speed Range:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="wind-speed-range-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="wind-speed-range"></div>
                    <input type="hidden" id="physicsWindMinVal" name="physicsWindMinVal" value="">
                    <input type="hidden" id="physicsWindMaxVal" name="physicsWindMaxVal" value="">

                    <hr class="WhiteSpaceSeparator">

                    <label for="wind-mean-slider-label" class="mdc-typography--subheading2">Wind Speed Mean:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="wind-mean-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="wind-mean-slider"></div>
                    <input type="hidden" id="physicsWindMeanVal" name="physicsWindMeanVal" value="">

                    <hr class="WhiteSpaceSeparator">

                    <label for="wind-variance-slider-label" class="mdc-typography--subheading2">Wind Variance:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="wind-variance-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="wind-variance-slider"></div>
                    <input type="hidden" id="physicsWindVarianceVal" name="physicsWindVarianceVal" value="">

                </div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                    <h3 class="mdc-typography--title">Income</h3>

                    <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
            Applied to all producer components that are placed on this terrain.
        </span>

                    <br>

                    <label for="over-power-income-slider-label" class="mdc-typography--subheading2">Over Power Income:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="over-power-income-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="over-power-income-slider"></div>
                    <input type="hidden" id="overPowerIncomeVal" name="overPowerIncomeVal" value="">

                    <hr class="WhiteSpaceSeparator">

                    <label for="correct-power-income-slider-label" class="mdc-typography--subheading2">Correct Power Income:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="correct-power-income-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="correct-power-income-slider"></div>
                    <input type="hidden" id="correctPowerIncomeVal" name="correctPowerIncomeVal" value="">

                    <hr class="WhiteSpaceSeparator">

                    <label for="under-power-income-slider-label" class="mdc-typography--subheading2">Under Power Income:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="under-power-income-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="under-power-income-slider"></div>
                    <input type="hidden" id="underPowerIncomeVal" name="underPowerIncomeVal" value="">

                    <h3 class="mdc-typography--title">Construction Penalties (in $)</h3>

                    <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
            Construction penalties apply for consumers and producers that are placed on this terrain.
        </span>
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                            <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                                <input title="Access cost penalty" id="accessCostPenalty" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light" name="accessCostPenalty"
                                       aria-controls="accessCostPenalty-validation-msg" value="<?php echo $access_penalty; ?>" required min="0" max="10" minlength="1" maxlength="2" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                                <label for="accessCostPenalty" class="mdc-textfield__label"> Access Cost</label>
                                <div class="mdc-textfield__bottom-line"></div>
                            </div>
                        </div>
                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                            <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                                <input title="Archaeological site proximity penalty" id="archProximityPenalty" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light" name="archProximityPenalty"
                                       aria-controls="archProximityPenalty-validation-msg" value="<?php echo $archaeology_penalty; ?>" required min="0" max="10" minlength="1" maxlength="2" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                                <label for="archProximityPenalty" class="mdc-textfield__label"> Arch. site proximity </label>
                                <div class="mdc-textfield__bottom-line"></div>
                            </div>
                        </div>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                            <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                                <input title="Natural reserve proximity penalty" id="naturalReserveProximityPenalty" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light" name="naturalReserveProximityPenalty"
                                       aria-controls="naturalReserveProximityPenalty-validation-msg" value="<?php echo $natural_reserve_penalty; ?>" required min="0" max="10" minlength="1" maxlength="2" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                                <label for="naturalReserveProximityPenalty" class="mdc-textfield__label"> Natural reserve proximity </label>
                                <div class="mdc-textfield__bottom-line"></div>
                            </div>
                        </div>
                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                            <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                                <input title="Distance from High Voltage lines penalty" id="hiVoltLineDistancePenalty" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light" name="hiVoltLineDistancePenalty"
                                       aria-controls="hiVoltLineDistancePenalty-validation-msg" value="<?php echo $hvdistance_penalty; ?>" required min="0" max="10" minlength="1" maxlength="2" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                                <label for="hiVoltLineDistancePenalty" class="mdc-textfield__label"> Hi-Voltage line distance </label>
                                <div class="mdc-textfield__bottom-line"></div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!-- CONSUMER -->
        <div id="consumerPanel" class="mdc-layout-grid" style="display: none;">

            <div class="mdc-layout-grid__inner">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                    <h3 class="mdc-typography--title">Energy Consumption</h3>

                    <label for="energy-consumption-range-label" class="mdc-typography--subheading2">Energy Consumption Range:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="energy-consumption-range-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="energy-consumption-range"></div>
                    <input type="hidden" id="energyConsumptionMinVal" name="energyConsumptionMinVal" value="<?php echo $min_consumption; ?>">
                    <input type="hidden" id="energyConsumptionMaxVal" name="energyConsumptionMaxVal" value="<?php echo $max_consumption; ?>">

                    <hr class="WhiteSpaceSeparator">

                    <label for="energy-consumption-mean-slider-label" class="mdc-typography--subheading2">Energy Consumption Mean:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="energy-consumption-mean-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="energy-consumption-mean-slider"></div>
                    <input type="hidden" id="energyConsumptionMeanVal" name="energyConsumptionMeanVal" value="<?php echo $mean_consumption; ?>">

                    <hr class="WhiteSpaceSeparator">

                    <label for="energy-consumption-variance-slider-label" class="mdc-typography--subheading2">Energy Consumption Variance:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="energy-consumption-variance-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="energy-consumption-variance-slider"></div>
                    <input type="hidden" id="energyConsumptionVarianceVal" name="energyConsumptionVarianceVal" value="<?php echo $var_consumption; ?>">

                </div>
            </div>
        </div>

        <!-- PRODUCER  -->
        <div id="producerPanel" class="mdc-layout-grid" style="display: none;">
            <div class="mdc-layout-grid__inner">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                    <h3 class="mdc-typography--title">Power Production Chart</h3>

                    <div class="PlotContainerStyle">
                        <div id="producer-chart" class="ProducerChartStyle"></div>
                    </div>
                    <div class="CenterContents">
                        <label class="mdc-typography--subheading2">Select a <b>Power Production</b> value for each <b>Wind Speed</b> value</label>
                    </div>
                    <div id="powerProductionValuesGroup" class="PowerProductionGroupStyle"></div>

                    <div class="PowerProductionGroupStyle">
                        <span>0</span>
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>5</span>
                        <span>6</span>
                        <span>7</span>
                        <span>8</span>
                        <span>9</span>
                        <span>10</span>

                        <span>11</span>
                        <span>12</span>
                        <span>13</span>
                        <span>14</span>
                        <span>15</span>
                        <span>16</span>
                        <span>17</span>
                        <span>18</span>
                        <span>19</span>
                        <span>20</span>
                        <span>21</span>

                        <span>22</span>
                        <span>23</span>
                        <span>24</span>
                        <span>25</span>
                        <span>26</span>
                        <span>27</span>
                    </div>


                    <input type="hidden" id="producerPowerProductionVal" name="producerPowerProductionVal" value="<?php echo $optProductionVal ?>">
                </div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                    <h3 class="mdc-typography--title">Producer Options</h3>

                    <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                        <input title="Producer class" id="producerClassVal" class="mdc-textfield__input mdc-theme--text-primary-on-light" name="producerClassVal"
                               aria-controls="producer-class-validation-msg" value="<?php echo $optGen_class; ?>" required minlength="1" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                        <label for="producerClassVal" class="mdc-textfield__label"> Producer class </label>
                        <div class="mdc-textfield__bottom-line"></div>
                    </div>

                    <hr class="WhiteSpaceSeparator">

                    <label for="producer-wind-speed-class-slider-label" class="mdc-typography--subheading2">Wind Speed Class:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" id="producer-wind-speed-class-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="producer-wind-speed-class-slider"></div>
                    <input type="hidden" id="producerWindSpeedClassVal" name="producerWindSpeedClassVal" value="">

                    <hr class="WhiteSpaceSeparator">

                    <label for="producer-max-power-slider-label" class="mdc-typography--subheading2">Max Power:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" id="producer-max-power-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="producer-max-power-slider"></div>
                    <input type="hidden" id="producerMaxPowerVal" name="producerMaxPowerVal" value="">

                    <hr class="WhiteSpaceSeparator">

                    <label for="producer-turbine-size-slider-label" class="mdc-typography--subheading2">Rotor Size (diameter):</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" id="producer-turbine-size-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="producer-turbine-size-slider"></div>
                    <input type="hidden" id="producerTurbineSizeVal" name="producerTurbineSizeVal" value="">

                    <hr class="WhiteSpaceSeparator">

                    <label for="producer-damage-coeff-slider-label" class="mdc-typography--subheading2">Damage Coefficient:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" id="producer-damage-coeff-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;  width: auto;">
                    <div id="producer-damage-coeff-slider"></div>
                    <input type="hidden" id="producerDmgCoeffVal" name="producerDmgCoeffVal" value="">

                </div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                    <h3 class="mdc-typography--title">Producer Costs</h3>

                    <label for="producer-cost-slider-label" class="mdc-typography--subheading2">Producer Cost:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" id="producer-cost-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="producer-cost-slider"></div>
                    <input type="hidden" id="producerCostVal" name="producerCostVal" value="">

                    <hr class="WhiteSpaceSeparator">

                    <label for="producer-repair-cost-slider-label" class="mdc-typography--subheading2">Producer Repair Cost:</label>
                    <input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" id="producer-repair-cost-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">
                    <div id="producer-repair-cost-slider"></div>
                    <input type="hidden" id="producerRepairCostVal" name="producerRepairCostVal" value="">

                </div>
            </div>
        </div>

        <hr class="WhiteSpaceSeparator">


        <!--       IPR category              -->
        <?php
            $cat_ipr_terms = get_terms('wpunity_asset3d_ipr_cat', array('get' => 'all'));
            $saved_ipr_term = wp_get_post_terms( $asset_id, 'wpunity_asset3d_ipr_cat');
        ?>

        <!-- CATEGORY IPR -->
        <div class="mdc-layout-grid" id="ipr-div" style="display:none">

            <div class="mdc-layout-grid__inner">

                <div  class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                    <h3 class="mdc-typography--title">Select an IPR plan</h3>
                    <div id="category-ipr-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                        <i class="material-icons mdc-theme--text-hint-on-light">label</i>&nbsp;
                    
                        <?php if($asset_id == null) { ?>
                            <span id="currently-ipr-selected" class="mdc-select__selected-text mdc-typography--subheading2">No IPR category selected</span>
                        <?php } else { ?>
                            <span data-cat-ipr-desc="<?php echo $saved_ipr_term[0]->description; ?>" data-cat-ipr-slug="<?php echo $saved_ipr_term[0]->slug; ?>" data-cat-ipr-id="<?php echo $saved_ipr_term[0]->term_ipr_id; ?>" id="currently-ipr-selected" class="mdc-select__selected-text mdc-typography--subheading2"><?php echo $saved_ipr_term[0]->name; ?></span>
                        <?php } ?>

           
                        <div class="mdc-simple-menu mdc-select__menu">
                            <ul class="mdc-list mdc-simple-menu__items">

                                <li class="mdc-list-item mdc-theme--text-hint-on-light" role="option" aria-disabled="true" tabindex="-1" style="pointer-events: none;">
                                    No IPR category selected
                                </li>
                                
                                <?php
                                    foreach ( $cat_ipr_terms as $term_ipr ) {
                                    ?>
                                    
                                    <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" data-cat-ipr-desc="<?php echo $term_ipr->description; ?>" data-cat-ipr-slug="<?php echo $term_ipr->slug; ?>" id="<?php echo $term_ipr->term_id?>" tabindex="0">
                                        <?php echo $term_ipr->name; ?>
                                    </li>
                            
                                <?php } ?>

                            </ul>
                        </div>
                    </div>

                    <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light" id="categoryIPRDescription"> </span>
                </div>
                <input id="termIdInputIPR" type="hidden" name="term_id_ipr" value="">

            </div>

        </div>

        <!--                                                  -->

		<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
        <input type="hidden" name="submitted" id="submitted" value="true" />
		<?php $buttonTitleText = ($asset_id == null ? "Create asset" : "Update asset"); ?>
        <button id="formSubmitBtn" style="display: none;" class="ButtonFullWidth mdc-button mdc-elevation--z2 mdc-button--raised mdc-button--primary"
                data-mdc-auto-init="MDCRipple" type="submit" <?php echo $isEditable?'':' disabled' ?> >
			<?php echo $buttonTitleText; ?>
        </button>


		<?php echo $isEditable?'':'*You can not update a shared asset'?>

    </form>

    <!--                     Javascript                             -->

    <script type="text/javascript">
        'use strict';

        var mdc = window.mdc;
        mdc.autoInit();

        var game_type_slug = "<?php echo $game_type_slug; ?>";

        // TODO: Remove also from register and enquire
        var wu_webw_3d_view = new WU_webw_3d_view( document.getElementById( 'previewCanvas' ) );

        wpunity_reset_panels(wu_webw_3d_view);

        var multipleFilesInputElem = document.getElementById( 'fileUploadInput' );

        loadAssetPreviewer(wu_webw_3d_view, multipleFilesInputElem);

        var sshotPreviewDefaultImg = document.getElementById("sshotPreviewImg").src;
        var createScreenshotBtn = jQuery("#createModelScreenshotBtn");

        createScreenshotBtn.click(function() {

            wu_webw_3d_view.renderer.preserveDrawingBuffer = true;
            wpunity_create_model_sshot(wu_webw_3d_view);
        });

        (function() {
            var MDCSelect = mdc.select.MDCSelect;
            
            var categoryDropdown = document.getElementById('category-select');
            var categoryIPRDropdown = document.getElementById('category-ipr-select');

            var categorySelect = MDCSelect.attachTo(categoryDropdown);
            var selectedCatId = jQuery('#currently-selected').attr("data-cat-id");


            var categoryIPRSelect = MDCSelect.attachTo(categoryIPRDropdown);
            var selectedCatIPRId = jQuery('#currently-ipr-selected').attr("data-cat-ipr-id");
            

            var moleculeFunctionalGroupDropdown = document.getElementById('moleculeFunctionalGroupSelect');
            var moleculeFunctionalGroupSelect = MDCSelect.attachTo(moleculeFunctionalGroupDropdown);

            var boxKnownGroupDropdown = document.getElementById('boxKnownGroupSelect');
            var boxKnownGroupSelect = MDCSelect.attachTo(boxKnownGroupDropdown);


            // This fires on CREATE
            jQuery( document ).ready(function() {

                if (jQuery('#currently-selected').attr("data-cat-id")) {
                    jQuery('#'+ selectedCatId).attr("aria-selected", true);
                    jQuery('#category-select').addClass('mdc-select--disabled').attr( "aria-disabled", true);
                    loadLayout(false);
                }

                if (jQuery('#currently-ipr-selected').attr("data-cat-ipr-id")) {
                    jQuery('#'+ selectedCatIPRId).attr("aria-selected", true);
                    jQuery('#category-ipr-select').addClass('mdc-select--disabled').attr( "aria-disabled", true);
                }

            });


            // This fires on CHANGE
            categoryDropdown.addEventListener('MDCSelect:change', function() {
                loadLayout(true);
            });

            categoryIPRDropdown.addEventListener('MDCSelect:change', function() {

                //var descTextIPR = document.getElementById('categoryIPRDescription');
                //descTextIPR.innerHTML = jQuery("#currently-ipr-selected").attr("data-cat-ipr-desc");
                
                // Change the description of the popup
                jQuery("#categoryIPRDescription")[0].innerHTML =  categoryIPRSelect.selectedOptions[0].getAttribute("data-cat-ipr-desc");
     
                // descTextIPR.innerHTML = categoryIPRSelect.selectedOptions[0].getAttribute("data-cat-ipr-desc");
                // catIPR = categoryIPRSelect.selectedOptions[0].getAttribute("data-cat-ipr-slug");
                // jQuery("#termIdInputIPR").attr( "value", categorySelect.selectedOptions[0].getAttribute("id") );

                // Change the value of termIdInputIPR
                jQuery("#termIdInputIPR").attr( "value", categoryIPRSelect.selectedOptions[0].getAttribute("id") );
            });
            
            //-----------------------

            moleculeFunctionalGroupDropdown.addEventListener('MDCSelect:change', function() {
                jQuery("#moleculeFunctionalGroupInput").attr( "value", moleculeFunctionalGroupSelect.selectedOptions[0].getAttribute("id") );
            });

            boxKnownGroupDropdown.addEventListener('MDCSelect:change', function() {
                jQuery("#boxKnownGroupInput").attr( "value", boxKnownGroupSelect.selectedOptions[0].getAttribute("id") );
            });

            loadFileInputLabel();

            var lightSliderOpts = {
                item: 4,
                loop: false,
                slideMove: 1,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed: 600,
                responsive : [
                    {
                        breakpoint:800,
                        settings: {
                            item:3,
                            slideMove:1,
                            slideMargin:6
                        }
                    },
                    {
                        breakpoint:480,
                        settings: {
                            item:2,
                            slideMove:1
                        }
                    }
                ]
            };

            var lightSliderLoaded = false;

            function loadLayout(createAsset) {

                var item = categorySelect.selectedOptions[0];
                var index = categorySelect.selectedIndex;
                

                jQuery("#informationPanel").show();
                jQuery("#formSubmitBtn").show();

                jQuery("#pdbRadioListItem").show();

                jQuery("#ipr-div").show();

                
                
                
                wu_webw_3d_view.resizeDisplayGL();

                wpunity_reset_panels(wu_webw_3d_view);

                var descText;
                var cat;

                descText = document.getElementById('categoryDescription');
                
                if(createAsset) {

                    descText.innerHTML = categorySelect.selectedOptions[0].getAttribute("data-cat-desc");
                    cat = categorySelect.selectedOptions[0].getAttribute("data-cat-slug");
                    jQuery("#termIdInput").attr( "value", categorySelect.selectedOptions[0].getAttribute("id") );

                } else {
                    
                    descText.innerHTML = jQuery("#currently-selected").attr("data-cat-desc");
                    cat = jQuery("#currently-selected").attr("data-cat-slug");
                    jQuery("#termIdInput").attr( "value", selectedCatId );
                }

                if (cat === 'molecule') {
                    jQuery("#mtlRadio").prop("checked", false);
                    jQuery("#mtlRadioListItem").hide();
                    jQuery("#pdbRadio").prop("checked", true);
                    jQuery("#pdbRadioListItem").show();

                } else {
                    jQuery("#mtlRadio").prop("checked", true);
                    jQuery("#mtlRadioListItem").show();
                    jQuery("#pdbRadio").prop("checked", false);
                    jQuery("#pdbRadioListItem").hide();
                }

                mdc.radio.MDCRadio.attachTo(document.querySelector('.mdc-radio'));
                loadFileInputLabel();

                if (!lightSliderLoaded) {
                    jQuery('#lightSlider').lightSlider(lightSliderOpts);
                    lightSliderLoaded = true;
                }


                jQuery("#poiImgDetailsPanel").hide();
                jQuery("#poiVideoDetailsPanel").hide();
                jQuery("#moleculeOptionsPanel").hide();
                jQuery("#moleculeFluidPanel").hide();

                console.log(cat);
                // Chemistry Asset Type (Molecule)

                switch(cat) {
                    // Archaeology cases
                    case 'doors':
                        jQuery("#doorDetailsPanel").show();

                        break;
                    case 'dynamic3dmodels':

                        break;
                    case 'pois_imagetext':
                        jQuery("#poiImgDetailsPanel").show();
                        break;
                    case 'pois_video':
                        jQuery("#poiVideoDetailsPanel").show();
                        break;
                    // Energy cases
                    case 'terrain':
                        jQuery("#terrainPanel").show();

                        break;
                    case 'consumer':
                        jQuery("#consumerPanel").show();

                        break;
                    case 'producer':
                        jQuery("#producerPanel").show();
                        break;

                    // Chemistry cases
                    case 'molecule':
                        jQuery("#moleculeOptionsPanel").show();
                        //jQuery("#moleculeFluidPanel").show();
                        break;

                    case 'box':
                        jQuery("#chemistryBoxOptionsPanel").show();
                        break;

                    default:

                }
            }

        })();


        jQuery( function() {

            // Object type Toggle
            jQuery( "input[name=objectTypeRadio]" ).click(function() {
                loadFileInputLabel();
            });

            var minspeed_value = <?php echo json_encode($min_speed_wind);?>;
            var maxspeed_value = <?php echo json_encode($max_speed_wind);?>;
            var meanspeed_value = <?php echo json_encode($mean_speed_wind);?>;
            var varspeed_value = <?php echo json_encode($var_speed_wind);?>;

            var windSpeedRangeSlider = wpunity_create_slider_component("#wind-speed-range", true, {min: 0, max: 40, values:[minspeed_value,maxspeed_value], valIds:["#physicsWindMinVal", "#physicsWindMaxVal" ], units:"m/sec"});
            var windMeanSlider = wpunity_create_slider_component("#wind-mean-slider", false, {min: 0, max: 40, value: meanspeed_value, valId:"#physicsWindMeanVal", units:"m/sec"});
            var windVarianceSlider = wpunity_create_slider_component("#wind-variance-slider", false, {min: 1, max: 100, value: varspeed_value, valId:"#physicsWindVarianceVal", units:""});


            // Change Mean range according to Speed range
            jQuery( "#wind-speed-range" ).on( "slidestop", function( event, ui ) {

                var elemId = "#wind-mean-slider";
                jQuery( elemId ).slider( "option", "min", ui.values[ 0 ] );
                jQuery( elemId ).slider( "option", "max", ui.values[ 1 ] );
                jQuery( elemId ).slider( "option", "values", [ ui.values[ 0 ], ui.values[ 1 ] ] );

                jQuery( elemId+"-label" ).val( jQuery( elemId ).slider( "values", 0 ) + " " + 'm/sec' );

            } );

            var min_cons = <?php echo json_encode($min_consumption);?>;
            var max_cons = <?php echo json_encode($max_consumption);?>;
            var mean_cons = <?php echo json_encode($mean_consumption);?>;
            var var_cons = <?php echo json_encode($var_consumption);?>;

            var energyConsumptionRangeSlider = wpunity_create_slider_component("#energy-consumption-range", true, {min: 0, max: 2000, values:[min_cons, max_cons], valIds:["#energyConsumptionMinVal", "#energyConsumptionMaxVal" ], step: 5, units:"kW"});
            var energyConsumptionMeanSlider = wpunity_create_slider_component("#energy-consumption-mean-slider", false, {min: 50, max: 150, value: mean_cons, valId:"#energyConsumptionMeanVal", step: 5, units:"kW"});
            var energyConsumptionVarianceSlider = wpunity_create_slider_component("#energy-consumption-variance-slider", false, {min: 5, max: 1000, value: var_cons, valId:"#energyConsumptionVarianceVal", step: 5, units:""});


            // Change Mean range according to Speed range
            jQuery( "#energy-consumption-range" ).on( "slidestop", function( event, ui ) {

                var elemId = "#energy-consumption-mean-slider";
                jQuery( elemId ).slider( "option", "min", ui.values[ 0 ] );
                jQuery( elemId ).slider( "option", "max", ui.values[ 1 ] );
                jQuery( elemId ).slider( "option", "values", [ ui.values[ 0 ], ui.values[ 1 ] ] );

                jQuery( elemId+"-label" ).val( jQuery( elemId ).slider( "values", 0 ) + " " + 'kW' );

            } );

            var income_overpower = <?php echo json_encode($income_when_overpower);?>;
            var income_correct = <?php echo json_encode($income_when_correct_power);?>;
            var income_underpower = <?php echo json_encode($income_when_under_power);?>;

            var terrainOverPowerIncomeSlider = wpunity_create_slider_component("#over-power-income-slider", false, {min: -5, max: 5, value: income_overpower, valId:"#overPowerIncomeVal", step: 0.5, units:"$"});
            var terrainCorrectPowerIncomeSlider = wpunity_create_slider_component("#correct-power-income-slider", false, {min: -5, max: 5, value: income_correct, valId:"#correctPowerIncomeVal", step: 0.5, units:"$"});
            var terrainUnderPowerIncomeSlider = wpunity_create_slider_component("#under-power-income-slider", false, {min: -5, max: 5, value: income_underpower, valId:"#underPowerIncomeVal", step: 0.5, units:"$"});

            var opt_size = <?php echo json_encode($optCosts_size);?>;
            var opt_dmg = <?php echo json_encode($optCosts_dmg);?>;
            var opt_cost = <?php echo json_encode($optCosts_cost);?>;
            var opt_repaid = <?php echo json_encode($optCosts_repaid);?>;
            var opt_speed = <?php echo json_encode($optGen_speed);?>;
            var opt_power = <?php echo json_encode($optGen_power);?>;

            var producerTurbineSizeSlider = wpunity_create_slider_component("#producer-turbine-size-slider", false, {min: 3, max: 250, value: opt_size, valId:"#producerTurbineSizeVal", step: 1, units:"m"});
            var producerDmgCoeffSlider = wpunity_create_slider_component("#producer-damage-coeff-slider", false, {min: 0.001, max: 0.02, value: opt_dmg, valId:"#producerDmgCoeffVal", step: 0.001, units:"Probability / sec"});
            var producerCostSlider = wpunity_create_slider_component("#producer-cost-slider", false, {min: 1, max: 10, value: opt_cost, valId:"#producerCostVal", step: 1, units:"$"});
            var producerRepairCostSlider = wpunity_create_slider_component("#producer-repair-cost-slider", false, {min: 0.5, max: 5, value: opt_repaid, valId:"#producerRepairCostVal", step: 0.5, units:"$"});
            var producerWindSpeedClassSlider = wpunity_create_slider_component("#producer-wind-speed-class-slider", false, {min: 2, max: 20, value: opt_speed, valId:"#producerWindSpeedClassVal", step: 0.01, units:"m/sec"});
            var producerMaxPowerSlider = wpunity_create_slider_component("#producer-max-power-slider", false, {min: 0.001, max: 20, value: opt_power, valId:"#producerMaxPowerVal", step: 0.001, units:"MW"});

            var moleculeFluidViscositySlider = wpunity_create_slider_component("#molecule-fluid-viscosity-slider", false, {min: 0, max: 2000, value: 1, valId:"#moleculeFluidViscosityVal", step: 0.1, units:"", inputText:true});

            // POI Image panels - Add/remove POI inputs
            var poiMaxFields      = 3; // max input boxes allowed
            var poiImgDetailsWrapper         = jQuery("#poiImgDetailsWrapper"); // Fields wrapper
            var addPoiFieldBtn      = jQuery("#poiAddFieldBtn"); // Add button ID
            var i = 0; // Initial text box count

            addPoiFieldBtn.click(function(e){ // On add input button click
                e.preventDefault();
                if(i < poiMaxFields) { // Max input box allowed
                    i++; // Text box increment
                    poiImgDetailsWrapper.append(
                        '<div class="mdc-layout-grid"><div class="mdc-layout-grid__inner">'+
                        '<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-10">' +
                        '<label for="poi-input-file-'+i+'"> Select an image</label>'+
                        '<input type="file" name="poi-input-file-'+i+'" class="FullWidth" value="" accept="image/jpeg"/>' +
                        '<div class="mdc-textfield mdc-form-field FullWidth " data-mdc-auto-init="MDCTextfield">' +
                        '<input id="poi-input-text-'+i+'" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="poi-input-text-'+i+'" ' +
                        'aria-controls="poi-input-text-validation-msg" minlength="3" maxlength="25" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">' +
                        '<div class="mdc-textfield__bottom-line"></div>' +
                        '<label for="poi-input-text-'+i+'" class="mdc-textfield__label">Enter an image description' +
                        '</div>' +
                        '<p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg" id="title-validation-msg">Between 3 - 25 characters</p></div>' +
                        '<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2"><a href="#" class="remove_field"><i title="Delete field" style="font-size: 36px" class="material-icons">clear</i></a></div>' +
                        '</div></div>'
                    ); // Add input box
                }
                // Run autoInit with noop to suppress warnings.
                mdc.autoInit(document, () => {});
            });

            poiImgDetailsWrapper.on("click",".remove_field", function(e) { // User click on remove text
                e.preventDefault();
                jQuery(this).parent('div').parent('div').parent('div').remove();
                i--;
            });

            // Color picker based on sliders
            jQuery( "#fluidColorRedSlider, #fluidColorGreenSlider, #fluidColorBlueSlider" ).slider({
                orientation: "horizontal",
                range: "min",
                max: 255,
                value: 127,
                change: refreshSwatch,
                slide: refreshSwatch,
                stop: refreshSwatch
            });

            jQuery( "#fluidColorAlphaSlider" ).slider({
                orientation: "horizontal",
                range: "min",
                max: 1,
                value: 1,
                step: 0.01,
                change: refreshSwatch,
                slide: refreshSwatch,
                stop: refreshSwatch
            });

            jQuery( "#fluidColorRedSlider" ).slider( "value", 255 );
            jQuery( "#fluidColorGreenSlider" ).slider( "value", 140 );
            jQuery( "#fluidColorBlueSlider" ).slider( "value", 60 );

            function refreshSwatch() {
                var red = jQuery( "#fluidColorRedSlider" ).slider( "value" ),
                    green = jQuery( "#fluidColorGreenSlider" ).slider( "value" ),
                    blue = jQuery( "#fluidColorBlueSlider" ).slider( "value" ),
                    alpha = jQuery( "#fluidColorAlphaSlider" ).slider( "value" ),
                    color = [red, green, blue, alpha ];

                jQuery('#fluidColorRedVal').val(red);
                jQuery('#fluidColorGreenVal').val(green);
                jQuery('#fluidColorBlueVal').val(blue);
                jQuery('#fluidColorAlphaVal').val(alpha);

                jQuery( "#fluidColorPreview" ).css( "background-color", "rgba(" + color +");");

                document.getElementById('moleculeFluidColorVal').value = "["+color+"]".toString();
            }

        });

        jQuery("#poiImgFeaturedImgInput").change(function() {
            wpunity_read_url(this, "#poiImgFeaturedImgPreview");
        });

        jQuery("#poiVideoFeaturedImgInput").change(function() {
            wpunity_read_url(this, "#poiVideoFeaturedImgPreview");
        });


        function wpunity_create_model_sshot(wu_webw_3d_view_local) {

            //console.log(wu_webw_3d_view_local.canvas.toDataURL("image/jpeg"));

            wu_webw_3d_view_local.render();

            // I used html2canvas because there is no toDataURL in labelRenderer so there were no labels in the initial
            // implementation
            html2canvas(document.querySelector("#wrapper_3d_inner")).then(canvas => {

                //document.getElementById("sshotFileInputContainer").appendChild(canvas)
                //document.body.appendChild(canvas)
                document.getElementById("sshotPreviewImg").src = canvas.toDataURL("image/jpeg");
            document.getElementById("sshotFileInput").value = canvas.toDataURL("image/jpeg");

        });
        }

        function wpunity_reset_sshot_field() {
            document.getElementById("sshotPreviewImg").src = sshotPreviewDefaultImg;
            document.getElementById("sshotFileInput").value = "";
            /*createScreenshotBtn.hide();*/
            /*jQuery("#objectPreviewTitle").hide();*/
        }

        function loadFileInputLabel() {
            var objectType = jQuery('input[name=objectTypeRadio]:checked').val();
            var inputLabel = document.getElementById('fileUploadInputLabel');
            var input = document.getElementById('fileUploadInput');
            if (objectType === 'pdb') {
                inputLabel.innerHTML = 'Select a pdb file';
                input.accept = ".pdb";
            } else {
                inputLabel.innerHTML = 'Or select an a) obj, b) mtl, & c) optional texture file';
                input.accept = ".obj,.mtl,.jpg,.png";
            }
        }

    </script>

<?php  get_footer(); ?>