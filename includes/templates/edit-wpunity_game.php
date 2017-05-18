<?php get_header(); ?>

	<div class="EditPageHeader">

		<h1 class="mdc-typography--display1 mdc-theme--text-primary-on-light">Game project title (auto-generated)</h1>

		<a class="mdc-button mdc-button mdc-button--raised mdc-button--primary" data-mdc-auto-init="MDCRipple">
			COMPILE GAME
		</a>
	</div>

	<ul class="EditPageBreadcrumb">
		<li><a class="mdc-typography--caption mdc-theme--accent" href="#">Home</a></li>
		<li><i class="material-icons EditPageBreadcrumbArr mdc-theme--text-hint-on-background">arrow_drop_up</i></li>
		<li class="mdc-typography--caption"><span class="EditPageBreadcrumbSelected">Game Editor</span></li>
	</ul>

	<hr class="mdc-list-divider">

	<h2 class="mdc-typography--headline mdc-theme--text-primary-on-light">Scenes</h2>

	<h3 class="mdc-typography--subheading2 mdc-theme--text-primary-on-light">My Scenes</h3>

	<div class="mdc-layout-grid">
		<!--LOAD SAVED SCENES HERE-->
	</div>

	<i></i>
	<a class="mdc-button mdc-button--primary mdc-theme--primary EditPageAccordion">Add New Scene</a>

	<div class="EditPageAccordionPanel">
		<div class="mdc-layout-grid">

			<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5">

				<div class="mdc-textfield mdc-textfield--fullwidth" data-mdc-auto-init="MDCTextfield">
					<input id="title" type="text" class="mdc-textfield__input mdc-theme--text-primary-on-light" aria-controls="title-validation-msg" required minlength="6" style="box-shadow: none; border-color:transparent;">
					<label for="title" class="mdc-textfield__label">
						Enter a scene title
				</div>
				<p class="mdc-textfield-helptext  mdc-textfield-helptext--validation-msg"
				   id="title-validation-msg">
					Must be at least 6 characters long
				</p>
				<hr class="WhiteSpaceSeparator">

				<div class="mdc-textfield mdc-textfield--multiline " data-mdc-auto-init="MDCTextfield">
					<textarea id="multi-line" class="mdc-textfield__input" rows="8" cols="40" style="box-shadow: none;"></textarea>
					<label for="multi-line" class="mdc-textfield__label">Add a scene description</label>
				</div>

			</div>
			<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1"></div>
			<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6">

				<label class="mdc-typography--subheading2">Scene Type</label>

				<ul class="SceneTypeRadioButtons">
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

	<div class="mdc-layout-grid">
		<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">





		</div>
	</div>

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
	</script>
<?php get_footer(); ?>