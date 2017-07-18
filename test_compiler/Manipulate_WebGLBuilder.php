<?php

wpunity_createEmpty_WebGLBuilder_cs('WebGLBuilder.cs');
wpunity_add_scenes_in_WebGLBuilder_cs('WebGLBuilder.cs', 'Assets/scenes/S_MainMenu.unity');

/* Create an empty WebGLBuilder.cs in a certain $filepath */
function wpunity_createEmpty_WebGLBuilder_cs($filepath){

    $handle = fopen($filepath, 'w');

    $content = 'using UnityEditor;
class WebGLBuilder {
    static void build() {
    
            string[] scenes = {}; 
            
            string pathToDeploy = "builds/WebGLversion/";		
                    
            BuildPipeline.BuildPlayer(scenes, pathToDeploy, BuildTarget.WebGL, BuildOptions.None);
        }
    }';

    fwrite($handle, $content);
    fclose($handle);
}


// Add to string[] scenes the   $scenepath : "Assets/scenes/S_SceneSelector.unity"
function wpunity_add_scenes_in_WebGLBuilder_cs($filepath, $scenepath){

    // Clear previous size of filepath
    clearstatcache();

    // a. Read
    $handle = fopen($filepath, 'r');
    $content = fread($handle, filesize($filepath));
    fclose($handle);

    // b. Extend certain string
    $content = str_replace('};', ','.chr(10).'            "'.$scenepath.'"};', $content);

    // first comma remove
    $content = str_replace('{,','{', $content);

    // c. Write to old
    $fhandle = fopen($filepath, 'w');

    fwrite($fhandle, $content, strlen($content));
    fclose($fhandle);

    //  d. Read for testing
//    $handle = fopen($filepath, 'r');
//    echo fread($handle, strlen($content));
//    fclose($handle);
}



?>