<?php

//==========================================================================================================================================
//==========================================================================================================================================

function wpunity_assemble_the_unity_game_project($gameID, $gameSlug, $targetPlatform, $gameType){

    wpunity_compile_folders_del($gameSlug);//0. Delete everything in order to recreate them from scratch

    wpunity_compile_folders_gen($gameSlug);//1. Create Default Folder Structure

    wpunity_compile_cs_gen($gameSlug, $targetPlatform);//1b. Create cs file before all data

    wpunity_compile_settings_gen($gameID,$gameSlug);//2. Create Project Settings files (16 files)

    wpunity_compile_models_gen($gameID, $gameSlug, $targetPlatform);//3. Create Model folders/files

    wpunity_compile_scenes_gen($gameID,$gameSlug);//4. Create Unity files (at Assets/scenes)

    wpunity_compile_copy_StandardAssets($gameSlug, $gameType);//5. Copy StandardAssets depending the Game Type

    return 'true';
}

//==========================================================================================================================================
//==========================================================================================================================================
//0. Delete everything in order to recreate them from scratch
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

                if ($file->isDir() === true ){ //&& $file->getBasename() != 'Library'  ) {
                    rmdir($file->getPathName());
                }
                else if (($file->isFile() === true) || ($file->isLink() === true) && $file->getParentFolderName() != 'Library' ) {
                    if ( strpos($file->getPathname(), DIRECTORY_SEPARATOR.Library.DIRECTORY_SEPARATOR) === false  ) {

                        unlink($file->getPathname());
                    }
                }
            }
        }

        return true;
    }
    else if ((is_file($path) === true) || (is_link($path) === true)) {
        return unlink($path);
    }

    return false;
}

//==========================================================================================================================================
//==========================================================================================================================================
//1. Create Default Folder Structure
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
    $ResourcesF = $AssetsF . "/" . 'Resources';
    $scenesF = $AssetsF . "/" . 'scenes';
    $modelsF = $AssetsF . "/" . 'models';
    $StandardAssetsF = $AssetsF . "/" . 'StandardAssets';
    if (!is_dir($EditorF)) {mkdir($EditorF, 0755) or wp_die("Unable to create the folder".$EditorF);}
    if (!is_dir($ResourcesF)) {mkdir($ResourcesF, 0755) or wp_die("Unable to create the folder".$ResourcesF);}
    if (!is_dir($scenesF)) {mkdir($scenesF, 0755) or wp_die("Unable to create the folder".$scenesF);}
    if (!is_dir($modelsF)) {mkdir($modelsF, 0755) or wp_die("Unable to create the folder".$modelsF);}
    if (!is_dir($StandardAssetsF)) {mkdir($StandardAssetsF, 0755) or wp_die("Unable to create the folder".$StandardAssetsF);}
}

//==========================================================================================================================================
//==========================================================================================================================================
//1b. Create cs file before all data (Generate HandyBuilder.cs and GeneralImportSettings.cs)
function wpunity_compile_cs_gen($gameSlug, $targetPlatform){
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);

    //--Uploads/myGameProjectUnity--

    // HandyBuilder.cs
    $filepath =$filepath = $upload_dir . '/' . $gameSlug . 'Unity' . '/Assets/Editor/HandyBuilder.cs';
    wpunity_createEmpty_HandyBuilder_cs($filepath, $targetPlatform);

    // GeneralImportSettings.cs
    $pluginpath = dirname ( dirname (get_template_directory()));
    $pluginpath = str_replace('\\','/',$pluginpath);
    $pluginSlug = plugin_basename(__FILE__);
    $pluginSlug = substr($pluginSlug, 0, strpos($pluginSlug, "/"));
    $filepath_source_file = $pluginpath . '/plugins/' . $pluginSlug . '/StandardAssets/Editor_Commons/GeneralImportSettings.cs';

    $filepath_target_file = $upload_dir . '/' . $gameSlug . 'Unity' . '/Assets/Editor/GeneralImportSettings.cs';

    if (!copy($filepath_source_file, $filepath_target_file)) {
        echo "failed to copy $filepath_source_file to $filepath_target_file...\n";
    }
}

