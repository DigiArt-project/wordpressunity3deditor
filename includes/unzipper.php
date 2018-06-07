<?php

echo $_GET["game"];

$gameFolder = $_GET["game"]."Unity";
$zipFile = $_GET["game"]."Unity.zip";


$pathToDecompress = realpath( $zipFile );
$path = pathinfo( $pathToDecompress, PATHINFO_DIRNAME ).'\\'.$gameFolder;

if(!is_dir($gameFolder))
    mkdir($gameFolder);

if( unzipGameProjectFolder($zipFile, $path) )
    echo "UNZIPPED";
else
    echo "Error 1023: Unzip problem";




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
        //echo "WOOT! $file extracted to $path";
        return true;
    }
    else {
        return "Error 788: Can not unzip";
    }
}
