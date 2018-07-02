using UnityEngine;
using UnityEngine.UI;
using goedle_sdk;

public class TurbineInputManager : MonoBehaviour
{

    public Canvas PopUpCanvas;
    private Text popUpText;
    private Image backgroundImage;
    private HighlightObject materializer; //used to highlight the turbine with a color on mouse over (sets differrent materials).
    private TurbineController turbine;
    private bool displayPopUpText = false;
    private Vector2 mousePos;
    private Vector2 canvasPos;

    void Start()
    {
        turbine = GetComponent<TurbineController>();
        materializer = GetComponentInChildren<HighlightObject>();
        InitializePopUpText();
    }

    void Update()
    {
        //used for highlighting the turbine when is damaged.
        if (turbine.IsDamaged())
        {
            HighlightTurbine(turbine.IsDamaged());
        }
    }

    //when mouse is hovered over a wind turbine the turbine is highlighted.
    void HighlightTurbine(bool isDamaged)
    {
        if (isDamaged == false)
        {
            materializer.SetUnDamagedMat(displayPopUpText);
        }
        else
        {
            materializer.SetDamagedMat(displayPopUpText);
        }
    }

    //when user clicks the turbine.
    void OnMouseDown()
    {
        //clicks while turbine is rotating.
        if (turbine.IsRotating() == true && turbine.IsDamaged() == false)
        {
            turbine.DisableTurbine();
            GoedleAnalytics.instance.track("disable.turbine");

        }
        //clicks while is not rotating.
        else if (turbine.IsRotating() == false && turbine.IsDamaged() == false)
        {
            turbine.EnableTurbine();
            GoedleAnalytics.instance.track("enable.turbine");
        }
        //clicks while turbine is damaged.
        else if (turbine.IsDamaged() == true)
        {
            turbine.RepairTurbine();
            GoedleAnalytics.instance.track("repair.turbine");
        }
    }

    //when mouse is over a wind turbine without being clicked.
    void OnMouseEnter()
    {
        PlaceCanvasToMouse();
        displayPopUpText = true;
        DisplayPopUpText();
        HighlightTurbine(turbine.IsDamaged());
    }

    //when mouse is not over a wind turbine (specifically on the collider of the turbine).
    void OnMouseExit()
    {
        displayPopUpText = false;
        DisplayPopUpText();
        HighlightTurbine(turbine.IsDamaged());
    }


    void InitializePopUpText()
    {
        popUpText = PopUpCanvas.GetComponentInChildren<Image>().GetComponentInChildren<Text>();
        backgroundImage = PopUpCanvas.GetComponentInChildren<Image>();
        popUpText.enabled = false;
        backgroundImage.enabled = false;
    }

    void DisplayPopUpText()
    {
        if (displayPopUpText == true)
        {
            if (turbine.IsRotating() == true)
            {
                popUpText.color = Color.red;
                popUpText.text = "Turn off";
            }
            else if (turbine.IsRotating() == false && turbine.IsDamaged() == false)
            {
                popUpText.color = Color.blue;
                popUpText.text = "Turn on";

            }
            else
            {
                popUpText.text = "repair";
                popUpText.color = Color.black;
            }
            popUpText.enabled = true;
            backgroundImage.enabled = true;
        }
        else
        {
            popUpText.enabled = false;
            backgroundImage.enabled = false;
        }
    }

    // Used to move the text next to the selected turbine.
    void PlaceCanvasToMouse()
    {
        mousePos = Input.mousePosition;
        canvasPos.x = mousePos.x;
        canvasPos.y = mousePos.y + 20;
        PopUpCanvas.GetComponentInChildren<Image>().transform.position = canvasPos;
    }

}