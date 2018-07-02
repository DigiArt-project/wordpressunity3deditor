using UnityEngine;
using UnityEngine.UI;


public class Medal : MonoBehaviour {

    public Image bronze;
    public Image xalkino;
    public Image gold;

    // Use this for initialization
    void Update () {
        if (GameManager.score <= 4)
        {
            bronze.enabled = true;
            xalkino.enabled = false;
            gold.enabled = false;
        }
        if (GameManager.score > 4 && GameManager.score <= 7 )
        {
            bronze.enabled = false;
            xalkino.enabled = true;
            gold.enabled = false;
        }
        if(GameManager.score >= 8)
        {
            bronze.enabled = false;
            xalkino.enabled = false;
            gold.enabled = true;
        }
    }
}
