// AJAX NO 1: COMPILE BUTTON
//var os_dependend_var = phpvars.PHP_OS.toUpperCase().substr(0, 3) === 'WIN'? 1:4;

// handles the click event for link 1, sends the query
function wpunity_segmentObjAjax() {

    document.getElementById('wpunity_segmentButton').innerHTML = "Segmenting ...";
    document.getElementById("wpunity-segmentation-report").innerHTML = "...";
    document.getElementById("wpunity-segmentation-status").innerHTML = "-1";
    document.getElementById("wpunity-segmentation-log").innerHTML = "Trying to segment the obj ...";

    //  AJAX 1: Send the segmentation command.
    jQuery.ajax({
        url : 'admin-ajax.php',
        type : 'POST',
        data : {'action': 'wpunity_segment_obj_action'},
        success : function(response){
            document.getElementById('wpunity_segmentButton').innerHTML = "Success.";
            enlistObjs();
        },
        error : function(xhr, ajaxOptions, thrownError){
            document.getElementById('wpunity_segmentButton').innerHTML = 'Error: Segment again?';
        }
    });

    // AJAX NO 2: Periodically check log file
    // Constantly monitor the stdout.log file
    var counterLinesPrevious = 0;
    var interval = 0;
    var start_time = new Date().getTime();

    interval = setInterval(function() {
        reqMonitor = jQuery.ajax({
            url : 'admin-ajax.php',
            type : 'POST',
            cache: false,
            data: {'action': 'wpunity_monitor_segment_obj_action'},
            success : function(response){
                console.log("onread log file: " + response.length);

                var counterLines = response.split(/\r\n|\r|\n/).length;

                if (counterLines != counterLinesPrevious) {
                    counterLinesPrevious = counterLines;

                    document.getElementById("wpunity-segmentation-report").innerHTML = "Log file:" + counterLinesPrevious + " lines";
                    document.getElementById("wpunity-segmentation-log").innerHTML = response;
                } else {
                    clearInterval(interval);

                    document.getElementById("wpunity-segmentation-report").innerHTML = "Segmentation completed, lasted: " + (new Date().getTime() - start_time)/1000 + " seconds";

                    if (response.indexOf("Completed successfully")>0){
                        document.getElementById("wpunity-segmentation-status").innerHTML = "and the result is Success.";
                        clearInterval(interval);
                    } else {
                        document.getElementById("wpunity-segmentation-status").innerHTML = 'and the result is Error [125] : Segmentation error ' + response;
                    }

                    document.getElementById("wpunity-segmentation-report").innerHTML = response;
                }
            },
            error : function(xhr, ajaxOptions, thrownError){
                document.getElementById("wpunity-segmentation-log").innerHTML = "and the result is Error [161] : HTML " + xhr.status + "<br />" +
                    xhr.getAllResponseHeaders() + " " + thrownError;

                document.getElementById("wpunity-segmentation-report").innerHTML = response;
            }
        });
    }, 2000);
}


// AJAX NO 3: ZIP all and provide link to download
function myzipajax() {


    jQuery.ajax({
        url : 'admin-ajax.php',
        type : 'POST',
        data : {'action': 'wpunity_enlist_splitted_objs_action'},
        success : function(response){

            document.getElementById('wpunity-segmentation-report').innerHTML = response;
        },
        error : function(xhr, ajaxOptions, thrownError){
            document.getElementById('wpunity-segmentation-report').innerHTML = 'Zipping game: ERROR [171]! '+ thrownError;
        }
    });
}