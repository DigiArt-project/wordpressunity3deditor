<?php
	// start ensures that it is asynchronous called
	$output = shell_exec('start /b starter.bat /c');
	print_r($output);
?>




