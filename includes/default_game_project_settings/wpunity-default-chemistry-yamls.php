<?php

/***************************************************************************************************************/
// YAMLS for ASSETS' TYPES default values (CHEMISTRY GAMES)
/***************************************************************************************************************/

global $ini_asset_room,$ini_asset_gate,$ini_asset_molecule;

$ini_asset_room = array('--- !u!1001 &___[room_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[room_position_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[room_position_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[room_position_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[room_rotation_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[room_rotation_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[room_rotation_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: ___[room_rotation_w]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalScale.x
      value: ___[room_scale_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalScale.y
      value: ___[room_scale_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_LocalScale.z
      value: ___[room_scale_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 100002, guid: ___[room_obj_guid]___, type: 3}
      propertyPath: m_Name
      value: ___[room_title]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[room_obj_guid]___, type: 3}
  m_IsPrefabParent: 0
--- !u!1 &___[room_mesh_fid]___ stripped
GameObject:
  m_PrefabParentObject: {fileID: 100002, guid: ___[room_obj_guid]___, type: 3}
  m_PrefabInternal: {fileID: ___[room_fid]___}
--- !u!64 &___[room_mesh_collider_fid]___
MeshCollider:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[room_mesh_fid]___}
  m_Material: {fileID: 0}
  m_IsTrigger: 0
  m_Enabled: 1
  serializedVersion: 3
  m_Convex: 0
  m_CookingOptions: 14
  m_SkinWidth: 0.01
  m_Mesh: {fileID: 4300000, guid: ___[room_obj_guid]___, type: 3}');

$ini_asset_gate = array('--- !u!1001 &___[gate_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[gate_position_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[gate_position_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[gate_position_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[gate_rotation_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[gate_rotation_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[gate_rotation_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: ___[gate_rotation_w]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_RootOrder
      value: 8
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalScale.x
      value: ___[gate_scale_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalScale.y
      value: ___[gate_scale_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_LocalScale.z
      value: ___[gate_scale_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 100002, guid: ___[gate_obj_guid]___, type: 3}
      propertyPath: m_IsActive
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[gate_obj_guid]___, type: 3}
  m_IsPrefabParent: 0
--- !u!1 &___[gate_mesh_fid]___ stripped
GameObject:
  m_PrefabParentObject: {fileID: 100000, guid: ___[gate_obj_guid]___, type: 3}
  m_PrefabInternal: {fileID: ___[gate_fid]___}
--- !u!65 &___[gate_mesh_collider_fid]___
BoxCollider:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[gate_mesh_fid]___}
  m_Material: {fileID: 0}
  m_IsTrigger: 1
  m_Enabled: 1
  serializedVersion: 2
  m_Size: {x: 0.28190455, y: 0.15075701, z: 0.41001028}
  m_Center: {x: 7.9136996e-11, y: 0.075502194, z: 0.10668291}
--- !u!114 &1164632353
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[gate_mesh_fid]___}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: bbd2f0278cc4f9743b689e41b0994a4b, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  interactionCanvas: {fileID: 1048944797}
  crosshair: {fileID: 254592000}
  defaultMat: {fileID: 2100000, guid: 54c38eb35b5848443a34928936331d6b, type: 2}
  outlinedMat: {fileID: 2100000, guid: 829f166bc0690f54ba3cc13532d84976, type: 2}
  interactable: 0
  sceneLoader: {fileID: 227587222}
  cursor: {fileID: 0}
  clip: {fileID: 8300000, guid: 28f48e6af139f4947b1e28ed02729467, type: 3}
  sceneToLoad: ___[moleculeNamingScene_fid]___
  scoreManager: {fileID: 1872727004}');

$ini_asset_molecule = array('TO BE ADDED');

function wpunity_default_value_room_get(){
  global $ini_asset_room;
  return $ini_asset_room[0];
}

function wpunity_default_value_gate_get(){
  global $ini_asset_gate;
  return $ini_asset_gate[0];
}

function wpunity_default_value_molecule_get(){
  global $ini_asset_molecule;
  return $ini_asset_molecule[0];
}


/***************************************************************************************************************/
// YAMLS for GAMES' TYPES Project Settings default values (CHEMISTRY GAMES)
/***************************************************************************************************************/

global $AudioManager_asset3,$ClusterInputManager_asset3,$DynamicsManager_asset3,$EditorBuildSettings_asset3,$EditorSettings_asset3,$GraphicsSettings_asset3;
global $InputManager_asset3,$NavMeshAreas_asset3,$NetworkManager_asset3,$Physics2DSettings_asset3,$ProjectSettings_asset3,$ProjectVersion_asset3;
global $QualitySettings_asset3,$TagManager_asset3,$TimeManager_asset3,$UnityConnect_asset3;

//4th alphabetically:  EditorBuildSettings.asset   : It is the only that should change across compilations
// Each scene should be added with
//$sceneToAddPattern = array("  - enabled: 1
//    path: Assets/scenes/S_MainMenu.unity");
// Line change with character: chr(10)

//1. AudioManager.asset
$AudioManager_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!11 &1
AudioManager:
  m_ObjectHideFlags: 0
  m_Volume: 1
  Rolloff Scale: 1
  Doppler Factor: 1
  Default Speaker Mode: 2
  m_SampleRate: 0
  m_DSPBufferSize: 0
  m_VirtualVoiceCount: 512
  m_RealVoiceCount: 32
  m_SpatializerPlugin:
  m_DisableAudio: 0
  m_VirtualizeEffects: 1");

//2. ClusterInputManager.asset
$ClusterInputManager_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!236 &1
ClusterInputManager:
  m_ObjectHideFlags: 0
  m_Inputs: []
");

//3. DynamicsManager.asset
$DynamicsManager_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!55 &1
PhysicsManager:
  m_ObjectHideFlags: 0
  serializedVersion: 3
  m_Gravity: {x: 0, y: -9.81, z: 0}
  m_DefaultMaterial: {fileID: 0}
  m_BounceThreshold: 2
  m_SleepThreshold: 0.005
  m_DefaultContactOffset: 0.01
  m_DefaultSolverIterations: 6
  m_DefaultSolverVelocityIterations: 1
  m_QueriesHitBackfaces: 0
  m_QueriesHitTriggers: 1
  m_EnableAdaptiveForce: 0
  m_EnablePCM: 1
  m_LayerCollisionMatrix: ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
");

//4. EditorBuildSettings.asset
$EditorBuildSettings_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!1045 &1
EditorBuildSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Scenes:
");

//5. EditorSettings.asset
$EditorSettings_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!159 &1
EditorSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 3
  m_ExternalVersionControlSupport: Visible Meta Files
  m_SerializationMode: 2
  m_DefaultBehaviorMode: 0
  m_SpritePackerMode: 2
  m_SpritePackerPaddingPower: 1
  m_ProjectGenerationIncludedExtensions: txt;xml;fnt;cd
  m_ProjectGenerationRootNamespace:
  m_UserGeneratedProjectSuffix:
");

//6. GraphicsSettings.asset
$GraphicsSettings_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!30 &1
GraphicsSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 12
  m_Deferred:
    m_Mode: 1
    m_Shader: {fileID: 69, guid: 0000000000000000f000000000000000, type: 0}
  m_DeferredReflections:
    m_Mode: 1
    m_Shader: {fileID: 74, guid: 0000000000000000f000000000000000, type: 0}
  m_ScreenSpaceShadows:
    m_Mode: 1
    m_Shader: {fileID: 64, guid: 0000000000000000f000000000000000, type: 0}
  m_LegacyDeferred:
    m_Mode: 1
    m_Shader: {fileID: 63, guid: 0000000000000000f000000000000000, type: 0}
  m_DepthNormals:
    m_Mode: 1
    m_Shader: {fileID: 62, guid: 0000000000000000f000000000000000, type: 0}
  m_MotionVectors:
    m_Mode: 1
    m_Shader: {fileID: 75, guid: 0000000000000000f000000000000000, type: 0}
  m_LightHalo:
    m_Mode: 1
    m_Shader: {fileID: 105, guid: 0000000000000000f000000000000000, type: 0}
  m_LensFlare:
    m_Mode: 1
    m_Shader: {fileID: 102, guid: 0000000000000000f000000000000000, type: 0}
  m_AlwaysIncludedShaders:
  - {fileID: 7, guid: 0000000000000000f000000000000000, type: 0}
  - {fileID: 15104, guid: 0000000000000000f000000000000000, type: 0}
  - {fileID: 15105, guid: 0000000000000000f000000000000000, type: 0}
  - {fileID: 15106, guid: 0000000000000000f000000000000000, type: 0}
  - {fileID: 10753, guid: 0000000000000000f000000000000000, type: 0}
  - {fileID: 10770, guid: 0000000000000000f000000000000000, type: 0}
  - {fileID: 10782, guid: 0000000000000000f000000000000000, type: 0}
  - {fileID: 16000, guid: 0000000000000000f000000000000000, type: 0}
  - {fileID: 16001, guid: 0000000000000000f000000000000000, type: 0}
  m_PreloadedShaders: []
  m_SpritesDefaultMaterial: {fileID: 10754, guid: 0000000000000000f000000000000000,
    type: 0}
  m_CustomRenderPipeline: {fileID: 0}
  m_TransparencySortMode: 0
  m_TransparencySortAxis: {x: 0, y: 0, z: 1}
  m_DefaultRenderingPath: 1
  m_DefaultMobileRenderingPath: 1
  m_TierSettings:
  - serializedVersion: 4
    m_BuildTarget: 13
    m_Tier: 0
    m_Settings:
      standardShaderQuality: 2
      renderingPath: 1
      hdrMode: 1
      realtimeGICPUUsage: 25
      useReflectionProbeBoxProjection: 1
      useReflectionProbeBlending: 1
      useHDR: 1
      useDetailNormalMap: 0
      useCascadedShadowMaps: 1
      useDitherMaskForAlphaBlendedShadows: 0
    m_Automatic: 1
  m_LightmapStripping: 0
  m_FogStripping: 0
  m_InstancingStripping: 0
  m_LightmapKeepPlain: 1
  m_LightmapKeepDirCombined: 1
  m_LightmapKeepDynamicPlain: 1
  m_LightmapKeepDynamicDirCombined: 1
  m_LightmapKeepShadowMask: 1
  m_LightmapKeepSubtractive: 1
  m_FogKeepLinear: 1
  m_FogKeepExp: 1
  m_FogKeepExp2: 1
  m_AlbedoSwatchInfos: []
  m_LightsUseLinearIntensity: 0
  m_LightsUseColorTemperature: 0
");

//7. InputManager.asset
$InputManager_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!13 &1
InputManager:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Axes:
  - serializedVersion: 3
    m_Name: Horizontal
    descriptiveName:
    descriptiveNegativeName:
    negativeButton: left
    positiveButton: right
    altNegativeButton: a
    altPositiveButton: d
    gravity: 3
    dead: 0.001
    sensitivity: 3
    snap: 1
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Vertical
    descriptiveName:
    descriptiveNegativeName:
    negativeButton: down
    positiveButton: up
    altNegativeButton: s
    altPositiveButton: w
    gravity: 3
    dead: 0.001
    sensitivity: 3
    snap: 1
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Fire1
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: left ctrl
    altNegativeButton:
    altPositiveButton: mouse 0
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Fire2
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: left alt
    altNegativeButton:
    altPositiveButton: mouse 1
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Fire3
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: left shift
    altNegativeButton:
    altPositiveButton: mouse 2
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Jump
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: space
    altNegativeButton:
    altPositiveButton:
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Mouse X
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton:
    altNegativeButton:
    altPositiveButton:
    gravity: 0
    dead: 0
    sensitivity: 0.1
    snap: 0
    invert: 0
    type: 1
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Mouse Y
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton:
    altNegativeButton:
    altPositiveButton:
    gravity: 0
    dead: 0
    sensitivity: 0.1
    snap: 0
    invert: 0
    type: 1
    axis: 1
    joyNum: 0
  - serializedVersion: 3
    m_Name: Mouse ScrollWheel
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton:
    altNegativeButton:
    altPositiveButton:
    gravity: 0
    dead: 0
    sensitivity: 0.1
    snap: 0
    invert: 0
    type: 1
    axis: 2
    joyNum: 0
  - serializedVersion: 3
    m_Name: Horizontal
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton:
    altNegativeButton:
    altPositiveButton:
    gravity: 0
    dead: 0.19
    sensitivity: 1
    snap: 0
    invert: 0
    type: 2
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Vertical
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton:
    altNegativeButton:
    altPositiveButton:
    gravity: 0
    dead: 0.19
    sensitivity: 1
    snap: 0
    invert: 1
    type: 2
    axis: 1
    joyNum: 0
  - serializedVersion: 3
    m_Name: Fire1
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: joystick button 0
    altNegativeButton:
    altPositiveButton:
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Fire2
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: joystick button 1
    altNegativeButton:
    altPositiveButton:
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Fire3
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: joystick button 2
    altNegativeButton:
    altPositiveButton:
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Jump
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: joystick button 3
    altNegativeButton:
    altPositiveButton:
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Submit
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: return
    altNegativeButton:
    altPositiveButton: joystick button 0
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Submit
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: enter
    altNegativeButton:
    altPositiveButton: space
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
  - serializedVersion: 3
    m_Name: Cancel
    descriptiveName:
    descriptiveNegativeName:
    negativeButton:
    positiveButton: escape
    altNegativeButton:
    altPositiveButton: joystick button 1
    gravity: 1000
    dead: 0.001
    sensitivity: 1000
    snap: 0
    invert: 0
    type: 0
    axis: 0
    joyNum: 0
");

//8. NavMeshAreas.asset
$NavMeshAreas_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!126 &1
NavMeshProjectSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  areas:
  - name: Walkable
    cost: 1
  - name: Not Walkable
    cost: 1
  - name: Jump
    cost: 2
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
  - name:
    cost: 1
");

//9. NetworkManager.asset
$NetworkManager_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!149 &1
NetworkManager:
  m_ObjectHideFlags: 0
  m_DebugLevel: 0
  m_Sendrate: 15
  m_AssetToPrefab: {}
");

//10. Physics2DSettings.asset
$Physics2DSettings_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!19 &1
Physics2DSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Gravity: {x: 0, y: -9.81}
  m_DefaultMaterial: {fileID: 0}
  m_VelocityIterations: 8
  m_PositionIterations: 3
  m_VelocityThreshold: 1
  m_MaxLinearCorrection: 0.2
  m_MaxAngularCorrection: 8
  m_MaxTranslationSpeed: 100
  m_MaxRotationSpeed: 360
  m_MinPenetrationForPenalty: 0.01
  m_BaumgarteScale: 0.2
  m_BaumgarteTimeOfImpactScale: 0.75
  m_TimeToSleep: 0.5
  m_LinearSleepTolerance: 0.01
  m_AngularSleepTolerance: 2
  m_QueriesHitTriggers: 1
  m_QueriesStartInColliders: 1
  m_ChangeStopsCallbacks: 0
  m_AlwaysShowColliders: 0
  m_ShowColliderSleep: 1
  m_ShowColliderContacts: 0
  m_ShowColliderAABB: 0
  m_ContactArrowScale: 0.2
  m_ColliderAwakeColor: {r: 0.5686275, g: 0.95686275, b: 0.54509807, a: 0.7529412}
  m_ColliderAsleepColor: {r: 0.5686275, g: 0.95686275, b: 0.54509807, a: 0.36078432}
  m_ColliderContactColor: {r: 1, g: 0, b: 1, a: 0.6862745}
  m_ColliderAABBColor: {r: 1, g: 1, b: 0, a: 0.2509804}
  m_LayerCollisionMatrix: ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
");

//11. ProjectSettings.asset
$ProjectSettings_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!129 &1
PlayerSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 11
  productGUID: 9f962b8eaa7bce54abb4af740c31f44c
  AndroidProfiler: 0
  defaultScreenOrientation: 4
  targetDevice: 2
  useOnDemandResources: 0
  accelerometerFrequency: 60
  companyName: CERTH/ITI
  productName: Chemistry template
  defaultCursor: {fileID: 0}
  cursorHotspot: {x: 0, y: 0}
  m_SplashScreenBackgroundColor: {r: 0.13333334, g: 0.17254902, b: 0.21176471, a: 1}
  m_ShowUnitySplashScreen: 1
  m_ShowUnitySplashLogo: 1
  m_SplashScreenOverlayOpacity: 1
  m_SplashScreenAnimation: 1
  m_SplashScreenLogoStyle: 0
  m_SplashScreenDrawMode: 0
  m_SplashScreenBackgroundAnimationZoom: 1
  m_SplashScreenLogoAnimationZoom: 1
  m_SplashScreenBackgroundLandscapeAspect: 1
  m_SplashScreenBackgroundPortraitAspect: 1
  m_SplashScreenBackgroundLandscapeUvs:
    serializedVersion: 2
    x: 0
    y: 0
    width: 1
    height: 1
  m_SplashScreenBackgroundPortraitUvs:
    serializedVersion: 2
    x: 0
    y: 0
    width: 1
    height: 1
  m_SplashScreenLogos: []
  m_SplashScreenBackgroundLandscape: {fileID: 0}
  m_SplashScreenBackgroundPortrait: {fileID: 0}
  m_VirtualRealitySplashScreen: {fileID: 0}
  m_HolographicTrackingLossScreen: {fileID: 0}
  defaultScreenWidth: 1366
  defaultScreenHeight: 768
  defaultScreenWidthWeb: 1366
  defaultScreenHeightWeb: 768
  m_StereoRenderingPath: 0
  m_ActiveColorSpace: 0
  m_MTRendering: 1
  m_MobileMTRendering: 0
  m_StackTraceTypes: 020000000200000002000000020000000200000001000000
  iosShowActivityIndicatorOnLoading: -1
  androidShowActivityIndicatorOnLoading: -1
  tizenShowActivityIndicatorOnLoading: -1
  iosAppInBackgroundBehavior: 0
  displayResolutionDialog: 1
  iosAllowHTTPDownload: 1
  allowedAutorotateToPortrait: 1
  allowedAutorotateToPortraitUpsideDown: 1
  allowedAutorotateToLandscapeRight: 1
  allowedAutorotateToLandscapeLeft: 1
  useOSAutorotation: 1
  use32BitDisplayBuffer: 1
  disableDepthAndStencilBuffers: 0
  defaultIsFullScreen: 0
  defaultIsNativeResolution: 0
  runInBackground: 0
  captureSingleScreen: 0
  muteOtherAudioSources: 0
  Prepare IOS For Recording: 0
  submitAnalytics: 1
  usePlayerLog: 1
  bakeCollisionMeshes: 0
  forceSingleInstance: 0
  resizableWindow: 0
  useMacAppStoreValidation: 0
  gpuSkinning: 0
  graphicsJobs: 0
  xboxPIXTextureCapture: 0
  xboxEnableAvatar: 0
  xboxEnableKinect: 0
  xboxEnableKinectAutoTracking: 0
  xboxEnableFitness: 0
  visibleInBackground: 0
  allowFullscreenSwitch: 1
  graphicsJobMode: 0
  macFullscreenMode: 2
  d3d9FullscreenMode: 1
  d3d11FullscreenMode: 1
  xboxSpeechDB: 0
  xboxEnableHeadOrientation: 0
  xboxEnableGuest: 0
  xboxEnablePIXSampling: 0
  n3dsDisableStereoscopicView: 0
  n3dsEnableSharedListOpt: 1
  n3dsEnableVSync: 0
  ignoreAlphaClear: 0
  xboxOneResolution: 0
  xboxOneMonoLoggingLevel: 0
  xboxOneLoggingLevel: 1
  videoMemoryForVertexBuffers: 0
  psp2PowerMode: 0
  psp2AcquireBGM: 1
  wiiUTVResolution: 0
  wiiUGamePadMSAA: 1
  wiiUSupportsNunchuk: 0
  wiiUSupportsClassicController: 0
  wiiUSupportsBalanceBoard: 0
  wiiUSupportsMotionPlus: 0
  wiiUSupportsProController: 0
  wiiUAllowScreenCapture: 1
  wiiUControllerCount: 0
  m_SupportedAspectRatios:
    4:3: 0
    5:4: 0
    16:10: 1
    16:9: 1
    Others: 0
  bundleVersion: ___[game_version_number_dotted]___
  preloadedAssets: []
  metroInputSource: 0
  m_HolographicPauseOnTrackingLoss: 1
  xboxOneDisableKinectGpuReservation: 0
  xboxOneEnable7thCore: 0
  vrSettings:
    cardboard:
      depthFormat: 0
      enableTransitionView: 0
    daydream:
      depthFormat: 0
      useSustainedPerformanceMode: 0
    hololens:
      depthFormat: 1
  protectGraphicsMemory: 0
  useHDRDisplay: 0
  applicationIdentifier:
    Android: com.Company.ProductName
    Standalone: unity.CERTH/ITI.ChemistrySimulator
    Tizen: com.Company.ProductName
    iOS: com.Company.ProductName
    tvOS: com.Company.ProductName
  buildNumber:
    Standalone: ___[game_version_number]___
    iOS: ___[game_version_number]___
  AndroidBundleVersionCode: ___[game_version_number]___
  AndroidMinSdkVersion: 16
  AndroidTargetSdkVersion: 0
  AndroidPreferredInstallLocation: 1
  aotOptions:
  stripEngineCode: 1
  iPhoneStrippingLevel: 0
  iPhoneScriptCallOptimization: 0
  ForceInternetPermission: 0
  ForceSDCardPermission: 0
  CreateWallpaper: 0
  APKExpansionFiles: 0
  keepLoadedShadersAlive: 0
  StripUnusedMeshComponents: 0
  VertexChannelCompressionMask:
    serializedVersion: 2
    m_Bits: 238
  iPhoneSdkVersion: 988
  iOSTargetOSVersionString:
  tvOSSdkVersion: 0
  tvOSRequireExtendedGameController: 0
  tvOSTargetOSVersionString:
  uIPrerenderedIcon: 0
  uIRequiresPersistentWiFi: 0
  uIRequiresFullScreen: 1
  uIStatusBarHidden: 1
  uIExitOnSuspend: 0
  uIStatusBarStyle: 0
  iPhoneSplashScreen: {fileID: 0}
  iPhoneHighResSplashScreen: {fileID: 0}
  iPhoneTallHighResSplashScreen: {fileID: 0}
  iPhone47inSplashScreen: {fileID: 0}
  iPhone55inPortraitSplashScreen: {fileID: 0}
  iPhone55inLandscapeSplashScreen: {fileID: 0}
  iPadPortraitSplashScreen: {fileID: 0}
  iPadHighResPortraitSplashScreen: {fileID: 0}
  iPadLandscapeSplashScreen: {fileID: 0}
  iPadHighResLandscapeSplashScreen: {fileID: 0}
  appleTVSplashScreen: {fileID: 0}
  tvOSSmallIconLayers: []
  tvOSLargeIconLayers: []
  tvOSTopShelfImageLayers: []
  tvOSTopShelfImageWideLayers: []
  iOSLaunchScreenType: 0
  iOSLaunchScreenPortrait: {fileID: 0}
  iOSLaunchScreenLandscape: {fileID: 0}
  iOSLaunchScreenBackgroundColor:
    serializedVersion: 2
    rgba: 0
  iOSLaunchScreenFillPct: 100
  iOSLaunchScreenSize: 100
  iOSLaunchScreenCustomXibPath:
  iOSLaunchScreeniPadType: 0
  iOSLaunchScreeniPadImage: {fileID: 0}
  iOSLaunchScreeniPadBackgroundColor:
    serializedVersion: 2
    rgba: 0
  iOSLaunchScreeniPadFillPct: 100
  iOSLaunchScreeniPadSize: 100
  iOSLaunchScreeniPadCustomXibPath:
  iOSDeviceRequirements: []
  iOSURLSchemes: []
  iOSBackgroundModes: 0
  iOSMetalForceHardShadows: 0
  metalEditorSupport: 0
  metalAPIValidation: 1
  appleDeveloperTeamID:
  iOSManualSigningProvisioningProfileID:
  tvOSManualSigningProvisioningProfileID:
  appleEnableAutomaticSigning: 0
  AndroidTargetDevice: 0
  AndroidSplashScreenScale: 0
  androidSplashScreen: {fileID: 0}
  AndroidKeystoreName:
  AndroidKeyaliasName:
  AndroidTVCompatibility: 1
  AndroidIsGame: 1
  androidEnableBanner: 1
  m_AndroidBanners:
  - width: 320
    height: 180
    banner: {fileID: 0}
  androidGamepadSupportLevel: 0
  resolutionDialogBanner: {fileID: 0}
  m_BuildTargetIcons:
  - m_BuildTarget:
    m_Icons:
    - serializedVersion: 2
      m_Icon: {fileID: 2800000, guid: 8e2184ae8f39b5240a14a2e453a6de3d, type: 3}
      m_Width: 128
      m_Height: 128
  m_BuildTargetBatching: []
  m_BuildTargetGraphicsAPIs: []
  m_BuildTargetVRSettings: []
  openGLRequireES31: 0
  openGLRequireES31AEP: 0
  webPlayerTemplate: APPLICATION:Default
  m_TemplateCustomTags: {}
  wiiUTitleID: 0005000011000000
  wiiUGroupID: 00010000
  wiiUCommonSaveSize: 4096
  wiiUAccountSaveSize: 2048
  wiiUOlvAccessKey: 0
  wiiUTinCode: 0
  wiiUJoinGameId: 0
  wiiUJoinGameModeMask: 0000000000000000
  wiiUCommonBossSize: 0
  wiiUAccountBossSize: 0
  wiiUAddOnUniqueIDs: []
  wiiUMainThreadStackSize: 3072
  wiiULoaderThreadStackSize: 1024
  wiiUSystemHeapSize: 128
  wiiUTVStartupScreen: {fileID: 0}
  wiiUGamePadStartupScreen: {fileID: 0}
  wiiUDrcBufferDisabled: 0
  wiiUProfilerLibPath:
  actionOnDotNetUnhandledException: 1
  enableInternalProfiler: 0
  logObjCUncaughtExceptions: 1
  enableCrashReportAPI: 0
  cameraUsageDescription:
  locationUsageDescription:
  microphoneUsageDescription:
  switchNetLibKey:
  switchSocketMemoryPoolSize: 6144
  switchSocketAllocatorPoolSize: 128
  switchSocketConcurrencyLimit: 14
  switchUseCPUProfiler: 0
  switchApplicationID: 0x0005000C10000001
  switchNSODependencies:
  switchTitleNames_0:
  switchTitleNames_1:
  switchTitleNames_2:
  switchTitleNames_3:
  switchTitleNames_4:
  switchTitleNames_5:
  switchTitleNames_6:
  switchTitleNames_7:
  switchTitleNames_8:
  switchTitleNames_9:
  switchTitleNames_10:
  switchTitleNames_11:
  switchTitleNames_12:
  switchTitleNames_13:
  switchTitleNames_14:
  switchPublisherNames_0:
  switchPublisherNames_1:
  switchPublisherNames_2:
  switchPublisherNames_3:
  switchPublisherNames_4:
  switchPublisherNames_5:
  switchPublisherNames_6:
  switchPublisherNames_7:
  switchPublisherNames_8:
  switchPublisherNames_9:
  switchPublisherNames_10:
  switchPublisherNames_11:
  switchPublisherNames_12:
  switchPublisherNames_13:
  switchPublisherNames_14:
  switchIcons_0: {fileID: 0}
  switchIcons_1: {fileID: 0}
  switchIcons_2: {fileID: 0}
  switchIcons_3: {fileID: 0}
  switchIcons_4: {fileID: 0}
  switchIcons_5: {fileID: 0}
  switchIcons_6: {fileID: 0}
  switchIcons_7: {fileID: 0}
  switchIcons_8: {fileID: 0}
  switchIcons_9: {fileID: 0}
  switchIcons_10: {fileID: 0}
  switchIcons_11: {fileID: 0}
  switchIcons_12: {fileID: 0}
  switchIcons_13: {fileID: 0}
  switchIcons_14: {fileID: 0}
  switchSmallIcons_0: {fileID: 0}
  switchSmallIcons_1: {fileID: 0}
  switchSmallIcons_2: {fileID: 0}
  switchSmallIcons_3: {fileID: 0}
  switchSmallIcons_4: {fileID: 0}
  switchSmallIcons_5: {fileID: 0}
  switchSmallIcons_6: {fileID: 0}
  switchSmallIcons_7: {fileID: 0}
  switchSmallIcons_8: {fileID: 0}
  switchSmallIcons_9: {fileID: 0}
  switchSmallIcons_10: {fileID: 0}
  switchSmallIcons_11: {fileID: 0}
  switchSmallIcons_12: {fileID: 0}
  switchSmallIcons_13: {fileID: 0}
  switchSmallIcons_14: {fileID: 0}
  switchManualHTML:
  switchAccessibleURLs:
  switchLegalInformation:
  switchMainThreadStackSize: 1048576
  switchPresenceGroupId: 0x0005000C10000001
  switchLogoHandling: 0
  switchReleaseVersion: 0
  switchDisplayVersion: 1.0.0
  switchStartupUserAccount: 0
  switchTouchScreenUsage: 0
  switchSupportedLanguagesMask: 0
  switchLogoType: 0
  switchApplicationErrorCodeCategory:
  switchUserAccountSaveDataSize: 0
  switchUserAccountSaveDataJournalSize: 0
  switchAttribute: 0
  switchCardSpecSize: 4
  switchCardSpecClock: 25
  switchRatingsMask: 0
  switchRatingsInt_0: 0
  switchRatingsInt_1: 0
  switchRatingsInt_2: 0
  switchRatingsInt_3: 0
  switchRatingsInt_4: 0
  switchRatingsInt_5: 0
  switchRatingsInt_6: 0
  switchRatingsInt_7: 0
  switchRatingsInt_8: 0
  switchRatingsInt_9: 0
  switchRatingsInt_10: 0
  switchRatingsInt_11: 0
  switchLocalCommunicationIds_0: 0x0005000C10000001
  switchLocalCommunicationIds_1:
  switchLocalCommunicationIds_2:
  switchLocalCommunicationIds_3:
  switchLocalCommunicationIds_4:
  switchLocalCommunicationIds_5:
  switchLocalCommunicationIds_6:
  switchLocalCommunicationIds_7:
  switchParentalControl: 0
  switchAllowsScreenshot: 1
  switchDataLossConfirmation: 0
  ps4NPAgeRating: 12
  ps4NPTitleSecret:
  ps4NPTrophyPackPath:
  ps4ParentalLevel: 1
  ps4ContentID: ED1633-NPXX51362_00-0000000000000000
  ps4Category: 0
  ps4MasterVersion: 01.00
  ps4AppVersion: 01.00
  ps4AppType: 0
  ps4ParamSfxPath:
  ps4VideoOutPixelFormat: 0
  ps4VideoOutInitialWidth: 1920
  ps4VideoOutBaseModeInitialWidth: 1920
  ps4VideoOutReprojectionRate: 120
  ps4PronunciationXMLPath:
  ps4PronunciationSIGPath:
  ps4BackgroundImagePath:
  ps4StartupImagePath:
  ps4SaveDataImagePath:
  ps4SdkOverride:
  ps4BGMPath:
  ps4ShareFilePath:
  ps4ShareOverlayImagePath:
  ps4PrivacyGuardImagePath:
  ps4NPtitleDatPath:
  ps4RemotePlayKeyAssignment: -1
  ps4RemotePlayKeyMappingDir:
  ps4PlayTogetherPlayerCount: 0
  ps4EnterButtonAssignment: 1
  ps4ApplicationParam1: 0
  ps4ApplicationParam2: 0
  ps4ApplicationParam3: 0
  ps4ApplicationParam4: 0
  ps4DownloadDataSize: 0
  ps4GarlicHeapSize: 2048
  ps4ProGarlicHeapSize: 2560
  ps4Passcode: frAQBc8Wsa1xVPfvJcrgRYwTiizs2trQ
  ps4UseDebugIl2cppLibs: 0
  ps4pnSessions: 1
  ps4pnPresence: 1
  ps4pnFriends: 1
  ps4pnGameCustomData: 1
  playerPrefsSupport: 0
  restrictedAudioUsageRights: 0
  ps4UseResolutionFallback: 0
  ps4ReprojectionSupport: 0
  ps4UseAudio3dBackend: 0
  ps4SocialScreenEnabled: 0
  ps4ScriptOptimizationLevel: 3
  ps4Audio3dVirtualSpeakerCount: 14
  ps4attribCpuUsage: 0
  ps4PatchPkgPath:
  ps4PatchLatestPkgPath:
  ps4PatchChangeinfoPath:
  ps4PatchDayOne: 0
  ps4attribUserManagement: 0
  ps4attribMoveSupport: 0
  ps4attrib3DSupport: 0
  ps4attribShareSupport: 0
  ps4attribExclusiveVR: 0
  ps4disableAutoHideSplash: 0
  ps4videoRecordingFeaturesUsed: 0
  ps4contentSearchFeaturesUsed: 0
  ps4attribEyeToEyeDistanceSettingVR: 0
  ps4IncludedModules: []
  monoEnv:
  psp2Splashimage: {fileID: 0}
  psp2NPTrophyPackPath:
  psp2NPSupportGBMorGJP: 0
  psp2NPAgeRating: 12
  psp2NPTitleDatPath:
  psp2NPCommsID:
  psp2NPCommunicationsID:
  psp2NPCommsPassphrase:
  psp2NPCommsSig:
  psp2ParamSfxPath:
  psp2ManualPath:
  psp2LiveAreaGatePath:
  psp2LiveAreaBackroundPath:
  psp2LiveAreaPath:
  psp2LiveAreaTrialPath:
  psp2PatchChangeInfoPath:
  psp2PatchOriginalPackage:
  psp2PackagePassword: F69AzBlax3CF3EDNhm3soLBPh71Yexui
  psp2KeystoneFile:
  psp2MemoryExpansionMode: 0
  psp2DRMType: 0
  psp2StorageType: 0
  psp2MediaCapacity: 0
  psp2DLCConfigPath:
  psp2ThumbnailPath:
  psp2BackgroundPath:
  psp2SoundPath:
  psp2TrophyCommId:
  psp2TrophyPackagePath:
  psp2PackagedResourcesPath:
  psp2SaveDataQuota: 10240
  psp2ParentalLevel: 1
  psp2ShortTitle: Not Set
  psp2ContentID: IV0000-ABCD12345_00-0123456789ABCDEF
  psp2Category: 0
  psp2MasterVersion: 01.00
  psp2AppVersion: 01.00
  psp2TVBootMode: 0
  psp2EnterButtonAssignment: 2
  psp2TVDisableEmu: 0
  psp2AllowTwitterDialog: 1
  psp2Upgradable: 0
  psp2HealthWarning: 0
  psp2UseLibLocation: 0
  psp2InfoBarOnStartup: 0
  psp2InfoBarColor: 0
  psp2UseDebugIl2cppLibs: 0
  psmSplashimage: {fileID: 0}
  splashScreenBackgroundSourceLandscape: {fileID: 0}
  splashScreenBackgroundSourcePortrait: {fileID: 0}
  spritePackerPolicy:
  webGLMemorySize: 800
  webGLExceptionSupport: 0
  webGLNameFilesAsHashes: 0
  webGLDataCaching: 0
  webGLDebugSymbols: 0
  webGLEmscriptenArgs:
  webGLModulesDirectory:
  webGLTemplate: APPLICATION:Minimal
  webGLAnalyzeBuildSize: 0
  webGLUseEmbeddedResources: 0
  webGLUseWasm: 0
  webGLCompressionFormat: 1
  scriptingDefineSymbols:
    1: CROSS_PLATFORM_INPUT
    4: CROSS_PLATFORM_INPUT;MOBILE_INPUT
    7: CROSS_PLATFORM_INPUT;MOBILE_INPUT
    13:
    14: MOBILE_INPUT
    17: MOBILE_INPUT
    20: MOBILE_INPUT
    22: MOBILE_INPUT
  platformArchitecture: {}
  scriptingBackend: {}
  incrementalIl2cppBuild: {}
  additionalIl2CppArgs:
  apiCompatibilityLevelPerPlatform: {}
  m_RenderingPath: 1
  m_MobileRenderingPath: 1
  metroPackageName: Chemistry template
  metroPackageVersion: ___[game_version_number_dotted]___
  metroCertificatePath:
  metroCertificatePassword:
  metroCertificateSubject:
  metroCertificateIssuer:
  metroCertificateNotAfter: 0000000000000000
  metroApplicationDescription: Chemistry template
  wsaImages: {}
  metroTileShortName:
  metroCommandLineArgsFile:
  metroTileShowName: 0
  metroMediumTileShowName: 0
  metroLargeTileShowName: 0
  metroWideTileShowName: 0
  metroDefaultTileSize: 1
  metroTileForegroundText: 2
  metroTileBackgroundColor: {r: 0.13333334, g: 0.17254902, b: 0.21568628, a: 0}
  metroSplashScreenBackgroundColor: {r: 0.12941177, g: 0.17254902, b: 0.21568628,
    a: 1}
  metroSplashScreenUseBackgroundColor: 0
  platformCapabilities: {}
  metroFTAName:
  metroFTAFileTypes: []
  metroProtocolName:
  metroCompilationOverrides: 1
  tizenProductDescription:
  tizenProductURL:
  tizenSigningProfileName:
  tizenGPSPermissions: 0
  tizenMicrophonePermissions: 0
  tizenDeploymentTarget:
  tizenDeploymentTargetType: 0
  tizenMinOSVersion: 0
  n3dsUseExtSaveData: 0
  n3dsCompressStaticMem: 1
  n3dsExtSaveDataNumber: 0x12345
  n3dsStackSize: 131072
  n3dsTargetPlatform: 2
  n3dsRegion: 7
  n3dsMediaSize: 0
  n3dsLogoStyle: 3
  n3dsTitle: GameName
  n3dsProductCode:
  n3dsApplicationId: 0xFF3FF
  stvDeviceAddress:
  stvProductDescription:
  stvProductAuthor:
  stvProductAuthorEmail:
  stvProductLink:
  stvProductCategory: 0
  XboxOneProductId:
  XboxOneUpdateKey:
  XboxOneSandboxId:
  XboxOneContentId:
  XboxOneTitleId:
  XboxOneSCId:
  XboxOneGameOsOverridePath:
  XboxOnePackagingOverridePath:
  XboxOneAppManifestOverridePath:
  XboxOnePackageEncryption: 0
  XboxOnePackageUpdateGranularity: 2
  XboxOneDescription:
  XboxOneLanguage:
  - enus
  XboxOneCapability: []
  XboxOneGameRating: {}
  XboxOneIsContentPackage: 0
  XboxOneEnableGPUVariability: 0
  XboxOneSockets: {}
  XboxOneSplashScreen: {fileID: 0}
  XboxOneAllowedProductIds: []
  XboxOnePersistentLocalStorageSize: 0
  xboxOneScriptCompiler: 0
  vrEditorSettings:
    daydream:
      daydreamIconForeground: {fileID: 0}
      daydreamIconBackground: {fileID: 0}
  cloudServicesEnabled:
    UNet: 1
  facebookSdkVersion: 7.9.1
  apiCompatibilityLevel: 2
  cloudProjectId: c0e995de-3a89-4b34-be1b-6cfa969e7463
  projectName: Chemistry template
  organizationId: pan_migo
  cloudEnabled: 0
  enableNewInputSystem: 0
");

//12. ProjectVersion.asset
$ProjectVersion_asset3 = array("m_EditorVersion: 5.6.0f3
");

//13. QualitySettings.asset
$QualitySettings_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!47 &1
QualitySettings:
  m_ObjectHideFlags: 0
  serializedVersion: 5
  m_CurrentQuality: 3
  m_QualitySettings:
  - serializedVersion: 2
    name: Fastest
    pixelLightCount: 4
    shadows: 0
    shadowResolution: 0
    shadowProjection: 1
    shadowCascades: 1
    shadowDistance: 15
    shadowNearPlaneOffset: 3
    shadowCascade2Split: 0.33333334
    shadowCascade4Split: {x: 0.06666667, y: 0.2, z: 0.46666667}
    blendWeights: 1
    textureQuality: 1
    anisotropicTextures: 0
    antiAliasing: 0
    softParticles: 0
    softVegetation: 0
    realtimeReflectionProbes: 0
    billboardsFaceCameraPosition: 0
    vSyncCount: 0
    lodBias: 0.3
    maximumLODLevel: 1
    particleRaycastBudget: 4
    asyncUploadTimeSlice: 2
    asyncUploadBufferSize: 4
    excludedTargetPlatforms: []
  - serializedVersion: 2
    name: Fast
    pixelLightCount: 0
    shadows: 0
    shadowResolution: 0
    shadowProjection: 1
    shadowCascades: 1
    shadowDistance: 20
    shadowNearPlaneOffset: 3
    shadowCascade2Split: 0.33333334
    shadowCascade4Split: {x: 0.06666667, y: 0.2, z: 0.46666667}
    blendWeights: 2
    textureQuality: 0
    anisotropicTextures: 0
    antiAliasing: 0
    softParticles: 0
    softVegetation: 0
    realtimeReflectionProbes: 0
    billboardsFaceCameraPosition: 0
    vSyncCount: 0
    lodBias: 0.4
    maximumLODLevel: 0
    particleRaycastBudget: 16
    asyncUploadTimeSlice: 2
    asyncUploadBufferSize: 4
    excludedTargetPlatforms: []
  - serializedVersion: 2
    name: Simple
    pixelLightCount: 1
    shadows: 0
    shadowResolution: 0
    shadowProjection: 1
    shadowCascades: 1
    shadowDistance: 20
    shadowNearPlaneOffset: 3
    shadowCascade2Split: 0.33333334
    shadowCascade4Split: {x: 0.06666667, y: 0.2, z: 0.46666667}
    blendWeights: 2
    textureQuality: 0
    anisotropicTextures: 1
    antiAliasing: 0
    softParticles: 0
    softVegetation: 0
    realtimeReflectionProbes: 0
    billboardsFaceCameraPosition: 0
    vSyncCount: 1
    lodBias: 0.7
    maximumLODLevel: 0
    particleRaycastBudget: 64
    asyncUploadTimeSlice: 2
    asyncUploadBufferSize: 4
    excludedTargetPlatforms: []
  - serializedVersion: 2
    name: Good
    pixelLightCount: 2
    shadows: 2
    shadowResolution: 1
    shadowProjection: 1
    shadowCascades: 2
    shadowDistance: 50
    shadowNearPlaneOffset: 3
    shadowCascade2Split: 0.33333334
    shadowCascade4Split: {x: 0.06666667, y: 0.2, z: 0.46666667}
    blendWeights: 2
    textureQuality: 0
    anisotropicTextures: 1
    antiAliasing: 0
    softParticles: 0
    softVegetation: 1
    realtimeReflectionProbes: 0
    billboardsFaceCameraPosition: 1
    vSyncCount: 1
    lodBias: 1
    maximumLODLevel: 0
    particleRaycastBudget: 256
    asyncUploadTimeSlice: 2
    asyncUploadBufferSize: 4
    excludedTargetPlatforms: []
  - serializedVersion: 2
    name: Beautiful
    pixelLightCount: 3
    shadows: 2
    shadowResolution: 2
    shadowProjection: 1
    shadowCascades: 2
    shadowDistance: 120
    shadowNearPlaneOffset: 3
    shadowCascade2Split: 0.33333334
    shadowCascade4Split: {x: 0.06666667, y: 0.2, z: 0.46666667}
    blendWeights: 4
    textureQuality: 0
    anisotropicTextures: 2
    antiAliasing: 2
    softParticles: 1
    softVegetation: 1
    realtimeReflectionProbes: 1
    billboardsFaceCameraPosition: 1
    vSyncCount: 0
    lodBias: 1.5
    maximumLODLevel: 0
    particleRaycastBudget: 1024
    asyncUploadTimeSlice: 2
    asyncUploadBufferSize: 4
    excludedTargetPlatforms: []
  - serializedVersion: 2
    name: Fantastic
    pixelLightCount: 4
    shadows: 2
    shadowResolution: 0
    shadowProjection: 1
    shadowCascades: 4
    shadowDistance: 150
    shadowNearPlaneOffset: 3
    shadowCascade2Split: 0.33333334
    shadowCascade4Split: {x: 0.06666667, y: 0.2, z: 0.46666667}
    blendWeights: 4
    textureQuality: 0
    anisotropicTextures: 2
    antiAliasing: 2
    softParticles: 0
    softVegetation: 1
    realtimeReflectionProbes: 1
    billboardsFaceCameraPosition: 1
    vSyncCount: 0
    lodBias: 2
    maximumLODLevel: 0
    particleRaycastBudget: 4096
    asyncUploadTimeSlice: 2
    asyncUploadBufferSize: 4
    excludedTargetPlatforms: []
  m_PerPlatformDefaultQuality:
    Android: 3
    Nintendo 3DS: 5
    PS4: 5
    PSM: 5
    PSP2: 2
    Samsung TV: 2
    Standalone: 3
    Tizen: 2
    Web: 5
    WebGL: 3
    WiiU: 5
    Windows Store Apps: 5
    XboxOne: 5
    iPhone: 2
    tvOS: 5
");

//14. TagManager.asset
$TagManager_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!78 &1
TagManager:
  serializedVersion: 2
  tags:
  - consumer
  - producer
  - terrain
  - producer_mesh
  layers:
  - Default
  - TransparentFX
  - Ignore Raycast
  -
  - Water
  - UI
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  -
  m_SortingLayers:
  - name: Default
    uniqueID: 0
    locked: 0
");

//15. TimeManager.asset
$TimeManager_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!5 &1
TimeManager:
  m_ObjectHideFlags: 0
  Fixed Timestep: 0.02
  Maximum Allowed Timestep: 0.33333334
  m_TimeScale: 1
  Maximum Particle Timestep: 0.03
");

//16. UnityConnect.asset
$UnityConnect_asset3 = array("%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!310 &1
UnityConnectSettings:
  m_ObjectHideFlags: 0
  m_Enabled: 0
  m_TestMode: 0
  m_TestEventUrl:
  m_TestConfigUrl:
  CrashReportingSettings:
    m_EventUrl: https://perf-events.cloud.unity3d.com/api/events/crashes
    m_Enabled: 0
    m_CaptureEditorExceptions: 1
  UnityPurchasingSettings:
    m_Enabled: 0
    m_TestMode: 0
  UnityAnalyticsSettings:
    m_Enabled: 1
    m_InitializeOnStartup: 1
    m_TestMode: 0
    m_TestEventUrl:
    m_TestConfigUrl:
  UnityAdsSettings:
    m_Enabled: 0
    m_InitializeOnStartup: 1
    m_TestMode: 0
    m_EnabledPlatforms: 4294967295
    m_IosGameId:
    m_AndroidGameId:
");

function wpunity_default_value_AudioManager_chemistry_get(){
    global $AudioManager_asset3;
    return $AudioManager_asset3[0];
}

function wpunity_default_value_ClusterInputManager_chemistry_get(){
    global $ClusterInputManager_asset3;
    return $ClusterInputManager_asset3[0];
}

function wpunity_default_value_DynamicsManager_chemistry_get(){
    global $DynamicsManager_asset3;
    return $DynamicsManager_asset3[0];
}

function wpunity_default_value_EditorBuildSettings_chemistry_get(){
    global $EditorBuildSettings_asset3;
    return $EditorBuildSettings_asset3[0];
}

function wpunity_default_value_EditorSettings_chemistry_get(){
    global $EditorSettings_asset3;
    return $EditorSettings_asset3[0];
}

function wpunity_default_value_GraphicsSettings_chemistry_get(){
    global $GraphicsSettings_asset3;
    return $GraphicsSettings_asset3[0];
}

function wpunity_default_value_InputManager_chemistry_get(){
    global $InputManager_asset3;
    return $InputManager_asset3[0];
}

function wpunity_default_value_NavMeshAreas_chemistry_get(){
    global $NavMeshAreas_asset3;
    return $NavMeshAreas_asset3[0];
}

function wpunity_default_value_NetworkManager_chemistry_get(){
    global $NetworkManager_asset3;
    return $NetworkManager_asset3[0];
}

function wpunity_default_value_Physics2DSettings_chemistry_get(){
    global $Physics2DSettings_asset3;
    return $Physics2DSettings_asset3[0];
}

function wpunity_default_value_ProjectSettings_chemistry_get(){
    global $ProjectSettings_asset3;
    return $ProjectSettings_asset3[0];
}

function wpunity_default_value_ProjectVersion_chemistry_get(){
    global $ProjectVersion_asset3;
    return $ProjectVersion_asset3[0];
}

function wpunity_default_value_QualitySettings_chemistry_get(){
    global $QualitySettings_asset3;
    return $QualitySettings_asset3[0];
}

function wpunity_default_value_TagManager_chemistry_get(){
    global $TagManager_asset3;
    return $TagManager_asset3[0];
}

function wpunity_default_value_TimeManager_chemistry_get(){
    global $TimeManager_asset3;
    return $TimeManager_asset3[0];
}

function wpunity_default_value_unityConnect_chemistry_get(){
    global $UnityConnect_asset3;
    return $UnityConnect_asset3[0];
}


/***************************************************************************************************************/
// YAMLS for SCENES default values (CHEMISTRY GAMES)
/***************************************************************************************************************/

global $ini_scene_chemistry_unity_pattern,$ini_scene_main_menu_chem_unity_pattern,$ini_scene_credits_chem_unity_pattern,$ini_scene_options_chem_unity_pattern,$ini_scene_help_chem_unity_pattern;
global $ini_scene_login_chem_unity_pattern,$ini_scene_reward_chem_unity_pattern,$ini_scene_selector_chem_unity_pattern,$ini_scene_selector_chem_unity_pattern2,$ini_scene_selector_chem_text;
global $ini_scene_chem_exam,$ini_scene_chem_exam3d;

$ini_scene_chemistry_unity_pattern = array('%YAML 1.1
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
  serializedVersion: 8
  m_Fog: 0
  m_FogColor: {r: 0.5, g: 0.5, b: 0.5, a: 1}
  m_FogMode: 3
  m_FogDensity: 0.01
  m_LinearFogStart: 0
  m_LinearFogEnd: 300
  m_AmbientSkyColor: {r: 0.20588237, g: 0.20588237, b: 0.20588237, a: 1}
  m_AmbientEquatorColor: {r: 0.114, g: 0.125, b: 0.133, a: 1}
  m_AmbientGroundColor: {r: 0.047, g: 0.043, b: 0.035, a: 1}
  m_AmbientIntensity: 1
  m_AmbientMode: 3
  m_SubtractiveShadowColor: {r: 0.42, g: 0.478, b: 0.627, a: 1}
  m_SkyboxMaterial: {fileID: 0}
  m_HaloStrength: 0.5
  m_FlareStrength: 1
  m_FlareFadeSpeed: 3
  m_HaloTexture: {fileID: 0}
  m_SpotCookie: {fileID: 10001, guid: 0000000000000000e000000000000000, type: 0}
  m_DefaultReflectionMode: 0
  m_DefaultReflectionResolution: 128
  m_ReflectionBounces: 2
  m_ReflectionIntensity: 1
  m_CustomReflection: {fileID: 0}
  m_Sun: {fileID: 1630605514}
  m_IndirectSpecularColor: {r: 0, g: 0, b: 0, a: 1}
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 11
  m_GIWorkflowMode: 1
  m_GISettings:
    serializedVersion: 2
    m_BounceScale: 1
    m_IndirectOutputScale: 1
    m_AlbedoBoost: 1
    m_TemporalCoherenceThreshold: 1
    m_EnvironmentLightingMode: 0
    m_EnableBakedLightmaps: 1
    m_EnableRealtimeLightmaps: 0
  m_LightmapEditorSettings:
    serializedVersion: 9
    m_Resolution: 2
    m_BakeResolution: 100
    m_TextureWidth: 1024
    m_TextureHeight: 1024
    m_AO: 1
    m_AOMaxDistance: 1
    m_CompAOExponent: 0.1
    m_CompAOExponentDirect: 0
    m_Padding: 2
    m_LightmapParameters: {fileID: 0}
    m_LightmapsBakeMode: 0
    m_TextureCompression: 1
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
    m_MixedBakeMode: 0
    m_BakeBackend: 0
    m_PVRSampling: 1
    m_PVRDirectSampleCount: 32
    m_PVRSampleCount: 500
    m_PVRBounces: 2
    m_PVRFilterTypeDirect: 0
    m_PVRFilterTypeIndirect: 0
    m_PVRFilterTypeAO: 0
    m_PVRFilteringMode: 1
    m_PVRCulling: 1
    m_PVRFilteringGaussRadiusDirect: 1
    m_PVRFilteringGaussRadiusIndirect: 5
    m_PVRFilteringGaussRadiusAO: 2
    m_PVRFilteringAtrousPositionSigmaDirect: 0.5
    m_PVRFilteringAtrousPositionSigmaIndirect: 2
    m_PVRFilteringAtrousPositionSigmaAO: 1
    m_ShowResolutionOverlay: 1
  m_LightingDataAsset: {fileID: 112000002, guid: 09a3c67cbfb3fb948aabde800213f10c,
    type: 2}
  m_UseShadowmask: 0
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
    manualTileSize: 0
    tileSize: 256
    accuratePlacement: 0
    debug:
      m_Flags: 0
  m_NavMeshData: {fileID: 0}
--- !u!1001 &11434017
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_RootOrder
      value: 7
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &17869497
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 17869498}
  - component: {fileID: 17869500}
  - component: {fileID: 17869499}
  m_Layer: 0
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &17869498
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 17869497}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 652472751}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &17869499
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 17869497}
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
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Exit
--- !u!222 &17869500
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 17869497}
--- !u!1 &23288342
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 23288343}
  m_Layer: 0
  m_Name: UI
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 0
--- !u!4 &23288343
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 23288342}
  m_LocalRotation: {x: -0, y: -0, z: 0.7071068, w: 0.7071068}
  m_LocalPosition: {x: -6.292, y: 0.7923398, z: -1.397}
  m_LocalScale: {x: 0.0015689386, y: 0.19861545, z: 0.15236689}
  m_Children:
  - {fileID: 254591997}
  - {fileID: 644841730}
  - {fileID: 1029511692}
  - {fileID: 930532926}
  - {fileID: 1048944794}
  - {fileID: 923116936}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &41414292
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1043656701655704, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 41414293}
  - component: {fileID: 41414294}
  - component: {fileID: 41414295}
  m_Layer: 5
  m_Name: ExperienceBar
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &41414293
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 224803102802180380, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 41414292}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0}
  m_LocalScale: {x: 1.6237981, y: 1.6237981, z: 1.6237974}
  m_Children:
  - {fileID: 824322023}
  - {fileID: 2133277385}
  m_Father: {fileID: 254591997}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 1}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: 125.97998, y: -17.20996}
  m_SizeDelta: {x: 153.31, y: 32.87}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &41414294
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 41414292}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -113659843, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Navigation:
    m_Mode: 3
    m_SelectOnUp: {fileID: 0}
    m_SelectOnDown: {fileID: 0}
    m_SelectOnLeft: {fileID: 0}
    m_SelectOnRight: {fileID: 0}
  m_Transition: 0
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
  m_Interactable: 0
  m_TargetGraphic: {fileID: 0}
  m_FillRect: {fileID: 452081523}
  m_HandleRect: {fileID: 0}
  m_Direction: 0
  m_MinValue: 0
  m_MaxValue: 1
  m_WholeNumbers: 0
  m_Value: 0
  m_OnValueChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.Slider+SliderEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &41414295
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 41414292}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 25c4bad082e99e340964341377271148, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  experienceBar: {fileID: 41414294}
  progress: 0
