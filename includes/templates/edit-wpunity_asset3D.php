<?php
//Create asset interfaces

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// For auto-translation by Google
$hasTranslator = false;
//if ($hasTranslator) {
//    putenv("GOOGLE_APPLICATION_CREDENTIALS=".get_option( 'general_settings' )['wpunity_google_application_credentials']);
//    if (file_exists(plugin_dir_path(__DIR__) . '/translate/vendor/autoload.php')) {
//        // Include Google Cloud dependendencies using Composer
//        require(plugin_dir_path(__DIR__) . '/translate/vendor/autoload.php');
//        $hasTranslator = true;
//    }
//}
//// [START translate_translate_text]
//use Google\Cloud\Translate\TranslateClient;


// Is on back or front end ?
$isAdmin = is_admin() ? 'back' : 'front';
echo '<script>';
echo 'var isAdmin="'.$isAdmin.'";';
echo '</script>';

// Load Scripts
function loadAsset3DManagerScripts() {

    // Three js : for simple rendering
	wp_enqueue_script('wpunity_scripts');
    wp_enqueue_script('wpunity_qrcode_generator');
    
    // For fbx binary
    wp_enqueue_script('wpunity_inflate'); // for binary fbx

    // 1. Three js library
    wp_enqueue_script('wpunity_load119_threejs');

    // 2. Obj loader simple; For loading an uploaded obj
    wp_enqueue_script('wpunity_load87_OBJloader');

    // 3. Obj loader 2: For preview loading
    wp_enqueue_script('wpunity_load87_OBJloader2');
    wp_enqueue_script('wpunity_load87_WWOBJloader2');

    // 4. Mtl loader
    wp_enqueue_script('wpunity_load87_MTLloader');

    // 5. Pdb loader for molecules
    wp_enqueue_script('wpunity_load87_PDBloader');

    // 6. Fbx loader
    wp_enqueue_script('wpunity_load119_FBXloader');

    // 7. Trackball controls
    wp_enqueue_script('wpunity_load119_TrackballControls');

    // 8. GLTF Loader
    wp_enqueue_script('wpunity_load119_GLTFLoader');
    wp_enqueue_script('wpunity_load119_DRACOLoader');
    wp_enqueue_script('wpunity_load119_DDSLoader');
    wp_enqueue_script('wpunity_load119_KTXLoader');
    
    // For the PDB files to annotate molecules in 3D
	wp_enqueue_script('wpunity_load119_CSS2DRenderer');
	
	// Load single asset
	wp_enqueue_script('WU_webw_3d_view');
	
	
	// Load scripts for asset editor
	wp_enqueue_script('wpunity_asset_editor_scripts');

	// scroll for images thumnbnails (in clone)
	wp_enqueue_script('wpunity_lightslider');
 
	// Select colors
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

// Variables of vr labs
//include plugins_url( '', dirname(__FILE__)  ).'/vr_labs_variables.php';


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
$game_type_obj = wpunity_return_project_type($project_id);


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

$curr_font = "Arial";
$isOwner = $current_user->ID == get_post_field ('post_author', $asset_id);

// New asset
if (!$asset_id) {
    $isOwner = true;
}

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

$path_url = wp_upload_dir()['baseurl'].'/Models/';


// GoBack link
$goBackToLink = '';

// If coming from scene then go to scene editor
if($scene_id != 0 ) {
    
    $goBackToLink = get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . $_GET['scene_type'];
    
    
}else {

    if (!isset($_GET['singleproject']))
        $goBackToLink = home_url()."/wpunity-list-shared-assets/?wpunity_game=".$project_id; // Shared and all private
    else
        $goBackToLink = home_url()."/wpunity-list-shared-assets/?wpunity_project_id=".$project_id; // Single project private
    
}

// ============================================
// Submit Handler
//=============================================
if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {
    
    $fp = fopen("output_check_files.txt","w");
    fwrite($fp, print_r($_FILES, true));
    fclose($fp);
    
    
    include 'edit-wpunity_asset3D_languages_support1.php';
    
    // Fonts Selected
    $assetFonts = esc_attr(strip_tags($_POST['assetFonts']));

    // 3D background color
    $assetback3dcolor=  esc_attr(strip_tags($_POST['assetback3dcolor']));
    
    // Asset category
	$assetCatID = intval($_POST['term_id']);//ID of Asset Category (hidden input)
    
    // Term
	$assetCatTerm = get_term_by('id', $assetCatID, 'wpunity_asset3d_cat');
 
	// IPR Term id
    $assetCatIPRID = intval($_POST['term_id_ipr']); //ID of Asset Category IPR (hidden input)
    
    // IPR Term id cat
    $assetCatIPRTerm = get_term_by('id', $assetCatIPRID, 'wpunity_asset3d_ipr_cat');
    
    // show an icon while waiting
    
    
	// NEW Asset: submit info to backend
	if($asset_id == null){
        
        echo "<div style='position:absolute;top:50%;left:50%;'>Creating asset...</div>";
	    
		//It's a new Asset, let's create it (returns newly created ID, or 0 if nothing happened)
		$asset_id = wpunity_create_asset_frontend($assetPGameID,$assetCatID, $gameSlug, $assetCatIPRID, $asset_language_pack, $assetFonts, $assetback3dcolor);
	}else {
        
        echo "<div style='position:absolute;top:50%;left:50%;'>Updating asset...</div>";
        
	 	// Edit an existing asset: Return true if updated, false if failed
   		$asset_updatedConf = wpunity_update_asset_frontend($assetPGameID, $assetCatID, $asset_id, $assetCatIPRID, $asset_language_pack, $assetFonts, $assetback3dcolor);
	}

	// Upload 3D files
	if($asset_id != 0 || $asset_updatedConf == 1) {
		
	    if ($_POST['asset_sourceID']=='') {
    
            // NoCloning: Upload files from POST but check first
            // if any 3D files have been selected for upload
		    if (count($_FILES['multipleFilesInput']['name']) > 0 && $_FILES['multipleFilesInput']['error'][0] != 4 ){
                wpunity_create_asset_3DFilesExtra_frontend($asset_id, $assetTitleForm,
                    $gameSlug);
            }

		    
		    
			update_post_meta($asset_id, 'wpunity_asset3d_isCloned', 'false');
			update_post_meta($asset_id, 'wpunity_asset3d_isJoker', $isJoker);
			
		}else {
			// Cloning
			wpunity_copy_3Dfiles($asset_id, $_POST['asset_sourceID']);
			
			update_post_meta($asset_id, 'wpunity_asset3d_isCloned', 'true');
			update_post_meta($asset_id, 'wpunity_asset3d_isJoker', "false");
		}
	
	}
    

    // SCREENSHOT: upload and add id of uploaded file to postmeta wpunity_asset3d_screenimage of asset
    if ($_POST['sshotFileInput']!=null) {
        if (strlen($_POST['sshotFileInput'])>0) {
            wpunity_upload_asset_screenshot($_POST['sshotFileInput'], $assetTitleForm,$asset_id);
        }
    }
	
	
	// Save parameters
	if($assetCatTerm->slug == 'consumer') {
		wpunity_create_asset_consumerExtra_frontend($asset_id);
	}elseif($assetCatTerm->slug == 'terrain') {
		wpunity_create_asset_terrainExtra_frontend($asset_id);
	}elseif ($assetCatTerm->slug == 'producer') {
		wpunity_create_asset_producerExtra_frontend($asset_id);
	}elseif ($assetCatTerm->slug == 'molecule') {
		wpunity_create_asset_moleculeExtra_frontend($asset_id);
    }elseif ( $assetCatTerm->slug == 'artifact') {
        wpunity_create_asset_addImages_frontend($asset_id);
        wpunity_create_asset_addAudio_frontend($asset_id);
        wpunity_create_asset_addVideo_frontend($asset_id);
    }
    
	if($scene_id == 0) {
        //echo '<script>alert("Asset created or edited successfully");</script>';

        // Redirect to central otherwise the form is not loaded with the new data
        echo '<script>window.location.href = "'.$_SERVER['HTTP_REFERER'].'&wpunity_asset='.$asset_id.'#English'.'";</script>';
    }
	// Avoid loading the old page
	return;
}
//---------------------------- End of handle Submit  -------------------------


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
    
    // Get post
    $asset_post    = get_post($asset_id);
    
    // Get post meta
    $assetpostMeta = get_post_meta($asset_id);
   
    // Background color in canvas
    $back_3d_color = $assetpostMeta['wpunity_asset3d_back_3d_color'][0];
    
    // Font type for text
    $fonts = $assetpostMeta['wpunity_asset3d_fonts'][0];
    
    $curr_font = str_replace("+", " ", $fonts);
    
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
    
    if (array_key_exists('wpunity_asset3d_glb', $assetpostMeta)){
        $glbpost = get_post($assetpostMeta['wpunity_asset3d_glb'][0]);
        $glb_file_name = $glbpost->guid;
        
        echo '<script>';
        echo 'var glb_file_name="'.$glb_file_name.'";';
        echo '</script>';
    }
    
    
    if (array_key_exists('wpunity_asset3d_fbx', $assetpostMeta)) {

        // Get texture attachments of post
        $args = array(
            'posts_per_page' => 100,
            'order'          => 'DESC',
            'post_mime_type' => 'image',
            'post_parent'    => $asset_id,
            'post_type'      => 'attachment'
        );

        $attachments_array =  get_children( $args,OBJECT );  //returns Array ( [$image_ID].
        
        // Add texture urls to a string separated by |
        $textures_fbx_string_connected = '';
        foreach ($attachments_array as $k){
            $url = $k->guid;
            
            // ignore screenshot attachment
            if (!strpos($url, 'texture'))
                continue;
            
            $textures_fbx_string_connected .= $url.'|';
        }
    
        // remove the last separator
        $textures_fbx_string_connected = trim($textures_fbx_string_connected, "|");
        
        $fbxpost = get_post($assetpostMeta['wpunity_asset3d_fbx'][0]);
        $fbx_file_name = basename($fbxpost->guid);
        $path_url_fbx = pathinfo($fbxpost->guid)['dirname'];
        
        echo '<script>';
        echo 'var fbx_file_name="'.$fbx_file_name.'";';
        echo 'var path_url_fbx="'.$path_url_fbx . '/'    .'";';
        echo 'var textures_fbx_string_connected="'.$textures_fbx_string_connected.'";';
        echo '</script>';
    }
    
    
}
//--------------------------------------------------------
get_header();
//width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no


