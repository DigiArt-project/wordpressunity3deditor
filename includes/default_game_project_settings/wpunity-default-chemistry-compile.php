<?php

function wpunity_create_chemistry_mainmenu_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file){}

function wpunity_create_chemistry_credentials_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file){}

function wpunity_create_chemistry_lab_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file,$scenes_counter,$gameType){
    //DATA of Chemistry Wander Around Scene
    $term_meta_wander_around_chem = get_term_meta($scene_type_ID,'wpunity_yamlmeta_chemistry_pat',true);
    $scene_name = $scene_post->post_name;
    $scene_title = $scene_post->post_title;
    $scene_desc = $scene_post->post_content;

    $featured_image_edu_sprite_id = get_post_thumbnail_id( $scene_id );//The Featured Image ID
    $featured_image_edu_sprite_guid = 'dad02368a81759f4784c7dbe752b05d6';//if there's no Featured Image
    if($featured_image_edu_sprite_id != ''){$featured_image_edu_sprite_guid = wpunity_compile_sprite_upload($featured_image_edu_sprite_id,$gameSlug,$scene_id);}


    $file_contentA = wpunity_replace_chemistry_lab_unity($term_meta_wander_around_chem,$scene_id); //empty energy scene with Avatar!
    $file_contentAb = wpunity_addAssets_chemistry_lab_unity($scene_id);//add objects from json
    $fileA = $game_path . '/' . $scene_name . '.unity';
    $create_fileA = fopen($fileA, "w") or die("Unable to open file!");
    fwrite($create_fileA, $file_contentA);
    fwrite($create_fileA,$file_contentAb);
    fclose($create_fileA);

    wpunity_compile_append_scene_to_s_selector($scene_id, $scene_name, $scene_title, $scene_desc, $scene_type_ID,
        $game_path, $scenes_counter, $featured_image_edu_sprite_guid, $gameType);

    $fileEditorBuildSettings = $settings_path . '/EditorBuildSettings.asset';//path of EditorBuildSettings.asset
    $fileApath_forCS = 'Assets/scenes/' . $scene_name . '.unity';
    wpunity_append_scenes_in_EditorBuildSettings_dot_asset($fileEditorBuildSettings,$fileApath_forCS);//Update the EditorBuildSettings.asset by adding new Scene
    wpunity_add_in_HandyBuilder_cs($handybuilder_file, null, $fileApath_forCS);

}

