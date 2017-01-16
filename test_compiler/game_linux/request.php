
<html>
<body>

	<div id="compileButton" onclick="compileAjax()" style="background-color: #4CAF50;border: none;color: white;
    padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;
    cursor: pointer;">Compile</div>

	<div id="reporto"></div>
	<div id="reporto2"></div>
	<div id="zipOutput"></div>

	<!-- 3 AJAXes to implement 1. Compile, 2. PeriodicalCheck stdout.log, and 3. Zip all in one file -->

	<!-- AJAX NO 1: COMPILE BUTTON -->
	<script type="text/javascript">
		// handles the click event for link 1, sends the query
		function compileAjax() {

     			document.getElementById('compileButton').innerHTML = "Compiling ...";

			getRequestCompile(
			      'exec_linux.php', // URL for the PHP file
			       drawOutputCompile,  // handle successful request
			       drawErrorCompile    // handle error
			  );

			  return false;
		} 
 
		// handles drawing an error message
		function drawErrorCompile() {
		    document.getElementById('compileButton').innerHTML = 'error: Compile again?';
		}

		// handles the response, adds the html
		function drawOutputCompile(responseText) {
		    document.getElementById('compileButton').innerHTML = responseText;
		}

		// helper function for cross-browser request object
		function getRequestCompile(url, success, error) {
		    var req = new XMLHttpRequest();
		    req.onreadystatechange = function(){
			if(req.readyState == 4) {
				document.getElementById('compileButton').innerHTML = "Compile" ;

				periodicalCheckCompilingStatus();	

				//success(req.responseText) : error(req.status);
			}
		    }
		    req.open("GET", url, true);
		    req.send(null);
		    return req;
		}
	</script>


	<!-- AJAX NO 2: Periodically check stdout.log file of Unity to see if we have finished -->
	<script type="text/javascript">
	    function periodicalCheckCompilingStatus(){			
		document.getElementById("reporto").innerHTML = "-1";
		document.getElementById("reporto2").innerHTML = "Trying to compile the game";

		// Constantly monitor the stdout.log file 
		var previousText = "";
		var counterCharsPrevious = 0;
		var interval = 0;


		var start_time = new Date().getTime();

		interval = setInterval(function() {
		    var ajax = new XMLHttpRequest();
		    
		    ajax.onreadystatechange = function() {
			if (ajax.readyState > 0 ) {
			    if (ajax.responseText.length != counterCharsPrevious) {

				counterChars = ajax.responseText.length;
				document.getElementById("reporto").innerHTML = counterChars + " lines";

				counterCharsPrevious = ajax.responseText.length;
			    } else {
				document.getElementById("reporto").innerHTML = "Compiling lasted: " + (new Date().getTime() - start_time)/1000 + " seconds";

				if (ajax.responseText.indexOf("Exiting batchmode successfully now!")>0){
					document.getElementById("reporto2").innerHTML = "and the result is Success.";
					clearInterval(interval);
					myzipajax();

				} else {

					clearInterval(interval);
					document.getElementById("reporto2").innerHTML = "and the result is Error [15] : HTML " + ajax.status;


				}
	


		       	    }
			}
		    };

		    ajax.open("POST", "stdout.log", true); //Use POST to avoid caching
		    ajax.send();
		}, 1000);
	     }	
	</script>


	<!-- AJAX NO 3: ZIP all and provide link to download -->
	<script type="text/javascript">
		// handles the click event for link 1, sends the query
		function myzipajax() {

		  document.getElementById('zipOutput').innerHTML = "Zipping all in game.zip ...";

		  getRequestZip(
		      'game_zipper.php', // URL for the PHP file
		       drawOutputZip,  // handle successful request
		       drawErrorZip    // handle error
		  );
		  return false;
		} 
 
		function drawErrorZip() {
		    document.getElementById('zipOutput').innerHTML = 'Zipping game: there was an error!';
		}

		function drawOutputZip(responseText) {
		    document.getElementById('zipOutput').innerHTML = responseText;
		}

		// helper function for cross-browser request object
		function getRequestZip(url, success, error) {
		    var req = new XMLHttpRequest();
		    req.onreadystatechange = function(){
			if(req.readyState == 4) {
				document.getElementById('zipOutput').innerHTML = "<a href='game.zip'>Download game in a zip file </a>";
				//success(req.responseText) : error(req.status);
			}
		    }
		    req.open("GET", url, true);
		    req.send(null);
		    return req;
		}
	</script>




</body>
</html>
