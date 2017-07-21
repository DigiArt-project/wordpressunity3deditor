using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class SceneManager_Script : MonoBehaviour 
{	
	//private Camera camera;
	//Menu_Script ms;

	// handle doors transition
	void Awake() // Awake is important for oculus to take changes
	{
		// Retrieve settings
		// ms = GameObject.Find ("mainCanvas").GetComponent<Menu_Script> ();
	}

	void Update(){
		
	}

	// Exit scene
	public void onExitBtScene(){
		//ms.onClick_LoadMainMenuScene ();
	}
}