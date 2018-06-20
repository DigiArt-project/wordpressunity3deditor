<?php


if (isset($_GET["game"])) {
    $gameFolder = $_GET["game"];
    $path = getcwd() . '\\' . $gameFolder;
}


if( $_GET["action"] == "unzip" ) {
    
    // Delete all previews
    if(file_exists($gameFolder))
        shell_exec("rmdir " . $gameFolder . " /s /q");
    
    if(!is_dir($gameFolder))
        mkdir($gameFolder);
    
    $zipFile = $_GET["game"].".zip";
    
    if( unzipGameProjectFolder($zipFile, $path) == true)
        echo "UNZIPPED";
    else
        echo "Error 1023: Unzip problem";
    
    // Remove zip file
    if (file_exists($zipFile))
        unlink($zipFile);
    
} else if ( $_GET["action"] == "start" ) {
    
    $pid = shell_exec("start /b ".$gameFolder."\starter_artificial.bat /c");
    
    echo $pid;
    
    return;
    
} else if ( $_GET["action"] == "stop" ) {
    
    $phpcomd = 'Taskkill /PID '.$_GET['pid'].' /F';
    $killres = shell_exec($phpcomd);
    
    echo $killres;
    
    return;
    
} else if ( $_GET["action"] == "monitor" ) {
    
    $stdoutPath = ltrim($path.DIRECTORY_SEPARATOR."stdout.log", '/');
    
    $stdoutSTR = file_get_contents($stdoutPath);
    
    $phpcomd = 'TASKLIST /FI "pid eq '.$_GET['pid'].'" /v /fo CSV';
    $processUnityCSV = shell_exec($phpcomd);
    echo json_encode(array('os'=> 'win', 'CSV' => $processUnityCSV , "LOGFILE"=>$stdoutSTR));
    
    return;
    
} else if ( $_GET["action"] == "zipbuild" ) {
    
    $DS = DIRECTORY_SEPARATOR;
    
    //$game_dirpath = $path; //realpath(dirname(__FILE__).'/..').$DS.'games_assemble'.$DS.'dune';
    
    $rootPath = $path . '\builds';
    $zip_file = $path . '\game.zip';
    
    // Initialize archive object
    $zip = new ZipArchive();
    $resZip = $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    
    if ($resZip === TRUE) {
        
        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        
        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                
                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }
        
        // Zip archive will be created only after closing object
        $zip->close();
        echo 'Zip successfully finished [2]';
        return;
    } else {
        echo 'Failed to zip, code:' . $resZip;
        return;
    }
    
}


function unzipGameProjectFolder($file, $path){
    
    /**
     * Unzip File in the same directory.
     * @link http://stackoverflow.com/questions/8889025/unzip-a-file-with-php
     */
    // $file = 'file.zip';
    // $pathToDecompress = realpath( $file );
    // $path = pathinfo( $pathToDecompress, PATHINFO_DIRNAME )."/Deco";
    
    $zip = new ZipArchive();
    $res = $zip->open($file);
    if ($res === TRUE) {
        
        $zip->extractTo( $path );
        $zip->close();
        
        //return $path;
        return true;
    }
    else {
        return "Error 788: Can not unzip";
    }
}
