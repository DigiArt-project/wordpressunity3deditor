<?php
/**
 * B2.03
 * Create Initial wpunity_game_cat (Game Category) terms
 *
 *
 */

function wpunity_games_taxcategory_fill(){
    wp_insert_term(
        'Real Place', // the term
        'wpunity_game_cat', // the taxonomy
        array(
            'description'=> 'Real places are places that exist in reality and were 3D scanned.',
            'slug' => 'real_place',
        )
    );

    wp_insert_term(
        'Virtual Place', // the term
        'wpunity_game_cat', // the taxonomy
        array(
            'description'=> 'Virtual places do not exist in reality and they are a sort of iconic places to expose 3D scanned artifacts.',
            'slug' => 'virtual_place',
        )
    );

}

add_action( 'init', 'wpunity_games_taxcategory_fill' );


//==========================================================================================================================================

function wpunity_games_taxtype_fill(){

    wp_insert_term(
        'Archaeology', // the term
        'wpunity_game_type', // the taxonomy
        array(
            'description'=> 'Archaeology Games',
            'slug' => 'archaeology_games',
        )
    );

}

add_action( 'init', 'wpunity_games_taxtype_fill' );

//==========================================================================================================================================

/**
 * D2.03
 * Create Initial wpunity_asset3d_cat (Asset3D Category) terms
 *
 *
 */

function wpunity_assets_taxcategory_fill(){

    global $ini_asset_sop,$ini_asset_dop,$ini_asset_doorp,$ini_asset_poi,$ini_asset_poi_video;

    //Static 3D models YAML
    $ini_asset_sop = array('--- !u!1 &___[sop_fid]___ stripped
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
      value: ___[sop_rot_w]___
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
    - target: {fileID: 100002, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_Name
      value: ___[sop_name]___
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: ___[sop_guid]___, type: 3}
      propertyPath: m_Name
      value: ___[sop_name]___default
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[sop_guid]___, type: 3}
  m_IsPrefabParent: 0
');
    //Dynamic 3D models YAML
    $ini_asset_dop = array('--- !u!1 &___[dop_fid]___ stripped
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
    //Doors YAML
    $ini_asset_doorp = array('--- !u!1 &___[door_fid]___ stripped
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
    //Points of Interest (Image-Text) YAML
    $ini_asset_poi = array('--- !u!1 &___[poit_text_container_fid]___
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[poit_text_container_recttrans_fid]___}
  - component: {fileID: ___[poit_text_container_canvrender_fid]___}
  - component: {fileID: ___[poit_text_container_monob_fid]___}
  m_Layer: 0
  m_Name: ___[poit_text_container_name]___
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &___[poit_text_container_recttrans_fid]___
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_text_container_fid]___}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: ___[poit_text_container_recttrans_father_fid]___}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 1}
  m_AnchorMax: {x: 0.5, y: 1}
  m_AnchoredPosition: {x: -700, y: -550}
  m_SizeDelta: {x: 400, y: 800}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &___[poit_text_container_monob_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_text_container_fid]___}
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
    m_Font: {fileID: 10102, guid: 0000000000000000e000000000000000, type: 0}
    m_FontSize: 32
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
  m_Text: ___[poit_text_container_content]___
--- !u!222 &___[poit_text_container_canvrender_fid]___
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_text_container_fid]___}
--- !u!1 &___[poit_closeBt_fid]___
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[poit_closeBt_recttrans_fid]___}
  - component: {fileID: ___[poit_closeBt_canvrender_fid]___}
  - component: {fileID: ___[poit_closeBt_monob_fid]___}
  - component: {fileID: ___[poit_closeBt_monob2_fid]___}
  m_Layer: 0
  m_Name: ___[poit_closeBt_name]___
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &___[poit_closeBt_recttrans_fid]___
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_closeBt_fid]___}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: ___[poit_closeBt_recttrans_child_fid]___}
  m_Father: {fileID: ___[poit_text_container_recttrans_father_fid]___}
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 504}
  m_SizeDelta: {x: 160, y: 46}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &___[poit_closeBt_monob2_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_closeBt_fid]___}
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
  m_TargetGraphic: {fileID: ___[poit_closeBt_monob_fid]___}
  m_OnClick:
    m_PersistentCalls:
      m_Calls:
      - m_Target: {fileID: ___[poit_closeBt_monob3_fid]___}
        m_MethodName: onCloseBt
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
--- !u!114 &___[poit_closeBt_monob_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_closeBt_fid]___}
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
--- !u!222 &___[poit_closeBt_canvrender_fid]___
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_closeBt_fid]___}
--- !u!1 &___[poit_closeBtText_fid]___
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[poit_closeBt_recttrans_child_fid]___}
  - component: {fileID: ___[poit_closeBtText_canvrender_fid]___}
  - component: {fileID: ___[poit_closeBtText_monob_fid]___}
  m_Layer: 0
  m_Name: ___[poit_closeBtText_name]___
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &___[poit_closeBt_recttrans_child_fid]___
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_closeBtText_fid]___}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: ___[poit_closeBt_recttrans_fid]___}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 160, y: 60}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &___[poit_closeBtText_monob_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_closeBtText_fid]___}
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
  m_Text: ___[poit_closeBtText_content]___
