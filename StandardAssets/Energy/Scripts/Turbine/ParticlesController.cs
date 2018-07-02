using UnityEngine;

public class ParticlesController : MonoBehaviour
{


    private TurbineController turbine;
    private Transform turbinePosition;
    private bool isEmiting = false;
    private GameObject obj;

    // Use this for initialization
    void Start()
    {
        turbinePosition = GetComponent<Transform>();
        turbine = GetComponent<TurbineController>();
    }

    void Update()
    {

        if (turbine.IsDamaged() == true && isEmiting == false)
        {
            EmitParticle();
        }
        else if (turbine.IsRepaired() == true && isEmiting == true)
        {
            StopParticle();
        }
    }

    public void EmitParticle()
    {
        SetAndInstantiateParticle();
        isEmiting = true;
    }

    //set the position of the particle effect and istantiates it.
    public void SetAndInstantiateParticle()
    {
        obj = ObjectPooler.current.GetPooledObject();
        if (obj == null) return;

        obj.transform.position = new Vector3(turbinePosition.position.x, turbinePosition.position.y + 48, turbinePosition.position.z);
        obj.SetActive(true);
    }

    public void StopParticle()
    {
        obj.SetActive(false);
        isEmiting = false;
    }

}
