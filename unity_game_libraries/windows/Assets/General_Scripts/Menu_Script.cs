using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class Menu_Script : MonoBehaviour {

	public bool ovrMode;
	public bool occulusControllerUse;
	public float occulusHeight;

	public string doorID = "";

	void Awake(){
		DontDestroyOnLoad(this);

		ovrMode = false;
		occulusControllerUse = false;
		occulusHeight = 1;

		if (FindObjectsOfType(GetType()).Length > 1)
			Destroy(gameObject);
	}

	public void onClick_StartGame(){
		gameObject.GetComponent<Canvas> ().enabled = false;
		SceneManager.LoadScene("___[initialwonderaround_scene_basename]___");
	}

	public void onClick_LoadCredsScene(){
		gameObject.GetComponent<Canvas> ().enabled = false;
		SceneManager.LoadScene("___[credentials_scene_basename]___");
	}

	public void onClick_LoadMainMenuScene(){
		SceneManager.LoadScene("___[mainmenu_scene_basename]___");
		gameObject.GetComponent<Canvas> ().enabled = true;
	}

	public void onClick_Options(){
		gameObject.GetComponent<Canvas> ().enabled = false;
		SceneManager.LoadScene("___[options_scene_basename]___");
	}

	public void onClick_ExitGame(){
		Application.Quit ();
	}
}