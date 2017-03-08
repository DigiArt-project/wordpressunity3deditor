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

function wpunity_create_guids($objTypeSTR,$objID, $extra_id_material){

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

function wpunity_replace_unityfile_withAssets( $templateID, $sceneID, $jsonScene ){

    // This is where all content of the .unity scene is stored
    //$unity_file_contents = "";

    // Get the static parts of unity depending on the scene type
    //$unity_file_contents = wpunity_replace_unityfile($templateID, $sceneID);

    //$ini_scene_wonder_around_unity_pattern =

    $unity_file_contents = "%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!29 &1
OcclusionCullingSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_OcclusionBakeSettings:
    smallestOccluder: 5
    smallestHole: 0.25
    backfaceThreshold: 100
  m_SceneGUID: 00000000000000000000000000000000
  m_OcclusionCullingData: {fileID: 0}
--- !u!104 &2
RenderSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 7
  m_Fog: 0
  m_FogColor: {r: 0.5, g: 0.5, b: 0.5, a: 1}
  m_FogMode: 3
  m_FogDensity: 0.01
  m_LinearFogStart: 0
  m_LinearFogEnd: 300
  m_AmbientSkyColor: {r: 0.212, g: 0.227, b: 0.259, a: 1}
  m_AmbientEquatorColor: {r: 0.114, g: 0.125, b: 0.133, a: 1}
  m_AmbientGroundColor: {r: 0.047, g: 0.043, b: 0.035, a: 1}
  m_AmbientIntensity: 1
  m_AmbientMode: 0
  m_SkyboxMaterial: {fileID: 10304, guid: 0000000000000000f000000000000000, type: 0}
  m_HaloStrength: 0.5
  m_FlareStrength: 1
  m_FlareFadeSpeed: 3
  m_HaloTexture: {fileID: 0}
  m_SpotCookie: {fileID: 10001, guid: 0000000000000000e000000000000000, type: 0}
  m_DefaultReflectionMode: 0
  m_DefaultReflectionResolution: 128
  m_ReflectionBounces: 1
  m_ReflectionIntensity: 1
  m_CustomReflection: {fileID: 0}
  m_Sun: {fileID: 0}
  m_IndirectSpecularColor: {r: 0.44657844, g: 0.49641222, b: 0.57481694, a: 1}
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 7
  m_GIWorkflowMode: 0
  m_GISettings:
    serializedVersion: 2
    m_BounceScale: 1
    m_IndirectOutputScale: 1
    m_AlbedoBoost: 1
    m_TemporalCoherenceThreshold: 1
    m_EnvironmentLightingMode: 0
    m_EnableBakedLightmaps: 1
    m_EnableRealtimeLightmaps: 1
  m_LightmapEditorSettings:
    serializedVersion: 4
    m_Resolution: 2
    m_BakeResolution: 40
    m_TextureWidth: 1024
    m_TextureHeight: 1024
    m_AO: 0
    m_AOMaxDistance: 1
    m_CompAOExponent: 1
    m_CompAOExponentDirect: 0
    m_Padding: 2
    m_LightmapParameters: {fileID: 0}
    m_LightmapsBakeMode: 1
    m_TextureCompression: 1
    m_DirectLightInLightProbes: 1
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
  m_LightingDataAsset: {fileID: 0}
  m_RuntimeCPUUsage: 25
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 7
  m_GIWorkflowMode: 0
  m_GISettings:
    serializedVersion: 2
    m_BounceScale: 1
    m_IndirectOutputScale: 1
    m_AlbedoBoost: 1
    m_TemporalCoherenceThreshold: 1
    m_EnvironmentLightingMode: 0
    m_EnableBakedLightmaps: 1
    m_EnableRealtimeLightmaps: 1
  m_LightmapEditorSettings:
    serializedVersion: 4
    m_Resolution: 2
    m_BakeResolution: 40
    m_TextureWidth: 1024
    m_TextureHeight: 1024
    m_AO: 0
    m_AOMaxDistance: 1
    m_CompAOExponent: 1
    m_CompAOExponentDirect: 0
    m_Padding: 2
    m_LightmapParameters: {fileID: 0}
    m_LightmapsBakeMode: 1
    m_TextureCompression: 1
    m_DirectLightInLightProbes: 1
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
  m_LightingDataAsset: {fileID: 0}
  m_RuntimeCPUUsage: 25
--- !u!196 &4
NavMeshSettings:
  serializedVersion: 2
  m_ObjectHideFlags: 0
  m_BuildSettings:
    serializedVersion: 2
    agentTypeID: 0
    agentRadius: 0.5
    agentHeight: 2
    agentSlope: 45
    agentClimb: 0.4
    ledgeDropHeight: 0
    maxJumpAcrossDistance: 0
    minRegionArea: 2
    manualCellSize: 0
    cellSize: 0.16666667
    accuratePlacement: 0
  m_NavMeshData: {fileID: 0}
--- !u!1 &5
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 7}
  - component: {fileID: 6}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &6
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 5}
  m_Enabled: 1
  serializedVersion: 7
  m_Type: 1
  m_Color: {r: 1, g: 0.95686275, b: 0.8392157, a: 1}
  m_Intensity: 1
  m_Range: 10
  m_SpotAngle: 30
  m_CookieSize: 10
  m_Shadows:
    m_Type: 2
    m_Resolution: -1
    m_CustomResolution: -1
    m_Strength: 1
    m_Bias: 0.05
    m_NormalBias: 0.4
    m_NearPlane: 0.2
  m_Cookie: {fileID: 0}
  m_DrawHalo: 0
  m_Flare: {fileID: 0}
  m_RenderMode: 0
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_Lightmapping: 4
  m_AreaSize: {x: 1, y: 1}
  m_BounceIntensity: 1
  m_ShadowRadius: 0
  m_ShadowAngle: 0
