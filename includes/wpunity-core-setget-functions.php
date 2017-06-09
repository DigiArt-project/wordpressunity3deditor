<?php

function wpunity_getEditpage($type){
    if($type=='game'){
        $edit_pages = get_pages(array(
            'hierarchical' => 0,
            'parent' => -1,
            'meta_key' => '_wp_page_template',
            'meta_value' => '/templates/edit-wpunity_game.php'
        ));
        return $edit_pages;
    }elseif($type=='scene'){
        $edit_pages = get_pages(array(
            'hierarchical' => 0,
            'parent' => -1,
            'meta_key' => '_wp_page_template',
            'meta_value' => '/templates/edit-wpunity_scene.php'
        ));
        return $edit_pages;
    }elseif($type=='scene2D'){
        $edit_pages = get_pages(array(
            'hierarchical' => 0,
            'parent' => -1,
            'meta_key' => '_wp_page_template',
            'meta_value' => '/templates/edit-wpunity_scene2D.php'
        ));
        return $edit_pages;
    }elseif($type=='allgames'){
        $edit_pages = get_pages(array(
            'hierarchical' => 0,
            'parent' => -1,
            'meta_key' => '_wp_page_template',
            'meta_value' => '/templates/open-wpunity_game.php'
        ));
        return $edit_pages;
    }elseif($type=='asset'){
        $edit_pages = get_pages(array(
            'hierarchical' => 0,
            'parent' => -1,
            'meta_key' => '_wp_page_template',
            'meta_value' => '/templates/edit-wpunity_asset3D.php'
        ));
        return $edit_pages;
    }else{
        return false;
    }

}



// database method
function wpunity_fetch_scene_assets_by_db_action_callback(){ //$sceneID){

    // Output the directory listing as JSON
    header('Content-type: application/json');

    $DS = DIRECTORY_SEPARATOR;

    // if you change this, be sure to change line 440 in scriptFileBrowserToolbarWPway.js
    $dir = '..'.$DS.'wp-content'.$DS.'uploads'.$DS.$_GET['gamefolder'].$DS.$_GET['scenefolder'];

    $response = wpunity_getAllassets_byScene($_GET['sceneID']);


    for ($i=0; $i<count($response); $i++){
        $response[$i][name] =$response[$i][assetName];
        $response[$i][type] ='file';
        $response[$i][path] =$response[$i][objPath];

        // Find kb size
        $ch = curl_init($response[$i][objPath]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_NOBODY, TRUE);
        $dataCurl = curl_exec($ch);
        $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
        curl_close($ch);
        $response[$i][size] =$size;
    }

    $jsonResp =  json_encode(
        array(
            "name" => $dir,
            "type" => "folder",
            "path" => $dir,
            "items" => $response
        )
    );

    echo $jsonResp;

    wp_die();
}


// OLD DIR METHOD
function wpunity_fetch_scene_assets_by_dir_action_callback(){ //$sceneID){

    // Output the directory listing as JSON
    header('Content-type: application/json');

    $DS = DIRECTORY_SEPARATOR;
    // if you change this, be sure to change line 440 in scriptFileBrowserToolbarWPway.js
    $dir = '..'.$DS.'wp-content'.$DS.'uploads'.$DS.$_GET['gamefolder'].$DS.$_GET['scenefolder'];

    $response = scan($dir);

    $jsonResp =  json_encode(array(
            "name" => $dir,
            "type" => "folder",
            "path" => $dir,
            "items" => $response
        )
    );

    echo $jsonResp;

    wp_die();
}

