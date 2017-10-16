<?php

//---------------------------------------------------------------------
if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else {$parameter_Scenepass = '&wpunity_scene=';}
$parameter_assetpass = $perma_structure ? '?wpunity_asset=' : '&wpunity_asset=';

$scene_id = intval( $_GET['wpunity_scene'] );
$scene_id = sanitize_text_field( $scene_id );

$project_id    = intval( $_GET['wpunity_game'] );
$project_id    = sanitize_text_field( $project_id );
$game_post     = get_post($project_id);
$game_type_obj = wpunity_return_game_type($project_id);

$scene_post = get_post($scene_id);
$sceneTitle = $scene_post->post_name;

//$asset_inserted_id = sanitize_text_field( intval( $_GET['wpunity_asset'] ));
//$asset_post = get_post($asset_inserted_id);
//if($asset_post->post_type == 'wpunity_asset3d') {$create_new = 0;$asset_checked_id=$asset_inserted_id;}





$editgamePage = wpunity_getEditpage('game');
$allGamesPage = wpunity_getEditpage('allgames');
$newAssetPage = wpunity_getEditpage('asset');


$urlforAssetEdit = esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id . '&wpunity_scene=' .$scene_id . '&wpunity_asset=' ); // . asset_id


// Ajax for fetching game's assets within asset browser widget at vr_editor // user must be logged in to work, otherwise ajax has no privileges
$pluginpath = dirname (plugin_dir_url( __DIR__  ));
$pluginpath = str_replace('\\','/',$pluginpath);


wp_enqueue_script( 'ajax-script_filebrowse', $pluginpath.'/js_libs/scriptFileBrowserToolbarWPway.js', array('jquery') );
wp_localize_script( 'ajax-script_filebrowse', 'my_ajax_object_fbrowse', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

wp_enqueue_script( 'ajax-script_savescene', $pluginpath.'/js_libs/save_scene_ajax/wpunity_save_scene_ajax.js', array('jquery') );
wp_localize_script( 'ajax-script_savescene', 'my_ajax_object_savescene',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'scene_id' => $scene_id )
);


//$scene_new_info = array(
//    'ID' => $scene_id,
//    'post_title' => esc_attr(strip_tags()),
//    'post_content' => esc_attr(strip_tags()),
//);
//
//wp_update_post($scene_new_info);



wp_enqueue_script( 'ajax-script_deleteasset', $pluginpath.'/js_libs/delete_ajaxes/delete_asset.js', array('jquery') );
wp_localize_script( 'ajax-script_deleteasset', 'my_ajax_object_deleteasset',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
);


wp_enqueue_media($scene_post->ID);
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

