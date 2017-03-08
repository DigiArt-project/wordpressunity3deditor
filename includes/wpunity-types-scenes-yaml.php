<?php

global $ini_scene_wonder_around_unity_pattern,$ini_scene_sop,$ini_scene_dop,$ini_scene_doorp,$ini_scene_poi;
global $ini_scene_main_menu_unity_pattern,$ini_scene_allmenu_cs;
global $ini_scene_credentials_unity_pattern;
global $ini_scene_odp,$ini_scene_mdp,$ini_scene_jdp,$ini_scene_jpg_sprite_pattern,$ini_scene_unity_meta_pattern;


$ini_scene_wonder_around_unity_pattern = array('%YAML 1.1
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
--- !u!1001 &___[player_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalPosition.x
      value: ___[player_position_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalPosition.y
      value: ___[player_position_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalPosition.z
      value: ___[player_position_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.x
      value: ___[player_rotation_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.y
      value: ___[player_rotation_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.z
      value: ___[player_rotation_z]___
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
');

// Static 3D object pattern
$ini_scene_sop = array('--- !u!1 &___[sop_fid]___ stripped
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
      value: ___[sop_pos_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[sop_pos_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[sop_pos_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[sop_rot_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[sop_rot_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[sop_rot_z]___
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
');



$ini_scene_dop = array('--- !u!1 &___[dop_fid]___ stripped
GameObject:
  m_PrefabParentObject: {fileID: 100000, guid: ___[dop_guid]___, type: 3}
  m_PrefabInternal: {fileID: ___[dop_prefab_fid]___}
--- !u!54 &___[dop_rigibody_fid]___
Rigidbody:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[dop_fid]___}
  serializedVersion: 2
  m_Mass: 0.1
  m_Drag: 0
  m_AngularDrag: 0.05
  m_UseGravity: 1
  m_IsKinematic: 0
  m_Interpolate: 0
  m_Constraints: 0
  m_CollisionDetection: 0
--- !u!65 &___[dop_boxcol_fid]___
BoxCollider:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[dop_fid]___}
  m_Material: {fileID: 0}
  m_IsTrigger: 0
  m_Enabled: 1
  serializedVersion: 2
  m_Size: {x: ___[dop_boxcol_size_x]___, y: ___[dop_boxcol_size_y]___, z: ___[dop_boxcol_size_z]___}
  m_Center: {x: 0, y: 0, z: 0}
--- !u!1001 &___[dop_prefab_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[dop_pos_x]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[dop_pos_y]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[dop_pos_z]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[dop_rot_x]____
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_TagString
      value: Untagged
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalScale.x
      value: ___[dop_scale_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalScale.y
      value: ___[dop_scale_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[dop_guid]___, type: 3}
      propertyPath: m_LocalScale.z
      value: ___[dop_scale_z]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[dop_guid]___, type: 3}
  m_IsPrefabParent: 0
');
$ini_scene_doorp = array('--- !u!1 &___[door_fid]___ stripped
GameObject:
  m_PrefabParentObject: {fileID: 100000, guid: ___[door_guid]___, type: 3}
  m_PrefabInternal: {fileID: ___[door_prefab_fid]___}
--- !u!114 &___[door_script_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[door_fid]___}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: ___[door_script_guid]___, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!65 &___[door_boxcol_fid]___
BoxCollider:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[door_fid]___}
  m_Material: {fileID: 0}
  m_IsTrigger: 1
  m_Enabled: 1
  serializedVersion: 2
  m_Size: {x: ___[door_boxcol_size_x]___, y: ___[door_boxcol_size_y]___, z: ___[door_boxcol_size_z]___}
  m_Center: {x: 0, y: 0, z: 0}
--- !u!1001 &___[door_prefab_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: ___[door_guid]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[door_pos_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[door_guid]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[door_pos_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[door_guid]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[door_pos_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[door_guid]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[door_rotation_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[door_guid]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[door_rotation_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[door_guid]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[door_rotation_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[door_guid]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[door_guid]___, type: 3}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: ___[door_guid]___, type: 3}
      propertyPath: m_TagString
      value: Untagged
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[door_guid]___, type: 3}
  m_IsPrefabParent: 0
');
$ini_scene_poip = array('--- !u!1001 &___[poi_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: ___[poi_guid]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[poi_pos_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poi_guid]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[poi_pos_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poi_guid]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[poi_pos_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poi_guid]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[poi_rotation_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poi_guid]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[poi_rotation_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poi_guid]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[poi_rotation_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poi_guid]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poi_guid]___, type: 3}
      propertyPath: m_RootOrder
      value: 3
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: ___[poi_guid]___, type: 3}
      propertyPath: m_TagString
      value: Untagged
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[poi_guid]___, type: 3}
  m_IsPrefabParent: 0
');
$ini_scene_main_menu_unity_pattern = array('%YAML 1.1
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
--- !u!1 &329563168
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 329563170}
  - component: {fileID: 329563169}
  m_Layer: 0
  m_Name: doorIntent
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &329563169
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 329563168}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: be36a6317ad0ef84289bcb9d54042ee8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  doorID:
--- !u!4 &329563170
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 329563168}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &720184960
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 720184965}
  - component: {fileID: 720184964}
  - component: {fileID: 720184963}
  - component: {fileID: 720184962}
  - component: {fileID: 720184961}
  m_Layer: 5
  m_Name: Canvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &720184961
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 720184960}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 939bc54096dabc54fa51501482013178, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!114 &720184962
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 720184960}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1301386320, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_IgnoreReversedGraphics: 1
  m_BlockingObjects: 0
  m_BlockingMask:
    serializedVersion: 2
    m_Bits: 4294967295
--- !u!114 &720184963
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 720184960}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 0
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 800, y: 600}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &720184964
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 720184960}
  m_Enabled: 1
  serializedVersion: 2
  m_RenderMode: 0
  m_Camera: {fileID: 1205475318}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &720184965
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 720184960}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1086227003}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!1 &945108998
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 945108999}
  - component: {fileID: 945109001}
  - component: {fileID: 945109000}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &945108999
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 945108998}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1451106122}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &945109000
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 945108998}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 32
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 3
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Credentials
--- !u!222 &945109001
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 945108998}
--- !u!1 &994924437
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 994924439}
  - component: {fileID: 994924438}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &994924438
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 994924437}
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
--- !u!4 &994924439
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 994924437}
  m_LocalRotation: {x: 0.40821788, y: -0.23456968, z: 0.10938163, w: 0.8754261}
  m_LocalPosition: {x: 2293, y: 1378, z: 3216}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 50, y: -30, z: 0}
--- !u!1 &1086227002
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1086227003}
  - component: {fileID: 1086227005}
  - component: {fileID: 1086227004}
  m_Layer: 5
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1086227003
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1086227002}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1922516440}
  - {fileID: 2137109186}
  - {fileID: 1451106122}
  m_Father: {fileID: 720184965}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 1920, y: 1080}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1086227004
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1086227002}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 10754, guid: 0000000000000000f000000000000000, type: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 0
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: ___[main_menu_sprite_guid]___, type: 3}
  m_Type: 0
  m_PreserveAspect: 1
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1086227005
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1086227002}
--- !u!1 &1205475314
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1205475319}
  - component: {fileID: 1205475318}
  - component: {fileID: 1205475317}
  - component: {fileID: 1205475316}
  - component: {fileID: 1205475315}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &1205475315
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1205475314}
  m_Enabled: 1
--- !u!124 &1205475316
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1205475314}
  m_Enabled: 1
--- !u!92 &1205475317
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1205475314}
  m_Enabled: 1
