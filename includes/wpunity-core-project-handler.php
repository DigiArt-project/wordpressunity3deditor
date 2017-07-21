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
    //0. Delete everything
    wpunity_compile_folders_del($gameSlug);
    //1. Create Default Folder Structure (Delete everything old)
    wpunity_compile_folders_gen($gameSlug);
    //2. Create Project Settings files (16 files)
    wpunity_compile_settings_gen($gameID,$gameSlug);
    //3. Create Model folders/files
    wpunity_compile_models_gen($gameID,$gameSlug);
    //4. Create Unity files (at Assets/scenes)
    //5. Copy StandardAssets folder (at Assets/StandardAssets)
}


function wpunity_compile_folders_del($gameSlug) {

    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);

    //--Uploads/myGameProjectUnity--
    $myGameProjectUnityF = $upload_dir . '/' . $gameSlug . 'Unity';
    $path = $myGameProjectUnityF;

    if (is_dir($path) === true) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($files as $file) {
            if (in_array($file->getBasename(), array('.', '..')) !== true) {
                if ($file->isDir() === true) {
                    rmdir($file->getPathName());
                }
                else if (($file->isFile() === true) || ($file->isLink() === true)) {
                    unlink($file->getPathname());
                }
            }
        }

        return rmdir($path);
    }
    else if ((is_file($path) === true) || (is_link($path) === true)) {
        return unlink($path);
    }

    return false;

}

function wpunity_compile_folders_gen($gameSlug){
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);

    //--Uploads/myGameProjectUnity--
    $myGameProjectUnityF = $upload_dir . '/' . $gameSlug . 'Unity';
    if (!is_dir($myGameProjectUnityF)) {mkdir($myGameProjectUnityF, 0755) or wp_die("Unable to create the folder ".$myGameProjectUnityF);}

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

function wpunity_compile_settings_gen($gameID,$gameSlug){

    $all_game_category = get_the_terms( $gameID, 'wpunity_game_type' );
    $game_category = $all_game_category[0]->term_id;

    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity';

    wpunity_compile_settings_files_gen($game_path,'AudioManager.asset',get_term_meta($game_category,'wpunity_audio_manager_term',true));
    wpunity_compile_settings_files_gen($game_path,'ClusterInputManager.asset',get_term_meta($game_category,'wpunity_cluster_input_manager_term',true));
    wpunity_compile_settings_files_gen($game_path,'DynamicsManager.asset',get_term_meta($game_category,'wpunity_dynamics_manager_term',true));
    wpunity_compile_settings_files_gen($game_path,'EditorBuildSettings.asset',get_term_meta($game_category,'wpunity_editor_build_settings_term',true));
    wpunity_compile_settings_files_gen($game_path,'EditorSettings.asset',get_term_meta($game_category,'wpunity_editor_settings_term',true));
    wpunity_compile_settings_files_gen($game_path,'GraphicsSettings.asset',get_term_meta($game_category,'wpunity_graphics_settings_term',true));
    wpunity_compile_settings_files_gen($game_path,'InputManager.asset',get_term_meta($game_category,'wpunity_input_manager_term',true));
    wpunity_compile_settings_files_gen($game_path,'NavMeshAreas.asset',get_term_meta($game_category,'wpunity_nav_mesh_areas_term',true));
    wpunity_compile_settings_files_gen($game_path,'NetworkManager.asset',get_term_meta($game_category,'wpunity_network_manager_term',true));
    wpunity_compile_settings_files_gen($game_path,'Physics2DSettings.asset',get_term_meta($game_category,'wpunity_physics2d_settings_term',true));
    wpunity_compile_settings_files_gen($game_path,'ProjectSettings.asset',get_term_meta($game_category,'wpunity_project_settings_term',true));
    wpunity_compile_settings_files_gen($game_path,'ProjectVersion.asset',get_term_meta($game_category,'wpunity_project_version_term',true));
    wpunity_compile_settings_files_gen($game_path,'QualitySettings.asset',get_term_meta($game_category,'wpunity_quality_settings_term',true));
    wpunity_compile_settings_files_gen($game_path,'TagManager.asset',get_term_meta($game_category,'wpunity_tag_manager_term',true));
    wpunity_compile_settings_files_gen($game_path,'TimeManager.asset',get_term_meta($game_category,'wpunity_time_manager_term',true));
    wpunity_compile_settings_files_gen($game_path,'UnityConnectSettings.asset',get_term_meta($game_category,'wpunity_unity_connect_settings_term',true));
}

