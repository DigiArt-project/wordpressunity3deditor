<?php

function wpunity_get_all_molecules_of_game($project_id){

	$game_post = get_post($project_id);
	$gameSlug = $game_post->post_name;
	$assetPGame = get_term_by('slug', $gameSlug, 'wpunity_asset3d_pgame');
	$assetPGameID = $assetPGame->term_id;

	$moleculesIds = array();

	// Define custom query parameters
	$custom_query_args = array(
		'post_type' => 'wpunity_asset3d',
		'posts_per_page' => -1,
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'wpunity_asset3d_pgame',
				'field'    => 'term_id',
				'terms'    => $assetPGameID,
			),
			array(
				'taxonomy' => 'wpunity_asset3d_cat',
				'field'    => 'slug',
				'terms'    => 'molecule',
			),
		),
		'orderby' => 'ID',
		'order' => 'DESC',
	);

	$custom_query = new WP_Query( $custom_query_args );

	// Output custom query loop
	if ( $custom_query->have_posts() ) {
		while ($custom_query->have_posts()) {
			$custom_query->the_post();
			$molecule_id = get_the_ID();
			$molecule_title = get_the_title();

			$moleculesIds[] = ['moleculeID'=>$molecule_id, 'moleculeName'=>$molecule_title ];
		}
	}

	wp_reset_postdata();
	$wp_query = NULL;

	return $moleculesIds;
}

function wpunity_get_all_doors_of_game_fastversion($allScenePGameID){

	$sceneIds = [];

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
	);

	$custom_query = new WP_Query( $custom_query_args );

	$doorInfoGathered = [];

	// Output custom query loop
	if ( $custom_query->have_posts() ) {
		while ($custom_query->have_posts()) {
			$custom_query->the_post();

			$scene_id = get_the_ID();
			$sceneTitle = get_the_title();  // get_post($scene_id)->post_title;

			$scene_json = get_post_meta($scene_id, 'wpunity_scene_json_input', true);
			$jsonScene = htmlspecialchars_decode($scene_json);
			$sceneJsonARR = json_decode($jsonScene, TRUE);

			if (count($sceneJsonARR['objects']) > 0)
				foreach ($sceneJsonARR['objects'] as $key => $value) {
					if ($key !== 'avatarYawObject') {
						if ($value['categoryName'] === 'Door') {
							$doorInfoGathered[] = ['door' => $value['doorName_source'], 'scene' => $sceneTitle];
						}
					}
				}
		}
	}

	wp_reset_postdata();
	$wp_query = NULL;

	return $doorInfoGathered;
}
/**
 *
 * Get all door info for all scenes of a game
 *
 * @param $gameId
 * @return array
 */
function wpunity_get_all_doors_of_game($gameId)
{
	$scenesIds = wpunity_get_all_sceneids_of_game($gameId);

	$doorInfoGathered = array();

	foreach ($scenesIds as $scene_id){

		$sceneTitle = get_post($scene_id)->post_title;

		$scene_json = get_post_meta($scene_id, 'wpunity_scene_json_input', true);
		$jsonScene = htmlspecialchars_decode($scene_json);
		$sceneJsonARR = json_decode($jsonScene, TRUE);

		if(count($sceneJsonARR['objects'])>0)
			foreach ($sceneJsonARR['objects'] as $key => $value) {
				if ($key !== 'avatarYawObject') {
					if ($value['categoryName'] === 'Door') {
						$doorInfoGathered[] = ['door'=>$value['doorName_source'], 'scene'=>$sceneTitle ];
					}
				}
			}
	}
	return $doorInfoGathered;
}
/**
 *
 * Get all scene ids of a game
 *
 * @param $allScenePGameID
 * @return array
 */
function wpunity_get_all_sceneids_of_game($allScenePGameID){

	$sceneIds = [];

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
	);

	$custom_query = new WP_Query( $custom_query_args );



	// Output custom query loop
	if ( $custom_query->have_posts() )
		while ( $custom_query->have_posts() ) {
			$custom_query->the_post();
			$scene_id = get_the_ID();
			$sceneIds[] = $scene_id;
		}

	return $sceneIds;
}

function wpunity_create_asset_frontend($assetPGameID,$assetCatID,$assetTitleForm,$assetDescForm,$gameSlug){
	$asset_taxonomies = array(
		'wpunity_asset3d_pgame' => array(
			$assetPGameID,
		),
		'wpunity_asset3d_cat' => array(
			$assetCatID,
		)
	);

	$asset_information = array(
		'post_title' => $assetTitleForm,
		'post_content' => $assetDescForm,
		'post_type' => 'wpunity_asset3d',
		'post_status' => 'publish',
		'tax_input' => $asset_taxonomies,
	);

	$asset_id = wp_insert_post($asset_information);
	update_post_meta($asset_id, 'wpunity_asset3d_pathData', $gameSlug);

	if($asset_id){return $asset_id;}else{return 0;}
}

function wpunity_update_asset_frontend($asset_inserted_id,$assetTitleForm,$assetDescForm){
	$asset_new_info = array(
		'ID' => $asset_inserted_id,
		'post_title' => $assetTitleForm,
		'post_content' => $assetDescForm,
	);

	wp_update_post($asset_new_info);
	return 1;
}

function wpunity_create_asset_consumerExtra_frontend($asset_newID){
	//Energy Consumption
	$safe_cons_values = range(0, 2000, 5);
	$safe_cons_values2 = range(0, 1000, 5);

	$energyConsumptionMinValForm = intval($_POST['energyConsumptionMinVal']);
	$energyConsumptionMaxValForm = intval($_POST['energyConsumptionMaxVal']);
	$energyConsumptionMeanValForm = intval($_POST['energyConsumptionMeanVal']);
	$energyConsumptionVarianceValForm = intval($_POST['energyConsumptionVarianceVal']);

	if (!in_array($energyConsumptionMinValForm, $safe_cons_values, true)) {$energyConsumptionMinValForm = '';}
	if (!in_array($energyConsumptionMaxValForm, $safe_cons_values, true)) {$energyConsumptionMaxValForm = '';}
	if (!in_array($energyConsumptionMeanValForm, $safe_cons_values, true)) {$energyConsumptionMeanValForm = '';}
	if (!in_array($energyConsumptionVarianceValForm, $safe_cons_values2, true)) {$energyConsumptionVarianceValForm = '';}

	$energyConsumption = array('min' => $energyConsumptionMinValForm, 'max' => $energyConsumptionMaxValForm, 'mean' => $energyConsumptionMeanValForm, 'var' => $energyConsumptionVarianceValForm);

	update_post_meta($asset_newID, 'wpunity_energyConsumption', $energyConsumption);
}

