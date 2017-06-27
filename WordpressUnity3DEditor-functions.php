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
 *
php_value upload_max_filesize 256M
php_value post_max_size 512M
php_value max_input_time 2400

// in php you can check their values with

echo ini_get('post_max_size').chr(10);
echo ini_get('max_input_time').chr(10);
--
 */
// Only these variables can change with php
// @ini_set( 'memory_limit', '512M');
@ini_set( 'max_execution_time', '2400' );

// TODO: The following necessary things to maintain folders structure

// TODO: Do not allow Games to contain posts with the same name
// TODO: Do not allow Scenes to contain posts with the same name
// TODO: Do not allow Assets3D to contain posts with the same name


// TODO: Do not allow Scenes to be saved if they do not have a category selected (Game they belong to)
// TODO: Do not allow Assets3D to be saved if they do not have a category selected (Asset3d Type they belong to)
// TODO: Do not allow Assets3D to be saved if they do not have a category selected (Scene they belong to)


//===================================== Styles & Scripts ====================================


wp_register_style( 'wpunity_backend', plugin_dir_url( __FILE__ ) . 'css/wpunity_backend.css' );
wp_register_style( 'wpunity_vr_editor', plugin_dir_url( __FILE__ ) . 'css/vr_editor_style.css' );
wp_register_style( 'wpunity_vr_editor_filebrowser', plugin_dir_url( __FILE__ ) . 'css/vr_editor_fileBrowserStyle.css' );