--- !u!114 &227587222 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
    type: 2}
  m_PrefabInternal: {fileID: 1299265851}
  m_Script: {fileID: 11500000, guid: 8d74cc27ebd56d54ebf3e953b25846bc, type: 3}
--- !u!1 &234069946
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 234069947}
  - component: {fileID: 234069949}
  - component: {fileID: 234069948}
  m_Layer: 0
  m_Name: Clipboard
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &234069947
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 234069946}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0}
  m_LocalScale: {x: 0.99984443, y: 1.0749979, z: 1}
  m_Children:
  - {fileID: 492682089}
  - {fileID: 1360684726}
  - {fileID: 969258634}
  - {fileID: 652472751}
  - {fileID: 2137086219}
  - {fileID: 2022894145}
  m_Father: {fileID: 888602104}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0.0000260439, y: -0.0000112061625}
  m_SizeDelta: {x: 634.1, y: 671.6}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &234069948
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 234069946}
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
  m_Sprite: {fileID: 21300000, guid: 7614738818b940d43a2b725de081f4f8, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &234069949
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 234069946}
--- !u!1 &244584438
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 244584439}
  - component: {fileID: 244584441}
  - component: {fileID: 244584440}
  m_Layer: 0
  m_Name: Molecule construction
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &244584439
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 244584438}
  m_LocalRotation: {x: 0.117034726, y: 0, z: 0, w: 0.9931278}
  m_LocalPosition: {x: 0, y: 0, z: 2.6033}
  m_LocalScale: {x: 0.0018858506, y: 0.003368009, z: 0.00310366}
  m_Children: []
  m_Father: {fileID: 644841730}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 13.442, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -515.33545, y: -383.0327}
  m_SizeDelta: {x: 148.45364, y: 30}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &244584440
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 244584438}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 323ac1ea6ff04144f9f5b613bfbc5597, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: _MOLECULE CONSTRUCTION
--- !u!222 &244584441
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 244584438}
--- !u!1 &254591996
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 254591997}
  - component: {fileID: 254592000}
  - component: {fileID: 254591999}
  - component: {fileID: 254591998}
  - component: {fileID: 254592001}
  m_Layer: 0
  m_Name: CrossHair
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &254591997
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 254591996}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1358169866}
  - {fileID: 41414293}
  m_Father: {fileID: 23288343}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: -90.00001}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!114 &254591998
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 254591996}
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
--- !u!114 &254591999
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 254591996}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1920, y: 1080}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0.5
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &254592000
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 254591996}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 0
  m_Camera: {fileID: 0}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 0
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!114 &254592001
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 254591996}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 3c73ece55b7f59249a56ee4af78e01b1, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!1 &262028280
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 262028281}
  - component: {fileID: 262028283}
  - component: {fileID: 262028282}
  m_Layer: 0
  m_Name: /
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &262028281
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 262028280}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0.0000001453084}
  m_LocalScale: {x: 0.9999961, y: 1.0000025, z: 1}
  m_Children: []
  m_Father: {fileID: 1360684726}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -4.9, y: -41.4}
  m_SizeDelta: {x: 55.8, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &262028282
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 262028280}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 30
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 3
    m_MaxSize: 50
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: /
--- !u!222 &262028283
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 262028280}
--- !u!1 &264362978
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1157954905077308, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 264362979}
  - component: {fileID: 264362981}
  - component: {fileID: 264362980}
  - component: {fileID: 264362982}
  m_Layer: 0
  m_Name: ConstructionMolecules Laptop
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &264362979
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 224037044209590816, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 264362978}
  m_LocalRotation: {x: 0.12747139, y: 0, z: 0, w: 0.9918423}
  m_LocalPosition: {x: 0, y: 0, z: 2.5824}
  m_LocalScale: {x: 0.0016600012, y: 0.0022000072, z: 0.0020099953}
  m_Children: []
  m_Father: {fileID: 2113157783}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 14.647, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -3.2421, y: 0.8787}
  m_SizeDelta: {x: 54.3489, y: 34.6475}
  m_Pivot: {x: 0.49999648, y: 0.49982965}
