using UnityEngine.UI;
using UnityEngine;
using goedle_sdk;

public class ConfigMenu : MonoBehaviour {

    [SerializeField] private Canvas canvas;
    [SerializeField] private Simulation simulator;

	// Use this for initialization
	void Start () {
        canvas.enabled = false;
	}
 
	public void EnableCanvas()
    {
        canvas.enabled = true;
        GoedleAnalytics.instance.track("configure.open", "menu");
    }

    public void DisableCanvas()
    {
        canvas.enabled = false;
    }

    public void SetsimulationSpeed(int index)
    {
        if (index == 0)
        {
            simulator.simulationSpeed = 1;
            GoedleAnalytics.instance.track("configure.simulation_speed", "normal_speed");
        }
        else if (index == 1)
        {
             simulator.simulationSpeed = 3;
            GoedleAnalytics.instance.track("configure.simulation_speed", "fast_speed");
        }
        else simulator.simulationSpeed = 1;
    }
}
