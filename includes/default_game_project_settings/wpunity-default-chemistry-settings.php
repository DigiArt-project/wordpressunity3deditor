<?php

/***************************************************************************************************************/
// CREATE ASSETS' TYPES with default values (CHEMISTRY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_assets_taxcategory_chemistry_fill' );

function wpunity_assets_taxcategory_chemistry_fill(){

    wp_insert_term(
        'Room', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Chemistry Asset Type (Room)',
            'slug' => 'room',
        )
    );
    $inserted_term1 = get_term_by('slug', 'room', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term1->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_room_get(), true);
    update_term_meta($inserted_term1->term_id, 'wpunity_assetcat_gamecat', 3 , true);

    wp_insert_term(
        'Gate', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Chemistry Asset Type (Gate)',
            'slug' => 'gate',
        )
    );
    $inserted_term2 = get_term_by('slug', 'gate', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term2->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_gate_get(), true);
    update_term_meta($inserted_term2->term_id, 'wpunity_assetcat_gamecat', 3 , true);

    wp_insert_term(
        'Molecule', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Chemistry Asset Type (Molecule)',
            'slug' => 'molecule',
        )
    );
    $inserted_term5 = get_term_by('slug', 'molecule', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term5->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_molecule_get(), true);
    update_term_meta($inserted_term5->term_id, 'wpunity_assetcat_gamecat', 3 , true);

}

/***************************************************************************************************************/
// CREATE PROJECT SETTINGS with default values (CHEMISTRY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_games_taxtype_chemistry_fill' );

function wpunity_games_taxtype_chemistry_fill(){

  wp_insert_term(
      'Chemistry', // the term
      'wpunity_game_type', // the taxonomy
      array(
          'description'=> 'Chemistry Games',
          'slug' => 'chemistry_games',
      )
  );

  $inserted_term = get_term_by('slug', 'chemistry_games', 'wpunity_game_type');

  update_term_meta($inserted_term->term_id, 'wpunity_audio_manager_term', wpunity_default_value_AudioManager_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_cluster_input_manager_term', wpunity_default_value_ClusterInputManager_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_dynamics_manager_term', wpunity_default_value_DynamicsManager_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_editor_build_settings_term', wpunity_default_value_EditorBuildSettings_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_editor_settings_term', wpunity_default_value_EditorSettings_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_graphics_settings_term', wpunity_default_value_GraphicsSettings_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_input_manager_term', wpunity_default_value_InputManager_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_nav_mesh_areas_term', wpunity_default_value_NavMeshAreas_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_network_manager_term', wpunity_default_value_NetworkManager_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_physics2d_settings_term', wpunity_default_value_Physics2DSettings_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_project_settings_term', wpunity_default_value_ProjectSettings_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_project_version_term', wpunity_default_value_ProjectVersion_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_quality_settings_term', wpunity_default_value_QualitySettings_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_tag_manager_term', wpunity_default_value_TagManager_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_time_manager_term', wpunity_default_value_TimeManager_chemistry_get(), true);
  update_term_meta($inserted_term->term_id, 'wpunity_unity_connect_settings_term', wpunity_default_value_unityConnect_chemistry_get(), true);

}

/***************************************************************************************************************/
// CREATE SCENE TYPES (CHEMISTRY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_scenes_types_chemistry_standard_cre' );

function wpunity_scenes_types_chemistry_standard_cre(){

    if (!term_exists('Main Menu Chemistry Template', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Main Menu Chemistry Template', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Main Menu (Chemistry) scenes',
                'slug' => 'mainmenu-chem-yaml',
            )
        );
    }

    if (!term_exists('Credits Chemistry Template', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Credits Chemistry Template', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Credits (Chemistry) scenes',
                'slug' => 'credentials-chem-yaml',
            )
        );
    }

    if (!term_exists('Lab', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Lab', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Chemistry scenes (WonderAround style)',
                'slug' => 'wonderaround-lab-yaml',
            )
        );
    }

    if (!term_exists('2D naming puzzle', 'wpunity_scene_yaml')) {
        wp_insert_term(
            '2D naming puzzle', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Chemistry 2D naming puzzle',
                'slug' => 'exam2d-chem-yaml',
            )
        );
    }

    if (!term_exists('3D construction puzzle', 'wpunity_scene_yaml')) {
        wp_insert_term(
            '3D construction puzzle', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Chemistry 3D construction puzzle',
                'slug' => 'exam3d-chem-yaml',
            )
        );
    }

}

