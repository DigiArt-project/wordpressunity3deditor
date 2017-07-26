<?php

add_action( 'admin_menu', 'wpunity_remove_menus', 999 );

function wpunity_remove_menus() {

// INSERT MENU ITEMS TO REMOVE FOR EVERYONE

	$current_user_id = get_current_user_id();

	//remove only for author and below
	if ( current_user_can('administrator') && $current_user_id != 1 ) {
		remove_menu_page('tools.php'); // Tools
		remove_menu_page('upload.php'); // Media
		remove_menu_page( 'edit-comments.php' ); // Comments
		remove_menu_page( 'edit.php' ); //Posts
		remove_menu_page( 'edit.php?post_type=page' ); //Pages
		remove_menu_page( 'plugins.php' ); //Plugins
		remove_menu_page( 'users.php' ); //Users
		remove_menu_page( 'themes.php' ); //Appearance

		remove_menu_page( 'options-general.php' ); //Appearance
		remove_menu_page( 'index.php' ); //dashboard

		remove_menu_page( 'duplicator' );
		remove_menu_page( 'geodirectory' );
		remove_menu_page( 'edit.php?post_type=gd_place' );

		remove_menu_page('wpcf7');

	}
}

//==========================================================================================================================================

function wpunity_upload_img($file = array(), $parent_post_id, $orientation = null) {

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

	$file_return = wp_handle_upload( $file, array('test_form' => false ) );

	if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
		return false;
	} else {

		$filename = $file_return['file'];

		$attachment = array(
			'post_mime_type' => $file_return['type'],
			'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content' => '',
			'post_status' => 'inherit',
			'guid' => $file_return['url']
		);
		$attachment_id = wp_insert_attachment( $attachment, $file_return['url'], $parent_post_id );
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		$attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );

		wp_update_attachment_metadata( $attachment_id, $attachment_data );

		if( 0 < intval( $attachment_id, 10 ) ) {
			return $attachment_id;
		}

	}
	return false;
}

function wpunity_upload_filter( $args  ) {

    $newdir =  '/Models';

    $args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
    $args['url']     = str_replace( $args['subdir'], '', $args['url'] );
    $args['subdir']  = $newdir;
    $args['path']   .= $newdir;
    $args['url']    .= $newdir;

    return $args;

}

function wpunity_upload_Assetimg($file = array(), $parent_post_id, $parentGameSlug) {

	add_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

    add_filter( 'upload_dir', 'wpunity_upload_filter');
	$file_return = wp_handle_upload( $file, array('test_form' => false ) );
    remove_filter( 'upload_dir', 'wpunity_upload_filter' );

	if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
		return false;
	} else {

		$filename = $file_return['file'];

		$attachment = array(
			'post_mime_type' => $file_return['type'],
			'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content' => '',
			'post_status' => 'inherit',
			'guid' => $file_return['url']
		);
		$attachment_id = wp_insert_attachment( $attachment, $file_return['url'], $parent_post_id );
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		$attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );

		wp_update_attachment_metadata( $attachment_id, $attachment_data );

		remove_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

		if( 0 < intval( $attachment_id, 10 ) ) {
			return $attachment_id;
		}

	}
	return false;
}

