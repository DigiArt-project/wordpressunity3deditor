<?php


get_header(); ?>


    <h1 class="mdc-typography--display4 mdc-theme--text-primary-on-light mdc-theme--text">Game Authoring Tool</h1>

    <div class="mdc-layout-grid">

        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

            <h2 class="mdc-typography--display3 mdc-theme--text-primary-on-light mdc-theme--text">Library</h2>

            <ul class="mdc-list mdc-list--two-line mdc-list--avatar-list">
                <li class="mdc-list-item">
                    <a href="#" class="mdc-list-item mdc-ripple-upgraded mdc-ripple-upgraded--foreground-deactivation" data-mdc-auto-init="MDCRipple">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true" title="Energy">
                            blur_on
                        </i>
                        <span class="mdc-list-item__text mdc-typography--title">
                            Put title from loop
                            <span class="mdc-list-item__text__secondary mdc-typography--subheading2">Jan 10, 2014</span>
                        </span>
                    </a>
                    <a href="#" class="mdc-list-item__end-detail material-icons" aria-label="View more information" title="Delete game" onclick="event.preventDefault();">
                        delete
                    </a>
                </li>
                <li class="mdc-list-item">
                    <a href="#" class="mdc-list-item mdc-ripple-upgraded mdc-ripple-upgraded--foreground-deactivation" data-mdc-auto-init="MDCRipple">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true" title="Energy">
                            blur_on
                        </i>
                        <span class="mdc-list-item__text mdc-typography--title">
                            Put title from loop
                            <span class="mdc-list-item__text__secondary mdc-typography--subheading2">Jan 10, 2014</span>
                        </span>
                    </a>
                    <a href="#" class="mdc-list-item__end-detail material-icons" aria-label="View more information" title="Delete game" onclick="event.preventDefault();">
                        delete
                    </a>
                </li>
                <li class="mdc-list-item">
                    <a href="#" class="mdc-list-item mdc-ripple-upgraded mdc-ripple-upgraded--foreground-deactivation" data-mdc-auto-init="MDCRipple">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true" title="Archaeology">
                            account_balance
                        </i>
                        <span class="mdc-list-item__text mdc-typography--title">
                            Put title from loop
                            <span class="mdc-list-item__text__secondary mdc-typography--subheading2">Jan 10, 2014</span>
                        </span>
                    </a>
                    <a href="#" class="mdc-list-item__end-detail material-icons" aria-label="View more information" title="Delete game" onclick="event.preventDefault();">
                        delete
                    </a>
                </li>

            </ul>
        </div>


        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">
            <h2 class="mdc-typography--display3 mdc-theme--text-primary-on-light mdc-theme--text">New game</h2>

        </div>


        <script type="text/javascript">
            window.mdc.autoInit();
        </script>
<?php get_footer();
?>