--- !u!222 &___[poit_closeBtText_canvrender_fid]___
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_closeBtText_fid]___}
--- !u!1 &___[poit_canvas_fid]___
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[poit_closeBt_recttrans_father_fid]___}
  - component: {fileID: ___[poit_canvas_canvas_fid]___}
  - component: {fileID: ___[poit_canvas_monob_fid]___}
  - component: {fileID: ___[poit_canvas_monob2_fid]___}
  m_Layer: 0
  m_Name: ___[poit_canvas_name]___
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &___[poit_closeBt_recttrans_father_fid]___
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_canvas_fid]___}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 1.1}
  m_LocalScale: {x: 0, y: 0, z: 0}
  m_Children:
  - {fileID: ___[poit_text_container_recttrans_father_fid]___}
  m_Father: {fileID: ___[poit_closeBt_recttrans_father_father_fid]___}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0, y: 0}
  m_AnchorMax: {x: 0, y: 0}
  m_AnchoredPosition: {x: -7.86, y: -0.29}
  m_SizeDelta: {x: 0, y: 0}
  m_Pivot: {x: 0, y: 0}
--- !u!114 &___[poit_canvas_monob2_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_canvas_fid]___}
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
--- !u!114 &___[poit_canvas_monob_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_canvas_fid]___}
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
--- !u!223 &___[poit_canvas_canvas_fid]___
Canvas:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_canvas_fid]___}
  m_Enabled: 0
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
--- !u!1001 &___[poit_prefab_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[poit_position_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[poit_position_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[poit_position_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[poit_rotation_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[poit_rotation_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[poit_rotation_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: ___[poit_rotation_w]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalScale.x
      value: ___[poit_scale_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalScale.y
      value: ___[poit_scale_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_LocalScale.z
      value: ___[poit_scale_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_RootOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 100002, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_Name
      value: ___[poit_prefab_name]___
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: ___[poit_prefab_guid]___, type: 3}
      propertyPath: m_Name
      value: ___[poit_prefab_name]___default
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[poit_prefab_guid]___, type: 3}
  m_IsPrefabParent: 0
--- !u!1 &___[poit_fid]___ stripped
GameObject:
  m_PrefabParentObject: {fileID: 100002, guid: ___[poit_prefab_guid]___, type: 3}
  m_PrefabInternal: {fileID: ___[poit_prefab_fid]___}
--- !u!4 &___[poit_closeBt_recttrans_father_father_fid]___ stripped
Transform:
  m_PrefabParentObject: {fileID: 400000, guid: ___[poit_prefab_guid]___, type: 3}
  m_PrefabInternal: {fileID: ___[poit_prefab_fid]___}
--- !u!1 &___[poit_prefab_boxcol_fid]___ stripped
GameObject:
  m_PrefabParentObject: {fileID: 100000, guid: ___[poit_prefab_guid]___, type: 3}
  m_PrefabInternal: {fileID: ___[poit_prefab_fid]___}
--- !u!114 &___[poit_closeBt_monob3_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_fid]___}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 7c77eec757bf76d41879b85a44b84133, type: 3}
  m_Name:
  m_EditorClassIdentifier:
--- !u!65 &___[poit_prefab_boxcol_boxcol_fid]___
BoxCollider:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_prefab_boxcol_fid]___}
  m_Material: {fileID: 0}
  m_IsTrigger: 0
  m_Enabled: 1
  serializedVersion: 2
  m_Size: {x: 0.61231303, y: 1.103676, z: 0.93248796}
  m_Center: {x: 0.04983951, y: 0.551838, z: 0.018657997}
--- !u!1 &___[poit_imagecont_fid]___
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[poit_imagecont_recttrans_fid]___}
  - component: {fileID: ___[poit_imagecont_canvasrend_fid]___}
  - component: {fileID: ___[poit_imagecont_monob_fid]___}
  m_Layer: 0
  m_Name: ___[poit_imagecont_name]___
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &___[poit_imagecont_recttrans_fid]___
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_imagecont_fid]___}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: ___[poit_text_container_recttrans_father_fid]___}
  m_RootOrder: 1
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 156, y: 0}
  m_SizeDelta: {x: 1200, y: 768}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &___[poit_imagecont_monob_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_imagecont_fid]___}
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
  m_Sprite: {fileID: 21300000, guid: ___[poit_imagecont_sprite_guid]___, type: 3}
  m_Type: 0
  m_PreserveAspect: 0
  m_FillCenter: 1
  m_FillMethod: 4
  m_FillAmount: 1
  m_FillClockwise: 1
  m_FillOrigin: 0
