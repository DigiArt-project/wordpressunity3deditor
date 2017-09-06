/**
 * Delete Game:
 *  1. Cascade delete Assets, Scenes and Game.
 *  2. Delete also taxonomies: Game name as Scene taxonomy, Game name as Asset taxonomy
 *  3. Delete also uploads related to the certain game
 *
 *  All the above are encompassed in     wpunity_delete_gameproject_frontend($game_id)
 */
function wpunity_deleteGameAjax() {

    jQuery.ajax({
        url: my_ajax_object_deletegame.ajax_url,
        type: 'POST',
        data: {
            'action': 'wpunity_delete_game_action',
            'game_id': window.game_id_for_delete
        },
        success: function (res) {

            delete window.game_id_for_delete;

            location.reload();

        },
        error: function (xhr, ajaxOptions, thrownError) {

            delete window.game_id_for_delete;

            jQuery('#delete-dialog-progress-bar').hide();

            jQuery( "#deleteGameBtn" ).removeClass( "LinkDisabled" );
            jQuery( "#cancelDeleteGameBtn" ).removeClass( "LinkDisabled" );

            alert("Could not delete game. Try deleting it from the administration panel");

            console.log("Ajax Delete Game: ERROR: 166" + thrownError);

        }
    });

}