--- !u!114 &264362980
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114948631462999342, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 264362978}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0.40770754, b: 0.88235295, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 12800000, guid: 323ac1ea6ff04144f9f5b613bfbc5597, type: 3}
    m_FontSize: 20
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
  m_Text: 10
--- !u!222 &264362981
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 222180066259362708, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 264362978}
--- !u!114 &264362982
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 264362978}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 44500d042e762e7469e55904f68a3808, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  type: 2
--- !u!1 &269605901
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 269605902}
  - component: {fileID: 269605904}
  - component: {fileID: 269605903}
  m_Layer: 0
  m_Name: Clipboard
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &269605902
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 269605901}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0}
  m_LocalScale: {x: 0.99984384, y: 1.0749974, z: 1}
  m_Children:
  - {fileID: 717883348}
  - {fileID: 970602282}
  - {fileID: 1788685331}
  - {fileID: 1180643130}
  - {fileID: 1395017517}
  m_Father: {fileID: 1029511692}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 16.6, y: 18.6}
  m_SizeDelta: {x: 485.7, y: 528.3}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &269605903
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 269605901}
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
  m_Sprite: {fileID: 21300000, guid: 7614738818b940d43a2b725de081f4f8, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &269605904
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 269605901}
--- !u!1 &311545214
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1336488501771788, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 311545215}
  m_Layer: 0
  m_Name: ScoreTextNaming
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!4 &311545215
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 4305854066270894, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 311545214}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: -511.9939, y: -383.99997, z: 0}
  m_LocalScale: {x: 1.0000006, y: 1.0000005, z: 0.99999994}
  m_Children:
  - {fileID: 897015029}
  - {fileID: 734374269}
  m_Father: {fileID: 644841730}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &379399023
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 379399024}
  - component: {fileID: 379399026}
  - component: {fileID: 379399025}
  m_Layer: 0
  m_Name: Molecule naming
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &379399024
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 379399023}
  m_LocalRotation: {x: 0.07698667, y: -0.70290333, z: 0.07698667, w: 0.70290333}
  m_LocalPosition: {x: 0, y: 0, z: -1.5981}
  m_LocalScale: {x: 0.002382019, y: 0.00314346, z: 0.0028700004}
  m_Children: []
  m_Father: {fileID: 644841730}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 12.501, y: -90, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -518.4285, y: -383.036}
  m_SizeDelta: {x: 112.9105, y: 30}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &379399025
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 379399023}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 323ac1ea6ff04144f9f5b613bfbc5597, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: _MOLECULE NAMING
--- !u!222 &379399026
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 379399023}
--- !u!1001 &428077947
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: badges.Array.size
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 4131707223909558, guid: fa863ece858329f42b1ace19851feec8, type: 2}
      propertyPath: m_LocalPosition.x
      value: 459.2694
      objectReference: {fileID: 0}
    - target: {fileID: 4131707223909558, guid: fa863ece858329f42b1ace19851feec8, type: 2}
      propertyPath: m_LocalPosition.y
      value: 293.04407
      objectReference: {fileID: 0}
    - target: {fileID: 4131707223909558, guid: fa863ece858329f42b1ace19851feec8, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.6104708
      objectReference: {fileID: 0}
    - target: {fileID: 4131707223909558, guid: fa863ece858329f42b1ace19851feec8, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4131707223909558, guid: fa863ece858329f42b1ace19851feec8, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4131707223909558, guid: fa863ece858329f42b1ace19851feec8, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4131707223909558, guid: fa863ece858329f42b1ace19851feec8, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4131707223909558, guid: fa863ece858329f42b1ace19851feec8, type: 2}
      propertyPath: m_RootOrder
      value: 8
      objectReference: {fileID: 0}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: namedMols
      value:
      objectReference: {fileID: 1347428891}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: constructedMols
      value:
      objectReference: {fileID: 1769743126}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: sumMolsNaming
      value:
      objectReference: {fileID: 451744096}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: sumMolsConstruction
      value:
      objectReference: {fileID: 1091782385}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: badge
      value:
      objectReference: {fileID: 2121082392}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: logText
      value:
      objectReference: {fileID: 969258635}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: scoreCanvas
      value:
      objectReference: {fileID: 888602103}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: player
      value:
      objectReference: {fileID: 806409090}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: logTexts.Array.data[0]
      value: "The number of exercises you solved in both quizzes is not what I expected.
        I believe you can do better, give it another try.  You have been awarded the
        "Chemistry lab assistant" badge. "
      objectReference: {fileID: 0}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: logTexts.Array.data[1]
      value: Good job, you have completed a sufficient number of exercises in both
        quizzes. However, I believe you can go further more.  You have been awarded
        the "Chemistry lab scientist" badge.
      objectReference: {fileID: 0}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: logTexts.Array.data[3]
      value: Not much to say I am impressed, not many students have come this far.
        Great work!!!!!!   You have been awarded the "Lab master" badge.
      objectReference: {fileID: 0}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: logTexts.Array.data[2]
      value: Excellent, you have managed to solve most exercises in the lab. One more
        step further and you will reach the top.  You have been awarded the "Senior
        chemistry lab scientist" badge.
      objectReference: {fileID: 0}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: badges.Array.data[3]
      value:
      objectReference: {fileID: 21300000, guid: b1da4a4f0c07520499d4faa043d8152f,
        type: 3}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: badges.Array.data[0]
      value:
      objectReference: {fileID: 21300000, guid: 377da06c9bb04ca4d8815cd211f3fa99,
        type: 3}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: badges.Array.data[1]
      value:
      objectReference: {fileID: 21300000, guid: 003a2ae2198b17f4b897fd3284f6cc63,
        type: 3}
    - target: {fileID: 114016839438512074, guid: fa863ece858329f42b1ace19851feec8,
        type: 2}
      propertyPath: badges.Array.data[2]
      value:
      objectReference: {fileID: 21300000, guid: cca7ca9ef3e17bb4a8ecd69aad556274,
        type: 3}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: fa863ece858329f42b1ace19851feec8, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &451744094
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 451744095}
  - component: {fileID: 451744097}
  - component: {fileID: 451744096}
  m_Layer: 0
  m_Name: namedMoleculesSum
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &451744095
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 451744094}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 492682089}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 55.8001, y: -46.22497}
  m_SizeDelta: {x: 65.6, y: 77.15}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &451744096
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 451744094}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 30
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 3
    m_MaxSize: 50
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: 10
--- !u!222 &451744097
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 451744094}
--- !u!1 &452081522
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1601305634339368, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 452081523}
  - component: {fileID: 452081525}
  - component: {fileID: 452081524}
  m_Layer: 5
  m_Name: Fill
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &452081523
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 452081522}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 2133277385}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: -1.9250042, y: 0}
  m_SizeDelta: {x: 3.85, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &452081524
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114829411635275902, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 452081522}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 1, b: 0.048275948, a: 1}
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
--- !u!222 &452081525
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 222836346231363092, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 452081522}
--- !u!1 &492682088
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 492682089}
  - component: {fileID: 492682091}
  - component: {fileID: 492682090}
  m_Layer: 0
  m_Name: NamedMoleculs
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &492682089
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 492682088}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1280055315}
  - {fileID: 451744095}
  - {fileID: 1443264901}
  - {fileID: 1347428890}
  m_Father: {fileID: 234069947}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.00010035487, y: 139.36612}
  m_SizeDelta: {x: 0, y: -545.3}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &492682090
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 492682088}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 0}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &492682091
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 492682088}
--- !u!1 &531500777
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 531500778}
  - component: {fileID: 531500780}
  - component: {fileID: 531500779}
  m_Layer: 0
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &531500778
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 531500777}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1431218768}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 3.200119, y: 1.2500076}
  m_SizeDelta: {x: 323.5, y: 49}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &531500779
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 531500777}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
    m_Font: {fileID: 12800000, guid: 2c4cdebb88651be4e912c89ea02468e3, type: 3}
    m_FontSize: 29
    m_FontStyle: 1
    m_BestFit: 0
    m_MinSize: 2
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Press " E " to interact
--- !u!222 &531500780
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 531500777}
--- !u!1001 &593444607
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.x
      value: 1.389278
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.y
      value: -0.064435095
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.z
      value: 89.94141
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 82723325584739438, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: m_Enabled
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 82723325584739438, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: spreadCustomCurve.m_RotationOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 82480303932076466, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: spreadCustomCurve.m_RotationOrder
      value: 0
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &633008059
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1754637663575016, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 633008060}
  - component: {fileID: 633008062}
  - component: {fileID: 633008061}
  m_Layer: 0
  m_Name: current (1)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &633008060
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 224920621954931586, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 633008059}
  m_LocalRotation: {x: 0.12744997, y: 0.018199764, z: -0.002339243, w: 0.9916753}
  m_LocalPosition: {x: 0, y: 0, z: 2.5853}
  m_LocalScale: {x: 0.0016600012, y: 0.0022000072, z: 0.0020099953}
  m_Children: []
  m_Father: {fileID: 2113157783}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 14.647, y: 2.1030002, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -3.3785, y: 0.8821}
  m_SizeDelta: {x: 97.93541, y: 31.62834}
  m_Pivot: {x: 0.49999648, y: 0.49982965}
--- !u!114 &633008061
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114296037216896896, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 633008059}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0.40770754, b: 0.88235295, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 12800000, guid: 323ac1ea6ff04144f9f5b613bfbc5597, type: 3}
    m_FontSize: 20
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
  m_Text: "Remaining :"
--- !u!222 &633008062
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 222077243323350348, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 633008059}
--- !u!1 &644841729
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 644841730}
  - component: {fileID: 644841733}
  - component: {fileID: 644841732}
  - component: {fileID: 644841731}
  m_Layer: 0
  m_Name: WorldSpaceCanvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &644841730
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 644841729}
  m_LocalRotation: {x: 0, y: -0, z: -0.7071068, w: 0.7071068}
  m_LocalPosition: {x: 0, y: 0, z: 9.168657}
  m_LocalScale: {x: 5.0348563, y: 637.37366, z: 6.563105}
  m_Children:
  - {fileID: 244584439}
  - {fileID: 379399024}
  - {fileID: 1296150663}
  - {fileID: 1367370019}
  - {fileID: 311545215}
  - {fileID: 2113157783}
  m_Father: {fileID: 23288343}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 244246.4, y: -2609.526}
  m_SizeDelta: {x: 1024, y: 768}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &644841731
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 644841729}
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
--- !u!114 &644841732
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 644841729}
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
--- !u!223 &644841733
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 644841729}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 2
  m_Camera: {fileID: 1472142271}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 0
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!1 &652472750
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 652472751}
  - component: {fileID: 652472754}
  - component: {fileID: 652472753}
  - component: {fileID: 652472752}
  m_Layer: 0
  m_Name: Button
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &652472751
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 652472750}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 17869498}
  m_Father: {fileID: 234069947}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0}
  m_AnchorMax: {x: 0.5, y: 0}
  m_AnchoredPosition: {x: 87.5, y: 33.7}
  m_SizeDelta: {x: 89.03, y: 32.29}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &652472752
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 652472750}
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
  m_TargetGraphic: {fileID: 652472753}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 227587222}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: Menu
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 114302560275996662, guid: 7e42676681ba3ac45843f30ca5a3b595,
          type: 2}
        m_MethodName: ExitSimulation
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
--- !u!114 &652472753
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 652472750}
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
  m_Sprite: {fileID: 21300000, guid: ece8ac2cb44577542aab6c96e2a7ded0, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &652472754
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 652472750}
--- !u!1001 &695513696
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
      value: ___[player_rotation_w]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_RootOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalScale.x
      value: 0.7375237
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalScale.y
      value: 0.8746351
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalScale.z
      value: 0.60194045
      objectReference: {fileID: 0}
    - target: {fileID: 2000000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: near clip plane
      value: 0.01
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_TagString
      value: Player
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_MouseLook.lockCursor
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_JumpSpeed
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_Enabled
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_RunSpeed
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_WalkSpeed
      value: 3
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_HeadBob.Bobcurve.m_Curve.Array.data[1].time
      value: 0.4916687
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_HeadBob.Bobcurve.m_RotationOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_HeadBob.Bobcurve.m_Curve.Array.data[1].value
      value: 0.36249924
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_HeadBob.Bobcurve.m_Curve.Array.data[3].value
      value: -0.51249695
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_HeadBob.Bobcurve.m_Curve.Array.data[3].time
      value: 1.5
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_StepInterval
      value: 3.5
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_UseFovKick
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_MouseLook.clampVerticalRotation
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_MouseLook.smooth
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_MouseLook.XSensitivity
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_MouseLook.YSensitivity
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_IsActive
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 14300000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_SlopeLimit
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_LocalEulerAnglesHint.y
      value: -56.297
      objectReference: {fileID: 0}
    - target: {fileID: 100002, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_TagString
      value: MainCamera
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_StickToGroundForce
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 2000000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_RenderingPath
      value: -1
      objectReference: {fileID: 0}
    - target: {fileID: 14300000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_Enabled
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 8100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_Enabled
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 8200000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_Enabled
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_JumpSound
      value:
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_MouseLook.MinimumX
      value: -90
      objectReference: {fileID: 0}
    - target: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_MouseLook.MaximumX
      value: 55
      objectReference: {fileID: 0}
    - target: {fileID: 2000000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: far clip plane
      value: 2000
      objectReference: {fileID: 0}
    - target: {fileID: 14300000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: m_StepOffset
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 8200000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: spreadCustomCurve.m_RotationOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 8200000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
      propertyPath: panLevelCustomCurve.m_Curve.Array.data[0].value
      value: 0.5
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
  m_IsPrefabParent: 0
--- !u!114 &695513697 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 11400000, guid: 5e9e851c0e142814dac026a256ba2ac0,
    type: 2}
  m_PrefabInternal: {fileID: 695513696}
  m_Script: {fileID: 11500000, guid: 05ec5cf00ca181d45a42ba1870e148c3, type: 3}
--- !u!1 &717883347
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 717883348}
  - component: {fileID: 717883350}
  - component: {fileID: 717883349}
  m_Layer: 0
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &717883348
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 717883347}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 269605902}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.000025571, y: 55}
  m_SizeDelta: {x: -43, y: -281.99}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &717883349
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 717883347}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1453722849, guid: 89f0137620f6af44b9ba852b4190e64e, type: 3}
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
  m_text: "<align=center>Welcome to chemistry lab.<align=left>


    - To start playing, try to find the two laptops that are placed inside the lab.


    - You can move using the WASD keys and your mouse to rotate the camera."
  m_isRightToLeft: 0
  m_fontAsset: {fileID: 11400000, guid: d62a573c923f5cb47b8ff65261033b90, type: 2}
  m_sharedMaterial: {fileID: 2164040, guid: d62a573c923f5cb47b8ff65261033b90, type: 2}
  m_fontSharedMaterials: []
  m_fontMaterial: {fileID: 0}
  m_fontMaterials: []
  m_fontColor32:
    serializedVersion: 2
    rgba: 4294967295
  m_fontColor: {r: 1, g: 1, b: 1, a: 1}
  m_enableVertexGradient: 0
  m_fontColorGradient:
    topLeft: {r: 1, g: 1, b: 1, a: 1}
    topRight: {r: 1, g: 1, b: 1, a: 1}
    bottomLeft: {r: 1, g: 1, b: 1, a: 1}
    bottomRight: {r: 1, g: 1, b: 1, a: 1}
  m_fontColorGradientPreset: {fileID: 0}
  m_spriteAsset: {fileID: 0}
  m_tintAllSprites: 0
  m_overrideHtmlColors: 0
  m_faceColor:
    serializedVersion: 2
    rgba: 4294967295
  m_outlineColor:
    serializedVersion: 2
    rgba: 4278190080
  m_fontSize: 22
  m_fontSizeBase: 22
  m_fontWeight: 400
  m_enableAutoSizing: 0
  m_fontSizeMin: 18
  m_fontSizeMax: 72
  m_fontStyle: 0
  m_textAlignment: 257
  m_isAlignmentEnumConverted: 1
  m_characterSpacing: 0
  m_wordSpacing: 0
  m_lineSpacing: 0
  m_lineSpacingMax: 0
  m_paragraphSpacing: 0
  m_charWidthMaxAdj: 0
  m_enableWordWrapping: 1
  m_wordWrappingRatios: 0.4
  m_overflowMode: 0
  m_firstOverflowCharacterIndex: -1
  m_linkedTextComponent: {fileID: 0}
  m_isLinkedTextComponent: 0
  m_enableKerning: 1
  m_enableExtraPadding: 0
  checkPaddingRequired: 0
  m_isRichText: 1
  m_parseCtrlCharacters: 1
  m_isOrthographic: 1
  m_isCullingEnabled: 0
  m_ignoreRectMaskCulling: 0
  m_ignoreCulling: 1
  m_horizontalMapping: 0
  m_verticalMapping: 0
  m_uvLineOffset: 0
  m_geometrySortingOrder: 0
  m_firstVisibleCharacter: 0
  m_useMaxVisibleDescender: 1
  m_pageToDisplay: 1
  m_margin: {x: 0, y: 2.9315138, z: -8.308768, w: 0.0000019519923}
  m_textInfo:
    textComponent: {fileID: 717883349}
    characterCount: 179
    spriteCount: 0
    spaceCount: 36
    wordCount: 35
    linkCount: 0
    lineCount: 7
    pageCount: 1
    materialCount: 1
  m_havePropertiesChanged: 1
  m_isUsingLegacyAnimationComponent: 0
  m_isVolumetricText: 0
  m_spriteAnimator: {fileID: 0}
  m_isInputParsingRequired: 1
  m_inputSource: 0
  m_hasFontAssetChanged: 0
  m_subTextObjects:
  - {fileID: 0}
  - {fileID: 0}
  - {fileID: 0}
  - {fileID: 0}
  - {fileID: 0}
  - {fileID: 0}
  - {fileID: 0}
  - {fileID: 0}
  m_baseMaterial: {fileID: 0}
  m_maskOffset: {x: 0, y: 0, z: 0, w: 0}
--- !u!222 &717883350
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 717883347}
--- !u!1 &734374268
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1754637663575016, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 734374269}
  - component: {fileID: 734374271}
  - component: {fileID: 734374270}
  m_Layer: 0
  m_Name: current (1)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &734374269
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 224920621954931586, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 734374268}
  m_LocalRotation: {x: 0.076986715, y: -0.70290333, z: 0.076986715, w: 0.70290333}
  m_LocalPosition: {x: 0, y: 0, z: -1.6159}
  m_LocalScale: {x: 0.0016600012, y: 0.0022000072, z: 0.0020099953}
  m_Children: []
  m_Father: {fileID: 311545215}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 12.501, y: -90, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -6.4141083, y: 0.8725951}
  m_SizeDelta: {x: 115.61602, y: 31.52421}
  m_Pivot: {x: 0.49999648, y: 0.49982965}
--- !u!114 &734374270
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114296037216896896, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 734374268}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0.40770754, b: 0.88235295, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 12800000, guid: 323ac1ea6ff04144f9f5b613bfbc5597, type: 3}
    m_FontSize: 20
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
  m_Text: "Remaining :"
--- !u!222 &734374271
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 222077243323350348, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 734374268}
--- !u!1 &806409090 stripped
GameObject:
  m_PrefabParentObject: {fileID: 100000, guid: 5e9e851c0e142814dac026a256ba2ac0, type: 2}
  m_PrefabInternal: {fileID: 695513696}
--- !u!114 &806409091
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 806409090}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: d0daa54262daf614eb945b19c0702841, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  mouseLook:
    XSensitivity: 2
    YSensitivity: 2
    clampVerticalRotation: 1
    MinimumX: -90
    MaximumX: 90
    smooth: 0
    smoothTime: 5
    lockCursor: 1
--- !u!1 &824322022
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1478218364110464, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 824322023}
  - component: {fileID: 824322025}
  - component: {fileID: 824322024}
  m_Layer: 5
  m_Name: Background
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &824322023
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 224554926766866538, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 824322022}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 41414293}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0.25}
  m_AnchorMax: {x: 1, y: 0.75}
  m_AnchoredPosition: {x: 0, y: -0.0000033214}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &824322024
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114538334269756196, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 824322022}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &824322025
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 222397628689242884, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 824322022}
--- !u!1 &888602103
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 888602104}
  - component: {fileID: 888602106}
  - component: {fileID: 888602105}
  m_Layer: 0
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &888602104
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 888602103}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 234069947}
  m_Father: {fileID: 930532926}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &888602105
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 888602103}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.3602941, g: 0.3602941, b: 0.3602941, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: c5467689fdc67f44eab6cdef3e4e7450, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &888602106
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 888602103}
--- !u!1 &897015028
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1157954905077308, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 897015029}
  - component: {fileID: 897015031}
  - component: {fileID: 897015030}
  - component: {fileID: 897015032}
  m_Layer: 0
  m_Name: Named Molecules in Laptop
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &897015029
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 224037044209590816, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 897015028}
  m_LocalRotation: {x: 0.076986715, y: -0.70290333, z: 0.076986715, w: 0.70290333}
  m_LocalPosition: {x: 0, y: 0, z: -1.4992}
  m_LocalScale: {x: 0.0016648426, y: 0.002196479, z: 0.0020076022}
  m_Children: []
  m_Father: {fileID: 311545215}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 12.501, y: -90, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -6.4134, y: 0.8736}
  m_SizeDelta: {x: 50.89347, y: 30.25655}
  m_Pivot: {x: 0.49999648, y: 0.49982965}
--- !u!114 &897015030
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114948631462999342, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 897015028}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0.40770754, b: 0.88235295, a: 1}
  m_RaycastTarget: 0
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 12800000, guid: 323ac1ea6ff04144f9f5b613bfbc5597, type: 3}
    m_FontSize: 20
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
  m_Text: 10
--- !u!222 &897015031
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 222180066259362708, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 897015028}
--- !u!114 &897015032
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 897015028}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 44500d042e762e7469e55904f68a3808, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  type: 1
--- !u!1 &923116935
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 923116936}
  - component: {fileID: 923116939}
  - component: {fileID: 923116938}
  - component: {fileID: 923116937}
  m_Layer: 0
  m_Name: ExitCanvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &923116936
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 923116935}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1602327964}
  - {fileID: 1320101425}
  - {fileID: 1083510588}
  m_Father: {fileID: 23288343}
  m_RootOrder: 5
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!114 &923116937
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 923116935}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1301386320, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_IgnoreReversedGraphics: 1
  m_BlockingObjects: 0
  m_BlockingMask:
    serializedVersion: 2
    m_Bits: 4294967295
--- !u!114 &923116938
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 923116935}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1920, y: 1080}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 1
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &923116939
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 923116935}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 0
  m_Camera: {fileID: 0}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!1 &930532925
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 930532926}
  - component: {fileID: 930532930}
  - component: {fileID: 930532929}
  - component: {fileID: 930532928}
  m_Layer: 0
  m_Name: ScoreCanvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &930532926
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 930532925}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 888602104}
  m_Father: {fileID: 23288343}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!114 &930532928
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 930532925}
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
--- !u!114 &930532929
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 930532925}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1024, y: 768}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 1
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &930532930
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 930532925}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 0
  m_Camera: {fileID: 0}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!1 &969258633
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 969258634}
  - component: {fileID: 969258636}
  - component: {fileID: 969258635}
  m_Layer: 0
  m_Name: LogText
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &969258634
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 969258633}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 234069947}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 286.7, y: 136.96}
  m_SizeDelta: {x: 276, y: 132.31}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &969258635
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 969258633}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text:
--- !u!222 &969258636
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 969258633}
--- !u!1 &970602281
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 970602282}
  - component: {fileID: 970602284}
  - component: {fileID: 970602283}
  m_Layer: 0
  m_Name: Image (1)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &970602282
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 970602281}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 269605902}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -116.85, y: -129}
  m_SizeDelta: {x: -276.7, y: -374.9}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &970602283
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 970602281}
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
  m_Sprite: {fileID: 21300000, guid: 3721d0bfd29717442a1b742506dfa1d8, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &970602284
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 970602281}
--- !u!1 &1029511691
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1029511692}
  - component: {fileID: 1029511695}
  - component: {fileID: 1029511694}
  - component: {fileID: 1029511693}
  - component: {fileID: 1029511696}
  m_Layer: 0
  m_Name: StartCanvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1029511692
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1029511691}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 269605902}
  m_Father: {fileID: 23288343}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!114 &1029511693
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1029511691}
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
--- !u!114 &1029511694
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1029511691}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1024, y: 768}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 1
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &1029511695
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1029511691}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 0
  m_Camera: {fileID: 0}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!114 &1029511696
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1029511691}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 2e68c9b06fe93074a82dc80f3f1837c6, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  player: {fileID: 806409090}
--- !u!1 &1048944793
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1048944794}
  - component: {fileID: 1048944797}
  - component: {fileID: 1048944796}
  - component: {fileID: 1048944795}
  m_Layer: 0
  m_Name: InteractionCanvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1048944794
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1048944793}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1971748961}
  - {fileID: 1431218768}
  - {fileID: 1707555857}
  m_Father: {fileID: 23288343}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!114 &1048944795
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1048944793}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1301386320, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_IgnoreReversedGraphics: 1
  m_BlockingObjects: 0
  m_BlockingMask:
    serializedVersion: 2
    m_Bits: 4294967295