function wpunity_addAssets_chemistry_lab_unity($scene_id){
    $scene_json = get_post_meta($scene_id,'wpunity_scene_json_input',true);

    $jsonScene = htmlspecialchars_decode ( $scene_json );
    $sceneJsonARR = json_decode($jsonScene, TRUE);

    $current_fid = 51;
    $allObjectsYAML = '';
    $LF = chr(10) ;// line break

    foreach ($sceneJsonARR['objects'] as $key => $value ) {
        if ($key == 'avatarYawObject') {
            //do something about AVATAR
        } else {
            if ($value['categoryName'] == 'Room') {

                $room_id = $value['assetid'];
                $asset_type = get_the_terms( $room_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;

                $room_obj = get_post_meta($room_id,'wpunity_asset3d_obj',true);

                $room_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);
                $room_fid = wpunity_create_fids($current_fid++);
                $room_mesh_fid = wpunity_create_fids($current_fid++); //($room_fid+1)
                $room_mesh_collider_fid = wpunity_create_fids($current_fid++); // ($room_fid+2)
                $room_obj_guid =  wpunity_create_guids('obj', $room_obj);
                $room_position_x = - $value['position'][0]; // x is in the opposite site in unity
                $room_position_y = $value['position'][1];
                $room_position_z = $value['position'][2];
                $room_rotation_x = $value['quaternion'][0];
                $room_rotation_y = $value['quaternion'][1];
                $room_rotation_z = $value['quaternion'][2];
                $room_rotation_w = $value['quaternion'][3];
                $room_scale_x = $value['scale'][0];
                $room_scale_y = $value['scale'][1];
                $room_scale_z = $value['scale'][2];
                $room_title = get_the_title($room_id);

                $room_finalyaml = wpunity_replace_room_unity($room_yaml,$room_fid,$room_mesh_fid,$room_mesh_collider_fid,$room_obj_guid,$room_position_x,$room_position_y,$room_position_z,$room_rotation_x,$room_rotation_y,$room_rotation_z,$room_rotation_w,$room_scale_x,$room_scale_y,$room_scale_z,$room_title);
                $allObjectsYAML = $allObjectsYAML . $LF . $room_finalyaml;
            }

            if ($value['categoryName'] == 'Gate') {

                $gate_id = $value['assetid'];
                $asset_type = get_the_terms( $gate_id, 'wpunity_asset3d_cat' );
                $asset_type_ID = $asset_type[0]->term_id;

                $gate_obj = get_post_meta($gate_id,'wpunity_asset3d_obj',true);

                $gate_yaml = get_term_meta($asset_type_ID,'wpunity_yamlmeta_assetcat_pat',true);
                $gate_fid = wpunity_create_fids($current_fid++);
                $gate_mesh_fid = wpunity_create_fids($current_fid++);//($gate_fid+1)
                $gate_mesh_collider_fid = wpunity_create_fids($current_fid++);//($gate_fid+2)
                $gate_obj_guid = wpunity_create_guids('obj', $gate_obj);
                $gate_position_x = - $value['position'][0]; // x is in the opposite site in unity
                $gate_position_y = $value['position'][1];
                $gate_position_z = $value['position'][2];
                $gate_rotation_x = $value['quaternion'][0];
                $gate_rotation_y = $value['quaternion'][1];
                $gate_rotation_z = $value['quaternion'][2];
                $gate_rotation_w = $value['quaternion'][3];
                $gate_scale_x = $value['scale'][0];
                $gate_scale_y = $value['scale'][1];
                $gate_scale_z = $value['scale'][2];
                $moleculeNamingScene_fid = $value['sceneName_target'];

                $gate_finalyaml = wpunity_replace_gate_unity($gate_yaml,$gate_fid,$gate_mesh_fid,$gate_mesh_collider_fid,$gate_obj_guid,$gate_position_x,$gate_position_y,$gate_position_z,$gate_rotation_x,$gate_rotation_y,$gate_rotation_z,$gate_rotation_w,$gate_scale_x,$gate_scale_y,$gate_scale_z,$moleculeNamingScene_fid);
                $allObjectsYAML = $allObjectsYAML . $LF . $gate_finalyaml;
            }
        }
    }

    //return all objects
    return $allObjectsYAML;
}


//==========================================================================================================================================
//==========================================================================================================================================


function wpunity_replace_chemistry_lab_unity($term_meta_wander_around_chem,$scene_id){

    $scene_json = get_post_meta($scene_id,'wpunity_scene_json_input',true);

    $jsonScene = htmlspecialchars_decode ( $scene_json );
    $sceneJsonARR = json_decode($jsonScene, TRUE);

    foreach ($sceneJsonARR['objects'] as $key => $value ) {
        if ($key == 'avatarYawObject') {
            $x_pos = - $value['position'][0]; // x is in the opposite site in unity
            $y_pos = $value['position'][1];
            $z_pos = $value['position'][2];
            $x_player_rot = $value['quaternion_player'][0];
            $y_player_rot = $value['quaternion_player'][1];
            $z_player_rot = $value['quaternion_player'][2];
            $w_player_rot = $value['quaternion_player'][3];
        }
    }
    $file_content_return = str_replace("___[player_position_x]___",$x_pos,$term_meta_wander_around_chem);
    $file_content_return = str_replace("___[player_position_y]___",$y_pos,$file_content_return);
    $file_content_return = str_replace("___[player_position_z]___",$z_pos,$file_content_return);

    $file_content_return = str_replace("___[player_rotation_x]___",$x_player_rot,$file_content_return);
    $file_content_return = str_replace("___[player_rotation_y]___",$y_player_rot,$file_content_return);
    $file_content_return = str_replace("___[player_rotation_z]___",$z_player_rot,$file_content_return);
    $file_content_return = str_replace("___[player_rotation_w]___",$w_player_rot,$file_content_return);

    return $file_content_return;

}

