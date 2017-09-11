<?php

// Three js : for simple rendering
wp_enqueue_script('wpunity_load_threejs');
wp_enqueue_script('wpunity_load_objloader');
wp_enqueue_script('wpunity_load_mtlloader');
wp_enqueue_script('wpunity_load_orbitcontrols');
wp_enqueue_script('wu_3d_view');
wp_enqueue_script('wpunity_asset_editor_scripts');
wp_enqueue_script('flot');
wp_enqueue_script('flot-axis-labels');

//Default Values
$mean_speed_wind = 14;
$var_speed_wind = 30;
$min_speed_wind = 0;
$max_speed_wind = 40;
$income_when_overpower = 0.5;
$income_when_correct_power = 1;
$income_when_under_power = 0;
$access_penalty = 0;
$archaeology_penalty = 0;
$natural_reserve_penalty = 0;
$hvdistance_penalty = 0;
$min_consumption = 50;
$max_consumption = 150;
$mean_consumption = 100;
$var_consumption = 50;
$optCosts_size = 90;
$optCosts_dmg = 0.005;
$optCosts_cost = 3;
$optCosts_repaid = 1;
$optGen_class = 'A';
$optGen_speed = 10;
$optGen_power = 3;

$create_new = 1; //1=NEW ASSET 0=EDIT ASSET
$perma_structure = get_option('permalink_structure') ? true : false;

$parameter_pass = $perma_structure ? '?wpunity_game=' : '&wpunity_game=';
$parameter_scenepass = $perma_structure ? '?wpunity_scene=' : '&wpunity_scene=';
$parameter_assetpass = $perma_structure ? '?wpunity_asset=' : '&wpunity_asset=';


$project_id = sanitize_text_field( intval( $_GET['wpunity_game'] ));
$asset_inserted_id = sanitize_text_field( intval( $_GET['wpunity_asset'] ));
$scene_id = sanitize_text_field( intval( $_GET['wpunity_scene'] ));

$game_post = get_post($project_id);
$gameSlug = $game_post->post_name;
$game_type_obj = wpunity_return_game_type($project_id);

//Get 'parent-game' taxonomy with the same slug as Game
$assetPGame = get_term_by('slug', $gameSlug, 'wpunity_asset3d_pgame');
$assetPGameID = $assetPGame->term_id;
$assetPGameSlug = $assetPGame->post_name;

$asset_post = get_post($asset_inserted_id);
if($asset_post->post_type == 'wpunity_asset3d') {$create_new = 0;$asset_checked_id=$asset_inserted_id;}

