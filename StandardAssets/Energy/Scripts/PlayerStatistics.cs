using UnityEngine;

public class PlayerStatistics : MonoBehaviour
{

    private Simulation simulator;

    // Use this for initialization
    void Start()
    {
        simulator = GameObject.FindGameObjectWithTag("Simulator").GetComponent<Simulation>();
        InitializeCountValues();
        InvokeRepeating("CalculatePowerUsageStatistics", 0.0f, 1.0f);
    }

    void InitializeCountValues()
    {
        GameManager.instance.underPowerSec = 0;
        GameManager.instance.correctPowerSec = 0;
        GameManager.instance.overPowerSec = 0;
        GameManager.instance.profit = 0;
    }

    /*
	It holds to static variables the seconds that the player has spent in each power output scenario respectively.
	These values are later used in the end scene to calculate and display the usage of the wind farm, concerning the time spent in each scenario. 
	*/
    void CalculatePowerUsageStatistics()
    {
        if (string.Equals(simulator.powerUsage, "-Under power"))
        {
            GameManager.instance.underPowerSec++;
        }
        else if (string.Equals(simulator.powerUsage, "-Correct power"))
        {
            GameManager.instance.correctPowerSec++;
        }
        else
        {
            GameManager.instance.overPowerSec++;
            GameManager.instance.profit += simulator.totalPowerOutput - simulator.currentPowerReqs;
        }
    }

}
