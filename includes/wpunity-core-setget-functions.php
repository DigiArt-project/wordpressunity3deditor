<?php

function wpunity_getDefaultJSONscene($mygameType){

	$def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/assets/standard_scene.json");

	if($mygameType == 'energy') {
		$def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/assets/standard_scene_energy.json");
	}elseif($mygameType == 'chemistry'){
		$def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/assets/standard_scene_chemistry.json");
	}

	return $def_json;
}


function wpunity_countEnergyMarkers($scene_json) {

	$nMarkers = 0;

	$json_dec = json_decode($scene_json, true);

	foreach ($json_dec['objects'] as $obj3D){
		if (isset($obj3D['categoryName']))
			if($obj3D['categoryName']=='Marker')
				$nMarkers += 1;
	}

	return $nMarkers > 0 ? true : false;
}

//==========================================================================================================================================


function wpunity_getAllStrategies_byGame($project_id){

	$assetStrategies = [];

	$project_slug = get_post_field( 'post_name', $project_id );

	$queryargs = array(
		'post_type' => 'wpunity_scene',
		'posts_per_page' => -1,
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'wpunity_scene_pgame',
				'field' => 'slug',
				'terms' => $project_slug
			),
			array(
				'taxonomy' => 'wpunity_scene_yaml',
				'field' => 'slug',
				'terms' => array('exam2d-chem-yaml','exam3d-chem-yaml'),
			)
		)
	);

	$custom_query = new WP_Query( $queryargs );

	if ( $custom_query->have_posts() ) :
		while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			$examID = get_the_ID();
			$examName = get_the_title($examID);
			$examStrategy = get_post_meta($examID, 'wpunity_exam_strategy', true);

			$assetStrategies[] = [
				'examID' => $examID,
				'examName' => $examName,
				'examStrategy' => $examStrategy,
			];

		endwhile;
	endif;

	// Reset postdata
	wp_reset_postdata();

	$strategies = [];
	foreach ($assetStrategies as $strategy) {

		array_push($strategies, $strategy['examStrategy']);
		array_push($strategies, ',');
	}

	array_pop ( $strategies );

	return $strategies;
}


function wpunity_combineGameStrategies($project_id){

	$assetStrategies = [];
	$project_slug = get_post_field( 'post_name', $project_id );
	$queryargs = array(
		'post_type' => 'wpunity_scene',
		'posts_per_page' => -1,
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'wpunity_scene_pgame',
				'field' => 'slug',
				'terms' => $project_slug
			),
			array(
				'taxonomy' => 'wpunity_scene_yaml',
				'field' => 'slug',
				'terms' => array('exam2d-chem-yaml','exam3d-chem-yaml'),
			)
		)
	);

	$custom_query = new WP_Query( $queryargs );

	if ( $custom_query->have_posts() ) :
		while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			$examID = get_the_ID();
			$examName = get_the_title($examID);

			$examName = $examName=='Molecule Naming' ? 'naming' : 'construction' ;
			$examStrategy = get_post_meta($examID, 'wpunity_exam_strategy', true);

			$assetStrategies[] = [
				'examID' => $examID,
				'examName' => $examName,
				'examStrategy' => $examStrategy,
			];

		endwhile;
	endif;

	// Reset postdata
	wp_reset_postdata();

	$strategies = [];

	foreach ($assetStrategies as $exam) {

		$scene_id = $exam['examID'];

		$exam_strategy = json_decode($exam['examStrategy']);

		if ($exam_strategy) {

			foreach ($exam_strategy as $arr) {
				$object = (object) array($scene_id => $arr);
				array_push($strategies, $arr);
			}

		}
	}

	return $strategies;
}


//==========================================================================================================================================

