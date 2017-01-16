

<?php 
    error_reporting( E_ALL );

	// start ensures that it is asynchronous called
	$output = shell_exec('start /b starter.bat /c');
	print_r($output);
	print_r(error_get_last());

?>




