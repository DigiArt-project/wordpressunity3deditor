/**
 * Collaborate on Project:
 *
 *  All the above are encompassed in     wpunity_collaborate_project_frontend_callback
 */
function wpunity_uypdateCollabsAjax(project_id, dialogCollab, collabs_ids) {

    jQuery.ajax({
        url: my_ajax_object_collaborate_project.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_collaborate_project_action',
            'project_id': project_id,
            'collabs_ids': collabs_ids
        },
        success: function (res) {

            console.log(res);

            dialogCollab.close();

        },
        error: function (xhr, ajaxOptions, thrownError) {



            alert("Could not add collaborators.");

            console.log("Ajax Add collaborators: ERROR: 116" + thrownError);
        }
    });

}