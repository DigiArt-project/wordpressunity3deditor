using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class all_menu_Script : MonoBehaviour {

	public void onClick_StartGame(){
		SceneManager.LoadScene("S1");
	}

	public void onClick_LoadCredsScene(){
		SceneManager.LoadScene("S_Credentials");
	}


	public void onClick_LoadMainMenuScene(){
		SceneManager.LoadScene("S_MainMenu");

	}

	public void onClick_ExitGame(){
		Application.Quit ();
	}
}