/* Create an empty WebGLBuilder.cs in a certain $filepath */
function wpunity_createEmpty_HandyBuilder_cs($filepath, $targetPlatform){
    $handle = fopen($filepath, 'w');
    $targetFileFormat = ''; // WebGL and Linux are blank

    switch($targetPlatform)
    {
        case 'StandaloneWindows':
            $targetFileFormat =  'mygame.exe'; //' -buildWindowsPlayer "builds'.$DS.'windows'.$DS.'mygame.exe"';
            break;
        case 'StandaloneOSXUniversal':
            $targetFileFormat = 'mygame.app'; //' -buildOSXUniversalPlayer "builds'.$DS.'mac'.$DS.'mygame.app"';
            break;
    }

    $content = 'using UnityEngine;
using UnityEditor;
using System.IO;
using System;

class HandyBuilder {
static void build() {


        Debug.Log("Hi jimverinko");
        // AddAssetsToImportHere

        string[] scenes = { // AddScenesHere
};

        string pathToDeploy = "builds/'.$targetPlatform.'/'.$targetFileFormat.'";

        BuildPipeline.BuildPlayer(scenes, pathToDeploy, BuildTarget.'.$targetPlatform.', BuildOptions.None);
    }
}';

    fwrite($handle, $content);
    fclose($handle);
}


/* Add  assets (obj) for import
*    $assetpath = "Assets/models/building1/building1.obj"
* or scenes for compile
*    $scenepath = "Assets/scenes/S_SceneSelector.unity"
* to
*    WebGLBuilder.cs
* */
function wpunity_add_in_HandyBuilder_cs($filepath, $assetpath, $scenepath){

    $LF = chr(10); // line change

    if ($assetpath){
        //add assets (obj)

        // Clear previous size of filepath
        clearstatcache();

        // a. Read
        $handle = fopen($filepath, 'r');
        $content = fread($handle, filesize($filepath));
        fclose($handle);

        $smartline =  '   AssetDatabase.ImportAsset("'.$assetpath.'", ImportAssetOptions.Default);'; // .$LF.
        // b. add obj
        $content = str_replace('// AddAssetsToImportHere',
            '// AddAssetsToImportHere'.$LF.
            $smartline,
            $content
        );

        // c. Write to file
        $fhandle = fopen($filepath, 'w');
        fwrite($fhandle, $content, strlen($content));
        fclose($fhandle);
    }


    if ($scenepath){
        // Clear previous size of filepath
        clearstatcache();

        // a. Read
        $handle = fopen($filepath, 'r');
        $content = fread($handle, filesize($filepath));
        fclose($handle);

        $scenewebgl = '          "'.$scenepath.'",'.chr(10).'// AddScenesHere '            ;

        // b. Extend certain string
        $content = str_replace('// AddScenesHere', $scenewebgl, $content);

        // first comma remove
        $content = str_replace(','.chr(10).'}','}', $content);

        // c. Write to old
        $fhandle = fopen($filepath, 'w');

        fwrite($fhandle, $content, strlen($content));
        fclose($fhandle);

    }
}