--- !u!114 &1048944796
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1048944793}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1920, y: 1080}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 1
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &1048944797
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1048944793}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 0
  m_Camera: {fileID: 0}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!1 &1049919804
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1049919805}
  m_Layer: 9
  m_Name: _light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!4 &1049919805
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1049919804}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 8.943317, y: 2.6004894, z: -9.327628}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1630605515}
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1001 &1083510587
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 923116936}
    m_Modifications:
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_RootOrder
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b, type: 2}
      propertyPath: m_IsActive
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0.056
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b, type: 2}
      propertyPath: m_TagString
      value: Untagged
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 227.15472
      objectReference: {fileID: 0}
    - target: {fileID: 224554926766866538, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0.0000024006458
      objectReference: {fileID: 0}
    - target: {fileID: 224546450203908758, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0.0000019073486
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 134d803fbe5daad4898013368569a93b, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &1083510588 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 1083510587}
--- !u!1 &1091782383
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1091782384}
  - component: {fileID: 1091782386}
  - component: {fileID: 1091782385}
  m_Layer: 0
  m_Name: constructedMoleculesSum
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1091782384
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1091782383}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1360684726}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 55.8001, y: -46.22497}
  m_SizeDelta: {x: 65.6, y: 77.15}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1091782385
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1091782383}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 30
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 3
    m_MaxSize: 50
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: 10
--- !u!222 &1091782386
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1091782383}
--- !u!1 &1113582036
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1113582037}
  - component: {fileID: 1113582039}
  - component: {fileID: 1113582038}
  m_Layer: 0
  m_Name: Royal badge
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1113582037
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1113582036}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 2022894145}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 1}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -19, y: 364}
  m_SizeDelta: {x: 182.89, y: 127.06}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1113582038
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1113582036}
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
  m_Sprite: {fileID: 21300000, guid: 2f6fdffa16ad0ce458855e7228fd7e9d, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1113582039
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1113582036}
--- !u!1 &1180643129
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1180643130}
  - component: {fileID: 1180643132}
  - component: {fileID: 1180643131}
  m_Layer: 0
  m_Name: Image (2)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1180643130
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1180643129}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0.0000001453084}
  m_LocalScale: {x: 1.0000001, y: 1.0000001, z: 1}
  m_Children: []
  m_Father: {fileID: 269605902}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 124.15, y: -129}
  m_SizeDelta: {x: -324.3, y: -374.9}
  m_Pivot: {x: 0.55095714, y: 0.49999982}
--- !u!114 &1180643131
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1180643129}
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
  m_Sprite: {fileID: 21300000, guid: 3afd494130cfce748be868cab404c4ce, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1180643132
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1180643129}
--- !u!1 &1280055314
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1280055315}
  - component: {fileID: 1280055317}
  - component: {fileID: 1280055316}
  m_Layer: 0
  m_Name: Molecule Naming title
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1280055315
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1280055314}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 492682089}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: -0.000005245204, y: -32.6}
  m_SizeDelta: {x: 405.4, y: 65.2}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1280055316
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1280055314}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 30
    m_FontStyle: 2
    m_BestFit: 1
    m_MinSize: 3
    m_MaxSize: 35
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: "Molecule naming Quiz:"
--- !u!222 &1280055317
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1280055314}
--- !u!1 &1296150662
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1296150663}
  - component: {fileID: 1296150665}
  - component: {fileID: 1296150664}
  m_Layer: 0
  m_Name: Exit message
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1296150663
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1296150662}
  m_LocalRotation: {x: 0, y: -0.7071068, z: 0, w: 0.7071068}
  m_LocalPosition: {x: 0, y: 0, z: 1.4781}
  m_LocalScale: {x: 0.0023800016, y: 0.0031400104, z: 0.002869993}
  m_Children: []
  m_Father: {fileID: 644841730}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: -90.00001, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -518.9918, y: -381.2612}
  m_SizeDelta: {x: 712.7355, y: 113.3851}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1296150664
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1296150662}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 40
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 0
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: "Perform an exit/logout through the door.\n\t\t\t\t\t\t\t\t\t\t\t--->"
--- !u!222 &1296150665
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1296150662}
--- !u!1001 &1299265851
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.x
      value: -8.244101
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.y
      value: 1.4762541
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3126498
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingPanel
      value:
      objectReference: {fileID: 1707555859}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingBar
      value:
      objectReference: {fileID: 1707555858}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1320101424
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1320101425}
  - component: {fileID: 1320101427}
  - component: {fileID: 1320101426}
  m_Layer: 0
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1320101425
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1320101424}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1339081260}
  m_Father: {fileID: 923116936}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -274.47, y: 0}
  m_SizeDelta: {x: 452.96, y: 46.5}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1320101426
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1320101424}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 0.655}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1320101427
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1320101424}
--- !u!1 &1339081259
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1339081260}
  - component: {fileID: 1339081262}
  - component: {fileID: 1339081261}
  m_Layer: 0
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1339081260
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1339081259}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1320101425}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -0.00016021266, y: 0.0000057500965}
  m_SizeDelta: {x: 438.43, y: 49}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1339081261
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1339081259}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 25
    m_FontStyle: 1
    m_BestFit: 0
    m_MinSize: 2
    m_MaxSize: 40
    m_Alignment: 3
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Press " E " to exit. All progress will be lost!
--- !u!222 &1339081262
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1339081259}
--- !u!1 &1347428889
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1347428890}
  - component: {fileID: 1347428892}
  - component: {fileID: 1347428891}
  m_Layer: 0
  m_Name: namedMoleculesNum
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1347428890
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1347428889}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0.0000001453084}
  m_LocalScale: {x: 0.9999961, y: 1.0000025, z: 1}
  m_Children: []
  m_Father: {fileID: 492682089}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -65.6, y: -46.225}
  m_SizeDelta: {x: 65.6, y: 77.15}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1347428891
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1347428889}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 30
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 3
    m_MaxSize: 50
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: 10
--- !u!222 &1347428892
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1347428889}
--- !u!1 &1358169865
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1358169866}
  - component: {fileID: 1358169868}
  - component: {fileID: 1358169867}
  m_Layer: 0
  m_Name: Image
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1358169866
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1358169865}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 254591997}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -0.000061035, y: -0.000012398}
  m_SizeDelta: {x: 48.34, y: 56.92}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1358169867
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1358169865}
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
  m_Sprite: {fileID: 21300000, guid: 210bc0cc38cd67741b6ff9ff8c0cb7d3, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1358169868
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1358169865}
--- !u!1 &1360684725
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1360684726}
  - component: {fileID: 1360684728}
  - component: {fileID: 1360684727}
  m_Layer: 0
  m_Name: ConstructedMoleculs
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1360684726
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1360684725}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0.0000001453084}
  m_LocalScale: {x: 0.9999961, y: 1.0000025, z: 1}
  m_Children:
  - {fileID: 1509329437}
  - {fileID: 1091782384}
  - {fileID: 262028281}
  - {fileID: 1769743125}
  m_Father: {fileID: 234069947}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -0.00014748, y: -37}
  m_SizeDelta: {x: 0, y: -545.3}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1360684727
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1360684725}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 0}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1360684728
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1360684725}
--- !u!1 &1367370018
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1367370019}
  - component: {fileID: 1367370021}
  - component: {fileID: 1367370020}
  m_Layer: 0
  m_Name: Exit message (1)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1367370019
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1367370018}
  m_LocalRotation: {x: 0, y: 0.7071068, z: 0, w: 0.7071068}
  m_LocalPosition: {x: 0, y: 0, z: -0.0396}
  m_LocalScale: {x: 0.002380003, y: 0.0031400004, z: 0.0028700032}
  m_Children: []
  m_Father: {fileID: 644841730}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 90, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -506.032, y: -381.528}
  m_SizeDelta: {x: 670.9835, y: 107.388}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1367370020
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1367370018}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 40
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 0
    m_MaxSize: 50
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: "Perform an exit/logout through the door.

    <---"
--- !u!222 &1367370021
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1367370018}
--- !u!1 &1386633569
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1386633570}
  - component: {fileID: 1386633572}
  - component: {fileID: 1386633571}
  m_Layer: 0
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1386633570
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1386633569}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 2022894145}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: 1.3400159, y: 19.91999}
  m_SizeDelta: {x: 151.2, y: 39.84}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1386633571
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1386633569}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 1
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Badge award
--- !u!222 &1386633572
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1386633569}
--- !u!1 &1395017516
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1395017517}
  - component: {fileID: 1395017519}
  - component: {fileID: 1395017518}
  m_Layer: 0
  m_Name: Text (2)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1395017517
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1395017516}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 269605902}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -0.000023365, y: -240.75}
  m_SizeDelta: {x: -190.3, y: -481.5}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1395017518
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1395017516}
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
    m_FontSize: 14
    m_FontStyle: 2
    m_BestFit: 0
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: "*Move the character to close the panel*."
--- !u!222 &1395017519
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1395017516}
--- !u!1 &1410697372
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1410697375}
  - component: {fileID: 1410697374}
  - component: {fileID: 1410697373}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1410697373
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1410697372}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1077351063, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_HorizontalAxis: Horizontal
  m_VerticalAxis: Vertical
  m_SubmitButton: Submit
  m_CancelButton: Cancel
  m_InputActionsPerSecond: 10
  m_RepeatDelay: 0.5
  m_ForceModuleActive: 0
--- !u!114 &1410697374
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1410697372}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f5f67c52d1564df4a8936ccd202a3bd8, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &1410697375
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1410697372}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &1431218767
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1431218768}
  - component: {fileID: 1431218770}
  - component: {fileID: 1431218769}
  m_Layer: 0
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1431218768
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1431218767}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 531500778}
  m_Father: {fileID: 1048944794}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -212.95, y: -23.25}
  m_SizeDelta: {x: 329.9, y: 46.5}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1431218769
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1431218767}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 0.655}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1431218770
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1431218767}
--- !u!1 &1443264900
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1443264901}
  - component: {fileID: 1443264903}
  - component: {fileID: 1443264902}
  m_Layer: 0
  m_Name: /
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1443264901
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1443264900}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0.0000001453084}
  m_LocalScale: {x: 0.9999961, y: 1.0000025, z: 1}
  m_Children: []
  m_Father: {fileID: 492682089}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -4.9, y: -41.4}
  m_SizeDelta: {x: 55.8, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1443264902
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1443264900}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 30
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 3
    m_MaxSize: 50
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: /
--- !u!222 &1443264903
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1443264900}
--- !u!20 &1472142271 stripped
Camera:
  m_PrefabParentObject: {fileID: 2000000, guid: 5e9e851c0e142814dac026a256ba2ac0,
    type: 2}
  m_PrefabInternal: {fileID: 695513696}
--- !u!1 &1509329436
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1509329437}
  - component: {fileID: 1509329439}
  - component: {fileID: 1509329438}
  m_Layer: 0
  m_Name: Molecule construction title
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1509329437
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1509329436}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1360684726}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: -0.000005245204, y: -32.6}
  m_SizeDelta: {x: 405.4, y: 65.2}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1509329438
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1509329436}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 30
    m_FontStyle: 2
    m_BestFit: 1
    m_MinSize: 3
    m_MaxSize: 35
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: "Molecule construction Quiz:"
--- !u!222 &1509329439
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1509329436}
--- !u!1001 &1598126121
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.x
      value: -7.1613173
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0.4321006
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3783276
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_RootOrder
      value: 6
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1602327963
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1602327964}
  - component: {fileID: 1602327966}
  - component: {fileID: 1602327965}
  m_Layer: 0
  m_Name: Image
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1602327964
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1602327963}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 923116936}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0.00048828125, y: 0}
  m_SizeDelta: {x: 95.999, y: 93}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1602327965
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1602327963}
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
  m_Sprite: {fileID: 21300000, guid: c716699c46ffff744a8540591ce24572, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1602327966
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1602327963}
--- !u!1 &1630605513
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1630605515}
  - component: {fileID: 1630605514}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!108 &1630605514
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1630605513}
  m_Enabled: 1
  serializedVersion: 8
  m_Type: 1
  m_Color: {r: 1, g: 1, b: 0.928, a: 1}
  m_Intensity: 1
  m_Range: 10
  m_SpotAngle: 30
  m_CookieSize: 10
  m_Shadows:
    m_Type: 0
    m_Resolution: -1
    m_CustomResolution: -1
    m_Strength: 0.2
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
  m_Lightmapping: 1
  m_AreaSize: {x: 1, y: 1}
  m_BounceIntensity: 1
  m_ColorTemperature: 6570
  m_UseColorTemperature: 0
  m_ShadowRadius: 0
  m_ShadowAngle: 0
--- !u!4 &1630605515
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1630605513}
  m_LocalRotation: {x: 0.7071068, y: 0, z: 0, w: 0.7071068}
  m_LocalPosition: {x: -13, y: 5.23, z: -1.53}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1049919805}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 90, y: 0, z: 0}
--- !u!1001 &1707555856
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1048944794}
    m_Modifications:
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_RootOrder
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b, type: 2}
      propertyPath: m_IsActive
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Value
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 134d803fbe5daad4898013368569a93b, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &1707555857 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 1707555856}
--- !u!114 &1707555858 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 1707555856}
  m_Script: {fileID: -113659843, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1 &1707555859 stripped
GameObject:
  m_PrefabParentObject: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 1707555856}
--- !u!1 &1769743124
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1769743125}
  - component: {fileID: 1769743127}
  - component: {fileID: 1769743126}
  m_Layer: 0
  m_Name: constructedMoleculesNum
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1769743125
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1769743124}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0.0000001453084}
  m_LocalScale: {x: 0.9999961, y: 1.0000025, z: 1}
  m_Children: []
  m_Father: {fileID: 1360684726}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -65.6, y: -46.225}
  m_SizeDelta: {x: 65.6, y: 77.15}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1769743126
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1769743124}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 30
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 3
    m_MaxSize: 50
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: 10
--- !u!222 &1769743127
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1769743124}
--- !u!1 &1788685330
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1788685331}
  - component: {fileID: 1788685333}
  - component: {fileID: 1788685332}
  m_Layer: 0
  m_Name: Text (1)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1788685331
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1788685330}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0.0000001453084}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 269605902}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0}
  m_AnchorMax: {x: 0.5, y: 0}
  m_AnchoredPosition: {x: 29.989, y: 93.25}
  m_SizeDelta: {x: 59.98, y: 69.6}
  m_Pivot: {x: 0.49998948, y: 0.5000004}
--- !u!114 &1788685332
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1788685330}
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
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 50
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: +
--- !u!222 &1788685333
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1788685330}
--- !u!1 &1971748960
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1971748961}
  - component: {fileID: 1971748963}
  - component: {fileID: 1971748962}
  m_Layer: 0
  m_Name: Image
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1971748961
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1971748960}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1048944794}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0.00047302, y: -0}
  m_SizeDelta: {x: 95.999, y: 93}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1971748962
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1971748960}
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
  m_Sprite: {fileID: 21300000, guid: c716699c46ffff744a8540591ce24572, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1971748963
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1971748960}
--- !u!1 &2022894144
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2022894145}
  - component: {fileID: 2022894147}
  - component: {fileID: 2022894146}
  m_Layer: 0
  m_Name: MetalPanel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2022894145
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2022894144}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0.0000001453084}
  m_LocalScale: {x: 0.9999961, y: 1.0000025, z: 1}
  m_Children:
  - {fileID: 2121082391}
  - {fileID: 1386633570}
  - {fileID: 1113582037}
  m_Father: {fileID: 234069947}
  m_RootOrder: 5
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 0}
  m_AnchorMax: {x: 1, y: 0}
  m_AnchoredPosition: {x: -120.7, y: 129.1}
  m_SizeDelta: {x: 150.3, y: 116.6}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &2022894146
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2022894144}
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
  m_Sprite: {fileID: 21300000, guid: 7392b5ca8ba348d49a66cd8a88fc7562, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &2022894147
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2022894144}
--- !u!1 &2107538136
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2107538137}
  - component: {fileID: 2107538139}
  - component: {fileID: 2107538138}
  m_Layer: 0
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2107538137
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2107538136}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 2137086219}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.0000081062, y: 0.00000023842}
  m_SizeDelta: {x: -7.08, y: -4.94}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &2107538138
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2107538136}
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
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Continue
--- !u!222 &2107538139
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2107538136}
--- !u!1 &2113157782
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1336488501771788, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2113157783}
  m_Layer: 0
  m_Name: ScoreTextConstruction
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!4 &2113157783
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 4305854066270894, guid: 1cd9b535cf7e12a43a82f92276df9f8a,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2113157782}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: -511.99332, y: -384.0001, z: -0.0000001453084}
  m_LocalScale: {x: 1.0000001, y: 1.0000001, z: 1}
  m_Children:
  - {fileID: 264362979}
  - {fileID: 633008060}
  m_Father: {fileID: 644841730}
  m_RootOrder: 5
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &2121082390
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2121082391}
  - component: {fileID: 2121082393}
  - component: {fileID: 2121082392}
  m_Layer: 0
  m_Name: badge
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2121082391
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2121082390}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0.75171566, y: 0.7517157, z: 0.7517157}
  m_Children: []
  m_Father: {fileID: 2022894145}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 0}
  m_AnchorMax: {x: 1, y: 0}
  m_AnchoredPosition: {x: -75.15, y: 58.3}
  m_SizeDelta: {x: 164, y: 133.06}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &2121082392
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2121082390}
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
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &2121082393
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2121082390}
--- !u!1 &2133277384
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1064928841895350, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2133277385}
  m_Layer: 5
  m_Name: Fill Area
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2133277385
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 224546450203908758, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2133277384}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 452081523}
  m_Father: {fileID: 41414293}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0.25}
  m_AnchorMax: {x: 1, y: 0.75}
  m_AnchoredPosition: {x: 2.67, y: 0.0000019073486}
  m_SizeDelta: {x: -5.34, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!1 &2137086218
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2137086219}
  - component: {fileID: 2137086222}
  - component: {fileID: 2137086221}
  - component: {fileID: 2137086220}
  m_Layer: 0
  m_Name: Button (1)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2137086219
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2137086218}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: -0.0000001453084}
  m_LocalScale: {x: 0.9999961, y: 1.0000025, z: 1}
  m_Children:
  - {fileID: 2107538137}
  m_Father: {fileID: 234069947}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0}
  m_AnchorMax: {x: 0.5, y: 0}
  m_AnchoredPosition: {x: -115.33388, y: 33.700012}
  m_SizeDelta: {x: 89.03, y: 32.29}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &2137086220
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2137086218}
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
  m_TargetGraphic: {fileID: 2137086221}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 695513697}
        m_MethodName: set_enabled
        m_Mode: 6
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 1
        m_CallState: 2
      - m_Target: {fileID: 888602103}
        m_MethodName: SetActive
        m_Mode: 6
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
--- !u!114 &2137086221
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2137086218}
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
  m_Sprite: {fileID: 21300000, guid: ece8ac2cb44577542aab6c96e2a7ded0, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &2137086222
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2137086218}');

$ini_scene_main_menu_chem_unity_pattern = array('%YAML 1.1
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
  serializedVersion: 8
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
  m_SubtractiveShadowColor: {r: 0.42, g: 0.478, b: 0.627, a: 1}
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
  m_IndirectSpecularColor: {r: 0.44657898, g: 0.4964133, b: 0.5748178, a: 1}
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 11
  m_GIWorkflowMode: 0
  m_GISettings:
    serializedVersion: 2
    m_BounceScale: 1
    m_IndirectOutputScale: 1
    m_AlbedoBoost: 1
    m_TemporalCoherenceThreshold: 1
    m_EnvironmentLightingMode: 0
    m_EnableBakedLightmaps: 0
    m_EnableRealtimeLightmaps: 0
  m_LightmapEditorSettings:
    serializedVersion: 9
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
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
    m_MixedBakeMode: 2
    m_BakeBackend: 0
    m_PVRSampling: 1
    m_PVRDirectSampleCount: 32
    m_PVRSampleCount: 500
    m_PVRBounces: 2
    m_PVRFilterTypeDirect: 0
    m_PVRFilterTypeIndirect: 0
    m_PVRFilterTypeAO: 0
    m_PVRFilteringMode: 1
    m_PVRCulling: 1
    m_PVRFilteringGaussRadiusDirect: 1
    m_PVRFilteringGaussRadiusIndirect: 5
    m_PVRFilteringGaussRadiusAO: 2
    m_PVRFilteringAtrousPositionSigmaDirect: 0.5
    m_PVRFilteringAtrousPositionSigmaIndirect: 2
    m_PVRFilteringAtrousPositionSigmaAO: 1
    m_ShowResolutionOverlay: 1
  m_LightingDataAsset: {fileID: 0}
  m_UseShadowmask: 1
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
    manualTileSize: 0
    tileSize: 256
    accuratePlacement: 0
    debug:
      m_Flags: 0
  m_NavMeshData: {fileID: 0}
--- !u!1 &60939075 stripped
GameObject:
  m_PrefabParentObject: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!224 &60939076 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!114 &61884517 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
  m_Script: {fileID: -113659843, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1001 &90539301
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.x
      value: -7.1613173
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0.4321006
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3783276
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_RootOrder
      value: 7
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
  m_IsPrefabParent: 0
--- !u!1001 &136569340
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4585423750091566, guid: 64412da8bbfb13045b3bc42b63dee6e1, type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4585423750091566, guid: 64412da8bbfb13045b3bc42b63dee6e1, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4585423750091566, guid: 64412da8bbfb13045b3bc42b63dee6e1, type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4585423750091566, guid: 64412da8bbfb13045b3bc42b63dee6e1, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4585423750091566, guid: 64412da8bbfb13045b3bc42b63dee6e1, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4585423750091566, guid: 64412da8bbfb13045b3bc42b63dee6e1, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4585423750091566, guid: 64412da8bbfb13045b3bc42b63dee6e1, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4585423750091566, guid: 64412da8bbfb13045b3bc42b63dee6e1, type: 2}
      propertyPath: m_RootOrder
      value: 8
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 64412da8bbfb13045b3bc42b63dee6e1, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &565891499
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 565891500}
  - component: {fileID: 565891503}
  - component: {fileID: 565891502}
  - component: {fileID: 565891501}
  m_Layer: 5
  m_Name: PlayBtn
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &565891500
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 565891499}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.1338836, y: 1.1338841, z: 1.1338841}
  m_Children:
  - {fileID: 1146554003}
  m_Father: {fileID: 1505279377}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 176, y: 39.6}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &565891501
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 565891499}
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
    m_HighlightedColor: {r: 0.61764705, g: 0.61764705, b: 0.61764705, a: 1}
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
  m_TargetGraphic: {fileID: 565891502}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 1500638845}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: S_Login
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &565891502
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 565891499}
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
--- !u!222 &565891503
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 565891499}
--- !u!1001 &639724802
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1853910843}
    m_Modifications:
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b, type: 2}
      propertyPath: m_IsActive
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Value
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 134d803fbe5daad4898013368569a93b, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &648957661
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 648957664}
  - component: {fileID: 648957663}
  - component: {fileID: 648957662}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &648957662
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
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
--- !u!114 &648957663
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &648957664
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &650951417
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 650951421}
  - component: {fileID: 650951420}
  - component: {fileID: 650951419}
  - component: {fileID: 650951418}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &650951418
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!124 &650951419
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!20 &650951420
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
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
  orthographic: 1
  orthographic size: 5
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: -1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 1
  m_AllowMSAA: 1
  m_AllowDynamicResolution: 0
  m_ForceIntoRT: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
--- !u!4 &650951421
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 1, z: -10}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &943016870
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 943016872}
  - component: {fileID: 943016871}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &943016871
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_Enabled: 1
  serializedVersion: 8
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
  m_ColorTemperature: 6570
  m_UseColorTemperature: 0
  m_ShadowRadius: 0
  m_ShadowAngle: 0
--- !u!4 &943016872
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_LocalRotation: {x: 0.40821788, y: -0.23456968, z: 0.10938163, w: 0.8754261}
  m_LocalPosition: {x: 0, y: 3, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 50, y: -30, z: 0}
--- !u!1 &985248683
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 985248684}
  - component: {fileID: 985248687}
  - component: {fileID: 985248686}
  - component: {fileID: 985248685}
  m_Layer: 5
  m_Name: TutorialBtn
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &985248684
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 985248683}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.1338836, y: 1.1338841, z: 1.1338841}
  m_Children:
  - {fileID: 1338625098}
  m_Father: {fileID: 1505279377}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 176, y: 39.6}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &985248685
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 985248683}
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
    m_HighlightedColor: {r: 0.61764705, g: 0.61764705, b: 0.61764705, a: 1}
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
  m_TargetGraphic: {fileID: 985248686}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 1500638845}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: S_Help
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &985248686
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 985248683}
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
--- !u!222 &985248687
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 985248683}
--- !u!1 &1128077937
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1128077938}
  - component: {fileID: 1128077940}
  - component: {fileID: 1128077939}
  m_Layer: 5
  m_Name: Image
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1128077938
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1392757054}
  - {fileID: 1505279377}
  - {fileID: 1566483215}
  - {fileID: 1178106036}
  m_Father: {fileID: 1853910843}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 625.4, y: 454.9}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1128077939
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0, b: 0, a: 0.748}
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
--- !u!222 &1128077940
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
--- !u!1 &1146554002
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1146554003}
  - component: {fileID: 1146554005}
  - component: {fileID: 1146554004}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1146554003
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1146554002}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 565891500}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.00000047680714, y: -0.011244}
  m_SizeDelta: {x: 0, y: -0.022507}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1146554004
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1146554002}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 0
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 0
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Start
--- !u!222 &1146554005
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1146554002}
--- !u!1 &1178106035
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1178106036}
  - component: {fileID: 1178106039}
  - component: {fileID: 1178106038}
  - component: {fileID: 1178106037}
  m_Layer: 5
  m_Name: AudioButton
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1178106036
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1178106035}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 1}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -25.630005, y: -24.7}
  m_SizeDelta: {x: 50.669983, y: 42.850006}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1178106037
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1178106035}
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
    m_HighlightedColor: {r: 0.7794118, g: 0.7794118, b: 0.7794118, a: 1}
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
  m_TargetGraphic: {fileID: 1178106038}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: StopBackAudio
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
--- !u!114 &1178106038
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1178106035}
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
  m_Sprite: {fileID: 21300000, guid: 62b35f45f298153468723a026545374a, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1178106039
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1178106035}
--- !u!1 &1223308024
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1223308025}
  - component: {fileID: 1223308028}
  - component: {fileID: 1223308027}
  - component: {fileID: 1223308026}
  m_Layer: 5
  m_Name: CreditsBtn
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1223308025
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1223308024}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.1338836, y: 1.1338841, z: 1.1338841}
  m_Children:
  - {fileID: 1450472911}
  m_Father: {fileID: 1505279377}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 176, y: 39.6}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1223308026
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1223308024}
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
    m_HighlightedColor: {r: 0.61764705, g: 0.61764705, b: 0.61764705, a: 1}
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
  m_TargetGraphic: {fileID: 1223308027}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 1500638845}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: S_Credits
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &1223308027
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1223308024}
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
--- !u!222 &1223308028
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1223308024}
--- !u!1001 &1269975853
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4813014608461382, guid: a0685e6dac0c44d9fbc607930f4a897d, type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4813014608461382, guid: a0685e6dac0c44d9fbc607930f4a897d, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4813014608461382, guid: a0685e6dac0c44d9fbc607930f4a897d, type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4813014608461382, guid: a0685e6dac0c44d9fbc607930f4a897d, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4813014608461382, guid: a0685e6dac0c44d9fbc607930f4a897d, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4813014608461382, guid: a0685e6dac0c44d9fbc607930f4a897d, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4813014608461382, guid: a0685e6dac0c44d9fbc607930f4a897d, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4813014608461382, guid: a0685e6dac0c44d9fbc607930f4a897d, type: 2}
      propertyPath: m_RootOrder
      value: 6
      objectReference: {fileID: 0}
    - target: {fileID: 114022582269577592, guid: a0685e6dac0c44d9fbc607930f4a897d,
        type: 2}
      propertyPath: gioHttpClient
      value:
      objectReference: {fileID: 1355082793054128, guid: 59e3b28ae07a52a4da5eca0ad8eb7ff5,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: a0685e6dac0c44d9fbc607930f4a897d, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1338625097
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1338625098}
  - component: {fileID: 1338625100}
  - component: {fileID: 1338625099}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1338625098
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1338625097}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 985248684}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.00000047680714, y: -0.011244}
  m_SizeDelta: {x: 0, y: -0.022507}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1338625099
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1338625097}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 0
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 0
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Tutorial
--- !u!222 &1338625100
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1338625097}
--- !u!1 &1392757053
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1392757054}
  - component: {fileID: 1392757056}
  - component: {fileID: 1392757055}
  m_Layer: 5
  m_Name: WelcomeText
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1392757054
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1392757053}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: 5, y: -27.55}
  m_SizeDelta: {x: 403.7, y: 55.1}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1392757055
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1392757053}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 35
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
  m_Text: Welcome to Chemistry Lab
--- !u!222 &1392757056
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1392757053}
--- !u!1 &1450472910
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1450472911}
  - component: {fileID: 1450472913}
  - component: {fileID: 1450472912}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1450472911
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1450472910}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1223308025}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.00000047680714, y: -0.011244}
  m_SizeDelta: {x: 0, y: -0.022507}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1450472912
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1450472910}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 0
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 0
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Credits
--- !u!222 &1450472913
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1450472910}
--- !u!1001 &1500638844
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.x
      value: -8.244101
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.y
      value: 1.4762541
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3126498
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingPanel
      value:
      objectReference: {fileID: 60939075}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingBar
      value:
      objectReference: {fileID: 61884517}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
  m_IsPrefabParent: 0
