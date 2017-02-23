<?php

$sceneClass = new SceneClass();

class SceneClass
{

    function __construct()
    {
        add_action('init', array($this, 'wpunity_scenes_construct')); //wpunity_scene
        add_action('init', array($this, 'wpunity_scenes_taxpgame')); //wpunity_scene_pgame
        add_action('init', array($this, 'wpunity_scenes_taxyaml')); //wpunity_scene_yaml
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
            'taxonomies' => array('wpunity_scene_pgame','wpunity_scene_yaml'),
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

    /**
     * C1.03
     * Create Scene YAML Template
     *
     * YAML Template that the Scene belongs as custom taxonomy 'wpunity_scene_yaml'
     */
    function wpunity_scenes_taxyaml(){

        $labels = array(
            'name' => _x('Scene YAML', 'taxonomy general name'),
            'singular_name' => _x('Scene YAML', 'taxonomy singular name'),
            'menu_name' => _x('Scene YAMLs', 'admin menu'),
            'search_items' => __('Search Scene YAMLs'),
            'all_items' => __('All Scene YAMLs'),
            'parent_item' => __('Parent Scene YAML'),
            'parent_item_colon' => __('Parent Scene YAML:'),
            'edit_item' => __('Edit Scene YAML'),
            'update_item' => __('Update Scene YAML'),
            'add_new_item' => __('Add New Scene YAML'),
            'new_item_name' => __('New Scene YAML')
        );

        $args = array(
            'description' => 'YAML Template that the Scene belongs',
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

/**
 * C1.04
 * Generate folder and Taxonomy (for assets3d) with Scene's slug/name
 *
 * Generate a folder in media to store assets named as the permalink of the scene
 * Generate taxonomy for Asset3d usage (wpunity_asset3d_pscene)
 */

function wpunity_create_folder_scene( $new_status, $old_status, $post ){

    $post_type = get_post_type($post);

    if ($post_type == 'wpunity_scene') {
        if ( ($new_status == 'publish') && ($old_status != 'new') ) {

            //FORMAT: uploads / slug Game / slug Scene / slug Category of Asset (standard)

            //slug Scene
            $sceneSlug = $post->post_name;
            $sceneTitle = $post->post_title;
            $sceneID = $post->ID;

            //slug Game
            $parentGameID = intval($_POST['wpunity_scene_pgame'], 10);
            $parentGameSlug = ( $parentGameID > 0 ) ? get_term( $parentGameID, 'wpunity_scene_pgame' )->slug : NULL;

            $upload = wp_upload_dir();
            $upload_dir = $upload['basedir'];
            $upload_dir .= "/" . $parentGameSlug;   $file_dir = $upload_dir;//save this for asset folder's meta
            $upload_dir .= "/" . $sceneSlug;

            $upload_dir = str_replace('\\','/',$upload_dir);

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755);
            }

            //get template for folder.meta
            //get (all) the custom post type with Taxonomy's 'equal' slug (YAML template)
            //get (all) the custom post type with Taxonomy's 'equal' slug (Scene)
//            $custom_args = array(
//                'name'        => $parentGameSlug,
//                'post_type'   => 'wpunity_game',
//            );
//            $my_posts = get_posts($custom_args);
//            $gameID = $my_posts[0]->ID;
//
//            $parentGameTemplate = wp_get_post_terms( $gameID, 'wpunity_game_cat');
//            $templateSlug = $parentGameTemplate[0]->slug;
//            $custom_args2 = array(
//                'name'        => $templateSlug,
//                'post_type'   => 'wpunity_yamltemp',
//            );
//            $my_posts2 = get_posts($custom_args2);

            $parentSceneYAML = wp_get_post_terms( $sceneID, 'wpunity_scene_yaml');
            $templateSlug = $parentSceneYAML[0]->slug;
            $custom_args2 = array(
                'name'        => $templateSlug,
                'post_type'   => 'wpunity_yamltemp',
            );
            $my_posts2 = get_posts($custom_args2);
            $templateID = $my_posts2[0]->ID;

            $templatePart = get_post_meta( $templateID, 'wpunity_yamltemp_scene_fdp', true );
            
            //create folder.meta for Scene-folder (meta file has same path as folder)
            $file_dir = str_replace('\\','/',$file_dir);
            $file_dir .= '/' . $sceneSlug .'.meta';//path and 'folder_name'.meta

            $create_file = fopen($file_dir, "w") or die("Unable to open file!");

            $myfile_text = wpunity_replace_foldermeta($templatePart,$sceneID);
            fwrite($create_file, $myfile_text);
            fclose($create_file);

            /**************** .UNITY FILE CREATION **************************/
            $unityfile_dir = $upload_dir . '/' . $sceneSlug .'.unity';//path and 'folder_name'.meta
            $unitycreate_file = fopen($unityfile_dir, "w") or die("Unable to open file!");
            $unityfile_text = wpunity_replace_unityfile($templateID,$sceneID);
            fwrite($unitycreate_file, $unityfile_text);
            fclose($unitycreate_file);
            /****************************************************************/


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

            $file1_text = wpunity_replace_foldermeta($templatePart,'a'. $sceneID);
            $file2_text = wpunity_replace_foldermeta($templatePart,'b'. $sceneID);
            $file3_text = wpunity_replace_foldermeta($templatePart,'c'. $sceneID);
            $file4_text = wpunity_replace_foldermeta($templatePart,'d'. $sceneID);
            $create_file1 = fopen($upload_dir . '/dynamic3dmodels.meta', "w") or die("Unable to open file!");
            fwrite($create_file1, $file1_text);
            fclose($create_file1);

            $create_file2 = fopen($upload_dir . '/doors.meta', "w") or die("Unable to open file!");
            fwrite($create_file2, $file2_text);
            fclose($create_file2);

            $create_file3 = fopen($upload_dir . '/pois.meta', "w") or die("Unable to open file!");
            fwrite($create_file3, $file3_text);
            fclose($create_file3);

            $create_file4 = fopen($upload_dir . '/static3dmodels.meta', "w") or die("Unable to open file!");
            fwrite($create_file4, $file4_text);
            fclose($create_file4);

        }else{
            //TODO It's not a new Game so DELETE everything (folder & taxonomy)
        }

    }
}

add_action('transition_post_status','wpunity_create_folder_scene',10,3);

//==========================================================================================================================================


/**
 * C1.05
 *
 *
 *
 *
 */

function wpunity_create_unity_scene( $new_status, $old_status, $post ){

    $post_type = get_post_type($post);

    if ($post_type == 'wpunity_scene') {
        if ( ($old_status == 'publish') && ($new_status != 'trash') ) {

            //FORMAT: uploads / slug Game / slug Scene / slug Category of Asset (standard)

            //slug Scene
            $sceneSlug = $post->post_name;
            $sceneID = $post->ID;

            //slug Game
            $parentGameID = intval($_POST['wpunity_scene_pgame'], 10);
            $parentGameSlug = ( $parentGameID > 0 ) ? get_term( $parentGameID, 'wpunity_scene_pgame' )->slug : NULL;

            $upload = wp_upload_dir();
            $upload_dir = $upload['basedir'];
            $upload_dir .= "/" . $parentGameSlug;   $file_dir = $upload_dir;//save this for asset folder's meta
            $upload_dir .= "/" . $sceneSlug;

            $upload_dir = str_replace('\\','/',$upload_dir);

            //get yaml template
            $parentSceneYAML = wp_get_post_terms( $sceneID, 'wpunity_scene_yaml');
            $templateSlug = $parentSceneYAML[0]->slug;
            $custom_args2 = array(
                'name'        => $templateSlug,
                'post_type'   => 'wpunity_yamltemp',
            );
            $my_posts2 = get_posts($custom_args2);
            $templateID = $my_posts2[0]->ID;

            $jsonScene = get_post_meta( $sceneID, 'wpunity_scene_json_input', true);

            /******** .UNITY FILE CREATION WITH ASSETS ***********************/
            $unityfile_dir = $upload_dir . '/' . $sceneSlug .'.unity';//path and 'folder_name'.meta
            unlink($unityfile_dir);//DELETE old unity file
            $unitycreate_file = fopen($unityfile_dir, "w") or die("Unable to open file!");
            $unityfile_text = wpunity_replace_unityfile_withAssets($templateID,$sceneID,$jsonScene);
            fwrite($unitycreate_file, $unityfile_text);
            fclose($unitycreate_file);
            /****************************************************************/



        }

    }
}

add_action('transition_post_status','wpunity_create_unity_scene',10,3);

//==========================================================================================================================================


?>