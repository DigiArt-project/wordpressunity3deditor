using UnityEditor;
class WebGLBuilder {
static void build() {


        string[] scenes = { // AddScenesHere 
            "Assets/MyScene_SceneFolder/MyScene_Scene.unity",
            "Assets/MyScene2_SceneFolder/MyScene2_Scene.unity"};
        
        string pathToDeploy = "builds/WebGLversion/";		
                
        BuildPipeline.BuildPlayer(scenes, pathToDeploy, BuildTarget.WebGL, BuildOptions.None);
    }
}