--- !u!20 &1205475318
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1205475314}
  m_Enabled: 1
  serializedVersion: 2
  m_ClearFlags: 2
  m_BackGroundColor: {r: 1, g: 1, b: 1, a: 0}
  m_NormalizedViewPortRect:
    serializedVersion: 2
    x: 0
    y: 0
    width: 1
    height: 1
  near clip plane: 0.3
  far clip plane: 1000
  field of view: 60
  orthographic: 0
  orthographic size: 5
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: -1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
  m_StereoMirrorMode: 0
--- !u!4 &1205475319
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1205475314}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 1108, y: 160, z: -647}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &1451106121
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1451106122}
  - component: {fileID: 1451106125}
  - component: {fileID: 1451106124}
  - component: {fileID: 1451106123}
  m_Layer: 5
  m_Name: showCreds_bt
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1451106122
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1451106121}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 945108999}
  m_Father: {fileID: 1086227003}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: -363}
  m_SizeDelta: {x: 240, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1451106123
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1451106121}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1392445389, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Navigation:
    m_Mode: 3
    m_SelectOnUp: {fileID: 0}
    m_SelectOnDown: {fileID: 0}
    m_SelectOnLeft: {fileID: 0}
    m_SelectOnRight: {fileID: 0}
  m_Transition: 1
  m_Colors:
    m_NormalColor: {r: 1, g: 1, b: 1, a: 1}
    m_HighlightedColor: {r: 0.9607843, g: 0.9607843, b: 0.9607843, a: 1}
    m_PressedColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 1}
    m_DisabledColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 0.5019608}
    m_ColorMultiplier: 1
    m_FadeDuration: 0.1
  m_SpriteState:
    m_HighlightedSprite: {fileID: 0}
    m_PressedSprite: {fileID: 0}
    m_DisabledSprite: {fileID: 0}
  m_AnimationTriggers:
    m_NormalTrigger: Normal
    m_HighlightedTrigger: Highlighted
    m_PressedTrigger: Pressed
    m_DisabledTrigger: Disabled
  m_Interactable: 1
  m_TargetGraphic: {fileID: 1451106124}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 720184961}
        m_MethodName: onClick_LoadCredsScene
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &1451106124
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1451106121}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10905, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1451106125
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1451106121}
--- !u!1 &1473030909
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1473030912}
  - component: {fileID: 1473030911}
  - component: {fileID: 1473030910}
  m_Layer: 0
  m_Name: EventSystem_Main
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1473030910
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1473030909}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1077351063, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_HorizontalAxis: Horizontal
  m_VerticalAxis: Vertical
  m_SubmitButton: Submit
  m_CancelButton: Cancel
  m_InputActionsPerSecond: 10
  m_RepeatDelay: 0.5
  m_ForceModuleActive: 0
--- !u!114 &1473030911
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1473030909}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &1473030912
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1473030909}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &1571546415
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1571546416}
  - component: {fileID: 1571546418}
  - component: {fileID: 1571546417}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1571546416
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1571546415}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 2137109186}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1571546417
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1571546415}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 32
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 3
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Exit Game
--- !u!222 &1571546418
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1571546415}
--- !u!1 &1820509139
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1820509140}
  - component: {fileID: 1820509142}
  - component: {fileID: 1820509141}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1820509140
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1820509139}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1922516440}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1820509141
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1820509139}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 32
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 2
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Start Game
--- !u!222 &1820509142
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1820509139}
--- !u!1 &1922516439
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1922516440}
  - component: {fileID: 1922516443}
  - component: {fileID: 1922516442}
  - component: {fileID: 1922516441}
  m_Layer: 5
  m_Name: startGame_bt
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1922516440
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1922516439}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1820509140}
  m_Father: {fileID: 1086227003}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: -130}
  m_SizeDelta: {x: 240, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1922516441
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1922516439}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1392445389, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Navigation:
    m_Mode: 3
    m_SelectOnUp: {fileID: 0}
    m_SelectOnDown: {fileID: 0}
    m_SelectOnLeft: {fileID: 0}
    m_SelectOnRight: {fileID: 0}
  m_Transition: 1
  m_Colors:
    m_NormalColor: {r: 1, g: 1, b: 1, a: 1}
    m_HighlightedColor: {r: 0.9607843, g: 0.9607843, b: 0.9607843, a: 1}
    m_PressedColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 1}
    m_DisabledColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 0.5019608}
    m_ColorMultiplier: 1
    m_FadeDuration: 0.1
  m_SpriteState:
    m_HighlightedSprite: {fileID: 0}
    m_PressedSprite: {fileID: 0}
    m_DisabledSprite: {fileID: 0}
  m_AnimationTriggers:
    m_NormalTrigger: Normal
    m_HighlightedTrigger: Highlighted
    m_PressedTrigger: Pressed
    m_DisabledTrigger: Disabled
  m_Interactable: 1
  m_TargetGraphic: {fileID: 1922516442}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 720184961}
        m_MethodName: onClick_StartGame
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &1922516442
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1922516439}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10905, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1922516443
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1922516439}
--- !u!1 &2137109185
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2137109186}
  - component: {fileID: 2137109189}
  - component: {fileID: 2137109188}
  - component: {fileID: 2137109187}
  m_Layer: 5
  m_Name: exitGame_bt
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2137109186
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2137109185}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1571546416}
  m_Father: {fileID: 1086227003}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: -248}
  m_SizeDelta: {x: 240, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &2137109187
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2137109185}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1392445389, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Navigation:
    m_Mode: 3
    m_SelectOnUp: {fileID: 0}
    m_SelectOnDown: {fileID: 0}
    m_SelectOnLeft: {fileID: 0}
    m_SelectOnRight: {fileID: 0}
  m_Transition: 1
  m_Colors:
    m_NormalColor: {r: 1, g: 1, b: 1, a: 1}
    m_HighlightedColor: {r: 0.9607843, g: 0.9607843, b: 0.9607843, a: 1}
    m_PressedColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 1}
    m_DisabledColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 0.5019608}
    m_ColorMultiplier: 1
    m_FadeDuration: 0.1
  m_SpriteState:
    m_HighlightedSprite: {fileID: 0}
    m_PressedSprite: {fileID: 0}
    m_DisabledSprite: {fileID: 0}
  m_AnimationTriggers:
    m_NormalTrigger: Normal
    m_HighlightedTrigger: Highlighted
    m_PressedTrigger: Pressed
    m_DisabledTrigger: Disabled
  m_Interactable: 1
  m_TargetGraphic: {fileID: 2137109188}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 720184961}
        m_MethodName: onClick_ExitGame
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &2137109188
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2137109185}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10905, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &2137109189
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2137109185}
');
$ini_scene_allmenu_cs = array('using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class all_menu_Script : MonoBehaviour {

	public void onClick_StartGame(){
		SceneManager.LoadScene("___[initialwonderaround_scene_basename]___");
	}

	public void onClick_LoadCredsScene(){
		SceneManager.LoadScene("___[credentials_scene_basename]___");
	}


	public void onClick_LoadMainMenuScene(){
		SceneManager.LoadScene("___[mainmenu_scene_basename]___");

	}

	public void onClick_ExitGame(){
		Application.Quit ();
	}
}
');
$ini_scene_credentials_unity_pattern = array('%YAML 1.1
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
--- !u!1 &145690275
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 145690276}
  - component: {fileID: 145690278}
  - component: {fileID: 145690277}
  m_Layer: 5
  m_Name: credentials_text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &145690276
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 145690275}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1669187671}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -325, y: -222}
  m_SizeDelta: {x: 1118, y: 443}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &145690277
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 145690275}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 32
    m_FontStyle: 1
    m_BestFit: 0
    m_MinSize: 1
    m_MaxSize: 40
    m_Alignment: 1
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: ___[credentials_text]___
--- !u!222 &145690278
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 145690275}
--- !u!1 &216367114
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 216367116}
  - component: {fileID: 216367115}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &216367115
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 216367114}
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
--- !u!4 &216367116
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 216367114}
  m_LocalRotation: {x: 0.40821788, y: -0.23456968, z: 0.10938163, w: 0.8754261}
  m_LocalPosition: {x: 0, y: 3, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 50, y: -30, z: 0}
