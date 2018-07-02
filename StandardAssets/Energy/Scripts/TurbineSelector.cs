using UnityEngine;
using UnityEngine.UI;
using goedle_sdk;


public class TurbineSelector : MonoBehaviour
{
    private int numberOfTurbines = 0;
    private int availiableSpace;
    private int rotorDiameter;
    [SerializeField] private int turbineCost = 0;
    public enum TurbineType { A, B, C, D, E, F, G, H, I }
    [SerializeField] private GameObject btn;
    [SerializeField] private Text windClassText;

    private void Awake()
    {
        availiableSpace = 2000;
        rotorDiameter = 128;
        btn.SetActive(false);
        SetWindClass();
    }

    public void SetWindClass()
    {
        if (GameManager.instance.Areachoice == GameManager.MainArea.mountains)
        {
            availiableSpace = 2000;
            GameManager.instance.Windclass = 1;
            windClassText.text = "Wind class I";
        }
        else if (GameManager.instance.Areachoice == GameManager.MainArea.fields)
        {
            availiableSpace = 2000;
            GameManager.instance.Windclass = 2;
            windClassText.text = "Wind class II";
        }
        else
        {
            availiableSpace = 3000;
            GameManager.instance.Windclass = 3;
            windClassText.text = "Wind class III";
        }
        GoedleAnalytics.instance.track("select.wind_class", GameManager.instance.Windclass.ToString());
    }


    public void SetRotorDiameter(int index)
    {
        btn.SetActive(true);
        if (GameManager.instance.Windclass == 1)
        {
            if (index == 1)
            {
                rotorDiameter = 128;
                turbineCost = 5;
                GameManager.instance.Type = TurbineType.A;
            }
            else if (index == 2)
            {
                rotorDiameter = 90;
                turbineCost = 3;
                GameManager.instance.Type = TurbineType.B;
            }
            else if (index == 3)
            {
                rotorDiameter = 52;
                turbineCost = 1;
                GameManager.instance.Type = TurbineType.C;
            }
        }
        else if (GameManager.instance.Windclass == 2)
        {
            if (index == 1)
            {
                rotorDiameter = 90;
                turbineCost = 3;
                GameManager.instance.Type = TurbineType.D;
            }
            else if (index == 2)
            {
                rotorDiameter = 90;
                turbineCost = 2;
                GameManager.instance.Type = TurbineType.E;
            }
            else if (index == 3)
            {
                rotorDiameter = 60;
                turbineCost = 1;
                GameManager.instance.Type = TurbineType.F;
            }
        }
        else if (GameManager.instance.Windclass == 3)
        {
            if (index == 1)
            {
                rotorDiameter = 126;
                turbineCost = 4;
                GameManager.instance.Type = TurbineType.G;
            }
            else if (index == 2)
            {
                rotorDiameter = 90;
                turbineCost = 2;
                GameManager.instance.Type = TurbineType.H;
            }
            else if (index == 3)
            {
                rotorDiameter = 60;
                turbineCost = 1;
                GameManager.instance.Type = TurbineType.I;
            }
        }
        if (index == 0)
        {
            btn.SetActive(false);
        }
        GoedleAnalytics.instance.track("select.turbine_type", GameManager.instance.Type.ToString());
    }

    public void CalculateMaxNumberOfTurbines()
    {
        double number = availiableSpace / (3 * rotorDiameter);
        numberOfTurbines = (int)number;
        GameManager.instance.maxNumberOfTurbines = numberOfTurbines;
        GameManager.cost = GameManager.instance.areaInstallationCost + turbineCost;
        // load next level
        GameManager.instance.LoadSimulationLevel();
    }
}