--- !u!114 &1500638845 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
    type: 2}
  m_PrefabInternal: {fileID: 1500638844}
  m_Script: {fileID: 11500000, guid: 8d74cc27ebd56d54ebf3e953b25846bc, type: 3}
--- !u!1 &1505279376
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1505279377}
  - component: {fileID: 1505279380}
  - component: {fileID: 1505279379}
  - component: {fileID: 1505279378}
  m_Layer: 5
  m_Name: ButtonsPanel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1505279377
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1505279376}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 565891500}
  - {fileID: 1223308025}
  - {fileID: 985248684}
  m_Father: {fileID: 1128077938}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: -95.25}
  m_SizeDelta: {x: 237.7, y: 264.4}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1505279378
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1505279376}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1297475563, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Padding:
    m_Left: 0
    m_Right: 0
    m_Top: 0
    m_Bottom: 0
  m_ChildAlignment: 4
  m_Spacing: -30
  m_ChildForceExpandWidth: 1
  m_ChildForceExpandHeight: 1
  m_ChildControlWidth: 0
  m_ChildControlHeight: 0
--- !u!114 &1505279379
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1505279376}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 0}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1505279380
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1505279376}
--- !u!1 &1566483214
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1566483215}
  - component: {fileID: 1566483217}
  - component: {fileID: 1566483216}
  m_Layer: 5
  m_Name: BaseText
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1566483215
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1566483214}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0.999772, y: 0.999772, z: 0.999772}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 86.95}
  m_SizeDelta: {x: 569.7, y: 100}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1566483216
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1566483214}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 23
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 2
    m_MaxSize: 24
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Have fun by learning and developing your skills in the science of chemistry
    through an interactive and entertaining experience.
--- !u!222 &1566483217
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1566483214}
--- !u!1 &1597161468
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1597161469}
  - component: {fileID: 1597161471}
  - component: {fileID: 1597161470}
  m_Layer: 5
  m_Name: BackgroundImage
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1597161469
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1853910843}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 1336, y: 768.00006}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1597161470
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.9264706, g: 0.9264706, b: 0.9264706, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: ___[mainmenu_featured_image_sprite]___, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1597161471
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
--- !u!1001 &1837309522
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.x
      value: 1.389278
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.y
      value: -0.064435095
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.z
      value: 89.94141
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 82723325584739438, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: spreadCustomCurve.m_RotationOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 82480303932076466, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: spreadCustomCurve.m_RotationOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 82480303932076466, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: m_PlayOnAwake
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 82480303932076466, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: m_audioClip
      value:
      objectReference: {fileID: 8300000, guid: 9b377c3791149d645a146d86192db8f6, type: 3}
    - target: {fileID: 82480303932076466, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: Loop
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 82480303932076466, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: Priority
      value: 256
      objectReference: {fileID: 0}
    - target: {fileID: 82480303932076466, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: m_Volume
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 82723325584739438, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: Priority
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 82723325584739438, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: m_Volume
      value: 0.8
      objectReference: {fileID: 0}
    - target: {fileID: 82480303932076466, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
      propertyPath: m_Enabled
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents:
    - {fileID: 82377210902597404, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
  m_ParentPrefab: {fileID: 100100000, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1853910839
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1853910843}
  - component: {fileID: 1853910842}
  - component: {fileID: 1853910841}
  - component: {fileID: 1853910840}
  m_Layer: 5
  m_Name: Canvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1853910840
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
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
--- !u!114 &1853910841
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1336, y: 768}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0.5
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &1853910842
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 1
  m_Camera: {fileID: 650951420}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &1853910843
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1597161469}
  - {fileID: 1128077938}
  - {fileID: 60939076}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}');

$ini_scene_credits_chem_unity_pattern = array('%YAML 1.1
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
  serializedVersion: 8
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
  m_SubtractiveShadowColor: {r: 0.42, g: 0.478, b: 0.627, a: 1}
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
  m_IndirectSpecularColor: {r: 0.44657898, g: 0.4964133, b: 0.5748178, a: 1}
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 11
  m_GIWorkflowMode: 0
  m_GISettings:
    serializedVersion: 2
    m_BounceScale: 1
    m_IndirectOutputScale: 1
    m_AlbedoBoost: 1
    m_TemporalCoherenceThreshold: 1
    m_EnvironmentLightingMode: 0
    m_EnableBakedLightmaps: 0
    m_EnableRealtimeLightmaps: 0
  m_LightmapEditorSettings:
    serializedVersion: 9
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
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
    m_MixedBakeMode: 2
    m_BakeBackend: 0
    m_PVRSampling: 1
    m_PVRDirectSampleCount: 32
    m_PVRSampleCount: 500
    m_PVRBounces: 2
    m_PVRFilterTypeDirect: 0
    m_PVRFilterTypeIndirect: 0
    m_PVRFilterTypeAO: 0
    m_PVRFilteringMode: 1
    m_PVRCulling: 1
    m_PVRFilteringGaussRadiusDirect: 1
    m_PVRFilteringGaussRadiusIndirect: 5
    m_PVRFilteringGaussRadiusAO: 2
    m_PVRFilteringAtrousPositionSigmaDirect: 0.5
    m_PVRFilteringAtrousPositionSigmaIndirect: 2
    m_PVRFilteringAtrousPositionSigmaAO: 1
    m_ShowResolutionOverlay: 1
  m_LightingDataAsset: {fileID: 0}
  m_UseShadowmask: 1
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
    manualTileSize: 0
    tileSize: 256
    accuratePlacement: 0
    debug:
      m_Flags: 0
  m_NavMeshData: {fileID: 0}
--- !u!1 &60939075 stripped
GameObject:
  m_PrefabParentObject: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!224 &60939076 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!114 &61884517 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
  m_Script: {fileID: -113659843, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1 &612720209
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 612720210}
  - component: {fileID: 612720212}
  - component: {fileID: 612720211}
  m_Layer: 5
  m_Name: CreditsImage
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &612720210
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 612720209}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 150.7}
  m_SizeDelta: {x: 945.7, y: 388.9}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &612720211
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 612720209}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: ___[img_credits_scene]___, type: 3}
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
  m_Sprite: {fileID: 21300000, guid: 6352e8c96ff307544821ef643836bfe4, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &612720212
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 612720209}
--- !u!1001 &639724802
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1853910843}
    m_Modifications:
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 134d803fbe5daad4898013368569a93b, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &648957661
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 648957664}
  - component: {fileID: 648957663}
  - component: {fileID: 648957662}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &648957662
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
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
--- !u!114 &648957663
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &648957664
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &650951417
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 650951421}
  - component: {fileID: 650951420}
  - component: {fileID: 650951419}
  - component: {fileID: 650951418}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &650951418
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!124 &650951419
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!20 &650951420
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
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
  orthographic: 1
  orthographic size: 5
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: -1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 1
  m_AllowMSAA: 1
  m_AllowDynamicResolution: 0
  m_ForceIntoRT: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
--- !u!4 &650951421
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 1, z: -10}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &943016870
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 943016872}
  - component: {fileID: 943016871}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &943016871
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_Enabled: 1
  serializedVersion: 8
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
  m_ColorTemperature: 6570
  m_UseColorTemperature: 0
  m_ShadowRadius: 0
  m_ShadowAngle: 0
--- !u!4 &943016872
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_LocalRotation: {x: 0.40821788, y: -0.23456968, z: 0.10938163, w: 0.8754261}
  m_LocalPosition: {x: 0, y: 3, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 50, y: -30, z: 0}
--- !u!1 &1128077937
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1128077938}
  - component: {fileID: 1128077940}
  - component: {fileID: 1128077939}
  m_Layer: 5
  m_Name: Image
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1128077938
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1975080048}
  - {fileID: 1356577910}
  - {fileID: 612720210}
  m_Father: {fileID: 1597161469}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 9.9}
  m_SizeDelta: {x: 1117.5, y: 720.2}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1128077939
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0, b: 0, a: 0.847}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1128077940
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
--- !u!1 &1356577909
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1356577910}
  - component: {fileID: 1356577912}
  - component: {fileID: 1356577911}
  m_Layer: 5
  m_Name: CreditsText
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1356577910
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1356577909}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -0, y: -212.675}
  m_SizeDelta: {x: 1079, y: 294.9}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1356577911
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1356577909}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 20
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: "___[text_credits_scene]___"
--- !u!222 &1356577912
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1356577909}
--- !u!1001 &1500638844
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.x
      value: -8.244101
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.y
      value: 1.4762541
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3126498
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingPanel
      value:
      objectReference: {fileID: 60939075}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingBar
      value:
      objectReference: {fileID: 61884517}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
  m_IsPrefabParent: 0
--- !u!114 &1500638845 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
    type: 2}
  m_PrefabInternal: {fileID: 1500638844}
  m_Script: {fileID: 11500000, guid: 8d74cc27ebd56d54ebf3e953b25846bc, type: 3}
--- !u!1 &1597161468
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1597161469}
  - component: {fileID: 1597161471}
  - component: {fileID: 1597161470}
  m_Layer: 5
  m_Name: BackgroundImage
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1597161469
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1128077938}
  m_Father: {fileID: 1853910843}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -0.000015259, y: 0.000003550985}
  m_SizeDelta: {x: 0, y: 0.000061035}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1597161470
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: ___[imgbg_credits_scene]___, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.72794116, g: 0.72794116, b: 0.72794116, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: 0615df35482643d4a9004b7e6ed3f778, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1597161471
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
--- !u!1 &1853910839
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1853910843}
  - component: {fileID: 1853910842}
  - component: {fileID: 1853910841}
  - component: {fileID: 1853910840}
  m_Layer: 5
  m_Name: Canvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1853910840
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
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
--- !u!114 &1853910841
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1336, y: 768}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0.5
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &1853910842
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 1
  m_Camera: {fileID: 650951420}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &1853910843
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1597161469}
  - {fileID: 60939076}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!1 &1975080047
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1975080048}
  - component: {fileID: 1975080051}
  - component: {fileID: 1975080050}
  - component: {fileID: 1975080049}
  m_Layer: 5
  m_Name: Button
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1975080048
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.2541422, y: 1.254142, z: 1.254142}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 1}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: 32.2, y: -25.4}
  m_SizeDelta: {x: 50, y: 40}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1975080049
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
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
    m_HighlightedColor: {r: 0.7794118, g: 0.7794118, b: 0.7794118, a: 1}
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
  m_TargetGraphic: {fileID: 1975080050}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1500638845}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: S_MainMenu
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &1975080050
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
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
  m_Sprite: {fileID: 21300000, guid: aa78acf1fe63279408795f31460fd017, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1975080051
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
');

$ini_scene_options_chem_unity_pattern = array('ADD HERE');

$ini_scene_help_chem_unity_pattern = array('%YAML 1.1
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
  serializedVersion: 8
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
  m_SubtractiveShadowColor: {r: 0.42, g: 0.478, b: 0.627, a: 1}
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
  m_IndirectSpecularColor: {r: 0.44657898, g: 0.4964133, b: 0.5748178, a: 1}
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 11
  m_GIWorkflowMode: 0
  m_GISettings:
    serializedVersion: 2
    m_BounceScale: 1
    m_IndirectOutputScale: 1
    m_AlbedoBoost: 1
    m_TemporalCoherenceThreshold: 1
    m_EnvironmentLightingMode: 0
    m_EnableBakedLightmaps: 0
    m_EnableRealtimeLightmaps: 0
  m_LightmapEditorSettings:
    serializedVersion: 9
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
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
    m_MixedBakeMode: 2
    m_BakeBackend: 0
    m_PVRSampling: 1
    m_PVRDirectSampleCount: 32
    m_PVRSampleCount: 500
    m_PVRBounces: 2
    m_PVRFilterTypeDirect: 0
    m_PVRFilterTypeIndirect: 0
    m_PVRFilterTypeAO: 0
    m_PVRFilteringMode: 1
    m_PVRCulling: 1
    m_PVRFilteringGaussRadiusDirect: 1
    m_PVRFilteringGaussRadiusIndirect: 5
    m_PVRFilteringGaussRadiusAO: 2
    m_PVRFilteringAtrousPositionSigmaDirect: 0.5
    m_PVRFilteringAtrousPositionSigmaIndirect: 2
    m_PVRFilteringAtrousPositionSigmaAO: 1
    m_ShowResolutionOverlay: 1
  m_LightingDataAsset: {fileID: 0}
  m_UseShadowmask: 1
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
    manualTileSize: 0
    tileSize: 256
    accuratePlacement: 0
    debug:
      m_Flags: 0
  m_NavMeshData: {fileID: 0}
--- !u!1 &60939075 stripped
GameObject:
  m_PrefabParentObject: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!224 &60939076 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!114 &61884517 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
  m_Script: {fileID: -113659843, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1001 &639724802
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1853910843}
    m_Modifications:
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 134d803fbe5daad4898013368569a93b, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &648957661
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 648957664}
  - component: {fileID: 648957663}
  - component: {fileID: 648957662}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &648957662
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
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
--- !u!114 &648957663
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &648957664
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &650951417
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 650951421}
  - component: {fileID: 650951420}
  - component: {fileID: 650951419}
  - component: {fileID: 650951418}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &650951418
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!124 &650951419
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!20 &650951420
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
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
  orthographic: 1
  orthographic size: 5
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: -1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 1
  m_AllowMSAA: 1
  m_AllowDynamicResolution: 0
  m_ForceIntoRT: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
--- !u!4 &650951421
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 1, z: -10}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &943016870
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 943016872}
  - component: {fileID: 943016871}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &943016871
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_Enabled: 1
  serializedVersion: 8
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
  m_ColorTemperature: 6570
  m_UseColorTemperature: 0
  m_ShadowRadius: 0
  m_ShadowAngle: 0
--- !u!4 &943016872
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_LocalRotation: {x: 0.40821788, y: -0.23456968, z: 0.10938163, w: 0.8754261}
  m_LocalPosition: {x: 0, y: 3, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 50, y: -30, z: 0}
--- !u!1 &1128077937
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1128077938}
  - component: {fileID: 1128077940}
  - component: {fileID: 1128077939}
  m_Layer: 5
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1128077938
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1618974997}
  - {fileID: 1361962195}
  - {fileID: 1975080048}
  - {fileID: 1639286768}
  m_Father: {fileID: 1597161469}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: -137.19995, y: -50.799988}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1128077939
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0, b: 0, a: 0.803}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1128077940
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
--- !u!1 &1361962194
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1361962195}
  - component: {fileID: 1361962197}
  - component: {fileID: 1361962196}
  m_Layer: 5
  m_Name: __HelpText__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1361962195
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1361962194}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.0000445, y: 1.0000445, z: 1.0000445}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0.5}
  m_AnchorMax: {x: 0, y: 0.5}
  m_AnchoredPosition: {x: 599.4, y: 127.15}
  m_SizeDelta: {x: 1091.5, y: 254.3}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1361962196
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1361962194}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: ___[text_help_scene]___
--- !u!222 &1361962197
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1361962194}
--- !u!1001 &1500638844
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.x
      value: -8.244101
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.y
      value: 1.4762541
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3126498
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingPanel
      value:
      objectReference: {fileID: 60939075}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingBar
      value:
      objectReference: {fileID: 61884517}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
  m_IsPrefabParent: 0
--- !u!114 &1500638845 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
    type: 2}
  m_PrefabInternal: {fileID: 1500638844}
  m_Script: {fileID: 11500000, guid: 8d74cc27ebd56d54ebf3e953b25846bc, type: 3}
--- !u!1 &1597161468
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1597161469}
  - component: {fileID: 1597161471}
  - component: {fileID: 1597161470}
  m_Layer: 5
  m_Name: __BackgroundImage__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1597161469
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1128077938}
  m_Father: {fileID: 1853910843}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -0.000015259, y: 0.000003550985}
  m_SizeDelta: {x: 0, y: 0.000061035}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1597161470
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
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
  m_Sprite: {fileID: 21300000, guid: ___[imgbg_help_scene]___, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1597161471
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
--- !u!1 &1618974996
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1618974997}
  - component: {fileID: 1618974999}
  - component: {fileID: 1618974998}
  m_Layer: 5
  m_Name: HelpTitle
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1618974997
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1618974996}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: 0, y: -38.69995}
  m_SizeDelta: {x: 790.7, y: 66.8}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1618974998
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1618974996}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 50
    m_Alignment: 1
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Help
--- !u!222 &1618974999
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1618974996}
--- !u!1 &1639286767
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1639286768}
  - component: {fileID: 1639286770}
  - component: {fileID: 1639286769}
  m_Layer: 5
  m_Name: __HelpImage__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1639286768
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1639286767}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 599.4, y: 186.55}
  m_SizeDelta: {x: 573.1, y: 344.1}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1639286769
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1639286767}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: ___[img_help_scene]___, type: 3}
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
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1639286770
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1639286767}
--- !u!1 &1853910839
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1853910843}
  - component: {fileID: 1853910842}
  - component: {fileID: 1853910841}
  - component: {fileID: 1853910840}
  m_Layer: 5
  m_Name: Canvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1853910840
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
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
--- !u!114 &1853910841
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1336, y: 768}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0.5
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &1853910842
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 1
  m_Camera: {fileID: 650951420}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &1853910843
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1597161469}
  - {fileID: 60939076}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!1 &1975080047
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1975080048}
  - component: {fileID: 1975080051}
  - component: {fileID: 1975080050}
  - component: {fileID: 1975080049}
  m_Layer: 5
  m_Name: __ReturnButton__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1975080048
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.2541422, y: 1.254142, z: 1.254142}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 1}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: 31.899902, y: -25.300049}
  m_SizeDelta: {x: 50, y: 40}
  m_Pivot: {x: 0.5000006, y: 0.5}
--- !u!114 &1975080049
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
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
    m_HighlightedColor: {r: 0.7794118, g: 0.7794118, b: 0.7794118, a: 1}
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
  m_TargetGraphic: {fileID: 1975080050}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1500638845}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: S_MainMenu
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &1975080050
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
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
  m_Sprite: {fileID: 21300000, guid: aa78acf1fe63279408795f31460fd017, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1975080051
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}');

$ini_scene_help_chem_unity_pattern = array('%YAML 1.1
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
  serializedVersion: 8
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
  m_SubtractiveShadowColor: {r: 0.42, g: 0.478, b: 0.627, a: 1}
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
  m_IndirectSpecularColor: {r: 0.44657898, g: 0.4964133, b: 0.5748178, a: 1}
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 11
  m_GIWorkflowMode: 0
  m_GISettings:
    serializedVersion: 2
    m_BounceScale: 1
    m_IndirectOutputScale: 1
    m_AlbedoBoost: 1
    m_TemporalCoherenceThreshold: 1
    m_EnvironmentLightingMode: 0
    m_EnableBakedLightmaps: 0
    m_EnableRealtimeLightmaps: 0
  m_LightmapEditorSettings:
    serializedVersion: 9
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
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
    m_MixedBakeMode: 2
    m_BakeBackend: 0
    m_PVRSampling: 1
    m_PVRDirectSampleCount: 32
    m_PVRSampleCount: 500
    m_PVRBounces: 2
    m_PVRFilterTypeDirect: 0
    m_PVRFilterTypeIndirect: 0
    m_PVRFilterTypeAO: 0
    m_PVRFilteringMode: 1
    m_PVRCulling: 1
    m_PVRFilteringGaussRadiusDirect: 1
    m_PVRFilteringGaussRadiusIndirect: 5
    m_PVRFilteringGaussRadiusAO: 2
    m_PVRFilteringAtrousPositionSigmaDirect: 0.5
    m_PVRFilteringAtrousPositionSigmaIndirect: 2
    m_PVRFilteringAtrousPositionSigmaAO: 1
    m_ShowResolutionOverlay: 1
  m_LightingDataAsset: {fileID: 0}
  m_UseShadowmask: 1
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
    manualTileSize: 0
    tileSize: 256
    accuratePlacement: 0
    debug:
      m_Flags: 0
  m_NavMeshData: {fileID: 0}
--- !u!1 &60939075 stripped
GameObject:
  m_PrefabParentObject: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!224 &60939076 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!114 &61884517 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
  m_Script: {fileID: -113659843, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1001 &639724802
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1853910843}
    m_Modifications:
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 134d803fbe5daad4898013368569a93b, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &648957661
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 648957664}
  - component: {fileID: 648957663}
  - component: {fileID: 648957662}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &648957662
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
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
--- !u!114 &648957663
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &648957664
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &650951417
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 650951421}
  - component: {fileID: 650951420}
  - component: {fileID: 650951419}
  - component: {fileID: 650951418}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &650951418
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!124 &650951419
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!20 &650951420
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
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
  orthographic: 1
  orthographic size: 5
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: -1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 1
  m_AllowMSAA: 1
  m_AllowDynamicResolution: 0
  m_ForceIntoRT: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
--- !u!4 &650951421
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 1, z: -10}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &943016870
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 943016872}
  - component: {fileID: 943016871}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &943016871
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_Enabled: 1
  serializedVersion: 8
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
  m_ColorTemperature: 6570
  m_UseColorTemperature: 0
  m_ShadowRadius: 0
  m_ShadowAngle: 0
--- !u!4 &943016872
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_LocalRotation: {x: 0.40821788, y: -0.23456968, z: 0.10938163, w: 0.8754261}
  m_LocalPosition: {x: 0, y: 3, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 50, y: -30, z: 0}
--- !u!1 &1128077937
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1128077938}
  - component: {fileID: 1128077940}
  - component: {fileID: 1128077939}
  m_Layer: 5
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1128077938
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1618974997}
  - {fileID: 1361962195}
  - {fileID: 1975080048}
  - {fileID: 1639286768}
  m_Father: {fileID: 1597161469}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: -137.19995, y: -50.799988}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1128077939
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0, b: 0, a: 0.803}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1128077940
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
--- !u!1 &1361962194
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1361962195}
  - component: {fileID: 1361962197}
  - component: {fileID: 1361962196}
  m_Layer: 5
  m_Name: __HelpText__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1361962195
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1361962194}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.0000445, y: 1.0000445, z: 1.0000445}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0.5}
  m_AnchorMax: {x: 0, y: 0.5}
  m_AnchoredPosition: {x: 599.4, y: 127.15}
  m_SizeDelta: {x: 1091.5, y: 254.3}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1361962196
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1361962194}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: ___[text_help_scene]___
--- !u!222 &1361962197
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1361962194}
--- !u!1001 &1500638844
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.x
      value: -8.244101
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.y
      value: 1.4762541
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3126498
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingPanel
      value:
      objectReference: {fileID: 60939075}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingBar
      value:
      objectReference: {fileID: 61884517}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
  m_IsPrefabParent: 0
--- !u!114 &1500638845 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
    type: 2}
  m_PrefabInternal: {fileID: 1500638844}
  m_Script: {fileID: 11500000, guid: 8d74cc27ebd56d54ebf3e953b25846bc, type: 3}
--- !u!1 &1597161468
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1597161469}
  - component: {fileID: 1597161471}
  - component: {fileID: 1597161470}
  m_Layer: 5
  m_Name: __BackgroundImage__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1597161469
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1128077938}
  m_Father: {fileID: 1853910843}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -0.000015259, y: 0.000003550985}
  m_SizeDelta: {x: 0, y: 0.000061035}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1597161470
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
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
  m_Sprite: {fileID: 21300000, guid: ___[imgbg_help_scene]___, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1597161471
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
--- !u!1 &1618974996
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1618974997}
  - component: {fileID: 1618974999}
  - component: {fileID: 1618974998}
  m_Layer: 5
  m_Name: HelpTitle
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1618974997
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1618974996}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: 0, y: -38.69995}
  m_SizeDelta: {x: 790.7, y: 66.8}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1618974998
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1618974996}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 50
    m_Alignment: 1
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Help
--- !u!222 &1618974999
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1618974996}
--- !u!1 &1639286767
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1639286768}
  - component: {fileID: 1639286770}
  - component: {fileID: 1639286769}
  m_Layer: 5
  m_Name: ___[img_help_scene]___
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1639286768
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1639286767}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 599.4, y: 186.55}
  m_SizeDelta: {x: 573.1, y: 344.1}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1639286769
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1639286767}
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
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1639286770
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1639286767}
--- !u!1 &1853910839
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1853910843}
  - component: {fileID: 1853910842}
  - component: {fileID: 1853910841}
  - component: {fileID: 1853910840}
  m_Layer: 5
  m_Name: Canvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1853910840
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
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
--- !u!114 &1853910841
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1336, y: 768}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0.5
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &1853910842
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 1
  m_Camera: {fileID: 650951420}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &1853910843
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1597161469}
  - {fileID: 60939076}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!1 &1975080047
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1975080048}
  - component: {fileID: 1975080051}
  - component: {fileID: 1975080050}
  - component: {fileID: 1975080049}
  m_Layer: 5
  m_Name: __ReturnButton__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1975080048
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.2541422, y: 1.254142, z: 1.254142}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 1}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: 31.899902, y: -25.300049}
  m_SizeDelta: {x: 50, y: 40}
  m_Pivot: {x: 0.5000006, y: 0.5}
--- !u!114 &1975080049
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
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
    m_HighlightedColor: {r: 0.7794118, g: 0.7794118, b: 0.7794118, a: 1}
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
  m_TargetGraphic: {fileID: 1975080050}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1500638845}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: S_MainMenu
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &1975080050
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
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
  m_Sprite: {fileID: 21300000, guid: aa78acf1fe63279408795f31460fd017, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1975080051
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}');

