using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;
using goedle_sdk;

public class Menu_Script : MonoBehaviour {
	
	private string playerName;
	private string playerSurname;
	private string playerSchoolName;


	public void onClick_LoadScene(string sceneName){
		SceneManager.LoadScene(sceneName);
	}

	public void onClick_LoadCredsScene(){
		SceneManager.LoadScene("S_Credits");
	}

	public void onClick_LoadSceneSelectorScene(){
		SceneManager.LoadScene("S_SceneSelector");
	}

	public void onClick_LoadMainMenuScene(){
		SceneManager.LoadScene("S_MainMenu");
	}

	public void onClick_LoadSettingsScene(){
		SceneManager.LoadScene("S_Settings");
	}
	
	public void onClick_LoadLoginScene(){
		SceneManager.LoadScene("S_Login");
	}


	public void onClick_LoadHelpScene(){
		SceneManager.LoadScene("S_Help");
	}
	

	public void onClick_ExitGame(){
		Application.Quit ();
	}


	/*//////////////////////
	 Inputfield functions 
	//////////////////////*/

	public void NameEntered(string text){
		playerName = text;
		GoedleAnalytics.identify ("first_name", playerName);
		//TODO: "http" call can be entered here to retrieve the value.
	}
	public void SurnameEntered(string text){
		playerSurname = text;
		GoedleAnalytics.identify ("last_name", playerSurname);
		//TODO: "http" call can be entered here to retrieve the value.
	}
	public void SchoolNameEntered(string text){
		playerSchoolName = text;
		GoedleAnalytics.track ("group", "school", playerSchoolName);
		//TODO: "http" call can be entered here to retrieve the value.
	}

	public void InputFieldsFilled(){
		if(playerName != null && playerSurname != null && playerSchoolName != null){

		}
		else {

		}
	}




}