--- !u!1 &299379091
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 299379096}
  - component: {fileID: 299379095}
  - component: {fileID: 299379094}
  - component: {fileID: 299379093}
  - component: {fileID: 299379092}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &299379092
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 299379091}
  m_Enabled: 1
--- !u!124 &299379093
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 299379091}
  m_Enabled: 1
--- !u!92 &299379094
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 299379091}
  m_Enabled: 1
--- !u!20 &299379095
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 299379091}
  m_Enabled: 1
  serializedVersion: 2
  m_ClearFlags: 1
  m_BackGroundColor: {r: 0.19215687, g: 0.3019608, b: 0.4745098, a: 0}
  m_NormalizedViewPortRect:
    serializedVersion: 2
    x: 0
    y: 0
    width: 1
    height: 1
  near clip plane: 0.3
  far clip plane: 1000
  field of view: 60
  orthographic: 0
  orthographic size: 5
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: -1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
  m_StereoMirrorMode: 0
--- !u!4 &299379096
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 299379091}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 1, z: -10}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &314633908
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 314633911}
  - component: {fileID: 314633910}
  - component: {fileID: 314633909}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &314633909
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 314633908}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1077351063, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_HorizontalAxis: Horizontal
  m_VerticalAxis: Vertical
  m_SubmitButton: Submit
  m_CancelButton: Cancel
  m_InputActionsPerSecond: 10
  m_RepeatDelay: 0.5
  m_ForceModuleActive: 0
--- !u!114 &314633910
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 314633908}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &314633911
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 314633908}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &591774188
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 591774189}
  - component: {fileID: 591774191}
  - component: {fileID: 591774190}
  m_Layer: 5
  m_Name: credentials_photo
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &591774189
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 591774188}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1669187671}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -9, y: 241}
  m_SizeDelta: {x: 1796, y: 408}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &591774190
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 591774188}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 10754, guid: 0000000000000000f000000000000000, type: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: ___[credentials_photo_image_sprite]___, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &591774191
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 591774188}
--- !u!1 &594415847
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 594415851}
  - component: {fileID: 594415850}
  - component: {fileID: 594415849}
  - component: {fileID: 594415848}
  - component: {fileID: 594415852}
  m_Layer: 5
  m_Name: Canvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &594415848
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 594415847}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1301386320, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_IgnoreReversedGraphics: 1
  m_BlockingObjects: 0
  m_BlockingMask:
    serializedVersion: 2
    m_Bits: 4294967295
