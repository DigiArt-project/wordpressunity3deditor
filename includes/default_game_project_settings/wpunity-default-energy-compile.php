<?php

function wpunity_create_energy_mainmenu_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file){
    //DATA of mainmenu
    $term_meta_s_mainmenu = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_mainmenu',true);
    $title_text = $scene_post->post_title;
    $is_bt_settings_active = intval ( get_post_meta($scene_id,'wpunity_menu_has_options',true) );
    $is_help_bt_active = intval ( get_post_meta($scene_id,'wpunity_menu_has_help',true) );
    $is_login_bt_active = intval ( get_post_meta($scene_id,'wpunity_menu_has_login',true) );
    $is_exit_button_active = 1;//TODO
    $featured_image_sprite_id = get_post_thumbnail_id( $scene_id );//The Featured Image ID
    $featured_image_sprite_guid = 'dad02368a81759f4784c7dbe752b05d6';//if there's no Featured Image

    if($featured_image_sprite_id != ''){
        $featured_image_sprite_guid = wpunity_compile_sprite_upload($featured_image_sprite_id, $gameSlug, $scene_id);
    }

    $file_content = wpunity_replace_mainmenu_unity($term_meta_s_mainmenu,$title_text,$featured_image_sprite_guid,$is_bt_settings_active,$is_help_bt_active,$is_exit_button_active,$is_login_bt_active);

    $file = $game_path . '/' . 'S_MainMenu.unity';
    $create_file = fopen($file, "w") or die("Unable to open file!");
    fwrite($create_file, $file_content);
    fclose($create_file);

    $fileEditorBuildSettings = $settings_path . '/EditorBuildSettings.asset';//path of EditorBuildSettings.asset
    wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_MainMenu.unity');//Update the EditorBuildSettings.asset by adding new Scene
    $file1_path_CS = 'Assets/scenes/' . 'S_MainMenu.unity';
    wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file1_path_CS);


    //Add Static Pages to cs & BuildSettings (Main Menu must be first)
    wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Reward.unity');//Update the EditorBuildSettings.asset by adding new Scene
    $file_path_rewCS = 'Assets/scenes/' . 'S_Reward.unity';
    wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file_path_rewCS);

    wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_SceneSelector.unity');//Update the EditorBuildSettings.asset by adding new Scene
    $file_path_selCS = 'Assets/scenes/' . 'S_SceneSelector.unity';
    wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file_path_selCS);


    if($is_bt_settings_active == '1'){
        //CREATE SETTINGS/OPTIONS Unity file
        $term_meta_s_settings = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_options',true);
        $file_content2 = wpunity_replace_settings_unity($term_meta_s_settings);

        $file2 = $game_path . '/' . 'S_Settings.unity';
        $create_file2 = fopen($file2, "w") or die("Unable to open file!");
        fwrite($create_file2,$file_content2);
        fclose($create_file2);

        wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Settings.unity');//Update the EditorBuildSettings.asset by adding new Scene
        $file2_path_CS = 'Assets/scenes/' . 'S_Settings.unity';
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file2_path_CS);
    }

    if($is_help_bt_active == '1'){
        //CREATE HELP Unity file
        $term_meta_s_help = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_help',true);
        $text_help_scene = get_post_meta($scene_id,'wpunity_scene_help_text',true);
        $img_help_scene_id = get_post_meta($scene_id,'wpunity_scene_helpimg',true);
        $img_help_scene_guid = 'dad02368a81759f4784c7dbe752b05d6'; //if there's no Featured Image (custom field at Main Menu)
        if($img_help_scene_id != ''){$img_help_scene_guid = wpunity_compile_sprite_upload($img_help_scene_id,$gameSlug,$scene_id);}
        $file_content3 = wpunity_replace_help_unity($term_meta_s_help,$text_help_scene,$img_help_scene_guid);

        $file3 = $game_path . '/' . 'S_Help.unity';
        $create_file3 = fopen($file3, "w") or die("Unable to open file!");
        fwrite($create_file3, $file_content3);
        fclose($create_file3);

        wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Help.unity');//Update the EditorBuildSettings.asset by adding new Scene
        $file3_path_CS = 'Assets/scenes/' . 'S_Help.unity';
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file3_path_CS);
    }

    if($is_login_bt_active == '1'){
        //CREATE Login Unity file
        $term_meta_s_login = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_login',true);
        $file_content4 = wpunity_replace_login_unity($term_meta_s_login);

        $file4 = $game_path . '/S_Login.unity';
        $create_file4 = fopen($file4, "w") or die("Unable to open file!");
        fwrite($create_file4,$file_content4);
        fclose($create_file4);

        wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Login.unity');//Update the EditorBuildSettings.asset by adding new Scene
        $file4_path_CS = 'Assets/scenes/' . 'S_Login.unity';
        wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file4_path_CS);
    }
}