--- !u!222 &___[poit_imagecont_canvasrend_fid]___
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_imagecont_fid]___}
--- !u!1 &___[poit_panel_fid]___
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[poit_text_container_recttrans_father_fid]___}
  - component: {fileID: ___[poit_panel_canvrender_fid]___}
  - component: {fileID: ___[poit_panel_monob_fid]___}
  m_Layer: 0
  m_Name: ___[poit_panel_name]___
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
--- !u!224 &___[poit_text_container_recttrans_father_fid]___
RectTransform:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_panel_fid]___}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: ___[poit_text_container_recttrans_fid]___}
  - {fileID: ___[poit_imagecont_recttrans_fid]___}
  - {fileID: ___[poit_closeBt_recttrans_fid]___}
  m_Father: {fileID: ___[poit_closeBt_recttrans_father_fid]___}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  m_AnchorMin: {x: 0.5, y: 0.5}
  m_AnchorMax: {x: 0.5, y: 0.5}
  m_AnchoredPosition: {x: 0, y: 0}
  m_SizeDelta: {x: 1920, y: 1080}
  m_Pivot: {x: 0.5, y: 0.5}
--- !u!114 &___[poit_panel_monob_fid]___
MonoBehaviour:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_panel_fid]___}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: -765806418, guid: f70555f144d8491a825f0804e09c671c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  m_Material: {fileID: 10754, guid: 0000000000000000f000000000000000, type: 0}
  m_Color: {r: 0, g: 0, b: 0, a: 1}
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
--- !u!222 &___[poit_panel_canvrender_fid]___
CanvasRenderer:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_GameObject: {fileID: ___[poit_panel_fid]___}
');
    //Points of Interest (Video) YAML
    $ini_asset_poi_video = array('Canvasion');

    //Github copied
    $ini_asset_terrain = array('--- !u!1001 &___[fid_of_terrain]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010, type: 2}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010, type: 2}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010, type: 2}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010, type: 2}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010, type: 2}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010, type: 2}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010, type: 2}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010, type: 2}
      propertyPath: m_RootOrder
      value: 5
      objectReference: {fileID: 0}
    - target: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010, type: 2}
      propertyPath: m_LocalScale.x
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: totalIncome
      value: 9
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: incomeWhenOverPower
      value: ___[income_when_overpower]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: incomeWhenCorrectPower
      value: ___[income_when_correct_power]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: incomeWhenUnderPower
      value: ___[income_when_under_power]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: MeanSpeedWind
      value: ___[mean_speed_wind]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: VarSpeedWind
      value: ___[var_speed_wind]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: MinSpeedWind
      value: ___[min_speed_wind]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: MaxSpeedWind
      value: ___[max_speed_wind]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: accessPenalty
      value: ___[access_penalty]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: archaelogyPenalty
      value: ___[archaeology_penalty]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: naturalReservePenalty
      value: ___[natural_reserve_penalty]___
      objectReference: {fileID: 0}
    - target: {fileID: 114528735023537862, guid: f354ad33b83806342bbd961828cb6010,
        type: 2}
      propertyPath: hvDistancePenalty
      value: ___[hvdistance_penalty]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: f354ad33b83806342bbd961828cb6010, type: 2}
  m_IsPrefabParent: 0
