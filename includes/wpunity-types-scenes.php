<?php

$sceneClass = new SceneClass();

class SceneClass{

    function __construct(){
        add_action('init', array($this, 'wpunity_scenes_construct')); //wpunity_scene 'SCENES'
        add_action('init', array($this, 'wpunity_scenes_taxpgame')); //wpunity_scene_pgame  'SCENE GAMES'
        add_action('init', array($this, 'wpunity_scenes_taxyaml')); //wpunity_scene_yaml 'SCENE TYPES'
    }

    // Create Scene - Scene as custom type 'wpunity_scene'
    function wpunity_scenes_construct(){
        $labels = array(
            'name' => _x('Scenes', 'post type general name'),
            'singular_name' => _x('Scene', 'post type singular name'),
            'menu_name' => _x('Scenes', 'admin menu'),
            'name_admin_bar' => _x('Scene', 'add new on admin bar'),
            'add_new' => _x('Add New', 'add new on menu'),
            'add_new_item' => __('Add New Scene'),
            'new_item' => __('New Scene'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Scene'),
            'view' => __('View'),
            'view_item' => __('View Scene'),
            'all_items' => __('All Scenes'),
            'search_items' => __('Search Scenes'),
            'parent_item_colon' => __('Parent Scenes:'),
            'parent' => __('Parent Scene'),
            'not_found' => __('No Scenes found.'),
            'not_found_in_trash' => __('No Scenes found in Trash.')
        );
        $args = array(
            'labels' => $labels,
            'description' => 'Displays several Scenes of a Game',
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'show_in_nav_menus' => false,
            'menu_position' => 25,
            'menu_icon' => 'dashicons-media-default',
            'taxonomies' => array('wpunity_scene_pgame','wpunity_scene_yaml'),
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
            'hierarchical' => false,
            'has_archive' => false,
        );
        register_post_type('wpunity_scene', $args);
    }

    //==========================================================================================================================================

    // Create Scene Game - Game that the Scene belongs as custom taxonomy 'wpunity_scene_pgame'
    function wpunity_scenes_taxpgame(){
        $labels = array(
            'name' => _x('Scene Game', 'taxonomy general name'),
            'singular_name' => _x('Scene Game', 'taxonomy singular name'),
            'menu_name' => _x('Scene Games', 'admin menu'),
            'search_items' => __('Search Scene Games'),
            'all_items' => __('All Scene Games'),
            'parent_item' => __('Parent Scene Game'),
            'parent_item_colon' => __('Parent Scene Game:'),
            'edit_item' => __('Edit Scene Game'),
            'update_item' => __('Update Scene Game'),
            'add_new_item' => __('Add New Scene Game'),
            'new_item_name' => __('New Scene Game')
        );
        $args = array(
            'description' => 'Game that the Scene belongs',
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'hierarchical' => true,
            'show_admin_column' => true
        );
        register_taxonomy('wpunity_scene_pgame', 'wpunity_scene', $args);
    }

    // Create Scene YAML Template - YAML Template that the Scene belongs as custom taxonomy 'wpunity_scene_yaml'
    function wpunity_scenes_taxyaml(){
        $labels = array(
            'name' => _x('Scene Type', 'taxonomy general name'),
            'singular_name' => _x('Scene Type', 'taxonomy singular name'),
            'menu_name' => _x('Scene Types', 'admin menu'),
            'search_items' => __('Search Scene Types'),
            'all_items' => __('All Scene Types'),
            'parent_item' => __('Parent Scene Type'),
            'parent_item_colon' => __('Parent Scene Type:'),
            'edit_item' => __('Edit Scene Type'),
            'update_item' => __('Update Scene Type'),
            'add_new_item' => __('Add New Scene Type'),
            'new_item_name' => __('New Scene Type')
        );
        $args = array(
            'description' => 'Scene Type (YAML Template) that the Scene belongs',
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'hierarchical' => true,
            'show_admin_column' => true
        );
        register_taxonomy('wpunity_scene_yaml', 'wpunity_scene', $args);
    }

}

//==========================================================================================================================================

?>