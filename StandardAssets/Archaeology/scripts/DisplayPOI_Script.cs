using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityStandardAssets.Characters.FirstPerson;


//  EVERYTHING MOVED TO PLAYER_CUSTOM_SCRIPT.CS

public class DisplayPOI_Script : MonoBehaviour {




	public string imageSpriteNameToShow = "";


	[TextArea(3,10)]
	public string textToShow = "";

	public string videoToShow = "";





	//private Camera camera,camera2;

//	private GameObject camera2Anchor;
//	public static GameObject meshPicked;
//	private Canvas canvas;
//	private FirstPersonController fpc;
	//private OVRPlayerController ovrfpc;
//	private GameObject GO_INIT_POS;

	// Menu_Script ms;

	// private bool isDynamicObject = false;

	void Start(){

//		// Find if OVR mode
//		ms = GameObject.Find ("mainCanvas").GetComponent<Menu_Script> ();
//
//		// The FP camera depends on the mode
//		if (!ms.ovrMode) {
//			camera = GameObject.Find ("FirstPersonCharacter").GetComponent<Camera> ();
//			fpc = GameObject.Find ("Player").GetComponent<FirstPersonController> ();
//
//			// camera 2 is a camera on a separate place for viewing the selected 3D model
//			camera2 = GameObject.Find ("camera2").GetComponent<Camera> ();
//
//			// camera 2 has an anchor for placing the 3D object in front of it
//			camera2Anchor = GameObject.Find ("camera2Anchor");
//
//		} else {
//			camera = GameObject.Find ("CenterEyeAnchor").GetComponent<Camera> ();
//			ovrfpc = GameObject.Find ("OVRPlayer").GetComponent<OVRPlayerController> ();
//
//			// camera2ovr ???: is impossible to have two ovr cameras in one scene (I tried to do it but failed)
//
//			// camera 2 is a camera on a separate place for viewing the selected 3D model
//			camera2 = GameObject.Find ("camera2").GetComponent<Camera> ();
//
//			// camera 2 has an anchor for placing the 3D object in front of it
//			camera2Anchor = GameObject.Find ("camera2Anchor");
//		}
//
//		// Initial position of the 3D object
//		GO_INIT_POS = new GameObject ();
//
//		// Get the canvas
//		canvas = GameObject.Find (this.gameObject.name + "Canvas").GetComponent<Canvas> ();
	}

	// Update is called once per frame
	void Update () {

//		// Get click if left button pressed...
//		if (Input.GetMouseButtonDown (0) && ( (fpc==null ? false: fpc.enabled) || (ovrfpc==null? false: ovrfpc.enabled))) { 
//			Ray ray = camera.ScreenPointToRay (Input.mousePosition);
//			RaycastHit hit;
//
//			if (Physics.Raycast (ray, out hit)) {
//
//				if (hit.collider.gameObject.name == this.gameObject.name + "default") {
//
//					// Show the canvas
//					canvas.enabled = true;				
//
//					// Stop moving around the player in the background
//					if (ms.ovrMode)
//						ovrfpc.enabled = false;
//					else 
//						fpc.enabled = false;
//
//					// VIDEO Canvas: Autostart video
//					if (GameObject.Find (this.gameObject.name + "PlayBt") != null) {
//
//						(GameObject.Find (this.gameObject.name + "PlayBt").GetComponent<Button>()).onClick.Invoke ();
//
//						// we do not want any 3d objects interfere with canvas
//						GameObject.Find (this.gameObject.name + "default").GetComponent<MeshRenderer> ().enabled = false;
//					}
//
//
//					// 3D model: dynamic has a rigidbody whereas POI does not.
//					meshPicked = GameObject.Find (this.gameObject.name + "default");
//					isDynamicObject = (meshPicked.GetComponent<Rigidbody> () != null);
//
//					if (isDynamicObject) {
//
//						camera.enabled = false;
//						camera2.enabled = true;
//
//						GO_INIT_POS.transform.position = new Vector3 (this.gameObject.transform.position.x,
//																	  this.gameObject.transform.position.y,
//																	  this.gameObject.transform.position.z);
//						
//						//meshPicked.GetComponent<Rigidbody> ().useGravity = false;
//
//						meshPicked.transform.parent = camera2Anchor.transform;
//						meshPicked.transform.localPosition = new Vector3 (0, 0, 0);
//					}
//				}	
//			}
//		}
	}

	public void onCloseBt(){
		
//		canvas.enabled = false;				
//		camera.enabled = true;
//		camera2.enabled = false;
//		camera.fieldOfView = 60;
//		camera2.fieldOfView = 60;
//
//		if (ms.ovrMode)
//			ovrfpc.enabled = true;
//		else 
//			fpc.enabled = true;
//
//		// Make the 3d mesh visible again if not visible 
//		GameObject.Find (this.gameObject.name + "default").GetComponent<MeshRenderer> ().enabled = true;
//
//		// if 3d object was picked, now release it
//		if (isDynamicObject) {
//			
//			isDynamicObject = false;
//
//			//meshPicked.GetComponent<Rigidbody> ().useGravity = true;
//			meshPicked.transform.parent = this.gameObject.transform;
//			meshPicked.transform.localPosition = new Vector3 (0, 0, 0);
//			camera2Anchor.transform.localPosition = new Vector3 (0, 0, 15);
//		}
	}

}
