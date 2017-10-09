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

/**
 * D2.03
 * Create Initial wpunity_asset3d_cat (Asset3D Category) terms
 *
 *
 */

function wpunity_assets_taxcategory_fill(){

    global $ini_asset_sop,$ini_asset_dop,$ini_asset_doorp,$ini_asset_poi,$ini_asset_poi_video;



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
    $ini_asset_consumer = array('--- !u!1001 &___[fid_prefab_consumer_parent]___
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
    - target: {fileID: 114352149921982826, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: MeanPowerConsume
      value: ___[mean_power_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 114352149921982826, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: VarPowerConsume
      value: ___[var_power_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 114352149921982826, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: MinPowerConsume
      value: ___[min_power_consumer]___
      objectReference: {fileID: 0}
    - target: {fileID: 114352149921982826, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
      propertyPath: MaxPowerConsume
      value: ___[max_power_consumer]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 445abb95b6721c64aa4204dff733341e, type: 2}
  m_IsPrefabParent: 0
--- !u!4 &___[fid_consumer_prefab_transform]___ stripped
Transform:
  m_PrefabParentObject: {fileID: 4481460071382266, guid: 445abb95b6721c64aa4204dff733341e,
    type: 2}
  m_PrefabInternal: {fileID: ___[fid_prefab_consumer_parent]___}
--- !u!1001 &___[fid_consumer_prefab_child]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: ___[fid_consumer_prefab_transform]___}
    m_Modifications:
    - target: {fileID: 400002, guid: ___[guid_consumer_prefab_child_obj]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_consumer_prefab_child_obj]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_consumer_prefab_child_obj]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_consumer_prefab_child_obj]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_consumer_prefab_child_obj]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_consumer_prefab_child_obj]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: 0
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_consumer_prefab_child_obj]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 400002, guid: ___[guid_consumer_prefab_child_obj]___, type: 3}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[guid_consumer_prefab_child_obj]___, type: 3}
  m_IsPrefabParent: 0
    ');

    //Github copied
    $ini_asset_producer = array('--- !u!1001 &___[fid_producer]___
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
--- !u!4 &___[fid_transformation_parent_producer]___ stripped
Transform:
  m_PrefabParentObject: {fileID: 4047139695584158, guid: cddc7e0e3b6ab5340a00da10e23d3837,
    type: 2}
  m_PrefabInternal: {fileID: ___[fid_producer]___}
--- !u!1001 &___[fid_child_producer]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: ___[fid_transformation_parent_producer]___}
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
      value: 0
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
    - target: {fileID: 100000, guid: ___[obj_guid_producer]___, type: 3}
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
    $ini_asset_staticDec = array('--- !u!1001 &___[fid_decorator]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[x_pos_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[y_pos_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[z_pos_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[x_rotation_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[y_rotation_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[z_rotation_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: ___[w_rotation_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_RootOrder
      value: 6
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalScale.x
      value: ___[x_scale_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalScale.y
      value: ___[y_scale_decorator]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[guid_obj_decorator]___, type: 3}
      propertyPath: m_LocalScale.z
      value: ___[z_scale_decorator]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[guid_obj_decorator]___, type: 3}
  m_IsPrefabParent: 0
    ');

    /**********************************************************************************/

    //Github copied
    $ini_asset_site = array('--- !u!1001 &___[site_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalPosition.x
      value: ___[site_position_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalPosition.y
      value: ___[site_position_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalPosition.z
      value: ___[site_position_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.x
      value: ___[site_rotation_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.y
      value: ___[site_rotation_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.z
      value: ___[site_rotation_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalRotation.w
      value: ___[site_rotation_w]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_RootOrder
      value: 7
      objectReference: {fileID: 0}
    - target: {fileID: 100000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_Name
      value: ___[site_title]___
      objectReference: {fileID: 0}
   - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalScale.x
      value: ___[site_scale_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalScale.y
      value: ___[site_scale_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 400000, guid: ___[site_obj_guid]___, type: 3}
      propertyPath: m_LocalScale.z
      value: ___[site_scale_z]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[site_obj_guid]___, type: 3}
  m_IsPrefabParent: 0
  ');

    $ini_asset_artifact = array('--- !u!1 &___[dop_fid]___ stripped
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

    //Github copied
    $ini_asset_door = array('--- !u!1001 &___[door_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalPosition.x
      value: ___[door_pos_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalPosition.y
      value: ___[door_pos_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalPosition.z
      value: ___[door_pos_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalRotation.x
      value: ___[door_rot_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalRotation.y
      value: ___[door_rot_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalRotation.z
      value: ___[door_rot_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalRotation.w
      value: ___[door_rot_w]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_RootOrder
      value: 12
      objectReference: {fileID: 0}
    - target: {fileID: 1693961036409888, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_Name
      value: ___[door_title]___
      objectReference: {fileID: 0}
    - target: {fileID: 114092677568471722, guid: b15690de041079845965f87f4847e73f,
        type: 2}
      propertyPath: sceneArrival
      value: ___[door_scene_arrival]___
      objectReference: {fileID: 0}
    - target: {fileID: 114092677568471722, guid: b15690de041079845965f87f4847e73f,
        type: 2}
      propertyPath: doorArrival
      value: ___[door_door_arrival]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalScale.x
      value: ___[door_scale_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalScale.y
      value: ___[door_scale_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f, type: 2}
      propertyPath: m_LocalScale.z
      value: ___[door_scale_z]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: b15690de041079845965f87f4847e73f, type: 2}
  m_IsPrefabParent: 0
--- !u!4 &___[door_transform_fid]___ stripped
Transform:
  m_PrefabParentObject: {fileID: 4660078065809236, guid: b15690de041079845965f87f4847e73f,
    type: 2}
  m_PrefabInternal: {fileID: ___[door_fid]___}
--- !u!1001 &___[door_obj_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: ___[door_transform_fid]___}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[door_guid]___, type: 3}
  m_IsPrefabParent: 0
  ');

    //Github copied
    $ini_asset_poi = array("--- !u!1001 &___[poi_it_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalPosition.x
      value: ___[poi_it_pos_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalPosition.y
      value: ___[poi_it_pos_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalPosition.z
      value: ___[poi_it_pos_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalRotation.x
      value: ___[poi_it_rot_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalRotation.y
      value: ___[poi_it_rot_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalRotation.z
      value: ___[poi_it_rot_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalRotation.w
      value: ___[poi_it_rot_w]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalScale.x
      value: ___[poi_it_scale_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalScale.y
      value: ___[poi_it_scale_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_LocalScale.z
      value: ___[poi_it_scale_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_RootOrder
      value: 7
      objectReference: {fileID: 0}
    - target: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
      propertyPath: m_Name
      value: ___[poi_it_title]___
      objectReference: {fileID: 0}
    - target: {fileID: 114549906102068134, guid: 4c118634f374a3647acbe1862739fb17,
        type: 2}
      propertyPath: imageSpriteNameToShow
      value: ___[poi_it_sprite_guid]___
      objectReference: {fileID: 0}
    - target: {fileID: 114549906102068134, guid: 4c118634f374a3647acbe1862739fb17,
        type: 2}
      propertyPath: textToShow
      value: '___[poi_it_text]___'
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 4c118634f374a3647acbe1862739fb17, type: 2}
  m_IsPrefabParent: 0
--- !u!4 &___[poi_it_connector_fid]___ stripped
Transform:
  m_PrefabParentObject: {fileID: 4761904222008530, guid: 4c118634f374a3647acbe1862739fb17,
    type: 2}
  m_PrefabInternal: {fileID: ___[poi_it_fid]___}
--- !u!1001 &___[poi_it_obj_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: ___[poi_it_connector_fid]___}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[poi_it_obj_guid]___, type: 3}
  m_IsPrefabParent: 0
  ");

    //Github copied
    $ini_asset_poi_video = array('--- !u!1001 &___[poi_v_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications:
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalPosition.x
      value: ___[poi_v_pos_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalPosition.y
      value: ___[poi_v_pos_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalPosition.z
      value: ___[poi_v_pos_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalRotation.x
      value: ___[poi_v_rot_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalRotation.y
      value: ___[poi_v_rot_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalRotation.z
      value: ___[poi_v_rot_z]___
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalRotation.w
      value: ___[poi_v_rot_w]___
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_RootOrder
      value: 1
      objectReference: {fileID: 0}
    - target: {fileID: 1848443769047974, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: ___[poi_v_title]___
      value: poi_video_1
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalScale.x
      value: ___[poi_v_scale_x]___
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalScale.y
      value: ___[poi_v_scale_y]___
      objectReference: {fileID: 0}
    - target: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
      propertyPath: m_LocalScale.z
      value: ___[poi_v_scale_z]___
      objectReference: {fileID: 0}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: 007c17ee709168148aa4aa7afd9e1076, type: 2}
  m_IsPrefabParent: 0
--- !u!4 &___[poi_v_trans_fid]___ stripped
Transform:
  m_PrefabParentObject: {fileID: 4314884090211512, guid: 007c17ee709168148aa4aa7afd9e1076,
    type: 2}
  m_PrefabInternal: {fileID: ___[poi_v_fid]___}
--- !u!1001 &___[poi_v_obj_fid]___
Prefab:
  m_ObjectHideFlags: 0
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: ___[poi_v_trans_fid]___}
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 100100000, guid: ___[poi_v_obj_guid]___, type: 3}
  m_IsPrefabParent: 0
  ');

    wp_insert_term(
        'Artifact', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Artifact models are dynamic 3d assets that can be clicked or moved.',
            'slug' => 'artifact',
        )
    );
    $inserted_term1 = get_term_by('slug', 'artifact', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term1->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_artifact[0], true);
    update_term_meta($inserted_term1->term_id, 'wpunity_assetcat_gamecat', 1 , true);

    wp_insert_term(
        'Points of Interest (Image-Text)', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Points of interest (POIs) are spots at the game where information pops up as Image with Text',
            'slug' => 'pois_imagetext',
        )
    );
    $inserted_term2 = get_term_by('slug', 'pois_imagetext', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term2->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_poi[0], true);
    update_term_meta($inserted_term2->term_id, 'wpunity_assetcat_gamecat', 1 , true);

    wp_insert_term(
        'Points of Interest (Video)', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Points of interest (POIs) are spots at the game where information pops up as Video',
            'slug' => 'pois_video',
        )
    );
    $inserted_term3 = get_term_by('slug', 'pois_video', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term3->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_poi_video[0], true);
    update_term_meta($inserted_term3->term_id, 'wpunity_assetcat_gamecat', 1 , true);

    wp_insert_term(
        'Site', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Site models are Static 3D models that can not be clicked and can not be moved (e.g. ground, wall, cave, house)',
            'slug' => 'site',
        )
    );
    $inserted_term4 = get_term_by('slug', 'site', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term4->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_site[0], true);
    update_term_meta($inserted_term4->term_id, 'wpunity_assetcat_gamecat', 1 , true);

    wp_insert_term(
        'Door', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Doors are 3D model where avatar pass through and thus going from one Scene to another Scene.',
            'slug' => 'door',
        )
    );
    $inserted_term5 = get_term_by('slug', 'door', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term5->term_id, 'wpunity_yamlmeta_assetcat_pat', $ini_asset_door[0], true);
    update_term_meta($inserted_term5->term_id, 'wpunity_assetcat_gamecat', 1 , true);


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