--- !u!4 &7
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 5}
  m_LocalRotation: {x: 0.40821788, y: -0.23456968, z: 0.10938163, w: 0.8754261}
  m_LocalPosition: {x: 0, y: 3, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 50, y: -30, z: 0}
";


    // Get the patterns for the changing gameobjects
    $tempFirstPersonPart =                      //get_post_meta( $templateID, 'wpunity_yamltemp_scene_fps', true );
        "--- !u!1001 &___[player_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalPosition.x
      value: ___[avatar_position_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalPosition.y
      value: ___[avatar_position_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalPosition.z
      value: ___[avatar_position_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.x
      value: ___[avatar_rotation_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.y
      value: ___[avatar_position_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.z
      value: ___[avatar_position_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 8200000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: spreadCustomCurve.m_RotationOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_Name
      value: ___[player_name]___
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_TagString
      value: Untagged
      objectReference: {fileID: 0}
    - target: {fileID: 5400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_IsKinematic
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
  m_IsPrefabParent: 0
";




    $templatePart_sop = //get_post_meta( $templateID, 'wpunity_yamltemp_scene_sop', true );
    "--- !u!1 &___[sop_fid]___ stripped
GameObject:
  m_PrefabParentObject: {fileID: 100000, guid: ___[sop_guid]___, type: 3}
  m_PrefabInternal: {fileID: ___[sop_prefab_fid]___}
--- !u!64 &___[sop_meshcol_fid]___
MeshCollider:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[sop_fid]___}
  m_Material: {fileID: 0}
  m_IsTrigger: 0
  m_Enabled: 1
  serializedVersion: 2
  m_Convex: 0
  m_InflateMesh: 0
  m_SkinWidth: 0.01
  m_Mesh: {fileID: 4300000, guid: ___[sop_guid]___, type: 3}
--- !u!1001 &___[sop_prefab_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[sop_pos_x]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[sop_pos_y]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[sop_pos_z]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[sop_rot_x]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[sop_rot_y]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[sop_rot_z]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_RootOrder
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_TagString
      value: Untagged
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_StaticEditorFlags
      value: 0
    - target: {fileID: 100000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_StaticEditorFlags
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalScale.x
      value: ___[sop_scale_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalScale.y
      value: ___[sop_scale_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalScale.z
      value: ___[sop_scale_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_Name
      value: ___[sop_name]___
      objectReference: {fileID: 0}      
    - target: {fileID: 2300000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_Materials.Array.data[0]
      value:
      objectReference: {fileID: 2100000, guid: ___[sop_material_guid]___, type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[sop_guid]___, type: 3}
  m_IsPrefabParent: 0
";









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
                                                    '___[avatar_position_x]___',
                                                    '___[avatar_position_y]___',
                                                    '___[avatar_position_z]___',
                                                    '___[avatar_rotation_x]___',
                                                    '___[avatar_rotation_y]___',
                                                    '___[avatar_rotation_z]___'],
                                        [   'Player',
                                            $curr_fid,
                                            $value['position'][0],
                                            $value['position'][1],
                                            $value['position'][2],
                                            $value['rotation'][0],
                                            $value['rotation'][1],
                                            $value['rotation'][2]],
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