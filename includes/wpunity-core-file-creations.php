<?php

function wpunity_create_folder_withmeta($folderType,$sceneSlug,$sceneID,$parentGameSlug,$parentGameID){

    if($folderType == 'scene'){
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



?>