--- !u!114 &594415849
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 594415847}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 0
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 800, y: 600}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &594415850
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 594415847}
  m_Enabled: 1
  serializedVersion: 2
  m_RenderMode: 0
  m_Camera: {fileID: 0}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &594415851
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 594415847}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1669187671}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!114 &594415852
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 594415847}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 939bc54096dabc54fa51501482013178, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!1 &897430923
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 897430924}
  - component: {fileID: 897430926}
  - component: {fileID: 897430925}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &897430924
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 897430923}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1108829873}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &897430925
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 897430923}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 42
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 4
    m_MaxSize: 42
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Go Back
--- !u!222 &897430926
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 897430923}
--- !u!1 &1108829872
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1108829873}
  - component: {fileID: 1108829876}
  - component: {fileID: 1108829875}
  - component: {fileID: 1108829874}
  m_Layer: 5
  m_Name: s_cred_back_to_menu
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1108829873
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1108829872}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 897430924}
  m_Father: {fileID: 1669187671}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: -457}
  m_SizeDelta: {x: 226, y: 64}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1108829874
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1108829872}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1392445389, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Navigation:
    m_Mode: 3
    m_SelectOnUp: {fileID: 0}
    m_SelectOnDown: {fileID: 0}
    m_SelectOnLeft: {fileID: 0}
    m_SelectOnRight: {fileID: 0}
  m_Transition: 1
  m_Colors:
    m_NormalColor: {r: 0.7647059, g: 0.7647059, b: 0.7647059, a: 1}
    m_HighlightedColor: {r: 0.9607843, g: 0.9607843, b: 0.9607843, a: 1}
    m_PressedColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 1}
    m_DisabledColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 0.5019608}
    m_ColorMultiplier: 1
    m_FadeDuration: 0.1
  m_SpriteState:
    m_HighlightedSprite: {fileID: 0}
    m_PressedSprite: {fileID: 0}
    m_DisabledSprite: {fileID: 0}
  m_AnimationTriggers:
    m_NormalTrigger: Normal
    m_HighlightedTrigger: Highlighted
    m_PressedTrigger: Pressed
    m_DisabledTrigger: Disabled
  m_Interactable: 1
  m_TargetGraphic: {fileID: 1108829875}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 594415852}
        m_MethodName: onClick_LoadMainMenuScene
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &1108829875
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1108829872}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10905, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1108829876
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1108829872}
--- !u!1 &1669187670
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1669187671}
  - component: {fileID: 1669187673}
  - component: {fileID: 1669187672}
  m_Layer: 5
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1669187671
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1669187670}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 145690276}
  - {fileID: 591774189}
  - {fileID: 1804000571}
  - {fileID: 1108829873}
  m_Father: {fileID: 594415851}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 1920, y: 1080}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1669187672
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1669187670}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10905, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1669187673
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1669187670}
--- !u!1 &1804000570
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1804000571}
  - component: {fileID: 1804000573}
  - component: {fileID: 1804000572}
  m_Layer: 5
  m_Name: credentials_logo
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1804000571
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1804000570}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1669187671}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 643, y: -235}
  m_SizeDelta: {x: 431, y: 295}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1804000572
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1804000570}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 10754, guid: 0000000000000000f000000000000000, type: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: ___[credentials_logo_image_sprite]___, type: 3}
  m_Type: 0
  m_PreserveAspect: 1
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1804000573
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1804000570}
');
$ini_scene_odp = array('fileFormatVersion: 2
guid: ___[obj_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
ModelImporter:
  serializedVersion: 19
  fileIDToRecycleName:
    100000: default
    100002: //RootNode
    400000: default
    400002: //RootNode
    2300000: default
    3300000: default
    4300000: default
  materials:
    importMaterials: 1
    materialName: 2
    materialSearch: 2
  animations:
    legacyGenerateAnimations: 4
    bakeSimulation: 0
    resampleCurves: 1
    optimizeGameObjects: 0
    motionNodeName:
    animationImportErrors:
    animationImportWarnings:
    animationRetargetingWarnings:
    animationDoRetargetingWarnings: 0
    animationCompression: 1
    animationRotationError: 0.5
    animationPositionError: 0.5
    animationScaleError: 0.5
    animationWrapMode: 0
    extraExposedTransformPaths: []
    clipAnimations: []
    isReadable: 1
  meshes:
    lODScreenPercentages: []
    globalScale: 1
    meshCompression: 0
    addColliders: 0
    importBlendShapes: 1
    swapUVChannels: 0
    generateSecondaryUV: 0
    useFileUnits: 1
    optimizeMeshForGPU: 1
    keepQuads: 0
    weldVertices: 1
    secondaryUVAngleDistortion: 8
    secondaryUVAreaDistortion: 15.000001
    secondaryUVHardAngle: 88
    secondaryUVPackMargin: 4
    useFileScale: 1
  tangentSpace:
    normalSmoothAngle: 60
    normalImportMode: 0
    tangentImportMode: 3
  importAnimation: 1
  copyAvatar: 0
  humanDescription:
    serializedVersion: 2
    human: []
    skeleton: []
    armTwist: 0.5
    foreArmTwist: 0.5
    upperLegTwist: 0.5
    legTwist: 0.5
    armStretch: 0.05
    legStretch: 0.05
    feetSpacing: 0
    rootMotionBoneName:
    rootMotionBoneRotation: {x: 0, y: 0, z: 0, w: 1}
    hasTranslationDoF: 0
    hasExtraRoot: 0
    skeletonHasParents: 1
  lastHumanDescriptionAvatarSource: {instanceID: 0}
  animationType: 0
  humanoidOversampling: 1
  additionalBone: 0
  userData:
  assetBundleName:
  assetBundleVariant:
');
$ini_scene_mdp = array('fileFormatVersion: 2
guid: ___[mat_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
NativeFormatImporter:
  userData:
  assetBundleName:
  assetBundleVariant:
');
$ini_scene_jdp = array('fileFormatVersion: 2
guid: ___[jpg_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
TextureImporter:
  fileIDToRecycleName: {}
  serializedVersion: 4
  mipmaps:
    mipMapMode: 0
    enableMipMap: 1
    sRGBTexture: 1
    linearTexture: 0
    fadeOut: 0
    borderMipMap: 0
    mipMapFadeDistanceStart: 1
    mipMapFadeDistanceEnd: 3
  bumpmap:
    convertToNormalMap: 0
    externalNormalMap: 0
    heightScale: 0.25
    normalMapFilter: 0
  isReadable: 0
  grayScaleToAlpha: 0
  generateCubemap: 6
  cubemapConvolution: 0
  seamlessCubemap: 0
  textureFormat: 1
  maxTextureSize: 2048
  textureSettings:
    filterMode: -1
    aniso: -1
    mipBias: -1
    wrapMode: -1
  nPOTScale: 1
  lightmap: 0
  compressionQuality: 50
  spriteMode: 0
  spriteExtrude: 1
  spriteMeshType: 1
  alignment: 0
  spritePivot: {x: 0.5, y: 0.5}
  spriteBorder: {x: 0, y: 0, z: 0, w: 0}
  spritePixelsToUnits: 100
  alphaUsage: 1
  alphaIsTransparency: 0
  spriteTessellationDetail: -1
  textureType: 0
  textureShape: 1
  maxTextureSizeSet: 0
  compressionQualitySet: 0
  textureFormatSet: 0
  platformSettings:
  - buildTarget: DefaultTexturePlatform
    maxTextureSize: 2048
    textureFormat: -1
    textureCompression: 1
    compressionQuality: 50
    crunchedCompression: 0
    allowsAlphaSplitting: 0
    overridden: 0
  spriteSheet:
    serializedVersion: 2
    sprites: []
    outline: []
  spritePackingTag:
  userData:
  assetBundleName:
  assetBundleVariant:
');
$ini_scene_jpg_sprite_pattern = array('fileFormatVersion: 2
guid: ___[sprite_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
TextureImporter:
  fileIDToRecycleName: {}
  serializedVersion: 4
  mipmaps:
    mipMapMode: 0
    enableMipMap: 0
    sRGBTexture: 1
    linearTexture: 0
    fadeOut: 0
    borderMipMap: 0
    mipMapFadeDistanceStart: 1
    mipMapFadeDistanceEnd: 3
  bumpmap:
    convertToNormalMap: 0
    externalNormalMap: 0
    heightScale: 0.25
    normalMapFilter: 0
  isReadable: 0
  grayScaleToAlpha: 0
  generateCubemap: 6
  cubemapConvolution: 0
  seamlessCubemap: 0
  textureFormat: 1
  maxTextureSize: 2048
  textureSettings:
    filterMode: -1
    aniso: -1
    mipBias: -1
    wrapMode: 1
  nPOTScale: 0
  lightmap: 0
  compressionQuality: 50
  spriteMode: 1
  spriteExtrude: 1
  spriteMeshType: 1
  alignment: 0
  spritePivot: {x: 0.5, y: 0.5}
  spriteBorder: {x: 0, y: 0, z: 0, w: 0}
  spritePixelsToUnits: 100
  alphaUsage: 1
  alphaIsTransparency: 1
  spriteTessellationDetail: -1
  textureType: 8
  textureShape: 1
  maxTextureSizeSet: 0
  compressionQualitySet: 0
  textureFormatSet: 0
  platformSettings:
  - buildTarget: DefaultTexturePlatform
    maxTextureSize: 2048
    textureFormat: -1
    textureCompression: 1
    compressionQuality: 50
    crunchedCompression: 0
    allowsAlphaSplitting: 0
    overridden: 0
  - buildTarget: Standalone
    maxTextureSize: 2048
    textureFormat: -1
    textureCompression: 1
    compressionQuality: 50
    crunchedCompression: 0
    allowsAlphaSplitting: 0
    overridden: 0
  spriteSheet:
    serializedVersion: 2
    sprites: []
    outline: []
  spritePackingTag:
  userData:
  assetBundleName:
  assetBundleVariant:
');
$ini_scene_unity_meta_pattern = array('fileFormatVersion: 2
guid: ___[scene_unity_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
DefaultImporter:
  userData:
  assetBundleName:
  assetBundleVariant:
');
$ini_scene_options_unity_pattern = array('%YAML 1.1
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
--- !u!1 &195193099
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 195193100}
  - component: {fileID: 195193102}
  - component: {fileID: 195193101}
  m_Layer: 5
  m_Name: SettingsText
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &195193100
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 195193099}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 333697834}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 68.5, y: 359}
  m_SizeDelta: {x: 297, y: 79}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &195193101
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 195193099}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 60
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 3
    m_MaxSize: 60
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Settings
--- !u!222 &195193102
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 195193099}
--- !u!1 &333697833
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 333697834}
  - component: {fileID: 333697836}
  - component: {fileID: 333697835}
  m_Layer: 5
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &333697834
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 333697833}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 195193100}
  - {fileID: 1659825048}
  - {fileID: 898881097}
  - {fileID: 978808495}
  - {fileID: 566155407}
  - {fileID: 1048460748}
  m_Father: {fileID: 1363338592}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &333697835
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 333697833}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &333697836
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 333697833}
--- !u!1 &454479922
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 454479924}
  - component: {fileID: 454479923}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &454479923
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 454479922}
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
--- !u!4 &454479924
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 454479922}
  m_LocalRotation: {x: 0.40821788, y: -0.23456968, z: 0.10938163, w: 0.8754261}
  m_LocalPosition: {x: 0, y: 3, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 50, y: -30, z: 0}
