<?php

$gameClass = new GameClass();

class GameClass{
    function __construct(){
        add_action('init', array($this, 'wpunity_games_construct')); //wpunity_game
        add_action('init', array($this, 'wpunity_games_taxcategory')); //wpunity_game_cat
    }

    /**
     * B1.01
     * Create Game
     *
     * Game as custom type 'wpunity_game'
     */
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
            'taxonomies'        => array('wpunity_game_cat'),
            'supports'          => array('title','editor','custom-fields'),
            'hierarchical'      => false,
            'has_archive'       => false,
        );

        register_post_type('wpunity_game', $args);

    }

    //==========================================================================================================================================

    /**
     * B1.02
     * Create Game Category
     *
     * Category of Games as custom taxonomy 'wpunity_game_cat'
     */
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
            'show_admin_column' => true
        );

        register_taxonomy('wpunity_game_cat', 'wpunity_game', $args);

    }
}

//==========================================================================================================================================

/**
 * B1.03
 * Generate folder and Taxonomy (for scenes) with Game's slug/name
 *
 * Generate a folder in media to store assets named as the permalink of the game
 * Generate taxonomy with for Scene usage (wpunity_scene_pgame)
 */

function wpunity_create_folder_game( $new_status, $old_status, $post ){

    $post_type = get_post_type($post);

    if ($post_type == 'wpunity_game') {
        if ( $new_status == 'publish' ) {

            //FORMAT: uploads / slug Game

            $gameSlug = $post->post_name;
            $gameTitle = $post->post_title;
            $gameID = $post->ID;

            //Create "Game" folder inside upload (without meta file)
            wpunity_create_folder_withmeta('game','','',$gameSlug,$gameID);

            //Create a parent game tax category for the scenes
            wp_insert_term($gameTitle,'wpunity_scene_pgame',$gameSlug,'Scene of a Game');

            //Create Default Scenes for this "Game"
            wpunity_create_default_scenes_for_game($gameSlug,$gameTitle,$gameID);

        }else{
            //TODO It's not a new Game so DELETE everything (folder & taxonomy)
        }

    }
}

add_action('transition_post_status','wpunity_create_folder_game',9,3);

//==========================================================================================================================================

?>