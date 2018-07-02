using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;


/*
This class sets the materials when a turbine is not hover or it is hovered by the mouse.
Then it's public methods are called from the TurbineInputManager class to assign the correct material. 
*/
public class HighlightObject : MonoBehaviour {

	public Renderer[] childrenRenderers;
	[Header ("Materials")]
	[SerializeField] private Material dafaultMat;
	[SerializeField] private Material highlightedMat;
	[SerializeField] private Material transparentMat;

    // Use this for initialization
    void Start () {
		GetComponents();
	}
	
	void GetComponents (){
		childrenRenderers = GetComponentsInChildren<Renderer>();
		foreach(Renderer rend in childrenRenderers){
			rend.material = getDefaultMat();
		}
	}

	/*
	////////////////////////
		Material Setters
	///////////////////////
	*/

	public void SetUnDamagedMat (bool mouseIsOver){
		if(mouseIsOver == true){
			foreach(Renderer rend in childrenRenderers){
				rend.material = getHighlightedMat();
			}
		}
		else {
			foreach(Renderer rend in childrenRenderers){
				rend.material = getDefaultMat();
			}
		}
	}
	
	public void SetDamagedMat (bool mouseIsOver){
		if(mouseIsOver == true){
			foreach(Renderer rend in childrenRenderers){
				rend.material = getHighlightedMat();
			}
		}
		else {
			foreach(Renderer rend in childrenRenderers){
				rend.material = getTransparentMat();
			}
		}
	}

	/*
	////////////////////////
		Material getters
	///////////////////////
	 */

    public Material getDefaultMat(){
		return dafaultMat;
	}
	public Material getHighlightedMat(){
		return highlightedMat;
	}
	public Material getTransparentMat(){
		return transparentMat;	
	}


}
