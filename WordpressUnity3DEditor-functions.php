<?php
/**
 * Plugin Name: WordpressUnity3DEditor
 * Plugin URI: http://yoursite.com
 * Description: functions for VR actions that are added to the main functions.php
 * Author: Dimitrios Ververidis
 * Author URI: http://yoursite.com
 * Version: 0.1.5
 */

/*
 * Change root .htaccess for uploading big data files
 *
 * php_value upload_max_filesize 64M
php_value post_max_size 64M
php_value max_execution_time 300
php_value max_input_time 300
 *
 *
 */

// TODO: The following necessary things to maintain folders structure

// TODO: Do not allow Games to contain posts with the same name
// TODO: Do not allow Scenes to contain posts with the same name
// TODO: Do not allow Assets3D to contain posts with the same name


// TODO: Do not allow Scenes to be saved if they do not have a category selected (Game they belong to)
// TODO: Do not allow Assets3D to be saved if they do not have a category selected (Asset3d Type they belong to)
// TODO: Do not allow Assets3D to be saved if they do not have a category selected (Scene they belong to)

//================ Templates ===========================



/**
 * Scene cpt
 */
require_once ( plugin_dir_path( __FILE__ ) . 'includes/SceneTemplateClass.php');
$sceneTemplateClass = new SceneTemplateClass();




//=====================================================

//1.01 Overwrite Uploads
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-functions.php' );


//2.01 Create Assets
//2.02 Create Asset Category
//2.03 Create Asset Scene
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets-tax.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets-data.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets-viewer.php' );

//3.01 Create Initial Asset Categories
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-insertData.php' );
register_activation_hook( __FILE__, 'wpunity_assets_taxcategory_fill' );

/**
 * Game cpt
 */
require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-games.php');

require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-games-data.php');




include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes.php');

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes-tax.php' );


// ===================== Obsolete ===================================



/**
 * Allow JSON file type to be uploaded.
 *
 * @param $mime_types
 *
 * @return mixed
 */
function my_myme_types($mime_types){
    $mime_types['json'] = 'text/json';
    $mime_types['obj'] = 'text/plain';
    $mime_types['mp4'] = 'video/mp4';
    $mime_types['mtl'] = 'application/mtl';
    $mime_types['fbx'] = 'application/fbx';
    $mime_types['mat'] = 'application/mat';
    return $mime_types;
}

add_filter('upload_mimes', 'my_myme_types', 1, 1);



//Scripts about Upload button in Metaboxes
add_action('plugins_loaded', function(){
    if($GLOBALS['pagenow']=='post.php'){
        add_action('admin_print_scripts', 'my_admin_scripts');
        add_action('admin_print_styles',  'my_admin_styles');
    }
});

function my_admin_scripts() { wp_enqueue_script('jquery');    wp_enqueue_script('media-upload');   wp_enqueue_script('thickbox'); }   //  //wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));  wp_enqueue_script('my-upload');
function my_admin_styles()  { wp_enqueue_style('thickbox'); }

?>