get_header(); ?>

    <style>
        .panel {
            display: none;
        }

        .panel.active {
            display: block;
        }
    </style>

    <!-- START PAGE -->
    <div class="EditPageHeader">
        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light">
            <a title="Back" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>"> <i class="material-icons" style="font-size: 36px; vertical-align: top;" >arrow_back</i> </a>
            <?php echo $game_post->post_title; ?>
        </h1>

        <a class="HeaderButtonStyle mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id . '&wpunity_scene=' .  $scene_id); ?>">
            Add a new 3D asset
        </a>
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="<?php echo $game_type_obj->string; ?>"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string; ?></span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>" title="Go back to Project editor">Project Editor</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">3D Scene Editor</span></li>
    </ul>

    <div class="mdc-toolbar">
        <div class="mdc-toolbar__row" style="min-height: 0;">
            <div class="mdc-toolbar__section mdc-toolbar__section--shrink-to-fit mdc-toolbar__section--align-start">
                <!--<h1 class="mdc-toolbar__title" style="overflow: visible; padding-top:16px;"><?php /*echo $sceneTitle; */?></h1>-->


                <div class="mdc-textfield mdc-textfield--fullwidth--theme-dark mdc-form-field" data-mdc-auto-init="MDCTextfield" style="margin-top: 0; margin-bottom:0;">
                    <input title="Scene title" placeholder="Scene title" value="<?php echo $scene_post->post_title; ?>" id="sceneTitleInput" name="sceneTitleInput" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-dark mdc-toolbar__title"
                           aria-controls="title-validation-msg" minlength="3" required style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                    <p class="mdc-textfield-helptext mdc-textfield-helptext--validation-msg"
                       id="title-validation-msg">
                        Must be at least 3 characters long
                    </p>
                </div>

            </div>
            <div class="mdc-toolbar__section mdc-toolbar__section--align-start">
                <nav id="dynamic-tab-bar" class="mdc-tab-bar mdc-tab-bar--indicator-secondary" role="tablist">
                    <a role="tab" aria-controls="panel-1" class="mdc-tab mdc-tab-active mdc-tab--active" href="#panel-1" >Editor</a>
                    <a role="tab" aria-controls="panel-2" class="mdc-tab" href="#panel-2" >Analytics</a>
                    <span class="mdc-tab-bar__indicator"></span>
                </nav>
            </div>

            <div class="mdc-toolbar__section mdc-toolbar__section--align-end">
                <div id="saveSceneBtn" class="SaveBtnContainerStyle">
                    <a data-mdc-auto-init="MDCRipple" title="Save all changes you made to the current scene"
                       id="save-scene-button"
                       class="mdc-button mdc-button--raised mdc-theme--text-primary-on-dark mdc-theme--secondary-bg">Save scene</a>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="panels">
            <div class="panel active" id="panel-1" role="tabpanel" aria-hidden="false">

                <div class="mdc-layout-grid">

                    <div class="mdc-layout-grid__cell--span-12">

                        <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                            <input value="<?php echo $scene_post->post_content; ?>" id="sceneDescriptionInput" name="sceneDescriptionInput" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                                   minlength="3" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                            <label for="sceneDescriptionInput" class="mdc-textfield__label">
                                Scene description
                            </label>
                        </div>

                    </div>
                </div>
                <div class="mdc-layout-grid">

                    <div class="mdc-layout-grid__cell--span-12">

                        <div id="scene-vr-editor">
							<?php

							$meta_json = get_post_meta($scene_id, 'wpunity_scene_json_input', true);

							// Do not put esc_attr, crashes the universe in 3D
							$sceneToLoad = $meta_json ? $meta_json : file_get_contents( plugins_url()."/wordpressunity3deditor/assets/standard_scene.json");

							// Find scene dir string
							$parentGameSlug = wp_get_object_terms( $scene_id, 'wpunity_scene_pgame')[0]->slug;

							$projectGameSlug = $parentGameSlug;

							$scenefolder = $sceneTitle;
							$gamefolder = $parentGameSlug;
							$sceneID = $scene_id;


							$isAdmin = is_admin() ? 'back' : 'front';

							// vr_editor loads the $sceneToLoad
							require( plugin_dir_path( __DIR__ ) .  '/vr_editor.php' ); ?>
                        </div>
                    </div>
                </div>


                <textarea title="wpunity_scene_json_input" id="wpunity_scene_json_input" style="visibility:hidden; width:900px; max-width:1100px;"
                          name="wpunity_scene_json_input"> <?php echo get_post_meta( $scene_id, 'wpunity_scene_json_input', true ); ?></textarea>

                <input id="wpunity_scene_sshot" type="hidden" value="">

            </div>
            <div class="panel" id="panel-2" role="tabpanel" aria-hidden="true">

                <div style="min-height: 780px;">

                    <iframe src="http://52.59.219.11/?wpunity_game=<?php echo $project_id; ?>&wpunity_scene=<?php echo $scene_id; ?>&scene_type=scene&game_type=<?php echo strtolower($game_type_obj->string);?>" style="min-width: 100%; min-height: inherit;"></iframe>
                </div>
            </div>
        </div>
    </section>



    <script type="text/javascript">
        var mdc = window.mdc;
        mdc.autoInit();

        var dynamicTabBar = window.dynamicTabBar = new mdc.tabs.MDCTabBar(document.querySelector('#dynamic-tab-bar'));
        var dots = document.querySelector('.dots');
        var panels = document.querySelector('.panels');

        dynamicTabBar.preventDefaultOnClick = true;

        dynamicTabBar.listen('MDCTabBar:change', function (t) {
            var dynamicTabBar = t.detail;
            var nthChildIndex = dynamicTabBar.activeTabIndex;

            updatePanel(nthChildIndex);
        });


        function updatePanel(index) {
            var activePanel = panels.querySelector('.panel.active');
            if (activePanel) {
                activePanel.classList.remove('active');
            }
            var newActivePanel = panels.querySelector('.panel:nth-child(' + (index + 1) + ')');
            if (newActivePanel) {
                newActivePanel.classList.add('active');
            }
        }


        /* TODO: Implement this in a smarter way */
        /*window.onbeforeunload = function() {
            return true;
        };*/

    </script>
<?php get_footer(); ?>