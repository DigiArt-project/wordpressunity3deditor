<?php

/***************************************************************************************************************/
// CREATE ASSETS' TYPES with default values (ARCHAEOLOGY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_assets_taxcategory_archaeology_fill' );

function wpunity_assets_taxcategory_archaeology_fill(){

    wp_insert_term(
        'Artifact', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Artifact models are dynamic 3d assets that can be clicked or moved.',
            'slug' => 'artifact',
        )
    );
    $inserted_term1 = get_term_by('slug', 'artifact', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term1->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_artifact_get(), true);
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
    update_term_meta($inserted_term2->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_poi_get(), true);
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
    update_term_meta($inserted_term3->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_poi_video_get(), true);
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
    update_term_meta($inserted_term4->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_site_get(), true);
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
    update_term_meta($inserted_term5->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_door_get(), true);
    update_term_meta($inserted_term5->term_id, 'wpunity_assetcat_gamecat', 2 , true);//MALTA change it to 1

    wp_insert_term(
        'Decoration (Archaeology)', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'A Decoration (for Archaeology Games) is a game object that can improve the immersiveness such as Archaeological site, Power lines, Trees, etc.',
            'slug' => 'decoration_arch',
        )
    );
    $inserted_term6 = get_term_by('slug', 'decoration_arch', 'wpunity_asset3d_cat');
    update_term_meta($inserted_term6->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_decoration_arch_get(), true);
    update_term_meta($inserted_term6->term_id, 'wpunity_assetcat_gamecat', 1 , true);
}

/***************************************************************************************************************/
// CREATE PROJECT SETTINGS with default values (ARCHAEOLOGY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_games_taxtype_archaeology_fill' );

function wpunity_games_taxtype_archaeology_fill(){

    wp_insert_term(
        'Archaeology', // the term
        'wpunity_game_type', // the taxonomy
        array(
            'description'=> 'Archaeology Games',
            'slug' => 'archaeology_games',
        )
    );

    $inserted_term = get_term_by('slug', 'archaeology_games', 'wpunity_game_type');

    update_term_meta($inserted_term->term_id, 'wpunity_audio_manager_term', wpunity_default_value_AudioManager_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_cluster_input_manager_term', wpunity_default_value_ClusterInputManager_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_dynamics_manager_term', wpunity_default_value_DynamicsManager_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_editor_build_settings_term', wpunity_default_value_EditorBuildSettings_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_editor_settings_term', wpunity_default_value_EditorSettings_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_graphics_settings_term', wpunity_default_value_GraphicsSettings_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_input_manager_term', wpunity_default_value_InputManager_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_nav_mesh_areas_term', wpunity_default_value_NavMeshAreas_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_network_manager_term', wpunity_default_value_NetworkManager_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_physics2d_settings_term', wpunity_default_value_Physics2DSettings_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_project_settings_term', wpunity_default_value_ProjectSettings_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_project_version_term', wpunity_default_value_ProjectVersion_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_quality_settings_term', wpunity_default_value_QualitySettings_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_tag_manager_term', wpunity_default_value_TagManager_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_time_manager_term', wpunity_default_value_TimeManager_arch_get(), true);
    update_term_meta($inserted_term->term_id, 'wpunity_unity_connect_settings_term', wpunity_default_value_unityConnect_arch_get(), true);

}

/***************************************************************************************************************/
// CREATE SCENE TYPES (ARCHAEOLOGY GAMES)
/***************************************************************************************************************/

add_action( 'init', 'wpunity_scenes_types_archaeology_standard_cre' );

