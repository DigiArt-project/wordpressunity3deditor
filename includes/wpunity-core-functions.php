<?php
//==========================================================================================================================================
//==========================================================================================================================================


function wpunity_getFirstSceneID_byProjectID($project_id,$project_type){
	$gamePost = get_post($project_id);
	$gameSlug = $gamePost->post_name;

	$scene_type_slug = 'wonderaround-yaml';
	if($project_type == 'chemistry_games'){$scene_type_slug='wonderaround-lab-yaml';}
	if($project_type == 'energy_games'){$scene_type_slug='educational-energy';}

	$custom_query_args = array(
		'post_type' => 'wpunity_scene',
		'posts_per_page' => -1,
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'wpunity_scene_pgame',
				'field'    => 'slug',
				'terms'    => $gameSlug
			),
			array(
				'taxonomy' => 'wpunity_scene_yaml',
				'field'    => 'slug',
				'terms'    => $scene_type_slug,
			),
		),
		'orderby' => 'ID',
		'order' => 'DESC',
	);
	$scene_data = array();
	$custom_query = new WP_Query( $custom_query_args );

	if ( $custom_query->have_posts() ) {
		while ($custom_query->have_posts()) {
			$custom_query->the_post();

			$scene_data['id'] = get_the_ID();
			$scene_data['type'] = get_post_meta( get_the_ID(), 'wpunity_scene_metatype', true );
		}
	}

	return $scene_data;
}


//==========================================================================================================================================
//==========================================================================================================================================

function wpunity_windEnergy_scene_stats($scene_id){

	$turbinesInfoGathered = [];
	$scene_json = get_post_meta($scene_id, 'wpunity_scene_json_input', true);
	$scene_env = get_post_meta($scene_id, 'wpunity_scene_environment', true);

	$jsonScene = htmlspecialchars_decode($scene_json);
	$sceneJsonARR = json_decode($jsonScene, TRUE);

	if (count($sceneJsonARR['objects']) > 0){
		foreach ($sceneJsonARR['objects'] as $key => $value) {
			if ($key !== 'avatarYawObject') {
				if ($value['categoryName'] === 'Producer') {

					$optCosts = get_post_meta($value['assetid'],'wpunity_producerOptCosts',true);
					if($optCosts) {
						$optCosts_size = $optCosts['size'];
						$optCosts_cost = $optCosts['cost'];
					}
					$optGen = get_post_meta($value['assetid'],'wpunity_producerOptGen',true);
					if($optGen) {
						$optGen_power = $optGen['power'];
					}

					$turbinesInfoGathered[] = ['producerID' => $value['assetid'],
					                           'proWatts' => $optGen_power,
					                           'proArea' => $optCosts_size * 3,
					                           'proCost' => $optCosts_cost
					];
				}
			}
		}
	}
	$totalWatts = 0;$totalArea = 0;$totalCost = 0;$totalItems = 0;
	foreach ($turbinesInfoGathered as $prod) {
		$totalWatts += $prod['proWatts'];
		$totalArea += $prod['proArea'];
		$totalCost += $prod['proCost'];
		$totalItems++;
	}

	$scene_stats = array('env' => $scene_env, 'map' => $scene_id, 'watts' => $totalWatts, 'area' => $totalArea, 'cost' => $totalCost, 'totalProducers' =>  $totalItems);

	return $scene_stats;
}


//==========================================================================================================================================
//==========================================================================================================================================

function wpunity_the_slug_exists($post_name) {
	global $wpdb;
	if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
		return true;
	} else {
		return false;
	}
}


function wpunity_createJoker_activation() {
	$userID = get_current_user_id();
	//$virtualplace_tax = get_term_by('slug', 'virtual_place', 'wpunity_game_cat');
	//$realplace_tax = get_term_by('slug', 'real_place', 'wpunity_game_cat');

	if (!wpunity_the_slug_exists('archaeology-joker')) {
		$archaeology_tax = get_term_by('slug', 'archaeology_games', 'wpunity_game_type');
		$archaeology_tax_id = $archaeology_tax->term_id;

		$game_taxonomies_arch = array(
			'wpunity_game_type' => array(
				$archaeology_tax_id,
			),
//			'wpunity_game_cat' => array(
//				$virtualplace_tax->term_id,
//			)
		);

		$game_information_arch = array(
			'post_title' => 'Archaeology Joker',
			'post_name' => 'archaeology-joker',
			'post_content' => '',
			'post_type' => 'wpunity_game',
			'post_status' => 'publish',
			'tax_input' => $game_taxonomies_arch,
			'post_author'   => $userID,
		);

		wp_insert_post($game_information_arch);
	}

	if (!wpunity_the_slug_exists('energy-joker')) {
		$energy_tax = get_term_by('slug', 'energy_games', 'wpunity_game_type');
		$energy_tax_id = $energy_tax->term_id;

		$game_taxonomies_ener = array(
			'wpunity_game_type' => array(
				$energy_tax_id,
			),
//			'wpunity_game_cat' => array(
//				$virtualplace_tax->term_id,
//			)
		);

		$game_information_ener = array(
			'post_title' => 'Energy Joker',
			'post_name' => 'energy-joker',
			'post_content' => '',
			'post_type' => 'wpunity_game',
			'post_status' => 'publish',
			'tax_input' => $game_taxonomies_ener,
			'post_author'   => $userID,
		);

		wp_insert_post($game_information_ener);
	}

	if (!wpunity_the_slug_exists('chemistry-joker')) {
		$chemistry_tax = get_term_by('slug', 'chemistry_games', 'wpunity_game_type');
		$chemistry_tax_id = $chemistry_tax->term_id;

		$game_taxonomies_chem = array(
			'wpunity_game_type' => array(
				$chemistry_tax_id,
			),
//			'wpunity_game_cat' => array(
//				$virtualplace_tax->term_id,
//			)
		);

		$game_information_chem = array(
			'post_title' => 'Chemistry Joker',
			'post_name' => 'chemistry-joker',
			'post_content' => '',
			'post_type' => 'wpunity_game',
			'post_status' => 'publish',
			'tax_input' => $game_taxonomies_chem,
			'post_author'   => $userID,
		);

		wp_insert_post($game_information_chem);
	}


}
//add_action( 'activated_plugin', 'wpunity_createJoker_activation', 10, 2 );

add_action( 'init', 'wpunity_createJoker_activation', 10, 2 );


//==========================================================================================================================================
//==========================================================================================================================================

function wpunity_getNonRegionalScenes($project_id) {
	$game_post = get_post($project_id);
	$gameSlug = $game_post->post_name;
	$scenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
	$scenePGameID = $scenePGame->term_id;

	$nonRegionalScenes = array();

	// Define custom query parameters
	$custom_query_args = array(
		'post_type' => 'wpunity_scene',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'wpunity_scene_pgame',
				'field'    => 'term_id',
				'terms'    => $scenePGameID,
			)
		),
		'meta_key'   => 'wpunity_isRegional',
		'meta_value' => '0',
		'orderby' => 'ID',
		'order' => 'DESC',
	);

	$custom_query = new WP_Query( $custom_query_args );

	// Output custom query loop
	if ( $custom_query->have_posts() ) {
		while ($custom_query->have_posts()) {
			$custom_query->the_post();
			$scene_id = get_the_ID();
			$scene_slug = get_post_field( 'post_name', $scene_id );

			$nonRegionalScenes[] = ['sceneID'=>$scene_id, 'sceneSlug'=>$scene_slug ];
		}
	}

	wp_reset_postdata();
	$wp_query = NULL;

	return $nonRegionalScenes;
}

//==========================================================================================================================================
//==========================================================================================================================================

//Add new Field at registration form (3 steps)

//1. Add a new form element...
add_action( 'register_form', 'wpunity_extrapass_register_form' );

