<?php get_header();

if ( get_option('permalink_structure') ) { $perma_structure = true; } else {$perma_structure = false;}
if( $perma_structure){$parameter_pass = '/?wpunity_game=';} else{$parameter_pass = '&wpunity_game=';}

$editgamePage = wpunity_getEditpage();

?>

    <h1 class="mdc-typography--display3">Game Authoring Tool</h1>
    <hr class="WhiteSpaceSeparator">
    <div class="mdc-layout-grid FrontPageStyle">

        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

            <h2 class="mdc-typography--display1">Library</h2>

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

                        $all_game_category = get_the_terms( $game_id , 'wpunity_game_type' );
                        $game_category = $all_game_category[0]->name;
						//$game_link = get_permalink();

						?>
                        <li class="mdc-list-item" id="<?php echo $game_id; ?>">
                            <a href="<?php echo esc_url( get_permalink($editgamePage[0]->ID) . $parameter_pass . $game_id ) ;; ?>" class="mdc-list-item" data-mdc-auto-init="MDCRipple">
                                <i class="material-icons mdc-list-item__start-detail" aria-hidden="true" title="Energy">
                                    blur_on
                                </i>
                                <span id="<?php echo $game_id; ?>-title" class="mdc-list-item__text">
                                <?php echo $game_title; ?>
                                    <span id="<?php echo $game_id; ?>-date" class="mdc-list-item__text__secondary"><?php echo $game_date; ?></span>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="mdc-list-item" aria-label="Delete game" title="Delete game" onclick="deleteGame(<?php echo $game_id; ?>)">
                                <i class="material-icons mdc-list-item__end-detail" aria-hidden="true" title="Delete game">
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

            <h2 class="mdc-typography--display1">New game project</h2>

            <hr class="mdc-list-divider">

            <div class="mdc-layout-grid">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                    <form name="newProjectForm">

                        <div class="mdc-textfield FullWidth mdc-form-field" data-mdc-auto-init="MDCTextfield">
                            <input id="title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light FullWidth" aria-controls="title-validation-msg" required minlength="6" style="box-shadow: none; border-color:transparent;">
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
                                    <input class="mdc-radio__native-control" type="radio" id="gameTypeEnergyRadio" checked="" name="gameTypeRadio">
                                    <div class="mdc-radio__background">
                                        <div class="mdc-radio__outer-circle"></div>
                                        <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                </div>
                                <label id="gameTypeEnergyRadio-label" for="gameTypeEnergyRadio" style="margin-bottom: 0;">Energy</label>
                            </li>
                            <li class="mdc-form-field">
                                <div class="mdc-radio">
                                    <input class="mdc-radio__native-control" type="radio" id="gameTypeArchRadio" name="gameTypeRadio">
                                    <div class="mdc-radio__background">
                                        <div class="mdc-radio__outer-circle"></div>
                                        <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                </div>
                                <label id="gameTypeArchRadio-label" for="gameTypeArchRadio" style="margin-bottom: 0;">Archaeology</label>
                            </li>
                        </ul>

                        <hr class="WhiteSpaceSeparator">

                        <button type="submit" style="float: right;" class="mdc-form-field mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
                            CREATE
                        </button>

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
                        Delete "title" ?
                    </h2>
                </header>
                <section id="delete-dialog-description" class="mdc-dialog__body mdc-typography--body1">
                    Are you sure you want to delete your game project? There is no Undo functionality once you delete it.
                </section>
                <footer class="mdc-dialog__footer">
                    <a class="mdc-button mdc-dialog__footer__button--cancel mdc-dialog__footer__button">Cancel</a>
                    <a class="mdc-button mdc-button--primary mdc-dialog__footer__button mdc-dialog__footer__button--accept mdc-button--raised">Delete</a>
                </footer>
            </div>
            <div class="mdc-dialog__backdrop"></div>
        </aside>

    </div>

    <script type="text/javascript">
        window.mdc.autoInit();

        var dialog = new mdc.dialog.MDCDialog(document.querySelector('#delete-dialog'));

        dialog.listen('MDCDialog:accept', function() {
            console.log('accepted');
        });

        dialog.listen('MDCDialog:cancel', function() {
            console.log('canceled');
        });


        function deleteGame(id) {

            var dialogTitle = document.getElementById("delete-dialog-title");
            var dialogDescription = document.getElementById("delete-dialog-description");
            var gameTitle = document.getElementById(id+"-title").innerHTML;
            gameTitle = gameTitle.substring(0, gameTitle.indexOf('<'));
            gameTitle = gameTitle.trim();

            dialogTitle.innerHTML = "<b>Delete " + gameTitle+"?</b>";
            dialogDescription.innerHTML = "Are you sure you want to delete your project '" +gameTitle + "'? There is no Undo functionality once you delete it.";
            dialog.show();
            console.log(id);
        }
    </script>
<?php get_footer(); ?>