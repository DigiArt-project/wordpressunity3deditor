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

// Set scope based on project:
// DigiArt - Virtual Tour: 0
// Envisage - Virtual Lab: 1
// Default - Game Project: any other number
$project_scope = 0;


//===================================== Styles & Scripts ====================================
function wpunity_load_jquery_scripts() {

//	global $wp_scripts;
//	if(is_admin()) return;
//	$wp_scripts->registered['jquery-core']->src = 'https://code.jquery.com/jquery-3.5.1.min.js';
//	$wp_scripts->registered['jquery']->deps = ['jquery-core'];

	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-effects-core');
	wp_enqueue_style( 'jquery-ui-css' , plugin_dir_url( __FILE__ ) . 'css/jquery-ui.min.css' );
	wp_enqueue_style( 'jquery-ui-theme-css' , plugin_dir_url( __FILE__ ) . 'css/jquery-ui.theme.min.css' );
}
add_action('wp_enqueue_scripts', 'wpunity_load_jquery_scripts' );



function wpunity_register_scripts() {
 
	$pluginDirJS = plugin_dir_url( __FILE__ ).'js_libs/';
	
	$scriptsA = array(
		array('wpunity_asset_editor_scripts', $pluginDirJS.'wpunity_asset_editor_scripts.js'),
		array('wpunity_scripts', $pluginDirJS.'wpunity_scripts.js'),
		array('wpunity_lightslider', $pluginDirJS.'standalone_js_libraries/lightslider.min.js'),
		array('wpunity_jscolorpick', $pluginDirJS.'standalone_js_libraries/jscolor.js'),
		array('wpunity_jsfontselect', $pluginDirJS.'standalone_js_libraries/jquery.fontselect.js'),
		array('wpunity_html2canvas', $pluginDirJS.'standalone_js_libraries/html2canvas.min.js'),
		array('wpunity_assepile_request', $pluginDirJS.'assemble_compile_commands/request_game_assepile.js'),
		array('wpunity_savescene_request', $pluginDirJS.'save_scene_ajax/wpunity_save_scene_ajax.js'),
		array('wpunity_content_interlinking_request', $pluginDirJS.'content_interlinking_commands/content_interlinking.js'),
		array('wpunity_segmentation_request', $pluginDirJS.'semantics_commands/segmentation.js'),
		array('wpunity_classification_request', $pluginDirJS.'semantics_commands/classification.js'),
		array('wpunity_fetch_asset_scenes_request', $pluginDirJS.'assetBrowserToolbar.js'),
		array('wpunity_qrcode_generator', $pluginDirJS.'standalone_js_libraries/qrcode.js'),
		array('wpunity_inflate', $pluginDirJS.'standalone_js_libraries/inflate.min.js'),
		array('wpunity_materialize_jslib', $pluginDirJS.'standalone_js_libraries/materialize.js'),
		array('Asset_viewer_3d_kernel', $pluginDirJS.'Asset_viewer_3d_kernel.js'),
		array('wpunity_vr_editor_buttons', $pluginDirJS.'vr_editor_buttons.js'),
		array('wpunity_vr_editor_analytics', $pluginDirJS.'vr_editor_analytics.js'),
	);
	
	for ( $i = 0 ; $i < count($scriptsA); $i ++){
		wp_register_script($scriptsA[$i][0] , $scriptsA[$i][1], null, null, false );
	}

	//=========================== THREE js 87 scripts ============================================
	
	$scriptsB = array(
			array( 'wpunity_load87_threejs', $pluginDirJS.'threejs87/three.js'),
			array( 'wpunity_load87_OBJloader', $pluginDirJS.'threejs87/OBJLoader.js'),
			array( 'wpunity_load87_OBJloader2', $pluginDirJS.'threejs87/OBJLoader2.js'),
			array( 'wpunity_load87_WWOBJloader2', $pluginDirJS. 'threejs87/WWOBJLoader2.js'),
			array( 'wpunity_load87_MTLloader', $pluginDirJS.'threejs87/MTLLoader.js'),
			array( 'wpunity_load87_FBXloader', $pluginDirJS.'threejs87/FBXLoader.js'),
			array( 'wpunity_load87_OrbitControls', $pluginDirJS.'threejs87/OrbitControls.js'),
            array( 'wpunity_load87_TransformControls', $pluginDirJS.'threejs87/TransformControls.js'),
			array( 'wpunity_load87_PointerLockControls', $pluginDirJS.'threejs87/PointerLockControls.js'),
			array( 'wpunity_load87_datgui', $pluginDirJS.'threejs87/dat.gui.js'),
			
			array( 'wpunity_load87_CopyShader', $pluginDirJS.'threejs87/CopyShader.js'),
			array( 'wpunity_load87_FXAAShader', $pluginDirJS.'threejs87/FXAAShader.js'),
			array( 'wpunity_load87_EffectComposer', $pluginDirJS.'threejs87/EffectComposer.js'),
			array( 'wpunity_load87_RenderPass', $pluginDirJS.'threejs87/RenderPass.js'),
			array( 'wpunity_load87_OutlinePass', $pluginDirJS.'threejs87/OutlinePass.js'),
			array( 'wpunity_load87_ShaderPass', $pluginDirJS.'threejs87/ShaderPass.js'),
			array( 'wpunity_load87_PDBloader', $pluginDirJS.'threejs87/PDBLoader.js'),
			array( 'wpunity_load87_CSS2DRenderer', $pluginDirJS.'threejs87/CSS2DRenderer.js'),
			array( 'wpunity_load87_sceneexporterutils', $pluginDirJS.'threejs87/SceneExporterUtils.js'),
			array( 'wpunity_load87_scene_importer_utils', $pluginDirJS.'threejs87/SceneImporter.js'),
			array( 'wpunity_load87_sceneexporter', $pluginDirJS.'threejs87/SceneExporter.js'),
		);
	
	for ( $i = 0 ; $i < count($scriptsB); $i ++){
		wp_register_script($scriptsB[$i][0] , $scriptsB[$i][1], null, null, false );
	}
	
	//=========================== THREE js 119 scripts ============================================
	
	$scriptsC = array(
		array( 'wpunity_load119_threejs', $pluginDirJS.'threejs119/three.js'),
		array( 'wpunity_load124_threejs', $pluginDirJS.'threejs124/three.js'),
		array( 'wpunity_load125_threejs', $pluginDirJS.'threejs125/three.js'),
		array( 'wpunity_load124_statjs', $pluginDirJS.'threejs124/stats.js'),
		
		array( 'wpunity_load119_FBXloader', $pluginDirJS.'threejs119/FBXLoader.js'),
//		array( 'wpunity_load119_pdbloader', $pluginDirJS.'threejs119/PDBLoader.js'),
		array( 'wpunity_load119_GLTFLoader', $pluginDirJS.'threejs119/GLTFLoader.js'),
		array( 'wpunity_load119_DRACOLoader', $pluginDirJS.'threejs119/DRACOLoader.js'),
		array( 'wpunity_load119_DDSLoader', $pluginDirJS.'threejs119/DDSLoader.js'),
		array( 'wpunity_load119_KTXLoader', $pluginDirJS.'threejs119/KTXLoader.js'),
		
		array( 'wpunity_load119_OrbitControls', $pluginDirJS.'threejs119/OrbitControls.js'),
		array( 'wpunity_load125_OrbitControls', $pluginDirJS.'threejs125/OrbitControls.js'),
		array( 'wpunity_load119_TransformControls', $pluginDirJS.'threejs119/TransformControls.js'),
		array( 'wpunity_load124_TrackballControls', $pluginDirJS.'threejs124/TrackballControls.js'),
		array( 'wpunity_load119_PointerLockControls', $pluginDirJS.'threejs119/PointerLockControls.js'),
		
		array( 'wpunity_load125_TrackballControls', $pluginDirJS.'threejs125/TrackballControls.js'),
		array( 'wpunity_load125_CSS2DRenderer', $pluginDirJS.'threejs125/CSS2DRenderer.js'),

//		array( 'wpunity_load_sceneexporterutils', $pluginDirJS.'threejs87/SceneExporterUtils.js'),
//		array( 'wpunity_load_scene_importer_utils', $pluginDirJS.'threejs87/SceneImporter.js'),
//		array( 'wpunity_load_sceneexporter', $pluginDirJS.'threejs87/SceneExporter.js'),
		
		
		array( 'wpunity_load119_CSS2DRenderer', $pluginDirJS.'threejs119/CSS2DRenderer.js'),
		
		array( 'wpunity_load119_CopyShader', $pluginDirJS.'threejs119/CopyShader.js'),
		array( 'wpunity_load119_FXAAShader', $pluginDirJS.'threejs119/FXAAShader.js'),
		array( 'wpunity_load119_EffectComposer', $pluginDirJS.'threejs119/EffectComposer.js'),
		array( 'wpunity_load119_RenderPass', $pluginDirJS.'threejs119/RenderPass.js'),
		array( 'wpunity_load119_OutlinePass', $pluginDirJS.'threejs119/OutlinePass.js'),
		array( 'wpunity_load119_ShaderPass', $pluginDirJS.'threejs119/ShaderPass.js'),
	);
	
	for ( $i = 0 ; $i < count($scriptsC); $i ++){
		wp_register_script($scriptsC[$i][0] , $scriptsC[$i][1], null, null, false );
	}
	
	
	//------------------------------------------------------------------
	
	$scriptsD = array(
			array( 'wpunity_vr_editor_environmentals', $pluginDirJS.'vr_editor_environmentals.js'),
			array( 'wpunity_keyButtons', $pluginDirJS.'standalone_js_libraries/keyButtons.js'),
			array( 'wpunity_rayCasters', $pluginDirJS.'rayCasters.js'),
			array( 'wpunity_auxControlers', $pluginDirJS.'auxControlers.js'),
			array( 'wpunity_LoaderMulti', $pluginDirJS.'LoaderMulti.js'),
			array( 'wpunity_movePointerLocker', $pluginDirJS.'movePointerLocker.js'),
			array( 'wpunity_addRemoveOne', $pluginDirJS.'addRemoveOne.js'),
		);
	
	for ( $i = 0 ; $i < count($scriptsD); $i ++){
		wp_register_script($scriptsD[$i][0] , $scriptsD[$i][1], null, null, false );
	}
}

