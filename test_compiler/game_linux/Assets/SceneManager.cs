using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class SceneManager : MonoBehaviour 
{
	public static SceneManager instance = null;

	public GameObject player; 
	public GameObject [] warpPipeArray;

	public int currentPipeNumber;

	void Awake ()
	{
		if (instance == null) {
			DontDestroyOnLoad (gameObject);
			instance = this;
		} 
		else if (instance != null) 
		{
			Destroy (gameObject);
		}

		if (player == null)
			//player = GameObject.FindGameObjectWithTag ("Player");
			player = GameObject.Find ("FPSController");

		if (warpPipeArray.Length == 0)
			warpPipeArray = GameObject.FindGameObjectsWithTag ("Warp Pipe");
			//warpPipeArray = GameObject.Find ("Warp Pipe");
	}

	void OnLevelWasLoaded()
	{
		player = GameObject.FindGameObjectWithTag ("Player");
		warpPipeArray = GameObject.FindGameObjectsWithTag ("Warp Pipe");

		for (int i = 0; i < warpPipeArray.Length; i++) 
		{
			if (warpPipeArray [i].GetComponent<WarpPipe> ().warpPipeNumber == currentPipeNumber) 
			{
				player.transform.position = warpPipeArray [i].transform.position;
			}
		}
	}




	public void LoadScene(int passedWarpPipeNumber)
	{
		/*currentPipeNumber = passedWarpPipeNumber;

		if (SceneManager.LoadScene = 0) 
		{
			SceneManager.LoadScene (1);
		}
		else if (SceneManager.LoadScene = 1) 
		{
			SceneManager.LoadScene (0);
		}*/
	} 
}
