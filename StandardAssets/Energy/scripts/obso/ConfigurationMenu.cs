using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using goedle_sdk;

public class ConfigurationMenu : MonoBehaviour {

	public GameObject simulator;
	public Canvas menu;

	/*public variables where used because the menu
	has specific elements and public variables make
	customizing easier and faster
	*/

	/*////////////////////////
			SLIDERS
	///////////////////////*/
//	public Slider windMinSlider;
//	public Slider windMaxSlider;
//	public Slider reqsMinSlider;
//	public Slider reqsMaxSlider;
//
	/*////////////////////////
			TEXT VALUES
	///////////////////////*/
//	public Text windMinText;
//	public Text windMaxText;
//	public Text reqsMinText;
//	public Text reqsMaxText;

	// Use this for initialization
	void Start () {
		menu.GetComponent<CanvasGroup>().alpha = 0f;

		simulator.GetComponent<Simulation> ();

		//set default values to sliders
//		SetDefautValueToSlider(windMinSlider, simulator.GetComponent<Simulation> ().windMinSpeed);
//		SetDefautValueToSlider(windMaxSlider, simulator.GetComponent<Simulation> ().windMaxSpeed);
//		SetDefautValueToSlider(reqsMinSlider, simulator.GetComponent<Simulation> ().powerRequirementsMin);
//		SetDefautValueToSlider(reqsMaxSlider, simulator.GetComponent<Simulation> ().powerRequirementsMax);
	}
	
	
	void Update () {
		/*check if user tries to give not acceptable values(min > max)
		and block his action */
//		if( menu.GetComponent<CanvasGroup>().alpha == 1){
//			ValidateSliderValues();	
//			SetDefautValueToSlider(windMinSlider,simulator.GetComponent<Simulation> ().windMinSpeed);
//			SetDefautValueToSlider(windMaxSlider,simulator.GetComponent<Simulation> ().windMaxSpeed);
//			SetDefautValueToSlider(reqsMinSlider,simulator.GetComponent<Simulation> ().powerRequirementsMin);
//			SetDefautValueToSlider(reqsMaxSlider,simulator.GetComponent<Simulation> ().powerRequirementsMax);
//			
//			//display values next to sliders
//			SetTextValue(windMinText,simulator.GetComponent<Simulation> ().windMinSpeed);
//			SetTextValue(windMaxText,simulator.GetComponent<Simulation> ().windMaxSpeed);
//			SetTextValue(reqsMinText,simulator.GetComponent<Simulation> ().powerRequirementsMin);
//			SetTextValue(reqsMaxText,simulator.GetComponent<Simulation> ().powerRequirementsMax);
//		}
	}

//	void SetDefautValueToSlider(Slider slider,int value){
//		slider.value = value;	
//	}
//	void SetTextValue(Text text,int value){
//		text.text = value.ToString();
//	}

	public void showConfigMenu(){

		if (menu.GetComponent<CanvasGroup>().alpha == 0 ){
			menu.GetComponent<CanvasGroup>().alpha = 1f;
			GoedleAnalytics.track ("configure.open","OpenConfigurationPanel");

		} else {
			menu.GetComponent<CanvasGroup>().alpha = 0f;
			//		GoedleAnalytics.track ("configure.wind_speed", "max ", simulator.GetComponent<Simulation> ().windMaxSpeed.ToString() );
			//		GoedleAnalytics.track ("configure.wind_speed", "min ", simulator.GetComponent<Simulation> ().windMinSpeed.ToString() );
			//		GoedleAnalytics.track ("configure.power", "max ", simulator.GetComponent<Simulation> ().powerRequirementsMax.ToString() );
			//		GoedleAnalytics.track ("configure.power", "min ", simulator.GetComponent<Simulation> ().powerRequirementsMin.ToString() );
			GoedleAnalytics.track ("configure.simulation_speed", null, simulator.GetComponent<Simulation> ().simulationSpeed.ToString() );
			GoedleAnalytics.track ("configure.close", "CloseConfigurationPanel");
		}

	}


//	public void SetwindMax(float max){
//		simulator.GetComponent<Simulation> ().windMaxSpeed = (int) max;
//	}
//	public void SetwindMin(float min){
//		simulator.GetComponent<Simulation> ().windMinSpeed = (int) min;
//
//	}
//	public void SetRequirementsMax(float max){
//		simulator.GetComponent<Simulation> ().powerRequirementsMax = (int) max;	
//	}
//	public void SetRequirementsMin(float min){
//		simulator.GetComponent<Simulation> ().powerRequirementsMin = (int) min;	
//	}

	public void SetsimulationSpeed(){

		int index = GameObject.Find("dropdown_sim_speed").GetComponent<Dropdown>().value;

		if(index ==0) simulator.GetComponent<Simulation> ().simulationSpeed = 1;
		else if(index ==1) simulator.GetComponent<Simulation> ().simulationSpeed = 4;
		else simulator.GetComponent<Simulation> ().simulationSpeed = 10; 
	}

//	public void ValidateSliderValues(){
//
//		if(simulator.GetComponent<Simulation> ().windMaxSpeed < simulator.GetComponent<Simulation> ().windMinSpeed){
//			simulator.GetComponent<Simulation> ().windMaxSpeed = simulator.GetComponent<Simulation> ().windMinSpeed;
//		}
//		if(simulator.GetComponent<Simulation> ().powerRequirementsMax < simulator.GetComponent<Simulation> ().powerRequirementsMin){
//			simulator.GetComponent<Simulation> ().powerRequirementsMax = simulator.GetComponent<Simulation> ().powerRequirementsMin;
//		}
//	}
}
