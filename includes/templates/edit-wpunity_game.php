<?php

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$project_id = intval( $_GET['wpunity_game'] );
$project_id = sanitize_text_field( $project_id );

$game_post = get_post($project_id);
$gameSlug = $game_post->post_name;

$isAdmin = is_admin() ? 'back' : 'front';
echo '<script>';
echo 'isAdmin="'.$isAdmin.'";'; // This variable is used in the request_game_assemble.js
echo '</script>';

// Ajax logic for front end assepile
// engueue request_game_assepile.js in ajax with in order to be able to call php and pass as parameters the ajax object and the game id and slug

// Ajax for assembling
function my_enqueue_front_end_assepile_ajax() {
	global $project_id, $gameSlug;
	$pluginpath = dirname (plugin_dir_url( __DIR__  ));
	$pluginpath = str_replace('\\','/',$pluginpath);

	//--Uploads/myGameProjectUnity--
	$upload_dir = wp_upload_dir()['basedir'];
	$upload_dir = str_replace('\\','/',$upload_dir);
	$gameUnityProject_dirpath = $upload_dir . '/' . $gameSlug . 'Unity';

	$thepath = $pluginpath . '/js_libs/assemble_compile_commands/request_game_assepile.js';
	wp_enqueue_script( 'ajax-script', $thepath, array('jquery') );
	wp_localize_script( 'ajax-script', 'my_ajax_object_assepile',
		array( 'ajax_url' => admin_url( 'admin-ajax.php'),
		       'id' => $project_id,
		       'slug' => $gameSlug,
		       'gameUnityProject_dirpath' => $gameUnityProject_dirpath,
		       'gameUnityProject_urlpath' => $pluginpath.'/../../uploads/'. $gameSlug . 'Unity/'
		)
	) ;
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_front_end_assepile_ajax');


// Ajax for delete scene
$pluginpath = dirname (plugin_dir_url( __DIR__  ));
$pluginpath = str_replace('\\','/',$pluginpath);
// Define Ajax for the delete Game functionality
$thepath = $pluginpath . '/js_libs/delete_ajaxes/delete_scene.js';
wp_enqueue_script( 'ajax-script', $thepath, array('jquery') );
wp_localize_script( 'ajax-script', 'my_ajax_object_deletescene',
	array( 'ajax_url' => admin_url( 'admin-ajax.php'))
);


//Get 'parent-game' taxonomy with the same slug as Game (in order to show scenes that belong here)
$allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
$allScenePGameID = $allScenePGame->term_id;

$game_type_obj = wpunity_return_game_type($project_id);

$editscenePage = wpunity_getEditpage('scene');
$editscene2DPage = wpunity_getEditpage('scene2D');
$editgamePage = wpunity_getEditpage('game');
$newAssetPage = wpunity_getEditpage('asset');
$allGamesPage = wpunity_getEditpage('allgames');

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	$credentials_yaml_tax = get_term_by('slug', 'credentials-yaml', 'wpunity_scene_yaml');
	$menu_yaml_tax = get_term_by('slug', 'mainmenu-yaml', 'wpunity_scene_yaml');
	$options_yaml_tax = get_term_by('slug', 'options-yaml', 'wpunity_scene_yaml');
	$educational_energy_yaml_tax = get_term_by('slug', '	educational-energy', 'wpunity_scene_yaml');

	$default_json = '{
	"metadata": {
		"formatVersion" : 4.0,
		"type"		    : "scene",
		"generatedBy"	: "SceneExporter.js",
		"objects"       : 1},

	"urlBaseType": "relativeToScene",

	"objects" :
	{
		"avatarYawObject" : {
			"position" : [0,0,0],
			"rotation" : [0,0,0],
			"scale"	   : [1,1,1],
			"visible"  : true,
			"children" : {
			}
		}

	}

}
';

	$scene_taxonomies = array(
		'wpunity_scene_pgame' => array(
			$allScenePGameID,
		),
		'wpunity_scene_yaml' => array(
			$educational_energy_yaml_tax->term_id,
		)
	);

	$scene_metas = array(
		'wpunity_scene_default' => 0,
		'wpunity_scene_metatype' => 'scene',
		'wpunity_scene_json_input' => $default_json,
	);

	$scene_information = array(
		'post_title' => esc_attr(strip_tags($_POST['scene-title'])),
		'post_content' => esc_attr(strip_tags($_POST['scene-description'])),
		'post_type' => 'wpunity_scene',
		'post_status' => 'publish',
		'tax_input' => $scene_taxonomies,
		'meta_input' => $scene_metas,
	);

	$scene_id = wp_insert_post($scene_information);

	//$scene_image = $_FILES['scene-featured-image'];

	if($scene_id){
		//$attachment_id = wpunity_upload_img( $scene_image, $scene_id);
		//set_post_thumbnail( $scene_id, $attachment_id );

		$newpost = get_post($scene_id);

		wp_redirect(esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ));
		exit;
	}
}


