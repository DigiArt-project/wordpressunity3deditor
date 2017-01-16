// AJAX NO 1: COMPILE BUTTON

// handles the click event for link 1, sends the query
function wpunity_compileAjax() {

    document.getElementById('wpunity_compileButton').innerHTML = "Compiling ...";

    var phpToExec = phpvars.PHP_OS.toUpperCase().substr(0, 3) === 'WIN'? 'exec_windows.php' : 'exec_linux.php';

    console.log(phpvars.pluginsUrl + '/wordpressunity3deditor/includes/game_compile_phps/'+phpToExec+'?game_dirpath='+phpvars.game_dirpath);

    getRequestCompile(
            phpvars.pluginsUrl + '/wordpressunity3deditor/includes/game_compile_phps/'+phpToExec+'?game_dirpath='+phpvars.game_dirpath, // URL for the PHP file
            drawOutputCompile,  // handle successful request
            drawErrorCompile    // handle error
    );

    return false;
}

// handles drawing an error message
function drawErrorCompile() {
    document.getElementById('wpunity_compileButton').innerHTML = 'error: Compile again?';
}

// handles the response, adds the html
function drawOutputCompile(responseText) {
    document.getElementById('wpunity_compileButton').innerHTML = responseText;
}

// helper function for cross-browser request object
function getRequestCompile(url, success, error) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(req.readyState == 4) {
            document.getElementById('wpunity_compileButton').innerHTML = "Compile" ;

            periodicalCheckCompilingStatus();

            //success(req.responseText) : error(req.status);
        }
    }
    req.open("GET", url, true);
    req.send(null);
    return req;
}



// AJAX NO 2: Periodically check stdout.log file of Unity to see if we have finished
function periodicalCheckCompilingStatus(){
    document.getElementById("wpunity_compile_report1").innerHTML = "-1";
    document.getElementById("wpunity_compile_report2").innerHTML = "Trying to compile the game";

    // Constantly monitor the stdout.log file
    var previousText = "";
    var counterCharsPrevious = 0;
    var interval = 0;

    var start_time = new Date().getTime();

    interval = setInterval(function() {
        var ajax = new XMLHttpRequest();

        ajax.onreadystatechange = function() {
            console.log("onread" + ajax.readyState);
            if (ajax.readyState == 4) {
                if (ajax.responseText.length != counterCharsPrevious) {

                    counterChars = ajax.responseText.length;
                    document.getElementById("wpunity_compile_report1").innerHTML = counterChars + " lines";

                    counterCharsPrevious = ajax.responseText.length;
                } else {
                    document.getElementById("wpunity_compile_report1").innerHTML = "Compiling completed,"; //lasted: " + (new Date().getTime() - start_time)/1000 + " seconds";

                    if (ajax.responseText.indexOf("Exiting batchmode successfully now!")>0){
                        document.getElementById("wpunity_compile_report2").innerHTML = "and the result is Success.";
                        clearInterval(interval);
                        myzipajax();

                    } else {

                        clearInterval(interval);
                        document.getElementById("wpunity_compile_report2").innerHTML = "and the result is Error [15] : HTML " + ajax.status;
                    }

                }
            }
        };

        ajax.open("POST", phpvars.pluginsUrl + '/wordpressunity3deditor/test_compiler/game_windows/stdout.log', true); //Use POST to avoid caching
        ajax.send();
    }, 1000);
}



// AJAX NO 3: ZIP all and provide link to download

// handles the click event for link 1, sends the query
function myzipajax() {

    document.getElementById('wpunity_zipgame_report').innerHTML = "Zipping all in game.zip ...";

    var buildsfolder = phpvars.game_dirpath+'\\builds';
    var zipfile = phpvars.game_dirpath+'\\game.zip';

    document.getElementById('wpunity_zipgame_report').innerHTML = buildsfolder + " " + zipfile;

    getRequestZip(
        phpvars.pluginsUrl + '/wordpressunity3deditor/includes/game_compile_phps/game_zipper.php?buildsfolder='+buildsfolder+'&zipfile='+zipfile, // URL for the PHP file
        drawOutputZip,  // handle successful request
        drawErrorZip    // handle error
    );
    return false;
}

function drawErrorZip() {
    document.getElementById('wpunity_zipgame_report').innerHTML = 'Zipping game: there was an error!';
}

function drawOutputZip(responseText) {
    document.getElementById('wpunity_zipgame_report').innerHTML = responseText;
}

// helper function for cross-browser request object
function getRequestZip(url, success, error) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(req.readyState == 4) {
            document.getElementById('wpunity_zipgame_report').innerHTML = '<a href="'+phpvars.pluginsUrl +
                '/wordpressunity3deditor/test_compiler/game_windows/game.zip">Download game in a zip file </a>';
            //success(req.responseText) : error(req.status);
        }
    }
    req.open("GET", url, true);
    req.send(null);
    return req;
}
