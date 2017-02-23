using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class poiScript : MonoBehaviour {
	
	private Camera camera;
	private Canvas canvas;

	void Start(){
		camera = GameObject.Find ("FirstPersonCharacter").GetComponent<Camera> ();
		canvas = GameObject.Find (this.gameObject.name + "_Canvas").GetComponent<Canvas> ();
	}

	// Update is called once per frame
	void Update () {

		// Get click 
		if (Input.GetMouseButtonDown (0)) { // if left button pressed...
			Ray ray = camera.ScreenPointToRay (Input.mousePosition);
			RaycastHit hit;
			if (Physics.Raycast (ray, out hit))
			if (hit.collider.gameObject.name == this.gameObject.name) {
				canvas.enabled = true;				
				camera.enabled = false;
			}

		}
	}

	public void onCloseBt(){
		canvas.enabled = false;				
		camera.enabled = true;
	}

}
