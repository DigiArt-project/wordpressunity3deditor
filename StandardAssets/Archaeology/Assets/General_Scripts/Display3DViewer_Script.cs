using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Display3DViewer_Script : MonoBehaviour {

	private Camera camera2;
	private GameObject camera2Anchor;
	private GameObject meshPicked;

	// Use this for initialization
	void Start () {
		camera2 = GameObject.Find ("camera2").GetComponent<Camera> ();
		meshPicked = GameObject.Find (this.gameObject.name + "default");
		camera2Anchor = GameObject.Find ("camera2Anchor");
	}
	
	// Update is called once per frame
	void Update () {
		
		if (GameObject.Find (this.gameObject.name + "Canvas").GetComponent<Canvas>().isActiveAndEnabled) {
			if (Input.GetButton ("Fire2"))
				camera2Anchor.transform.Translate (new Vector3 (Input.GetAxis ("Mouse X"), Input.GetAxis ("Mouse Y"), 0));
			else if (Input.GetButton ("Fire1"))
				meshPicked.transform.Rotate (new Vector3 (Input.GetAxis ("Mouse Y") * Time.deltaTime * 90, Input.GetAxis ("Mouse X")* Time.deltaTime * 90, 0));
			else if (Input.GetAxis ("Mouse ScrollWheel") != 0){
				if (camera2.fieldOfView <= 60)
					camera2.fieldOfView -= 10 * Input.GetAxis ("Mouse ScrollWheel");
				else
					camera2.fieldOfView = 60;
			}
		} 
		
	}
}