function wpunity_replace_room_unity($room_yaml,$room_fid,$room_mesh_fid,$room_mesh_collider_fid,$room_obj_guid,$room_position_x,$room_position_y,$room_position_z,$room_rotation_x,$room_rotation_y,$room_rotation_z,$room_rotation_w,$room_scale_x,$room_scale_y,$room_scale_z,$room_title){
    $file_content_return = str_replace("___[room_fid]___",$room_fid,$room_yaml);
    $file_content_return = str_replace("___[room_mesh_fid]___",$room_mesh_fid,$file_content_return);
    $file_content_return = str_replace("___[room_mesh_collider_fid]___",$room_mesh_collider_fid,$file_content_return);
    $file_content_return = str_replace("___[room_obj_guid]___",$room_obj_guid,$file_content_return);
    $file_content_return = str_replace("___[room_position_x]___",$room_position_x,$file_content_return);
    $file_content_return = str_replace("___[room_position_y]___",$room_position_y,$file_content_return);
    $file_content_return = str_replace("___[room_position_z]___",$room_position_z,$file_content_return);
    $file_content_return = str_replace("___[room_rotation_x]___",$room_rotation_x,$file_content_return);
    $file_content_return = str_replace("___[room_rotation_y]___",$room_rotation_y,$file_content_return);
    $file_content_return = str_replace("___[room_rotation_z]___",$room_rotation_z,$file_content_return);
    $file_content_return = str_replace("___[room_rotation_w]___",$room_rotation_w,$file_content_return);
    $file_content_return = str_replace("___[room_scale_x]___",$room_scale_x,$file_content_return);
    $file_content_return = str_replace("___[room_scale_y]___",$room_scale_y,$file_content_return);
    $file_content_return = str_replace("___[room_scale_z]___",$room_scale_z,$file_content_return);
    $file_content_return = str_replace("___[room_title]___",$room_title,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_gate_unity($gate_yaml,$gate_fid,$gate_mesh_fid,$gate_mesh_collider_fid,$gate_obj_guid,$gate_position_x,$gate_position_y,$gate_position_z,$gate_rotation_x,$gate_rotation_y,$gate_rotation_z,$gate_rotation_w,$gate_scale_x,$gate_scale_y,$gate_scale_z,$moleculeNamingScene_fid){
    $file_content_return = str_replace("___[gate_fid]___",$gate_fid,$gate_yaml);
    $file_content_return = str_replace("___[gate_mesh_fid]___",$gate_mesh_fid,$file_content_return);
    $file_content_return = str_replace("___[gate_mesh_collider_fid]___",$gate_mesh_collider_fid,$file_content_return);
    $file_content_return = str_replace("___[gate_obj_guid]___",$gate_obj_guid,$file_content_return);
    $file_content_return = str_replace("___[gate_position_x]___",$gate_position_x,$file_content_return);
    $file_content_return = str_replace("___[gate_position_y]___",$gate_position_y,$file_content_return);
    $file_content_return = str_replace("___[gate_position_z]___",$gate_position_z,$file_content_return);
    $file_content_return = str_replace("___[gate_rotation_x]___",$gate_rotation_x,$file_content_return);
    $file_content_return = str_replace("___[gate_rotation_y]___",$gate_rotation_y,$file_content_return);
    $file_content_return = str_replace("___[gate_rotation_z]___",$gate_rotation_z,$file_content_return);
    $file_content_return = str_replace("___[gate_rotation_w]___",$gate_rotation_w,$file_content_return);
    $file_content_return = str_replace("___[gate_scale_x]___",$gate_scale_x,$file_content_return);
    $file_content_return = str_replace("___[gate_scale_y]___",$gate_scale_y,$file_content_return);
    $file_content_return = str_replace("___[gate_scale_z]___",$gate_scale_z,$file_content_return);
    $file_content_return = str_replace("___[moleculeNamingScene_fid]___",$moleculeNamingScene_fid,$file_content_return);

    return $file_content_return;

}

function wpunity_replace_molecule_unity(){}

?>