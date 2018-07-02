using System.Collections;
using UnityEngine;
using UnityEngine.UI;
using goedle_sdk;


public class Simulation : MonoBehaviour
{

    [Header("Text fields")]
    public Text windText;
    public Text timeText;
    public Text powerReqText;
    public Text powerOutputText;
    public Text powerUsageText;

    [Space]
    [Header("Action added Text")] // the text that is displayed for 2 seconds(upon the minimap) when interacting with the turbine.

    //the side text next to the panel of the output power.
    public Text powerOutputSideText;
    public Image powerOutputsideImage;

    [Space]
    [Header("Simulation variables")]

    public int currentWindSpeed;
    public int currentPowerReqs;
    private int randomWindValue;

    /* =====================================
			time simulation fields
	======================================*/
    private float startTime;
    public float minutesCount;
    private float seconds;
    public int simulationSpeed = 2;
    private float time;
    private string minutes;
    private string secondstr;
    /* =====================================
		power Output simulation fields
	======================================*/
    public float totalPowerOutput;
    public TurbineSpawnManager spawnManager;

    public string powerUsage = "-Under power"; //TODO : maybe this can be changed to a enum, but it will less readable to the next developer that gets the source code.
    enum DisplayedTextValue { wind, powerReqs, powerOutput, powerUsage }

    //arrays wind
    private int[] wind = new int[15];
    private int[] windClass1 = { 1, 2, 3, 4, 5, 6, 5, 6, 7, 8, 9, 10, 11, 12, 13 };
    private int[] windClass2 = { 1, 2, 3, 4, 5, 3, 4, 5, 3, 6, 7, 8, 9, 10, 11 };
    private int[] windClass3 = { 1, 2, 3, 4, 2, 3, 4, 2, 3, 5, 6, 7, 8, 9, 10 };

    //arrays turbine output
    private float[] singleTurbineOutput = new float[15];

    //!power array has index 0 always set to 0.0f otherwize always the match between wind and output arrays will not be the same.
    //TURBINES MOUNTAINS
    private float[] turbineOutput_A = {0.0f, 0.01f, 0.02f, 0.05f, 0.09f, 0.19f, 0.38f, 0.19f, 0.38f, 0.75f, 1.50f, 3.0f, 6.0f, 6.0f, 6.0f, 6.0f };
    private float[] turbineOutput_B = {0.0f, 0.01f, 0.01f, 0.02f, 0.05f, 0.09f, 0.19f, 0.09f, 0.19f, 0.38f, 0.75f, 1.5f, 3.0f, 3.0f, 3.0f, 3.0f };
    private float[] turbineOutput_C = {0.0f, 0.0f, 0.0f, 0.01f, 0.01f, 0.03f, 0.06f, 0.03f, 0.06f, 0.11f, 0.23f, 0.45f, 0.9f, 0.9f, 0.9f, 0.9f };

    //TURBINES FIELDS
    private float[] turbineOutput_D = {0.0f, 0.02f, 0.05f, 0.09f, 0.19f, 0.38f, 0.09f, 0.19f, 0.38f, 0.09f, 0.75f, 1.5f, 3.0f, 3.0f, 3.0f, 3.0f };
    private float[] turbineOutput_E = {0.0f, 0.02f, 0.03f, 0.06f, 0.13f, 0.25f, 0.06f, 0.13f, 0.25f, 0.06f, 0.5f, 1.0f, 2.0f, 2.0f, 2.0f, 2.0f };
    private float[] turbineOutput_F = {0.0f, 0.01f, 0.01f, 0.03f, 0.05f, 0.11f, 0.03f, 0.05f, 0.11f, 0.03f, 0.21f, 0.43f, 0.85f, 0.85f, 0.85f, 0.85f };

    //TURBINES SEASHORE
    private float[] turbineOutput_G = {0.0f, 0.05f, 0.09f, 0.19f, 0.38f, 0.09f, 0.19f, 0.38f, 0.09f, 0.19f, 0.75f, 1.5f, 3.0f, 3.0f, 3.0f, 3.0f };
    private float[] turbineOutput_H = {0.0f, 0.03f, 0.06f, 0.13f, 0.25f, 0.06f, 0.13f, 0.25f, 0.06f, 0.13f, 0.5f, 1.0f, 2.0f, 2.0f, 2.0f, 2.0f };
    private float[] turbineOutput_I = {0.0f, 0.01f, 0.03f, 0.05f, 0.11f, 0.03f, 0.05f, 0.11f, 0.03f, 0.05f, 0.21f, 0.43f, 0.85f, 0.85f, 0.85f, 0.85f };

    //used for analytics goodle.sdk
    private float nextActionTime = 0.0f;
    private float period = 10.0f;



    void Start()
    {
        powerOutputSideText.enabled = false;
        powerOutputsideImage.enabled = false;

        CalculatePowerRequirements();
        currentWindSpeed = 10;
        startTime = Time.time;
        InitializeWindArray();
        InitializeOutputArray();
        GoedleAnalytics.instance.track("start.simulation");

        // wind speed
        InvokeRepeating("CalculateWindSpeed", 0.0f, 10.0f);
    }

    // Update is called once per frame
    void Update()
    {
        CalculateTime();
        EndSimulation();
        // Sending game state every 15 seconds
        /*if (Time.time > nextActionTime)
        {
            nextActionTime += period;
            GoedleAnalytics.track("game.state", "currentWindSpeed", currentWindSpeed.ToString());
            GoedleAnalytics.track("game.state", "currentPowerReqs", currentPowerReqs.ToString());
            GoedleAnalytics.track("game.state", "powerUsage", powerUsage.ToString());
            GoedleAnalytics.track("game.state", "numberOfTurbines", GameManager.instance.maxNumberOfTurbines.ToString());
            GoedleAnalytics.track("game.state", "numberOfTurbinesOperating", spawnManager.numberOfTurbinesOperating.ToString());
        }*/
    }

