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

function wpunity_assets_create_metafile($post_id, $attachment_ID){

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
            $fileData = wpunity_replace_objmeta($templatePart, $attachment_ID);
            fwrite($create_file, $fileData);
            fclose($create_file);
        }elseif($attachment_type['ext'] == 'mtl') {

            $mat_yaml_pattern = "%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!21 &2100000
Material:
  serializedVersion: 6
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_Name: ___[material_name]___
  m_Shader: {fileID: 46, guid: 0000000000000000f000000000000000, type: 0}
  m_ShaderKeywords: 
  m_LightmapFlags: 5
  m_CustomRenderQueue: -1
  stringTagMap: {}
  m_SavedProperties:
    serializedVersion: 2
    m_TexEnvs:
    - first:
        name: _BumpMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _DetailAlbedoMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _DetailMask
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _DetailNormalMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _EmissionMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _MainTex
      second:
        m_Texture: {fileID: 0___[jpg_texture_guid]___}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _MetallicGlossMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _OcclusionMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _ParallaxMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    m_Floats:
    - first:
        name: _BumpScale
      second: 1
    - first:
        name: _Cutoff
      second: 0.5
    - first:
        name: _DetailNormalMapScale
      second: 1
    - first:
        name: _DstBlend
      second: 0
    - first:
        name: _GlossMapScale
      second: 1
    - first:
        name: _Glossiness
      second: 0.5
    - first:
        name: _GlossyReflections
      second: 1
    - first:
        name: _Metallic
      second: 0
    - first:
        name: _Mode
      second: 0
    - first:
        name: _OcclusionStrength
      second: 1
    - first:
        name: _Parallax
      second: 0.02
    - first:
        name: _SmoothnessTextureChannel
      second: 0
    - first:
        name: _SpecularHighlights
      second: 1
    - first:
        name: _SrcBlend
      second: 1
    - first:
        name: _UVSec
      second: 0
    - first:
        name: _ZWrite
      second: 1
    m_Colors:
    - first:
        name: _Color
      second: {r: ___[color_r]___, g: ___[color_g]___, b: ___[color_b]___, a: ___[color_a]___}
    - first:
        name: _EmissionColor
      second: {r: 0, g: 0, b: 0, a: 1}
";

$meta_mat_pattern = "fileFormatVersion: 2
guid: ___[meta_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
NativeFormatImporter:
  userData: 
  assetBundleName: 
  assetBundleVariant: 
";

            $mtl_content = file_get_contents($attachment_url);

            $mtl_arr = wpunity_parse_mtl_php($mtl_content);

            // MTL to several MAT and META: for each material in the mtl file make a mat and a meta file
            for ($iMaterial =0; $iMaterial < count($mtl_arr); $iMaterial ++ ){

                // 1. open a .mat file named as the name of the material
                $file_mat = fopen($upload_dir . '/' . $assetPath . '/' . $mtl_arr[$iMaterial]['materialName'] . '.mat', "w") or die("Unable to open file!");
                //$create_file = fopen($upload_dir . '/' . $assetPath . '/' . $attachment_title . '.mat', "w") or die("Unable to open file!");

                // get mat pattern
                //$templatePart = get_post_meta( $yampl_temp_id, 'wpunity_yamltemp_scene_matp', true );
                //$fileData = wpunity_replace_mat($templatePart,$attachment_ID);


                // Create .mat
                $mat_file_content = str_replace([
                                                "___[material_name]___",
                                                "___[jpg_texture_guid]___",
                                                "___[color_r]___", "___[color_g]___",  "___[color_b]___", "___[color_a]___"],
                                            [
                        $mtl_arr[$iMaterial]['materialName'],
                        // if textureFileName is empty then put empty else find the guid of e.g. floor.jpg texture
                        $mtl_arr[$iMaterial]['textureFileName']==""?"": ", guid: " . wpunity_create_guids('jpg', $post_id, $iMaterial) . ", type: 3", // find_guid_of( $mtl_arr[$iMaterial]['textureFileName'])
                        $mtl_arr[$iMaterial]['color_r'],
                        $mtl_arr[$iMaterial]['color_g'],
                        $mtl_arr[$iMaterial]['color_b'],
                        $mtl_arr[$iMaterial]['color_a']
                    ],
                    $mat_yaml_pattern);


                fwrite($file_mat, $mat_file_content);
                fclose($file_mat);


                // Create .meta
                $file_mat_meta = fopen($upload_dir . '/' . $assetPath . '/' . $mtl_arr[$iMaterial]['materialName'] . '.mat.meta', "w") or die("Unable to open file!");

                //$templatePart2 = get_post_meta( $yampl_temp_id, 'wpunity_yamltemp_scene_mdp', true );
                //$fileData2 = wpunity_replace_matmeta($templatePart2,$attachment_ID);

                $meta_of_mat_filled = str_replace( [
                                                    "___[meta_guid]___",
                                                    "___[unx_time_created]___"
                                                   ],
                                                   [
                                                    wpunity_create_guids('mat', $post_id, $iMaterial), // $post_id or $attachment_ID ?
                                                    time()
                                                   ],
                                                 $meta_mat_pattern);

                fwrite($file_mat_meta, $meta_of_mat_filled);
                fclose($file_mat_meta);
            }
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

function wpunity_create_guids($objTypeSTR, $objID, $extra_id_material=null){

    switch ($objTypeSTR) {
        case 'unity':  $objType = "1"; break;
        case 'folder': $objType = "2"; break;
        case 'obj': $objType = "3"; break;
        case 'mat': $objType = "4".$extra_id_material; break; // an obj can have two or more mat
        case 'jpg': $objType = "5".$extra_id_material; break; // an obj can have multiple textures jpg
    }

    return str_pad($objType, 3, "0", STR_PAD_LEFT) . str_pad($objID, 8, "0", STR_PAD_LEFT);
}


function wpunity_replace_unityfile($templateID,$sceneID){

    $tempOcclusionPart = get_post_meta( $templateID, 'wpunity_yamltemp_scene_ocs', true );
    $tempRenderPart = get_post_meta( $templateID, 'wpunity_yamltemp_scene_rs', true );
    $tempLightMapPart = get_post_meta( $templateID, 'wpunity_yamltemp_scene_lms', true );
    $tempNavMeshPart = get_post_meta( $templateID, 'wpunity_yamltemp_scene_nms', true );
    $tempLightPart = get_post_meta( $templateID, 'wpunity_yamltemp_scene_light', true );

    $unity_file_contents = $tempOcclusionPart . $tempRenderPart . $tempLightMapPart . $tempNavMeshPart . $tempLightPart;
    return $unity_file_contents;

}

function wpunity_replace_unityMetafile($templateID,$sceneID){

    return '';

}

function wpunity_replace_unityMetafile_withAssets( $templateID, $sceneID, $jsonScene ){}

function wpunity_replace_unityfile_withAssets( $templateID, $sceneID, $jsonScene ){

    // How we get this variables : wp_get_tax() ?
    global $ini_scene_wonder_around_unity_pattern,$ini_scene_sop;

    $tempFirstPersonPart = $ini_scene_wonder_around_unity_pattern[0];
    $templatePart_sop = $ini_scene_sop[0];

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

function wpunity_replace_mat($file_content, $objID){
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