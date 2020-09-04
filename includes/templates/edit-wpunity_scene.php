<?php
if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else {$parameter_Scenepass = '&wpunity_scene=';}
$parameter_assetpass = $perma_structure ? '?wpunity_asset=' : '&wpunity_asset=';

// Load VR_Editor Scripts
function load_vreditor_scripts()
{
    $vthreejs = 119;

    wp_enqueue_script('wpunity_load'.$vthreejs.'_threejs');
    wp_enqueue_script('wpunity_load'.$vthreejs.'_CSS2DRenderer');
    wp_enqueue_script('wpunity_load'.$vthreejs.'_CopyShader');
    wp_enqueue_script('wpunity_load'.$vthreejs.'_FXAAShader');
    wp_enqueue_script('wpunity_load'.$vthreejs.'_EffectComposer');
    wp_enqueue_script('wpunity_load'.$vthreejs.'_RenderPass');
    wp_enqueue_script('wpunity_load'.$vthreejs.'_OutlinePass');
    wp_enqueue_script('wpunity_load'.$vthreejs.'_ShaderPass');
    
    // Fixed at 87 (forked of original 87)
    wp_enqueue_script('wpunity_load87_datgui');
    wp_enqueue_script('wpunity_load87_OBJloader');
    wp_enqueue_script('wpunity_load87_MTLloader');
    wp_enqueue_script('wpunity_load87_OrbitControls');
    wp_enqueue_script('wpunity_load87_TransformControls');
    wp_enqueue_script('wpunity_load87_PointerLockControls');
    
    wp_enqueue_script('wpunity_load87_sceneexporterutils');
    wp_enqueue_script('wpunity_load87_scene_importer_utils');
    wp_enqueue_script('wpunity_load87_sceneexporter');
    
    // Colorpicker for the lights
    wp_enqueue_script('wpunity_jscolorpick');
    
    wp_enqueue_style('wpunity_vr_editor');
    wp_enqueue_style('wpunity_vr_editor_filebrowser');
}
add_action('wp_enqueue_scripts', 'load_vreditor_scripts' );


function load_custom_functions_vreditor(){
    wp_enqueue_script('wpunity_vr_editor_environmentals');
    wp_enqueue_script('wpunity_keyButtons');
    wp_enqueue_script('wpunity_rayCasters');
    wp_enqueue_script('wpunity_auxControlers');
    wp_enqueue_script('wpunity_LoaderMulti');
    wp_enqueue_script('wpunity_movePointerLocker');
    wp_enqueue_script('wpunity_addRemoveOne');
    wp_enqueue_script('wpunity_vr_editor_buttons');
    wp_enqueue_script('wpunity_vr_editor_analytics');
    
}
add_action('wp_enqueue_scripts', 'load_custom_functions_vreditor' );
?>

<script type="text/javascript">
    // keep track for the undo-redo function
    post_revision_no = 1;

    // is rendering paused
    isPaused = false;

    // Use lighting or basic materials (basic does not employ light, no shadows)
    window.isAnyLight = true;
</script>


<?php
// Define current path of plugin
$pluginpath = str_replace('\\','/', dirname(plugin_dir_url( __DIR__  )) );

// wpcontent/uploads/
$upload_url = wp_upload_dir()['baseurl'];
$upload_dir = str_replace('\\','/',wp_upload_dir()['basedir']);

// Scene
$current_scene_id = sanitize_text_field( intval( $_GET['wpunity_scene'] ));

// Project
$project_id    = sanitize_text_field( intval( $_GET['wpunity_game'] ) );
$project_post  = get_post($project_id);
$projectSlug   = $project_post->post_name;

// Get if project is : 'Archaeology' or 'Energy' or 'Chemistry'
$project_type = wpunity_return_project_type($project_id)->string;

// Get project type icon
$project_type_icon = wpunity_return_project_type($project_id)->icon;

