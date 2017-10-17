<?php

/***************************************************************************************************************/
// CREATE ASSETS' TYPES with default values (CHEMISTRY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_assets_taxcategory_chemistry_fill' );

function wpunity_assets_taxcategory_chemistry_fill(){

//    wp_insert_term(
//        'Artifact', // the term
//        'wpunity_asset3d_cat', // the taxonomy
//        array(
//            'description'=> 'Artifact models are dynamic 3d assets that can be clicked or moved.',
//            'slug' => 'artifact',
//        )
//    );
//    $inserted_term1 = get_term_by('slug', 'artifact', 'wpunity_asset3d_cat');
//    update_term_meta($inserted_term1->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_artifact_get(), true);
//    update_term_meta($inserted_term1->term_id, 'wpunity_assetcat_gamecat', 3 , true);


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

    if (!term_exists('Chemistry Template', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Chemistry Template', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Chemistry scenes',
                'slug' => 'wonderaround-chem-yaml',
            )
        );
    }
}

add_action('create_wpunity_scene_yaml', 'wpunity_scenes_types_chemistry_fields_cre' , $tt_id);

function wpunity_scenes_types_chemistry_fields_cre($tt_id){

    $term_insterted = get_term_by('id', $tt_id, 'wpunity_scene_yaml');

    if($term_insterted->slug == 'wonderaround-chem-yaml'){
        update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', wpunity_default_value_chemwonderaround_unity_chemistry_get());
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
    }
}

/***************************************************************************************************************/
// CREATE SCENE'S YAML as CUSTOM FIELDS (term_metas) with default values (CHEMISTRY GAMES)
/***************************************************************************************************************/

add_action( 'wpunity_scene_yaml_edit_form_fields', 'wpunity_scenes_taxyaml_customFields_chemistry', 10, 2 );

function wpunity_scenes_taxyaml_customFields_chemistry($tag) {

    $term_meta_chemistry_pat = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_chemistry_pat', true );

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
            <label for="wpunity_yamlmeta_chemistry_energy">Chemistry Scenes .unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_chemistry_energy" id="wpunity_yamlmeta_chemistry_energy"><?php echo $term_meta_chemistry_pat ? $term_meta_chemistry_pat : ''; ?></textarea>
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
        $term_meta_wonderaround_pat = $_POST['wpunity_yamlmeta_chemistry_energy'];
        if($term_meta_wonderaround_pat == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_chemistry_energy', wpunity_default_value_chemwonderaround_unity_chemistry_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_chemistry_energy', $term_meta_wonderaround_pat);
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