get_header();
?>

    <div class="EditPageHeader">

        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>

        <a id="compileGameBtn" class="mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
            COMPILE GAME
        </a>
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Category"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string;?>
    </span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">Project Editor</span></li>
    </ul>

    <a class="mdc-button mdc-button--primary mdc-theme--primary" style="float: right;" href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id ); ?>" data-mdc-auto-init="MDCRipple">Add New 3D Asset</a>


    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Scenes</h2>
    <a class="mdc-button mdc-button--primary mdc-theme--primary EditPageAccordion" data-mdc-auto-init="MDCRipple"><i class="material-icons mdc-theme--primary ButtonIcon" >add</i> Add New Scene</a>


    <!--<h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">My Scenes</h3>-->


    <div class="EditPageAccordionPanel">
        <form name="create_new_scene_form" action="" id="create_new_scene_form" method="POST" enctype="multipart/form-data">
            <div class="mdc-layout-grid">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">
                    <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                        <input id="title" name="scene-title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                               aria-controls="title-validation-msg" required minlength="3" maxlength="25" style="box-shadow: none; border-color:transparent;">
                        <label for="title" class="mdc-textfield__label">
                            Enter a scene title
                    </div>
                    <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                       id="title-validation-msg">
                        Between 3 - 25 characters
                    </p>
                </div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">

                    <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                        <input id="desc" name="scene-description" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth"
                               maxlength="50" aria-controls="desc-validation-msg" style="box-shadow: none; border-color:transparent;">
                        <label for="desc" class="mdc-textfield__label">
                            Enter a scene description
                    </div>

                </div>
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">

					<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                    <button style="float:right;" class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" type="submit">
                        ADD SCENE
                    </button>

                </div>
            </div>
        </form>
    </div>



    <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">All Scenes</h3>

    <!-- LOAD STANDARD SCENES HERE-->

<?php
// Define custom query parameters
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

// Get current page and append to custom query parameters array
//$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

// Instantiate custom query
$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;