--- !u!4 &___[fid_rect_transform_terrain]___ stripped
Transform:
  m_PrefabParentObject: {fileID: 4068649796560302, guid: f354ad33b83806342bbd961828cb6010,
    type: 2}
  m_PrefabInternal: {fileID: ___[fid_of_terrain]___}
--- !u!1001 &___[fid_terrain_prefab_mesh]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: ___[fid_rect_transform_terrain]___}
    m_Modifications:
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[x_pos_terrain]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[y_pos_terrain]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[z_pos_terrain]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[x_rotation_terrain]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[y_rotation_terrain]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[z_rotation_terrain]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: ___[w_rotation_terrain]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_RootOrder
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalScale.x
      value: ___[x_scale_terrain]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalScale.y
      value: ___[y_scale_terrain]___
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_terrain_mesh]___, type: 3}
      propertyPath: m_LocalScale.z
      value: ___[z_scale_terrain]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[guid_terrain_mesh]___, type: 3}
  m_IsPrefabParent: 0
    ');

    //Github copied
    $ini_asset_consumer = array('--- !u!1001 &___[guid_prefab_consumer_parent]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: m_LocalPosition.x
      value: ___[x_pos_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: m_LocalPosition.y
      value: ___[y_pos_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: m_LocalPosition.z
      value: ___[z_pos_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: m_LocalRotation.x
      value: ___[x_rotation_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: m_LocalRotation.y
      value: ___[y_rotation_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: m_LocalRotation.z
      value: ___[z_rotation_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: m_LocalRotation.w
      value: ___[w_rotation_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: m_RootOrder
      value: 6
      objectReference: {fileID: 0}
    - target: {fileID: 1010085542761384, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: m_Name
      value: ___[name_consumer]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
  m_IsPrefabParent: 0
--- !u!4 &___[guid_consumer_prefab_transform]___ stripped
Transform:
  m_PrefabParentObject: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e,
    type: 2}
  m_PrefabInternal: {fileID: ___[guid_prefab_consumer_parent]___}
--- !u!1001 &___[guid_consumer_prefab_child]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: ___[guid_consumer_prefab_transform]___}
    m_Modifications:
    - target: {fileID: 400002, guid: 64d690459f3cb8a4ca08c28f4ac524bd, type: 3}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: 64d690459f3cb8a4ca08c28f4ac524bd, type: 3}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: 64d690459f3cb8a4ca08c28f4ac524bd, type: 3}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: 64d690459f3cb8a4ca08c28f4ac524bd, type: 3}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: 64d690459f3cb8a4ca08c28f4ac524bd, type: 3}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: 64d690459f3cb8a4ca08c28f4ac524bd, type: 3}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: 64d690459f3cb8a4ca08c28f4ac524bd, type: 3}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: 64d690459f3cb8a4ca08c28f4ac524bd, type: 3}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 64d690459f3cb8a4ca08c28f4ac524bd, type: 3}
  m_IsPrefabParent: 0
    ');

    //Github copied
    $ini_asset_producer = array('--- !u!1001 &___[guid_producer]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_LocalPosition.x
      value: ___[x_pos_producer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_LocalPosition.y
      value: ___[y_pos_producer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_LocalPosition.z
      value: ___[z_pos_producer]___
      objectReference: {fileID: 0}
    - target: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_LocalRotation.x
      value: ___[x_rot_parent]___
      objectReference: {fileID: 0}
    - target: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_LocalRotation.y
      value: ___[y_rot_parent]___
      objectReference: {fileID: 0}
    - target: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_LocalRotation.z
      value: ___[z_rot_parent]___
      objectReference: {fileID: 0}
    - target: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_LocalRotation.w
      value:  ___[w_rot_parent]___
      objectReference: {fileID: 0}
    - target: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_RootOrder
      value: 6
      objectReference: {fileID: 0}
    - target: {fileID: 1334398694368940, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_Name
      value: ___[producer_name]___
    - target: {fileID: 4732589310118278, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_LocalPosition.y
      value: ___[y_position_infoquad]___
      objectReference: {fileID: 0}
    - target: {fileID: 4609135467054860, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
      propertyPath: m_LocalPosition.y
      value: ___[y_pos_quadselector]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineClass
      value: ___[turbine_name_class]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutput
      value: ___[turbine_max_power]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineCost
      value: ___[turbine_cost]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineRotorSize
      value: ___[rotor_diameter]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineWindClass
      value: ___[turbine_windspeed_class]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineRepairCost
      value: ___[turbine_repair_cost]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: damageProbCoefficient
      value: ___[turbine_damage_coefficient]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[0]
      value: ___[power_curve_val_0]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[1]
      value: ___[power_curve_val_1]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[2]
      value: ___[power_curve_val_2]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[3]
      value: ___[power_curve_val_3]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[4]
      value: ___[power_curve_val_4]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[5]
      value: ___[power_curve_val_5]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[6]
      value: ___[power_curve_val_6]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[7]
      value: ___[power_curve_val_7]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[8]
      value: ___[power_curve_val_8]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[9]
      value: ___[power_curve_val_9]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[10]
      value: ___[power_curve_val_10]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[11]
      value: ___[power_curve_val_11]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[12]
      value: ___[power_curve_val_12]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[13]
      value: ___[power_curve_val_13]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[14]
      value: ___[power_curve_val_14]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[15]
      value: ___[power_curve_val_15]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[16]
      value: ___[power_curve_val_16]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[17]
      value: ___[power_curve_val_17]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[18]
      value: ___[power_curve_val_18]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[19]
      value: ___[power_curve_val_19]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[20]
      value: ___[power_curve_val_20]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[21]
      value: ___[power_curve_val_21]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[22]
      value: ___[power_curve_val_22]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[23]
      value: ___[power_curve_val_23]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[24]
      value: ___[power_curve_val_24]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[25]
      value: ___[power_curve_val_25]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[26]
      value: ___[power_curve_val_26]___
      objectReference: {fileID: 0}
    - target: {fileID: 114822797867135186, guid: cddc7e0e3b6ab5340a00da10e23d3837,
        type: 2}
      propertyPath: turbineEnergyOutputProfile.Array.data[27]
      value: ___[power_curve_val_27]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: cddc7e0e3b6ab5340a00da10e23d3837, type: 2}
  m_IsPrefabParent: 0
--- !u!4 &___[guid_transformation_parent_producer]___ stripped
Transform:
  m_PrefabParentObject: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837,
    type: 2}
  m_PrefabInternal: {fileID: ___[guid_producer]___}
--- !u!1001 &___[guid_child_producer]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: ___[guid_transformation_parent_producer]___}
    m_Modifications:
    - target: {fileID: 400004, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 400004, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400004, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400004, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400004, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: 0.9238796
      objectReference: {fileID: 0}
    - target: {fileID: 400004, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: -0
      objectReference: {fileID: 0}
    - target: {fileID: 400004, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 400004, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_RootOrder
      value: 4
      objectReference: {fileID: 0}
    - target: {fileID: 100004, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_TagString
      value: producer_mesh
      objectReference: {fileID: 0}
    - target: {fileID: 2300000, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_Enabled
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 2300002, guid: ___[obj_guid_producer]___, type: 3}
      propertyPath: m_Enabled
      value: 0
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[obj_guid_producer]___, type: 3}
  m_IsPrefabParent: 0
    ');

    //Github copied
    $ini_asset_staticDec = array('--- !u!1001 &___[guid_decorator]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[x_pos_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[y_pos_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[z_pos_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[x_rotation_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[y_rotation_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[z_rotation_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: ___[w_rotation_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_RootOrder
      value: 6
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalScale.x
      value: ___[x_scale_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalScale.y
      value: ___[y_scale_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_decorator_obj]___, type: 3}
      propertyPath: m_LocalScale.z
      value: ___[z_scale_decorator]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[guid_decorator_obj]___, type: 3}
  m_IsPrefabParent: 0
    ');


//    wp_insert_term(
//        'Dynamic 3D models', // the term
//        'wpunity_asset3d_cat', // the taxonomy
//        array(
//            'description'=> 'Dynamic 3D models are those that can be clicked or moved, e.g. artifacts.',
//            'slug' => 'dynamic3dmodels',
//        )
//    );
//    $inserted_term1 = get_term_by('slug', 'dynamic3dmodels', 'wpunity_asset3d_cat');
//    update_term_meta($inserted_term1->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_dop[0], true);
//    update_term_meta($inserted_term1->term_id, 'wpunity_assetcat_gamecat', 1 , true);
//
//    wp_insert_term(
//        'Points of Interest (Image-Text)', // the term
//        'wpunity_asset3d_cat', // the taxonomy
//        array(
//            'description'=> 'Points of interest (POIs) are spots at the game where information pops up as Image with Text',
//            'slug' => 'pois_imagetext',
//        )
//    );
//    $inserted_term2 = get_term_by('slug', 'pois_imagetext', 'wpunity_asset3d_cat');
//    update_term_meta($inserted_term2->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_poi[0], true);
//    update_term_meta($inserted_term2->term_id, 'wpunity_assetcat_gamecat', 1 , true);
//
//    wp_insert_term(
//        'Points of Interest (Video)', // the term
//        'wpunity_asset3d_cat', // the taxonomy
//        array(
//            'description'=> 'Points of interest (POIs) are spots at the game where information pops up as Video',
//            'slug' => 'pois_Video',
//        )
//    );
//    $inserted_term3 = get_term_by('slug', 'pois_Video', 'wpunity_asset3d_cat');
//    update_term_meta($inserted_term3->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_poi_video[0], true);
//    update_term_meta($inserted_term3->term_id, 'wpunity_assetcat_gamecat', 1 , true);
//
//    wp_insert_term(
//        'Static 3D models', // the term
//        'wpunity_asset3d_cat', // the taxonomy
//        array(
//            'description'=> 'Static 3D models are those that can not be clicked and can not be moved (e.g. ground, wall, cave, house)',
//            'slug' => 'static3dmodels',
//        )
//    );
//    $inserted_term4 = get_term_by('slug', 'static3dmodels', 'wpunity_asset3d_cat');
//    update_term_meta($inserted_term4->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_sop[0], true);
//    update_term_meta($inserted_term4->term_id, 'wpunity_assetcat_gamecat', 1 , true);
//
//    wp_insert_term(
//        'Doors', // the term
//        'wpunity_asset3d_cat', // the taxonomy
//        array(
//            'description'=> 'Doors are 3D model where avatar pass through and thus going from one Scene to another Scene.',
//            'slug' => 'doors',
//        )
//    );
//    $inserted_term5 = get_term_by('slug', 'doors', 'wpunity_asset3d_cat');
//    update_term_meta($inserted_term5->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_doorp[0], true);
//    update_term_meta($inserted_term5->term_id, 'wpunity_assetcat_gamecat', 1 , true);


    /**********************************  ENERGY CATEGORIES ************************************************/

    wp_insert_term(
        'Terrain', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'A Terrain is the ground where turbines can be placed.',
            'slug' => 'terrain',
        )
    );
    $inserted_term6 = get_term_by('slug', 'terrain', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term6->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_terrain[0], true);
    update_term_meta($inserted_term6->term_id, 'wpunity_assetcat_gamecat', 2 , true);

    wp_insert_term(
        'Decoration', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'A Decoration is a game object that can improve the immersiveness such as Archaeological site, Power lines, Trees, etc.',
            'slug' => 'decoration',
        )
    );
    $inserted_term7 = get_term_by('slug', 'decoration', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term7->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_staticDec[0], true);
    update_term_meta($inserted_term7->term_id, 'wpunity_assetcat_gamecat', 2 , true);

    wp_insert_term(
        'Consumer', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'A Consumer is a game object that consumes energy (e.g. a building).',
            'slug' => 'consumer',
        )
    );
    $inserted_term8 = get_term_by('slug', 'consumer', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term8->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_consumer[0], true);
    update_term_meta($inserted_term8->term_id, 'wpunity_assetcat_gamecat', 2 , true);

    wp_insert_term(
        'Producer', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'A Producer is a game object that generates energy (e.g. a Wind Turbine or a Solar Panel).',
            'slug' => 'producer',
        )
    );
    $inserted_term9 = get_term_by('slug', 'producer', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term9->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_producer[0], true);
    update_term_meta($inserted_term9->term_id, 'wpunity_assetcat_gamecat', 2 , true);

}

add_action( 'init', 'wpunity_assets_taxcategory_fill' );

//==========================================================================================================================================


?>