function wpunity_scenes_types_archaeology_standard_cre(){

    if (!term_exists('Main Menu Archaeology Template', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Main Menu Archaeology Template', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Main Menu (Archaeology) scenes',
                'slug' => 'mainmenu-arch-yaml',
            )
        );
    }

    if (!term_exists('Credits Archaeology Template', 'wpunity_scene_yaml')) {
        wp_insert_term(
            'Credits Archaeology Template', // the term
            'wpunity_scene_yaml', // the taxonomy
            array(
                'description' => 'YAML Template for Credits (Archaeology) scenes',
                'slug' => 'credentials-arch-yaml',
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
}

add_action('create_wpunity_scene_yaml', 'wpunity_scenes_types_archaeology_fields_cre' , $tt_id);

function wpunity_scenes_types_archaeology_fields_cre($tt_id){

    $term_insterted = get_term_by('id', $tt_id, 'wpunity_scene_yaml');

    if($term_insterted->slug == 'wonderaround-yaml'){
        update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', wpunity_default_value_wonderaround_unity_archaeology_get());
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
    }elseif($term_insterted->slug == 'mainmenu-arch-yaml'){
        update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_arch', wpunity_default_value_mmenu_unity_archaeology_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_arch', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_arch', wpunity_default_value_options_unity_archaeology_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_arch', wpunity_default_value_help_unity_archaeology_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_arch', wpunity_default_value_login_unity_archaeology_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_arch', wpunity_default_value_reward_unity_archaeology_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_arch', wpunity_default_value_selector_unity_archaeology_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_arch', wpunity_default_value_selector2_unity_archaeology_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_arch', wpunity_default_value_selectortext_unity_archaeology_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_exam_pat', 'empty');
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
    }elseif($term_insterted->slug == 'credentials-arch-yaml') {
        update_term_meta($tt_id, 'wpunity_yamlmeta_wonderaround_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_mainmenu_arch', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_credentials_arch', wpunity_default_value_credits_unity_archaeology_get());
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_options_arch', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_help_arch', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_login_arch', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_reward_arch', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_arch', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector2_arch', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_s_selector_title_arch', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_chemistry_pat', 'empty');
        update_term_meta($tt_id, 'wpunity_yamlmeta_exam_pat', 'empty');
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
    }
}


/***************************************************************************************************************/
// CREATE SCENE'S YAML as CUSTOM FIELDS (term_metas) with default values (ARCHAEOLOGY GAMES)
/***************************************************************************************************************/

add_action( 'wpunity_scene_yaml_edit_form_fields', 'wpunity_scenes_taxyaml_customFields_archaeology', 10, 2 );

function wpunity_scenes_taxyaml_customFields_archaeology($tag) {

    $term_meta_wonderaround_pat = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_wonderaround_pat', true );

    $term_meta_s_mainmenu_arch = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_mainmenu_arch', true );
    $term_meta_s_credentials_arch = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_credentials_arch', true );
    $term_meta_s_options_arch = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_options_arch', true );
    $term_meta_s_help_arch = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_help_arch', true );
    $term_meta_s_login_arch = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_login_arch', true );
    $term_meta_s_reward_arch = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_reward_arch', true );
    $term_meta_s_selector_arch = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_selector_arch', true );
    $term_meta_s_selector2_arch = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_selector2_arch', true );
    $term_meta_s_selector_title_arch = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_s_selector_title_arch', true );

    ?>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>------------------------------------------------------------------------------------</h3></td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Wonder Around Scene</h3></td>
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

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Main Menu Scene</h3></td>
    </tr>

    <tr class="form-field term-s_mainmenu_arch">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_mainmenu_arch">The S_MainMenu.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_mainmenu_arch" id="wpunity_yamlmeta_s_mainmenu_arch"><?php echo $term_meta_s_mainmenu_arch ? $term_meta_s_mainmenu_arch : ''; ?></textarea>
            <p class="description">scene-main-menu-unity-pattern</p>
        </td>
    </tr>


    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Credits Scene</h3></td>
    </tr>

    <tr class="form-field term-s_credentials_arch">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_credentials_arch">The S_Credits.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_credentials_arch" id="wpunity_yamlmeta_s_credentials_arch"><?php echo $term_meta_s_credentials_arch ? $term_meta_s_credentials_arch : ''; ?></textarea>
            <p class="description">scene-credentials-unity-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Options/Settings Scene</h3></td>
    </tr>

    <tr class="form-field term-s_options_arch">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_options_arch">The S_Options.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_options_arch" id="wpunity_yamlmeta_s_options_arch"><?php echo $term_meta_s_options_arch ? $term_meta_s_options_arch : ''; ?></textarea>
            <p class="description">scene-options-unity-pattern</p>
        </td>
    </tr>


    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Help Scene</h3></td>
    </tr>

    <tr class="form-field term-s_options_arch">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_options_arch">The S_Help.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_help_arch" id="wpunity_yamlmeta_s_help_arch"><?php echo $term_meta_s_help_arch ? $term_meta_s_help_arch : ''; ?></textarea>
            <p class="description">scene-help-unity-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Login Scene</h3></td>
    </tr>

    <tr class="form-field term-s_login_arch">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_login_arch">The S_Login.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_login_arch" id="wpunity_yamlmeta_s_login_arch"><?php echo $term_meta_s_login_arch ? $term_meta_s_login_arch : ''; ?></textarea>
            <p class="description">scene-login-unity-pattern</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Reward Scene</h3></td>
    </tr>

    <tr class="form-field term-s_reward_arch">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_reward_arch">The S_Reward.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_reward_arch" id="wpunity_yamlmeta_s_reward_arch"><?php echo $term_meta_s_reward_arch ? $term_meta_s_reward_arch : ''; ?></textarea>
            <p class="description"></p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h3>Scene Selector</h3></td>
    </tr>

    <tr class="form-field term-s_selector_arch">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_selector_arch">The S_SceneSelector.unity pattern</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_selector_arch" id="wpunity_yamlmeta_s_selector_arch"><?php echo $term_meta_s_selector_arch ? $term_meta_s_selector_arch : ''; ?></textarea>
            <p class="description"></p>
        </td>
    </tr>

    <tr class="form-field term-s_selector2_arch">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_selector2_arch">The S_SceneSelector.unity pattern (each tile yaml)</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_selector2_arch" id="wpunity_yamlmeta_s_selector2_arch"><?php echo $term_meta_s_selector2_arch ? $term_meta_s_selector2_arch : ''; ?></textarea>
            <p class="description"></p>
        </td>
    </tr>

    <tr class="form-field term-s_selector_title_arch">
        <th scope="row" valign="top">
            <label for="wpunity_yamlmeta_s_selector_title_arch">The S_SceneSelector.unity pattern (TITLE)</label>
        </th>
        <td>
            <textarea name="wpunity_yamlmeta_s_selector_title_arch" id="wpunity_yamlmeta_s_selector_title_arch"><?php echo $term_meta_s_selector_title_arch ? $term_meta_s_selector_title_arch : ''; ?></textarea>
            <p class="description"></p>
        </td>
    </tr>

    <?php
}


/***************************************************************************************************************/
// SAVE SCENE'S YAML as CUSTOM FIELDS (term_metas) with default values (ARCHAEOLOGY GAMES)
/***************************************************************************************************************/

add_action( 'edited_wpunity_scene_yaml', 'wpunity_scenes_taxyaml_customFields_archaeology_save', 10, 2 );

function wpunity_scenes_taxyaml_customFields_archaeology_save( $term_id ) {

    if ( isset( $_POST['wpunity_yamlmeta_wonderaround_pat'] ) ) {
        $term_meta_wonderaround_pat = $_POST['wpunity_yamlmeta_wonderaround_pat'];
        if($term_meta_wonderaround_pat == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_wonderaround_pat', wpunity_default_value_wonderaround_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_wonderaround_pat', $term_meta_wonderaround_pat);
        }
    }


    if ( isset( $_POST['wpunity_yamlmeta_s_mainmenu_arch'] ) ) {
        $term_meta_scene_s_mainmenu = $_POST['wpunity_yamlmeta_s_mainmenu_arch'];
        if($term_meta_scene_s_mainmenu == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_mainmenu_arch', wpunity_default_value_mmenu_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_mainmenu_arch', $term_meta_scene_s_mainmenu);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_credentials_arch'] ) ) {
        $term_meta_scene_s_credentials = $_POST['wpunity_yamlmeta_s_credentials_arch'];
        if($term_meta_scene_s_credentials == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_credentials_arch', wpunity_default_value_credits_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_credentials_arch', $term_meta_scene_s_credentials);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_options_arch'] ) ) {
        $term_meta_scene_s_options = $_POST['wpunity_yamlmeta_s_options_arch'];
        if($term_meta_scene_s_options == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_options_arch', wpunity_default_value_options_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_options_arch', $term_meta_scene_s_options);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_help_arch'] ) ) {
        $term_meta_scene_s_help = $_POST['wpunity_yamlmeta_s_help_arch'];
        if($term_meta_scene_s_help == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_help_arch', wpunity_default_value_help_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_help_arch', $term_meta_scene_s_help);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_login_arch'] ) ) {
        $term_meta_scene_s_login = $_POST['wpunity_yamlmeta_s_login_arch'];
        if($term_meta_scene_s_login == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_login_arch', wpunity_default_value_login_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_login_arch', $term_meta_scene_s_login);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_reward_arch'] ) ) {
        $term_meta_scene_s_reward = $_POST['wpunity_yamlmeta_s_reward_arch'];
        if($term_meta_scene_s_reward == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_reward_arch', wpunity_default_value_reward_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_reward_arch', $term_meta_scene_s_reward);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_selector_arch'] ) ) {
        $term_meta_scene_s_selector = $_POST['wpunity_yamlmeta_s_selector_arch'];
        if($term_meta_scene_s_selector == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_arch', wpunity_default_value_selector_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_arch', $term_meta_scene_s_selector);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_selector2_arch'] ) ) {
        $term_meta_scene_s_selector2 = $_POST['wpunity_yamlmeta_s_selector2_arch'];
        if($term_meta_scene_s_selector2 == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector2_arch', wpunity_default_value_selector2_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector2_arch', $term_meta_scene_s_selector2);
        }
    }

    if ( isset( $_POST['wpunity_yamlmeta_s_selector_title_arch'] ) ) {
        $term_meta_scene_s_selector_title = $_POST['wpunity_yamlmeta_s_selector_title_arch'];
        if($term_meta_scene_s_selector_title == ''){
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_title_arch', wpunity_default_value_selectortext_unity_archaeology_get());
        }else{
            update_term_meta($term_id, 'wpunity_yamlmeta_s_selector_title_arch', $term_meta_scene_s_selector_title);
        }
    }

}


/***************************************************************************************************************/
//
/***************************************************************************************************************/
?>