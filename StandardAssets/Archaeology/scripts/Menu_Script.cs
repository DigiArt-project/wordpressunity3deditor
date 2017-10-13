using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class Menu_Script : MonoBehaviour {

	// Oculus
//	public bool ovrMode;
//	public bool occulusControllerUse;
//	public float occulusHeight;
	// end Oculus

	public string doorID = "";

	void Awake(){
		// Oculus
//		DontDestroyOnLoad(this);
//
//		ovrMode = false;
//		occulusControllerUse = false;
//		occulusHeight = 1;
//
//		if (FindObjectsOfType(GetType()).Length > 1)
//			Destroy(gameObject);

		// End oculus
	}

//	public void onClick_StartGame(){
//		gameObject.GetComponent<Canvas> ().enabled = false;
//		SceneManager.LoadScene("S1");
//	}
//
//	public void onClick_LoadCredsScene(){
//		gameObject.GetComponent<Canvas> ().enabled = false;
//		SceneManager.LoadScene("S_Credits");
//	}
//
//	public void onClick_LoadMainMenuScene(){
//		SceneManager.LoadScene("S_MainMenu");
//		gameObject.GetComponent<Canvas> ().enabled = true;
//	}
//
//	public void onClick_Options(){
//		gameObject.GetComponent<Canvas> ().enabled = false;
//		SceneManager.LoadScene("S_Options");
//	}


	public void onClick_LoadScene(string sceneToLoad){
		SceneManager.LoadScene(sceneToLoad);
		//gameObject.GetComponent<Canvas> ().enabled = true;
	}

	public void onClick_ExitGame(){
		Application.Quit ();
	}
}