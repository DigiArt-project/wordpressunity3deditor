<?php

function wpunity_create_folder_withmeta($folderType,$sceneSlug,$sceneID,$parentGameSlug,$parentGameID){

    if($folderType == 'scene'){
        //FORMAT: uploads / slug Game / slug Scene / slug Category of Asset (standard) + metas
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir .= "/" . $parentGameSlug;   $file_dir = $upload_dir;//save this for asset folder's meta
        $upload_dir .= "/" . $sceneSlug;

        $upload_dir = str_replace('\\','/',$upload_dir);

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755);
        }

        $templatePart = wpunity_getFolderMetaPattern();

        $file_dir = str_replace('\\','/',$file_dir);
        $file_dir .= '/' . $sceneSlug .'.meta';//path and 'folder_name'.meta

        $create_file = fopen($file_dir, "w") or die("Unable to open file!");

        $myfile_text = wpunity_replace_foldermeta($templatePart,$sceneID);
        fwrite($create_file, $myfile_text);
        fclose($create_file);

        wpunity_create_subfolders_withmeta($sceneID,$upload_dir,$templatePart);

    }elseif($folderType == 'game'){
        //FORMAT: uploads / slug Game !without meta (only the folder)
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir .= "/" . $parentGameSlug;

        $upload_dir = str_replace('\\','/',$upload_dir);

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755);
        }
    }


}

function wpunity_create_subfolders_withmeta($sceneID,$upload_dir,$templatePart){

    //FORMAT: uploads / slug Game / slug Scene / slug Category of Asset (standard)
    //Create Subfolders for assets to be uploaded
    $newDir1 = $upload_dir . '/' . 'dynamic3dmodels';
    $newDir2 = $upload_dir . '/' . 'doors';
    $newDir3 = $upload_dir . '/' . 'pois';
    $newDir4 = $upload_dir . '/' . 'static3dmodels';

    if (!is_dir($newDir1)) {mkdir($newDir1, 0755);}
    if (!is_dir($newDir2)) {mkdir($newDir2, 0755);}
    if (!is_dir($newDir3)) {mkdir($newDir3, 0755);}
    if (!is_dir($newDir4)) {mkdir($newDir4, 0755);}

    $file1_text = wpunity_replace_foldermeta($templatePart,'a'. $sceneID);
    $file2_text = wpunity_replace_foldermeta($templatePart,'b'. $sceneID);
    $file3_text = wpunity_replace_foldermeta($templatePart,'c'. $sceneID);
    $file4_text = wpunity_replace_foldermeta($templatePart,'d'. $sceneID);
    $create_file1 = fopen($upload_dir . '/dynamic3dmodels.meta', "w") or die("Unable to open file!");
    fwrite($create_file1, $file1_text);
    fclose($create_file1);

    $create_file2 = fopen($upload_dir . '/doors.meta', "w") or die("Unable to open file!");
    fwrite($create_file2, $file2_text);
    fclose($create_file2);

    $create_file3 = fopen($upload_dir . '/pois.meta', "w") or die("Unable to open file!");
    fwrite($create_file3, $file3_text);
    fclose($create_file3);

    $create_file4 = fopen($upload_dir . '/static3dmodels.meta', "w") or die("Unable to open file!");
    fwrite($create_file4, $file4_text);
    fclose($create_file4);
}

function wpunity_create_unityfile_noAssets($folderType,$sceneSlug,$sceneID,$parentGameSlug,$parentGameID,$yamlTermID){

    if($folderType == 'scene'){
        //FORMAT: uploads / slug Game / slug Scene / slug-Scene.unity
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir .= "/" . $parentGameSlug;
        $upload_dir .= "/" . $sceneSlug;
        $upload_dir = str_replace('\\','/',$upload_dir);
        $unityfile_dir = $upload_dir . '/' . $sceneSlug .'.unity';//path and 'folder_name'.meta

        $unitycreate_file = fopen($unityfile_dir, "w") or die("Unable to open file!");
        $unityfile_text = wpunity_replace_unityfile($yamlTermID,$sceneID);
        fwrite($unitycreate_file, $unityfile_text);
        fclose($unitycreate_file);
    }

}

function wpunity_create_unityfile_withAssets($folderType,$sceneSlug,$sceneID,$parentGameSlug,$parentGameID,$yamlTermID,$jsonScene){

    if($folderType == 'scene'){
        //FORMAT: uploads / slug Game / slug Scene / slug-Scene.unity
        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir .= "/" . $parentGameSlug;
        $upload_dir .= "/" . $sceneSlug;
        $upload_dir = str_replace('\\','/',$upload_dir);
        $unityfile_dir = $upload_dir . '/' . $sceneSlug .'.unity';//path and 'folder_name'.meta


        unlink($unityfile_dir);//DELETE old unity file

        $unitycreate_file = fopen($unityfile_dir, "w") or die("Unable to open file!");
        $unityfile_text = wpunity_replace_unityfile_withAssets($yamlTermID,$sceneID,$jsonScene);

        fwrite($unitycreate_file, $unityfile_text);
        fclose($unitycreate_file);
    }

}