//GET page by given type (depending the template) - breacrumb and links for front-end
function wpunity_getEditpage($type){
	if($type=='game'){
		$edit_pages = get_pages(array(
			'hierarchical' => 0,
			'parent' => -1,
			'meta_key' => '_wp_page_template',
			'meta_value' => '/templates/edit-wpunity_game.php'
		));
		return $edit_pages;
	}elseif($type=='scene'){
		$edit_pages = get_pages(array(
			'hierarchical' => 0,
			'parent' => -1,
			'meta_key' => '_wp_page_template',
			'meta_value' => '/templates/edit-wpunity_scene.php'
		));
		return $edit_pages;
	}elseif($type=='scene2D'){
		$edit_pages = get_pages(array(
			'hierarchical' => 0,
			'parent' => -1,
			'meta_key' => '_wp_page_template',
			'meta_value' => '/templates/edit-wpunity_scene2D.php'
		));
		return $edit_pages;
	}elseif($type=='allgames'){
		$edit_pages = get_pages(array(
			'hierarchical' => 0,
			'parent' => -1,
			'meta_key' => '_wp_page_template',
			'meta_value' => '/templates/open-wpunity_game.php'
		));
		return $edit_pages;
	}elseif($type=='sceneExam'){
		$edit_pages = get_pages(array(
			'hierarchical' => 0,
			'parent' => -1,
			'meta_key' => '_wp_page_template',
			'meta_value' => '/templates/edit-wpunity_sceneExam.php'
		));
		return $edit_pages;
	}elseif($type=='asset'){
		$edit_pages = get_pages(array(
			'hierarchical' => 0,
			'parent' => -1,
			'meta_key' => '_wp_page_template',
			'meta_value' => '/templates/edit-wpunity_asset3D.php'
		));
		return $edit_pages;
	}else{
		return false;
	}

}

//==========================================================================================================================================

////Get Settings Values
function wpunity_getUnity_local_or_remote(){
	$generaloptions = get_option( 'general_settings' );

	if($generaloptions["wpunity_unity_local_or_remote"]) {
		return $generaloptions["wpunity_unity_local_or_remote"];
	}else{
		return 'local';
	}
}

function wpunity_getUnity_exe_folder(){
	$generaloptions = get_option( 'general_settings' );
	if($generaloptions["wpunity_unity_exe_folder"]) {
		return $generaloptions["wpunity_unity_exe_folder"];
	}else{
		return 'C:\Program Files\Unity';
	}
}

function wpunity_getRemote_api_folder(){
	$generaloptions = get_option( 'general_settings' );
	if($generaloptions["wpunity_remote_api_folder"]) {
		return $generaloptions["wpunity_remote_api_folder"];
	}else{
		return 'http://myurl/';
	}
}

function wpunity_getRemote_server_path(){
	$generaloptions = get_option( 'general_settings' );
	if($generaloptions["wpunity_server_path"]) {
		return $generaloptions["wpunity_server_path"];
	}else{
		return 'C:/xampp/htdocs/COMPILE_UNITY3D_GAMES/';
	}
}

function wpunity_get_ftpCredentials(){
	$generaloptions = get_option( 'general_settings' );

	$ftp_credentials = array('address'  => $generaloptions["wpunity_ftp_address"],
                             'username' => $generaloptions["wpunity_ftp_username"],
                             'password' => $generaloptions["wpunity_ftp_pass"]);

	return $ftp_credentials;

}

//==========================================================================================================================================

//TODO check them

function wpunity_fetch_game_assets_action_callback(){

	// Output the directory listing as JSON
	header('Content-type: application/json');

	$response = wpunity_getAllassets_byGameProject($_POST['gameProjectSlug'], $_POST['gameProjectID']);

	for ($i=0; $i<count($response); $i++){
		$response[$i][name] = $response[$i][assetName];
		$response[$i][type] = 'file';
		$response[$i][path] = $response[$i][objPath];

		// Find kb size
		$ch = curl_init($response[$i][objPath]);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_NOBODY, TRUE);
		$dataCurl = curl_exec($ch);
		$size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
		curl_close($ch);
		$response[$i][size] =$size;
	}

	$jsonResp =  json_encode(
		array(
			"items" => $response
		)
	);

	echo $jsonResp;
	wp_die();
}