function wpunity_compile_settings_files_gen($game_path,$fileName,$fileYaml){

    $file = $game_path . '/ProjectSettings/' . $fileName;
    //TODO if $fileName=EditorBuildSettings.asset
    $create_file = fopen($file, "w") or die("Unable to open file!");
    fwrite($create_file, $fileYaml);
    fclose($create_file);

}

function wpunity_compile_models_gen($gameID,$gameSlug){

    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity/Assets/models';

    $queryargs = array(
        'post_type' => 'wpunity_asset3d',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_asset3d_pgame',
                'field' => 'slug',
                'terms' => $gameSlug
            )
        )
    );
    $custom_query = new WP_Query( $queryargs );
    if ( $custom_query->have_posts() ) :
        while ( $custom_query->have_posts() ) :
            $custom_query->the_post();
            $asset_id = get_the_ID();
            wpunity_compile_assets_cre($game_path,$asset_id);
        endwhile;
    endif;
    wp_reset_postdata();

}

function wpunity_compile_assets_cre($game_path,$asset_id){
    //Create the folder of the Model(Asset)
    $asset_post = get_post($asset_id);
    $folder = $game_path . '/' . $asset_post->post_name;
    if (!is_dir($folder)) {mkdir($folder, 0755) or wp_die("Unable to create the folder ".$folder);}

    //Copy files of the Model
    $objID = get_post_meta($asset_id, 'wpunity_asset3d_obj', true); // OBJ ID
    if(is_numeric($objID)){
        $attachment_post = get_post($objID);
        $attachment_file = $attachment_post->guid;
        $attachment_tempname = str_replace('\\', '/', $attachment_file);
        $attachment_name = pathinfo($attachment_tempname);
        $new_file = $folder .'/' . $attachment_name['filename'] . '.obj';
        copy($attachment_file,$new_file);
        wpunity_compile_objmeta_cre($folder,$attachment_name['filename'],$objID);
    }

    $mtlID = get_post_meta($asset_id, 'wpunity_asset3d_mtl', true); // MTL ID
    if(is_numeric($mtlID)){
        $attachment_post = get_post($mtlID);
        $attachment_file = $attachment_post->guid;
        $attachment_tempname = str_replace('\\', '/', $attachment_file);
        $attachment_name = pathinfo($attachment_tempname);
        $new_file = $folder .'/' . $attachment_name['filename'] . '.mtl';
        copy($attachment_file,$new_file);
    }

    $difimgID = get_post_meta($asset_id, 'wpunity_asset3d_diffimage', true); // Diffusion Image ID
    if(is_numeric($difimgID)){
        $attachment_post = get_post($difimgID);
        $attachment_file = $attachment_post->guid;
        $attachment_tempname = str_replace('\\', '/', $attachment_file);
        $attachment_name = pathinfo($attachment_tempname);
        $new_file = $folder .'/' . $attachment_name['filename'] . '.jpg';
        copy($attachment_file,$new_file);
    }


}

function wpunity_compile_objmeta_cre($folder,$objName,$objID){
    $file = $folder . '/' . $objName . '.obj.meta';
    $create_file = fopen($file, "w") or die("Unable to open file!");
    $objMetaPattern = wpunity_getYaml_obj_dotmeta_pattern();
    $objMetaContent = wpunity_replace_objmeta($objMetaPattern,$objID);
    fwrite($create_file, $objMetaContent);
    fclose($create_file);
}
?>