// Output custom query loop
if ( $custom_query->have_posts() ) :?>

    <div class="mdc-layout-grid">

		<?php while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			$scene_id = get_the_ID();
			$scene_title = get_the_title();
			$scene_desc = get_the_content();

			?>

            <div id="scene-<?php echo $scene_id; ?>" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">
                <div class="mdc-card SceneCardContainer mdc-theme--background">
                    <div class="SceneThumbnail">
						<?php

						$default_scene = get_post_meta( $scene_id, 'wpunity_scene_default', true ); //=true Default scene - NOT DELETE-ABLE
						$scene_type    = get_post_meta( $scene_id, 'wpunity_scene_metatype', true ); //=menu,scene,credits - EDITABLE

						//create permalink depending the scene yaml category
						$edit_scene_page_id = ( $scene_type == 'scene' ? $editscenePage[0]->ID : $editscene2DPage[0]->ID);
						$edit_page_link     = esc_url( get_permalink($edit_scene_page_id) . $parameter_Scenepass . $scene_id . '&wpunity_game=' . $project_id . '&scene_type=' . $scene_type );
						?>
                        <a href="<?php echo $edit_page_link; ?>">

							<?php if(has_post_thumbnail($scene_id)) { ?>


								<?php echo get_the_post_thumbnail( $scene_id ); ?>


							<?php } else { ?>

                                <div style="min-height: 226px;" class="DisplayBlock mdc-theme--primary-bg CenterContents">
                                    <i style="font-size: 64px; padding-top: 80px;" class="material-icons mdc-theme--text-icon-on-background">landscape</i>
                                </div>

							<?php } ?>
                        </a>
                    </div>
                    <section class="mdc-card__primary">
                        <h1 id="<?php echo $scene_id;?>-title" class="mdc-card__title mdc-typography--title"
                            style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="<?php echo $scene_title; ?>">
							<?php echo $scene_title; ?>
                        </h1>
                        <h2 class="mdc-card__subtitle mdc-theme--text-secondary-on-light" style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            &#8203;<?php echo $scene_desc; ?>
                        </h2>

                    </section>
                    <section class="mdc-card__actions">
						<?php if (!$default_scene) { ?>
                            <a id="deleteSceneBtn" data-mdc-auto-init="MDCRipple" title="Delete scene" class="mdc-button mdc-button--compact mdc-card__action" onclick="deleteScene(<?php echo $scene_id; ?>)">DELETE</a>
						<?php } ?>
                        <a data-mdc-auto-init="MDCRipple" title="Edit scene" class="mdc-button mdc-button--compact mdc-card__action mdc-button--primary" href="<?php echo $edit_page_link; ?>">EDIT</a>
                    </section>
                </div>
            </div>

		<?php endwhile;?>

        <!--Delete Scene Dialog-->
        <aside id="delete-dialog"
               style="visibility:hidden"
               class="mdc-dialog"
               role="alertdialog"
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

        <!--Compile Dialog-->
        <aside id="compile-dialog"
               style="visibility:hidden"
               class="mdc-dialog"
               role="alertdialog"
               data-game-slug="<?php echo $gameSlug; ?>"
               data-project-id="<?php echo $project_id; ?>"
               aria-labelledby="my-mdc-dialog-label"
               aria-describedby="my-mdc-dialog-description" data-mdc-auto-init="MDCDialog">
            <div class="mdc-dialog__surface">

                <header class="mdc-dialog__header">
                    <h2 class="mdc-dialog__header__title">
                        Compile game
                    </h2>
                </header>

                <section class="mdc-dialog__body">

                    <h3 class="mdc-typography--subheading2"> Platform </h3>

                    <div id="platform-select" class="mdc-select" role="listbox" tabindex="0" style="min-width: 40%;">
                        <span id="currently-selected" class="mdc-select__selected-text mdc-typography--subheading2">Select a platform</span>
                        <div class="mdc-simple-menu mdc-select__menu" style="position: initial; max-height: none; ">
                            <ul class="mdc-list mdc-simple-menu__items">
                                <li class="mdc-list-item mdc-theme--text-primary-on-light" role="option" id="platforms" aria-disabled="true" style="pointer-events: none;">
                                    Select a platform
                                </li>
                                <li class="mdc-list-item" role="option" id="platform-windows" tabindex="0">
                                    Windows
                                </li>
                                <li class="mdc-list-item" role="option" id="platform-linux" tabindex="0">
                                    Linux
                                </li>
                                <li class="mdc-list-item" role="option" id="platform-mac" tabindex="0">
                                    Mac OS
                                </li>
                                <li class="mdc-list-item" role="option" id="platform-web" tabindex="0">
                                    Web
                                </li>
                                <li class="mdc-list-item" role="option" id="platform-android" tabindex="0">
                                    Android
                                </li>

                            </ul>
                        </div>
                    </div>
                    <input id="platformInput" type="hidden">


                    <div class="mdc-typography--caption mdc-theme--text-primary-on-background" style="float: right;"> <i title="Memory Usage" class="material-icons AlignIconToBottom">memory</i> <span  id="unityTaskMemValue">0</span> KB </div>

                    <hr class="WhiteSpaceSeparator">

                    <h2 id="compileProgressTitle" style="display: none" class="CenterContents mdc-typography--headline">
                        Step: 1/4
                    </h2>

                    <div class="progressSlider" id="compileProgressDeterminate" style="display: none;">
                        <div class="progressSliderLine"></div>
                        <div class="progressSliderSubLineDeterminate" id="progressSliderSubLineDeterminateValue"></div>
                    </div>

                    <div class="progressSlider" id="compileProgressSlider" style="display: none;">
                        <div class="progressSliderLine"></div>
                        <div class="progressSliderSubLine progressIncrease"></div>
                        <div class="progressSliderSubLine progressDecrease"></div>
                    </div>


                    <div id="compilationProgressText" class="CenterContents mdc-typography--title"></div>

                    <div class="CenterContents">
                        <a class="mdc-typography--title" href="" id="wpunity-ziplink" style="display:none;"> <i style="vertical-align: text-bottom" class="material-icons">file_download</i> Download Zip</a>
                        <a class="mdc-typography--title" href="" id="wpunity-weblink" style="display:none;margin-left:30px" target="_blank">Web link</a>
                    </div>

                </section>

                <footer class="mdc-dialog__footer">
                    <a id="compileCancelBtn" class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button">Cancel</a>
                    <a id="compileProceedBtn" type="button" class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-button--raised LinkDisabled">Proceed</a>
                </footer>
            </div>
            <div class="mdc-dialog__backdrop"></div>
        </aside>


    </div>

