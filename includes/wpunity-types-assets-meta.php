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

function wpunity_assets_create_metafile($post_id, $attachment_ID, $fieldid){

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
            $templatePart = wpunity_getYaml_obj_dotmeta_pattern($yampl_temp_id);//Get 'obj.meta Pattern' by Yaml ID

            $fileData = wpunity_replace_objmeta($templatePart, $attachment_ID);

            fwrite($create_file, $fileData);
            fclose($create_file);
        }elseif($attachment_type['ext'] == 'mtl') {

//            $mat_yaml_pattern = wpunity_getYaml_mat_pattern($yampl_temp_id);//Get 'Material (.mat) Pattern' by Yaml ID
//            $meta_mat_pattern = wpunity_getYaml_mat_dotmeta_pattern($yampl_temp_id);//Get 'mat.meta Pattern' by Yaml ID
//
//            $mtl_content = file_get_contents($attachment_url);
//
//            $mtl_arr = wpunity_parse_mtl_php($mtl_content);
//
//            // MTL to several MAT and META: for each material in the mtl file make a mat and a meta file
//            for ($iMaterial =0; $iMaterial < count($mtl_arr); $iMaterial ++ ){
//
//                // 1. open a .mat file named as the name of the material
//                $file_mat = fopen($upload_dir . '/' . $assetPath . '/' . $mtl_arr[$iMaterial]['materialName'] . '.mat', "w") or die("Unable to open file!");
//
//                // Create its content
//                $mat_file_content = str_replace([
//                                                "___[material_name]___",
//                                                "___[jpg_texture_guid]___",
//                                                "___[color_r]___", "___[color_g]___",  "___[color_b]___", "___[color_a]___"],
//                                            [
//                        $mtl_arr[$iMaterial]['materialName'],
//
//                                                // if textureFileName is empty then put empty else generate the guid of e.g. floor.jpg texture
//                        $mtl_arr[$iMaterial]['textureFileName']==""   ?    ""  : ", guid: " .
//                                    wpunity_create_guids('jpg', $post_id, $iMaterial) . ", type: 3",
//
//                        $mtl_arr[$iMaterial]['color_r'],
//                        $mtl_arr[$iMaterial]['color_g'],
//                        $mtl_arr[$iMaterial]['color_b'],
//                        $mtl_arr[$iMaterial]['color_a']
//                    ],
//                    $mat_yaml_pattern);
//
//
//                fwrite($file_mat, $mat_file_content);
//                fclose($file_mat);
//
//
//                // Create .meta
//                $file_mat_meta = fopen($upload_dir . '/' . $assetPath . '/' . $mtl_arr[$iMaterial]['materialName'] . '.mat.meta', "w") or die("Unable to open file!");
//
//                //$templatePart2 = get_post_meta( $yampl_temp_id, 'wpunity_yamltemp_scene_mdp', true );
//                //$fileData2 = wpunity_replace_matmeta($templatePart2,$attachment_ID);
//
//                $meta_of_mat_filled = str_replace( [
//                                                    "___[mat_guid]___",
//                                                    "___[unx_time_created]___"
//                                                   ],
//                                                   [
//                                                    wpunity_create_guids('mat', $post_id, $iMaterial), // $post_id or $attachment_ID ?
//                                                    time()
//                                                   ],
//                                                 $meta_mat_pattern);
//
//                fwrite($file_mat_meta, $meta_of_mat_filled);
//                fclose($file_mat_meta);
//            }
        }
    }elseif( (strpos($type, 'image/jpeg') === 0) ){

        if ($fieldid == 'wpunity_asset3d_diffimage') {
            // Unity does all the job, no need to generate meta
            //$templatePart = wpunity_getYaml_jpg_dotmeta_pattern($yampl_temp_id);
        } else if ($fieldid == 'wpunity_asset3d_image1' || $fieldid == 'wpunity_asset3d_screenimage') {
            $create_file = fopen($upload_dir . '/' . $assetPath . '/' . $attachment_title . '.jpg.meta', "w") or die("Unable to open file!");

            $templatePart = wpunity_getYaml_jpg_sprite_pattern($yampl_temp_id);
            $fileData = wpunity_replace_jpgmeta($templatePart, $attachment_ID);

            fwrite($create_file, $fileData);
            fclose($create_file);
        }

    }

    //TODO else if VIDEO

}


function wpunity_parse_mtl_php($txt_contents){

    $mtl_ARR = []; // this is the returned

    $materialsARR = explode("newmtl ", $txt_contents);

    // remove newmtl string
    array_shift($materialsARR);

    foreach ($materialsARR as $material_single){

        $exploded = explode("\n", $material_single);

        $materialname = $exploded[0];

        $texture_file_name = ""; // in case it does not exist to have the empty value


        for ($il = 1; $il < count($exploded); $il++){

            $line_ARR = explode(" ", $exploded[$il]);

            switch ($line_ARR[0]){
                case "Ns":  break;
                case "Ka":  break;
                case "Kd":
                    $color_r = $line_ARR[1];
                    $color_g = $line_ARR[2];
                    $color_b = $line_ARR[3];

                    break;
                case "Ks":  break;
                case "Ke":  break;
                case "Ni":  break;
                case "d":
                    $color_a = $line_ARR[1];
                    break;
                case "illum":  break;
                case "map_Kd":
                    $texture_file_name =$line_ARR[1];
                    break;
            }
        }

        $mtl_ARR[] = array(materialName => $materialname,
                           color_r => $color_r,
                           color_g => $color_g,
                           color_b => $color_b,
                           color_a => $color_a,
                           color_a => $color_a,
                           textureFileName => $texture_file_name
                         );
    }

    return $mtl_ARR;
}

//==========================================================================================================================================





?>