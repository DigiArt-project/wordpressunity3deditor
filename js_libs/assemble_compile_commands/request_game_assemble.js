// handles the click event for link 1, sends the query
function wpunity_assembleAjax() {

    //----------------------------------------------------------------------------------
    //  AJAX 1: Send assemble command. Run php 'wpunity_assemble_action' in wpunity-types-games-data.php with AJAX
    //----------------------------------------------------------------------------------
    document.getElementById('wpunity_assembleButton').innerHTML = "Assembling ...";

    jQuery.ajax({
        url: 'admin-ajax.php',
        type: 'POST',
        data: {'action': 'wpunity_assemble_action',
               'source': phpvarsB.source,
               'target': phpvarsB.target,
               'game_libraries_path': phpvarsB.game_libraries_path,
                'game_id': phpvarsB.game_id
                },
        success: function (response) {
            document.getElementById('wpunity_assembleButton').innerHTML = "Success.";
            document.getElementById("wpunity_assemble_report1").innerHTML = response;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            document.getElementById('wpunity_assembleButton').innerHTML = 'Error: Assemble again?';
        }
    });
}


//var os_dependend_var = phpvars.PHP_OS.toUpperCase().substr(0, 3) === 'WIN'? 1:4;