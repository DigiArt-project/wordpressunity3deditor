<?php

//DELETE GAME PROJECT
function wpunity_delete_gameproject_frontend($game_id){
    $game_post = get_post($game_id);
    $gameSlug = $game_post->post_name;

    //1.Delete Assets
    $assetPGame = get_term_by('slug', $gameSlug, 'wpunity_asset3d_pgame');
    $assetPGameID = $assetPGame->term_id;

    $custom_query_args1 = array(
        'post_type' => 'wpunity_asset3d',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_asset3d_pgame',
                'field'    => 'term_id',
                'terms'    => $assetPGameID,
            ),
        ),
    );
     // Instantiate custom query
    $custom_query = new WP_Query( $custom_query_args1 );
    // Output custom query loop
    if ( $custom_query->have_posts() ) :
        while ( $custom_query->have_posts() ) :
            $custom_query->the_post();
            $asset_id = get_the_ID();
            wpunity_delete_asset3d_frontend($asset_id,$gameSlug);
        endwhile;
    endif;

    wp_reset_postdata();

    //2.Delete Scenes
    $scenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
    $scenePGameID = $scenePGame->term_id;

    $custom_query_args2 = array(
        'post_type' => 'wpunity_scene',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_scene_pgame',
                'field'    => 'term_id',
                'terms'    => $scenePGameID,
            ),
        ),
    );
    // Instantiate custom query
    $custom_query2 = new WP_Query( $custom_query_args2 );
    // Output custom query loop
    if ( $custom_query2->have_posts() ) :
        while ( $custom_query2->have_posts() ) :
            $custom_query2->the_post();
            $scene_id = get_the_ID();
            wpunity_delete_scene_frontend($scene_id);
        endwhile;
    endif;

    wp_reset_postdata();

    //3. Delete taxonomies from Assets & Scenes
    wp_delete_term( $assetPGameID, 'wpunity_asset3d_pgame' );
    wp_delete_term( $scenePGameID, 'wpunity_scene_pgame' );

    //4. Delete Compile Folder of Game (if exists)
    wpunity_compile_folders_del($gameSlug);

    //5. Delete Game CUSTOM POST
    wp_delete_post( $game_id, false );

}

function wpunity_delete_scene_frontend($scene_id){
    //1. Delete Scene CUSTOM POST
    wp_delete_post( $scene_id, true );
}

//DELETE GAME PROJECT with files
function wpunity_delete_asset3d_frontend($asset_id,$gameSlug){

    //1. Delete all Attachments (mtl/obj/jpg ...)
    $mtlID = get_post_meta($asset_id,'wpunity_asset3d_mtl', true);
    wp_delete_attachment( $mtlID,true );
    $objID = get_post_meta($asset_id,'wpunity_asset3d_obj', true);
    wp_delete_attachment( $objID,true );
    $difID = get_post_meta($asset_id,'wpunity_asset3d_diffimage', true);
    wp_delete_attachment( $difID,true );
    $screenID = get_post_meta($asset_id,'wpunity_asset3d_screenimage', true);
    wp_delete_attachment( $screenID,true );

    //2. Delete all uses of Asset from Scenes (json)
    wpunity_delete_asset3d_from_scenes($asset_id,$gameSlug);

    //3. Delete Asset3D CUSTOM POST
    wp_delete_post( $asset_id, true );

}

function wpunity_delete_asset3d_from_scenes($asset_id,$gameSlug){
    $scenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
    $scenePGameID = $scenePGame->term_id;

    $custom_query_args2 = array(
        'post_type' => 'wpunity_scene',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_scene_pgame',
                'field'    => 'term_id',
                'terms'    => $scenePGameID,
            ),
        ),
    );
    // Instantiate custom query
    $custom_query2 = new WP_Query( $custom_query_args2 );
    // Output custom query loop
    if ( $custom_query2->have_posts() ) :
        while ( $custom_query2->have_posts() ) :
            $custom_query2->the_post();
            $scene_id = get_the_ID();
            $scene_json = get_post_meta($scene_id,'wpunity_scene_json_input', true);


            $jsonScene = htmlspecialchars_decode ( $scene_json );
            $sceneJsonARR = json_decode($jsonScene, TRUE);
            $tempScenearr = $sceneJsonARR;
            foreach ($tempScenearr['objects'] as $key => $value ) {
                if ($key != 'avatarYawObject') {
                    if($value['assetid'] == $asset_id) {
                        unset($tempScenearr['objects'][$key]);
                        $tempScenearr['metadata']['objects'] --;
                    }
                }
            }

            $tempScenearr = json_encode($tempScenearr, JSON_PRETTY_PRINT);
            update_post_meta($scene_id,'wpunity_scene_json_input',$tempScenearr );

        endwhile;
    endif;

    wp_reset_postdata();
}


//==========================================================================================================================================
//ABOUT MEDIA HANDLE


