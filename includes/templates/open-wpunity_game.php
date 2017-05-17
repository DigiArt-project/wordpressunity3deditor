<?php

get_header(); ?>

    <h1 class="mdc-typography--display4 mdc-theme--text-primary-on-light mdc-theme--text">Game Authoring Tool</h1>

    <div class="mdc-layout-grid FrontPageStyle">

        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

            <h2 class="mdc-typography--display3 mdc-theme--text-primary-on-light mdc-theme--text">Library</h2>

            <hr class="mdc-list-divider">

            <ul class="mdc-list mdc-list--two-line mdc-list--avatar-list">
                <li class="mdc-list-item">
                    <a href="javascript:void(0)" class="mdc-list-item" data-mdc-auto-init="MDCRipple">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true" title="Energy">
                            blur_on
                        </i>
                        <span class="mdc-list-item__text mdc-typography--title">
                            Put title from loop
                            <span class="mdc-list-item__text__secondary mdc-typography--subheading2">Jan 10, 2014</span>
                        </span>
                    </a>
                    <a href="javascript:void(0)" class="mdc-list-item" aria-label="Delete game" title="Delete game" onclick="showDialog(1)">
                        <i class="material-icons mdc-list-item__end-detail" aria-hidden="true" title="Delete game">
                            delete
                        </i>
                    </a>
                </li>
                <li class="mdc-list-item">
                    <a href="javascript:void(0)" class="mdc-list-item" data-mdc-auto-init="MDCRipple">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true" title="Energy">
                            blur_on
                        </i>
                        <span class="mdc-list-item__text mdc-typography--title">
                            Put title from loop
                            <span class="mdc-list-item__text__secondary mdc-typography--subheading2">Jan 10, 2014</span>
                        </span>
                    </a>
                    <a href="javascript:void(0)" class="mdc-list-item" aria-label="Delete game" title="Delete game" onclick="showDialog(2)">
                        <i class="material-icons mdc-list-item__end-detail" aria-hidden="true" title="Delete game">
                            delete
                        </i>
                    </a>
                </li>
                <li class="mdc-list-item">
                    <a href="javascript:void(0)" class="mdc-list-item" data-mdc-auto-init="MDCRipple">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true" title="Archaeology">
                            account_balance
                        </i>
                        <span class="mdc-list-item__text mdc-typography--title">
                            Put title from loop
                            <span class="mdc-list-item__text__secondary mdc-typography--subheading2">Jan 10, 2014</span>
                        </span>
                    </a>
                    <a href="javascript:void(0)" class="mdc-list-item" aria-label="Delete game" title="Delete game" onclick="showDialog(3)">
                        <i class="material-icons mdc-list-item__end-detail" aria-hidden="true" title="Delete game">
                            delete
                        </i>
                    </a>
                </li>
            </ul>

        </div>

        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>

        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

            <h2 class="mdc-typography--display3 mdc-theme--text-primary-on-light mdc-theme--text">New game</h2>

            <hr class="mdc-list-divider">

            <div class="mdc-layout-grid">

                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

                    <div class="mdc-textfield mdc-textfield--fullwidth" data-mdc-auto-init="MDCTextfield">
                        <input id="title" type="text" class="mdc-textfield__input mdc-typography--title mdc-theme--text-primary-on-light" style="box-shadow: none; border-color:transparent;">
                        <label for="title" class="mdc-textfield__label mdc-typography--headline mdc-theme--text-primary-on-light">
                            Game Title
                        </label>
                    </div>

                    <hr class="WhiteSpaceSeparator">

                    <label class="mdc-typography--headline mdc-theme--text-primary-on-light NewGameLabel">Game Type</label>
                    <div class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="ex2-radio1" checked="" name="ex2">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="ex2-radio1-label" for="ex2-radio1" style="margin-bottom: 0;">Energy</label>
                    </div>
                    <div class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="ex2-radio2" name="ex2">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label id="ex2-radio2-label" for="ex2-radio2" style="margin-bottom: 0;">Archaeology</label>
                    </div>

                    <hr class="WhiteSpaceSeparator">

                    <a style="float: right;" class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
                        Create
                    </a>

                </div>


            </div>

        </div>


        <!--Delete Game Dialog-->
        <aside id="delete-dialog"
               style="visibility:hidden"
               class="mdc-dialog"
               role="alertdialog"
               aria-labelledby="my-mdc-dialog-label"
               aria-describedby="my-mdc-dialog-description">
            <div class="mdc-dialog__surface">
                <header class="mdc-dialog__header">
                    <h2 id="my-mdc-dialog-label" class="mdc-dialog__header__title">
                        Delete "title" ?
                    </h2>
                </header>
                <section id="my-mdc-dialog-description" class="mdc-dialog__body mdc-typography--body1">
                    Are you sure you want to delete your game? There is no Undo functionality once you delete it.
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

        function showDialog(id) {
            dialog.show();
            console.log(id);
        }

    </script>
<?php get_footer();
?>