$ini_scene_login_chem_unity_pattern = array('%YAML 1.1
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
  serializedVersion: 8
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
  m_SubtractiveShadowColor: {r: 0.42, g: 0.478, b: 0.627, a: 1}
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
  m_IndirectSpecularColor: {r: 0.44657898, g: 0.4964133, b: 0.5748178, a: 1}
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 11
  m_GIWorkflowMode: 0
  m_GISettings:
    serializedVersion: 2
    m_BounceScale: 1
    m_IndirectOutputScale: 1
    m_AlbedoBoost: 1
    m_TemporalCoherenceThreshold: 1
    m_EnvironmentLightingMode: 0
    m_EnableBakedLightmaps: 0
    m_EnableRealtimeLightmaps: 0
  m_LightmapEditorSettings:
    serializedVersion: 9
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
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
    m_MixedBakeMode: 2
    m_BakeBackend: 0
    m_PVRSampling: 1
    m_PVRDirectSampleCount: 32
    m_PVRSampleCount: 500
    m_PVRBounces: 2
    m_PVRFilterTypeDirect: 0
    m_PVRFilterTypeIndirect: 0
    m_PVRFilterTypeAO: 0
    m_PVRFilteringMode: 1
    m_PVRCulling: 1
    m_PVRFilteringGaussRadiusDirect: 1
    m_PVRFilteringGaussRadiusIndirect: 5
    m_PVRFilteringGaussRadiusAO: 2
    m_PVRFilteringAtrousPositionSigmaDirect: 0.5
    m_PVRFilteringAtrousPositionSigmaIndirect: 2
    m_PVRFilteringAtrousPositionSigmaAO: 1
    m_ShowResolutionOverlay: 1
  m_LightingDataAsset: {fileID: 0}
  m_UseShadowmask: 1
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
    manualTileSize: 0
    tileSize: 256
    accuratePlacement: 0
    debug:
      m_Flags: 0
  m_NavMeshData: {fileID: 0}
--- !u!1 &60939075 stripped
GameObject:
  m_PrefabParentObject: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!224 &60939076 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
--- !u!114 &61884517 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 639724802}
  m_Script: {fileID: -113659843, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1 &96407919
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 96407920}
  - component: {fileID: 96407923}
  - component: {fileID: 96407922}
  - component: {fileID: 96407921}
  m_Layer: 5
  m_Name: Name
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &96407920
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 96407919}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1744837796}
  - {fileID: 1575661858}
  m_Father: {fileID: 1128077938}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0.25, y: 37}
  m_SizeDelta: {x: 219.9, y: 43.1}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &96407921
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 96407919}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 575553740, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_TargetGraphic: {fileID: 96407922}
  m_TextComponent: {fileID: 1575661859}
  m_Placeholder: {fileID: 1744837797}
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
      - m_Target: {fileID: 114302560275996662, guid: 7e42676681ba3ac45843f30ca5a3b595,
          type: 2}
        m_MethodName: SetName
        m_Mode: 0
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
--- !u!114 &96407922
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 96407919}
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
  m_Sprite: {fileID: 10911, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &96407923
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 96407919}
--- !u!1 &108510369
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 108510370}
  - component: {fileID: 108510372}
  - component: {fileID: 108510371}
  m_Layer: 5
  m_Name: loginSprite
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &108510370
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 108510369}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1392757054}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: -153.2, y: -30.249985}
  m_SizeDelta: {x: 55.5, y: 61}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &108510371
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 108510369}
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
  m_Sprite: {fileID: 21300000, guid: 18faa02ec6c674843ab6784ecf1b8d8d, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &108510372
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 108510369}
--- !u!1001 &230933260
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4031605624828626, guid: 022a6b25a7cbe5e498854d26faf04587, type: 2}
      propertyPath: m_LocalPosition.x
      value: 0.33457002
      objectReference: {fileID: 0}
    - target: {fileID: 4031605624828626, guid: 022a6b25a7cbe5e498854d26faf04587, type: 2}
      propertyPath: m_LocalPosition.y
      value: 1.7313768
      objectReference: {fileID: 0}
    - target: {fileID: 4031605624828626, guid: 022a6b25a7cbe5e498854d26faf04587, type: 2}
      propertyPath: m_LocalPosition.z
      value: 90.14189
      objectReference: {fileID: 0}
    - target: {fileID: 4031605624828626, guid: 022a6b25a7cbe5e498854d26faf04587, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4031605624828626, guid: 022a6b25a7cbe5e498854d26faf04587, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4031605624828626, guid: 022a6b25a7cbe5e498854d26faf04587, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4031605624828626, guid: 022a6b25a7cbe5e498854d26faf04587, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4031605624828626, guid: 022a6b25a7cbe5e498854d26faf04587, type: 2}
      propertyPath: m_RootOrder
      value: 6
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 022a6b25a7cbe5e498854d26faf04587, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &252003466
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 252003467}
  - component: {fileID: 252003469}
  - component: {fileID: 252003468}
  m_Layer: 5
  m_Name: __LoginText__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &252003467
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 252003466}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0.999936, y: 0.999936, z: 0.999936}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: 0.25, y: -116}
  m_SizeDelta: {x: 579.3, y: 64.3}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &252003468
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 252003466}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 20
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 0
    m_MaxSize: 50
    m_Alignment: 1
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Provide your information to help us categorize your actions and id.
--- !u!222 &252003469
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 252003466}
--- !u!1001 &259073574
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4769478114588660, guid: 9358b607b55297d4d92277e92a9c4423, type: 2}
      propertyPath: m_LocalPosition.x
      value: 0.008264801
      objectReference: {fileID: 0}
    - target: {fileID: 4769478114588660, guid: 9358b607b55297d4d92277e92a9c4423, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0.41934553
      objectReference: {fileID: 0}
    - target: {fileID: 4769478114588660, guid: 9358b607b55297d4d92277e92a9c4423, type: 2}
      propertyPath: m_LocalPosition.z
      value: 90.17578
      objectReference: {fileID: 0}
    - target: {fileID: 4769478114588660, guid: 9358b607b55297d4d92277e92a9c4423, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4769478114588660, guid: 9358b607b55297d4d92277e92a9c4423, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4769478114588660, guid: 9358b607b55297d4d92277e92a9c4423, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4769478114588660, guid: 9358b607b55297d4d92277e92a9c4423, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4769478114588660, guid: 9358b607b55297d4d92277e92a9c4423, type: 2}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 114854520396343458, guid: 9358b607b55297d4d92277e92a9c4423,
        type: 2}
      propertyPath: inputFields.Array.data[0]
      value:
      objectReference: {fileID: 96407921}
    - target: {fileID: 114854520396343458, guid: 9358b607b55297d4d92277e92a9c4423,
        type: 2}
      propertyPath: inputFields.Array.data[1]
      value:
      objectReference: {fileID: 494511628}
    - target: {fileID: 114854520396343458, guid: 9358b607b55297d4d92277e92a9c4423,
        type: 2}
      propertyPath: inputFields.Array.data[2]
      value:
      objectReference: {fileID: 774754261}
    - target: {fileID: 114854520396343458, guid: 9358b607b55297d4d92277e92a9c4423,
        type: 2}
      propertyPath: textLog
      value:
      objectReference: {fileID: 2084963038}
    - target: {fileID: 114854520396343458, guid: 9358b607b55297d4d92277e92a9c4423,
        type: 2}
      propertyPath: sceneLoader
      value:
      objectReference: {fileID: 1500638845}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 9358b607b55297d4d92277e92a9c4423, type: 2}
  m_IsPrefabParent: 0
--- !u!114 &259073575 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114854520396343458, guid: 9358b607b55297d4d92277e92a9c4423,
    type: 2}
  m_PrefabInternal: {fileID: 259073574}
  m_Script: {fileID: 11500000, guid: 5144ec6d3b09417418a7e02d53170669, type: 3}
--- !u!1 &494511626
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 494511627}
  - component: {fileID: 494511630}
  - component: {fileID: 494511629}
  - component: {fileID: 494511628}
  m_Layer: 5
  m_Name: Class
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &494511627
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 494511626}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 2093097503}
  - {fileID: 529877319}
  m_Father: {fileID: 1128077938}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0.25, y: -38.449993}
  m_SizeDelta: {x: 219.9, y: 43.1}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &494511628
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 494511626}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 575553740, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_TargetGraphic: {fileID: 494511629}
  m_TextComponent: {fileID: 529877320}
  m_Placeholder: {fileID: 2093097504}
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
      - m_Target: {fileID: 114302560275996662, guid: 7e42676681ba3ac45843f30ca5a3b595,
          type: 2}
        m_MethodName: SetClass
        m_Mode: 0
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
--- !u!114 &494511629
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 494511626}
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
  m_Sprite: {fileID: 10911, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &494511630
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 494511626}
--- !u!1 &529877318
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 529877319}
  - component: {fileID: 529877321}
  - component: {fileID: 529877320}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &529877319
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 529877318}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 494511627}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: -0.5}
  m_SizeDelta: {x: -20, y: -13}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &529877320
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 529877318}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 0
    m_HorizontalOverflow: 1
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text:
--- !u!222 &529877321
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 529877318}
--- !u!1 &565891499
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 565891500}
  - component: {fileID: 565891503}
  - component: {fileID: 565891502}
  - component: {fileID: 565891501}
  m_Layer: 5
  m_Name: __PlayBtn__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &565891500
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 565891499}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.1338836, y: 1.1338841, z: 1.1338841}
  m_Children:
  - {fileID: 1146554003}
  m_Father: {fileID: 1128077938}
  m_RootOrder: 5
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0}
  m_AnchorMax: {x: 0.5, y: 0}
  m_AnchoredPosition: {x: 0.00000095367, y: 54}
  m_SizeDelta: {x: 141.2, y: 37.8}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &565891501
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 565891499}
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
    m_NormalColor: {r: 0.9411765, g: 0.9411765, b: 0.9411765, a: 1}
    m_HighlightedColor: {r: 0.6838235, g: 0.6838235, b: 0.6838235, a: 1}
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
  m_TargetGraphic: {fileID: 565891502}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: 28f48e6af139f4947b1e28ed02729467,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 259073575}
        m_MethodName: StartSimulation
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: ___[WanderAroundScene]___
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &565891502
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 565891499}
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
--- !u!222 &565891503
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 565891499}
--- !u!1001 &639724802
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1853910843}
    m_Modifications:
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_RootOrder
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 134d803fbe5daad4898013368569a93b, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &648957661
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 648957664}
  - component: {fileID: 648957663}
  - component: {fileID: 648957662}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &648957662
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
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
--- !u!114 &648957663
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &648957664
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 648957661}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &650951417
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 650951421}
  - component: {fileID: 650951420}
  - component: {fileID: 650951419}
  - component: {fileID: 650951418}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &650951418
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!124 &650951419
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_Enabled: 1
--- !u!20 &650951420
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
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
  orthographic: 1
  orthographic size: 5
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: -1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 1
  m_AllowMSAA: 1
  m_AllowDynamicResolution: 0
  m_ForceIntoRT: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
--- !u!4 &650951421
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 650951417}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 1, z: -10}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &774754259
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 774754260}
  - component: {fileID: 774754263}
  - component: {fileID: 774754262}
  - component: {fileID: 774754261}
  m_Layer: 5
  m_Name: School
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &774754260
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 774754259}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1620064606}
  - {fileID: 1549270119}
  m_Father: {fileID: 1128077938}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0.25, y: -115}
  m_SizeDelta: {x: 219.9, y: 43.1}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &774754261
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 774754259}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 575553740, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_TargetGraphic: {fileID: 774754262}
  m_TextComponent: {fileID: 1549270120}
  m_Placeholder: {fileID: 1620064607}
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
      - m_Target: {fileID: 114302560275996662, guid: 7e42676681ba3ac45843f30ca5a3b595,
          type: 2}
        m_MethodName: SetSchoolName
        m_Mode: 0
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
--- !u!114 &774754262
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 774754259}
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
  m_Sprite: {fileID: 10911, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &774754263
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 774754259}
--- !u!1 &943016870
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 943016872}
  - component: {fileID: 943016871}
  m_Layer: 0
  m_Name: Directional Light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &943016871
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_Enabled: 1
  serializedVersion: 8
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
  m_ColorTemperature: 6570
  m_UseColorTemperature: 0
  m_ShadowRadius: 0
  m_ShadowAngle: 0
--- !u!4 &943016872
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 943016870}
  m_LocalRotation: {x: 0.40821788, y: -0.23456968, z: 0.10938163, w: 0.8754261}
  m_LocalPosition: {x: 0, y: 3, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 50, y: -30, z: 0}
--- !u!1 &1128077937
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1128077938}
  - component: {fileID: 1128077940}
  - component: {fileID: 1128077939}
  m_Layer: 5
  m_Name: Image
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1128077938
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1392757054}
  - {fileID: 252003467}
  - {fileID: 96407920}
  - {fileID: 494511627}
  - {fileID: 774754260}
  - {fileID: 565891500}
  - {fileID: 1975080048}
  m_Father: {fileID: 1853910843}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: -0.0000024007}
  m_SizeDelta: {x: 609.8, y: 492.5}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1128077939
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0, b: 0, a: 0.6666667}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1128077940
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1128077937}
--- !u!1 &1146554002
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1146554003}
  - component: {fileID: 1146554005}
  - component: {fileID: 1146554004}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1146554003
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1146554002}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 565891500}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.00000047680714, y: -0.011244}
  m_SizeDelta: {x: 0, y: -0.022507}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1146554004
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1146554002}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 0
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 0
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Play
--- !u!222 &1146554005
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1146554002}
--- !u!1 &1392757053
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1392757054}
  - component: {fileID: 1392757056}
  - component: {fileID: 1392757055}
  m_Layer: 5
  m_Name: LoginTitle
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1392757054
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1392757053}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 108510370}
  m_Father: {fileID: 1128077938}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: 0, y: -33.67}
  m_SizeDelta: {x: 249, y: 61}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1392757055
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1392757053}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 45
    m_FontStyle: 0
    m_BestFit: 0
    m_MinSize: 0
    m_MaxSize: 50
    m_Alignment: 1
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Login screen
--- !u!222 &1392757056
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1392757053}
--- !u!1001 &1500638844
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.x
      value: -8.244101
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.y
      value: 1.4762541
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3126498
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4194833833431550, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingPanel
      value:
      objectReference: {fileID: 60939075}
    - target: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
        type: 2}
      propertyPath: loadingBar
      value:
      objectReference: {fileID: 61884517}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e, type: 2}
  m_IsPrefabParent: 0
--- !u!114 &1500638845 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114060574274684530, guid: c4d6444502ba61f4c8e6acd3e1ea6d3e,
    type: 2}
  m_PrefabInternal: {fileID: 1500638844}
  m_Script: {fileID: 11500000, guid: 8d74cc27ebd56d54ebf3e953b25846bc, type: 3}
--- !u!1 &1549270118
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1549270119}
  - component: {fileID: 1549270121}
  - component: {fileID: 1549270120}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1549270119
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1549270118}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 774754260}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: -0.5}
  m_SizeDelta: {x: -20, y: -13}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1549270120
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1549270118}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 0
    m_HorizontalOverflow: 1
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text:
--- !u!222 &1549270121
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1549270118}
--- !u!1 &1575661857
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1575661858}
  - component: {fileID: 1575661860}
  - component: {fileID: 1575661859}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1575661858
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1575661857}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 96407920}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: -0.5}
  m_SizeDelta: {x: -20, y: -13}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1575661859
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1575661857}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 0
    m_HorizontalOverflow: 1
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text:
--- !u!222 &1575661860
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1575661857}
--- !u!1 &1597161468
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1597161469}
  - component: {fileID: 1597161471}
  - component: {fileID: 1597161470}
  m_Layer: 5
  m_Name: __BackgroundImage__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1597161469
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 2084963039}
  m_Father: {fileID: 1853910843}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -0.000015259, y: 0.000003550985}
  m_SizeDelta: {x: 0, y: 0.000061035}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1597161470
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.72794116, g: 0.72794116, b: 0.72794116, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: 0615df35482643d4a9004b7e6ed3f778, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1597161471
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1597161468}
--- !u!1 &1620064605
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1620064606}
  - component: {fileID: 1620064608}
  - component: {fileID: 1620064607}
  m_Layer: 5
  m_Name: Placeholder
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1620064606
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1620064605}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 774754260}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: -0.5}
  m_SizeDelta: {x: -20, y: -13}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1620064607
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1620064605}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 0.5}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 14
    m_FontStyle: 2
    m_BestFit: 0
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Enter your school
--- !u!222 &1620064608
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1620064605}
--- !u!1 &1744837795
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1744837796}
  - component: {fileID: 1744837798}
  - component: {fileID: 1744837797}
  m_Layer: 5
  m_Name: Placeholder
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1744837796
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1744837795}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 96407920}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: -0.5}
  m_SizeDelta: {x: -20, y: -13}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1744837797
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1744837795}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 0.5}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 14
    m_FontStyle: 2
    m_BestFit: 0
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Enter your Name
--- !u!222 &1744837798
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1744837795}
--- !u!1 &1853910839
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1853910843}
  - component: {fileID: 1853910842}
  - component: {fileID: 1853910841}
  - component: {fileID: 1853910840}
  m_Layer: 5
  m_Name: Canvas
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1853910840
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
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
--- !u!114 &1853910841
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1336, y: 768}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0.5
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &1853910842
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 1
  m_Camera: {fileID: 650951420}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &1853910843
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1853910839}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1597161469}
  - {fileID: 1128077938}
  - {fileID: 60939076}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!1 &1975080047
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1975080048}
  - component: {fileID: 1975080051}
  - component: {fileID: 1975080050}
  - component: {fileID: 1975080049}
  m_Layer: 5
  m_Name: __ReturnButton__
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1975080048
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.2541422, y: 1.254142, z: 1.254142}
  m_Children: []
  m_Father: {fileID: 1128077938}
  m_RootOrder: 6
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 1}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: 31.7, y: -25.2}
  m_SizeDelta: {x: 50, y: 40}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1975080049
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
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
    m_HighlightedColor: {r: 0.7794118, g: 0.7794118, b: 0.7794118, a: 1}
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
  m_TargetGraphic: {fileID: 1975080050}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1500638845}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: S_MainMenu
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &1975080050
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
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
  m_Sprite: {fileID: 21300000, guid: aa78acf1fe63279408795f31460fd017, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1975080051
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1975080047}
--- !u!1 &1986181548
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1986181549}
  - component: {fileID: 1986181551}
  - component: {fileID: 1986181550}
  m_Layer: 5
  m_Name: TextLog
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1986181549
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1986181548}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 2084963039}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.0000076293945, y: -0.0000076293945}
  m_SizeDelta: {x: -45, y: -7.799999}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1986181550
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1986181548}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 30
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 3
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Please fill all the input fields.
--- !u!222 &1986181551
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1986181548}
--- !u!1 &2084963038
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2084963039}
  - component: {fileID: 2084963041}
  - component: {fileID: 2084963040}
  m_Layer: 5
  m_Name: TextLog
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2084963039
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2084963038}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1986181549}
  m_Father: {fileID: 1597161469}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0}
  m_AnchorMax: {x: 0.5, y: 0}
  m_AnchoredPosition: {x: 0, y: 71.5}
  m_SizeDelta: {x: 409.8, y: 52.599976}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &2084963040
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2084963038}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0, g: 0, b: 0, a: 0.729}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &2084963041
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2084963038}
--- !u!1 &2093097502
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2093097503}
  - component: {fileID: 2093097505}
  - component: {fileID: 2093097504}
  m_Layer: 5
  m_Name: Placeholder
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2093097503
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2093097502}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 494511627}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: -0.5}
  m_SizeDelta: {x: -20, y: -13}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &2093097504
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2093097502}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.19607843, g: 0.19607843, b: 0.19607843, a: 0.5}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_FontData:
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 14
    m_FontStyle: 2
    m_BestFit: 0
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Enter your class
--- !u!222 &2093097505
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2093097502}');

$ini_scene_reward_chem_unity_pattern = array('ADD HERE');

$ini_scene_selector_chem_unity_pattern = array('ADD HERE');

$ini_scene_selector_chem_unity_pattern2 = array('ADD HERE');

$ini_scene_selector_chem_text = 'ADD HERE';

$ini_scene_chem_exam = array('%YAML 1.1
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
  serializedVersion: 8
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
  m_SubtractiveShadowColor: {r: 0.42, g: 0.478, b: 0.627, a: 1}
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
  m_IndirectSpecularColor: {r: 0.37311953, g: 0.38074014, b: 0.3587274, a: 1}
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 11
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
    serializedVersion: 9
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
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
    m_MixedBakeMode: 2
    m_BakeBackend: 0
    m_PVRSampling: 1
    m_PVRDirectSampleCount: 32
    m_PVRSampleCount: 500
    m_PVRBounces: 2
    m_PVRFilterTypeDirect: 0
    m_PVRFilterTypeIndirect: 0
    m_PVRFilterTypeAO: 0
    m_PVRFilteringMode: 1
    m_PVRCulling: 1
    m_PVRFilteringGaussRadiusDirect: 1
    m_PVRFilteringGaussRadiusIndirect: 5
    m_PVRFilteringGaussRadiusAO: 2
    m_PVRFilteringAtrousPositionSigmaDirect: 0.5
    m_PVRFilteringAtrousPositionSigmaIndirect: 2
    m_PVRFilteringAtrousPositionSigmaAO: 1
    m_ShowResolutionOverlay: 1
  m_LightingDataAsset: {fileID: 0}
  m_UseShadowmask: 1
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
    manualTileSize: 0
    tileSize: 256
    accuratePlacement: 0
    debug:
      m_Flags: 0
  m_NavMeshData: {fileID: 0}
--- !u!224 &77574690 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
    type: 2}
  m_PrefabInternal: {fileID: 767904216}
--- !u!1001 &81524905
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 12
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 278.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -79.399994
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Alumin
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 9aa45c7356c967d4795be5ed9805061c,
        type: 2}
    - target: {fileID: 114317446573079110, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Text
      value: N
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &81524906 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 81524905}
--- !u!1001 &120887953
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 278.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Number6
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 7d0a407c9dff0434fad70703a4f7e6c8,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &120887954 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 120887953}
--- !u!1 &138068146
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 138068147}
  - component: {fileID: 138068149}
  - component: {fileID: 138068148}
  - component: {fileID: 138068150}
  m_Layer: 5
  m_Name: MoleculeName
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!224 &138068147
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 138068146}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1.0996484, y: 1.0996482, z: 1.0996482}
  m_Children:
  - {fileID: 967386477}
  - {fileID: 251825977}
  m_Father: {fileID: 1329445700}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: 0, y: -127.47949}
  m_SizeDelta: {x: 464.8, y: 90.616}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &138068148
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 138068146}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 60
    m_FontStyle: 1
    m_BestFit: 1
    m_MinSize: 0
    m_MaxSize: 60
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Water
--- !u!222 &138068149
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 138068146}
--- !u!114 &138068150
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 138068146}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 93a5b915e523c0646be406318f96ba0c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  option: 1
  line: {fileID: 967386478}
--- !u!1 &144073157
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1130975531757442, guid: 482c4eaf5c6a829448f9934aaa832d52,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1654041845}
  - component: {fileID: 144073160}
  - component: {fileID: 144073159}
  - component: {fileID: 144073158}
  m_Layer: 5
  m_Name: InfoButton
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &144073158
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114712295305614356, guid: 482c4eaf5c6a829448f9934aaa832d52,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 144073157}
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
    m_HighlightedColor: {r: 0.7647059, g: 0.7647059, b: 0.7647059, a: 1}
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
  m_TargetGraphic: {fileID: 144073159}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1080587493}
        m_MethodName: SetActive
        m_Mode: 6
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 1
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 1
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &144073159
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114622419510251598, guid: 482c4eaf5c6a829448f9934aaa832d52,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 144073157}
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
  m_Sprite: {fileID: 21300000, guid: 7a4da745f1dcc0c4388ed87bbb390453, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &144073160
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 222733105413971296, guid: 482c4eaf5c6a829448f9934aaa832d52,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 144073157}
--- !u!1001 &150950066
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1516091365}
    m_Modifications:
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 154
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 212.01776
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 238.9
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 231.4
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.6195114
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.61951154
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 0.61951154
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 4e332d0b99a37a744bcd1366a52a6f96, type: 2}
  m_IsPrefabParent: 0
--- !u!1001 &184956349
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 494.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Number4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: ea4c1103076bde94983113a30260c3ac,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &184956350 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 184956349}
--- !u!1 &251825976
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 251825977}
  - component: {fileID: 251825979}
  - component: {fileID: 251825978}
  m_Layer: 5
  m_Name: Bracket
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &251825977
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 251825976}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 138068147}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0}
  m_AnchorMax: {x: 0.5, y: 0}
  m_AnchoredPosition: {x: -0.000000059605, y: 13}
  m_SizeDelta: {x: 208.13, y: 17.09}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &251825978
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 251825976}
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
  m_Sprite: {fileID: 21300000, guid: 2ef61b1c0b8f74447a93303550d13374, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &251825979
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 251825976}
--- !u!1 &319611057
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 319611061}
  - component: {fileID: 319611060}
  - component: {fileID: 319611059}
  - component: {fileID: 319611058}
  m_Layer: 5
  m_Name: CanvasUI
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!114 &319611058
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 319611057}
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
--- !u!114 &319611059
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 319611057}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1024, y: 768}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 1
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &319611060
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 319611057}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 1
  m_Camera: {fileID: 367995203}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 25
  m_SortingLayerID: -1518539505
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &319611061
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 319611057}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1329445700}
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!1001 &329735724
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 617250236}
    m_Modifications:
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_RootOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 125
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -60.7
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 100
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 100
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1282240266913956, guid: f467a296b03a1d448b491367b1c49a4c, type: 2}
      propertyPath: m_IsActive
      value: 0
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: f467a296b03a1d448b491367b1c49a4c, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &329735725 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224545635024326998, guid: f467a296b03a1d448b491367b1c49a4c,
    type: 2}
  m_PrefabInternal: {fileID: 329735724}
--- !u!1 &357723317
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 357723318}
  - component: {fileID: 357723320}
  - component: {fileID: 357723319}
  m_Layer: 5
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &357723318
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 357723317}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 2049975667}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -1.4, y: 1.8}
  m_SizeDelta: {x: 31.01, y: 29.09}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &357723319
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 357723317}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.1102941, g: 0.1102941, b: 0.1102941, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: 8997974901fb02a41bcd77dec5c78997, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &357723320
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 357723317}
--- !u!1 &367995200
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 367995204}
  - component: {fileID: 367995203}
  - component: {fileID: 367995202}
  - component: {fileID: 367995201}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &367995201
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 367995200}
  m_Enabled: 1
--- !u!124 &367995202
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 367995200}
  m_Enabled: 1
--- !u!20 &367995203
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 367995200}
  m_Enabled: 1
  serializedVersion: 2
  m_ClearFlags: 2
  m_BackGroundColor: {r: 0, g: 0.5251015, b: 0.6985294, a: 0}
  m_NormalizedViewPortRect:
    serializedVersion: 2
    x: 0
    y: 0
    width: 1
    height: 1
  near clip plane: 0.3
  far clip plane: 100
  field of view: 60
  orthographic: 1
  orthographic size: 5
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: -1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 1
  m_AllowMSAA: 1
  m_AllowDynamicResolution: 0
  m_ForceIntoRT: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
--- !u!4 &367995204
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 367995200}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 1, z: -10}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1001 &483512453
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 13
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 386.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -79.399994
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Helium
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 74eddc5653e803849884b5d9ad766ec1,
        type: 2}
    - target: {fileID: 114317446573079110, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Text
      value: N
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &483512454 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 483512453}
--- !u!1001 &502103707
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 3
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 386.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Natrium
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: bf3c3d404fecca948913f43eb8e9705a,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &502103708 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 502103707}
--- !u!1001 &539361881
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 602.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Number2 (1)
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 0f5b0f1677a6eb940901143999bf952c,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &539361882 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 539361881}
--- !u!1 &617250235
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 617250236}
  - component: {fileID: 617250238}
  - component: {fileID: 617250237}
  - component: {fileID: 617250239}
  - component: {fileID: 617250240}
  m_Layer: 5
  m_Name: Slots
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &617250236
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 617250235}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 329735725}
  m_Father: {fileID: 1329445700}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: -173}
  m_SizeDelta: {x: 350, y: 121.4}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &617250237
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 617250235}
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
  m_Sprite: {fileID: 21300000, guid: f7ccf5acd52b46d4bb62550f33455a41, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &617250238
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 617250235}
--- !u!114 &617250239
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 617250235}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -2095666955, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Padding:
    m_Left: 10
    m_Right: 10
    m_Top: 10
    m_Bottom: 10
  m_ChildAlignment: 4
  m_StartCorner: 0
  m_StartAxis: 0
  m_CellSize: {x: 100, y: 100}
  m_Spacing: {x: 50, y: 0}
  m_Constraint: 0
  m_ConstraintCount: 2
--- !u!225 &617250240
CanvasGroup:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 617250235}
  m_Enabled: 1
  m_Alpha: 1
  m_Interactable: 1
  m_BlocksRaycasts: 1
  m_IgnoreParentGroups: 0
--- !u!224 &682420393 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
    type: 2}
  m_PrefabInternal: {fileID: 2125971562}
--- !u!1001 &767904216
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1329445700}
    m_Modifications:
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -378.5
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 100
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 100
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1680391840834690, guid: e6019f2bf06e8b6489d72dc9d96e99a7, type: 2}
      propertyPath: m_Name
      value: ScorePanel
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: e6019f2bf06e8b6489d72dc9d96e99a7, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &808542891 stripped
GameObject:
  m_PrefabParentObject: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 895883224}
--- !u!1001 &838235700
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 62.021362
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Oxygen
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &838235701 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 838235700}
--- !u!1001 &892378565
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 14
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 494.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -79.399994
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Number8
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 72be39874b861634da25979ce215adef,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &892378566 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 892378565}
--- !u!1001 &895883224
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1516091365}
    m_Modifications:
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_RootOrder
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b, type: 2}
      propertyPath: m_IsActive
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Value
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 134d803fbe5daad4898013368569a93b, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &895883225 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 895883224}
--- !u!114 &934836843 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 895883224}
  m_Script: {fileID: -113659843, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1001 &953949491
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 8
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 926.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Number3
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 9b441c0ee8233bc4488909efbfd0b530,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &953949492 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 953949491}
--- !u!1 &967386476
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 967386477}
  - component: {fileID: 967386479}
  - component: {fileID: 967386478}
  m_Layer: 5
  m_Name: Line
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &967386477
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 967386476}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 138068147}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: -8.170029, y: -47}
  m_SizeDelta: {x: 297.16, y: 4.84}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &967386478
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 967386476}
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
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &967386479
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 967386476}
--- !u!1001 &1008229702
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_RootOrder
      value: 12
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1025887669
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1025887670}
  - component: {fileID: 1025887672}
  - component: {fileID: 1025887671}
  m_Layer: 5
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1025887670
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1025887669}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1654041845}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -0.000006914099, y: 3.2000027}
  m_SizeDelta: {x: -47.54, y: -6.4}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1025887671
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1025887669}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 0.102941155, g: 0.102941155, b: 0.102941155, a: 1}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: 9f64ba8edb18b1c49a3827f22e58e35a, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1025887672
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1025887669}
--- !u!1001 &1045369825
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 6
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 710.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Helium
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: e9617c59de8d6df4d9db9ebd7a1a96d8,
        type: 2}
    - target: {fileID: 114317446573079110, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Text
      value: N
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &1045369826 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 1045369825}
--- !u!114 &1052719352 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114470401172653768, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
    type: 2}
  m_PrefabInternal: {fileID: 767904216}
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1 &1080587493 stripped
GameObject:
  m_PrefabParentObject: {fileID: 1866750099394346, guid: ad3b33e33e75ec64884779854c5c61fb,
    type: 2}
  m_PrefabInternal: {fileID: 1749527778}
