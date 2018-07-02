using UnityEngine;
using UnityEngine.UI;
using System.Collections.Generic;

public class DropdownController : MonoBehaviour {

    private Dropdown dropdown;
    [SerializeField] private List<string> DropdownOptions = new List<string>();

    // Use this for initialization
    void Start () {
        dropdown = gameObject.GetComponent<Dropdown>();
        dropdown.ClearOptions();
        SetDropdownValues();
    }

    void DisplayTurbineOptions()
    {
        dropdown.ClearOptions();
        dropdown.AddOptions(DropdownOptions);
    }

    public void SetDropdownValues()
    {
        dropdown.value = 0;
        if (GameManager.instance.Windclass == 1)
        {
            DropdownOptions.Clear();
            DropdownOptions.Add(" ");
            DropdownOptions.Add("Turbine A");
            DropdownOptions.Add("Turbine B");
            DropdownOptions.Add("Turbine C");
        }
        if (GameManager.instance.Windclass == 2)
        {
            DropdownOptions.Clear();
            DropdownOptions.Add(" ");
            DropdownOptions.Add("Turbine D");
            DropdownOptions.Add("Turbine E");
            DropdownOptions.Add("Turbine F");
        }
        if (GameManager.instance.Windclass == 3)
        {
            DropdownOptions.Clear();
            DropdownOptions.Add(" ");
            DropdownOptions.Add("Turbine G");
            DropdownOptions.Add("Turbine H");
            DropdownOptions.Add("Turbine I");
        }
        DisplayTurbineOptions();
    }
}
