using UnityEngine;
using UnityEngine.UI;

public class ConfigurationMenu : MonoBehaviour {
    /*

	public Simulation simulator;
	public Canvas menu;

	/*public variables where used because the menu
	has specific elements and public variables make
	customizing easier and faster
	

	////////////////////////
			SLIDERS
	///////////////////////
	public Slider windMinSlider;
	public Slider windMaxSlider;
	public Slider reqsMinSlider;
	public Slider reqsMaxSlider;

	////////////////////////
			TEXT VALUES
	///////////////////////
	public Text windMinText;
	public Text windMaxText;
	public Text reqsMinText;
	public Text reqsMaxText;

	// Use this for initialization
	void Start () {
		DisableConfigMenu();
		//set default values to sliders
		SetDefautValueToSlider(windMinSlider,simulator.windMinSpeed);
		SetDefautValueToSlider(windMaxSlider,simulator.windMaxSpeed);
		SetDefautValueToSlider(reqsMinSlider,simulator.powerRequirementsMin);
		SetDefautValueToSlider(reqsMaxSlider,simulator.powerRequirementsMax);
	}
	
	
	void Update () {
		/*check if user tries to give not acceptable values(min > max)
		and block his action 
		if(menu.enabled == true){
			ValidateSliderValues();	
			SetDefautValueToSlider(windMinSlider,simulator.windMinSpeed);
			SetDefautValueToSlider(windMaxSlider,simulator.windMaxSpeed);
			SetDefautValueToSlider(reqsMinSlider,simulator.powerRequirementsMin);
			SetDefautValueToSlider(reqsMaxSlider,simulator.powerRequirementsMax);
			
			//display values next to sliders
			SetTextValue(windMinText,simulator.windMinSpeed);
			SetTextValue(windMaxText,simulator.windMaxSpeed);
			SetTextValue(reqsMinText,simulator.powerRequirementsMin);
			SetTextValue(reqsMaxText,simulator.powerRequirementsMax);
		}
	}

	void SetDefautValueToSlider(Slider slider,int value){
		slider.value = value;	
	}
	void SetTextValue(Text text,int value){
		text.text = value.ToString();
	}

	public void EnableConfigMenu(){
		menu.enabled = true;
	}

	public void DisableConfigMenu(){
		menu.enabled = false;
	}
	
	public void SetwindMax(float max){
		simulator.windMaxSpeed = (int) max;
	}
	public void SetwindMin(float min){
		simulator.windMinSpeed = (int) min;

	}
	public void SetRequirementsMax(float max){
		simulator.powerRequirementsMax = (int) max;	
	}
	public void SetRequirementsMin(float min){
		simulator.powerRequirementsMin = (int) min;	
	}
	public void SetsimulationSpeed(int index){
		if(index ==0) simulator.simulationSpeed = 1;
		else if(index ==1) simulator.simulationSpeed = 3;
		else simulator.simulationSpeed = 4; 
	}

	public void ValidateSliderValues(){
		if(simulator.windMaxSpeed < simulator.windMinSpeed){
			simulator.windMaxSpeed = simulator.windMinSpeed;
		}
		if(simulator.powerRequirementsMax < simulator.powerRequirementsMin){
			simulator.powerRequirementsMax = simulator.powerRequirementsMin;
		}
	}
    
    */
}
