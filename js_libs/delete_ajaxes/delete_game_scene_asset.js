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
            'game_id': window.game_id_for_delete,
        },
        success: function (res) {

            delete window.game_id_for_delete;

            // ToDo-Tasos: Close wait progressBar



            // ToDo-Tasos : Show smth when the Game is successfully deleted
            console.log("Game with id=" + res + " was succesfully deleted");

            // ToDo-Tasos: Instead of reload, remove the dom element of the project from the list
            location.reload();



        },
        error: function (xhr, ajaxOptions, thrownError) {

            delete window.game_id_for_delete;

            // ToDo-Tasos: Close wait progressBar


            // ToDo-Tasos : Show smth when the Game is not successfully deleted
            console.log("Ajax Delete Game: ERROR: 166" + thrownError);


        }
    });

}