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

$ini_scene_main_menu_chem_unity_pattern = array('ADD HERE');

$ini_scene_credits_chem_unity_pattern = array('ADD HERE');

$ini_scene_options_chem_unity_pattern = array('ADD HERE');

$ini_scene_help_chem_unity_pattern = array('ADD HERE');

$ini_scene_login_chem_unity_pattern = array('ADD HERE');

$ini_scene_reward_chem_unity_pattern = array('ADD HERE');

$ini_scene_selector_chem_unity_pattern = array('ADD HERE');

$ini_scene_selector_chem_unity_pattern2 = array('ADD HERE');

$ini_scene_selector_chem_text = 'ADD HERE';

$ini_scene_chem_exam = array('ADD HERE');

$ini_scene_chem_exam3d = array('ADD HERE');


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