//==========================================================================================================================================
//==========================================================================================================================================
//2. Create Project Settings files (16 files)
function wpunity_compile_settings_gen($gameID,$gameSlug){

    $all_game_category = get_the_terms( $gameID, 'wpunity_game_type' );
    $game_category = $all_game_category[0]->term_id;

    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity';

    wpunity_compile_settings_files_gen($gameID, $game_path,'AudioManager.asset',get_term_meta($game_category,'wpunity_audio_manager_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'ClusterInputManager.asset',get_term_meta($game_category,'wpunity_cluster_input_manager_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'DynamicsManager.asset',get_term_meta($game_category,'wpunity_dynamics_manager_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'EditorBuildSettings.asset',get_term_meta($game_category,'wpunity_editor_build_settings_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'EditorSettings.asset',get_term_meta($game_category,'wpunity_editor_settings_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'GraphicsSettings.asset',get_term_meta($game_category,'wpunity_graphics_settings_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'InputManager.asset',get_term_meta($game_category,'wpunity_input_manager_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'NavMeshAreas.asset',get_term_meta($game_category,'wpunity_nav_mesh_areas_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'NetworkManager.asset',get_term_meta($game_category,'wpunity_network_manager_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'Physics2DSettings.asset',get_term_meta($game_category,'wpunity_physics2d_settings_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'ProjectSettings.asset',get_term_meta($game_category,'wpunity_project_settings_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'ProjectVersion.asset',get_term_meta($game_category,'wpunity_project_version_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'QualitySettings.asset',get_term_meta($game_category,'wpunity_quality_settings_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'TagManager.asset',get_term_meta($game_category,'wpunity_tag_manager_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'TimeManager.asset',get_term_meta($game_category,'wpunity_time_manager_term',true));
    wpunity_compile_settings_files_gen($gameID, $game_path,'UnityConnectSettings.asset',get_term_meta($game_category,'wpunity_unity_connect_settings_term',true));
}

function wpunity_compile_settings_files_gen($game_project_id, $game_path,$fileName,$fileYaml){

    if($fileName === 'ProjectSettings.asset'){

        // get from db the last version of the game
        $game_version_number = wpunity_get_last_version_of_game($game_project_id);

        // increment for the new game
        $game_version_number += 1;

        // append new vn to db
        wpunity_append_version_game($game_project_id, $game_version_number);

        // Zero pad to 4 digits
        $game_version_number_padded = str_pad($game_version_number, 4, '0', STR_PAD_LEFT);

        // implode with dots
        $game_version_number_dotted = implode(str_split($game_version_number_padded), '.');

        // Replace
        $fileYaml   = str_replace("___[game_version_number]___",        $game_version_number  , $fileYaml);
        $fileYaml   = str_replace("___[game_version_number_dotted]___", $game_version_number_dotted, $fileYaml);
    }

    $file = $game_path . '/ProjectSettings/' . $fileName;
    $create_file = fopen($file, "w") or die("Unable to open file!");
    fwrite($create_file, $fileYaml);
    fclose($create_file);
}

//==========================================================================================================================================
//==========================================================================================================================================
//3. Create Model folders/files

// Add all objs in HandyBuilder.cs for importing (wrapper)
function wpunity_compile_models_gen($gameID, $gameSlug, $targetPlatform){

    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity/Assets/models';
    $handybuilder_file = $upload_dir . '/' . $gameSlug . 'Unity' . '/Assets/Editor/HandyBuilder.cs';

    $assetIds = wpunity_fetch_assetids_in_scenes($gameSlug);

    foreach ($assetIds as $asset_id)
        wpunity_compile_assets_cre($game_path, $asset_id, $handybuilder_file, $gameSlug, $targetPlatform);
}

//Import assets to HandyBuilder (function internal)
function wpunity_compile_assets_cre($game_path, $asset_id, $handybuilder_file, $gameSlug, $targetPlatform){

    //Create the folder of the Model(Asset)
    $asset_post = get_post($asset_id);
    $folder = $game_path . '/' . $asset_post->post_name;
    if (!is_dir($folder)) {mkdir($folder, 0755) or wp_die("Unable to create the folder ".$folder);}

    //Copy files of the Model

    //OBJ FILE
    $objID = get_post_meta($asset_id, 'wpunity_asset3d_obj', true);
    if(is_numeric($objID)){
        $asset_type = get_the_terms( $asset_id, 'wpunity_asset3d_cat' );
        $attachment_post = get_post($objID);
        $attachment_file = $attachment_post->guid;
        $attachment_tempname = str_replace('\\', '/', $attachment_file);
        $attachment_name = pathinfo($attachment_tempname);
        $new_file = $folder .'/' . $attachment_name['filename'] . '.obj';

        if($asset_type[0]->name == 'Site'){
            $new_file = $folder .'/' . $attachment_name['filename'] . 'CollidersNoOptimization.obj';
        }

        copy($attachment_file, $new_file);

        if($asset_type[0]->name == 'Site')
            wpunity_compile_objmeta_cre($folder, $attachment_name['filename'], $objID, 'CollidersNoOptimization');
        else
            wpunity_compile_objmeta_cre($folder, $attachment_name['filename'], $objID, '');

        $new_file_path_forCS = 'Assets/models/' . $asset_post->post_name .'/' . $attachment_name['filename'] . '.obj';

        if($asset_type[0]->name == 'Site'){
            $new_file_path_forCS = 'Assets/models/' . $asset_post->post_name .
                '/' . $attachment_name['filename'] . 'CollidersNoOptimization.obj';
        }

        wpunity_add_in_HandyBuilder_cs($handybuilder_file, $new_file_path_forCS, null);
    }

        //MTL FILE
        $mtlID = get_post_meta($asset_id, 'wpunity_asset3d_mtl', true);
        if(is_numeric($mtlID)){
            $attachment_post = get_post($mtlID);
            $attachment_file = $attachment_post->guid;
            $attachment_tempname = str_replace('\\', '/', $attachment_file);
            $attachment_name = pathinfo($attachment_tempname);
            $new_file = $folder .'/' . $attachment_name['filename'] . '.mtl';
            copy($attachment_file,$new_file);
        }

    //Diffusion Image FILE
    $difimgID = get_post_meta($asset_id, 'wpunity_asset3d_diffimage', false);
    foreach($difimgID as $difimg_ID) {
        if(is_numeric($difimg_ID)){
            $attachment_post = get_post($difimg_ID);

            $attachment_file = $attachment_post->guid;

            $attachment_tempname = str_replace('\\', '/', $attachment_file);
            $attachment_name = pathinfo($attachment_tempname);

            $ending = 'jpg';
            if ($attachment_post->post_mime_type=='image/png')
                $ending = 'png';

            $new_file = $folder .'/' . $attachment_name['filename'] . '.' . $ending;
            copy($attachment_file,$new_file);
        }
    }

    //Video FILE
    $videoID = get_post_meta($asset_id, 'wpunity_asset3d_video', true); // Video ID
    if(is_numeric($videoID) && $targetPlatform !== "WebGL"){
        $attachment_post = get_post($videoID);
        $attachment_file = $attachment_post->guid;
        $attachment_tempname = str_replace('\\', '/', $attachment_file);
        $attachment_name = pathinfo($attachment_tempname);
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir = str_replace('\\','/',$upload_dir);
        $new_file = $upload_dir .'/' .$gameSlug . "Unity/Assets/Resources" .'/' . $attachment_name['filename'] . '.' . $attachment_name['extension'];
        copy($attachment_file,$new_file);
        $new_file_path_forCS = 'Assets/Resources' .'/' . $attachment_name['filename'] . '.' . $attachment_name['extension'];
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, $new_file_path_forCS, null);
    }

    //Featured Image FILE
    $featImageID = get_post_thumbnail_id($asset_id); // featured Image ID
    if(is_numeric($featImageID)){
        $attachment_post = get_post($featImageID);
        $attachment_file = $attachment_post->guid;
        $attachment_tempname = str_replace('\\', '/', $attachment_file);
        $attachment_name = pathinfo($attachment_tempname);
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir = str_replace('\\','/',$upload_dir);
        $new_file = $upload_dir .'/' .$gameSlug . "Unity/Assets/Resources" .'/' . $attachment_name['filename'] . '.' . $attachment_name['extension'];;
        copy($attachment_file, $new_file);

        //$new_file_path_forCS = 'Assets/Resources' .'/' . $attachment_name['filename'] . '.' . $attachment_name['extension'];
        //wpunity_add_in_HandyBuilder_cs($handybuilder_file, $new_file_path_forCS, null);
    }

}

//Create initial meta for objs
function wpunity_compile_objmeta_cre($folder, $objName, $objID, $suffix = ""){

    $file = $folder . '/' . $objName . $suffix. '.obj.meta';
    $create_file = fopen($file, "w") or die("Unable to open file!");

    $objMetaPattern = "fileFormatVersion: 2
guid: ___[obj_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
";      // wpunity_getYaml_obj_dotmeta_pattern();

    $objMetaContent = wpunity_replace_objmeta($objMetaPattern, $objID);

    fwrite($create_file, $objMetaContent);
    fclose($create_file);
}

//==========================================================================================================================================
//==========================================================================================================================================
//4. Create Unity files (at Assets/scenes)

//Generate scenes
function wpunity_compile_scenes_gen($gameID,$gameSlug){
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity/Assets/scenes';
    $settings_path = $upload_dir . "/" . $gameSlug . 'Unity/ProjectSettings';
    $handybuilder_file = $upload_dir . '/' . $gameSlug . 'Unity' . '/Assets/Editor/HandyBuilder.cs';

    wpunity_compile_scenes_static_cre($game_path,$gameSlug,$settings_path,$handybuilder_file,$gameID);

    $gameTypeTerm = wp_get_post_terms( $gameID, 'wpunity_game_type' );
    $gameType = $gameTypeTerm[0]->name;

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
            wpunity_compile_scenes_cre($game_path, $scene_id, $gameSlug, $settings_path,
                $scenes_counter, $handybuilder_file, $gameType);

            // Increment scene counter if scene is either WonderAround or Educational-Energy scene
            $scene_type = get_the_terms( $scene_id, 'wpunity_scene_yaml' );
            $scene_type_slug = $scene_type[0]->slug;

            if ($scene_type_slug == 'wonderaround-yaml' || $scene_type_slug == 'educational-energy' || $scene_type_slug == 'wonderaround-lab-yaml' ){
                $scenes_counter++;
            }

        endwhile;
    endif;

    wp_reset_postdata();
}

//Create Reward and SceneSelector
function wpunity_compile_scenes_static_cre($game_path,$gameSlug,$settings_path,$handybuilder_file,$gameID){
    //get the first Game Type taxonomy in order to get the yamls (all of them have the same)
    $gameType = wp_get_post_terms( $gameID, 'wpunity_game_type' );
    if($gameType[0]->slug == 'energy_games'){
        $mainMenuTerm = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml');
        $term_meta_s_reward = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_reward',true);
        $term_meta_s_selector = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_selector',true);
        $term_meta_s_selector_title = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_selector_title',true);
    }elseif($gameType[0]->slug == 'archaeology_games'){
        $mainMenuTerm = get_term_by('slug', 'mainmenu-arch-yaml', 'wpunity_scene_yaml');
        $term_meta_s_reward = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_reward_arch',true);
        $term_meta_s_selector = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_selector_arch',true);
        $term_meta_s_selector_title = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_selector_title_arch',true);
    }elseif($gameType[0]->slug == 'chemistry_games'){
        $mainMenuTerm = get_term_by('slug', 'mainmenu-chem-yaml', 'wpunity_scene_yaml');
        $term_meta_s_reward = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_reward_chem',true);
        $term_meta_s_selector = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_selector_chem',true);
        $term_meta_s_selector_title = get_term_meta($mainMenuTerm->term_id,'wpunity_yamlmeta_s_selector_title_chem',true);
    }

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

//Create MainMenu scene and others
function wpunity_compile_scenes_cre($game_path, $scene_id, $gameSlug, $settings_path, $scenes_counter, $handybuilder_file, $gameType){

    $scene_post = get_post($scene_id);
    $scene_type = get_the_terms( $scene_id, 'wpunity_scene_yaml' );
    $scene_type_ID = $scene_type[0]->term_id;
    $scene_type_slug = $scene_type[0]->slug;

    if($scene_type_slug == 'mainmenu-yaml'){
        wpunity_create_energy_mainmenu_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file);
    }elseif($scene_type_slug == 'mainmenu-arch-yaml'){
        wpunity_create_archaeology_mainmenu_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file);
    }elseif($scene_type_slug == 'mainmenu-chem-yaml'){
        wpunity_create_chemistry_mainmenu_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file);
    }elseif($scene_type_slug == 'credentials-arch-yaml'){
        wpunity_create_archaeology_credentials_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file);
    }elseif($scene_type_slug == 'credentials-yaml'){
        wpunity_create_energy_credentials_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file);
    }elseif($scene_type_slug == 'credentials-chem-yaml'){
        wpunity_create_chemistry_credentials_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file);
    }elseif($scene_type_slug == 'educational-energy'){
        wpunity_create_energy_educational_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file,$scenes_counter,$gameType);
    }elseif($scene_type_slug == 'wonderaround-yaml'){
        wpunity_create_archaeology_wonderaround_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file,$scenes_counter,$gameType);
    }elseif($scene_type_slug == 'wonderaround-lab-yaml'){
        wpunity_create_chemistry_lab_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file,$scenes_counter,$gameType);
    }elseif($scene_type_slug == 'exam2d-chem-yaml'){
        wpunity_create_chemistry_exam2d_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file,$scenes_counter,$gameType);
    }elseif($scene_type_slug == 'exam3d-chem-yaml'){
        wpunity_create_chemistry_exam3d_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file,$scenes_counter,$gameType);
    }

}

//==========================================================================================================================================
//==========================================================================================================================================
//5. Copy StandardAssets depending the Game Type

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
            $sbpath = $iterator->getSubPathName();
            $dirtomake = $dest . DIRECTORY_SEPARATOR . $sbpath;
            mkdir($dirtomake);
        } else {
            copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
        }
    }


}
//==========================================================================================================================================
//==========================================================================================================================================

