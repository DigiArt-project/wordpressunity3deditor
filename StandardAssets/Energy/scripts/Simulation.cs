using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using goedle_sdk;

public class Simulation : MonoBehaviour {

	[Header("Income Configuration")]
	public float totalIncome = 8;
	public float incomeWhenOverPower = 0.5f;
	public float incomeWhenCorrectPower = 1;
	public float incomeWhenUnderPower = 0;

	[Header("Wind speed configuration")]
	public float MeanSpeedWind = 5;
	public float VarSpeedWind = 1f;
	public int MinSpeedWind = 0;
	public int MaxSpeedWind = 25;

	[Header("Penalties")]
	public float accessPenalty = 2;
	public float archaelogyPenalty = 2;
	public float naturalReservePenalty = 2;
	public float hvDistancePenalty = 2;

	[Header("Internal variables")]
	public float minutesCount;
	public int simulationSpeed = 4; 
	public string powerUsage = "Under power" ;
	public int currentWindSpeed;   
	public float totalEnergyProduced = 0;

	[Header("Internals")]
	public int numberOfTurbinesOperating = 0;
	public int damagedTurbines = 0;

	/* pause vars */
	public bool gamePaused = false;

	private Color red = new Color(2,0,0,1);
	private Color green = new Color (0, 118, 0, 255);
	private Color blue = Color.blue;

	Text txt_energyTotal;
	Text windText;
	Text timeText;
	Text powerReqText;
	Text powerOutputText;
	Text powerUsageText;
	Text incomeText;
	Text powerOutputSideText;
	Text wind_mean_var;
	Image powerOutputsideImage;

	float startTime;
	float currentPowerReqs;
	float totalPowerOutput;
	float prevtotalPowerOutput;
	string prev_power_consumption = " ";
	int prevSimulationSpeed;


	int calcInterval = 5;

    void Start(){

		totalIncome -=  accessPenalty - archaelogyPenalty - naturalReservePenalty - hvDistancePenalty;

		prevSimulationSpeed = simulationSpeed;

		windText = GameObject.Find("s1_txt_wind_value").GetComponent<Text>();
		wind_mean_var = GameObject.Find("s1_txt_wind_mean_var").GetComponent<Text>();
		timeText = GameObject.Find("s1_txt_time_value").GetComponent<Text>();
		powerReqText = GameObject.Find("s1_txt_pow_req_value").GetComponent<Text>();
		powerOutputText = GameObject.Find("s1_txt_pow_output_value").GetComponent<Text>();
		powerUsageText = GameObject.Find("PowerUsageText").GetComponent<Text>();
		incomeText = GameObject.Find("s1_txt_income_value").GetComponent<Text>();
		powerOutputSideText = GameObject.Find("sideText").GetComponent<Text>();
		powerOutputsideImage = GameObject.Find("sideImage").GetComponent<Image>();
		txt_energyTotal = GameObject.Find ("s1_txt_energy_value").GetComponent<Text>();

		Time.timeScale = simulationSpeed;

		txt_energyTotal.text = "0";

		wind_mean_var.text = "" + MeanSpeedWind + " \u00B1 " + VarSpeedWind;

		powerOutputSideText.enabled = false;
		powerOutputsideImage.enabled = false;

		startTime = Time.time;
	}

	void Awake() {
		InvokeRepeating("CalculateWindSpeed", 0, calcInterval);
		InvokeRepeating ("sumConsumersPower", 0, calcInterval); 
		InvokeRepeating("incomeCalculation",  0, calcInterval);
	}
	

	// Update is called once per frame
	void Update () {
		DisplayText("income");

		CalculateTime();

		if (prevtotalPowerOutput != totalPowerOutput) {
			//StartCoroutine (calculateAddedPower ());
			prevtotalPowerOutput = totalPowerOutput;
		}

		//made to call the method only when a change has occured and not every frame (optimization purposes)
		if(!string.Equals(powerUsage, prev_power_consumption) ){

			Color targetColor;

			if (string.Equals (powerUsage, "Under power"))
				targetColor = Color.red;
			else if(string.Equals(powerUsage,"Correct power"))
				targetColor = Color.white;
			else 
				targetColor = Color.blue;

			GameObject[] consumersGO = GameObject.FindGameObjectsWithTag ("consumer");
				foreach(GameObject go in consumersGO)
					foreach (Transform tr in go.transform)
						tr.gameObject.GetComponent<Renderer> ().material.color = targetColor;

			prev_power_consumption = powerUsage;
		}
	}

	//it is not called every frame, but every fixed frame (helps performance).
//	void FixedUpdate(){
//		calculateOutputPower();
//		CalculatePowerUsage();
//	}