--- !u!1 &1085089880
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1085089883}
  - component: {fileID: 1085089882}
  - component: {fileID: 1085089881}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1085089881
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1085089880}
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
--- !u!114 &1085089882
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1085089880}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &1085089883
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1085089880}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 5
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &1202783436
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1740672047598848, guid: ac87432a83099a64e87ae477cb495c64,
    type: 2}
  m_PrefabInternal: {fileID: 1239345241}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1202783438}
  - component: {fileID: 1202783437}
  m_Layer: 0
  m_Name: SceneLoader
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1202783437
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114997191209580738, guid: ac87432a83099a64e87ae477cb495c64,
    type: 2}
  m_PrefabInternal: {fileID: 1239345241}
  m_GameObject: {fileID: 1202783436}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 8d74cc27ebd56d54ebf3e953b25846bc, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  loadingPanel: {fileID: 808542891}
  loadingBar: {fileID: 934836843}
--- !u!4 &1202783438
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64,
    type: 2}
  m_PrefabInternal: {fileID: 1239345241}
  m_GameObject: {fileID: 1202783436}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: -2.3979664, y: -6.3876853, z: 89.81151}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 7
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1001 &1239345241
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalPosition.x
      value: -2.3979664
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalPosition.y
      value: -6.3876853
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalPosition.z
      value: 89.81151
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_RootOrder
      value: 9
      objectReference: {fileID: 0}
    - target: {fileID: 114997191209580738, guid: ac87432a83099a64e87ae477cb495c64,
        type: 2}
      propertyPath: loadingPanel
      value:
      objectReference: {fileID: 808542891}
    - target: {fileID: 114997191209580738, guid: ac87432a83099a64e87ae477cb495c64,
        type: 2}
      propertyPath: loadingBar
      value:
      objectReference: {fileID: 934836843}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1266018007
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1266018008}
  - component: {fileID: 1266018011}
  - component: {fileID: 1266018010}
  - component: {fileID: 1266018009}
  m_Layer: 5
  m_Name: ElementCards
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1266018008
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1266018007}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 838235701}
  - {fileID: 1588229839}
  - {fileID: 120887954}
  - {fileID: 502103708}
  - {fileID: 184956350}
  - {fileID: 539361882}
  - {fileID: 1045369826}
  - {fileID: 1619293528}
  - {fileID: 953949492}
  - {fileID: 2104073185}
  - {fileID: 2051136959}
  - {fileID: 1886268576}
  - {fileID: 81524906}
  - {fileID: 483512454}
  - {fileID: 892378566}
  - {fileID: 1612511816}
  m_Father: {fileID: 1516091365}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0.5}
  m_AnchorMax: {x: 1, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 50}
  m_SizeDelta: {x: -73.6, y: 263.8}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1266018009
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1266018007}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -2095666955, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Padding:
    m_Left: 0
    m_Right: 0
    m_Top: 0
    m_Bottom: 0
  m_ChildAlignment: 4
  m_StartCorner: 2
  m_StartAxis: 0
  m_CellSize: {x: 105, y: 105}
  m_Spacing: {x: 3, y: 0}
  m_Constraint: 0
  m_ConstraintCount: 2
--- !u!114 &1266018010
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1266018007}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 0}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1266018011
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1266018007}
--- !u!1001 &1320232662
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalPosition.x
      value: -5.376089
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalPosition.y
      value: 2.2854238
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalPosition.z
      value: 90
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_RootOrder
      value: 9
      objectReference: {fileID: 0}
    - target: {fileID: 114929036711871820, guid: ea642b2ef1fd56c4396cef9316ac09d4,
        type: 2}
      propertyPath: sumText
      value:
      objectReference: {fileID: 1954918265}
    - target: {fileID: 114929036711871820, guid: ea642b2ef1fd56c4396cef9316ac09d4,
        type: 2}
      propertyPath: currentText
      value:
      objectReference: {fileID: 1052719352}
    - target: {fileID: 114929036711871820, guid: ea642b2ef1fd56c4396cef9316ac09d4,
        type: 2}
      propertyPath: MoleculesCtrl
      value:
      objectReference: {fileID: 1488631927}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1329445699
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1329445700}
  - component: {fileID: 1329445702}
  - component: {fileID: 1329445701}
  m_Layer: 5
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1329445700
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1329445699}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 138068147}
  - {fileID: 617250236}
  - {fileID: 1654041845}
  - {fileID: 2049975667}
  - {fileID: 682420393}
  - {fileID: 77574690}
  m_Father: {fileID: 319611061}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1329445701
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1329445699}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 1}
  m_RaycastTarget: 0
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 21300000, guid: 6ccb2006b854a7540824e8f7a8c08d5a, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1329445702
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1329445699}
--- !u!1 &1443181918
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1443181920}
  - component: {fileID: 1443181919}
  m_Layer: 0
  m_Name: SlotSpawner
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!114 &1443181919
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1443181918}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 8128f4369a10f624a9908b7d5aed37f0, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  slotsNumber: 3
  slotIcon: {fileID: 1282240266913956, guid: f467a296b03a1d448b491367b1c49a4c, type: 2}
  parent: {fileID: 617250235}
  successClip: {fileID: 8300000, guid: 553cee94783f15a469833f15e92c3647, type: 3}
  slotsList: []
--- !u!4 &1443181920
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1443181918}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: -0.43801877, y: 0.11584014, z: 89.88672}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 6
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &1488631925
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1488631926}
  - component: {fileID: 1488631927}
  m_Layer: 0
  m_Name: MoleculesController
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!4 &1488631926
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1488631925}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!114 &1488631927
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1488631925}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: be790311a160ed14cac4b654d027506b, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  defaulStrategy:
  ___[defaul_strategy]___
  availableMolecules:
  ___[available_Molecules]___
  strategy: []
  received_strategy: []
  strategy_count: 0
--- !u!1 &1516091361
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1516091365}
  - component: {fileID: 1516091364}
  - component: {fileID: 1516091363}
  - component: {fileID: 1516091362}
  m_Layer: 5
  m_Name: Canvas (ElementCards)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1516091362
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1516091361}
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
--- !u!114 &1516091363
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1516091361}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 100
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1024, y: 768}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0.5
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &1516091364
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1516091361}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 1
  m_Camera: {fileID: 367995203}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 0
  m_SortingLayerID: -1518539505
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &1516091365
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1516091361}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1266018008}
  - {fileID: 2106090615}
  - {fileID: 895883225}
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!1001 &1588229838
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 170.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Hydrogen
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: ca0884cb41b96c741bfd04ba12f312a5,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &1588229839 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 1588229838}
--- !u!1001 &1612511815
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 15
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 602.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -79.399994
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Hydrogen2
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: ca0884cb41b96c741bfd04ba12f312a5,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &1612511816 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 1612511815}
--- !u!1001 &1619293527
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 7
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 818.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Chloride
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 57e95b2e3fa4ba3409e2990330b9ed36,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &1619293528 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 1619293527}
--- !u!224 &1654041845
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
    type: 2}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 144073157}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0.999936, y: 0.999936, z: 0.999936}
  m_Children:
  - {fileID: 1025887670}
  m_Father: {fileID: 1329445700}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 1}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -105.65039, y: -56.188477}
  m_SizeDelta: {x: 80, y: 45}
  m_Pivot: {x: 0.4999993, y: 0.5}
--- !u!1001 &1666832019
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.x
      value: 1.389278
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.y
      value: -0.064435095
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.z
      value: 89.94141
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_RootOrder
      value: 10
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1702626763
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1702626765}
  - component: {fileID: 1702626764}
  m_Layer: 0
  m_Name: ContentAdaptationManager
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1702626764
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1702626763}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 692411304174151489e77f80c6a4411b, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  MoleculesCtrl: {fileID: 1488631927}
--- !u!4 &1702626765
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1702626763}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: -0.9930594, y: 1.4716178, z: 90.02734}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 8
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1001 &1749527778
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224042829295786918, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114936005526809756, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[1].m_Target
      value:
      objectReference: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
        type: 2}
    - target: {fileID: 223647633835200000, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_Camera
      value:
      objectReference: {fileID: 367995203}
    - target: {fileID: 114936005526809756, guid: ad3b33e33e75ec64884779854c5c61fb,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[1].m_MethodName
      value: PlaySingle
      objectReference: {fileID: 0}
    - target: {fileID: 1866750099394346, guid: ad3b33e33e75ec64884779854c5c61fb, type: 2}
      propertyPath: m_IsActive
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 1834619354302694, guid: ad3b33e33e75ec64884779854c5c61fb, type: 2}
      propertyPath: m_IsActive
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ad3b33e33e75ec64884779854c5c61fb, type: 2}
  m_IsPrefabParent: 0
--- !u!1001 &1841633900
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 11
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 170.02136
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -79.399994
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: "Carbon "
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 9c7432aeaeff9024a97c2e1a1eb73376,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &1886268576 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 1841633900}
--- !u!114 &1954918265 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114088613357790290, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
    type: 2}
  m_PrefabInternal: {fileID: 767904216}
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1 &2049975666
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2049975667}
  - component: {fileID: 2049975670}
  - component: {fileID: 2049975669}
  - component: {fileID: 2049975668}
  m_Layer: 5
  m_Name: ExitButton
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2049975667
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2049975666}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0.999936, y: 0.999936, z: 0.999936}
  m_Children:
  - {fileID: 357723318}
  m_Father: {fileID: 1329445700}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 1}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: 96, y: -69.877}
  m_SizeDelta: {x: 80, y: 45}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &2049975668
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2049975666}
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
    m_HighlightedColor: {r: 0.77205884, g: 0.77205884, b: 0.77205884, a: 1}
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
  m_TargetGraphic: {fileID: 2049975669}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1202783437}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: Lab
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &2049975669
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2049975666}
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
  m_Sprite: {fileID: 21300000, guid: ece8ac2cb44577542aab6c96e2a7ded0, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &2049975670
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2049975666}
--- !u!1001 &2051136958
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 10
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 62.021362
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -79.399994
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Number5
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 7d5a5b5859a61d745bc3dda19a6352c8,
        type: 2}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114317446573079110, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Text
      value: "5

"
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &2051136959 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 2051136958}
--- !u!1001 &2104073184
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1266018008}
    m_Modifications:
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_RootOrder
      value: 9
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 1034.0214
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -184.4
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1525967640806204, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
      propertyPath: m_Name
      value: Number2
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.644352
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.690432
      objectReference: {fileID: 0}
    - target: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 1.315584
      objectReference: {fileID: 0}
    - target: {fileID: 114370046651814478, guid: 1d69eaedb5899af4fbea18a3a6675b13,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 11400000, guid: 0f5b0f1677a6eb940901143999bf952c,
        type: 2}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 1d69eaedb5899af4fbea18a3a6675b13, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &2104073185 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224455841886736990, guid: 1d69eaedb5899af4fbea18a3a6675b13,
    type: 2}
  m_PrefabInternal: {fileID: 2104073184}
--- !u!224 &2106090615 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
    type: 2}
  m_PrefabInternal: {fileID: 150950066}
--- !u!1001 &2125971562
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1329445700}
    m_Modifications:
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: -101
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 105
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 94
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 50
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1130975531757442, guid: 482c4eaf5c6a829448f9934aaa832d52, type: 2}
      propertyPath: m_Name
      value: CAbuttonNext
      objectReference: {fileID: 0}
    - target: {fileID: 114158032877870820, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: CAManager
      value:
      objectReference: {fileID: 1702626764}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 482c4eaf5c6a829448f9934aaa832d52, type: 2}
  m_IsPrefabParent: 0
--- !u!1001 &2126525266
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.x
      value: -7.1613173
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0.4321006
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3783276
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_RootOrder
      value: 11
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
  m_IsPrefabParent: 0');

$ini_scene_chem_exam3d = array('%YAML 1.1
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
  serializedVersion: 8
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
  m_SubtractiveShadowColor: {r: 0.42, g: 0.478, b: 0.627, a: 1}
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
  m_IndirectSpecularColor: {r: 0.44657975, g: 0.4964143, b: 0.57481766, a: 1}
--- !u!157 &3
LightmapSettings:
  m_ObjectHideFlags: 0
  serializedVersion: 11
  m_GIWorkflowMode: 0
  m_GISettings:
    serializedVersion: 2
    m_BounceScale: 1
    m_IndirectOutputScale: 1
    m_AlbedoBoost: 1
    m_TemporalCoherenceThreshold: 1
    m_EnvironmentLightingMode: 0
    m_EnableBakedLightmaps: 0
    m_EnableRealtimeLightmaps: 1
  m_LightmapEditorSettings:
    serializedVersion: 9
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
    m_FinalGather: 0
    m_FinalGatherFiltering: 1
    m_FinalGatherRayCount: 256
    m_ReflectionCompression: 2
    m_MixedBakeMode: 2
    m_BakeBackend: 0
    m_PVRSampling: 1
    m_PVRDirectSampleCount: 32
    m_PVRSampleCount: 500
    m_PVRBounces: 2
    m_PVRFilterTypeDirect: 0
    m_PVRFilterTypeIndirect: 0
    m_PVRFilterTypeAO: 0
    m_PVRFilteringMode: 1
    m_PVRCulling: 1
    m_PVRFilteringGaussRadiusDirect: 1
    m_PVRFilteringGaussRadiusIndirect: 5
    m_PVRFilteringGaussRadiusAO: 2
    m_PVRFilteringAtrousPositionSigmaDirect: 0.5
    m_PVRFilteringAtrousPositionSigmaIndirect: 2
    m_PVRFilteringAtrousPositionSigmaAO: 1
    m_ShowResolutionOverlay: 1
  m_LightingDataAsset: {fileID: 0}
  m_UseShadowmask: 1
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
    manualTileSize: 0
    tileSize: 256
    accuratePlacement: 0
    debug:
      m_Flags: 0
  m_NavMeshData: {fileID: 0}
--- !u!1 &12021463
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 12021464}
  - component: {fileID: 12021466}
  - component: {fileID: 12021465}
  m_Layer: 5
  m_Name: ButtonsPanel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &12021464
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 12021463}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1134451304}
  - {fileID: 1769596964}
  m_Father: {fileID: 67996002}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 0}
  m_AnchorMax: {x: 1, y: 0}
  m_AnchoredPosition: {x: -151.2, y: 50.904358}
  m_SizeDelta: {x: 302.6, y: 92.7}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &12021465
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 12021463}
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
  m_Sprite: {fileID: 21300000, guid: f7ccf5acd52b46d4bb62550f33455a41, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &12021466
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 12021463}
--- !u!1 &39242754
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 39242755}
  - component: {fileID: 39242757}
  - component: {fileID: 39242756}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &39242755
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 39242754}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 834887056}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &39242756
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 39242754}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Close
--- !u!222 &39242757
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 39242754}
--- !u!1 &50329198
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 50329199}
  - component: {fileID: 50329201}
  - component: {fileID: 50329200}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &50329199
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 50329198}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 261109130}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.8, y: 2}
  m_SizeDelta: {x: -19.94, y: -12.75}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &50329200
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 50329198}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 14
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: CLEAR
--- !u!222 &50329201
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 50329198}
--- !u!1 &67995998
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 67996002}
  - component: {fileID: 67996001}
  - component: {fileID: 67996000}
  - component: {fileID: 67995999}
  m_Layer: 5
  m_Name: Canvas_UI
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &67995999
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 67995998}
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
--- !u!114 &67996000
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 67995998}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 1980459831, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_UiScaleMode: 1
  m_ReferencePixelsPerUnit: 50
  m_ScaleFactor: 1
  m_ReferenceResolution: {x: 1920, y: 1080}
  m_ScreenMatchMode: 0
  m_MatchWidthOrHeight: 0.5
  m_PhysicalUnit: 3
  m_FallbackScreenDPI: 96
  m_DefaultSpriteDPI: 96
  m_DynamicPixelsPerUnit: 1
--- !u!223 &67996001
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 67995998}
  m_Enabled: 1
  serializedVersion: 3
  m_RenderMode: 0
  m_Camera: {fileID: 0}
  m_PlaneDistance: 100
  m_PixelPerfect: 0
  m_ReceivesEvents: 1
  m_OverrideSorting: 0
  m_OverridePixelPerfect: 0
  m_SortingBucketNormalizedSize: 0
  m_AdditionalShaderChannelsFlag: 0
  m_SortingLayerID: 0
  m_SortingOrder: 0
  m_TargetDisplay: 0
--- !u!224 &67996002
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 67995998}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: 1609460907}
  - {fileID: 1910874452}
  - {fileID: 261109130}
  - {fileID: 12021464}
  - {fileID: 1162500495}
  - {fileID: 2054583653}
  - {fileID: 353539953}
  - {fileID: 152527204}
  m_Father: {fileID: 931073567}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!1 &109166084
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 109166085}
  - component: {fileID: 109166086}
  m_Layer: 0
  m_Name: PositionChloride
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!4 &109166085
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 109166084}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: -2.61, y: 3.8399997, z: 0}
  m_LocalScale: {x: 0.79999995, y: 0.79999995, z: 0.79999995}
  m_Children: []
  m_Father: {fileID: 819875579}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!114 &109166086
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 109166084}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: ec48e5de79857a8458b1d54ee8f9402a, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!1 &114270200
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 114270203}
  - component: {fileID: 114270202}
  - component: {fileID: 114270201}
  m_Layer: 0
  m_Name: EventSystem
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &114270201
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 114270200}
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
--- !u!114 &114270202
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 114270200}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -619905303, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_FirstSelected: {fileID: 0}
  m_sendNavigationEvents: 1
  m_DragThreshold: 5
--- !u!4 &114270203
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 114270200}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1001 &152527203
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 67996002}
    m_Modifications:
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_RootOrder
      value: 7
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b, type: 2}
      propertyPath: m_IsActive
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0.011
      objectReference: {fileID: 0}
    - target: {fileID: 224988636628140724, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 292.90002
      objectReference: {fileID: 0}
    - target: {fileID: 224988636628140724, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 183.6
      objectReference: {fileID: 0}
    - target: {fileID: 224803102802180380, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 31
      objectReference: {fileID: 0}
    - target: {fileID: 224803102802180380, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 671.6
      objectReference: {fileID: 0}
    - target: {fileID: 224319332380466822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 266.2
      objectReference: {fileID: 0}
    - target: {fileID: 224319332380466822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 237.1
      objectReference: {fileID: 0}
    - target: {fileID: 224988636628140724, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 270.59995
      objectReference: {fileID: 0}
    - target: {fileID: 224988636628140724, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 150.9
      objectReference: {fileID: 0}
    - target: {fileID: 224803102802180380, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -45
      objectReference: {fileID: 0}
    - target: {fileID: 224803102802180380, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 131.9
      objectReference: {fileID: 0}
    - target: {fileID: 224319332380466822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 89.69995
      objectReference: {fileID: 0}
    - target: {fileID: 224319332380466822, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 210.8
      objectReference: {fileID: 0}
    - target: {fileID: 224708844334342846, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: -1.9250183
      objectReference: {fileID: 0}
    - target: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
        type: 2}
      propertyPath: m_Value
      value: 0
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 134d803fbe5daad4898013368569a93b, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &152527204 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224650920794227822, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 152527203}
--- !u!1001 &158337289
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1609460907}
    m_Modifications:
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.size
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_RootOrder
      value: 6
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 760
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -47
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 80
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 70
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1177606366249158, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
      propertyPath: m_Name
      value: N
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Mode
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_CallState
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Target
      value:
      objectReference: {fileID: 158337291}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_MethodName
      value: SpawnElement
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Arguments.m_ObjectArgumentAssemblyTypeName
      value: UnityEngine.Object, UnityEngine
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: parentPos
      value:
      objectReference: {fileID: 393138122}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 1122513201129664, guid: f5f8839bd53973b40947aae745c53186,
        type: 2}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: pos
      value:
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.99994206
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.99994206
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 0.99994206
      objectReference: {fileID: 0}
    - target: {fileID: 114895165010792204, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Text
      value: N
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: position
      value:
      objectReference: {fileID: 165798191}
    - target: {fileID: 114071723659076054, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Sprite
      value:
      objectReference: {fileID: 21300000, guid: 7a4da745f1dcc0c4388ed87bbb390453,
        type: 3}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &158337290 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 158337289}
--- !u!114 &158337291 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 158337289}
  m_Script: {fileID: 11500000, guid: 2eb5baefc8634bd4ab9dd15537727284, type: 3}
--- !u!1 &165798190
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 165798191}
  - component: {fileID: 165798192}
  m_Layer: 0
  m_Name: PositionNitrogen
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!4 &165798191
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 165798190}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: -0.11, y: 3.8399997, z: 0}
  m_LocalScale: {x: 0.79999995, y: 0.79999995, z: 0.79999995}
  m_Children: []
  m_Father: {fileID: 819875579}
  m_RootOrder: 5
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!114 &165798192
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 165798190}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: ec48e5de79857a8458b1d54ee8f9402a, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!1 &236054462 stripped
GameObject:
  m_PrefabParentObject: {fileID: 1527878119305318, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 152527203}
--- !u!1 &246349602
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 246349603}
  - component: {fileID: 246349604}
  m_Layer: 0
  m_Name: PositionOxygen
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!4 &246349603
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 246349602}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: -10.11, y: 3.8399997, z: 0}
  m_LocalScale: {x: 0.79999995, y: 0.79999995, z: 0.79999995}
  m_Children: []
  m_Father: {fileID: 819875579}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!114 &246349604
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 246349602}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: ec48e5de79857a8458b1d54ee8f9402a, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!1 &261109129
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 261109130}
  - component: {fileID: 261109133}
  - component: {fileID: 261109132}
  - component: {fileID: 261109131}
  m_Layer: 5
  m_Name: CleanButton
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &261109130
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 261109129}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 50329199}
  m_Father: {fileID: 67996002}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 1}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -103.13849, y: -46.670654}
  m_SizeDelta: {x: 143.1, y: 63.4}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &261109131
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 261109129}
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
    m_HighlightedColor: {r: 0.64705884, g: 0.64705884, b: 0.64705884, a: 1}
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
  m_TargetGraphic: {fileID: 261109132}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 834199892}
        m_MethodName: DestroyUnusedElements
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: e9ca8ed04459ecf4cadb8e83cf7e6452,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &261109132
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 261109129}
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
  m_Sprite: {fileID: 21300000, guid: 7a4da745f1dcc0c4388ed87bbb390453, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &261109133
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 261109129}
--- !u!1001 &264919171
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.x
      value: 1.389278
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.y
      value: -0.064435095
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalPosition.z
      value: 89.94141
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4795357146255656, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
      propertyPath: m_RootOrder
      value: 13
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: d96e2996417f73d43b58f80956bd1927, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &353539952
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 353539953}
  - component: {fileID: 353539955}
  - component: {fileID: 353539954}
  m_Layer: 5
  m_Name: ControlsPanel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &353539953
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 353539952}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1994491651}
  - {fileID: 628714937}
  - {fileID: 1628549325}
  - {fileID: 834887056}
  m_Father: {fileID: 67996002}
  m_RootOrder: 6
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 1}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -268.66373, y: -245.67}
  m_SizeDelta: {x: 533.1, y: 304.93}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &353539954
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 353539952}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 0}
  m_Color: {r: 1, g: 1, b: 1, a: 0}
  m_RaycastTarget: 1
  m_OnCullStateChanged:
    m_PersistentCalls:
      m_Calls: []
    m_TypeName: UnityEngine.UI.MaskableGraphic+CullStateChangedEvent, UnityEngine.UI,
      Version=1.0.0.0, Culture=neutral, PublicKeyToken=null
  m_Sprite: {fileID: 10907, guid: 0000000000000000f000000000000000, type: 0}
  m_Type: 1
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &353539955
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 353539952}
--- !u!1 &393138121
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 393138122}
  - component: {fileID: 393138123}
  m_Layer: 0
  m_Name: PositionHydrogen
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!4 &393138122
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 393138121}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: -12.61, y: 3.8399997, z: 0}
  m_LocalScale: {x: 0.8, y: 0.8, z: 0.8}
  m_Children: []
  m_Father: {fileID: 819875579}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!114 &393138123
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 393138121}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: ec48e5de79857a8458b1d54ee8f9402a, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!1001 &475630266
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1609460907}
    m_Modifications:
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.size
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_RootOrder
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 300
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -47
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 80
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 70
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1177606366249158, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
      propertyPath: m_Name
      value: O
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Mode
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_CallState
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Target
      value:
      objectReference: {fileID: 475630268}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_MethodName
      value: SpawnElement
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Arguments.m_ObjectArgumentAssemblyTypeName
      value: UnityEngine.Object, UnityEngine
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: parentPos
      value:
      objectReference: {fileID: 393138122}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 1122513201129664, guid: 9dca3ffcd1cf6e94cae4d104618375eb,
        type: 2}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: pos
      value:
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.99994
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.99994
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 0.99994
      objectReference: {fileID: 0}
    - target: {fileID: 114895165010792204, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Text
      value: O
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: position
      value:
      objectReference: {fileID: 246349603}
    - target: {fileID: 114071723659076054, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Sprite
      value:
      objectReference: {fileID: 21300000, guid: 7a4da745f1dcc0c4388ed87bbb390453,
        type: 3}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &475630267 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 475630266}
--- !u!114 &475630268 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 475630266}
  m_Script: {fileID: 11500000, guid: 2eb5baefc8634bd4ab9dd15537727284, type: 3}
--- !u!1001 &482852242
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1609460907}
    m_Modifications:
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.size
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 530
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -47
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 80
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 70
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1177606366249158, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
      propertyPath: m_Name
      value: Na
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Mode
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_CallState
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Target
      value:
      objectReference: {fileID: 482852244}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_MethodName
      value: SpawnElement
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Arguments.m_ObjectArgumentAssemblyTypeName
      value: UnityEngine.Object, UnityEngine
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: parentPos
      value:
      objectReference: {fileID: 393138122}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 1122513201129664, guid: ae36f4e3a9cde13408a20113080ad071,
        type: 2}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: pos
      value:
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.99994206
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.99994206
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 0.99994206
      objectReference: {fileID: 0}
    - target: {fileID: 114895165010792204, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Text
      value: Na
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: position
      value:
      objectReference: {fileID: 1236037046}
    - target: {fileID: 114071723659076054, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Sprite
      value:
      objectReference: {fileID: 21300000, guid: 7a4da745f1dcc0c4388ed87bbb390453,
        type: 3}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &482852243 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 482852242}
--- !u!114 &482852244 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 482852242}
  m_Script: {fileID: 11500000, guid: 2eb5baefc8634bd4ab9dd15537727284, type: 3}
--- !u!1 &628714936
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 628714937}
  - component: {fileID: 628714939}
  - component: {fileID: 628714938}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &628714937
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 628714936}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 353539953}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: -166.45, y: 130.02}
  m_SizeDelta: {x: 63.4, y: 30}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &628714938
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 628714936}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 40
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Controls
--- !u!222 &628714939
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 628714936}
--- !u!1 &748018870
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 748018871}
  - component: {fileID: 748018873}
  - component: {fileID: 748018872}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &748018871
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 748018870}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1134451304}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -0.000046253, y: 2.7285023}
  m_SizeDelta: {x: -19.45, y: -8.19}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &748018872
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 748018870}
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
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 10
    m_MaxSize: 60
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Controls
--- !u!222 &748018873
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 748018870}
--- !u!1001 &772152193
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4480355689303762, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
      propertyPath: m_RootOrder
      value: 11
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 47c7ca76693cd449d8b98a99017822a2, type: 2}
  m_IsPrefabParent: 0
--- !u!1001 &805331922
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 67996002}
    m_Modifications:
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 129
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -322.2567
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 238.9
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 231.4
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 4e332d0b99a37a744bcd1366a52a6f96, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &819875578
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 819875579}
  m_Layer: 0
  m_Name: Element Positions
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!4 &819875579
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 819875578}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: -0.01, y: 1.94, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 393138122}
  - {fileID: 246349603}
  - {fileID: 1841986825}
  - {fileID: 1236037046}
  - {fileID: 109166085}
  - {fileID: 165798191}
  m_Father: {fileID: 0}
  m_RootOrder: 6
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &834199890
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 834199891}
  - component: {fileID: 834199892}
  m_Layer: 0
  m_Name: MoleculeSpawner
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!4 &834199891
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 834199890}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 513.8855, y: 260.46454, z: -0.6326904}
  m_LocalScale: {x: 3, y: 3, z: 3}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 8
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!114 &834199892
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 834199890}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 8910b4350c5fa4741bfa3f55050a3248, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  Molecules:
  ___[molecule_prefabs]___
  position: {fileID: 1586177784}
  molecule: {fileID: 0}
