<?php

$asset3dClass = new Asset3DClass();

class Asset3DClass{
    public $asset_path = '';
    public $asset_path_url = '';
    public $asset_subdir = '';

    function __construct(){
        add_action('init', array($this, 'wpunity_assets_construct')); //wpunity_asset3d 'ASSETS 3D'
        add_action('init', array($this, 'wpunity_assets_taxcategory')); //wpunity_asset3d_cat 'ASSET TYPES'
        add_action('init', array($this, 'wpunity_assets_taxpgame')); //wpunity_asset3d_pgame 'ASSET GAMES'
        add_action('init', array($this, 'wpunity_assets_taxcategory_ipr')); //wpunity_asset3d_ipr_cat 'ASSET IPR CATEG'
    }

    // Create Asset3D as custom type 'wpunity_asset3d'
    function wpunity_assets_construct(){
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
            'taxonomies' => array('wpunity_asset3d_cat', 'wpunity_asset3d_pgame', 'wpunity_asset3d_ipr_cat'),
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail','revisions','author'),
            'hierarchical' => false,
            'has_archive' => false,
            'capabilities' => array(
                'publish_posts' => 'publish_wpunity_asset3d',
                'edit_posts' => 'edit_wpunity_asset3d',
                'edit_others_posts' => 'edit_others_wpunity_asset3d',
                'delete_posts' => 'delete_wpunity_asset3d',
                'delete_others_posts' => 'delete_others_wpunity_asset3d',
                'read_private_posts' => 'read_private_wpunity_asset3d',
                'edit_post' => 'edit_wpunity_asset3d',
                'delete_post' => 'delete_wpunity_asset3d',
                'read_post' => 'read_wpunity_asset3d',
            ),
        );
        register_post_type('wpunity_asset3d', $args);
    }

    //==========================================================================================================================================

    // Create Asset Category as custom taxonomy
    function wpunity_assets_taxcategory(){
        $labels = array(
            'name' => _x('Asset Type', 'taxonomy general name'),
            'singular_name' => _x('Asset Type', 'taxonomy singular name'),
            'menu_name' => _x('Asset Types', 'admin menu'),
            'search_items' => __('Search Asset Types'),
            'all_items' => __('All Asset Types'),
            'parent_item' => __('Parent Asset Type'),
            'parent_item_colon' => __('Parent Asset Type:'),
            'edit_item' => __('Edit Asset Type'),
            'update_item' => __('Update Asset Type'),
            'add_new_item' => __('Add New Asset Type'),
            'new_item_name' => __('New Asset Type')
        );
        $args = array(
            'description' => 'Type (Category) of 3D asset',
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'hierarchical' => false,
            'show_admin_column' => true,
            'capabilities' => array (
                'manage_terms' => 'manage_asset3d_cat',
                'edit_terms' => 'manage_asset3d_cat',
                'delete_terms' => 'manage_asset3d_cat',
                'assign_terms' => 'edit_asset3d_cat'
            ),
        );
        register_taxonomy('wpunity_asset3d_cat', 'wpunity_asset3d', $args);
    }
    
    //==========================================================================================================================================

    // Create Asset Game as custom taxonomy
    function wpunity_assets_taxpgame(){
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
            'hierarchical' => false,
            'show_admin_column' => true,
            'capabilities' => array (
                'manage_terms' => 'manage_asset3d_pgame',
                'edit_terms' => 'manage_asset3d_pgame',
                'delete_terms' => 'manage_asset3d_pgame',
                'assign_terms' => 'edit_asset3d_pgame'
            ),
        );
        register_taxonomy('wpunity_asset3d_pgame', 'wpunity_asset3d', $args);
    }
    
    // ================================================================
    // Create Asset Category as custom taxonomy
    function wpunity_assets_taxcategory_ipr(){
        $labels = array(
            'name' => _x('Asset IPR', 'taxonomy general name'),
            'singular_name' => _x('Asset IPR', 'taxonomy singular name'),
            'menu_name' => _x('Asset IPR', 'admin menu'),
            'search_items' => __('Search Asset bu IPR'),
            'all_items' => __('All Asset IPR'),
            'parent_item' => __('Parent Asset IPR'),
            'parent_item_colon' => __('Parent Asset IPR:'),
            'edit_item' => __('Edit Asset IPR'),
            'update_item' => __('Update Asset IPR'),
            'add_new_item' => __('Add New Asset IPR'),
            'new_item_name' => __('New Asset IPR')
        );
        $args = array(
            'description' => 'IPR (Category) of 3D asset',
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'hierarchical' => false,
            'show_admin_column' => true,
            'capabilities' => array (
                'manage_terms' => 'manage_asset3d_cat',
                'edit_terms' => 'manage_asset3d_cat',
                'delete_terms' => 'manage_asset3d_cat',
                'assign_terms' => 'edit_asset3d_cat'
            ),
        );
        register_taxonomy('wpunity_asset3d_ipr_cat', 'wpunity_asset3d', $args);
    }
    

}

//==========================================================================================================================================

//Create PathData for each asset as custom field in order to upload files at pathdata/Models folder
function wpunity_create_pathdata_asset( $post_id ){

    $post_type = get_post_type($post_id);

    if ($post_type == 'wpunity_asset3d') {
        $post = get_post($post_id);
        //FORMAT: uploads / slug Game / Models / ...

        $parentGameID = substr($_POST['_wp_http_referer'], strpos($_POST['_wp_http_referer'], 'wpunity_game=') + 13);
        
        if (!is_numeric($parentGameID))
            echo "ERROR 455: ParentGameID is not numberic.";
        
        $fp = fopen("output_savepathdata.txt","w");
        fwrite($fp, print_r($parentGameID,true));
        fclose($fp);
        
        $parentGameID = intval($parentGameID, 10);
        $parentGameSlug = ( $parentGameID > 0 ) ? get_term( $parentGameID, 'wpunity_asset3d_pgame' )->slug : NULL;

        $upload_dirpath = $parentGameSlug;

        update_post_meta($post_id,'wpunity_asset3d_pathData',$upload_dirpath);
    }
}

add_action('save_post','wpunity_create_pathdata_asset',10,3);

//==========================================================================================================================================


function allowAuthorEditing()
{
    add_post_type_support( 'wpunity_asset3d', 'author' );
}

add_action('init','allowAuthorEditing');


add_filter( 'wp_dropdown_users_args', 'change_user_dropdown', 10, 2 );

function change_user_dropdown( $query_args, $r ){
// get screen object
    $screen = get_current_screen();

    // list users whose role is e.g. 'Editor' for 'post' post type
    if( $screen->post_type == 'wpunity_asset3d' ):
    
        if (isset($query_args['who'])) {
            unset($query_args['who']);
        }
        
        $query_args['role__in'] = array('administrator','adv_game_master');
        
        // unset default role
        //unset( $query_args['who'] );
        
    endif;
    

    
  
//    // list users whose role is e.g. 'Administrator' for 'page' post type
//    if( $screen->post_type == 'page' ):
//        $query_args['role'] = array('adv_game_master');
//
//        // unset default role
//        unset( $query_args['who'] );
//    endif;
    
    
    return $query_args;
}


?>
