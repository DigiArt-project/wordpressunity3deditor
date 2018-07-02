using UnityEngine;

public class TurbineAnimCtrl : MonoBehaviour
{

    Animator animator;
    public bool isRotating = false; //defines if the turbine is rotating or not

    // Use this for initialization
    void Start()
    {
        animator = GetComponent<Animator>();
        /*  
		The turbine game object uses the animator component to have movement (rotate).
		In the animator window there are two states in which the animatios takes place.
		- Idle where there is NO rotation
		- WindTurbineRotate where there is rotation.
		To transit between this to states we use the "Rotate" parameter.   
		*/
        animator.SetBool("Rotate", false);
        isRotating = false;
    }

    /* Changes the parameter value in the animator window, 
	and the animation state changes to idle. */
    public void DisableRotation()
    {
        animator.SetBool("Rotate", false);
        isRotating = false;
    }

    public void EnableRotation()
    {
        animator.SetBool("Rotate", true);
        isRotating = true;
    }

    /*
	Based on the speed of the wind the speed of the animation is
	also changed. To do that we use a parameter in the windTurbineRotate animation
	and change it accordigly. 
	*/
    public void SetRotationSpeed(int windspeed)
    {
        if (windspeed > 18)
        {
            animator.SetFloat("speedMultiplier", 1.0f);
        }
        else if (windspeed > 16 && windspeed < 18)
        {
            animator.SetFloat("speedMultiplier", 0.9f);
        }
        else if (windspeed <= 16 && windspeed > 8)
        {
            animator.SetFloat("speedMultiplier", 0.8f);
        }
        else if (windspeed <= 8 && windspeed > 5)
        {
            animator.SetFloat("speedMultiplier", 0.75f);
        }
        else
        {
            animator.SetFloat("speedMultiplier", 0.65f);
        }
    }

}
