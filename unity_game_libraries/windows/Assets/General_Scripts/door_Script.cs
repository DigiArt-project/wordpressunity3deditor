using UnityEngine;
using System.Collections;
using UnityEngine.SceneManagement;

public class door_Script : MonoBehaviour {

	public string sceneArrival;
	public string doorArrival;

	void OnTriggerEnter( Collider col) {

		if(col.gameObject.name == "Player"){

			// Get The door to arrive at 
			GameObject doorIntent = GameObject.Find ("doorIntent");
			doorIntent_Script dis = doorIntent.GetComponent<doorIntent_Script> (); 
			dis.doorID = doorArrival;

			// Load the Scene to arrive at 
			SceneManager.LoadScene(sceneArrival);

		}
	}

}

