<?php

function wpunity_create_asset_3DFilesExtra_frontend($asset_newID, $assetTitleForm, $gameSlug, $TheFiles){

    $ff = fopen("output_3D_files.txt","w");
    fwrite($ff, "1");
    
    //--------------- Upload textures and get final filenames as uploaded on server ------------------------------------
    $textureNamesIn  = [];
    
    $content_texture = [];
    
    // store the extensions
    $extension_texture_file = [];
    
//    $fp = fopen('output_post_asset.txt','w');
//
//    fwrite($fp, print_r($_POST, true));
//    fwrite($fp, 'Is empty:'.($_POST['textureFileInput']===''));
//    fwrite($fp,'\n');
//    fwrite($fp, 'Is null:'.($_POST['textureFileInput']==null));
//    fclose($fp);
    
    // Texture
    if ($_POST['textureFileInput']!=null) {
        
        foreach (array_keys($_POST['textureFileInput']) as $texture) {
            
            // Get the basename of texture
            $basename_texture = str_replace(['.jpg','.png'], '', $texture);
            
            // Get the content
            $content_texture[$basename_texture] = $_POST['textureFileInput'][$texture];
            
            // Get the extension (jpg or png)
            $extension_texture_file[$basename_texture] =  strpos($texture, "jpg") !== false ? 'jpg' : 'png';
            
            // Store basenames to an array
            $textureNamesIn[]    = $basename_texture;
        }
        
        // Processed basenames
        $textureNamesOut = [];
        
        for ($i = 0; $i < count($content_texture); $i++) {
            
            // Upload texture content
            $textureFile_id = wpunity_upload_Assetimg64(
                $content_texture[$textureNamesIn[$i]], // content of file
                'texture_' . $textureNamesIn[$i] . '_' . $assetTitleForm, // new filename
                $asset_newID, // asset id
                $gameSlug,    // game slug
                $extension_texture_file[$textureNamesIn[$i]]  // extension
            );
            
            // Get filename in the server
            $textureFile_filename = basename(get_attached_file($textureFile_id));
            
            // Store filenames
            $textureNamesOut[] = $textureFile_filename;
            
            // store each texture in a post meta that receives multiple files
            add_post_meta($asset_newID, 'wpunity_asset3d_diffimage', $textureFile_id);
            
            //update_post_meta($asset_newID, 'wpunity_asset3d_diffimage', $textureFile_id);
        }
    }
    
    //-MTL: Change filenames of textures inside mtl according to the final filenames on server
    $mtl_content = $_POST['mtlFileInput'];

    
    
    
    // MTL : Open mtl file and replace jpg filename
    if($_POST['mtlFileInput']!=null) {
        if(strlen($_POST['mtlFileInput']) > 0) {
            
            // parse texture names
            for ($k = 0; $k < count($textureNamesIn); $k++) {

                // Find if it is jpg or png by content header
                $imageContentLine = substr($content_texture[$textureNamesIn[$k]], 0, 20);
    
                // replace the original basename of jpg with the final name of jpg in the server
                if ( strpos($imageContentLine, "jpeg") ) {
                    $mtl_content = preg_replace("/.*\bmap_Kd\b.*\b" . $textureNamesIn[$k] . ".jpg\b/ui",
                        "map_Kd " . $textureNamesOut[$k], $mtl_content);
                } else if (strpos($imageContentLine, "png")){
                    $mtl_content = preg_replace("/.*\bmap_Kd\b.*\b" . $textureNamesIn[$k] . ".png\b/ui",
                        "map_Kd " . $textureNamesOut[$k], $mtl_content);
                } else {
                    echo "Uknown texture file type: Error 856";
                    return;
                }
                
            }
        }
    }

    
    $obj_content = $_POST['objFileInput'];

    if ($_POST['mtlFileInput']!=null && $_POST['objFileInput']!=null) {
        if (strlen(trim($_POST['mtlFileInput']))>0 && strlen(trim($_POST['objFileInput']))>0) {
          
            // 1. Upload mtl content as text and get the id of meta
            $mtlFile_id = wpunity_upload_AssetText(
                            $mtl_content,               // the content
                    'material' .                 // it should have the keyword material in finale basename
                            $assetTitleForm,            // It should have also the title of Asset
                            $asset_newID,               // Asset id
                            $gameSlug                   // Game slug
            );
            
            // 2. Add id of mtl as post meta on asset
            update_post_meta($asset_newID, 'wpunity_asset3d_mtl', $mtlFile_id);
   
            // 3. OBJ: Get filename of mtl (remove path and txt extension) on the server
            $mtl_filename = basename(get_attached_file($mtlFile_id),'txt'). 'mtl';

            $nCharsToSearch = strlen($obj_content) > 500 ? 500 : strlen($obj_content);

            // 4. Search for replace only in the first 500 characters to avoid memory issues
            $obj_contentfirst = preg_replace("/.*\b" . 'mtllib' . "\b.*\n/ui", // find mtllib line
                                             "mtllib " . $mtl_filename . "\n", // replace
                                             substr($obj_content, 0, $nCharsToSearch)); // search on first nchrs

            // Replace the patch
            $obj_content = substr_replace($obj_content, $obj_contentfirst, 0, $nCharsToSearch);
            
            // 5. Upload OBJ
            $objFile_id = wpunity_upload_AssetText($obj_content, // the OBJ content
                                           'obj' .$assetTitleForm, // it should have the obj and title as name
                                                  $asset_newID,
                                                  $gameSlug
                                                );

            // 6. Add id of obj as post meta on asset
            update_post_meta($asset_newID, 'wpunity_asset3d_obj', $objFile_id);
        }
    }
    
    
    
    $fbx_content = stripslashes($_POST['fbxFileInput']);
    
    $fbx_content2 = $TheFiles;
    
//    $info = pathinfo($fbx_content2['name']);
//    $ext = $info['extension']; // get the extension of the file
//    $newname = "new_________name.".$ext;
    
    
    // REM: HERE : Achieved to upload however how can I set from selector ?
//    move_uploaded_file( $fbx_content2['tmp_name'], "c:/xampp7/htdocs/wordpress/cccccccccc.fbx");
    
    
    fwrite($ff, chr(13));
    
    fwrite($ff, "22:".print_r($fbx_content2, true));
    
    if ($fbx_content !=null ) {

            // 1. Upload FBX file
            $fbxFile_id = wpunity_upload_AssetText($fbx_content, // content
                                            'fbx'.$assetTitleForm, // asset title
                                                    $asset_newID,
                                                    $gameSlug
                                                    );

            // 2. Set value of attachment IDs at custom fields
            update_post_meta($asset_newID, 'wpunity_asset3d_fbx', $fbxFile_id);
        
    }
    
    // PDB upload and add id of uploaded file to postmeta wpunity_asset3d_pdb of asset
    if ($_POST['pdbFileInput']!=null){
        if (strlen($_POST['pdbFileInput'])>0) {
            $pdbFile_id = wpunity_upload_AssetText($_POST['pdbFileInput'], 'material' . $assetTitleForm, $asset_newID, $gameSlug);
            update_post_meta($asset_newID, 'wpunity_asset3d_pdb', $pdbFile_id);
        }
    }
    
    // SCREENSHOT upload and add id of uploaded file to postmeta wpunity_asset3d_screenimage of asset
    if ($_POST['sshotFileInput']!=null) {
        if (strlen($_POST['sshotFileInput'])>0) {
            
            $screenShotFile_id =
                wpunity_upload_Assetimg64($_POST['sshotFileInput'], $assetTitleForm, $asset_newID,
                    $gameSlug, 'jpg');
            
            update_post_meta($asset_newID, 'wpunity_asset3d_screenimage', $screenShotFile_id);
        }
    }
    
}


