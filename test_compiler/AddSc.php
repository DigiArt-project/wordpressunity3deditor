<?php


wpunity_add_scenes_in_EditorBuildSettings_dot_asset("EditorBuildSettings.Asset", "Assets/scenes/S_Settings.unity");

// -- ASSEMBLY 1: Append scene paths in EditorBuildSettings.asset file --
// $filepath : The path of the already written EditorBuildSettings.asset file
// $scenepath : The scene to add as path : "Assets/scenes/S_Settings.unity"
function wpunity_add_scenes_in_EditorBuildSettings_dot_asset($filepath, $scenepath){

    //a. open file for append
    $fhandle = fopen($filepath, "a");

    //b. create what to append
    $newcontent = "  - enabled: 1".chr(10)."    path: ".$scenepath.chr(10);

    //c. append and close
    fwrite($fhandle, $newcontent);
    fclose($fhandle);

    //d. read test
    //    $fhandle = fopen($filepath, "r");
    //    echo fread($fhandle, filesize($filepath));
}




?>