<?php else : ?>

    <hr class="WhiteSpaceSeparator">

    <div class="CenterContents">

        <i class="material-icons mdc-theme--text-icon-on-light" style="font-size: 96px;" aria-hidden="true" title="No scenes found">
            landscape
        </i>

        <h3 class="mdc-typography--headline">No Scenes found</h3>
        <hr class="WhiteSpaceSeparator">

    </div>


<?php endif;

wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query;
?>

    <script type="text/javascript">
        var mdc = window.mdc;
        mdc.autoInit();

        var deleteDialog = new mdc.dialog.MDCDialog(document.querySelector('#delete-dialog'));
        var compileDialog = new mdc.dialog.MDCDialog(document.querySelector('#compile-dialog'));
        compileDialog.focusTrap_.deactivate();
        deleteDialog.focusTrap_.deactivate();


        jQuery( "#compileGameBtn" ).click(function() {
            compileDialog.show();
        });

        jQuery( "#compileCancelBtn" ).click(function(e) {

            var pid = jQuery( "#compileCancelBtn" ).attr("data-unity-pid");

            console.log(pid);

            if (pid) {
                wpunity_killtask_compile(pid);
            }
        });

        jQuery( "#compileProceedBtn" ).click(function() {

            jQuery( "#platform-select" ).addClass( "mdc-select--disabled" ).attr( "aria-disabled","true" );
            jQuery( "#compileProgressSlider" ).show();
            jQuery( "#compileProgressTitle" ).show();

            jQuery( "#compileProceedBtn" ).addClass( "LinkDisabled" );
            jQuery( "#compileCancelBtn" ).addClass( "LinkDisabled" );

            jQuery( "#wpunity-ziplink" ).hide();
            jQuery( "#wpunity-weblink" ).hide();

            jQuery( "#compilationProgressText" ).html("");

            jQuery('#unityTaskMemValue').html("0");

            wpunity_assepileAjax();
        });

        var MDCSelect = mdc.select.MDCSelect;
        var platformDropdown = document.getElementById('platform-select');
        var platformSelect = MDCSelect.attachTo(platformDropdown);

        platformDropdown.addEventListener('MDCSelect:change', function() {
            jQuery( "#platformInput" ).attr( "value", platformSelect.selectedOptions[0].getAttribute("id") );
            jQuery( "#compileProceedBtn" ).removeClass( "LinkDisabled" );
        });


        var acc = document.getElementsByClassName("EditPageAccordion");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            }
        }



        jQuery("#deleteSceneDialogDeleteBtn").click(function (e) {

            //console.log("ID:", deleteDialog.id);

            jQuery('#delete-scene-dialog-progress-bar').show();

            jQuery( "#deleteSceneDialogDeleteBtn" ).addClass( "LinkDisabled" );
            jQuery( "#deleteSceneDialogCancelBtn" ).addClass( "LinkDisabled" );

            window.scene_id_for_delete = deleteDialog.id;
            wpunity_deleteSceneAjax(deleteDialog.id);
        });

        jQuery("#deleteSceneDialogCancelBtn").click(function (e) {

            jQuery('#delete-scene-dialog-progress-bar').hide();
            deleteDialog.close();
        });

        function deleteScene(id) {

            var dialogTitle = document.getElementById("delete-dialog-title");
            var dialogDescription = document.getElementById("delete-dialog-description");
            var sceneTitle = document.getElementById(id+"-title").innerHTML;

            dialogTitle.innerHTML = "<b>Delete " + sceneTitle+"?</b>";
            dialogDescription.innerHTML = "Are you sure you want to delete your scene '" +sceneTitle + "'? There is no Undo functionality once you delete it.";
            deleteDialog.id = id;
            deleteDialog.show();
        }

        function hideCompileProgressSlider() {
            jQuery( "#compileProgressSlider" ).hide();
            jQuery( "#compileProgressTitle" ).hide();
            jQuery( "#compileProgressDeterminate" ).hide();
            jQuery( "#platform-select" ).removeClass( "mdc-select--disabled" ).attr( "aria-disabled","false" );

            jQuery( "#compileProceedBtn" ).removeClass( "LinkDisabled" );
            jQuery( "#compileCancelBtn" ).removeClass( "LinkDisabled" );
        }

    </script>
<?php get_footer(); ?>