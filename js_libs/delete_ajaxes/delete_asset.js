/**
 * Delete Scene
 *
 * Parameters from javascript
 * scene_id : the scene to delete
 * wpunity_deleteSceneAjax()
 *
 */
function wpunity_deleteAssetAjax(asset_id, game_slug) {

    jQuery("#deleteAssetProgressBar-"+ asset_id).show();
    jQuery("#asset-"+asset_id).addClass("LinkDisabled");

    jQuery.ajax({
        url: my_ajax_object_deleteasset.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_delete_asset_action',
            'asset_id': asset_id,
            'game_slug': game_slug
        },
        success: function (res) {

            res = JSON.parse(res);
            console.log("Asset with id=" + res + " was succesfully deleted");

            // Remove objects from scene
            var i;
            var names_to_remove = [];
            for (i=0; i< envir.scene.children.length; i++)
                if (envir.scene.children[i].assetid == "" + res + "")
                    names_to_remove.push(envir.scene.children[i].name);

            for (i=0; i< names_to_remove.length; i++)
                envir.scene.remove(envir.scene.getObjectByName(names_to_remove[i]));

            jQuery("#asset-"+asset_id).fadeOut(300, function() { jQuery(this).remove(); });

        },
        error: function (xhr, ajaxOptions, thrownError) {

            jQuery("#deleteAssetProgressBar--"+ asset_id).hide();

            jQuery("#asset-"+asset_id).removeClass("LinkDisabled");

            alert("Could not delete asset. Please try again or try deleting it from the administration panel.");

            console.log("Ajax Delete Asset: ERROR: 169" + thrownError);
        }
    });

}