add_action('wp_enqueue_scripts', 'wpunity_register_scripts' );







function wpunity_register_styles() {
	wp_register_style( 'wpunity_backend', plugin_dir_url( __FILE__ ) . 'css/wpunity_backend.css' );
	wp_register_style( 'wpunity_vr_editor', plugin_dir_url( __FILE__ ) . 'css/vr_editor_style.css' );
	wp_register_style( 'wpunity_datgui', plugin_dir_url( __FILE__ ) . 'css/dat-gui.css' );

	
	wp_register_style( 'wpunity_vr_editor_filebrowser', plugin_dir_url( __FILE__ ).'css/vr_editor_fileBrowserStyle.css' );
	wp_register_style( 'wpunity_material_stylesheet',  plugin_dir_url( __FILE__ ).'node_modules/material-components-web/dist/material-components-web.css' );
	wp_register_script( 'wpunity_material_scripts', plugin_dir_url( __FILE__ ).'node_modules/material-components-web/dist/material-components-web.js');
	
	wp_register_style( 'wpunity_frontend_stylesheet',  plugin_dir_url( __FILE__ ) . 'css/wpunity_frontend.css' );
	
	
	wp_register_style( 'wpunity_lightslider_stylesheet',  plugin_dir_url( __FILE__ ) . 'css/lightslider.min.css' );
    
    wp_register_style( 'wpunity_materialize_stylesheet',  plugin_dir_url( __FILE__ ) . 'css/materialize.css' );
	
	wp_register_style( 'wpheliosvr_asseteditor_stylesheet',  plugin_dir_url( __FILE__ ) . 'css/wpheliosvr_asseteditor.css' );
	
	wp_register_style( 'wpvrodos_widgets_stylesheet',  plugin_dir_url( __FILE__ ) . 'css/wpvrodos_widgets.css' );
 
	
	// TODO: When ready for production, ignore  node_modules folder and move the 2 material css & js files to another folder.
	// Material & Frontend CSS & Scripts
	wp_enqueue_style('wpunity_material_stylesheet');
	wp_enqueue_script('wpunity_material_scripts');
	wp_enqueue_style( 'wpunity_material_icons', plugin_dir_url( __FILE__ ) . 'css/material-icons/material-icons.css' );
//    wp_enqueue_style( 'wpunity_glyphter_icons', plugin_dir_url( __FILE__ ) . 'css/glyphter-font/Glyphter.css' );
	wp_enqueue_style('wpunity_frontend_stylesheet');
	
	wp_enqueue_style( 'wpunity_lightslider_stylesheet');
}
add_action('wp_enqueue_scripts', 'wpunity_register_styles' );


