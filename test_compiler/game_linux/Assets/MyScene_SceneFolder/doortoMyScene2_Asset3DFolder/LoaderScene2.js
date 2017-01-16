#pragma strict

import UnityEngine.SceneManagement;

function OnTriggerEnter(col : Collider) {
	
	Debug.Log(col.gameObject.name);
	
	if(col.gameObject.name == "FPSController")
	{
		SceneManager.LoadScene("MyScene2_Scene");
	}
}