	/*  Calculate Time flow  */
	void CalculateTime(){
		Time.timeScale = simulationSpeed;
		float time = Time.time - startTime ;
		string minutes = ((int) (time/60)).ToString();
		minutesCount = ((int) (time/60));
		float seconds = (time%60);
		string secondstr = ((int)seconds).ToString("D2");
		timeText.text = minutes + ":" +secondstr ;
	}


	/* Wind speed calculation */
	void CalculateWindSpeed(){
		currentWindSpeed = (int) (NextGaussianFloat () * Mathf.Sqrt (VarSpeedWind) + MeanSpeedWind);

		// apply limits
		currentWindSpeed = currentWindSpeed <= MinSpeedWind ? MinSpeedWind : currentWindSpeed;
		currentWindSpeed = currentWindSpeed >= MaxSpeedWind ? MaxSpeedWind : currentWindSpeed;

		DisplayText("wind");	
	}


	/* Power requirements calculation */
	void sumConsumersPower(){

		sumProducersPower ();

		GameObject[] allconsumers = GameObject.FindGameObjectsWithTag ("consumer");
		currentPowerReqs = 0;

		foreach (GameObject c in allconsumers)
			currentPowerReqs += c.transform.GetComponentInParent<ConsumerScript> ().CurrPowerConsume;

		evalBalance();

		DisplayText("powerReqs");
	}

	/* Calculate power Output */
	void sumProducersPower(){

		GameObject[] allproducers = GameObject.FindGameObjectsWithTag ("producer");

		totalPowerOutput = 0;
		foreach (GameObject p in allproducers)
			totalPowerOutput += p.transform.GetComponentInParent<TurbineController> ().turbineCurrEnergyOutput;

		totalEnergyProduced += totalPowerOutput * simulationSpeed / 60;

		DisplayText("powerOutput");
	}


    /* 	Calculate income */
    void incomeCalculation(){

		if(string.Equals(powerUsage,"Under power"))
			totalIncome += incomeWhenUnderPower;
	
		if(string.Equals(powerUsage,"Correct power"))
			totalIncome += incomeWhenCorrectPower;

		if(string.Equals(powerUsage,"Over power"))
			totalIncome += incomeWhenOverPower;


		DisplayText("income");
	}

	/* 
	=====================================
		Calculate power Usage
	=====================================
	*/
	void evalBalance(){
		sumProducersPower();

		float localpowerDiff = totalPowerOutput - currentPowerReqs;

		if (localpowerDiff < 0){
			powerUsage = "Under power";
			powerUsageText.color = red;
		}
		else if( localpowerDiff > 1.2 * currentPowerReqs){   
			powerUsage = "Over power";
			powerUsageText.color = blue;
		}
		else {
			powerUsage = "Correct power";
			powerUsageText.color = green;
		}
		DisplayText("powerUsage");
	}

	/*  Display text based on the given string */
	void DisplayText(string whatTypeToDisplay){
		
		if(string.Equals(whatTypeToDisplay,"wind")){
			windText.text = currentWindSpeed.ToString() + " m/sec";
		}
		else if(string.Equals(whatTypeToDisplay,"powerOutput")){
			powerOutputText.text = totalPowerOutput.ToString("0.0") + " MW";
			txt_energyTotal.GetComponent<Text> ().text = totalEnergyProduced.ToString("0.0") + " MWh";
		}
		else if(string.Equals(whatTypeToDisplay,"powerReqs")){
			powerReqText.text = currentPowerReqs.ToString("0.0") + " MW";
		}
		else if(string.Equals(whatTypeToDisplay,"powerUsage")){
			powerUsageText.text = powerUsage;
		}
		else if(string.Equals(whatTypeToDisplay,"income")){
			incomeText.text = "$" + totalIncome.ToString();
		}
		else{
			Debug.Log("wrong input at DisplayText() , check given parameters");
		}

	}


	/* Pause Simulation */
	public void PauseButtonPressed(){

		if(!gamePaused){
			gamePaused = true;
			prevSimulationSpeed = simulationSpeed;
			simulationSpeed = 0;
			GoedleAnalytics.track ("pause.simulation");
		} else {
			gamePaused = false;
			simulationSpeed = prevSimulationSpeed;
			GoedleAnalytics.track ("resume.simulation");
		}
	}


	public static float NextGaussianFloat()
	{
		float u, v, S;
		do
		{
			u = 2.0f * Random.value - 1.0f;
			v = 2.0f * Random.value - 1.0f;
			S = u * u + v * v;
		}
		while (S >= 1.0f);
		float fac = Mathf.Sqrt(-2.0f *  Mathf.Log((float) S) / (float)S);
		return u * fac;
	}
}



// Obsolete power consumption

