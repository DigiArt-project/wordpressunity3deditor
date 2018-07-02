<?php

/***************************************************************************************************************/
// YAMLS for ASSETS' TYPES default values (CHEMISTRY GAMES)
/***************************************************************************************************************/


global $ini_asset_room,$ini_asset_gate,$ini_asset_molecule;

$ini_asset_room = array('');

$ini_asset_gate = array('');

$ini_asset_molecule = array('');

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
$AudioManager_asset3 = array('');

//2. ClusterInputManager.asset
$ClusterInputManager_asset3 = array('');

//3. DynamicsManager.asset
$DynamicsManager_asset3 = array('');

//4. EditorBuildSettings.asset
$EditorBuildSettings_asset3 = array('');

//5. EditorSettings.asset
$EditorSettings_asset3 = array('');

//6. GraphicsSettings.asset
$GraphicsSettings_asset3 = array('');

//7. InputManager.asset
$InputManager_asset3 = array('');

//8. NavMeshAreas.asset
$NavMeshAreas_asset3 = array('');

//9. NetworkManager.asset
$NetworkManager_asset3 = array('');

//10. Physics2DSettings.asset
$Physics2DSettings_asset3 = array('');

//11. ProjectSettings.asset
$ProjectSettings_asset3 = array('');

//12. ProjectVersion.asset
$ProjectVersion_asset3 = array('');

//13. QualitySettings.asset
$QualitySettings_asset3 = array('');

//14. TagManager.asset
$TagManager_asset3 = array('');

//15. TimeManager.asset
$TimeManager_asset3 = array('');

//16. UnityConnect.asset
$UnityConnect_asset3 = array('');

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

$ini_scene_chemistry_unity_pattern = array('');

$ini_scene_main_menu_chem_unity_pattern = array('');

$ini_scene_credits_chem_unity_pattern = array('');

$ini_scene_options_chem_unity_pattern = array('');

$ini_scene_help_chem_unity_pattern = array('');

$ini_scene_login_chem_unity_pattern = array('');

$ini_scene_reward_chem_unity_pattern = array('');

$ini_scene_selector_chem_unity_pattern = array('');

$ini_scene_selector_chem_unity_pattern2 = array('');

$ini_scene_selector_chem_text = '';

$ini_scene_chem_exam = array('');

$ini_scene_chem_exam3d = array('');

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
// CREATE SCENE TYPES (CHEMISTRY GAMES)
/***************************************************************************************************************/


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

?>