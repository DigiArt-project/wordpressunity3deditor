using UnityEngine;

public class ChangeBuildingsMaterial : MonoBehaviour
{

    private Renderer rend;
    [SerializeField] private Material defaultMat;
    [SerializeField] private Material redMat;
    [SerializeField] private Material blueMat;
    private Simulation simulator;
    private string usage;
    private bool minimapLayer = false;

    void Start()
    {
        usage = " ";
        simulator = GameObject.FindGameObjectWithTag("Simulator").GetComponent<Simulation>();
        rend = GetComponent<Renderer>();
        if (gameObject.layer == 8)
        {
            minimapLayer = true;
        }
    }

    void Update()
    {
        //made to call the method only when a change has occured and not every frame (optimization purposes)
        if (!(string.Equals(simulator.powerUsage, usage)))
        {
            ChangeMat();
            usage = simulator.powerUsage;
        }
    }

    void ChangeMat()
    {

        if (minimapLayer == true)
        {
            if (string.Equals(simulator.powerUsage, "-Under power"))
            {
                rend.material = redMat;
            }
            else if (string.Equals(simulator.powerUsage, "-Correct power"))
            {
                rend.material = defaultMat;
            }
            else
            {
                rend.material = blueMat;
            }
        }
        else
        {
            rend.material = defaultMat;
        }
    }


}