// Create asset
function wpunity_create_asset_frontend($assetPGameID,$assetCatID,$gameSlug, $assetCatIPRID, $asset_language_pack,
      $assetFonts, $assetback3dcolor){
    
    $alp = $asset_language_pack;
    
    $asset_taxonomies = array(
        'wpunity_asset3d_pgame' => array(
            $assetPGameID,
        ),
        'wpunity_asset3d_cat' => array(
            $assetCatID,
        ),
        'wpunity_asset3d_ipr_cat' => array(
            $assetCatIPRID,
        )
    );
    
    $asset_information = array(
        'post_title' => $alp['assetTitleForm'],
        'post_content' => $alp['assetDescForm'],
        'post_type' => 'wpunity_asset3d',
        'post_status' => 'publish',
        'tax_input' => $asset_taxonomies,
    );

    $asset_id = wp_insert_post($asset_information);
    update_post_meta($asset_id, 'wpunity_asset3d_pathData', $gameSlug);
    
    update_post_meta($asset_id, 'wpunity_asset3d_title_greek', $alp['assetTitleFormGreek']);
    update_post_meta($asset_id, 'wpunity_asset3d_title_spanish', $alp['assetTitleFormSpanish']);
    update_post_meta($asset_id, 'wpunity_asset3d_title_french', $alp['assetTitleFormFrench']);
    update_post_meta($asset_id, 'wpunity_asset3d_title_german', $alp['assetTitleFormGerman']);
    update_post_meta($asset_id, 'wpunity_asset3d_title_russian', $alp['assetTitleFormRussian']);
    
    update_post_meta($asset_id, 'wpunity_asset3d_description_greek', $alp['assetDescFormGreek']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_spanish', $alp['assetDescFormSpanish']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_french', $alp['assetDescFormFrench']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_german', $alp['assetDescFormGerman']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_russian', $alp['assetDescFormRussian']);
    
    update_post_meta($asset_id, 'wpunity_asset3d_description_greek', $alp['assetDescFormGreek']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_spanish', $alp['assetDescFormSpanish']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_french', $alp['assetDescFormFrench']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_german', $alp['assetDescFormGerman']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_russian', $alp['assetDescFormRussian']);
    
    update_post_meta($asset_id, 'wpunity_asset3d_description_kids', $alp['assetDescFormKids']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_greek_kids', $alp['assetDescFormGreekKids']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_spanish_kids', $alp['assetDescFormSpanishKids']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_french_kids', $alp['assetDescFormFrenchKids']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_german_kids', $alp['assetDescFormGermanKids']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_russian_kids', $alp['assetDescFormRussianKids']);
    
    update_post_meta($asset_id, 'wpunity_asset3d_description_experts', $alp['assetDescFormExperts']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_greek_experts', $alp['assetDescFormGreekExperts']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_spanish_experts', $alp['assetDescFormSpanishExperts']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_french_experts', $alp['assetDescFormFrenchExperts']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_german_experts', $alp['assetDescFormGermanExperts']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_russian_experts', $alp['assetDescFormRussianExperts']);
    
    update_post_meta($asset_id, 'wpunity_asset3d_description_perception', $alp['assetDescFormPerception']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_greek_perception', $alp['assetDescFormGreekPerception']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_spanish_perception', $alp['assetDescFormSpanishPerception']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_french_perception', $alp['assetDescFormFrenchPerception']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_german_perception', $alp['assetDescFormGermanPerception']);
    update_post_meta($asset_id, 'wpunity_asset3d_description_russian_perception', $alp['assetDescFormRussianPerception']);

    update_post_meta($asset_id, 'wpunity_asset3d_fonts', $assetFonts);
    update_post_meta($asset_id, 'wpunity_asset3d_back_3d_color', $assetback3dcolor);

    if($asset_id){return $asset_id;}else{return 0;}
}

// Update asset
function wpunity_update_asset_frontend($assetPGameID, $assetCatID, $asset_inserted_id, $assetCatIPRID,

                                       $asset_language_pack,
                                       
                                       $assetFonts, $assetback3dcolor){
    
    $alp = $asset_language_pack;
    
    $asset_taxonomies = array(
        'wpunity_asset3d_pgame' => array(
            $assetPGameID,
        ),
        'wpunity_asset3d_cat' => array(
            $assetCatID,
        ),
        'wpunity_asset3d_ipr_cat' => array(
            $assetCatIPRID,
        )
    );
    
    $asset_new_info = array(
        'ID' => $asset_inserted_id,
        'post_title' => $alp['assetTitleForm'],
        'post_content' => $alp['assetDescForm'],
        'tax_input' => $asset_taxonomies,
    );

    wp_update_post($asset_new_info);
    
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_title_greek', $alp['assetTitleFormGreek']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_title_spanish', $alp['assetTitleFormSpanish']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_title_french', $alp['assetTitleFormFrench']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_title_german', $alp['assetTitleFormGerman']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_title_russian', $alp['assetTitleFormRussian']);
    
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_greek', $alp['assetDescFormGreek']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_spanish', $alp['assetDescFormSpanish']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_french', $alp['assetDescFormFrench']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_german', $alp['assetDescFormGerman']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_russian', $alp['assetDescFormRussian']);
    
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_greek', $alp['assetDescFormGreek']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_spanish', $alp['assetDescFormSpanish']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_french', $alp['assetDescFormFrench']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_german', $alp['assetDescFormGerman']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_russian', $alp['assetDescFormRussian']);
    
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_kids', $alp['assetDescFormKids']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_greek_kids', $alp['assetDescFormGreekKids']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_spanish_kids', $alp['assetDescFormSpanishKids']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_french_kids', $alp['assetDescFormFrenchKids']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_german_kids', $alp['assetDescFormGermanKids']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_russian_kids', $alp['assetDescFormRussianKids']);
    
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_experts', $alp['assetDescFormExperts']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_greek_experts', $alp['assetDescFormGreekExperts']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_spanish_experts', $alp['assetDescFormSpanishExperts']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_french_experts', $alp['assetDescFormFrenchExperts']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_german_experts', $alp['assetDescFormGermanExperts']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_russian_experts', $alp['assetDescFormRussianExperts']);
    
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_perception', $alp['assetDescFormPerception']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_greek_perception', $alp['assetDescFormGreekPerception']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_spanish_perception', $alp['assetDescFormSpanishPerception']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_french_perception', $alp['assetDescFormFrenchPerception']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_german_perception', $alp['assetDescFormGermanPerception']);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_description_russian_perception', $alp['assetDescFormRussianPerception']);
    
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_fonts', $assetFonts);
    update_post_meta($asset_inserted_id, 'wpunity_asset3d_back_3d_color', $assetback3dcolor);
    
    return 1;
}

