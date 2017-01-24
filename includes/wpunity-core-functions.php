<?php

function wpunity_upload_dir_forAssets( $args ) {

    // Get the current post_id
    $id = ( isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '' );

    if( $id ) {

        $pathofPost = get_post_meta($id,'wpunity_asset3d_pathData',true);
        // Set the new path depends on current post_type
        $newdir = '/' . $pathofPost;

        $args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
        $args['url']     = str_replace( $args['subdir'], '', $args['url'] );
        $args['subdir']  = $newdir;
        $args['path']   .= $newdir;
        $args['url']    .= $newdir;
    }
    return $args;
}

add_filter( 'upload_dir', 'wpunity_upload_dir_forAssets' );



function wpunity_aftertitle_info($post) {

    $post_type = get_post_type($post->ID);
    if($post_type == 'wpunity_game'){
        $gameSlug = $post->post_name;
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir .= "/" . $gameSlug;
        $upload_dir = str_replace('\\','/',$upload_dir);
        echo '<b>Slug:</b> ' . $gameSlug;
        echo '<br/><b>Upload Folder:</b>' . $upload_dir;
    }
    elseif($post_type == 'wpunity_scene'){
        $sceneSlug = $post->post_name;
        $terms = wp_get_post_terms( $post->ID, 'wpunity_scene_pgame');
        $gameSlug = $terms[0]->slug;
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir .= "/" . $gameSlug . "/" . $sceneSlug;
        $upload_dir = str_replace('\\','/',$upload_dir);
        echo '<b>Slug:</b> ' . $sceneSlug;
        echo '<br/><b>Upload Folder:</b>' . $upload_dir;
    }
    elseif($post_type == 'wpunity_asset3d'){
        $assetSlug = $post->post_name;
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $pathofPost = get_post_meta($post->ID,'wpunity_asset3d_pathData',true);
        $upload_dir .= "/" . $pathofPost;
        $upload_dir = str_replace('\\','/',$upload_dir);
        echo '<b>Slug:</b> ' . $assetSlug;
        echo '<br/><b>Upload Folder:</b>' . $upload_dir;
    }

}


add_action( 'edit_form_after_title', 'wpunity_aftertitle_info' );


/**
 * 1.01
 * Overwrite Uploads
 *
 * Upload files with the same namew, without uploading copy with unique filename
 *
 */

function wpunity_overwrite_uploads( $name ){
    $args = array(
        'numberposts'   => -1,
        'post_type'     => 'attachment',
        'meta_query' => array(
            array(
                'key' => '_wp_attached_file',
                'value' => $name,
                'compare' => 'LIKE'
            )
        )
    );
    $attachments_to_remove = get_posts( $args );

    foreach( $attachments_to_remove as $attach )
        wp_delete_attachment( $attach->ID, true );

    return $name;
}

add_filter( 'sanitize_file_name', 'wpunity_overwrite_uploads', 10, 1 );



// ---- AJAX COMPILE 1: compile game, i.e. make a bat file and run it
function wpunity_compile_action_callback() {

    $DS = DIRECTORY_SEPARATOR;
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {

        $game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_windows'; //$_GET['game_dirpath'];

        // 1 : Generate bat
        $myfile = fopen($game_dirpath.$DS."starter_artificial.bat", "w") or die("Unable to open file!");
        $txt = '"C:\Program Files\Unity\Editor\Unity.exe" -quit -batchmode -logFile '.$game_dirpath.'\stdout.log -projectPath '. $game_dirpath .' -buildWindowsPlayer "builds\mygame.exe"';
        fwrite($myfile, $txt);
        fclose($myfile);

        // 2: run bat
        $output = shell_exec('start /b starter_artificial.bat /c');

    } else { // LINUX SERVER

        $game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_linux'; //$_GET['game_dirpath'];

        // 1 : Generate sh
        $myfile = fopen($game_dirpath.$DS."starter_artificial.sh", "w") or print("Unable to open file!");
        $txt = "#/bin/bash"."\n".
            "projectPath=`pwd`"."\n".
            "xvfb-run --auto-servernum --server-args='-screen 0 1024x768x24:32' /opt/Unity/Editor/Unity -batchmode -nographics -logfile stdout.log -force-opengl -quit -projectPath ${projectPath} -buildWindowsPlayer 'builds/myg3.exe'";
        fwrite($myfile, $txt);
        fclose($myfile);

        // 2: run sh (nohup     '/dev ...' ensures that it is asynchronous called)
        $output = shell_exec('nohup sh starter_artificial.sh'.'> /dev/null 2>/dev/null &');
    }

    wp_die();
}

//---- AJAX COMPILE 2: read compile stdout.log file and return content.
function wpunity_monitor_compiling_action_callback(){
    $DS = DIRECTORY_SEPARATOR;
    $game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_windows';
    $fs = file_get_contents($game_dirpath.$DS."stdout.log");
    echo $fs;

    wp_die();
}

//---- AJAX COMPILE 3: Zip the builds folder
function wpunity_game_zip_action_callback(){

    $DS = DIRECTORY_SEPARATOR;
    $game_dirpath = realpath(dirname(__FILE__).'/..').$DS.'test_compiler'.$DS.'game_windows';

    $rootPath = realpath($game_dirpath).'/builds';
    $zip_file = realpath($game_dirpath).'/game.zip';

    // Initialize archive object
    $zip = new ZipArchive();
    $resZip = $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    if ($resZip===TRUE) {

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();
        echo 'Zip successfully finished';
        wp_die();
    } else {
        echo 'Failed to zip, code:'.$resZip;
        wp_die();
    }
}
