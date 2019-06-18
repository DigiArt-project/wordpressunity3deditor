<div id="scenesInsideVREditor" class="mdc-layout-grid" style="padding:10px;">
    <div class="mdc-layout-grid__inner">
<!-- Scenes -->
<?php
$custom_query_args = array(
    'post_type' => 'wpunity_scene',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'wpunity_scene_pgame',
            'field'    => 'term_id',
            'terms'    => $allScenePGameID,
        ),
    ),
    'orderby' => 'ID',
    'order' => 'DESC',
    /*'paged' => $paged,*/
);

$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;
?>

<?php if ( $custom_query->have_posts() ) :?>
    
        <!--    <span style="font-size:12px;" class="mdc-theme--text-primary-on-light">Scenes</span>-->
        
        <?php while ( $custom_query->have_posts() ) :
            $custom_query->the_post();
            $scene_id = get_the_ID();
            $scene_title = get_the_title();
            $scene_desc = get_the_content();
            $is_regional = get_post_meta($scene_id,'wpunity_isRegional', true);
            $current_card_bg = $current_scene_id == $scene_id ? 'mdc-theme--primary-light-bg' : '';
            $scene_type = get_post_meta( $scene_id, 'wpunity_scene_metatype', true );
            
            if($scene_type !== 'menu' && $scene_type !== 'credits') {
                ?>
                
                <div id="scene-<?php echo $scene_id; ?>" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2 SceneCardContainer">
                    <div class="sceneTab mdc-card mdc-theme--background <?php echo $current_card_bg;?> ">
                        <div class="SceneThumbnail">
                            <?php
                            
                            $default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true ); //=true Default scene - NOT DELETE-ABLE
                            
                            //create permalink depending the scene yaml category
                            $edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
                            if($scene_type == 'sceneExam2d' ||  $scene_type == 'sceneExam3d'){$edit_scene_page_id = $editsceneExamPage[0]->ID;}
                            $edit_page_link     = esc_url( get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . $scene_type );
                            ?>
                            <a href="<?php echo $edit_page_link; ?>">
                                
                                <?php if(has_post_thumbnail($scene_id)) { ?>
                                    
                                    <?php echo get_the_post_thumbnail( $scene_id ); ?>
                                
                                <?php } else { ?>
                                    
                                    <div class="DisplayBlock mdc-theme--primary-bg CenterContents">
                                        <i style="font-size: 34px; padding-top: 10px;" class="material-icons mdc-theme--text-icon-on-background">landscape</i>
                                    </div>
                                
                                <?php } ?>
                            </a>
                        </div>
                        <section class="" style="padding:2px;">
                            
                            <span id="<?php echo $scene_id;?>-title" class="cardTitle mdc-card__title mdc-typography--title"
                                style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo $scene_title; ?>">
                                <a class="mdc-theme--primary" href="<?php echo $edit_page_link; ?>"><?php echo $scene_title; ?></a>
                                <?php if ($is_regional) { ?>
                                    <i title="Regional scene" class="material-icons AlignIconToBottom CursorDefault mdc-theme--primary" style="float: right;">public</i>
                                <?php } ?>
                            </span>
                            
                            <span class="cardDescription mdc-card__subtitle mdc-theme--text-secondary-on-light SceneCardDescriptionStyle">
                                            &#8203;(<?php echo $scene_desc; ?>)
                                        </span>
                        
                        </section>
    
    
    
                        
                        
                        
                        
                        
                        <section class="mdc-card__actions">
                            <?php if (!$default_scene) { ?>
                                <a id="deleteSceneBtn" data-mdc-auto-init="MDCRipple" title="Delete scene" class="mdc-button mdc-button--compact mdc-card__action" onclick="deleteScene(<?php echo $scene_id; ?>)">DELETE</a>
                            <?php } ?>
                            
                            
