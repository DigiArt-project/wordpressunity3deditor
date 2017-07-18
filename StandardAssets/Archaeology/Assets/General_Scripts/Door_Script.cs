using UnityEngine;
using System.Collections;
using UnityEngine.SceneManagement;

public class Door_Script : MonoBehaviour {

	public string sceneArrival;
	public string doorArrival;

	void OnTriggerEnter( Collider col) {

		if(col.gameObject.name == "Player" || col.gameObject.name == "OVRPlayer"){

			Menu_Script ms = GameObject.Find ("mainCanvas").GetComponent<Menu_Script> ();

			ms.doorID = doorArrival;

			// Load the Scene to arrive at 
			SceneManager.LoadScene(sceneArrival);
		}
	}
}