function wpunity_create_asset_addImages_frontend($asset_newID){
    
    $asset_imageForm = [];
    for ($i=0; $i<=4; $i++){
        $asset_imageForm[$i] =  $_FILES['image'.$i.'Input'];
        
        if ($i==0){
            // Featured image (thumbnail)
            $attachment_id = wpunity_upload_img_vid( $asset_imageForm[0], $asset_newID);
            set_post_thumbnail( $asset_newID, $attachment_id );
        } else { // Images 1,2,3,4
            if ($asset_imageForm[$i]['error'] != 4) { // No error
                $attachment_id_image = wpunity_upload_img_vid($asset_imageForm[$i], $asset_newID);
                update_post_meta($asset_newID, 'wpunity_asset3d_image'.$i, $attachment_id_image);
            }
        }
    }
    
}

function wpunity_create_asset_addVideo_frontend($asset_newID){
    $asset_videoForm = $_FILES['videoFileInput'];
    
    // 4 error means empty
    if ( $asset_videoForm['error'] == 4  )
        return;
    
    $attachment_video_id = wpunity_upload_img_vid( $asset_videoForm, $asset_newID);
    update_post_meta( $asset_newID, 'wpunity_asset3d_video', $attachment_video_id );
}







// ------------- Chemistry - Wind Energy related ----------------------------
function wpunity_create_asset_consumerExtra_frontend($asset_newID){
    //Energy Consumption
    $safe_cons_values = range(0, 2000, 5);
    $safe_cons_values2 = range(0, 1000, 5);

    $energyConsumptionMinValForm = intval($_POST['energyConsumptionMinVal']);
    $energyConsumptionMaxValForm = intval($_POST['energyConsumptionMaxVal']);
    $energyConsumptionMeanValForm = intval($_POST['energyConsumptionMeanVal']);
    $energyConsumptionVarianceValForm = intval($_POST['energyConsumptionVarianceVal']);

    if (!in_array($energyConsumptionMinValForm, $safe_cons_values, true)) {$energyConsumptionMinValForm = '';}
    if (!in_array($energyConsumptionMaxValForm, $safe_cons_values, true)) {$energyConsumptionMaxValForm = '';}
    if (!in_array($energyConsumptionMeanValForm, $safe_cons_values, true)) {$energyConsumptionMeanValForm = '';}
    if (!in_array($energyConsumptionVarianceValForm, $safe_cons_values2, true)) {$energyConsumptionVarianceValForm = '';}

    $energyConsumption = array('min' => $energyConsumptionMinValForm, 'max' => $energyConsumptionMaxValForm, 'mean' => $energyConsumptionMeanValForm, 'var' => $energyConsumptionVarianceValForm);

    update_post_meta($asset_newID, 'wpunity_energyConsumption', $energyConsumption);
}

