using System.Collections.Generic;
using UnityEngine;

public class Damager : MonoBehaviour {

    [SerializeField] private List<GameObject> rotatingTurbines = new List<GameObject>();
    private TurbineSpawnManager spawner;
    int randomCell = 0;


    // Use this for initialization
    void Start () {
        InvokeRepeating("DamageTurbine",60.0f,30.0f); //damage one randomly.
    }


    void DamageTurbine()
    {
        if (rotatingTurbines.Count > 0) // if at least one turbine operating.
        {
            randomCell = Random.Range(0, rotatingTurbines.Count);
            if (!rotatingTurbines[randomCell].GetComponent<TurbineDamage>().isDamaged)
            {
                rotatingTurbines[randomCell].GetComponent<TurbineDamage>().DamageTurbine();
            }
        }
    }

    public void AddTurbineToList(GameObject gameobject)
    {
        rotatingTurbines.Add(gameobject);
    }

    public void RemoveTurbineFromList(GameObject gameobject)
    {
        rotatingTurbines.Remove(gameobject);
    }
}
