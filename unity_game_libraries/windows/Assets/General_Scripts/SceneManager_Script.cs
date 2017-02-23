using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;


public class SceneManager_Script : MonoBehaviour 
{	

	void OnLevelWasLoaded()
	{
		GameObject di = GameObject.Find ("doorIntent");
		doorIntent_Script dis = di.GetComponent<doorIntent_Script> (); 

		GameObject doorComingIn = GameObject.Find(dis.doorID);

		if (doorComingIn) {

			GameObject doorComingIn_anchor = doorComingIn.transform.Find("door_anchor").gameObject ;


			GameObject player = (GameObject.Find ("Player"));
			player.transform.position = doorComingIn_anchor.transform.position;
			player.transform.rotation = doorComingIn_anchor.transform.rotation;
		}
	}


}
