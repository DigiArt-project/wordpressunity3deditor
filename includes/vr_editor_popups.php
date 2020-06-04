<!--POPUS on right-clicking 3D objects: vr_editor included-->

<!-- 1. Microscope or Textbook @ Chemistry: Popup menu to Select a scene to go, from  -->
<?php if ($project_scope == 1) { ?>
    <div id="chemistrySceneSelectPopupDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 360px; display:none">

        <a style="float: right;" type="button" class="mdc-theme--primary"
           onclick='this.parentNode.style.display = "none"; clearAndUnbindMicroscopeTextbookProperties(); return false;'>
            <i class="material-icons" style="cursor: pointer; float: right;">close</i>
        </a>

        <i title="Select a scene to load" class="material-icons mdc-theme--text-icon-on-background" style="vertical-align: text-bottom">directions</i>
        <select title="Select a scene" id="chemistrySceneSelectComponent" class="mdc-select">
        </select>
    </div>
<?php } ?>

<!-- 2. Gate @ Archaeology: Popup menu to Select a scene to go, from -->
<div id="chemistryGatePopupDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 360px; display:none">

    <a style="float: right;" type="button" class="mdc-theme--primary"
       onclick='this.parentNode.style.display = "none"; clearAndUnbindBoxProperties(); return false;'>
        <i class="material-icons" style="cursor: pointer; float: right;">close</i>
    </a>

    <i title="Select a functional Category label" class="material-icons mdc-theme--text-icon-on-background" style="vertical-align: text-bottom">label</i>
    <select title="Select a functional category label" id="chemistryGateComponent" class="mdc-select">
    </select>
</div>


<!-- Artifact @ Archaeology: Popup menu to for Reward item checkbox, from  -->
<div id="popUpArtifactPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 200px;display:none">

    <!-- The close button-->
    <a style="float: right;" type="button" class="mdc-theme--primary"
       onclick='this.parentNode.style.display = "none"; clearAndUnbindCheckBoxProperties("artifact_reward_checkbox"); return false;'>
        <i class="material-icons" style="cursor: pointer; float: right;">close</i>
    </a>

    <!-- The checkbox-->
    <input type="checkbox" title="Select if it is a reward item"  id="artifact_reward_checkbox" name="artifact_reward_checkbox"
           class="mdc-textfield__input mdc-theme--text-primary-on-light"
           style="width: 100px !important; float: right; margin-left: 80px; margin-top: 20px;">
    <label for="artifact_reward_checkbox" class="mdc-textfield__label"
           style="margin-left: 10px; bottom: 8px; margin-bottom: 0px;">Is a reward item?</label>
</div>


<!-- POI IT @ Archaeology: Popup menu to for Reward item checkbox, from  -->
<div id="popUpPoiImageTextPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 200px;display:none">

    <!-- The close button-->
    <a style="float: right;" type="button" class="mdc-theme--primary"
       onclick='this.parentNode.style.display = "none"; clearAndUnbindCheckBoxProperties("poi_image_text_reward_checkbox"); return false;'>
        <i class="material-icons" style="cursor: pointer; float: right;">close</i>
    </a>

    <!-- The checkbox-->
    <input type="checkbox" title="Select if it is a reward item"  id="poi_image_text_reward_checkbox" name="poi_image_text_reward_checkbox"
           class="mdc-textfield__input mdc-theme--text-primary-on-light" style="width: 100px !important; float: right; margin-left: 80px; margin-top: 20px;">
    <label for="poi_image_text_reward_checkbox" class="mdc-textfield__label"
           style="margin-left: 10px; bottom: 8px; margin-bottom: 0px;">Is a reward item?</label>

</div>

<!-- POI Video @ Archaeology: Popup menu to for Reward item checkbox, from -->
<div id="popUpPoiVideoPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 200px;display:none">

    <!-- The close button-->
    <a style="float: right;" type="button" class="mdc-theme--primary"
       onclick='this.parentNode.style.display = "none"; clearAndUnbindCheckBoxProperties("poi_video_reward_checkbox"); return false;'>
        <i class="material-icons" style="cursor: pointer; float: right;">close</i>
    </a>

    <!-- The checkbox-->

    <input type="checkbox" title="Select if it is a reward item"  id="poi_video_reward_checkbox" name="poi_image_text_reward_checkbox"
           class="mdc-textfield__input mdc-theme--text-primary-on-light"
           style="margin-left: 29px; width: 150px !important; float: right;">
    <label for="poi_video_reward_checkbox" class="mdc-textfield__label" style="margin-left: 10px; bottom: 8px; margin-bottom: 0px;">
        Is a reward item?</label>

</div>


<!-- Sun @ Archaeology: Popup menu to for Sun Intensity and Color -->
<div id="popUpSunPropertiesDiv" class="EditorObjOverlapSelectStyle mdc-theme--background mdc-elevation--z2" style="min-width: 250px;display:none">

    <!-- The close button-->
    <a style="float: right;" type="button" class="mdc-theme--primary"
       onclick='this.parentNode.style.display = "none";  return false;'>
<!--        clearAndUnbindCheckBoxProperties("poi_video_reward_checkbox");-->
        <i class="material-icons" style="cursor: pointer; float: right;">close</i>
    </a>

    <!-- The intensity-->
    <label for="sunIntensity" class="mdc-textfield__label" style="top: 8px; position: initial">
        Set Sun intensity:</label>
    
    <input type="text" id="sunIntensity" name="sunIntensity" title="Set a number from 0 to infinite, 1 is the default"
           value="1" maxlength="4"
           class="mdc-textfield__input" style="width:7ch" onkeyup="changeSunIntensity()"/>


    <!-- The Color of the sun-->
    <label for="sunIntensity" class="mdc-textfield__label" style="top: 12px; position: relative; bottom: 5px; margin-bottom: 15px;">
        Sun Color in Hex:</label>

    <input type="text" id="sunColor" name="sunColor" title="Set a hex number, ffffff is the default (white)"
           value="ffffff" maxlength="6"
           class="mdc-textfield__input" style="width:7ch" onkeyup="changeSunColor()"/>

</div>

