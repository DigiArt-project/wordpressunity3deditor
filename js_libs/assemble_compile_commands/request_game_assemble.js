// AJAX NO 1: COMPILE BUTTON
//var os_dependend_var = phpvars.PHP_OS.toUpperCase().substr(0, 3) === 'WIN'? 1:4;

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

//     //---------------------------------------------------------------------------------
//     // AJAX NO 2: Periodically check stdout.log file of Unity to see if we have finished
//     //---------------------------------------------------------------------------------
//     document.getElementById("wpunity_compile_report1").innerHTML = "-1";
//     document.getElementById("wpunity_compile_report2").innerHTML = "Trying to compile the game ...";
//
//     // Constantly monitor the stdout.log file
//     var counterLinesPrevious = 0;
//     var interval = 0;
//
//     var start_time = new Date().getTime();
//
//     interval = setInterval(function() {
//
//         reqMonitor = jQuery.ajax({
//             url : 'admin-ajax.php',
//             type : 'POST',
//             cache: false,
//             data: {'action': 'wpunity_monitor_compiling_action'},
//             success : function(response){
//                 console.log("onread stdout" + response.length);
//
//                 var counterLines = response.split(/\r\n|\r|\n/).length;
//
//                 if (counterLines != counterLinesPrevious) {
//                     counterLinesPrevious = counterLines;
//                     document.getElementById("wpunity_compile_report1").innerHTML = "Log file:" + counterLinesPrevious + " lines";
//                     document.getElementById("wpunity_compile_game_stdoutlog_report").innerHTML = response;
//                 } else {
//                     clearInterval(interval);
//
//                     document.getElementById("wpunity_compile_report1").innerHTML = "Compiling completed, lasted: " + (new Date().getTime() - start_time)/1000 + " seconds";
//
//                     if (response.indexOf("Exiting batchmode successfully now")>0){
//                         document.getElementById("wpunity_compile_report2").innerHTML = "and the result is Success.";
//                         clearInterval(interval);
//                     } else {
//                         document.getElementById("wpunity_compile_report2").innerHTML = 'and the result is Error [15] : Compile error ' + response;
//                     }
//
//                     document.getElementById("wpunity_compile_game_stdoutlog_report").innerHTML = response;
//                 }
//             },
//             error : function(xhr, ajaxOptions, thrownError){
//                 document.getElementById("wpunity_compile_report2").innerHTML = "and the result is Error [16] : HTML " + xhr.status + "<br />" +
//                     xhr.getAllResponseHeaders() + " " + thrownError;
//
//                 document.getElementById("wpunity_compile_game_stdoutlog_report").innerHTML = response;
//             }
//         });
//     }, 2000);
// }
//
// //-------------------------------------------------------
// // AJAX NO 3: ZIP all and provide link to download
// //-----------------------------------------------------------
// function myzipajax() {
//     document.getElementById('wpunity_zipgame_report').innerHTML = "Zipping all in game.zip ...";
//
//     var reqCompile = jQuery.ajax({
//         url : 'admin-ajax.php',
//         type : 'POST',
//         data : {'action': 'wpunity_game_zip_action'},
//         success : function(response){
//             document.getElementById('wpunity_zipgame_report').innerHTML = response;
//             document.getElementById('wpunity_zipgame_report').innerHTML = '<a href="'+ phpvars.game_urlpath + '/game.zip">Download game in a zip file </a>';
//         },
//         error : function(xhr, ajaxOptions, thrownError){
//             document.getElementById('wpunity_zipgame_report').innerHTML = 'Zipping game: ERROR [17]! '+ thrownError;
//         }
//     });
// }