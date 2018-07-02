using UnityEngine;
using UnityEngine.SceneManagement;
using goedle_sdk;


public class GameManager : MonoBehaviour
{

    //statics
    public static GameManager instance = null;
    public static int cost = 0;
    public static int replayIterations = 0;
    public static float score = 0;

    //PLayer Information
    public string playerName;
    public string playerClass;
    public string playerSchoolName;

    //simulation information
    public int simulationDurationTime;
    public int maxNumberOfTurbines = 0;
    public bool endSimulation = false;

    //usage statistics
    public int underPowerSec;
    public int correctPowerSec;
    public int overPowerSec;
    public float profit = 0;
    
    public int areaInstallationCost = 0; // defines the cost sum of area and subarea.

    //Area information
    public enum MainArea { mountains, fields, seashore }
    public MainArea Areachoice;

    public enum SubArea { archaiological, HVLines, other }
    public SubArea SubAreachoice;

    public string Language;

    //Turbine Type Information
    [SerializeField] private TurbineSelector.TurbineType type;
    public TurbineSelector.TurbineType Type { get { return type; } set { type = value; } }

    [SerializeField] private int windclass;
    public int Windclass { get { return windclass; } set { windclass = value ; } }
    
    private SceneLoader sceneLoader;

    //Content Adaptation Configurations
    public SimpleJSON.JSONNode strategy = null;

    void Awake()
    {
        //Check if instance already exists
        if (instance == null)
        {
            //if not, set instance to this
            instance = this;

        }
        //If instance already exists and it's not this:
        else if (instance != this)
        {
            //Then destroy this. This enforces our singleton pattern, meaning there can only ever be one instance of a GameManager.
            Destroy(gameObject);
        }
        //Sets this to not be destroyed when reloading scene
        DontDestroyOnLoad(gameObject);
    }

    private void Start()
    {
        playerName = null;
        playerClass = null;
        playerSchoolName = null;
        //LocalizationService.Instance.Localization = "Greek";
    }

    public void EndSimulation()
    {
        //GoedleAnalytics.track("end.simulation");
        instance.endSimulation = true;
    }

    public void SetLanguage(string lang)
    {
        if(lang.Equals("English"))
        {
            LocalizationService.Instance.Localization = "English";
        }
        else if (lang.Equals("Greek"))
        {
            LocalizationService.Instance.Localization = "Greek";
        }
        GoedleAnalytics.instance.track("change.language",LocalizationService.Instance.Localization.ToString());

    }

    #region AreaManagement

    public void SetArea(int choice)
    {
        if (choice == 1)
        {
            instance.Areachoice = MainArea.mountains;
            GoedleAnalytics.instance.track("choose.environment", "mountains");
        }
        else if (choice == 2)
        {
            instance.Areachoice = MainArea.fields;
            GoedleAnalytics.instance.track("choose.environment", "fields");
        }
        else
        {
            instance.Areachoice = MainArea.seashore;
            GoedleAnalytics.instance.track("choose.environment", "seashore");
        }
    }

    public void SetSubArea(int choice)
    {
        if (choice == 1)
        {
            instance.SubAreachoice = SubArea.archaiological;
            GoedleAnalytics.instance.track("select.sub_area", SubArea.archaiological.ToString());
        }
        else if (choice == 2)
        {
            instance.SubAreachoice = SubArea.HVLines;
            GoedleAnalytics.instance.track("select.sub_area", SubArea.HVLines.ToString());
        }
        else
        {
            instance.SubAreachoice = SubArea.other;
            GoedleAnalytics.instance.track("select.sub_area", SubArea.other.ToString());
        }
    }

    #endregion

    #region Cost Management

    public void IncrementCost(int areaCost)
    {
        cost += areaCost;
    }

    #endregion

    #region Level Management