function wpunity_upload_dir_forAssets( $args ) {

    // Get the current post_id
    $id = ( isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '' );

    if( $id ) {

        if ( get_post_type( $id ) == 'wpunity_asset3d' ) {

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

function wpunity_assemble_the_unity_game_project($gameID, $gameSlug, $targetPlatform){

    wpunity_compile_folders_del($gameSlug);//0. Delete everything in order to recreate them from scratch

    wpunity_compile_folders_gen($gameSlug);//1. Create Default Folder Structure

    wpunity_compile_cs_gen($gameSlug, $targetPlatform);//1b. Create cs file before all data

    wpunity_compile_settings_gen($gameID,$gameSlug);//2. Create Project Settings files (16 files)

    wpunity_compile_models_gen($gameID,$gameSlug);//3. Create Model folders/files

    wpunity_compile_scenes_gen($gameID,$gameSlug);//4. Create Unity files (at Assets/scenes)

    wpunity_compile_copy_StandardAssets($gameSlug,$gameType='Energy');//5. Copy StandardAssets depending the Game Type

    return 'true';
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

        //$h = fopen("files_report.txt","w");

        foreach ($files as $file) {

//            fwrite($h, $file->getPathname() . chr(10));
//
//            if (strpos($file->getPathname(), $gameSlug . "Unity\Library")) {
//                continue;
//                //fwrite($h, "Yes" . chr(10));
//            }else
//                fwrite($h, "No". chr(10));



            if (in_array($file->getBasename(), array('.', '..')) !== true) {
                if ($file->isDir() === true && $file->getBasename() != 'Library'  ) {
                    rmdir($file->getPathName());
                }
                else if (($file->isFile() === true) || ($file->isLink() === true)){ // && $file->getParentFolderName() != 'Library' ) {
                    unlink($file->getPathname());
                }
            }
        }

        //fclose($h);

        return true; //rmdir($path);
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
    $buildF = $myGameProjectUnityF . "/" . 'builds';
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

function wpunity_compile_cs_gen($gameSlug, $targetPlatform){
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    //--Uploads/myGameProjectUnity--
    $filepath =$filepath = $upload_dir . '/' . $gameSlug . 'Unity' . '/Assets/Editor/HandyBuilder.cs';
    wpunity_createEmpty_HandyBuilder_cs($filepath, $targetPlatform);
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
    $create_file = fopen($file, "w") or die("Unable to open file!");
    fwrite($create_file, $fileYaml);
    fclose($create_file);

}

function wpunity_compile_models_gen($gameID,$gameSlug){

    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity/Assets/models';
    $handybuilder_file = $upload_dir . '/' . $gameSlug . 'Unity' . '/Assets/Editor/HandyBuilder.cs';

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
            wpunity_compile_assets_cre($game_path,$asset_id,$handybuilder_file);
        endwhile;
    endif;
    wp_reset_postdata();

}

function wpunity_compile_assets_cre($game_path,$asset_id,$handybuilder_file){
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
        $new_file_path_forCS = 'Assets/models/' . $asset_post->post_name .'/' . $attachment_name['filename'] . '.obj';
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, $new_file_path_forCS, null);
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

function wpunity_compile_scenes_gen($gameID,$gameSlug){
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity/Assets/scenes';
    $settings_path = $upload_dir . "/" . $gameSlug . 'Unity/ProjectSettings';
    $handybuilder_file = $upload_dir . '/' . $gameSlug . 'Unity' . '/Assets/Editor/HandyBuilder.cs';

    wpunity_compile_scenes_static_cre($game_path,$gameSlug,$settings_path,$handybuilder_file);

    $queryargs = array(
        'post_type' => 'wpunity_scene',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_scene_pgame',
                'field' => 'slug',
                'terms' => $gameSlug
            )
        ),
        'orderby' => 'ID',
        'order'   => 'ASC',
    );
    $scenes_counter = 1;
    $custom_query = new WP_Query( $queryargs );
    if ( $custom_query->have_posts() ) :
        while ( $custom_query->have_posts() ) :
            $custom_query->the_post();
            $scene_id = get_the_ID();
            //Create the non-static Unity Scenes (or those that have dependency from non-static)
            $scenes_counter = wpunity_compile_scenes_cre($game_path,$scene_id,$gameSlug,$settings_path,$scenes_counter,$handybuilder_file);
        endwhile;
    endif;
    wp_reset_postdata();
}

function wpunity_compile_scenes_static_cre($game_path,$gameSlug,$settings_path,$handybuilder_file){
    //get the first Game Type taxonomy in order to get the yamls (all of them have the same)
    $mainMenuTerm = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml');
    $term_meta_s_reward = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_reward',true);
    $term_meta_s_selector = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_selector',true);
    $term_meta_s_selector_title = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_selector_title',true);
    $fileEditorBuildSettings = $settings_path . '/EditorBuildSettings.asset';//path of EditorBuildSettings.asset

    $file = $game_path . '/' . 'S_Reward.unity';
    $create_file = fopen($file, "w") or die("Unable to open file!");
    fwrite($create_file, $term_meta_s_reward);
    fclose($create_file);


    $file2 = $game_path . '/' . 'S_SceneSelector.unity';
    $file_content = str_replace("___[text_title_scene_selector]___",$term_meta_s_selector_title,$term_meta_s_selector);
    $create_file2 = fopen($file2, "w") or die("Unable to open file!");
    fwrite($create_file2, $file_content);
    fclose($create_file2);

}

function wpunity_compile_scenes_cre($game_path,$scene_id,$gameSlug,$settings_path,$scenes_counter,$handybuilder_file){
    $scene_post = get_post($scene_id);

    $scene_type = get_the_terms( $scene_id, 'wpunity_scene_yaml' );
    $scene_type_ID = $scene_type[0]->term_id;
    $scene_type_slug = $scene_type[0]->slug;

    if($scene_type_slug == 'mainmenu-yaml'){
        //DATA of mainmenu
        $term_meta_s_mainmenu = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_mainmenu',true);
        $title_text = $scene_post->post_title;
        $is_bt_settings_active = intval ( get_post_meta($scene_id,'wpunity_menu_has_options',true) );
        $is_help_bt_active = intval ( get_post_meta($scene_id,'wpunity_menu_has_help',true) );
        $is_login_bt_active = intval ( get_post_meta($scene_id,'wpunity_menu_has_login',true) );
        $is_exit_button_active = 1;//TODO
        $featured_image_sprite_id = get_post_thumbnail_id( $scene_id );//The Featured Image ID
        $featured_image_sprite_guid = 'dad02368a81759f4784c7dbe752b05d6';//if there's no Featured Image
        if($featured_image_sprite_id != ''){$featured_image_sprite_guid = wpunity_compile_sprite_upload($featured_image_sprite_id,$gameSlug,$scene_id);}

        $file_content = wpunity_replace_mainmenu_unity($term_meta_s_mainmenu,$title_text,$featured_image_sprite_guid,$is_bt_settings_active,$is_help_bt_active,$is_exit_button_active,$is_login_bt_active);

        $file = $game_path . '/' . 'S_MainMenu.unity';
        $create_file = fopen($file, "w") or die("Unable to open file!");
        fwrite($create_file, $file_content);
        fclose($create_file);

        $fileEditorBuildSettings = $settings_path . '/EditorBuildSettings.asset';//path of EditorBuildSettings.asset
        wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_MainMenu.unity');//Update the EditorBuildSettings.asset by adding new Scene
        $file1_path_CS = 'Assets/scenes/' . 'S_MainMenu.unity';
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file1_path_CS);


        //Add Static Pages to cs & BuildSettings (Main Menu must be first)
        wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Reward.unity');//Update the EditorBuildSettings.asset by adding new Scene
        $file_path_rewCS = 'Assets/scenes/' . 'S_Reward.unity';
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file_path_rewCS);

        wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_SceneSelector.unity');//Update the EditorBuildSettings.asset by adding new Scene
        $file_path_selCS = 'Assets/scenes/' . 'S_SceneSelector.unity';
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file_path_selCS);
        

        if($is_bt_settings_active == '1'){
            //CREATE SETTINGS/OPTIONS Unity file
            $term_meta_s_settings = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_options',true);
            $file_content2 = wpunity_replace_settings_unity($term_meta_s_settings);

            $file2 = $game_path . '/' . 'S_Settings.unity';
            $create_file2 = fopen($file2, "w") or die("Unable to open file!");
            fwrite($create_file2,$file_content2);
            fclose($create_file2);

            wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Settings.unity');//Update the EditorBuildSettings.asset by adding new Scene
            $file2_path_CS = 'Assets/scenes/' . 'S_Settings.unity';
            wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file2_path_CS);
        }

        if($is_help_bt_active == '1'){
            //CREATE HELP Unity file
            $term_meta_s_help = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_help',true);
            $text_help_scene = get_post_meta($scene_id,'wpunity_scene_help_text',true);
            $img_help_scene_id = get_post_meta($scene_id,'wpunity_scene_helpimg',true);
            $img_help_scene_guid = 'dad02368a81759f4784c7dbe752b05d6'; //if there's no Featured Image (custom field at Main Menu)
            if($img_help_scene_id != ''){$img_help_scene_guid = wpunity_compile_sprite_upload($img_help_scene_id,$gameSlug,$scene_id);}
            $file_content3 = wpunity_replace_help_unity($term_meta_s_help,$text_help_scene,$img_help_scene_guid);

            $file3 = $game_path . '/' . 'S_Help.unity';
            $create_file3 = fopen($file3, "w") or die("Unable to open file!");
            fwrite($create_file3, $file_content3);
            fclose($create_file3);

            wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Help.unity');//Update the EditorBuildSettings.asset by adding new Scene
            $file3_path_CS = 'Assets/scenes/' . 'S_Help.unity';
            wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file3_path_CS);
        }

        if($is_login_bt_active == '1'){
            //CREATE Login Unity file
            $term_meta_s_login = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_login',true);
            $file_content4 = wpunity_replace_login_unity($term_meta_s_login);

            $file4 = $game_path . '/S_Login.unity';
            $create_file4 = fopen($file4, "w") or die("Unable to open file!");
            fwrite($create_file4,$file_content4);
            fclose($create_file4);

            wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Login.unity');//Update the EditorBuildSettings.asset by adding new Scene
            $file4_path_CS = 'Assets/scenes/' . 'S_Login.unity';
            wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file4_path_CS);
        }
    }elseif($scene_type_slug == 'credentials-yaml'){
        //DATA of Credits Scene
        $term_meta_s_credits = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_credentials',true);
        $credits_content = $scene_post->post_content;

        $featured_image_sprite_id = get_post_thumbnail_id( $scene_id );//The Featured Image ID
        $featured_image_sprite_guid = 'dad02368a81759f4784c7dbe752b05d6'; //if there's no Featured Image
        if($featured_image_sprite_id != ''){$featured_image_sprite_guid = wpunity_compile_sprite_upload($featured_image_sprite_id,$gameSlug,$scene_id);}
        $file_content5 = wpunity_replace_creditsscene_unity($term_meta_s_credits,$credits_content,$featured_image_sprite_guid);

        $file5 = $game_path . '/' . 'S_Credits.unity';
        $create_file5 = fopen($file5, "w") or die("Unable to open file!");
        fwrite($create_file5, $file_content5);
        fclose($create_file5);

        $fileEditorBuildSettings = $settings_path . '/EditorBuildSettings.asset';//path of EditorBuildSettings.asset
        wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Credits.unity');//Update the EditorBuildSettings.asset by adding new Scene
        $file5_path_CS = 'Assets/scenes/' . 'S_Credits.unity';
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file5_path_CS);
    }elseif($scene_type_slug == 'educational-energy'){
        //DATA of Educational Energy Scene
        $term_meta_educational_energy = get_term_meta($scene_type_ID,'wpunity_yamlmeta_educational_energy',true);
        //$json_scene = get_post_meta($scene_id,'wpunity_scene_json_input',true);
        $scene_name = $scene_post->post_name;
        $scene_title = $scene_post->post_title;
        $scene_desc = $scene_post->post_content;

        $featured_image_edu_sprite_id = get_post_thumbnail_id( $scene_id );//The Featured Image ID
        $featured_image_edu_sprite_guid = 'dad02368a81759f4784c7dbe752b05d6';//if there's no Featured Image
        if($featured_image_edu_sprite_id != ''){$featured_image_edu_sprite_guid = wpunity_compile_sprite_upload($featured_image_edu_sprite_id,$gameSlug,$scene_id);}

        $file_content7 = wpunity_replace_educational_energy_unity($term_meta_educational_energy,$scene_id); //empty energy scene with Avatar!
        $file_content7b = wpunity_addAssets_educational_energy_unity($scene_id);//add objects from json
        $file7 = $game_path . '/' . $scene_name . '.unity';
        $create_file7 = fopen($file7, "w") or die("Unable to open file!");
        fwrite($create_file7, $file_content7);
        fwrite($create_file7,$file_content7b);
        fclose($create_file7);

        //temp:
//        $tempcontent = wpunity_addAssets_educational_energy_unity($scene_id);//add objects from json
//        $tempfile = $game_path . '/' . $scene_name . '.txt';
//        $create_tempfile = fopen($tempfile, "w") or die("Unable to open file!");
//        fwrite($create_tempfile, $tempcontent);
//        fclose($create_tempfile);

        if($scenes_counter<7) {
            wpunity_compile_append_scene_to_s_selector($scene_id, $scene_name, $scene_title, $scene_desc, $scene_type_ID, $game_path, $scenes_counter, $featured_image_edu_sprite_guid);
            $scenes_counter = $scenes_counter + 1;
        }

        $fileEditorBuildSettings = $settings_path . '/EditorBuildSettings.asset';//path of EditorBuildSettings.asset
        $file7path_forCS = 'Assets/scenes/' . $scene_name . '.unity';
        wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,$file7path_forCS);//Update the EditorBuildSettings.asset by adding new Scene
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file7path_forCS);

    }elseif($scene_type_slug == 'wonderaround-yaml'){
        //DATA of Wonder Around Scene
    }

    return $scenes_counter;

}

