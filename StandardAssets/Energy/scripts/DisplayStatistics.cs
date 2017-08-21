using UnityEngine;
using UnityEngine.UI;
using goedle_sdk;

public class DisplayStatistics : MonoBehaviour {

	public Text underPowerUsageText;
	public Text correctPowerUsageText;
	public Text overPowerUsageText;
	public Text usage;
	public Text moneyEarnedText;
	public Text energyProducedText;

    private int underPowerMin;
    private int correctPowerMin;
    private int overPowerMin;
    private int underPowerSec;
    private int correctPowerSec;
    private int overPowerSec;
	private float moneyEarned;
	private float energyProduced;

    // Use this for initialization
    void Start () {

		underPowerUsageText = GameObject.Find("txt_underpower").GetComponent<Text>();
		correctPowerUsageText = GameObject.Find("txt_correctpower").GetComponent<Text>();
		overPowerUsageText = GameObject.Find("txt_overpower").GetComponent<Text>();
		usage = GameObject.Find("txt_overall_evaluation").GetComponent<Text>();
		moneyEarnedText = GameObject.Find("txt_money_earned").GetComponent<Text>();
		energyProducedText = GameObject.Find("txt_energy_produced").GetComponent<Text>();

		ConvertSecondToMin();
		DisplayPlayerStatistics();
	}

	void ConvertSecondToMin(){
		underPowerMin = PlayerStatistics.underPowerSec/60;
		underPowerSec = PlayerStatistics.underPowerSec%60;
		correctPowerMin = PlayerStatistics.correctPowerSec/60;
		correctPowerSec = PlayerStatistics.correctPowerSec%60;
		overPowerMin = PlayerStatistics.overPowerSec/60;
		overPowerSec = PlayerStatistics.overPowerSec%60;

		moneyEarned = PlayerStatistics.moneyEarned;
		energyProduced = Mathf.Round(PlayerStatistics.energyProduced*10)/10;


	}
	
	void DisplayPlayerStatistics(){
		GoedleAnalytics.track ("submit.score", "time_underpower", (underPowerMin*60+underPowerSec).ToString());
		GoedleAnalytics.track ("submit.score", "time_correctpower", (correctPowerMin*60+correctPowerSec).ToString());
		GoedleAnalytics.track ("submit.score", "time_overpower", (overPowerMin*60+overPowerSec).ToString());
		GoedleAnalytics.track ("submit.score", "money_earned", moneyEarned.ToString());
		GoedleAnalytics.track ("submit.score","energy_produced",energyProduced.ToString());
		GoedleAnalytics.track ("submit.score","time_played",(underPowerMin*60+underPowerSec+correctPowerMin*60+correctPowerSec+overPowerMin*60+overPowerSec).ToString() );

		underPowerUsageText.text = "Under power :  " + underPowerMin.ToString() + " minutes and " + underPowerSec.ToString() + " seconds" ;
		correctPowerUsageText.text = "Correct power :  " + correctPowerMin.ToString() + " minutes and " + correctPowerSec.ToString() + " seconds" ;
		overPowerUsageText.text = "Over power :  " + overPowerMin.ToString() + " minutes and " + overPowerSec.ToString() + " seconds" ;

		moneyEarnedText.text = "Money earned: $" + moneyEarned;

		energyProducedText.text = "Energy produced: " + energyProduced + " MWh";

		// set text msg based on power usage.
		if (underPowerMin > correctPowerMin && underPowerMin > overPowerMin){
			usage.text = "The wind farm was mostly working in under Power, not very efficient.";		
		}
		else if (overPowerMin > correctPowerMin && overPowerMin > underPowerMin){
			usage.text = "The wind farm was mostly working in over Power, not very efficient.";	
		}
		else if (correctPowerMin > underPowerMin && correctPowerMin > overPowerMin){
			usage.text = "The wind farm was mostly working in correct Power, very efficient.";
		}
		else if (underPowerSec > correctPowerSec && underPowerSec > overPowerSec){
			usage.text = "The wind farm was mostly working in under Power, not very efficient.";		
		}
		else if(overPowerSec > correctPowerSec && overPowerSec > underPowerSec){
			usage.text = "The wind farm was mostly working in over Power, not very efficient.";	
		}
		else {
			usage.text = "The wind farm was mostly working in correct Power, very efficient.";
		}
	}

}