--- !u!1 &526866756
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 526866757}
  - component: {fileID: 526866759}
  - component: {fileID: 526866758}
  m_Layer: 5
  m_Name: Background
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &526866757
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 526866756}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1411532454}
  m_Father: {fileID: 978808495}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 1}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: 10, y: -10}
  m_SizeDelta: {x: 20, y: 20}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &526866758
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 526866756}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10905, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &526866759
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 526866756}
--- !u!1 &566155406
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 566155407}
  - component: {fileID: 566155410}
  - component: {fileID: 566155409}
  - component: {fileID: 566155408}
  m_Layer: 5
  m_Name: InputOcculusHeightField
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &566155407
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 566155406}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1709838419}
  - {fileID: 925587410}
  m_Father: {fileID: 333697834}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 106}
  m_SizeDelta: {x: 80, y: 55}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &566155408
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 566155406}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 575553740, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Navigation:
    m_Mode: 3
    m_SelectOnUp: {fileID: 0}
    m_SelectOnDown: {fileID: 0}
    m_SelectOnLeft: {fileID: 0}
    m_SelectOnRight: {fileID: 0}
  m_Transition: 1
  m_Colors:
    m_NormalColor: {r: 1, g: 1, b: 1, a: 1}
    m_HighlightedColor: {r: 0.9607843, g: 0.9607843, b: 0.9607843, a: 1}
    m_PressedColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 1}
    m_DisabledColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 0.5019608}
    m_ColorMultiplier: 1
    m_FadeDuration: 0.1
  m_SpriteState:
    m_HighlightedSprite: {fileID: 0}
    m_PressedSprite: {fileID: 0}
    m_DisabledSprite: {fileID: 0}
  m_AnimationTriggers:
    m_NormalTrigger: Normal
    m_HighlightedTrigger: Highlighted
    m_PressedTrigger: Pressed
    m_DisabledTrigger: Disabled
  m_Interactable: 1
  m_TargetGraphic: {fileID: 566155409}
  m_TextComponent: {fileID: 925587411}
  m_Placeholder: {fileID: 1709838420}
  m_ContentType: 0
  m_InputType: 0
  m_AsteriskChar: 42
  m_KeyboardType: 0
  m_LineType: 0
  m_HideMobileInput: 0
  m_CharacterValidation: 0
  m_CharacterLimit: 0
  m_OnEndEdit:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1363338593}
        m_MethodName: onInputHeightEditEnd
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.InputField+SubmitEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
  m_OnValueChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.InputField+OnChangeEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
  m_CaretColor: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_CustomCaretColor: 0
  m_SelectionColor: {r: 0.65882355, g: 0.80784315, b: 1, a: 0.7529412}
  m_Text:
  m_CaretBlinkRate: 0.85
  m_CaretWidth: 1
  m_ReadOnly: 0
--- !u!114 &566155409
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 566155406}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10911, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &566155410
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 566155406}
--- !u!1 &898881096
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 898881097}
  - component: {fileID: 898881100}
  - component: {fileID: 898881099}
  - component: {fileID: 898881098}
  m_Layer: 5
  m_Name: optionsBackBt
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &898881097
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 898881096}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1825681260}
  m_Father: {fileID: 333697834}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0}
  m_AnchorMax: {x: 0.5, y: 0}
  m_AnchoredPosition: {x: 0, y: 100}
  m_SizeDelta: {x: 160, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &898881098
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 898881096}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1392445389, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Navigation:
    m_Mode: 3
    m_SelectOnUp: {fileID: 0}
    m_SelectOnDown: {fileID: 0}
    m_SelectOnLeft: {fileID: 0}
    m_SelectOnRight: {fileID: 0}
  m_Transition: 1
  m_Colors:
    m_NormalColor: {r: 1, g: 1, b: 1, a: 1}
    m_HighlightedColor: {r: 0.9607843, g: 0.9607843, b: 0.9607843, a: 1}
    m_PressedColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 1}
    m_DisabledColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 0.5019608}
    m_ColorMultiplier: 1
    m_FadeDuration: 0.1
  m_SpriteState:
    m_HighlightedSprite: {fileID: 0}
    m_PressedSprite: {fileID: 0}
    m_DisabledSprite: {fileID: 0}
  m_AnimationTriggers:
    m_NormalTrigger: Normal
    m_HighlightedTrigger: Highlighted
    m_PressedTrigger: Pressed
    m_DisabledTrigger: Disabled
  m_Interactable: 1
  m_TargetGraphic: {fileID: 898881099}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1363338593}
        m_MethodName: onBackPressOptions
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &898881099
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 898881096}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10905, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &898881100
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 898881096}
--- !u!1 &925587409
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 925587410}
  - component: {fileID: 925587412}
  - component: {fileID: 925587411}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &925587410
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 925587409}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 566155407}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: -0.25}
  m_SizeDelta: {x: 0, y: -0.5}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &925587411
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 925587409}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0, b: 0, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 24
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 2
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 0
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text:
--- !u!222 &925587412
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 925587409}
--- !u!1 &978808494
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 978808495}
  - component: {fileID: 978808496}
  m_Layer: 5
  m_Name: vrInputToggleBt
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &978808495
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 978808494}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 526866757}
  - {fileID: 1934732997}
  m_Father: {fileID: 333697834}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 340, y: 163}
  m_SizeDelta: {x: 761, y: 35}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &978808496
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 978808494}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 2109663825, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Navigation:
    m_Mode: 3
    m_SelectOnUp: {fileID: 0}
    m_SelectOnDown: {fileID: 0}
    m_SelectOnLeft: {fileID: 0}
    m_SelectOnRight: {fileID: 0}
  m_Transition: 1
  m_Colors:
    m_NormalColor: {r: 1, g: 1, b: 1, a: 1}
    m_HighlightedColor: {r: 0.9607843, g: 0.9607843, b: 0.9607843, a: 1}
    m_PressedColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 1}
    m_DisabledColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 0.5019608}
    m_ColorMultiplier: 1
    m_FadeDuration: 0.1
  m_SpriteState:
    m_HighlightedSprite: {fileID: 0}
    m_PressedSprite: {fileID: 0}
    m_DisabledSprite: {fileID: 0}
  m_AnimationTriggers:
    m_NormalTrigger: Normal
    m_HighlightedTrigger: Highlighted
    m_PressedTrigger: Pressed
    m_DisabledTrigger: Disabled
  m_Interactable: 1
  m_TargetGraphic: {fileID: 526866758}
  toggleTransition: 1
  graphic: {fileID: 1411532455}
  m_Group: {fileID: 0}
  onValueChanged:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1363338593}
        m_MethodName: onToggleInputBt
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Toggle+ToggleEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
  m_IsOn: 0
--- !u!1 &1032915557
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1032915558}
  - component: {fileID: 1032915560}
  - component: {fileID: 1032915559}
  m_Layer: 5
  m_Name: Background
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1032915558
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1032915557}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1984414021}
  m_Father: {fileID: 1659825048}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -150, y: 5}
  m_SizeDelta: {x: 60, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1032915559
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1032915557}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10905, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1032915560
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1032915557}
--- !u!1 &1048460747
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1048460748}
  - component: {fileID: 1048460750}
  - component: {fileID: 1048460749}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1048460748
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1048460747}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 333697834}
  m_RootOrder: 5
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 350, y: 106}
  m_SizeDelta: {x: 585, y: 55}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1048460749
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1048460747}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 24
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 2
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Height offset. Low if standing, high if sitting. E.g. 0 for standing, 1
    for sitting.
--- !u!222 &1048460750
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1048460747}
--- !u!1 &1146434723
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1146434724}
  - component: {fileID: 1146434726}
  - component: {fileID: 1146434725}
  m_Layer: 5
  m_Name: Label
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1146434724
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1146434723}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1659825048}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -0.000048876, y: 5}
  m_SizeDelta: {x: -66.3, y: -3.47}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1146434725
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1146434723}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 32
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 3
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Oculus mode
--- !u!222 &1146434726
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1146434723}
--- !u!1 &1363338588
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1363338592}
  - component: {fileID: 1363338591}
  - component: {fileID: 1363338590}
  - component: {fileID: 1363338589}
  - component: {fileID: 1363338593}
  m_Layer: 5
  m_Name: Canvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1363338589
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1363338588}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1301386320, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_IgnoreReversedGraphics: 1
  m_BlockingObjects: 0
  m_BlockingMask:
    serializedVersion: 2
    m_Bits: 4294967295