/**
 * Get the Assets of a game plus its respective joker game assets
 *
 * @param $gameProjectSlug
 * @param $gameProjectID
 * @return array
 */
function wpunity_getAllassets_byGameProject($gameProjectSlug, $gameProjectID){

	$allAssets = [];

	// find the joker game slug e.g. "Archaeology-joker"
	$joker_game_slug = wp_get_post_terms( $gameProjectID, 'wpunity_game_type')[0]->name."-joker";

	// Slugs are low case "Archaeology-joker" -> "archaeology-joker"
	$joker_game_slug = strtolower($joker_game_slug);

	$queryargs = array(
		'post_type' => 'wpunity_asset3d',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'wpunity_asset3d_pgame',
				'field' => 'slug',
				'terms' => array($gameProjectSlug, $joker_game_slug)
			)
		)
	);

	$custom_query = new WP_Query( $queryargs );


	if ( $custom_query->have_posts() ) :
		while ( $custom_query->have_posts() ) :

			$custom_query->the_post();
			$asset_id = get_the_ID();
			$asset_name = get_the_title();
			//$asset_pgame = wp_get_post_terms($asset_id, 'wpunity_asset3d_pgame');

			$isJoker = get_post_meta($asset_id, 'wpunity_asset3d_isJoker', true);    //strpos($asset_pgame[0]->slug, 'joker') !== false;

			// ALL DATA WE NEED
			$objID = get_post_meta($asset_id, 'wpunity_asset3d_obj', true); // OBJ ID
			$objPath = $objID ? wp_get_attachment_url( $objID ) : '';                   // OBJ PATH

			$mtlID = get_post_meta($asset_id, 'wpunity_asset3d_mtl', true); // MTL ID
			$mtlPath = $mtlID ? wp_get_attachment_url( $mtlID ) : '';                   // MTL PATH

			$difImageIDs = get_post_meta($asset_id, 'wpunity_asset3d_diffimage', false);  // Diffusion Image ID

			$difImagePaths = [];

			foreach ($difImageIDs as $diffid)
				$difImagePaths[] = wp_get_attachment_url( $diffid );                // Diffusion Image PATH

			$screenImageID = get_post_meta($asset_id, 'wpunity_asset3d_screenimage', true); // Screenshot Image ID
			$screenImagePath = $screenImageID ? wp_get_attachment_url( $screenImageID ) : '';           // Screenshot Image PATH

			$image1id = get_post_meta($asset_id, 'wpunity_asset3d_image1', true);

			$categoryAsset = wp_get_post_terms($asset_id, 'wpunity_asset3d_cat');
            
            $categIcon = get_term_meta($categoryAsset[0]->term_id, 'wpunity_assetcat_icon');
			
			$isCloned = get_post_meta($asset_id, 'wpunity_asset3d_isCloned', true);
			$isJoker = get_post_meta($asset_id, 'wpunity_asset3d_isJoker', true);

			$allAssets[] = [
				'assetName'=>$asset_name,
				'assetSlug'=>get_post()->post_name,
				'assetid'=>$asset_id,
				'categoryName'=>$categoryAsset[0]->name,
                'categoryDescription'=>$categoryAsset[0]->description,
                'categoryIcon'=>$categIcon,
				'categoryID'=>$categoryAsset[0]->term_id,
				'objID'=>$objID,
				'objPath'=>$objPath,
				'mtlID'=>$mtlID,
				'diffImageIDs'=>$difImageIDs,
				'diffImages'=>$difImagePaths,
				'screenImageID'=>$screenImageID,
				'screenImagePath'=>$screenImagePath,
				'mtlPath'=>$mtlPath,
				'image1id'=>$image1id,
				'doorName_source'=>'', //$doorName_source,   the asset does not save door but the json
				'doorName_target'=>'', //$doorName_target,
				'sceneName_target'=>'', //$sceneName_target
				'sceneID_target'=>'', //$sceneName_target
				'archaeology_penalty'=>'0',
				'hv_penalty'=>'0',
				'natural_penalty'=>'0',
				'isreward'=> '0',
				'isJokerAsset'=> $isJoker,
				'isCloned'=> $isCloned,
				'isJoker'=> $isJoker
			];

		endwhile;
	endif;

	// Reset postdata
	wp_reset_postdata();

	return $allAssets;
}


