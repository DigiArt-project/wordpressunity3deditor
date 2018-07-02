using UnityEngine;

public class TurbineDamage : MonoBehaviour
{

    public bool isDamaged = false;
    private TurbineController turbine;

    void Start()
    {
        turbine = GetComponent<TurbineController>();
    }

    public void DamageTurbine()
    {
        turbine.DisableTurbine();
        isDamaged = true;
        turbine.SetRepair(false); // In case the turbine is repaired previously we set the repair boolean to false, so to be availiable for repairing.
    }

}