function wpunity_create_asset_terrainExtra_frontend($asset_newID){
	$underPowerIncomeValForm = floatval($_POST['underPowerIncomeVal']);
	$correctPowerIncomeValForm = floatval($_POST['correctPowerIncomeVal']);
	$overPowerIncomeValForm = floatval($_POST['overPowerIncomeVal']);
	$accessCostPenaltyForm = intval($_POST['accessCostPenalty']);
	$archProximityPenaltyForm = intval($_POST['archProximityPenalty']);
	$naturalReserveProximityPenaltyForm = intval($_POST['naturalReserveProximityPenalty']);
	$hiVoltLineDistancePenaltyForm = intval($_POST['hiVoltLineDistancePenalty']);
	$physicsWindMinValForm = intval($_POST['physicsWindMinVal']);
	$physicsWindMaxValForm = intval($_POST['physicsWindMaxVal']);
	$physicsWindMeanValForm = intval($_POST['physicsWindMeanVal']);
	$physicsWindVarianceValForm = intval($_POST['physicsWindVarianceVal']);

	//Income (in $)
	$safe_income_values = range(-5, 5, 0.5);
	if (!in_array($underPowerIncomeValForm, $safe_income_values, true)) {$underPowerIncomeValForm = '';}
	if (!in_array($correctPowerIncomeValForm, $safe_income_values, true)) {$correctPowerIncomeValForm = '';}
	if (!in_array($overPowerIncomeValForm, $safe_income_values, true)) {$overPowerIncomeValForm = '';}

	$energyConsumptionIncome = array('under' => $underPowerIncomeValForm, 'correct' => $correctPowerIncomeValForm, 'over' => $overPowerIncomeValForm);

	//Construction Penalties (in $)
	$safe_penalty_values = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	if (!in_array($accessCostPenaltyForm, $safe_penalty_values, true)) {$accessCostPenaltyForm = '';}
	if (!in_array($archProximityPenaltyForm, $safe_penalty_values, true)) {$archProximityPenaltyForm = '';}
	if (!in_array($naturalReserveProximityPenaltyForm, $safe_penalty_values, true)) {$naturalReserveProximityPenaltyForm = '';}
	if (!in_array($hiVoltLineDistancePenaltyForm, $safe_penalty_values, true)) {$hiVoltLineDistancePenaltyForm = '';}

	$constructionPenalties = array('access' => $accessCostPenaltyForm, 'arch' => $archProximityPenaltyForm, 'natural' => $naturalReserveProximityPenaltyForm, 'hiVolt' => $hiVoltLineDistancePenaltyForm);

	//Physics
	$safe_physics_values = range(0, 40, 1);
	$safe_physics_values2 = range(1, 100, 1);//for Wind Variance
	if (!in_array($physicsWindMinValForm, $safe_physics_values, true)) {$physicsWindMinValForm = '';}
	if (!in_array($physicsWindMaxValForm, $safe_physics_values, true)) {$physicsWindMaxValForm = '';}
	if (!in_array($physicsWindMeanValForm, $safe_physics_values, true)) {$physicsWindMeanValForm = '';}
	if (!in_array($physicsWindVarianceValForm, $safe_physics_values2, true)) {$physicsWindVarianceValForm = '';}

	$physicsValues = array('min' => $physicsWindMinValForm, 'max' => $physicsWindMaxValForm, 'mean' => $physicsWindMeanValForm, 'variance' => $physicsWindVarianceValForm);

	update_post_meta($asset_newID, 'wpunity_energyConsumptionIncome', $energyConsumptionIncome);
	update_post_meta($asset_newID, 'wpunity_physicsValues', $physicsValues);
	update_post_meta($asset_newID, 'wpunity_constructionPenalties', $constructionPenalties);
}

function wpunity_create_asset_producerExtra_frontend($asset_newID){
	$producerTurbineSizeValForm = intval($_POST['producerTurbineSizeVal']);
	$producerDmgCoeffValForm = floatval($_POST['producerDmgCoeffVal']);
	$producerCostValForm = intval($_POST['producerCostVal']);
	$producerRepairCostValForm = floatval($_POST['producerRepairCostVal']);
	$producerClassValForm = $_POST['producerClassVal'];
	$producerWindSpeedClassValForm = floatval($_POST['producerWindSpeedClassVal']);
	$producerMaxPowerValForm = floatval($_POST['producerMaxPowerVal']);
	$producerPowerProductionValForm = $_POST['producerPowerProductionVal'];

	//Producer Options-Costs
	$safe_opt_val = range(3, 250, 1);
	$safe_opt_dmg = range(0.001, 0.02, 0.001);
	$safe_opt_cost = range(1, 10, 1);
	$safe_opt_repaid = range(0.5, 5, 0.5);
	if (!in_array($producerTurbineSizeValForm, $safe_opt_val, true)) {$producerTurbineSizeValForm = '';}
	if (!in_array($producerDmgCoeffValForm, $safe_opt_dmg, true)) {$producerDmgCoeffValForm = '';}
	if (!in_array($producerCostValForm, $safe_opt_cost, true)) {$producerCostValForm = '';}
	if (!in_array($producerRepairCostValForm, $safe_opt_repaid, true)) {$producerRepairCostValForm = '';}

	$producerOptCosts = array('size' => $producerTurbineSizeValForm, 'dmg' => $producerDmgCoeffValForm, 'cost' => $producerCostValForm, 'repaid' => $producerRepairCostValForm);
	$producerOptGen = array('class' => $producerClassValForm, 'speed' => $producerWindSpeedClassValForm, 'power' => $producerMaxPowerValForm);

	update_post_meta($asset_newID, 'wpunity_producerPowerProductionVal', $producerPowerProductionValForm);
	update_post_meta($asset_newID, 'wpunity_producerOptCosts', $producerOptCosts);
	update_post_meta($asset_newID, 'wpunity_producerOptGen', $producerOptGen);
}

function wpunity_create_asset_poisITExtra_frontend($asset_newID){
	$asset_featured_imageForm =  $_POST['poi-img-featured-image'];

	$attachment_id = wpunity_upload_img( $asset_featured_imageForm, $asset_newID);
	set_post_thumbnail( $asset_newID, $attachment_id );
}

function wpunity_create_asset_poisVideoExtra_frontend($asset_newID){
	$asset_featured_imageForm =  $_POST['poi-video-featured-image'];
	$asset_videoForm = $_POST['videoFileInput'];

	$attachment_id = wpunity_upload_img( $asset_featured_imageForm, $asset_newID);
	set_post_thumbnail( $asset_newID, $attachment_id );

	$attachment_video_id = wpunity_upload_img( $asset_videoForm, $asset_newID);
	update_post_meta( $asset_newID, 'wpunity_asset3d_video', $attachment_video_id );
}

function wpunity_create_asset_moleculeExtra_frontend($asset_newID){
	$moleculeChemicalType = $_POST['moleculeChemicalType'];
	$moleculeFunctionalGroupInput = $_POST['moleculeFunctionalGroupInput'];
	$moleculeFluidViscosity = floatval($_POST['molecule-fluid-viscosity-slider-label']);
	$moleculeFluidColorVal = $_POST['moleculeFluidColorVal'];

	update_post_meta($asset_newID, 'wpunity_molecule_ChemicalTypeVal', $moleculeChemicalType);
	update_post_meta($asset_newID, 'wpunity_molecule_FunctionalGroupVal', $moleculeFunctionalGroupInput);
	update_post_meta($asset_newID, 'wpunity_molecule_FluidViscosityVal', $moleculeFluidViscosity);
	update_post_meta($asset_newID, 'wpunity_molecule_FluidColorVal', $moleculeFluidColorVal);

}

