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

    public bool endSimulation = false;
  
    // Use this for initialization
    void Start () {




		endSimulation = false;
		if(!SceneManager.GetActiveScene().name.Equals("S_Reward")){ // if not the last scene
			simulation = GameObject.FindGameObjectsWithTag("terrain")[0].GetComponent<Simulation>();
			InitializeCountValues();
			InvokeRepeating("CalculatePowerUsageStatistics", 0.0f, 1.0f);
		}
	}

	void Update(){
		checkEndSimulation();
	}

	void InitializeCountValues(){
		underPowerSec = 0;
		correctPowerSec = 0;
		overPowerSec = 0;
		moneyEarned = 0;
		energyProduced = 0;
	}


	/*
	Stops the simulation and loads the end scene in the game. This can be achieved either by clicking on the exit button,
	or after 24 minutes have passed.
	*/
	public void checkEndSimulation(){
		if(!SceneManager.GetActiveScene().name.Equals("S_Reward")){  // if not the last scene
			if(simulation.minutesCount >= 24 || endSimulation == true){
				GoedleAnalytics.track ("end.simulation");
				SceneManager.LoadScene("S_Reward" ); // loads last scene
				Resources.UnloadUnusedAssets(); //removes unused assets to free memory
			}
		}
	}

	public void ExitButtonPressed(){
		endSimulation = true;
	}
	

	/*
	It holds to static variables the seconds that the player has spent in each power output scenario respectively.
	These values are later used in the end scene to calculate and display the usage of the wind farm, concerning the time spent in each scenario. 
	*/
 	void CalculatePowerUsageStatistics(){
		if( !SceneManager.GetActiveScene().name.Equals("S_Reward") ){

			moneyEarned = simulation.totalIncome;
			energyProduced = simulation.totalEnergyProduced;


			if(string.Equals(simulation.powerUsage,"Under power")){
				underPowerSec++;
			}
			else if(string.Equals(simulation.powerUsage,"Correct power")){
				correctPowerSec++;
			}
			else {
				overPowerSec++;
			}
		}
	}

	void GetPlayerInfo(){
	}
}
