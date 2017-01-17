<?php

function scene_custom_fields($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>


    <div>
        <label for="scene-vr-editor" style="margin-right:30px">VR Web Editor</label>
        <div name="scene-vr-editor" style="margin-bottom:30px;">
            <?php require( "vr_editor.php" );?>
        </div>
    </div>

    <div>
        <label for="scene-json-input" style="margin-right:30px; vertical-align: top">Scene json</label>
            <textarea name="scene-json-input" style="width:70%;height:800px;"
                ><?php echo get_post_meta($object->ID, "scene-json", true); ?></textarea>
    </div>

    <div>
        <label for="scene-latitude-input" style="margin-right:30px; vertical-align: top">Geolocation latitude</label>
        <input type="text" name="scene-latitude-input" style="width: 10ch;height:1em"
               value="<?php echo get_post_meta($object->ID, "scene-latitude", true); ?>"</input>
    </div>


    <div>
        <label for="scene-longitude-input" style="margin-right:30px; vertical-align: top">Geolocation longitude</label>
        <input type="text" name="scene-longitude-input" style="width: 10ch;height:1em"
               value="<?php echo get_post_meta($object->ID, "scene-longitude", true); ?>"</input>
    </div>


    <?php

    // end of custom fields
}

?>