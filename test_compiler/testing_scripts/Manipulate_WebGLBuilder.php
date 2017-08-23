<?php

wpunity_createEmpty_WebGLBuilder_cs('WebGLBuilder.cs');
wpunity_add_in_WebGLBuilder_cs('WebGLBuilder.cs',null, 'Assets/scenes/S_MainMenu.unity');
wpunity_add_in_WebGLBuilder_cs('WebGLBuilder.cs',null, 'Assets/scenes/S_2.unity');
wpunity_add_in_WebGLBuilder_cs('WebGLBuilder.cs',null, 'Assets/scenes/S_3.unity');

wpunity_add_in_WebGLBuilder_cs('WebGLBuilder.cs',"Assets/models/building1/building1.obj", null);
wpunity_add_in_WebGLBuilder_cs('WebGLBuilder.cs',"Assets/models/building1/building2.obj", null);



/* Create an empty WebGLBuilder.cs in a certain $filepath */
function wpunity_createEmpty_WebGLBuilder_cs($filepath){

    $handle = fopen($filepath, 'w');

    $content = 'using UnityEditor;
class WebGLBuilder {
static void build() {

        // AddAssetsToImportHere

        string[] scenes = { // AddScenesHere
}; 
        
        string pathToDeploy = "builds/WebGLversion/";		
                
        BuildPipeline.BuildPlayer(scenes, pathToDeploy, BuildTarget.WebGL, BuildOptions.None);
    }
}';



    fwrite($handle, $content);
    fclose($handle);
}


// Add  assets (obj) for import
//    $assetpath = "Assets/models/building1/building1.obj"
// or scenes for compile
//    $scenepath = "Assets/scenes/S_SceneSelector.unity"
// to
//    WebGLBuilder.cs
function wpunity_add_in_WebGLBuilder_cs($filepath, $assetpath, $scenepath){

    $LF = chr(10); // line change

    if ($assetpath){
        //add assets (obj)

        // Clear previous size of filepath
        clearstatcache();

        // a. Read
        $handle = fopen($filepath, 'r');
        $content = fread($handle, filesize($filepath));
        fclose($handle);

        // b. add obj
        $content = str_replace('// AddAssetsToImportHere','// AddAssetsToImportHere'.$LF.
            '          AssetDatabase.ImportAsset("'.$assetpath.'", ImportAssetOptions.Default);', $content
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


    if ($scenepath){

        // Clear previous size of filepath
        clearstatcache();

        // a. Read
        $handle = fopen($filepath, 'r');
        $content = fread($handle, filesize($filepath));
        fclose($handle);

        // b. Extend certain string
        $content = str_replace('// AddScenesHere', '// AddScenesHere '.chr(10).'            "'.$scenepath.'",', $content);

        // first comma remove
        $content = str_replace(','.chr(10).'}','}', $content);

        // c. Write to old
        $fhandle = fopen($filepath, 'w');

        fwrite($fhandle, $content, strlen($content));
        fclose($fhandle);

        //  d. Read for testing
        //    $handle = fopen($filepath, 'r');
        //    echo fread($handle, strlen($content));
        //    fclose($handle);
    }
}


?>