function wpunity_create_energy_credentials_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file){
    //DATA of Credits Scene
    $term_meta_s_credits = get_term_meta($scene_type_ID,'wpunity_yamlmeta_s_credentials',true);
    $credits_content = $scene_post->post_content;

    $featured_image_sprite_id = get_post_thumbnail_id( $scene_id );//The Featured Image ID
    $featured_image_sprite_guid = 'dad02368a81759f4784c7dbe752b05d6'; //if there's no Featured Image
    if($featured_image_sprite_id != ''){$featured_image_sprite_guid = wpunity_compile_sprite_upload($featured_image_sprite_id,$gameSlug,$scene_id);}
    $file_content5 = wpunity_replace_creditsscene_unity($term_meta_s_credits,$credits_content,$featured_image_sprite_guid);

    $file5 = $game_path . '/' . 'S_Credits.unity';
    $create_file5 = fopen($file5, "w") or die("Unable to open file!");
    fwrite($create_file5, $file_content5);
    fclose($create_file5);

    $fileEditorBuildSettings = $settings_path . '/EditorBuildSettings.asset';//path of EditorBuildSettings.asset
    wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,'Assets/scenes/S_Credits.unity');//Update the EditorBuildSettings.asset by adding new Scene
    $file5_path_CS = 'Assets/scenes/' . 'S_Credits.unity';
    wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file5_path_CS);
}

function wpunity_create_energy_educational_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file,$scenes_counter,$gameType){
    //DATA of Educational Energy Scene
    $term_meta_educational_energy = get_term_meta($scene_type_ID,'wpunity_yamlmeta_educational_energy',true);
    $scene_name = $scene_post->post_name;
    $scene_title = $scene_post->post_title;
    $scene_desc = $scene_post->post_content;


    $featured_image_edu_sprite_id = get_post_thumbnail_id( $scene_id );//The Featured Image ID
    $featured_image_edu_sprite_guid = 'dad02368a81759f4784c7dbe752b05d6';//if there's no Featured Image
    if($featured_image_edu_sprite_id != ''){$featured_image_edu_sprite_guid =
        wpunity_compile_sprite_upload($featured_image_edu_sprite_id, $gameSlug, $scene_id);}

    $file_content7 = wpunity_replace_educational_energy_unity($term_meta_educational_energy,$scene_id); //empty energy scene with Avatar!
    $file_content7b = wpunity_addAssets_educational_energy_unity($scene_id);//add objects from json
    $file7 = $game_path . '/' . $scene_name . '.unity';
    $create_file7 = fopen($file7, "w") or die("Unable to open file!");
    fwrite($create_file7, $file_content7);
    fwrite($create_file7,$file_content7b);
    fclose($create_file7);

//    if($scenes_counter<7) {
//        wpunity_compile_append_scene_to_s_selector($scene_id, $scene_name, $scene_title, $scene_desc,
//            $scene_type_ID, $game_path, $scenes_counter, $featured_image_edu_sprite_guid, $gameType);
//        $scenes_counter = $scenes_counter + 1;
//    }
    $scene_region = get_post_meta($scene_id,'wpunity_isRegional', true);
    if($scene_region == '1') {
        if ($scenes_counter < 7) {
            wpunity_compile_append_scene_to_s_selector($scene_id, $scene_name, $scene_title, $scene_desc,
                $scene_type_ID, $game_path, $scenes_counter, $featured_image_edu_sprite_guid, $gameType);
            $scenes_counter = $scenes_counter + 1;
        }
    }
    $fileEditorBuildSettings = $settings_path . '/EditorBuildSettings.asset';//path of EditorBuildSettings.asset
    $file7path_forCS = 'Assets/scenes/' . $scene_name . '.unity';
    wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,$file7path_forCS);//Update the EditorBuildSettings.asset by adding new Scene
    wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $file7path_forCS);
}