function wpunity_create_default_scenes_for_game($gameSlug,$gameTitle,$gameID){
    //Get
    $allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
    $allScenePGameID = $allScenePGame->term_id;

    $mainmenuSceneYAML = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Main Menu
    $mainmenuSceneYAMLID = $mainmenuSceneYAML->term_id;
    $firstSceneYAML = get_term_by('slug', 'wonderaround-yaml', 'wpunity_scene_yaml'); //Yaml Tax for First Scene
    $firstSceneYAMLID = $firstSceneYAML->term_id;
    $optionsSceneYAML = get_term_by('slug', 'options-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Options Scene
    $optionsSceneYAMLID = $optionsSceneYAML->term_id;
    $credentialsSceneYAML = get_term_by('slug', 'credentials-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Credentials Scene
    $credentialsSceneYAMLID = $credentialsSceneYAML->term_id;


    $mainmenuSceneTitle = 'Main Menu for ' . $gameTitle; //Title for Main Menu
    $mainmenuSceneSlug = 's_mainmenu_' . $gameSlug; //Slug for Main Menu
    $firstSceneTitle = 'First Scene for ' . $gameTitle; //Title for First Menu
    $firstSceneSlug = 's1_' . $gameSlug; //Slug for First Menu
    $optionsSceneTitle = 'Options Scene for ' . $gameTitle; //Title for Options Menu
    $optionsSceneSlug = 's_options_' . $gameSlug; //Slug for Options Menu
    $credentialsSceneTitle = 'Credentials Scene for ' . $gameTitle; //Title for Credentials Menu
    $credentialsSceneSlug = 's_credentials_' . $gameSlug; //Slug for Credentials Menu

    // Create Main Menu Scene Data
    $mainmenuSceneData = array(
        'post_title'    => $mainmenuSceneTitle,
        'post_name' => $mainmenuSceneSlug,
        'post_type' => 'wpunity_scene',
        'post_status'   => 'publish',
        'tax_input'    => array(
            'wpunity_scene_pgame'     => array( $allScenePGameID ),
            'wpunity_scene_yaml'     => array( $mainmenuSceneYAMLID ),
        ),
    );

    // Create First Scene Data
    $firstSceneData = array(
        'post_title'    => $firstSceneTitle,
        'post_name' => $firstSceneSlug,
        'post_type' => 'wpunity_scene',
        'post_status'   => 'publish',
        'tax_input'    => array(
            'wpunity_scene_pgame'     => array( $allScenePGameID ),
            'wpunity_scene_yaml'     => array( $firstSceneYAMLID ),
        ),
    );

    // Create Options Scene Data
    $optionsSceneData = array(
        'post_title'    => $optionsSceneTitle,
        'post_name' => $optionsSceneSlug,
        'post_type' => 'wpunity_scene',
        'post_status'   => 'publish',
        'tax_input'    => array(
            'wpunity_scene_pgame'     => array( $allScenePGameID ),
            'wpunity_scene_yaml'     => array( $optionsSceneYAMLID ),
        ),
    );

    // Create Credentials Scene Data
    $credentialsSceneData = array(
        'post_title'    => $credentialsSceneTitle,
        'post_name' => $credentialsSceneSlug,
        'post_type' => 'wpunity_scene',
        'post_status'   => 'publish',
        'tax_input'    => array(
            'wpunity_scene_pgame'     => array( $allScenePGameID ),
            'wpunity_scene_yaml'     => array( $credentialsSceneYAMLID ),
        ),
    );

    // Insert posts 1-1 into the database with subfolders and files needed
    $mainmenuSceneID = wp_insert_post( $mainmenuSceneData );
    wpunity_create_folder_withmeta('scene',$mainmenuSceneSlug,$mainmenuSceneID,$gameSlug,$gameID);
    //Create .unity file for the "Scene" (Main Menu)
    wpunity_create_unityfile_noAssets('scene',$mainmenuSceneSlug,$mainmenuSceneID,$gameSlug,$gameID,$mainmenuSceneYAMLID);
    //Create a parent scene tax category for the assets3d
    wp_insert_term($mainmenuSceneTitle,'wpunity_asset3d_pscene',$mainmenuSceneSlug,'Scene assignment of Asset 3D');

    $firstSceneID = wp_insert_post( $firstSceneData );
    wpunity_create_folder_withmeta('scene',$firstSceneSlug,$firstSceneID,$gameSlug,$gameID);
    //Create .unity file for the "Scene" (First Scene)
    wpunity_create_unityfile_noAssets('scene',$firstSceneSlug,$firstSceneID,$gameSlug,$gameID,$firstSceneYAMLID);
    //Create a parent scene tax category for the assets3d
    wp_insert_term($firstSceneTitle,'wpunity_asset3d_pscene',$firstSceneSlug,'Scene assignment of Asset 3D');

    $optionsSceneID = wp_insert_post( $optionsSceneData );
    wpunity_create_folder_withmeta('scene',$optionsSceneSlug,$optionsSceneID,$gameSlug,$gameID);
    //Create .unity file for the "Scene" (Options Scene)
    wpunity_create_unityfile_noAssets('scene',$optionsSceneSlug,$optionsSceneID,$gameSlug,$gameID,$optionsSceneYAMLID);
    //Create a parent scene tax category for the assets3d
    wp_insert_term($optionsSceneTitle,'wpunity_asset3d_pscene',$optionsSceneSlug,'Scene assignment of Asset 3D');

    $credentialsSceneID = wp_insert_post( $credentialsSceneData );
    wpunity_create_folder_withmeta('scene',$credentialsSceneSlug,$credentialsSceneID,$gameSlug,$gameID);
    //Create .unity file for the "Scene" (Main Menu)
    wpunity_create_unityfile_noAssets('scene',$credentialsSceneSlug,$credentialsSceneID,$gameSlug,$gameID,$credentialsSceneYAMLID);
    //Create a parent scene tax category for the assets3d
    wp_insert_term($credentialsSceneTitle,'wpunity_asset3d_pscene',$credentialsSceneSlug,'Scene assignment of Asset 3D');
}

?>