<!--                            <a data-mdc-auto-init="MDCRipple" title="Edit scene" class="mdc-button mdc-button--compact mdc-card__action mdc-button--primary" href="--><?php //echo $edit_page_link; ?><!--">EDIT</a>-->
                        </section>
                    </div>
                </div>
            <?php } ?>
        <?php endwhile;?>
        
        <!--ADD NEW SCENE-->
        <?php if($game_type_obj->string !== "Energy") { ?>

            <div id="add-new-scene-card" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2 SceneCardContainer">
                <form name="create_new_scene_form" action="" id="create_new_scene_form" method="POST" enctype="multipart/form-data">
                    <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                    <div class="mdc-card mdc-theme--secondary-light-bg">
                        
                        <section class="mdc-card__primary" style="padding:8px;">
                            
                            <span class="mdc-card__title mdc-typography--title"
                                style="font-size:14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; " title="Add new">
                                <i class="material-icons AlignIconToMiddle" style="font-size:14px;">add</i>
                                Add new scene
                            </span>
                            
                            <!--Title-->
                            <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield" style="padding:0px; height:25px;">
                                <input id="title" name="scene-title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-secondary-light"
                                       aria-controls="title-validation-msg" required minlength="3" maxlength="25" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                                <label for="title" class="mdc-textfield__label" style="font-size:12px;"> Enter a scene title</label>
                                <div class="mdc-textfield__bottom-line"></div>
                            </div>
                            
<!--                            <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"-->
<!--                               id="title-validation-msg" style="font-size:12px;">-->
<!--                                Between 3 - 25 characters-->
<!--                            </p>-->
                            
                            <!--Description-->
<!--                            <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">-->
<!--                                <input id="desc" name="scene-description" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-secondary-light"-->
<!--                                       maxlength="50" aria-controls="desc-validation-msg" style="border: none; font-size:12px; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">-->
<!--                                <label for="desc" class="mdc-textfield__label" style="font-size:12px;"> Enter a scene description </label>-->
<!--                                <div class="mdc-textfield__bottom-line"></div>-->
<!--                            </div>-->
<!--                            -->
<!--                            <br>-->
                        </section>
                        
                        <section class="mdc-card__primary" style="display:none">
                            <?php if($game_type_obj->string != "Archaeology"){ ?>
                                <label class="mdc-typography--subheading2 mdc-theme--text-primary">Scene type</label>
                            <?php } ?>
                            <!--Scene Type-->
                            <?php if($game_type_obj->string === "Chemistry"){ ?>
                                <ul>
                                    <li class="mdc-form-field">
                                        <div class="mdc-radio">
                                            <input class="mdc-radio__native-control" type="radio" id="sceneType2DRadio" name="sceneTypeRadio" value="2d">
                                            <div class="mdc-radio__background">
                                                <div class="mdc-radio__outer-circle"></div>
                                                <div class="mdc-radio__inner-circle"></div>
                                            </div>
                                        </div>
                                        <label id="sceneType2DRadio-label" for="sceneType2DRadio" style="padding: 0; margin: 0;">Molecule Naming</label>
                                    </li>
                                    &nbsp;
                                    <li class="mdc-form-field">
                                        <div class="mdc-radio">
                                            <input class="mdc-radio__native-control" type="radio" id="sceneType3DRadio" checked="" name="sceneTypeRadio" value="3d">
                                            <div class="mdc-radio__background">
                                                <div class="mdc-radio__outer-circle"></div>
                                                <div class="mdc-radio__inner-circle"></div>
                                            </div>
                                        </div>
                                        <label id="sceneType3DRadio-label" for="sceneType3DRadio" style="padding: 0; margin: 0;">Molecule Construction</label>
                                    </li>
                                    &nbsp;
                                    <li class="mdc-form-field">
                                        <div class="mdc-radio">
                                            <input class="mdc-radio__native-control" type="radio" id="sceneTypeLabRadio" checked="" name="sceneTypeRadio" value="lab">
                                            <div class="mdc-radio__background">
                                                <div class="mdc-radio__outer-circle"></div>
                                                <div class="mdc-radio__inner-circle"></div>
                                            </div>
                                        </div>
                                        <label id="sceneTypeLabRadio-label" for="sceneTypeLabRadio" style="padding: 0; margin: 0;">Lab</label>
                                    </li>
                                </ul>
                            <?php } ?>
                            
                            <?php if($game_type_obj->string === "Energy"){ ?>
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox" id="regional-checkbox-component">
                                        <input name="regionalSceneCheckbox" type="checkbox" id="regional-scene-checkbox" class="mdc-checkbox__native-control">
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                    </div>
                                    <label class="" for="regional-scene-checkbox" style="padding: 0; margin: 0;">Regional scene</label>
                                </div>
                            <?php } ?>
                        </section>
                        
                        <section class="mdc-card__primary" style="padding:0px;">
                            <button style="float:right; background-image:none;" class="mdc-button--raised mdc-button mdc-button-primary"
                                    data-mdc-auto-init="MDCRipple" type="submit">
                                ADD NEW
                            </button>
                        
                        </section>
                    </div>
                </form>
            </div>
        
        <?php } ?>
        
        <!--Delete Scene Dialog-->
        <aside id="delete-dialog"
               class="mdc-dialog"
               role="alertdialog"
               style="z-index: 1000;"
               aria-labelledby="Delete scene dialog"
               aria-describedby="You can delete the selected from the current game project" data-mdc-auto-init="MDCDialog">
            <div class="mdc-dialog__surface">
                <header class="mdc-dialog__header">
                    <h2 id="delete-dialog-title" class="mdc-dialog__header__title">
                        Delete scene?
                    </h2>
                </header>
                <section id="delete-dialog-description" class="mdc-dialog__body">
                    Are you sure you want to delete this scene? There is no Undo functionality once you delete it.
                </section>
                
                <section id="delete-scene-dialog-progress-bar" class="CenterContents mdc-dialog__body" style="display: none;">
                    <h3 class="mdc-typography--title">Deleting...</h3>
                    
                    <div class="progressSlider">
                        <div class="progressSliderLine"></div>
                        <div class="progressSliderSubLine progressIncrease"></div>
                        <div class="progressSliderSubLine progressDecrease"></div>
                    </div>
                </section>
                
                <footer class="mdc-dialog__footer">
                    <a class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button" id="deleteSceneDialogCancelBtn">Cancel</a>
                    <a class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-button--raised" id="deleteSceneDialogDeleteBtn">Delete</a>
                </footer>
            </div>
            <div class="mdc-dialog__backdrop"></div>
        </aside>
    
    
