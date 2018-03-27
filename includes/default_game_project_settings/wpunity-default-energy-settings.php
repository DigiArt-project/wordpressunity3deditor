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

  wp_insert_term(
      'Consumer', // the term
      'wpunity_asset3d_cat', // the taxonomy
      array(
          'description'=> 'A Consumer is a game object that consumes energy (e.g. a building).',
          'slug' => 'consumer',
      )
  );
  $inserted_term8 = get_term_by('slug', 'consumer', 'wpunity_asset3d_cat');
  update_term_meta($inserted_term8->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_consumer_get(), true);
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
  update_term_meta($inserted_term9->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_producer_get(), true);
  update_term_meta($inserted_term9->term_id, 'wpunity_assetcat_gamecat', 2 , true);

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

add_action( 'init', 'wpunity_games_taxtype_energy_fill' );

function wpunity_games_taxtype_energy_fill(){

  wp_insert_term(
      'Energy', // the term
      'wpunity_game_type', // the taxonomy
      array(
          'description' => 'Energy Games',
          'slug' => 'energy_games',
      )
  );
  $inserted_term = get_term_by('slug', 'energy_games', 'wpunity_game_type');

  update_term_meta($inserted_term->term_id, 'wpunity_audio_manager_term', wpunity_default_value_AudioManager_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_cluster_input_manager_term', wpunity_default_value_ClusterInputManager_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_dynamics_manager_term', wpunity_default_value_DynamicsManager_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_editor_build_settings_term', wpunity_default_value_EditorBuildSettings_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_editor_settings_term', wpunity_default_value_EditorSettings_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_graphics_settings_term', wpunity_default_value_GraphicsSettings_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_input_manager_term', wpunity_default_value_InputManager_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_nav_mesh_areas_term', wpunity_default_value_NavMeshAreas_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_network_manager_term', wpunity_default_value_NetworkManager_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_physics2d_settings_term', wpunity_default_value_Physics2DSettings_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_project_settings_term', wpunity_default_value_ProjectSettings_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_project_version_term', wpunity_default_value_ProjectVersion_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_quality_settings_term', wpunity_default_value_QualitySettings_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_tag_manager_term', wpunity_default_value_TagManager_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_time_manager_term', wpunity_default_value_TimeManager_energy_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_unity_connect_settings_term', wpunity_default_value_unityConnect_energy_get(), true);

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

add_action('create_wpunity_scene_yaml', 'wpunity_scenes_types_energy_fields_cre' , $tt_id);

function wpunity_scenes_types_energy_fields_cre($tt_id){

  $term_insterted = get_term_by('id', $tt_id, 'wpunity_scene_yaml');

  if($term_insterted->slug == 'mainmenu-yaml'){
    update_term_meta($tt_id, 'wpunity_yamlmeta_educational_energy', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu', wpunity_default_value_mmenu_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_options', wpunity_default_value_options_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_help', wpunity_default_value_help_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_login', wpunity_default_value_login_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward', wpunity_default_value_reward_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector', wpunity_default_value_selector_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2', wpunity_default_value_selector2_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title', wpunity_default_value_selectortext_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_exam_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_exam3d_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_chem', 'empty');
  }elseif($term_insterted->slug == 'credentials-yaml'){
    update_term_meta($tt_id, 'wpunity_yamlmeta_educational_energy', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials', wpunity_default_value_credits_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_options', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_help', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_login', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_exam_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_exam3d_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_chem', 'empty');
  }elseif($term_insterted->slug == 'educational-energy') {
    update_term_meta($tt_id, 'wpunity_yamlmeta_educational_energy', wpunity_default_value_educational_unity_energy_get());
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_options', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_help', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_login', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_arch', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_exam_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_exam3d_pat', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_chem', 'empty');
    update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_chem', 'empty');
  }
}


/***************************************************************************************************************/
// CREATE SCENE'S YAML as CUSTOM FIELDS (term_metas) with default values (ENERGY GAMES)
/***************************************************************************************************************/

add_action( 'wpunity_scene_yaml_edit_form_fields', 'wpunity_scenes_taxyaml_customFields_energy', 10, 2 );

function wpunity_scenes_taxyaml_customFields_energy($tag) {

  $term_meta_educational_energy = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_educational_energy', true );

  $term_meta_s_mainmenu = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_mainmenu', true );
  $term_meta_s_credentials = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_credentials', true );
  $term_meta_s_options = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_options', true );
  $term_meta_s_help = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_help', true );
  $term_meta_s_login = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_login', true );
  $term_meta_s_reward = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_reward', true );
  $term_meta_s_selector = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_selector', true );
  $term_meta_s_selector2 = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_selector2', true );
  $term_meta_s_selector_title = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_selector_title', true );

  ?>

  <tr class="form-field">
    <th scope="row" valign="top"></th>
    <td><h3>------------------------------------------------------------------------------------</h3></td>
  </tr>

  <tr class="form-field">
    <th scope="row" valign="top"></th>
    <td><h3>Educational Scenes</h3></td>
  </tr>

  <tr class="form-field term-educational_energy">
    <th scope="row" valign="top">
      <label for="wpunity_yamlmeta_educational_energy">Educational EnergyScenes .unity pattern</label>
    </th>
    <td>
      <textarea name="wpunity_yamlmeta_educational_energy" id="wpunity_yamlmeta_educational_energy"><?php echo $term_meta_educational_energy ? $term_meta_educational_energy : ''; ?></textarea>
    </td>
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


  <tr class="form-field">
    <th scope="row" valign="top"></th>
    <td><h3>Credits Scene</h3></td>
  </tr>

  <tr class="form-field term-s_credentials">
    <th scope="row" valign="top">
      <label for="wpunity_yamlmeta_s_credentials">The S_Credits.unity pattern</label>
    </th>
    <td>
      <textarea name="wpunity_yamlmeta_s_credentials" id="wpunity_yamlmeta_s_credentials"><?php echo $term_meta_s_credentials ? $term_meta_s_credentials : ''; ?></textarea>
      <p class="description">scene-credentials-unity-pattern</p>
    </td>
  </tr>

  <tr class="form-field">
    <th scope="row" valign="top"></th>
    <td><h3>Options/Settings Scene</h3></td>
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


  <tr class="form-field">
    <th scope="row" valign="top"></th>
    <td><h3>Help Scene</h3></td>
  </tr>

  <tr class="form-field term-s_options">
    <th scope="row" valign="top">
      <label for="wpunity_yamlmeta_s_options">The S_Help.unity pattern</label>
    </th>
    <td>
      <textarea name="wpunity_yamlmeta_s_help" id="wpunity_yamlmeta_s_help"><?php echo $term_meta_s_help ? $term_meta_s_help : ''; ?></textarea>
      <p class="description">scene-help-unity-pattern</p>
    </td>
  </tr>

  <tr class="form-field">
    <th scope="row" valign="top"></th>
    <td><h3>Login Scene</h3></td>
  </tr>

  <tr class="form-field term-s_login">
    <th scope="row" valign="top">
      <label for="wpunity_yamlmeta_s_login">The S_Login.unity pattern</label>
    </th>
    <td>
      <textarea name="wpunity_yamlmeta_s_login" id="wpunity_yamlmeta_s_login"><?php echo $term_meta_s_login ? $term_meta_s_login : ''; ?></textarea>
      <p class="description">scene-login-unity-pattern</p>
    </td>
  </tr>

  <tr class="form-field">
    <th scope="row" valign="top"></th>
    <td><h3>Reward Scene</h3></td>
  </tr>

  <tr class="form-field term-s_reward">
    <th scope="row" valign="top">
      <label for="wpunity_yamlmeta_s_reward">The S_Reward.unity pattern</label>
    </th>
    <td>
      <textarea name="wpunity_yamlmeta_s_reward" id="wpunity_yamlmeta_s_reward"><?php echo $term_meta_s_reward ? $term_meta_s_reward : ''; ?></textarea>
      <p class="description"></p>
    </td>
  </tr>

  <tr class="form-field">
    <th scope="row" valign="top"></th>
    <td><h3>Scene Selector</h3></td>
  </tr>

  <tr class="form-field term-s_selector">
    <th scope="row" valign="top">
      <label for="wpunity_yamlmeta_s_selector">The S_SceneSelector.unity pattern</label>
    </th>
    <td>
      <textarea name="wpunity_yamlmeta_s_selector" id="wpunity_yamlmeta_s_selector"><?php echo $term_meta_s_selector ? $term_meta_s_selector : ''; ?></textarea>
      <p class="description"></p>
    </td>
  </tr>

  <tr class="form-field term-s_selector2">
    <th scope="row" valign="top">
      <label for="wpunity_yamlmeta_s_selector2">The S_SceneSelector.unity pattern (each tile yaml)</label>
    </th>
    <td>
      <textarea name="wpunity_yamlmeta_s_selector2" id="wpunity_yamlmeta_s_selector2"><?php echo $term_meta_s_selector2 ? $term_meta_s_selector2 : ''; ?></textarea>
      <p class="description"></p>
    </td>
  </tr>

  <tr class="form-field term-s_selector_title">
    <th scope="row" valign="top">
      <label for="wpunity_yamlmeta_s_selector_title">The S_SceneSelector.unity pattern (TITLE)</label>
    </th>
    <td>
      <textarea name="wpunity_yamlmeta_s_selector_title" id="wpunity_yamlmeta_s_selector_title"><?php echo $term_meta_s_selector_title ? $term_meta_s_selector_title : ''; ?></textarea>
      <p class="description"></p>
    </td>
  </tr>

  <?php
}

/***************************************************************************************************************/
// SAVE SCENE'S YAML as CUSTOM FIELDS (term_metas) with default values (ENERGY GAMES)
/***************************************************************************************************************/

add_action( 'edited_wpunity_scene_yaml', 'wpunity_scenes_taxyaml_customFields_energy_save', 10, 2 );

function wpunity_scenes_taxyaml_customFields_energy_save( $term_id ) {

  if ( isset( $_POST['wpunity_yamlmeta_educational_energy'] ) ) {
    $term_meta_educational_energy = $_POST['wpunity_yamlmeta_educational_energy'];
    if($term_meta_educational_energy == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_educational_energy', wpunity_default_value_educational_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_educational_energy', $term_meta_educational_energy);
    }
  }

  if ( isset( $_POST['wpunity_yamlmeta_s_mainmenu'] ) ) {
    $term_meta_scene_s_mainmenu = $_POST['wpunity_yamlmeta_s_mainmenu'];
    if($term_meta_scene_s_mainmenu == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_s_mainmenu', wpunity_default_value_mmenu_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_s_mainmenu', $term_meta_scene_s_mainmenu);
    }
  }

  if ( isset( $_POST['wpunity_yamlmeta_s_credentials'] ) ) {
    $term_meta_scene_s_credentials = $_POST['wpunity_yamlmeta_s_credentials'];
    if($term_meta_scene_s_credentials == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_s_credentials', wpunity_default_value_credits_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_s_credentials', $term_meta_scene_s_credentials);
    }
  }

  if ( isset( $_POST['wpunity_yamlmeta_s_options'] ) ) {
    $term_meta_scene_s_options = $_POST['wpunity_yamlmeta_s_options'];
    if($term_meta_scene_s_options == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_s_options', wpunity_default_value_options_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_s_options', $term_meta_scene_s_options);
    }
  }

  if ( isset( $_POST['wpunity_yamlmeta_s_help'] ) ) {
    $term_meta_scene_s_help = $_POST['wpunity_yamlmeta_s_help'];
    if($term_meta_scene_s_help == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_s_help', wpunity_default_value_help_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_s_help', $term_meta_scene_s_help);
    }
  }

  if ( isset( $_POST['wpunity_yamlmeta_s_login'] ) ) {
    $term_meta_scene_s_login = $_POST['wpunity_yamlmeta_s_login'];
    if($term_meta_scene_s_login == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_s_login', wpunity_default_value_login_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_s_login', $term_meta_scene_s_login);
    }
  }

  if ( isset( $_POST['wpunity_yamlmeta_s_reward'] ) ) {
    $term_meta_scene_s_reward = $_POST['wpunity_yamlmeta_s_reward'];
    if($term_meta_scene_s_reward == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_s_reward', wpunity_default_value_reward_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_s_reward', $term_meta_scene_s_reward);
    }
  }

  if ( isset( $_POST['wpunity_yamlmeta_s_selector'] ) ) {
    $term_meta_scene_s_selector = $_POST['wpunity_yamlmeta_s_selector'];
    if($term_meta_scene_s_selector == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_s_selector', wpunity_default_value_selector_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_s_selector', $term_meta_scene_s_selector);
    }
  }

  if ( isset( $_POST['wpunity_yamlmeta_s_selector2'] ) ) {
    $term_meta_scene_s_selector2 = $_POST['wpunity_yamlmeta_s_selector2'];
    if($term_meta_scene_s_selector2 == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_s_selector2', wpunity_default_value_selector2_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_s_selector2', $term_meta_scene_s_selector2);
    }
  }

  if ( isset( $_POST['wpunity_yamlmeta_s_selector_title'] ) ) {
    $term_meta_scene_s_selector_title = $_POST['wpunity_yamlmeta_s_selector_title'];
    if($term_meta_scene_s_selector_title == ''){
      update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_title', wpunity_default_value_selectortext_unity_energy_get());
    }else{
      update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_title', $term_meta_scene_s_selector_title);
    }
  }

}

/***************************************************************************************************************/
//
/***************************************************************************************************************/


?>
