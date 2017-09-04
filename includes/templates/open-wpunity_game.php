<?php

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_pass = '?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$editgamePage = wpunity_getEditpage('game');

if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {

	//wpunity_compile_the_game($gameID,$gameSlug);

	$game_type_radioButton = esc_attr(strip_tags($_POST['gameTypeRadio']));//1 = Archaeology , 2 = Energy
	$archaeology_tax = get_term_by('slug', 'archaeology_games', 'wpunity_game_type');
	$energy_tax = get_term_by('slug', 'energy_games', 'wpunity_game_type');
	$game_type_chosen_id = '';
	if($game_type_radioButton == 1){$game_type_chosen_id = $archaeology_tax->term_id;}else{$game_type_chosen_id = $energy_tax->term_id;}

	$realplace_tax = get_term_by('slug', 'real_place', 'wpunity_game_cat');
	$virtualplace_tax = get_term_by('slug', 'virtual_place', 'wpunity_game_cat');

	$game_taxonomies = array(
		'wpunity_game_type' => array(
			$game_type_chosen_id,
		),
		'wpunity_game_cat' => array(
			$realplace_tax->term_id,
		)
	);

	$game_information = array(
		'post_title' => esc_attr(strip_tags($_POST['title'])),
		'post_content' => '',
		'post_type' => 'wpunity_game',
		'post_status' => 'publish',
		'tax_input' => $game_taxonomies,
	);

	$game_id = wp_insert_post($game_information);

	if($game_id){
		wp_redirect(esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $game_id ));
		exit;
	}
}

get_header();