$dropdownHeading = ($asset_id == null ? "Select a category" : "Category");

// Languages fields show
include 'edit-wpunity_asset3D_languages_support2.php';

// Retrieve Fonts saved
$asset_fonts_saved = ($asset_id == null ? "" : get_post_meta($asset_id,'wpunity_asset3d_fonts', true));

// Retrieve Background Color saved
$asset_back_3d_color_saved = ($asset_id == null ? "#000000" : get_post_meta($asset_id,'wpunity_asset3d_back_3d_color', true));
$asset_back_3d_color_label = "3D viewer background color";


//Check if its new/saved and get data for artifact and Terrain
if($asset_id != null) {
	$saved_term = wp_get_post_terms( $asset_id, 'wpunity_asset3d_cat' );
	
	if($saved_term[0]->slug == 'terrain'){
	
	    // Wind Energy Terrain
        include 'edit-wpunity_asset3D-WindEnergy1.php.php';
		
	}elseif (in_array($saved_term[0]->slug , ['artifact'])) {
	 
	    $images_urls = [null, null, null, null, null];
	    
		// Image 1 : Featured image
        $images_urls[0] = get_the_post_thumbnail_url($asset_id);

		// Image 1,2,3,4
        for ($i=1; $i <= 4; $i++){
            $image_id = get_post_meta($asset_id, "wpunity_asset3d_image".$i);
            if (count($image_id)>0) {
                $images_urls[$i] = wp_get_attachment_metadata($image_id[0]);
                $images_urls[$i] = $images_urls[$i]['file'] == '' ? null :
                    wp_get_upload_dir()['baseurl'] . "/" . $images_urls[$i]['file'];
            }
        }

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
        html { margin-top: 0px !important; }
        * html body { margin-top: 0px !important; }
    </style>

    <div id="wrapper_3d_inner" class="asset_editor_3dpanel">

        <!--   Progress bar -->
        <div id="previewProgressSlider" style="visibility:hidden; position: absolute; z-index:2;width:100%;top:0" class="CenterContents">
            <h6 class="mdc-theme--text-primary-on-light mdc-typography--title" style="position: absolute; left:0; right: 0;color:white !important; mix-blend-mode: difference;">Loading 3D object</h6>
            <h6 id="previewProgressLabel" class="mdc-theme--text-primary-on-light mdc-typography--subheading1"
                style="position: absolute; left:0; right: 0; top: 26px;color:white !important; mix-blend-mode: difference;"></h6>

            <div class="progressSlider">
                <div id="previewProgressSliderLine" class="progressSliderSubLine" style="width: 0;"></div>
            </div>
        </div>
        
        <!-- GUIs of Canvas -->
        <div style="position: absolute;">
            <div id="previewCanvasDiv" style="height:100%; width:100%; position: relative"></div>
        </div>

        <!-- 3D Canvas -->
        <canvas id="previewCanvas" style="height:100%; width:100%;position: relative"></canvas>

        <!-- QR code -->
        <?php include 'edit-wpunity_asset3D_QRCodeGenerator.php'; ?>
        
    </div>


    <div id="text-asset-sidebar" class="asset_editor_textpanel">

        <?php
           if ($isUserloggedIn && !$isPreviewMode) {
    
               echo '<a title="Back" style="color:#1e90ff; overflow: hidden;  text-overflow: ellipsis;  white-space: nowrap;"
                   class="hideAtLocked mdc-button" href="' .$goBackToLink.'">
                    <i class="material-icons" style="font-size: 24px; vertical-align: middle">arrow_back</i>
                    Assets Manager
                </a>';
           }

        // Preview button
        if($isUserloggedIn && !$isPreviewMode && $asset_id != null ){
            $previewLink = ( empty( $_SERVER['HTTPS'] ) ? 'http://' : 'https://' ) .
                $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
            // FROM NEW ASSET ONLY
            if ( !strpos($_SERVER['REQUEST_URI'],"wpunity_asset"))
                $previewLink = $previewLink . '&wpunity_asset='.$asset_id;
    
            // IF from single project
            if (isset($_GET['singleproject']))
                $previewLink = $previewLink . '&singleproject=true';
  
    
            $previewLink = $previewLink . '&preview=1#English';
            ?>

            <a class="mdc-button mdc-button--primary mdc-theme--primary"
               href="<?php echo $previewLink; ?>"
               data-mdc-auto-init="MDCRipple">Preview</a>
    <?php } ?>
    
    <?php
        if ($isPreviewMode){
    
            $curr_uri = $_SERVER['REQUEST_URI'];
            $targetparams = str_replace("preview=1","",$curr_uri);
            $editLink2 = ( empty( $_SERVER['HTTPS'] ) ? 'http://' : 'https://' ).
                $_SERVER['HTTP_HOST'].$targetparams.'#English';
            ?>

            <a class="mdc-button mdc-button--primary mdc-theme--primary"
               href="<?php echo $editLink2; ?>" data-mdc-auto-init="MDCRipple">EDIT Asset</a>
    
    <?php } ?>

    <!-- Prompt 'Edit' or 'Create asset' -->
    <div id="edit-asset-header">
        <span class="mdc-typography--headline mdc-theme--text-primary-on-light" style="width:50%;display:inline-block;">
            <span>
                <?php
                if($isEditable && !$isPreviewMode)
                    $promptAction = ($asset_id == null ? "Create a new asset" : "Edit an existing asset");
                else
                    $promptAction = "";
                
                echo $promptAction;
                ?>
            </span>
        </span>
    </div>

    <!-- Form to submit data -->
    <form name="3dAssetForm" id="3dAssetForm" method="POST" enctype="multipart/form-data">

        <!-- CATEGORY -->
<!--        <div class="" style="display:--><?php //echo ((!$isUserAdmin && !$isOwner) || $isPreviewMode) ? "none":""; ?><!--">-->
        <div class="" style="display:none">
            <h3 class="mdc-typography--title" style="margin-top:30px;"><?php echo $dropdownHeading; ?></h3>

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
                        
                            <?php
                            if (  strpos($term->name, "Points") !== false )
                                continue;
                            ?>


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
        
        <div class="" id="informationPanel" style="display: none;padding-top:0px;">

            <!-- TITLE , DESCRIPTION -->
            <?php if(($isOwner || $isUserAdmin) && !$isPreviewMode) { ?>
            
                <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                    <input id="assetTitle" type="text" class="changablefont mdc-textfield__input mdc-theme--text-primary-on-light" name="assetTitle"
                           aria-controls="title-validation-msg" required minlength="3" maxlength="40"
                           style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); box-shadow: none; border-radius: 0; font-size:24px; padding: 0em; font-family: <?php echo $curr_font?>; "
                           value="<?php echo trim($asset_title_saved); ?>">
                    <label for="assetTitle" class="mdc-textfield__label"><?php echo $asset_title_label; ?> </label>
                    <div class="mdc-textfield__bottom-line"></div>
                </div>
                
                <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg" id="title-validation-msg">
                    Between 3 - 25 characters
                </p>


                <!-- Languages -->
                <ul class="langul" style="margin:0;">
                    <li class="langli"><a href="#EnglishEdit">English</a></li>
                    <li class="langli"><a href="#GreekEdit" >Ελληνικά</a></li>
                    <li class="langli"><a href="#SpanishEdit" >Español</a></li>
                    <li class="langli"><a href="#FrenchEdit" >Français</a></li>
                    <li class="langli"><a href="#GermanEdit" >Deutsch</a></li>
                    <li class="langli"><a href="#RussianEdit" >Pусский</a></li>
                </ul>


                <?php include 'edit-wpunity_asset3D_languages_support3.php'; ?>

                <!-- Select fonts -->
                <div id="assetFontsDiv" style="width:100%;margin-bottom:15px;">
                    <span for="assetFonts" class="mdc-textfield" style="width:40%; height:40px; ">Fonts</span>
                    <input id="assetFonts" type="hidden" class="mdc-textfield__input" style="bottom:5px; width:40%;margin-left:10%;"
                           name="assetFonts" form="3dAssetForm" value="<?php echo trim($asset_fonts_saved); ?>">
                    <script>
                        jQuery('#assetFonts')
                            .fontselect()
                            .on('change', function() {
                                applyFont(this.value);
                            });
                    </script>
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

                <hr />
                
                <?php
                
                if (count($saved_term) > 0)
                    $showImageFields = in_array($saved_term[0]->slug, ['artifact']) ?'':'none';
                else
                    $showImageFields = 'none';

                $defaultImage = plugins_url( '../images/ic_sshot.png', dirname(__FILE__)  );
                ?>

                <!-- Images Input Fields-->
                <div id="imgDetailsPanel" style="display: <?php echo ($asset_id == null)?'none':$showImageFields; ?>">
                    <?php
                        for ($i=0; $i<=4; $i++){
                            echo '<h3 class="mdc-typography--title">Image '. $i .'</h3>';
                            if($asset_id == null){
                                echo '<img id="img'.$i.'Preview" src="'.$defaultImage.'">';
                            }else {
                                echo '<img id="img'.$i.'Preview" src="'.$images_urls[$i].'">';
                            }
                            echo '<input type="file" name="image'.$i.'Input" title="Image '.$i.
                                '" value="" id="img'.$i.'Input" accept="image/x-png,image/gif,image/jpeg">';
                            echo '<br />';
                            echo '<span  class="mdc-typography--subheading1 mdc-theme--text-secondary-on-background">jpg is recommended </span>';
                        }
                    ?>
                </div>

                <script>
                    // On select image alter preview thumbnail
                    for (let i=0; i<=4; i++){
                        jQuery("#img"+i.toString()+"Input").change(function() {
                            wpunity_read_url(this, "#img"+i.toString()+"Preview");
                        });
                    }
                </script>
                
                <!-- End of Images -->

            <!-- Audio -->
            <hr class="WhiteSpaceSeparator">

            <!-- Show only if the asset is artifact  -->
            <?php

                if(count($saved_term)>0) {
                    $showAudio = in_array($saved_term[0]->slug, ['artifact']) ? '' : 'none';
                }else {
                    $showAudio = 'none';
                }

            ?>

                <div id="audioDetailsPanel" style="display:<?php echo ($asset_id == null)?'none':$showAudio;?>; background:grey; padding:5px; width:100%">

                    <h3 class="mdc-typography--title">Audio</h3>

                    <div id="audioFileInputContainer" class="">
                        <?php
                        $audioID = get_post_meta($asset_id, 'wpunity_asset3d_audio', true);
                        $attachment_post = get_post( $audioID );
                        $attachment_file = $attachment_post->guid;
                        ?>
            
                        <?php if(strpos($attachment_file, "mp3" )!==false || strpos($attachment_file, "wav" )!==false){?>
                            <?php echo $attachment_file; ?>
                            <audio controls loop preload="auto" id ='audioFile'>
                                <source src="<?php echo $attachment_file;?>" type="audio/mp3">
                                <source src="<?php echo $attachment_file;?>" type="audio/wav">
                                Your browser does not support the audio tag.
                            </audio>
                        <?php } ?>

                        <label for="audioFileInput"> Select a new audio</label>
                        <input class="FullWidth" type="file" name="audioFileInput" value="" id="audioFileInput" accept="audio/mp3,audio/wav"/>
                        <br />
                        <span id="audio-description-label" class="mdc-typography--subheading1 mdc-theme--text-secondary-on-background">mp3 or wav is recommended </span>
                    </div>
                </div>

            <hr />
                
                <!-- Video -->
                <hr class="WhiteSpaceSeparator">

                <!-- Show only if the asset is artifact  -->
                <?php
                
                    if(count($saved_term)>0) {
                        // Edit Asset
                        $showVid = in_array($saved_term[0]->slug, ['artifact']) ? '' : 'none';
                    }else {
                        // New Asset
                        $showVid = ($asset_id == null) ? 'none' : '';
                    }
                
                ?>

                <div id="videoDetailsPanel" style =
                "display:<?php echo $showVid;?>;background:lightgrey; padding:5px; width:100%">

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
                                   poster="<?php echo plugins_url( '../images/', dirname(__FILE__)  ).'/video_img.png'?>" controls preload="auto">
                                
                                <source src="<?php echo $attachment_file;?>" type="video/mp4">
                                <source src="<?php echo $attachment_file;?>" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        <?php } ?>

                        <label for="videoFileInput"> Select a new video</label>
                        <input class="FullWidth" type="file" name="videoFileInput" value="" id="videoFileInput" accept="video/mp4"/>
                        <br />
                        <span id="video-description-label" class="mdc-typography--subheading1 mdc-theme--text-secondary-on-background">mp4 is recommended </span>
                    </div>
                </div>
                
                <hr />
                
            <?php } else { ?>
            
                <!-- Show Data (for preview mode) -->
                
                <div id="assetTitleView" style="font-size:24pt; width:-moz-fit-content;margin:auto; "><?php echo trim($asset_title_saved); ?></div>

                <hr />
                
                <!--Carousel slideshow slides-->
    
                <!-- Video -->
                <?php $showVid = in_array( $saved_term[0]->slug , ['artifact'])?'':'none';
                      $videoID = get_post_meta($asset_id, 'wpunity_asset3d_video', true);
                ?>
                <!-- Image -->
                <?php $showImageFields = in_array($saved_term[0]->slug,['artifact'])?'':'none';  ?>
                
                <div class="slideshow-container">
    
                    <!-- Check if video slide should be shown -->
                    <?php if ($showVid=='' && $asset_id != null && $videoID!=null){ ?>
                         <div class="mySlides fade">
                            <!-- Video slide -->
                            <!--<div class="numbertext">1 / 2</div>-->
                            <div id="videoDetailsPanel" style="display:<?php echo ($asset_id == null)?'none':$showVid; ?>;">
    
                                <div id="videoFileInputContainer" class="">
                                    <?php

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


                    <!--  Image 0,1,2,3,4,5 check if should be shown -->
                    <?php
                       for ($i=0; $i<=4; $i++){
                         if ($showImageFields=='' && $asset_id != null && $images_urls[$i]!=null){ ?>
                        <div class="mySlides fade">
                            <div id="imgDetailsPanel_preview" style="display: <?php echo ($asset_id == null)?'none':$showImageFields; ?>">
                                <?php if($asset_id != null){ ?>
                                    <img id="img<?php echo $i;?>Preview" style="width:100%" src="<?php echo $images_urls[$i]; ?>">
                                <?php } ?>
                            </div>
                            <div class="text"></div>
                        </div>
                        <?php } ?>
                   <?php } ?>


                    <!--   Sliders prev next -->
                    <?php if ($showVid=='' && $showImageFields=='' && $asset_id != null && $images_urls[0]!=null){ ?>
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    <?php } ?>
                 </div>
                <br>

                
                <!-- Audio hidden object -->
                <div id="audioFileInputContainer" style="display:none">
                    <?php
                    $audioID = get_post_meta($asset_id, 'wpunity_asset3d_audio', true);
                    $attachment_post = get_post( $audioID );
                    $attachment_file = $attachment_post->guid;
                    ?>

                    <audio loop preload="auto" id ='audioFile' autoplay>
                    <?php if(strpos($attachment_file, "mp3" )!==false || strpos($attachment_file, "wav" )!==false){?>
                        
                        
                            <source src="<?php echo $attachment_file;?>" type="audio/mp3">
                            <source src="<?php echo $attachment_file;?>" type="audio/wav">
                         
                    <?php } else { ?>

                        <audio loop preload="auto" id ='audioFile' autoplay>
                            <source src="<?php echo plugins_url();?>/wordpressunity3deditor/sounds/silence.mp3" type="audio/mp3">
                        </audio>
                        
                    <?php } ?>
                    </audio>
                </div>
                
                
                <!-- Languages -->
                <ul class="langul" style="margin:5px;text-align:center;display:inline-block;width:100%">
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'English')" style="padding:0px 1% !important;">English</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'Greek')" style="padding:0px 1% !important;">ΕΛΛΗΝΙΚΑ</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'Spanish')" style="padding:0px 1% !important;">Español</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'French')" style="padding:0px 1% !important;">Français</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'German')" style="padding:0px 1% !important;">Deutsch</button>
                    <button class="tablinks2 mdc-button"  type='button' onclick="openLanguage(event, 'Russian')" style="padding:0px 1% !important;">Pусский</button>
                </ul>

                <!-- Accessibility -->
                <div style="display:inline-block; margin-left:10px; width:100%; margin-top:10px; margin-bottom:10px" >
                    
                    <!-- Background color -->
                    <input type="text" id="assetback3dcolor" class="mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; display:none; "
                           name="assetback3dcolor" form="3dAssetForm" value="<?php echo trim($asset_back_3d_color_saved); ?>" />

                    <button id="jscolorpick"
                            class="jscolor {valueElement:null,value:'<?php echo $back_3d_color; ?>',onFineChange:'updateColorPicker(this)'}" value="cccccc"
                            style="padding:10px;width:20px;height:40px;max-height:40px;min-height:40px;left:0;display:inline-block;vertical-align:bottom">
                    </button>

                    <!-- Font size -->
                    <div id="font-size-selector" style="display:inline-block; right: 10%;font-size: 1.5em;">
                        <div id="plustext" alt="Increase text size"  onclick="resizeText(1,event)" style="margin-left:10px;display:inline-block;font-size:18pt;">A+</div>
                        <div id="minustext" alt="Decrease text size" onclick="resizeText(-1,event)" style="margin-left:10px;display:inline-block;font-size:14pt;">A-</div>
                    </div>

                    <?php $images_accesicons_path = plugins_url( '../images/accessibility_icons/', dirname(__FILE__)  );?>
                    
                    <!-- Different texts buttons -->
                    <div style="display:inline-block; float:right; right:0;">
                        <button type='button' class="mdc-button" onclick="openAccess(event, '')"
                                style="background-color:white; padding:0px; vertical-align:bottom; float:right" >
                            <img src="<?php echo $images_accesicons_path.'/general_population_icon.png';?>" width="40px" height="40px" style="background-color:white"/>
                        </button>
                        
                        <button type='button' class="mdc-button" onclick="openAccess(event, 'Experts')"
                                style="background-color:white; padding:0px; vertical-align:bottom; float:right" >
                            <img src="<?php echo $images_accesicons_path.'/graduation_icon.png';?>" width="40px" height="40px" style="background-color:white"/>
                        </button>
    
                        <button type='button' class="mdc-button" onclick="openAccess(event, 'Perception')"
                                style="background-color:white; padding:0px; vertical-align:bottom; float:right" >
                            <img src="<?php echo $images_accesicons_path.'/heart_icon.png';?>" width="40px" height="40px" style="background-color:white"/>
                        </button>
    
                        <button type='button' class="mdc-button"
                                onclick="openAccess(event, 'Kids')"
                                style="background-color:white; padding:0px; vertical-align:bottom; float:right" >
                            <img src="<?php echo $images_accesicons_path.'/children_icon.png';?>" width="40px" height="40px" style="background-color:white"/>
                        </button>
                    </div>
                </div>
                
                
                <div class="wrapper_lang">
                    
                    <div id="English" class="tabcontent2 active" style="font-family:<?php echo $curr_font?>">
                        <?php echo trim($asset_desc_saved);?>
                    </div>

                    <div id="EnglishKids" class="tabcontent2" style="font-family:<?php echo $curr_font?>">
                        <?php echo trim($asset_desc_kids_saved);?>
                    </div>

                    <div id="EnglishExperts" class="tabcontent2" style="font-family:<?php echo $curr_font?>">
                        <?php echo trim($asset_desc_experts_saved);?>
                    </div>

                    <div id="EnglishPerception" class="tabcontent2" style="font-family:<?php echo $curr_font?>">
                        <?php echo trim($asset_desc_perception_saved);?>
                    </div>


                    <div id="Greek" class="tabcontent2" style="font-family:<?php echo $curr_font?>"> <?php echo trim($asset_desc_greek_saved); ?></div>
                    <div id="GreekKids" class="tabcontent2" style="font-family:<?php echo $curr_font?>"> <?php echo trim($asset_desc_greek_kids_saved); ?></div>
                    <div id="GreekExperts" class="tabcontent2" style="font-family:<?php echo $curr_font?>"> <?php echo trim($asset_desc_greek_experts_saved); ?></div>
                    <div id="GreekPerception" class="tabcontent2" style="font-family:<?php echo $curr_font?>"> <?php echo trim($asset_desc_greek_perception_saved); ?></div>
                    
                    <div id="Spanish" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_spanish_saved); ?></div>
                    <div id="SpanishKids" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_spanish_kids_saved); ?></div>
                    <div id="SpanishExperts" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_spanish_experts_saved); ?></div>
                    <div id="SpanishPerception" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_spanish_perception_saved); ?></div>
                    
                    
                    <div id="French" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_french_saved); ?></div>
                    <div id="FrenchKids" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_french_kids_saved); ?></div>
                    <div id="FrenchExperts" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_french_experts_saved); ?></div>
                    <div id="FrenchPerception" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_french_perception_saved); ?></div>

                    <div id="German" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_german_saved); ?></div>
                    <div id="GermanKids" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_german_kids_saved); ?></div>
                    <div id="GermanExperts" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_german_experts_saved); ?></div>
                    <div id="GermanPerception" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_german_perception_saved); ?></div>

                    <div id="Russian" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_russian_saved); ?></div>
                    <div id="RussianKids" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_russian_kids_saved); ?></div>
                    <div id="RussianExperts" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_russian_experts_saved); ?></div>
                    <div id="RussianPerception" class="tabcontent2" style="font-family:<?php echo $curr_font?>"><?php echo trim($asset_desc_russian_perception_saved); ?></div>


                </div>
                
                <script>
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

                        //console.log(titLang);

                        if (titLang == '')
                            titLang = eval('asset_title_english_saved');

                        document.getElementById("assetTitleView").innerHTML = titLang;

                        evt.currentTarget.className += " active";
                    }

                </script>
                
                <hr />
                
                
                <!-- Peer calls -->
                <div id="confwindow" style="align-items: center; justify-content: center; border 0px; display:none" >
                    <iframe id="iframeConf" width="100%" height="350px" style="margin-bottom:0;" frameBorder=0 src=""
                            allow="camera;microphone"></iframe>

                </div>

                <div id="confwindow_helper" style="padding-top: 20px;text-align: center;width: 200px;margin: 0 auto;">
                    <h1><img src="<?php echo plugins_url( '../peer-calls/src/res/', dirname(__FILE__)  ).'/peer-calls.svg';?>" alt="Peer Calls" ></h1>
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
                </script>
                
                <?php
                    // Peer calls: audiovisual conferencing, answer to calls directly (for museum operators)
                    if(isset($_GET['directcall']))
                        echo '<script>startConf()</script>';
                ?>

            <?php } ?>
            <!--  End of Edit or Show  -->

            <!-- MOLECULES  only-->
            <?php include 'edit-wpunity_asset3D_ChemistrySupport1.php'; ?>

            <!-- 3D Models -->
            <div class="" id="objectPropertiesPanel">
        
                <div style="display:<?php echo (($isOwner || $isUserAdmin) && !$isPreviewMode)?'':'none';?>">
                    <h3 class="mdc-typography--title">3D Model of the Asset</h3>
        
                    <ul class="RadioButtonList">
                        
                        <li class="mdc-form-field" id="fbxRadioListItem" onclick="loadFileInputLabel('fbx')">
                            <div class="mdc-radio" >
                                <input class="mdc-radio__native-control" type="radio" id="fbxRadio"  name="objectTypeRadio" value="fbx">
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label id="fbxRadio-label" for="fbxRadio" style="margin-bottom: 0;">FBX file</label>
                        </li>
        
                        <li class="mdc-form-field" id="mtlRadioListItem" onclick="loadFileInputLabel('obj')">
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="mtlRadio" name="objectTypeRadio" value="mtl">
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label id="mtlRadio-label" for="mtlRadio" style="margin-bottom: 0;">MTL & OBJ files</label>
                        </li>
                        
                        <li class="mdc-form-field" id="pdbRadioListItem" onclick="loadFileInputLabel('pdb')">
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="pdbRadio" name="objectTypeRadio" value="pdb">
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label id="pdbRadio-label" for="pdbRadio" style="margin-bottom: 0;">Protein Data Bank (PDB) file</label>
                        </li>

                        <li class="mdc-form-field" id="glbRadioListItem" onclick="loadFileInputLabel('glb')">
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="glbRadio" name="objectTypeRadio" value="glb">
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label id="glbRadio-label" for="glbRadio" style="margin-bottom: 0;">Khronos Graphics Language Transmission binary format (glb) file</label>
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
                                    $fbxID = get_post_meta($myAssetID, 'wpunity_asset3d_fbx', true);
                                    $audioID = get_post_meta($myAssetID, 'wpunity_asset3d_audio', true);
    
                                    $pdbID = get_post_meta($myAssetID, 'wpunity_asset3d_pdb', true);
                                    $glbID = get_post_meta($myAssetID, 'wpunity_asset3d_glb', true);
                                    
                                    $screenimgID = get_post_meta($myAssetID, 'wpunity_asset3d_screenimage', true);
                                    $diffimgID = get_post_meta($myAssetID, 'wpunity_asset3d_diffimage', true);
                                    $screenimgURL = wp_get_attachment_url($screenimgID) ? wp_get_attachment_url($screenimgID) : plugins_url( '../images/thumb-no-asset.png', dirname(__FILE__) );
        
                                    //$pdb_sample_file_contents = $pdbID ? file_get_contents(wp_get_attachment_url( $pdbID )) : '';
        
                                    echo '<li data-thumb="'. $screenimgURL . '">';
                                    echo '<img class="asset-image-tile-style" src="'. $screenimgURL .'"'.
                                         ' data-asset-id="'. $myAssetID .'"'.
                                         ' data-mtl-file="'. basename( get_attached_file( $mtlID ) ) .'"'.
                                         ' data-obj-file="'. basename( get_attached_file( $objID ) ) .'"'.
                                         // ' data-glb-file="'. basename( get_attached_file( $glbID ) ) .'"'.
                                         //' data-pdb-content="'. $pdb_sample_file_contents  .'"'.
                                         ' data-path-url="'. $path_url .'/"'. // pathinfo(wp_get_attachment_url($mtlID))['dirname']
                                         ' onclick="loader_asset_exists(this.dataset.pathUrl, this.dataset.mtlFile, this.dataset.objFile, this.dataset.pdbContent);'.
                                         'document.getElementById(\'asset_sourceID\').value = this.dataset.assetId;'.
                                         '"/>';
                                    echo '</li>';
                                }	?>
        
        
                            </ul>
                            <?php } ?>
                            
                            
                            <input type="hidden" id="asset_sourceID" name="asset_sourceID" value=""/>
        
                            <?php if(($isOwner || $isUserAdmin) && !$isPreviewMode) { ?>
                                
                                <label id="fileUploadInputLabel" for="multipleFilesInput"> Select +++!</label>

                            
                                <input id="fileUploadInput"
                                       class="FullWidth" type="file"
                                       name="multipleFilesInput[]"
                                       value=""
                                       style="display: <?php echo $isUserloggedIn?'':'none';?>"
                                       multiple
                                       accept=".obj,.mtl,.jpg,.png,.fbx,.pdb,.glb"
                                       onclick="javascript:clearList()"
                                       
                                       />

                                <p>Selected files:</p>
                                <div id="fileList3D" style="margin-left:5px"></div>
                                
                                <?php print_r($_FILES, true) ?>
                                
                                <script>
                                    // Handler for radio buttons
                                    loadFileInputLabel('obj');
                                </script>
                                
                                    <hr />
                                
                                
                            <?php } ?>
                            
        
                            
                            <input type="hidden" name="objFileInput" value="" id="objFileInput" />
                            <input type="hidden" name="mtlFileInput" value="" id="mtlFileInput" />
                            <input type="hidden" name="pdbFileInput" value="" id="pdbFileInput" />
                            <input type="hidden" name="fbxFileInput" value="" id="fbxFileInput" />
                            <input type="hidden" name="glbFileInput" value="" id="glbFileInput" />


                        
                        </div>

                        
                        
                        
                        <div id="sshotFileInputContainer" class="" style="display: <?php echo (($isOwner || $isUserAdmin) && !$isPreviewMode)?'':'none';?>; width:100%; background:lightgrey; padding:5px;">
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
    
                        <?php if(($isOwner || $isUserAdmin) && !$isPreviewMode) { ?>
                            <div id="assetback3dcolordiv" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
                                 style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%; margin-top:0px;">

                                <input id="jscolorpick" class="jscolor {onFineChange:'updateColorPicker(this)'}"
                                       style="width:40%;margin-left:60%;" value="000000">

                                <input type="text" id="assetback3dcolor" class="mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; display:none; "
                                       name="assetback3dcolor" form="3dAssetForm" value="<?php echo trim($asset_back_3d_color_saved); ?>" />
                                <label for="assetback3dcolor" class="mdc-textfield__label" style="background: none;"><?php echo $asset_back_3d_color_label; ?></label>
                            </div>
    
                        <?php } ?>
                        

                        <hr />
                        
                    </div>
                </div>
             </div>

            <?php
            // Virtual Labs widgets
            if ($project_scope == 1)
                require(plugin_dir_path( __DIR__ ).'/templates/edit-wpunity_asset3D_vlabsWidgets.php');
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
                
                    <?php if($asset_id == null || count($saved_ipr_term)===0 ) { ?>
                        <span id="currently-ipr-selected" class="mdc-select__selected-text mdc-typography--subheading2">No IPR category selected</span>
                    <?php } else { ?>
                        <span
                                data-cat-ipr-desc="<?php echo $saved_ipr_term[0]->description; ?>"
                                data-cat-ipr-slug="<?php echo $saved_ipr_term[0]->slug; ?>"
                                data-cat-ipr-id="<?php echo $saved_ipr_term[0]->term_ipr_id; ?>"
                                id="currently-ipr-selected"
                                class="mdc-select__selected-text mdc-typography--subheading2">
                            <?php echo $saved_ipr_term[0]->name; ?></span>
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
                <input type="hidden" name="submitted" id="submitted" value="true"
                       />
                
                <?php $buttonTitleText = ($asset_id == null ? "Create asset" : "Update asset"); ?>
                
                <button id="formSubmitBtn" style="display: none;"

                        
                        class="ButtonFullWidth mdc-button mdc-elevation--z2 mdc-button--raised mdc-button--primary"
                        data-mdc-auto-init="MDCRipple" type="submit" <?php echo $isEditable?'':' disabled' ?> >
                    <?php echo $buttonTitleText; ?>
                </button>
            <?php } ?>
        </div>
        
        
        <!-- Author -->
        <table id="wpunity-asset-author" class="mdc-typography--caption"
               style="display:inline-block;text-align:left;float:right;right:0;margin-top:0px;width:auto">
            <tr><td>Author</td></tr>
            <tr>
                
                <th rowspan="2"><img style="width:40px; min-width:40px; height:40px; min-height:40px; border-radius: 50%;" src="<?php echo get_avatar_url($author_id);?>"></th>
                <td style="padding: 0px;"><a href="<?php echo home_url().'/user/'.$author_username; ?>" style="color:black"><?php  echo $author_displayname;?></a></td>
            </tr>
            <tr>
                <td><span style=""><?php echo $author_country;?></span></td>
            </tr>
        </table>
        
        
    </form>

    <!--                     Javascript                             -->
    <script type="text/javascript">
        'use strict';

        var nObj = 0;
        var nFbx = 0;
        var nMtl = 0;
        var nJpg = 0;
        var nPng = 0;
        var nPdb = 0;
        var nGif = 0;
        var nGlb = 0;

        
        
        
        var FbxBuffer = '';
        var GlbBuffer = '';
        
        var mdc = window.mdc;
        mdc.autoInit();
        
        var currLanguage = "English";
        
        var game_type_slug = "<?php echo $game_type_slug; ?>";

        var back_3d_color = "<?php echo $back_3d_color; ?>";
        
        document.getElementById("jscolorpick").value = back_3d_color;

        // Current  Slide index (carousel top)
        var slideIndex = 0;
        
        let audio_file = document.getElementById( 'audioFile' );
        
        //console.log("audio_file", audio_file);
        
        if (audio_file==null){
        
        }
        
        // Initial slide to show (carousel top)
        showSlides(0);

        // Main 3D canvas handler
        var wu_webw_3d_view = new WU_webw_3d_view( document.getElementById( 'previewCanvas' ), back_3d_color, audio_file );
        
        wpunity_reset_panels(wu_webw_3d_view, "initial script");

       
        
        var multipleFilesInputElem = document.getElementById( 'fileUploadInput' );

        
        // ----------- Canvas Renderer ------------------------
        // handler to resize canvas window
        var resizeWindow = function () {
            wu_webw_3d_view.resizeDisplayGL();
        };

        // Add window resize handler
        window.addEventListener( 'resize', resizeWindow, false );

        // render handler
        var render = function () {
            requestAnimationFrame( render );
            wu_webw_3d_view.render();
            
        };

        // Initialize
        wu_webw_3d_view.initGL();

        // Resize for first time just to be sure
        wu_webw_3d_view.resizeDisplayGL();

        // After
        wu_webw_3d_view.initPostGL();

        // kick render loop
        render();
        //---------
        
        addHandlerFor3Dfiles(wu_webw_3d_view, multipleFilesInputElem);

        // For existing 3D models
        // 1 OBJ
        if (typeof path_url != "undefined")
            loader_asset_exists(wu_webw_3d_view, path_url, mtl_file_name, obj_file_name, null, null, null);

        // 2 PDB
        if (typeof pdb_file_name != "undefined")
            loader_asset_exists(wu_webw_3d_view, null, null, null, pdb_file_name, null, null);

        // 3 FBX
        if (typeof path_url_fbx != "undefined") {

            //console.log( path_url_fbx, fbx_file_name);
            loader_asset_exists(wu_webw_3d_view, path_url_fbx, null, null, null, fbx_file_name, null);
        }

        // 4 GLB
        if (typeof glb_file_name != "undefined") {
            loader_asset_exists(wu_webw_3d_view, null, null, null, null, null, glb_file_name);
        }
        
        
        // Responsive Layout (text panel vs 3D model panel
        if (window.innerWidth<window.innerHeight) {
            const initCH = document.getElementById('text-asset-sidebar').clientHeight;
            const initCH2 = document.getElementById('wrapper_3d_inner').clientHeight;

            document.getElementById('text-asset-sidebar').addEventListener('scroll', function () {
                document.getElementById("text-asset-sidebar").style.height = initCH + this.scrollTop / 2 + 5;
                document.getElementById("wrapper_3d_inner").style.height   = initCH2 - this.scrollTop / 2 + 5;
                wu_webw_3d_view.resizeDisplayGL();
            });
        }
        
        // Screenshot
        var sshotPreviewDefaultImg = document.getElementById("sshotPreviewImg").src;
        var createScreenshotBtn = jQuery("#createModelScreenshotBtn");

        createScreenshotBtn.click(function() {
            wu_webw_3d_view.renderer.preserveDrawingBuffer = true;
            wpunity_create_model_sshot(wu_webw_3d_view);
        });

        (function() {
            var MDCSelect = mdc.select.MDCSelect;
            
            // Category of asset change
            var categoryDropdown = document.getElementById('category-select');
            var categorySelect = MDCSelect.attachTo(categoryDropdown);
            var selectedCatId = jQuery('#currently-selected').attr("data-cat-id");
            categoryDropdown.addEventListener('MDCSelect:change', function() {
                loadLayout(true);
            });

            // IPR category change
            var categoryIPRDropdown = document.getElementById('category-ipr-select');
            var categoryIPRSelect = MDCSelect.attachTo(categoryIPRDropdown);
            var selectedCatIPRId = jQuery('#currently-ipr-selected').attr("data-cat-ipr-id");
            
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
            

            var moleculeFunctionalGroupDropdown = document.getElementById('moleculeFunctionalGroupSelect');
            var moleculeFunctionalGroupSelect = MDCSelect.attachTo(moleculeFunctionalGroupDropdown);

            moleculeFunctionalGroupDropdown.addEventListener('MDCSelect:change', function() {
                jQuery("#moleculeFunctionalGroupInput").attr( "value", moleculeFunctionalGroupSelect.selectedOptions[0].getAttribute("id") );
            });

            
            // Chemistry extra category
            // var boxKnownGroupDropdown = document.getElementById('boxKnownGroupSelect');
            // var boxKnownGroupSelect = MDCSelect.attachTo(boxKnownGroupDropdown);
            // boxKnownGroupDropdown.addEventListener('MDCSelect:change', function() {
            //     jQuery("#boxKnownGroupInput").attr( "value", boxKnownGroupSelect.selectedOptions[0].getAttribute("id") );
            // });


            // This fires on start
            jQuery( document ).ready(function() {

                // No asset category selected
                if (jQuery('#currently-selected').attr("data-cat-id")) {
                    jQuery('#'+ selectedCatId).attr("aria-selected", true);
                    jQuery('#category-select').addClass('mdc-select--disabled').attr( "aria-disabled", true);
                    loadLayout(false);
                }

                // IPR category
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

            <!-- Select carousel options for images cloning -->
            var lightSliderOpts = {
                item: 4, loop: false, slideMove: 1, easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed: 600, responsive : [{breakpoint:800, settings: {item:3, slideMove:1,slideMargin:6}
                },
                    {
                        breakpoint:480, settings: {item:2, slideMove:1}
                    }
                ]
            };
            
            // Function to initialize layout
            // paramter denotes if new asset or edit asset
            function loadLayout(createAsset) {

                jQuery("#informationPanel").show();
                jQuery("#formSubmitBtn").show();
                jQuery("#pdbRadioListItem").show();
                
                wu_webw_3d_view.resizeDisplayGL();

                //wpunity_reset_panels(wu_webw_3d_view, "loadlayout");

                var cat;
                var descText = document.getElementById('categoryDescription');
                
                if(createAsset) {
                    descText.innerHTML = categorySelect.selectedOptions[0].getAttribute("data-cat-desc");
                    cat = categorySelect.selectedOptions[0].getAttribute("data-cat-slug");
                    jQuery("#termIdInput").attr( "value", categorySelect.selectedOptions[0].getAttribute("id") );
                } else {
                    descText.innerHTML = jQuery("#currently-selected").attr("data-cat-desc");
                    cat = jQuery("#currently-selected").attr("data-cat-slug");
                    jQuery("#termIdInput").attr( "value", selectedCatId );
                }

                // if (cat === 'molecule') {
                //     jQuery("#mtlRadio").prop("checked", false);
                //     jQuery('#mtlRadioListItem').hide();
                //      jQuery("#pdbRadio").prop("checked", true);
                //      jQuery("#pdbRadioListItem").show();
                // } else {

                     jQuery("#fbxRadio").prop("checked", false);
                    // jQuery("#fbxRadioListItem").show();

                    jQuery("#mtlRadio").prop("checked", false);
                    //jQuery("#mtlRadioListItem").show();


                    jQuery("#pdbRadio").prop("checked", false);
                    //jQuery("#pdbRadioListItem").hide();

                jQuery("#glbRadio").prop("checked", true);
                //jQuery("#glbRadioListItem").show();
                
                //}

                mdc.radio.MDCRadio.attachTo(document.querySelector('.mdc-radio'));

                // Hide some panels but decide based on category as below what to show
                jQuery("#imgDetailsPanel").hide();
                jQuery("#videoDetailsPanel").hide();
                jQuery("#moleculeOptionsPanel").hide();
                jQuery("#moleculeFluidPanel").hide();

                // Thumbnail images carousel for cloning
                jQuery('#lightSlider').lightSlider(lightSliderOpts);

                // Category
                switch(cat) {
                    // Archaeology cases
                    case 'doors':
                        jQuery("#doorDetailsPanel").show();
                        break;
                    case 'dynamic3dmodels':
                        break;
                    case 'artifact':
                        jQuery("#imgDetailsPanel").show();
                        jQuery("#videoDetailsPanel").show();
                        jQuery("#audioDetailsPanel").show();
                        break;
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

        // Hide admin bar of wordpress
        jQuery("#wpadminbar").hide();
        jQuery(".js no-svg").css("margin-top:0px");

        // // // UNIT TEST: Select artifact, Remove
        setTimeout( function(){

            jQuery("#category-select").click(); // Expand category
            jQuery("#78").click(); // Select Artifact category
            
            
            //jQuery('#assetTitle')[0].value = 'a12'; // Set title
            jQuery("#glbRadio-label").click(); // Set fbx type
            //jQuery("#fileUploadInput").click(); // Click browse files

        },500);

    </script>


