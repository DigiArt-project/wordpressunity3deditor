/**
 * Delete Scene
 *
 * Parameters from javascript
 *
 * window.scene_id_for_delete = scene_id
 * wpunity_deleteSceneAjax()
 *
 */
function wpunity_deleteSceneAjax() {

    jQuery.ajax({
        url: my_ajax_object_deletescene.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_delete_scene_action',
            'scene_id': window.scene_id_for_delete,
        },
        success: function (res) {

            delete window.scene_id_for_delete;

            console.log("Scene with id=" + res + " was succesfully deleted");

            // ToDo-Tasos: Instead of reload, remove the dom element of the project from the list
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {

            delete window.game_id_for_delete;

            // ToDo-Tasos : Show smth when the Scene is not successfully deleted
            console.log("Ajax Delete Game: ERROR: 167" + thrownError);
        }
    });

}