--- !u!1 &834887055
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 834887056}
  - component: {fileID: 834887059}
  - component: {fileID: 834887058}
  - component: {fileID: 834887057}
  m_Layer: 5
  m_Name: Button
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &834887056
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 834887055}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 39242755}
  m_Father: {fileID: 353539953}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 1}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -232.35, y: -270.5}
  m_SizeDelta: {x: 71.11, y: 32.98}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &834887057
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 834887055}
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
  m_TargetGraphic: {fileID: 834887058}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 353539952}
        m_MethodName: SetActive
        m_Mode: 6
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &834887058
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 834887055}
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
  m_Sprite: {fileID: 21300000, guid: ced56a6316ffafb48be600d1629b4ffa, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &834887059
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 834887055}
--- !u!1001 &839834648
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1609460907}
    m_Modifications:
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 185
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -47
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 80
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 70
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: position
      value:
      objectReference: {fileID: 393138122}
    - target: {fileID: 1177606366249158, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
      propertyPath: m_Name
      value: H
      objectReference: {fileID: 0}
    - target: {fileID: 114071723659076054, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Sprite
      value:
      objectReference: {fileID: 21300000, guid: 7a4da745f1dcc0c4388ed87bbb390453,
        type: 3}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &871718126
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 871718130}
  - component: {fileID: 871718129}
  - component: {fileID: 871718128}
  - component: {fileID: 871718127}
  - component: {fileID: 871718131}
  m_Layer: 0
  m_Name: Main Camera
  m_TagString: MainCamera
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!81 &871718127
AudioListener:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 871718126}
  m_Enabled: 1
--- !u!124 &871718128
Behaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 871718126}
  m_Enabled: 1
--- !u!20 &871718129
Camera:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 871718126}
  m_Enabled: 1
  serializedVersion: 2
  m_ClearFlags: 2
  m_BackGroundColor: {r: 0.29411763, g: 0.29411763, b: 0.29411763, a: 0}
  m_NormalizedViewPortRect:
    serializedVersion: 2
    x: 0
    y: 0
    width: 1
    height: 1
  near clip plane: 0
  far clip plane: 500
  field of view: 60
  orthographic: 1
  orthographic size: 10.07
  m_Depth: -1
  m_CullingMask:
    serializedVersion: 2
    m_Bits: 4294967295
  m_RenderingPath: 1
  m_TargetTexture: {fileID: 0}
  m_TargetDisplay: 0
  m_TargetEye: 3
  m_HDR: 1
  m_AllowMSAA: 1
  m_AllowDynamicResolution: 0
  m_ForceIntoRT: 0
  m_OcclusionCulling: 1
  m_StereoConvergence: 10
  m_StereoSeparation: 0.022
--- !u!4 &871718130
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 871718126}
  m_LocalRotation: {x: 0.016502632, y: -0.0014907548, z: 0.000026205973, w: 0.99986273}
  m_LocalPosition: {x: -0.97, y: 0, z: -13}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!114 &871718131
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 871718126}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: d07a44619a5b3204ab1189ae399f4739, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  zoomSpeed: 5
--- !u!1 &931073566
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 931073567}
  m_Layer: 5
  m_Name: UI
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &931073567
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 931073566}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 67996002}
  m_Father: {fileID: 0}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 668, y: 384}
  m_SizeDelta: {x: 100, y: 100}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!1 &982680831
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 982680832}
  - component: {fileID: 982680834}
  - component: {fileID: 982680833}
  m_Layer: 5
  m_Name: Text (1)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &982680832
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 982680831}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0.9999994, y: 0.9999994, z: 0.9999994}
  m_Children: []
  m_Father: {fileID: 1910874452}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: 91.25, y: -0.15000153}
  m_SizeDelta: {x: 182.5, y: -0.3}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &982680833
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 982680831}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 14
    m_MaxSize: 40
    m_Alignment: 3
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: "| Formula :"
--- !u!222 &982680834
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 982680831}
--- !u!1001 &1042318921
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalPosition.x
      value: -2.3979664
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalPosition.y
      value: -6.3876853
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalPosition.z
      value: 89.81151
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
      propertyPath: m_RootOrder
      value: 9
      objectReference: {fileID: 0}
    - target: {fileID: 114997191209580738, guid: ac87432a83099a64e87ae477cb495c64,
        type: 2}
      propertyPath: loadingPanel
      value:
      objectReference: {fileID: 236054462}
    - target: {fileID: 114997191209580738, guid: ac87432a83099a64e87ae477cb495c64,
        type: 2}
      propertyPath: loadingBar
      value:
      objectReference: {fileID: 1611037981}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ac87432a83099a64e87ae477cb495c64, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1134451303
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1134451304}
  - component: {fileID: 1134451307}
  - component: {fileID: 1134451306}
  - component: {fileID: 1134451305}
  m_Layer: 5
  m_Name: Info button
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1134451304
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1134451303}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 748018871}
  m_Father: {fileID: 12021464}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 0}
  m_AnchorMax: {x: 1, y: 0}
  m_AnchoredPosition: {x: -232.99998, y: 43.898705}
  m_SizeDelta: {x: 108.1, y: 53.565}
  m_Pivot: {x: 0.49999994, y: 0.5}
--- !u!114 &1134451305
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1134451303}
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
    m_HighlightedColor: {r: 0.6911765, g: 0.6911765, b: 0.6911765, a: 1}
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
  m_TargetGraphic: {fileID: 1134451306}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 353539952}
        m_MethodName: SetActive
        m_Mode: 6
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 1
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 1
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &1134451306
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1134451303}
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
  m_Sprite: {fileID: 21300000, guid: 7a4da745f1dcc0c4388ed87bbb390453, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1134451307
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1134451303}
--- !u!224 &1162500495 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224719781772728164, guid: 4e332d0b99a37a744bcd1366a52a6f96,
    type: 2}
  m_PrefabInternal: {fileID: 805331922}
--- !u!1 &1185913979
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1185913980}
  - component: {fileID: 1185913982}
  - component: {fileID: 1185913981}
  m_Layer: 5
  m_Name: Text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1185913980
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1185913979}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1910874452}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: 103.5, y: -0.75}
  m_SizeDelta: {x: 207, y: 1.5}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1185913981
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1185913979}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 14
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: " Molecule : "
--- !u!222 &1185913982
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1185913979}
--- !u!1 &1220060988
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1220060990}
  - component: {fileID: 1220060989}
  m_Layer: 0
  m_Name: Directional light
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!108 &1220060989
Light:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1220060988}
  m_Enabled: 1
  serializedVersion: 8
  m_Type: 1
  m_Color: {r: 0.9705882, g: 0.9705882, b: 0.9705882, a: 1}
  m_Intensity: 0.7
  m_Range: 10
  m_SpotAngle: 30
  m_CookieSize: 10
  m_Shadows:
    m_Type: 0
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
  m_ColorTemperature: 6570
  m_UseColorTemperature: 0
  m_ShadowRadius: 0
  m_ShadowAngle: 0
--- !u!4 &1220060990
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1220060988}
  m_LocalRotation: {x: 0.36599812, y: -0.45315394, z: 0.2113091, w: 0.78488564}
  m_LocalPosition: {x: 526.71545, y: 156.26219, z: -11.52501}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 50, y: -60, z: 0}
--- !u!1 &1236037045
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1236037046}
  - component: {fileID: 1236037047}
  m_Layer: 0
  m_Name: PositionNatrium
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!4 &1236037046
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1236037045}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: -5.11, y: 3.8399997, z: 0}
  m_LocalScale: {x: 0.79999995, y: 0.79999995, z: 0.79999995}
  m_Children: []
  m_Father: {fileID: 819875579}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!114 &1236037047
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1236037045}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: ec48e5de79857a8458b1d54ee8f9402a, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!1 &1237891431
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1237891432}
  - component: {fileID: 1237891434}
  - component: {fileID: 1237891433}
  m_Layer: 5
  m_Name: Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1237891432
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1237891431}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0.65928936, y: 0.65928936, z: 0.65928936}
  m_Children: []
  m_Father: {fileID: 2084023425}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0, y: 3.3}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1237891433
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1237891431}
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
  m_Sprite: {fileID: 21300000, guid: 8997974901fb02a41bcd77dec5c78997, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1237891434
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1237891431}
--- !u!1001 &1310244708
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1609460907}
    m_Modifications:
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.size
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_RootOrder
      value: 3
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 415
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -47
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 80
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 70
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1177606366249158, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
      propertyPath: m_Name
      value: C
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Mode
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_CallState
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Target
      value:
      objectReference: {fileID: 1310244710}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_MethodName
      value: SpawnElement
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Arguments.m_ObjectArgumentAssemblyTypeName
      value: UnityEngine.Object, UnityEngine
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: parentPos
      value:
      objectReference: {fileID: 393138122}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 1122513201129664, guid: 2f9ffb71645fa174e8822286230e4709,
        type: 2}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: pos
      value:
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.99994
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.99994
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 0.99994
      objectReference: {fileID: 0}
    - target: {fileID: 114895165010792204, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Text
      value: C
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: position
      value:
      objectReference: {fileID: 1841986825}
    - target: {fileID: 114071723659076054, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Sprite
      value:
      objectReference: {fileID: 21300000, guid: 7a4da745f1dcc0c4388ed87bbb390453,
        type: 3}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &1310244709 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 1310244708}
--- !u!114 &1310244710 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 1310244708}
  m_Script: {fileID: 11500000, guid: 2eb5baefc8634bd4ab9dd15537727284, type: 3}
--- !u!1 &1328995787
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 1740672047598848, guid: ac87432a83099a64e87ae477cb495c64,
    type: 2}
  m_PrefabInternal: {fileID: 1042318921}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1328995789}
  - component: {fileID: 1328995788}
  m_Layer: 0
  m_Name: SceneLoader
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1328995788
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 114997191209580738, guid: ac87432a83099a64e87ae477cb495c64,
    type: 2}
  m_PrefabInternal: {fileID: 1042318921}
  m_GameObject: {fileID: 1328995787}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 8d74cc27ebd56d54ebf3e953b25846bc, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  loadingPanel: {fileID: 236054462}
  loadingBar: {fileID: 1611037981}
--- !u!4 &1328995789
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 4937330300231680, guid: ac87432a83099a64e87ae477cb495c64,
    type: 2}
  m_PrefabInternal: {fileID: 1042318921}
  m_GameObject: {fileID: 1328995787}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: -2.3979664, y: -6.3876853, z: 89.81151}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 5
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &1332066887
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1332066889}
  - component: {fileID: 1332066888}
  m_Layer: 0
  m_Name: MoleculesController
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1332066888
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1332066887}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: be790311a160ed14cac4b654d027506b, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  defaulStrategy:
  ___[defaul_strategy]___
  availableMolecules:
  ___[available_Molecules]___
  strategy: []
  received_strategy: []
  strategy_count: 0
--- !u!4 &1332066889
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1332066887}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 3
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &1335227731
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1335227734}
  - component: {fileID: 1335227733}
  - component: {fileID: 1335227732}
  m_Layer: 5
  m_Name: Line
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1335227732
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1335227731}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_Sprite: {fileID: 0}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1335227733
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1335227731}
--- !u!224 &1335227734
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1335227731}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 1910874452}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 73.11, y: -0.7514329}
  m_SizeDelta: {x: 590.08, y: 4.74}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!224 &1474094111 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 839834648}
--- !u!1001 &1522680178
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalPosition.x
      value: -5.376089
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalPosition.y
      value: 2.2854238
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalPosition.z
      value: 90
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4738657267351142, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
      propertyPath: m_RootOrder
      value: 12
      objectReference: {fileID: 0}
    - target: {fileID: 114929036711871820, guid: ea642b2ef1fd56c4396cef9316ac09d4,
        type: 2}
      propertyPath: currentText
      value:
      objectReference: {fileID: 2054583654}
    - target: {fileID: 114929036711871820, guid: ea642b2ef1fd56c4396cef9316ac09d4,
        type: 2}
      propertyPath: sumText
      value:
      objectReference: {fileID: 2054583655}
    - target: {fileID: 114929036711871820, guid: ea642b2ef1fd56c4396cef9316ac09d4,
        type: 2}
      propertyPath: MoleculesCtrl
      value:
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ea642b2ef1fd56c4396cef9316ac09d4, type: 2}
  m_IsPrefabParent: 0
--- !u!1001 &1558355468
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.x
      value: -7.1613173
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0.4321006
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalPosition.z
      value: -1.3783276
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4581228637943740, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
      propertyPath: m_RootOrder
      value: 10
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 7e42676681ba3ac45843f30ca5a3b595, type: 2}
  m_IsPrefabParent: 0
--- !u!1 &1586177782
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1586177784}
  - component: {fileID: 1586177783}
  m_Layer: 0
  m_Name: SpawnPosition
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!114 &1586177783
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1586177782}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: ec48e5de79857a8458b1d54ee8f9402a, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!4 &1586177784
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1586177782}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: -1, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 7
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1 &1609460906
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1609460907}
  - component: {fileID: 1609460910}
  - component: {fileID: 1609460909}
  - component: {fileID: 1609460908}
  m_Layer: 5
  m_Name: ElementsPanel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1609460907
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1609460906}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 2084023425}
  - {fileID: 1474094111}
  - {fileID: 475630267}
  - {fileID: 1310244709}
  - {fileID: 482852243}
  - {fileID: 2030082003}
  - {fileID: 158337290}
  m_Father: {fileID: 67996002}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 1}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: 0.0038757324, y: -46.670654}
  m_SizeDelta: {x: 0.8, y: 93.2}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1609460908
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1609460906}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -2095666955, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Padding:
    m_Left: 30
    m_Right: 30
    m_Top: 12
    m_Bottom: 12
  m_ChildAlignment: 0
  m_StartCorner: 0
  m_StartAxis: 0
  m_CellSize: {x: 80, y: 70}
  m_Spacing: {x: 35, y: 0}
  m_Constraint: 0
  m_ConstraintCount: 2
--- !u!114 &1609460909
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1609460906}
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
  m_Sprite: {fileID: 21300000, guid: f7ccf5acd52b46d4bb62550f33455a41, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1609460910
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1609460906}
--- !u!114 &1611037981 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114706210096614426, guid: 134d803fbe5daad4898013368569a93b,
    type: 2}
  m_PrefabInternal: {fileID: 152527203}
  m_Script: {fileID: -113659843, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1 &1628549324
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1628549325}
  - component: {fileID: 1628549327}
  - component: {fileID: 1628549326}
  m_Layer: 5
  m_Name: Text (1)
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1628549325
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1628549324}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 353539953}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 34.19995, y: 7.214985}
  m_SizeDelta: {x: 464.7, y: 215.61}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1628549326
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1628549324}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
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
  m_FontData:
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 0
    m_BestFit: 1
    m_MinSize: 14
    m_MaxSize: 60
    m_Alignment: 0
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: "- Click on buttons on the top bar to spawn elements.


- Drag & drop elements on specific slots upon the molecule.


- Use the right mouse click or the WASD keys to rotate the molecule. R or middle
    mouse to reset.  "
--- !u!222 &1628549327
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1628549324}
--- !u!1 &1699848123
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1699848125}
  - component: {fileID: 1699848124}
  m_Layer: 0
  m_Name: ContentAdaptationManager
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!114 &1699848124
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1699848123}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 692411304174151489e77f80c6a4411b, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  MoleculesCtrl: {fileID: 0}
--- !u!4 &1699848125
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1699848123}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: -0.9930594, y: 1.4716178, z: 90.02734}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 0}
  m_RootOrder: 9
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!1001 &1769596963
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 12021464}
    m_Modifications:
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: -80.5
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 43.899
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 115.16
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 51.78
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 114158032877870820, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: CAManager
      value:
      objectReference: {fileID: 1699848124}
    - target: {fileID: 224261621290717120, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: -0.000048403
      objectReference: {fileID: 0}
    - target: {fileID: 224261621290717120, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: 1.4
      objectReference: {fileID: 0}
    - target: {fileID: 224261621290717120, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 109.73
      objectReference: {fileID: 0}
    - target: {fileID: 224261621290717120, guid: 482c4eaf5c6a829448f9934aaa832d52,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 51.78
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 482c4eaf5c6a829448f9934aaa832d52, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &1769596964 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224202612434018212, guid: 482c4eaf5c6a829448f9934aaa832d52,
    type: 2}
  m_PrefabInternal: {fileID: 1769596963}
--- !u!1 &1841986824
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1841986825}
  - component: {fileID: 1841986826}
  m_Layer: 0
  m_Name: PositionCarbon
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 4294967295
  m_IsActive: 1
--- !u!4 &1841986825
Transform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1841986824}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: -7.61, y: 3.8399997, z: 0}
  m_LocalScale: {x: 0.79999995, y: 0.79999995, z: 0.79999995}
  m_Children: []
  m_Father: {fileID: 819875579}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
--- !u!114 &1841986826
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1841986824}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: ec48e5de79857a8458b1d54ee8f9402a, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!1 &1910680085
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1910680086}
  - component: {fileID: 1910680088}
  - component: {fileID: 1910680087}
  - component: {fileID: 1910680089}
  m_Layer: 5
  m_Name: Formua text
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1910680086
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1910680085}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0.9999994, y: 0.9999994, z: 0.9999994}
  m_Children: []
  m_Father: {fileID: 1910874452}
  m_RootOrder: 4
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 1, y: 0}
  m_AnchorMax: {x: 1, y: 1}
  m_AnchoredPosition: {x: -121.100006, y: -0.14699936}
  m_SizeDelta: {x: 216.40002, y: -0.30000305}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1910680087
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1910680085}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 1
    m_BestFit: 1
    m_MinSize: 14
    m_MaxSize: 40
    m_Alignment: 3
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: H2O
--- !u!222 &1910680088
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1910680085}
--- !u!114 &1910680089
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1910680085}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 93a5b915e523c0646be406318f96ba0c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  option: 2
  line: {fileID: 1335227732}
--- !u!1 &1910874451
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1910874452}
  - component: {fileID: 1910874454}
  - component: {fileID: 1910874453}
  m_Layer: 5
  m_Name: Molecule Panel
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1910874452
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1910874451}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1185913980}
  - {fileID: 1335227734}
  - {fileID: 1954172280}
  - {fileID: 982680832}
  - {fileID: 1910680086}
  m_Father: {fileID: 67996002}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 428.93994, y: 39.9}
  m_SizeDelta: {x: 857.9, y: 79.7}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1910874453
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1910874451}
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
  m_Sprite: {fileID: 21300000, guid: f7ccf5acd52b46d4bb62550f33455a41, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1910874454
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1910874451}
--- !u!1 &1954172279
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1954172280}
  - component: {fileID: 1954172282}
  - component: {fileID: 1954172281}
  - component: {fileID: 1954172283}
  m_Layer: 5
  m_Name: molecule name
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1954172280
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1954172279}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 0.9999994, y: 0.9999994, z: 0.9999994}
  m_Children: []
  m_Father: {fileID: 1910874452}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: -110.97, y: 0.60149956}
  m_SizeDelta: {x: 221.94, y: -1.5}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &1954172281
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1954172279}
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
    m_Font: {fileID: 12800000, guid: 937d849fd61453e4e8501ea3ab449fb5, type: 3}
    m_FontSize: 14
    m_FontStyle: 1
    m_BestFit: 1
    m_MinSize: 14
    m_MaxSize: 40
    m_Alignment: 4
    m_AlignByGeometry: 0
    m_RichText: 1
    m_HorizontalOverflow: 0
    m_VerticalOverflow: 0
    m_LineSpacing: 1
  m_Text: Water
--- !u!222 &1954172282
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1954172279}
--- !u!114 &1954172283
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1954172279}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 93a5b915e523c0646be406318f96ba0c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  option: 1
  line: {fileID: 1335227732}
--- !u!1 &1994491650
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 1994491651}
  - component: {fileID: 1994491653}
  - component: {fileID: 1994491652}
  - component: {fileID: 1994491654}
  m_Layer: 5
  m_Name: GearButton
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &1994491651
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1994491650}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: 353539953}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 1}
  m_AnchorMax: {x: 0, y: 1}
  m_AnchoredPosition: {x: 34.2, y: -35.595}
  m_SizeDelta: {x: 68.399994, y: 56.300003}
  m_Pivot: {x: 0.49999988, y: 0.5000001}
--- !u!114 &1994491652
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1994491650}
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
  m_Sprite: {fileID: 21300000, guid: a08fb944ee5af314a9bb3988a4eb7e1e, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &1994491653
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1994491650}
--- !u!114 &1994491654
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 1994491650}
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
    m_HighlightedColor: {r: 0.6691177, g: 0.6691177, b: 0.6691177, a: 1}
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
  m_TargetGraphic: {fileID: 1994491652}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1994491650}
        m_MethodName:
        m_Mode: 1
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName:
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!1001 &2030082002
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 1609460907}
    m_Modifications:
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.size
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 645
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -47
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 80
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 70
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 1177606366249158, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
      propertyPath: m_Name
      value: Cl
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Mode
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_CallState
      value: 2
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Target
      value:
      objectReference: {fileID: 2030082004}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_MethodName
      value: SpawnElement
      objectReference: {fileID: 0}
    - target: {fileID: 114862827010024834, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_OnClick.m_PersistentCalls.m_Calls.Array.data[0].m_Arguments.m_ObjectArgumentAssemblyTypeName
      value: UnityEngine.Object, UnityEngine
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: parentPos
      value:
      objectReference: {fileID: 393138122}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: element
      value:
      objectReference: {fileID: 1122513201129664, guid: 6151dc5b5102c784781062f755d7f0a7,
        type: 2}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: pos
      value:
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.x
      value: 0.99994206
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.y
      value: 0.99994206
      objectReference: {fileID: 0}
    - target: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_LocalScale.z
      value: 0.99994206
      objectReference: {fileID: 0}
    - target: {fileID: 114895165010792204, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Text
      value: Cl
      objectReference: {fileID: 0}
    - target: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: position
      value:
      objectReference: {fileID: 109166085}
    - target: {fileID: 114071723659076054, guid: 3ebf901e892790149bed88a3380845a7,
        type: 2}
      propertyPath: m_Sprite
      value:
      objectReference: {fileID: 21300000, guid: 7a4da745f1dcc0c4388ed87bbb390453,
        type: 3}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 3ebf901e892790149bed88a3380845a7, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &2030082003 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224093497561739098, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 2030082002}
--- !u!114 &2030082004 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114866980105344842, guid: 3ebf901e892790149bed88a3380845a7,
    type: 2}
  m_PrefabInternal: {fileID: 2030082002}
  m_Script: {fileID: 11500000, guid: 2eb5baefc8634bd4ab9dd15537727284, type: 3}
--- !u!1001 &2054583652
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 67996002}
    m_Modifications:
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchoredPosition.x
      value: 50
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchoredPosition.y
      value: -371
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_SizeDelta.x
      value: 100
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_SizeDelta.y
      value: 100
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchorMin.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchorMin.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchorMax.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_AnchorMax.y
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Pivot.x
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Pivot.y
      value: 0.5
      objectReference: {fileID: 0}
    - target: {fileID: 114088613357790290, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_FontData.m_FontStyle
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114470401172653768, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Color.g
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114470401172653768, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Color.b
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114336858517643396, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Color.g
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114336858517643396, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Color.b
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114088613357790290, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Color.g
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114088613357790290, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Color.b
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114470401172653768, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Color.r
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114336858517643396, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Color.r
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 114088613357790290, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
        type: 2}
      propertyPath: m_Color.r
      value: 0
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: e6019f2bf06e8b6489d72dc9d96e99a7, type: 2}
  m_IsPrefabParent: 0
--- !u!224 &2054583653 stripped
RectTransform:
  m_PrefabParentObject: {fileID: 224562779056196090, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
    type: 2}
  m_PrefabInternal: {fileID: 2054583652}
--- !u!114 &2054583654 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114470401172653768, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
    type: 2}
  m_PrefabInternal: {fileID: 2054583652}
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!114 &2054583655 stripped
MonoBehaviour:
  m_PrefabParentObject: {fileID: 114088613357790290, guid: e6019f2bf06e8b6489d72dc9d96e99a7,
    type: 2}
  m_PrefabInternal: {fileID: 2054583652}
  m_Script: {fileID: 708705254, guid: f70555f144d8491a825f0804e09c671c, type: 3}
--- !u!1 &2084023424
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: 2084023425}
  - component: {fileID: 2084023430}
  - component: {fileID: 2084023429}
  - component: {fileID: 2084023428}
  m_Layer: 5
  m_Name: ExitButton
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &2084023425
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2084023424}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: 1237891432}
  m_Father: {fileID: 1609460907}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0.5, y: 0.5000004}
--- !u!114 &2084023428
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2084023424}
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
    m_HighlightedColor: {r: 0.6911765, g: 0.6911765, b: 0.6911765, a: 1}
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
  m_TargetGraphic: {fileID: 2084023429}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: 1328995788}
        m_MethodName: LoadScene
        m_Mode: 5
        m_Arguments:
          m_ObjectArgument: {fileID: 0}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.Object, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument: Lab
          m_BoolArgument: 0
        m_CallState: 2
      - m_Target: {fileID: 114083161415107388, guid: d96e2996417f73d43b58f80956bd1927,
          type: 2}
        m_MethodName: PlaySingle
        m_Mode: 2
        m_Arguments:
          m_ObjectArgument: {fileID: 8300000, guid: a65dc03b4a80c9e46832be0edcbc617d,
            type: 3}
          m_ObjectArgumentAssemblyTypeName: UnityEngine.AudioClip, UnityEngine
          m_IntArgument: 0
          m_FloatArgument: 0
          m_StringArgument:
          m_BoolArgument: 0
        m_CallState: 2
    m_TypeName: UnityEngine.UI.Button+ButtonClickedEvent, UnityEngine.UI, Version=1.0.0.0,
      Culture=neutral, PublicKeyToken=null
--- !u!114 &2084023429
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2084023424}
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
  m_Sprite: {fileID: 21300000, guid: ece8ac2cb44577542aab6c96e2a7ded0, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &2084023430
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: 2084023424}');


function wpunity_default_value_chemwonderaround_unity_chemistry_get(){
  global $ini_scene_chemistry_unity_pattern;
  return $ini_scene_chemistry_unity_pattern[0];
}

function wpunity_default_value_mmenu_unity_chemistry_get(){
  global $ini_scene_main_menu_chem_unity_pattern;
  return $ini_scene_main_menu_chem_unity_pattern[0];
}

function wpunity_default_value_credits_unity_chemistry_get(){
  global $ini_scene_credits_chem_unity_pattern;
  return $ini_scene_credits_chem_unity_pattern[0];
}

function wpunity_default_value_options_unity_chemistry_get(){
  global $ini_scene_options_chem_unity_pattern;
  return $ini_scene_options_chem_unity_pattern[0];
}

function wpunity_default_value_help_unity_chemistry_get(){
  global $ini_scene_help_chem_unity_pattern;
  return $ini_scene_help_chem_unity_pattern[0];
}

function wpunity_default_value_login_unity_chemistry_get(){
  global $ini_scene_login_chem_unity_pattern;
  return $ini_scene_login_chem_unity_pattern[0];
}

function wpunity_default_value_reward_unity_chemistry_get(){
  global $ini_scene_reward_chem_unity_pattern;
  return $ini_scene_reward_chem_unity_pattern[0];
}

function wpunity_default_value_selector_unity_chemistry_get(){
  global $ini_scene_selector_chem_unity_pattern;
  return $ini_scene_selector_chem_unity_pattern[0];
}

function wpunity_default_value_selector2_unity_chemistry_get(){
  global $ini_scene_selector_chem_unity_pattern2;
  return $ini_scene_selector_chem_unity_pattern2[0];
}

function wpunity_default_value_selectortext_unity_chemistry_get(){
  global $ini_scene_selector_chem_text;
  return $ini_scene_selector_chem_text;
}

function wpunity_default_value_exam_unity_chemistry_get(){
  global $ini_scene_chem_exam;
  return $ini_scene_chem_exam[0];
}

function wpunity_default_value_exam3d_unity_chemistry_get(){
  global $ini_scene_chem_exam3d;
  return $ini_scene_chem_exam3d[0];
}

/***************************************************************************************************************/
//
/***************************************************************************************************************/




?>