// Get Joker project id
$joker_project_id = get_page_by_path( strtolower($project_type).'-joker', OBJECT, 'wpunity_game' )->ID;

// Wind Energy Only
if ($project_type === 'Energy') {
    $scenesNonRegional = wpunity_getNonRegionalScenes($_REQUEST['wpunity_game']);
    $scenesMarkerAllInfo = wpunity_get_all_scenesMarker_of_project_fastversion($project_id);
}

// Archaeology only
if ($project_type === 'Archaeology') {
    $doorsAllInfo = wpunity_get_all_doors_of_project_fastversion($project_id);
}

// Get scene content from post
$scene_post = get_post($current_scene_id);

// If empty load default scenes if no content. Do not put esc_attr, crashes the universe in 3D.
$sceneToLoad = $scene_post->post_content ? $scene_post->post_content :
                        wpunity_getDefaultJSONscene(strtolower($project_type));

$sceneTitle = $scene_post->post_name;

// Front End or Back end
$isAdmin = is_admin() ? 'back' : 'front';


$allProjectsPage = wpunity_getEditpage('allgames');
$newAssetPage = wpunity_getEditpage('asset');
$editscenePage = wpunity_getEditpage('scene');
$editscene2DPage = wpunity_getEditpage('scene2D');
$editsceneExamPage = wpunity_getEditpage('sceneExam');

// for vr_editor
$urlforAssetEdit = esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id .
                                '&wpunity_scene=' .$current_scene_id . '&wpunity_asset=' );

// User data
$user_data = get_userdata( get_current_user_id() );
$user_email = $user_data->user_email;


// Shift vars to Javascript side
echo '<script>';
echo 'let pluginPath="'.$pluginpath.'";';
echo 'let uploadDir="'.wp_upload_dir()['baseurl'].'";';
echo 'let projectId="'.$project_id.'";';
echo 'let projectSlug="'.$projectSlug.'";';
echo 'var isAdmin="'.$isAdmin.'";';
echo 'let isUserAdmin="'.current_user_can('administrator').'";';
echo 'let urlforAssetEdit="'.$urlforAssetEdit.'";';
echo 'let scene_id ="'.$current_scene_id.'";';
echo 'let game_type ="'.strtolower($project_type).'";';
echo 'let project_keys ="'.json_encode(wpunity_getProjectKeys($project_id, $project_type)).'";';
echo 'user_email = "'.$user_email.'";';
echo 'current_user_id = "'.get_current_user_id().'";';
echo 'energy_stats = '.json_encode(wpunity_windEnergy_scene_stats($current_scene_id)).';';


if ($project_type === 'Archaeology') {
    echo "var doorsAll=" . json_encode($doorsAllInfo) . ";";
}
if ($project_type === 'Energy') {
    echo "var scenesMarkerAll=" . json_encode($scenesMarkerAllInfo) . ";";
    echo "var scenesNonRegional=".json_encode($scenesNonRegional).";";
}

if ($project_type === 'Chemistry') {
    echo "var scenesTargetChemistry=" . json_encode(wpunity_getAllexams_byGame($joker_project_id, true)) . ";";
}
echo '</script>';


// For analytics
$project_saved_keys = wpunity_getProjectKeys($project_id, $project_type);

// if Virtual Lab
if($project_type === 'Energy' || $project_type === 'Chemistry') {
    if (!array_key_exists('gioID', $project_saved_keys)) {
        echo "<script type='text/javascript'>alert(\"APP KEY not found." .
            " Please make sure that your user account has been registered correctly, " .
            "and you have loaded the correct page\");</script>";
    }
}

// Get 'parent-game' taxonomy with the same slug as Game (in order to show scenes that belong here)
$allScenePGame = get_term_by('slug', $projectSlug, 'wpunity_scene_pgame');

//$ff = fopen('output_merger.txt',"w");
//fwrite($ff, "1:".print_r($project_post)         .chr(13));
//fwrite($ff, "2:".print_r($projectSlug,true));
//fclose($ff);

