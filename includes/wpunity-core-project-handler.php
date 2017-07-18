<?php


//DELETE GAME PROJECT with files
function wpunity_delete_gameproject_frontend($game_id){

    //wp_delete_post( $game_id, false );

}


//DELETE GAME PROJECT with files
function wpunity_delete_asset3d_frontend($asset_id){
    $pathofPost = get_post_meta($asset_id,'wpunity_asset3d_pathData',true);
    wpunity_delete_asset3d_post_media( $asset_id , $pathofPost );
    wp_delete_post( $asset_id, true );

}


function wpunity_delete_asset3d_post_media( $asset_id ,$pathofPost ) {
    $attachments = get_posts(
        array(
            'post_type'      => 'attachment',
            'posts_per_page' => -1,
            'post_status'    => 'any',
            'post_parent'    => $asset_id,
        )
    );

    foreach ( $attachments as $attachment ) {
        //1.get attachment name/slug
        $attachment_name = $attachment->post_name;
        //2.delete (unlink) meta with the same name
        wp_delete_attachment( $attachment->ID );
    }
}


//==========================================================================================================================================
//ABOUT MEDIA HANDLE


function wpunity_upload_dir_forAssets( $args ) {

    // Get the current post_id
    $id = ( isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '' );

    if( $id ) {

        if ( get_post_type( $id ) == 'wpunity_asset3d' ) {

//            global $post;
//            $gameterms = get_the_terms( $post->ID , 'wpunity_asset3d_pgame' );
//            $projectSlug = $gameterms[0]->slug; // wp_get_object_terms( $post->ID, 'wpunity_asset3d_pgame')[0]->slug; //

            $pathofPost = get_post_meta($id,'wpunity_asset3d_pathData',true);

            $newdir =  '/' . $pathofPost . '/Models';

            $args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
            $args['url']     = str_replace( $args['subdir'], '', $args['url'] );
            $args['subdir']  = $newdir;
            $args['path']   .= $newdir;
            $args['url']    .= $newdir;


        }elseif(get_post_type( $id ) == 'wpunity_scene'){

            $gameterms = get_the_terms( $id , 'wpunity_scene_pgame' );
            $projectSlug = $gameterms[0]->slug;
            // Set the new path depends on current post_type
            $newdir = '/' . $projectSlug . '/Scenes';

            $args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
            $args['url']     = str_replace( $args['subdir'], '', $args['url'] );
            $args['subdir']  = $newdir;
            $args['path']   .= $newdir;
            $args['url']    .= $newdir;
        }


    }
    return $args;
}

add_filter( 'upload_dir', 'wpunity_upload_dir_forAssets' );


/**
 * 1.01
 * Overwrite Uploads
 *
 * Upload files with the same namew, without uploading copy with unique filename
 *
 */

function wpunity_overwrite_uploads( $name ){

    if( isset($_REQUEST['post_id']) ) {
        $post_id =  (int)$_REQUEST['post_id'];
    }else{
        $post_id=0;
    }

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

    foreach( $attachments_to_remove as $attach ){
        if($attach->post_parent == $post_id) {
            wp_delete_attachment($attach->ID, true);
        }
    }

    return $name;
}

add_filter( 'sanitize_file_name', 'wpunity_overwrite_uploads', 10, 1 );



//DISABLE ALL AUTO-CREATED THUMBS for Assets3D
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

function wpunity_compile_the_game($gameID,$gameSlug){
    //1. Create Default Folder Structure (Delete everything old)
    wpunity_compile_folders_gen($gameSlug);

//    echo "Hello";
//
//    die;
}


function wpunity_compile_folders_gen($gameSlug){
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);

    //--Uploads/myGameProjectUnity--
    $myGameProjectUnityF = $upload_dir . '/' . $gameSlug . 'Unity';
    //if the folder exists, then delete everything before create new folders
    if(is_dir($myGameProjectUnityF)){
        wpunity_compile_folders_del($myGameProjectUnityF);
    }
    mkdir($myGameProjectUnityF, 0755) or wp_die("Unable to create the folder ".$myGameProjectUnityF);

    //--Uploads/myGameProjectUnity/ProjectSettings--
    //--Uploads/myGameProjectUnity/Assets--
    //--Uploads/myGameProjectUnity/build--
    $ProjectSettingsF = $myGameProjectUnityF . "/" . 'ProjectSettings';
    $AssetsF = $myGameProjectUnityF . "/" . 'Assets';
    $buildF = $myGameProjectUnityF . "/" . 'build';
    if (!is_dir($ProjectSettingsF)) {mkdir($ProjectSettingsF, 0755) or wp_die("Unable to create the folder".$ProjectSettingsF);}
    if (!is_dir($AssetsF)) {mkdir($AssetsF, 0755) or wp_die("Unable to create the folder".$AssetsF);}
    if (!is_dir($buildF)) {mkdir($buildF, 0755) or wp_die("Unable to create the folder".$buildF);}

    //--Uploads/myGameProjectUnity/Assets/Editor--
    //--Uploads/myGameProjectUnity/Assets/scenes--
    //--Uploads/myGameProjectUnity/Assets/models--
    //--Uploads/myGameProjectUnity/Assets/StandardAssets--
    $EditorF = $AssetsF . "/" . 'Editor';
    $scenesF = $AssetsF . "/" . 'scenes';
    $modelsF = $AssetsF . "/" . 'models';
    $StandardAssetsF = $AssetsF . "/" . 'StandardAssets';
    if (!is_dir($EditorF)) {mkdir($EditorF, 0755) or wp_die("Unable to create the folder".$EditorF);}
    if (!is_dir($scenesF)) {mkdir($scenesF, 0755) or wp_die("Unable to create the folder".$scenesF);}
    if (!is_dir($modelsF)) {mkdir($modelsF, 0755) or wp_die("Unable to create the folder".$modelsF);}
    if (!is_dir($StandardAssetsF)) {mkdir($StandardAssetsF, 0755) or wp_die("Unable to create the folder".$StandardAssetsF);}
}


function wpunity_compile_folders_del($dirname) {
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname."/".$file))
                unlink($dirname."/".$file);
            else
                delete_directory($dirname.'/'.$file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}


?>