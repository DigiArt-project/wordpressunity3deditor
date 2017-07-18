<?php

wpunity_make_AssetsImporter_cs('AssetsImporter.cs');
wpunity_add_objs_to_AssetsImporter_cs('AssetsImporter.cs',"Assets/models/building1/building1.obj" );
wpunity_add_objs_to_AssetsImporter_cs('AssetsImporter.cs',"Assets/models/building1/building2.obj" );

// Write the empty AssetsImporter.cs to $filepath
function wpunity_make_AssetsImporter_cs($filepath){

    // line break character
    $LF = chr(10);
    $content = "using UnityEditor".$LF."   class AssetsImporter {".$LF."	   static void build() {".$LF.
        "		 // replace_this_with_content".$LF."	   }".$LF."}";


    $handle = fopen($filepath, 'w');
    fwrite($handle, $content, strlen($content));
    fclose($handle);
}

// Add to AssetsImporter.cs (in filepath location) the objpath: "Assets/models/building1/building1.obj"
function wpunity_add_objs_to_AssetsImporter_cs($filepath, $objpath){

    // line break character
    $LF = chr(10);

    // Clear previous size of filepath
    clearstatcache();
    
    // a. read content
    $handle = fopen($filepath, 'r');
    $content = fread($handle, filesize($filepath));
    fclose($handle);

    // b. add obj
    $content = str_replace('// replace_this_with_content','// replace_this_with_content'.$LF.
        '          AssetDatabase.ImportAsset("'.$objpath.'", ImportAssetOptions.Default);', $content
    );

    // c. Write to file
    $fhandle = fopen($filepath, 'w');
    fwrite($fhandle, $content, strlen($content));
    fclose($fhandle);

//    // d. Read for testing
//    clearstatcache();
//    $handle = fopen($filepath, 'r');
//    echo fread($handle, filesize($filepath));
//    fclose($handle);
}


?>