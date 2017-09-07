/**
 * Delete Scene
 *
 * Parameters from javascript
 * scene_id : the scene to delete
 * wpunity_deleteSceneAjax()
 *
 */
function wpunity_deleteAssetAjax(asset_id, game_slug) {

    // Todo-Tasos: Open dialog or progressbar to wait for asset delete

    jQuery.ajax({
        url: my_ajax_object_deleteasset.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_delete_asset_action',
            'asset_id': asset_id,
            'game_slug': game_slug
        },
        success: function (res) {

            res =  JSON.parse(res);

            console.log("Asset with id=" + res + " was succesfully deleted");

            // Remove objects from scene
            var names_to_remove = [];
            for (var i=0; i< envir.scene.children.length; i++)
                if (envir.scene.children[i].assetid == "" + res + "")
                    names_to_remove.push(envir.scene.children[i].name);

            for (var i=0; i< names_to_remove.length; i++)
                envir.scene.remove(envir.scene.getObjectByName(names_to_remove[i]));


            // Todo-Tasos: Close dialog or progressbar to wait for asset delete


            // ToDo-Tasos: Remove dom of asset tile from the 3d editor




        },
        error: function (xhr, ajaxOptions, thrownError) {

            // Todo-Tasos: Close dialog or progressbar to wait for asset delete


            console.log("Ajax Delete Asset: ERROR: 169" + thrownError);
        }
    });

}