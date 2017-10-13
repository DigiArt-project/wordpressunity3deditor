using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using System;


public class Options_Script : MonoBehaviour {

	Menu_Script ms;

	void Start(){

//		ms = GameObject.Find ("mainCanvas").GetComponent<Menu_Script> ();
//
//		// Visualization : vr on or off
//		GameObject vrOptionsToggleBt = GameObject.Find ("vrOptionsToggleBt");
//
//		vrOptionsToggleBt.GetComponent<Toggle> ().onValueChanged.SetPersistentListenerState(0, UnityEngine.Events.UnityEventCallState.Off); 
//		vrOptionsToggleBt.GetComponent<Toggle> ().isOn = ms.ovrMode;
//		vrOptionsToggleBt.GetComponent<Toggle> ().onValueChanged.SetPersistentListenerState(0, UnityEngine.Events.UnityEventCallState.RuntimeOnly); 
//
//		// Input : OcculusController or Keyboard 
//		GameObject vrInputToggleBt = GameObject.Find ("vrInputToggleBt");
//
//		vrInputToggleBt.GetComponent<Toggle> ().onValueChanged.SetPersistentListenerState(0, UnityEngine.Events.UnityEventCallState.Off); 
//		vrInputToggleBt.GetComponent<Toggle> ().isOn = ms.occulusControllerUse;
//		vrInputToggleBt.GetComponent<Toggle> ().onValueChanged.SetPersistentListenerState(0, UnityEngine.Events.UnityEventCallState.RuntimeOnly); 
//
//		// Occulus camera height
//		InputField inputFieldOcculus = GameObject.Find ("InputOcculusHeightField").GetComponent<InputField> ();
//
//		inputFieldOcculus.placeholder.GetComponent<Text>().text = ms.occulusHeight.ToString ();
	}

	public void onToggleVrBt(){
//		if (ms.ovrMode)
//			ms.ovrMode = false;
//		else 
//			ms.ovrMode = true;
	}


	public void onToggleInputBt(){

//		if (ms.occulusControllerUse)
//			ms.occulusControllerUse = false;
//		else 
//			ms.occulusControllerUse = true;
	}

	public void onInputHeightEditEnd(){

//		InputField inputFieldOcculus = GameObject.Find ("InputOcculusHeightField").GetComponent<InputField> ();
//			
//		try{
//			ms.occulusHeight = float.Parse(inputFieldOcculus.text);
//		}catch(Exception e){
//			ms.occulusHeight = 1;
//			inputFieldOcculus.placeholder.GetComponent<Text>().text = "1";
//		}
	}

}
