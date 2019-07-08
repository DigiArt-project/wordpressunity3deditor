<?php

$gameClass = new GameClass();

class GameClass{
	function __construct(){
		add_action('init', array($this, 'wpunity_games_construct')); //wpunity_game 'GAMES'
		add_action('init', array($this, 'wpunity_games_taxcategory')); //wpunity_game_cat 'GAME CATEGORIES'
		add_action('init', array($this, 'wpunity_games_taxtype')); //wpunity_game_type 'GAME TYPES'
	}

	// Create Game as custom type 'wpunity_game'
	function wpunity_games_construct(){
		$labels = array(
			'name'               => _x( 'Game Projects', 'post type general name'),
			'singular_name'      => _x( 'Game Project', 'post type singular name'),
			'menu_name'          => _x( 'Game Projects', 'admin menu'),
			'name_admin_bar'     => _x( 'Game Project', 'add new on admin bar'),
			'add_new'            => _x( 'Add New', 'add new on menu'),
			'add_new_item'       => __( 'Add New Game Project'),
			'new_item'           => __( 'New Game Project'),
			'edit'               => __( 'Edit'),
			'edit_item'          => __( 'Edit Game Project'),
			'view'               => __( 'View'),
			'view_item'          => __( 'View Game Project'),
			'all_items'          => __( 'All Game Projects'),
			'search_items'       => __( 'Search Game Projects'),
			'parent_item_colon'  => __( 'Parent Game Projects:'),
			'parent'             => __( 'Parent Game Project'),
			'not_found'          => __( 'No Game Projects found.'),
			'not_found_in_trash' => __( 'No Game Projects found in Trash.')
		);
		$args = array(
			'labels'                => $labels,
			'description'           => 'A Game Project consists of several scenes',
			'public'                => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'show_in_nav_menus'     => false,
			'menu_position'     => 26,
			'menu_icon'         =>'dashicons-media-interactive',
			'taxonomies'        => array('wpunity_game_cat' , 'wpunity_game_type'),
			'supports'          => array('title','editor','custom-fields','revisions'),
			'hierarchical'      => false,
			'has_archive'       => false,
			'capabilities' => array(
				'publish_posts' => 'publish_wpunity_game',
				'edit_posts' => 'edit_wpunity_game',
				'edit_others_posts' => 'edit_others_wpunity_game',
				'delete_posts' => 'delete_wpunity_game',
				'delete_others_posts' => 'delete_others_wpunity_game',
				'read_private_posts' => 'read_private_wpunity_game',
				'edit_post' => 'edit_wpunity_game',
				'delete_post' => 'delete_wpunity_game',
				'read_post' => 'read_wpunity_game',
			),
		);
		register_post_type('wpunity_game', $args);
	}

	//==========================================================================================================================================

	// Create Game Category as custom taxonomy 'wpunity_game_cat'
	function wpunity_games_taxcategory(){
		$labels = array(
			'name'              => _x( 'Game Category', 'taxonomy general name'),
			'singular_name'     => _x( 'Game Category', 'taxonomy singular name'),
			'menu_name'         => _x( 'Game Categories', 'admin menu'),
			'search_items'      => __( 'Search Game Categories'),
			'all_items'         => __( 'All Game Categories'),
			'parent_item'       => __( 'Parent Game Category'),
			'parent_item_colon' => __( 'Parent Game Category:'),
			'edit_item'         => __( 'Edit Game Category'),
			'update_item'       => __( 'Update Game Category'),
			'add_new_item'      => __( 'Add New Game Category'),
			'new_item_name'     => __( 'New Game Category')
		);
		$args = array(
			'description' => 'Category of Game',
			'labels'    => $labels,
			'public'    => false,
			'show_ui'   => true,
			'hierarchical' => true,
			'show_admin_column' => true,
			'capabilities' => array (
				'manage_terms' => 'manage_game_cat',
				'edit_terms' => 'manage_game_cat',
				'delete_terms' => 'manage_game_cat',
				'assign_terms' => 'edit_game_cat'
			),
		);
		register_taxonomy('wpunity_game_cat', 'wpunity_game', $args);
	}

	//==========================================================================================================================================