function wpunity_create_asset_3DFilesExtra_frontend($asset_newID, $assetTitleForm, $gameSlug){

	$totalTextures = 0; //counter in order to know how much textures we have
    $textureNamesIn = [];
    $tContent = [];
	foreach(array_keys($_POST['textureFileInput']) as $texture){
	    $tname = str_replace('.jpg','', $texture);

        $tContent[$tname] = $_POST['textureFileInput'][$texture];
        $textureNamesIn[] = $tname;
	}
	//print_r(array_keys($_POST['textureFileInput']));die;
	//$textureContent = $_POST['textureFileInput'];
	$screenShotFile = $_POST['sshotFileInput'];
	$mtl_content = $_POST['mtlFileInput'];
	$obj_content = $_POST['objFileInput'];

    // Remove this debugging piece of code in the end
    $fh = fopen("output_mtlContent.txt", "w");
    fwrite($fh, $mtl_content);
    fclose($fh);
    // - until here


    $textureNamesOut = [];

	for($i=0; $i < count($tContent); $i++) {

		$textureFile_id = wpunity_upload_Assetimg64(
            $tContent[$textureNamesIn[$i]],
         'texture_'.$textureNamesIn[$i].'_'.$assetTitleForm,
                $asset_newID,
                $gameSlug);

		$textureFile_filename = basename(get_attached_file($textureFile_id));

        $textureNamesOut[] = $textureFile_filename;

		add_post_meta( $asset_newID, 'wpunity_asset3d_diffimage', $textureFile_id );
		//update_post_meta($asset_newID, 'wpunity_asset3d_diffimage', $textureFile_id);
	}

	// MTL : Open mtl file and replace jpg filename
    for ($k = 0; $k < count($textureNamesIn); $k++) {
        $mtl_content = str_replace("map_Kd ".$textureNamesIn[$k].".jpg",
                                   "map_Kd ".$textureNamesOut[$k],
                                                    $mtl_content);
    }

	$mtlFile_id = wpunity_upload_AssetText($mtl_content, 'material'.$assetTitleForm, $asset_newID, $gameSlug);
	$mtlFile_filename = basename(get_attached_file($mtlFile_id));

	// OBJ
	$obj_content = preg_replace("/.*\b" . 'mtllib' . "\b.*\n/ui", "mtllib " . $mtlFile_filename . "\n", $obj_content);
	$objFile_id = wpunity_upload_AssetText($obj_content, 'obj'.$assetTitleForm, $asset_newID, $gameSlug);

	// SCREENSHOT
	$screenShotFile_id = wpunity_upload_Assetimg64($screenShotFile, $assetTitleForm, $asset_newID, $gameSlug);

	// Set value of attachment IDs at custom fields
	update_post_meta($asset_newID, 'wpunity_asset3d_mtl', $mtlFile_id);
	update_post_meta($asset_newID, 'wpunity_asset3d_obj', $objFile_id);
	//update_post_meta($asset_newID, 'wpunity_asset3d_diffimage', $textureFile_id);
	update_post_meta($asset_newID, 'wpunity_asset3d_screenimage', $screenShotFile_id);

}

function wpunity_create_asset_pdbFiles_frontend($asset_newID, $assetTitleForm, $gameSlug){
	$pdb_content = $_POST['pdbFileInput'];
	$screenShotFile = $_POST['sshotFileInput'];

	// PDB
	$pdbFile_id = wpunity_upload_AssetText($pdb_content, 'material'.$assetTitleForm, $asset_newID, $gameSlug);

	// SCREENSHOT
	$screenShotFile_id = wpunity_upload_Assetimg64($screenShotFile, $assetTitleForm, $asset_newID, $gameSlug);

	update_post_meta($asset_newID, 'wpunity_asset3d_pdb', $pdbFile_id);
	update_post_meta($asset_newID, 'wpunity_asset3d_screenimage', $screenShotFile_id);
}

/****************************************************************************************************/


add_action( 'admin_menu', 'wpunity_remove_menus', 999 );

function wpunity_remove_menus() {

// INSERT MENU ITEMS TO REMOVE FOR EVERYONE

	$current_user_id = get_current_user_id();

	//remove only for author and below
	if ( current_user_can('administrator') && $current_user_id != 1 ) {
		remove_menu_page('tools.php'); // Tools
		remove_menu_page('upload.php'); // Media
		remove_menu_page( 'edit-comments.php' ); // Comments
		remove_menu_page( 'edit.php' ); //Posts
		remove_menu_page( 'edit.php?post_type=page' ); //Pages
		remove_menu_page( 'plugins.php' ); //Plugins
		remove_menu_page( 'users.php' ); //Users
		remove_menu_page( 'themes.php' ); //Appearance

		remove_menu_page( 'options-general.php' ); //Appearance
		remove_menu_page( 'index.php' ); //dashboard

		remove_menu_page( 'duplicator' );
		remove_menu_page( 'geodirectory' );
		remove_menu_page( 'edit.php?post_type=gd_place' );

		remove_menu_page('wpcf7');

	}
}

//==========================================================================================================================================

function wpunity_upload_img($file = array(), $parent_post_id, $orientation = null) {

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

	$file_return = wp_handle_upload( $file, array('test_form' => false ) );

	if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
		return false;
	} else {

		$filename = $file_return['file'];

		$attachment = array(
			'post_mime_type' => $file_return['type'],
			'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content' => '',
			'post_status' => 'inherit',
			'guid' => $file_return['url']
		);
		$attachment_id = wp_insert_attachment( $attachment, $file_return['url'], $parent_post_id );
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		$attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );

		wp_update_attachment_metadata( $attachment_id, $attachment_data );

		if( 0 < intval( $attachment_id, 10 ) ) {
			return $attachment_id;
		}

	}
	return false;
}

function wpunity_upload_filter( $args  ) {

	$newdir =  '/Models';

	$args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
	$args['url']     = str_replace( $args['subdir'], '', $args['url'] );
	$args['subdir']  = $newdir;
	$args['path']   .= $newdir;
	$args['url']    .= $newdir;

	return $args;

}

function wpunity_upload_Assetimg($file = array(), $parent_post_id, $parentGameSlug) {

	add_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

	add_filter( 'upload_dir', 'wpunity_upload_filter');
	$file_return = wp_handle_upload( $file, array('test_form' => false ) );
	remove_filter( 'upload_dir', 'wpunity_upload_filter' );

	if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
		return false;
	} else {

		$filename = $file_return['file'];

		$attachment = array(
			'post_mime_type' => $file_return['type'],
			'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content' => '',
			'post_status' => 'inherit',
			'guid' => $file_return['url']
		);
		$attachment_id = wp_insert_attachment( $attachment, $file_return['url'], $parent_post_id );
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		$attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );

		wp_update_attachment_metadata( $attachment_id, $attachment_data );

		remove_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

		if( 0 < intval( $attachment_id, 10 ) ) {
			return $attachment_id;
		}

	}
	return false;
}


/**
 *
 * Immitation of $_FILE through $_POST . This works only for jpgs and pngs
 *
 * @param $imagefile
 * @param $imgTitle
 * @param $parent_post_id
 * @param $parentGameSlug
 * @return bool|int|WP_Error
 *
 */