--- !u!114 &1363338590
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1363338588}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 0
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 800, y: 600}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &1363338591
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1363338588}
  m_Enabled: 1
  serializedVersion: 2
  m_RenderMode: 0
  m_Camera: {fileID: 0}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &1363338592
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1363338588}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 333697834}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!114 &1363338593
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1363338588}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 327c75e944c89ec49b25968d94e8d236, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!1 &1411532453
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1411532454}
  - component: {fileID: 1411532456}
  - component: {fileID: 1411532455}
  m_Layer: 5
  m_Name: Checkmark
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1411532454
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1411532453}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 526866757}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 60, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1411532455
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1411532453}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10901, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1411532456
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1411532453}
--- !u!1 &1659825047
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1659825048}
  - component: {fileID: 1659825049}
  m_Layer: 5
  m_Name: vrOptionsToggleBt
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1659825048
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1659825047}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1032915558}
  - {fileID: 1146434724}
  m_Father: {fileID: 333697834}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.53229177, y: 0.7381852}
  m_AnchoredPosition: {x: 8, y: 113}
  m_SizeDelta: {x: 208.5, y: -210.3}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1659825049
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1659825047}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 2109663825, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Navigation:
    m_Mode: 3
    m_SelectOnUp: {fileID: 0}
    m_SelectOnDown: {fileID: 0}
    m_SelectOnLeft: {fileID: 0}
    m_SelectOnRight: {fileID: 0}
  m_Transition: 1
  m_Colors:
    m_NormalColor: {r: 1, g: 1, b: 1, a: 1}
    m_HighlightedColor: {r: 0.9607843, g: 0.9607843, b: 0.9607843, a: 1}
    m_PressedColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 1}
    m_DisabledColor: {r: 0.78431374, g: 0.78431374, b: 0.78431374, a: 0.5019608}
    m_ColorMultiplier: 1
    m_FadeDuration: 0.1
  m_SpriteState:
    m_HighlightedSprite: {fileID: 0}
    m_PressedSprite: {fileID: 0}
    m_DisabledSprite: {fileID: 0}
  m_AnimationTriggers:
    m_NormalTrigger: Normal
    m_HighlightedTrigger: Highlighted
    m_PressedTrigger: Pressed
    m_DisabledTrigger: Disabled
  m_Interactable: 1
  m_TargetGraphic: {fileID: 1032915559}
  toggleTransition: 1
  graphic: {fileID: 1984414022}
  m_Group: {fileID: 0}
  onValueChanged:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1363338593}
        m_MethodName: onToggleVrBt
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Toggle+ToggleEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
  m_IsOn: 0
--- !u!1 &1709838418
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1709838419}
  - component: {fileID: 1709838421}
  - component: {fileID: 1709838420}
  m_Layer: 5
  m_Name: Placeholder
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1709838419
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1709838418}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 566155407}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -5, y: -0.25}
  m_SizeDelta: {x: -10, y: -0.5}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1709838420
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1709838418}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 24
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 2
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: 0
--- !u!222 &1709838421
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1709838418}
--- !u!1 &1825681259
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1825681260}
  - component: {fileID: 1825681262}
  - component: {fileID: 1825681261}
  m_Layer: 5
  m_Name: optionsBackBtText
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1825681260
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1825681259}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 898881097}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1825681261
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1825681259}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 32
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 3
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Back
--- !u!222 &1825681262
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1825681259}
--- !u!1 &1878607768
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1878607773}
  - component: {fileID: 1878607772}
  - component: {fileID: 1878607771}
  - component: {fileID: 1878607770}
  - component: {fileID: 1878607769}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &1878607769
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1878607768}
  m_Enabled: 1
--- !u!124 &1878607770
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1878607768}
  m_Enabled: 1
--- !u!92 &1878607771
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1878607768}
  m_Enabled: 1
--- !u!20 &1878607772
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1878607768}
  m_Enabled: 1
  serializedVersion: 2
  m_ClearFlags: 1
  m_BackGroundColor: {r: 0.19215687, g: 0.3019608, b: 0.4745098, a: 0}
  m_NormalizedViewPortRect:
    serializedVersion: 2
    x: 0
    y: 0
    width: 1
    height: 1
  near clip plane: 0.3
  far clip plane: 1000
  field of view: 60
  orthographic: 0
  orthographic size: 5
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: -1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
  m_StereoMirrorMode: 0
--- !u!4 &1878607773
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1878607768}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 1, z: -10}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &1934732996
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1934732997}
  - component: {fileID: 1934732999}
  - component: {fileID: 1934732998}
  m_Layer: 5
  m_Name: Label
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1934732997
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1934732996}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 978808495}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 15, y: 0}
  m_SizeDelta: {x: -30, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1934732998
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1934732996}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 24
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 2
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Oculus Controller (if empty then keyboard - mouse will be used)
--- !u!222 &1934732999
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1934732996}
--- !u!1 &1984414020
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1984414021}
  - component: {fileID: 1984414023}
  - component: {fileID: 1984414022}
  m_Layer: 5
  m_Name: Checkmark
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1984414021
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1984414020}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1032915558}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 60, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1984414022
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1984414020}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10901, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1984414023
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1984414020}
--- !u!1 &2099324759
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2099324762}
  - component: {fileID: 2099324761}
  - component: {fileID: 2099324760}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &2099324760
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2099324759}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1077351063, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_HorizontalAxis: Horizontal
  m_VerticalAxis: Vertical
  m_SubmitButton: Submit
  m_CancelButton: Cancel
  m_InputActionsPerSecond: 10
  m_RepeatDelay: 0.5
  m_ForceModuleActive: 0
--- !u!114 &2099324761
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2099324759}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &2099324762
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2099324759}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}

');

//==========================================================================================================================================

