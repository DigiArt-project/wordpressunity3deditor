
<!--<style type="text/css" media="screen">-->
<!--    html { margin-top: 0px !important; }-->
<!--    * html body { margin-top: 0px !important; }-->
<!--    @media screen and ( max-width: 782px ) {-->
<!--        html { margin-top: 0px !important; }-->
<!--        * html body { margin-top: 0px !important; }-->
<!--    }-->
<!--</style>-->

<?php //Create asset

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

putenv("GOOGLE_APPLICATION_CREDENTIALS=".get_option( 'general_settings' )['wpunity_google_application_credentials']);

$hasTranslator = false;
if (file_exists(plugin_dir_path(__DIR__) . '/translate/vendor/autoload.php')){
// Include Google Cloud dependendencies using Composer
    require(plugin_dir_path(__DIR__) . '/translate/vendor/autoload.php');
    $hasTranslator = true;
}

//// [START translate_translate_text]
use Google\Cloud\Translate\TranslateClient;


// Is on back or front end ?
$isAdmin = is_admin() ? 'back' : 'front';
echo '<script>';
echo 'var isAdmin="'.$isAdmin.'";';
echo '</script>';

// Load Scrinpts
function loadAsset3DManagerScripts() {

    // Three js : for simple rendering
	wp_enqueue_script('wpunity_scripts');
	wp_enqueue_script('wpunity_load87_threejs');
	// For loading on clicking on image of previously uploaded obj
	wp_enqueue_script('wpunity_load87_objloader');

	// For loading on newly uploaded model
	wp_enqueue_script('wpunity_load87_objloader2');
	wp_enqueue_script('wpunity_load87_wwobjloader2');
	wp_enqueue_script('wpunity_load87_pdbloader');
	wp_enqueue_script('wpunity_load87_mtlloader');
	wp_enqueue_script('wpunity_load87_orbitcontrols');
	wp_enqueue_script('wpunity_load87_trackballcontrols');

	// For the PDB files to annotate molecules in 3D
	wp_enqueue_script('wpunity_CSS2DRenderer');
	wp_enqueue_script('WU_webw_3d_view');
	wp_enqueue_script('wu_3d_view_pdb');
	wp_enqueue_script('wpunity_asset_editor_scripts');

	// scroll for images
	wp_enqueue_script('wpunity_lightslider');
    
    wp_enqueue_script('wpunity_jscolorpick');
    wp_enqueue_script('wpunity_jsfontselect');
	
	// to capture screenshot of the 3D molecule and its tags
	wp_enqueue_script('wpunity_html2canvas');

	$pluginpath = dirname (plugin_dir_url( __DIR__  ));

	// content interlinking ajax
	wp_enqueue_script( 'ajax-wpunity_content_interlinking_request',
		$pluginpath.'/js_libs/content_interlinking_commands/content_interlinking.js', array('jquery') );
	
	// ajax php admin url
	wp_localize_script( 'ajax-wpunity_content_interlinking_request', 'my_ajax_object_fetch_content',
		array( 'ajax_url' => admin_url( 'admin-ajax.php' ), null )
	);
 
}
add_action('wp_enqueue_scripts', 'loadAsset3DManagerScripts' );

// End Of Scripts Loading

$mean_speed_wind = 14;$var_speed_wind = 30;$min_speed_wind = 0;$max_speed_wind = 40;$income_when_overpower = 0.5;
$income_when_correct_power = 1;$income_when_under_power = 0;$access_penalty = 0;$archaeology_penalty = 0;
$natural_reserve_penalty = 0;$hvdistance_penalty = 0;$min_consumption = 50;$max_consumption = 150;
$mean_consumption = 100;$var_consumption = 50;$optCosts_size = 90;$optCosts_dmg = 0.005;$optCosts_cost = 3;
$optCosts_repaid = 1;$optGen_class = 'A';$optGen_speed = 10;$optGen_power = 3;$optProductionVal = null;


$perma_structure = get_option('permalink_structure') ? true : false;
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$project_id = isset($_GET['wpunity_game']) ? sanitize_text_field( intval( $_GET['wpunity_game'] )) : null ;
$asset_id = isset($_GET['wpunity_asset']) ? sanitize_text_field( intval( $_GET['wpunity_asset'] )) : null ;
$scene_id = isset($_GET['wpunity_scene']) ? sanitize_text_field( intval( $_GET['wpunity_scene'] )) : null ;
//$previous_page = isset($_GET['previous_page']) ? sanitize_text_field( intval( $_GET['previous_page'] )) : null ;


// Game project variables
$game_post = get_post($project_id);
$gameSlug = $game_post->post_name;
$game_type_obj = wpunity_return_game_type($project_id);
$isJokerGame = (strpos($gameSlug, 'joker') != false) || $_GET['wpunity_scene'] == '';




//Get 'parent-game' taxonomy with the same slug as Game
$assetPGame = get_term_by('slug', $gameSlug, 'wpunity_asset3d_pgame');
$assetPGameID = $assetPGame->term_id;
$assetPGameSlug = $assetPGame->slug;

$isJoker = (strpos($assetPGameSlug, 'joker') !== false) ? "true":"false";

$asset_id_avail_joker = wpunity_get_assetids_joker($game_type_obj->string);

$isUserloggedIn = is_user_logged_in();
$current_user = wp_get_current_user();
$login_username = $current_user->user_login;
$isUserAdmin = current_user_can('administrator');
$isPreviewMode = isset($_GET['preview']);

$isOwner = $current_user->ID == get_post_field ('post_author', $asset_id);




$isEditable = false;

// Old asset
if(isset($_GET['wpunity_asset'])) {
    $author_id = get_post_field('post_author', $asset_id);
    
}



if ($isUserloggedIn) {
    $user_id = get_current_user_id();
    
    if (!isset($_GET['wpunity_asset'])) {
        // NEW ASSET
        $isEditable = true;
        $author_id = $user_id;
        
    } else if ($isUserAdmin || $isOwner){
        // OLD ASSET
        $isEditable = true;
        $author_id = get_post_field ('post_author', $asset_id);
    }
}

$author_displayname = get_the_author_meta( 'display_name' , $author_id );
$author_username = get_the_author_meta( 'nickname' , $author_id );
$author_country = get_the_author_meta( 'country' , $author_id );


$editgamePage = wpunity_getEditpage('game');
$allGamesPage = wpunity_getEditpage('allgames');
$editscenePage = wpunity_getEditpage('scene');
$newAssetPage = wpunity_getEditpage('asset');
$editscene2DPage = wpunity_getEditpage('scene2D');
$editsceneExamPage = wpunity_getEditpage('sceneExam');


$archaeology_tax = get_term_by('slug', 'archaeology_games', 'wpunity_game_type');

$all_game_category = get_the_terms( $project_id, 'wpunity_game_type' );

$game_category  = $all_game_category[0]->slug;

$scene_data = wpunity_getFirstSceneID_byProjectID($project_id,$game_category);//first 3D scene id

$edit_scene_page_id = $editscenePage[0]->ID;

// GoBack links
if($scene_id!=0) {
    $goBackTo_MainLab_link = get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_data['id'] . '&wpunity_game=' . $project_id . '&scene_type=' . $scene_data['type'];
} else {
    $goBackTo_MainLab_link ='';
}

$goBackTo_AllProjects_link = esc_url( get_permalink($allGamesPage[0]->ID));
$goBackTo_SharedAssets = home_url()."/wpunity-list-shared-assets/?wpunity_game=".$project_id;

