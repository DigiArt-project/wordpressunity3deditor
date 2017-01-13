<?php

$ini_scene_sop = array('
--- !u!1 &___[sop_fid]___ stripped
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
      value: ___[sop_tag]____
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
    - target: {fileID: 2300000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_Materials.Array.data[0]
      value:
      objectReference: {fileID: 2100000, guid: ___[sop_material_guid]___, type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[sop_guid]___, type: 3}
  m_IsPrefabParent: 0
');


$ini_scene_dop = array('
--- !u!1 &___[dop_fid]___ stripped
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
      value: ___[dop_tag]____
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


$ini_scene_doorp = array('
--- !u!1 &___[door_fid]___ stripped
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
      value: ___[door_tag]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[door_guid]___, type: 3}
  m_IsPrefabParent: 0
');


$ini_scene_poip = array('
--- !u!1001 &___[poi_fid]___
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
      value: ___[poi_tag]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[poi_guid]___, type: 3}
  m_IsPrefabParent: 0
');

$ini_scene_ocs = array('%YAML 1.1
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
');

$ini_scene_rs = array('
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
');

$ini_scene_lms = array('
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
');

$ini_scene_nms = array('
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
');

$ini_scene_fps = array('
--- !u!1001 &1351028531
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalPosition.x
      value: 4.65
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalPosition.y
      value: 1.6
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalPosition.z
      value: -5.98
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
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
      value: FPSController_MyScene
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_TagString
      value: FPSController_MyScene
      objectReference: {fileID: 0}
    - target: {fileID: 5400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_IsKinematic
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
  m_IsPrefabParent: 0
');

$ini_scene_light = array('
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

$ini_scene_fdp = array('
fileFormatVersion: 2
guid: ___[folder_guid]___
folderAsset: yes
timeCreated: ___[unx_time_created]___
licenseType: Free
DefaultImporter:
  userData:
  assetBundleName:
  assetBundleVariant:
');

$ini_scene_odp = array('
fileFormatVersion: 2
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


$ini_scene_mdp = array('
fileFormatVersion: 2
guid: ___[mat_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
NativeFormatImporter:
  userData:
  assetBundleName:
  assetBundleVariant:
');

$ini_scene_jdp = array('
fileFormatVersion: 2
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


$ini_scene_jsdp = array('
fileFormatVersion: 2
guid: ___[js_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
MonoImporter:
  serializedVersion: 2
  defaultReferences: []
  executionOrder: 0
  icon: {instanceID: 0}
  userData:
  assetBundleName:
  assetBundleVariant:
');

$ini_scene_matp = array('
%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!21 &___[material_fid]___
Material:
  serializedVersion: 6
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_Name: ___[material_name]___
  m_Shader: {fileID: 46, guid: 0000000000000000f000000000000000, type: 0}
  m_ShaderKeywords: _EMISSION
  m_LightmapFlags: 1
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
        m_Texture: {fileID: ___[texture_fid]___, guid: ___[texture_guid]___, type: 3}
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
      second: {r: ___[material_diffusion_red_decimal]___, g: ___[material_diffusion_green_decimal]___, b: ___[material_diffusion_blue_decimal]___, a: ___[material_diffusion_transparency_decimal]___}
    - first:
        name: _EmissionColor
      second: {r: 0, g: 0, b: 0, a: 1}
');

$ini_scene_doorjsp = array('
#pragma strict

import UnityEngine.SceneManagement;

function OnTriggerEnter(col : Collider) {

    Debug.Log(col.gameObject.name);

    if(col.gameObject.name == "FPSController")
    {
        SceneManager.LoadScene("___[scene_filename.unity_to_load]___");
    }
}
');

/**************************************************************************/

//This imc_prefix will be added before all of our custom fields
$wpunity_prefix = 'wpunity_yamltemp_';

//All information about our meta box
$wpunity_databox2a = array(
    'id' => 'wpunity-yamltemp2a-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Occlusion Culling Settings',
            'desc' => 'scene-OCS',
            'id' => $wpunity_prefix . 'scene_ocs',
            'type' => 'textarea',
            'std' => $ini_scene_ocs[0]
        ),
        array(
            'name' => 'Render Settings',
            'desc' => 'scene-RS',
            'id' => $wpunity_prefix . 'scene_rs',
            'type' => 'textarea',
            'std' => $ini_scene_rs[0]
        ),
        array(
            'name' => 'LightMap Settings',
            'desc' => 'scene-LMS',
            'id' => $wpunity_prefix . 'scene_lms',
            'type' => 'textarea',
            'std' => $ini_scene_lms[0]
        ),
        array(
            'name' => 'NavMesh Settings',
            'desc' => 'scene-NMS',
            'id' => $wpunity_prefix . 'scene_nms',
            'type' => 'textarea',
            'std' => $ini_scene_nms[0]
        ),
        array(
            'name' => 'First Person Prefab',
            'desc' => 'scene-FPS',
            'id' => $wpunity_prefix . 'scene_fps',
            'type' => 'textarea',
            'std' => $ini_scene_fps[0]
        ),
        array(
            'name' => 'Light pattern',
            'desc' => 'scene-light',
            'id' => $wpunity_prefix . 'scene_light',
            'type' => 'textarea',
            'std' => $ini_scene_light[0]
        ),
    )
);


//All information about our meta box
$wpunity_databox2b = array(
    'id' => 'wpunity-yamltemp2b-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Static object pattern',
            'desc' => 'scene-static-object-pattern',
            'id' => $wpunity_prefix . 'scene_sop',
            'type' => 'textarea',
            'std' => $ini_scene_sop[0]
        ),
        array(
            'name' => 'Dynamic object pattern',
            'desc' => 'scene-dynamic-object-pattern',
            'id' => $wpunity_prefix . 'scene_dop',
            'type' => 'textarea',
            'std' => $ini_scene_dop[0]
        ),
        array(
            'name' => 'Door pattern',
            'desc' => 'scene-door-pattern',
            'id' => $wpunity_prefix . 'scene_doorp',
            'type' => 'textarea',
            'std' => $ini_scene_doorp[0]
        ),
        array(
            'name' => 'POI pattern',
            'desc' => 'scene-POI-pattern',
            'id' => $wpunity_prefix . 'scene_poip',
            'type' => 'textarea',
            'std' => $ini_scene_poip[0]
        ),
    )
);

//All information about our meta box
$wpunity_databox2c = array(
    'id' => 'wpunity-yamltemp2c-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Folder.meta pattern',
            'desc' => 'scene-folder-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_fdp',
            'type' => 'textarea',
            'std' => $ini_scene_fdp[0]
        ),
        array(
            'name' => 'obj.meta pattern',
            'desc' => 'scene-obj-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_odp',
            'type' => 'textarea',
            'std' => $ini_scene_odp[0]
        ),
        array(
            'name' => 'mat.meta pattern',
            'desc' => 'scene-mat-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_mdp',
            'type' => 'textarea',
            'std' => $ini_scene_mdp[0]
        ),
        array(
            'name' => 'jpg.meta pattern',
            'desc' => 'scene-jpg-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_jdp',
            'type' => 'textarea',
            'std' => $ini_scene_jdp[0]
        ),
        array(
            'name' => 'js.meta pattern',
            'desc' => 'scene-js-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_jsdp',
            'type' => 'textarea',
            'std' => $ini_scene_jsdp[0]
        ),
    )
);

//All information about our meta box
$wpunity_databox2d = array(
    'id' => 'wpunity-yamltemp2d-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Material (.mat) pattern',
            'desc' => 'scene-mat-pattern',
            'id' => $wpunity_prefix . 'scene_matp',
            'type' => 'textarea',
            'std' => $ini_scene_matp[0]
        ),
    )
);

//All information about our meta box
$wpunity_databox2e = array(
    'id' => 'wpunity-yamltemp2e-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Door javascript (.js) pattern',
            'desc' => 'scene-doorjs-pattern',
            'id' => $wpunity_prefix . 'scene_doorjsp',
            'type' => 'textarea',
            'std' => $ini_scene_doorjsp[0]
        ),
    )
);

function wpunity_yamltemp_databoxes_add() {
    global $wpunity_databox2a;
    global $wpunity_databox2b;
    global $wpunity_databox2c;
    global $wpunity_databox2d;
    global $wpunity_databox2e;
    add_meta_box($wpunity_databox2a['id'], 'Fixed things of the Scene', 'wpunity_yamltemp_databox2a_show', $wpunity_databox2a['page'], $wpunity_databox2a['context'], $wpunity_databox2a['priority']);
    add_meta_box($wpunity_databox2b['id'], 'Prefabricated objects in the scene', 'wpunity_yamltemp_databox2b_show', $wpunity_databox2b['page'], $wpunity_databox2b['context'], $wpunity_databox2b['priority']);
    add_meta_box($wpunity_databox2c['id'], 'Pattern for the .meta files', 'wpunity_yamltemp_databox2c_show', $wpunity_databox2c['page'], $wpunity_databox2c['context'], $wpunity_databox2c['priority']);
    add_meta_box($wpunity_databox2d['id'], 'Pattern for the .mat files', 'wpunity_yamltemp_databox2d_show', $wpunity_databox2d['page'], $wpunity_databox2d['context'], $wpunity_databox2d['priority']);
    add_meta_box($wpunity_databox2e['id'], 'Pattern for the .js files for the doors', 'wpunity_yamltemp_databox2e_show', $wpunity_databox2e['page'], $wpunity_databox2e['context'], $wpunity_databox2e['priority']);
}

add_action('admin_menu', 'wpunity_yamltemp_databoxes_add');


function wpunity_yamltemp_databox2a_show(){
    global $wpunity_databox2a, $post;
    // Use nonce for verification

    echo '<div>Write the fixed things of the Scene such as Occlussion, Render, LightMap and NavMesh settings</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2a['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
        '<th style="width:20%"><label for="', esc_attr($field['id']), '">', esc_html($field['name']), '</label></th>',
        '<td>';


        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'numeric':
                echo '<input type="number" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'textarea':
                echo '<textarea name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" cols="60" rows="4" style="width:97%">', esc_attr($meta ? $meta : $field['std']), '</textarea>', '<br />', esc_html($field['desc']);
                break;
            case 'select':
                echo '<select name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '">';
                foreach ($field['options'] as $option) {
                    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', esc_html($option), '</option>';
                }
                echo '</select>';
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '"', $meta ? ' checked="checked"' : '', ' />';
                break;

        }
        echo     '</td><td>',
        '</td></tr>';
    }
    echo '</table>';

    echo '<div style="margin-top:30px">The guid of the FPS Fab can be found in:<br />
            "Standard Assets\Characters\FirstPersonCharacter\Prefabs\FPSController.prefab.mat"</div>


        <div style="margin-top:30px">fids up to 7 are used. First available fid is 8.</div>';

}


function wpunity_yamltemp_databox2b_show(){
    global $wpunity_databox2b, $post;
    // Use nonce for verification

    echo '<div>Write the patterns for the prefabricated objects, staticObjects (floor), dynamic objects, doors, and POIs</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2b['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
        '<th style="width:20%"><label for="', esc_attr($field['id']), '">', esc_html($field['name']), '</label></th>',
        '<td>';


        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'numeric':
                echo '<input type="number" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'textarea':
                echo '<textarea name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" cols="60" rows="4" style="width:97%">', esc_attr($meta ? $meta : $field['std']), '</textarea>', '<br />', esc_html($field['desc']);
                break;
            case 'select':
                echo '<select name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '">';
                foreach ($field['options'] as $option) {
                    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', esc_html($option), '</option>';
                }
                echo '</select>';
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '"', $meta ? ' checked="checked"' : '', ' />';
                break;

        }
        echo     '</td><td>',
        '</td></tr>';
    }
    echo '</table>';

}

function wpunity_yamltemp_databox2c_show(){
    global $wpunity_databox2c, $post;
    // Use nonce for verification

    echo '<div>Write the pattern for the .meta files</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2c['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
        '<th style="width:20%"><label for="', esc_attr($field['id']), '">', esc_html($field['name']), '</label></th>',
        '<td>';


        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'numeric':
                echo '<input type="number" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'textarea':
                echo '<textarea name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" cols="60" rows="4" style="width:97%">', esc_attr($meta ? $meta : $field['std']), '</textarea>', '<br />', esc_html($field['desc']);
                break;
            case 'select':
                echo '<select name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '">';
                foreach ($field['options'] as $option) {
                    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', esc_html($option), '</option>';
                }
                echo '</select>';
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '"', $meta ? ' checked="checked"' : '', ' />';
                break;

        }
        echo     '</td><td>',
        '</td></tr>';
    }
    echo '</table>';

}

function wpunity_yamltemp_databox2d_show(){
    global $wpunity_databox2d, $post;
    // Use nonce for verification

    echo '<div>Write the pattern for the .mat files.<br />- HINT 1: The .mat should take info from .mtl.<br />
            - HINT 2: the name of the .mat should be "myobjname-defaultMat.mat</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2d['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
        '<th style="width:20%"><label for="', esc_attr($field['id']), '">', esc_html($field['name']), '</label></th>',
        '<td>';


        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'numeric':
                echo '<input type="number" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'textarea':
                echo '<textarea name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" cols="60" rows="4" style="width:97%">', esc_attr($meta ? $meta : $field['std']), '</textarea>', '<br />', esc_html($field['desc']);
                break;
            case 'select':
                echo '<select name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '">';
                foreach ($field['options'] as $option) {
                    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', esc_html($option), '</option>';
                }
                echo '</select>';
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '"', $meta ? ' checked="checked"' : '', ' />';
                break;

        }
        echo     '</td><td>',
        '</td></tr>';
    }
    echo '</table>';

}

function wpunity_yamltemp_databox2e_show(){
    global $wpunity_databox2e, $post;
    // Use nonce for verification

    echo '<div>Write the pattern for the .js files for the doors.</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2e['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
        '<th style="width:20%"><label for="', esc_attr($field['id']), '">', esc_html($field['name']), '</label></th>',
        '<td>';


        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'numeric':
                echo '<input type="number" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                break;
            case 'textarea':
                echo '<textarea name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" cols="60" rows="4" style="width:97%">', esc_attr($meta ? $meta : $field['std']), '</textarea>', '<br />', esc_html($field['desc']);
                break;
            case 'select':
                echo '<select name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '">';
                foreach ($field['options'] as $option) {
                    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', esc_html($option), '</option>';
                }
                echo '</select>';
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '"', $meta ? ' checked="checked"' : '', ' />';
                break;

        }
        echo     '</td><td>',
        '</td></tr>';
    }
    echo '</table>';

}

/**
 * 5.03
 * Save Data @ Box with Lat-Lng-Address-Votes
 *
 */


function wpunity_yamltemp_databox_save($post_id) {
    global $wpunity_databox2a;
    global $wpunity_databox2b;
    global $wpunity_databox2c;
    global $wpunity_databox2d;
    global $wpunity_databox2e;
    // verify nonce
    if (!wp_verify_nonce($_POST['wpunity_yamltemp_databox_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($wpunity_databox2a['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
    foreach ($wpunity_databox2b['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
    foreach ($wpunity_databox2c['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
    foreach ($wpunity_databox2d['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
    foreach ($wpunity_databox2e['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }

}

// Save data from infobox
add_action('save_post', 'wpunity_yamltemp_databox_save');


?>