// A callback function to add a custom field to our taxonomy
function wpunity_scenes_taxyaml_customFields($tag) {
    // Check for existing taxonomy meta for the term you're editing
    $term_meta_wonderaround_pat = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_wonderaround_pat', true );
    $term_meta_scene_sop = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_scene_sop', true );
    $term_meta_scene_dop = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_scene_dop', true );
    $term_meta_scene_doorp = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_scene_doorp', true );
    $term_meta_scene_poip = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_scene_poip', true );
    $term_meta_s_mainmenu = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_mainmenu', true );
    $term_meta_csharp_mainmenu = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_csharp_mainmenu', true );
    $term_meta_s_credentials = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_credentials', true );
    $term_meta_scene_odp = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_scene_odp', true );
    $term_meta_scene_mdp = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_scene_mdp', true );
    $term_meta_scene_jdp = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_scene_jdp', true );
    $term_meta_scene_jspritep = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_scene_jspritep', true );
    $term_meta_scene_matp = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_scene_matp', true );
    $term_meta_s_options = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_options', true );

    ?>
    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Wonder Around Scene and available Game Objects</h3></td>
    </tr>

    <tr class="form-field term-wonderaround_pat">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_wonderaround_pat">Wonder around .unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_wonderaround_pat" id="wpunity_yamlmeta_wonderaround_pat"><?php echo $term_meta_wonderaround_pat ? $term_meta_wonderaround_pat : ''; ?></textarea>
            <p class="description">scene-wonder-around-unity-pattern</p>
        </td>
    </tr>

    <tr class="form-field term-scene_sop">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_scene_sop">Static Object Pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_scene_sop" id="wpunity_yamlmeta_scene_sop"><?php echo $term_meta_scene_sop ? $term_meta_scene_sop : ''; ?></textarea>
            <p class="description">scene-static-object-pattern</p>
        </td>
    </tr>

    <tr class="form-field term-scene_dop">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_scene_dop">Dynamic Object Pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_scene_dop" id="wpunity_yamlmeta_scene_dop"><?php echo $term_meta_scene_dop ? $term_meta_scene_dop : ''; ?></textarea>
            <p class="description">scene-dynamic-object-pattern</p>
        </td>
    </tr>

    <tr class="form-field term-scene_doorp">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_scene_doorp">Door Pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_scene_doorp" id="wpunity_yamlmeta_scene_doorp"><?php echo $term_meta_scene_doorp ? $term_meta_scene_doorp : ''; ?></textarea>
            <p class="description">scene-door-pattern</p>
        </td>
    </tr>

    <tr class="form-field term-scene_poip">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_scene_poip">POI Pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_scene_poip" id="wpunity_yamlmeta_scene_poip"><?php echo $term_meta_scene_poip ? $term_meta_scene_poip : ''; ?></textarea>
            <p class="description">scene-POI-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><em>The guid of the FPS Fab can be found in:<br/>
                "Standard Assets\Characters\FirstPersonCharacter\Prefabs\FPSController.prefab.mat" fids up to 7 are used. First available fid is 8.</em></td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Main Menu Scene</h3></td>
    </tr>

    <tr class="form-field term-s_mainmenu">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_mainmenu">The S_MainMenu.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_mainmenu" id="wpunity_yamlmeta_s_mainmenu"><?php echo $term_meta_s_mainmenu ? $term_meta_s_mainmenu : ''; ?></textarea>
            <p class="description">scene-main-menu-unity-pattern</p>
        </td>
    </tr>

    <tr class="form-field term-csharp_mainmenu">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_csharp_mainmenu">Main Menu c-sharp script (all_menu_Script.cs) Pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_csharp_mainmenu" id="wpunity_yamlmeta_csharp_mainmenu"><?php echo $term_meta_csharp_mainmenu ? $term_meta_csharp_mainmenu : ''; ?></textarea>
            <p class="description">scene-all-menu-cs-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><em>
                S_MainMenu.unity variables:<br/>
                ___[main_menu_sprite_guid]___ : guid as written in the meta of the S_MainMenu/MainMenu_background.jpg.meta (it is a sprite meta)<br/><br/>

                all_menu_Script.cs variables:<br/>
                ___[initialwonderaround_scene_basename]___ : Example "S1" if the first wonder around scene is named as "S1.unity"<br/>
                ___[credentials_scene_basename]___ : Example "S_Credentials" if the credentials scene is named as "S_Credentials.unity"<br/>
                ___[mainmenu_scene_basename]___ : Example "S_MainMenu" if the credentials scene is named as "S_MainMenu.unity"<br/>

            </em></td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Credentials Scene</h3></td>
    </tr>

    <tr class="form-field term-s_credentials">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_credentials">The S_Credentials.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_credentials" id="wpunity_yamlmeta_s_credentials"><?php echo $term_meta_s_credentials ? $term_meta_s_credentials : ''; ?></textarea>
            <p class="description">scene-credentials-unity-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><em>
                ___[credentials_text]____ : the text to show. It should start and end from-to single quote, e.g. 'blabla LF bla blue'. LF is for changing line. <br/>
                ___[credentials_photo_image_sprite]___ : The guid in the jpg.meta (sprite) for the banner photo, e.g. 'S_Credentials/credentials_photo_image.jpg.meta'<br/>
                ___[credentials_logo_image_sprite]___ : The guid in the jpg.meta (sprite) for the logo, e.g. 'S_Credentials/credentials_logo_image.jpg.meta'<br/>

            </em></td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Global: Pattern for the .meta and .mat files</h3></td>
    </tr>

    <tr class="form-field term-scene_odp">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_scene_odp">obj.meta Pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_scene_odp" id="wpunity_yamlmeta_scene_odp"><?php echo $term_meta_scene_odp ? $term_meta_scene_odp : ''; ?></textarea>
            <p class="description">scene-obj-dotmeta-pattern</p>
        </td>
    </tr>

    <tr class="form-field term-scene_mdp">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_scene_mdp">mat.meta Pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_scene_mdp" id="wpunity_yamlmeta_scene_mdp"><?php echo $term_meta_scene_mdp ? $term_meta_scene_mdp : ''; ?></textarea>
            <p class="description">scene-mat-dotmeta-pattern</p>
        </td>
    </tr>

    <tr class="form-field term-scene_jdp">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_scene_jdp">jpg.meta Pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_scene_jdp" id="wpunity_yamlmeta_scene_jdp"><?php echo $term_meta_scene_jdp ? $term_meta_scene_jdp : ''; ?></textarea>
            <p class="description">scene-jpg-dotmeta-pattern</p>
        </td>
    </tr>

    <tr class="form-field term-scene_jspritep">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_scene_jspritep">The jpg sprite meta pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_scene_jspritep" id="wpunity_yamlmeta_scene_jspritep"><?php echo $term_meta_scene_jspritep ? $term_meta_scene_jspritep : ''; ?></textarea>
            <p class="description">scene-jpg-sprite-pattern</p>
        </td>
    </tr>

    <tr class="form-field term-scene_matp">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_scene_matp">Material (.mat) Pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_scene_matp" id="wpunity_yamlmeta_scene_matp"><?php echo $term_meta_scene_matp ? $term_meta_scene_matp : ''; ?></textarea>
            <p class="description">scene-mat-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><em>
                Write the pattern for the .meta and .mat files. <br/>
                - HINT 1: The .mat should take info from .mtl.<br/>
                - HINT 2: the name of the .mat should be "myobjname-defaultMat.mat

            </em></td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Options Scene</h3></td>
    </tr>

    <tr class="form-field term-s_options">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_options">The S_Options.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_options" id="wpunity_yamlmeta_s_options"><?php echo $term_meta_s_options ? $term_meta_s_options : ''; ?></textarea>
            <p class="description">scene-options-unity-pattern</p>
        </td>
    </tr>


    <?php
}