function wpunity_create_asset_terrainExtra_frontend($asset_newID){
    $underPowerIncomeValForm = floatval($_POST['underPowerIncomeVal']);
    $correctPowerIncomeValForm = floatval($_POST['correctPowerIncomeVal']);
    $overPowerIncomeValForm = floatval($_POST['overPowerIncomeVal']);
    $accessCostPenaltyForm = intval($_POST['accessCostPenalty']);
    $archProximityPenaltyForm = intval($_POST['archProximityPenalty']);
    $naturalReserveProximityPenaltyForm = intval($_POST['naturalReserveProximityPenalty']);
    $hiVoltLineDistancePenaltyForm = intval($_POST['hiVoltLineDistancePenalty']);
    $physicsWindMinValForm = intval($_POST['physicsWindMinVal']);
    $physicsWindMaxValForm = intval($_POST['physicsWindMaxVal']);
    $physicsWindMeanValForm = intval($_POST['physicsWindMeanVal']);
    $physicsWindVarianceValForm = intval($_POST['physicsWindVarianceVal']);

    //Income (in $)
    $safe_income_values = range(-5, 5, 0.5);
    if (!in_array($underPowerIncomeValForm, $safe_income_values, true)) {$underPowerIncomeValForm = '';}
    if (!in_array($correctPowerIncomeValForm, $safe_income_values, true)) {$correctPowerIncomeValForm = '';}
    if (!in_array($overPowerIncomeValForm, $safe_income_values, true)) {$overPowerIncomeValForm = '';}

    $energyConsumptionIncome = array('under' => $underPowerIncomeValForm, 'correct' => $correctPowerIncomeValForm, 'over' => $overPowerIncomeValForm);

    //Construction Penalties (in $)
    $safe_penalty_values = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    if (!in_array($accessCostPenaltyForm, $safe_penalty_values, true)) {$accessCostPenaltyForm = '';}
    if (!in_array($archProximityPenaltyForm, $safe_penalty_values, true)) {$archProximityPenaltyForm = '';}
    if (!in_array($naturalReserveProximityPenaltyForm, $safe_penalty_values, true)) {$naturalReserveProximityPenaltyForm = '';}
    if (!in_array($hiVoltLineDistancePenaltyForm, $safe_penalty_values, true)) {$hiVoltLineDistancePenaltyForm = '';}

    $constructionPenalties = array('access' => $accessCostPenaltyForm, 'arch' => $archProximityPenaltyForm, 'natural' => $naturalReserveProximityPenaltyForm, 'hiVolt' => $hiVoltLineDistancePenaltyForm);

    //Physics
    $safe_physics_values = range(0, 40, 1);
    $safe_physics_values2 = range(1, 100, 1);//for Wind Variance
    if (!in_array($physicsWindMinValForm, $safe_physics_values, true)) {$physicsWindMinValForm = '';}
    if (!in_array($physicsWindMaxValForm, $safe_physics_values, true)) {$physicsWindMaxValForm = '';}
    if (!in_array($physicsWindMeanValForm, $safe_physics_values, true)) {$physicsWindMeanValForm = '';}
    if (!in_array($physicsWindVarianceValForm, $safe_physics_values2, true)) {$physicsWindVarianceValForm = '';}

    $physicsValues = array('min' => $physicsWindMinValForm, 'max' => $physicsWindMaxValForm, 'mean' => $physicsWindMeanValForm, 'variance' => $physicsWindVarianceValForm);

    update_post_meta($asset_newID, 'wpunity_energyConsumptionIncome', $energyConsumptionIncome);
    update_post_meta($asset_newID, 'wpunity_physicsValues', $physicsValues);
    update_post_meta($asset_newID, 'wpunity_constructionPenalties', $constructionPenalties);
}

