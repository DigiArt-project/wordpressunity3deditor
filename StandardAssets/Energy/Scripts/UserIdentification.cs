using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using System.Linq;
using goedle_sdk.detail;


public class UserIdentification : MonoBehaviour
{

    public InputField[] inputFields;
    public GameObject textLog;

    private void Start()
    {
        textLog.SetActive(false);
    }

    public bool IsInputEmpty()
    {
        foreach (InputField field in inputFields)
        {
            if (field.text.Length == 0)
            {
                return true;
            }
        }
        return false;
    }
    
    public void StartSimulation(string sceneToLoad)
    {
		goedle_sdk.GoedleAnalytics.instance.requestStrategy();
		string user_id_raw = GameManager.instance.playerName + GameManager.instance.playerClass + GameManager.instance.playerSchoolName;
        // Creating a hashed user id, md5 hash of a string and then using a guid
        string hashed_user_id = GoedleUtils.userHash(user_id_raw);
        goedle_sdk.GoedleAnalytics.instance.setUserId(hashed_user_id);
		StartCoroutine(getStrategy(sceneToLoad));

    }

	public IEnumerator getStrategy(string sceneToLoad)
	{
		/*int c = 0;
		while (goedle_sdk.GoedleAnalytics.instance.goedle_analytics.strategy == null || c < 150)
		{
			yield return null;
			c++;
		}*/
		GameManager.instance.LoadLevel(sceneToLoad);
        return null;
	}
    

}