function wpunity_extrapass_register_form() {

	$extrapass = ( ! empty( $_POST['extra_pass'] ) ) ? sanitize_text_field( $_POST['extra_pass'] ) : '';

	?>

    <input type="hidden" name="extra_pass" id="extra_pass" class="input" value="<?php echo esc_attr(  $extrapass  ); ?>" size="25" readonly />

    <script type="text/javascript">
        jQuery(document).ready(
            function wpunityGenerateExtraPass(){
                var rString = wpunity_randomString(16, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
                document.getElementById('extra_pass').value  = rString;
            }
        );

        jQuery( "#registerform" ).focus(function() {
            alert( "Handler for .focus() called." );
        });


        function wpunity_randomString(length, chars) {
            var result = '';
            for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
            return result;
        }


        //		function wpunityGenerateExtraPass(){
        //			var rString = wpunity_randomString(16, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        //			document.getElementById('extra_pass').value  = rString;
        //		}
    </script>
	<?php
}

//2. Add validation. In this case, we make sure extra_pass is required.
add_filter( 'registration_errors', 'wpunity_extrapass_registration_errors', 10, 3 );

function wpunity_extrapass_registration_errors( $errors, $sanitized_user_login, $user_email ) {

	if ( empty( $_POST['extra_pass'] ) || ! empty( $_POST['extra_pass'] ) && trim( $_POST['extra_pass'] ) == '' ) {
		$errors->add( 'extra_pass_error', sprintf('<strong>%s</strong>: %s','ERROR','You must include an extra pass.', 'mydomain' ));

	}

	return $errors;
}

//3. Finally, save our extra registration user meta.
add_action( 'user_register', 'wpunity_extrapass_user_register', 10, 1 );

function wpunity_extrapass_user_register( $user_id ) {
	if ( ! empty( $_POST['extra_pass'] ) ) {
		update_user_meta( $user_id, 'extra_pass', sanitize_text_field( $_POST['extra_pass'] ) );
	}
}

add_action( 'show_user_profile', 'wpunity_extrapass_profile_fields' );
add_action( 'edit_user_profile', 'wpunity_extrapass_profile_fields' );

function wpunity_extrapass_profile_fields( $user ) {
	?>
    <h3><?php esc_html_e('Extra Information'); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="extra_pass"><?php esc_html_e( 'Extra Password'); ?></label></th>
            <td><?php echo esc_html( get_the_author_meta( 'extra_pass', $user->ID ) ); ?></td>
        </tr>
    </table>
	<?php
}

//==========================================================================================================================================
//==========================================================================================================================================

//Function to get ALL necessary keys about GIO Analytics
function wpunity_getProjectKeys($project_id) {

	$myGioID = get_post_meta( $project_id, 'wpunity_project_gioApKey', true);
	$myExpID = get_post_meta( $project_id, 'wpunity_project_expID', true);
	$extraPass = get_the_author_meta( 'extra_pass', get_current_user_id() );

	$mykeys = array('projectID' => $project_id, 'gioID' => $myGioID, 'expID' => $myExpID, 'extraPass' => $extraPass);

	return $mykeys;
}

// STEP 1 for GIO data
add_action( 'user_register', 'wpunity_registrationUser_save', 10, 2 );


function wpunity_registrationUser_save( $user_id ) {

	$user_info = get_userdata($user_id);

	$userEmail = $user_info->user_email;
	$extraPass = get_the_author_meta( 'extra_pass', $user_id );
	$userName = $user_info->user_login;

	if ($extraPass) {

		$args = array(
			'method' => 'POST',
			'timeout' => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'sslverify' => 0,
			'headers' => array( 'content-type' => 'application/json' ),
			'body' => json_encode(array(
				'user' => array(
					'email' => $userEmail,
					'password' => $extraPass,
					'first_name' => $userName,
					'company' => 'ENVISAGE'
				),
				'app' => array(
					'add' => false
				)
			) ),
			'cookies' => array()
		);

		$response = wp_remote_post( "http://api-staging.goedle.io/users/", $args);

		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			print_r($error_message);

			// Todo: @Tasos place an alert div with message
			//die();
		}

	} else {

		print_r("No Extra pass provided");
		// Todo: @Tasos place an alert div with message

	}
}

//STEP 2 for GIO data
function wpunity_createGame_GIO_request($project_id, $user_id){

	$user_info = get_userdata($user_id);
	$userEmail = $user_info->user_email;
	$extraPass = get_the_author_meta( 'extra_pass', $user_id );

	if ($extraPass) {

		$args = array(
			'method' => 'POST',
			'timeout' => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'sslverify' => false,
			'headers' => array( 'content-type' => 'application/json' ),
			'body' => json_encode(array(
				'email' => $userEmail,
				'password' => $extraPass
			) ),
			'cookies' => array()
		);

		$token_request = wp_remote_post( "http://api-staging.goedle.io/token/", $args);


		if (is_wp_error( $token_request ) ) {

			$error_message = $token_request->get_error_message();
			print_r($error_message);
			// Todo: @Tasos place an alert div with message
			//die();

		} else {

			$token = json_decode($token_request[body]);

			$token = $token->token;

			$args = array(
				'method' => 'POST',
				'timeout' => 45,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking' => true,
				'sslverify' => 0,
				'headers' => array( 'content-type' => 'application/json', 'Authorization' => $token ),
				'body' =>json_encode(array() ),
				'cookies' => array()
			);


			$request = wp_remote_post( "http://api-staging.goedle.io/apps/", $args);

			if (is_wp_error( $request ) ) {

				$error_message = $request->get_error_message();
				print_r($error_message);
				// Todo: @Tasos place an alert div with message
				//die();

			} else {

				if ((string)(int)$request['response']['code'] !== '201') {

					print_r($request['response']['code']);
					print_r($request['response']['message']);
					// Todo: @Tasos place an alert div with message
					//die();
				}

				$keys = json_decode($request[body]);

				$app_key = $keys->app->app_key; //the return value for GIO id
				$api_key = $keys->app->api_key;

				// Save values to our DB
				update_post_meta( $project_id, 'wpunity_project_gioApKey', $app_key);
				update_post_meta( $project_id, 'wpunity_project_gioAPIKey', $api_key);
			}
		}
	}
}





//==========================================================================================================================================
//==========================================================================================================================================