function wpunity_addAssets_educational_energy_unity($scene_id){
    $scene_json = get_post_meta($scene_id,'wpunity_scene_json_input',true);

    $jsonScene = htmlspecialchars_decode ( $scene_json );
    $sceneJsonARR = json_decode($jsonScene, TRUE);

    $current_fid = 51;
    $allObjectsYAML = '';
    $LF = chr(10) ;// line break

    foreach ($sceneJsonARR['objects'] as $key => $value ) {
        if ($key == 'avatarYawObject') {
            //do something about AVATAR
        }else{
            if ($value['categoryName'] == 'Terrain'){
                $terrain_id = $value['assetid'];
                $asset_type = get_the_terms( $terrain_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;

                $energy_income = get_post_meta($terrain_id,'wpunity_energyConsumptionIncome',true);
                $constr_pen = get_post_meta($terrain_id,'wpunity_constructionPenalties',true);
                $physics = get_post_meta($terrain_id,'wpunity_physicsValues',true);
                $terrain_obj = get_post_meta($terrain_id,'wpunity_asset3d_obj',true);

                $terrain_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);
                $fid_of_terrain = wpunity_create_fids($current_fid++);
                $income_when_overpower = $energy_income['over'];
                $income_when_correct_power = $energy_income['correct'];
                $income_when_under_power = $energy_income['under'];
                $mean_speed_wind = $physics['mean'];
                $var_speed_wind = $physics['variance'];
                $min_speed_wind = $physics['min'];
                $max_speed_wind = $physics['max'];
                $access_penalty = $constr_pen['access'];
                $archaeology_penalty = $constr_pen['arch'];
                $natural_reserve_penalty = $constr_pen['natural'];
                $hvdistance_penalty = $constr_pen['hiVolt'];
                $fid_rect_transform_terrain = wpunity_create_fids($current_fid++);
                $fid_terrain_prefab_mesh = wpunity_create_fids($current_fid++);
                $guid_terrain_mesh = wpunity_create_guids('obj', $terrain_obj);
                $x_pos_terrain = - $value['position'][0]; // x is in the opposite site in unity
                $y_pos_terrain = $value['position'][1];
                $z_pos_terrain = $value['position'][2];

                $quats = transform_minusx_radiansToquaternions($value['rotation'][0], $value['rotation'][1], $value['rotation'][2]);

                $x_rotation_terrain = $quats[0]; //$value['quaternion'][0];
                $y_rotation_terrain = $quats[1]; //$value['quaternion'][1];
                $z_rotation_terrain = $quats[2]; //$value['quaternion'][2];
                $w_rotation_terrain = $quats[3]; //$value['quaternion'][3];
                $x_scale_terrain = $value['scale'][0];
                $y_scale_terrain = $value['scale'][1];
                $z_scale_terrain = $value['scale'][2];

                $terrain_finalyaml = wpunity_replace_terrain_unity($terrain_yaml,$fid_of_terrain,$income_when_overpower,$income_when_correct_power,$income_when_under_power,$mean_speed_wind,$var_speed_wind,$min_speed_wind,$max_speed_wind,$access_penalty,$archaeology_penalty,$natural_reserve_penalty,$hvdistance_penalty,$fid_rect_transform_terrain,$fid_terrain_prefab_mesh,$guid_terrain_mesh,$x_pos_terrain,$y_pos_terrain,$z_pos_terrain,$x_rotation_terrain,$y_rotation_terrain,$z_rotation_terrain,$w_rotation_terrain,$x_scale_terrain,$y_scale_terrain,$z_scale_terrain);
                $allObjectsYAML = $allObjectsYAML . $LF . $terrain_finalyaml;
            }
            if ($value['categoryName'] == 'Decoration'){
                $deco_id = $value['assetid'];
                $asset_type = get_the_terms( $deco_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;
                $deco_obj = get_post_meta($deco_id,'wpunity_asset3d_obj',true);

                $deco_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);
                $fid_decorator = wpunity_create_fids($current_fid++);
                $guid_obj_decorator = wpunity_create_guids('obj', $deco_obj);
                $x_pos_decorator = - $value['position'][0]; // x is in the opposite site in unity
                $y_pos_decorator = $value['position'][1];
                $z_pos_decorator = $value['position'][2];
                $x_rotation_decorator = $value['quaternion'][0];
                $y_rotation_decorator = $value['quaternion'][1];
                $z_rotation_decorator = $value['quaternion'][2];
                $w_rotation_decorator = $value['quaternion'][3];
                $x_scale_decorator = $value['scale'][0];
                $y_scale_decorator = $value['scale'][1];
                $z_scale_decorator = $value['scale'][2];

                $deco_finalyaml = wpunity_replace_decorator_unity($deco_yaml,$fid_decorator,$guid_obj_decorator,$x_pos_decorator,$y_pos_decorator,$z_pos_decorator,$x_rotation_decorator,$y_rotation_decorator,$z_rotation_decorator,$w_rotation_decorator,$x_scale_decorator,$y_scale_decorator,$z_scale_decorator);
                $allObjectsYAML = $allObjectsYAML . $LF . $deco_finalyaml;
            }
            if ($value['categoryName'] == 'Consumer'){
                $consumer_id = $value['assetid'];
                $asset_type = get_the_terms( $consumer_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;

                $consumer_obj = get_post_meta($consumer_id,'wpunity_asset3d_obj',true);
                $consumer_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);
                $energy_consumption = get_post_meta($consumer_id,'wpunity_energyConsumption',true);

                $fid_prefab_consumer_parent = wpunity_create_fids($current_fid++);
                $x_pos_consumer = - $value['position'][0]; // x is in the opposite site in unity
                $y_pos_consumer = $value['position'][1];
                $z_pos_consumer = $value['position'][2];
                $x_rotation_consumer = $value['quaternion'][0];
                $y_rotation_consumer = $value['quaternion'][1];
                $z_rotation_consumer = $value['quaternion'][2];
                $w_rotation_consumer = $value['quaternion'][3];
                $name_consumer = get_the_title($consumer_id);
                $fid_consumer_prefab_transform = wpunity_create_fids($current_fid++);
                $fid_consumer_prefab_child = wpunity_create_fids($current_fid++);
                $guid_consumer_prefab_child_obj = wpunity_create_guids('obj', $consumer_obj);


                // REM STATHIS
                $mean_power_consumer = $energy_consumption['mean'];
                $var_power_consumer = $energy_consumption['var'];
                $min_power_consumer = $energy_consumption['min'];
                $max_power_consumer = $energy_consumption['max'];


                $consumer_finalyaml = wpunity_replace_consumer_unity($consumer_yaml,$fid_prefab_consumer_parent,$x_pos_consumer,$y_pos_consumer,
                    $z_pos_consumer,$x_rotation_consumer,$y_rotation_consumer,$z_rotation_consumer,$w_rotation_consumer,$name_consumer,$fid_consumer_prefab_transform,
                    $fid_consumer_prefab_child,$guid_consumer_prefab_child_obj,
                    $mean_power_consumer, $var_power_consumer, $min_power_consumer, $max_power_consumer);
                $allObjectsYAML = $allObjectsYAML . $LF . $consumer_finalyaml;
            }
            if ($value['categoryName'] == 'Producer'){
                $producer_id = $value['assetid'];
                $asset_type = get_the_terms( $producer_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;

                $producer_obj = get_post_meta($producer_id,'wpunity_asset3d_obj',true);
                $prod_optCosts = get_post_meta($producer_id,'wpunity_producerOptCosts',true);
                $prod_optGen = get_post_meta($producer_id,'wpunity_producerOptGen',true);
                $prod_powerVal = get_post_meta($producer_id,'wpunity_producerPowerProductionVal',true);
                $prod_powerVal = str_replace(array('[',']'), '',$prod_powerVal);//remove all [ ]
                $prod_powerVal_array = explode(',', $prod_powerVal);//create Array with values of string


                $producer_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);
                $fid_producer = wpunity_create_fids($current_fid++);
                $x_pos_producer = - $value['position'][0]; // x is in the opposite site in unity
                $y_pos_producer = $value['position'][1];
                $z_pos_producer = $value['position'][2];
                $x_rot_parent = $value['quaternion'][0];
                $y_rot_parent = $value['quaternion'][1];
                $z_rot_parent = $value['quaternion'][2];
                $w_rot_parent = $value['quaternion'][3];
                $rotor_diameter = $prod_optCosts['size'];
                $y_position_infoquad = $rotor_diameter * (1.5);
                $y_pos_quadselector = $rotor_diameter * (-0.95);
                $turbine_name_class = $prod_optGen['class'];
                $turbine_max_power = $prod_optGen['power'];
                $turbine_cost = $prod_optCosts['cost'];
                $rotor_diameter = $prod_optCosts['size'];
                $turbine_windspeed_class = $prod_optGen['speed'];
                $turbine_repair_cost = $prod_optCosts['repaid'];
                $turbine_damage_coefficient = $prod_optCosts['dmg'];
                $fid_transformation_parent_producer = wpunity_create_fids($current_fid++);
                $fid_child_producer = wpunity_create_fids($current_fid++);
                $obj_guid_producer = wpunity_create_guids('obj', $producer_obj);
                $producer_name = get_the_title($producer_id);
                $power_curve_val = $prod_powerVal_array;

                $producer_finalyaml = wpunity_replace_producer_unity($producer_yaml,$fid_producer,$x_pos_producer,$y_pos_producer,$z_pos_producer,$x_rot_parent,$y_rot_parent,$z_rot_parent,$w_rot_parent,$y_position_infoquad,$y_pos_quadselector,$turbine_name_class,$turbine_max_power,$turbine_cost,$rotor_diameter,$turbine_windspeed_class,$turbine_repair_cost,$turbine_damage_coefficient,$fid_transformation_parent_producer,$fid_child_producer,$obj_guid_producer,$producer_name,$power_curve_val);
                $allObjectsYAML = $allObjectsYAML . $LF . $producer_finalyaml;
            }
        }
    }

    //return all objects
    return $allObjectsYAML;

}

