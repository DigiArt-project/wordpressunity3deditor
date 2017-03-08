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
		SceneManager.LoadScene("S1");
	}

	public void onClick_LoadCredsScene(){
		gameObject.GetComponent<Canvas> ().enabled = false;
		SceneManager.LoadScene("S_Credentials");
	}

	public void onClick_LoadMainMenuScene(){
		SceneManager.LoadScene("S_MainMenu");
		gameObject.GetComponent<Canvas> ().enabled = true;

		Debug.Log ("MM occulusHeight:" + occulusHeight);
	}

	public void onClick_ExitGame(){
		Application.Quit ();
	}

	public void onClick_Options(){
		gameObject.GetComponent<Canvas> ().enabled = false;
		SceneManager.LoadScene("S_Options");
	}
}