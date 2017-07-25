<?php

function wpunity_create_default_scenes_for_game($gameSlug,$gameTitle,$gameID){

    $allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
    $allScenePGameID = $allScenePGame->term_id;

    $all_game_category = get_the_terms( $gameID, 'wpunity_game_type' );
    $game_category  = $all_game_category[0]->slug;

    $mainmenuSceneTitle = 'Main Menu'; //Title for Main Menu
    $mainmenuSceneSlug = $gameSlug . '-main-menu' ; //Slug for Main Menu
    $firstSceneTitle = 'First Scene'; //Title for First Menu
    $firstSceneSlug = $gameSlug . '-first-scene'; //Slug for First Menu
    $credentialsSceneTitle = 'Credits'; //Title for Credentials Menu
    $credentialsSceneSlug = $gameSlug . '-credits-scene'; //Slug for Credentials Menu

    $mainmenuSceneYAML = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Main Menu
    $mainmenuSceneYAMLID = $mainmenuSceneYAML->term_id;
    $credentialsSceneYAML = get_term_by('slug', 'credentials-yaml', 'wpunity_scene_yaml'); //Yaml Tax for Credentials Scene
    $credentialsSceneYAMLID = $credentialsSceneYAML->term_id;
    if($game_category == 'energy_games'){
        $firstSceneYAML = get_term_by('slug', 'educational-energy', 'wpunity_scene_yaml'); //Yaml Tax for First Scene
        $firstSceneYAMLID = $firstSceneYAML->term_id;
    }elseif($game_category == 'archaeology_games'){
        $firstSceneYAML = get_term_by('slug', 'wonderaround-yaml', 'wpunity_scene_yaml'); //Yaml Tax for First Scene
        $firstSceneYAMLID = $firstSceneYAML->term_id;
    }

    // Create Main Menu Scene Data
    $mainmenuSceneData = array(
        'post_title'    => $mainmenuSceneTitle,
        'post_name' => $mainmenuSceneSlug,
        'post_type' => 'wpunity_scene',
        'post_status'   => 'publish',
        'tax_input'    => array(
            'wpunity_scene_pgame'     => array( $allScenePGameID ),
            'wpunity_scene_yaml'     => array( $mainmenuSceneYAMLID ),
        ),'meta_input'   => array(
            'wpunity_scene_default' => 1,
            'wpunity_scene_metatype' => 'menu',
            'wpunity_menu_has_help' => 1,
            'wpunity_menu_has_login' => 1,
            'wpunity_menu_has_options' => 1,
        ),
    );

    // Create First Scene Data
    $firstSceneData = array(
        'post_title'    => $firstSceneTitle,
        'post_name' => $firstSceneSlug,
        'post_type' => 'wpunity_scene',
        'post_status'   => 'publish',
        'tax_input'    => array(
            'wpunity_scene_pgame'     => array( $allScenePGameID ),
            'wpunity_scene_yaml'     => array( $firstSceneYAMLID ),
        ),'meta_input'   => array(
            'wpunity_scene_default' => 1,
            'wpunity_scene_metatype' => 'scene',
        ),
    );

    // Create Credentials Scene Data
    $credentialsSceneData = array(
        'post_title'    => $credentialsSceneTitle,
        'post_name' => $credentialsSceneSlug,
        'post_type' => 'wpunity_scene',
        'post_status'   => 'publish',
        'tax_input'    => array(
            'wpunity_scene_pgame'     => array( $allScenePGameID ),
            'wpunity_scene_yaml'     => array( $credentialsSceneYAMLID ),
        ),'meta_input'   => array(
            'wpunity_scene_default' => 1,
            'wpunity_scene_metatype' => 'credits',
        ),
    );

    // Insert posts 1-1 into the database
    wp_insert_post( $mainmenuSceneData );
    wp_insert_post( $credentialsSceneData );
    wp_insert_post( $firstSceneData );

}

