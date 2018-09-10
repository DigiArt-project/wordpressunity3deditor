<?php

//==========================================================================================================================================
//==========================================================================================================================================

//Convert PDB into the molecule YAML
function wpunity_convert_pdbYAML(){

    // 1. from molecule_asset_id get the pdb file
    //$pdb_text = json_encode(file_get_contents(wp_get_attachment_url(get_post_meta(4773,"wpunity_asset3d_pdb")[0])));
   
    // 2. Parse pdb as json. Call javascript parser

        //    // Transform the following into ajax in order to get back the response from js to php
        //    echo '<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/three.js"></script>';
        //    echo '<script type="text/javascript" src="../wp-content/plugins/wordpressunity3deditor/js_libs/threejs87/PDBLoader.js"></script>';
        //    echo '<script>';
        //    echo 'var pdb_text='. $pdb_text.';';
        //    echo 'console.log(pdb_text);';
        //    echo 'var loader = new THREE.PDBLoader();';
        //    echo 'var res = loader.parse(pdb_text) ;';
        //    echo '</script>';
    
    // 2a. Atoms xyz translation of atoms e.g. {"H": [10,20,30], O:[], H:[]}
    // 2b. Bonds to conect atoms e.g. {[1,2],[2,3]}


    // 3. Get Molecule YAMLS
    // 3a. Find id of tax of Molecule
    //$molecule_term_meta = get_term_meta(wp_get_post_terms( 4773,  'wpunity_asset3d_cat' )[0]->term_taxonomy_id);
    
    // 3b. Get YAMLS of $id_tax_term_mol
    //print_r($product_terms);
}

//DELETE GAME PROJECT
function wpunity_delete_gameproject_frontend_callback(){

    $game_id = $_POST['game_id'];

    $game_post = get_post($game_id);
    $gameSlug = $game_post->post_name;
    $gameTitle = get_the_title( $game_id );

    //1.Delete Assets
    $assetPGame = get_term_by('slug', $gameSlug, 'wpunity_asset3d_pgame');
    $assetPGameID = $assetPGame->term_id;

    $custom_query_args1 = array(
        'post_type' => 'wpunity_asset3d',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_asset3d_pgame',
                'field'    => 'term_id',
                'terms'    => $assetPGameID,
            ),
        ),
    );
     // Instantiate custom query
    $custom_query = new WP_Query( $custom_query_args1 );
    // Output custom query loop
    if ( $custom_query->have_posts() ) :
        while ( $custom_query->have_posts() ) :
            $custom_query->the_post();
            $asset_id = get_the_ID();
            wpunity_delete_asset3d_noscenes_frontend($asset_id);
        endwhile;
    endif;

    wp_reset_postdata();

    //2.Delete Scenes
    $scenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
    $scenePGameID = $scenePGame->term_id;

    $custom_query_args2 = array(
        'post_type' => 'wpunity_scene',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_scene_pgame',
                'field'    => 'term_id',
                'terms'    => $scenePGameID,
            ),
        ),
    );
    // Instantiate custom query
    $custom_query2 = new WP_Query( $custom_query_args2 );
    // Output custom query loop
    if ( $custom_query2->have_posts() ) :
        while ( $custom_query2->have_posts() ) :
            $custom_query2->the_post();
            $scene_id = get_the_ID();

            // Delete scene
            wp_delete_post( $scene_id, true );

        endwhile;
    endif;

    wp_reset_postdata();

    //3. Delete taxonomies from Assets & Scenes
    wp_delete_term( $assetPGameID, 'wpunity_asset3d_pgame' );
    wp_delete_term( $scenePGameID, 'wpunity_scene_pgame' );

    //4. Delete Compile Folder of Game (if exists)
    wpunity_compile_folders_del($gameSlug);

    //5. Delete Game CUSTOM POST
    wp_delete_post( $game_id, false );

    echo $gameTitle;

    wp_die();
}

//DELETE spesific SCENE
function wpunity_delete_scene_frontend_callback(){

    $scene_id = $_POST['scene_id'];
    $postTitle = get_the_title($scene_id);

//    $fg = fopen("output_delete_scene.txt","w");
//    fwrite($fg, $postTitle." ".$scene_id);
//    fclose($fg);

    //1. Delete Scene CUSTOM POST
    wp_delete_post( $scene_id, true );

    echo $postTitle;

    wp_die();
}

//DELETE Asset with files
// ToDo: check why not send to trash
function wpunity_delete_asset3d_frontend_callback(){

    $asset_id = $_POST['asset_id'];
    $gameSlug = $_POST['game_slug'];
    $isCloned = $_POST['isCloned'];
    $isJoker = $_POST['isJoker'];

    // If it is not clone then it is safe to delete the meta files.
    if ($isCloned==='false') {
        //1. Delete all Attachments (mtl/obj/jpg ...)
        $mtlID = get_post_meta($asset_id, 'wpunity_asset3d_mtl', true);
        $res_delmtl = wp_delete_attachment($mtlID, true);
        $objID = get_post_meta($asset_id, 'wpunity_asset3d_obj', true);
        $res_delobj = wp_delete_attachment($objID, true);
        $difID = get_post_meta($asset_id, 'wpunity_asset3d_diffimage', true);
        $res_deldif = wp_delete_attachment($difID, true);
        $screenID = get_post_meta($asset_id, 'wpunity_asset3d_screenimage', true);
        $res_delscr = wp_delete_attachment($screenID, true);
    }
    
    //2. Delete all uses of Asset from Scenes (json)
    $res_deljson = wpunity_delete_asset3d_from_games_and_scenes($asset_id, $gameSlug);

    //3. Delete Asset3D CUSTOM POST
    $res_delass = wp_delete_post( $asset_id, true );

    echo $asset_id;

    wp_die();
}

