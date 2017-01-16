

<?php 
    error_reporting( E_ALL );

	// nohup     '/dev ...' ensures that it is asynchronous called
	$output = shell_exec('nohup sh starter.sh'.'> /dev/null 2>/dev/null &');
	print_r($output);
	print_r(error_get_last());

?>




