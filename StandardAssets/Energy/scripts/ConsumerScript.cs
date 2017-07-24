using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ConsumerScript : MonoBehaviour {


	public float MeanPowerConsume = 0.5f;
	public float VarPowerConsume = 0.1f;
	public float MinPowerConsume = 0f;
	public float MaxPowerConsume = 1f;
	public float CurrPowerConsume = 0.5f;

	private GameObject infoQuad;
	private GameObject infoQuadText;

	void Awake(){
		InvokeRepeating("updateInfoConsumerText", 0,5);
	}

	// Use this for initialization
	void Start () {

		infoQuad = transform.Find("InfoQuad").gameObject;
		infoQuadText = infoQuad.transform.Find("InfoQuadText").gameObject;

		infoQuadText.GetComponent<TextMesh> ().text = MeanPowerConsume + " MW\n" + "\u00B1" + "\n" + VarPowerConsume + " MW";
	}
	
	// Update is called once per frame
	void Update () {
		CurrPowerConsume = NextGaussianFloat () * Mathf.Sqrt (VarPowerConsume) + MeanPowerConsume;

		// Apply limits
		CurrPowerConsume = CurrPowerConsume > MaxPowerConsume ? MaxPowerConsume : CurrPowerConsume;
		CurrPowerConsume = CurrPowerConsume < MinPowerConsume ? MinPowerConsume : CurrPowerConsume;

		infoQuad.transform.LookAt (GameObject.Find ("camera").GetComponent<Camera> ().transform.position);


	}


	void updateInfoConsumerText(){
		//infoQuadText.GetComponent<TextMesh>().text = CurrPowerConsume.ToString ("0.0") + " MW";  
	}



	public static float NextGaussianFloat()
	{
		float u, v, S;
		do
		{
			u = 2.0f * Random.value - 1.0f;
			v = 2.0f * Random.value - 1.0f;
			S = u * u + v * v;
		}
		while (S >= 1.0f);

		float fac = Mathf.Sqrt(-2.0f *  Mathf.Log((float) S) / (float)S);
		return u * fac;
	}
}
