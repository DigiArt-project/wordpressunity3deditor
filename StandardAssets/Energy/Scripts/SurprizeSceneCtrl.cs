using UnityEngine;
using UnityEngine.UI;
using goedle_sdk;

public class SurprizeSceneCtrl : MonoBehaviour {

    //texts
    [SerializeField] private Text text;
    [SerializeField] private Text title;

    //btns
    [SerializeField] private Text btnText1;//always correct answer
    [SerializeField] private Text btnText2;//always medium answer
    [SerializeField] private Text btnText3;//always wrong answer

    private enum States {scenario1, scenario2}
    private States state;

	// Use this for initialization
	void Start () {
        state = States.scenario1;
	}
	
	// Update is called once per frame
	void Update () {
	    if(state == States.scenario1)
        {
            Scenario1();
        }
        else if (state == States.scenario2)
        {
            Scenario2();
        }
    }

    public void Scenario1()
    {
        text.text = LocalizationService.Instance.GetTextByKeyWithLocalize("text(s1)",LocalizationService.Instance.Localization);
        title.text = LocalizationService.Instance.GetTextByKeyWithLocalize("title(s1)",LocalizationService.Instance.Localization);
        btnText2.text = LocalizationService.Instance.GetTextByKeyWithLocalize("opt1(s1)", LocalizationService.Instance.Localization);
        btnText1.text = LocalizationService.Instance.GetTextByKeyWithLocalize("opt2(s1)", LocalizationService.Instance.Localization);
        btnText3.text = LocalizationService.Instance.GetTextByKeyWithLocalize("opt3(s1)", LocalizationService.Instance.Localization);
    }

    public void Scenario2()
    {
        text.text = LocalizationService.Instance.GetTextByKeyWithLocalize("text(s2)", LocalizationService.Instance.Localization);
        title.text = LocalizationService.Instance.GetTextByKeyWithLocalize("title(s2)", LocalizationService.Instance.Localization);
        btnText2.text = LocalizationService.Instance.GetTextByKeyWithLocalize("opt1(s2)", LocalizationService.Instance.Localization);
        btnText1.text = LocalizationService.Instance.GetTextByKeyWithLocalize("opt2(s2)", LocalizationService.Instance.Localization);
        btnText3.text = LocalizationService.Instance.GetTextByKeyWithLocalize("opt3(s2)", LocalizationService.Instance.Localization);
    }

    public void BtnClicked(float score)
    {
        if (state == States.scenario1)
        { 
            state = States.scenario2;
            GameManager.score += score;
            if (score == 2) GoedleAnalytics.instance.track("choose.answer", "Scenario_1", score.ToString());
            else if(score == 1) GoedleAnalytics.instance.track("choose.answer", "Scenario_1", score.ToString());
            else GoedleAnalytics.instance.track("choose.answer", "Scenario_1","0");
        }
        else if(state == States.scenario2)
        {
            GameManager.score += score;
            if (score == 2) GoedleAnalytics.instance.track("choose.answer", "Scenario_2", score.ToString());
            else if (score == 1) GoedleAnalytics.instance.track("choose.answer", "Scenario_2", score.ToString());
            else GoedleAnalytics.instance.track("choose.answer", "Scenario_2","0");

            //final scene
            GameManager.instance.LoadLevel("EndScene");
        }
        
    }
}