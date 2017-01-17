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



//================================= Scene YAML Templates ===================================

/*
custom type : wpunity_yamltemp
custom taxonomy : wpunity_yamltemp_cat
custom fields :
        Occlusion Culling Settings -> wpunity_yamltemp_scene_ocs
        Render Settings -> wpunity_yamltemp_scene_rs
        LightMap Settings -> wpunity_yamltemp_scene_lms
        NavMesh Settings -> wpunity_yamltemp_scene_nms
        First Person Prefab -> wpunity_yamltemp_scene_fps
        Light Pattern -> wpunity_yamltemp_scene_light

        Static Object Pattern -> wpunity_yamltemp_scene_sop
        Dynamic Object Pattern -> wpunity_yamltemp_scene_dop
        Door Pattern -> wpunity_yamltemp_scene_doorp
        POI Pattern -> wpunity_yamltemp_scene_poip

        Folder.meta Pattern -> wpunity_yamltemp_scene_fdp
        obj.meta Pattern -> wpunity_yamltemp_scene_odp
        mat.meta Pattern -> wpunity_yamltemp_scene_mdp
        jpg.meta Pattern -> wpunity_yamltemp_scene_jdp
        js.meta Pattern -> wpunity_yamltemp_scene_jsdp

        Material (.mat) Pattern -> wpunity_yamltemp_scene_matp

        Door Javascript (.js) Pattern -> wpunity_yamltemp_scene_doorjsp
*/

wp_register_style( 'wpunity_backend', plugins_url('wordpressunity3deditor/css/wpunity_backend.css' ));



//A1.01 Create Scene YAML Template (custom type : wpunity_yamltemp)
//A1.02 Create Scene YAML Template Category (custom taxonomy : wpunity_yamltemp_cat)
require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-yamltemp.php');

//A2.01 Create YAML Template Category Box @ YAML Template's backend (dropdown style)
//A2.02 Save Data from Box
//A2.03 Initial Terms - TO BE REMOVED TODO
require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-yamltemp-tax.php');

//A3.01 Initial Values for all Custom Fields
//A3.02 Create 5 metaboxes with Custom Fields ($wpunity_databox2a,$wpunity_databox2b,$wpunity_databox2c,$wpunity_databox2d,$wpunity_databox2e)
//A3.03 Add and Show those 5 metaboxes
//A3.04 Save data from those 5 metaboxes
require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-yamltemp-data.php');


//===================================== Games ============================================

/*
custom type : wpunity_game
custom taxonomy : wpunity_game_cat
custom fields :
        Latitude -> wpunity_game_lat
        Longitude -> wpunity_game_lng
*/

//B1.01 Create Game (custom type : wpunity_game)
//B1.02 Create Game Category (custom taxonomy : wpunity_game_cat)
//B1.03 Generate folder and Taxonomy (for scenes) with Game's slug/name TODO
require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-games.php');

//B2.01 Create Game Category Box @ Gamee's backend (dropdown style)
//B2.02 Save Data from Box
//B2.03 Initial Terms - TO BE REMOVED TODO
require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-games-tax.php');

//B3.01 Create metabox with Custom Fields ($wpunity_databox3)
//A3.02 Add and Show this metabox
//A3.03 Save data from this metabox
require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-games-data.php');


//===================================== Scenes ============================================

/*
custom type : wpunity_scene
custom taxonomy : wpunity_scene_pgame
custom fields :
        ? -> wpunity_game_lat
        ? -> wpunity_game_lng
*/

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes.php');

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes-tax.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes-data.php' );









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


/**
 * Game cpt
 */




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