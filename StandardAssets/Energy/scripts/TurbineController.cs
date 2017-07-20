using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class TurbineController : MonoBehaviour {
	
	private TurbineInputManager inputManager;
	private Simulation simulation;
	GameObject turbineFan;
	float rotSpeed = 0;

	private bool lowWindDisabled = false; //shows if turbine should stop rotating when wind under 4 m/s.

	public bool isConstructed = false;

	public bool isRotating = false;

	public bool isEmiting = false; //Smoke 

	public bool isRepaired = false;

	public string turbineClass;
	public float  turbineEnergyOutput;
	public float  turbineCost;
	public float  turbineRotorSize;
	public string turbineWindClass;

	public float  turbineRepairCost = 0.5f;
	public float  damageProbCoefficient = 0.005f;

	// Damage 
	public bool isDamaged = false;

	private float turbineUsage;
	private int damageStartTime = 60;
	private float rate; // te rate that the method to damage the turbine will be called


	// New Vars
	public float[] turbineEnergyOutputProfile = new float[28]{0,0,0,0.1f,0.2f,0.3f,0.4f,0.5f,0.6f,0.7f,0.8f,0.9f,1,1.1f,1.2f,1.3f,1.4f,1.5f,1.6f,1.7f,1.8f,1.9f,2,2.1f,2.2f,2.2f,2.2f,2.2f};

	public float turbineCurrEnergyOutput = 0;

    // Use this for initialization
    void Start () {
		inputManager = GetComponent<TurbineInputManager>();
		turbineFan = transform.Find ("Turbine_Fan").transform.gameObject;
		simulation  = GameObject.FindGameObjectsWithTag("terrain")[0].GetComponent<Simulation>();

		// Damage
		float startCall = damageStartTime; //Random.Range(0.0f,90.0f);
		float rate = 1;       //Random.Range(120.0f,300.0f);
		InvokeRepeating("CalculateDamagePropability",startCall,rate); 		//Calls the method for the first time in "startCall" with a repeat rate of the "rate" value.		 
	}


	void Update(){
		if (simulation.gamePaused) {
			inputManager.enabled = false;
			turbineFan.transform.rotation.eulerAngles.Set(0, 0, 0);
		}else{
			inputManager.enabled = isConstructed;

			//sets the speed of the rotation based on the wind rotation
			rotSpeed = (float)(simulation.currentWindSpeed) * (float)simulation.simulationSpeed / 8;

			if (isRotating && !isDamaged)
				turbineCurrEnergyOutput = turbineEnergyOutputProfile [simulation.currentWindSpeed];
			else
				turbineCurrEnergyOutput = 0;

			if (isRotating)
				turbineFan.transform.Rotate ( new Vector3(0,0,rotSpeed), Space.Self); //  Rotate(new Vector3(0,0,rotSpeed));

			//used for disables rotation when wind is low
			if(simulation.currentWindSpeed < 3 && isRotating)
				DisableOnWindLow();
		
			 
			if(simulation.currentWindSpeed > 3 && !isRotating && lowWindDisabled)
				EnableOnWindHigh();
			
		}

		if(isDamaged && !isEmiting ){
			gameObject.transform.Find ("Turbine_Smoke").gameObject.SetActive (true);
			isEmiting = true;
		}
		else if(isRepaired && isEmiting ){
			gameObject.transform.Find ("Turbine_Smoke").gameObject.SetActive (false);
			isEmiting = false;
		}

	}


	/* 
	make turbines stop rotating when wind is below 4 m/s.
	*/
	public void DisableOnWindLow(){
		DisableTurbine();
		lowWindDisabled = true;
	}


	/* 
	make turbines rotate again when wind is not below
	the low speed.
	*/
	public void EnableOnWindHigh(){
		EnableTurbine("Enable on High Wind");
		lowWindDisabled = false;
	}

	public void repairTurbine(){
		//decreases total income
		if(simulation.totalIncome >= 1){
			simulation.totalIncome -= turbineRepairCost;
			turbineRepair();
			simulation.damagedTurbines--;
		}
	}

	public void DisableTurbine(){
		//StartCoroutine(simulation.calculateSubstractedPower());
    	isRotating = false;
		simulation.numberOfTurbinesOperating--;	
	}

	public void EnableTurbine(string who){
		//used to display the numbers for the output values next to the minimap
		//StartCoroutine(simulation.calculateAddedPower());
		isRotating = true;
		isConstructed = true;
		simulation.numberOfTurbinesOperating++;

		transform.GetComponent<BoxCollider> ().enabled = true;
	}

	public void turbineRepair(){
		if(isDamaged){
			isDamaged = false;
			EnableTurbine("Enable on Repair");
			isRepaired = true;
			isConstructed = true;
		}
	}


	/*=====================================
		Calculate the propability that a
		turbine can get damaged
 	=====================================*/
	void CalculateDamagePropability(){

		if(simulation.minutesCount >= damageStartTime && isRotating && !isDamaged && simulation.damagedTurbines <= 4){
			if (Random.Range(0.0f,1.0f) < damageProbCoefficient)
				damageTurbine();
		}
	}

	/* damages the turbine and stops it's operation */
	void damageTurbine(){
		DisableTurbine();
		isDamaged = true;
		isRepaired = false;
		isConstructed = true;
		simulation.damagedTurbines++;
	}
}


/// Obsolete way of calculating damage.
//			turbineUsage = 0.0f;
//			if( string.Compare(simulation.powerUsage,"Over power") == 0 )
//				turbineUsage = 1.3f;
//			else if(string.Compare(simulation.powerUsage,"Correct power") == 0 )
//				turbineUsage = 1.0f;
//			else 
//				turbineUsage = 0.0f;
//			float damagePropability = turbineUsage * Random.Range(0.0f,1.0f);
//
//			if(damagePropability > 0.85)
//				damageTurbine();

