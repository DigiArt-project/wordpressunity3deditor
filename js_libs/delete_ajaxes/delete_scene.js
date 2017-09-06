/**
 * Delete Scene
 *
 * Parameters from javascript
 *
 * window.scene_id_for_delete = scene_id
 * wpunity_deleteSceneAjax()
 *
 */
function wpunity_deleteSceneAjax(id) {

    jQuery.ajax({
        url: my_ajax_object_deletescene.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_delete_scene_action',
            'scene_id': window.scene_id_for_delete
        },
        success: function (res) {

            console.log("Scene with title=" + res + " was succesfully deleted");

            delete window.scene_id_for_delete;

            jQuery('#delete-scene-dialog-progress-bar').hide();
            jQuery( "#deleteSceneDialogDeleteBtn" ).removeClass( "LinkDisabled" );
            jQuery( "#deleteSceneDialogCancelBtn" ).removeClass( "LinkDisabled" );

            deleteDialog.close();

            jQuery( "#scene-" + id).fadeOut(300, function() { jQuery(this).remove(); });

        },
        error: function (xhr, ajaxOptions, thrownError) {

            delete window.game_id_for_delete;

            jQuery('#delete-scene-dialog-progress-bar').hide();

            jQuery( "#deleteSceneDialogDeleteBtn" ).removeClass( "LinkDisabled" );
            jQuery( "#deleteSceneDialogCancelBtn" ).removeClass( "LinkDisabled" );

            alert("Could not delete game. Try deleting it from the administration panel");

            console.log("Ajax Delete Game: ERROR: 167" + thrownError);
        }
    });

}