require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpheliosvr-widgets.php');

require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-users-roles.php');

//===================================== Games ============================================

require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-games.php');

require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-games-tax.php');

require_once ( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-games-data.php');


//===================================== Scenes ============================================

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes.php');

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes-tax.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-scenes-data.php' );

//===================================== Assets ============================================

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets-tax.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-types-assets-data.php' );

//===================================== Other ============================================

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-upload-functions.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-functions.php' );


include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-setget-functions.php' );

//3.01 Create Initial Asset Categories

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-page-settings.php' );


include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-page-templates.php' );
register_activation_hook(__FILE__,'wpunity_create_openGamePage');
register_activation_hook(__FILE__,'wpunity_create_editGamePage');
register_activation_hook(__FILE__,'wpunity_create_editScenePage');
register_activation_hook(__FILE__,'wpunity_create_editScene2DPage');
register_activation_hook(__FILE__,'wpunity_create_editSceneExamPage');
register_activation_hook(__FILE__,'wpunity_create_editAsset3D');
include_once( plugin_dir_path( __FILE__ ) . 'includes/templates/edit-wpunity_asset3D-saveData.php' );





// Make the games versions table on activating the plugin
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-db-table-creations.php' );
register_activation_hook( __FILE__, 'wpunity_db_create_games_versions_table' );

// Add helper functions file
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-helper.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-project-assemble.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-project-assemble-replace.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-project-assemble-handler.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/default_game_project_settings/wpunity-default-energy-settings.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/default_game_project_settings/wpunity-default-energy-yamls.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/default_game_project_settings/wpunity-default-energy-compile.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/default_game_project_settings/wpunity-default-archaeology-yamls.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/default_game_project_settings/wpunity-default-archaeology-settings.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/default_game_project_settings/wpunity-default-archaeology-compile.php' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/default_game_project_settings/wpunity-default-chemistry-settings.php' );
//include_once( plugin_dir_path( __FILE__ ) . 'includes/default_game_project_settings/wpunity-default-chemistry-yamls.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/default_game_project_settings/wpunity-default-chemistry-compile.php' );


