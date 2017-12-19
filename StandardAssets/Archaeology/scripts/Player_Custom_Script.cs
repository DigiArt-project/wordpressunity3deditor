using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Video;
using UnityStandardAssets.Characters.FirstPerson;
using System;

public class Player_Custom_Script : MonoBehaviour {

	private Canvas canvas_ti;
	private Canvas canvas_v;
	private Canvas canvas_a;
	private Camera camera, camera2;
	private GameObject active;

	void Start () {
		canvas_ti = GameObject.Find ("canvas_ti").GetComponent<Canvas> ();
		canvas_v = GameObject.Find ("canvas_v").GetComponent<Canvas> ();
		canvas_a = GameObject.Find ("canvas_a").GetComponent<Canvas> ();

		camera = GameObject.Find ("FirstPersonCharacter").GetComponent<Camera> ();

		// camera 2 is a camera on a separate place for viewing the selected 3D model
		camera2 = GameObject.Find ("camera2").GetComponent<Camera> ();
	}


	void OnTriggerEnter(Collider other)
	{
		checkTag (other.gameObject);
	}


	void OnTriggerExit(Collider other)
	{
		if (other.gameObject.tag == "poi_imagetext") {
			canvas_ti.enabled = false;

			// Make the obj to appear
			other.gameObject.transform.GetChild(0).transform.GetChild(0).GetComponent<MeshRenderer>().enabled = true;
		} else if (other.gameObject.tag == "poi_video") {
			canvas_v.enabled = false;

			GameObject.Find ("panel_v").GetComponent<VideoPlayer> ().Stop ();

			GameObject.Find ("panel_v").GetComponent<AudioSource> ().Stop ();

			// Make the obj to appear
			other.gameObject.transform.GetChild(0).transform.GetChild(0).GetComponent<MeshRenderer>().enabled = true;

		} else if (other.gameObject.tag == "poi_artefact") {
			// It is not possible because FPS is disabled. Done with button that calls closeArtefactView
		}
	}


	public void closeArtefactView(){

		canvas_a.enabled = false;

		camera.enabled = true;
		camera2.enabled = false;

		// Destroy the copied object
		Destroy (GameObject.Find ("meshcontainer").transform.GetChild (0).gameObject);

		// Enable FPS
		gameObject.GetComponent<FirstPersonController> ().enabled = true;
	}



	void Update(){
		if (camera2.isActiveAndEnabled) {

			// Rotation
			GameObject.Find ("meshcontainer").transform.Rotate (
				new Vector3 (- Input.GetAxis ("Mouse Y") * Time.deltaTime * 200, - Input.GetAxis ("Mouse X") * Time.deltaTime * 200, 0)
			);


			// Scaling
			if (Input.GetAxis ("Mouse ScrollWheel") != 0) {
				Vector3 targetScale = GameObject.Find ("meshcontainer").transform.localScale -
					30 * Input.GetAxis ("Mouse ScrollWheel") * (new Vector3 (1, 1, 1));

				if (targetScale.x > 0)
					GameObject.Find ("meshcontainer").transform.localScale =
						Vector3.Lerp (GameObject.Find ("meshcontainer").transform.localScale, targetScale, 10 * Time.deltaTime);
			}


		}


		if (camera.isActiveAndEnabled) {

			// Scroll wheel zoom
			if (Input.GetAxis ("Mouse ScrollWheel") != 0) {
				if (camera != null) {
					if (camera.fieldOfView <= 60)
						camera.fieldOfView -= 10 * Input.GetAxis ("Mouse ScrollWheel");
					else
						camera.fieldOfView = 60;
				}
			}


			// Pick by raycasting
			if (Input.GetMouseButtonDown(0)) {
				RaycastHit[] hits;

				hits = Physics.RaycastAll(camera.ScreenPointToRay(Input.mousePosition), 100.0F);

				for (int i = 0 ; i < hits.Length; i++) {
					if (hits [i].transform.gameObject.tag != "Untagged") {
						checkTag (hits [i].transform.gameObject);
						break;
					}
				}
			}



			if (Input.GetKeyDown ("s") || Input.GetKeyDown ("w") ) {
				canvas_ti.enabled = false;
				canvas_v.enabled = false;

				if (active)
					active.transform.GetChild(0).transform.GetChild(0).GetComponent<MeshRenderer>().enabled = true;
			}



		}

	}


