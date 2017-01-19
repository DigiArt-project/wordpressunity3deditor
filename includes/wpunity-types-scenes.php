<?php

$sceneClass = new SceneClass();

class SceneClass
{

    function __construct()
    {
        add_action('init', array($this, 'wpunity_scenes_construct')); //wpunity_scene
        add_action('init', array($this, 'wpunity_scenes_taxpgame')); //wpunity_scene_pgame

//        add_filter('geodir_custom_field_input_textarea', array($this,'scene_json_textarea_prolong'), 10, 1);
    }

    /**
     * C1.01
     * Create Scene
     *
     * Scene as custom type 'wpunity_scene'
     */
    function wpunity_scenes_construct()
    {

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
            'taxonomies' => array('wpunity_scene_pgame'),
            'supports' => array('title', 'editor', 'custom-fields'),
            'hierarchical' => false,
            'has_archive' => false,
        );

        register_post_type('wpunity_scene', $args);
    }

    //==========================================================================================================================================

    /**
     * C1.02
     * Create Scene Game
     *
     * Game that the Scene belongs as custom taxonomy 'wpunity_scene_pgame'
     */
    function wpunity_scenes_taxpgame()
    {

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

}

//==========================================================================================================================================

/**
 * C1.03
 * Generate folder and Taxonomy (for assets3d) with Scene's slug/name
 *
 * Generate a folder in media to store assets named as the permalink of the scene
 * Generate taxonomy for Asset3d usage (wpunity_asset3d_pscene)
 */

function wpunity_create_folder_scene( $new_status, $old_status, $post ){

    $post_type = get_post_type($post);


    if ($post_type == 'wpunity_scene') {
        if ( ($new_status == 'publish') ) {

            //FORMAT: uploads / slug Game / slug Scene / slug Category of Asset (standard)

            //slug Scene
            $sceneSlug = $post->post_name;
            $sceneTitle = $post->post_title;

            //slug Game
            $parentGameID = intval($_POST['wpunity_scene_pgame'], 10);
            $parentGameSlug = ( $parentGameID > 0 ) ? get_term( $parentGameID, 'wpunity_scene_pgame' )->slug : NULL;

            $upload = wp_upload_dir();
            $upload_dir = $upload['basedir'];
            $upload_dir .= "/" . $parentGameSlug;
            $upload_dir .= "/" . $sceneSlug;

            $upload_dir = str_replace('\\','/',$upload_dir);

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755);
            }

            //Create a parent scene tax category for the assets3d
            wp_insert_term($sceneTitle,'wpunity_asset3d_pscene',$sceneSlug,'Scene assignment of Asset 3D');

            //Create Subfolders for assets to be uploaded
            $newDir1 = $upload_dir . '/' . 'dynamic3dmodels';
            $newDir2 = $upload_dir . '/' . 'doors';
            $newDir3 = $upload_dir . '/' . 'pois';
            $newDir4 = $upload_dir . '/' . 'static3dmodels';

            if (!is_dir($newDir1)) {mkdir($newDir1, 0755);}
            if (!is_dir($newDir2)) {mkdir($newDir2, 0755);}
            if (!is_dir($newDir3)) {mkdir($newDir3, 0755);}
            if (!is_dir($newDir4)) {mkdir($newDir4, 0755);}
        }else{
            //TODO It's not a new Game so DELETE everything (folder & taxonomy)
        }

    }
}

add_action('transition_post_status','wpunity_create_folder_scene',10,3);

//==========================================================================================================================================

?>