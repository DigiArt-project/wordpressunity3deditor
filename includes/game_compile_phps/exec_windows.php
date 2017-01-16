<?php

	$game_dirpath = $_GET['game_dirpath'];

	// 1 : Generate bat
	$myfile = fopen("starter_artificial.bat", "w") or die("Unable to open file!");
	$txt = '"C:\Program Files\Unity\Editor\Unity.exe" -quit -batchmode -logFile '.$game_dirpath.'\stdout.log -projectPath '. $game_dirpath .' -buildWindowsPlayer "builds\mygame.exe"';
	fwrite($myfile, $txt);
	fclose($myfile);

	// 2: run bat
	$output = shell_exec('start /b starter_artificial.bat /c');
	print_r($output);

?>




