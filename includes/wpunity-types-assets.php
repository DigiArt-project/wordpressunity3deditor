<?php

$asset3dClass = new Asset3DClass();

class Asset3DClass{
    public $asset_path = '';
    public $asset_path_url = '';
    public $asset_subdir = '';

    function __construct(){
        add_action('init', array($this, 'wpunity_assets_construct')); //wpunity_asset3d
        add_action('init', array($this, 'wpunity_assets_taxcategory')); //wpunity_asset3d_cat
        add_action('init', array($this, 'wpunity_assets_taxpgame')); //wpunity_asset3d_pgame
    }

    /**
     * D1.01
     * Create Asset3D
     *
     * Asset3D as custom type 'wpunity_asset3d'
     */
    function wpunity_assets_construct()
    {

        $labels = array(
            'name' => _x('Assets 3D', 'post type general name'),
            'singular_name' => _x('Asset 3D', 'post type singular name'),
            'menu_name' => _x('Assets 3D', 'admin menu'),
            'name_admin_bar' => _x('Asset 3D', 'add new on admin bar'),
            'add_new' => _x('Add New', 'add new on menu'),
            'add_new_item' => __('Add New Asset 3D'),
            'new_item' => __('New Asset 3D'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Asset 3D'),
            'view' => __('View'),
            'view_item' => __('View Asset 3D'),
            'all_items' => __('All Assets 3D'),
            'search_items' => __('Search Assets 3D'),
            'parent_item_colon' => __('Parent Assets 3D:'),
            'parent' => __('Parent Asset 3D'),
            'not_found' => __('No Assets 3D found.'),
            'not_found_in_trash' => __('No Assets 3D found in Trash.')
        );

        $args = array(
            'labels' => $labels,
            'description' => 'Displays Assets 3D',
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'show_in_nav_menus' => false,
            'menu_position' => 25,
            'menu_icon' => 'dashicons-editor-textcolor',
            'taxonomies' => array('wpunity_asset3d_cat', 'wpunity_asset3d_pgame'),
            'supports' => array('title', 'editor', 'custom-fields'),
            'hierarchical' => false,
            'has_archive' => false,
        );

        register_post_type('wpunity_asset3d', $args);
    }

    //==========================================================================================================================================

    /**
     * D1.02
     * Create Asset Category
     *
     * Category of 3D asset as custom taxonomy
     */
    function wpunity_assets_taxcategory()
    {

        $labels = array(
            'name' => _x('Asset Category', 'taxonomy general name'),
            'singular_name' => _x('Asset Category', 'taxonomy singular name'),
            'menu_name' => _x('Asset Categories', 'admin menu'),
            'search_items' => __('Search Asset Categories'),
            'all_items' => __('All Asset Categories'),
            'parent_item' => __('Parent Asset Category'),
            'parent_item_colon' => __('Parent Asset Category:'),
            'edit_item' => __('Edit Asset Category'),
            'update_item' => __('Update Asset Category'),
            'add_new_item' => __('Add New Asset Category'),
            'new_item_name' => __('New Asset Category')
        );

        $args = array(
            'description' => 'Category of 3D asset',
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'hierarchical' => true,
            'show_admin_column' => true
        );

        register_taxonomy('wpunity_asset3d_cat', 'wpunity_asset3d', $args);

    }

    //==========================================================================================================================================

    /**
     * D1.03
     * Create Asset Game
     *
     * Select To Which Game it belongs to (as custom taxonomy)
     */
    function wpunity_assets_taxpgame()
    {

        // 2. Select To Which Scenes it belongs to
        $labels = array(
            'name' => _x('Asset Game', 'taxonomy general name'),
            'singular_name' => _x('Asset Game', 'taxonomy singular name'),
            'menu_name' => _x('Asset Games', 'admin menu'),
            'search_items' => __('Search Asset Games'),
            'all_items' => __('All Asset Games'),
            'parent_item' => __('Parent Asset Game'),
            'parent_item_colon' => __('Parent Asset Game:'),
            'edit_item' => __('Edit Asset Game'),
            'update_item' => __('Update Asset Game'),
            'add_new_item' => __('Add New Asset Game'),
            'new_item_name' => __('New Asset Game')
        );

        $args = array(
            'description' => 'Game assignment of Asset 3D',
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'hierarchical' => true,
            'show_admin_column' => true
        );

        register_taxonomy('wpunity_asset3d_pgame', 'wpunity_asset3d', $args);
    }

    //==========================================================================================================================================

}

//==========================================================================================================================================

/**
 * D1.04
 * Generate folders for Asset
 *
 *
 *
 */

function wpunity_create_folder_asset( $new_status, $old_status, $post ){

    $post_type = get_post_type($post);


    if ($post_type == 'wpunity_asset3d') {
        if ( ($new_status == 'publish') ) {

            //FORMAT: uploads / slug Game / slug Scene / slug Category of Asset (standard) / slug Asset

            //slug Asset
            $assetSlug = $post->post_name;
            $assetID = $post->ID;

            //slug Scene
            $parentSceneID = intval($_POST['wpunity_asset3d_pgame'], 10);
            $parentSceneSlug = ( $parentSceneID > 0 ) ? get_term( $parentSceneID, 'wpunity_asset3d_pgame' )->slug : NULL;

            //wpunity_create_folder_withmeta('asset',$assetSlug,$assetID,$parentSceneSlug,$parentSceneID);

        }else{
            //TODO It's not a new Game so DELETE everything (folder & taxonomy)
        }

    }
}

add_action('transition_post_status','wpunity_create_folder_asset',10,3);


/**
 * D1.05
 * Create PathData for each asset as custom field
 *
 *
 *
 */

function wpunity_create_pathdata_asset( $post_id ){

    $post_type = get_post_type($post_id);

    if ($post_type == 'wpunity_asset3d') {
        $post = get_post($post_id);
        //FORMAT: uploads / slug Game / slug Scene / slug Category of Asset (standard) / slug Asset

        //slug Asset
        $assetSlug = $post->post_name;

        //slug Scene
        $parentSceneID = intval($_POST['wpunity_asset3d_pgame'], 10);
        $parentSceneSlug = ( $parentSceneID > 0 ) ? get_term( $parentSceneID, 'wpunity_asset3d_pgame' )->slug : NULL;

        //get (all) the custom post type with Taxonomy's 'equal' slug (Scene)
        $custom_args = array(
            'name'        => $parentSceneSlug,
            'post_type'   => 'wpunity_scene',
        );
        $my_posts = get_posts($custom_args);
        $sceneID = $my_posts[0]->ID;

        //slug Game (first taxonomy item)
        $terms = wp_get_post_terms( $sceneID, 'wpunity_scene_pgame');
        $gameID = $terms[0]->slug;

        //Category of Asset (standard)
        $categoryAssetID = intval($_POST['wpunity_asset3d_cat'], 10);
        $categoryAssetSlug = ( $categoryAssetID > 0 ) ? get_term( $categoryAssetID, 'wpunity_asset3d_cat' )->slug : NULL;

        $upload_dirpath = $gameID . "/" .  $parentSceneSlug . "/" . $categoryAssetSlug . "/" . $assetSlug;

        update_post_meta($post_id,'wpunity_asset3d_pathData',$upload_dirpath);
    }
}

add_action('save_post','wpunity_create_pathdata_asset',10,3);

//==========================================================================================================================================

?>