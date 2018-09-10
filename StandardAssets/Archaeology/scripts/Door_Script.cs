using UnityEngine;
using System.Collections;
using UnityEngine.SceneManagement;

public class Door_Script : MonoBehaviour {

	public string sceneArrival;
	public string doorArrival;
	public bool isRewardItem = false;

	void Start(){

		if (isRewardItem)
			gameObject.transform.Translate(0, -10000, 0);

        // Auto-Calc collider center and size
		bool boundsexist = false;
        Bounds bounds = new Bounds(Vector3.zero, Vector3.zero);

        // Structure of POI gameobject
        // Title of POI
        // obj name
        // meshes

        foreach (Transform childtransform in gameObject.transform)
        {
            foreach (Transform childtransform2 in childtransform)
            {
                Bounds cb = childtransform2.gameObject.GetComponent<MeshFilter>().mesh.bounds;
                if (!boundsexist)
                {
                    boundsexist = true;
                    bounds = cb; // new Bounds(Vector3.zero, Vector3.zero);
                }
                else
                {
                    bounds.Encapsulate(cb);
                }
            }
        }

        BoxCollider collider = (BoxCollider)gameObject.GetComponent<Collider>();
        collider.center = bounds.center; // - gameObject.transform.position;
        collider.size = bounds.size;


	}

	void OnTriggerEnter( Collider col) {

		if(col.gameObject.name == "Player"){ // || col.gameObject.name == "OVRPlayer"){

			// Pass the parameters to a static class
			ApplicationModel.sceneToLoadName = sceneArrival;
			ApplicationModel.doorToArriveName= doorArrival;

			// Load the Scene to arrive at 
			SceneManager.LoadScene(sceneArrival);
		}
	}
}

