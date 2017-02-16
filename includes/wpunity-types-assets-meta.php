<?php

function wpunity_assets_delete_allmetas($post_id){

    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $assetPath = get_post_meta($post_id,'wpunity_asset3d_pathData',true);
    $folder = $upload_dir . "/" . $assetPath;

    //First Delete All Metas
    foreach (glob("$folder/*.meta") as $filename) {
        unlink($filename);
    }

    foreach (glob("$folder/*.mat") as $filename) {
        unlink($filename);
    }


}



//==========================================================================================================================================

function wpunity_assets_create_metafile($post_id,$attachment_ID){

    $attachment_post = get_post( $attachment_ID );

    $type = get_post_mime_type($attachment_ID);
    $attachment_url = wp_get_attachment_url( $attachment_ID );
    $attachment_type = wp_check_filetype( $attachment_url );
    $attachment_title = $attachment_post->post_title;

    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $assetPath = get_post_meta($post_id,'wpunity_asset3d_pathData',true);

    $yampl_temp_id = wpunity_getTemplateID_forAsset($post_id);

    if (strpos($type, 'text/plain') === 0) {
        if ($attachment_type['ext'] == 'obj') {
            $create_file = fopen($upload_dir . '/' . $assetPath . '/' . $attachment_title . '.obj.meta', "w") or die("Unable to open file!");
            $templatePart = get_post_meta( $yampl_temp_id, 'wpunity_yamltemp_scene_odp', true );
            $fileData = wpunity_replace_objmeta($templatePart,$attachment_ID);
            fwrite($create_file, $fileData);
            fclose($create_file);
        }elseif($attachment_type['ext'] == 'mtl') {
            $create_file = fopen($upload_dir . '/' . $assetPath . '/' . $attachment_title . '.mat', "w") or die("Unable to open file!");
            $templatePart = get_post_meta( $yampl_temp_id, 'wpunity_yamltemp_scene_matp', true );
            $fileData = wpunity_replace_mat($templatePart,$attachment_ID);
            fwrite($create_file, $fileData);
            fclose($create_file);

            $create_file2 = fopen($upload_dir . '/' . $assetPath . '/' . $attachment_title . '.mat.meta', "w") or die("Unable to open file!");
            $templatePart2 = get_post_meta( $yampl_temp_id, 'wpunity_yamltemp_scene_mdp', true );
            $fileData2 = wpunity_replace_matmeta($templatePart2,$attachment_ID);
            fwrite($create_file2, $fileData2);
            fclose($create_file2);
        }
    }elseif( (strpos($type, 'image/jpeg') === 0) ){
        $create_file = fopen($upload_dir . '/' . $assetPath . '/' . $attachment_title . '.jpg.meta', "w") or die("Unable to open file!");
        $templatePart = get_post_meta( $yampl_temp_id, 'wpunity_yamltemp_scene_jdp', true );
        $fileData = wpunity_replace_jpgmeta($templatePart,$attachment_ID);
        fwrite($create_file, $fileData);
        fclose($create_file);
    }

    //TODO else if VIDEO

}


//==========================================================================================================================================

function wpunity_create_guids($objType,$objID){
    /*
    1 = Folder
    2 = Object
    3 = JPG
    4 = Mat
    5 = Mat.Meta
     */

    if($objType==1){return $guid_id = 'f0000000000' . $objID;}
    if($objType==2){return $guid_id = 'b0000000000' . $objID;}
    if($objType==3){return $guid_id = 'c0000000000' . $objID;}
    if($objType==4){return $guid_id = '';}
    if($objType==5){return $guid_id = '';}
}

function wpunity_replace_foldermeta($file_content,$folderID){
    $unix_time = time();
    $guid_id = wpunity_create_guids(1,$folderID);

    $file_content_return = str_replace("___[folder_guid]___",$guid_id,$file_content);
    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_objmeta($file_content,$objID){
    $unix_time = time();
    $guid_id = wpunity_create_guids(2,$objID);

    $file_content_return = str_replace("___[obj_guid]___",$guid_id,$file_content);
    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_jpgmeta($file_content,$objID){
    $unix_time = time();
    $guid_id = wpunity_create_guids(3,$objID);

    $file_content_return = str_replace("___[jpg_guid]___",$guid_id,$file_content);
    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_mat($file_content,$objID){
//    $unix_time = time();
//    $guid_id = 'c0000000000' . $objID;
//
//    $file_content_return = str_replace("___[jpg_guid]___",$guid_id,$file_content);
//    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);
//
//    return $file_content_return;
    return $file_content;
}

function wpunity_replace_matmeta($file_content,$objID){
//    $unix_time = time();
//    $guid_id = 'c0000000000' . $objID;
//
//    $file_content_return = str_replace("___[jpg_guid]___",$guid_id,$file_content);
//    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);
//
//    return $file_content_return;
    return $file_content;
}

//==========================================================================================================================================



?>