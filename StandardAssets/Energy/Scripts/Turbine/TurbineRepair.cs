using UnityEngine;

public class TurbineRepair : MonoBehaviour {


	private TurbineController turbine;
    public bool isRepaired = false;

    // Use this for initialization
    void Start () {
		turbine = GetComponent<TurbineController>();
	}

	public void turbineRepair(){
			
		if(turbine.IsDamaged()){
			turbine.SetDamage(false);
			turbine.EnableTurbine();
			isRepaired = true;

		}
	}
}