function wpunity_create_asset_producerExtra_frontend($asset_newID){
    $producerTurbineSizeValForm = intval($_POST['producerTurbineSizeVal']);
    $producerDmgCoeffValForm = floatval($_POST['producerDmgCoeffVal']);
    $producerCostValForm = intval($_POST['producerCostVal']);
    $producerRepairCostValForm = floatval($_POST['producerRepairCostVal']);
    $producerClassValForm = $_POST['producerClassVal'];
    $producerWindSpeedClassValForm = floatval($_POST['producerWindSpeedClassVal']);
    $producerMaxPowerValForm = floatval($_POST['producerMaxPowerVal']);
    $producerPowerProductionValForm = $_POST['producerPowerProductionVal'];

    //Producer Options-Costs
    $safe_opt_val = range(3, 250, 1);
    $safe_opt_dmg = range(0.001, 0.02, 0.001);
    $safe_opt_cost = range(1, 10, 1);
    $safe_opt_repaid = range(0.5, 5, 0.5);
    if (!in_array($producerTurbineSizeValForm, $safe_opt_val, true)) {$producerTurbineSizeValForm = '';}
    if (!in_array($producerDmgCoeffValForm, $safe_opt_dmg, true)) {$producerDmgCoeffValForm = '';}
    if (!in_array($producerCostValForm, $safe_opt_cost, true)) {$producerCostValForm = '';}
    if (!in_array($producerRepairCostValForm, $safe_opt_repaid, true)) {$producerRepairCostValForm = '';}

    $producerOptCosts = array('size' => $producerTurbineSizeValForm, 'dmg' => $producerDmgCoeffValForm, 'cost' => $producerCostValForm, 'repaid' => $producerRepairCostValForm);
    $producerOptGen = array('class' => $producerClassValForm, 'speed' => $producerWindSpeedClassValForm, 'power' => $producerMaxPowerValForm);

    update_post_meta($asset_newID, 'wpunity_producerPowerProductionVal', $producerPowerProductionValForm);
    update_post_meta($asset_newID, 'wpunity_producerOptCosts', $producerOptCosts);
    update_post_meta($asset_newID, 'wpunity_producerOptGen', $producerOptGen);
}