function wpunity_delete_asset3d_noscenes_frontend($asset_id){
    //No need to delete assets from scenes, cause scene will be deleted at the same event
    
    //1. Delete all Attachments (mtl/obj/jpg ...)
    $mtlID = get_post_meta($asset_id,'wpunity_asset3d_mtl', true);
    wp_delete_attachment( $mtlID,true );
    $objID = get_post_meta($asset_id,'wpunity_asset3d_obj', true);
    wp_delete_attachment( $objID,true );
    $difID = get_post_meta($asset_id,'wpunity_asset3d_diffimage', true);
    wp_delete_attachment( $difID,true );
    $screenID = get_post_meta($asset_id,'wpunity_asset3d_screenimage', true);
    wp_delete_attachment( $screenID,true );

    //2. Delete Asset3D CUSTOM POST
    wp_delete_post( $asset_id, true );

}

// Delete asset from json
function wpunity_delete_asset3d_from_games_and_scenes($asset_id, $gameSlug){

    $scenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
    $scenePGameID = $scenePGame->term_id;

    $custom_query_args2 = array(
        'post_type' => 'wpunity_scene',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_scene_pgame',
                'field'    => 'term_id',
                'terms'    => $scenePGameID,
            ),
        ),
    );

    // Instantiate custom query
    $custom_query2 = new WP_Query( $custom_query_args2 );

    // Output custom query loop
    if ( $custom_query2->have_posts() ) :
        while ( $custom_query2->have_posts() ) :
            $custom_query2->the_post();
            $scene_id = get_the_ID();
            $scene_json = get_post_meta($scene_id,'wpunity_scene_json_input', true);

            $jsonScene = htmlspecialchars_decode ( $scene_json );
            $sceneJsonARR = json_decode($jsonScene, TRUE);

            $tempScenearr = $sceneJsonARR;
            foreach ($tempScenearr['objects'] as $key => $value ) {
                if ($key != 'avatarYawObject') {
                    if($value['assetid'] == $asset_id) {
                        unset($tempScenearr['objects'][$key]);
                        $tempScenearr['metadata']['objects'] --;
                    }
                }
            }

            $tempScenearr = json_encode($tempScenearr, JSON_PRETTY_PRINT);

            update_post_meta($scene_id,'wpunity_scene_json_input',$tempScenearr );
        endwhile;
    endif;

    wp_reset_postdata();
}

//==========================================================================================================================================
//==========================================================================================================================================

/**
 *
 * Fetch all assets in game's scenes
 *
 * When compiling we need all the assets in the scenes, (not all in the game) to be included in Handy_Builder.cs
 * This is for parsimony reasons. The assets that are not in any scene do not need to be inserted in the compiling process
 *
 * @param $asset_id
 * @param $gameSlug
 */
function wpunity_fetch_assetids_in_scenes($gameSlug){

    // output is the ids of all the objs in the scenes
    $assetsids = [];

    $scenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
    $scenePGameID = $scenePGame->term_id;

    $custom_query_args2 = array(
        'post_type' => 'wpunity_scene',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_scene_pgame',
                'field'    => 'term_id',
                'terms'    => $scenePGameID,
            ),
        ),
    );

    // Get the scenes
    $custom_query2 = new WP_Query( $custom_query_args2 );
    
    $tabClones = [];
    $neededObj = [];
    
    // Output custom query loop
    if ( $custom_query2->have_posts() ) :
        while ( $custom_query2->have_posts() ) :

            $custom_query2->the_post();
            $scene_id = get_the_ID();
            $scene_json = get_post_meta($scene_id,'wpunity_scene_json_input', true);

            $jsonScene = htmlspecialchars_decode ( $scene_json );
            $sceneJsonARR = json_decode($jsonScene, TRUE);
            
            $tempScenearr = $sceneJsonARR;
            foreach ($tempScenearr['objects'] as $key => $value ) {
                if ($key != 'avatarYawObject') {
                    $assetsids[] =  $value['assetid'];

                    if(!in_array($value['fnObjID'], $tabClones))
                        $neededObj[] = true;
                    else
                        $neededObj[] = false;
                    
                    $tabClones[] = $value['fnObjID'];
                }
            }
        endwhile;
    endif;
    
    
    //$assetsids = array_unique($assetsids);
    wp_reset_postdata();
    
    return [$assetsids, $neededObj];
}


