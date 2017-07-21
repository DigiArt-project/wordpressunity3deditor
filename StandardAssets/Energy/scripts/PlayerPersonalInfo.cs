using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using goedle_sdk;

// A script that is only used in the inputScene to retrieve the personal information of the user.
public class PlayerPersonalInfo : MonoBehaviour {

	private string playerName;
	private string playerSurname;
	private string playerSchoolName;
	//public LevelManager levelMng;
	public Text msgText; // text that informs the user to enter personal info, if there are left empty.


	void Start(){
		msgText.enabled = false;
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

//	public void InputFieldsFilled(){
//		if(playerName != null && playerSurname != null && playerSchoolName != null){
//			levelMng.LoadNextLevel();
//		}
//		else {
//			msgText.enabled = true;
//		}
//	}
}