function wpunity_load_jquery_scripts() {
	wp_enqueue_script('jquery');
	/*wp_enqueue_script('jquery-ui-core');*/
	if( !wp_script_is('jquery-ui') ) {
		// you don't have to use googleapi's, but I think it helps. It saves the user's browser from loading the same script again if it has already been loade>
		wp_enqueue_style( 'jquery-ui-css' , 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/flick/jquery-ui.css' );
		wp_enqueue_script( 'jquery-ui' , 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js' );
	}
	// TODO: Add jquery-ui-core
}
add_action('wp_enqueue_scripts', 'wpunity_load_jquery_scripts' );


// Material & Frontend CSS & Scripts
// TODO: When ready for production, ignore  node_modules folder and move the 2 material css & js files to another folder.
wp_register_style( 'wpunity_material_stylesheet',  plugin_dir_url( __FILE__ ) . 'node_modules/material-components-web/dist/material-components-web.css' );
wp_enqueue_style('wpunity_material_stylesheet');
wp_register_script( 'wpunity_material_scripts', plugin_dir_url( __FILE__ ) . 'node_modules/material-components-web/dist/material-components-web.js');
wp_enqueue_script('wpunity_material_scripts');
wp_enqueue_style( 'wpunity_material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');
wp_register_style( 'wpunity_frontend_stylesheet',  plugin_dir_url( __FILE__ ) . 'css/wpunity_frontend.css' );
wp_enqueue_style('wpunity_frontend_stylesheet');




wp_register_script( 'wpunity_compile_request', plugin_dir_url( __FILE__ ) . 'js_libs/assemble_compile_commands/request_game_compile.js',
	null, null, false);

wp_register_script( 'wpunity_assemble_request', plugin_dir_url( __FILE__ ) . 'js_libs/assemble_compile_commands/request_game_assemble.js',
	null, null, false);


wp_register_script( 'wpunity_content_interlinking_request', plugin_dir_url( __FILE__ ) . 'js_libs/content_interlinking_commands/content_interlinking.js',
	null, null, false);

wp_register_script( 'wpunity_segmentation_request', plugin_dir_url( __FILE__ ) . 'js_libs/semantics_commands/segmentation.js',
	null, null, false);

wp_register_script( 'wpunity_classification_request', plugin_dir_url( __FILE__ ) . 'js_libs/semantics_commands/classification.js',
	null, null, false);


wp_register_script( 'wpunity_fetch_asset_scenes_request', plugin_dir_url( __FILE__ ) . 'js_libs/scriptFileBrowserToolbarWPway.js',
	null, null, false);

//=========================== THREE js scripts ============================================
wp_register_script( 'wpunity_load_threejs', plugin_dir_url( __FILE__ ) . 'js_libs/threejs79/three.js', null, null, false);
wp_register_script( 'wpunity_load_objloader', plugin_dir_url( __FILE__ ) . 'js_libs/threejs79/OBJLoader.js', null, null, false);
wp_register_script( 'wpunity_load_mtlloader', plugin_dir_url( __FILE__ ) . 'js_libs/threejs79/MTLLoader.js', null, null, false);
wp_register_script( 'wpunity_load_orbitcontrols', plugin_dir_url( __FILE__ ) . 'js_libs/threejs79/OrbitControls.js', null, null, false);


wp_register_script( 'wu_3d_view', plugin_dir_url( __FILE__ ) . 'js_libs/wu_3d_view.js', null, null, false);





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

//A1.01 Create Scene YAML Template (custom type : wpunity_yamltemp)
//A1.02 Create Scene YAML Template Category (custom taxonomy : wpunity_yamltemp_cat)
//require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-yamltemp.php');

//A2.01 Create YAML Template Category Box @ YAML Template's backend (dropdown style)
//A2.02 Save Data from Box
//A2.03 Initial Terms
//require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-yamltemp-tax.php');

//A3.01 Initial Values for all Custom Fields
//A3.02 Create 7 metaboxes with Custom Fields
// ($wpunity_databox2a,$wpunity_databox2b,$wpunity_databox2c,$wpunity_databox2d,$wpunity_databox2e,$wpunity_databox2f,$wpunity_databox2g)
//A3.03 Add and Show those 7 metaboxes
//A3.04 Save data from those 7 metaboxes
//require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-yamltemp-data.php');


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
//B3.02 Add and Show this metabox and the Compiler Box
//B3.03 Save data from this metabox
require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-games-data.php');


//===================================== Scenes ============================================

/*
custom type : wpunity_scene
custom taxonomy : wpunity_scene_pgame
                  wpunity_scene_yaml
custom fields :
        Scene Json -> wpunity_scene_json_input
        Scene Latitude -> wpunity_scene_lat
        Scene Longitude -> wpunity_scene_lng
*/

//C1.01 Create Scene (custom type : wpunity_scene)
//C1.02 Create Scene Game (custom taxonomy : wpunity_scene_pgame)
//C1.03 Create Scene Game YAML (custom taxonomy : wpunity_scene_yaml)
//C1.04 Generate folder and Taxonomy (for assets3d) with Scene's slug/name TODO
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes.php');

//C2.01 Create Scene's Game Box @ scene's backend (dropdown style)
//C2.02 Save Data from Box
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes-tax.php' );

//C3.01 Create metabox with Custom Fields ($wpunity_databox4)
//C3.02 Add and Show this metabox
//C3.03 Save data from this metabox
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes-data.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes-yaml.php' );


//===================================== Assets ============================================

/*
custom type : wpunity_asset3d
custom taxonomy : wpunity_asset3d_cat
                  wpunity_asset3d_pscene
custom fields :
        MTL File -> wpunity_asset3d_mtl
        Obj File -> wpunity_asset3d_obj
        Diffusion Image -> wpunity_asset3d_diffimage
        Screenshot Image -> wpunity_asset3d_screenimage
        Next Scene -> wpunity_asset3d_next_scene (for Doors)
        Video -> wpunity_asset3d_video (for POI 7 Dynamics)
        Image 1 -> wpunity_asset3d_image1 (for POI 7 Dynamics)
        Image 2 -> wpunity_asset3d_image2 (for POI 7 Dynamics)
        Image 3 -> wpunity_asset3d_image3 (for POI 7 Dynamics)
*/

//D1.01 Create Asset3D (custom type : wpunity_asset3d)
//D1.02 Create Asset Category (custom taxonomy : wpunity_asset3d_cat)
//D1.03 Create Asset Scene (custom taxonomy : wpunity_asset3d_pscene)
//D1.04 Generate folders for Asset
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets.php' );

//D2.01 Create Asset Taxonomy Boxes (Category & Scene) @ asset's backend
//D2.02 Save Data from Boxes
//D2.03 Create Initial wpunity_asset3d_cat (Asset3D Category) terms - TO BE REMOVED TODO
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets-tax.php' );

//D3.01 Create metabox with Custom Fields ($wpunity_databox1)
//D3.02 Add and Show this metabox
//D3.03 Save data from this metabox
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets-data.php' );

//D4.01
// jimver: deleted, now it is a js function called inside the php
//include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets-viewer.php' );

//D5.01
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets-meta.php' );

//===================================== Other ============================================

//1.01 Overwrite Uploads
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-functions.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-setget-functions.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-file-creations.php' );
//3.01 Create Initial Asset Categories
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-insertData.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-page-settings.php' );


include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-page-templates.php' );
register_activation_hook(__FILE__,'wpunity_create_openGamePage');
register_activation_hook(__FILE__,'wpunity_create_editGamePage');
register_activation_hook(__FILE__,'wpunity_create_editScenePage');
register_activation_hook(__FILE__,'wpunity_create_editScene2DPage');
register_activation_hook(__FILE__,'wpunity_create_editAsset3D');

// Add helper functions file
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-helper.php' );


include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-project-handler.php' );

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
    $mime_types['ogv'] = 'video/ogv';
	$mime_types['mtl'] = 'text/plain';
	$mime_types['mat'] = 'text/plain';
	return $mime_types;
}

add_filter('upload_mimes', 'my_myme_types', 1, 1);



//Scripts about Upload button in Metaboxes
add_action('plugins_loaded', function() {
	if($GLOBALS['pagenow']=='post.php') {
		add_action('admin_print_scripts', 'my_admin_scripts');
		add_action('admin_print_styles',  'my_admin_styles');
	}
});

function my_admin_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}

//wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
//  wp_enqueue_script('my-upload');
function my_admin_styles()  {
	wp_enqueue_style('thickbox');

}



?>