//==========================================================================================================================================
//==========================================================================================================================================

function wpunity_replace_educational_energy_unity($term_meta_educational_energy,$scene_id){

    $scene_json = get_post_meta($scene_id,'wpunity_scene_json_input',true);

    $jsonScene = htmlspecialchars_decode ( $scene_json );
    $sceneJsonARR = json_decode($jsonScene, TRUE);

    foreach ($sceneJsonARR['objects'] as $key => $value ) {
        if ($key == 'avatarYawObject') {
            $x_pos = - $value['position'][0]; // x is in the opposite site in unity
            $y_pos = $value['position'][1];
            $z_pos = $value['position'][2];
            $x_rot = $value['quaternion'][0];
            $y_rot = $value['quaternion'][1];
            $z_rot = $value['quaternion'][2];
            $w_rot = $value['quaternion'][3];
        }
    }
    $file_content_return = str_replace("___[avatar_position_x]___",$x_pos,$term_meta_educational_energy);
    $file_content_return = str_replace("___[avatar_position_y]___",$y_pos,$file_content_return);
    $file_content_return = str_replace("___[avatar_position_z]___",$z_pos,$file_content_return);
    $file_content_return = str_replace("___[avatar_rotation_x]___",$x_rot,$file_content_return);
    $file_content_return = str_replace("___[avatar_rotation_y]___",$y_rot,$file_content_return);
    $file_content_return = str_replace("___[avatar_rotation_z]___",$z_rot,$file_content_return);
    $file_content_return = str_replace("___[avatar_rotation_w]___",$w_rot,$file_content_return);
    return $file_content_return;
}