add_action('create_wpunity_scene_yaml', 'wpunity_scenes_types_chemistry_fields_cre');

function wpunity_scenes_types_chemistry_fields_cre($term_id){

    $tt_id = $term_id;

    $term_insterted = get_term_by('id', $tt_id, 'wpunity_scene_yaml');

    if($term_insterted->slug == 'wonderaround-lab-yaml'){
        update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', wpunity_default_value_chemwonderaround_unity_chemistry_get());
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
        update_term_meta($tt_id, 'wpunity_yamlmeta_educational_energy', 'empty');
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
    }elseif($term_insterted->slug == 'credentials-chem-yaml'){
        update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_exam_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_exam3d_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_chem', wpunity_default_value_credits_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_educational_energy', 'empty');
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
    }elseif($term_insterted->slug == 'mainmenu-chem-yaml') {
        update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_exam_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_exam3d_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_chem', wpunity_default_value_mmenu_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_chem', wpunity_default_value_options_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_chem', wpunity_default_value_help_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_chem', wpunity_default_value_login_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_chem', wpunity_default_value_reward_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_chem', wpunity_default_value_selector_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_chem', wpunity_default_value_selector2_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_chem', wpunity_default_value_selectortext_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_educational_energy', 'empty');
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
    }elseif($term_insterted->slug == 'exam2d-chem-yaml') {
        update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_exam_pat', wpunity_default_value_exam_unity_chemistry_get());
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
        update_term_meta($tt_id, 'wpunity_yamlmeta_educational_energy', 'empty');
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
    }elseif($term_insterted->slug == 'exam3d-chem-yaml') {
        update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_exam_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_exam3d_pat', wpunity_default_value_exam3d_unity_chemistry_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_chem', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_educational_energy', 'empty');
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
    }
}

/***************************************************************************************************************/
// CREATE SCENE'S YAML as CUSTOM FIELDS (term_metas) with default values (CHEMISTRY GAMES)
/***************************************************************************************************************/

add_action( 'wpunity_scene_yaml_edit_form_fields', 'wpunity_scenes_taxyaml_customFields_chemistry', 10, 2 );