<!--    </div>-->
<!--    </div>-->
<?php endif;
wp_reset_query();
?>



<!-- Game Setting Scenes -->
<?php
$custom_query_args = array(
    'post_type' => 'wpunity_scene',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'wpunity_scene_pgame',
            'field'    => 'term_id',
            'terms'    => $allScenePGameID,
        ),
    ),
    'orderby' => 'ID',
    'order' => 'DESC',
    /*'paged' => $paged,*/
);

$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;
?>


    <?php if ( $custom_query->have_posts() ) :?>
        
<!--        <span style="font-size:12px;" class="mdc-theme--text-primary-on-light">Game settings</span>-->
            
            <?php while ( $custom_query->have_posts() ) :
                $custom_query->the_post();
                $scene_id = get_the_ID();
                $scene_title = get_the_title();
                $scene_desc = get_the_content();
                
                $current_card_bg = $current_scene_id == $scene_id ? 'mdc-theme--primary-light-bg' : '';
                
                $scene_type = get_post_meta( $scene_id, 'wpunity_scene_metatype', true );
                
                if($scene_type == 'menu' || $scene_type == 'credits') { ?>
                    
                    <div id="scene-<?php echo $scene_id; ?>" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2 SceneCardContainer">
                        
                        <div class="sceneTab mdc-card mdc-theme--background <?php echo $current_card_bg;?> ">
                            
                            <div class="SceneThumbnail">
                                <?php
                                
                                $default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true ); //=true Default scene - NOT DELETE-ABLE
                                $scene_type    = get_post_meta( $scene_id, 'wpunity_scene_metatype', true ); //=menu,scene,credits - EDITABLE
                                
                                //create permalink depending the scene yaml category
                                $edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
                                if($scene_type == 'sceneExam2d' ||  $scene_type == 'sceneExam3d'){$edit_scene_page_id = $editsceneExamPage[0]->ID;}
                                $edit_page_link     = esc_url( get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . $scene_type );
                                ?>
                                <a href="<?php echo $edit_page_link; ?>">
                                    
                                    <?php if(has_post_thumbnail($scene_id)) { ?>
                                        
                                        <?php echo get_the_post_thumbnail( $scene_id ); ?>
                                    
                                    <?php } else { ?>
                                        
                                        <div style="" class="DisplayBlock mdc-theme--primary-bg CenterContents">
                                            <i style="font-size: 34px; padding-top: 10px;" class="material-icons mdc-theme--text-icon-on-background">landscape</i>
                                        </div>
                                    
                                    <?php } ?>
                                </a>
                            </div>
                            <section class="" style="padding:2px;">
                                            <span id="<?php echo $scene_id;?>-title" class="cardTitle mdc-card__title mdc-typography--title"
                                                  style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo $scene_title; ?>">
                                                <a class="mdc-theme--primary" href="<?php echo $edit_page_link; ?>"><?php echo $scene_title; ?></a>
                                            </span>
                                <span class="cardDescription mdc-card__subtitle mdc-theme--text-secondary-on-light SceneCardDescriptionStyle">
                                                &#8203;(<?php echo $scene_desc; ?>)
                                            </span>
                            
                            </section>
                        
                        </div>
                    </div>
                
                
                <?php } ?>
            <?php endwhile; ?>
            
            <?php if ($project_scope === 1) {?>
                
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
                    
                    <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">GIO APP KEY</h3>
                    
                    <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                        <input id="app-key" name="app-key" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light mdc-textfield--disabled"
                               style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;" value="<?php if($project_saved_keys['gioID'] != ''){echo $project_saved_keys['gioID'];} ?>">
                        <label for="app-key" class="mdc-textfield__label">APP KEY</label>
                        <div class="mdc-textfield__bottom-line"></div>
                    </div>
                    
                    
                    <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">Experiment ID (GUID)</h3>
                    <form name="create_new_expid_form" action="" id="create_new_expid_form" method="POST" enctype="multipart/form-data">
                        
                        <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                            <input id="exp-id" name="exp-id" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                                   style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;"  value="<?php if($project_saved_keys['expID'] != ''){echo $project_saved_keys['expID'];} ?>">
                            <label for="exp-id" class="mdc-textfield__label">Insert a valid exp id</label>
                            <div class="mdc-textfield__bottom-line"></div>
                        </div>
                        
                        <br>
                        <?php wp_nonce_field('post_nonce', 'post_nonce_field2'); ?>
                        <input type="hidden" name="submitted2" id="submitted2" value="true" />
                        <button id="save-expid-button" type="submit" class="mdc-button mdc-button--primary mdc-button--raised FullWidth" data-mdc-auto-init="MDCRipple"> SAVE</button>
                    </form>
                </div>
            
            <?php } ?>
        
        </div>
    
    <?php endif;
    wp_reset_query();
    ?>
</div>
<!--    End of Scenes-->