$allScenePGameID = $allScenePGame->term_id;

if ($project_type === "Chemistry") {
    $analytics_molecule_checklist = wpunity_derive_molecules_checklist();
}

// Ajax for fetching game's assets within asset browser widget at vr_editor // user must be logged in to work, otherwise ajax has no privileges

// COMPILE Ajax
if(wpunity_getUnity_local_or_remote() != 'remote') {

    // Local compile
	$gameUnityProject_dirpath = $upload_dir . '\\' . $projectSlug . 'Unity';
	$gameUnityProject_urlpath = $pluginpath . '/../../uploads/' . $projectSlug . 'Unity/';

} else {

    // Remote compile
	$ftp_cre = wpunity_get_ftpCredentials();
	$ftp_host = $ftp_cre['address'];

	$gamesFolder = 'COMPILE_UNITY3D_GAMES';

	$gameUnityProject_dirpath = $gamesFolder."/".$projectSlug."Unity";
	$gameUnityProject_urlpath = "http://".$ftp_host."/".$gamesFolder."/".$projectSlug."Unity";
}


$thepath = $pluginpath . '/js_libs/assemble_compile_commands/request_game_assepile.js';
wp_enqueue_script( 'ajax-script_assepile', $thepath, array('jquery') );
wp_localize_script( 'ajax-script_assepile', 'my_ajax_object_assepile',
	array( 'ajax_url' => admin_url( 'admin-ajax.php'),
	       'id' => $project_id,
	       'slug' => $projectSlug,
	       'gameUnityProject_dirpath' => $gameUnityProject_dirpath,
	       'gameUnityProject_urlpath' => $gameUnityProject_urlpath
	)
);

// DELETE SCENE AJAX
wp_enqueue_script( 'ajax-script_deletescene', $pluginpath . '/js_libs/delete_ajaxes/delete_scene.js', array('jquery') );
wp_localize_script( 'ajax-script_deletescene', 'my_ajax_object_deletescene',
	array( 'ajax_url' => admin_url( 'admin-ajax.php'))
);

//FOR SAVING extra keys
wp_enqueue_script( 'ajax-script_savegio', $pluginpath.'/js_libs/save_scene_ajax/wpunity_save_scene_ajax.js', array('jquery') );
wp_localize_script( 'ajax-script_savegio', 'my_ajax_object_savegio',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'project_id' => $project_id )
);

// Asset Browser
wp_enqueue_script( 'ajax-script_filebrowse', $pluginpath.'/js_libs/assetBrowserToolbar.js', array('jquery') );
wp_localize_script( 'ajax-script_filebrowse', 'my_ajax_object_fbrowse', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

// Save scene
wp_enqueue_script( 'ajax-script_savescene', $pluginpath.'/js_libs/save_scene_ajax/wpunity_save_scene_ajax.js', array('jquery') );
wp_localize_script( 'ajax-script_savescene', 'my_ajax_object_savescene',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'scene_id' => $current_scene_id )
);

// Delete Asset
wp_enqueue_script( 'ajax-script_deleteasset', $pluginpath.'/js_libs/delete_ajaxes/delete_asset.js', array('jquery') );
wp_localize_script( 'ajax-script_deleteasset', 'my_ajax_object_deleteasset',
	array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
);


wp_enqueue_media($scene_post->ID);
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

if ($project_type === 'Archaeology') {
	$single_lowercase = "tour";
	$single_first = "Tour";
} else if ($project_type === 'Energy' || $project_type === 'Chemistry'){
	$single_lowercase = "lab";
	$single_first = "Lab";
} else {
	$single_lowercase = "project";
	$single_first = "Project";
}