//		int powerAdjust;
//		int powerAdjustMultiplier = (Mathf.FloorToInt(Random.Range(5.0f,8.0f)))*100;	
//		int powerDirectionAmount = Mathf.FloorToInt(Random.Range(6.0f,9.0f));
//		
//		if( powerChangeDirection == 0 ){
//			// decrease
//			powerAdjust = Mathf.FloorToInt(Random.Range(-3.0f,0.0f))*powerAdjustMultiplier;
//			if((currentPowerReqs + powerAdjust) >= powerRequirementsMin){
//				currentPowerReqs += powerAdjust;
//			}
//			powerChangeCounter--;
//			if(powerChangeCounter == 0){
//				powerDirectionAmount = Mathf.FloorToInt(Random.Range(3.0f,6.0f));
//				powerChangeCounter = Mathf.FloorToInt(Random.Range(powerDirectionAmount,powerDirectionAmount + 3.0f));
//				powerChangeDirection = 1;
//			}
//		}
//		else{
//			// increase
//			powerAdjust = (Mathf.FloorToInt(Random.Range(1.0f,4.0f))) * powerAdjustMultiplier;
//			if((currentPowerReqs + powerAdjust) <= powerRequirementsMax){
//				currentPowerReqs += powerAdjust;
//			}
//			powerChangeCounter--;
//			if( powerChangeCounter == 0 ){
//				powerDirectionAmount = Mathf.FloorToInt(Random.Range(3.0f,6.0f));
//				powerChangeCounter = Mathf.FloorToInt(Random.Range(powerDirectionAmount,powerDirectionAmount + 3.0f));
//				powerChangeDirection = 0;
//			}
//		}
//		CalculateBarriers("powerReqs");




// Old method to calculate wind speed


//		int windAdjust;
//		if(windChangeDirection == 0){
//			// display decrease icon 
//			windIncreaseIcon.enabled = false;
//			windDecreaseIcon.enabled = true;
//			windAdjust = Mathf.FloorToInt(Mathf.Floor(Random.Range(-3.0f,0.0f)));
//			if((currentWindSpeed + windAdjust) >= windMinSpeed){
//				currentWindSpeed += windAdjust;
//			}
//			windChangeCounter--;
//			if(windChangeCounter == 0){
//				windChangeCounter = Mathf.FloorToInt(Mathf.Floor(Random.Range(2.0f,5.0f)));
//				windChangeDirection = 1;
//			}
//		}
//		 else{
//			// display increase icon
//			windDecreaseIcon.enabled = false;
//			windIncreaseIcon.enabled = true;
//			windAdjust = Mathf.FloorToInt(Mathf.Floor(Random.Range(1.0f,4.0f)));
//			if((currentWindSpeed+windAdjust) <= windMaxSpeed){
//				currentWindSpeed += windAdjust;	
//			}
//			windChangeCounter--;
//			if(windChangeCounter == 0){
//				windChangeCounter = Mathf.FloorToInt(Mathf.Floor(Random.Range(2.0f,5.0f)));
//				windChangeDirection = 0;
//			}		
//		}
//		CalculateBarriers("wind");




//
//void CalculateBarriers(string whatTypeForBarrierCheck){
//	//wind	
//	if(string.Equals(whatTypeForBarrierCheck,"wind")){
//		if(currentWindSpeed > windMaxSpeed){
//			currentWindSpeed = windMaxSpeed;
//		}
//		else if(currentWindSpeed < windMinSpeed){
//			currentWindSpeed = windMinSpeed;
//		}
//	}
//	// power Reqs
//	else if(string.Equals(whatTypeForBarrierCheck,"powerReqs")){
//
//		if(currentPowerReqs > powerRequirementsMax){
//			currentPowerReqs = powerRequirementsMax;
//		}
//		else if(currentPowerReqs < powerRequirementsMin){
//			currentPowerReqs = powerRequirementsMin;
//		}
//	}
//	else{
//		Debug.Log("wrong input at CalculateBarriers() , check given parameters");
//	}
//}

//	/* displays the added power output to the total amount 
//	that each turbine is producing (text above the power output)*/
//    public IEnumerator calculateAddedPower()
//    {
//		float addedAmount = totalPowerOutput - prevtotalPowerOutput;       //singlePowerOutput[currentWindSpeed];
//
//		powerOutputSideText.text = " + " + (addedAmount).ToString();
//
//		powerOutputSideText.enabled = true;
//		powerOutputsideImage.enabled = true;
//		yield return new WaitForSeconds(2f);
//		powerOutputSideText.enabled = false;
//		powerOutputsideImage.enabled = false;
//    }


//	public IEnumerator calculateSubstractedPower()
//    {
//		float substractedAmount = totalPowerOutput - prevtotalPowerOutput; // singlePowerOutput[currentWindSpeed];
//		powerOutputSideText.text = " - " + (substractedAmount).ToString();
//		powerOutputSideText.enabled = true;
//		powerOutputsideImage.enabled = true;
//		yield return new WaitForSeconds(2f);
//		powerOutputSideText.enabled = false;
//		powerOutputsideImage.enabled = false;
//    }