//==========================================================================================================================================
//==========================================================================================================================================
function wpunity_compile_sprite_upload($featured_image_sprite_id, $gameSlug, $scene_id){

    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir = str_replace('\\','/',$upload_dir);
    $game_models_path = $upload_dir . "/" . $gameSlug . 'Unity/Assets/Resources';

    // Copy the file to Resources
    $attachment_post = get_post($featured_image_sprite_id);
    $attachment_file = $attachment_post->guid;
    $attachment_tempname = str_replace('\\', '/', $attachment_file);
    $attachment_name = pathinfo($attachment_tempname);
    $new_file = $game_models_path .'/' . $attachment_name['filename'] . '_sprite.' . $attachment_name['extension'];
    copy($attachment_file,$new_file);

    // Now for the meta
    $sprite_meta_yaml = 'fileFormatVersion: 2
guid: ___[jpg_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
[junk line to allow importer will do the rest, do not remove]'; //wpunity_getYaml_jpg_sprite_pattern();

    $sprite_meta_guid = wpunity_create_guids('jpg', $featured_image_sprite_id);
    $sprite_meta_yaml_replace = wpunity_replace_spritemeta($sprite_meta_yaml,$sprite_meta_guid);
    $sprite_meta_file = $game_models_path .'/' . $attachment_name['filename'] . '_sprite.' . $attachment_name['extension'] . '.meta';
    $create_meta_file = fopen($sprite_meta_file, "w") or die("Unable to open file!");

    fwrite($create_meta_file,$sprite_meta_yaml_replace);
    fclose($create_meta_file);

    return $sprite_meta_guid;
}

function wpunity_compile_append_scene_to_s_selector($scene_id, $scene_name, $scene_title, $scene_desc,
                                                    $scene_type_ID,$game_path,$scenes_counter,$featured_image_edu_sprite_guid, $gameType){

    $taxterm_suffix = '';
    $taxnamemeta_suffix = '';

    if ($gameType == 'Archaeology') {
        $taxterm_suffix = '-arch';
        $taxnamemeta_suffix = '_arch';
    }else if ($gameType == 'Chemistry') {
        $taxterm_suffix = '-chem';
        $taxnamemeta_suffix = '_chem';
    }

    $mainMenuTerm = get_term_by('slug', 'mainmenu'.$taxterm_suffix.'-yaml',
        'wpunity_scene_yaml');
    
    $termid  = $mainMenuTerm->term_id;
    
//    $metaname = 'wpunity_yamlmeta_s_selector2'.$taxnamemeta_suffix;
//    $term_meta_s_selector2 = get_term_meta($termid, $metaname,true);
    $term_meta_s_selector2 = wpunity_getSceneYAML_archaeology('selector2');
    
    $sceneSelectorFile = $game_path . '/S_SceneSelector.unity';
    
    //Create guid for the tile
    $guid_tile_sceneselector = wpunity_create_fids($scene_id);

    $guid_tile_recttransform = wpunity_create_fids_rect($scene_id);
    
    //Add Scene to initial part of Scene Selector
    wpunity_compile_s_selector_addtile($sceneSelectorFile, $guid_tile_recttransform);
    
    //Add second part of the new Scene Tile

    // Find position of the tile
    $pos = [270, 680, 1090];
    $posy   = -250;

    $tile_pos_x = $pos[ ($scenes_counter-1) % 3 ];
    $tile_pos_y = $posy - 330 * floor(($scenes_counter-1) / 3);


    $seq_index_of_scene = $scenes_counter;
    $name_of_panel = 'panel_' . $scene_name;
    $guid_sprite_scene_featured_img = $featured_image_edu_sprite_guid;
    $text_title_tile = $scene_title; //Title of custom field
    $text_description_tile = $scene_desc;
    $name_of_scene_to_load = $scene_name;//without .unity (we generate unity files with post slug as name)


    $fileData = wpunity_compile_s_selector_replace_tile_gen($term_meta_s_selector2,$tile_pos_x, $tile_pos_y,
        $guid_tile_sceneselector,
        $seq_index_of_scene,$name_of_panel,
        $guid_sprite_scene_featured_img,$text_title_tile,
        $text_description_tile,$name_of_scene_to_load,
        $guid_tile_recttransform);

    $LF = chr(10); // line change
    
    $succapp = file_put_contents($sceneSelectorFile, $LF . $fileData . $LF, FILE_APPEND);
}

function wpunity_compile_s_selector_addtile($sceneSelectorFile, $guid_tile_recttransform){
    # ReplaceChildren
    $LF = chr(10); // line change

    // Clear previous size of filepath
    clearstatcache();

    // a. Read
    $handle = fopen($sceneSelectorFile, 'r');
    
    $content = fread($handle, filesize($sceneSelectorFile));
    
    fclose($handle);

    $tile_name='- {fileID: '. $guid_tile_recttransform .'}';
    // b. add obj
    $content = str_replace(
        '# ReplaceChildren',
        $tile_name.$LF.'  # ReplaceChildren', $content
    );

    // c. Write to file
    $fhandle = fopen($sceneSelectorFile, 'w');
    fwrite($fhandle, $content, strlen($content));
    fclose($fhandle);

}

//==========================================================================================================================================
//==========================================================================================================================================

?>