function wpunity_create_default_scenes_for_game($gameSlug, $gameTitle, $gameID){

	$allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
	$allScenePGameID = $allScenePGame->term_id;

	$all_game_category = get_the_terms( $gameID, 'wpunity_game_type' );
	$game_category  = $all_game_category[0]->slug;

	$mainmenuSceneTitle = 'Main Menu'; //Title for Main Menu
	$mainmenuSceneSlug = $gameSlug . '-main-menu' ; //Slug for Main Menu
	$firstSceneTitle = 'Lab'; //Title for First Menu
	$firstSceneSlug = $gameSlug . '-first-scene'; //Slug for First Menu
	$credentialsSceneTitle = 'Credits'; //Title for Credentials Menu
	$credentialsSceneSlug = $gameSlug . '-credits-scene'; //Slug for Credentials Menu
	if($game_category == 'chemistry_games'){
		$exam2dSceneTitle = 'Molecule Naming'; //Title for Exam Scene
		$exam2dSceneSlug = $gameSlug . '-exam2d'; //Slug for Exam Scene
		$exam3dSceneTitle = 'Molecule Construction';
		$exam3dSceneSlug = $gameSlug . '-exam3d';
	}

	if($game_category == 'energy_games'){
		$firstSceneYAML = get_term_by('slug', 'educational-energy', 'wpunity_scene_yaml'); //Yaml Tax for First Scene
		$firstSceneYAMLID = $firstSceneYAML->term_id;
		$mainmenuSceneYAML = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Main Menu
		$mainmenuSceneYAMLID = $mainmenuSceneYAML->term_id;
		$credentialsSceneYAML = get_term_by('slug', 'credentials-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Credentials Scene
		$credentialsSceneYAMLID = $credentialsSceneYAML->term_id;
	}elseif($game_category == 'archaeology_games'){
		$firstSceneYAML = get_term_by('slug', 'wonderaround-yaml', 'wpunity_scene_yaml'); //Yaml Tax for First Scene
		$firstSceneYAMLID = $firstSceneYAML->term_id;
		$mainmenuSceneYAML = get_term_by('slug', 'mainmenu-arch-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Main Menu
		$mainmenuSceneYAMLID = $mainmenuSceneYAML->term_id;
		$credentialsSceneYAML = get_term_by('slug', 'credentials-arch-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Credentials Scene
		$credentialsSceneYAMLID = $credentialsSceneYAML->term_id;
	}elseif($game_category == 'chemistry_games'){
		$firstSceneYAML = get_term_by('slug', 'wonderaround-lab-yaml', 'wpunity_scene_yaml'); //Yaml Tax for First Scene (Chemistry)
		$firstSceneYAMLID = $firstSceneYAML->term_id;
		$mainmenuSceneYAML = get_term_by('slug', 'mainmenu-chem-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Main Menu (Chemistry)
		$mainmenuSceneYAMLID = $mainmenuSceneYAML->term_id;
		$credentialsSceneYAML = get_term_by('slug', 'credentials-chem-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Credentials Scene (Chemistry)
		$credentialsSceneYAMLID = $credentialsSceneYAML->term_id;
		$exam2dSceneYAML = get_term_by('slug', 'exam2d-chem-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Exam 2d Scene (Chemistry)
		$exam2dSceneYAMLID = $exam2dSceneYAML->term_id;
		$exam3dSceneYAML = get_term_by('slug', 'exam3d-chem-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Exam 3d Scene (Chemistry)
		$exam3dSceneYAMLID = $exam3dSceneYAML->term_id;
	}

	$default_json = wpunity_getDefaultJSONscene();

	// Create Main Menu Scene Data
	$mainmenuSceneData = array(
		'post_title'    => $mainmenuSceneTitle,
		'post_content' => 'Main Menu of the Game',
		'post_name' => $mainmenuSceneSlug,
		'post_type' => 'wpunity_scene',
		'post_status'   => 'publish',
		'tax_input'    => array(
			'wpunity_scene_pgame'     => array( $allScenePGameID ),
			'wpunity_scene_yaml'     => array( $mainmenuSceneYAMLID ),
		),'meta_input'   => array(
			'wpunity_scene_default' => 1,
			'wpunity_scene_metatype' => 'menu',
			'wpunity_menu_has_help' => 1,
			'wpunity_menu_has_login' => 1,
			'wpunity_menu_has_options' => 1,
		),
	);

	wp_insert_post( $mainmenuSceneData );

	// Create Credentials Scene Data
	$credentialsSceneData = array(
		'post_title'    => $credentialsSceneTitle,
		'post_content' => 'Credits of the Game',
		'post_name' => $credentialsSceneSlug,
		'post_type' => 'wpunity_scene',
		'post_status'   => 'publish',
		'tax_input'    => array(
			'wpunity_scene_pgame'     => array( $allScenePGameID ),
			'wpunity_scene_yaml'     => array( $credentialsSceneYAMLID ),
		),'meta_input'   => array(
			'wpunity_scene_default' => 1,
			'wpunity_scene_metatype' => 'credits',
		),
	);

	wp_insert_post( $credentialsSceneData );


	if($game_category == 'energy_games'){
		$firstSceneTitle = 'Mountains'; //Title for First Menu
		$firstSceneSlug = $gameSlug . '-mountains'; //Slug for First Menu
		$secondSceneTitle = 'Fields'; //Title for First Menu
		$secondSceneSlug = $gameSlug . '-fields'; //Slug for First Menu
		$thirdSceneTitle = 'Seashore'; //Title for First Menu
		$thirdSceneSlug = $gameSlug . '-seashore'; //Slug for First Menu

		$content1 = 'Area-1 is near mountains.It has difficult access. Its windclass is High (10 m/s).
Here you have 5 places to explore.Characteristics :
	- Average Wind speed = 10 m/s
	- Access cost = 3 $';

		$content2 = 'Area-2 is near plain land. It has not difficult access. Its windclass is Medium (windspeeds 8.5 m/s).
Here you have 5 places to explore.
Characteristics :
	- Average Wind speed = 8.5 m/s
	- Access cost = 2 $';

		$content3 = 'Area-3 is near seashore. It has easy access due to port. Its windclass is Low (windspeeds 7.5 m/s).
Here you have 8 places to explore.
Characteristics :
	- Average Wind speed = 7.5 m/s
	- Access cost = 1 $';


		$image_content2 = WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/regions/img2.png";
		$image_content3 = WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/regions/img3.png";

		// Create First Scene Data
		$firstSceneData = array(
			'post_title' => $firstSceneTitle,
			'post_content' => $content1,
			'post_name' => $firstSceneSlug,
			'post_type' => 'wpunity_scene',
			'post_status' => 'publish',
			'tax_input' => array(
				'wpunity_scene_pgame' => array($allScenePGameID),
				'wpunity_scene_yaml' => array($firstSceneYAMLID),
			), 'meta_input' => array(
				'wpunity_scene_default' => 1,
				'wpunity_scene_metatype' => 'scene',
				'wpunity_scene_json_input' => $default_json,
				'wpunity_isRegional' => 1,
				'wpunity_scene_environment' => 'mountain',
			),
		);

		$secondSceneData = array(
			'post_title' => $secondSceneTitle,
			'post_content' => $content2,
			'post_name' => $secondSceneSlug,
			'post_type' => 'wpunity_scene',
			'post_status' => 'publish',
			'tax_input' => array(
				'wpunity_scene_pgame' => array($allScenePGameID),
				'wpunity_scene_yaml' => array($firstSceneYAMLID),
			), 'meta_input' => array(
				'wpunity_scene_default' => 1,
				'wpunity_scene_metatype' => 'scene',
				'wpunity_scene_json_input' => $default_json,
				'wpunity_isRegional' => 1,
				'wpunity_scene_environment' => 'fields',
			),
		);

		$thirdSceneData = array(
			'post_title' => $thirdSceneTitle,
			'post_content' => $content3,
			'post_name' => $thirdSceneSlug,
			'post_type' => 'wpunity_scene',
			'post_status' => 'publish',
			'tax_input' => array(
				'wpunity_scene_pgame' => array($allScenePGameID),
				'wpunity_scene_yaml' => array($firstSceneYAMLID),
			), 'meta_input' => array(
				'wpunity_scene_default' => 1,
				'wpunity_scene_metatype' => 'scene',
				'wpunity_scene_json_input' => $default_json,
				'wpunity_isRegional' => 1,
				'wpunity_scene_environment' => 'seashore',
			),
		);

		$scene2_id = wp_insert_post( $secondSceneData );
		$scene3_id = wp_insert_post( $thirdSceneData );

		$attachment2_id = wpunity_upload_img_vid( $image_content2, $scene2_id);
		$attachment3_id = wpunity_upload_img_vid( $image_content3, $scene3_id);
		set_post_thumbnail( $scene2_id, $attachment2_id );
		set_post_thumbnail( $scene3_id, $attachment3_id );
	}else {
		// Create First Scene Data
		$firstSceneData = array(
			'post_title' => $firstSceneTitle,
			'post_content' => 'Auto-created scene',
			'post_name' => $firstSceneSlug,
			'post_type' => 'wpunity_scene',
			'post_status' => 'publish',
			'tax_input' => array(
				'wpunity_scene_pgame' => array($allScenePGameID),
				'wpunity_scene_yaml' => array($firstSceneYAMLID),
			), 'meta_input' => array(
				'wpunity_scene_default' => 1,
				'wpunity_scene_metatype' => 'scene',
				'wpunity_scene_json_input' => $default_json,
				'wpunity_isRegional' => 0,
			),
		);
	}



	if($game_category == 'chemistry_games'){
		// Create Exam Scene Data
		$exam2dSceneData = array(
			'post_title'    => $exam2dSceneTitle,
			'post_content' => 'Create Molecule Naming puzzle game',
			'post_name' => $exam2dSceneSlug,
			'post_type' => 'wpunity_scene',
			'post_status'   => 'publish',
			'tax_input'    => array(
				'wpunity_scene_pgame'     => array( $allScenePGameID ),
				'wpunity_scene_yaml'     => array( $exam2dSceneYAMLID ),
			),'meta_input'   => array(
				'wpunity_scene_default' => 1,
				'wpunity_scene_metatype' => 'sceneExam2d',
				'wpunity_scene_json_input' => $default_json,
			),
		);

		wp_insert_post( $exam2dSceneData );

		$exam3dSceneData = array(
			'post_title'    => $exam3dSceneTitle,
			'post_content' => 'Create Molecule Construction puzzle game',
			'post_name' => $exam3dSceneSlug,
			'post_type' => 'wpunity_scene',
			'post_status'   => 'publish',
			'tax_input'    => array(
				'wpunity_scene_pgame'     => array( $allScenePGameID ),
				'wpunity_scene_yaml'     => array( $exam3dSceneYAMLID ),
			),'meta_input'   => array(
				'wpunity_scene_default' => 1,
				'wpunity_scene_metatype' => 'sceneExam3d',
				'wpunity_scene_json_input' => $default_json,
			),
		);

		wp_insert_post( $exam3dSceneData );
	}

	// Insert posts 1-1 into the database

	$scene1_id = wp_insert_post( $firstSceneData );
	if($game_category == 'energy_games'){

		$image_content1 = WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/regions/img1.png";
		$attachment1_id = wpunity_upload_img_vid( $image_content1, $scene1_id);
		set_post_thumbnail( $scene1_id, $attachment1_id );
	}
}

//==========================================================================================================================================
//==========================================================================================================================================

function wpunity_reset_allyamls(){
	//Archaeology GAME TERMS
	$ArchGameTerm = get_term_by( 'slug', 'archaeology_games', 'wpunity_game_type');
	update_term_meta($ArchGameTerm->term_id, 'wpunity_audio_manager_term', wpunity_default_value_AudioManager_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_cluster_input_manager_term', wpunity_default_value_ClusterInputManager_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_dynamics_manager_term', wpunity_default_value_DynamicsManager_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_editor_build_settings_term', wpunity_default_value_EditorBuildSettings_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_editor_settings_term', wpunity_default_value_EditorSettings_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_graphics_settings_term', wpunity_default_value_GraphicsSettings_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_input_manager_term', wpunity_default_value_InputManager_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_nav_mesh_areas_term', wpunity_default_value_NavMeshAreas_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_network_manager_term', wpunity_default_value_NetworkManager_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_physics2d_settings_term', wpunity_default_value_Physics2DSettings_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_project_settings_term', wpunity_default_value_ProjectSettings_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_project_version_term', wpunity_default_value_ProjectVersion_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_quality_settings_term', wpunity_default_value_QualitySettings_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_tag_manager_term', wpunity_default_value_TagManager_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_time_manager_term', wpunity_default_value_TimeManager_arch_get(), true);
	update_term_meta($ArchGameTerm->term_id, 'wpunity_unity_connect_settings_term', wpunity_default_value_unityConnect_arch_get(), true);

	//Archaeology SCENE TERMS
	$ArchCredTerm = get_term_by( 'slug', 'credentials-arch-yaml', 'wpunity_scene_yaml');
	update_term_meta($ArchCredTerm->term_id, 'wpunity_yamlmeta_s_credentials_arch', wpunity_default_value_credits_unity_archaeology_get());

	$ArchMenuTerm = get_term_by( 'slug', 'mainmenu-arch-yaml', 'wpunity_scene_yaml');
	update_term_meta($ArchMenuTerm->term_id, 'wpunity_yamlmeta_s_mainmenu_arch', wpunity_default_value_mmenu_unity_archaeology_get());
	update_term_meta($ArchMenuTerm->term_id, 'wpunity_yamlmeta_s_options_arch', wpunity_default_value_options_unity_archaeology_get());
	update_term_meta($ArchMenuTerm->term_id, 'wpunity_yamlmeta_s_help_arch', wpunity_default_value_help_unity_archaeology_get());
	update_term_meta($ArchMenuTerm->term_id, 'wpunity_yamlmeta_s_login_arch', wpunity_default_value_login_unity_archaeology_get());
	update_term_meta($ArchMenuTerm->term_id, 'wpunity_yamlmeta_s_reward_arch', wpunity_default_value_reward_unity_archaeology_get());
	update_term_meta($ArchMenuTerm->term_id, 'wpunity_yamlmeta_s_selector_arch', wpunity_default_value_selector_unity_archaeology_get());
	update_term_meta($ArchMenuTerm->term_id, 'wpunity_yamlmeta_s_selector2_arch', wpunity_default_value_selector2_unity_archaeology_get());
	update_term_meta($ArchMenuTerm->term_id, 'wpunity_yamlmeta_s_selector_title_arch', wpunity_default_value_selectortext_unity_archaeology_get());

	$ArchWonderTerm = get_term_by( 'slug', 'wonderaround-yaml', 'wpunity_scene_yaml');
	update_term_meta($ArchWonderTerm->term_id, 'wpunity_yamlmeta_wonderaround_pat', wpunity_default_value_wonderaround_unity_archaeology_get());

	//Archaeology ASSETS TERMS
	$ArchArtifactTerm = get_term_by( 'slug', 'artifact', 'wpunity_asset3d_cat');
	update_term_meta($ArchArtifactTerm->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_artifact_get(), false);

	$ArchDecoTerm = get_term_by( 'slug', 'decoration_arch', 'wpunity_asset3d_cat');
	update_term_meta($ArchDecoTerm->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_decoration_arch_get(), false);

	$ArchDoorTerm = get_term_by( 'slug', 'door', 'wpunity_asset3d_cat');
	update_term_meta($ArchDoorTerm->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_door_get(), false);

	$ArchPoisTTerm = get_term_by( 'slug', 'pois_imagetext', 'wpunity_asset3d_cat');
	update_term_meta($ArchPoisTTerm->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_poi_get(), false);

	$ArchPoisVTerm = get_term_by( 'slug', 'pois_video', 'wpunity_asset3d_cat');
	update_term_meta($ArchPoisVTerm->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_poi_video_get(), false);

	$ArchSiteTerm = get_term_by( 'slug', 'site', 'wpunity_asset3d_cat');
	update_term_meta($ArchSiteTerm->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_site_get(), false);

	//$ChemGameTerm = get_term_by( 'slug', 'chemistry_games', 'wpunity_game_type');
	//$EnergyGameTerm = get_term_by( 'slug', 'energy_games', 'wpunity_game_type');

}

//==========================================================================================================================================
//==========================================================================================================================================
//GUIDs & FIDs

// 32 chars Hex (identifier for the resource)
function wpunity_create_guids($objTypeSTR, $objID, $extra_id_material=null){

	switch ($objTypeSTR) {
		case 'unity':  $objType = "1"; break;
		case 'folder': $objType = "2"; break;
		case 'obj': $objType = "3"; break;
		case 'mat': $objType = "4".$extra_id_material; break; // an obj can have two or more mat
		case 'jpg': $objType = "5".$extra_id_material; break; // an obj can have multiple textures jpg
		//case 'tile': $objType = "6".$extra_id_material; break; // an obj can have multiple textures jpg
	}

	return str_pad($objType, 4, "0", STR_PAD_LEFT) . str_pad($objID, 28, "0", STR_PAD_LEFT);
}

// 10 chars Decimal (identifier for the GameObject) (e.g. dino1, dino2 have different fid but share the same guid)
function wpunity_create_fids($id){
	return str_pad($id, 10, "0", STR_PAD_LEFT);
}

function wpunity_create_fids_rect($id){
	return '1' . str_pad($id, 9, "0", STR_PAD_LEFT);
}

function wpunity_replace_objmeta($file_content,$objID){
	$unix_time = time();
	$guid_id = wpunity_create_guids('obj',$objID);

	$file_content_return = str_replace("___[obj_guid]___",$guid_id,$file_content);
	$file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

	return $file_content_return;
}

function wpunity_replace_foldermeta($file_content,$folderID){
	$unix_time = time();
	$guid_id = wpunity_create_guids('folder',$folderID);

	$file_content_return = str_replace("___[folder_guid]___",$guid_id,$file_content);
	$file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

	return $file_content_return;
}

function wpunity_replace_jpgmeta($file_content,$objID){
	$unix_time = time();
	$guid_id = wpunity_create_guids('jpg',$objID);

	$file_content_return = str_replace("___[jpg_guid]___",$guid_id,$file_content);
	$file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

	return $file_content_return;
}

//==========================================================================================================================================
//==========================================================================================================================================
//Create sample data when a user is registered (changed it to "when a game is created")

//add_action( 'user_register', 'wpunity_registrationhook_createGame', 10, 1 );

function wpunity_registrationhook_createGame( $user_id ) {

	$user_info = get_userdata($user_id);
	$username = $user_info->user_login;

	$archaeology_tax = get_term_by('slug', 'archaeology_games', 'wpunity_game_type');
	$game_type_chosen_id = $archaeology_tax->term_id;
	$realplace_tax = get_term_by('slug', 'real_place', 'wpunity_game_cat');

	$game_taxonomies = array(
		'wpunity_game_type' => array(
			$game_type_chosen_id,
		),
		'wpunity_game_cat' => array(
			$realplace_tax->term_id,
		)
	);

	$game_title = $username . ' Sample Game';

	$game_information = array(
		'post_title' => $game_title,
		'post_content' => '',
		'post_type' => 'wpunity_game',
		'post_status' => 'publish',
		'tax_input' => $game_taxonomies,
		'post_author' => $user_id,
	);

	$game_id = wp_insert_post($game_information);

	wpunity_registrationhook_createAssets($user_id,$username,$game_id);

}

function wpunity_registrationhook_createAssets($user_id,$username,$game_id){
	$game_post = get_post($game_id);
	$game_slug = $game_post->post_name;

	$parentGame_tax = get_term_by('slug', $game_slug, 'wpunity_asset3d_pgame');
	$parentGame_tax_id = $parentGame_tax->term_id;

	$artifact_tax = get_term_by('slug', 'artifact', 'wpunity_asset3d_cat');
	$artifact_tax_id = $artifact_tax->term_id;
	$artifactTitle = $username . ' Sample Artifact';
	$artifactDesc = 'Artifact item created as sample';

	$door_tax = get_term_by('slug', 'door', 'wpunity_asset3d_cat');
	$door_tax_id = $door_tax->term_id;
	$doorTitle = $username . ' Sample Door';
	$doorDesc = 'Door item created as sample';

	$poiImage_tax = get_term_by('slug', 'pois_imagetext', 'wpunity_asset3d_cat');
	$poiImage_tax_id = $poiImage_tax->term_id;
	$poiImageTitle = $username . ' Sample POI Image';
	$poiImageDesc = 'POI Image item created as sample';

	$poiVideo_tax = get_term_by('slug', 'pois_video', 'wpunity_asset3d_cat');
	$poiVideo_tax_id = $poiVideo_tax->term_id;
	$poiVideoTitle = $username . ' Sample POI Video';
	$poiVideoDesc = 'POI Video item created as sample';

	$site_tax = get_term_by('slug', 'site', 'wpunity_asset3d_cat');
	$site_tax_id = $site_tax->term_id;
	$siteTitle = $username . ' Sample Site';
	$siteDesc = 'Site item created as sample';

	$newArtifact_ID = wpunity_create_asset_frontend($parentGame_tax_id,$artifact_tax_id,$artifactTitle,$artifactDesc,$game_slug);
	$newDoor_ID = wpunity_create_asset_frontend($parentGame_tax_id,$door_tax_id,$doorTitle,$doorDesc,$game_slug);
	$newPOIimage_ID = wpunity_create_asset_frontend($parentGame_tax_id,$poiImage_tax_id,$poiImageTitle,$poiImageDesc,$game_slug);
	$newPOIvideo_ID = wpunity_create_asset_frontend($parentGame_tax_id,$poiVideo_tax_id,$poiVideoTitle,$poiVideoDesc,$game_slug);
	$newSite_ID = wpunity_create_asset_frontend($parentGame_tax_id,$site_tax_id,$siteTitle,$siteDesc,$game_slug);

	wpunity_registrationhook_uploadAssets_noTexture($artifactTitle,$newArtifact_ID,$game_slug,'artifact');
	wpunity_registrationhook_uploadAssets_noTexture($doorTitle,$newDoor_ID,$game_slug,'door');
	wpunity_registrationhook_uploadAssets_noTexture($poiImageTitle,$newPOIimage_ID,$game_slug,'poi_image');
	wpunity_registrationhook_uploadAssets_noTexture($poiVideoTitle,$newPOIvideo_ID,$game_slug,'poi_video');
	wpunity_registrationhook_uploadAssets_noTexture($siteTitle,$newSite_ID,$game_slug,'site');
}

function wpunity_registrationhook_uploadAssets_noTexture($assetTitleForm,$asset_newID,$gameSlug,$assetTypeNumber){
	$has_image = false; $has_video = false;
	if($assetTypeNumber == 'artifact'){
		$mtl_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/artifact/star.mtl");
		$obj_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/artifact/star_yellow.obj");
	}elseif($assetTypeNumber == 'door') {
		$mtl_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/door/door_green.mtl");
		$obj_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/door/door_green.obj");
	}elseif($assetTypeNumber == 'poi_image') {
		$mtl_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/poi_image_text/star.mtl");
		$obj_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/poi_image_text/star_blue.obj");
		$has_image = true;
		$image_content = WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/poi_image_text/image.jpg";
	}elseif($assetTypeNumber == 'poi_video') {
		$mtl_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/poi_video/star.mtl");
		$obj_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/poi_video/star_red.obj");
		$has_video = true;
		$video_content = WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/poi_video/bunny.mp4";
	}elseif($assetTypeNumber == 'site') {
		$mtl_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/Site1/site1.mtl");
		$obj_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/Site1/site1.obj");
	}

	$mtlFile_id = wpunity_upload_AssetText($mtl_content, 'material'.$assetTitleForm, $asset_newID, $gameSlug);
	$mtlFile_filename = basename(get_attached_file($mtlFile_id));

	// OBJ
	$mtlFile_filename_notxt = substr( $mtlFile_filename, 0, -4 );
	$mtlFile_filename_withMTLext = $mtlFile_filename_notxt . '.mtl';
	$obj_content = preg_replace("/.*\b" . 'mtllib' . "\b.*\n/ui", "mtllib " . $mtlFile_filename_withMTLext . "\n", $obj_content);
	$objFile_id = wpunity_upload_AssetText($obj_content, 'obj'.$assetTitleForm, $asset_newID, $gameSlug);

	if($has_image){
		$attachment_id = wpunity_upload_img_vid( $image_content, $asset_newID);
		set_post_thumbnail( $asset_newID, $attachment_id );
	}

	if($has_video){
		$attachment_video_id = wpunity_upload_img_vid( $video_content, $asset_newID);
		update_post_meta( $asset_newID, 'wpunity_asset3d_video', $attachment_video_id );
	}

	// Set value of attachment IDs at custom fields
	update_post_meta($asset_newID, 'wpunity_asset3d_mtl', $mtlFile_id);
	update_post_meta($asset_newID, 'wpunity_asset3d_obj', $objFile_id);

}

//function wpunity_registrationhook_uploadAssets_withTexture($assetTitleForm,$asset_newID,$gameSlug,$assetTypeNumber){
//
//	$texture_content = WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/Site1/site1.jpg";
//	$mtl_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/Site1/site1.mtl");
//	$obj_content = file_get_contents(WP_PLUGIN_DIR . "/WordpressUnity3DEditor/includes/files/samples/Site1/site1.obj");
//
//	$textureFile_id = wpunity_upload_Assetimg64($texture_content, 'texture_'.$assetTitleForm, $asset_newID, $gameSlug);
//	$textureFile_filename = basename(get_attached_file($textureFile_id));
//
//	$mtl_content = preg_replace("/.*\b" . 'map_Kd' . "\b.*/ui", "map_Kd " . $textureFile_filename, $mtl_content);
//	$mtlFile_id = wpunity_upload_AssetText($mtl_content, 'material'.$assetTitleForm, $asset_newID, $gameSlug);
//	$mtlFile_filename = basename(get_attached_file($mtlFile_id));
//
//	// OBJ
//	$mtlFile_filename_notxt = substr( $mtlFile_filename, 0, -4 );
//	$mtlFile_filename_withMTLext = $mtlFile_filename_notxt . '.mtl';
//	$obj_content = preg_replace("/.*\b" . 'mtllib' . "\b.*\n/ui", "mtllib " . $mtlFile_filename_withMTLext . "\n", $obj_content);
//	$objFile_id = wpunity_upload_AssetText($obj_content, 'obj'.$assetTitleForm, $asset_newID, $gameSlug);
//
//	// Set value of attachment IDs at custom fields
//	update_post_meta($asset_newID, 'wpunity_asset3d_mtl', $mtlFile_id);
//	update_post_meta($asset_newID, 'wpunity_asset3d_obj', $objFile_id);
//	update_post_meta( $asset_newID, 'wpunity_asset3d_diffimage', $textureFile_id );
//}

//==========================================================================================================================================
//==========================================================================================================================================
//Important GET functions

function wpunity_get_all_Available_molecules_of_game($scene_id){

	$saved_available_moleculeIDs = get_post_meta($scene_id, 'wpunity_available_molecules', true);
	$available_moleculeIDs = substr($saved_available_moleculeIDs, 1, -1);
	$available_moleculeIDs = explode(',',$available_moleculeIDs);
	$moleculesData = array();
	foreach ($available_moleculeIDs as $moleculeID) {
		$moleculeID = substr($moleculeID, 1, -1);
		$molecule_post = get_post($moleculeID);

		$molecule_type = get_post_meta($moleculeID, 'wpunity_molecule_ChemicalTypeVal', true);
		$molecule_title = $molecule_post->post_title;
		$the_featured_image_ID = $screenimgID = get_post_meta($moleculeID, 'wpunity_asset3d_screenimage', true);
		$the_featured_image_url = wp_get_attachment_url( $the_featured_image_ID );

		$moleculesData[] = ['moleculeID'=>$moleculeID, 'moleculeName'=>$molecule_title, 'moleculeImage'=>$the_featured_image_url, 'moleculeType'=>$molecule_type  ];
	}

	return	$moleculesData;
}

//Get All MOLECULES of specific game by given project ID
function wpunity_get_all_molecules_of_game($project_id) {

	$game_post = get_post($project_id);
	$gameSlug = $game_post->post_name;
	$assetPGame = get_term_by('slug', $gameSlug, 'wpunity_asset3d_pgame');
	$assetPGameID = $assetPGame->term_id;


	$my_posts = get_page_by_path("chemistry-joker",ARRAY_A,'wpunity_game');

	$assetJokerGameId = $my_posts['ID'];

	$moleculesIds = array();


	// Define custom query parameters
	$custom_query_args = array(
		'post_type' => 'wpunity_asset3d',
		'posts_per_page' => -1,
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'wpunity_asset3d_pgame',
				'field'    => 'slug', //'term_id',
				'terms'    => array($gameSlug, "chemistry-joker") //array($assetPGameID, $assetJokerGameId)
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

			$molecule_type = get_post_meta($molecule_id, 'wpunity_molecule_ChemicalTypeVal', true);
			$molecule_title = get_the_title();
			$the_featured_image_ID = $screenimgID = get_post_meta($molecule_id, 'wpunity_asset3d_screenimage', true);
			$the_featured_image_url = wp_get_attachment_url( $the_featured_image_ID );

			$moleculesIds[] = ['moleculeID'=>$molecule_id, 'moleculeName'=>$molecule_title, 'moleculeImage'=>$the_featured_image_url, 'moleculeType'=>$molecule_type  ];
		}
	}

	wp_reset_postdata();
	$wp_query = NULL;

	return $moleculesIds;
}

//Get All DOORS of specific game (from all scenes) by given project ID (parent game ID)
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
			$sceneSlug = get_post()->post_name;

			$scene_json = get_post_meta($scene_id, 'wpunity_scene_json_input', true);
			$jsonScene = htmlspecialchars_decode($scene_json);
			$sceneJsonARR = json_decode($jsonScene, TRUE);

			if (trim($jsonScene) === '')
				continue;

			if (count($sceneJsonARR['objects']) > 0)
				foreach ($sceneJsonARR['objects'] as $key => $value) {
					if ($key !== 'avatarYawObject') {
						if ($value['categoryName'] === 'Door') {
							$doorInfoGathered[] = ['door' => $value['doorName_source'],
							                       'scene' => $sceneTitle,
							                       'sceneSlug'=> $sceneSlug];
						}
					}
				}
		}
	}

	wp_reset_postdata();
	$wp_query = NULL;

	return $doorInfoGathered;
}

function wpunity_get_all_scenesMarker_of_game_fastversion($allScenePGameID){

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
			$sceneSlug = get_post()->post_name;

			$scene_json = get_post_meta($scene_id, 'wpunity_scene_json_input', true);
			$jsonScene = htmlspecialchars_decode($scene_json);

			if (trim($jsonScene)==='')
				continue;

			$sceneJsonARR = json_decode($jsonScene, TRUE);

			if (count($sceneJsonARR['objects']) > 0)
				foreach ($sceneJsonARR['objects'] as $key => $value) {
					if ($key !== 'avatarYawObject') {
						if ($value['categoryName'] === 'Door') {
							$doorInfoGathered[] = ['door' => $value['doorName_source'],
							                       'scene' => $sceneTitle,
							                       'sceneSlug'=> $sceneSlug];
						}
					}
				}
		}
	}

	wp_reset_postdata();
	$wp_query = NULL;

	return $doorInfoGathered;
}


//Get All SCENES (ids) of specific game by given project ID (parent game ID)
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

//==========================================================================================================================================
//==========================================================================================================================================
//UPLOAD images/files

function wpunity_upload_img_vid_directory( $dir ) {
	return array(
		       'path'   => $dir['basedir'] . '/Models',
		       'url'    => $dir['baseurl'] . '/Models',
		       'subdir' => '/Models',
	       ) + $dir;
}


function wpunity_upload_img_vid($file = array(), $parent_post_id, $orientation = null) {



	add_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

	$upload_dir = wp_upload_dir();
	$upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

	add_filter( 'upload_dir', 'wpunity_upload_img_vid_directory' );

	$file_return = wp_handle_upload( $file, array('test_form' => false ) );
	remove_filter( 'upload_dir', 'wpunity_upload_img_vid_directory' );

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
function wpunity_upload_Assetimg64($imagefile, $imgTitle, $parent_post_id, $parentGameSlug, $type) {

	add_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

	$upload_dir = wp_upload_dir();
	$upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

	$hashed_filename = md5( $imgTitle . microtime() ) . '_' . $imgTitle.'.'.$type;

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

function wpunity_remove_allthumbs_sizes( $sizes, $metadata ) {
	return [];
}

//ABOUT MEDIA HANDLE
function wpunity_upload_dir_forAssets( $args ) {

	// Get the current post_id
	$id = ( isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '' );

	if( $id ) {

		if ( get_post_type( $id ) == 'wpunity_asset3d' ) {

			$pathofPost = get_post_meta($id,'wpunity_asset3d_pathData',true);

			$newdir =  '/' . $pathofPost . '/Models';

			$args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
			$args['url']     = str_replace( $args['subdir'], '', $args['url'] );
			$args['subdir']  = $newdir;
			$args['path']   .= $newdir;
			$args['url']    .= $newdir;

		}elseif(get_post_type( $id ) == 'wpunity_scene'){

			$gameterms = get_the_terms( $id , 'wpunity_scene_pgame' );
			$projectSlug = $gameterms[0]->slug;
			// Set the new path depends on current post_type
			$newdir = '/' . $projectSlug . '/Scenes';

			$args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
			$args['url']     = str_replace( $args['subdir'], '', $args['url'] );
			$args['subdir']  = $newdir;
			$args['path']   .= $newdir;
			$args['url']    .= $newdir;
		}else{
			$pathofPost = get_post_meta($id,'wpunity_asset3d_pathData',true);

			$newdir =  '/' . $pathofPost . '/Models';

			$args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
			$args['url']     = str_replace( $args['subdir'], '', $args['url'] );
			$args['subdir']  = $newdir;
			$args['path']   .= $newdir;
			$args['url']    .= $newdir;
		}


	}
	return $args;
}

add_filter( 'upload_dir', 'wpunity_upload_dir_forAssets' );

/**
 * 1.01
 * Overwrite Uploads
 *
 * Upload files with the same namew, without uploading copy with unique filename
 *
 */
function wpunity_overwrite_uploads( $name ){

	if( isset($_REQUEST['post_id']) ) {
		$post_id =  (int)$_REQUEST['post_id'];
	}else{
		$post_id=0;
	}

	$args = array(
		'numberposts'   => -1,
		'post_type'     => 'attachment',
		'meta_query' => array(
			array(
				'key' => '_wp_attached_file',
				'value' => $name,
				'compare' => 'LIKE'
			)
		)
	);
	$attachments_to_remove = get_posts( $args );

	foreach( $attachments_to_remove as $attach ){
		if($attach->post_parent == $post_id) {
			wp_delete_attachment($attach->ID, true);
		}
	}

	return $name;
}

add_filter( 'sanitize_file_name', 'wpunity_overwrite_uploads', 10, 1 );



//DISABLE ALL AUTO-CREATED THUMBS for Assets3D
function wpunity_disable_imgthumbs_assets( $image_sizes ){

	// extra sizes
	$slider_image_sizes = array(  );
	// for ex: $slider_image_sizes = array( 'thumbnail', 'medium' );

	// instead of unset sizes, return your custom size (nothing)
	if( isset($_REQUEST['post_id']) && 'wpunity_asset3d' === get_post_type( $_REQUEST['post_id'] ) )
		return $slider_image_sizes;

	return $image_sizes;
}

add_filter( 'intermediate_image_sizes', 'wpunity_disable_imgthumbs_assets', 999 );

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


add_action( 'wp_ajax_wpunity_fetch_description_action', 'wpunity_fetch_description_action_callback' );

//======================= CONTENT INTERLINKING =========================================================================

function wpunity_fetch_description_action_callback(){

	$fff = fopen("output_wiki.txt","w");
	fwrite($fff, $_POST['externalSource']);


	if ($_POST['externalSource']=='Wikipedia')
		$url = 'https://'.$_POST['lang'].'.wikipedia.org/w/api.php?action=query&format=json&exlimit=3&prop=extracts&'.$_POST['fulltext'].'titles='.$_POST['titles'];
	else
		$url = 'https://www.europeana.eu/api/v2/search.json?wskey=8mfU6ZgfW&query='.$_POST['titles'];//.'&qf=LANGUAGE:'.$_POST['lang'];

	echo  strip_tags(file_get_contents($url));

	fwrite($fff, $_POST['titles']);
	fwrite($fff, htmlspecialchars($_POST['titles']));
	fclose($fff);

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
	$os = 'win';  // Linux Unity3D is crappy  //strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';

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
	
	// Wait 4 seconds to erase previous project before starting compiling the new one
	// to avoiding erroneously take previous files. This is not safe with sleep however.
	// Do not delete library folder if it takes too long
	sleep(2);

	if ($assemply_success == 'true') {

		$init_gcwd = getcwd(); // get cwd (wp-admin probably)
		//-----------------------------

		//--Uploads/myGameProjectUnity--
        
        // Todo: Add more option
        $upload_dir = wp_upload_dir()['basedir']; //
        
        $upload_dir = str_replace('\\','/',$upload_dir);
		$game_dirpath = $upload_dir . '/' . $_REQUEST['gameSlug'] . 'Unity';
        
        $ff = fopen("outputFF.txt","w");
//        fwrite($ff, print_r(wpunity_getUnity_local_or_remote(),true));
//        fwrite($ff, print_r(wpunity_get_ftpCredentials(),true));
//        fwrite($ff, print_r(wpunity_getUnity_exe_folder(),true)."\n");
//        fwrite($ff, print_r(wpunity_getRemote_api_folder(),true)."\n");
//        fwrite($ff, print_r(wpunity_getRemote_server_path(),true)."\n");
        
        
        //fwrite($ff, print_r(wpunity_getUnity_local_or_remote(),true));
        
        $remote_game_server_folder_dir = wpunity_getUnity_local_or_remote()=='local' ?
            $game_dirpath : (wpunity_getRemote_server_path().$_REQUEST['gameSlug'] . 'Unity');
        
        
        //fwrite($ff, $remote_game_server_folder_dir);
        
        //fclose($ff);
        
        
        
        //'C:\xampp\htdocs\COMPILE_UNITY3D_GAMES\\'. $_REQUEST['gameSlug'] . 'Unity' ;
		
		if ($os === 'win') {
			$os_bin = 'bat';
			$txt = '@echo off'."\n"; // change line always with double quote
			$txt .= 'call :spawn "C:\Program Files\Unity\Editor\Unity.exe" -quit -batchmode -logFile "'.
                $remote_game_server_folder_dir.'\stdout.log" -projectPath "'. $remote_game_server_folder_dir . '" -executeMethod HandyBuilder.build';

			$txt .= "\n";
			$txt .= "ECHO %PID%";
			$txt .= "\n";
			$txt .= "exit"; // exit command useful for not showing again the command prompt
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

		} else {
		
//		    // LINUX SERVER
//			$os_bin = 'sh';
//			$txt = "#/bin/bash"."\n".
//			       "projectPath=`pwd`"."\n".
//			       "xvfb-run --auto-servernum --server-args='-screen 0 1024x768x24:32' /opt/Unity/Editor/Unity ".
//			       "-batchmode -nographics -logfile stdout.log -force-opengl -quit -projectPath \${projectPath} -executeMethod HandyBuilder.build";// " -executeMethod HandyBuilder.build";  //;  //. ; "-buildWindowsPlayer ' build/mygame.exe'"; //
//
//			// 2: run sh (nohup     '/dev ...' ensures that it is asynchronous called)
//			$compile_command = 'nohup sh starter_artificial.sh> /dev/null 2>/dev/null & echo $! >>pid.txt';
		}

		// 1 : Generate bat or sh
		$myfile = fopen($game_dirpath.$DS."starter_artificial.".$os_bin, "w") or die("Unable to open file!");
		fwrite($myfile, $txt);
		fclose($myfile);
		chmod($game_dirpath.$DS."starter_artificial.".$os_bin, 0755);

		chdir($game_dirpath);

        $fj = fopen("outputIII.txt","w");

		if ($os === 'win') {
		    if(wpunity_getUnity_local_or_remote() != 'remote') {
                $unity_pid = shell_exec($compile_command);
                $fga = fopen("execution_hint.txt", "w");
                fwrite($fga, $compile_command);
                fclose($fga);
            } else {

		        // remote
		        $ftp_cre = wpunity_get_ftpCredentials();
      
                $ftp_host = $ftp_cre['address'];
                $ftp_user_name = $ftp_cre['username'];
                $ftp_user_pass = $ftp_cre['password'];
                
                $gameProject = $_REQUEST['gameSlug'] . 'Unity';
                
                $zipFile = $gameProject.'.zip';
                
                $gamesFolder = 'COMPILE_UNITY3D_GAMES';
                $remote_file = $gamesFolder.'/'.$zipFile;
                
                $unzip_url = "http://".$ftp_host."/".$gamesFolder.'/unzipper.php?game='.$gameProject."&action=unzip";
                $startCompile_url = "http://".$ftp_host."/".$gamesFolder.'/unzipper.php?game='.$gameProject."&action=start";
                
                // -------------- Zip the project to send it for remote compile -------------------
                    
                    /* Exclude Files */
                    $exclude_files = array();
                    //$exclude_files[] = realpath($zip_file_name);
                    //$exclude_files[] = realpath('zip.php');
                
                    /* Path of current folder, need empty or null param for current folder */
                    $root_path = realpath($game_dirpath);
                
                    /* Initialize archive object */
                    $zip = new ZipArchive();
                    $zip_open = $zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);
                
                    /* Create recursive files list */
                    $files = new RecursiveIteratorIterator(
                        new RecursiveDirectoryIterator($root_path),
                        RecursiveIteratorIterator::LEAVES_ONLY
                    );
                
                    /* For each files, get each path and add it in zip */
                    if (!empty($files)) {
                    
                        foreach ($files as $name => $file) {
                        
                            /* get path of the file */
                            $file_path = $file->getRealPath();
                        
                            /* only if it's a file and not directory, and not excluded. */
                            if (!is_dir($file_path) && !in_array($file_path, $exclude_files)) {
                            
                                /* get relative path */
                //                $file_relative_path = str_replace($root_path, '', $file_path);
                            
                                $file_relative_path = substr($file_path, strlen($root_path) + 1);
                            
                                /* Add file to zip archive */
                                $zip_addfile = $zip->addFile($file_path, $file_relative_path);
                            }
                        }
                    } else {
                        return "ERROR 767: the folder was empty!";
                        wp_die();
                    }
            
                    /* Create ZIP after closing the object. */
                    $zip_close = $zip->close();
                    
                    //--------------- FTP TRANSFER ------------------------------------------------
                
                    /* Connect using basic FTP */
                    $connect_it = ftp_connect($ftp_host);
                    
                    /* Login to FTP */
                    $login_result = ftp_login($connect_it, $ftp_user_name, $ftp_user_pass);
                    
                    $fileHandle = fopen($zipFile, "r");
            
                    if ($login_result === true) {
                        $ret = ftp_nb_fput($connect_it, $remote_file, $fileHandle, FTP_BINARY);
        
                        fwrite($fj, "remote_file FILE:". $remote_file );
                        
                        while ($ret == FTP_MOREDATA) {
                            // Do whatever you want
                            // Call some javascript
                            // Continue uploading...
                            $ret = ftp_nb_continue($connect_it);
                        }
                    
                        /* Close the connection */
                        ftp_close($connect_it);
                    
                        if ($ret == FTP_FAILED) {
                            echo "There was an error uploading the file...";
                            wp_die();
                        } else if ($ret == FTP_FINISHED) {
                            //return true;
                        }
                    }


                fwrite($fj, "UNZIP URL". $unzip_url);
                
                //------------------ UNZIP AND COMPILE --------------------------
            
                if (file_get_contents($unzip_url)) //, array("timeout"=>1), $info) )
                {
                    
                    fwrite($fj, "START COMPILE: " . $startCompile_url);
                    
                    // Start the compiling
                    $unity_pid = file_get_contents($startCompile_url);
    
                    fwrite($fj, "\n" );
                    fwrite($fj, "PROCC:". $unity_pid);
                    fwrite($fj, "\n" );
                    
                } else {
                    echo "<br />Error 798: UNZIPing problem";
                    wp_die();
                }
            
                fwrite($fj, "4 UNZIP and COMPILE");

            }
		} else {
		    // LINUX
//			$res = putenv("HOME=/home/jimver04");
//			shell_exec($compile_command);
//			$fpid = fopen("pid.txt","r");
//			$unity_pid = fgets($fpid);
//			fclose($fpid);
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
    
   

	$os = 'win'; // strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';

	// Monitor stdout.log
	

	if ($os === 'lin') {

//		//pid is the sh process id. First get the xvfbrun process ID
//		$phpcomd1  = exec ("ps -ef | grep Unity | awk ' $3 == \"".$_POST['pid']."\" {print $2;}';");
//
//		// from the xvfbrun process ID get the Unity process ID
//		$phpcomd2 = exec("ps -ef | grep Unity | awk -v myvar=".$phpcomd1." '$3==myvar {print $2;}';");
//
//		$processUnityCSV = exec('ps --no-headers -p ' . $phpcomd2 . ' -o size'); // ,%cpu
//
//		// Write to wp-admin dir the shell_exec cmd result
////        $hf = fopen('output.txt', 'w');
////        fwrite($hf, $phpcomd1);
////        fwrite($hf, $phpcomd2);
////        fclose($hf);
//
//		$processUnityCSV = round(((float)($processUnityCSV))/1000,0);
//
//		if ($processUnityCSV==0)
//			$processUnityCSV = "";
//		else
//			$processUnityCSV = "".$processUnityCSV."";


	} else {
	    if(wpunity_getUnity_local_or_remote() == 'local') {
            //$phpcomd = 'TASKLIST /FI "imagename eq Unity.exe" /v /fo CSV';
            $phpcomd = 'TASKLIST /FI "pid eq ' . $_POST['pid'] . '" /v /fo CSV';
            $processUnityCSV = shell_exec($phpcomd);

            $pathStdOut = $_POST['dirpath']."\stdout.log";

            $stdoutSTR = file_get_contents( $pathStdOut );

            $fo = fopen("output_post_termalogica.txt","w");
            //$product_terms = $_POST['dirpath'].$DS."stdout.log";

            fwrite($fo, "pathStdOut".$pathStdOut );
            fwrite($fo, "stdoutSTR".$stdoutSTR );

            fclose($fo);

            echo json_encode(array('os'=> $os, 'CSV' => $processUnityCSV , "LOGFILE"=>$stdoutSTR));
        }else{
        
            $ftp_cre = wpunity_get_ftpCredentials();
        
            $ftp_host = $ftp_cre['address'];
        
            $gamesFolder = 'COMPILE_UNITY3D_GAMES';
        
            $gameProject = basename($_POST['dirpath']);
            
            $monitorCompile_url = "http://".$ftp_host."/".$gamesFolder."/unzipper.php?action=monitor&game=".$gameProject."&pid=".$_POST['pid'];
            
            $fo = fopen("outputMonitor.txt","w");
            
            fwrite($fo, $monitorCompile_url);
            
            $res = file_get_contents($monitorCompile_url);
            
            echo $res; // json_encode(array('os'=> $os, 'CSV' => $processUnityCSV , "LOGFILE"=>$stdoutSTR));
        }
	}

	

	wp_die();
}

//---- AJAX KILL TASK: KILL COMPILE PROCESS ------
function wpunity_killtask_compiling_action_callback(){
	$DS = DIRECTORY_SEPARATOR;

	$os = 'win'; //strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';

	if ($os === 'lin') {

//		//pid is the sh process id. First get the xvfbrun process ID
//		$phpcomd  = "xvfbrun_ID=$(ps -ef | grep Unity | awk ' $3 == \"".$_POST['pid']."\" {print $2;}');";
//
//		// from the xvfbrun process ID get the Unity process ID
//		$phpcomd .= "unity_pid=$(ps -ef | grep Unity | awk -v myvar=\"\$xvfbrun_ID\" '$3==myvar {print $2;}');";
//
//		// kill Unity
//		$phpcomd .= "kill `echo \"\$unity_pid\"`";
//		$killres = exec($phpcomd);

	}else {
        
        if(wpunity_getUnity_local_or_remote() != 'remote') {
            $phpcomd = 'Taskkill /PID ' . $_POST['pid'] . ' /F';
            $killres = shell_exec($phpcomd);
        } else{
    
            $ftp_cre = wpunity_get_ftpCredentials();
    
            $ftp_host = $ftp_cre['address'];
    
            $gamesFolder = 'COMPILE_UNITY3D_GAMES';
    
            
            
            $stopCompile_url = "http://".$ftp_host."/".$gamesFolder."/unzipper.php?action=stop&pid=".$_POST['pid'];
            
            $fi = fopen("outputSTOP.txt","w");
            fwrite($fi, "stopCompile_url:". $stopCompile_url);
            
            
            
            $killres = file_get_contents($stopCompile_url);
    
            fwrite($fi, "killres:" . $killres);
            fclose($fi);
        }
	}

	echo $killres;
	wp_die();
}

//---- AJAX COMPILE 3: Zip the builds folder ---
function wpunity_game_zip_action_callback()
{
    
    if(wpunity_getUnity_local_or_remote() != 'remote') {
        $DS = DIRECTORY_SEPARATOR;
    
        // TEST
        //$game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_windows';
    
        // Real
        $game_dirpath = $_POST['dirpath']; //realpath(dirname(__FILE__).'/..').$DS.'games_assemble'.$DS.'dune';
    
        $rootPath = realpath($game_dirpath) . '/builds';
        $zip_file = realpath($game_dirpath) . '/game.zip';
    
        $fa = fopen("outputZIP.txt","w");
        fwrite($fa,"ROOTPATH:".$rootPath);
        fwrite($fa, "\n");
        fwrite($fa,"zip_file:".$zip_file);
        fclose($fa);
        
        
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
    } else{
    
        $ftp_cre = wpunity_get_ftpCredentials();
    
        $ftp_host = $ftp_cre['address'];
    
        $gamesFolder = 'COMPILE_UNITY3D_GAMES';
        
        $gameProject = basename($_POST['dirpath']);
        
        $zipBuild_url = "http://".$ftp_host."/".$gamesFolder."/unzipper.php?game=".$gameProject."&action=zipbuild";
        
        echo file_get_contents($zipBuild_url);
        
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

function wpunity_save_scene_async_action_callback()
{
	// put meta in scene. True, false, or id of meta if does not exist
	$res = update_post_meta( $_POST['scene_id'], 'wpunity_scene_json_input', wp_unslash($_POST['scene_json']) );
	$mole = update_post_meta( $_POST['scene_id'], 'wpunity_available_molecules',$_POST['available_molecules']);

	if (isset($_POST['scene_screenshot']))
		$attachment_id = wpunity_upload_Assetimg64($_POST['scene_screenshot'], 'scene_'.$_POST['scene_id'].'_featimg',
			$_POST['scene_id'], get_post($_POST['scene_id'])->post_name, 'jpg' );

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

function wpunity_save_gio_async_action_callback()
{
	// put meta in scene. True, false, or id of meta if does not exist
	$res = update_post_meta( $_POST['project_id'], 'wpunity_project_gioApKey', wp_unslash($_POST['project_gioApKey']) );

//	$attachment_id = wpunity_upload_Assetimg64($_POST['scene_screenshot'], 'scene_'.$_POST['scene_id'].'_featimg',
//		$_POST['scene_id'], get_post($_POST['scene_id'])->post_name );
//
//	set_post_thumbnail( $_POST['scene_id'], $attachment_id );
//
//
//	$scene_new_info = array(
//		'ID' => $_POST['scene_id'],
//		'post_title' => $_POST['scene_title'],
//		'post_content' => $_POST['scene_description']
//	);
//
//	wp_update_post($scene_new_info);

	echo $res ? 'true' : 'false';
	wp_die();
}

function wpunity_save_expid_async_action_callback()
{
	// put meta in scene. True, false, or id of meta if does not exist
	$res = update_post_meta( $_POST['project_id'], 'wpunity_project_expID', wp_unslash($_POST['project_expID']) );

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

//==========================================================================================================================================

/**
 * Make the molecule prefab
 *
 * @param $projectLocalPath :  "C:\\xampp7\htdocs\wordpress\wp-content\uploads\\"
 * @param $projectName      :  "chemtest"
 * @param $molecule_post_id :   "123"
 * @param $molecule_post_name :  "water"
 * @param $pdb_str           :   The string of the pdb file
 */
function addMoleculePrefabToAssets($projectLocalPath, $projectName, $molecule_post_id, $molecule_post_name, $pdb_str ){
    
    //$prefab_path = "C:\\xampp7\htdocs\wordpress\wp-content\uploads\chemtestUnity\Assets\StandardAssets\Prefabs\\";
    $prefab_path = $projectLocalPath."\\".$projectName."Unity\Assets\StandardAssets\Prefabs\\";
    
    $dirMaterials =  $prefab_path."Elements\Transparent";
    $dirMolecules =  $prefab_path."Molecules";
    
    $fh = fopen("outputPREKA.txt","w");
    
    
    fwrite($fh, print_r($pdb_str,true));
    
    // Create the parser class
    $pdbloader = new PDBLoader($pdb_str);
   
    
    
    // parse the pdb into atoms and verticesBonds
    $molecule = $pdbloader->parser();
    
    //fwrite($fh, print_r($molecule,true));
    fclose($fh);
    

    // Make the materials and their metas
    $pdbloader->saveTheMaterial($molecule['atoms'], $dirMaterials);
   
    // Make the prefab and its meta
    $pdbloader->makeThePrefab($molecule_post_id, $molecule_post_name, $molecule['atoms'], $molecule['verticesBonds'], $dirMolecules);
}


?>