    //it is not called every frame, but every fixed frame (helps performance).
    void FixedUpdate()
    {
        CalculatePowerOutput();
        CalculatePowerUsage();
    }

    void InitializeWindArray()
    {
        if (GameManager.instance.Windclass == 1)
        {
            wind = windClass1;
        }
        else if (GameManager.instance.Windclass == 2)
        {
            wind = windClass2;
        }
        else if (GameManager.instance.Windclass == 3)
        {
            wind = windClass3;
        }
        else
        {
            wind = windClass1;
        }
    }

    void InitializeOutputArray()
    {
        if (GameManager.instance.Type == TurbineSelector.TurbineType.A)
        {
            singleTurbineOutput = turbineOutput_A;
        }
        else if (GameManager.instance.Type == TurbineSelector.TurbineType.B)
        {
            singleTurbineOutput = turbineOutput_B;
        }
        else if (GameManager.instance.Type == TurbineSelector.TurbineType.C)
        {
            singleTurbineOutput = turbineOutput_C;
        }
        else if (GameManager.instance.Type == TurbineSelector.TurbineType.D)
        {
            singleTurbineOutput = turbineOutput_D;
        }
        else if (GameManager.instance.Type == TurbineSelector.TurbineType.E)
        {
            singleTurbineOutput = turbineOutput_E;
        }
        else if (GameManager.instance.Type == TurbineSelector.TurbineType.F)
        {
            singleTurbineOutput = turbineOutput_F;
        }
        else if (GameManager.instance.Type == TurbineSelector.TurbineType.G)
        {
            singleTurbineOutput = turbineOutput_G;
        }
        else if (GameManager.instance.Type == TurbineSelector.TurbineType.H)
        {
            singleTurbineOutput = turbineOutput_H;
        }
        else if (GameManager.instance.Type == TurbineSelector.TurbineType.I)
        {
            singleTurbineOutput = turbineOutput_I;
        }
    }

    #region Calculated Simulation values

    void CalculateTime()
    {
        Time.timeScale = simulationSpeed;
        time = Time.time - startTime;
        minutes = ((int)(time / 60)).ToString();
        minutesCount = ((int)(time / 60));
        seconds = (time % 60);
        secondstr = ((int)seconds).ToString();
        timeText.text = minutes + ":" + secondstr;
    }

    void CalculateWindSpeed()
    {
        randomWindValue = Random.Range(0, 14);
        currentWindSpeed = wind[randomWindValue];
        DisplayText(DisplayedTextValue.wind);
    }

    void CalculatePowerRequirements()
    {
        currentPowerReqs = 6;
        DisplayText(DisplayedTextValue.powerReqs);
    }

    //it matches the generated power arrays with wind class arrays.
    void CalculatePowerOutput()
    {
        totalPowerOutput = spawnManager.GetNumOfTurbinesOperating() * singleTurbineOutput[randomWindValue + 1]; //we increment by one because the first value of output array is zero.
        DisplayText(DisplayedTextValue.powerOutput);
    }


    void CalculatePowerUsage()
    {
        int localpowerDiff = (int)totalPowerOutput - currentPowerReqs;
        if (localpowerDiff < 0)
        {
            powerUsage = "-Under power";
            powerUsageText.color = Color.red;
        }
        else if ((totalPowerOutput - currentPowerReqs) > 2)
        {
            powerUsage = "-Over power";
            powerUsageText.color = Color.blue;
        }
        else
        {
            powerUsage = "-Correct power";
            powerUsageText.color = Color.green;
        }
        DisplayText(DisplayedTextValue.powerUsage);
    }

    #endregion


    #region Added / substracted action power
    /* displays the added power output to the total amount 
	that each turbine is producing (text above the power output)*/
    public IEnumerator calculateAddedPower()
    {
        float addedAmount = singleTurbineOutput[randomWindValue + 1];
        powerOutputSideText.text = " + " + addedAmount.ToString();
        powerOutputSideText.enabled = true;
        powerOutputsideImage.enabled = true;
        yield return new WaitForSeconds(2f);
        powerOutputSideText.enabled = false;
        powerOutputsideImage.enabled = false;
    }

    public IEnumerator calculateSubstractedPower()
    {
        float substractedAmount = singleTurbineOutput[randomWindValue + 1];
        powerOutputSideText.text = " - " + substractedAmount.ToString();
        powerOutputSideText.enabled = true;
        powerOutputsideImage.enabled = true;
        yield return new WaitForSeconds(2f);
        powerOutputSideText.enabled = false;
        powerOutputsideImage.enabled = false;
    }

    #endregion


    #region DisplayText

    void DisplayText(DisplayedTextValue textValue)
    {

        if (textValue == DisplayedTextValue.wind)
        {
            windText.text = currentWindSpeed.ToString();
        }
        else if (textValue == DisplayedTextValue.powerOutput)
        {
            powerOutputText.text = totalPowerOutput.ToString("F2");
        }
        else if (textValue == DisplayedTextValue.powerReqs)
        {
            powerReqText.text = currentPowerReqs.ToString();
        }
        else if (textValue == DisplayedTextValue.powerUsage)
        {
            powerUsageText.text = powerUsage;
        }
    }

    #endregion


    #region Control Simulation

    public void EndSimulation()
    {
        if (minutesCount >= GameManager.instance.simulationDurationTime || GameManager.instance.endSimulation == true)
        {
            minutesCount = 0;
            GameManager.instance.endSimulation = false;
            GameManager.instance.LoadLevel("S_Stats");
            //Resources.UnloadUnusedAssets(); //removes unused assets to free memory
        }
    }

    #endregion

}