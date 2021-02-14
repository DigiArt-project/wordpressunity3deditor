<?php

/***************************************************************************************************************/
// CREATE ASSETS' TYPES with default values (ENERGY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_assets_taxcategory_energy_fill' );

function wpunity_assets_taxcategory_energy_fill(){

  wp_insert_term(
      'Terrain', // the term
      'wpunity_asset3d_cat', // the taxonomy
      array(
          'description'=> 'A Terrain is the ground where turbines can be placed.',
          'slug' => 'terrain',
      )
  );
  $inserted_term6 = get_term_by('slug', 'terrain', 'wpunity_asset3d_cat');
  update_term_meta($inserted_term6->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_terrain_get(), true);
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
  update_term_meta($inserted_term7->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_decoration_energy_get(), true);
  update_term_meta($inserted_term7->term_id, 'wpunity_assetcat_gamecat', 2 , true);

//  wp_insert_term(
//      'Consumer', // the term
//      'wpunity_asset3d_cat', // the taxonomy
//      array(
//          'description'=> 'A Consumer is a game object that consumes energy (e.g. a building).',
//          'slug' => 'consumer',
//      )
//  );
//  $inserted_term8 = get_term_by('slug', 'consumer', 'wpunity_asset3d_cat');
//  update_term_meta($inserted_term8->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_consumer_get(), true);
//  update_term_meta($inserted_term8->term_id, 'wpunity_assetcat_gamecat', 2 , true);

//  wp_insert_term(
//      'Producer', // the term
//      'wpunity_asset3d_cat', // the taxonomy
//      array(
//          'description'=> 'A Producer is a game object that generates energy (e.g. a Wind Turbine or a Solar Panel).',
//          'slug' => 'producer',
//      )
//  );
//  $inserted_term9 = get_term_by('slug', 'producer', 'wpunity_asset3d_cat');
//  update_term_meta($inserted_term9->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_producer_get(), true);
//  update_term_meta($inserted_term9->term_id, 'wpunity_assetcat_gamecat', 2 , true);

  wp_insert_term(
      'Marker', // the term
      'wpunity_asset3d_cat', // the taxonomy
      array(
          'description'=> 'Markers are 3D model where user clicks and thus going from one Scene to another Scene.',
          'slug' => 'marker',
      )
  );
  $inserted_term10 = get_term_by('slug', 'marker', 'wpunity_asset3d_cat');
  update_term_meta($inserted_term10->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_marker_get(), true);
  update_term_meta($inserted_term10->term_id, 'wpunity_assetcat_gamecat', 2 , true);

}

/***************************************************************************************************************/
// CREATE PROJECT SETTINGS with default values (ENERGY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_games_taxtype_energy_fill', 1 );

function wpunity_games_taxtype_energy_fill(){

  wp_insert_term(
      'Energy', // the term
      'wpunity_game_type', // the taxonomy
      array(
          'description' => 'Energy Games',
          'slug' => 'energy_games',
      )
  );
//  $inserted_term = get_term_by('slug', 'energy_games', 'wpunity_game_type');
//
//  update_term_meta($inserted_term->term_id, 'wpunity_audio_manager_term', wpunity_default_value_AudioManager_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_cluster_input_manager_term', wpunity_default_value_ClusterInputManager_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_dynamics_manager_term', wpunity_default_value_DynamicsManager_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_editor_build_settings_term', wpunity_default_value_EditorBuildSettings_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_editor_settings_term', wpunity_default_value_EditorSettings_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_graphics_settings_term', wpunity_default_value_GraphicsSettings_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_input_manager_term', wpunity_default_value_InputManager_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_nav_mesh_areas_term', wpunity_default_value_NavMeshAreas_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_network_manager_term', wpunity_default_value_NetworkManager_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_physics2d_settings_term', wpunity_default_value_Physics2DSettings_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_project_settings_term', wpunity_default_value_ProjectSettings_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_project_version_term', wpunity_default_value_ProjectVersion_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_quality_settings_term', wpunity_default_value_QualitySettings_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_tag_manager_term', wpunity_default_value_TagManager_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_time_manager_term', wpunity_default_value_TimeManager_energy_get(), true);
//  update_term_meta($inserted_term->term_id, 'wpunity_unity_connect_settings_term', wpunity_default_value_unityConnect_energy_get(), true);

}

/***************************************************************************************************************/
// CREATE SCENE TYPES (ENERGY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_scenes_types_energy_standard_cre' );

function wpunity_scenes_types_energy_standard_cre(){

  if (!term_exists('Main Menu Energy Template', 'wpunity_scene_yaml')) {
    wp_insert_term(
        'Main Menu Energy Template', // the term
        'wpunity_scene_yaml', // the taxonomy
        array(
            'description' => 'YAML Template for Main Menu (Energy) scenes',
            'slug' => 'mainmenu-yaml',
        )
    );
  }

  if (!term_exists('Credits Energy Template', 'wpunity_scene_yaml')) {
    wp_insert_term(
        'Credits Energy Template', // the term
        'wpunity_scene_yaml', // the taxonomy
        array(
            'description' => 'YAML Template for Credits (Energy) scenes',
            'slug' => 'credentials-yaml',
        )
    );
  }

  if (!term_exists('Educational Energy Template', 'wpunity_scene_yaml')) {
    wp_insert_term(
        'Educational Energy Template', // the term
        'wpunity_scene_yaml', // the taxonomy
        array(
            'description' => 'YAML Template for Educational Energy scenes',
            'slug' => 'educational-energy',
        )
    );
  }
}

/***************************************************************************************************************/
//
/***************************************************************************************************************/


?>