?>

    <h1 class="mdc-typography--display3 mdc-theme--text-primary-on-background">Game Project Manager</h1>
    <h2 class="mdc-typography--headline mdc-theme--text-primary-on-background">Create a new game project or edit an existing one</h2>

    <p class="mdc-typography--subheading1 mdc-theme--text-secondary-on-light"> Not sure what to do?
        <a target="_blank" href="<?php echo plugin_dir_url( __DIR__ ); ?>files/usage-scenario.pdf" class="mdc-button mdc-button--primary mdc-theme--primary" data-mdc-auto-init="MDCRipple">Read the Usage Scenario</a>
    </p>

    <hr class="WhiteSpaceSeparator">
    <div class="mdc-layout-grid FrontPageStyle">

        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

            <h2 class="mdc-typography--display1 mdc-theme--text-primary-on-background">Projects</h2>

            <hr class="mdc-list-divider">

			<?php
			// Define custom query parameters
			$custom_query_args = array(
				'post_type' => 'wpunity_game',
				'posts_per_page' => 10,
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
			if ( $custom_query->have_posts() ) : ?>

                <ul class="mdc-list mdc-list--two-line mdc-list--avatar-list">
					<?php while ( $custom_query->have_posts() ) :
						$custom_query->the_post();

						$game_id = get_the_ID();
						$game_title = get_the_title();
						$game_date = get_the_date();
						//$game_link = get_permalink();

						$game_type_obj = wpunity_return_game_type($id);

						?>
                        <li class="mdc-list-item" id="<?php echo $game_id; ?>">
                            <a href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $game_id ); ?>" class="mdc-list-item" data-mdc-auto-init="MDCRipple" title="Open <?php echo $game_title;?>">

                                <i class="material-icons mdc-list-item__start-detail" aria-hidden="true" title="<?php echo $game_type_obj->string;?>"><?php echo $game_type_obj->icon;?></i>
                                <span id="<?php echo $game_id; ?>-title" class="mdc-list-item__text"><?php echo $game_title;?>
                                    <span id="<?php echo $game_id; ?>-date" class="mdc-list-item__text__secondary"><?php echo $game_date;?></span>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="mdc-list-item" aria-label="Delete game" title="Delete project" onclick="deleteGame(<?php echo $game_id; ?>)">
                                <i class="material-icons mdc-list-item__end-detail" aria-hidden="true" title="Delete project">
                                    delete
                                </i>
                            </a>
                        </li>

						<?php

					endwhile;?>
                </ul>

			<?php else : ?>

                <hr class="WhiteSpaceSeparator">

                <div class="CenterContents">

                    <i class="material-icons mdc-theme--text-icon-on-light" style="font-size: 96px;" aria-hidden="true" title="No game projects available">
                        games
                    </i>

                    <h3 class="mdc-typography--headline">No Game Projects available</h3>
                    <hr class="WhiteSpaceSeparator">
                    <h4 class="mdc-typography--title mdc-theme--text-secondary-on-light">You can try creating a new one</h4>

                </div>
			<?php endif;

			wp_reset_postdata();
			$wp_query = NULL;
			$wp_query = $temp_query;
			?>

        </div>

        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>

        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

            <h2 class="mdc-typography--display1 mdc-theme--text-primary-on-background">New game project</h2>

            <hr class="mdc-list-divider">

            <div class="mdc-layout-grid">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">


                    <form name="newProjectForm" action="" id="newProjectForm" method="POST" enctype="multipart/form-data">

                        <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                            <input id="title" name="title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" aria-controls="title-validation-msg" required minlength="6" style="box-shadow: none; border-color:transparent;">
                            <label for="title" class="mdc-textfield__label">
                                Enter a title for your project
                        </div>
                        <p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
                           id="title-validation-msg">
                            Must be at least 6 characters long
                        </p>

                        <hr class="WhiteSpaceSeparator">

                        <label class="mdc-typography--subheading2 NewGameLabel">Game Project Type</label>
                        <ul class="RadioButtonList">
                            <li class="mdc-form-field">
                                <div class="mdc-radio">
                                    <input class="mdc-radio__native-control" type="radio" id="gameTypeArchRadio" name="gameTypeRadio" value="1">
                                    <div class="mdc-radio__background">
                                        <div class="mdc-radio__outer-circle"></div>
                                        <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                </div>
                                <label id="gameTypeArchRadio-label" for="gameTypeArchRadio" style="margin-bottom: 0;">
                                    <i class="material-icons"></i>Archaeology</label>
                            </li>
                            <li class="mdc-form-field">
                                <div class="mdc-radio">
                                    <input class="mdc-radio__native-control" type="radio" id="gameTypeEnergyRadio" checked="" name="gameTypeRadio" value="2">
                                    <div class="mdc-radio__background">
                                        <div class="mdc-radio__outer-circle"></div>
                                        <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                </div>
                                <label id="gameTypeEnergyRadio-label" for="gameTypeEnergyRadio" style="margin-bottom: 0;">Energy</label>
                            </li>

                        </ul>

                        <hr class="WhiteSpaceSeparator">

						<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                        <button type="submit" style="float: right;" class="mdc-form-field mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple"> CREATE</button>

                    </form>
                </div>
            </div>
        </div>


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
                        Delete project?
                    </h2>
                </header>
                <section id="delete-dialog-description" class="mdc-dialog__body mdc-typography--body1">
                    Are you sure you want to delete your game project? There is no Undo functionality once you delete it.
                </section>
                <footer class="mdc-dialog__footer">
                    <a class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button" onclick="dismissDialog();">Cancel</a>
                    <a class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-dialog__footer__button--accept mdc-button--raised">Delete</a>
                </footer>
            </div>
            <div class="mdc-dialog__backdrop"></div>
        </aside>

    </div>
    <script type="text/javascript">
        window.mdc.autoInit();

        var dialog = new mdc.dialog.MDCDialog(document.querySelector('#delete-dialog'));

        function deleteGame(id) {

            var dialogTitle = document.getElementById("delete-dialog-title");
            var dialogDescription = document.getElementById("delete-dialog-description");
            var gameTitle = document.getElementById(id+"-title").innerHTML;
            gameTitle = gameTitle.substring(0, gameTitle.indexOf('<'));
            gameTitle = gameTitle.trim();

            dialogTitle.innerHTML = "<b>Delete " + gameTitle+"?</b>";
            dialogDescription.innerHTML = "Are you sure you want to delete your project '" +gameTitle + "'? There is no Undo functionality once you delete it.";
            dialog.id = id;
            dialog.show();
        }

        // Use dialog.id inside, to initiate the action to delete a project
        dialog.listen('MDCDialog:accept', function(evt) {
            console.log("ID:", dialog.id);
        });

        function dismissDialog() {
            dialog.close();
            console.log("Dialog closed");
        }
    </script>
<?php get_footer(); ?>