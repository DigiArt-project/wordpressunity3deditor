using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class WonderSceneManager_Script : MonoBehaviour 
{	
	private Camera camera;
//	Menu_Script ms;

	// handle doors transition
	void Awake() // Awake is important for oculus to take changes
	{

	    // ingame debug console with backquote
        var goDebug = new GameObject();
        goDebug.AddComponent<Console2> ();

		// Zoom: find camera 
		camera = GameObject.Find ("FirstPersonCharacter").GetComponent<Camera> (); // ms.ovrMode ? GameObject.Find ("CenterEyeAnchor").GetComponent<Camera> () : GameObject.Find ("FirstPersonCharacter").GetComponent<Camera> ();


		// Retrieve door coming in
		GameObject doorComingIn = GameObject.Find(ApplicationModel.doorToArriveName);

		// executed when transports from one wonder scene to another (not from main menu to scene 1)
		if (doorComingIn) {
			GameObject doorComingIn_anchor = doorComingIn.transform.Find("door_anchor").gameObject ;
			GameObject player = GameObject.Find ("Player"); // ms.ovrMode ? GameObject.Find ("OVRPlayer") : GameObject.Find ("Player");
			player.transform.position = doorComingIn_anchor.transform.position;
			player.transform.rotation = doorComingIn_anchor.transform.rotation;
		}


//		// Retrieve OVR mode setting ms.ovrMode
//		ms = GameObject.Find ("mainCanvas").GetComponent<Menu_Script> ();
//
//		// Stand alone scene run only (for debugging)
//		//ms = new Menu_Script ();
//		//ms.ovrMode = false;
//
//
//		// set some settings
//		if ( ms.ovrMode) {
//			GameObject.Find ("Player").SetActive (false);
//		} else {
//			// not many AudioListeners
//			GameObject.Find ("CenterEyeAnchor").SetActive(false);
//			//GameObject.Find ("CenterEyeAnchor").GetComponent<AudioListener>().enabled = false;
//		}
//
//


//
//		if (ms.ovrMode) 
//			GameObject.Find ("TrackingSpace").transform.Translate (0,ms.occulusHeight, 0);
	}

	void Update(){
	}
}