	/* Check the tag of the clicked or collided object */
	void checkTag(GameObject go){

		if (go.tag == "poi_imagetext") {

			active = go;

			// Make the obj to dissapper in order not to overlay on canvas
			go.transform.GetChild(0).transform.GetChild(0).GetComponent<MeshRenderer>().enabled = false;

			// Get the name of the sprite from the collided object
			string spriteName = go.GetComponent<DisplayPOI_Script> ().imageSpriteNameToShow;

			// Set sprite and text in panel
			Sprite image_sprite = Resources.Load<Sprite> (spriteName);

			if (image_sprite){
				GameObject.Find ("img_ti").GetComponent<Image> ().sprite = image_sprite;
			} else {
				Debug.Log( spriteName + " was not found. Are you sure you have imported it in Resources folder?" );
			}

			// Set the text
			GameObject.Find ("txt_ti").GetComponent<Text> ().text = go.GetComponent<DisplayPOI_Script> ().textToShow;

			// Get the title of the poi to put as a text in the title_txt_ti in canvas_ti
			GameObject.Find ("title_txt_ti").GetComponent<Text> ().text = go.name;

			canvas_ti.enabled = true;

		} else if (go.tag == "poi_video") {

			active = go;

			// Make the obj to dissapper in order not to overlay on canvas
			go.transform.GetChild(0).transform.GetChild(0).GetComponent<MeshRenderer>().enabled = false;

			// Get the name of the sprite from the collided object
			string videoName = go.GetComponent<DisplayPOI_Script> ().videoToShow;
			string videoUrlName = go.GetComponent<DisplayPOI_Script> ().videoUrlToShow;

			// Put the video to the video player
			VideoPlayer videoPlayer = GameObject.Find ("panel_v").GetComponent<VideoPlayer> ();
			videoPlayer.playOnAwake  = false;


			#if UNITY_WEBGL
			videoPlayer.source = VideoSource.Url;
			videoPlayer.url= videoUrlName; //"http://127.0.0.1:8080/Videos/Hanna.mp4";
			#else
			videoPlayer.source = VideoSource.VideoClip;
			videoPlayer.clip = Resources.Load<VideoClip> (videoName);
			#endif

			// Set video audio to audioSource
			AudioSource audioSource = GameObject.Find ("panel_v").GetComponent<AudioSource> ();

			videoPlayer.audioOutputMode = VideoAudioOutputMode.AudioSource;
			videoPlayer.EnableAudioTrack (0, true);

			audioSource.playOnAwake  =  false;
			videoPlayer.SetTargetAudioSource (0, audioSource);



			if (videoName.Length > 0 || videoUrlName.Length >0) {
				videoPlayer.Play ();
				audioSource.Play ();
				canvas_v.enabled = true;
			} else {
				Debug.Log (videoName + " or " + videoUrlName  + " was not found.");
			}

		} else if (go.tag == "poi_artefact") {

			canvas_a.enabled = true;

			// show text on canvas by fetching it from the collided object
			GameObject.Find ("txt_a").GetComponent<Text> ().text = go.GetComponent<DisplayPOI_Script> ().textToShow;

			Transform collidedObjectTransform = go.transform.GetChild (0);


			GameObject.Find ("meshcontainer").transform.localScale = new Vector3 (10, 10, 10);

			// Copy mesh
			Instantiate(collidedObjectTransform, GameObject.Find ("meshcontainer").transform);

			camera.enabled = false;
			camera2.enabled = true;

			gameObject.GetComponent<FirstPersonController> ().enabled = false;
		}

	}
}