function wpunity_replace_unityfile_withAssets( $yamlID, $sceneID, $jsonScene ){

    return wpunity_jsonArr_to_unity($yamlID, $jsonScene);
}

function wpunity_replace_unityfile_noAssets($yamlID, $sceneID){

    $jsonScene = '{"objects" : { "avatarYawObject" : { "position" : [0,0,0], "rotation" : [0,0,0]}}}';

    return wpunity_jsonArr_to_unity($yamlID, $jsonScene);
}



function wpunity_replace_unityMetafile_withAssets( $sceneID,$unityMetaPattern ){
    $unix_time = time();
    $guid_id = wpunity_create_guids('unity',$sceneID);

    $file_content_return = str_replace("___[scene_unity_guid]___",$guid_id,$unityMetaPattern);
    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

    return $file_content_return;
}

//==========================================================================================================================================

// 32 chars Hex (identifier for the resource)
function wpunity_create_guids($objTypeSTR, $objID, $extra_id_material=null){

    switch ($objTypeSTR) {
        case 'unity':  $objType = "1"; break;
        case 'folder': $objType = "2"; break;
        case 'obj': $objType = "3"; break;
        case 'mat': $objType = "4".$extra_id_material; break; // an obj can have two or more mat
        case 'jpg': $objType = "5".$extra_id_material; break; // an obj can have multiple textures jpg
    }

    return str_pad($objType, 4, "0", STR_PAD_LEFT) . str_pad($objID, 28, "0", STR_PAD_LEFT);
}



// 10 chars Decimal (identifier for the GameObject) (e.g. dino1, dino2 have different fid but share the same guid)
function wpunity_create_fids($id){
    return str_pad($id, 10, "0", STR_PAD_LEFT);
}


