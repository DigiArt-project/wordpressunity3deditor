using UnityEngine;
using System.Collections;
using System;

public class VanishLandscape : MonoBehaviour {
    Vector3 pos;

    // Use this for initialization
	void Start () {
		string hold_landscape = null;
			try
			{
    			if (goedle_sdk.GoedleAnalytics.instance.gio_interface.strategy != null)
                    {

        				GameManager.instance.strategy = goedle_sdk.GoedleAnalytics.instance.gio_interface.strategy;
				        Debug.Log(goedle_sdk.GoedleAnalytics.instance.gio_interface.strategy);
				        hold_landscape = GameManager.instance.strategy["config"][0]["scenario"].Value;              
                        if (gameObject.name != hold_landscape)
                            moveGameObject(true);
                        else
                            moveGameObject(false);
				        goedle_sdk.GoedleAnalytics.instance.track("strategy.received",GameManager.instance.strategy["config"]["id"].Value);
                    }
			}
			catch (Exception ex)
			{
			Debug.Log("Error parsing strategy: " + ex.ToString());

			}
	}
	
	// Update is called once per frame
	void Update () {
		
	}

    void moveGameObject(bool out_of_screen){
        pos = transform.position;
        if (out_of_screen)
        {
            pos.x = 1000;
        }
        else
        {
            pos.x = 0;
        }
        transform.position = pos;
    }
}
