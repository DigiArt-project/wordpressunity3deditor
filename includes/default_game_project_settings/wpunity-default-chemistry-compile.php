<?php

function wpunity_create_chemistry_mainmenu_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file){}

function wpunity_create_chemistry_credentials_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file){}

function wpunity_create_chemistry_lab_unity($scene_post,$scene_type_ID,$scene_id,$gameSlug,$game_path,$settings_path,$handybuilder_file,$scenes_counter,$gameType){}

function wpunity_addAssets_chemistry_lab_unity($scene_id){}


//==========================================================================================================================================
//==========================================================================================================================================


function wpunity_replace_chemistry_lab_unity($term_meta_educational_energy,$scene_id){}

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

function wpunity_replace_gate_unity(){}

function wpunity_replace_molecule_unity(){}

?>