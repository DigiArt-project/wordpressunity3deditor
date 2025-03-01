﻿using System.Collections;
using UnityEngine;
using UnityEngine.UI;

public class ScientistController : MonoBehaviour
{

    private Animator animator;
    public Text text;

    public GameObject levelCompleteCanvas;
    public AudioClip levelCompletedClip;

    // Use this for initialization
    void Start()
    {
        animator = gameObject.GetComponent<Animator>();
        animator.enabled = false;
        if (GameManager.currentLevel == GameManager.Levels.moleculeNaming)
        {
            SlotSpawner.MolCompleted += SetText;
        }
        else
        {
            EmptyParentMolecule.MolConstructed += SetText;
        }
        SetText();
    }

    public void SetText()
    {
        if (GameManager.currentLevel == GameManager.Levels.moleculeNaming)
        {
            if (GameManager.namedMolecules == 1)
            {
                EnableScientistPanel();
                text.text = "Good job, you have just completed your first formula naming quiz.\nKeep going!!";
                animator.enabled = true;
                StartCoroutine(WaitForSec());
            }
            else if ((GameManager.namedMolecules == 2))
            {
                levelCompleteCanvas.SetActive(true);
                SoundManager.instance.PlaySingle(levelCompletedClip);   
            }
        }
        else if(GameManager.currentLevel == GameManager.Levels.moleculeConstruction)
        {
            if (GameManager.constructedMolecules == 1)
            {
                EnableScientistPanel();
                text.text = "Good job, you have just constructed your first molecule.\nKeep going!!";
                animator.enabled = true;
                StartCoroutine(WaitForSec());
            }
            else if (GameManager.constructedMolecules == 2)
            {
                levelCompleteCanvas.SetActive(true);
                SoundManager.instance.PlaySingle(levelCompletedClip);
            }
        }
    }

    IEnumerator WaitForSec()
    {
        yield return new WaitForSeconds(5f);
        animator.enabled = false;
        //rewinds the state back to the start.
        animator.Play("ScientistPanelEntry", -1, 0f);
        HideScientistPanel();
    }

    private void OnDisable()
    {
        SlotSpawner.MolCompleted -= SetText;
        EmptyParentMolecule.MolConstructed -= SetText;
    }

    public void HideScientistPanel()
    {
        gameObject.GetComponent<Image>().enabled = false;
        gameObject.GetComponent<Transform>().GetChild(index: 0).gameObject.SetActive(false);
    }

    public void EnableScientistPanel()
    {
        gameObject.GetComponent<Image>().enabled = true;
        gameObject.GetComponent<Transform>().GetChild(index: 0).gameObject.SetActive(true);
    }


}