include_once( plugin_dir_path( __FILE__ ) . 'includes/PDBLoader.php' );

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
    $mime_types['ogv'] = 'application/ogg';
    $mime_types['ogg'] = 'application/ogg';
	$mime_types['mtl'] = 'text/plain';
	$mime_types['mat'] = 'text/plain';
	$mime_types['pdb'] = 'text/plain';
//	$mime_types['fbx'] = 'text/plain';
	$mime_types['fbx'] = 'application/octet-stream';
	$mime_types['glb'] = 'application/octet-stream';
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

/**
 *   shorcode to show content inside page with [visitor] Some content for the people just browsing your site. [/visitor]
 */
add_shortcode( 'visitor', 'visitor_check_shortcode' );

function visitor_check_shortcode( $atts, $content = null ) {
    if ( ( !is_user_logged_in() && !is_null( $content ) ) || is_feed() )
        return $content;
    return '';
}

/**
 * On reset password redirect to wpunity-main
 */
function wpse_lost_password_redirect() {
    // Check if have submitted
    $confirm = ( isset($_GET['checkemail'] ) ? $_GET['checkemail'] : '' );

    if( $confirm ) {
        wp_redirect( get_site_url( ).'/wpunity-main/' );
        exit;
    }
}
add_action('login_headerurl', 'wpse_lost_password_redirect');



