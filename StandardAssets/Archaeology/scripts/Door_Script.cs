using UnityEngine;
using System.Collections;
using UnityEngine.SceneManagement;

public class Door_Script : MonoBehaviour {

	public string sceneArrival;
	public string doorArrival;

	void OnTriggerEnter( Collider col) {

		if(col.gameObject.name == "Player"){ // || col.gameObject.name == "OVRPlayer"){

			// Pass the parameters to a static class
			ApplicationModel.sceneToLoadName = sceneArrival;
			ApplicationModel.doorToArriveName= doorArrival;

			// Load the Scene to arrive at 
			SceneManager.LoadScene(sceneArrival);
		}
	}
}

