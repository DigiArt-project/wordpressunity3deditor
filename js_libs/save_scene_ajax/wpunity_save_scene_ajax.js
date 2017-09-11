function wpunity_saveSceneAjax() {

    jQuery.ajax({
        url: isAdmin == "back" ? 'admin-ajax.php' : my_ajax_object_savescene.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_save_scene_async_action',
            'scene_id': isAdmin == "back" ? phpmyvarC.scene_id : my_ajax_object_savescene.scene_id,
            'scene_json': document.getElementById("wpunity_scene_json_input").value,
            'scene_screenshot': document.getElementById("wpunity_scene_sshot").value,
            'scene_title':   document.getElementById("sceneTitleInput").value,
            'scene_description':   document.getElementById("sceneDescriptionInput").value
        },
        success: function (data) {
            console.log("Ajax Save Scene:" + data);


            jQuery('#save-scene-button').html("Save scene").removeClass("LinkDisabled");

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("Ajax Save Scene: ERROR: 156" + thrownError);

            jQuery('#save-scene-button').html("Save scene").removeClass("LinkDisabled");

            document.getElementById('save-scene-button').style.backgroundColor = '#FF0000';

            alert("Ajax Save Scene: ERROR: 156" + thrownError);
        }
    });

}