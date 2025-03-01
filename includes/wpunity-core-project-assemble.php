<?php

//==========================================================================================================================================
//==========================================================================================================================================

function wpunity_assemble_the_unity_game_project($gameID, $gameSlug, $targetPlatform, $gameType){

    //0. Delete everything in order to recreate them from scratch
    wpunity_compile_folders_del($gameSlug);

    //1. Create Default Folder Structure
    wpunity_compile_folders_gen($gameSlug);

    //1b. Create cs files before all data that give commands to editor and importer
    // GeneralImportSettings is completed as it is whereas Handybuilder.cs is a template that should be filled with assets and scenes to import
    wpunity_compile_cs_gen($gameSlug, $targetPlatform);
    
    //2. Create Project Settings files (16 files):
    // ProjectSettings.asset is modified with the versioning system.
    // EditorBuildSettings.asset is not modified. Just copied.
    wpunity_compile_settings_gen($gameID,$gameSlug);

    //3. Create models related files (go in Models and Resources)
    wpunity_compile_models_gen($gameID, $gameSlug, $targetPlatform);

    //4. Create Scenes.Unity files (at Assets/scenes)
    wpunity_compile_scenes_gen($gameID,$gameSlug);

    //5. Copy StandardAssets depending the Game Type
    wpunity_compile_copy_StandardAssets($gameID, $gameSlug, $gameType);
    
    //6. If game is chemistry then make the molecule prefabs
    if ($gameType == "Chemistry")
        wpunity_compile_make_molecules_prefabs($gameID, $gameSlug);
    
    return 'true';
}

function wpunity_compile_make_molecules_prefabs($gameID, $gameSlug){
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $projectLocalPath = str_replace('\\','/',$upload_dir);

    $projectName = $gameSlug;
    $molecules = wpunity_get_all_molecules_of_game($gameID);//ALL available Molecules of a GAME
   
    
//    $fb  = fopen("outputPREKA.txt","w");
//    fwrite($fb, $projectLocalPath);
//    fwrite($fb, print_r($molecules, true));
//    fclose($fb);
    
    foreach ($molecules as $molecule) {
        $molecule_post_id = $molecule['moleculeID'];
        $molecule_post_name = $molecule['moleculeName'];
        $pdb_id = get_post_meta($molecule_post_id,'wpunity_asset3d_pdb',true);
        $pdb_path = wp_get_attachment_url( $pdb_id );
        $pdb_str = file_get_contents($pdb_path);

        addMoleculePrefabToAssets($projectLocalPath, $projectName, $molecule_post_id, $molecule_post_name, $pdb_str);
    }


//    $projectLocalPath = "C:\\xampp7\htdocs\wordpress\wp-content\uploads\\";
//    $projectName = "chemtest";
//    $molecule_post_id = "123";
//    $molecule_post_name = "water";
//    $pdb_str =
//        "HEADER".'\n'.
//        "COMPND".'\n'.
//        "TITLE".'\n'.
//        "SOURCE".'\n'.
//        "HETATM    1  H   HOH     1      -0.174  -0.813  0".'\n'.
//        "HETATM    2  H   HOH     1      -0.174   0.820  0".'\n'.
//        "HETATM    3  O   HOH     1       0.403   0.004  0".'\n'.
//        "CONECT    1    3".'\n'.
//        "CONECT    2    3".'\n'.
//        "END";
//
  
    
    // 1. Get all the checkboxed molecules for the game
    //
    // 2. iterate for each checkboxed molecule
    //
    //      2.a Make the molecule
    
        
    
        // addMoleculePrefabToAssets($projectLocalPath, $projectName, $molecule_post_id, $molecule_post_name, $pdb_str);
        
        
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
    
    // 1. HandyBuilder.cs
    // Get 'Uploads' dir path of wordpress
    $upload_dir = str_replace('\\','/', wp_upload_dir()['basedir']);

    wpunity_createEmpty_HandyBuilder_cs($upload_dir.'/'.$gameSlug.'Unity/Assets/Editor/HandyBuilder.cs',
                                                $targetPlatform);
    
    // 2. GeneralImportSettings.cs: Copy from Editor_Commons folder
    
    $pluginSlug = plugin_basename(__FILE__); // wordpressunity3deditor/includes/wpunity-core-project-assemble.php
    
    $pluginSlug = substr($pluginSlug, 0, strpos($pluginSlug, "/")); // wordpressunity3deditor
    
    $filepath_source_file = get_home_path().'wp-content/plugins/' . $pluginSlug . '/StandardAssets/Editor_Commons/GeneralImportSettings.cs';

    $filepath_target_file = $upload_dir . '/' . $gameSlug . 'Unity/Assets/Editor/GeneralImportSettings.cs';

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

    $gameType = wp_get_post_terms( $gameID, 'wpunity_game_type' );
    
    switch($gameType[0]->slug) {
        case 'archaeology_games':
            $fileFolder = 'archaeology';
            break;
        case 'energy_games':
            $fileFolder = 'energy';
            break;
        case 'chemistry_games':
            $fileFolder = 'chemistry';
            break;
    }

    $upload_dir = str_replace('\\','/',wp_upload_dir()['basedir']);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity';

    wpunity_compile_settings_files_gen($gameID, $game_path,'AudioManager.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'ClusterInputManager.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'DynamicsManager.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'EditorBuildSettings.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'EditorSettings.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'GraphicsSettings.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'InputManager.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'NavMeshAreas.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'NetworkManager.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'Physics2DSettings.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'ProjectSettings.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'ProjectVersion.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'QualitySettings.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'TagManager.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'TimeManager.asset',$fileFolder);
    wpunity_compile_settings_files_gen($gameID, $game_path,'UnityConnectSettings.asset',$fileFolder);
}

