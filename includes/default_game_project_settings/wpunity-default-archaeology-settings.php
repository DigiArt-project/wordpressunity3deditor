<?php

/***************************************************************************************************************/
// YAMLS for ASSETS' TYPES default values (ARCHAEOLOGY GAMES)
/***************************************************************************************************************/

function wpunity_getAssetYAML_archaeology($myasset_type){
    $def_json = '';

    if($myasset_type == 'artifact') {
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/assets/archaeology-artifact.txt");
    }elseif($myasset_type == 'pois_imagetext'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/assets/archaeology-pois_imagetext.txt");
    }elseif($myasset_type == 'pois_video'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/assets/archaeology-pois_video.txt");
    }elseif($myasset_type == 'site'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/assets/archaeology-site.txt");
    }elseif($myasset_type == 'door'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/assets/archaeology-door.txt");
    }elseif($myasset_type == 'decoration_arch'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/assets/archaeology-decoration_arch.txt");
    }

    return $def_json;
}


/***************************************************************************************************************/
// YAMLS for SCENES default values (ARCHAEOLOGY GAMES)
/***************************************************************************************************************/

function wpunity_getSceneYAML_archaeology($myscene_type){
    $def_json = '';

    if($myscene_type == 'menu') {
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/scenes/archaeology-menu.txt");
    }elseif($myscene_type == 'credits'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/scenes/archaeology-credits.txt");
    }elseif($myscene_type == 'help'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/scenes/archaeology-help.txt");
    }elseif($myscene_type == 'options'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/scenes/archaeology-options.txt");
    }elseif($myscene_type == 'login'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/scenes/archaeology-login.txt");
    }elseif($myscene_type == 'reward'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/scenes/archaeology-reward.txt");
    }elseif($myscene_type == 'wanderaround'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/scenes/archaeology-wanderaround.txt");
    }elseif($myscene_type == 'selector'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/scenes/archaeology-selector.txt");
    }elseif($myscene_type == 'selector2'){
        $def_json = file_get_contents(WP_PLUGIN_DIR . "/wordpressunity3deditor/includes/default_game_project_data/archaeology/scenes/archaeology-selector2.txt");
    }

    return $def_json;
}



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
    //update_term_meta($inserted_term1->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_artifact_get(), true);
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
    //update_term_meta($inserted_term2->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_poi_get(), true);
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
    //update_term_meta($inserted_term3->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_poi_video_get(), true);
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
    //update_term_meta($inserted_term4->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_site_get(), true);
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
    //update_term_meta($inserted_term5->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_door_get(), true);
    update_term_meta($inserted_term5->term_id, 'wpunity_assetcat_gamecat', 1 , true);

    wp_insert_term(
        'Decoration (Archaeology)', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'A Decoration (for Archaeology Games) is a game object that can improve the immersiveness such as Archaeological site, Power lines, Trees, etc.',
            'slug' => 'decoration_arch',
        )
    );
    $inserted_term6 = get_term_by('slug', 'decoration_arch', 'wpunity_asset3d_cat');
    //update_term_meta($inserted_term6->term_id, 'wpunity_yamlmeta_assetcat_pat', wpunity_default_value_decoration_arch_get(), true);
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

//    $inserted_term = get_term_by('slug', 'archaeology_games', 'wpunity_game_type');
//
//    update_term_meta($inserted_term->term_id, 'wpunity_audio_manager_term', wpunity_default_value_AudioManager_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_cluster_input_manager_term', wpunity_default_value_ClusterInputManager_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_dynamics_manager_term', wpunity_default_value_DynamicsManager_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_editor_build_settings_term', wpunity_default_value_EditorBuildSettings_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_editor_settings_term', wpunity_default_value_EditorSettings_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_graphics_settings_term', wpunity_default_value_GraphicsSettings_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_input_manager_term', wpunity_default_value_InputManager_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_nav_mesh_areas_term', wpunity_default_value_NavMeshAreas_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_network_manager_term', wpunity_default_value_NetworkManager_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_physics2d_settings_term', wpunity_default_value_Physics2DSettings_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_project_settings_term', wpunity_default_value_ProjectSettings_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_project_version_term', wpunity_default_value_ProjectVersion_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_quality_settings_term', wpunity_default_value_QualitySettings_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_tag_manager_term', wpunity_default_value_TagManager_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_time_manager_term', wpunity_default_value_TimeManager_arch_get(), true);
//    update_term_meta($inserted_term->term_id, 'wpunity_unity_connect_settings_term', wpunity_default_value_unityConnect_arch_get(), true);

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

/***************************************************************************************************************/
//
/***************************************************************************************************************/
?>