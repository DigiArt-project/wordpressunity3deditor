using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Video;
using UnityStandardAssets.Characters.FirstPerson;
using System;
using System.Collections.Generic;

public class Player_Custom_Script : MonoBehaviour {

	private Canvas canvas_ti;
	private Canvas canvas_v;
	private Canvas canvas_a;
	private Camera camera, camera2;
	private GameObject active;
	private Boolean flag_artifact_rotate_scale = false;
	private GameObject[] pois;
	private List<GameObject> poisList;
	private Boolean flagCongratsAlreadyDisplayed = false;
	private Text infoTextCurrStatus;
	private int NPois;
	private RectTransform imageGreenBarRect;
	private GameObject directionalArrow;
	private GameObject rewardObject;

	void Start () {
		// Get all pois and transform the array to a list
		pois = getPOIs();
		poisList = new List<GameObject>(pois);
		poisList.Remove (null);
		NPois = poisList.Count;


		canvas_ti = GameObject.Find ("canvas_ti").GetComponent<Canvas> ();
		canvas_v = GameObject.Find ("canvas_v").GetComponent<Canvas> ();
		canvas_a = GameObject.Find ("canvas_a").GetComponent<Canvas> ();

		camera = GameObject.Find ("FirstPersonCharacter").GetComponent<Camera> ();

		// camera 2 is a camera on a separate place for viewing the selected 3D model
		camera2 = GameObject.Find ("camera2").GetComponent<Camera> ();

		Button bt_it_close = GameObject.Find ("bt_ti_close").GetComponent<Button>();
		bt_it_close.onClick.AddListener( activateObjectAgain );

		infoTextCurrStatus = GameObject.Find ("infoTextCurrStatus").GetComponent<Text> ();
		infoTextCurrStatus.text = "0/" + NPois;

		imageGreenBarRect = GameObject.Find ("imageGreenBar").GetComponent<RectTransform> ();
		imageGreenBarRect.sizeDelta = new Vector2 (2, 20);

		directionalArrow = GameObject.Find ("directionalArrow");
		directionalArrow.GetComponent<Image> ().enabled = false;

	}

	public GameObject[] getPOIs(){

		GameObject[] pois_it = GameObject.FindGameObjectsWithTag ("poi_imagetext");
		GameObject[] pois_v = GameObject.FindGameObjectsWithTag ("poi_video");
		GameObject[] pois_a = GameObject.FindGameObjectsWithTag ("poi_artefact");


		int n = pois_it.Length + pois_v.Length + pois_a.Length;

		GameObject[] pois = new GameObject[n];

		pois_it.CopyTo (pois, 0);
		pois_v.CopyTo  (pois, pois_it.Length);
		pois_a.CopyTo  (pois, pois_it.Length + pois_v.Length);

		// Remove Reward items
		for (int i = 0; i < n; i++)
			if (pois [i].GetComponent<DisplayPOI_Script> ().isRewardItem)
				pois [i] = null;


		return pois;
	}

	// When player runs over an item
	void OnTriggerEnter(Collider other)
	{
		checkTag (other.gameObject);
	}

	// When player goes away from an item
	void OnTriggerExit(Collider other)
	{
		if (other.gameObject.tag == "poi_imagetext") {
			canvas_ti.enabled = false;

			// Make the obj to appear
			other.gameObject.transform.GetChild(0).transform.GetChild(0).GetComponent<MeshRenderer>().enabled = true;

			playPlayer ();

		} else if (other.gameObject.tag == "poi_video") {
			canvas_v.enabled = false;

			GameObject.Find ("panel_v").GetComponent<AudioSource> ().Stop ();
			GameObject.Find ("panel_v").GetComponent<VideoPlayer> ().Stop ();

			// Make the obj to appear
			other.gameObject.transform.GetChild(0).transform.GetChild(0).GetComponent<MeshRenderer>().enabled = true;

			playPlayer ();
		} else if (other.gameObject.tag == "poi_artefact") {
			// playPlayer ()  is not possible because FPS is disabled. Done with button that calls closeArtefactView
		}
	}

	// Close the 3D viewer of the artifact and the canvas with related info
	public void closeArtefactView(){

		canvas_a.enabled = false;

		camera.enabled = true;
		camera.fieldOfView = 60;
		camera2.enabled = false;

		// Destroy the copied object
		Destroy (GameObject.Find ("meshcontainer").transform.GetChild (0).gameObject);

		// Enable FPS
		playPlayer();
		appearExitButton ();
		appearInfoPanel ();
	}



