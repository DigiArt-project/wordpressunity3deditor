using UnityEngine;
using UnityEditor;
using System.IO;
using System;

class GeneralImportSettings : AssetPostprocessor
{
    void OnPreprocessModel()
    {
        ModelImporter modImport = assetImporter as ModelImporter;

        if (modImport.assetPath.Contains("Colliders"))
            modImport.addCollider = true;

        if (modImport.assetPath.Contains("NoOptimization"))
            modImport.optimizeMesh = false;

        if (modImport.assetPath.Contains(".obj"))
        {
            modImport.importMaterials = true;
            modImport.materialLocation = 0;
            //Debug.Log("PP:" + modImport.assetPath);
            //string[] linesBefore = System.IO.File.ReadAllLines(modImport.assetPath + ".meta");
            //System.IO.File.Delete(modImport.assetPath + ".meta");
            //Debug.Log("MM:" + linesBefore[1]);
        }
    }

    void OnPreprocessTexture()
    {
        TextureImporter textureImporter = (TextureImporter)assetImporter;
        if (assetPath.Contains("_hdpi"))
        {
            textureImporter.filterMode = FilterMode.Point;
            textureImporter.maxTextureSize = 8192;
            textureImporter.textureFormat = TextureImporterFormat.RGB24;
            textureImporter.textureCompression = TextureImporterCompression.Uncompressed;
        }
        else if (assetPath.Contains("_ndpi"))
        {
            textureImporter.compressionQuality = 95;
            textureImporter.textureCompression = TextureImporterCompression.Compressed;
            textureImporter.maxTextureSize = 2048;
        }
        else if (assetPath.Contains("_ldpi"))
        {
            textureImporter.compressionQuality = 90;
            textureImporter.textureCompression = TextureImporterCompression.CompressedLQ;
            textureImporter.maxTextureSize = 256;
        }

        if (assetPath.Contains("_sprite"))
        {
            textureImporter.textureType = TextureImporterType.Sprite;
            textureImporter.spriteImportMode = SpriteImportMode.Single;
        }
    }

    static void OnPostprocessAllAssets(string[] importedAssets, string[] deletedAssets, string[] movedAssets, string[] movedFromAssetPaths)
    {
        string[] assetPaths = AssetDatabase.GetAllAssetPaths();
        foreach (string path in assetPaths)
        {

            Material mat = AssetDatabase.LoadAssetAtPath(path, typeof(Material)) as Material;
            if (mat)
            {
                // Basic material (no shadows)
                mat.shader = Shader.Find("Unlit/Texture");

                if (path.Contains("NoGlossy"))
                {
                    mat.SetFloat("_Glossiness", 0);
                }
                else if (path.Contains("TwoSided"))
                {
                    mat.shader = Shader.Find("Standard (Two Sided)");
                }
                else if (path.Contains("Transparent"))
                {
                       mat.shader = Shader.Find("Standard");

                       // Rendering mode : Fade
                       mat.EnableKeyword("_Mode");
                       mat.SetFloat("_Mode", 2);
                       mat.SetFloat("_Glossiness", 0);



                       mat.SetInt("_ZWrite", 1);
                       mat.EnableKeyword("_ALPHATEST_ON");
                       mat.DisableKeyword("_ALPHABLEND_ON");
                       mat.EnableKeyword("_ALPHAPREMULTIPLY_ON");

                       mat.enableInstancing = true;
                }
            }

            //Sprite sprite = AssetDatabase.LoadAssetAtPath<Sprite>(path);
            //if (sprite)
            //    Debug.Log(sprite);
        }
    }
}