// ============================================
// Submit Handler
//=============================================
if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	$assetTitleForm = esc_attr(strip_tags($_POST['assetTitle'])); //Title of the Asset (Form value)
    $assetTitleFormGreek = esc_attr(strip_tags($_POST['assetTitGreek'])); //Title of the Asset (Form value)
    $assetTitleFormSpanish = esc_attr(strip_tags($_POST['assetTitSpanish'])); //Title of the Asset (Form value)
    $assetTitleFormFrench = esc_attr(strip_tags($_POST['assetTitFrench'])); //Title of the Asset (Form value)
    $assetTitleFormGerman = esc_attr(strip_tags($_POST['assetTitGerman'])); //Title of the Asset (Form value)
    $assetTitleFormRussian = esc_attr(strip_tags($_POST['assetTitRussian'])); //Title of the Asset (Form value)
    
    
	$assetDescForm = esc_attr(strip_tags($_POST['assetDesc'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormGreek = esc_attr(strip_tags($_POST['assetDescGreek'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormSpanish = esc_attr(strip_tags($_POST['assetDescSpanish'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormFrench = esc_attr(strip_tags($_POST['assetDescFrench'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormGerman = esc_attr(strip_tags($_POST['assetDescGerman'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormRussian = esc_attr(strip_tags($_POST['assetDescRussian'],"<b><i>")); //Description of the Asset (Form value)
    
    $assetDescFormKids = esc_attr(strip_tags($_POST['assetDesc'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormGreekKids = esc_attr(strip_tags($_POST['assetDescGreekKids'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormSpanishKids = esc_attr(strip_tags($_POST['assetDescSpanishKids'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormFrenchKids = esc_attr(strip_tags($_POST['assetDescFrenchKids'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormGermanKids = esc_attr(strip_tags($_POST['assetDescGermanKids'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormRussianKids = esc_attr(strip_tags($_POST['assetDescRussianKids'],"<b><i>")); //Description of the Asset (Form value)
    
    $assetDescFormExperts = esc_attr(strip_tags($_POST['assetDescExperts'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormGreekExperts = esc_attr(strip_tags($_POST['assetDescGreekExperts'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormSpanishExperts = esc_attr(strip_tags($_POST['assetDescSpanishExperts'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormFrenchExperts = esc_attr(strip_tags($_POST['assetDescFrenchExperts'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormGermanExperts = esc_attr(strip_tags($_POST['assetDescGermanExperts'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormRussianExperts = esc_attr(strip_tags($_POST['assetDescRussianExperts'],"<b><i>")); //Description of the Asset (Form value)
    
    $assetDescFormPerception = esc_attr(strip_tags($_POST['assetDescPerception'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormGreekPerception = esc_attr(strip_tags($_POST['assetDescGreekPerception'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormSpanishPerception = esc_attr(strip_tags($_POST['assetDescSpanishPerception'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormFrenchPerception = esc_attr(strip_tags($_POST['assetDescFrenchPerception'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormGermanPerception = esc_attr(strip_tags($_POST['assetDescGermanPerception'],"<b><i>")); //Description of the Asset (Form value)
    $assetDescFormRussianPerception = esc_attr(strip_tags($_POST['assetDescRussianPerception'],"<b><i>")); //Description of the Asset (Form value)
    
    
    if($assetDescFormGreek=='' && $assetDescForm !='' && $hasTranslator){
        $translate = new TranslateClient();
        $result = $translate->translate($assetDescForm, ['target' => 'el']);
        $assetDescFormGreek = $result[text];
    }
    
    if($assetDescFormSpanish=='' && $assetDescForm !='' && $hasTranslator){
        $translate = new TranslateClient();
        $result = $translate->translate($assetDescForm, ['target' => 'es']);
        $assetDescFormSpanish = $result[text];
    }
    
    if($assetDescFormFrench=='' && $assetDescForm !='' && $hasTranslator){
        $translate = new TranslateClient();
        $result = $translate->translate($assetDescForm, ['target' => 'fr']);
        $assetDescFormFrench = $result[text];
    }
    
    if($assetDescFormGerman=='' && $assetDescForm !='' && $hasTranslator){
        $translate = new TranslateClient();
        $result = $translate->translate($assetDescForm, ['target' => 'de']);
        $assetDescFormGerman = $result[text];
    }
    
    if($assetDescFormRussian=='' && $assetDescForm !='' && $hasTranslator){
        $translate = new TranslateClient();
        $result = $translate->translate($assetDescForm, ['target' => 'ru']);
        $assetDescFormRussian = $result[text];
    }
    
    
    
    
    
    $assetFonts = esc_attr(strip_tags($_POST['assetFonts']));
    $assetback3dcolor=  esc_attr(strip_tags($_POST['assetback3dcolor']));
    
    
	$assetCatID = intval($_POST['term_id']);//ID of Asset Category (hidden input)
	$assetCatTerm = get_term_by('id', $assetCatID, 'wpunity_asset3d_cat');
    
    
    $assetCatIPRID = intval($_POST['term_id_ipr']); //ID of Asset Category IPR (hidden input)
    $assetCatIPRTerm = get_term_by('id', $assetCatIPRID, 'wpunity_asset3d_ipr_cat');

	// NEW
	if($asset_id == null){
		//It's a new Asset, let's create it (returns newly created ID, or 0 if nothing happened)
		$asset_id = wpunity_create_asset_frontend($assetPGameID, $assetCatID, $gameSlug, $assetCatIPRID,
            $assetTitleForm, $assetDescForm, $assetDescFormKids, $assetDescFormExperts, $assetDescFormPerception,
            $assetTitleFormGreek, $assetDescFormGreek, $assetDescFormGreekKids, $assetDescFormGreekExperts, $assetDescFormGreekPerception,
            $assetTitleFormSpanish, $assetDescFormSpanish, $assetDescFormSpanishKids, $assetDescFormSpanishExperts, $assetDescFormSpanishPerception,
            $assetTitleFormFrench, $assetDescFormFrench,  $assetDescFormFrenchKids, $assetDescFormFrenchExperts, $assetDescFormFrenchPerception,
            $assetTitleFormGerman, $assetDescFormGerman,  $assetDescFormGermanKids, $assetDescFormGermanExperts, $assetDescFormGermanPerception,
            $assetTitleFormRussian, $assetDescFormRussian,  $assetDescFormRussianKids, $assetDescFormRussianExperts, $assetDescFormRussianPerception,
            $assetFonts, $assetback3dcolor);
	}else {
	 
		// Edit an existing asset: Return true if updated, false if failed
		$asset_updatedConf = wpunity_update_asset_frontend($assetPGameID, $assetCatID, $asset_id, $assetCatIPRID,
            
            $assetTitleForm, $assetDescForm, $assetDescFormKids, $assetDescFormExperts, $assetDescFormPerception,
            $assetTitleFormGreek, $assetDescFormGreek, $assetDescFormGreekKids, $assetDescFormGreekExperts, $assetDescFormGreekPerception,
            $assetTitleFormSpanish, $assetDescFormSpanish, $assetDescFormSpanishKids, $assetDescFormSpanishExperts, $assetDescFormSpanishPerception,
            $assetTitleFormFrench, $assetDescFormFrench,  $assetDescFormFrenchKids, $assetDescFormFrenchExperts, $assetDescFormFrenchPerception,
            $assetTitleFormGerman, $assetDescFormGerman,  $assetDescFormGermanKids, $assetDescFormGermanExperts, $assetDescFormGermanPerception,
            $assetTitleFormRussian, $assetDescFormRussian,  $assetDescFormRussianKids, $assetDescFormRussianExperts, $assetDescFormRussianPerception,
            
            $assetFonts, $assetback3dcolor);
	}
	
	// Create new or updated of main fields edit successfull
	if($asset_id != 0 || $asset_updatedConf == 1) {
		if ($_POST['asset_sourceID']=='') {
			// NoCloning
			wpunity_create_asset_3DFilesExtra_frontend($asset_id, $assetTitleForm, $gameSlug);
			update_post_meta($asset_id, 'wpunity_asset3d_isCloned', 'false');
			update_post_meta($asset_id, 'wpunity_asset3d_isJoker', $isJoker);
		}else {
			// Cloning
			wpunity_copy_3Dfiles($asset_id, $_POST['asset_sourceID']);
			update_post_meta($asset_id, 'wpunity_asset3d_isCloned', 'true');
			update_post_meta($asset_id, 'wpunity_asset3d_isJoker', "false");
		}
	}


	// Save parameters
	if($assetCatTerm->slug == 'consumer') {
		wpunity_create_asset_consumerExtra_frontend($asset_id);
	}elseif($assetCatTerm->slug == 'terrain') {
		wpunity_create_asset_terrainExtra_frontend($asset_id);
	}elseif ($assetCatTerm->slug == 'producer') {
		wpunity_create_asset_producerExtra_frontend($asset_id);
	}elseif ( $assetCatTerm->slug == 'pois_imagetext') {
		wpunity_create_asset_poisITExtra_frontend($asset_id);
	}elseif ( $assetCatTerm->slug == 'pois_video') {
		wpunity_create_asset_poisVideoExtra_frontend($asset_id);
	}elseif ($assetCatTerm->slug == 'molecule') {
		wpunity_create_asset_moleculeExtra_frontend($asset_id);
    }elseif ( $assetCatTerm->slug == 'artifact') {
        wpunity_create_asset_poisITExtra_frontend($asset_id);
        wpunity_create_asset_poisVideoExtra_frontend($asset_id);
    }

	if($scene_id == 0) {
        
        echo '<script>alert("Asset created or edited successfully");</script>';
    }
//	else
//		wp_redirect($goBackTo_MainLab_link);

	//exit;
}

if ($project_scope == 0) {
	$single_first = "Tour";
} else if ($project_scope == 1){
	$single_first = "Lab";
} else {
	$single_first = "Project";
}

$back_3d_color = 'rgb(0,0,0)';

// When asset was created in the past and now we want to edit it. We should get the attachments obj, mtl
if($asset_id != null) {
    
    $asset_post = get_post($asset_id);
    $assetpostMeta = get_post_meta($asset_id);
   
    $back_3d_color = $assetpostMeta['wpunity_asset3d_back_3d_color'][0];
    
    
    $fonts = $assetpostMeta['wpunity_asset3d_fonts'][0];
    
    if (array_key_exists('wpunity_asset3d_obj', $assetpostMeta)) {
        $mtlpost = get_post($assetpostMeta['wpunity_asset3d_mtl'][0]);
        $objpost = get_post($assetpostMeta['wpunity_asset3d_obj'][0]);
        $mtl_file_name = basename($mtlpost->guid);
        $obj_file_name = basename($objpost->guid);
        $path_url = pathinfo($mtlpost->guid)['dirname'];
        
        echo '<script>';
        echo 'var mtl_file_name="'.$mtl_file_name.'";';
        echo 'var obj_file_name="'.$obj_file_name.'";';
        echo 'var path_url="'.$path_url . '/'    .'";';
        echo '</script>';
    }
    
    if (array_key_exists('wpunity_asset3d_pdb', $assetpostMeta)){
        $pdbpost = get_post($assetpostMeta['wpunity_asset3d_pdb'][0]);
        $pdb_file_name = $pdbpost->guid;
        
        echo '<script>';
        echo 'var pdb_file_name="'.$pdb_file_name.'";';
        echo '</script>';
    }
}
//--------------------------------------------------------
get_header();

if($isEditable && !$isPreviewMode)
    $breacrumbsTitle = ($asset_id == null ? "Create a new asset" : "Edit an existing asset");
else
    $breacrumbsTitle = "";

$dropdownHeading = ($asset_id == null ? "Select a category" : "Category");
$asset_title_saved = ($asset_id == null ? "" : get_the_title( $asset_id ));
$asset_title_label = ($asset_id == null ? "Enter a title for the asset in English" : "Edit the title of the asset in English");





$asset_desc_label = ($asset_id == null ? "Add a description for the asset" : "Edit the description of the asset");
$asset_desc_saved = ($asset_id == null ? "" : get_post_field('post_content', $asset_id));
$asset_desc_kids_label = ($asset_id == null ? "Add a description of the asset for kids" : "Edit the description of the asset for kids");
$asset_desc_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_kids', true));
$asset_desc_experts_label = ($asset_id == null ? "Add a description of the asset for experts in archaeology" : "Edit the description of the asset for experts in archaeology");
$asset_desc_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_experts', true));
$asset_desc_perception_label = ($asset_id == null ? "Add a description of the asset for people with perception problems" : "Edit the description of the asset for people with perception problems");
$asset_desc_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_perception', true));

// 'wpunity_asset3d_title_greek','wpunity_asset3d_description_greek','wpunity_asset3d_description_greek_kids','wpunity_asset3d_description_greek_experts', 'wpunity_asset3d_description_greek_perception',   // Greek
//     // Spanish
//     // French
//     // German
//     // Russion


$asset_title_greek_label = ($asset_id == null ? "Ο τίτλος του αντικειμένου" : "Τροποποίηση τίτλου αντικειμένου");
$asset_title_greek_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_greek', true));
$asset_desc_greek_label = ($asset_id == null ? "Πρόσθεσε μια περιγραφή για το αντικείμενο" : "Τροποποίηση περιγραφής αντικειμένου");
$asset_desc_greek_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_greek', true));
$asset_desc_greek_kids_label = ($asset_id == null ? "Η περιγραφή του αντικειμένου για παιδιά" : "Τροποποίηση περιγραφής του αντικειμένου για παιδιά");
$asset_desc_greek_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_greek_kids', true));
$asset_desc_greek_experts_label = ($asset_id == null ? "Η περιγραφή του αντικειμένου για ειδικούς στην αρχαιολογία" : "Τροποποίηση περιγραφής του αντικειμένου για ειδικούς στην αρχαιολογία");
$asset_desc_greek_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_greek_experts', true));
$asset_desc_greek_perception_label = ($asset_id == null ? "Η περιγραφή του αντικειμένου για άτομα με προβλήματατα αντίληψης" : "Τροποποίηση περιγραφής του αντικειμένου για άτομα με προβλήματατα αντίληψης");
$asset_desc_greek_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_greek_perception', true));



$asset_title_spanish_label = ($asset_id == null ? "Ingrese un título para su activo" : "Edite el título del activo");
$asset_title_spanish_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_spanish', true));
$asset_desc_spanish_label = ($asset_id == null ? "Agregue una pequeña descripción para su activo" : "Edite la descripción de su activo");
$asset_desc_spanish_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_spanish', true));
$asset_desc_spanish_kids_label = ($asset_id == null ? "Agregue una descripción de su activo para niños" : "Editar la descripción del activo para niños");
$asset_desc_spanish_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_spanish_kids', true));
$asset_desc_spanish_experts_label = ($asset_id == null ? "Agregar una descripción del activo para expertos en arqueología" : "Edite la descripción del activo para expertos en arqueología.");
$asset_desc_spanish_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_spanish_experts', true));
$asset_desc_spanish_perception_label = ($asset_id == null ? "Agregue una descripción del activo para personas con problemas de percepción" : "Edite la descripción del activo para personas con problemas de percepción");
$asset_desc_spanish_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_spanish_perception', true));

$asset_title_french_label = ($asset_id == null ? "Entrez un titre pour votre bien" : "Modifier le titre de l'actif");
$asset_title_french_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_french', true));
$asset_desc_french_label = ($asset_id == null ? "Ajouter une description de votre actif" : "Modifier la description de votre bien");
$asset_desc_french_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_french', true));
$asset_desc_french_kids_label = ($asset_id == null ? "Ajouter une description pour votre bien pour enfants" : "Modifier la description de l'actif pour les enfants");
$asset_desc_french_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_french_kids', true));
$asset_desc_french_experts_label = ($asset_id == null ? "Ajouter une description de l'actif pour les experts en archéologie" : "Modifier la description de l'actif pour les experts en archéologie");
$asset_desc_french_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_french_experts', true));
$asset_desc_french_perception_label = ($asset_id == null ? "Ajouter une description de l'actif pour les personnes ayant des problèmes de perception" : "Modifier la description de l'actif pour les personnes ayant des problèmes de perception");
$asset_desc_french_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_french_perception', true));

$asset_title_german_label = ($asset_id == null ? "Geben Sie einen Titel für Ihr Asset ein" : "Bearbeiten Sie den Titel des Assets");
$asset_title_german_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_german', true));
$asset_desc_german_label = ($asset_id == null ? "Geben Sie eine Beschriebung" : "Ändern Sie die Beschreibung");
$asset_desc_german_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_german', true));
$asset_desc_german_kids_label = ($asset_id == null ? "Fügen Sie eine Beschreibung für Ihr Asset auf Englisch für Kinder hinzu" : "Bearbeiten Sie die Beschreibung des Assets für Kinder");
$asset_desc_german_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_german_kids', true));
$asset_desc_german_experts_label = ($asset_id == null ? "Fügen Sie eine Beschreibung des Objekts für Experten der Archäologie hinzu" : "Bearbeiten Sie die Beschreibung des Assets für Experten in Archäologie");
$asset_desc_german_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_german_experts', true));
$asset_desc_german_perception_label = ($asset_id == null ? "Fügen Sie eine Beschreibung des Assets für Personen mit Wahrnehmungsproblemen hinzu" : "Bearbeiten Sie die Beschreibung des Assets für Personen mit Wahrnehmungsproblemen");
$asset_desc_german_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_german_perception', true));

$asset_title_russian_label = ($asset_id == null ? "Введите название для вашего актива" : "Изменить заголовок актива");
$asset_title_russian_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_title_russian', true));
$asset_desc_russian_label = ($asset_id == null ? "Дать описание" : "Изменить описание");
$asset_desc_russian_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_russian', true));
$asset_desc_russian_kids_label = ($asset_id == null ? "Добавить описание для вашего имущества для детей" : "Редактировать описание актива для детей");
$asset_desc_russian_kids_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_russian_kids', true));
$asset_desc_russian_experts_label = ($asset_id == null ? "Добавить описание актива для специалистов по археологии" : "Редактировать описание актива для специалистов по археологии");
$asset_desc_russian_experts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_russian_experts', true));
$asset_desc_russian_perception_label = ($asset_id == null ? "Добавить описание актива для людей с проблемами восприятия" : "Изменить описание актива для людей с проблемами восприятия");
$asset_desc_russian_perception_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_description_russian_perception', true));

echo '<script>';
echo 'var asset_title_english_saved="'.$asset_title_saved.'";';
echo 'var asset_title_greek_saved="'.$asset_title_greek_saved.'";';
echo 'var asset_title_spanish_saved="'.$asset_title_spanish_saved.'";';
echo 'var asset_title_french_saved="'.$asset_title_french_saved.'";';
echo 'var asset_title_german_saved="'.$asset_title_german_saved.'";';
echo 'var asset_title_russian_saved="'.$asset_title_russian_saved.'";';
echo '</script>';



$asset_fonts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_fonts', true));
$asset_fonts_label = ($asset_id == null ? "Fonts" : "Fonts");

$asset_back_3d_color_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_back_3d_color', true));
$asset_back_3d_color_label = ($asset_id == null ? "3D viewer background color" : "3D viewer background color");

//print_r(get_allowed_mime_types());

//Check if its new/saved and get data for Terrain Options
if($asset_id != null) {
	$saved_term = wp_get_post_terms( $asset_id, 'wpunity_asset3d_cat' );
	if($saved_term[0]->slug == 'terrain'){
		$physics = get_post_meta($asset_id,'wpunity_physicsValues',true);
		if($physics) {
			$mean_speed_wind = $physics['mean'];
			$var_speed_wind = $physics['variance'];
			$min_speed_wind = $physics['min'];
			$max_speed_wind = $physics['max'];
		}
		$energy_income = get_post_meta($asset_id,'wpunity_energyConsumptionIncome',true);
		if($energy_income) {
			$income_when_overpower = $energy_income['over'];
			$income_when_correct_power = $energy_income['correct'];
			$income_when_under_power = $energy_income['under'];
		}
		$constr_pen = get_post_meta($asset_id,'wpunity_constructionPenalties',true);
		if($constr_pen){
			$access_penalty = $constr_pen['access'];
			$archaeology_penalty = $constr_pen['arch'];
			$natural_reserve_penalty = $constr_pen['natural'];
			$hvdistance_penalty = $constr_pen['hiVolt'];
		}
	}elseif($saved_term[0]->slug == 'consumer'){
		$consumptions = get_post_meta($asset_id,'wpunity_energyConsumption',true);
		if($consumptions) {
			$min_consumption = $consumptions['min'];
			$max_consumption = $consumptions['max'];
			$mean_consumption = $consumptions['mean'];
			$var_consumption = $consumptions['var'];
		}
	}elseif($saved_term[0]->slug == 'producer') {
		$optCosts = get_post_meta($asset_id,'wpunity_producerOptCosts',true);
		if($optCosts) {
			$optCosts_size = $optCosts['size'];
			$optCosts_dmg = $optCosts['dmg'];
			$optCosts_cost = $optCosts['cost'];
			$optCosts_repaid = $optCosts['repaid'];
		}
		$optGen = get_post_meta($asset_id,'wpunity_producerOptGen',true);
		if($optGen) {
			$optGen_class = $optGen['class'];
			$optGen_speed = $optGen['speed'];
			$optGen_power = $optGen['power'];
		}
		$optProductionVal = get_post_meta($asset_id,'wpunity_producerPowerProductionVal',true);
	}elseif (in_array($saved_term[0]->slug , ['artifact','pois_imagetext'])) {
		//load the already saved featured image for POI image-text
		$the_featured_image_id =  get_post_thumbnail_id($asset_id);
		$the_featured_image_url = get_the_post_thumbnail_url($asset_id);
	} elseif ($saved_term[0]->slug == 'pois_video') {
		//upload the featured image for POI video
		//$asset_featured_image =  $_FILES['poi-video-featured-image'];
		//$attachment_id = wpunity_upload_img( $asset_featured_image, $asset_id);
		//set_post_thumbnail( $asset_id, $attachment_id );

		//upload video file for POI video
		//$asset_video = $_FILES['videoFileInput'];
		//$attachment_video_id = wpunity_upload_img( $asset_video, $asset_id);
		//update_post_meta( $asset_id, 'wpunity_asset3d_video', $attachment_video_id );
	}
}

?>

    <style>
        .panel { display: none; }
        .panel.active { display: block; }
        .navigation-top {display:none;}
        .mdc-tab { min-width: 0; }
        .custom-header { display:none; }
        .main-navigation a { padding: 0.2em 1em; font-size:9pt !important;}
        .site-branding {display:none;}
        #content {padding:0px;}
        .site-content-contain{margin:0;overflow:hidden;}
    </style>

    <div id="wrapper_3d_inner" style="position: fixed; top:0; right:0;width:60%;height:100%;z-index:1">

        <div id="previewProgressSlider" style="visibility:hidden; position: absolute; z-index:2;width:100%;top:0" class="CenterContents">
            <h6 class="mdc-theme--text-primary-on-light mdc-typography--title" style="position: absolute; left:0; right: 0;color:white !important; mix-blend-mode: difference;">Loading 3D object</h6>
            <h6 id="previewProgressLabel" class="mdc-theme--text-primary-on-light mdc-typography--subheading1"
                style="position: absolute; left:0; right: 0; top: 26px;color:white !important; mix-blend-mode: difference;"></h6>

            <div class="progressSlider">
                <div id="previewProgressSliderLine" class="progressSliderSubLine" style="width: 0;"></div>
            </div>
        </div>
        
        <div style="position: absolute;">
            <div id="previewCanvasDiv" style="height:100%; width:100%; position: relative"></div>
        </div>

        <canvas id="previewCanvas" style="height:100%; width:100%;position: relative"></canvas>
    </div>


    <div id="text-asset-sidebar" style="">
    
    
    <div id="edit-asset-header">
        <span class="mdc-typography--headline mdc-theme--text-primary-on-light" style="width:50%;display:inline-block;"><span><?php echo $breacrumbsTitle; ?></span></span>
        <table id="wpunity-asset-author" class="mdc-typography--caption" style="position:relative;width:170px;display:inline-block;text-align:left;float:right;right:0;">
            <tr>
                <th rowspan="2"><img style="width:40px; min-width:40px; height:40px; min-height:40px; border-radius: 50%;" src="<?php echo get_avatar_url($author_id);?>"></th>
                <td style="padding: 0px;"><a href="<?php echo home_url().'/user/'.$author_username; ?>" style="color:black"><?php  echo $author_displayname;?></a></td>
            </tr>
            <tr>
                <td><span style=""><?php echo $author_country;?></span></td>
            </tr>
        </table>
    </div>
        
    <br />
        
    <?php if($isJokerGame ) { ?>
        
        <a title="Back" style="color:dodgerblue;" class="hideAtLocked mdc-button" href="<?php echo $goBackTo_SharedAssets;?>">
            <i class="material-icons" style="font-size: 24px; vertical-align: middle">arrow_back</i>
            Assets List</a>
        
    <?php } else { ?>
        <a title="Back" style="color:dodgerblue" href="<?php echo $goBackTo_MainLab_link;?>">
            <i class="material-icons" style="font-size: 24px; vertical-align: top;" >arrow_back</i>3D Editor
        </a>
    <?php } ?>

    <?php
        if($isUserloggedIn && !$isPreviewMode){
            if($asset_id != null ) { ?>
                <a class="mdc-button mdc-button--primary mdc-theme--primary"
                href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id ); ?>"
                data-mdc-auto-init="MDCRipple">Add New</a>
    
                <?php
                $previewLink = ( empty( $_SERVER['HTTPS'] ) ? 'http://' : 'https://' ) .
                    $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] . '&preview=1#English';
                ?>
                
                <a class="mdc-button mdc-button--primary mdc-theme--primary"
                   href="<?php echo $previewLink; ?>"
                   data-mdc-auto-init="MDCRipple">Preview</a>
            <?php }
        } else {
                ?>
        <?php } ?>
        
    <?php if ($isPreviewMode){

        $curr_uri = $_SERVER['REQUEST_URI'];
        $targetparams = str_replace("preview=1","",$curr_uri);
        $editLink2 = ( empty( $_SERVER['HTTPS'] ) ? 'http://' : 'https://' ).$_SERVER['HTTP_HOST'].$targetparams.'#English';
        ?>
    
            <a class="mdc-button mdc-button--primary mdc-theme--primary"
               href="<?php echo $editLink2; ?>" data-mdc-auto-init="MDCRipple">EDIT Asset</a>
    
    <?php  }     ?>
    
    
    
    <form name="3dAssetForm" id="3dAssetForm" method="POST" enctype="multipart/form-data">

        <!-- CATEGORY -->
        <div class="" style="display:<?php echo ((!$isUserAdmin && !$isOwner) || $isPreviewMode) ? "none":""; ?>">
                    
                    <h3 class="mdc-typography--title"><?php echo $dropdownHeading; ?></h3>
                    <div id="category-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                        <i class="material-icons mdc-theme--text-hint-on-light">label</i>&nbsp;

						<?php
						$myGameType = 0;
						$all_game_types = get_the_terms( $project_id, 'wpunity_game_type' );
						$game_type_slug = $all_game_types[0]->slug;

						switch ($game_type_slug) {
							case 'archaeology_games':
								$myGameType=1;
								break;
							case 'energy_games':
								$myGameType=2;
								break;
							case 'chemistry_games':
								$myGameType=3;
								break;
						}

						$args = array(
							'hide_empty' => false,
							'meta_query' => array(
								array(
									'key'       => 'wpunity_assetcat_gamecat',
									'value'     => $myGameType,
									'compare'   => '='
								)
							),
							'orderby' => 'name',
							'order' => 'DESC',
						);

						$cat_terms = get_terms('wpunity_asset3d_cat', $args);
						$saved_term = wp_get_post_terms( $asset_id, 'wpunity_asset3d_cat' );
						?>

						<?php if($asset_id == null) { ?>
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
                
                <input id="termIdInput" type="hidden" name="term_id" value="">
        </div>

        <!--   TITLE , DESCRIPTION , 3D files  -->
        <div class="" id="informationPanel" style="display: none;padding-top:10px;">

            <!-- TITLE , DESCRIPTION -->
            <?php if(($isOwner || $isUserAdmin) && !$isPreviewMode) { ?>
            
                <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input id="assetTitle" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light" name="assetTitle"
                           aria-controls="title-validation-msg" required minlength="3" maxlength="40"
                           style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0; font-size:24px; padding: 0em"
                           value="<?php echo trim($asset_title_saved); ?>">
                    <label for="assetTitle" class="mdc-textfield__label"><?php echo $asset_title_label; ?> </label>
                    <div class="mdc-textfield__bottom-line"></div>
                </div>
                
                <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg" id="title-validation-msg">
                    Between 3 - 25 characters
                </p>


                <!-- Languages -->
                <ul class="langul" style="margin:0">
                    <li class="langli"><a href="#EnglishEdit">English</a></li>
                    <li class="langli"><a href="#GreekEdit" >Ελληνικά</a></li>
                    <li class="langli"><a href="#SpanishEdit" >Español</a></li>
                    <li class="langli"><a href="#FrenchEdit" >Français</a></li>
                    <li class="langli"><a href="#GermanEdit" >Deutsch</a></li>
                    <li class="langli"><a href="#RussianEdit" >Pусский</a></li>
                </ul>


                <div class="wrapper_lang">

                    <!--     English EDIT-->
                    <div id="EnglishEdit" class="tab-container_lang" style="position:relative;">
                        
                        <div id="assetDescription" class=" mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDesc" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                              name="assetDesc" form="3dAssetForm"><?php echo trim($asset_desc_saved); ?></textarea>
                            <label for="assetDesc" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_label; ?></label>
                        </div>


                        <div id="assetDescriptionKids" class=" mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescKids" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescKids" form="3dAssetForm"><?php echo trim($asset_desc_kids_saved); ?></textarea>
                            <label for="assetDescKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_kids_label; ?></label>
                        </div>


                        <div id="assetDescriptionExperts" class=" mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescExperts" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescExperts" form="3dAssetForm"><?php echo trim($asset_desc_experts_saved); ?></textarea>
                            <label for="assetDescExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_experts_label; ?></label>
                        </div>

                        <div id="assetDescriptionPerception" class=" mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescPerception" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescPerception" form="3dAssetForm"><?php echo trim($asset_desc_perception_saved); ?></textarea>
                            <label for="assetDescPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_perception_label; ?></label>
                        </div>
                        
                        
                    </div>


                    <!--     GREEK EDIT    -->
                    
                    <div id="GreekEdit" class="tab-container_lang" style="position:relative">

                        <div id="assetTitleGreek" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetTitGreek" class="mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;"
                                      name="assetTitGreek" form="3dAssetForm"><?php echo trim($asset_title_greek_saved); ?></textarea>
                            <label for="assetTitGreek" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_greek_label; ?></label>
                        </div>
                        
                        <div id="assetDescriptionGreek" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                                 style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGreek" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescGreek" form="3dAssetForm"><?php echo trim($asset_desc_greek_saved); ?></textarea>
                            <label for="assetDescGreek" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_greek_label; ?></label>
                        </div>


                        <div id="assetDescriptionGreekKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGreekKids" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescGreekKids" form="3dAssetForm"><?php echo trim($asset_desc_greek_kids_saved); ?></textarea>
                            <label for="assetDescGreekKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_greek_kids_label; ?></label>
                        </div>

                        <div id="assetDescriptionGreekExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGreekExperts" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescGreekExperts" form="3dAssetForm"><?php echo trim($asset_desc_greek_experts_saved); ?></textarea>
                            <label for="assetDescGreekExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_greek_experts_label; ?></label>
                        </div>

                        <div id="assetDescriptionGreekPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGreekPerception" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescGreekPerception" form="3dAssetForm"><?php echo trim($asset_desc_greek_perception_saved); ?></textarea>
                            <label for="assetDescGreekPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_greek_perception_label; ?></label>
                        </div>
                    </div>
                    
                    
                    <!-- SPANISH: HERE  -->

                    <div id="SpanishEdit" class="tab-container_lang" style="position:relative">
                        
                        <div id="assetTitleSpanish" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetTitSpanish" class="mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;"
                                          name="assetTitSpanish" form="3dAssetForm"><?php echo trim($asset_title_spanish_saved); ?></textarea>
                            <label for="assetTitSpanish" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_spanish_label; ?></label>
                        </div>
    
                        <div id="assetDescriptionSpanish" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescSpanish" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescSpanish" form="3dAssetForm"><?php echo trim($asset_desc_spanish_saved); ?></textarea>
                            <label for="assetDescSpanish" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_spanish_label; ?></label>
                        </div>
    
                        <div id="assetDescriptionSpanishKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescSpanishKids" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescSpanishKids" form="3dAssetForm"><?php echo trim($asset_desc_spanish_kids_saved); ?></textarea>
                            <label for="assetDescSpanishKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_spanish_kids_label; ?></label>
                        </div>
    
                        <div id="assetDescriptionSpanishExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescSpanishExperts" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescSpanishExperts" form="3dAssetForm"><?php echo trim($asset_desc_spanish_experts_saved); ?></textarea>
                            <label for="assetDescSpanishExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_spanish_experts_label; ?></label>
                        </div>
    
                        <div id="assetDescriptionSpanishPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescSpanishPerception" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescSpanishPerception" form="3dAssetForm"><?php echo trim($asset_desc_spanish_perception_saved); ?></textarea>
                            <label for="assetDescSpanishPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_spanish_perception_label; ?></label>
                        </div>
                        
                    </div>

                    <!-- French  -->

                    <div id="FrenchEdit" class="tab-container_lang" style="position:relative">
                        
                        <div id="assetTitleFrench" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetTitFrench" class="mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;"
                                          name="assetTitFrench" form="3dAssetForm"><?php echo trim($asset_title_french_saved); ?></textarea>
                            <label for="assetTitFrench" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_french_label; ?></label>
                        </div>
                        
                        <div id="assetDescriptionFrench" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                                 style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescFrench" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescFrench" form="3dAssetForm"><?php echo trim($asset_desc_french_saved); ?></textarea>
                            <label for="assetDescFrench" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_french_label; ?></label>
                        </div>

                        <div id="assetDescriptionFrenchKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescFrenchKids" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescFrenchKids" form="3dAssetForm"><?php echo trim($asset_desc_french_kids_saved); ?></textarea>
                            <label for="assetDescFrenchKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_french_kids_label; ?></label>
                        </div>
    
                        <div id="assetDescriptionFrenchExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescFrenchExperts" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescFrenchExperts" form="3dAssetForm"><?php echo trim($asset_desc_french_experts_saved); ?></textarea>
                            <label for="assetDescFrenchExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_french_experts_label; ?></label>
                        </div>
    
                        <div id="assetDescriptionFrenchPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescFrenchPerception" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescFrenchPerception" form="3dAssetForm"><?php echo trim($asset_desc_french_perception_saved); ?></textarea>
                            <label for="assetDescFrenchPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_french_perception_label; ?></label>
                        </div>
                    </div>
                    
                    <!-- German  -->
                    
                    <div id="GermanEdit" class="tab-container_lang" style="position:relative">

                        <div id="assetTitleGerman" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetTitGerman" class="mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;"
                                          name="assetTitGerman" form="3dAssetForm"><?php echo trim($asset_title_german_saved); ?></textarea>
                            <label for="assetTitGerman" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_german_label; ?></label>
                        </div>

                        <div id="assetDescriptionGerman" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGerman" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescGerman" form="3dAssetForm"><?php echo trim($asset_desc_german_saved); ?></textarea>
                            <label for="assetDescGerman" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_german_label; ?></label>
                        </div>

                        <div id="assetDescriptionGermanKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescGermanKids" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescGermanKids" form="3dAssetForm"><?php echo trim($asset_desc_german_kids_saved); ?></textarea>
                            <label for="assetDescGermanKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_german_kids_label; ?></label>
                        </div>

                        <div id="assetDescriptionGermanExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescGermanExperts" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescGermanExperts" form="3dAssetForm"><?php echo trim($asset_desc_german_experts_saved); ?></textarea>
                            <label for="assetDescGermanExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_german_experts_label; ?></label>
                        </div>

                        <div id="assetDescriptionGermanPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescGermanPerception" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescGermanPerception" form="3dAssetForm"><?php echo trim($asset_desc_german_perception_saved); ?></textarea>
                            <label for="assetDescGermanPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_german_perception_label; ?></label>
                        </div>
                    </div>

                    <!-- Russian  -->
                    <div id="RussianEdit" class="tab-container_lang" style="position:relative">

                        <div id="assetTitleRussian" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetTitRussian" class="mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;"
                                          name="assetTitRussian" form="3dAssetForm"><?php echo trim($asset_title_russian_saved); ?></textarea>
                            <label for="assetTitRussian" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_russian_label; ?></label>
                        </div>

                        <div id="assetDescriptionRussian" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescRussian" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescRussian" form="3dAssetForm"><?php echo trim($asset_desc_russian_saved); ?></textarea>
                            <label for="assetDescRussian" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_russian_label; ?></label>
                        </div>

                        <div id="assetDescriptionRussianKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescRussianKids" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescRussianKids" form="3dAssetForm"><?php echo trim($asset_desc_russian_kids_saved); ?></textarea>
                            <label for="assetDescRussianKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_russian_kids_label; ?></label>
                        </div>

                        <div id="assetDescriptionRussianExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescRussianExperts" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescRussianExperts" form="3dAssetForm"><?php echo trim($asset_desc_russian_experts_saved); ?></textarea>
                            <label for="assetDescRussianExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_russian_experts_label; ?></label>
                        </div>

                        <div id="assetDescriptionRussianPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescRussianPerception" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                          name="assetDescRussianPerception" form="3dAssetForm"><?php echo trim($asset_desc_russian_perception_saved); ?></textarea>
                            <label for="assetDescRussianPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_russian_perception_label; ?></label>
                        </div>
                    </div>
    
                </div>
                
                <div id="assetFontsDiv" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                     style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                
                    <input id="assetFonts" type="hidden" class="mdc-textfield__input" style="box-shadow: none;width:40%;margin-left:60%;position:absolute"
                           name="assetFonts" form="3dAssetForm" value="<?php echo trim($asset_fonts_saved); ?>">
    
                    <script>
                        jQuery('#assetFonts')
                            .fontselect()
                            .on('change', function() {
                                applyFont(this.value);
                            });
                    </script>
    
                    <label for="assetFonts" class="mdc-textfield__label" style="background: none; top: 0px"><?php echo $asset_fonts_label; ?></label>
                </div>
    
                <div id="assetback3dcolordiv" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                     style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
    
                    <input id="jscolorpick" class="jscolor {onFineChange:'updateColorPicker(this)'}"
                           style="width:40%;margin-left:60%;padding:20px;" value="000000">
                    
                    <input type="text" id="assetback3dcolor" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; display:none; "
                           name="assetback3dcolor" form="3dAssetForm" value="<?php echo trim($asset_back_3d_color_saved); ?>" />
                    <label for="assetback3dcolor" class="mdc-textfield__label" style="background: none;"><?php echo $asset_back_3d_color_label; ?></label>
                </div>

                <!-- WIKIPEDIA button -->
                <button type="button" class="FullWidth mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple"
                        onclick="wpunity_fetchDescriptionAjaxFrontEnd('Wikipedia', assetTitle.value, jQuery('#assetDesc')[0])">
                    Fetch description from Wikipedia</button>

                <!-- EUROPEANA (shown only in DigiArt)-->
                <?php if ($project_scope === 0){ ?>
                    <button type="button" class="FullWidth mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple"
                            onclick="wpunity_fetchDescriptionAjaxFrontEnd('Europeana', assetTitle.value, jQuery('#assetDesc')[0])"
                            style="margin-top:30px" >Fetch description from Europeana</button>
                <?php } ?>

                <hr class="WhiteSpaceSeparator">


                <!--  Image -->

                <hr />
                
                <?php
                
                $showIMT = in_array($saved_term[0]->slug, ['pois_imagetext','artifact']) ?'':'none';  ?>
                
                <div id="poiImgDetailsPanel" style="display: <?php echo ($asset_id == null)?'none':$showIMT; ?>">
                    <h3 class="mdc-typography--title">Featured Image</h3>
                    
                    <?php if($asset_id == null){ ?>
                        <img id="poiImgFeaturedImgPreview" src="<?php echo plugins_url( '../images/ic_sshot.png', dirname(__FILE__)  ); ?>">
                    <?php }else{ ?>
                        <img id="poiImgFeaturedImgPreview" src="<?php echo $the_featured_image_url; ?>">
                    <?php } ?>
                    <input type="file" name="featured-image" title="Featured image" value="" id="poiImgFeaturedImgInput" accept="image/x-png,image/gif,image/jpeg">
                    <br />
                    <span id="video-description-label" class="mdc-typography--subheading1 mdc-theme--text-secondary-on-background">jpg is recommended </span>

                    <hr class="WhiteSpaceSeparator">
                </div>
                
                <hr />

                <!-- Video for POI video -->
                <!-- Show only if the asset is poi video else do not show at all (it will be shown when the categ is selected) -->
                <?php $showVid = in_array($saved_term[0]->slug, ['artifact','pois_video'])?'':'none'; ?>

                <div id="poiVideoDetailsPanel" style="display:<?php echo ($asset_id == null)?'none':$showVid; ?>;">

                    <h3 class="mdc-typography--title">Video</h3>
                    
                    <div id="videoFileInputContainer" class="">
                        <?php
                        $videoID = get_post_meta($asset_id, 'wpunity_asset3d_video', true);
                        $attachment_post = get_post($videoID);
                        $attachment_file = $attachment_post->guid;
                        ?>
            
                        <?php if(strpos($attachment_file, "mp4" )!==false || strpos($attachment_file, "ogg" )!==false){?>
                            <?php echo $attachment_file; ?>
                            <video width="320" height="240"
                                   poster="/wp-content/plugins/wordpressunity3deditor/images/video_img.png" controls preload="auto">
                                <source src="<?php echo $attachment_file;?>" type="video/mp4">
                                <source src="<?php echo $attachment_file;?>" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        <?php } ?>

                        <label for="videoFileInput"> Select a new video</label>
                        <input class="FullWidth" type="file" name="videoFileInput" value="" id="videoFileInput" accept="video/*"/>
                        <br />
                        <span id="video-description-label" class="mdc-typography--subheading1 mdc-theme--text-secondary-on-background">mp4 is recommended </span>
                    </div>
                </div>
                
                <hr />
                
            <?php } else { ?>
            
        <!--                Show-->
                
                <span id="assetTitleView" style="font-size:24pt"><?php echo trim($asset_title_saved); ?></span>

                <!--Carousel slideshow slides-->
    
                <!-- Video -->
                <?php $showVid = in_array( $saved_term[0]->slug , ['artifact', 'pois_video'])?'':'none';  ?>
                <!-- Image -->
                <?php $showIMT = in_array($saved_term[0]->slug,['artifact','pois_imagetext'])?'':'none';  ?>
                
                <div class="slideshow-container">
    
                    <!-- Check if video slide should be shown -->
                    <?php if ($showVid=='' && $asset_id != null){ ?>
                         <div class="mySlides fade">
                            <!-- Video slide -->
                            <!--<div class="numbertext">1 / 2</div>-->
                            <div id="poiVideoDetailsPanel" style="display:<?php echo ($asset_id == null)?'none':$showVid; ?>;">
    
                                <div id="videoFileInputContainer" class="">
                                    <?php
                                    $videoID = get_post_meta($asset_id, 'wpunity_asset3d_video', true);
                                    $attachment_post = get_post($videoID);
                                    $attachment_file = $attachment_post->guid;
                                    ?>
                
                                    <?php if( strpos($attachment_file, "mp4" )!==false || strpos($attachment_file, "ogg" )!==false){?>
                                        <video style="width:3840px; height:auto" controls>
                                            <source src="<?php echo $attachment_file;?>" type="video/mp4">
                                            <source src="<?php echo $attachment_file;?>" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- Caption -->
                            <div class="text"></div>
                          </div>
                     <?php } ?>


                    <!--  Image check if should be shown -->
                    <?php if ($showIMT=='' && $asset_id != null && $the_featured_image_url!=null){ ?>
                        <div class="mySlides fade">
                            <!--  <div class="numbertext">2 / 2</div>-->
                                <div id="poiImgDetailsPanel_preview" style="display: <?php echo ($asset_id == null)?'none':$showIMT; ?>">
                                <?php if($asset_id != null){ ?>
                                    <img id="poiImgFeaturedImgPreview" style="width:auto" src="<?php echo $the_featured_image_url; ?>">
                                <?php } ?>
                            </div>
                            <!-- Caption -->
                            <div class="text"></div>
                        </div>
                    <?php } ?>
                    
                    <!--   Sliders prev next -->
                    <?php if ($showVid=='' && $showIMT=='' && $asset_id != null && $the_featured_image_url!=null){ ?>
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    <?php } ?>
    
                 </div>
                 
                <br>

                <!--   Sliders dots below -->
                <?php if ($showVid=='' && $showIMT=='' && $asset_id != null && $the_featured_image_url!=null){ ?>
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                </div>
                <?php } ?>
                
                
                <!-- Languages -->
                <ul class="langul" style="margin:5px">
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'English')" style="padding:0px 1% !important;">English</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'Greek')" style="padding:0px 1% !important;">ΕΛΛΗΝΙΚΑ</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'Spanish')" style="padding:0px 1% !important;">Español</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'French')" style="padding:0px 1% !important;">Français</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'German')" style="padding:0px 1% !important;">Deutsch</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'Russian')" style="padding:0px 1% !important;">Pусский</button>
                </ul>

                <!-- Accessibility -->
                <div style="display:inline-block; margin-left:10px; width:100%;" >
                    
                    <input type="text" id="assetback3dcolor" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; display:none; "
                           name="assetback3dcolor" form="3dAssetForm" value="<?php echo trim($asset_back_3d_color_saved); ?>" />

                    <button id="jscolorpick"
                            class="jscolor {valueElement:null,value:'<?php echo $back_3d_color; ?>',onFineChange:'updateColorPicker(this)'}" value="cccccc"
                            style="padding:10px;width:20px;height:40px;max-height:40px;min-height:40px;left:0;display:inline-block;vertical-align:bottom">
                    </button>

                    <div id="font-size-selector" style="display:inline-block; right: 10%;font-size: 1.5em;">
                        <div id="plustext" alt="Increase text size"  onclick="resizeText(1,event)" style="margin-left:10px;display:inline-block;font-size:18pt;">A+</div>
                        <div id="minustext" alt="Decrease text size" onclick="resizeText(-1,event)" style="margin-left:10px;display:inline-block;font-size:14pt;">A-</div>
                    </div>

                    <button type='button' class="mdc-button" onclick="openAccess(event, '')"
                            style="background-color:white; padding:0px; vertical-align:bottom; float:right" >
                        <img src="/wp-content/plugins/wordpressunity3deditor/images/accessibility_icons/general_population_icon.png" width="40px" height="40px" style="background-color:white"/>
                    </button>
                    
                    <button type='button' class="mdc-button" onclick="openAccess(event, 'Experts')"
                            style="background-color:white; padding:0px; vertical-align:bottom; float:right" >
                        <img src="/wp-content/plugins/wordpressunity3deditor/images/accessibility_icons/graduation_icon.png" width="40px" height="40px" style="background-color:white"/>
                    </button>

                    <button type='button' class="mdc-button" onclick="openAccess(event, 'Perception')"
                            style="background-color:white; padding:0px; vertical-align:bottom; float:right" >
                        <img src="/wp-content/plugins/wordpressunity3deditor/images/accessibility_icons/heart_icon.png" width="40px" height="40px" style="background-color:white"/>
                    </button>

                    <button type='button' class="mdc-button"
                            onclick="openAccess(event, 'Kids')"
                            style="background-color:white; padding:0px; vertical-align:bottom; float:right" >
                        <img src="/wp-content/plugins/wordpressunity3deditor/images/accessibility_icons/children_icon.png" width="40px" height="40px" style="background-color:white"/>
                    </button>
                    
                </div>
                
                
                <div class="wrapper_lang">
                    <div id="English" class="tabcontent2 active" style="font-family:<?php echo str_replace("+"," ", $fonts);?>">
                        <?php echo trim($asset_desc_saved);?>
                    </div>

                    <div id="EnglishKids" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>">
                        <?php echo trim($asset_desc_kids_saved);?>
                    </div>

                    <div id="EnglishExperts" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>">
                        <?php echo trim($asset_desc_experts_saved);?>
                    </div>

                    <div id="EnglishPerception" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>">
                        <?php echo trim($asset_desc_perception_saved);?>
                    </div>


                    <div id="Greek" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"> <?php echo trim($asset_desc_greek_saved); ?></div>
                    <div id="GreekKids" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"> <?php echo trim($asset_desc_greek_kids_saved); ?></div>
                    <div id="GreekExperts" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"> <?php echo trim($asset_desc_greek_experts_saved); ?></div>
                    <div id="GreekPerception" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"> <?php echo trim($asset_desc_greek_perception_saved); ?></div>
                    
                    <div id="Spanish" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_spanish_saved); ?></div>
                    <div id="SpanishKids" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_spanish_kids_saved); ?></div>
                    <div id="SpanishExperts" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_spanish_experts_saved); ?></div>
                    <div id="SpanishPerception" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_spanish_perception_saved); ?></div>
                    
                    
                    <div id="French" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_french_saved); ?></div>
                    <div id="FrenchKids" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_french_kids_saved); ?></div>
                    <div id="FrenchExperts" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_french_experts_saved); ?></div>
                    <div id="FrenchPerception" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_french_perception_saved); ?></div>

                    <div id="German" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_german_saved); ?></div>
                    <div id="GermanKids" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_german_kids_saved); ?></div>
                    <div id="GermanExperts" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_german_experts_saved); ?></div>
                    <div id="GermanPerception" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_german_perception_saved); ?></div>

                    <div id="Russian" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_russian_saved); ?></div>
                    <div id="RussianKids" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_russian_kids_saved); ?></div>
                    <div id="RussianExperts" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_russian_experts_saved); ?></div>
                    <div id="RussianPerception" class="tabcontent2" style="font-family:<?php echo str_replace("+"," ", $fonts);?>"><?php echo trim($asset_desc_russian_perception_saved); ?></div>

                    

                </div>
                
                <div id="confwindow" style="align-items: center; justify-content: center; border 0px; display:none" >
                    <iframe id="iframeConf" width="100%" height="350px" style="margin-bottom:0;" frameBorder=0 src=""
                            allow="camera;microphone"></iframe>

                </div>

                <div id="confwindow_helper" style="padding-top: 20px;text-align: center;width: 200px;margin: 0 auto;">
                    <h1><img src="/wp-content/plugins/wordpressunity3deditor/peer-calls/src/res/peer-calls.svg" alt="Peer Calls" ></h1>
                    <p>Video-conference with the museum expert!</p>
                    <button type="button" onclick="startConf()">Call</button>
                </div>
                
                


                <script>

                    function startConf(){
                        jQuery("#confwindow")[0].style.display="";
                        jQuery("#confwindow_helper")[0].style.display="none";

                        document.getElementById('iframeConf').src = "https://heliosvr.mklab.iti.gr:3000/call/<?php echo $asset_title_saved; ?>";

                        wpunity_notify_confpeers();
                    }
                    
                    
                    tabcontent = document.getElementsByClassName("tabcontent2");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    
                    var url = window.location.href;
                    var langcurr= url.substring(url.indexOf("#")+1);
                    
                    jQuery("#"+langcurr + ".tabcontent2")[0].style.display = "block";



                    function openAccess(evt, accessLevel) {
                        
                        var i, tabcontent, tablinks;
                        
                        // The description
                        tabcontent = document.getElementsByClassName("tabcontent2");
                        
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        
                        // tablinks = document.getElementsByClassName("tablinks2");
                        // for (i = 0; i < tablinks.length; i++) {
                        //     tablinks[i].className = tablinks[i].className.replace(" active", "");
                        // }
                        
                        document.getElementById(currLanguage + accessLevel).style.display = "block";
                        
                        evt.currentTarget.className += " active";
                    }
                    
                    
                    function openLanguage(evt, lang) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent2");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks2");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        
                        currLanguage = lang;
                        
                        document.getElementById(lang).style.display = "block";

                        var titLang = eval('asset_title_'+currLanguage.toLowerCase()+'_saved');
                        
                        console.log(titLang);
                        
                        if (titLang == '')
                            titLang = eval('asset_title_english_saved');
                        
                        document.getElementById("assetTitleView").innerHTML = titLang;
                        
                        
                        
                        evt.currentTarget.className += " active";
                    }
                </script>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                


                
                
                
                





            <?php } ?>

            

            
            <!-- MOLECULE -->
            <?php $showMolType = $saved_term[0]->slug == 'molecule'?'':'none'; ?>
    
            <div id="moleculeOptionsPanel" style="display: <?php echo ($asset_id == null)?'none':$showMolType; ?>;">
    
                <h3 class="mdc-typography--title">Molecule Options</h3>
    
                <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input id="moleculeChemicalType" name="moleculeChemicalType" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                           style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                    <label for="moleculeChemicalType" class="mdc-textfield__label"> Chemical Type (e.g.: H2O)</label>
                    <div class="mdc-textfield__bottom-line"></div>
                </div>
    
                <div style="display: none;">
    
<!--                    <hr class="WhiteSpaceSeparator">-->
    
                    <h3 class="mdc-typography--title">Functional Group</h3>
    
                    <div id="moleculeFunctionalGroupSelect" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                        <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Select a functional group</span>
                        <div class="mdc-simple-menu mdc-select__menu">
                            <ul class="mdc-list mdc-simple-menu__items">
                                <li class="mdc-list-item mdc-theme--text-hint-on-light" role="option" aria-disabled="true" style="pointer-events: none;" tabindex="-1">
                                    Select a functional group
                                </li>
                                <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="functionalGroupNone" tabindex="0">
                                    None
                                </li>
                                <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="functionalGroupAlcohol" tabindex="0">
                                    Alcohol
                                </li>
                                <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="functionalGroupKetone" tabindex="0">
                                    Ketone
                                </li>
                            </ul>
                        </div>
                    </div>
                    <input id="moleculeFunctionalGroupInput" name="moleculeFunctionalGroupInput" type="hidden">
    
<!--                    <hr class="WhiteSpaceSeparator">-->
    
                    <h3 class="mdc-typography--title">Fluid Options</h3>
    
                    <label for="molecule-fluid-viscosity-slider-label" class="mdc-typography--subheading2">Viscosity: </label>
                    <div class="mdc-textfield" data-mdc-auto-init="MDCTextfield">
                        <input id="molecule-fluid-viscosity-slider-label" name="molecule-fluid-viscosity-slider-label" type="number" step="0.1" value="1" min="0" max="2000" minlength="1" maxlength="4" class="mdc-textfield__input mdc-theme--text-primary-on-light"
                               style="font-weight:bold; border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0;">
                        <div class="mdc-textfield__bottom-line"></div>
                    </div>
    
                    <!--<input class="mdc-textfield mdc-textfield__input mdc-theme--secondary" type="text" id="molecule-fluid-viscosity-slider-label" style="box-shadow: none; border-color:transparent; font-weight:bold; width: auto;">-->
                    <div id="molecule-fluid-viscosity-slider"></div>
                    <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light">
            1 = Water like viscosity, bigger values mean thicker liquid.</span>
                    <input type="hidden" id="moleculeFluidViscosityVal" name="moleculeFluidViscosityVal" value="">
    
                </div>
            </div>
    
            <div id="chemistryBoxOptionsPanel" style="display: none;">
    
                <div style="display: none;">
    
                    <h3 class="mdc-typography--title">Known Group</h3>
    
                    <div id="boxKnownGroupSelect" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                        <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Select a known group</span>
                        <div class="mdc-simple-menu mdc-select__menu">
                            <ul class="mdc-list mdc-simple-menu__items">
                                <li class="mdc-list-item mdc-theme--text-hint-on-light" role="option" aria-disabled="true" style="pointer-events: none;" tabindex="-1">
                                    Select a known group
                                </li>
                                <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="knownGroupAlcohol" tabindex="0">
                                    Alcohol
                                </li>
                                <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="knownGroupKetone" tabindex="0">
                                    Ketone
                                </li>
                                <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option" id="knownGroupVarious" tabindex="0">
                                    Various
                                </li>
                            </ul>
                        </div>
                    </div>
                    <input id="boxKnownGroupInput" type="hidden">
    
                </div>
    
            </div>
        
            <div class="" id="objectPropertiesPanel">
        
                <div style="display:<?php echo (($isOwner || $isUserAdmin) && !$isPreviewMode)?'':'none';?>">
                    <h3 class="mdc-typography--title">Object Properties</h3>
        
                    <ul class="RadioButtonList">
                    <!--<li class="mdc-form-field" style="pointer-events: none; " disabled>
                      <div class="mdc-radio" >
                          <input class="mdc-radio__native-control" type="radio" id="fbxRadio"  name="objectTypeRadio" value="fbx" disabled>
                          <div class="mdc-radio__background">
                              <div class="mdc-radio__outer-circle"></div>
                              <div class="mdc-radio__inner-circle"></div>
                          </div>
                      </div>
                      <label id="fbxRadio-label" for="fbxRadio" style="margin-bottom: 0;">FBX file</label>
                  </li>-->
        
                        <li class="mdc-form-field" id="mtlRadioListItem">
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="mtlRadio" name="objectTypeRadio" value="mtl">
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label id="mtlRadio-label" for="mtlRadio" style="margin-bottom: 0;">MTL & OBJ files</label>
                        </li>
                        
                        <li class="mdc-form-field" style="display: none;" id="pdbRadioListItem">
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="pdbRadio" name="objectTypeRadio" value="pdb">
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label id="pdbRadio-label" for="pdbRadio" style="margin-bottom: 0;">Protein Data Bank file</label>
                        </li>
        
                    </ul>
                </div>
        
                <div class="">
                    <div class="">
                        <div class="">
        
                            <?php if(($isOwner || $isUserAdmin) && !$isPreviewMode) { ?>
                            
                            <label>Select an asset to insert</label>
                            <ul id="lightSlider">
                                <!--put php loop here for every li item-->
        
                                <?php foreach ( $asset_id_avail_joker as $myAssetID ) {
                                    $mtlID = get_post_meta($myAssetID, 'wpunity_asset3d_mtl', true);
                                    $objID = get_post_meta($myAssetID, 'wpunity_asset3d_obj', true);
                                    $pdbID = get_post_meta($myAssetID, 'wpunity_asset3d_pdb', true);
                                    $screenimgID = get_post_meta($myAssetID, 'wpunity_asset3d_screenimage', true);
                                    $diffimgID = get_post_meta($myAssetID, 'wpunity_asset3d_diffimage', true);
                                    $screenimgURL = wp_get_attachment_url($screenimgID) ? wp_get_attachment_url($screenimgID) : plugins_url( '../images/thumb-no-asset.png', dirname(__FILE__) );
        
        
                                    $pdb_sample_file_contents = $pdbID ? file_get_contents(wp_get_attachment_url( $pdbID )) : '';
        
                                    echo '<li data-thumb="'. $screenimgURL . '">';
                                    echo '<img class="asset-image-tile-style" src="'. $screenimgURL .'"'.
                                         ' data-asset-id="'. $myAssetID .'"'.
                                         ' data-mtl-file="'. basename( get_attached_file( $mtlID ) ) .'"'.
                                         ' data-obj-file="'. basename( get_attached_file( $objID ) ) .'"'.
                                         ' data-pdb-content="'. $pdb_sample_file_contents  .'"'.
                                         ' data-path-url="'. pathinfo(wp_get_attachment_url($mtlID))['dirname'] .'/"'.
                                         ' onclick="loader_asset_exists(this.dataset.pathUrl, this.dataset.mtlFile, this.dataset.objFile, this.dataset.pdbContent);'.
                                         'document.getElementById(\'asset_sourceID\').value = this.dataset.assetId;'.
                                         '"/>';
                                    echo '</li>';
                                }	?>
        
        
                            </ul>
                            <?php } ?>
                            
                            
                            <input type="hidden" id="asset_sourceID" name="asset_sourceID" value=""/>
        
                            <?php if(($isOwner || $isUserAdmin) && !$isPreviewMode) { ?>
                                <label id="fileUploadInputLabel" for="multipleFilesInput"> Or select an a) obj, b) mtl, & c) optional texture file</label>
                            
                            
                            <input id="fileUploadInput"
                                   class="FullWidth" type="file" name="multipleFilesInput" value=""
                                   style="display: <?php echo $isUserloggedIn?'':'none';?>"
                                   multiple accept=".obj,.mtl,.jpg,.png"/>

                                <hr />
                            <?php } ?>
                            
        
                            <input type="hidden" name="fbxFileInput" value="" id="fbxFileInput" />
                            <input type="hidden" name="objFileInput" value="" id="objFileInput" />
                            <input type="hidden" name="mtlFileInput" value="" id="mtlFileInput" />
                            <input type="hidden" name="pdbFileInput" value="" id="pdbFileInput" />

                            
                        </div>
        
                        
                        
                        <div id="sshotFileInputContainer" class="" style="display: <?php echo (($isOwner || $isUserAdmin) && !$isPreviewMode)?'':'none';?>">
                            <h3 class="mdc-typography--title">Screenshot</h3>
                            <?php
                                if($asset_id==null) {
                                    // If asset is not created load a predefault image
                                    echo '<img id = "sshotPreviewImg" style = "width: auto; height: 100px" src="'.
                                     plugins_url( '../images/ic_sshot.png', dirname(__FILE__)  ).'">';
                                } else {
                                    // if asset is edited load the existing screenshot url
                                    $scrnImageURL = wp_get_attachment_url( get_post_meta($asset_id, "wpunity_asset3d_screenimage",true) );
                                    echo '<img id = "sshotPreviewImg" style = "width: auto; height: 100px" src="'.$scrnImageURL.'">';
                                    // There is no need to resend the image. I ignore the field operations if it is empty.
        //                                        $scrImgData = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($scrnImageURL));
        //                                        echo '<input class="FullWidth" type="hidden" name="sshotFileInput" value="'.$scrImgData.'" id="sshotFileInput" accept="image/jpeg"/>';
                                }
                            ?>
                            <input class="FullWidth" type="hidden" name="sshotFileInput" value="" id="sshotFileInput" accept="image/jpeg"/>
                            <a id="createModelScreenshotBtn" type="button" class="mdc-button mdc-button--primary mdc-theme--primary" data-mdc-auto-init="MDCRipple">Create screenshot</a>
                         </div>

                        <hr />
                        
                    </div>
                </div>
             </div>

            <?php
            // Virtual Labs widgets
            if ($project_scope == 1)
                require(plugin_dir_path(__DIR__) . '/wp-content/plugins/wordpressunity3deditor/includes/templates/virtual_labs_asset_editor_widgets.php');
            ?>
            
            <hr class="WhiteSpaceSeparator">
    
    
            <!--       IPR category              -->
            <?php
                $cat_ipr_terms = get_terms('wpunity_asset3d_ipr_cat', array('get' => 'all'));
                $saved_ipr_term = wp_get_post_terms( $asset_id, 'wpunity_asset3d_ipr_cat');
            ?>
    
            <!-- CATEGORY IPR -->
            <div class="" id="ipr-div" style="display:<?php echo (($isOwner || $isUserAdmin) && !$isPreviewMode)?'':'none';?>">
    
                <h3 class="mdc-typography--title">Select an IPR plan</h3>
                <div id="category-ipr-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 100%;">
                    <i class="material-icons mdc-theme--text-hint-on-light">label</i>&nbsp;
                
                    <?php if($asset_id == null) { ?>
                        <span id="currently-ipr-selected" class="mdc-select__selected-text mdc-typography--subheading2">No IPR category selected</span>
                    <?php } else { ?>
                        <span data-cat-ipr-desc="<?php echo $saved_ipr_term[0]->description; ?>" data-cat-ipr-slug="<?php echo $saved_ipr_term[0]->slug; ?>" data-cat-ipr-id="<?php echo $saved_ipr_term[0]->term_ipr_id; ?>" id="currently-ipr-selected" class="mdc-select__selected-text mdc-typography--subheading2"><?php echo $saved_ipr_term[0]->name; ?></span>
                    <?php } ?>

           
                    <div class="mdc-simple-menu mdc-select__menu">
                        <ul class="mdc-list mdc-simple-menu__items">

                            <li class="mdc-list-item mdc-theme--text-hint-on-light" role="option" aria-disabled="true" tabindex="-1" style="pointer-events: none;">
                                No IPR category selected
                            </li>
                            
                            <?php foreach ( $cat_ipr_terms as $term_ipr ) { ?>
                                <li class="mdc-list-item mdc-theme--text-primary-on-background" role="option"
                                    title="<?php echo $term_ipr->description; ?>"
                                    data-cat-ipr-desc="<?php echo $term_ipr->description; ?>"
                                    data-cat-ipr-slug="<?php echo $term_ipr->slug; ?>" id="<?php echo $term_ipr->term_id?>" tabindex="0">
                                    <?php echo $term_ipr->name; ?>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>

                <span style="font-style: italic;" class="mdc-typography--subheading2 mdc-theme--text-secondary-on-light" id="categoryIPRDescription"> </span>
            
                <input id="termIdInputIPR" type="hidden" name="term_id_ipr" value="">
 
                
    
            </div>
            
            
            <!--                                                  -->
    
            <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
        
            <?php if(($isOwner || $isUserAdmin) && !$isPreviewMode) { ?>
                <input type="hidden" name="submitted" id="submitted" value="true" />
                
                <?php $buttonTitleText = ($asset_id == null ? "Create asset" : "Update asset"); ?>
                
                <button id="formSubmitBtn" style="display: none;" class="ButtonFullWidth mdc-button mdc-elevation--z2 mdc-button--raised mdc-button--primary"
                        data-mdc-auto-init="MDCRipple" type="submit" <?php echo $isEditable?'':' disabled' ?> >
                    <?php echo $buttonTitleText; ?>
                </button>
            <?php } ?>
    
            <?php echo $isEditable?'':'*You do not have persmission to edit this asset'?>

        </div>
    </form>

    

    <!--                     Javascript                             -->

    <script type="text/javascript">
        'use strict';

        var mdc = window.mdc;
        mdc.autoInit();
        var currLanguage = "English";
        
        var game_type_slug = "<?php echo $game_type_slug; ?>";

        var back_3d_color = "<?php echo $back_3d_color; ?>";
        
        document.getElementById("jscolorpick").value = back_3d_color;
        
        // TODO: Remove also from register and enquire
        var wu_webw_3d_view = new WU_webw_3d_view( document.getElementById( 'previewCanvas' ), back_3d_color );

        
        wpunity_reset_panels(wu_webw_3d_view);

        var multipleFilesInputElem = document.getElementById( 'fileUploadInput' );

        
        
        loadAssetPreviewer(wu_webw_3d_view, multipleFilesInputElem);

        

        var sshotPreviewDefaultImg = document.getElementById("sshotPreviewImg").src;
        var createScreenshotBtn = jQuery("#createModelScreenshotBtn");

        createScreenshotBtn.click(function() {

            wu_webw_3d_view.renderer.preserveDrawingBuffer = true;
            wpunity_create_model_sshot(wu_webw_3d_view);
        });

        (function() {
            var MDCSelect = mdc.select.MDCSelect;
            
            var categoryDropdown = document.getElementById('category-select');
            var categoryIPRDropdown = document.getElementById('category-ipr-select');

            var categorySelect = MDCSelect.attachTo(categoryDropdown);
            var selectedCatId = jQuery('#currently-selected').attr("data-cat-id");


            var categoryIPRSelect = MDCSelect.attachTo(categoryIPRDropdown);
            var selectedCatIPRId = jQuery('#currently-ipr-selected').attr("data-cat-ipr-id");
            

            var moleculeFunctionalGroupDropdown = document.getElementById('moleculeFunctionalGroupSelect');
            var moleculeFunctionalGroupSelect = MDCSelect.attachTo(moleculeFunctionalGroupDropdown);

            var boxKnownGroupDropdown = document.getElementById('boxKnownGroupSelect');
            var boxKnownGroupSelect = MDCSelect.attachTo(boxKnownGroupDropdown);


            // This fires on CREATE
            jQuery( document ).ready(function() {

                if (jQuery('#currently-selected').attr("data-cat-id")) {
                    jQuery('#'+ selectedCatId).attr("aria-selected", true);
                    jQuery('#category-select').addClass('mdc-select--disabled').attr( "aria-disabled", true);
                    loadLayout(false);
                }

                if (jQuery('#currently-ipr-selected').attr("data-cat-ipr-id")) {
                    jQuery('#'+ selectedCatIPRId).attr("aria-selected", true);
                    jQuery('#category-ipr-select').addClass('mdc-select--disabled').attr( "aria-disabled", true);
                }
                
            });



            // Scroll to top because with # focuses to language description
            window.onload = function () {
                setTimeout(function () {
                    document.getElementById("text-asset-sidebar").scrollTo(0,0)
                }, 0);
            };

            // This fires on CHANGE
            categoryDropdown.addEventListener('MDCSelect:change', function() {
                loadLayout(true);
            });

            categoryIPRDropdown.addEventListener('MDCSelect:change', function() {

                //var descTextIPR = document.getElementById('categoryIPRDescription');
                //descTextIPR.innerHTML = jQuery("#currently-ipr-selected").attr("data-cat-ipr-desc");
                
                // Change the description of the popup
                jQuery("#categoryIPRDescription")[0].innerHTML =  categoryIPRSelect.selectedOptions[0].getAttribute("data-cat-ipr-desc");
     
                // descTextIPR.innerHTML = categoryIPRSelect.selectedOptions[0].getAttribute("data-cat-ipr-desc");
                // catIPR = categoryIPRSelect.selectedOptions[0].getAttribute("data-cat-ipr-slug");
                // jQuery("#termIdInputIPR").attr( "value", categorySelect.selectedOptions[0].getAttribute("id") );

                // Change the value of termIdInputIPR
                jQuery("#termIdInputIPR").attr( "value", categoryIPRSelect.selectedOptions[0].getAttribute("id") );
            });
            
            //-----------------------

            moleculeFunctionalGroupDropdown.addEventListener('MDCSelect:change', function() {
                jQuery("#moleculeFunctionalGroupInput").attr( "value", moleculeFunctionalGroupSelect.selectedOptions[0].getAttribute("id") );
            });

            boxKnownGroupDropdown.addEventListener('MDCSelect:change', function() {
                jQuery("#boxKnownGroupInput").attr( "value", boxKnownGroupSelect.selectedOptions[0].getAttribute("id") );
            });

            loadFileInputLabel();

            var lightSliderOpts = {
                item: 4,
                loop: false,
                slideMove: 1,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed: 600,
                responsive : [
                    {
                        breakpoint:800,
                        settings: {
                            item:3,
                            slideMove:1,
                            slideMargin:6
                        }
                    },
                    {
                        breakpoint:480,
                        settings: {
                            item:2,
                            slideMove:1
                        }
                    }
                ]
            };

            var lightSliderLoaded = false;

            function loadLayout(createAsset) {

                var item = categorySelect.selectedOptions[0];
                var index = categorySelect.selectedIndex;
                
                jQuery("#informationPanel").show();
                jQuery("#formSubmitBtn").show();

                jQuery("#pdbRadioListItem").show();
                
                wu_webw_3d_view.resizeDisplayGL();

                wpunity_reset_panels(wu_webw_3d_view);

                var descText;
                var cat;

                descText = document.getElementById('categoryDescription');
                
                if(createAsset) {

                    descText.innerHTML = categorySelect.selectedOptions[0].getAttribute("data-cat-desc");
                    cat = categorySelect.selectedOptions[0].getAttribute("data-cat-slug");
                    jQuery("#termIdInput").attr( "value", categorySelect.selectedOptions[0].getAttribute("id") );

                } else {
                    
                    descText.innerHTML = jQuery("#currently-selected").attr("data-cat-desc");
                    cat = jQuery("#currently-selected").attr("data-cat-slug");
                    jQuery("#termIdInput").attr( "value", selectedCatId );
                }

                if (cat === 'molecule') {
                    jQuery("#mtlRadio").prop("checked", false);
                    jQuery("#mtlRadioListItem").hide();
                    jQuery("#pdbRadio").prop("checked", true);
                    jQuery("#pdbRadioListItem").show();

                } else {
                    jQuery("#mtlRadio").prop("checked", true);
                    jQuery("#mtlRadioListItem").show();
                    jQuery("#pdbRadio").prop("checked", false);
                    jQuery("#pdbRadioListItem").hide();
                }

                mdc.radio.MDCRadio.attachTo(document.querySelector('.mdc-radio'));
                loadFileInputLabel();

                if (!lightSliderLoaded) {
                    jQuery('#lightSlider').lightSlider(lightSliderOpts);
                    lightSliderLoaded = true;
                }


                jQuery("#poiImgDetailsPanel").hide();
                jQuery("#poiVideoDetailsPanel").hide();
                jQuery("#moleculeOptionsPanel").hide();
                jQuery("#moleculeFluidPanel").hide();

                console.log(cat);
                // Chemistry Asset Type (Molecule)

                switch(cat) {
                    // Archaeology cases
                    case 'doors':
                        jQuery("#doorDetailsPanel").show();
                        break;
                    case 'dynamic3dmodels':
                        break;
                    case 'pois_imagetext':
                    case 'artifact':
                        jQuery("#poiImgDetailsPanel").show();
                    case 'pois_video':
                    case 'artifact':
                        jQuery("#poiVideoDetailsPanel").show();
                    // Energy cases
                    case 'terrain':
                        jQuery("#terrainPanel").show();

                        break;
                    case 'consumer':
                        jQuery("#consumerPanel").show();

                        break;
                    case 'producer':
                        jQuery("#producerPanel").show();
                        break;

                    // Chemistry cases
                    case 'molecule':
                        jQuery("#moleculeOptionsPanel").show();
                        //jQuery("#moleculeFluidPanel").show();
                        break;

                    case 'box':
                        jQuery("#chemistryBoxOptionsPanel").show();
                        break;

                    default:

                }
            }

        })();


        

        jQuery("#poiImgFeaturedImgInput").change(function() {
            wpunity_read_url(this, "#poiImgFeaturedImgPreview");
        });

        jQuery("#poiVideoFeaturedImgInput").change(function() {
            wpunity_read_url(this, "#poiVideoFeaturedImgPreview");
        });


        function wpunity_create_model_sshot(wu_webw_3d_view_local) {

            //console.log(wu_webw_3d_view_local.canvas.toDataURL("image/jpeg"));

            wu_webw_3d_view_local.render();

            // I used html2canvas because there is no toDataURL in labelRenderer so there were no labels in the initial
            // implementation
            html2canvas(document.querySelector("#wrapper_3d_inner")).then(canvas => {

                //document.getElementById("sshotFileInputContainer").appendChild(canvas)
                //document.body.appendChild(canvas)
                wu_webw_3d_view_local.render();
                document.getElementById("sshotPreviewImg").src = canvas.toDataURL("image/jpeg");
                
                
                //------------ Resize for fixed size at input ------------
                var resizedCanvas = document.createElement("canvas");
                var resizedContext = resizedCanvas.getContext("2d");
                
                var context = canvas.getContext("2d");

                resizedCanvas.height = "150";
                resizedCanvas.width = "265";
                resizedContext.drawImage(canvas, 0, 0, resizedCanvas.width, resizedCanvas.height);
                var myResizedData = resizedCanvas.toDataURL();
                //-----------------------------------------------------------
               
                
                document.getElementById("sshotFileInput").value = myResizedData;

        });
        }

        function wpunity_reset_sshot_field() {
            document.getElementById("sshotPreviewImg").src = sshotPreviewDefaultImg;
            document.getElementById("sshotFileInput").value = "";
            /*createScreenshotBtn.hide();*/
            /*jQuery("#objectPreviewTitle").hide();*/
        }

        function loadFileInputLabel() {
            var objectType = jQuery('input[name=objectTypeRadio]:checked').val();
            var inputLabel = document.getElementById('fileUploadInputLabel');
            var input = document.getElementById('fileUploadInput');
            
            if (inputLabel)
                if (objectType === 'pdb') {
                    inputLabel.innerHTML = 'Select a pdb file';
                    input.accept = ".pdb";
                } else {
                    inputLabel.innerHTML = 'Or select an a) obj, b) mtl, & c) optional texture file';
                    input.accept = ".obj,.mtl,.jpg,.png";
                }
        }

        /// Font Selector
        function updateColorPicker(picker){
            document.getElementById('assetback3dcolor').value = picker.toRGBString();
            wu_webw_3d_view .scene.background.r = picker.rgb[0]/255;
            wu_webw_3d_view .scene.background.g = picker.rgb[1]/255;
            wu_webw_3d_view .scene.background.b = picker.rgb[2]/255;
        }

        function applyFont(font) {
            console.log('You selected font: ' + font);

            // Replace + signs with spaces for css
            font = font.replace(/\+/g, ' ');

            // Split font into family and weight
            font = font.split(':');

            var fontFamily = font[0];
            var fontWeight = font[1] || 400;

            // Set selected font on paragraphs
            jQuery('p').css({fontFamily:"'"+fontFamily+"'", fontWeight:fontWeight});
        }


        function resizeText(multiplier,e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            if (document.body.style.fontSize == "") {
                document.body.style.fontSize = "1.0em";
            }
            document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";

             document.getElementsByClassName("asset3d_desc_view")[0].style.marginTop =
                 (parseFloat(document.getElementsByClassName("asset3d_desc_view")[0].style.marginTop)+multiplier*10)+"px";
            
            //console.log( document.getElementsByClassName("asset3d_desc_view")[0].style );
            
            return false;
        }
        
        if (document.getElementsByClassName("asset3d_desc_view").length > 1)
            document.getElementsByClassName("asset3d_desc_view")[0].style.marginTop = "30px";
        
        
        
        
        // Slider (carousel in view mode)
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            
            if(slides.length == 0)
                return;
            
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            
            
            slides[slideIndex - 1].style.display = "block";
            if (typeof dots[slideIndex - 1] != "undefined")
                dots[slideIndex - 1].className += " active";
            
        }
        
        
        
        
        
        
    </script>

<?php
    if($isUserAdmin && $isPreviewMode)
        echo "<script>document.children[0].children[1].style.marginTop='-33px';</script>";
?>


<?php if ($_GET['directcall']){
            echo '<script>startConf()</script>';
        }
?>