	void Update(){
		if (camera2.isActiveAndEnabled ) {

			if (Input.GetButtonDown("Fire1"))
			{
				if (Input.mousePosition [0] < Screen.width / 2)
					flag_artifact_rotate_scale = true;
				else
					flag_artifact_rotate_scale = false;
			}

			if (flag_artifact_rotate_scale){

				// Rotation
				GameObject.Find ("meshcontainer").transform.Rotate (
					new Vector3 (- Input.GetAxis ("Mouse Y") * Time.deltaTime * 200, - Input.GetAxis ("Mouse X") * Time.deltaTime * 200, 0)
				);

				// Scaling
				if (Input.GetAxis ("Mouse ScrollWheel") != 0) {
					Vector3 targetScale = GameObject.Find ("meshcontainer").transform.localScale - 30 * Input.GetAxis ("Mouse ScrollWheel") * (new Vector3 (1, 1, 1));

					if (targetScale.x > 0)
						GameObject.Find ("meshcontainer").transform.localScale =
							Vector3.Lerp (GameObject.Find ("meshcontainer").transform.localScale, targetScale, 10 * Time.deltaTime);
				}
			}
		}


		if (camera.isActiveAndEnabled) {

			// Scroll wheel zoom
			if (Input.GetAxis ("Mouse ScrollWheel") != 0) {
				if (camera != null) {
					if (camera.fieldOfView <= 60 && camera.fieldOfView > 2) {
						camera.fieldOfView -= 10 * Input.GetAxis ("Mouse ScrollWheel");
					} else if (camera.fieldOfView <= 2) {
						camera.fieldOfView = 2;
					} else
						camera.fieldOfView = 60;
				}
			}


			// Pick by raycasting
			if (Input.GetMouseButtonDown(0)) {
				RaycastHit[] hits;

				hits = Physics.RaycastAll(camera.ScreenPointToRay(Input.mousePosition), 50.0F);

				for (int i = 0 ; i < hits.Length; i++) {
					if (hits [i].transform.gameObject.tag != "Untagged") {
						checkTag (hits [i].transform.gameObject);
						break;
					}
				}
			}

			if (Input.GetKeyDown ("s") || Input.GetKeyDown ("w"))
				activateObjectAgain ();
		}



		if(rewardObject){
			directionalArrow.GetComponent<Image> ().enabled = true;
			Vector3 dir = gameObject.transform.InverseTransformPoint (rewardObject.transform.position);
			float angleR = Mathf.Atan2 (dir.x, dir.z) * Mathf.Rad2Deg;
			angleR += 180;
			directionalArrow.transform.localEulerAngles = new Vector3(0, 180, angleR);
		}


	}

	// Closes poi_it and poi_v canvases and reshows their objs
	void activateObjectAgain(){
		canvas_ti.enabled = false;

		if (canvas_v.enabled == true) {
			appearExitButton ();
			appearInfoPanel ();
			canvas_v.enabled = false;
			GameObject.Find ("panel_v").GetComponent<AudioSource> ().Stop ();
			GameObject.Find ("panel_v").GetComponent<VideoPlayer> ().Stop ();
		}

		if (active)
			active.transform.GetChild(0).transform.GetChild(0).GetComponent<MeshRenderer>().enabled = true;

		playPlayer ();

		if (poisList.Count == 0 && NPois > 0)
			DisplayCongrats ();
	}


	/* Check the tag of the clicked or collided object */
	void checkTag(GameObject go){

		// Deduct poisList counter
		poisList.Remove (go);

		infoTextCurrStatus.text = (NPois - poisList.Count) + "/" + NPois;

		int nWidth = (NPois - poisList.Count) * 220 /NPois;

		imageGreenBarRect.sizeDelta = new Vector2 ( nWidth , 20);

		if (go.tag == "poi_imagetext") {

			freezePlayer ();

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

			freezePlayer ();

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


			vanishExitButton();
			vanishInfoPanel ();


		} else if (go.tag == "poi_artefact") {

			freezePlayer ();

			canvas_a.enabled = true;

			// show text on canvas by fetching it from the collided object
			GameObject.Find ("txt_a").GetComponent<Text> ().text = go.GetComponent<DisplayPOI_Script> ().textToShow;

			Transform collidedObjectTransform = go.transform.GetChild (0);

            float scaleArtifact = 5;

            GameObject.Find ("meshcontainer").transform.localScale = new Vector3 (scaleArtifact, scaleArtifact, scaleArtifact);

            GameObject.Find("meshcontainer").transform.Translate(new Vector3(0, -1f, 0));

			// Copy mesh
			Instantiate(collidedObjectTransform, GameObject.Find ("meshcontainer").transform);


			// Get the title of the poi to put as a text in the title_txt_ti in canvas_ti
			GameObject.Find ("txt_a_title").GetComponent<Text> ().text = go.name;

			camera.enabled = false;
			camera2.enabled = true;

			vanishExitButton();
			vanishInfoPanel ();
		}
	}

	void appearExitButton(){
		GameObject.Find ("bt_scene_exit").transform.Translate(0, - 230, 0);
	}

	void vanishExitButton(){
		GameObject.Find ("bt_scene_exit").transform.Translate(0,   230, 0);
	}

	void appearInfoPanel(){
		GameObject.Find ("infoPanel").transform.Translate (0, -230, 0);
	}

	void vanishInfoPanel(){
		GameObject.Find ("infoPanel").transform.Translate (0, 230, 0);
	}

	void freezePlayer(){
		gameObject.GetComponent<FirstPersonController>().enabled = false;
	}

	void playPlayer(){
		gameObject.GetComponent<FirstPersonController>().enabled = true;
	}


	void DisplayCongrats(){

		if (!flagCongratsAlreadyDisplayed) {
			GameObject.Find ("infoTextAccomplished").GetComponent<Text> ().enabled = true;
			GameObject.Find ("infoTextCurrStatus").SetActive (false);
			GameObject.Find ("imageGreenBar").SetActive (false);
			GameObject.Find ("imageRedBar").SetActive (false);

			findRewardObjectAndDisplayIt ();
			flagCongratsAlreadyDisplayed = true;
		}


	}


	void findRewardObjectAndDisplayIt(){

		GameObject[] allObjects = FindObjectsOfType<GameObject> ();

		foreach (GameObject go in allObjects) {
			if (go.GetComponent<DisplayPOI_Script> () || go.GetComponent<Door_Script> ()) {

				if (go.GetComponent<DisplayPOI_Script> ())
					if (go.GetComponent<DisplayPOI_Script> ().isRewardItem) {

						go.transform.Translate (0, 10000, 0);
						rewardObject = go;
					}


				if (go.GetComponent<Door_Script> ())
					if (go.GetComponent<Door_Script> ().isRewardItem) {

						go.transform.Translate (0, 10000, 0);
						rewardObject = go;
					}

			}
		}

	}


}

