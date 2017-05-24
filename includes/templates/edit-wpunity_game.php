<?php get_header();

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_Scenepass = '/?wpunity_scene=';} else{$parameter_Scenepass = '&wpunity_scene=';}

$safe_inserted_id = intval( $_GET['wpunity_game'] );
$safe_inserted_id = sanitize_text_field( $safe_inserted_id );
$game_id = $safe_inserted_id;


$game_post = get_post($game_id);
$gameSlug = $game_post->post_name;

//Get 'parent-game' taxonomy with the same slug as Game (in order to show scenes that belong here)
$allScenePGame = get_term_by('slug', $gameSlug, 'wpunity_scene_pgame');
$allScenePGameID = $allScenePGame->term_id;

$game_type_obj = wpunity_return_game_type($game_id);

$editscenePage = wpunity_getEditpage('scene');

?>

    <div class="EditPageHeader">

        <h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light"><?php echo $game_post->post_title; ?></h1>

        <a class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
            COMPILE GAME
        </a>
    </div>

    <span class="mdc-typography--caption">
        <i class="material-icons mdc-theme--text-icon-on-background AlignIconToBottom" title="Category"><?php echo $game_type_obj->icon; ?> </i>&nbsp;<?php echo $game_type_obj->string;?>
    </span>

    <hr class="mdc-list-divider">

    <ul class="EditPageBreadcrumb">
        <li><a class="mdc-typography--caption mdc-theme--primary" href="#" title="Go back to Project selection">Home</a></li>
        <li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
        <li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">Game Editor</span></li>
    </ul>

    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Scenes</h2>



    <!--<h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">My Scenes</h3>-->

    <div class="mdc-layout-grid">
        <!--LOAD SAVED SCENES HERE-->
    </div>


    <a class="mdc-button mdc-button--primary mdc-theme--primary EditPageAccordion"><i class="material-icons mdc-theme--primary ButtonIcon">add</i> Add New Scene</a>

    <div class="EditPageAccordionPanel">
        <div class="mdc-layout-grid">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

                <div class="mdc-textfield FullWidth" data-mdc-auto-init="MDCTextfield">
                    <input id="title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" aria-controls="title-validation-msg" required minlength="6" style="box-shadow: none; border-color:transparent;">
                    <label for="title" class="mdc-textfield__label">
                        Enter a scene title
                </div>
                <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                   id="title-validation-msg">
                    Must be at least 6 characters long
                </p>
                <hr class="WhiteSpaceSeparator">

                <div class="mdc-textfield mdc-textfield--multiline" data-mdc-auto-init="MDCTextfield">
                    <textarea id="multi-line" class="mdc-textfield__input" rows="6" cols="40" style="box-shadow: none;"></textarea>
                    <label for="multi-line" class="mdc-textfield__label">Add a scene description</label>
                </div>

            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

                <label class="mdc-typography--subheading2">Scene Type</label>

                <ul class="RadioButtonList">
                    <li class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="sceneTypeEnergyRadio" checked="" name="sceneTypeRadio">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="sceneTypeEnergyRadio-label" for="sceneTypeEnergyRadio" style="margin-bottom: 0;">Energy</label>
                    </li>
                    <li class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="sceneTypeArchRadio" name="sceneTypeRadio">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="sceneTypeArchRadio-label" for="sceneTypeArchRadio" style="margin-bottom: 0;">Archaeology</label>
                    </li>
                    <li class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="sceneTypeArchRadio" name="sceneTypeRadio">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="sceneTypeArchRadio-label" for="sceneTypeArchRadio" style="margin-bottom: 0;">Archaeology</label>
                    </li>
                    <li class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="sceneTypeArchRadio" name="sceneTypeRadio">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="sceneTypeArchRadio-label" for="sceneTypeArchRadio" style="margin-bottom: 0;">Archaeology</label>
                    </li>

                </ul>


                <a style="float: right" class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
                    ADD SCENE
                </a>


            </div>
        </div>
    </div>



    <h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">Default Scenes</h3>



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

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
                <div class="mdc-card SceneCardContainer mdc-theme--background">
                    <div class="SceneThumbnail">
                        <a href="<?php echo esc_url( get_permalink($editscenePage[0]->ID) . $parameter_Scenepass . $scene_id ); ?>">
                            <img src="<?php echo site_url();?>/wp-content/plugins/WordpressUnity3DEditor/images/thumb-scene.png">
                        </a>
                    </div>
                    <section class="mdc-card__primary">
                        <h1 id="<?php echo $scene_id;?>-title" class="mdc-card__title mdc-typography--title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis"><?php echo $scene_title; ?></h1>
                        <h2 class="mdc-card__subtitle mdc-theme--text-secondary-on-light"><?php echo $scene_desc; ?></h2>
                    </section>
                    <section class="mdc-card__actions">
                        <a class="mdc-button mdc-button--compact mdc-card__action mdc-theme--text-secondary-on-light" onclick="deleteScene(<?php echo $scene_id; ?>)">DELETE</a>
                        <a class="mdc-button mdc-button--compact mdc-card__action mdc-button--primary" href="<?php echo esc_url( get_permalink($editscenePage[0]->ID) . $parameter_Scenepass . $scene_id ); ?>">EDIT</a>
                    </section>
                </div>
            </div>

		<?php endwhile;?>

        <!--Delete Game Dialog-->
        <aside id="delete-dialog"
               style="visibility:hidden"
               class="mdc-dialog"
               role="alertdialog"
               aria-labelledby="my-mdc-dialog-label"
               aria-describedby="my-mdc-dialog-description" data-mdc-auto-init="MDCDialog">
            <div class="mdc-dialog__surface">
                <header class="mdc-dialog__header">
                    <h2 id="delete-dialog-title" class="mdc-dialog__header__title">
                        Delete scene?
                    </h2>
                </header>
                <section id="delete-dialog-description" class="mdc-dialog__body mdc-typography--body1">
                    Are you sure you want to delete this scene? There is no Undo functionality once you delete it.
                </section>
                <footer class="mdc-dialog__footer">
                    <a class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button">Cancel</a>
                    <a class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-dialog__footer__button--accept mdc-button--raised">Delete</a>
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
        window.mdc.autoInit();

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


        var dialog = new mdc.dialog.MDCDialog(document.querySelector('#delete-dialog'));
        dialog.listen('MDCDialog:accept', function() {
            console.log('accepted');
        });

        dialog.listen('MDCDialog:cancel', function() {
            console.log('canceled');
        });

        function deleteScene(id) {

            var dialogTitle = document.getElementById("delete-dialog-title");
            var dialogDescription = document.getElementById("delete-dialog-description");
            var sceneTitle = document.getElementById(id+"-title").innerHTML;

            dialogTitle.innerHTML = "<b>Delete " + sceneTitle+"?</b>";
            dialogDescription.innerHTML = "Are you sure you want to delete your scene '" +sceneTitle + "'? There is no Undo functionality once you delete it.";
            dialog.show();
            console.log(id);
        }

    </script>
<?php get_footer(); ?>