using UnityEngine;
using UnityEditor;
using System.IO;
using System;

class OBJImportSettings : AssetPostprocessor
{
   void OnPreprocessModel(){
		ModelImporter modImport = assetImporter as ModelImporter;

		if (modImport.assetPath.Contains ("Colliders"))
			modImport.addCollider = true;

		if (modImport.assetPath.Contains ("NoOptimization"))
			modImport.optimizeMesh = false;
	}

	void OnPreprocessTexture()
	{
		TextureImporter textureImporter = (TextureImporter)assetImporter;
		if (assetPath.Contains ("_hdpi")) {
			textureImporter.compressionQuality = 100;
			textureImporter.textureCompression = TextureImporterCompression.CompressedHQ;
			textureImporter.maxTextureSize = 8192;
		} else if (assetPath.Contains ("_ndpi")) {
			textureImporter.compressionQuality = 95;
			textureImporter.textureCompression = TextureImporterCompression.Compressed;
			textureImporter.maxTextureSize = 2048;
		} else if (assetPath.Contains ("_ldpi")) {
			textureImporter.compressionQuality = 90;
			textureImporter.textureCompression = TextureImporterCompression.CompressedLQ;
			textureImporter.maxTextureSize = 256;
		}
	}

	static void OnPostprocessAllAssets(string[] importedAssets, string[] deletedAssets, string[] movedAssets, string[] movedFromAssetPaths){
		string[] assetPaths = AssetDatabase.GetAllAssetPaths();
		foreach (string path in assetPaths)
		{
			if (path.Contains ("NoGlossy")) {
				Material mat = AssetDatabase.LoadAssetAtPath(path, typeof(Material)) as Material;
				mat.SetFloat ("_Glossiness", 0);
			}
		}
	}
}