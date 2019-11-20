/**
 * Collaborate on Project:
 *
 *  All the above are encompassed in     wpunity_delete_gameproject_frontend($game_id)
 */
function wpunity_collaborateProjectAjax(game_id, dialog, current_user_id, parameter_Scenepass) {

    jQuery.ajax({
        url: my_ajax_object_collaborate_project.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_collaborate_project_action',
            'game_id': game_id
        },
        success: function (res) {



            dialog.close();

        },
        error: function (xhr, ajaxOptions, thrownError) {



            alert("Could not add collaborators.");

            console.log("Ajax Add collaborators: ERROR: 116" + thrownError);
        }
    });

}