function wpunity_compile_settings_files_gen($game_project_id, $game_path,$fileName,$fileFolder){

    // Get the YAML pattern
    $fileYaml = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/" . $fileFolder . "/settings/" . $fileName);

    // Add Versioning in ProjectSettings
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
// First get all assets of game
// Second all objs in Models and sprites/videos in Resources
// Third all objs in HandyBuilder.cs for importing (wrapper)
function wpunity_compile_models_gen($gameID, $gameSlug, $targetPlatform){

    $upload_dir = str_replace('\\','/', wp_upload_dir()['basedir']);
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity/Assets/models';
    $handybuilder_file = $upload_dir . '/' . $gameSlug . 'Unity' . '/Assets/Editor/HandyBuilder.cs';
    
    $res = wpunity_fetch_assetids_in_scenes($gameSlug);
    
    $assetIds = $res[0];  // Asset ids to include in the models
    $neededObj = $res[1]; // clones that do need their obj (given that their protos are already included)
    
    $assetsAlreadyIncluded = [];
    
    for ($i = 0 ; $i < count($assetIds); $i++ )
    {
        if (!in_array($assetIds[$i], $assetsAlreadyIncluded)){
            wpunity_compile_assets_cre($game_path, $assetIds[$i], $handybuilder_file, $gameSlug, $targetPlatform, $neededObj[$i]);
            $assetsAlreadyIncluded[] = $assetIds[$i];
        }
    }
}

//Import assets to HandyBuilder (function internal)
/**
 * @param $game_path
 * @param $asset_id
 * @param $handybuilder_file
 * @param $gameSlug
 * @param $targetPlatform
 * @param $includeObj  :  Not always wanted to include obj. Clones should not include their obj which has the same id with its prototype (only in the case both exist in the scene).
 */
function wpunity_compile_assets_cre($game_path, $asset_id, $handybuilder_file, $gameSlug, $targetPlatform, $includeObj){

    //Create the folder of the Model(Asset)
    $asset_post = get_post($asset_id);
    $folder = $game_path . '/' . $asset_post->post_name;
    if (!is_dir($folder)) {mkdir($folder, 0755) or wp_die("Unable to create the folder ".$folder);}

    //Copy files of the Model

    if ($includeObj) {
        //OBJ FILE
        $objID = get_post_meta($asset_id, 'wpunity_asset3d_obj', true);
        if (is_numeric($objID)) {
            $asset_type = get_the_terms($asset_id, 'wpunity_asset3d_cat');
            $attachment_post = get_post($objID);
            $attachment_file = $attachment_post->guid;
            $attachment_tempname = str_replace('\\', '/', $attachment_file);
            $attachment_name = pathinfo($attachment_tempname);
            $new_file = $folder . '/' . $attachment_name['filename'] . '.obj';
        
            if ($asset_type[0]->name == 'Site' || $asset_type[0]->name == 'Room') {
                $new_file = $folder . '/' . $attachment_name['filename'] . 'CollidersNoOptimization.obj';
            }
        
            copy($attachment_file, $new_file);
        
            if ($asset_type[0]->name == 'Site' || $asset_type[0]->name == 'Room')
                wpunity_compile_objmeta_cre($folder, $attachment_name['filename'], $objID, 'CollidersNoOptimization');
            else
                wpunity_compile_objmeta_cre($folder, $attachment_name['filename'], $objID, '');
        
            $new_file_path_forCS = 'Assets/models/' . $asset_post->post_name . '/' . $attachment_name['filename'] . '.obj';
        
            if ($asset_type[0]->name == 'Site' || $asset_type[0]->name == 'Room') {
                $new_file_path_forCS = 'Assets/models/' . $asset_post->post_name .
                    '/' . $attachment_name['filename'] . 'CollidersNoOptimization.obj';
            }
        
            wpunity_add_in_HandyBuilder_cs($handybuilder_file, $new_file_path_forCS, null);
        }
    
        //MTL FILE
        $mtlID = get_post_meta($asset_id, 'wpunity_asset3d_mtl', true);
        if (is_numeric($mtlID)) {
            $attachment_post = get_post($mtlID);
            $attachment_file = $attachment_post->guid;
            $attachment_tempname = str_replace('\\', '/', $attachment_file);
            $attachment_name = pathinfo($attachment_tempname);
            $new_file = $folder . '/' . $attachment_name['filename'] . '.mtl';
            copy($attachment_file, $new_file);
        }
    
        //Diffusion Image FILE
        $difimgID = get_post_meta($asset_id, 'wpunity_asset3d_diffimage', false);
        foreach ($difimgID as $difimg_ID) {
            if (is_numeric($difimg_ID)) {
                $attachment_post = get_post($difimg_ID);
            
                $attachment_file = $attachment_post->guid;
            
                $attachment_tempname = str_replace('\\', '/', $attachment_file);
                $attachment_name = pathinfo($attachment_tempname);
            
                $ending = 'jpg';
                if ($attachment_post->post_mime_type == 'image/png')
                    $ending = 'png';
            
                $new_file = $folder . '/' . $attachment_name['filename'] . '.' . $ending;
                copy($attachment_file, $new_file);
            }
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
[junk line]";      // wpunity_getYaml_obj_dotmeta_pattern();

    $objMetaContent = wpunity_replace_objmeta($objMetaPattern, $objID);

    fwrite($create_file, $objMetaContent);
    fclose($create_file);
}

//==========================================================================================================================================
//==========================================================================================================================================
//4. Create Unity files (at Assets/scenes)

//Generate scenes
function wpunity_compile_scenes_gen($gameID,$gameSlug){
 
    $upload_dir = str_replace('\\','/', wp_upload_dir()['basedir']);
    
    $game_path = $upload_dir . "/" . $gameSlug . 'Unity/Assets/scenes';
    $fileEditorBuildSets = $upload_dir . "/" . $gameSlug . 'Unity/ProjectSettings/EditorBuildSettings.asset';
    $handybuilder_file = $upload_dir . '/' . $gameSlug . 'Unity/Assets/Editor/HandyBuilder.cs';
    
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
    
    // MainMenu should be first in EditorBuildSettings.asset and HandyBuilder.cs
    wpunity_append_scenes_in_EditorBuildSettings_dot_asset( $fileEditorBuildSets,'Assets/scenes/S_MainMenu.unity');
    wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, 'Assets/scenes/S_MainMenu.unity');
    
    // Add Static scenes
    wpunity_compile_scenes_static_cre($game_path, $gameSlug, $fileEditorBuildSets, $handybuilder_file, $gameID);
    
    if ( $custom_query->have_posts() ) :
        while ( $custom_query->have_posts() ) :
            $custom_query->the_post();
            $scene_id = get_the_ID();
    
            //Create the non-static Unity Scenes (or those that have dependency from non-static)
            wpunity_compile_scenes_cre($game_path, $scene_id, $gameSlug, $fileEditorBuildSets,
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
function wpunity_compile_scenes_static_cre($game_path, $gameSlug, $fileEditorBuildSettings, $handybuilder_file, $gameID){
    
    //get the first Game Type taxonomy in order to get the yamls (all of them have the same)
    $gameType = wp_get_post_terms( $gameID, 'wpunity_game_type' );

    switch($gameType[0]->slug){
        case 'archaeology_games':
        
            $mainMenuTerm = get_term_by('slug', 'mainmenu-arch-yaml', 'wpunity_scene_yaml');
            $term_meta_s_reward = wpunity_getSceneYAML_archaeology('reward');
            $term_meta_s_selector = wpunity_getSceneYAML_archaeology('selector');
            $term_meta_s_selector_title = 'Select a Scene';
        
            // S_SceneSelector.unity create
            $file2 = $game_path . '/' . 'S_SceneSelector.unity';
        
            // Change its title
            $file_content = str_replace("___[text_title_scene_selector]___", $term_meta_s_selector_title, $term_meta_s_selector);
            $create_file2 = fopen($file2, "w") or die("Unable to open file!");
            fwrite($create_file2, $file_content);
            fclose($create_file2);
        
            // S_Reward.unity create
            $file = $game_path . '/' . 'S_Reward.unity';
            $create_file = fopen($file, "w") or die("Unable to open file!");
            fwrite($create_file, $term_meta_s_reward);
            fclose($create_file);
            
            break;
        case 'energy_games':
    
//            $mainMenuTerm = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml');
//            $term_meta_s_reward = wpunity_getSceneYAML_energy('reward');
//            $term_meta_s_selector = wpunity_getSceneYAML_energy('selector');
//            $term_meta_s_selector_title = 'Select a Scene';

            //create standard energy scenes (simulation scenes, stats, turbine selection etc)
            wpunity_create_energy_standardScenes_unity($gameID, $gameSlug, $game_path, $fileEditorBuildSettings, $handybuilder_file);
    
            // Make the scene selector
            wpunity_create_energy_selector_unity($gameID,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file);
    
            break;
        case 'chemistry_games':
    
//            $mainMenuTerm = get_term_by('slug', 'mainmenu-chem-yaml', 'wpunity_scene_yaml');
//            $term_meta_s_reward = wpunity_getSceneYAML_chemistry('reward');
//            $term_meta_s_selector = wpunity_getSceneYAML_chemistry('selector');
//            $term_meta_s_selector_title = 'Select a Scene';
    
            //do nothing
            wpunity_create_chemistry_selector_unity($gameID, $gameSlug, $game_path, $fileEditorBuildSettings, $handybuilder_file);
            
            break;
    }
}

//Create MainMenu scene and others
function wpunity_compile_scenes_cre($game_path, $scene_id, $gameSlug, $fileEditorBuildSettings, $scenes_counter, $handybuilder_file, $gameType){

    //$fe = fopen("output_scenes_cre" . $scene_id . ".txt","w");
    
    $scene_post = get_post($scene_id);
    $scene_type = get_the_terms( $scene_id, 'wpunity_scene_yaml' );
    $scene_type_ID = $scene_type[0]->term_id;
    $scene_type_slug = $scene_type[0]->slug;

//    fwrite($fe, $scene_id);
//    fwrite($fe, "\n");
//    fwrite($fe, $scene_type_slug);
//    fwrite($fe, "\n");
    
    
    if($scene_type_slug == 'mainmenu-yaml'){
        wpunity_create_energy_mainmenu_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file);
    }elseif($scene_type_slug == 'mainmenu-arch-yaml'){
        wpunity_create_archaeology_mainmenu_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file);
    }elseif($scene_type_slug == 'mainmenu-chem-yaml'){
        wpunity_create_chemistry_mainmenu_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file);
    }elseif($scene_type_slug == 'credentials-arch-yaml'){
        wpunity_create_archaeology_credentials_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file);
    }elseif($scene_type_slug == 'credentials-yaml'){
        wpunity_create_energy_credentials_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file);
    }elseif($scene_type_slug == 'credentials-chem-yaml'){
        wpunity_create_chemistry_credentials_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file);
    }elseif($scene_type_slug == 'educational-energy'){
        wpunity_create_energy_educational_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file,$scenes_counter,$gameType);
    }elseif($scene_type_slug == 'wonderaround-yaml'){
        wpunity_create_archaeology_wonderaround_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file,$scenes_counter,$gameType);
    }elseif($scene_type_slug == 'wonderaround-lab-yaml'){
        wpunity_create_chemistry_lab_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file,$scenes_counter,$gameType);
    }elseif($scene_type_slug == 'exam2d-chem-yaml'){
        wpunity_create_chemistry_exam2d_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file,$scenes_counter,$gameType);
    }elseif($scene_type_slug == 'exam3d-chem-yaml'){
        wpunity_create_chemistry_exam3d_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$fileEditorBuildSettings,$handybuilder_file,$scenes_counter,$gameType);
    }
    