function wpunity_replace_foldermeta($file_content,$folderID){
    $unix_time = time();
    $guid_id = wpunity_create_guids('folder',$folderID);

    $file_content_return = str_replace("___[folder_guid]___",$guid_id,$file_content);
    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_objmeta($file_content,$objID){
    $unix_time = time();
    $guid_id = wpunity_create_guids('obj',$objID);

    $file_content_return = str_replace("___[obj_guid]___",$guid_id,$file_content);
    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

    return $file_content_return;
}

function wpunity_replace_jpgmeta($file_content,$objID){
    $unix_time = time();
    $guid_id = wpunity_create_guids('jpg',$objID);

    $file_content_return = str_replace("___[jpg_guid]___",$guid_id,$file_content);
    $file_content_return = str_replace("___[unx_time_created]___",$unix_time,$file_content_return);

    return $file_content_return;
}



//==========================================================================================================================================
function wpunity_jsonArr_to_unity($wonderaroundYaml, $jsonScene){
    $jsonScene = htmlspecialchars_decode ( $jsonScene );

    $sceneJsonARR = json_decode($jsonScene, TRUE);
    $tempFirstPersonPart = $wonderaroundYaml;
//    $templatePart_sop = wpunity_getYaml_static_object_pattern($yamlID);
//    $templatePart_poipt = wpunity_getYaml_poi_imagetext_pattern($yamlID);
    $templatePart_sop = '';
    $templatePart_poipt = '';

    $unity_file_contents = "";

    $curr_fid = 31;

    //if ($sceneJsonARR['objects']) {}
    foreach ($sceneJsonARR['objects'] as $key => $value ) {



        if ($key == 'avatarYawObject') {

            // Change avatar position and rotation
            $tempFirstPersonPart = str_replace([  // 1. s1 init first : Player, DirectionalLight, camera2, camera2Anchor, scene1Manager
                '___[wa_player_prefab_fid]___',
                '___[wa_player_position_x]___',
                '___[wa_player_position_y]___',
                '___[wa_player_position_z]___',
                '___[wa_player_rotation_x]___',
                '___[wa_player_rotation_y]___',
                '___[wa_player_rotation_z]___',
                '___[wa_player_rotation_w]___',
                '___[wa_player_camera_fid]___',
                '___[wa_scene_manager_fid]___',  //1
                '___[wa_scene_manager_transform_fid]___',
                '___[wa_scene_manager_script_fid]___',
                '___[wa_camera2_fid]___',
                '___[wa_camera2_transform_fid]___', //5
                '___[wa_camera2_camera_fid]___',
                '___[wa_camera2_behaviour_fid]___',
                '___[wa_camera2_behaviour2_fid]___',
                '___[wa_camera2_audiolistener_fid]___',
                '___[wa_camera2_children_transform_fid]___', //10
                '___[wa_light_fid]___',
                '___[wa_light_transform_fid]___',
                '___[wa_light_light_fid]___',
                '___[wa_camera2anchor_fid]___',
                '___[wa_camera2_children_transform_fid]___'],
                [
                    $curr_fid++,
                   - $value['position'][0],
                    $value['position'][1],
                    $value['position'][2],
                    $value['quaternion'][0],
                    $value['quaternion'][1],
                    $value['quaternion'][2],
                    $value['quaternion'][3],
                    $curr_fid++,
                    $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++,
                    $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++,
                    $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++
                ],
                $tempFirstPersonPart);


            $tempFirstPersonPart = str_replace([
                '___[wa_exitBt_fid]___', // 2. s1 canvas related: sCanvas, EventSystem
                '___[wa_exitBt_recttrans_fid]___',
                '___[wa_exitBt_canvrenderer_fid]___',
                '___[wa_exitBt_monobehaviour1_fid]___',
                '___[wa_exitBt_monobehaviour2_fid]___', //5
                '___[wa_exitBt_recttrans_child_fid]___',
                '___[wa_exitBt_recttrans_father_fid]___',
                '___[wa_exitBtText_fid]___',
                '___[wa_exitBtText_canvasrenderer_fid]___',
                '___[wa_exitBtText_monobehaviour_fid]___', // 10
                '___[wa_scenecanvas_fid]___',
                '___[wa_scenecanvas_canvas_fid]___',
                '___[wa_scenecanvas_monob1_fid]___',
                '___[wa_scenecanvas_monob2_fid]___',
                '___[wa_eventsys_fid]___', // 15
                '___[wa_eventsys_transform_fid]___',
                '___[wa_eventsys_monob1_fid]___',
                '___[wa_eventsys_monob2_fid]___'],
                [$curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++,
                    $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++,
                    $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++,
                    $curr_fid++, $curr_fid++, $curr_fid++
                ],
                $tempFirstPersonPart);


            $tempFirstPersonPart = str_replace(
                ['___[wa_ovrplayer_prefab_fid]___',             // 3. Ovr related
                    '___[wa_ovrplayer_fid]___',
                    '___[wa_ovrplayer_position_x]___',
                    '___[wa_ovrplayer_position_y]___',
                    '___[wa_ovrplayer_position_z]___',
                    '___[wa_ovrplayer_rotation_x]___',
                    '___[wa_ovrplayer_rotation_y]___',
                    '___[wa_ovrplayer_rotation_z]___',
                    '___[wa_ovrplayer_rotation_w]___',
                    '___[wa_ovrplayer_lefteyeanchor_fid]___',
                    '___[wa_ovrplayer_righteyeanchor_fid]___',
                    '___[wa_ovrplayer_rigidbody_fid]___',
                    '___[wa_ovrplayer_leftcamera_fid]___',
                    '___[wa_ovrplayer_rightcamera_fid]___',
                ],
                [$curr_fid++, $curr_fid++,
                  -  $value['position'][0],
                    $value['position'][1],
                    $value['position'][2],
                    $value['quaternion'][0],
                    $value['quaternion'][1],
                    $value['quaternion'][2],
                    $value['quaternion'][3],
                    $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++],
                $tempFirstPersonPart);


            $unity_file_contents .= $tempFirstPersonPart;

        } else {

            if ($value['categoryName'] == 'Static 3D models'){

                $unity_file_contents .= str_replace(
                    [
                        "___[sop_name]___",
                        "___[sop_fid]___",           // +1
                        "___[sop_prefab_fid]___",     // +1
                        "___[sop_meshcol_fid]___",   // +1
                        "___[sop_guid]___",          // from obj meta
                        "___[sop_material_guid]___", // from mat meta
                        "___[sop_pos_x]___",
                        "___[sop_pos_y]___",
                        "___[sop_pos_z]___",
                        "___[sop_rot_x]___",
                        "___[sop_rot_y]___",
                        "___[sop_rot_z]___",
                        "___[sop_rot_w]___",
                        "___[sop_scale_x]___",
                        "___[sop_scale_y]___",
                        "___[sop_scale_z]___"],
                    [
                        $key,
                        $curr_fid++,
                        $curr_fid++,
                        $curr_fid++,
                        wpunity_create_guids('obj', $value['fnObjID']),
                        wpunity_create_guids('mat', $value['fnMtlID']), // ToDO: here we need the fnMatID // ToDO: We need to support multiple mat
                        // position
                       - $value['position'][0], $value['position'][1], $value['position'][2],
                        // rotation
                        $value['quaternion'][0],
                        $value['quaternion'][1],
                        $value['quaternion'][2],
                        $value['quaternion'][3],
                        // scale
                        $value['scale'][0]   , $value['scale'][1]   , $value['scale'][2]
                    ]
                    , $templatePart_sop);

            } else if ($value['categoryName'] == 'Points of Interest (Image-Text)'){


                $my_postid       = $value['assetid']; //This is page id or post id
                $content_post    = get_post($my_postid);
                $textcontent     = $content_post->post_content;

                // Unity wants two line breaks to break one and
                // Unity wants three line breaks to break twice: Weird isn't it?
                $textcontent = str_replace(PHP_EOL.PHP_EOL, 'linebreak2to3   ', $textcontent);
                $textcontent = str_replace(PHP_EOL, 'linebreak1to2    ', $textcontent);

                $textcontent = str_replace('linebreak1to2', PHP_EOL.PHP_EOL, $textcontent);
                $textcontent = str_replace('linebreak2to3', PHP_EOL.PHP_EOL.PHP_EOL, $textcontent);

                //$textcontent = str_replace(PHP_EOL.'    '.PHP_EOL, PHP_EOL.PHP_EOL.PHP_EOL, $textcontent);
                $textcontent = "'" . $textcontent . "'";

//                $textcontent     = apply_filters('the_content', $textcontent    );
//                $textcontent     = str_replace(']]>', ']]&gt;', $textcontent    );


                $sprite_guid =  wpunity_create_guids('jpg', $value['image1id']); //"00500000000000000000000000000513";



                $poi_prefab_guid = wpunity_create_guids('obj', $value['fnObjID']);     // "00300000000000000000000000000511";




                $poit = str_replace( [
                    '___[poit_text_container_fid]___',
                    '___[poit_text_container_recttrans_fid]___',
                    '___[poit_text_container_canvrender_fid]___',
                    '___[poit_text_container_monob_fid]___', //4
                    '___[poit_text_container_name]___',  // e.g. android_121TextContainer
                    '___[poit_text_container_recttrans_father_fid]___',
                    '___[poit_text_container_content]___',
                    '___[poit_closeBt_fid]___',
                    '___[poit_closeBt_recttrans_fid]___',
                    '___[poit_closeBt_canvrender_fid]___',
                    '___[poit_closeBt_monob_fid]___',
                    '___[poit_closeBt_monob2_fid]___', //5
                    '___[poit_closeBt_name]___', // e.g. android_121CloseBt
                    '___[poit_closeBt_recttrans_father_fid]___',
                    '___[poit_closeBt_recttrans_child_fid]___',
                    '___[poit_closeBt_monob3_fid]___',
                    '___[poit_closeBtText_fid]___',
                    '___[poit_closeBtText_canvrender_fid]___',
                    '___[poit_closeBtText_monob_fid]___', //6
                    '___[poit_closeBtText_name]___', //e.g. android_121CloseBtText
                    '___[poit_closeBtText_content]___'], //e.g. Close;
                    [$curr_fid++,$curr_fid++,$curr_fid++,$curr_fid++,
                        $key.'TextContainer',
                        $curr_fid++,
                        $textcontent,
                        $curr_fid++,$curr_fid++,$curr_fid++,$curr_fid++,$curr_fid++,
                        $key.'CloseBt',
                        $curr_fid++, $curr_fid++,$curr_fid++,$curr_fid++,$curr_fid++,$curr_fid++,
                        $key.'CloseBtText',
                        'Close'
                    ],
                    $templatePart_poipt);


                $poit = str_replace( [
                    '___[poit_canvas_fid]___',
                    '___[poit_canvas_canvas_fid]___',
                    '___[poit_canvas_monob_fid]___',
                    '___[poit_canvas_monob2_fid]___',
                    '___[poit_canvas_name]___', // e.g. android_121Canvas
                    '___[poit_closeBt_recttrans_father_father_fid]___',
                    '___[poit_prefab_fid]___',
                    '___[poit_position_x]___',
                    '___[poit_position_y]___',
                    '___[poit_position_z]___',
                    '___[poit_rotation_x]___',
                    '___[poit_rotation_y]___',
                    '___[poit_rotation_z]___',
                    '___[poit_rotation_w]___',
                    '___[poit_scale_x]___',
                    '___[poit_scale_y]___',
                    '___[poit_scale_z]___',
                    '___[poit_prefab_name]___', // e.g. android_121
                    '___[poit_fid]___',
                    '___[poit_prefab_guid]___',
                    '___[poit_prefab_boxcol_fid]___',
                    '___[poit_prefab_boxcol_boxcol_fid]___',
                    '___[poit_imagecont_fid]___',
                    '___[poit_imagecont_recttrans_fid]___',
                    '___[poit_imagecont_canvasrend_fid]___',
                    '___[poit_imagecont_monob_fid]___', //7
                    '___[poit_imagecont_name]___', //android_121ImageContainer
                    '___[poit_imagecont_sprite_guid]___', // the guid of the sprite image
                    '___[poit_panel_fid]___',
                    '___[poit_panel_canvrender_fid]___',
                    '___[poit_panel_monob_fid]___',
                    '___[poit_panel_name]___' // android_121Panel
                ],[
                    $curr_fid++,$curr_fid++,$curr_fid++,$curr_fid++,
                    $key."Canvas",
                    $curr_fid++,
                    $curr_fid++,
                  -  $value['position'][0],
                    $value['position'][1],
                    $value['position'][2],
                    $value['quaternion'][0],
                    $value['quaternion'][1],
                    $value['quaternion'][2],
                    $value['quaternion'][3],
                    $value['scale'][0],
                    $value['scale'][1],
                    $value['scale'][2],
                    $key,
                    $curr_fid++,
                    $poi_prefab_guid,
                    $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++, $curr_fid++,
                    $key."ImageContainer",
                    $sprite_guid,
                    $curr_fid++, $curr_fid++, $curr_fid++,
                    $key."Panel"
                ],
                    $poit);

                $unity_file_contents .= $poit;

            } else if ($value['categoryName'] == 'Points of Interest (Video)'){


            } else if ($value['categoryName'] == 'Dynamic 3D models'){


            } else if ($value['categoryName'] == 'Doors'){

            }


        }
    }


    return $unity_file_contents;
}


//==========================================================================================================================================



?>