function wpunity_replace_terrain_unity($terrain_yaml,$fid_of_terrain,$income_when_overpower,$income_when_correct_power,$income_when_under_power,$mean_speed_wind,$var_speed_wind,$min_speed_wind,$max_speed_wind,$access_penalty,$archaeology_penalty,$natural_reserve_penalty,$hvdistance_penalty,$fid_rect_transform_terrain,$fid_terrain_prefab_mesh,$guid_terrain_mesh,$x_pos_terrain,$y_pos_terrain,$z_pos_terrain,$x_rotation_terrain,$y_rotation_terrain,$z_rotation_terrain,$w_rotation_terrain,$x_scale_terrain,$y_scale_terrain,$z_scale_terrain){
    $file_content_return = str_replace("___[fid_of_terrain]___",$fid_of_terrain,$terrain_yaml);
    $file_content_return = str_replace("___[income_when_overpower]___",$income_when_overpower,$file_content_return);
    $file_content_return = str_replace("___[income_when_correct_power]___",$income_when_correct_power,$file_content_return);
    $file_content_return = str_replace("___[income_when_under_power]___",$income_when_under_power,$file_content_return);
    $file_content_return = str_replace("___[mean_speed_wind]___",$mean_speed_wind,$file_content_return);
    $file_content_return = str_replace("___[var_speed_wind]___",$var_speed_wind,$file_content_return);
    $file_content_return = str_replace("___[min_speed_wind]___",$min_speed_wind,$file_content_return);
    $file_content_return = str_replace("___[max_speed_wind]___",$max_speed_wind,$file_content_return);
    $file_content_return = str_replace("___[access_penalty]___",$access_penalty,$file_content_return);
    $file_content_return = str_replace("___[archaeology_penalty]___",$archaeology_penalty,$file_content_return);
    $file_content_return = str_replace("___[natural_reserve_penalty]___",$natural_reserve_penalty,$file_content_return);
    $file_content_return = str_replace("___[hvdistance_penalty]___",$hvdistance_penalty,$file_content_return);
    $file_content_return = str_replace("___[fid_rect_transform_terrain]___",$fid_rect_transform_terrain,$file_content_return);
    $file_content_return = str_replace("___[fid_terrain_prefab_mesh]___",$fid_terrain_prefab_mesh,$file_content_return);
    $file_content_return = str_replace("___[guid_terrain_mesh]___",$guid_terrain_mesh,$file_content_return);
    $file_content_return = str_replace("___[x_pos_terrain]___",$x_pos_terrain,$file_content_return);
    $file_content_return = str_replace("___[y_pos_terrain]___",$y_pos_terrain,$file_content_return);
    $file_content_return = str_replace("___[z_pos_terrain]___",$z_pos_terrain,$file_content_return);
    $file_content_return = str_replace("___[x_rotation_terrain]___",$x_rotation_terrain,$file_content_return);
    $file_content_return = str_replace("___[y_rotation_terrain]___",$y_rotation_terrain,$file_content_return);
    $file_content_return = str_replace("___[z_rotation_terrain]___",$z_rotation_terrain,$file_content_return);
    $file_content_return = str_replace("___[w_rotation_terrain]___",$w_rotation_terrain,$file_content_return);
    $file_content_return = str_replace("___[x_scale_terrain]___",$x_scale_terrain,$file_content_return);
    $file_content_return = str_replace("___[y_scale_terrain]___",$y_scale_terrain,$file_content_return);
    $file_content_return = str_replace("___[z_scale_terrain]___",$z_scale_terrain,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_consumer_unity($consumer_yaml,$fid_prefab_consumer_parent,$x_pos_consumer,$y_pos_consumer,$z_pos_consumer,$x_rotation_consumer,$y_rotation_consumer,$z_rotation_consumer,$w_rotation_consumer,$name_consumer,$fid_consumer_prefab_transform,
                                        $fid_consumer_prefab_child,$guid_consumer_prefab_child_obj,
                                        $mean_power_consumer, $var_power_consumer, $min_power_consumer, $max_power_consumer){

    $file_content_return = str_replace("___[fid_prefab_consumer_parent]___",$fid_prefab_consumer_parent,$consumer_yaml);
    $file_content_return = str_replace("___[x_pos_consumer]___",$x_pos_consumer,$file_content_return);
    $file_content_return = str_replace("___[y_pos_consumer]___",$y_pos_consumer,$file_content_return);
    $file_content_return = str_replace("___[z_pos_consumer]___",$z_pos_consumer,$file_content_return);
    $file_content_return = str_replace("___[x_rotation_consumer]___",$x_rotation_consumer,$file_content_return);
    $file_content_return = str_replace("___[y_rotation_consumer]___",$y_rotation_consumer,$file_content_return);
    $file_content_return = str_replace("___[z_rotation_consumer]___",$z_rotation_consumer,$file_content_return);
    $file_content_return = str_replace("___[w_rotation_consumer]___",$w_rotation_consumer,$file_content_return);
    $file_content_return = str_replace("___[name_consumer]___",$name_consumer,$file_content_return);



    $file_content_return = str_replace("___[mean_power_consumer]___", $mean_power_consumer, $file_content_return);
    $file_content_return = str_replace("___[var_power_consumer]___", $var_power_consumer, $file_content_return);
    $file_content_return = str_replace("___[min_power_consumer]___", $min_power_consumer, $file_content_return);
    $file_content_return = str_replace("___[max_power_consumer]___", $max_power_consumer, $file_content_return);

    $file_content_return = str_replace("___[fid_consumer_prefab_transform]___",$fid_consumer_prefab_transform,$file_content_return);
    $file_content_return = str_replace("___[fid_consumer_prefab_child]___",$fid_consumer_prefab_child,$file_content_return);
    $file_content_return = str_replace("___[guid_consumer_prefab_child_obj]___",$guid_consumer_prefab_child_obj,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_producer_unity($producer_yaml,$fid_producer,$x_pos_producer,$y_pos_producer,$z_pos_producer,$x_rot_parent,$y_rot_parent,$z_rot_parent,$w_rot_parent,$y_position_infoquad,$y_pos_quadselector,$turbine_name_class,$turbine_max_power,$turbine_cost,$rotor_diameter,$turbine_windspeed_class,$turbine_repair_cost,$turbine_damage_coefficient,$fid_transformation_parent_producer,$fid_child_producer,$obj_guid_producer,$producer_name,$power_curve_val){

    $file_content_return = str_replace("___[fid_producer]___",$fid_producer,$producer_yaml);
    $file_content_return = str_replace("___[x_pos_producer]___",$x_pos_producer,$file_content_return);
    $file_content_return = str_replace("___[y_pos_producer]___",$y_pos_producer,$file_content_return);
    $file_content_return = str_replace("___[z_pos_producer]___",$z_pos_producer,$file_content_return);
    $file_content_return = str_replace("___[x_rot_parent]___",$x_rot_parent,$file_content_return);
    $file_content_return = str_replace("___[y_rot_parent]___",$y_rot_parent,$file_content_return);
    $file_content_return = str_replace("___[z_rot_parent]___",$z_rot_parent,$file_content_return);
    $file_content_return = str_replace("___[w_rot_parent]___",$w_rot_parent,$file_content_return);
    $file_content_return = str_replace("___[y_position_infoquad]___",$y_position_infoquad,$file_content_return);
    $file_content_return = str_replace("___[y_pos_quadselector]___",$y_pos_quadselector,$file_content_return);
    $file_content_return = str_replace("___[turbine_name_class]___",$turbine_name_class,$file_content_return);
    $file_content_return = str_replace("___[turbine_max_power]___",$turbine_max_power,$file_content_return);
    $file_content_return = str_replace("___[turbine_cost]___",$turbine_cost,$file_content_return);
    $file_content_return = str_replace("___[rotor_diameter]___",$rotor_diameter,$file_content_return);
    $file_content_return = str_replace("___[turbine_windspeed_class]___",$turbine_windspeed_class,$file_content_return);
    $file_content_return = str_replace("___[turbine_repair_cost]___",$turbine_repair_cost,$file_content_return);
    $file_content_return = str_replace("___[turbine_damage_coefficient]___",$turbine_damage_coefficient,$file_content_return);
    $file_content_return = str_replace("___[fid_transformation_parent_producer]___",$fid_transformation_parent_producer,$file_content_return);
    $file_content_return = str_replace("___[fid_child_producer]___",$fid_child_producer,$file_content_return);
    $file_content_return = str_replace("___[obj_guid_producer]___",$obj_guid_producer,$file_content_return);
    $file_content_return = str_replace("___[producer_name]___",$producer_name,$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_0]___",$power_curve_val[1],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_1]___",$power_curve_val[3],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_2]___",$power_curve_val[5],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_3]___",$power_curve_val[7],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_4]___",$power_curve_val[9],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_5]___",$power_curve_val[11],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_6]___",$power_curve_val[13],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_7]___",$power_curve_val[15],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_8]___",$power_curve_val[17],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_9]___",$power_curve_val[19],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_10]___",$power_curve_val[21],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_11]___",$power_curve_val[23],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_12]___",$power_curve_val[25],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_13]___",$power_curve_val[27],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_14]___",$power_curve_val[29],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_15]___",$power_curve_val[31],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_16]___",$power_curve_val[33],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_17]___",$power_curve_val[35],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_18]___",$power_curve_val[37],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_19]___",$power_curve_val[39],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_20]___",$power_curve_val[41],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_21]___",$power_curve_val[43],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_22]___",$power_curve_val[45],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_23]___",$power_curve_val[47],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_24]___",$power_curve_val[49],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_25]___",$power_curve_val[51],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_26]___",$power_curve_val[53],$file_content_return);
    $file_content_return = str_replace("___[power_curve_val_27]___",$power_curve_val[55],$file_content_return);

    return $file_content_return;
}