function wpunity_upload_Assetimg64($imagefile, $imgTitle, $parent_post_id, $parentGameSlug) {

	add_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	require_once( ABSPATH . 'wp-admin/includes/admin.php' );

	$upload_dir = wp_upload_dir();
	$upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

	$hashed_filename = md5( $imgTitle . microtime() ) . '_' . $imgTitle.'.png';

	$image_upload = file_put_contents($upload_path . $hashed_filename, base64_decode(substr($imagefile, strpos($imagefile, ",")+1)));

	//HANDLE UPLOADED FILE
	if( !function_exists( 'wp_handle_sideload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}

	// Without that I'm getting a debug error!?
	if( !function_exists( 'wp_get_current_user' ) ) {
		require_once( ABSPATH . 'wp-includes/pluggable.php' );
	}

	$file = array (
		'name'     => $hashed_filename,
		'type'     => 'image/png',
		'tmp_name' => $upload_path . $hashed_filename,
		'error'    => 0,
		'size'     => filesize( $upload_path . $hashed_filename ),
	);

	add_filter( 'upload_dir', 'wpunity_upload_filter');
	// upload file to server
	// @new use $file instead of $image_upload
	$file_return = wp_handle_sideload( $file, array( 'test_form' => false ) );
	remove_filter( 'upload_dir', 'wpunity_upload_filter' );

	$filename = $file_return['file'];

	$upload = wp_upload_dir();
	$upload_dir = $upload['basedir'];
	$upload_dir .= "/" . $parentGameSlug;
	$upload_dir .= "/" . 'Models';
	$upload_dir = str_replace('\\','/',$upload_dir);
	$attachment = array(
		'post_mime_type' => $file_return['type'],
		'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
		'post_content' => '',
		'post_status' => 'inherit',
		'guid' => $file_return['url']
	);


	$attachment_id = wp_insert_attachment( $attachment, $file_return['url'], $parent_post_id );


	require_once(ABSPATH . 'wp-admin/includes/image.php');
	$attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
	wp_update_attachment_metadata( $attachment_id, $attachment_data );


	remove_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );

	if( 0 < intval( $attachment_id, 10 ) ) {
		return $attachment_id;
	}

	/*$jsonReturn = array(
		'Status'  =>  'Success'
	);*/

	return false;
}

//==========================================================================================================================================

function wpunity_remove_allthumbs_sizes( $sizes, $metadata ) {
	return [];
}

//==========================================================================================================================================

//FORCE TITLE ON OUR CUSTOM POST TYPES
function force_post_title_init(){
	wp_enqueue_script('jquery');
}

function force_post_title(){
	global $post;
	$post_type = get_post_type($post->ID);
	if($post_type == 'wpunity_asset3d' || $post_type == 'wpunity_scene' || $post_type == 'wpunity_game') {
		echo "<script type='text/javascript'>\n";
		echo "
            jQuery('#publish').click(function(){
            var testervar = jQuery('[id^=\"titlediv\"]')
            .find('#title');
            if (testervar.val().length < 1)
            {
                jQuery('[id^=\"titlediv\"]').css('background', '#F96');
                setTimeout(\"jQuery('#ajax-loading').css('visibility', 'hidden');\", 100);
                alert('TITLE is required');
                setTimeout(\"jQuery('#publish').removeClass('button-primary-disabled');\", 100);
                return false;
            }
  	    });
        ";
		echo "</script>\n";
	}
}

add_action('admin_init', 'force_post_title_init');
add_action('edit_form_advanced', 'force_post_title');

//==========================================================================================================================================

function wpunity_mediaLibrary_default() {
	?>
    <script type="text/javascript">
        jQuery(document).ready(function($){ wp.media.controller.Library.prototype.defaults.contentUserSetting=false; });
    </script>
	<?php
}

add_action( 'admin_footer-post-new.php', 'wpunity_mediaLibrary_default' );
add_action( 'admin_footer-post.php', 'wpunity_mediaLibrary_default' );

//==========================================================================================================================================

function wpunity_change_publish_button( $translation, $text ) {
	global $post;
	$post_type = get_post_type($post->ID);
	if($post_type == 'wpunity_asset3d' || $post_type == 'wpunity_scene' || $post_type == 'wpunity_game') {
		if ($text == 'Publish')
			return 'Create';
		if ($text == 'Update')
			return 'Save';
	}

	return $translation;
}

add_filter( 'gettext', 'wpunity_change_publish_button', 10, 2 );

//==========================================================================================================================================

function wpunity_aftertitle_info($post) {

	$post_type = get_post_type($post->ID);
	if($post_type == 'wpunity_game'){
		$gameSlug = $post->post_name;
//        $upload = wp_upload_dir();
//        $upload_dir = $upload['basedir'];
//        $upload_dir .= "/" . $gameSlug;
//        $upload_dir = str_replace('\\','/',$upload_dir);
		echo '<b>Slug:</b> ' . $gameSlug;
//        echo '<br/><b>Upload Folder:</b>' . $upload_dir;
	}
    elseif($post_type == 'wpunity_scene'){
		$sceneSlug = $post->post_name;
//        $terms = wp_get_post_terms( $post->ID, 'wpunity_scene_pgame');
//        $gameSlug = $terms[0]->slug;
//        $upload = wp_upload_dir();
//        $upload_dir = $upload['basedir'];
//        $upload_dir .= "/" . $gameSlug . "/" . $sceneSlug;
//        $upload_dir = str_replace('\\','/',$upload_dir);
		echo '<b>Slug:</b> ' . $sceneSlug;
//        echo '<br/><b>Upload Folder:</b>' . $upload_dir;
	}
    elseif($post_type == 'wpunity_asset3d'){
		$assetSlug = $post->post_name;
//        $upload = wp_upload_dir();
//        $upload_dir = $upload['basedir'];
//        $pathofPost = get_post_meta($post->ID,'wpunity_asset3d_pathData',true);
//        $upload_dir .= "/" . $pathofPost;
//        $upload_dir = str_replace('\\','/',$upload_dir);
		echo '<b>Slug:</b> ' . $assetSlug;
//        echo '<br/><b>Upload Folder:</b>' . $upload_dir;
	}

}

add_action( 'edit_form_after_title', 'wpunity_aftertitle_info' );

//==========================================================================================================================================

// ================ SEMANTICS ON 3D ============================================================

// ---- AJAX SEMANTICS 1: run segmentation ----------
function wpunity_segment_obj_action_callback() {

	$DS = DIRECTORY_SEPARATOR;
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {

		$curr_folder = wp_upload_dir()['basedir'].$DS.$_POST['path'];
		$curr_folder = str_replace('/','\\',$curr_folder); // full path

		$batfile = wp_upload_dir()['basedir'].$DS.$_POST['path']."segment.bat";


		$batfile = str_replace('/','\\',$batfile); // full path

		$fnameobj = basename($_POST['obj']);

		$fnameobj = $curr_folder.$fnameobj;

		// 1 : Generate bat
		$myfile = fopen($batfile, "w") or die("Unable to open file!");

		$outputpath = wp_upload_dir()['basedir'].$DS.$_POST['path'];
		$outputpath = str_replace('/','\\',$outputpath); // full path

		$exefile = untrailingslashit(plugin_dir_path(__FILE__)).'\..\semantics\segment3D\pclTesting.exe';
		$exefile = str_replace("/", "\\", $exefile);

		$iter = $_POST['iter'];
		$minDist = $_POST['minDist'];
		$maxDist = $_POST['maxDist'];
		$minPoints = $_POST['minPoints'];
		$maxPoints = $_POST['maxPoints'];
		//$exefile.' '.$fnameobj.' '.$iter.' 0.01 0.2 100 25000 1 '.$outputpath.PHP_EOL.

		$txt = '@echo off'.PHP_EOL.
		       $exefile.' '.$fnameobj.' '.$iter.' '.$minDist.' '.$maxDist.' '.$minPoints.' '.$maxPoints.' 1 '.$outputpath.PHP_EOL.
		       'del "*.pcd"'.PHP_EOL.
		       'del "barycenters.txt"';

		fwrite($myfile, $txt);
		fclose($myfile);

		shell_exec('del "'.$outputpath.'log.txt"');
		shell_exec('del "'.$outputpath.'cloud_cluster*.obj"');
		shell_exec('del "'.$outputpath.'cloud_plane*.obj"');

		// 2: run bat
		$output = shell_exec($batfile);
		echo $output;

	} else { // LINUX SERVER // TODO

//        $game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_linux'; //$_GET['game_dirpath'];
//
//        // 1 : Generate sh
//        $myfile = fopen($game_dirpath.$DS."starter_artificial.sh", "w") or print("Unable to open file!");
//        $txt = "#/bin/bash"."\n".
//            "projectPath=`pwd`"."\n".
//            "xvfb-run --auto-servernum --server-args='-screen 0 1024x768x24:32' /opt/Unity/Editor/Unity -batchmode -nographics -logfile stdout.log -force-opengl -quit -projectPath ${projectPath} -buildWindowsPlayer 'builds/myg3.exe'";
//        fwrite($myfile, $txt);
//        fclose($myfile);
//
//        // 2: run sh (nohup     '/dev ...' ensures that it is asynchronous called)
//        $output = shell_exec('nohup sh starter_artificial.sh'.'> /dev/null 2>/dev/null &');
	}

	wp_die();
}

//---- AJAX COMPILE 2: read compile stdout.log file and return content.
function wpunity_monitor_segment_obj_action_callback(){

	echo file_get_contents(pathinfo($_POST['obj'], PATHINFO_DIRNAME ).'/log.txt');

	wp_die();
}

//---- AJAX COMPILE 3: Enlist the split objs -------------
function wpunity_enlist_splitted_objs_action_callback(){

	$DS = DIRECTORY_SEPARATOR;
	$path = wp_upload_dir()['basedir'].$DS.$_POST['path'];

	$files = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($path),
		RecursiveIteratorIterator::LEAVES_ONLY
	);

	foreach ($files as $name => $file) {
		// Skip directories (they would be added automatically)
		if (!$file->isDir() and pathinfo($file,PATHINFO_EXTENSION)=='obj')
		{
			echo "<a href='".wp_upload_dir()['baseurl']."/".$_POST['path'].basename($file)."' >".basename($file)."</a><br />";
		}
	}

	wp_die();
}

//======================= CONTENT INTERLINKING =========================================================================

function wpunity_fetch_description_action_callback(){

	if ($_POST['externalSource']=='Wikipedia')
		$url = 'https://'.$_POST['lang'].'.wikipedia.org/w/api.php?action=query&format=json&exlimit=3&prop=extracts&'.$_POST['fulltext'].'titles='.$_POST['titles'];
	else
		$url = 'https://www.europeana.eu/api/v2/search.json?wskey=8mfU6ZgfW&query='.$_POST['titles'];//.'&qf=LANGUAGE:'.$_POST['lang'];

	echo file_get_contents($url);

	wp_die();
}

function wpunity_fetch_image_action_callback(){

	if ($_POST['externalSource_image']=='Wikipedia')
		$url = 'https://'.$_POST['lang_image'].'.wikipedia.org/w/api.php?action=query&prop=imageinfo&format=json&iiprop=url&generator=images&titles='.$_POST['titles_image'];
	else
		$url = 'https://www.europeana.eu/api/v2/search.json?wskey=8mfU6ZgfW&query='.$_POST['titles_image'];//.'&qf=LANGUAGE:'.$_POST['lang_image'];

	echo file_get_contents($url);

	wp_die();
}

function wpunity_fetch_video_action_callback(){

	if ($_POST['externalSource_video']=='Wikipedia'){
		$url = 'https://'.$_POST['lang_video'].'.wikipedia.org/w/api.php?action=query&format=json&prop=videoinfo&viprop=derivatives&titles=File:'.$_POST['titles_video'].'.ogv';
	} else {
		$url = 'https://www.europeana.eu/api/v2/search.json?wskey=8mfU6ZgfW&query='.$_POST['titles_image'];//.'&qf=LANGUAGE:'.$_POST['lang_image'];
	}

	$content = file_get_contents($url);
	echo $content;

	wp_die();
}

//====================== GAME ASSEMBLY AND COMPILATION =================================================================

function wpunity_assepile_action_callback(){

	wpunity_compile_the_game($_REQUEST['gameId'],$_REQUEST['gameSlug']);

    //fake_compile_for_a_test_project();

    echo "hi handsome boy " .  $_REQUEST['gameId'] . " " . $_REQUEST['gameSlug'];
    wp_die();
}

/**
 *   This function is for compiling the \test_compiler\game_windows  project
 */
function fake_compile_for_a_test_project()
{

    $gcwd = getcwd();

    chdir("C:/xampp/htdocs/digiart-project_Jan17/wp-content/plugins/wordpressunity3deditor/test_compiler/game_windows/");
    // 1. Start the compile
    $output = shell_exec('start /b starterWebGL.bat /c');

    // go back to previous directory
    chdir($gcwd);

    $h = fopen('output.txt', 'w');
    fwrite($h, $output);
    fclose($h);

    // 2. Monitor




    // 3. provide link to play and link to download (zipped)

}


// ---- AJAX ASSEMBLE 1: Assemble game ------
function wpunity_assemble_action_callback() {

	$DS = DIRECTORY_SEPARATOR;
	// Windows or Linux server variable
	$os = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';

	// Check if target folder exist from a previous assemble
	$target_exists = file_exists ( $_POST['target'] );
	echo '1. Target Folder exists? '.($target_exists?'true':'false');

	// if exists then remove the whole game target folder
	if ($target_exists) {
		//echo '<br /><span>Removing:' . $_POST['target'] . '</span><br />';
		shell_exec($os === 'win' ? 'rmdir /s/q ' . $_POST['target'] : 'rm -rf '. $_POST['target']);

		if (file_exists($_POST['target'])) {
			echo '<span style="color:yellowgreen"><br />Delete: Can not delete. Used by another process? Skipping delete, I will overwrite.</span>';
		}else
			echo '<br />2. Deleted target folder: Success';
	}

	shell_exec('mkdir '. ($os==='lin'?'--parents':'')  . ' '.$_POST['target']);

	echo '<br />3. Create target folder: '.(file_exists ( $_POST['target'] )?'Success':'Error 5');

	// Copy the pre-written windows game libraries. The same are working for linux as well.
	if ($os === 'win')
		$copy_command = 'xcopy /s /Q '.$_POST['game_libraries_path'].$DS.'windows '.$_POST['target'];
	else
		$copy_command = 'cp --verbose -rf '.$_POST['game_libraries_path'].$DS.'windows'.$DS.'. '.$_POST['target'];

	$res_copy = shell_exec($copy_command);

	echo '<br />4. Copy unity3d libraries: '. ($os==='win'?$res_copy: ($res_copy==0?'Success':'Failure 15'));

	//------ Modify /ProjectSettings/EditorBuildSettings.asset and Main_Menu.cs to include all scenes ---
	$scenes_Arr = wpunity_getAllscenes_unityfiles_byGame($_POST['game_id']);

	// === Assets/General_Scripts/Menu_Script.cs =====
	$path_cs_MainMenu = $_POST['target']."/Assets/General_Scripts/Menu_Script.cs";

	// first read content
	$fhandle = fopen($path_cs_MainMenu, "r");
	$fcontents_cs_MainMenu = fread($fhandle, filesize($path_cs_MainMenu));
	fclose($fhandle);

	//echo htmlspecialchars($fcontents_cs_MainMenu);

	// then write
	$fhandle = fopen($path_cs_MainMenu, "w");
	$fcontents_cs_MainMenu = str_replace(['___[mainmenu_scene_basename]___',
		'___[initialwonderaround_scene_basename]___',
		'___[options_scene_basename]___',
		'___[credentials_scene_basename]___'],
		[
			basename($scenes_Arr[0][sceneUnityPath],".unity"),
			basename($scenes_Arr[1][sceneUnityPath],".unity"),
			basename($scenes_Arr[2][sceneUnityPath],".unity"),
			basename($scenes_Arr[3][sceneUnityPath],".unity")
		],
		$fcontents_cs_MainMenu);

	//echo htmlspecialchars($fcontents_cs_MainMenu);

	fwrite($fhandle, $fcontents_cs_MainMenu);
	fclose($fhandle);

	// === EditorBuildSettings.asset ===

	// replace
	$needle_str ='  m_Scenes: []'.chr(10);

	// with
	$target_str= '  m_Scenes:'.chr(10);

	foreach ($scenes_Arr as $cs)
		$target_str .= '  - enabled: 1' . chr(10) .
		               '    path: '.$cs['sceneUnityPath']  . chr(10);


	//  Possible bug is the LF character in the end of lines
	echo '<br />5. Include Scenes in EditorBuildSettings.asset: ';

	$path_eba = $_POST['target']."/ProjectSettings/EditorBuildSettings.asset";

	// first read
	$fhandle = fopen($path_eba, "r");
	$fcontents = fread($fhandle, filesize($path_eba));
	fclose($fhandle);

	// then write
	$fhandle = fopen($path_eba, "w");
	$fcontents = str_replace($needle_str, $target_str, $fcontents);
	fwrite($fhandle, $fcontents);
	fclose($fhandle);

	echo '<span style="font-size:8pt"><pre>'.$fcontents.'</pre></span>';

	// Copy source assets to target assets
	if ($os === 'win')
		$copy_assets_command = 'xcopy /s /Q '.$_POST['source'].' '.$_POST['target'].$DS.'Assets';
	else
		$copy_assets_command = 'cp -rf '.$_POST['source'].$DS.'. '.$_POST['target'].$DS.'Assets';

	$res_copy_assets = shell_exec($copy_assets_command);

	echo '<br />6. Copy Game Instance Assets to target Assets: '. ($os==='win'?$res_copy_assets:($res_copy_assets==0?'Success':'Failure 16'));
	echo '<br /><br /> Finished assemble';

	wp_die();
}

// ---- AJAX COMPILE 1: compile game, i.e. make a bat file and run it
function wpunity_compile_action_callback() {
	$DS = DIRECTORY_SEPARATOR;

	// TEST PHASE
	//$game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_windows'; //$_GET['game_dirpath'];
	// TEST PHASE
	//$game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_linux'; //$_GET['game_dirpath'];

	// REAL
	$game_dirpath = $_POST['dirpath']; //  realpath(dirname(__FILE__).'/..').$DS.'games_assemble'.$DS.'dune';
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$os_bin = 'bat';
		$txt = '"C:\Program Files\Unity\Editor\Unity.exe" -quit -batchmode -logFile '.
		       $game_dirpath.'\stdout.log -projectPath '. $game_dirpath .' -buildWindowsPlayer "builds\mygame.exe"';

		$compile_command = 'start /b '.$game_dirpath.$DS.'starter_artificial.bat /c';

	} else { // LINUX SERVER
		$os_bin = 'sh';
		$txt = "#/bin/bash"."\n".
		       "projectPath=`pwd`"."\n".
		       "xvfb-run --auto-servernum --server-args='-screen 0 1024x768x24:32' /opt/Unity/Editor/Unity ".
		       "-batchmode -nographics -logfile stdout.log -force-opengl -quit -projectPath \${projectPath} -buildWindowsPlayer 'builds/mygame.exe'";

		// 2: run sh (nohup     '/dev ...' ensures that it is asynchronous called)
		$compile_command = 'nohup sh starter_artificial.sh'.'> /dev/null 2>/dev/null &';
	}

	// 1 : Generate bat or sh
	$myfile = fopen($game_dirpath.$DS."starter_artificial.".$os_bin, "w") or die("Unable to open file!");
	fwrite($myfile, $txt);
	fclose($myfile);
	chmod($game_dirpath.$DS."starter_artificial.".$os_bin, 0755);


	$os = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';


	if ($os === 'lin'){
		$init_workdir = getcwd();

		chdir($game_dirpath);

		//$handle = fopen($game_dirpath.$DS.'command.txt','w');


		// 2: run bat or sh to compile the game
		$output = shell_exec($compile_command);


		chdir($init_workdir);

		//fwrite($handle, getcwd() .PHP_EOL);

		//fclose($handle);

	} else {
		// 2: run bat or sh to compile the game
		$output = shell_exec($compile_command);
	}


	wp_die();
}

//---- AJAX COMPILE 2: read compile stdout.log file and return content.
function wpunity_monitor_compiling_action_callback(){
	$DS = DIRECTORY_SEPARATOR;

	$os = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'? 'win':'lin';

	// Monitor stdout.log but it is not safe
	$stdoutSTR = file_get_contents($game_dirpath = $_POST['dirpath'].$DS."stdout.log");
	//

	if ($os === 'lin'){
		$processUnityCSV = exec('pgrep Unity');
	} else {
		$processUnityCSV = exec('TASKLIST /FI "imagename eq Unity.exe" /v /fo CSV');
	}

	echo json_encode(array('CSV' => $processUnityCSV , "LOGFILE"=>$stdoutSTR));

	wp_die();
}

//---- AJAX COMPILE 3: Zip the builds folder
function wpunity_game_zip_action_callback(){

    $DS = DIRECTORY_SEPARATOR;

    // TEST
    //$game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_windows';

    // Real
    $game_dirpath = $_POST['dirpath']; //realpath(dirname(__FILE__).'/..').$DS.'games_assemble'.$DS.'dune';

    $rootPath = realpath($game_dirpath) . '/builds';
    $zip_file = realpath($game_dirpath) . '/game.zip';

    // Initialize archive object
    $zip = new ZipArchive();
    $resZip = $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    if ($resZip === TRUE) {

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();
        echo 'Zip successfully finished [2]';
        wp_die();
    } else {
        echo 'Failed to zip, code:' . $resZip;
        wp_die();
    }
}


// NEW ASSEMBLY FUNCTIONS OF JULY 2017


// -- ASSEMBLY 1: Append scene paths in EditorBuildSettings.asset file --
// $filepath : The path of the already written EditorBuildSettings.asset file
// $scenepath : The scene to add as path : "Assets/scenes/S_Settings.unity"
function wpunity_append_scenes_in_EditorBuildSettings_dot_asset($filepath, $scenepath){

        //a. open file for append
        $fhandle = fopen($filepath, "a");

        //b. create what to append
        $newcontent = "  - enabled: 1".chr(10)."    path: ".$scenepath.chr(10);

        //c. append and close
        fwrite($fhandle, $newcontent);
        fclose($fhandle);

        //d. read test
        //    $fhandle = fopen($filepath, "r");
        //    echo fread($fhandle, filesize($filepath));
}



    /* Create an empty WebGLBuilder.cs in a certain $filepath */
    function wpunity_createEmpty_WebGLBuilder_cs($filepath){

        $handle = fopen($filepath, 'w');

        $content = 'using UnityEditor;
class WebGLBuilder {
static void build() {

        // AddAssetsToImportHere

        string[] scenes = { // AddScenesHere
}; 
        
        string pathToDeploy = "builds/WebGLversion/";		
                
        BuildPipeline.BuildPlayer(scenes, pathToDeploy, BuildTarget.WebGL, BuildOptions.None);
    }
}';

        fwrite($handle, $content);
        fclose($handle);
    }


// Add  assets (obj) for import
//    $assetpath = "Assets/models/building1/building1.obj"
// or scenes for compile
//    $scenepath = "Assets/scenes/S_SceneSelector.unity"
// to
//    WebGLBuilder.cs
function wpunity_add_in_WebGLBuilder_cs($filepath, $assetpath, $scenepath){

    $LF = chr(10); // line change

    if ($assetpath){
        //add assets (obj)

        // Clear previous size of filepath
        clearstatcache();

        // a. Read
        $handle = fopen($filepath, 'r');
        $content = fread($handle, filesize($filepath));
        fclose($handle);

        // b. add obj
        $content = str_replace('// AddAssetsToImportHere','// AddAssetsToImportHere'.$LF.
            '          AssetDatabase.ImportAsset("'.$assetpath.'", ImportAssetOptions.Default);', $content
        );

        // c. Write to file
        $fhandle = fopen($filepath, 'w');
        fwrite($fhandle, $content, strlen($content));
        fclose($fhandle);

//    // d. Read for testing
//    clearstatcache();
//    $handle = fopen($filepath, 'r');
//    echo fread($handle, filesize($filepath));
//    fclose($handle);
    }


    if ($scenepath){

        // Clear previous size of filepath
        clearstatcache();

        // a. Read
        $handle = fopen($filepath, 'r');
        $content = fread($handle, filesize($filepath));
        fclose($handle);

        // b. Extend certain string
        $content = str_replace('// AddScenesHere', '// AddScenesHere '.chr(10).'            "'.$scenepath.'",', $content);

        // first comma remove
        $content = str_replace(','.chr(10).'}','}', $content);

        // c. Write to old
        $fhandle = fopen($filepath, 'w');

        fwrite($fhandle, $content, strlen($content));
        fclose($fhandle);

        //  d. Read for testing
        //    $handle = fopen($filepath, 'r');
        //    echo fread($handle, strlen($content));
        //    fclose($handle);
    }
}




