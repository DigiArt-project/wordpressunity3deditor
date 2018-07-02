using UnityEngine;

public class TurbineSpawnManager : MonoBehaviour
{

    [Header("Prefab")]
    public GameObject turbinePrefab;
    [Space]
    [Header("SpawnPoint")]
    public Transform spawnPoint;
    [Space]
    [Header("Counters")]
    public float posIncrement;
    public int numberOfTurbinesOperating = 0;
    public int numberOfDamagedTurbines = 0;


    void Awake()
    {
        if (GameManager.instance.maxNumberOfTurbines == 0)
        {
            GameManager.instance.maxNumberOfTurbines = 10;
        }

        SpawnTurbines();
    }


    void SpawnTurbines()
    {
        for (int i = 0; i < GameManager.instance.maxNumberOfTurbines; i++)
        {
            spawnPoint.position = new Vector3(spawnPoint.position.x +
            posIncrement, spawnPoint.position.y, spawnPoint.position.z);
            Instantiate(turbinePrefab, spawnPoint.position,spawnPoint.rotation); // adds turbines to the specified transform point (spawnPoint).
        }
    }


    public int GetNumOfTurbinesOperating()
    {
        return numberOfTurbinesOperating;
    }
}
