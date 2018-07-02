using UnityEngine;
using goedle_sdk;

public class TurbineController : MonoBehaviour
{

    //dependacies of other scripts
    private TurbineAnimCtrl turbineAnim;
    private TurbineSpawnManager turbineSpawner;
    private TurbineInputManager inputManager;
    private Simulation simulator;
    private PauseSimulation gameManager;
    private TurbineDamage turbineDmg;
    private TurbineRepair repair;
    private Damager damager;
    private bool lowWindDisabled = false; //shows if turbine should stop rotating when wind under 4 m/s.        
    private bool scriptsEnabled = true; //used in the update function to minimize the times it calls the pause function.


    void Start()
    {
        /* "Gameobject.Find" is used cause there are many turbines gameobjects in the scene and their properties musr be inserted through script.
        We use FindWithTag to improve perfomance by minimizing the searching operations. */

        turbineDmg = gameObject.GetComponent<TurbineDamage>();
        inputManager = gameObject.GetComponent<TurbineInputManager>();
        turbineAnim = gameObject.GetComponentInChildren<TurbineAnimCtrl>();
        turbineSpawner = GameObject.FindGameObjectWithTag("Spawner").GetComponent<TurbineSpawnManager>();
        simulator = GameObject.FindGameObjectWithTag("Simulator").GetComponent<Simulation>();
        gameManager = GameObject.FindGameObjectWithTag("Simulator").GetComponent<PauseSimulation>();
        damager = GameObject.FindGameObjectWithTag("Damager").GetComponent<Damager>();
        repair = gameObject.GetComponent<TurbineRepair>();
    }


    void Update()
    {
        //checks if game is paused or not
        if (gameManager.gamePaused == true)
        {
            PauseTurbine(gameManager.gamePaused);
        }

        else
        {
            if (scriptsEnabled == false) UnPauseTurbine(gameManager.gamePaused);

            //sets the speed of the rotation based on the wind rotation
            turbineAnim.SetRotationSpeed(simulator.currentWindSpeed);
        }
    }

    public bool IsRotating()
    {
        return turbineAnim.isRotating;
    }


    #region enable / disable

    public void DisableTurbine()
    {
        //used to display the numbers for the output values next to the minimap
        StartCoroutine(simulator.calculateSubstractedPower());

        turbineAnim.DisableRotation();
        turbineSpawner.numberOfTurbinesOperating--;
        damager.RemoveTurbineFromList(gameObject); //removes the turbine game object from the list of "ready for damage" list.
    }

    public void EnableTurbine()
    {
        //used to display the numbers for the output values next to the minimap
        StartCoroutine(simulator.calculateAddedPower());

        turbineAnim.EnableRotation();
        turbineSpawner.numberOfTurbinesOperating++;
        damager.AddTurbineToList(gameObject); //adds the turbine game object to the list of "ready for damage" list.
    }

    #endregion

    #region Disable scripts on pause

    //disables all scripts if game is paused
    public void PauseTurbine(bool gamePaused)
    {
        if (gamePaused == true)
        {
            //disable animation
            turbineAnim.enabled = false;
            turbineAnim.GetComponent<Animator>().enabled = false;
            turbineSpawner.enabled = false;
            inputManager.enabled = false;

            //used in the update function to minimize the times it calls the function
            scriptsEnabled = false;
        }
    }

    //enables all scripts if game is paused
    public void UnPauseTurbine(bool gamePaused)
    {
        if (gamePaused == false)
        {
            //enable animation
            turbineAnim.enabled = true;
            turbineAnim.GetComponent<Animator>().enabled = true;
            turbineSpawner.enabled = true;
            inputManager.enabled = true;

            //used in the update function to minimize the times it calls the function
            scriptsEnabled = true;
        }
    }

    #endregion

    #region Damage / repair

    public bool IsDamaged()
    {
        return turbineDmg.isDamaged;
    }

    public void SetDamage(bool isDamaged)
    {
        turbineDmg.isDamaged = isDamaged;
    }

    public void RepairTurbine()
    {
        repair.turbineRepair();
    }

    public bool IsRepaired()
    {
        return repair.isRepaired;
    }

    //used only when a turbine gets damaged so to be able to be repaired again.
    public void SetRepair(bool repairBool)
    {
        repair.isRepaired = repairBool;
    }
    #endregion


    // OBSOLETE FUNCTION : not destroyed cause they may be used again.

    // make turbines stop rotating when wind is below 4 m/s.
    public void DisableOnWindLow()
    {
        DisableTurbine();
        lowWindDisabled = true;
    }


    // make turbines rotate again when wind is not below the low speed.
    public void EnableOnWindHigh()
    {
        EnableTurbine();
        lowWindDisabled = false;
    }

}
