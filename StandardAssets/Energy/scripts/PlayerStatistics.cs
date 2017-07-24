using UnityEngine;
using UnityEngine.SceneManagement;
using goedle_sdk;

public class PlayerStatistics : MonoBehaviour {

	private Simulation simulation;
	public static int underPowerSec;
    public static int correctPowerSec;
    public static int overPowerSec;
	public static float moneyEarned;
	public static float energyProduced;

    // Use this for initialization
    void Start () {

		if(!SceneManager.GetActiveScene().name.Equals("S_Reward")){ // if not the last scene

			GameObject[] gost = GameObject.FindGameObjectsWithTag ("terrain");

			if ( GameObject.FindGameObjectsWithTag("terrain").Length > 0) // in the case there is no terrain be safe
				simulation = GameObject.FindGameObjectsWithTag("terrain")[0].GetComponent<Simulation>();

			underPowerSec = 0;
			correctPowerSec = 0;
			overPowerSec = 0;
			moneyEarned = 0;
			energyProduced = 0;

			InvokeRepeating("CalculatePowerUsageStatistics", 0.0f, 1.0f);
		}
	}

	void Update(){

		/* Stops the simulation and loads the end scene in the game. This can be achieved either by clicking on the exit button,
		or after 24 minutes have passed. */
		if(!SceneManager.GetActiveScene().name.Equals("S_Reward") && simulation){  // if not the last scene
			if(simulation.minutesCount >= 24){
				terminateSimulation ();
			}
		}
	}


	public void ExitButtonPressed(){
		terminateSimulation ();
	}
	

	void terminateSimulation(){

		GoedleAnalytics.track ("end.simulation");
		SceneManager.LoadScene("S_Reward" ); // loads last scene
		Resources.UnloadUnusedAssets(); //removes unused assets to free memory
	}

	/*
	It holds to static variables the seconds that the player has spent in each power output scenario respectively.
	These values are later used in the end scene to calculate and display the usage of the wind farm, concerning the time spent in each scenario. 
	*/
 	void CalculatePowerUsageStatistics(){
		if( !SceneManager.GetActiveScene().name.Equals("S_Reward") ){

			if (simulation) { // be sure that there is a terrain
				moneyEarned = simulation.totalIncome;
				energyProduced = simulation.totalEnergyProduced;


				if (string.Equals (simulation.powerUsage, "Under power")) {
					underPowerSec++;
				} else if (string.Equals (simulation.powerUsage, "Correct power")) {
					correctPowerSec++;
				} else {
					overPowerSec++;
				}
			}
		}
	}

	void GetPlayerInfo(){}
}
