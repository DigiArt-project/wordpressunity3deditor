using UnityEngine;
using UnityEngine.UI;
using goedle_sdk;


public class MapPointer : MonoBehaviour {

    [Header("GUI components")]
    [SerializeField] private GameObject infoPanel;

    [Space]
    public Sprite[] pointerSprites;
	SpriteRenderer spriteRend;
    private Vector2 panelPos;
    private Vector3 mousePos;

    [SerializeField] private int subAreaType;
    [SerializeField] private int subAreaIndex;
    [Space]
    [Header("subarea values")]
    private int accessCost;
    public int PenaltyForArchaiological;
    public int PenaltyForNature;
    public int CostForDistFromHV;
    private int total;

    private Text accessCostText;
    private Text penaltyForArchaiologicalText;
    private Text penaltyForNatureText;
    private Text costForDistFromHVText;
    private Text totalText;
    private Text subareaIndexText;

    void Start()
	{
		//spriteRend = GetComponent<SpriteRenderer>();
        //this.spriteRend.sprite = pointerSprites[0];

        //hide image on start
        EnableInfoPanel(false);

        //set access cost
        SetAccessCost();
        //calculate total cost
        total = accessCost + PenaltyForArchaiological + PenaltyForNature + CostForDistFromHV; 
        

	}

	void OnMouseEnter()
	{

        //this.spriteRend.sprite = pointerSprites[1];
        //PlacePanelNextToSprite();
        EnableInfoPanel(true);
        accessCostText = GameObject.FindGameObjectWithTag("access cost").GetComponent<Text>();
        penaltyForArchaiologicalText = GameObject.FindGameObjectWithTag("archaiological penalty").GetComponent<Text>();
        penaltyForNatureText = GameObject.FindGameObjectWithTag("natural penalty").GetComponent<Text>();
        costForDistFromHVText = GameObject.FindGameObjectWithTag("hv cost").GetComponent<Text>();
        totalText = GameObject.FindGameObjectWithTag("total").GetComponent<Text>();
        subareaIndexText = GameObject.FindGameObjectWithTag("subareaIndex").GetComponent<Text>();
        SetValuesToText();
    }

	void OnMouseExit()
	{
		//this.spriteRend.sprite = pointerSprites[0];
        EnableInfoPanel(false);
        accessCostText = null;
        penaltyForArchaiologicalText = null;
        penaltyForNatureText = null;
        costForDistFromHVText = null;
        totalText = null;
    }

    private void OnMouseDown()
    {
        GameManager.instance.IncrementCost(total);
        GameManager.instance.areaInstallationCost = GameManager.cost;
        GameManager.instance.SetSubArea(subAreaType);
        GameManager.instance.LoadLevel("S_TurbineSelection");
        GoedleAnalytics.instance.track("click.map_pointer", subAreaIndex.ToString());
    }


    void PlacePanelNextToSprite()
    {
        mousePos = Input.mousePosition;
        panelPos.x = mousePos.x;
        panelPos.y = mousePos.y + 170.0f;
        panelPos.x = Mathf.Clamp(panelPos.x, 0, Screen.width);
        panelPos.y = Mathf.Clamp(panelPos.y, 0, Screen.height);
        infoPanel.transform.position = panelPos;
    }

    void EnableInfoPanel( bool visible )
    {
        if(visible == true)
        {
            infoPanel.SetActive(true);
        }
        else
        {
            infoPanel.SetActive(false);
        }
    }

    void SetValuesToText()
    {
        subareaIndexText.text = " " +subAreaIndex.ToString();
        accessCostText.text = accessCost.ToString() + " $";
        accessCostText.color = Color.blue;
        penaltyForArchaiologicalText.text = PenaltyForArchaiological.ToString() + " $";
        penaltyForArchaiologicalText.color = Color.blue;
        penaltyForNatureText.text = PenaltyForNature.ToString() + " $";
        penaltyForNatureText.color = Color.blue;
        costForDistFromHVText.text = CostForDistFromHV.ToString() + " $";
        costForDistFromHVText.color = Color.blue;
        totalText.text = total + " $";
        totalText.color = Color.blue;
    }

    void SetAccessCost()
    {
        if (GameManager.instance.Areachoice == GameManager.MainArea.mountains)
        {
            accessCost = 3;
        }
        else if (GameManager.instance.Areachoice == GameManager.MainArea.fields)
        {
            accessCost = 2;
        }
        else
        {
            accessCost = 1;
        }
    }
}