// Ajax for fetching game's assets within asset browser widget at vr_editor
add_action( 'wp_ajax_wpunity_fetch_game_assets_action', 'wpunity_fetch_game_assets_action_callback' );


add_action('wp_ajax_wpunity_save_scene_async_action','wpunity_save_scene_async_action_callback');
add_action('wp_ajax_wpunity_undo_scene_async_action','wpunity_undo_scene_async_action_callback');
add_action('wp_ajax_wpunity_redo_scene_async_action','wpunity_redo_scene_async_action_callback');


add_action('wp_ajax_wpunity_save_expid_async_action','wpunity_save_expid_async_action_callback');

// Ajax for saving gio asynchronoysly
add_action('wp_ajax_wpunity_save_gio_async_action','wpunity_save_gio_async_action_callback');

// Ajax for deleting scene
add_action('wp_ajax_wpunity_delete_scene_action','wpunity_delete_scene_frontend_callback');

//$fo = fopen("output_activation.txt","w");
//fwrite($fo, dirname( __FILE__ ) . '/includes/wpunity-core-functions.php');
//fclose($fo);

//include_once dirname( __FILE__ ) . '/includes/wpunity-core-functions.php';

//include_once( plugin_dir_path( __FILE__ ) . 'includes/wpunity-core-functions.php' );
//register_activation_hook( __FILE__ , 'wpunity_createJoker_activation' );



//add_filter('rest_authentication_errors', 'disable_wp_rest_api');
//
//function disable_wp_rest_api($access) {
//
//    //if (!is_user_logged_in()) {
//
//    //    $message = apply_filters('disable_wp_rest_api_error', __('REST API restricted to authenticated users.', 'disable-wp-rest-api'));
//
//    //    return new WP_Error('rest_login_required', $message, array('status' => rest_authorization_required_code()));
//
//  //  }
//
//    return $access;
//}

// remove <p>  </p> from content
remove_filter ('the_content', 'wpautop');



/* ------------------------------ API ---------------------------------------- */

/*
 * Get scene data by title
 */
function prefix_get_endpoint_phrase($request) { //
    // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
    
    $title = (string) $request['title'];
    
    $args = array (
        'title'=>$title,
        'post_status' => 'publish',
        'post_type' => 'wpunity_scene'
    );
    
    $post = get_posts( $args );
    $content = json_decode($post[0]->post_content, true);
    
    return rest_ensure_response($content);
}

/**
 * This function is where we register our routes for our example endpoint.
 */
function prefix_register_example_routes() {
    // register_rest_route() handles more arguments but we are going to stick to the basics for now.
    register_rest_route( 'wpunity/v1', '/scene/(?P<title>\S+)', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => WP_REST_Server::READABLE,
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'prefix_get_endpoint_phrase',
    ) );
}

add_action( 'rest_api_init', 'prefix_register_example_routes' );



// Back-end restrict by author filtering
function rudr_filter_by_the_author() {
	$params = array(
		'name' => 'author', // this is the "name" attribute for filter <select>
		'show_option_all' => 'All authors' // label for all authors (display posts without filter)
	);
	
	if ( isset($_GET['user']) )
		$params['selected'] = $_GET['user']; // choose selected user by $_GET variable
	
	wp_dropdown_users( $params ); // print the ready author list
}

add_action('restrict_manage_posts', 'rudr_filter_by_the_author');

// Back-end show author for games
function my_cpt_support_author() {
	add_post_type_support( 'wpunity_game', 'author' );
}
add_action('init', 'my_cpt_support_author');

?>