    public void LoadSimulationLevel()
    {
        if(instance.Areachoice == MainArea.mountains)
        {
            //SceneManager.LoadScene("Stage3(Mountains)");
            sceneLoader = GameObject.FindGameObjectWithTag("SceneLoader").GetComponent<SceneLoader>();
            sceneLoader.LoadScene("Stage3(Mountains)");
            GoedleAnalytics.instance.track("select.scene", "stage3", "mountains");
        }
        else if(instance.Areachoice == MainArea.fields)
        {
            //SceneManager.LoadScene("Stage3(Plains)");
            sceneLoader = GameObject.FindGameObjectWithTag("SceneLoader").GetComponent<SceneLoader>();
            sceneLoader.LoadScene("Stage3(Plains)");
            GoedleAnalytics.instance.track("select.scene", "stage3", "plains");
        }
        else if (instance.Areachoice == MainArea.seashore)
        {
            //SceneManager.LoadScene("Stage3(Seashore)");
            sceneLoader = GameObject.FindGameObjectWithTag("SceneLoader").GetComponent<SceneLoader>();
            sceneLoader.LoadScene("Stage3(Seashore)");
            GoedleAnalytics.instance.track("select.scene", "stage3", "seashore");
        }
    }

    public void LoadSubAreaLevel()
    {
        if (instance.Areachoice == MainArea.mountains)
        {
            //SceneManager.LoadScene("Stage2(Mountains)");
            sceneLoader = GameObject.FindGameObjectWithTag("SceneLoader").GetComponent<SceneLoader>();
            sceneLoader.LoadScene("S_Mountains(SubAreas)");
            GoedleAnalytics.instance.track("select.scene", "stage2", "mountains");
        }
        else if (instance.Areachoice == MainArea.fields)
        {
            //SceneManager.LoadScene("Stage2(Plains)");
            sceneLoader = GameObject.FindGameObjectWithTag("SceneLoader").GetComponent<SceneLoader>();
            sceneLoader.LoadScene("S_Plains(SubAreas)");
            GoedleAnalytics.instance.track("select.scene", "stage2", "plains");
        }
        else if (instance.Areachoice == MainArea.seashore)
        {
            //SceneManager.LoadScene("Stage2(Seashore)");
            sceneLoader = GameObject.FindGameObjectWithTag("SceneLoader").GetComponent<SceneLoader>();
            sceneLoader.LoadScene("S_Seashore(SubAreas)");
            GoedleAnalytics.instance.track("select.scene", "stage2", "seashore");
        }
    }

    public void LoadLevel(string levelName)
    {
        SceneManager.LoadScene(levelName);
        GoedleAnalytics.instance.track("select.scene", levelName);
    }

    public void ExitGame()
    {
        Application.Quit();
    }

    public void ReplayGame()
    {
        GoedleAnalytics.instance.track("replay.simulation");
        if (replayIterations <= 5)
        {
            instance.LoadSubAreaLevel();
            replayIterations++;
            cost = 0;
            instance.profit = 0;
        }
    }

    public void RestartGame()
    {
        cost = 0;
        score = 0;  
        areaInstallationCost = 0;
        instance.profit = 0;
        replayIterations = 0;
        maxNumberOfTurbines = 0;
        endSimulation = false;
    }

    #endregion

    #region Player Information
    
    public void SetName(string text)
    {
        instance.playerName = text;
        GoedleAnalytics.instance.trackTraits("first_name",instance.playerName);
    }
    public string GetName()
    {
        return instance.playerName;
    }
    public void SetClass(string text)
    {
        instance.playerClass = text;
        GoedleAnalytics.instance.track("group", "class", instance.playerClass);
    }
    public string GetClass()
    {
        return instance.playerClass;
    }
    public void SetSchoolName(string text)
    {
        instance.playerSchoolName = text;
        GoedleAnalytics.instance.track("group", "school", instance.playerSchoolName);
    }
    public string ReturnSchoolName()
    {
        return instance.playerSchoolName;
    }
    
    #endregion

}
