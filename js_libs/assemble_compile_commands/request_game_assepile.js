function wpunity_assepileAjax() {

    // ajax 1 : Start the assembly-compile
    jQuery.ajax({
        url :  isAdmin=="back" ? 'admin-ajax.php' : my_ajax_object_assepile.ajax_url,
        type : 'GET',
        data : {
            'action': 'wpunity_assepile_action',
            'gameId': my_ajax_object_assepile.id,
            'gameSlug': my_ajax_object_assepile.slug
        },
        success : function(data) {
            console.log("Ajax 1:" + data);
        },
        error : function(xhr, ajaxOptions, thrownError){
            console.log("Ajax 1: ERROR: " + thrownError);
        }
    });


    // ajax 2: Start monitoring with repeating interval

    var interval = 0;
    var start_time = new Date().getTime();

    interval = setInterval(function() {

        reqMonitor = jQuery.ajax({
            url : isAdmin=="back" ? 'admin-ajax.php' : my_ajax_object_assepile.ajax_url,
            type : 'POST',
            cache: false,
            timeout: 3600000, // 1 hour
            data: {'action': 'wpunity_monitor_compiling_action',
                    'dirpath': "../wp-content/plugins/wordpressunity3deditor/test_compiler/game_windows/"} , //my_ajax_object_assepile.id,
                    //'urlpath': "/wp-content/plugins/wordpressunity3deditor/test_compiler/game_windows/"  }, //my_ajax_object_assepile.slug},

            success : function(response){

                var jsonArr = JSON.parse(response);

                var procMonitor = jsonArr.CSV;
                var logfile = jsonArr.LOGFILE;

                var completedFlag = false;
                var successFlag = false;

                if (procMonitor.length === 0 || procMonitor.indexOf("No tasks are running") > 0){
                    completedFlag = true;
                    successFlag = response.indexOf("Exiting batchmode successfully now")>0;
                }

                if (!completedFlag) {

                    var counterLines = logfile.split(/\r\n|\r|\n/).length;

                    // document.getElementById("wpunity_compile_report1").innerHTML = "Log file:" + counterLines + " lines at " +
                    //     + (new Date().getTime() - start_time)/1000 + " seconds";

                    console.log("Ajax 2: Log file:" + counterLines + " lines at " + (new Date().getTime() - start_time)/1000 + " seconds");

                    //document.getElementById("wpunity_compile_game_stdoutlog_report").innerHTML = procMonitor + " " + logfile;

                } else {
                    //document.getElementById("wpunity_compile_report1").innerHTML = "Process completed, lasted: " + (new Date().getTime() - start_time)/1000 + " seconds";

                    console.log("Ajax 2: Process completed, lasted: " + (new Date().getTime() - start_time)/1000 + " seconds");

                    if (successFlag) {
                        //document.getElementById('wpunity_compileButton').innerHTML = "Compile";
                        //document.getElementById("wpunity_compile_report2").innerHTML = "and the result is Success.";

                        console.log("Ajax 2: Compile Result: Success");

                        // After success we start the Ajax
                        myzipajax();


                        clearInterval(interval);
                    } else {

                        console.log('Ajax 2 error:' + 'and the result is Error [15] : Compile error ' + logfile);

                        clearInterval(interval);

                        //document.getElementById("wpunity_compile_report2").innerHTML = 'and the result is Error [15] : Compile error ' + logfile;
                    }
                }

            },
            error : function(xhr, ajaxOptions, thrownError){
                // document.getElementById("wpunity_compile_report2").innerHTML = "and the result is Error [16] : HTML " + xhr.status + "<br />" +
                //     xhr.getAllResponseHeaders() + " " + thrownError;

                console.log("Ajax 2 error:" + "and the result is Error [16] : HTML " + xhr.status + " " + xhr.getAllResponseHeaders() + " " + thrownError);
                clearInterval(interval);

                //document.getElementById("wpunity_compile_game_stdoutlog_report").innerHTML = response;
            }
        });
    }, 1000);

    // Ajax 3: ZIP the game folder and provide link to download
    function myzipajax() {
        console.log("Ajax 3, Zipping all in game.zip ...");

        var dir_gamepath =  "../wp-content/plugins/wordpressunity3deditor/test_compiler/game_windows/"; // my_ajax_object_assepile.game_dirpath; // without filename

        // Get domain path, e.g. from http://127.0.0.1:8080/digiart-project_Jan17/wpunity-edit-project/?wpunity_game=1040  isolate
        // http://127.0.0.1:8080/digiart-project_Jan17/
        // The way is to get the substring without /wpunity-edit-project/?wpunity_game=1040  (until the prelast slash)

        var domain_path = window.location.href.substring(0, window.location.href.lastIndexOf('/'));
        domain_path = domain_path.substring(0,domain_path.lastIndexOf('/'));

        // now make the full url path
        var url_gameProject_path = domain_path + "/wp-content/plugins/wordpressunity3deditor/test_compiler/game_windows/"; //my_ajax_object_assepile.game_urlpath; // without index.html

        var reqCompile = jQuery.ajax({
            url : isAdmin=="back" ? 'admin-ajax.php' : my_ajax_object_assepile.ajax_url,
            type : 'POST',
            timeout: 1200000, // 20 min
            data : {'action': 'wpunity_game_zip_action',
                'dirpath': dir_gamepath},

            success : function(response){
                //document.getElementById('wpunity_zipgame_report').innerHTML = response;
                //document.getElementById('wpunity_zipgame_report').innerHTML = '<a href="'+ phpvarsA.game_urlpath + '/game.zip">Download game in a zip file </a>';

                console.log("Ajax 3: Success: ");
                console.log("Ajax 3: Success: response"+ response);
                console.log("Ajax 3: Success: Zip location: " + url_gameProject_path + '/game.zip' );

                // Check if index.html exists (because it is not always compiled for web)
                console.log("Ajax 3: Success: index.html location " + url_gameProject_path + '/builds/WebGLBuild/index.html' );

                jQuery( "#compileProgressSlider" ).hide();
                jQuery( "#compileProgressTitle" ).hide();
                jQuery("#platform-select").removeClass( "mdc-select--disabled" ).attr( "aria-disabled","false" );


            },
            error : function(xhr, ajaxOptions, thrownError){
                //document.getElementById('wpunity_zipgame_report').innerHTML = 'Zipping game: ERROR [17]! '+ thrownError;
                console.log("Ajax 3: Fail:" + "Zipping game: ERROR [17]! " + thrownError);
            }
        });
    }
}