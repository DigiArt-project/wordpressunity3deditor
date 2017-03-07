using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class SceneManager_Script : MonoBehaviour 
{	
	private Camera camera;
	Menu_Script ms;

	// handle doors transition
	void Start()
	{
		// Retrieve OVR mode setting ms.ovrMode
		ms = GameObject.Find ("mainCanvas").GetComponent<Menu_Script> ();

		// Zoom: find camera 
		camera = ms.ovrMode ? GameObject.Find ("CenterEyeAnchor").GetComponent<Camera> () : GameObject.Find ("FirstPersonCharacter").GetComponent<Camera> ();

		// set some settings
		if (ms.ovrMode) {
			GameObject.Find ("Player").SetActive (false);
		} else {
			// not many AudioListeners
			GameObject.Find ("CenterEyeAnchor").GetComponent<AudioListener>().enabled = false;
		}


		// Retrieve door coming in object 
		GameObject doorComingIn = GameObject.Find(ms.doorID);

		// executed when transports from one wonder scene to another (not from main menu to scene 1)
		if (doorComingIn) {
			GameObject doorComingIn_anchor = doorComingIn.transform.Find("door_anchor").gameObject ;
			GameObject player = ms.ovrMode ? GameObject.Find ("OVRPlayer") : GameObject.Find ("Player");
			player.transform.position = doorComingIn_anchor.transform.position;
			player.transform.rotation = doorComingIn_anchor.transform.rotation;
		}

		if (ms.ovrMode) 
			GameObject.Find ("TrackingSpace").transform.Translate (0,ms.occulusHeight, 0);
	}


	void Update(){
		
		// Scroll wheel zoom
		if (Input.GetAxis ("Mouse ScrollWheel") != 0) {
			if (camera != null) {
				if (camera.fieldOfView <= 60)
					camera.fieldOfView -= 10 * Input.GetAxis ("Mouse ScrollWheel");
				else
					camera.fieldOfView = 60;
			} 
		}
	}

	// Exit scene
	public void onExitBtScene(){
		ms.onClick_LoadMainMenuScene ();
	}
}