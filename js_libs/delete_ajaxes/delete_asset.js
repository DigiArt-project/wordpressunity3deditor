/**
 * Delete Scene
 *
 * Parameters from javascript
 * scene_id : the scene to delete
 * wpunity_deleteSceneAjax()
 *
 */
function wpunity_deleteAssetAjax(asset_id) {

    console.log("DDD:", asset_id);


    // jQuery.ajax({
    //     url: my_ajax_object_deleteasset.ajax_url,
    //     type: 'POST',
    //     data: {
    //         'action': 'wpunity_delete_asset_action',
    //         'asset_id': asset_id
    //     },
    //     success: function (res) {
    //
    //         console.log("Asset with title=" + res + " was succesfully deleted");
    //
    //         // jQuery('#delete-scene-dialog-progress-bar').hide();
    //         // jQuery( "#deleteSceneDialogDeleteBtn" ).removeClass( "LinkDisabled" );
    //         // jQuery( "#deleteSceneDialogCancelBtn" ).removeClass( "LinkDisabled" );
    //         //
    //         // deleteDialog.close();
    //         //
    //         // jQuery( "#scene-" + scene_id).fadeOut(300, function() { jQuery(this).remove(); });
    //
    //         /*location.reload();*/
    //     },
    //     error: function (xhr, ajaxOptions, thrownError) {
    //
    //         // jQuery('#delete-scene-dialog-progress-bar').hide();
    //         //
    //         // jQuery( "#deleteSceneDialogDeleteBtn" ).removeClass( "LinkDisabled" );
    //         // jQuery( "#deleteSceneDialogCancelBtn" ).removeClass( "LinkDisabled" );
    //         //
    //         // alert("Could not delete game. Try deleting it from the administration panel");
    //
    //         console.log("Ajax Delete Asset: ERROR: 168" + thrownError);
    //     }
    // });

}