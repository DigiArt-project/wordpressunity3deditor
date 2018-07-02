using UnityEngine;

public class RandomGaussianGenerator : MonoBehaviour {


    public static int GenerateNormalRandom(float mean, float sigma,int min,int max)
    {
        float rand1 = Random.Range(0.0f, 1.0f);
        float rand2 = Random.Range(0.0f, 1.0f);

        float n = Mathf.Sqrt(-2.0f * Mathf.Log(rand1)) * Mathf.Cos((2.0f * Mathf.PI) * rand2);

        int generatedNumber = Mathf.FloorToInt (mean + sigma * n);

        generatedNumber = Mathf.Clamp(generatedNumber, min, max);

        return generatedNumber;
    }

}
