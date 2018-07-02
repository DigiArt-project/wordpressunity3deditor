using System;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;
using goedle_sdk;

public class DisplayStatistics : MonoBehaviour
{

    public Text underPower;
    public Text correctPower;
    public Text overPower;
    public Text Cost;
    public Text profit;
    public Text score;
    private int underPowerMin;
    private int correctPowerMin;
    private int overPowerMin;
    float underPowerPercent;
    float correctPowerPercent;
    float overPowerPercent;

    // Use this for initialization
    void Start()
    {
        DisplayUsage();
        DisplayCost();
        DisplayProfit();
        if (SceneManager.GetActiveScene().name == "EndScene")
        {
            DisplayScore();
        }
    }

    private void DisplayCost()
    {
        String cost = GameManager.cost.ToString();
        GoedleAnalytics.instance.track("game.result", "cost", GameManager.cost.ToString());
        Cost.text = cost + " $";
    }

    void DisplayUsage()
    {
        float sumOfTime = GameManager.instance.underPowerSec + GameManager.instance.correctPowerSec + GameManager.instance.overPowerSec;
        underPowerPercent = (GameManager.instance.underPowerSec / sumOfTime) * 100.0f;
        correctPowerPercent = (GameManager.instance.correctPowerSec / sumOfTime) * 100.0f;
        overPowerPercent = (GameManager.instance.overPowerSec / sumOfTime) * 100.0f;
        underPower.text = underPowerPercent.ToString("F2") + " % ";
        correctPower.text = correctPowerPercent.ToString("F2") + " % ";
        overPower.text = overPowerPercent.ToString("F2") + " % ";

        //analytics
        GoedleAnalytics.instance.track("game.result", "underpower",underPowerPercent.ToString());
        GoedleAnalytics.instance.track("game.result", "correct_power",correctPowerPercent.ToString());
        GoedleAnalytics.instance.track("game.result", "overpower", overPowerPercent.ToString());

    }

    void DisplayProfit()
    {
        profit.text = (GameManager.instance.profit * 0.001f).ToString("F2") + " $ ";
        GoedleAnalytics.instance.track("game.result", "profit", (GameManager.instance.profit * 0.001f).ToString("F2"));
    }

    void DisplayScore()
    {
        CalculateAreaScore();
        CalculateTurbineScore();

        if (GameManager.score <= 4)
        {
            score.text = "With the selections you made throughout the game you earned " + GameManager.score.ToString() +
            " out of 10. Consider to read the instructions more carefully and try again.";

            //score localization / implementation
            score.text = LocalizationService.Instance.GetTextByKeyWithLocalize("score(bronze_1)", LocalizationService.Instance.Localization) + GameManager.score.ToString()
                        + LocalizationService.Instance.GetTextByKeyWithLocalize("score(bronze_2)", LocalizationService.Instance.Localization);
        }
        else if (GameManager.score > 4 && GameManager.score <= 7)
        {
            score.text = "Very good! With the selections you made throughout the game you earned " + GameManager.score.ToString() +
            " out of 10. Surely you can improve your problem-solving skills by rethinking if there are better options you can choose next time.";

            //score localization / implementation
            score.text = LocalizationService.Instance.GetTextByKeyWithLocalize("score(xalkino_1)", LocalizationService.Instance.Localization) + GameManager.score.ToString()
                    + LocalizationService.Instance.GetTextByKeyWithLocalize("score(xalkino_2)", LocalizationService.Instance.Localization);
        }
        else
        {
            score.text = "Congratulations! With the selections you made throughout the game you earned " + GameManager.score.ToString() +
            " out of 10. This means that you have high problem-solving skills.";

            //score localization / implementation
            score.text = LocalizationService.Instance.GetTextByKeyWithLocalize("score(gold_1)", LocalizationService.Instance.Localization) + GameManager.score.ToString()
                    + LocalizationService.Instance.GetTextByKeyWithLocalize("score(gold_2)", LocalizationService.Instance.Localization);
        }
        GoedleAnalytics.instance.track("game.result", "score",GameManager.score.ToString());
    }


    void CalculateAreaScore()
    {
        //AREAS AND SUBAREAS
        if (GameManager.instance.Areachoice == GameManager.MainArea.mountains)
        {
            GameManager.score += 2;
            if (GameManager.instance.areaInstallationCost == 3) GameManager.score += 2;
            else if (GameManager.instance.areaInstallationCost == 5) GameManager.score += 1;
            else GameManager.score += 0;
        }
        else if (GameManager.instance.Areachoice == GameManager.MainArea.fields)
        {
            GameManager.score += 1;
            if (GameManager.instance.areaInstallationCost == 2) GameManager.score += 2;
            else if (GameManager.instance.areaInstallationCost == 4) GameManager.score += 1;
            else GameManager.score += 0;
        }
        else
        {
            if (GameManager.instance.areaInstallationCost <= 3) GameManager.score += 2;
            else if (GameManager.instance.areaInstallationCost == 5) GameManager.score += 1;
            else GameManager.score += 0;
        }
    }

    void CalculateTurbineScore()
    {
        if (GameManager.instance.Type == TurbineSelector.TurbineType.A ||
            GameManager.instance.Type == TurbineSelector.TurbineType.D ||
            GameManager.instance.Type == TurbineSelector.TurbineType.G)
        {
            GameManager.score += 2;
        }
        else if (GameManager.instance.Type == TurbineSelector.TurbineType.B ||
                GameManager.instance.Type == TurbineSelector.TurbineType.E ||
                GameManager.instance.Type == TurbineSelector.TurbineType.H)
        {
            GameManager.score += 1;
        }
        else
        {
            GameManager.score += 0;
        }
    }

}