// For Chemistry only
if(isset($_POST['submitted2']) && isset($_POST['post_nonce_field2']) && wp_verify_nonce($_POST['post_nonce_field2'], 'post_nonce')) {
	$expID = $_POST['exp-id'];
	update_post_meta( $project_id, 'wpunity_project_expID', $expID);

	$loadMainSceneLink = get_permalink($editscenePage[0]->ID) . $parameter_Scenepass . $current_scene_id . '&wpunity_game=' . $project_id . '&scene_type=scene';
	wp_redirect( $loadMainSceneLink );
	exit;
}


// NEW SCENE
if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	$newSceneType = $_POST['sceneTypeRadio'];

	$sceneMetaType = 'scene';//default 'scene' MetaType (3js)
	$game_type_chosen_slug = '';

	$default_json = '';
	$thegameType = wp_get_post_terms($project_id, 'wpunity_game_type');
	if($thegameType[0]->slug == 'archaeology_games'){
	    
	    $newscene_yaml_tax = get_term_by('slug', 'wonderaround-yaml', 'wpunity_scene_yaml');
	    
	    $game_type_chosen_slug = 'archaeology_games';
	    $default_json = wpunity_getDefaultJSONscene('archaeology');
	    
	} elseif($thegameType[0]->slug == 'energy_games'){
	    
	    $newscene_yaml_tax = get_term_by('slug', 'educational-energy', 'wpunity_scene_yaml');
	    $game_type_chosen_slug = 'energy_games';
	    $default_json = wpunity_getDefaultJSONscene('energy');
	
	}elseif($thegameType[0]->slug == 'chemistry_games'){
	 
		$game_type_chosen_slug = 'chemistry_games';
		
		$default_json = wpunity_getDefaultJSONscene('chemistry');
		
		if($newSceneType == 'lab'){
		
		    $newscene_yaml_tax = get_term_by('slug', 'wonderaround-lab-yaml', 'wpunity_scene_yaml');
		
		} elseif($newSceneType == '2d'){
		
		    $newscene_yaml_tax = get_term_by('slug', 'exam2d-chem-yaml', 'wpunity_scene_yaml');
		    $sceneMetaType = 'sceneExam2d';
		
		} elseif($newSceneType == '3d'){
		
		    $newscene_yaml_tax = get_term_by('slug', 'exam3d-chem-yaml', 'wpunity_scene_yaml');
		    $sceneMetaType = 'sceneExam3d';
		}
	}

	$scene_taxonomies = array(
		'wpunity_scene_pgame' => array(
			$allScenePGameID,
		),
		'wpunity_scene_yaml' => array(
			$newscene_yaml_tax->term_id,
		)
	);

	$scene_metas = array(
		'wpunity_scene_default' => 0,
        'wpunity_scene_caption' => esc_attr(strip_tags($_POST['scene-caption']))
	);

	//REGIONAL SCENE EXTRA TYPE FOR ENERGY GAMES
	$isRegional = 0;//default value
	if($thegameType[0]->slug == 'energy_games'){
		if($_POST['regionalSceneCheckbox'] == 'on'){$isRegional = 1;}
		$scene_metas['wpunity_isRegional']= $isRegional;
		$scene_metas['wpunity_scene_environment'] = 'fields';
	}

	//Add the final MetaType of the Scene
	$scene_metas['wpunity_scene_metatype']= $sceneMetaType;

	$scene_information = array(
		'post_title' => esc_attr(strip_tags($_POST['scene-title'])),
		'post_content' => $default_json,
		'post_type' => 'wpunity_scene',
		'post_status' => 'publish',
		'tax_input' => $scene_taxonomies,
		'meta_input' => $scene_metas,
	);

	$scene_id = wp_insert_post($scene_information);

	if($scene_id){
		if($sceneMetaType == 'sceneExam2d' || $sceneMetaType == 'sceneExam3d'){$edit_scene_page_id = $editsceneExamPage[0]->ID;}
		else{$edit_scene_page_id = $editscenePage[0]->ID;}
		$loadMainSceneLink = get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . $sceneMetaType;
		wp_redirect( $loadMainSceneLink );
		exit;
	}
}

