<?php

// Ajax for fetching game's assets within asset browser widget at vr_editor // user must be logged in to work, otherwise ajax has no privileges
function my_enqueue_front_end_ajax() {
	$thepath = get_site_url().'/wp-content/plugins/wordpressunity3deditor/js_libs/scriptFileBrowserToolbarWPway.js';
	wp_enqueue_script( 'ajax-script', $thepath, array('jquery') );
	wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_front_end_ajax' );

//---------------------------------------------------------------------
if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$scene_id = intval( $_GET['wpunity_scene'] );
$scene_id = sanitize_text_field( $scene_id );

$project_id    = intval( $_GET['wpunity_game'] );
$project_id    = sanitize_text_field( $project_id );
$game_post     = get_post($project_id);
$game_type_obj = wpunity_return_game_type($project_id);

$scene_post = get_post($scene_id);
$sceneSlug = $scene_post->post_name;


$editgamePage = wpunity_getEditpage('game');
$allGamesPage = wpunity_getEditpage('allgames');
$newAssetPage = wpunity_getEditpage('asset');

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	$jsonScene = $_POST['wpunity_scene_json_input'];
	update_post_meta( $scene_id, 'wpunity_scene_json_input', $jsonScene );

}

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
    <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>

    <a class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple" href="<?php echo esc_url( get_permalink($newAssetPage[0]->ID) . $parameter_pass . $project_id ); ?>">
        Add a new 3D asset
    </a>
</div>

<span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Add category title & icon"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string; ?></span>

<hr class="mdc-list-divider">

<ul class="EditPageBreadcrumb">
    <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($allGamesPage[0]->ID)); ?>" title="Go back to Project selection">Home</a></li>
    <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
    <li><a class="mdc-typography--caption mdc-theme--primary" href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $project_id ); ?>" title="Go back to Project editor">Project Editor</a></li>
    <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
    <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">3D Scene Editor</span></li>
</ul>

<div class="mdc-toolbar" id="dynamic-demo-toolbar">
    <div class="mdc-toolbar__row" style="min-height: 0;">
        <div class="mdc-toolbar__section mdc-toolbar__section--shrink-to-fit mdc-toolbar__section--align-start">
            <h1 class="mdc-toolbar__title" style="overflow: visible; padding-top:16px;"><?php echo $sceneSlug; ?></h1>
        </div>
        <div class="mdc-toolbar__section mdc-toolbar__section--align-start">
            <nav id="dynamic-tab-bar" class="mdc-tab-bar mdc-tab-bar--indicator-accent" role="tablist">
                <a role="tab" aria-controls="panel-1" class="mdc-tab mdc-tab-active mdc-tab--active" href="#panel-1" >Editor</a>
                <a role="tab" aria-controls="panel-2" class="mdc-tab" href="#panel-2" >Analytics</a>
                <span class="mdc-tab-bar__indicator"></span>
            </nav>
        </div>
    </div>
</div>

<section>
    <div class="panels">
        <div class="panel active" id="panel-1" role="tabpanel" aria-hidden="false">

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

						$scenefolder = $sceneSlug;
						$gamefolder = $parentGameSlug;
						$sceneID = $scene_id;


						$isAdmin = is_admin() ? 'back' : 'front';

						// vr_editor loads the $sceneToLoad
						require( plugin_dir_path( __DIR__ ) .  '/vr_editor.php' ); ?>
                    </div>
                </div>
            </div>

            <form name="wpunity_scene_theForm" id="wpunity_scene_theForm" method="POST" enctype="multipart/form-data">
                <textarea title="wpunity_scene_json_input" id="wpunity_scene_json_input" name="wpunity_scene_json_input"> <?php echo get_post_meta( $scene_id, 'wpunity_scene_json_input', true ); ?></textarea>
                <input type="hidden" name="submitted" id="submitted" value="true" />
				<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
            </form>

        </div>
        <div class="panel" id="panel-2" role="tabpanel" aria-hidden="true">
            <div style="min-height: 780px;"></div>
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

</script>
<?php get_footer(); ?>