function wpunity_addAssets_educational_energy_unity($scene_id){
    $scene_json = get_post_meta($scene_id,'wpunity_scene_json_input',true);

    $jsonScene = htmlspecialchars_decode ( $scene_json );
    $sceneJsonARR = json_decode($jsonScene, TRUE);

    $current_fid = 51;
    $allObjectsYAML = '';
    $LF = chr(10) ;// line break

    foreach ($sceneJsonARR['objects'] as $key => $value ) {
        if ($key == 'avatarYawObject') {
            //do something about AVATAR

        }else{
            if ($value['categoryName'] == 'Terrain'){
                $terrain_id = $value['assetid'];
                $asset_type = get_the_terms( $terrain_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;

                $energy_income = get_post_meta($terrain_id,'wpunity_energyConsumptionIncome',true);
                $constr_pen = get_post_meta($terrain_id,'wpunity_constructionPenalties',true);
                $physics = get_post_meta($terrain_id,'wpunity_physicsValues',true);
                $terrain_obj = get_post_meta($terrain_id,'wpunity_asset3d_obj',true);

                $terrain_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);
                $fid_of_terrain = wpunity_create_fids($current_fid++);
                $income_when_overpower = $energy_income['over'];
                $income_when_correct_power = $energy_income['correct'];
                $income_when_under_power = $energy_income['under'];
                $mean_speed_wind = $physics['mean'];
                $var_speed_wind = $physics['variance'];
                $min_speed_wind = $physics['min'];
                $max_speed_wind = $physics['max'];
                $access_penalty = $constr_pen['access'];
                $archaeology_penalty = $constr_pen['arch'];
                $natural_reserve_penalty = $constr_pen['natural'];
                $hvdistance_penalty = $constr_pen['hiVolt'];
                $fid_rect_transform_terrain = wpunity_create_fids($current_fid++);
                $fid_terrain_prefab_mesh = wpunity_create_fids($current_fid++);
                $guid_terrain_mesh = wpunity_create_guids('obj', $terrain_obj);
                $x_pos_terrain = - $value['position'][0]; // x is in the opposite site in unity
                $y_pos_terrain = $value['position'][1];
                $z_pos_terrain = $value['position'][2];


                $quats = transform_minusx_radiansToquaternions($value['rotation'][0], $value['rotation'][1], $value['rotation'][2]);



                $x_rotation_terrain = $quats[0]; //$value['quaternion'][0];
                $y_rotation_terrain = $quats[1]; //$value['quaternion'][1];
                $z_rotation_terrain = $quats[2]; //$value['quaternion'][2];
                $w_rotation_terrain = $quats[3]; //$value['quaternion'][3];
                $x_scale_terrain = $value['scale'][0];
                $y_scale_terrain = $value['scale'][1];
                $z_scale_terrain = $value['scale'][2];

                $terrain_finalyaml = wpunity_replace_terrain_unity($terrain_yaml,$fid_of_terrain,$income_when_overpower,$income_when_correct_power,$income_when_under_power,$mean_speed_wind,$var_speed_wind,$min_speed_wind,$max_speed_wind,$access_penalty,$archaeology_penalty,$natural_reserve_penalty,$hvdistance_penalty,$fid_rect_transform_terrain,$fid_terrain_prefab_mesh,$guid_terrain_mesh,$x_pos_terrain,$y_pos_terrain,$z_pos_terrain,$x_rotation_terrain,$y_rotation_terrain,$z_rotation_terrain,$w_rotation_terrain,$x_scale_terrain,$y_scale_terrain,$z_scale_terrain);
                $allObjectsYAML = $allObjectsYAML . $LF . $terrain_finalyaml;
            }
            if ($value['categoryName'] == 'Decoration'){
                $deco_id = $value['assetid'];
                $asset_type = get_the_terms( $deco_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;
                $deco_obj = get_post_meta($deco_id,'wpunity_asset3d_obj',true);

                $deco_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);
                $fid_decorator = wpunity_create_fids($current_fid++);
                $guid_obj_decorator = wpunity_create_guids('obj', $deco_obj);
                $x_pos_decorator = - $value['position'][0]; // x is in the opposite site in unity
                $y_pos_decorator = $value['position'][1];
                $z_pos_decorator = $value['position'][2];
                $x_rotation_decorator = $value['quaternion'][0];
                $y_rotation_decorator = $value['quaternion'][1];
                $z_rotation_decorator = $value['quaternion'][2];
                $w_rotation_decorator = $value['quaternion'][3];
                $x_scale_decorator = $value['scale'][0];
                $y_scale_decorator = $value['scale'][1];
                $z_scale_decorator = $value['scale'][2];

                $deco_finalyaml = wpunity_replace_decorator_unity($deco_yaml,$fid_decorator,$guid_obj_decorator,$x_pos_decorator,$y_pos_decorator,$z_pos_decorator,$x_rotation_decorator,$y_rotation_decorator,$z_rotation_decorator,$w_rotation_decorator,$x_scale_decorator,$y_scale_decorator,$z_scale_decorator);
                $allObjectsYAML = $allObjectsYAML . $LF . $deco_finalyaml;
            }
            if ($value['categoryName'] == 'Consumer'){
                $consumer_id = $value['assetid'];
                $asset_type = get_the_terms( $consumer_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;

                $consumer_obj = get_post_meta($consumer_id,'wpunity_asset3d_obj',true);
                $consumer_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);

                $fid_prefab_consumer_parent = wpunity_create_fids($current_fid++);
                $x_pos_consumer = - $value['position'][0]; // x is in the opposite site in unity
                $y_pos_consumer = $value['position'][1];
                $z_pos_consumer = $value['position'][2];
                $x_rotation_consumer = $value['quaternion'][0];
                $y_rotation_consumer = $value['quaternion'][1];
                $z_rotation_consumer = $value['quaternion'][2];
                $w_rotation_consumer = $value['quaternion'][3];
                $name_consumer = get_the_title($consumer_id);
                $fid_consumer_prefab_transform = wpunity_create_fids($current_fid++);
                $fid_consumer_prefab_child = wpunity_create_fids($current_fid++);
                $guid_consumer_prefab_child_obj = wpunity_create_guids('obj', $consumer_obj);

                $consumer_finalyaml = wpunity_replace_consumer_unity($consumer_yaml,$fid_prefab_consumer_parent,$x_pos_consumer,$y_pos_consumer,$z_pos_consumer,$x_rotation_consumer,$y_rotation_consumer,$z_rotation_consumer,$w_rotation_consumer,$name_consumer,$fid_consumer_prefab_transform,$fid_consumer_prefab_child,$guid_consumer_prefab_child_obj);
                $allObjectsYAML = $allObjectsYAML . $LF . $consumer_finalyaml;
            }
            if ($value['categoryName'] == 'Producer'){
                $producer_id = $value['assetid'];
                $asset_type = get_the_terms( $producer_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;

                $producer_obj = get_post_meta($producer_id,'wpunity_asset3d_obj',true);
                $prod_optCosts = get_post_meta($producer_id,'wpunity_producerOptCosts',true);
                $prod_optGen = get_post_meta($producer_id,'wpunity_producerOptGen',true);
                $prod_powerVal = get_post_meta($producer_id,'wpunity_producerPowerProductionVal',true);
                $prod_powerVal = str_replace(array('[',']'), '',$prod_powerVal);//remove all [ ]
                $prod_powerVal_array = explode(',', $prod_powerVal);//create Array with values of string


                $producer_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);
                $fid_producer = wpunity_create_fids($current_fid++);
                $x_pos_producer = - $value['position'][0]; // x is in the opposite site in unity
                $y_pos_producer = $value['position'][1];
                $z_pos_producer = $value['position'][2];
                $x_rot_parent = $value['quaternion'][0];
                $y_rot_parent = $value['quaternion'][1];
                $z_rot_parent = $value['quaternion'][2];
                $w_rot_parent = $value['quaternion'][3];
                $rotor_diameter = $prod_optCosts['size'];
                $y_position_infoquad = $rotor_diameter * (1.5);
                $y_pos_quadselector = $rotor_diameter * (-0.95);
                $turbine_name_class = $prod_optGen['class'];
                $turbine_max_power = $prod_optGen['power'];
                $turbine_cost = $prod_optCosts['cost'];
                $rotor_diameter = $prod_optCosts['size'];
                $turbine_windspeed_class = $prod_optGen['speed'];
                $turbine_repair_cost = $prod_optCosts['repaid'];
                $turbine_damage_coefficient = $prod_optCosts['dmg'];
                $fid_transformation_parent_producer = wpunity_create_fids($current_fid++);
                $fid_child_producer = wpunity_create_fids($current_fid++);
                $obj_guid_producer = wpunity_create_guids('obj', $producer_obj);
                $producer_name = get_the_title($producer_id);
                $power_curve_val = $prod_powerVal_array;

                $producer_finalyaml = wpunity_replace_producer_unity($producer_yaml,$fid_producer,$x_pos_producer,$y_pos_producer,$z_pos_producer,$x_rot_parent,$y_rot_parent,$z_rot_parent,$w_rot_parent,$y_position_infoquad,$y_pos_quadselector,$turbine_name_class,$turbine_max_power,$turbine_cost,$rotor_diameter,$turbine_windspeed_class,$turbine_repair_cost,$turbine_damage_coefficient,$fid_transformation_parent_producer,$fid_child_producer,$obj_guid_producer,$producer_name,$power_curve_val);
                $allObjectsYAML = $allObjectsYAML . $LF . $producer_finalyaml;
            }


            }
    }

    //return all objects
    return $allObjectsYAML;

}


