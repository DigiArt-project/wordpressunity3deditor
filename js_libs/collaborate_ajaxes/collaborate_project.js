/**
 * Collaborate on Project:
 *
 *  All the above are encompassed in     wpunity_collaborate_project_frontend_callback
 */
function wpunity_updateCollabsAjax(project_id, dialogCollab, collabs_emails) {

    jQuery.ajax({
        url: my_ajax_object_collaborate_project.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_collaborate_project_action',
            'project_id': project_id,
            'collabs_emails': collabs_emails
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



function wpunity_fetchCollabsAjax(project_id) {

    jQuery.ajax({
        url: my_ajax_object_collaborate_project.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_fetch_collaborators_action',
            'project_id': project_id
        },
        success: function (res) {
            var collabs_emails = res;

            var dialogTextarea = document.getElementById("textarea-collaborators");
            dialogTextarea.innerHTML = collabs_emails;


        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Could not fetch collaborators.");
            console.log("Ajax Fetch collaborators: ERROR: 116a" + thrownError);
        }
    });

}
