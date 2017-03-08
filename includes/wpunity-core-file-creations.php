<?php

function wpunity_create_folder_withmeta($folderType,$sceneSlug,$sceneID,$parentGameSlug,$parentGameID){

    if($folderType == 'scene'){
        //FORMAT: uploads / slug Game / slug Scene / slug Category of Asset (standard)
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

function wpunity_replace_unityfile_withAssets( $yamlID, $sceneID, $jsonScene ){

    $tempFirstPersonPart = wpunity_getYaml_wonder_around_unity_pattern($yamlID);
    $templatePart_sop = wpunity_getYaml_static_object_pattern($yamlID);

    $unity_file_contents = "";

    $sceneJsonARR = json_decode($jsonScene, TRUE);//->objects->floor_1487753970

    $curr_fid = 30;

    //if ($sceneJsonARR['objects']) {}
    foreach ($sceneJsonARR['objects'] as $key => $value ) {

        if ($key == 'avatarYawObject') {

            $curr_fid++;

            // Change avatar position and rotation
            $unity_file_contents .= str_replace([
                '___[player_name]___',
                '___[player_fid]___',
                '___[player_position_x]___',
                '___[player_position_y]___',
                '___[player_position_z]___',
                '___[player_rotation_x]___',
                '___[player_rotation_y]___',
                '___[player_rotation_z]___'
            ],
                [
                    'Player',
                    $curr_fid,
                    $value['position'][0],
                    $value['position'][1],
                    $value['position'][2],
                    $value['rotation'][0],
                    $value['rotation'][1],
                    $value['rotation'][2]
                ],
                $tempFirstPersonPart);
        } else {

            if ($value['categoryName'] == 'Static 3D models'){

                $unity_file_contents .= str_replace(
                    [
                        "___[sop_name]___",
                        "___[sop_fid]___", // +1
                        "___[sop_prefab_fid]___", // +1
                        "___[sop_meshcol_fid]___", // +1
                        "___[sop_guid]___", // from obj meta
                        "___[sop_material_guid]___", // from mat meta
                        "___[sop_pos_x]___",
                        "___[sop_pos_y]___",
                        "___[sop_pos_z]___",
                        "___[sop_rot_x]___",
                        "___[sop_rot_y]___",
                        "___[sop_rot_z]___",
                        "___[sop_scale_x]___",
                        "___[sop_scale_y]___",
                        "___[sop_scale_z]___"],
                    [
                        $key,
                        $curr_fid++,
                        $curr_fid++,
                        $curr_fid++,
                        wpunity_create_guids('obj', $value['fnObjID']),
                        wpunity_create_guids('mat', $value['fnMtlID']), // ToDO: here we need the fnMatID // ToDO: We need to support multiple mat
                        //rotation
                        $value['position'][0], $value['position'][1], $value['position'][2],
                        // position
                        $value['rotation'][0], $value['rotation'][1], $value['rotation'][2],
                        // scale
                        $value['scale'][0]   , $value['scale'][1]   , $value['scale'][2]
                    ]
                    , $templatePart_sop);

            } else if ($value['categoryName'] == 'Points of Interest'){


            } else if ($value['categoryName'] == 'Dynamic 3D models'){


            } else if ($value['categoryName'] == 'Doors'){

            }


        }
    }


    return $unity_file_contents;
}

?>