function wpunity_replace_decorator_unity($deco_yaml,$fid_decorator,$guid_obj_decorator,$x_pos_decorator,$y_pos_decorator,$z_pos_decorator,$x_rotation_decorator,$y_rotation_decorator,$z_rotation_decorator,$w_rotation_decorator,$x_scale_decorator,$y_scale_decorator,$z_scale_decorator){
    $file_content_return = str_replace("___[fid_decorator]___",$fid_decorator,$deco_yaml);
    $file_content_return = str_replace("___[guid_obj_decorator]___",$guid_obj_decorator,$file_content_return);
    $file_content_return = str_replace("___[x_pos_decorator]___",$x_pos_decorator,$file_content_return);
    $file_content_return = str_replace("___[y_pos_decorator]___",$y_pos_decorator,$file_content_return);
    $file_content_return = str_replace("___[z_pos_decorator]___",$z_pos_decorator,$file_content_return);
    $file_content_return = str_replace("___[x_rotation_decorator]___",$x_rotation_decorator,$file_content_return);
    $file_content_return = str_replace("___[y_rotation_decorator]___",$y_rotation_decorator,$file_content_return);
    $file_content_return = str_replace("___[z_rotation_decorator]___",$z_rotation_decorator,$file_content_return);
    $file_content_return = str_replace("___[w_rotation_decorator]___",$w_rotation_decorator,$file_content_return);
    $file_content_return = str_replace("___[x_scale_decorator]___",$x_scale_decorator,$file_content_return);
    $file_content_return = str_replace("___[y_scale_decorator]___",$y_scale_decorator,$file_content_return);
    $file_content_return = str_replace("___[z_scale_decorator]___",$z_scale_decorator,$file_content_return);

    return $file_content_return;
}


?>