function wpunity_replace_mainmenu_unity($term_meta_s_mainmenu,$title_text,$featured_image_sprite_guid,$is_bt_settings_active,$is_help_bt_active,$is_exit_button_active,$is_login_bt_active){
    $file_content_return = str_replace("___[mainmenu_is_bt_settings_active]___",$is_bt_settings_active,$term_meta_s_mainmenu);
    $file_content_return = str_replace("___[mainmenu_is_help_bt_active]___",$is_help_bt_active,$file_content_return);
    $file_content_return = str_replace("___[mainmenu_featured_image_sprite]___",$featured_image_sprite_guid,$file_content_return);
    $file_content_return = str_replace("___[mainmenu_is_exit_button_active]___",$is_exit_button_active,$file_content_return);
    $file_content_return = str_replace("___[mainmenu_is_login_bt_active]___",$is_login_bt_active,$file_content_return);
    $file_content_return = str_replace("___[mainmenu_title_text]___",$title_text,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_settings_unity($term_meta_s_settings){
    return $term_meta_s_settings;
}

function wpunity_replace_educational_energy_unity($term_meta_educational_energy,$scene_id){

    $scene_json = get_post_meta($scene_id,'wpunity_scene_json_input',true);

    $jsonScene = htmlspecialchars_decode ( $scene_json );
    $sceneJsonARR = json_decode($jsonScene, TRUE);

    foreach ($sceneJsonARR['objects'] as $key => $value ) {
        if ($key == 'avatarYawObject') {
            $x_pos = - $value['position'][0]; // x is in the opposite site in unity
            $y_pos = $value['position'][1];
            $z_pos = $value['position'][2];
            $x_rot = $value['quaternion'][0];
            $y_rot = $value['quaternion'][1];
            $z_rot = $value['quaternion'][2];
            $w_rot = $value['quaternion'][3];

//            $fg = fopen('testquats.txt','w');
//            fwrite($fg, print_r($value,true));
//            fwrite($fg, chr(10));
//
//
//            $newquats = (new THREE.Quaternion(0,0,0,0)).setFromEuler(- $value['rotation'][0], $value['rotation'][1], $value['rotation'][2], 'YXZ'));   //transform_minusx_radiansToquaternions($value['rotation'][0], $value['rotation'][1], $value['rotation'][2]);
//
//            fwrite($fg, print_r($newquats,true));
//            fclose($fg);



        }
    }
    $file_content_return = str_replace("___[avatar_position_x]___",$x_pos,$term_meta_educational_energy);
    $file_content_return = str_replace("___[avatar_position_y]___",$y_pos,$file_content_return);
    $file_content_return = str_replace("___[avatar_position_z]___",$z_pos,$file_content_return);
    $file_content_return = str_replace("___[avatar_rotation_x]___",$x_rot,$file_content_return);
    $file_content_return = str_replace("___[avatar_rotation_y]___",$y_rot,$file_content_return);
    $file_content_return = str_replace("___[avatar_rotation_z]___",$z_rot,$file_content_return);
    $file_content_return = str_replace("___[avatar_rotation_w]___",$w_rot,$file_content_return);
    return $file_content_return;
}

function wpunity_replace_help_unity($term_meta_s_help,$text_help_scene,$img_help_scene_guid){
    $file_content_return = str_replace("___[text_help_scene]___",$text_help_scene,$term_meta_s_help);
    $file_content_return = str_replace("___[img_help_scene]___",$img_help_scene_guid,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_creditsscene_unity($term_meta_s_credits,$credits_content,$featured_image_sprite_guid){
    $file_content_return = str_replace("___[text_credits_scene]___",$credits_content,$term_meta_s_credits);
    $file_content_return = str_replace("___[img_credits_scene]___",$featured_image_sprite_guid,$file_content_return);

    return $file_content_return;
}

function wpunity_compile_sprite_upload($featured_image_sprite_id,$gameSlug,$scene_id){
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity/Assets/models';

    $attachment_post = get_post($featured_image_sprite_id);
    $attachment_file = $attachment_post->guid;
    $attachment_tempname = str_replace('\\', '/', $attachment_file);
    $attachment_name = pathinfo($attachment_tempname);
    $new_file = $game_path .'/' . $attachment_name['filename'] . '.' . $attachment_name['extension'];
    copy($attachment_file,$new_file);

    $sprite_meta_yaml = wpunity_getYaml_jpg_sprite_pattern();
    $sprite_meta_guid = wpunity_create_guids('jpg', $featured_image_sprite_id);
    $sprite_meta_yaml_replace = wpunity_replace_spritemeta($sprite_meta_yaml,$sprite_meta_guid);


    $sprite_meta_file = $game_path .'/' . $attachment_name['filename'] . '.' . $attachment_name['extension'] . '.meta';
    $create_meta_file = fopen($sprite_meta_file, "w") or die("Unable to open file!");
    fwrite($create_meta_file,$sprite_meta_yaml_replace);
    fclose($create_meta_file);

    return $sprite_meta_guid;
}

function wpunity_replace_spritemeta($sprite_meta_yaml,$sprite_meta_guid){
    $unix_time = time();

    $file_content_return = str_replace("___[jpg_guid]___",$sprite_meta_guid,$sprite_meta_yaml);
    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_login_unity($term_meta_s_login){
    return $term_meta_s_login;
}

function wpunity_compile_append_scene_to_s_selector($scene_id,$scene_name,$scene_title,$scene_desc,$scene_type_ID,$game_path,$scenes_counter,$featured_image_edu_sprite_guid){
    $mainMenuTerm = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml');
    $term_meta_s_selector2 = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_selector2',true);

    $sceneSelectorFile = $game_path . '/S_SceneSelector.unity';

    //Create guid for the tile
    $guid_tile_sceneselector = wpunity_create_fids($scene_id);

    $guid_tile_recttransform = wpunity_create_fids_rect($scene_id);
    //Add Scene to initial part of Scene Selector
    wpunity_compile_s_selector_addtile($sceneSelectorFile,$guid_tile_recttransform);

    //Add second part of the new Scene Tile
    $tile_pos_x = 270;$tile_pos_y=-250;//default values of tile's coordination
    if($scenes_counter==2){$tile_pos_x = 680;$tile_pos_y=-250;}
    if($scenes_counter==3){$tile_pos_x = 1090;$tile_pos_y=-250;}
    if($scenes_counter==4){$tile_pos_x = 270;$tile_pos_y=-580;}
    if($scenes_counter==5){$tile_pos_x = 680;$tile_pos_y=-580;}
    if($scenes_counter==6){$tile_pos_x = 1090;$tile_pos_y=-580;}

    $seq_index_of_scene = $scenes_counter;
    $name_of_panel = 'panel_' . $scene_name;
    $guid_sprite_scene_featured_img = $featured_image_edu_sprite_guid;
    $text_title_tile = $scene_title; //Title of custom field
    $text_description_tile = $scene_desc;
    $name_of_scene_to_load = $scene_name;//without .unity (we generate unity files with post slug as name)


    $fileData = wpunity_compile_s_selector_replace_tile_gen($term_meta_s_selector2,$tile_pos_x,$tile_pos_y,$guid_tile_sceneselector,$seq_index_of_scene,$name_of_panel,$guid_sprite_scene_featured_img,$text_title_tile,$text_description_tile,$name_of_scene_to_load,$guid_tile_recttransform);
    $LF = chr(10); // line change
    file_put_contents($sceneSelectorFile, $fileData . $LF, FILE_APPEND);

}

function wpunity_compile_s_selector_addtile($sceneSelectorFile,$guid_tile_recttransform){
    # ReplaceChildren
    $LF = chr(10); // line change

    // Clear previous size of filepath
    clearstatcache();

    // a. Read
    $handle = fopen($sceneSelectorFile, 'r');
    $content = fread($handle, filesize($sceneSelectorFile));
    fclose($handle);

    $tile_name='- {fileID: '. $guid_tile_recttransform .'}';
    // b. add obj
    $content = str_replace(
        '# ReplaceChildren',
        $tile_name.$LF.'  # ReplaceChildren', $content
    );

    // c. Write to file
    $fhandle = fopen($sceneSelectorFile, 'w');
    fwrite($fhandle, $content, strlen($content));
    fclose($fhandle);

}

function wpunity_compile_s_selector_replace_tile_gen($term_meta_s_selector2,$tile_pos_x,$tile_pos_y,$guid_tile_sceneselector,$seq_index_of_scene,$name_of_panel,$guid_sprite_scene_featured_img,$text_title_tile,$text_description_tile,$name_of_scene_to_load,$guid_tile_recttransform){
    $file_content_return = str_replace("___[guid_tile_sceneselector]___",$guid_tile_sceneselector,$term_meta_s_selector2);
    $file_content_return = str_replace("___[seq_index_of_scene]___",$seq_index_of_scene,$file_content_return);
    $file_content_return = str_replace("___[tile_pos_x]___",$tile_pos_x,$file_content_return);
    $file_content_return = str_replace("___[tile_pos_y]___",$tile_pos_y,$file_content_return);
    $file_content_return = str_replace("___[name_of_panel]___",$name_of_panel,$file_content_return);
    $file_content_return = str_replace("___[guid_sprite_scene_featured_img]___",$guid_sprite_scene_featured_img,$file_content_return);
    $file_content_return = str_replace("___[text_title_tile]___",$text_title_tile,$file_content_return);
    $file_content_return = str_replace("___[text_description_tile]___",$text_description_tile,$file_content_return);
    $file_content_return = str_replace("___[name_of_scene_to_load]___",$name_of_scene_to_load,$file_content_return);
    $file_content_return = str_replace("___[guid_tile_recttransform]___",$guid_tile_recttransform,$file_content_return);

    return $file_content_return;
}

function wpunity_compile_copy_StandardAssets($gameSlug,$gameType){
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $dest = $upload_dir . '/' . $gameSlug . 'Unity' . '/Assets/StandardAssets';

    $pluginpath = dirname ( dirname (get_template_directory()));
    $pluginpath = str_replace('\\','/',$pluginpath);
    $pluginSlug = plugin_basename(__FILE__);
    $pluginSlug = substr($pluginSlug, 0, strpos($pluginSlug, "/"));
    $source = $pluginpath . '/plugins/' . $pluginSlug . '/StandardAssets/' . $gameType;

    mkdir($dest, 0755);
    foreach (
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST) as $item
    ) {
        if ($item->isDir()) {
            mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
        } else {
            copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
        }
    }

}

function wpunity_replace_terrain_unity($terrain_yaml,$fid_of_terrain,$income_when_overpower,$income_when_correct_power,$income_when_under_power,$mean_speed_wind,$var_speed_wind,$min_speed_wind,$max_speed_wind,$access_penalty,$archaeology_penalty,$natural_reserve_penalty,$hvdistance_penalty,$fid_rect_transform_terrain,$fid_terrain_prefab_mesh,$guid_terrain_mesh,$x_pos_terrain,$y_pos_terrain,$z_pos_terrain,$x_rotation_terrain,$y_rotation_terrain,$z_rotation_terrain,$w_rotation_terrain,$x_scale_terrain,$y_scale_terrain,$z_scale_terrain){
    $file_content_return = str_replace("___[fid_of_terrain]___",$fid_of_terrain,$terrain_yaml);
    $file_content_return = str_replace("___[income_when_overpower]___",$income_when_overpower,$file_content_return);
    $file_content_return = str_replace("___[income_when_correct_power]___",$income_when_correct_power,$file_content_return);
    $file_content_return = str_replace("___[income_when_under_power]___",$income_when_under_power,$file_content_return);
    $file_content_return = str_replace("___[mean_speed_wind]___",$mean_speed_wind,$file_content_return);
    $file_content_return = str_replace("___[var_speed_wind]___",$var_speed_wind,$file_content_return);
    $file_content_return = str_replace("___[min_speed_wind]___",$min_speed_wind,$file_content_return);
    $file_content_return = str_replace("___[max_speed_wind]___",$max_speed_wind,$file_content_return);
    $file_content_return = str_replace("___[access_penalty]___",$access_penalty,$file_content_return);
    $file_content_return = str_replace("___[archaeology_penalty]___",$archaeology_penalty,$file_content_return);
    $file_content_return = str_replace("___[natural_reserve_penalty]___",$natural_reserve_penalty,$file_content_return);
    $file_content_return = str_replace("___[hvdistance_penalty]___",$hvdistance_penalty,$file_content_return);
    $file_content_return = str_replace("___[fid_rect_transform_terrain]___",$fid_rect_transform_terrain,$file_content_return);
    $file_content_return = str_replace("___[fid_terrain_prefab_mesh]___",$fid_terrain_prefab_mesh,$file_content_return);
    $file_content_return = str_replace("___[guid_terrain_mesh]___",$guid_terrain_mesh,$file_content_return);
    $file_content_return = str_replace("___[x_pos_terrain]___",$x_pos_terrain,$file_content_return);
    $file_content_return = str_replace("___[y_pos_terrain]___",$y_pos_terrain,$file_content_return);
    $file_content_return = str_replace("___[z_pos_terrain]___",$z_pos_terrain,$file_content_return);
    $file_content_return = str_replace("___[x_rotation_terrain]___",$x_rotation_terrain,$file_content_return);
    $file_content_return = str_replace("___[y_rotation_terrain]___",$y_rotation_terrain,$file_content_return);
    $file_content_return = str_replace("___[z_rotation_terrain]___",$z_rotation_terrain,$file_content_return);
    $file_content_return = str_replace("___[w_rotation_terrain]___",$w_rotation_terrain,$file_content_return);
    $file_content_return = str_replace("___[x_scale_terrain]___",$x_scale_terrain,$file_content_return);
    $file_content_return = str_replace("___[y_scale_terrain]___",$y_scale_terrain,$file_content_return);
    $file_content_return = str_replace("___[z_scale_terrain]___",$z_scale_terrain,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_consumer_unity($consumer_yaml,$fid_prefab_consumer_parent,$x_pos_consumer,$y_pos_consumer,$z_pos_consumer,$x_rotation_consumer,$y_rotation_consumer,$z_rotation_consumer,$w_rotation_consumer,$name_consumer,$fid_consumer_prefab_transform,$fid_consumer_prefab_child,$guid_consumer_prefab_child_obj){

    $file_content_return = str_replace("___[fid_prefab_consumer_parent]___",$fid_prefab_consumer_parent,$consumer_yaml);
    $file_content_return = str_replace("___[x_pos_consumer]___",$x_pos_consumer,$file_content_return);
    $file_content_return = str_replace("___[y_pos_consumer]___",$y_pos_consumer,$file_content_return);
    $file_content_return = str_replace("___[z_pos_consumer]___",$z_pos_consumer,$file_content_return);
    $file_content_return = str_replace("___[x_rotation_consumer]___",$x_rotation_consumer,$file_content_return);
    $file_content_return = str_replace("___[y_rotation_consumer]___",$y_rotation_consumer,$file_content_return);
    $file_content_return = str_replace("___[z_rotation_consumer]___",$z_rotation_consumer,$file_content_return);
    $file_content_return = str_replace("___[w_rotation_consumer]___",$w_rotation_consumer,$file_content_return);
    $file_content_return = str_replace("___[name_consumer]___",$name_consumer,$file_content_return);
    $file_content_return = str_replace("___[fid_consumer_prefab_transform]___",$fid_consumer_prefab_transform,$file_content_return);
    $file_content_return = str_replace("___[fid_consumer_prefab_child]___",$fid_consumer_prefab_child,$file_content_return);
    $file_content_return = str_replace("___[guid_consumer_prefab_child_obj]___",$guid_consumer_prefab_child_obj,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_producer_unity($producer_yaml,$fid_producer,$x_pos_producer,$y_pos_producer,$z_pos_producer,$x_rot_parent,$y_rot_parent,$z_rot_parent,$w_rot_parent,$y_position_infoquad,$y_pos_quadselector,$turbine_name_class,$turbine_max_power,$turbine_cost,$rotor_diameter,$turbine_windspeed_class,$turbine_repair_cost,$turbine_damage_coefficient,$fid_transformation_parent_producer,$fid_child_producer,$obj_guid_producer,$producer_name,$power_curve_val){

    $file_content_return = str_replace("___[fid_producer]___",$fid_producer,$producer_yaml);
    $file_content_return = str_replace("___[x_pos_producer]___",$x_pos_producer,$file_content_return);
    $file_content_return = str_replace("___[y_pos_producer]___",$y_pos_producer,$file_content_return);
    $file_content_return = str_replace("___[z_pos_producer]___",$z_pos_producer,$file_content_return);
    $file_content_return = str_replace("___[x_rot_parent]___",$x_rot_parent,$file_content_return);
    $file_content_return = str_replace("___[y_rot_parent]___",$y_rot_parent,$file_content_return);
    $file_content_return = str_replace("___[z_rot_parent]___",$z_rot_parent,$file_content_return);
    $file_content_return = str_replace("___[w_rot_parent]___",$w_rot_parent,$file_content_return);
    $file_content_return = str_replace("___[y_position_infoquad]___",$y_position_infoquad,$file_content_return);
    $file_content_return = str_replace("___[y_pos_quadselector]___",$y_pos_quadselector,$file_content_return);
    $file_content_return = str_replace("___[turbine_name_class]___",$turbine_name_class,$file_content_return);
    $file_content_return = str_replace("___[turbine_max_power]___",$turbine_max_power,$file_content_return);
    $file_content_return = str_replace("___[turbine_cost]___",$turbine_cost,$file_content_return);
    $file_content_return = str_replace("___[rotor_diameter]___",$rotor_diameter,$file_content_return);
    $file_content_return = str_replace("___[turbine_windspeed_class]___",$turbine_windspeed_class,$file_content_return);
    $file_content_return = str_replace("___[turbine_repair_cost]___",$turbine_repair_cost,$file_content_return);
    $file_content_return = str_replace("___[turbine_damage_coefficient]___",$turbine_damage_coefficient,$file_content_return);
    $file_content_return = str_replace("___[fid_transformation_parent_producer]___",$fid_transformation_parent_producer,$file_content_return);
    $file_content_return = str_replace("___[fid_child_producer]___",$fid_child_producer,$file_content_return);
    $file_content_return = str_replace("___[obj_guid_producer]___",$obj_guid_producer,$file_content_return);
    $file_content_return = str_replace("___[producer_name]___",$producer_name,$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_0]___",$power_curve_val[1],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_1]___",$power_curve_val[3],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_2]___",$power_curve_val[5],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_3]___",$power_curve_val[7],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_4]___",$power_curve_val[9],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_5]___",$power_curve_val[11],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_6]___",$power_curve_val[13],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_7]___",$power_curve_val[15],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_8]___",$power_curve_val[17],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_9]___",$power_curve_val[19],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_10]___",$power_curve_val[21],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_11]___",$power_curve_val[23],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_12]___",$power_curve_val[25],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_13]___",$power_curve_val[27],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_14]___",$power_curve_val[29],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_15]___",$power_curve_val[31],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_16]___",$power_curve_val[33],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_17]___",$power_curve_val[35],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_18]___",$power_curve_val[37],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_19]___",$power_curve_val[39],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_20]___",$power_curve_val[41],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_21]___",$power_curve_val[43],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_22]___",$power_curve_val[45],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_23]___",$power_curve_val[47],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_24]___",$power_curve_val[49],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_25]___",$power_curve_val[51],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_26]___",$power_curve_val[53],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_27]___",$power_curve_val[55],$file_content_return);

    return $file_content_return;
}