function wpunity_create_asset_moleculeExtra_frontend($asset_newID){
    $moleculeChemicalType = $_POST['moleculeChemicalType'];
    $moleculeFunctionalGroupInput = $_POST['moleculeFunctionalGroupInput'];
    $moleculeFluidViscosity = floatval($_POST['molecule-fluid-viscosity-slider-label']);
    $moleculeFluidColorVal = $_POST['moleculeFluidColorVal'];

    update_post_meta($asset_newID, 'wpunity_molecule_ChemicalTypeVal', $moleculeChemicalType);
    update_post_meta($asset_newID, 'wpunity_molecule_FunctionalGroupVal', $moleculeFunctionalGroupInput);
    update_post_meta($asset_newID, 'wpunity_molecule_FluidViscosityVal', $moleculeFluidViscosity);
    update_post_meta($asset_newID, 'wpunity_molecule_FluidColorVal', $moleculeFluidColorVal);

}

//--------------  For Cloning only -------------------------------------------------------------------------------------
function wpunity_copy_3Dfiles($asset_newID, $asset_sourceID){
    
    // Get the source post
    $assetpostMeta = get_post_meta($asset_sourceID);
    
    if ($assetpostMeta['wpunity_asset3d_pdb'][0])
        update_post_meta($asset_newID, 'wpunity_asset3d_pdb', $assetpostMeta['wpunity_asset3d_pdb'][0]);
    
    if ($assetpostMeta['wpunity_asset3d_mtl'][0])
        update_post_meta($asset_newID, 'wpunity_asset3d_mtl', $assetpostMeta['wpunity_asset3d_mtl'][0]);
    
    if($assetpostMeta['wpunity_asset3d_obj'][0])
        update_post_meta($asset_newID, 'wpunity_asset3d_obj', $assetpostMeta['wpunity_asset3d_obj'][0]);
    
    if($assetpostMeta['wpunity_asset3d_screenimage'][0])
        update_post_meta($asset_newID, 'wpunity_asset3d_screenimage', $assetpostMeta['wpunity_asset3d_screenimage'][0]);
    
    if (count($assetpostMeta['wpunity_asset3d_diffimage']) > 0) {
        delete_post_meta($asset_newID, 'wpunity_asset3d_diffimage');
        for ($m = 0; $m < count($assetpostMeta['wpunity_asset3d_diffimage']); $m++)
            add_post_meta($asset_newID, 'wpunity_asset3d_diffimage', $assetpostMeta['wpunity_asset3d_diffimage'][$m]);
    }
}




?>
