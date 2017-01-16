using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class WarpPipe : MonoBehaviour 
{
	public int warpPipeNumber;

	void OnTriggerStay()
	{
		if (Input.GetKeyDown (KeyCode.C)) 
		{
			SceneManager.instance.LoadScene (warpPipeNumber);
		}
	}
}