$editgamePage = wpunity_getEditpage('game');
$allGamesPage = wpunity_getEditpage('allgames');
$editscenePage = wpunity_getEditpage('scene');

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {
    $assetCatID = intval($_POST['term_id']);
    if($create_new == 1){

        $asset_taxonomies = array(
            'wpunity_asset3d_pgame' => array(
                $assetPGameID,
            ),
            'wpunity_asset3d_cat' => array(
                $assetCatID,
            )
        );

        $asset_information = array(
            'post_title' => esc_attr(strip_tags($_POST['assetTitle'])),
            'post_content' => esc_attr(strip_tags($_POST['assetDesc'])),
            'post_type' => 'wpunity_asset3d',
            'post_status' => 'publish',
            'tax_input' => $asset_taxonomies,
        );


        $asset_id = wp_insert_post($asset_information);
        update_post_meta( $asset_id, 'wpunity_asset3d_pathData', $gameSlug );

        //$mtlFile = $_FILES['mtlFileInput'];
        //$objFile = $_FILES['objFileInput'];
        //$textureFile = $_FILES['textureFileInput'];
        $screenShotFile = $_POST['sshotFileInput'];

        if($asset_id) {
            $assetCatTerm = get_term_by('id', $assetCatID, 'wpunity_asset3d_cat');
            if ($assetCatTerm->slug == 'consumer') {
                //Energy Consumption
                $safe_cons_values = range(0, 2000, 5);
                $safe_cons_values2 = range(0, 1000, 5);
                $energyConsumptionMinVal = intval($_POST['energyConsumptionMinVal']);
                $energyConsumptionMaxVal = intval($_POST['energyConsumptionMaxVal']);
                $energyConsumptionMeanVal = intval($_POST['energyConsumptionMeanVal']);
                $energyConsumptionVarianceVal = intval($_POST['energyConsumptionVarianceVal']);
                if (!in_array($energyConsumptionMinVal, $safe_cons_values, true)) {$energyConsumptionMinVal = '';}
                if (!in_array($energyConsumptionMaxVal, $safe_cons_values, true)) {$energyConsumptionMaxVal = '';}
                if (!in_array($energyConsumptionMeanVal, $safe_cons_values, true)) {$energyConsumptionMeanVal = '';}
                if (!in_array($energyConsumptionVarianceVal, $safe_cons_values2, true)) {$energyConsumptionVarianceVal = '';}

                $energyConsumption = array('min' => $energyConsumptionMinVal, 'max' => $energyConsumptionMaxVal, 'mean' => $energyConsumptionMeanVal, 'var' => $energyConsumptionVarianceVal);

                update_post_meta($asset_id, 'wpunity_energyConsumption', $energyConsumption);
                //update_post_meta( $asset_id, 'wpunity_energyConsumptionCost', $energyConsumptionCost );
            } elseif ($assetCatTerm->slug == 'terrain') {
                //Income (in $)
                $safe_income_values = range(-5, 5, 0.5);
                $underPowerIncome = floatval($_POST['underPowerIncomeVal']);
                $correctPowerIncome = floatval($_POST['correctPowerIncomeVal']);
                $overPowerIncome = floatval($_POST['overPowerIncomeVal']);
                if (!in_array($underPowerIncome, $safe_income_values, true)) {$underPowerIncome = '';}
                if (!in_array($correctPowerIncome, $safe_income_values, true)) {$correctPowerIncome = '';}
                if (!in_array($overPowerIncome, $safe_income_values, true)) {$overPowerIncome = '';}

                $energyConsumptionIncome = array('under' => $underPowerIncome, 'correct' => $correctPowerIncome, 'over' => $overPowerIncome);

                //Construction Penalties (in $)
                $safe_penalty_values = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
                $accessCostPenalty = intval($_POST['accessCostPenalty']);
                $archProximityPenalty = intval($_POST['archProximityPenalty']);
                $naturalReserveProximityPenalty = intval($_POST['naturalReserveProximityPenalty']);
                $hiVoltLineDistancePenalty = intval($_POST['hiVoltLineDistancePenalty']);
                if (!in_array($accessCostPenalty, $safe_penalty_values, true)) {$accessCostPenalty = '';}
                if (!in_array($archProximityPenalty, $safe_penalty_values, true)) {$archProximityPenalty = '';}
                if (!in_array($naturalReserveProximityPenalty, $safe_penalty_values, true)) {$naturalReserveProximityPenalty = '';}
                if (!in_array($hiVoltLineDistancePenalty, $safe_penalty_values, true)) {$hiVoltLineDistancePenalty = '';}

                $constructionPenalties = array('access' => $accessCostPenalty, 'arch' => $archProximityPenalty, 'natural' => $naturalReserveProximityPenalty, 'hiVolt' => $hiVoltLineDistancePenalty);

                //Physics
                $safe_physics_values = range(0, 40, 1);
                $safe_physics_values2 = range(1, 100, 1);//for Wind Variance
                $physicsWindMinVal = intval($_POST['physicsWindMinVal']);
                $physicsWindMaxVal = intval($_POST['physicsWindMaxVal']);
                $physicsWindMeanVal = intval($_POST['physicsWindMeanVal']);
                $physicsWindVarianceVal = intval($_POST['physicsWindVarianceVal']);
                if (!in_array($physicsWindMinVal, $safe_physics_values, true)) {$physicsWindMinVal = '';}
                if (!in_array($physicsWindMaxVal, $safe_physics_values, true)) {$physicsWindMaxVal = '';}
                if (!in_array($physicsWindMeanVal, $safe_physics_values, true)) {$physicsWindMeanVal = '';}
                if (!in_array($physicsWindVarianceVal, $safe_physics_values2, true)) {$physicsWindVarianceVal = '';}

                $physicsValues = array('min' => $physicsWindMinVal, 'max' => $physicsWindMaxVal, 'mean' => $physicsWindMeanVal, 'variance' => $physicsWindVarianceVal);

                update_post_meta($asset_id, 'wpunity_energyConsumptionIncome', $energyConsumptionIncome);
                update_post_meta($asset_id, 'wpunity_physicsValues', $physicsValues);
                update_post_meta($asset_id, 'wpunity_constructionPenalties', $constructionPenalties);
            } elseif ($assetCatTerm->slug == 'producer') {
                //Producer Options-Costs
                $safe_opt_val = range(3, 250, 1);
                $safe_opt_dmg = range(0.001, 0.02, 0.001);
                $safe_opt_cost = range(1, 10, 1);
                $safe_opt_repaid = range(0.5, 5, 0.5);
                $producerTurbineSizeVal = intval($_POST['producerTurbineSizeVal']);
                $producerDmgCoeffVal = floatval($_POST['producerDmgCoeffVal']);
                $producerCostVal = intval($_POST['producerCostVal']);
                $producerRepairCostVal = floatval($_POST['producerRepairCostVal']);
                if (!in_array($producerTurbineSizeVal, $safe_opt_val, true)) {$producerTurbineSizeVal = '';}
                if (!in_array($producerDmgCoeffVal, $safe_opt_dmg, true)) {$producerDmgCoeffVal = '';}
                if (!in_array($producerCostVal, $safe_opt_cost, true)) {$producerCostVal = '';}
                if (!in_array($producerRepairCostVal, $safe_opt_repaid, true)) {$producerRepairCostVal = '';}

                $producerClassVal = $_POST['producerClassVal'];
                $producerWindSpeedClassVal = floatval($_POST['producerWindSpeedClassVal']);
                $producerMaxPowerVal = floatval($_POST['producerMaxPowerVal']);

                $producerOptCosts = array('size' => $producerTurbineSizeVal, 'dmg' => $producerDmgCoeffVal, 'cost' => $producerCostVal, 'repaid' => $producerRepairCostVal);
                $producerOptGen = array('class' => $producerClassVal, 'speed' => $producerWindSpeedClassVal, 'power' => $producerMaxPowerVal);
                $producerPowerProductionVal = $_POST['producerPowerProductionVal'];

                update_post_meta($asset_id, 'wpunity_producerPowerProductionVal', $producerPowerProductionVal);
                update_post_meta($asset_id, 'wpunity_producerOptCosts', $producerOptCosts);
                update_post_meta($asset_id, 'wpunity_producerOptGen', $producerOptGen);
            }


            //$objFile = $_FILES['objFileInput'];
            $textureFile = $_FILES['textureFileInput'];

            //Upload All files as attachments of asset
            //first upload jpg and get the filename for input at mtl
            $textureFile_id = wpunity_upload_Assetimg($textureFile, $asset_id, $gameSlug);
            $textureFile_filename = basename(get_attached_file($textureFile_id));

            //open mtl file and replace jpg filename
            $mtl_content = file_get_contents($_FILES['mtlFileInput']['tmp_name']);
            $mtl_content = preg_replace("/.*\b" . 'map_Kd' . "\b.*\n/ui", "map_Kd " . $textureFile_filename . "\n", $mtl_content);
            file_put_contents($_FILES['mtlFileInput']['tmp_name'], $mtl_content);
            $mtlFile = $_FILES['mtlFileInput'];
            //upload mtl and get the filename for input at obj
            $mtlFile_id = wpunity_upload_Assetimg($mtlFile, $asset_id, $gameSlug);
            $mtlFile_filename = basename(get_attached_file($mtlFile_id));

            $obj_content = file_get_contents($_FILES['objFileInput']['tmp_name']);
            $obj_content = preg_replace("/.*\b" . 'mtllib' . "\b.*\n/ui", "mtllib " . $mtlFile_filename . "\n", $obj_content);
            file_put_contents($_FILES['objFileInput']['tmp_name'], $obj_content);
            $objFile = $_FILES['objFileInput'];
            $objFile_id = wpunity_upload_Assetimg($objFile, $asset_id, $gameSlug);

            $screenShotFile_id = wpunity_upload_Assetimg64($screenShotFile, $asset_information['post_title'], $asset_id, $gameSlug);

            //Set value of attachment IDs at custom fields
            update_post_meta($asset_id, 'wpunity_asset3d_mtl', $mtlFile_id);
            update_post_meta($asset_id, 'wpunity_asset3d_obj', $objFile_id);
            update_post_meta($asset_id, 'wpunity_asset3d_diffimage', $textureFile_id);
            update_post_meta($asset_id, 'wpunity_asset3d_screenimage', $screenShotFile_id);

            if($scene_id == 0){
                wp_redirect(esc_url(get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id));
            }else{
                wp_redirect(esc_url(get_permalink($editscenePage[0]->ID) . $parameter_scenepass . $scene_id));
            }
            exit;
        }
	}else {

        $asset_new_info = array(
            'ID' => $asset_inserted_id,
            'post_title' => esc_attr(strip_tags($_POST['assetTitle'])),
            'post_content' => esc_attr(strip_tags($_POST['assetDesc'])),
        );

        wp_update_post($asset_new_info);

        $assetCatTerm = get_term_by('id', $assetCatID, 'wpunity_asset3d_cat');
        if ($assetCatTerm->slug == 'consumer') {

            //Energy Consumption
            $safe_cons_values = range(0, 2000, 5);
            $safe_cons_values2 = range(0, 1000, 5);
            $energyConsumptionMinVal = intval($_POST['energyConsumptionMinVal']);
            $energyConsumptionMaxVal = intval($_POST['energyConsumptionMaxVal']);
            $energyConsumptionMeanVal = intval($_POST['energyConsumptionMeanVal']);
            $energyConsumptionVarianceVal = intval($_POST['energyConsumptionVarianceVal']);
            if (!in_array($energyConsumptionMinVal, $safe_cons_values, true)) {
                $energyConsumptionMinVal = '';
            }
            if (!in_array($energyConsumptionMaxVal, $safe_cons_values, true)) {
                $energyConsumptionMaxVal = '';
            }
            if (!in_array($energyConsumptionMeanVal, $safe_cons_values, true)) {
                $energyConsumptionMeanVal = '';
            }
            if (!in_array($energyConsumptionVarianceVal, $safe_cons_values2, true)) {
                $energyConsumptionVarianceVal = '';
            }

            $new_energyConsumption = array('min' => $energyConsumptionMinVal, 'max' => $energyConsumptionMaxVal, 'mean' => $energyConsumptionMeanVal, 'var' => $energyConsumptionVarianceVal);

            update_post_meta($asset_inserted_id, 'wpunity_energyConsumption', $new_energyConsumption);

        } elseif ($assetCatTerm->slug == 'terrain') {
            //Income (in $)
            $safe_income_values = range(-5, 5, 0.5);
            $underPowerIncome = floatval($_POST['underPowerIncomeVal']);
            $correctPowerIncome = floatval($_POST['correctPowerIncomeVal']);
            $overPowerIncome = floatval($_POST['overPowerIncomeVal']);
            if (!in_array($underPowerIncome, $safe_income_values, true)) {
                $underPowerIncome = '';
            }
            if (!in_array($correctPowerIncome, $safe_income_values, true)) {
                $correctPowerIncome = '';
            }
            if (!in_array($overPowerIncome, $safe_income_values, true)) {
                $overPowerIncome = '';
            }

            $new_energyConsumptionIncome = array('under' => $underPowerIncome, 'correct' => $correctPowerIncome, 'over' => $overPowerIncome);

            //Construction Penalties (in $)
            $safe_penalty_values = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
            $accessCostPenalty = intval($_POST['accessCostPenalty']);
            $archProximityPenalty = intval($_POST['archProximityPenalty']);
            $naturalReserveProximityPenalty = intval($_POST['naturalReserveProximityPenalty']);
            $hiVoltLineDistancePenalty = intval($_POST['hiVoltLineDistancePenalty']);
            if (!in_array($accessCostPenalty, $safe_penalty_values, true)) {
                $accessCostPenalty = '';
            }
            if (!in_array($archProximityPenalty, $safe_penalty_values, true)) {
                $archProximityPenalty = '';
            }
            if (!in_array($naturalReserveProximityPenalty, $safe_penalty_values, true)) {
                $naturalReserveProximityPenalty = '';
            }
            if (!in_array($hiVoltLineDistancePenalty, $safe_penalty_values, true)) {
                $hiVoltLineDistancePenalty = '';
            }

            $new_constructionPenalties = array('access' => $accessCostPenalty, 'arch' => $archProximityPenalty, 'natural' => $naturalReserveProximityPenalty, 'hiVolt' => $hiVoltLineDistancePenalty);

            //Physics
            $safe_physics_values = range(0, 40, 1);
            $safe_physics_values2 = range(1, 100, 1);//for Wind Variance
            $physicsWindMinVal = intval($_POST['physicsWindMinVal']);
            $physicsWindMaxVal = intval($_POST['physicsWindMaxVal']);
            $physicsWindMeanVal = intval($_POST['physicsWindMeanVal']);
            $physicsWindVarianceVal = intval($_POST['physicsWindVarianceVal']);
            if (!in_array($physicsWindMinVal, $safe_physics_values, true)) {
                $physicsWindMinVal = '';
            }
            if (!in_array($physicsWindMaxVal, $safe_physics_values, true)) {
                $physicsWindMaxVal = '';
            }
            if (!in_array($physicsWindMeanVal, $safe_physics_values, true)) {
                $physicsWindMeanVal = '';
            }
            if (!in_array($physicsWindVarianceVal, $safe_physics_values2, true)) {
                $physicsWindVarianceVal = '';
            }

            $new_physicsValues = array('min' => $physicsWindMinVal, 'max' => $physicsWindMaxVal, 'mean' => $physicsWindMeanVal, 'variance' => $physicsWindVarianceVal);

            update_post_meta($asset_inserted_id, 'wpunity_energyConsumptionIncome', $new_energyConsumptionIncome);
            update_post_meta($asset_inserted_id, 'wpunity_physicsValues', $new_physicsValues);
            update_post_meta($asset_inserted_id, 'wpunity_constructionPenalties', $new_constructionPenalties);
        } elseif ($assetCatTerm->slug == 'producer') {
            //Producer Options-Costs
            $safe_opt_val = range(3, 250, 1);
            $safe_opt_dmg = range(0.001, 0.02, 0.001);
            $safe_opt_cost = range(1, 10, 1);
            $safe_opt_repaid = range(0.5, 5, 0.5);
            $producerTurbineSizeVal = intval($_POST['producerTurbineSizeVal']);
            $producerDmgCoeffVal = floatval($_POST['producerDmgCoeffVal']);
            $producerCostVal = intval($_POST['producerCostVal']);
            $producerRepairCostVal = floatval($_POST['producerRepairCostVal']);
            if (!in_array($producerTurbineSizeVal, $safe_opt_val, true)) {
                $producerTurbineSizeVal = '';
            }
            if (!in_array($producerDmgCoeffVal, $safe_opt_dmg, true)) {
                $producerDmgCoeffVal = '';
            }
            if (!in_array($producerCostVal, $safe_opt_cost, true)) {
                $producerCostVal = '';
            }
            if (!in_array($producerRepairCostVal, $safe_opt_repaid, true)) {
                $producerRepairCostVal = '';
            }

            $producerClassVal = $_POST['producerClassVal'];
            $producerWindSpeedClassVal = floatval($_POST['producerWindSpeedClassVal']);
            $producerMaxPowerVal = floatval($_POST['producerMaxPowerVal']);

            $new_producerOptCosts = array('size' => $producerTurbineSizeVal, 'dmg' => $producerDmgCoeffVal, 'cost' => $producerCostVal, 'repaid' => $producerRepairCostVal);
            $new_producerOptGen = array('class' => $producerClassVal, 'speed' => $producerWindSpeedClassVal, 'power' => $producerMaxPowerVal);
            $new_producerPowerProductionVal = $_POST['producerPowerProductionVal'];

            update_post_meta($asset_inserted_id, 'wpunity_producerPowerProductionVal', $new_producerPowerProductionVal);
            update_post_meta($asset_inserted_id, 'wpunity_producerOptCosts', $new_producerOptCosts);
            update_post_meta($asset_inserted_id, 'wpunity_producerOptGen', $new_producerOptGen);
        }

        if($scene_id == 0){
            wp_redirect(esc_url(get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id));
        }else{
            wp_redirect(esc_url(get_permalink($editscenePage[0]->ID) . $parameter_scenepass . $scene_id));
        }
        exit;
    }
}
get_header(); ?>

    <div class="EditPageHeader">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Add category title & icon"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string; ?></span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>" title="Go back to Project editor">Project Editor</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">Asset Manager</span></li>
    </ul>

    <?php
    $breacrumbsTitle = ($create_new == 1 ? "Create a new asset" : "Edit an existing asset");
    $dropdownHeading = ($create_new == 1 ? "Select a category" : "Category");
