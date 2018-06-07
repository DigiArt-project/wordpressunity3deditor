<?php


$gameFolder = $_GET["game"] . "Unity";

if( $_GET["action"] == "unzip" ) {
    
    $zipFile = $_GET["game"] . "Unity.zip";
    
    $pathToDecompress = realpath( $zipFile );
    $path = pathinfo( $pathToDecompress, PATHINFO_DIRNAME ).'/'.$gameFolder;
    
    if(!is_dir($gameFolder))
        mkdir($gameFolder);
    
    
    if( unzipGameProjectFolder($zipFile, $path) == true)
        echo "UNZIPPED";
    else
        echo "Error 1023: Unzip problem";
        
} else if ( $_GET["action"] == "start" ) {

    echo "S1";
    
    exec("start /b ".$gameFolder."/starter_artificial.bat /c");
    
    echo "S2";
    return "aaa";
    
} else if ( $_GET["action"] == "stop" ) {


} else if ( $_GET["action"] == "monitor" ) {

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
