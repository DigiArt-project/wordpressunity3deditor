using UnityEngine;

public class SubAreaDisplayer : MonoBehaviour {

    [SerializeField] private GameObject[] subAreaSites = new GameObject[2];

    // Use this for initialization
    void Start () {
        DisplaySubArea();
	}

    private void DisplaySubArea()
    {
        if(GameManager.instance.SubAreachoice == GameManager.SubArea.archaiological)
        {
            if (GameManager.instance.Areachoice == GameManager.MainArea.mountains)
            {
                subAreaSites[0].SetActive(true);
                subAreaSites[1].SetActive(true);
            }
            else if (GameManager.instance.Areachoice == GameManager.MainArea.seashore || GameManager.instance.Areachoice == GameManager.MainArea.fields)
            {
                subAreaSites[0].SetActive(true);
                subAreaSites[1].SetActive(false);
            }
        }
        else if(GameManager.instance.SubAreachoice == GameManager.SubArea.HVLines)
        {
            subAreaSites[0].SetActive(false);
            subAreaSites[1].SetActive(true);
        }
        else
        {
            subAreaSites[0].SetActive(false);
            subAreaSites[1].SetActive(false);
        }
    }
}