function scan($dir)
{
    $DS = '/'; // Do not change
    $files = array();
    // -- Dir method --
    if (file_exists($dir)) {

        foreach (scandir($dir) as $f) {

            if (!$f || $f[0] == '.') {
                continue; // Ignore hidden files
            }

            if (is_dir($dir . '/' . $f)) {
                // The path is a folder
                $files[] = array(
                    "name" => $f,
                    "type" => "folder",
                    "path" => $dir . $DS . $f,
                    "items" => scan($dir . $DS . $f) // Recursively get the contents of the folder
                );
            } else {
                // It is a file
                $files[] = array(
                    "name" => $f,
                    "type" => "file",
                    "path" => $dir . $DS . $f,
                    "size" => filesize($dir . $DS . $f) // Gets the size of this file
                );
            }
        }

    }

    return $files;
}



function wpunity_getAllassets_byScene($sceneID){

    $allAssets = [];

    $originalScene = get_post($sceneID);
    $sceneSlug = $originalScene->post_name;
    //Get 'Asset's Parent Scene' taxonomy with the same slug
    $sceneTaxonomy = get_term_by('slug', $sceneSlug, 'wpunity_asset3d_pscene');
    $sceneTaxonomyID = $sceneTaxonomy->term_id;

    $queryargs = array(
        'post_type' => 'wpunity_asset3d',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_asset3d_pscene',
                'field' => 'id',
                'terms' => $sceneTaxonomyID
            )
        )
    );

    $custom_query = new WP_Query( $queryargs );

    if ( $custom_query->have_posts() ) :
        while ( $custom_query->have_posts() ) :

            $custom_query->the_post();
            $asset_id = get_the_ID();
            $asset_name = get_the_title();

            //ALL DATA WE NEED
            $objID = get_post_meta($asset_id, 'wpunity_asset3d_obj', true); //OBJ ID
            if($objID){$objPath = wp_get_attachment_url( $objID );} //OBJ PATH
            $mtlID = get_post_meta($asset_id, 'wpunity_asset3d_mtl', true); //MTL ID
            if($mtlID){$mtlPath = wp_get_attachment_url( $mtlID );} //MTL PATH
            $difImageID = get_post_meta($asset_id, 'wpunity_asset3d_diffimage', true); //Diffusion Image ID
            if($difImageID){$difImagePath = wp_get_attachment_url( $difImageID );} //Diffusion Image PATH
            $screenImageID = get_post_meta($asset_id, 'wpunity_asset3d_screenimage', true); //Screenshot Image ID
            if($screenImageID){$screenImagePath = wp_get_attachment_url( $screenImageID );} //Screenshot Image PATH


            $image1id = get_post_meta($asset_id, 'wpunity_asset3d_image1', true); //OBJ ID


            $categoryAsset = wp_get_post_terms($asset_id, 'wpunity_asset3d_cat');

            $allAssets[] = ['assetName'=>$asset_name,
                'assetSlug'=>get_post()->post_name,
                'assetid'=>$asset_id,
                'categoryName'=>$categoryAsset[0]->name,
                'categoryID'=>$categoryAsset[0]->term_id,
                'objID'=>$objID,
                'objPath'=>$objPath,
                'mtlID'=>$mtlID,
                'diffImageID'=>$difImageID,
                'diffImage'=>$difImagePath,
                'screenImageID'=>$screenImageID,
                'screenImagePath'=>$screenImagePath,
                'mtlPath'=>$mtlPath,
                'image1id'=>$image1id];

        endwhile;
    endif;

    // Reset postdata
    wp_reset_postdata();

    return $allAssets;

}

function wpunity_getAllscenes_unityfiles_byGame($gameID){

    $allUnityScenes = [];

    $originalGame = get_post($gameID);
    $gameSlug = $originalGame->post_name;
    //Get 'Asset's Parent Scene' taxonomy with the same slug
    $gameTaxonomy = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
    $gameTaxonomyID = $gameTaxonomy->term_id;

    $queryargs = array(
        'post_type' => 'wpunity_scene',
        'posts_per_page' => -1,
        'orderby'   => 'ID',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'wpunity_scene_pgame',
                'field' => 'id',
                'terms' => $gameTaxonomyID
            )
        )
    );

    $custom_query = new WP_Query( $queryargs );

    if ( $custom_query->have_posts() ) :
        while ( $custom_query->have_posts() ) :
            $custom_query->the_post();
            $scene_id = get_the_ID();
            $sceneSlug = get_post_field( 'post_name', $scene_id );
            $allUnityScenes[] = ['sceneUnityPath'=>"Assets/".$sceneSlug."/".$sceneSlug.".unity"];
        endwhile;
    endif;

    // Reset postdata
    wp_reset_postdata();

    return $allUnityScenes;

}