function wpunity_upload_Assetimg64($imagefile, $imgTitle, $parent_post_id, $parentGameSlug) {

	add_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

	$upload_dir = wp_upload_dir();
	$upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

	$hashed_filename = md5( $imgTitle . microtime() ) . '_' . $imgTitle.'.png';

	$image_upload = file_put_contents($upload_path . $hashed_filename,
		base64_decode(substr($imagefile, strpos($imagefile, ",")+1)));

	// HANDLE UPLOADED FILE
	if( !function_exists( 'wp_handle_sideload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}

	// Without that I'm getting a debug error!?
	if( !function_exists( 'wp_get_current_user' ) ) {
		require_once( ABSPATH . 'wp-includes/pluggable.php' );
	}

	$file = array (
		'name'     => $hashed_filename,
		'type'     => 'image/png',
		'tmp_name' => $upload_path . $hashed_filename,
		'error'    => 0,
		'size'     => filesize( $upload_path . $hashed_filename ),
	);

	add_filter( 'upload_dir', 'wpunity_upload_filter');
	// upload file to server
	// @new use $file instead of $image_upload
	$file_return = wp_handle_sideload( $file, array( 'test_form' => false ) );
	remove_filter( 'upload_dir', 'wpunity_upload_filter' );

	$filename = $file_return['file'];

	$upload = wp_upload_dir();
	$upload_dir = $upload['basedir'];
	$upload_dir .= "/" . $parentGameSlug;
	$upload_dir .= "/" . 'Models';
	$upload_dir = str_replace('\\','/',$upload_dir);
	$attachment = array(
		'post_mime_type' => $file_return['type'],
		'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
		'post_content' => '',
		'post_status' => 'inherit',
		'guid' => $file_return['url']
	);


	$attachment_id = wp_insert_attachment( $attachment, $file_return['url'], $parent_post_id );


	require_once(ABSPATH . 'wp-admin/includes/image.php');
	$attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
	wp_update_attachment_metadata( $attachment_id, $attachment_data );


	remove_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	if( 0 < intval( $attachment_id, 10 ) ) {
		return $attachment_id;
	}

	/*$jsonReturn = array(
		'Status'  =>  'Success'
	);*/

	return false;
}



/**
 *
 * Immitation of $_FILE through $_POST . This is for objs and mtls
 *
 * @param $textContent
 * @param $textTitle
 * @param $parent_post_id
 * @param $parentGameSlug
 * @return bool|int|WP_Error
 *
 */
function wpunity_upload_AssetText($textContent, $textTitle, $parent_post_id, $parentGameSlug) {

	// Filters the image sizes automatically generated when uploading an image.
	add_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

	// Upload dir
	$upload_dir = wp_upload_dir();
	$upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

	$hashed_filename = md5( $textTitle . microtime() ) . '_' . $textTitle.'.txt';

	$image_upload = file_put_contents($upload_path.$hashed_filename, $textContent);
	//base64_decode(substr($textContent, strpos($textContent, ",")+1)));

	// HANDLE UPLOADED FILE
	if( !function_exists( 'wp_handle_sideload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}

	// Without that I'm getting a debug error!?
	if( !function_exists( 'wp_get_current_user' ) ) {
		require_once( ABSPATH . 'wp-includes/pluggable.php' );
	}

	$file = array (
		'name'     => $hashed_filename,
		'type'     => 'text/plain',
		'tmp_name' => $upload_path.$hashed_filename,
		'error'    => 0,
		'size'     => filesize( $upload_path.$hashed_filename ),
	);

	add_filter( 'upload_dir', 'wpunity_upload_filter');
	// upload file to server
	// @new use $file instead of $image_upload
	$file_return = wp_handle_sideload( $file, array( 'test_form' => false ) );
	remove_filter( 'upload_dir', 'wpunity_upload_filter' );

	$filename = $file_return['file'];

	$upload = wp_upload_dir();
	$upload_dir = $upload['basedir'];
	$upload_dir .= "/" . $parentGameSlug;
	$upload_dir .= "/" . 'Models';
	$upload_dir = str_replace('\\','/',$upload_dir);
	$attachment = array(
		'post_mime_type' => $file_return['type'],
		'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
		'post_content' => '',
		'post_status' => 'inherit',
		'guid' => $file_return['url']
	);

	$attachment_id = wp_insert_attachment( $attachment, $file_return['url'], $parent_post_id );

	require_once(ABSPATH . 'wp-admin/includes/image.php');
	$attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
	wp_update_attachment_metadata( $attachment_id, $attachment_data );

	remove_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	if( 0 < intval( $attachment_id, 10 ) ) {
		return $attachment_id;
	}

	return false;
}



//==========================================================================================================================================

function wpunity_remove_allthumbs_sizes( $sizes, $metadata ) {
	return [];
}

//==========================================================================================================================================

//FORCE TITLE ON OUR CUSTOM POST TYPES
function force_post_title_init(){
	wp_enqueue_script('jquery');
}

function force_post_title(){
	global $post;
	$post_type = get_post_type($post->ID);
	if($post_type == 'wpunity_asset3d' || $post_type == 'wpunity_scene' || $post_type == 'wpunity_game') {
		echo "<script type='text/javascript'>\n";
		echo "
            jQuery('#publish').click(function(){
            var testervar = jQuery('[id^=\"titlediv\"]')
            .find('#title');
            if (testervar.val().length < 1)
            {
                jQuery('[id^=\"titlediv\"]').css('background', '#F96');
                setTimeout(\"jQuery('#ajax-loading').css('visibility', 'hidden');\", 100);
                alert('TITLE is required');
                setTimeout(\"jQuery('#publish').removeClass('button-primary-disabled');\", 100);
                return false;
            }
  	    });
        ";
		echo "</script>\n";
	}
}

add_action('admin_init', 'force_post_title_init');
add_action('edit_form_advanced', 'force_post_title');

//==========================================================================================================================================

function wpunity_mediaLibrary_default() {
	?>
    <script type="text/javascript">
        jQuery(document).ready(function($){ wp.media.controller.Library.prototype.defaults.contentUserSetting=false; });
    </script>
	<?php
}

add_action( 'admin_footer-post-new.php', 'wpunity_mediaLibrary_default' );
add_action( 'admin_footer-post.php', 'wpunity_mediaLibrary_default' );

//==========================================================================================================================================

function wpunity_change_publish_button( $translation, $text ) {
	global $post;
	$post_type = get_post_type($post->ID);
	if($post_type == 'wpunity_asset3d' || $post_type == 'wpunity_scene' || $post_type == 'wpunity_game') {
		if ($text == 'Publish')
			return 'Create';
		if ($text == 'Update')
			return 'Save';
	}

	return $translation;
}

add_filter( 'gettext', 'wpunity_change_publish_button', 10, 2 );

//==========================================================================================================================================

function wpunity_aftertitle_info($post) {

	$post_type = get_post_type($post->ID);
	if($post_type == 'wpunity_game'){
		$gameSlug = $post->post_name;
//        $upload = wp_upload_dir();
//        $upload_dir = $upload['basedir'];
//        $upload_dir .= "/" . $gameSlug;
//        $upload_dir = str_replace('\\','/',$upload_dir);
		echo '<b>Slug:</b> ' . $gameSlug;
//        echo '<br/><b>Upload Folder:</b>' . $upload_dir;
	}
    elseif($post_type == 'wpunity_scene'){
		$sceneSlug = $post->post_name;
//        $terms = wp_get_post_terms( $post->ID, 'wpunity_scene_pgame');
//        $gameSlug = $terms[0]->slug;
//        $upload = wp_upload_dir();
//        $upload_dir = $upload['basedir'];
//        $upload_dir .= "/" . $gameSlug . "/" . $sceneSlug;
//        $upload_dir = str_replace('\\','/',$upload_dir);
		echo '<b>Slug:</b> ' . $sceneSlug;
//        echo '<br/><b>Upload Folder:</b>' . $upload_dir;
	}
    elseif($post_type == 'wpunity_asset3d'){
		$assetSlug = $post->post_name;
//        $upload = wp_upload_dir();
//        $upload_dir = $upload['basedir'];
//        $pathofPost = get_post_meta($post->ID,'wpunity_asset3d_pathData',true);
//        $upload_dir .= "/" . $pathofPost;
//        $upload_dir = str_replace('\\','/',$upload_dir);
		echo '<b>Slug:</b> ' . $assetSlug;
//        echo '<br/><b>Upload Folder:</b>' . $upload_dir;
	}

}

add_action( 'edit_form_after_title', 'wpunity_aftertitle_info' );

//==========================================================================================================================================

// ================ SEMANTICS ON 3D ============================================================

// ---- AJAX SEMANTICS 1: run segmentation ----------
function wpunity_segment_obj_action_callback() {

	$DS = DIRECTORY_SEPARATOR;
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {

		$curr_folder = wp_upload_dir()['basedir'].$DS.$_POST['path'];
		$curr_folder = str_replace('/','\\',$curr_folder); // full path

		$batfile = wp_upload_dir()['basedir'].$DS.$_POST['path']."segment.bat";


		$batfile = str_replace('/','\\',$batfile); // full path

		$fnameobj = basename($_POST['obj']);

		$fnameobj = $curr_folder.$fnameobj;

		// 1 : Generate bat
		$myfile = fopen($batfile, "w") or die("Unable to open file!");

		$outputpath = wp_upload_dir()['basedir'].$DS.$_POST['path'];
		$outputpath = str_replace('/','\\',$outputpath); // full path

		$exefile = untrailingslashit(plugin_dir_path(__FILE__)).'\..\semantics\segment3D\pclTesting.exe';
		$exefile = str_replace("/", "\\", $exefile);

		$iter = $_POST['iter'];
		$minDist = $_POST['minDist'];
		$maxDist = $_POST['maxDist'];
		$minPoints = $_POST['minPoints'];
		$maxPoints = $_POST['maxPoints'];
		//$exefile.' '.$fnameobj.' '.$iter.' 0.01 0.2 100 25000 1 '.$outputpath.PHP_EOL.

		$txt = '@echo off'.PHP_EOL.
		       $exefile.' '.$fnameobj.' '.$iter.' '.$minDist.' '.$maxDist.' '.$minPoints.' '.$maxPoints.' 1 '.$outputpath.PHP_EOL.
		       'del "*.pcd"'.PHP_EOL.
		       'del "barycenters.txt"';

		fwrite($myfile, $txt);
		fclose($myfile);

		shell_exec('del "'.$outputpath.'log.txt"');
		shell_exec('del "'.$outputpath.'cloud_cluster*.obj"');
		shell_exec('del "'.$outputpath.'cloud_plane*.obj"');

		// 2: run bat
		$output = shell_exec($batfile);
		echo $output;

	} else { // LINUX SERVER // TODO

//        $game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_linux'; //$_GET['game_dirpath'];
//
//        // 1 : Generate sh
//        $myfile = fopen($game_dirpath.$DS."starter_artificial.sh", "w") or print("Unable to open file!");
//        $txt = "#/bin/bash"."\n".
//            "projectPath=`pwd`"."\n".
//            "xvfb-run --auto-servernum --server-args='-screen 0 1024x768x24:32' /opt/Unity/Editor/Unity -batchmode -nographics -logfile stdout.log -force-opengl -quit -projectPath ${projectPath} -buildWindowsPlayer 'builds/myg3.exe'";
//        fwrite($myfile, $txt);
//        fclose($myfile);
//
//        // 2: run sh (nohup     '/dev ...' ensures that it is asynchronous called)
//        $output = shell_exec('nohup sh starter_artificial.sh'.'> /dev/null 2>/dev/null &');
	}

	wp_die();
}

//---- AJAX COMPILE 2: read compile stdout.log file and return content.
function wpunity_monitor_segment_obj_action_callback(){

	echo file_get_contents(pathinfo($_POST['obj'], PATHINFO_DIRNAME ).'/log.txt');

	wp_die();
}

//---- AJAX COMPILE 3: Enlist the split objs -------------
function wpunity_enlist_splitted_objs_action_callback(){

	$DS = DIRECTORY_SEPARATOR;
	$path = wp_upload_dir()['basedir'].$DS.$_POST['path'];

	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($path),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file) {
		// Skip directories (they would be added automatically)
		if (!$file->isDir() and pathinfo($file,PATHINFO_EXTENSION)=='obj')
		{
			echo "<a href='".wp_upload_dir()['baseurl']."/".$_POST['path'].basename($file)."' >".basename($file)."</a><br />";
		}
	}

	wp_die();
}

//======================= CONTENT INTERLINKING =========================================================================

function wpunity_fetch_description_action_callback(){

	if ($_POST['externalSource']=='Wikipedia')
		$url = 'https://'.$_POST['lang'].'.wikipedia.org/w/api.php?action=query&format=json&exlimit=3&prop=extracts&'.$_POST['fulltext'].'titles='.$_POST['titles'];
	else
		$url = 'https://www.europeana.eu/api/v2/search.json?wskey=8mfU6ZgfW&query='.$_POST['titles'];//.'&qf=LANGUAGE:'.$_POST['lang'];

	echo file_get_contents($url);

	wp_die();
}

function wpunity_fetch_image_action_callback(){

	if ($_POST['externalSource_image']=='Wikipedia')
		$url = 'https://'.$_POST['lang_image'].'.wikipedia.org/w/api.php?action=query&prop=imageinfo&format=json&iiprop=url&generator=images&titles='.$_POST['titles_image'];
	else
		$url = 'https://www.europeana.eu/api/v2/search.json?wskey=8mfU6ZgfW&query='.$_POST['titles_image'];//.'&qf=LANGUAGE:'.$_POST['lang_image'];

	echo file_get_contents($url);

	wp_die();
}

function wpunity_fetch_video_action_callback(){

	if ($_POST['externalSource_video']=='Wikipedia'){
		$url = 'https://'.$_POST['lang_video'].'.wikipedia.org/w/api.php?action=query&format=json&prop=videoinfo&viprop=derivatives&titles=File:'.$_POST['titles_video'].'.ogv';
	} else {
		$url = 'https://www.europeana.eu/api/v2/search.json?wskey=8mfU6ZgfW&query='.$_POST['titles_image'];//.'&qf=LANGUAGE:'.$_POST['lang_image'];
	}

	$content = file_get_contents($url);
	echo $content;

	wp_die();
}

//====================== GAME ASSEMBLY AND COMPILATION =================================================================

function wpunity_assepile_action_callback(){

	$DS = DIRECTORY_SEPARATOR;
	$os = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';

	$gameFormat = $_REQUEST['gameFormat'];

	switch($gameFormat){
		case 'platform-windows':
			$targetPlatform =  'StandaloneWindows'; //' -buildWindowsPlayer "builds'.$DS.'windows'.$DS.'mygame.exe"';
			break;
		case 'platform-mac':
			$targetPlatform = 'StandaloneOSXUniversal'; //' -buildOSXUniversalPlayer "builds'.$DS.'mac'.$DS.'mygame.app"';
			break;
		case 'platform-linux':
			$targetPlatform = 'StandaloneLinux'; // ' -buildOSXUniversalPlayer "builds'.$DS.'linux"';
			break;
		case 'platform-web':
			$targetPlatform =  'WebGL'; //' -executeMethod WebGLBuilder.build';
			break;
		default:
			echo "you must select an output format";
			wp_die();
			break;
	}

    $gameId = $_REQUEST['gameId'];
    $gameType = wp_get_post_terms( $gameId, 'wpunity_game_type' );


    $assemply_success = wpunity_assemble_the_unity_game_project($gameId, $_REQUEST['gameSlug'], $targetPlatform, $gameType[0]->name);

    //wp_die();

	// Wait 4 seconds to erase previous project before starting compiling the new one
	// to avoiding erroneously take previous files. This is not safe with sleep however.
	// Do not delete library folder if it takes too long
	sleep(4);

	if ($assemply_success == 'true') {

		$init_gcwd = getcwd(); // get cwd (wp-admin probably)
		//-----------------------------

		//--Uploads/myGameProjectUnity--
		$upload_dir = wp_upload_dir()['basedir'];
		$upload_dir = str_replace('\\','/',$upload_dir);
		$game_dirpath = $upload_dir . '/' . $_REQUEST['gameSlug'] . 'Unity';

		if ($os === 'win') {
			$os_bin = 'bat';
			$txt = '@echo off'."\n"; // change line always with double quote
			$txt .= 'call :spawn "C:\Program Files\Unity\Editor\Unity.exe" -quit -batchmode -logFile '.$game_dirpath.'\stdout.log -projectPath '. $game_dirpath . ' -executeMethod HandyBuilder.build';

			$txt .= "\n";
			$txt .= 'ECHO %PID%';
			$txt .= "\n";
			$txt .= 'exit'; // exit command useful for not showing again the command prompt
			$txt .= "\n";
			$txt .= '
:spawn command args
:: sets %PID% on completion
@echo off
setlocal
set "PID="
set "return="
set "args=%*"
set "args=%args:\=\\%"

for /f "tokens=2 delims==;" %%I in (
    \'wmic process call create "%args:"=\"%" ^| find "ProcessId"\'
) do set "return=%%I"

endlocal & set "PID=%return: =%"
goto :EOF
@echo on';

			$compile_command = 'start /b '.$game_dirpath.$DS.'starter_artificial.bat /c';

		} else { // LINUX SERVER
			$os_bin = 'sh';
			$txt = "#/bin/bash"."\n".
			       "projectPath=`pwd`"."\n".
			       "xvfb-run --auto-servernum --server-args='-screen 0 1024x768x24:32' /opt/Unity/Editor/Unity ".
			       "-batchmode -nographics -logfile stdout.log -force-opengl -quit -projectPath \${projectPath} -executeMethod HandyBuilder.build";// " -executeMethod HandyBuilder.build";  //;  //. ; "-buildWindowsPlayer ' build/mygame.exe'"; //

			// 2: run sh (nohup     '/dev ...' ensures that it is asynchronous called)
			$compile_command = 'nohup sh starter_artificial.sh> /dev/null 2>/dev/null & echo $! >>pid.txt';
		}

		// 1 : Generate bat or sh
		$myfile = fopen($game_dirpath.$DS."starter_artificial.".$os_bin, "w") or die("Unable to open file!");
		fwrite($myfile, $txt);
		fclose($myfile);
		chmod($game_dirpath.$DS."starter_artificial.".$os_bin, 0755);

		chdir($game_dirpath);

		if ($os === 'win') {
			$unity_pid = shell_exec($compile_command);
			$fga = fopen("output2.txt", "w");
			fwrite($fga, $compile_command);
			fclose($fga);
		} else {
			$res = putenv("HOME=/home/jimver04");
			shell_exec($compile_command);
			$fpid = fopen("pid.txt","r");
			$unity_pid = fgets($fpid);
			fclose($fpid);
		}
		//---------------------------------------
		chdir($init_gcwd);

		echo $unity_pid;
	}

	wp_die();
}


//---- AJAX MONITOR: read compile stdout.log file and return content.
function wpunity_monitor_compiling_action_callback(){
	$DS = DIRECTORY_SEPARATOR;

	$os = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';

	// Monitor stdout.log
	$stdoutSTR = file_get_contents($game_dirpath = $_POST['dirpath'].$DS."stdout.log");

	if ($os === 'lin') {


		//pid is the sh process id. First get the xvfbrun process ID
		$phpcomd1  = exec ("ps -ef | grep Unity | awk ' $3 == \"".$_POST['pid']."\" {print $2;}';");

		// from the xvfbrun process ID get the Unity process ID
		$phpcomd2 = exec("ps -ef | grep Unity | awk -v myvar=".$phpcomd1." '$3==myvar {print $2;}';");

		$processUnityCSV = exec('ps --no-headers -p ' . $phpcomd2 . ' -o size'); // ,%cpu

		// Write to wp-admin dir the shell_exec cmd result
//        $hf = fopen('output.txt', 'w');
//        fwrite($hf, $phpcomd1);
//        fwrite($hf, $phpcomd2);
//        fclose($hf);

		$processUnityCSV = round(((float)($processUnityCSV))/1000,0);

		if ($processUnityCSV==0)
			$processUnityCSV = "";
		else
			$processUnityCSV = "".$processUnityCSV."";


	} else {
		//$phpcomd = 'TASKLIST /FI "imagename eq Unity.exe" /v /fo CSV';
		$phpcomd = 'TASKLIST /FI "pid eq '.$_POST['pid'].'" /v /fo CSV';
		$processUnityCSV = exec($phpcomd);
	}

	echo json_encode(array('os'=> $os, 'CSV' => $processUnityCSV , "LOGFILE"=>$stdoutSTR));

	wp_die();
}


//---- AJAX KILL TASK: KILL COMPILE PROCESS ------
function wpunity_killtask_compiling_action_callback(){
	$DS = DIRECTORY_SEPARATOR;

	$os = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';

	if ($os === 'lin') {
		//pid is the sh process id. First get the xvfbrun process ID
		$phpcomd  = "xvfbrun_ID=$(ps -ef | grep Unity | awk ' $3 == \"".$_POST['pid']."\" {print $2;}');";

		// from the xvfbrun process ID get the Unity process ID
		$phpcomd .= "unity_pid=$(ps -ef | grep Unity | awk -v myvar=\"\$xvfbrun_ID\" '$3==myvar {print $2;}');";

		// kill Unity
		$phpcomd .= "kill `echo \"\$unity_pid\"`";
		$killres = exec($phpcomd);

	}else {
		$phpcomd = 'Taskkill /PID '.$_POST['pid'].' /F';
		$killres = exec($phpcomd);
	}

	echo $killres;
	wp_die();
}



//---- AJAX COMPILE 3: Zip the builds folder ---
function wpunity_game_zip_action_callback()
{
	$DS = DIRECTORY_SEPARATOR;

	// TEST
	//$game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_windows';

	// Real
	$game_dirpath = $_POST['dirpath']; //realpath(dirname(__FILE__).'/..').$DS.'games_assemble'.$DS.'dune';

	$rootPath = realpath($game_dirpath) . '/builds';
	$zip_file = realpath($game_dirpath) . '/game.zip';

	// Initialize archive object
	$zip = new ZipArchive();
	$resZip = $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	if ($resZip === TRUE) {

		// Create recursive directory iterator
		/** @var SplFileInfo[] $files */
		$files = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($rootPath),
			RecursiveIteratorIterator::LEAVES_ONLY
		);

		foreach ($files as $name => $file) {
			// Skip directories (they would be added automatically)
			if (!$file->isDir()) {
				// Get real and relative path for current file
				$filePath = $file->getRealPath();
				$relativePath = substr($filePath, strlen($rootPath) + 1);

				// Add current file to archive
				$zip->addFile($filePath, $relativePath);
			}
		}

		// Zip archive will be created only after closing object
		$zip->close();
		echo 'Zip successfully finished [2]';
		wp_die();
	} else {
		echo 'Failed to zip, code:' . $resZip;
		wp_die();
	}
}


// NEW ASSEMBLY FUNCTIONS OF JULY 2017


// -- Append scene paths in EditorBuildSettings.asset file --
// $filepath : The path of the already written EditorBuildSettings.asset file
// $scenepath : The scene to add as path : "Assets/scenes/S_Settings.unity"
function wpunity_append_scenes_in_EditorBuildSettings_dot_asset($filepath, $scenepath){

	//a. open file for append
	$fhandle = fopen($filepath, "a");

	//b. create what to append
	$newcontent = "  - enabled: 1".chr(10)."    path: ".$scenepath.chr(10);

	//c. append and close
	fwrite($fhandle, $newcontent);
	fclose($fhandle);

	//d. read test
	//    $fhandle = fopen($filepath, "r");
	//    echo fread($fhandle, filesize($filepath));
}



/* Create an empty WebGLBuilder.cs in a certain $filepath */
function wpunity_createEmpty_HandyBuilder_cs($filepath, $targetPlatform){

	$handle = fopen($filepath, 'w');

	$targetFileFormat = ''; // WebGL and Linux are blank

	switch($targetPlatform)
	{
		case 'StandaloneWindows':
			$targetFileFormat =  'mygame.exe'; //' -buildWindowsPlayer "builds'.$DS.'windows'.$DS.'mygame.exe"';
			break;
		case 'StandaloneOSXUniversal':
			$targetFileFormat = 'mygame.app'; //' -buildOSXUniversalPlayer "builds'.$DS.'mac'.$DS.'mygame.app"';
			break;
	}







	$content = 'using UnityEngine;
using UnityEditor;
using System.IO;
using System;
	
class HandyBuilder {
static void build() {
        

        Debug.Log("Hi jimverinko");
        // AddAssetsToImportHere

        string[] scenes = { // AddScenesHere
}; 
        
        string pathToDeploy = "builds/'.$targetPlatform.'/'.$targetFileFormat.'";		
                
        BuildPipeline.BuildPlayer(scenes, pathToDeploy, BuildTarget.'.$targetPlatform.', BuildOptions.None);
    }
}';

	fwrite($handle, $content);
	fclose($handle);
}


// Add  assets (obj) for import
//    $assetpath = "Assets/models/building1/building1.obj"
// or scenes for compile
//    $scenepath = "Assets/scenes/S_SceneSelector.unity"
// to
//    WebGLBuilder.cs
function wpunity_add_in_HandyBuilder_cs($filepath, $assetpath, $scenepath){

	$LF = chr(10); // line change

	if ($assetpath){
		//add assets (obj)

		// Clear previous size of filepath
		clearstatcache();

		// a. Read
		$handle = fopen($filepath, 'r');
		$content = fread($handle, filesize($filepath));
		fclose($handle);


		$smartline =  '   AssetDatabase.ImportAsset("'.$assetpath.'", ImportAssetOptions.Default);'; // .$LF.
//                      '   Debug.Log("SMARTSEE: '.$assetpath.'");' .$LF.
//                      '   Debug.Log("SM25" + AssetDatabase.AssetPathToGUID("'.$assetpath.'"));';


//		$smartline=
//       'assetFile = "'.$assetpath.'";'.$LF.'
//		assetFileMeta = assetFile + ".meta"; '.$LF.'
//		linesBefore = System.IO.File.ReadAllLines(assetFileMeta);'.$LF.'
//		php_gui_line = linesBefore[1];'.$LF.'
//		Debug.Log("php_gui_line" + php_gui_line);'.$LF.'
//		AssetDatabase.ImportAsset( assetFile, ImportAssetOptions.Default); '.$LF.'
//		linesAfter = System.IO.File.ReadAllLines( assetFileMeta);'.$LF.'
//		linesAfter[1] = php_gui_line;'.$LF.'
//		Debug.Log("linesAfter:" + linesAfter);'.$LF.'
//		System.IO.File.WriteAllLines( assetFileMeta, linesAfter);'.$LF;

		// b. add obj
		$content = str_replace('// AddAssetsToImportHere',
            '// AddAssetsToImportHere'.$LF.
            $smartline,
            $content
		);

		// c. Write to file
		$fhandle = fopen($filepath, 'w');
		fwrite($fhandle, $content, strlen($content));
		fclose($fhandle);

//    // d. Read for testing
//    clearstatcache();
//    $handle = fopen($filepath, 'r');
//    echo fread($handle, filesize($filepath));
//    fclose($handle);
	}


	if ($scenepath){

		// Clear previous size of filepath
		clearstatcache();

		// a. Read
		$handle = fopen($filepath, 'r');
		$content = fread($handle, filesize($filepath));
		fclose($handle);


		$scenewebgl = '          "'.$scenepath.'",'.chr(10).'// AddScenesHere '            ;

		// b. Extend certain string
		$content = str_replace('// AddScenesHere', $scenewebgl, $content);

		// first comma remove
		$content = str_replace(','.chr(10).'}','}', $content);

		// c. Write to old
		$fhandle = fopen($filepath, 'w');

		fwrite($fhandle, $content, strlen($content));
		fclose($fhandle);

		//  d. Read for testing
		//    $handle = fopen($filepath, 'r');
		//    echo fread($handle, strlen($content));
		//    fclose($handle);
	}
}


function wpunity_save_scene_async_action_callback()
{
	// put meta in scene. True, false, or id of meta if does not exist
	$res = update_post_meta( $_POST['scene_id'], 'wpunity_scene_json_input', wp_unslash($_POST['scene_json']) );

	$attachment_id = wpunity_upload_Assetimg64($_POST['scene_screenshot'], 'scene_'.$_POST['scene_id'].'_featimg',
		$_POST['scene_id'], get_post($_POST['scene_id'])->post_name );

	set_post_thumbnail( $_POST['scene_id'], $attachment_id );


	$scene_new_info = array(
		'ID' => $_POST['scene_id'],
		'post_title' => $_POST['scene_title'],
		'post_content' => $_POST['scene_description']
	);

	wp_update_post($scene_new_info);




	echo $res ? 'true' : 'false';
	wp_die();
}

/**
 *   This function is for compiling the \test_compiler\game_windows  project
 */
function fake_compile_for_a_test_project()
{
	// 1. Start the compile
	$gcwd = getcwd(); // get cwd (wp-admin probably)

	chdir("../wp-content/plugins/wordpressunity3deditor/test_compiler/game_windows/");

	// Windows
	$output = shell_exec('start /b starter.bat /c');

	// WebGL
	//$output = shell_exec('start /b starterWebGL.bat /c');

	// go back to previous directory (wp-admin probably)
	chdir($gcwd);

	// Write to wp-admin dir the shell_exec cmd result
	$h = fopen('output.txt', 'w');
	fwrite($h, $output);
	fclose($h);
}




//// ---- OLD AJAX ASSEMBLE : DO NOT DELETE UNTIL WE FINISH LINUX server ------
//function wpunity_assemble_action_callback() {
//
//    $DS = DIRECTORY_SEPARATOR;
//    // Windows or Linux server variable
//    $os = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';
//
//    // Check if target folder exist from a previous assemble
//    $target_exists = file_exists ( $_POST['target'] );
//    echo '1. Target Folder exists? '.($target_exists?'true':'false');
//
//    // if exists then remove the whole game target folder
//    if ($target_exists) {
//        //echo '<br /><span>Removing:' . $_POST['target'] . '</span><br />';
//        shell_exec($os === 'win' ? 'rmdir /s/q ' . $_POST['target'] : 'rm -rf '. $_POST['target']);
//
//        if (file_exists($_POST['target'])) {
//            echo '<span style="color:yellowgreen"><br />Delete: Can not delete. Used by another process? Skipping delete, I will overwrite.</span>';
//        }else
//            echo '<br />2. Deleted target folder: Success';
//    }
//
//    shell_exec('mkdir '. ($os==='lin'?'--parents':'')  . ' '.$_POST['target']);
//
//    echo '<br />3. Create target folder: '.(file_exists ( $_POST['target'] )?'Success':'Error 5');
//
//    // Copy the pre-written windows game libraries. The same are working for linux as well.
//    if ($os === 'win')
//        $copy_command = 'xcopy /s /Q '.$_POST['game_libraries_path'].$DS.'windows '.$_POST['target'];
//    else
//        $copy_command = 'cp --verbose -rf '.$_POST['game_libraries_path'].$DS.'windows'.$DS.'. '.$_POST['target'];
//
//    $res_copy = shell_exec($copy_command);
//
//    echo '<br />4. Copy unity3d libraries: '. ($os==='win'?$res_copy: ($res_copy==0?'Success':'Failure 15'));
//
//    //------ Modify /ProjectSettings/EditorBuildSettings.asset and Main_Menu.cs to include all scenes ---
//    $scenes_Arr = wpunity_getAllscenes_unityfiles_byGame($_POST['game_id']);
//
//    // === Assets/General_Scripts/Menu_Script.cs =====
//    $path_cs_MainMenu = $_POST['target']."/Assets/General_Scripts/Menu_Script.cs";
//
//    // first read content
//    $fhandle = fopen($path_cs_MainMenu, "r");
//    $fcontents_cs_MainMenu = fread($fhandle, filesize($path_cs_MainMenu));
//    fclose($fhandle);
//
//    //echo htmlspecialchars($fcontents_cs_MainMenu);
//
//    // then write
//    $fhandle = fopen($path_cs_MainMenu, "w");
//    $fcontents_cs_MainMenu = str_replace(['___[mainmenu_scene_basename]___',
//        '___[initialwonderaround_scene_basename]___',
//        '___[options_scene_basename]___',
//        '___[credentials_scene_basename]___'],
//        [
//            basename($scenes_Arr[0][sceneUnityPath],".unity"),
//            basename($scenes_Arr[1][sceneUnityPath],".unity"),
//            basename($scenes_Arr[2][sceneUnityPath],".unity"),
//            basename($scenes_Arr[3][sceneUnityPath],".unity")
//        ],
//        $fcontents_cs_MainMenu);
//
//    //echo htmlspecialchars($fcontents_cs_MainMenu);
//
//    fwrite($fhandle, $fcontents_cs_MainMenu);
//    fclose($fhandle);
//
//    // === EditorBuildSettings.asset ===
//
//    // replace
//    $needle_str ='  m_Scenes: []'.chr(10);
//
//    // with
//    $target_str= '  m_Scenes:'.chr(10);
//
//    foreach ($scenes_Arr as $cs)
//        $target_str .= '  - enabled: 1' . chr(10) .
//            '    path: '.$cs['sceneUnityPath']  . chr(10);
//
//
//    //  Possible bug is the LF character in the end of lines
//    echo '<br />5. Include Scenes in EditorBuildSettings.asset: ';
//
//    $path_eba = $_POST['target']."/ProjectSettings/EditorBuildSettings.asset";
//
//    // first read
//    $fhandle = fopen($path_eba, "r");
//    $fcontents = fread($fhandle, filesize($path_eba));
//    fclose($fhandle);
//
//    // then write
//    $fhandle = fopen($path_eba, "w");
//    $fcontents = str_replace($needle_str, $target_str, $fcontents);
//    fwrite($fhandle, $fcontents);
//    fclose($fhandle);
//
//    echo '<span style="font-size:8pt"><pre>'.$fcontents.'</pre></span>';
//
//    // Copy source assets to target assets
//    if ($os === 'win')
//        $copy_assets_command = 'xcopy /s /Q '.$_POST['source'].' '.$_POST['target'].$DS.'Assets';
//    else
//        $copy_assets_command = 'cp -rf '.$_POST['source'].$DS.'. '.$_POST['target'].$DS.'Assets';
//
//    $res_copy_assets = shell_exec($copy_assets_command);
//
//    echo '<br />6. Copy Game Instance Assets to target Assets: '. ($os==='win'?$res_copy_assets:($res_copy_assets==0?'Success':'Failure 16'));
//    echo '<br /><br /> Finished assemble';
//
//    wp_die();
//}


// OLD COMPILE: DO NOT DELETE

//// ---- AJAX COMPILE 1: compile game, i.e. make a bat file and run it
//function wpunity_compile_action_callback() {
//	$DS = DIRECTORY_SEPARATOR;
//
//	// TEST PHASE
//	//$game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_windows'; //$_GET['game_dirpath'];
//	// TEST PHASE
//	//$game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_linux'; //$_GET['game_dirpath'];
//
//	// REAL
//	$game_dirpath = $_POST['dirpath']; //  realpath(dirname(__FILE__).'/..').$DS.'games_assemble'.$DS.'dune';
//	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//		$os_bin = 'bat';
//		$txt = '"C:\Program Files\Unity\Editor\Unity.exe" -quit -batchmode -logFile '.
//		       $game_dirpath.'\stdout.log -projectPath '. $game_dirpath .' -buildWindowsPlayer "builds\mygame.exe"';
//
//		$compile_command = 'start /b '.$game_dirpath.$DS.'starter_artificial.bat /c';
//
//	} else { // LINUX SERVER
//		$os_bin = 'sh';
//		$txt = "#/bin/bash"."\n".
//		       "projectPath=`pwd`"."\n".
//		       "xvfb-run --auto-servernum --server-args='-screen 0 1024x768x24:32' /opt/Unity/Editor/Unity ".
//		       "-batchmode -nographics -logfile stdout.log -force-opengl -quit -projectPath \${projectPath} -buildWindowsPlayer 'builds/mygame.exe'";
//
//		// 2: run sh (nohup     '/dev ...' ensures that it is asynchronous called)
//		$compile_command = 'nohup sh starter_artificial.sh'.'> /dev/null 2>/dev/null &';
//	}
//
//	// 1 : Generate bat or sh
//	$myfile = fopen($game_dirpath.$DS."starter_artificial.".$os_bin, "w") or die("Unable to open file!");
//	fwrite($myfile, $txt);
//	fclose($myfile);
//	chmod($game_dirpath.$DS."starter_artificial.".$os_bin, 0755);
//
//
//	$os = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';
//
//	if ($os === 'lin'){
//		$init_workdir = getcwd();
//
//		chdir($game_dirpath);
//
//		//$handle = fopen($game_dirpath.$DS.'command.txt','w');
//		// 2: run bat or sh to compile the game
//		$output = shell_exec($compile_command);
//		chdir($init_workdir);
//
//		//fwrite($handle, getcwd() .PHP_EOL);
//		//fclose($handle);
//
//	} else {
//		// 2: run bat or sh to compile the game
//		$output = shell_exec($compile_command);
//	}
//
//	wp_die();
//}