/**
 * Get the Assets of a game plus its respective joker game assets
 *
 * @param $gameProjectSlug
 * @param $gameProjectID
 * @return array
 */
function wpunity_get_assetids_joker($gameType){

	$assetIds = [];

	// find the joker game slug e.g. "Archaeology-joker"
	$joker_game_slug = $gameType."-joker";

	// Slugs are low case "Archaeology-joker" -> "archaeology-joker"
	$joker_game_slug = strtolower($joker_game_slug);

	$queryargs = array(
		'post_type' => 'wpunity_asset3d',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'wpunity_asset3d_pgame',
				'field' => 'slug',
				'terms' => $joker_game_slug
			)
		)
	);

	$custom_query = new WP_Query( $queryargs );

	if ( $custom_query->have_posts() ) :
		while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			$assetIds[] = get_the_ID();
		endwhile;
	endif;

	// Reset postdata
	wp_reset_postdata();

	return $assetIds;
}



// jimver : check this
function wpunity_getAllscenes_unityfiles_byGame($gameID){

	$allUnityScenes = [];

	$originalGame = get_post($gameID);
	$gameSlug = $originalGame->post_name;
	//Get 'Asset's Parent Scene' taxonomy with the same slug
	$gameTaxonomy = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
	$gameTaxonomyID = $gameTaxonomy->term_id;

	$queryargs = array(
		'post_type' => 'wpunity_scene',
		'posts_per_page' => -1,
		'orderby'   => 'ID',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'wpunity_scene_pgame',
				'field' => 'id',
				'terms' => $gameTaxonomyID
			)
		)
	);

	$custom_query = new WP_Query( $queryargs );

	if ( $custom_query->have_posts() ) :
		while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			$scene_id = get_the_ID();
			$sceneSlug = get_post_field( 'post_name', $scene_id );
			$allUnityScenes[] = ['sceneUnityPath'=>"Assets/".$sceneSlug."/".$sceneSlug.".unity"];
		endwhile;
	endif;

	// Reset postdata
	wp_reset_postdata();

	return $allUnityScenes;

}

//==========================================================================================================================================

function wpunity_getAllexams_byGame($project_id, $addMenu){

	$allExamScenes = [];

	$project_slug = get_post_field( 'post_name', $project_id );
	if($addMenu){$sceneTypes = array('exam2d-chem-yaml','exam3d-chem-yaml','mainmenu-chem-yaml');}
	else{$sceneTypes = array('exam2d-chem-yaml','exam3d-chem-yaml');}

	$queryargs = array(
		'post_type' => 'wpunity_scene',
		'posts_per_page' => -1,
		'orderby'   => 'ID',
		'order' => 'DESC',
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'wpunity_scene_pgame',
				'field' => 'slug',
				'terms' => $project_slug
			),
			array(
				'taxonomy' => 'wpunity_scene_yaml',
				'field' => 'slug',
				'terms' => $sceneTypes,
			)
		)
	);

	$custom_query = new WP_Query( $queryargs );

	if ( $custom_query->have_posts() ) :
		while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			$examID = get_the_ID();
			$examName = get_the_title($examID);

			$allExamScenes[] = [
				'examID' => $examID,
				'examName' => $examName,
			];

		endwhile;
	endif;

	// Reset postdata
	wp_reset_postdata();

	return $allExamScenes;
}

?>