#pragma strict

import UnityEngine.SceneManagement;

function OnTriggerEnter(col : Collider) {
		
	if(col.gameObject.name == "FPSController")
	{
		SceneManager.LoadScene("MyScene_Scene");
	}
}