function wpunity_getTemplateID_forAsset($asset_id){

    $parentSceneterms = wp_get_post_terms( $asset_id, 'wpunity_asset3d_pscene');

    $parentSceneSlug = $parentSceneterms[0]->slug;
    $custom_args = array(
        'name'        => $parentSceneSlug,
        'post_type'   => 'wpunity_scene',
    );
    $my_posts = get_posts($custom_args);
    $sceneID = $my_posts[0]->ID;

    $terms = wp_get_post_terms( $sceneID, 'wpunity_scene_yaml', array("fields" => "ids") );

    return $terms[0];
}

//==========================================================================================================================================

//Get Methods for Every Yaml Pattern

//Get 'Folder.meta Pattern'
function wpunity_getFolderMetaPattern(){
    $yamloptions = get_option( 'yaml_settings' );
    $folderMetaPattern = $yamloptions["wpunity_folder_meta_pat"];

    return $folderMetaPattern;
}

//Get 'each_scene.unity meta pattern'
function wpunity_getSceneUnityMetaPattern(){
    $yamloptions = get_option( 'yaml_settings' );
    $sceneUnityMetaPattern = $yamloptions["wpunity_scene_meta_pat"];

    return $sceneUnityMetaPattern;
}

//Get 'Wonder around .unity pattern' by Yaml ID
function wpunity_getYaml_wonder_around_unity_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_wonderaround_pat',true);
}

//Get 'Static Object Pattern' by Yaml ID
function wpunity_getYaml_static_object_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_sop',true);
}

//Get 'Dynamic Object Pattern' by Yaml ID
function wpunity_getYaml_dynamic_object_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_dop',true);
}

//Get 'Door Pattern' by Yaml ID
function wpunity_getYaml_door_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_doorp',true);
}

//Get 'POI ImageText Pattern' by Yaml ID
function wpunity_getYaml_poi_imagetext_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_poi_imagetext_p',true);
}

//Get 'POI Video Pattern' by Yaml ID
function wpunity_getYaml_poi_video_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_poi_video_p',true);
}

//Get 'The S_MainMenu.unity pattern' by Yaml ID
function wpunity_getYaml_main_menu_unity_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_s_mainmenu',true);
}

//Get 'Main Menu c-sharp script (all_menu_Script.cs) Pattern' by Yaml ID
function wpunity_getYaml_all_menu_cs_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_csharp_mainmenu',true);
}

//Get 'The S_Credentials.unity pattern' by Yaml ID
function wpunity_getYaml_credentials_unity_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_s_credentials',true);
}

//Get 'obj.meta Pattern' by Yaml ID
function wpunity_getYaml_obj_dotmeta_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_odp',true);
}

//Get 'mat.meta Pattern' by Yaml ID
function wpunity_getYaml_mat_dotmeta_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_mdp',true);
}

//Get 'jpg.meta Pattern' by Yaml ID
function wpunity_getYaml_jpg_dotmeta_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_jdp',true);
}

//Get 'The jpg sprite meta pattern' by Yaml ID
function wpunity_getYaml_jpg_sprite_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_jspritep',true);
}

//Get 'Material (.mat) Pattern' by Yaml ID
function wpunity_getYaml_mat_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_scene_matp',true);
}

//Get 'The S_Options.unity pattern' by Yaml ID
function wpunity_getYaml_options_unity_pattern($yamlID){
    return get_term_meta($yamlID,'wpunity_yamlmeta_s_options',true);
}

//==========================================================================================================================================

?>