function wpunity_scenes_taxyaml_customFields_chemistry($tag) {

    $term_meta_chemistry_pat = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_chemistry_pat', true );
    $term_meta_exam_pat = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_exam_pat', true );
    $term_meta_exam3d_pat = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_exam3d_pat', true );

    $term_meta_s_mainmenu_chem = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_mainmenu_chem', true );
    $term_meta_s_credentials_chem = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_credentials_chem', true );
    $term_meta_s_options_chem = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_options_chem', true );
    $term_meta_s_help_chem = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_help_chem', true );
    $term_meta_s_login_chem = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_login_chem', true );
    $term_meta_s_reward_chem = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_reward_chem', true );
    $term_meta_s_selector_chem = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_selector_chem', true );
    $term_meta_s_selector2_chem = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_selector2_chem', true );
    $term_meta_s_selector_title_chem = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_selector_title_chem', true );

    ?>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>------------------------------------------------------------------------------------</h3></td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Chemistry Scenes</h3></td>
    </tr>

    <tr class="form-field term-chemistry_energy">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_chemistry_energy">Chemistry Scenes LAB .unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_chemistry_energy" id="wpunity_yamlmeta_chemistry_energy"><?php echo $term_meta_chemistry_pat ? $term_meta_chemistry_pat : ''; ?></textarea>
        </td>
    </tr>

    <tr class="form-field term-exam_chem">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_exam_pat">Exam 2D .unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_exam_pat" id="wpunity_yamlmeta_exam_pat"><?php echo $term_meta_exam_pat ? $term_meta_exam_pat : ''; ?></textarea>
        </td>
    </tr>

    <tr class="form-field term-exam_chem">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_exam3d_pat">Exam 3D .unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_exam3d_pat" id="wpunity_yamlmeta_exam3d_pat"><?php echo $term_meta_exam3d_pat ? $term_meta_exam3d_pat : ''; ?></textarea>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Main Menu Scene</h3></td>
    </tr>

    <tr class="form-field term-s_mainmenu_chem">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_mainmenu_chem">The S_MainMenu.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_mainmenu_chem" id="wpunity_yamlmeta_s_mainmenu_chem"><?php echo $term_meta_s_mainmenu_chem ? $term_meta_s_mainmenu_chem : ''; ?></textarea>
            <p class="description">scene-main-menu-unity-pattern</p>
        </td>
    </tr>


    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Credits Scene</h3></td>
    </tr>

    <tr class="form-field term-s_credentials_chem">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_credentials_chem">The S_Credits.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_credentials_chem" id="wpunity_yamlmeta_s_credentials_chem"><?php echo $term_meta_s_credentials_chem ? $term_meta_s_credentials_chem : ''; ?></textarea>
            <p class="description">scene-credentials-unity-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Options/Settings Scene</h3></td>
    </tr>

    <tr class="form-field term-s_options_chem">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_options_chem">The S_Options.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_options_chem" id="wpunity_yamlmeta_s_options_chem"><?php echo $term_meta_s_options_chem ? $term_meta_s_options_chem : ''; ?></textarea>
            <p class="description">scene-options-unity-pattern</p>
        </td>
    </tr>


    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Help Scene</h3></td>
    </tr>

    <tr class="form-field term-s_options_chem">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_help_chem">The S_Help.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_help_chem" id="wpunity_yamlmeta_s_help_chem"><?php echo $term_meta_s_help_chem ? $term_meta_s_help_chem : ''; ?></textarea>
            <p class="description">scene-help-unity-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Login Scene</h3></td>
    </tr>

    <tr class="form-field term-s_login_chem">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_login_chem">The S_Login.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_login_chem" id="wpunity_yamlmeta_s_login_chem"><?php echo $term_meta_s_login_chem ? $term_meta_s_login_chem : ''; ?></textarea>
            <p class="description">scene-login-unity-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Reward Scene</h3></td>
    </tr>

    <tr class="form-field term-s_reward_chem">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_reward_chem">The S_Reward.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_reward_chem" id="wpunity_yamlmeta_s_reward_chem"><?php echo $term_meta_s_reward_chem ? $term_meta_s_reward_chem : ''; ?></textarea>
            <p class="description"></p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Scene Selector</h3></td>
    </tr>

    <tr class="form-field term-s_selector_chem">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_selector_chem">The S_SceneSelector.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_selector_chem" id="wpunity_yamlmeta_s_selector_chem"><?php echo $term_meta_s_selector_chem ? $term_meta_s_selector_chem : ''; ?></textarea>
            <p class="description"></p>
        </td>
    </tr>

    <tr class="form-field term-s_selector2">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_selector2_chem">The S_SceneSelector.unity pattern (each tile yaml)</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_selector2_chem" id="wpunity_yamlmeta_s_selector2_chem"><?php echo $term_meta_s_selector2_chem ? $term_meta_s_selector2_chem : ''; ?></textarea>
            <p class="description"></p>
        </td>
    </tr>

    <tr class="form-field term-s_selector_title">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_selector_title_chem">The S_SceneSelector.unity pattern (TITLE)</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_selector_title_chem" id="wpunity_yamlmeta_s_selector_title_chem"><?php echo $term_meta_s_selector_title_chem ? $term_meta_s_selector_title_chem : ''; ?></textarea>
            <p class="description"></p>
        </td>
    </tr>

    <?php
}

/***************************************************************************************************************/
// SAVE SCENE'S YAML as CUSTOM FIELDS (term_metas) with default values (CHEMISTRY GAMES)
/***************************************************************************************************************/

