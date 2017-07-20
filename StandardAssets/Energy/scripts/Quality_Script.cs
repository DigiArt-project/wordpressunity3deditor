using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;



public class Quality_Script : MonoBehaviour {

	bool isWindowed;
	int currResVal = 3;
	int currQualityVal = 2;
	Dropdown dropdown_resolution;
	Dropdown dropdown_quality;


	// Use this for initialization
	void Start () {
		isWindowed = Screen.fullScreen;
		GameObject.Find ("toggle_windowed").GetComponent<Toggle> ().isOn = !isWindowed;
		dropdown_resolution = GameObject.Find ("dropdown_resolution").GetComponent<Dropdown> ();
		dropdown_quality = GameObject.Find ("dropdown_quality").GetComponent<Dropdown> ();
	}
	
	// Update is called once per frame
	void Update () {}

	public void onQualityChange(){
		currQualityVal = dropdown_quality.value;
		Debug.Log (" Q Change: " + currQualityVal);
		QualitySettings.SetQualityLevel (currQualityVal);
	}



	public void onResolutionChange(){


		currResVal = dropdown_resolution.value;

		Debug.Log (" isWindowed Res Change: " + isWindowed + " valRes:" + currResVal);

		switch (currResVal) {
		case 0:
			Screen.SetResolution(1024, 768, isWindowed);
			break;	
		case 1:
			Screen.SetResolution(1280, 800, isWindowed);
			break;	
		case 2:
			Screen.SetResolution(1280, 1024, isWindowed);
			break;	
		case 3:
			Screen.SetResolution(1366, 768, isWindowed);
			break;	
		case 4:
			Screen.SetResolution(1440, 900, isWindowed);
			break;	
		case 5:
			Screen.SetResolution(1920, 1080, isWindowed);
			break;	
		case 6:
			//Screen.SetResolution(, , isWindowed);
			break;	
		}
	}

	public void onWindowedChange(){
		isWindowed = !GameObject.Find ("toggle_windowed").GetComponent<Toggle>().isOn;
		onResolutionChange ();
	}
}
