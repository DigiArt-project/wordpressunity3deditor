<?php


function wpunity_getAllassets_byScene($sceneID){

    $originalScene = get_post($sceneID);
    $sceneSlug = $originalScene->post_name;
    //Get 'Asset's Parent Scene' taxonomy with the same slug
    $sceneTaxonomy = get_term_by('slug', $sceneSlug, 'wpunity_asset3d_pscene');
    $sceneTaxonomyID = $sceneTaxonomy->term_id;

    $queryargs = array(
        'post_type' => 'wpunity_asset3d',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_asset3d_pscene',
                'field' => 'id',
                'terms' => $sceneTaxonomyID
            )
        )
    );

    $custom_query = new WP_Query( $queryargs );

    if ( $custom_query->have_posts() ) :
        while ( $custom_query->have_posts() ) :

            $custom_query->the_post();
            $asset_id = get_the_ID();

            //ALL DATA WE NEED
            $objID = get_post_meta($asset_id, 'wpunity_asset3d_obj', true); //OBJ ID
            if($objID){$objPath = wp_get_attachment_url( $objID );} //OBJ PATH
            $mtlID = get_post_meta($asset_id, 'wpunity_asset3d_mtl', true); //MTL ID
            if($mtlID){$mtlPath = wp_get_attachment_url( $mtlID );} //MTL PATH
            $difImageID = get_post_meta($asset_id, 'wpunity_asset3d_diffimage', true); //Diffusion Image ID
            if($difImageID){$difImagePath = wp_get_attachment_url( $difImageID );} //Diffusion Image PATH
            $screenImageID = get_post_meta($asset_id, 'wpunity_asset3d_screenimage', true); //Screenshot Image ID
            if($screenImageID){$screenImagePath = wp_get_attachment_url( $screenImageID );} //Screenshot Image PATH


            //DELETE THEM - TEMPORARY OUTPUT
            echo 'objID:' . $objID . '<br/>';
            echo 'objPath:' . $objPath . '<br/>';
            echo 'mtlID:' . $mtlID . '<br/>';
            echo 'mtlPath:' . $mtlPath . '<br/>';
            echo 'difImageID:' . $difImageID . '<br/>';
            echo 'difImagePath:' . $difImagePath . '<br/>';
            echo 'screenImageID:' . $screenImageID . '<br/>';
            echo 'screenImagePath:' . $screenImagePath . '<br/><br/>';

        endwhile;
    endif;

    // Reset postdata
    wp_reset_postdata();

}




function wpunity_getTemplateID_forAsset($asset_id){

    $parentSceneterms = wp_get_post_terms( $asset_id, 'wpunity_asset3d_pscene');

    $parentSceneSlug = $parentSceneterms[0]->slug;
    $custom_args = array(
        'name'        => $parentSceneSlug,
        'post_type'   => 'wpunity_scene',
    );
    $my_posts = get_posts($custom_args);
    $sceneID = $my_posts[0]->ID;


    $parentGameterms = wp_get_post_terms( $sceneID, 'wpunity_scene_pgame');
    $gameSlug = $parentGameterms[0]->slug;
    $custom_args = array(
        'name'        => $gameSlug,
        'post_type'   => 'wpunity_game',
    );
    $my_posts = get_posts($custom_args);
    $gameID = $my_posts[0]->ID;

    $parentTempterms = wp_get_post_terms( $sceneID, 'wpunity_game_cat');
    $tempSlug = $parentTempterms[0]->slug;
    $custom_args = array(
        'name'        => $tempSlug,
        'post_type'   => 'wpunity_yamltemp',
    );
    $my_posts = get_posts($custom_args);
    $tempID = $my_posts[0]->ID;

    return $tempID;
}

//==========================================================================================================================================

function wpunity_disable_imgthumbs_assets( $image_sizes ){

    // extra sizes
    $slider_image_sizes = array(  );
    // for ex: $slider_image_sizes = array( 'thumbnail', 'medium' );

    // instead of unset sizes, return your custom size (nothing)
    if( isset($_REQUEST['post_id']) && 'wpunity_asset3d' === get_post_type( $_REQUEST['post_id'] ) )
        return $slider_image_sizes;

    return $image_sizes;
}

add_filter( 'intermediate_image_sizes', 'wpunity_disable_imgthumbs_assets', 999 );

//==========================================================================================================================================

function force_post_title_init(){
    wp_enqueue_script('jquery');
}

function force_post_title(){
    global $post;
    $post_type = get_post_type($post->ID);
    if($post_type == 'wpunity_asset3d' || $post_type == 'wpunity_scene' || $post_type == 'wpunity_game' || $post_type == 'wpunity_yamltemp') {
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

function wpunity_change_publish_button( $translation, $text ) {
    global $post;
    $post_type = get_post_type($post->ID);
    if($post_type == 'wpunity_asset3d' || $post_type == 'wpunity_scene' || $post_type == 'wpunity_game' || $post_type == 'wpunity_yamltemp') {
        if ($text == 'Publish')
            return 'Create';
        if ($text == 'Update')
            return 'Save';
    }

    return $translation;
}

add_filter( 'gettext', 'wpunity_change_publish_button', 10, 2 );

//==========================================================================================================================================

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

//==========================================================================================================================================

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

//==========================================================================================================================================

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

//==========================================================================================================================================

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

function wpunity_fetch_description_action_callback(){

    if ($_POST['externalSource']=='Wikipedia'){
        $url = 'https://'.$_POST['lang'].'.wikipedia.org/w/api.php?action=query&format=json&exlimit=3&prop=extracts&'.$_POST['fulltext'].'titles='.$_POST['titles'];
    } else {
        $url = 'https://www.europeana.eu/api/v2/search.json?wskey=8mfU6ZgfW&query='.$_POST['titles'];//.'&qf=LANGUAGE:'.$_POST['lang'];
    }

    $content = file_get_contents($url);
    echo $content;

    wp_die();
}


function wpunity_fetch_image_action_callback(){

    if ($_POST['externalSource_image']=='Wikipedia'){
        $url = 'https://'.$_POST['lang_image'].'.wikipedia.org/w/api.php?action=query&prop=imageinfo&format=json&iiprop=url&generator=images&titles='.$_POST['titles_image'];
    } else {
        $url = 'https://www.europeana.eu/api/v2/search.json?wskey=8mfU6ZgfW&query='.$_POST['titles_image'];//.'&qf=LANGUAGE:'.$_POST['lang_image'];
    }


    $content = file_get_contents($url);
    echo $content;

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

    $DS = DIRECTORY_SEPARATOR;

    $fs = file_get_contents(pathinfo($_POST['obj'], PATHINFO_DIRNAME ).'/log.txt');
    echo $fs;

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

    foreach ($files as $name => $file)
    {
        // Skip directories (they would be added automatically)
        if (!$file->isDir() and pathinfo($file,PATHINFO_EXTENSION)=='obj')
        {

            echo "<a href='".wp_upload_dir()['baseurl']."/".$_POST['path'].basename($file)."' >".basename($file)."</a><br />";
        }
    }

    wp_die();
}