?>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light"><span><?php echo $breacrumbsTitle; ?></span></h2>

    <form name="3dAssetForm" id="3dAssetForm" method="POST" enctype="multipart/form-data">

        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                <h3 class="mdc-typography--title"><?php echo $dropdownHeading; ?></h3>
                <div id="category-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                    <i class="material-icons mdc-theme--text-hint-on-light">label</i>&nbsp;

					<?php
					$myGameType = 1;
					$all_game_types = get_the_terms( $project_id, 'wpunity_game_type' );
					$game_type_slug = $all_game_types[0]->slug;

					if($game_type_slug == 'energy_games'){
						$myGameType=2;
					}

					$args = array(
						'hide_empty' => false,
						'meta_query' => array(
							array(
								'key'       => 'wpunity_assetcat_gamecat',
								'value'     => $myGameType,
								'compare'   => '='
							)
						));

					$cat_terms = get_terms('wpunity_asset3d_cat', $args);
                    $saved_term = wp_get_post_terms( $asset_checked_id, 'wpunity_asset3d_cat' );
                    ?>

					<?php if($create_new == 1) { ?>
                        <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">No category selected</span>
					<?php } else { ?>
                        <span data-cat-desc="<?php echo $saved_term[0]->description; ?>" data-cat-slug="<?php echo $saved_term[0]->slug; ?>" data-cat-id="<?php echo $saved_term[0]->term_id; ?>" id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2"><?php echo $saved_term[0]->name; ?></span>
					<?php } ?>


                    <div class="mdc-simple-menu mdc-select__menu">
                        <ul class="mdc-list mdc-simple-menu__items">

                            <li class="mdc-list-item mdc-theme--text-hint-on-light" role="option" aria-disabled="true" tabindex="-1" style="pointer-events: none;">
                                No category selected
                            </li>

							<?php foreach ( $cat_terms as $term ) { ?>

                                <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" data-cat-desc="<?php echo $term->description; ?>" data-cat-slug="<?php echo $term->slug; ?>" id="<?php echo $term->term_id?>" tabindex="0">
									<?php echo $term->name; ?>
                                </li>

							<?php } ?>

                        </ul>
                    </div>
                </div>

                <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light" id="categoryDescription"> </span>
            </div>
            <input id="termIdInput" type="hidden" name="term_id" value="">


        </div>

        <?php //Check if its new/saved and get data for TITLE/DESCRIPTION
        if($create_new == 1){
            $asset_title_saved = "";
            $asset_title_label = "Enter a title for your asset";
            $asset_desc_saved = "";
            $asset_desc_label = "Add a description";
        }else{
            $asset_title_saved = get_the_title( $asset_checked_id );
            $asset_title_label = "Edit the title of your asset";
            $asset_desc_saved = get_post_field('post_content', $asset_checked_id);
            $asset_desc_label = "Edit description";
        }
        ?>

        <div class="mdc-layout-grid" id="informationPanel" style="display: none;">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                <h3 class="mdc-typography--title">Information</h3>

                <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input id="assetTitle" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="assetTitle"
                           aria-controls="title-validation-msg" required minlength="3" maxlength="25" style="box-shadow: none; border-color:transparent;" value="<?php echo $asset_title_saved; ?>">
                    <label for="assetTitle" class="mdc-textfield__label">
                        <?php echo $asset_title_label; ?>
                </div>
                <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                   id="title-validation-msg">
                    Between 3 - 25 characters
                </p>

                <div id="assetDescription" class="mdc-textfield mdc-textfield--multiline" data-mdc-auto-init="MDCTextfield">
                    <textarea id="multi-line" class="mdc-textfield__input" rows="6" cols="40" style="box-shadow: none;" name="assetDesc" form="3dAssetForm"><?php echo $asset_desc_saved; ?></textarea>
                    <label for="multi-line" class="mdc-textfield__label"><?php echo $asset_desc_label; ?></label>
                </div>

                <!-- FALLBACK: Use this if you cannot validate the above on submit -->
                <!--<select title="I am a title" class="mdc-select" required>
					<option value="" default selected>Pick a food</option>
					<option value="grains">Bread, Cereal, Rice, and Pasta</option>
					<option value="vegetables">Vegetables</option>
					<optgroup label="Fruits">
						<option value="apple">Apple</option>
						<option value="oranges">Orange</option>
						<option value="banana">Banana</option>
					</optgroup>
					<option value="dairy">Milk, Yogurt, and Cheese</option>
					<option value="meat">Meat, Poultry, Fish, Dry Beans, Eggs, and Nuts</option>
					<option value="fats">Fats, Oils, and Sweets</option>
				</select>-->

                <hr class="WhiteSpaceSeparator">

                <div id="doorDetailsPanel">
                    <h3 class="mdc-typography--title">Door options</h3>

                    <div class="mdc-layout-grid">

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                            <div id="next-scene-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                                <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Next scene</span>
                                <div class="mdc-simple-menu mdc-select__menu" style="left: 48px; top: 0; transform-origin: center 8px 0; transform: scale(0, 0);">
                                    <ul class="mdc-list mdc-simple-menu__items" style="transform: scale(1, 1);">
                                        <li class="mdc-list-item" role="option" id="scenes" aria-disabled="true">
                                            Next scene
                                        </li>

                                        <li class="mdc-list-item" role="option" id="" tabindex="0">
                                            Dummy
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                            <div id="entry-point-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                                <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Entry point</span>
                                <div class="mdc-simple-menu mdc-select__menu">
                                    <ul class="mdc-list mdc-simple-menu__items">
                                        <li class="mdc-list-item" role="option" id="entryPoints" aria-disabled="true">
                                            Entry point
                                        </li>

                                        <li class="mdc-list-item" role="option" id="" tabindex="0">
                                            Dummy
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <input id="nextSceneInput" type="hidden" name="next_scete_id" value="" disabled>
                        <input id="entryPointInput" type="hidden" name="entry_point_id" value="" disabled>
                    </div>
                </div>

                <div id="poiImgDetailsPanel" style="display: none;">
                    <h3 class="mdc-typography--title">Image POI Details</h3>

                    <div id="poiImgDetailsWrapper">
                        <a id="poiAddFieldBtn" class="mdc-button mdc-button--primary mdc-theme--primary" data-mdc-auto-init="MDCRipple">
                            <i class="material-icons mdc-theme--primary ButtonIcon">add</i> Add Field
                        </a>

                        <hr class="WhiteSpaceSeparator">
                    </div>
                </div>

                <div id="poiVideoDetailsPanel" style="display: none;">
                    <h3 class="mdc-typography--title">Video POI Details</h3>

                    <div id="videoFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label for="videoFileInput"> Select a video</label>
                        <input class="FullWidth" type="file" name="videoFileInput" value="" id="videoFileInput" accept="video/mp4" disabled=""/>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                <h3 class="mdc-typography--title">Object Properties</h3>

                <ul class="RadioButtonList">
                    <li class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="fbxRadio"  name="objectTypeRadio" value="fbx">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="fbxRadio-label" for="fbxRadio" style="margin-bottom: 0;">FBX file</label>
                    </li>
                    <li class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="mtlRadio" checked="" name="objectTypeRadio" value="mtl">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="mtlRadio-label" for="mtlRadio" style="margin-bottom: 0;">MTL & OBJ files</label>
                    </li>
                </ul>

                <div class="mdc-layout-grid">

                    <div id="fbxFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12" style="display: none;">
                        <label for="fbxFileInput"> Select an FBX file</label>
                        <input class="FullWidth" type="file" name="fbxFileInput" value="" id="fbxFileInput"/>
                    </div>

                    <div id="mtlFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label for="mtlFileInput"> Select an MTL file</label>
                        <input class="FullWidth" type="file" name="mtlFileInput" value="" id="mtlFileInput" accept=".mtl"/>
                    </div>

                    <div id="objFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label  for="objFileInput" > Select an OBJ file</label>
                        <input class="FullWidth" type="file" name="objFileInput" value="" id="objFileInput" accept=".obj"/>
                    </div>
                </div>

                <h3 class="mdc-typography--title" id="objectPreviewTitle" style="display: none;">Object Preview</h3>
                <div id="assetPreviewContainer"></div>

                <div class="mdc-layout-grid">

                    <div id="textureFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label for="textureFileInput"> Select a texture</label><br>
                        <img id="texturePreviewImg" style="width:100px; height:100px" src="<?php echo plugins_url( '../images/ic_texture.png', dirname(__FILE__)  ); ?>">
                        <input class="FullWidth" type="file" name="textureFileInput" value="" id="textureFileInput" accept="image/jpeg"/>
                    </div>

                    <div id="sshotFileInputContainer" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <label for="sshotFileInput"> Screenshot</label><br>
                        <img id="sshotPreviewImg" style="width:100px; height:100px" src="<?php echo plugins_url( '../images/ic_sshot.png', dirname(__FILE__)  ); ?>">
                        <input class="FullWidth" type="hidden" name="sshotFileInput" value="" id="sshotFileInput" accept="image/jpeg"/>

                        <a style="display: none;" id="createModelScreenshotBtn" type="button" class="mdc-button mdc-button--primary mdc-theme--primary" data-mdc-auto-init="MDCRipple">Create screenshot</a>
                    </div>

                </div>

            </div>

        </div>

        <?php //Check if its new/saved and get data for Terrain Options
        if($create_new != 1){
            $saved_term = wp_get_post_terms( $asset_checked_id, 'wpunity_asset3d_cat' );
            if($saved_term[0]->slug == 'terrain'){
                $physics = get_post_meta($asset_checked_id,'wpunity_physicsValues',true);
                if($physics) {
                    $mean_speed_wind = $physics['mean'];
                    $var_speed_wind = $physics['variance'];
                    $min_speed_wind = $physics['min'];
                    $max_speed_wind = $physics['max'];
                }
                $energy_income = get_post_meta($asset_checked_id,'wpunity_energyConsumptionIncome',true);
                if($energy_income) {
                    $income_when_overpower = $energy_income['over'];
                    $income_when_correct_power = $energy_income['correct'];
                    $income_when_under_power = $energy_income['under'];
                }
                $constr_pen = get_post_meta($asset_checked_id,'wpunity_constructionPenalties',true);
                if($constr_pen){
                    $access_penalty = $constr_pen['access'];
                    $archaeology_penalty = $constr_pen['arch'];
                    $natural_reserve_penalty = $constr_pen['natural'];
                    $hvdistance_penalty = $constr_pen['hiVolt'];
                }
            }elseif($saved_term[0]->slug == 'consumer'){
                $consumptions = get_post_meta($asset_checked_id,'wpunity_energyConsumption',true);
                if($consumptions) {
                    $min_consumption = $consumptions['min'];
                    $max_consumption = $consumptions['max'];
                    $mean_consumption = $consumptions['mean'];
                    $var_consumption = $consumptions['var'];
                }
            }elseif($saved_term[0]->slug == 'producer') {
                $optCosts = get_post_meta($asset_checked_id,'wpunity_producerOptCosts',true);
                if($optCosts) {
                    $optCosts_size = $optCosts['size'];
                    $optCosts_dmg = $optCosts['dmg'];
                    $optCosts_cost = $optCosts['cost'];
                    $optCosts_repaid = $optCosts['repaid'];
                }
                $optGen = get_post_meta($asset_checked_id,'wpunity_producerOptGen',true);
                if($optGen) {
                    $optGen_class = $optGen['class'];
                    $optGen_speed = $optGen['speed'];
                    $optGen_power = $optGen['power'];
                }
            }


        }
        ?>

        <div id="terrainPanel" class="mdc-layout-grid" style="display: none;">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                <h3 class="mdc-typography--title">Physics</h3>
                <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
                    Change the terrain physics properties.
                </span>

                <br>

                <label for="wind-speed-range-label" class="mdc-typography--subheading2">Wind Speed Range:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="wind-speed-range-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="wind-speed-range"></div>
                <input type="hidden" id="physicsWindMinVal" name="physicsWindMinVal" value="" disabled>
                <input type="hidden" id="physicsWindMaxVal" name="physicsWindMaxVal" value="" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="wind-mean-slider-label" class="mdc-typography--subheading2">Wind Speed Mean:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="wind-mean-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="wind-mean-slider"></div>
                <input type="hidden" id="physicsWindMeanVal" name="physicsWindMeanVal" value="" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="wind-variance-slider-label" class="mdc-typography--subheading2">Wind Variance:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="wind-variance-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="wind-variance-slider"></div>
                <input type="hidden" id="physicsWindVarianceVal" name="physicsWindVarianceVal" value="" disabled="">

            </div>

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                <h3 class="mdc-typography--title">Income</h3>

                <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
                    Applied to all producer components that are placed on this terrain.
                </span>

                <br>

                <label for="over-power-income-slider-label" class="mdc-typography--subheading2">Over Power Income:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="over-power-income-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="over-power-income-slider"></div>
                <input type="hidden" id="overPowerIncomeVal" name="overPowerIncomeVal" value="" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="correct-power-income-slider-label" class="mdc-typography--subheading2">Correct Power Income:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="correct-power-income-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="correct-power-income-slider"></div>
                <input type="hidden" id="correctPowerIncomeVal" name="correctPowerIncomeVal" value="" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="under-power-income-slider-label" class="mdc-typography--subheading2">Under Power Income:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="under-power-income-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="under-power-income-slider"></div>
                <input type="hidden" id="underPowerIncomeVal" name="underPowerIncomeVal" value="" disabled>

                <h3 class="mdc-typography--title">Construction Penalties (in $)</h3>

                <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
                    Construction penalties apply for consumers and producers that are placed on this terrain.
                </span>
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                            <input title="Access cost penalty" id="accessCostPenalty" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="accessCostPenalty"
                                   aria-controls="accessCostPenalty-validation-msg" value="<?php echo $access_penalty; ?>" required min="0" max="10" minlength="1" maxlength="2" style="box-shadow: none; border-color:transparent;" disabled="">
                            <label for="accessCostPenalty" class="mdc-textfield__label">
                                Access Cost
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                            <input title="Archaeological site proximity penalty" id="archProximityPenalty" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="archProximityPenalty"
                                   aria-controls="archProximityPenalty-validation-msg" value="<?php echo $archaeology_penalty; ?>" required min="0" max="10" minlength="1" maxlength="2" style="box-shadow: none; border-color:transparent;" disabled="">
                            <label for="archProximityPenalty" class="mdc-textfield__label">
                                Arch. site proximity
                        </div>
                    </div>

                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                            <input title="Natural reserve proximity penalty" id="naturalReserveProximityPenalty" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="naturalReserveProximityPenalty"
                                   aria-controls="naturalReserveProximityPenalty-validation-msg" value="<?php echo $natural_reserve_penalty; ?>" required min="0" max="10" minlength="1" maxlength="2" style="box-shadow: none; border-color:transparent;" disabled="">
                            <label for="naturalReserveProximityPenalty" class="mdc-textfield__label">
                                Natural reserve proximity
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
                        <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                            <input title="Distance from High Voltage lines penalty" id="hiVoltLineDistancePenalty" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="hiVoltLineDistancePenalty"
                                   aria-controls="hiVoltLineDistancePenalty-validation-msg" value="<?php echo $hvdistance_penalty; ?>" required min="0" max="10" minlength="1" maxlength="2" style="box-shadow: none; border-color:transparent;" disabled="">
                            <label for="hiVoltLineDistancePenalty" class="mdc-textfield__label">
                                Hi-Voltage line distance
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div id="consumerPanel" class="mdc-layout-grid" style="display: none;">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                <h3 class="mdc-typography--title">Energy Consumption</h3>

                <label for="energy-consumption-range-label" class="mdc-typography--subheading2">Energy Consumption Range:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="energy-consumption-range-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="energy-consumption-range"></div>
                <input type="hidden" id="energyConsumptionMinVal" name="energyConsumptionMinVal" value="<?php echo $min_consumption; ?>" disabled>
                <input type="hidden" id="energyConsumptionMaxVal" name="energyConsumptionMaxVal" value="<?php echo $max_consumption; ?>" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="energy-consumption-mean-slider-label" class="mdc-typography--subheading2">Energy Consumption Mean:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="energy-consumption-mean-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="energy-consumption-mean-slider"></div>
                <input type="hidden" id="energyConsumptionMeanVal" name="energyConsumptionMeanVal" value="<?php echo $mean_consumption; ?>" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="energy-consumption-variance-slider-label" class="mdc-typography--subheading2">Energy Consumption Variance:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" type="text" id="energy-consumption-variance-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="energy-consumption-variance-slider"></div>
                <input type="hidden" id="energyConsumptionVarianceVal" name="energyConsumptionVarianceVal" value="<?php echo $var_consumption; ?>" disabled="">

            </div>

            <!--<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

				<h3 class="mdc-typography--title">Energy Consumption Cost (in $)</h3>

				<div class="mdc-layout-grid">

					<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
						<div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
							<input title="Underpower cost" id="underPowerCost" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="underPowerCost"
								   aria-controls="underPowerCost-validation-msg" value="0.5" step="0.5" required min="-5" max="5" minlength="1" maxlength="1" style="box-shadow: none; border-color:transparent;" disabled="">
							<label for="underPowerCost" class="mdc-textfield__label">
								Underpowered consumption cost
						</div>
					</div>

					<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
						<div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
							<input title="Normal power cost" id="normalPowerCost" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="normalPowerCost"
								   aria-controls="normalPowerCost-validation-msg" value="1" step="0.5" required min="-5" max="5" minlength="1" maxlength="1" style="box-shadow: none; border-color:transparent;" disabled="">
							<label for="normalPowerCost" class="mdc-textfield__label">
								Normal power consumption cost
						</div>
					</div>

					<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
						<div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
							<input title="Overpower cost" id="overPowerCost" type="number" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="overPowerCost"
								   aria-controls="overPowerCost-validation-msg" value="0" step="0.5" required min="-5" max="5" minlength="1" maxlength="1" style="box-shadow: none; border-color:transparent;" disabled="">
							<label for="overPowerCost" class="mdc-textfield__label">
								Overpowered consumption cost
						</div>
					</div>

				</div>
			</div>-->
        </div>

        <div id="producerPanel" class="mdc-layout-grid" style="display: none;">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                <h3 class="mdc-typography--title">Power Production Chart</h3>

                <div class="PlotContainerStyle">
                    <div id="producer-chart" class="ProducerChartStyle"></div>
                </div>
                <div class="CenterContents">
                    <label class="mdc-typography--subheading2">Select a <b>Power Production</b> value for each <b>Wind Speed</b> value</label>
                </div>
                <div id="powerProductionValuesGroup" class="PowerProductionGroupStyle">
                    <span>0</span>
                    <span>0</span>
                    <span>0</span>
                    <span>0</span>
                    <span>0</span>
                    <span>0</span>
                    <span>1</span>
                    <span>1</span>
                    <span>1</span>
                    <span>1</span>
                    <span>1</span>

                    <span>2</span>
                    <span>2</span>
                    <span>5</span>
                    <span>5</span>
                    <span>5</span>
                    <span>5</span>
                    <span>5</span>
                    <span>5</span>
                    <span>5</span>
                    <span>5</span>
                    <span>5</span>

                    <span>5</span>
                    <span>5</span>
                    <span>5</span>
                    <span>5</span>
                    <span>0</span>
                    <span>0</span>
                </div>

                <div class="PowerProductionGroupStyle">
                    <span>0</span>
                    <span>1</span>
                    <span>2</span>
                    <span>3</span>
                    <span>4</span>
                    <span>5</span>
                    <span>6</span>
                    <span>7</span>
                    <span>8</span>
                    <span>9</span>
                    <span>10</span>

                    <span>11</span>
                    <span>12</span>
                    <span>13</span>
                    <span>14</span>
                    <span>15</span>
                    <span>16</span>
                    <span>17</span>
                    <span>18</span>
                    <span>19</span>
                    <span>20</span>
                    <span>21</span>

                    <span>22</span>
                    <span>23</span>
                    <span>24</span>
                    <span>25</span>
                    <span>26</span>
                    <span>27</span>
                </div>


                <input type="hidden" id="producerPowerProductionVal" name="producerPowerProductionVal" value="" disabled>
            </div>

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                <h3 class="mdc-typography--title">Producer Options</h3>

                <div class="mdc-textfield mdc-textfield--dense FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input title="Producer class" id="producerClassVal" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="producerClassVal"
                           aria-controls="producer-class-validation-msg" value="<?php echo $optGen_class; ?>" required minlength="1" style="box-shadow: none; border-color:transparent;" disabled="">
                    <label for="producerClassVal" class="mdc-textfield__label">
                        Producer class
                </div>

                <hr class="WhiteSpaceSeparator">

                <label for="producer-wind-speed-class-slider-label" class="mdc-typography--subheading2">Wind Speed Class:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" id="producer-wind-speed-class-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="producer-wind-speed-class-slider"></div>
                <input type="hidden" id="producerWindSpeedClassVal" name="producerWindSpeedClassVal" value="" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="producer-max-power-slider-label" class="mdc-typography--subheading2">Max Power:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" id="producer-max-power-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="producer-max-power-slider"></div>
                <input type="hidden" id="producerMaxPowerVal" name="producerMaxPowerVal" value="" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="producer-turbine-size-slider-label" class="mdc-typography--subheading2">Size:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" id="producer-turbine-size-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="producer-turbine-size-slider"></div>
                <input type="hidden" id="producerTurbineSizeVal" name="producerTurbineSizeVal" value="" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="producer-damage-coeff-slider-label" class="mdc-typography--subheading2">Damage Coefficient:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" id="producer-damage-coeff-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="producer-damage-coeff-slider"></div>
                <input type="hidden" id="producerDmgCoeffVal" name="producerDmgCoeffVal" value="" disabled>

            </div>

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                <h3 class="mdc-typography--title">Producer Costs</h3>

                <label for="producer-cost-slider-label" class="mdc-typography--subheading2">Producer Cost:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" id="producer-cost-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="producer-cost-slider"></div>
                <input type="hidden" id="producerCostVal" name="producerCostVal" value="" disabled>

                <hr class="WhiteSpaceSeparator">

                <label for="producer-repair-cost-slider-label" class="mdc-typography--subheading2">Producer Repair Cost:</label>
                <input class="mdc-textfield mdc-textfield__input mdc-theme--accent" id="producer-repair-cost-slider-label" readonly style="box-shadow: none; border-color:transparent; font-weight:bold;">
                <div id="producer-repair-cost-slider"></div>
                <input type="hidden" id="producerRepairCostVal" name="producerRepairCostVal" value="" disabled>

            </div>

        </div>


        <hr class="WhiteSpaceSeparator">

		<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
        <input type="hidden" name="submitted" id="submitted" value="true" />
        <?php $buttonTitleText = ($create_new == 1 ? "Create asset" : "Update asset"); ?>
        <button id="formSubmitBtn" style="margin-bottom: 24px; width: 100%; height: 48px; display: none;" class="mdc-button mdc-elevation--z2 mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" type="submit">
            <?php echo $buttonTitleText; ?>
        </button>

		<?php if($game_type_obj->string == 'Energy') {
			echo "<p>Help: Packet of 3D models for game type: " . $game_type_obj->string . "</p>" ;
			echo "<a href='".plugins_url( '../assets/paketo_3d_v3.zip', dirname(__FILE__)  )."'>Energy Lab 3D models</a>";


		}
		?>
    </form>

    <script type="text/javascript">
        'use strict';

        var mdc = window.mdc;
        mdc.autoInit();

        wpunity_reset_panels();

        var fbxInputContainer = jQuery('#fbxFileInputContainer');
        var fbxInput = jQuery('#fbxFileInput');
        var mtlInputContainer = jQuery('#mtlFileInputContainer');
        var mtlInput = jQuery('#mtlFileInput');
        var objInputContainer = jQuery('#objFileInputContainer');
        var objInput = jQuery('#objFileInput');
        var textureInputContainer = jQuery('#textureFileInputContainer');
        var textureInput = jQuery('#textureFileInput');
        var texturePreviewDefaultImg = document.getElementById("texturePreviewImg").src;
        var sshotInput = jQuery('#sshotFileInput');
        var sshotPreviewDefaultImg = document.getElementById("sshotPreviewImg").src;
        var createScreenshotBtn = jQuery("#createModelScreenshotBtn");

        var mtlFileContent = '';
        var objFileContent = '';
        var textureFileContent = '';
        var fbxFileContent = '';
        var previewRenderer;

        createScreenshotBtn.click(function() {
            wpunity_create_model_sshot(previewRenderer);
        });

        // Flot options
        var plotOptions = {
            axisLabels: {
                show: true
            },
            xaxes: [{
                axisLabel: 'Wind Speed (m/s)'
            }],
            yaxes: [{
                axisLabel: 'Power Production (MW)'
            }],

            xaxis: {
                min: 0,
                max: 27,
                ticks: 27,
                color: '#DDDDDD'
            },
            yaxis: {
                min: -0.5,
                max: 6.5,
                color: '#DDDDDD'
            },
            tooltip: true,
            series: {
                color: "#ff4081",
                lines: {
                    show: true,
                    lineWidth: 4
                },
                points: { show: true },
                shadowSize: 0
            },
            grid: { hoverable: true }

        };
        var plotData = [{ data: [0,0] }];
        for (var i=0; i < 28; i++) {
            plotData[0].data[i] = [i, 5];
        }

        (function() {
            var MDCSelect = mdc.select.MDCSelect;
            var categoryDropdown = document.getElementById('category-select');
            var nextSceneDropdown = document.getElementById('next-scene-select');
            var entryPointDropdown = document.getElementById('entry-point-select');

            var categorySelect = MDCSelect.attachTo(categoryDropdown);
            var nextSceneSelect = MDCSelect.attachTo(nextSceneDropdown);
            var entryPointSelect = MDCSelect.attachTo(entryPointDropdown);

            // This fires on EDIT
            if (jQuery('#currently-selected').attr("data-cat-id")) {

                var selectedCatId = jQuery('#currently-selected').attr("data-cat-id");
                jQuery('#'+ selectedCatId).attr("aria-selected", true);
                jQuery('#category-select').addClass('mdc-select--disabled').attr( "aria-disabled", true);
                loadLayout(false);
            }

            nextSceneDropdown.addEventListener('MDCSelect:change', function() {
                jQuery("#nextSceneInput").attr( "value", nextSceneSelect.selectedOptions[0].getAttribute("id") );
            });

            entryPointDropdown.addEventListener('MDCSelect:change', function() {
                jQuery("#entryPointInput").attr( "value", entryPointSelect.selectedOptions[0].getAttribute("id") );
            });

            categoryDropdown.addEventListener('MDCSelect:change', function() {
                loadLayout(true);
            });


            function loadLayout(createAsset) {

                var item = categorySelect.selectedOptions[0];
                var index = categorySelect.selectedIndex;

                console.log(item, index);

                jQuery("#informationPanel").show();
                jQuery("#formSubmitBtn").show();

                wpunity_reset_panels();

                var descText = document.getElementById('categoryDescription');
                descText.innerHTML = categorySelect.selectedOptions[0].getAttribute("data-cat-desc");

                console.log(categorySelect.selectedOptions[0].getAttribute("id"));

                if(createAsset) {
                    jQuery("#termIdInput").attr( "value", categorySelect.selectedOptions[0].getAttribute("id") );

                } else {
                    jQuery("#termIdInput").attr( "value", selectedCatId );

                }


                var cat = categorySelect.selectedOptions[0].getAttribute("data-cat-slug");

                switch(cat) {
                    // Archaeology cases
                    case 'doors':

                        jQuery("#doorDetailsPanel").show();

                        jQuery("#nextSceneInput").removeAttr("disabled");
                        jQuery("#entryPointInput").removeAttr("disabled");

                        break;
                    case 'dynamic3dmodels':


                        break;
                    case 'pois_imagetext':

                        jQuery("#assetDescription").hide();
                        jQuery("#poiImgDetailsPanel").show();

                        break;
                    case 'pois_video':

                        jQuery("#poiVideoDetailsPanel").show();
                        jQuery("#videoFileInput").removeAttr("disabled");

                        break;

                    // Energy cases
                    case 'terrain':
                        jQuery("#terrainPanel").show();
                        jQuery("#physicsWindMinVal").removeAttr("disabled");
                        jQuery("#physicsWindMaxVal").removeAttr("disabled");
                        jQuery("#physicsWindMeanVal").removeAttr("disabled");
                        jQuery("#physicsWindVarianceVal").removeAttr("disabled");

                        jQuery("#accessCostPenalty").removeAttr("disabled");
                        jQuery("#archProximityPenalty").removeAttr("disabled");
                        jQuery("#naturalReserveProximityPenalty").removeAttr("disabled");
                        jQuery("#hiVoltLineDistancePenalty").removeAttr("disabled");

                        jQuery("#overPowerIncomeVal").removeAttr("disabled");
                        jQuery("#correctPowerIncomeVal").removeAttr("disabled");
                        jQuery("#underPowerIncomeVal").removeAttr("disabled");

                        break;
                    case 'consumer':
                        jQuery("#consumerPanel").show();
                        jQuery("#energyConsumptionMinVal").removeAttr("disabled");
                        jQuery("#energyConsumptionMaxVal").removeAttr("disabled");
                        jQuery("#energyConsumptionMeanVal").removeAttr("disabled");
                        jQuery("#energyConsumptionVarianceVal").removeAttr("disabled");

                        /*jQuery("#overPowerCost").removeAttr("disabled");
                        jQuery("#normalPowerCost").removeAttr("disabled");
                        jQuery("#underPowerCost").removeAttr("disabled");*/


                        break;
                    case 'producer':
                        jQuery("#producerPanel").show();
                        jQuery("#producerAirSpeedVal").removeAttr("disabled");
                        jQuery("#producerPowerProductionVal").removeAttr("disabled");
                        jQuery("#producerTurbineSizeVal").removeAttr("disabled");
                        jQuery("#producerDmgCoeffVal").removeAttr("disabled");
                        jQuery("#producerCostVal").removeAttr("disabled");
                        jQuery("#producerRepairCostVal").removeAttr("disabled");

                        jQuery("#producerClassVal").removeAttr("disabled");
                        jQuery("#producerMaxPowerVal").removeAttr("disabled");
                        jQuery("#producerWindSpeedClassVal").removeAttr("disabled");

                        spanProducerChartLabels();

                        break;
                    default:

                }
            }
        })();

        fbxInput.change(function() {
            document.getElementById("assetPreviewContainer").innerHTML = "";

            if (wpunity_extract_file_extension(fbxInput.val()) === 'fbx') {

            } else {
                document.getElementById("fbxFileInput").value = "";
            }
        });

        mtlInput.click(function() {
            document.getElementById("mtlFileInput").value = "";
            wpunity_read_file('', 'mtl', wpunity_load_file_callback);
            wpunity_reset_sshot_field();
        });
        mtlInput.change(function() {
            document.getElementById("assetPreviewContainer").innerHTML = "";

            if (wpunity_extract_file_extension(mtlInput.val()) === 'mtl') {
                wpunity_read_file(document.getElementById('mtlFileInput').files[0], 'mtl', wpunity_load_file_callback);
            }
        });

        objInput.click(function() {
            document.getElementById("objFileInput").value = "";
            wpunity_read_file('', 'obj', wpunity_load_file_callback);
            wpunity_reset_sshot_field();
        });
        objInput.change(function() {
            document.getElementById("assetPreviewContainer").innerHTML = "";

            if (wpunity_extract_file_extension(objInput.val()) === 'obj') {
                wpunity_read_file(document.getElementById('objFileInput').files[0], 'obj', wpunity_load_file_callback);
            }
        });

        textureInput.click(function() {
            document.getElementById("textureFileInput").value = "";
            jQuery("#texturePreviewImg").attr('src', texturePreviewDefaultImg);
            textureFileContent = '';
            document.getElementById("assetPreviewContainer").innerHTML = "";
            previewRenderer = wu_3d_view_main('before', '', mtlFileContent, objFileContent, '', document.getElementById('assetTitle').value, 'assetPreviewContainer');
        });
        textureInput.change(function() {
            document.getElementById("assetPreviewContainer").innerHTML = "";

            if (wpunity_extract_file_extension(textureInput.val()) === 'jpg') {
                wpunity_read_file(document.getElementById('textureFileInput').files[0], 'texture', wpunity_load_file_callback);
            }
        });

        function wpunity_create_model_sshot(renderer) {
            document.getElementById("sshotPreviewImg").src = renderer.domElement.toDataURL("image/jpeg");
            document.getElementById("sshotFileInput").value = renderer.domElement.toDataURL("image/jpeg");
        }

        function wpunity_reset_sshot_field() {
            document.getElementById("sshotPreviewImg").src = sshotPreviewDefaultImg;
            document.getElementById("sshotFileInput").value = "";
            createScreenshotBtn.hide();
            jQuery("#objectPreviewTitle").hide();
        }

        jQuery( function() {

            // FBX / MTL Toggles
            jQuery( "input[name=objectTypeRadio]" ).click(function() {

                var objectType = jQuery('input[name=objectTypeRadio]:checked').val();

                if (objectType === 'fbx') {
                    wpunity_clear_asset_files();
                    fbxInputContainer.show();
                    mtlInputContainer.hide();
                    objInputContainer.hide();
                }
                else if (objectType === 'mtl') {
                    wpunity_clear_asset_files();
                    fbxInputContainer.hide();
                    mtlInputContainer.show();
                    objInputContainer.show();
                }
            });


            // Sliders OLD
            //var windSpeedRangeSlider = wpunity_create_slider_component("#wind-speed-range", true, {min: 0, max: 40, values:[0, 40], valIds:["#physicsWindMinVal", "#physicsWindMaxVal" ], units:"m/sec"});
            //var windMeanSlider = wpunity_create_slider_component("#wind-mean-slider", false, {min: 0, max: 40, value: 14, valId:"#physicsWindMeanVal", units:"m/sec"});
            //var windVarianceSlider = wpunity_create_slider_component("#wind-variance-slider", false, {min: 1, max: 100, value: 30, valId:"#physicsWindVarianceVal", units:""});

            var minspeed_value = <?php echo json_encode($min_speed_wind);?>;
            var maxspeed_value = <?php echo json_encode($max_speed_wind);?>;
            var meanspeed_value = <?php echo json_encode($mean_speed_wind);?>;
            var varspeed_value = <?php echo json_encode($var_speed_wind);?>;

            var windSpeedRangeSlider = wpunity_create_slider_component("#wind-speed-range", true, {min: 0, max: 40, values:[minspeed_value,maxspeed_value], valIds:["#physicsWindMinVal", "#physicsWindMaxVal" ], units:"m/sec"});
            var windMeanSlider = wpunity_create_slider_component("#wind-mean-slider", false, {min: 0, max: 40, value: meanspeed_value, valId:"#physicsWindMeanVal", units:"m/sec"});
            var windVarianceSlider = wpunity_create_slider_component("#wind-variance-slider", false, {min: 1, max: 100, value: varspeed_value, valId:"#physicsWindVarianceVal", units:""});


            // Change Mean range according to Speed range
            jQuery( "#wind-speed-range" ).on( "slidestop", function( event, ui ) {

                var elemId = "#wind-mean-slider";
                jQuery( elemId ).slider( "option", "min", ui.values[ 0 ] );
                jQuery( elemId ).slider( "option", "max", ui.values[ 1 ] );
                jQuery( elemId ).slider( "option", "values", [ ui.values[ 0 ], ui.values[ 1 ] ] );

                jQuery( elemId+"-label" ).val( jQuery( elemId ).slider( "values", 0 ) + " " + 'm/sec' );

            } );

            var min_cons = <?php echo json_encode($min_consumption);?>;
            var max_cons = <?php echo json_encode($max_consumption);?>;
            var mean_cons = <?php echo json_encode($mean_consumption);?>;
            var var_cons = <?php echo json_encode($var_consumption);?>;

            var energyConsumptionRangeSlider = wpunity_create_slider_component("#energy-consumption-range", true, {min: 0, max: 2000, values:[min_cons, max_cons], valIds:["#energyConsumptionMinVal", "#energyConsumptionMaxVal" ], step: 5, units:"kW"});
            var energyConsumptionMeanSlider = wpunity_create_slider_component("#energy-consumption-mean-slider", false, {min: 50, max: 150, value: mean_cons, valId:"#energyConsumptionMeanVal", step: 5, units:"kW"});
            var energyConsumptionVarianceSlider = wpunity_create_slider_component("#energy-consumption-variance-slider", false, {min: 5, max: 1000, value: var_cons, valId:"#energyConsumptionVarianceVal", step: 5, units:""});


            // Change Mean range according to Speed range
            jQuery( "#energy-consumption-range" ).on( "slidestop", function( event, ui ) {

                var elemId = "#energy-consumption-mean-slider";
                jQuery( elemId ).slider( "option", "min", ui.values[ 0 ] );
                jQuery( elemId ).slider( "option", "max", ui.values[ 1 ] );
                jQuery( elemId ).slider( "option", "values", [ ui.values[ 0 ], ui.values[ 1 ] ] );

                jQuery( elemId+"-label" ).val( jQuery( elemId ).slider( "values", 0 ) + " " + 'kW' );

            } );

            var income_overpower = <?php echo json_encode($income_when_overpower);?>;
            var income_correct = <?php echo json_encode($income_when_correct_power);?>;
            var income_underpower = <?php echo json_encode($income_when_under_power);?>;

            var terrainOverPowerIncomeSlider = wpunity_create_slider_component("#over-power-income-slider", false, {min: -5, max: 5, value: income_overpower, valId:"#overPowerIncomeVal", step: 0.5, units:"$"});
            var terrainCorrectPowerIncomeSlider = wpunity_create_slider_component("#correct-power-income-slider", false, {min: -5, max: 5, value: income_correct, valId:"#correctPowerIncomeVal", step: 0.5, units:"$"});
            var terrainUnderPowerIncomeSlider = wpunity_create_slider_component("#under-power-income-slider", false, {min: -5, max: 5, value: income_underpower, valId:"#underPowerIncomeVal", step: 0.5, units:"$"});

            var opt_size = <?php echo json_encode($optCosts_size);?>;
            var opt_dmg = <?php echo json_encode($optCosts_dmg);?>;
            var opt_cost = <?php echo json_encode($optCosts_cost);?>;
            var opt_repaid = <?php echo json_encode($optCosts_repaid);?>;
            var opt_speed = <?php echo json_encode($optGen_speed);?>;
            var opt_power = <?php echo json_encode($optGen_power);?>;

            /*var producerAirSpeedSlider = wpunity_create_slider_component("#producer-air-speed-slider", false, {min: 0, max: 27, value: 5, valId:"#producerAirSpeedVal", step: 1, units:"m/sec"});
             var producerPowerProductionSlider = wpunity_create_slider_component("#producer-power-production-slider", false, {min: 0, max: 6, value: 1, valId:"#producerPowerProductionVal", step: 1, units:"MW"});*/
            var producerTurbineSizeSlider = wpunity_create_slider_component("#producer-turbine-size-slider", false, {min: 3, max: 250, value: opt_size, valId:"#producerTurbineSizeVal", step: 1, units:"m"});
            var producerDmgCoeffSlider = wpunity_create_slider_component("#producer-damage-coeff-slider", false, {min: 0.001, max: 0.02, value: opt_dmg, valId:"#producerDmgCoeffVal", step: 0.001, units:"Probability / sec"});
            var producerCostSlider = wpunity_create_slider_component("#producer-cost-slider", false, {min: 1, max: 10, value: opt_cost, valId:"#producerCostVal", step: 1, units:"$"});
            var producerRepairCostSlider = wpunity_create_slider_component("#producer-repair-cost-slider", false, {min: 0.5, max: 5, value: opt_repaid, valId:"#producerRepairCostVal", step: 0.5, units:"$"});
            var producerWindSpeedClassSlider = wpunity_create_slider_component("#producer-wind-speed-class-slider", false, {min: 2, max: 20, value: opt_speed, valId:"#producerWindSpeedClassVal", step: 0.01, units:"m/sec"});
            var producerMaxPowerSlider = wpunity_create_slider_component("#producer-max-power-slider", false, {min: 0.001, max: 20, value: opt_power, valId:"#producerMaxPowerVal", step: 0.001, units:"MW"});

            var index = 0;
            jQuery( "#powerProductionValuesGroup > span" ).each(function() {
                // read initial values from markup and remove that
                var value = parseInt( jQuery( this ).text(), 10 );

                jQuery( this ).empty().slider({
                    value: value,
                    min: 0,
                    max: 6,
                    range: "min",
                    animate: true,
                    step: 0.5,
                    orientation: "vertical",
                    sliderId: index,
                    stop: function( event, ui ) {

                        var val = jQuery( this ).slider("option", "value");
                        plotData[0].data[jQuery( this ).slider("option", "sliderId")] = [jQuery( this ).slider("option", "sliderId"), val];
                        jQuery("#producer-chart").plot(plotData, plotOptions).data("plot");

                        jQuery("#producerPowerProductionVal").attr( "value", JSON.stringify(plotData[0].data) );
                        spanProducerChartLabels();

                    },
                    create: function( event, ui ) {

                        var val = jQuery( this ).slider("option", "value");
                        plotData[0].data[jQuery( this ).slider("option", "sliderId")] = [jQuery( this ).slider("option", "sliderId"), val];
                        jQuery("#producer-chart").plot(plotData, plotOptions).data("plot");

                        jQuery("#producerPowerProductionVal").attr( "value", JSON.stringify(plotData[0].data) );

                    }
                });

                jQuery( this ).attr("id", "power-production-value-"+index);
                index++;
            });



            // POI Image panels - Add/remove POI inputs
            var poiMaxFields      = 3; // max input boxes allowed
            var poiImgDetailsWrapper         = jQuery("#poiImgDetailsWrapper"); // Fields wrapper
            var addPoiFieldBtn      = jQuery("#poiAddFieldBtn"); // Add button ID
            var i = 0; // Initial text box count

            addPoiFieldBtn.click(function(e){ // On add input button click
                e.preventDefault();
                if(i < poiMaxFields) { // Max input box allowed
                    i++; // Text box increment
                    poiImgDetailsWrapper.append(
                        '<div class="mdc-layout-grid">'+
                        '<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-10">' +
                        '<input type="file" name="poi-input-file-'+i+'" class="FullWidth" value="" accept="image/jpeg"/>' +
                        '<div class="mdc-textfield mdc-form-field FullWidth " data-mdc-auto-init="MDCTextfield">' +
                        '<input id="poi-input-text-'+i+'" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" name="poi-input-text-'+i+'" ' +
                        'aria-controls="poi-input-text-validation-msg" minlength="3" maxlength="25" style="box-shadow: none; border-color:transparent;">' +
                        '<label for="poi-input-text-'+i+'" class="mdc-textfield__label">Enter an image description' +
                        '</div>' +
                        '<p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg" id="title-validation-msg">Between 3 - 25 characters</p></div>' +
                        '<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2"><a href="#" class="remove_field"><i title="Delete field" style="font-size: 36px" class="material-icons">clear</i></a></div></div>'
                    ); // Add input box
                }
                // Run autoInit with noop to suppress warnings.
                mdc.autoInit(document, () => {});
            });

            poiImgDetailsWrapper.on("click",".remove_field", function(e) { // User click on remove text
                e.preventDefault();
                jQuery(this).parent('div').parent('div').remove(); i--;
            })
        } );


        function spanProducerChartLabels() {
            var producerEnergyChart = jQuery("#producer-chart").plot(plotData, plotOptions).data("plot");
            var plotOffset = producerEnergyChart.offset();
            var leData = plotData[0].data;

            var pos;

            if (jQuery("ProducerPlotTooltip")) {
                jQuery("div.ProducerPlotTooltip").remove();
            }

            for (var i = 0; i < leData.length; i++) {
                pos = producerEnergyChart.p2c({x: leData[i][0], y: leData[i][1]});
                showTooltips(pos.left+plotOffset.left, pos.top+plotOffset.top, leData[i][1], '#CCCCCC');
            }

            function showTooltips(x,y,contents, colour){
                jQuery('<div class="ProducerPlotTooltip">' +  contents + '</div>').css( {
                    position: 'absolute',
                    display: 'none',
                    top: y,
                    left: x,
                    'border-style': 'solid',
                    'border-width': '1px',
                    'border-color': colour,
                    'border-radius': '5px',
                    'background-color': '#ffffff',
                    color: '#262626',
                    padding: '2px'
                }).appendTo("body").fadeIn(200);
            }
        }
    </script>
<?php  get_footer(); ?>