function wpunity_replace_decorator_unity($deco_yaml,$fid_decorator,$guid_obj_decorator,$x_pos_decorator,$y_pos_decorator,$z_pos_decorator,$x_rotation_decorator,$y_rotation_decorator,$z_rotation_decorator,$w_rotation_decorator,$x_scale_decorator,$y_scale_decorator,$z_scale_decorator){
    $file_content_return = str_replace("___[fid_decorator]___",$fid_decorator,$deco_yaml);
    $file_content_return = str_replace("___[guid_obj_decorator]___",$guid_obj_decorator,$file_content_return);
    $file_content_return = str_replace("___[x_pos_decorator]___",$x_pos_decorator,$file_content_return);
    $file_content_return = str_replace("___[y_pos_decorator]___",$y_pos_decorator,$file_content_return);
    $file_content_return = str_replace("___[z_pos_decorator]___",$z_pos_decorator,$file_content_return);
    $file_content_return = str_replace("___[x_rotation_decorator]___",$x_rotation_decorator,$file_content_return);
    $file_content_return = str_replace("___[y_rotation_decorator]___",$y_rotation_decorator,$file_content_return);
    $file_content_return = str_replace("___[z_rotation_decorator]___",$z_rotation_decorator,$file_content_return);
    $file_content_return = str_replace("___[w_rotation_decorator]___",$w_rotation_decorator,$file_content_return);
    $file_content_return = str_replace("___[x_scale_decorator]___",$x_scale_decorator,$file_content_return);
    $file_content_return = str_replace("___[y_scale_decorator]___",$y_scale_decorator,$file_content_return);
    $file_content_return = str_replace("___[z_scale_decorator]___",$z_scale_decorator,$file_content_return);

    return $file_content_return;
}

function transform_minusx_radiansToquaternions($ax, $ay, $az){

    $ay = Math.PI - $ay;

    $t0 = cos($ay * 0.5);  // yaw
    $t1 = sin($ay * 0.5);
    $t2 = cos($az * 0.5);  // roll
    $t3 = sin($az * 0.5);
    $t4 = cos($ax * 0.5);  // pitch
    $t5 = sin($ax * 0.5);

    $t024 = $t0 * $t2 * $t4;
    $t025 = $t0 * $t2 * $t5;
    $t034 = $t0 * $t3 * $t4;
    $t035 = $t0 * $t3 * $t5;
    $t124 = $t1 * $t2 * $t4;
    $t125 = $t1 * $t2 * $t5;
    $t134 = $t1 * $t3 * $t4;
    $t135 = $t1 * $t3 * $t5;

    $x = $t025 + $t134;
    $y =-$t035 + $t124;
    $z = $t034 + $t125;
    $w = $t024 - $t135;

    return [$x,$y,$z,$w];
}

?>