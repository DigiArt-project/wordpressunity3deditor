<?php ?>

<div class="wrapper_lang">
    
    <!--     English EDIT-->
    <div id="EnglishEdit" class="tab-container_lang" style="position:relative;">
        
        <div id="assetDescription" class="changablefont mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDesc" class="mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; resize:vertical;font-family: <?php echo $curr_font?>;"
                                      name="assetDesc" form="3dAssetForm"><?php echo trim($asset_desc_saved); ?></textarea>
            <label for="assetDesc" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_label; ?></label>
        </div>
        
        
        <div id="assetDescriptionKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescKids" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; resize:vertical;font-family: <?php echo $curr_font?>;"
                                      name="assetDescKids" form="3dAssetForm"><?php echo trim($asset_desc_kids_saved); ?></textarea>
            <label for="assetDescKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_kids_label; ?></label>
        </div>
        
        
        <div id="assetDescriptionExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescExperts" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none;  resize:vertical;font-family: <?php echo $curr_font?>;"
                                      name="assetDescExperts" form="3dAssetForm"><?php echo trim($asset_desc_experts_saved); ?></textarea>
            <label for="assetDescExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_experts_label; ?></label>
        </div>
        
        <div id="assetDescriptionPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescPerception" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none;  resize:vertical;font-family: <?php echo $curr_font?>;"
                                      name="assetDescPerception" form="3dAssetForm"><?php echo trim($asset_desc_perception_saved); ?></textarea>
            <label for="assetDescPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_perception_label; ?></label>
        </div>
    
    
    </div>
    
    
    <!--     GREEK EDIT    -->
    
    <div id="GreekEdit" class="tab-container_lang" style="position:relative">
        
        <div id="assetTitleGreek" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetTitGreek" class="changablefont mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;font-family: <?php echo $curr_font?>;"
                                      name="assetTitGreek" form="3dAssetForm"><?php echo trim($asset_title_greek_saved); ?></textarea>
            <label for="assetTitGreek" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_greek_label; ?></label>
        </div>
        
        <div id="assetDescriptionGreek" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGreek" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; font-family: <?php echo $curr_font?>; "
                                      name="assetDescGreek" form="3dAssetForm"><?php echo trim($asset_desc_greek_saved); ?></textarea>
            <label for="assetDescGreek" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_greek_label; ?></label>
        </div>
        
        
        <div id="assetDescriptionGreekKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGreekKids" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; font-family: <?php echo $curr_font?>;"
                                      name="assetDescGreekKids" form="3dAssetForm"><?php echo trim($asset_desc_greek_kids_saved); ?></textarea>
            <label for="assetDescGreekKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_greek_kids_label; ?></label>
        </div>
        
        <div id="assetDescriptionGreekExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGreekExperts" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; font-family: <?php echo $curr_font?>;"
                                      name="assetDescGreekExperts" form="3dAssetForm"><?php echo trim($asset_desc_greek_experts_saved); ?></textarea>
            <label for="assetDescGreekExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_greek_experts_label; ?></label>
        </div>
        
        <div id="assetDescriptionGreekPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGreekPerception" class="mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; font-family: <?php echo $curr_font?>;"
                                      name="assetDescGreekPerception" form="3dAssetForm"><?php echo trim($asset_desc_greek_perception_saved); ?></textarea>
            <label for="assetDescGreekPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_greek_perception_label; ?></label>
        </div>
    </div>
    
    
    <!-- SPANISH: HERE  -->
    
    <div id="SpanishEdit" class="tab-container_lang" style="position:relative">
        
        <div id="assetTitleSpanish" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetTitSpanish" class="changablefont mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;font-family: <?php echo $curr_font?>;"
                                          name="assetTitSpanish" form="3dAssetForm"><?php echo trim($asset_title_spanish_saved); ?></textarea>
            <label for="assetTitSpanish" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_spanish_label; ?></label>
        </div>
        
        <div id="assetDescriptionSpanish" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescSpanish" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; font-family: <?php echo $curr_font?>;"
                                      name="assetDescSpanish" form="3dAssetForm"><?php echo trim($asset_desc_spanish_saved); ?></textarea>
            <label for="assetDescSpanish" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_spanish_label; ?></label>
        </div>
        
        <div id="assetDescriptionSpanishKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescSpanishKids" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescSpanishKids" form="3dAssetForm"><?php echo trim($asset_desc_spanish_kids_saved); ?></textarea>
            <label for="assetDescSpanishKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_spanish_kids_label; ?></label>
        </div>
        
        <div id="assetDescriptionSpanishExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescSpanishExperts" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescSpanishExperts" form="3dAssetForm"><?php echo trim($asset_desc_spanish_experts_saved); ?></textarea>
            <label for="assetDescSpanishExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_spanish_experts_label; ?></label>
        </div>
        
        <div id="assetDescriptionSpanishPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescSpanishPerception" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescSpanishPerception" form="3dAssetForm"><?php echo trim($asset_desc_spanish_perception_saved); ?></textarea>
            <label for="assetDescSpanishPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_spanish_perception_label; ?></label>
        </div>
    
    </div>
    
    <!-- French  -->
    
    <div id="FrenchEdit" class="tab-container_lang" style="position:relative">
        
        <div id="assetTitleFrench" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetTitFrench" class="changablefont mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;"
                                          name="assetTitFrench" form="3dAssetForm"><?php echo trim($asset_title_french_saved); ?></textarea>
            <label for="assetTitFrench" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_french_label; ?></label>
        </div>
        
        <div id="assetDescriptionFrench" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescFrench" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                      name="assetDescFrench" form="3dAssetForm"><?php echo trim($asset_desc_french_saved); ?></textarea>
            <label for="assetDescFrench" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_french_label; ?></label>
        </div>
        
        <div id="assetDescriptionFrenchKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescFrenchKids" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescFrenchKids" form="3dAssetForm"><?php echo trim($asset_desc_french_kids_saved); ?></textarea>
            <label for="assetDescFrenchKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_french_kids_label; ?></label>
        </div>
        
        <div id="assetDescriptionFrenchExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescFrenchExperts" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescFrenchExperts" form="3dAssetForm"><?php echo trim($asset_desc_french_experts_saved); ?></textarea>
            <label for="assetDescFrenchExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_french_experts_label; ?></label>
        </div>
        
        <div id="assetDescriptionFrenchPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescFrenchPerception" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescFrenchPerception" form="3dAssetForm"><?php echo trim($asset_desc_french_perception_saved); ?></textarea>
            <label for="assetDescFrenchPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_french_perception_label; ?></label>
        </div>
    </div>
    
    <!-- German  -->
    
    <div id="GermanEdit" class="tab-container_lang" style="position:relative">
        
        <div id="assetTitleGerman" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetTitGerman" class="changablefont mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;"
                                          name="assetTitGerman" form="3dAssetForm"><?php echo trim($asset_title_german_saved); ?></textarea>
            <label for="assetTitGerman" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_german_label; ?></label>
        </div>
        
        <div id="assetDescriptionGerman" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescGerman" class="changablefont mdc-textfield__input" rows="10" cols="40" style="box-shadow: none; "
                                      name="assetDescGerman" form="3dAssetForm"><?php echo trim($asset_desc_german_saved); ?></textarea>
            <label for="assetDescGerman" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_german_label; ?></label>
        </div>
        
        <div id="assetDescriptionGermanKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescGermanKids" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescGermanKids" form="3dAssetForm"><?php echo trim($asset_desc_german_kids_saved); ?></textarea>
            <label for="assetDescGermanKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_german_kids_label; ?></label>
        </div>
        
        <div id="assetDescriptionGermanExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescGermanExperts" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescGermanExperts" form="3dAssetForm"><?php echo trim($asset_desc_german_experts_saved); ?></textarea>
            <label for="assetDescGermanExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_german_experts_label; ?></label>
        </div>
        
        <div id="assetDescriptionGermanPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescGermanPerception" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescGermanPerception" form="3dAssetForm"><?php echo trim($asset_desc_german_perception_saved); ?></textarea>
            <label for="assetDescGermanPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_german_perception_label; ?></label>
        </div>
    </div>
    
    <!-- Russian  -->
    <div id="RussianEdit" class="tab-container_lang" style="position:relative">
        
        <div id="assetTitleRussian" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetTitRussian" class="changablefont mdc-textfield__input" rows="1" cols="40" style="box-shadow: none; font-size:24px; padding-bottom:0px;"
                                          name="assetTitRussian" form="3dAssetForm"><?php echo trim($asset_title_russian_saved); ?></textarea>
            <label for="assetTitRussian" class="mdc-textfield__label" style="background: none;"><?php echo $asset_title_russian_label; ?></label>
        </div>
        
        <div id="assetDescriptionRussian" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                            <textarea id="assetDescRussian" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                      name="assetDescRussian" form="3dAssetForm"><?php echo trim($asset_desc_russian_saved); ?></textarea>
            <label for="assetDescRussian" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_russian_label; ?></label>
        </div>
        
        <div id="assetDescriptionRussianKids" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescRussianKids" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescRussianKids" form="3dAssetForm"><?php echo trim($asset_desc_russian_kids_saved); ?></textarea>
            <label for="assetDescRussianKids" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_russian_kids_label; ?></label>
        </div>
        
        <div id="assetDescriptionRussianExperts" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescRussianExperts" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescRussianExperts" form="3dAssetForm"><?php echo trim($asset_desc_russian_experts_saved); ?></textarea>
            <label for="assetDescRussianExperts" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_russian_experts_label; ?></label>
        </div>
        
        <div id="assetDescriptionRussianPerception" class="mdc-textfield mdc-textfield--textarea" data-mdc-auto-init="MDCTextfield"
             style="border: 1px solid rgba(0, 0, 0, 0.3);width:100%;">
                                <textarea id="assetDescRussianPerception" class="changablefont mdc-textfield__input" rows="3" cols="40" style="box-shadow: none; "
                                          name="assetDescRussianPerception" form="3dAssetForm"><?php echo trim($asset_desc_russian_perception_saved); ?></textarea>
            <label for="assetDescRussianPerception" class="mdc-textfield__label" style="background: none;"><?php echo $asset_desc_russian_perception_label; ?></label>
        </div>
    </div>

</div>