add_action( 'edited_wpunity_scene_yaml', 'wpunity_scenes_taxyaml_customFields_chemistry_save', 10, 2 );

function wpunity_scenes_taxyaml_customFields_chemistry_save( $term_id ) {

    if ( isset( $_POST['wpunity_yamlmeta_chemistry_energy'] ) ) {
        $term_meta_wonderaround_chem_pat = $_POST['wpunity_yamlmeta_chemistry_energy'];
        if($term_meta_wonderaround_chem_pat == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_chemistry_pat', wpunity_default_value_chemwonderaround_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_chemistry_pat', $term_meta_wonderaround_chem_pat);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_exam_pat'] ) ) {
        $term_meta_exam_pat = $_POST['wpunity_yamlmeta_exam_pat'];
        if($term_meta_exam_pat == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_exam_pat', wpunity_default_value_exam_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_exam_pat', $term_meta_exam_pat);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_exam3d_pat'] ) ) {
        $term_meta_exam3d_pat = $_POST['wpunity_yamlmeta_exam3d_pat'];
        if($term_meta_exam3d_pat == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_exam3d_pat', wpunity_default_value_exam3d_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_exam3d_pat', $term_meta_exam3d_pat);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_mainmenu_chem'] ) ) {
        $term_meta_scene_s_mainmenu = $_POST['wpunity_yamlmeta_s_mainmenu_chem'];
        if($term_meta_scene_s_mainmenu == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_mainmenu_chem', wpunity_default_value_mmenu_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_mainmenu_chem', $term_meta_scene_s_mainmenu);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_credentials_chem'] ) ) {
        $term_meta_scene_s_credentials = $_POST['wpunity_yamlmeta_s_credentials_chem'];
        if($term_meta_scene_s_credentials == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_credentials_chem', wpunity_default_value_credits_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_credentials_chem', $term_meta_scene_s_credentials);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_options_chem'] ) ) {
        $term_meta_scene_s_options = $_POST['wpunity_yamlmeta_s_options_chem'];
        if($term_meta_scene_s_options == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_options_chem', wpunity_default_value_options_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_options_chem', $term_meta_scene_s_options);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_help_chem'] ) ) {
        $term_meta_scene_s_help = $_POST['wpunity_yamlmeta_s_help_chem'];
        if($term_meta_scene_s_help == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_help_chem', wpunity_default_value_help_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_help_chem', $term_meta_scene_s_help);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_login_chem'] ) ) {
        $term_meta_scene_s_login = $_POST['wpunity_yamlmeta_s_login_chem'];
        if($term_meta_scene_s_login == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_login_chem', wpunity_default_value_login_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_login_chem', $term_meta_scene_s_login);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_reward_chem'] ) ) {
        $term_meta_scene_s_reward = $_POST['wpunity_yamlmeta_s_reward_chem'];
        if($term_meta_scene_s_reward == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_reward_chem', wpunity_default_value_reward_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_reward_chem', $term_meta_scene_s_reward);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_selector_chem'] ) ) {
        $term_meta_scene_s_selector = $_POST['wpunity_yamlmeta_s_selector_chem'];
        if($term_meta_scene_s_selector == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_chem', wpunity_default_value_selector_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_chem', $term_meta_scene_s_selector);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_selector2_chem'] ) ) {
        $term_meta_scene_s_selector2 = $_POST['wpunity_yamlmeta_s_selector2_chem'];
        if($term_meta_scene_s_selector2 == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector2_chem', wpunity_default_value_selector2_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector2_chem', $term_meta_scene_s_selector2);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_selector_title_chem'] ) ) {
        $term_meta_scene_s_selector_title = $_POST['wpunity_yamlmeta_s_selector_title_chem'];
        if($term_meta_scene_s_selector_title == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_title_chem', wpunity_default_value_selectortext_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_title_chem', $term_meta_scene_s_selector_title);
        }
    }

}


/***************************************************************************************************************/
//
/***************************************************************************************************************/

 ?>