$goBackTo_AllProjects_link = esc_url( get_permalink($allProjectsPage[0]->ID));

get_header(); ?>

    <style>
        .panel { display: none; }
        .panel.active { display: block; }
        .navigation-top {display:none;}
        .mdc-tab { min-width: 0; }
        .custom-header { display:none; }
        .main-navigation a { padding: 0.2em 1em; font-size:9pt !important;}
        .site-branding {display:none;}
        #content {padding:0px;}
        
        
    </style>

<?php if ( !is_user_logged_in() ) { ?>

    <div class="DisplayBlock CenterContents">
        <i style="font-size: 64px; padding-top: 80px;" class="material-icons mdc-theme--text-icon-on-background">account_circle</i>
        <p class="mdc-typography--title"> Please <a class="mdc-theme--secondary" href="<?php echo wp_login_url( get_permalink() ); ?>">login</a> to use platform</p>
        <p class="mdc-typography--title"> Or <a class="mdc-theme--secondary" href="<?php echo wp_registration_url(); ?>">register</a> if you don't have an account</p>
    </div>

    <hr class="WhiteSpaceSeparator">

<?php } else { ?>


    <!-- START PAGE -->
    <div class="EditPageHeader">
        
        <!-- ADD NEW ASSET FROM JOKER PROJECT -->
        <a id="addNewAssetBtn" style="visibility: hidden;" class="HeaderButtonStyle mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id . '&wpunity_scene=' .  $current_scene_id.'&scene_type=scene' ); ?>">
            Add a new 3D asset
        </a>
        
    </div>

    <span class="mdc-typography--caption" style="font-size:16pt">
    

    </span>


    <div class="mdc-toolbar hidable" style="display:block;position:fixed;z-index:1000;">
        
        <div class="" style="width:90%">
            <div class="mdc-toolbar__section mdc-toolbar__section--shrink-to-fit mdc-toolbar__section--align-start"
                    style="width:80%; vertical-align: middle;line-height:1.8em">
                
                <div id="gameInfoBreadcrump" class="mdc-textfield mdc-theme--text-primary-on-dark mdc-form-field" data-mdc-auto-init="MDCTextfield"
                     style="height:30px; margin:0; font-size: 14px; vertical-align: middle;display:block" >

                    <div id="gameClassGameName" style="float:left;max-width:50%;line-height:1.8em">
                        <a title="Back" href="<?php echo $goBackTo_AllProjects_link; ?>"> <i class="material-icons mdc-theme--text-primary-on-dark"
                                                                                             style="font-size: 20px; vertical-align: middle;" >arrow_back</i> </a>
    
                        <i class="material-icons mdc-theme--text-icon-on-dark"
                           style="font-size: 16px; vertical-align: middle;margin-bottom:3px;"
                           title="<?php echo $project_type; ?>"><?php echo $project_type_icon; ?> </i>&nbsp;
                           <?php echo $project_type; ?>
                        <i class="material-icons mdc-theme--text-icon-on-dark" title="" style="font-size:20px;vertical-align:middle">chevron_right</i>&nbsp;
                        <?php
                            echo $project_post->post_title;
                        ?>
                        <i class="material-icons mdc-theme--text-icon-on-dark" title="" style="font-size:20px;vertical-align:middle">chevron_right</i>

                    </div>
                    
                    <input title="Scene title" placeholder="Scene title" value="<?php echo $scene_post->post_title; ?>" id="sceneTitleInput" name="sceneTitleInput" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-dark"
                           aria-controls="title-validation-msg" minlength="3" required
                           style="display:block; float:left; width:35%; margin-left:0px; padding:0px; border: none; font-size:14px; border-bottom: 1px solid rgba(255, 255, 255, 0.3); box-shadow: none; border-radius: 0;">
                    
                    <p class="mdc-textfield-helptext mdc-textfield-helptext--validation-msg"
                       style="height:25px;max-width:10%;display:block;float:left;"
                       id="title-validation-msg">
                        Must be at least 3 characters long
                    </p>
                    <div class="mdc-textfield__bottom-line"></div>
                </div>

<!--                <div class="mdc-toolbar__section" style="display:block;float:left">-->
<!--                    <nav id="dynamic-tab-bar" class="mdc-tab-bar--indicator-secondary" style="text-transform: uppercase" role="tablist">-->
<!--                        <a role="tab" aria-controls="panel-1" class="mdc-tab mdc-tab-active mdc-tab--active" href="#panel-1" >Editor</a>-->
<!--                        --><?php //if ( $project_type === "Energy" || $project_type === "Chemistry" ) { ?>
<!---->
<!--                            <a role="tab" aria-controls="panel-2" class="mdc-tab" href="#panel-2" onclick="">Analytics</a>-->
<!--        -->
<!--                            --><?php //if($project_saved_keys['expID'] != ''){ ?>
<!--                                <a role="tab" aria-controls="panel-3" class="mdc-tab" href="#panel-3">at-risk prediction</a>-->
<!--                            --><?php //} ?>
<!--        -->
<!--        -->
<!--                            --><?php //if($project_type === "Chemistry"){ ?>
<!--                                <a role="tab" aria-controls="panel-4" class="mdc-tab" href="#panel-4">Content adaptation</a>-->
<!--                            --><?php //} ?>
<!--    -->
<!--                        --><?php //} ?>
<!---->
<!--                        <span class="mdc-tab-bar__indicator"></span>-->
<!--                    </nav>-->
<!--                </div>-->
            </div>

            <!--Set tab buttons-->
<!--            <div class="mdc-toolbar__section" style="display:block;max-width:10%">-->
<!--                <nav id="dynamic-tab-bar" class="mdc-tab-bar mdc-tab-bar--indicator-secondary" role="tablist">-->
<!--                -->
<!--                </nav>-->
<!--            </div>-->

            <div id="save-scene-elements">
               <a id="undo-scene-button" title="Undo last change"><i class="material-icons">undo</i></a>
               <a id="save-scene-button" title="Save all changes you made to the current scene">All changes saved</a>
               <a id="redo-scene-button" title="Redo last change"><i class="material-icons">redo</i></a>


                <!-- Close all 2D UIs-->
                <a id="toggleViewSceneContentBtn" data-toggle='off' type="button"
                   class="ToggleUIButtonStyle mdc-theme--secondary mdc-theme--text-hint-on-light"
                   title="View json of scene"
                    style="padding-top:5px;width:70px;left: calc(50% + 112px);">
                    json:
                    <i class="material-icons" style="background: none; opacity:1; font-size:11pt">visibility_off</i>
                </a>
                
            </div>
            
            
<!--                </div>-->
<!--            </div>-->
            
            
            <a id="compileGameBtn" class="mdc-button mdc-button--raised mdc-theme--text-primary-on-dark mdc-theme--secondary-bg w3-display-right" data-mdc-auto-init="MDCRipple"
               title="When you are finished compile the <?php echo $single_lowercase; ?> into a standalone binary">
                COMPILE
<!--                --><?php //echo $single_lowercase; ?>
            </a>
            

        </div>
    </div>

    <div class="panels">
        <div class="panel active" id="panel-1" role="tabpanel" aria-hidden="false">

		<?php
	    	// vr_editor loads the $sceneToLoad
    		require( plugin_dir_path( __DIR__ ) .  '/vr_editor.php' );

    		// Options dialogue
            require( plugin_dir_path( __DIR__ ) .  '/templates/edit-wpunity_sceneOptionsDialogue.php' );
        ?>


      <div id="sceneContent" style="z-index:100000;position:absolute; top:20px; left:100px; display:none">
          <textarea title="wpunity_scene_json_input" id="wpunity_scene_json_input"
                    style="z-index:100000;width:800px;height:500px;position:absolute"  rows="50" cols = "100"
                          name="wpunity_scene_json_input">
                    <?php echo $sceneToLoad ?>
          </textarea>
     </div>



     <!--Add information for Wind Energy games-->
			<?php if($project_type === "Energy") { ?>
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner mdc-theme--text-primary-on-light">

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
                            <h2 class="mdc-typography--title">Average wind speed</h2>
                            <p class="mdc-typography--subheading2">Mountains: 10 m/s</p>
                            <p class="mdc-typography--subheading2">Fields: 8.5 m/s</p>
                            <p class="mdc-typography--subheading2">Seashore: 7.5 m/s</p>
                        </div>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
                            <h2 class="mdc-typography--title">Access cost</h2>
                            <p class="mdc-typography--subheading2">Mountains: 3 $</p>
                            <p class="mdc-typography--subheading2">Fields: 2 $</p>
                            <p class="mdc-typography--subheading2">Seashore: 1 $</p>
                        </div>

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
                            <h2 class="mdc-typography--title">Turbine Types</h2>
                            <p class="mdc-typography--subheading2">Mountains ( Wind class I ): A, B, C</p>
                            <p class="mdc-typography--subheading2">Fields ( Wind class II ): D, E, F</p>
                            <p class="mdc-typography--subheading2">Seashore ( Wind class III ): G, H, I</p>
                        </div>

                    </div>
                </div>
			<?php } ?>


		<?php if ( $project_type === "Energy" || $project_type === "Chemistry" ) {  ?>

            <div class="panel" id="panel-2" role="tabpanel" aria-hidden="true">

                <div id="analyticsIframeFallback" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                </div>

                <div id="analyticsIframeContainer" style="position: relative; overflow: hidden; padding-top: 150%; display: none;">
                    <iframe id="analyticsIframeContent" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"></iframe>
                </div>
            </div>

			<?php if($project_saved_keys['expID'] != ''){ ?>

                <div class="panel" id="panel-3" role="tabpanel" aria-hidden="true">
                    <div id="atRiskIframeContainer" style="position: relative; overflow: hidden; padding-top: 180%;">
                        <iframe id="atRiskIframeContent" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"></iframe>
                    </div>
                </div>

			<?php } ?>

			<?php if($project_type === "Chemistry"){ ?>
                <div class="panel" id="panel-4" role="tabpanel" aria-hidden="true">
                    <div style="position: relative; overflow: hidden; padding-top: 100%;">
                        <iframe id="ddaIframeContent" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"></iframe>
                    </div>
                </div>
			<?php } ?>

		<?php } ?>


    <?php
        // Compile Dialogue
        require( plugin_dir_path( __DIR__ ) .  '/templates/edit-wpunity_sceneCompileDialogue.php' );
    ?>

    </div>

    <script type="text/javascript">

        var mdc = window.mdc;
        var MDCSelect = mdc.select.MDCSelect;
        
        mdc.autoInit();

        // All button actions saved here
        loadButtonActions();
        
        // Delete scene dialogue
        var deleteDialog = new mdc.dialog.MDCDialog(document.querySelector('#delete-dialog'));
        deleteDialog.focusTrap_.deactivate();
        
        // Compile dialogue
        var compileDialog = new mdc.dialog.MDCDialog(document.querySelector('#compile-dialog'));
        compileDialog.focusTrap_.deactivate();

        // Project Analytics
        loadAnalyticsTab(projectId, scene_id, project_keys, game_type, user_email, current_user_id, energy_stats);

        // Less top margin if not Admin
        if (!isUserAdmin)
            document.getElementById("vr_editor_main_div").style.top = "28px";

        // load asset browser with data
        jQuery(document).ready(function(){
            wpunity_fetchSceneAssetsAjax(isAdmin, projectSlug, urlforAssetEdit, projectId);

            // make asset browser draggable
            jQuery('#assetBrowserToolbar').draggable({cancel : 'ul'});
        });
        
    </script>

<?php } ?>
<?php get_footer(); ?>