// A callback function to save our extra taxonomy field(s)
function wpunity_scenes_taxyaml_customFields_save( $term_id ) {
    global $ini_scene_wonder_around_unity_pattern,$ini_scene_sop,$ini_scene_dop,$ini_scene_doorp,$ini_scene_poip;
    global $ini_scene_main_menu_unity_pattern,$ini_scene_allmenu_cs;
    global $ini_scene_credentials_unity_pattern;
    global $ini_scene_odp,$ini_scene_mdp,$ini_scene_jdp,$ini_scene_jpg_sprite_pattern,$ini_scene_unity_meta_pattern;
    global $ini_scene_options_unity_pattern;

    if ( isset( $_POST['wpunity_yamlmeta_wonderaround_pat'] ) ) {
        $term_meta_wonderaround_pat = $_POST['wpunity_yamlmeta_wonderaround_pat'];
        if($term_meta_wonderaround_pat == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_wonderaround_pat', $ini_scene_wonder_around_unity_pattern[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_wonderaround_pat', $term_meta_wonderaround_pat);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_scene_sop'] ) ) {
        $term_meta_scene_sop = $_POST['wpunity_yamlmeta_scene_sop'];
        if($term_meta_scene_sop == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_sop', $ini_scene_sop[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_sop', $term_meta_scene_sop);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_scene_dop'] ) ) {
        $term_meta_scene_dop = $_POST['wpunity_yamlmeta_scene_dop'];
        if($term_meta_scene_dop == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_dop', $ini_scene_dop[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_dop', $term_meta_scene_dop);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_scene_doorp'] ) ) {
        $term_meta_scene_doorp = $_POST['wpunity_yamlmeta_scene_doorp'];
        if($term_meta_scene_doorp == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_doorp', $ini_scene_doorp[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_doorp', $term_meta_scene_doorp);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_scene_poip'] ) ) {
        $term_meta_scene_poip = $_POST['wpunity_yamlmeta_scene_poip'];
        if($term_meta_scene_poip == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_poip', $ini_scene_poip[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_poip', $term_meta_scene_poip);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_mainmenu'] ) ) {
        $term_meta_scene_s_mainmenu = $_POST['wpunity_yamlmeta_s_mainmenu'];
        if($term_meta_scene_s_mainmenu == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_mainmenu', $ini_scene_main_menu_unity_pattern[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_mainmenu', $term_meta_scene_s_mainmenu);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_csharp_mainmenu'] ) ) {
        $term_meta_scene_csharp_mainmenu = $_POST['wpunity_yamlmeta_csharp_mainmenu'];
        if($term_meta_scene_csharp_mainmenu == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_csharp_mainmenu', $ini_scene_allmenu_cs[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_csharp_mainmenu', $term_meta_scene_csharp_mainmenu);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_credentials'] ) ) {
        $term_meta_scene_s_credentials = $_POST['wpunity_yamlmeta_s_credentials'];
        if($term_meta_scene_s_credentials == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_credentials', $ini_scene_credentials_unity_pattern[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_credentials', $term_meta_scene_s_credentials);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_scene_odp'] ) ) {
        $term_meta_scene_scene_odp = $_POST['wpunity_yamlmeta_scene_odp'];
        if($term_meta_scene_scene_odp == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_odp', $ini_scene_odp[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_odp', $term_meta_scene_scene_odp);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_scene_mdp'] ) ) {
        $term_meta_scene_scene_mdp = $_POST['wpunity_yamlmeta_scene_mdp'];
        if($term_meta_scene_scene_mdp == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_mdp', $ini_scene_mdp[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_mdp', $term_meta_scene_scene_mdp);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_scene_jdp'] ) ) {
        $term_meta_scene_scene_jdp = $_POST['wpunity_yamlmeta_scene_jdp'];
        if($term_meta_scene_scene_jdp == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_jdp', $ini_scene_jdp[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_jdp', $term_meta_scene_scene_jdp);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_scene_jspritep'] ) ) {
        $term_meta_scene_scene_jspritep = $_POST['wpunity_yamlmeta_scene_jspritep'];
        if($term_meta_scene_scene_jspritep == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_jspritep', $ini_scene_jpg_sprite_pattern[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_jspritep', $term_meta_scene_scene_jspritep);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_scene_matp'] ) ) {
        $term_meta_scene_scene_matp = $_POST['wpunity_yamlmeta_scene_matp'];
        if($term_meta_scene_scene_matp == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_matp', $ini_scene_unity_meta_pattern[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_scene_matp', $term_meta_scene_scene_matp);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_options'] ) ) {
        $term_meta_scene_s_options = $_POST['wpunity_yamlmeta_s_options'];
        if($term_meta_scene_s_options == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_options', $ini_scene_options_unity_pattern[0]);
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_options', $term_meta_scene_s_options);
        }
    }

}


// Add the fields to the taxonomy, using our callback function
add_action( 'wpunity_scene_yaml_edit_form_fields', 'wpunity_scenes_taxyaml_customFields', 10, 2 );
// Save the changes made on the taxonomy, using our callback function
add_action( 'edited_wpunity_scene_yaml', 'wpunity_scenes_taxyaml_customFields_save', 10, 2 );

//==========================================================================================================================================

function wpunity_scenes_taxyaml_standard_cre(){

    if (!term_exists('Main Menu Default Template', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Main Menu Default Template', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Main Menu scenes',
                'slug' => 'mainmenu-yaml',
            )
        );
    }

    if (!term_exists('Credentials Default Template', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Credentials Default Template', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Credentials scenes',
                'slug' => 'credentials-yaml',
            )
        );
    }

    if (!term_exists('Wonder Around Default Template', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Wonder Around Default Template', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Wonder Around scenes',
                'slug' => 'wonderaround-yaml',
            )
        );
    }

    if (!term_exists('Options Default Template', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Options Default Template', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Options scenes',
                'slug' => 'options-yaml',
            )
        );
    }
}

add_action( 'init', 'wpunity_scenes_taxyaml_standard_cre' );

//==========================================================================================================================================

function wpunity_scenes_taxyaml_standard_fields_cre($tt_id) {
    global $ini_scene_wonder_around_unity_pattern,$ini_scene_sop,$ini_scene_dop,$ini_scene_doorp,$ini_scene_poip;
    global $ini_scene_main_menu_unity_pattern,$ini_scene_allmenu_cs;
    global $ini_scene_credentials_unity_pattern;
    global $ini_scene_odp,$ini_scene_mdp,$ini_scene_jdp,$ini_scene_jpg_sprite_pattern,$ini_scene_unity_meta_pattern;
    global $ini_scene_options_unity_pattern;

    $term_insterted = get_term_by('id', $tt_id, 'wpunity_scene_yaml');

    if($term_insterted->slug == 'mainmenu-yaml'){
        update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_sop', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_dop', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_doorp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_poip', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu', $ini_scene_main_menu_unity_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_csharp_mainmenu', $ini_scene_allmenu_cs[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_odp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_mdp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jdp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jspritep', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_matp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options', 'empty');
    }elseif($term_insterted->slug == 'credentials-yaml'){
        update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_sop', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_dop', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_doorp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_poip', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_csharp_mainmenu', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials', $ini_scene_credentials_unity_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_odp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_mdp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jdp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jspritep', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_matp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options', 'empty');
    }elseif($term_insterted->slug == 'wonderaround-yaml'){
        update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', $ini_scene_wonder_around_unity_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_sop', $ini_scene_sop[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_dop', $ini_scene_dop[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_doorp', $ini_scene_doorp[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_poip', $ini_scene_poip[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_csharp_mainmenu', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_odp', $ini_scene_odp[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_mdp', $ini_scene_mdp[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jdp', $ini_scene_jdp[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jspritep', $ini_scene_jpg_sprite_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_matp', $ini_scene_unity_meta_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options', 'empty');
    }elseif($term_insterted->slug == 'options-yaml'){
        update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_sop', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_dop', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_doorp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_poip', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_csharp_mainmenu', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_odp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_mdp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jdp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jspritep', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_matp', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options', $ini_scene_options_unity_pattern[0]);
    }else{
        update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', $ini_scene_wonder_around_unity_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_sop', $ini_scene_sop[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_dop', $ini_scene_dop[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_doorp', $ini_scene_doorp[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_poip', $ini_scene_poip[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu', $ini_scene_main_menu_unity_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_csharp_mainmenu', $ini_scene_allmenu_cs[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials', $ini_scene_credentials_unity_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_odp', $ini_scene_odp[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_mdp', $ini_scene_mdp[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jdp', $ini_scene_jdp[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_jspritep', $ini_scene_jpg_sprite_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_scene_matp', $ini_scene_unity_meta_pattern[0]);
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options', $ini_scene_options_unity_pattern[0]);
    }


}

add_action('create_wpunity_scene_yaml', 'wpunity_scenes_taxyaml_standard_fields_cre' , $tt_id);

//==========================================================================================================================================




?>