	//Create Game Type as custom taxonomy 'wpunity_game_type'
	function wpunity_games_taxtype(){
		$labels = array(
			'name'              => _x( 'Game Type', 'taxonomy general name'),
			'singular_name'     => _x( 'Game Type', 'taxonomy singular name'),
			'menu_name'         => _x( 'Game Types', 'admin menu'),
			'search_items'      => __( 'Search Game Types'),
			'all_items'         => __( 'All Game Types'),
			'parent_item'       => __( 'Parent Game Type'),
			'parent_item_colon' => __( 'Parent Game Type:'),
			'edit_item'         => __( 'Edit Game Type'),
			'update_item'       => __( 'Update Game Type'),
			'add_new_item'      => __( 'Add New Game Type'),
			'new_item_name'     => __( 'New Game Type')
		);
		$args = array(
			'description' => 'Type of Game Project',
			'labels'    => $labels,
			'public'    => false,
			'show_ui'   => true,
			'hierarchical' => true,
			'show_admin_column' => true,
			'capabilities' => array (
				'manage_terms' => 'manage_game_type',
				'edit_terms' => 'manage_game_type',
				'delete_terms' => 'manage_game_type',
				'assign_terms' => 'edit_game_type'
			),
		);
		register_taxonomy('wpunity_game_type', 'wpunity_game', $args);
	}
}

//==========================================================================================================================================

// Generate Taxonomy (for scenes & assets) with Game's slug/name
// Create Default Scenes for this "Game"
function wpunity_create_folder_game( $new_status, $old_status, $post){

	$post_type = get_post_type($post);
	$gameSlug = $post->post_name;

	global $project_scope;

	if ($post_type == 'wpunity_game' && $new_status == 'publish') {

//        $fh = fopen("output_folder_Game.txt","a");
//        fwrite($fh, $post_type . " " . $new_status ." ". $gameSlug .'\n' );
//        fclose($fh);

		if(($gameSlug != 'archaeology-joker') && ($gameSlug != 'energy-joker') && ($gameSlug != 'chemistry-joker')){

			$gameTitle = $post->post_title;
			$gameID = $post->ID;

			//TEMPORARY
			if ($project_scope === 1) {
				update_post_meta( $gameID, 'wpunity_project_expID', '82a5dc78-dd27-43db-be12-f5440bbc9dd5');
			}

			wp_insert_term(
				'Apple', // the term
				'product', // the taxonomy
				array(
					'description'=> 'A yummy apple.',
					'slug' => 'apple',
				)
			);

			//Create a parent game tax category for the scenes
			wp_insert_term($gameTitle,'wpunity_scene_pgame', array(
					'description'=> 'Scene of a Game',
					'slug' => $gameSlug,
				)
			);

			//Create a parent game tax category for the assets
			wp_insert_term($gameTitle,'wpunity_asset3d_pgame',array(
					'description'=> 'Asset of a Game',
					'slug' => $gameSlug,
				)
			);

			//Create Default Scenes for this "Game"
			wpunity_create_default_scenes_for_game($gameSlug, $gameTitle, $gameID);

			//Available molecules
			$molecules = wpunity_get_all_molecules_of_game($gameID);//ALL available Molecules of a GAME
			$allMolecules = '[';$start = 0;
			foreach ($molecules as $molecule) {
				if($start == 0) {
					$allMolecules = $allMolecules . '"' . $molecule['moleculeID'] . '"';
					$start = 1;
				}else{
					$allMolecules = $allMolecules . ',"' . $molecule['moleculeID'] . '"';
				}
			}
			$allMolecules = $allMolecules . ']';
			update_post_meta($gameID, 'wpunity_exam_enabled_molecules', $allMolecules);


			//Create Sample Data (assets) for the game that auto-created
			$current_user = wp_get_current_user();
			$user_id = $current_user->ID;
			$username = $current_user->user_login;
			//wpunity_registrationhook_createAssets($user_id,$username,$gameID);
			//MALTA remove comments

			// Request keys from GIO
			if ($project_scope === 1) {
				wpunity_createGame_GIO_request( $gameID , $user_id );
			}

        }else{
			$gameTitle = $post->post_title;
			//Create a parent game tax category for the assets
			wp_insert_term($gameTitle,'wpunity_asset3d_pgame',$gameSlug,'Asset of a Game');
		}
	}
}

add_action('transition_post_status','wpunity_create_folder_game',9,3);

//==========================================================================================================================================

?>