//    fwrite($fe, "success");
//    fclose($fe);
}

//==========================================================================================================================================
//==========================================================================================================================================
//5. Copy StandardAssets depending the Game Type

function wpunity_compile_copy_StandardAssets($gameID, $gameSlug,$gameType){
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

    if($gameType == "Chemistry"){
        $fileGo = $dest . '/' . 'goedle_io/Scripts/'. 'GoedleManager.prefab';
        $GOcontent = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/chemistry/GoedleManager.txt");

	    global $project_scope;

        $project_saved_keys = wpunity_getProjectKeys($gameID, $project_scope);
        $g_app_key = $project_saved_keys['gioID'];
        //$g_api_key = $project_saved_keys['wpunity_project_gioAPIKey'];
		$g_api_key = get_post_meta($gameID,'wpunity_project_gioAPIKey',true);
		
        $file_content = str_replace("___[g_app_key]___",$g_app_key,$GOcontent);
        $file_content = str_replace("___[g_api_key]___",$g_api_key,$file_content);

        $create_file = fopen($fileGo, "w") or die("Unable to open file!");
        fwrite($create_file, $file_content);
        fclose($create_file);
    }elseif($gameType == "Energy"){
        $fileGo = $dest . '/' . 'goedle_io/Scripts/'. 'GoedleManager.prefab';
        $GOcontent = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/energy/GoedleManager.txt");

        global $project_scope;

        $project_saved_keys = wpunity_getProjectKeys($gameID, $project_scope);
        $g_app_key = $project_saved_keys['gioID'];
        //$g_api_key = $project_saved_keys['wpunity_project_gioAPIKey'];
        $g_api_key = get_post_meta($gameID,'wpunity_project_gioAPIKey',true);

        $file_content = str_replace("___[g_app_key]___",$g_app_key,$GOcontent);
        $file_content = str_replace("___[g_api_key]___",$g_api_key,$file_content);

        $create_file = fopen($fileGo, "w") or die("Unable to open file!");
        fwrite($create_file, $file_content);
        fclose($create_file);
    }
}
//==========================================================================================================================================
//==========================================================================================================================================

