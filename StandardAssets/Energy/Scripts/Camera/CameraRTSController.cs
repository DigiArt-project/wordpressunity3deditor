using UnityEngine;

[RequireComponent(typeof(Camera))]

public class CameraRTSController : MonoBehaviour
{

    [Header("Movement Speeds")]
    [Space]
    [SerializeField] private float panSpeed;
    [SerializeField] private float zoomSpeed;
    [SerializeField] private Vector2 zoomLimit;

    [Header("Movement Limits")]
    [Space]
    [SerializeField] private bool enableBounds;
    [SerializeField] private Vector2 heightLimit;
    [SerializeField] private Vector2 lenghtLimit;
    [SerializeField] private Vector2 widthLimit;

    
    private Vector3 initialPos;
    private Vector3 panMovement;
    private Vector3 pos;
    private bool rotationActive = false;
    private Vector3 lastMousePosition;
    private Quaternion initialRot;
    private float panIncrease = 0.0f;

    [Header("Rotation")]
    [Space]
    [SerializeField] private bool rotationEnabled;
    [SerializeField] private float rotateSpeed;
    [SerializeField] private float rotationAngle;

    private float ScreenEdgeBorderThickness = 5.0f;


    // Use this for initialization
    void Start()
    {
        initialPos = transform.position;
        initialRot = transform.rotation;
        if (rotationAngle > 180) rotationAngle = 179;
    }


    void Update()
    {
        #region Movement

        //if (!rotationActive)
        //{

        panMovement = Vector3.zero;

        if (Input.GetKey(KeyCode.W) || Input.mousePosition.y >= Screen.height - ScreenEdgeBorderThickness)
        {
            panMovement += Vector3.forward * panSpeed * Time.deltaTime;
        }
        if (Input.GetKey(KeyCode.S) || Input.mousePosition.y <= ScreenEdgeBorderThickness)
        {
            panMovement -= Vector3.forward * panSpeed * Time.deltaTime;
        }
        if (Input.GetKey(KeyCode.A) || Input.mousePosition.x <= ScreenEdgeBorderThickness)
        {
            panMovement += Vector3.left * panSpeed * Time.deltaTime;
        }
        if (Input.GetKey(KeyCode.D) || Input.mousePosition.x >= Screen.width - ScreenEdgeBorderThickness)
        {
            panMovement += Vector3.right * panSpeed * Time.deltaTime;

        }
        if (Input.GetKey(KeyCode.Q))
        {
            panMovement += Vector3.up * panSpeed * Time.deltaTime;
        }
        if (Input.GetKey(KeyCode.E))
        {
            panMovement += Vector3.down * panSpeed * Time.deltaTime;
        }
        //}

        transform.Translate(panMovement, Space.World);

        #endregion

        #region Zoom

        Camera.main.fieldOfView -= Input.mouseScrollDelta.y * zoomSpeed;
        Camera.main.fieldOfView = Mathf.Clamp(Camera.main.fieldOfView, zoomLimit.x, zoomLimit.y);

        #endregion

        #region mouse rotation

        if (rotationEnabled)
        {
            // Mouse Rotation
            if (Input.GetMouseButton(0))
            {
                rotationActive = true;
                Vector3 mouseDelta;
                if (lastMousePosition.x >= 0 &&
                    lastMousePosition.y >= 0 &&
                    lastMousePosition.x <= Screen.width &&
                    lastMousePosition.y <= Screen.height)
                    mouseDelta = Input.mousePosition - lastMousePosition;
                else
                {
                    mouseDelta = Vector3.zero;
                }

                //yaw rotation
                var rotation = Vector3.up * Time.deltaTime * rotateSpeed * mouseDelta.x;

                /*
                pitch rotation
                rotation += Vector3.left * Time.deltaTime * rotateSpeed * mouseDelta.y;
                */

                // Make sure z rotation stays locked
                rotation.z = 0;
                transform.Rotate(rotation, Space.World);

            }

            if (Input.GetMouseButtonUp(0))
            {
                rotationActive = false;
            }

            lastMousePosition = Input.mousePosition;

        }


        #endregion


        #region boundaries

        
        if (enableBounds == true)
        {
            //movement limits
            pos = transform.position;
            pos.y = Mathf.Clamp(pos.y, heightLimit.x, heightLimit.y);
            pos.z = Mathf.Clamp(pos.z, lenghtLimit.x, lenghtLimit.y);
            pos.x = Mathf.Clamp(pos.x, widthLimit.x, widthLimit.y);
            transform.position = pos;

            //rotation limits
            Vector3 rot = transform.rotation.eulerAngles;
            if (rot.y > 0 && rot.y < rotationAngle) rot.y = rot.y;
            else if (rot.y > rotationAngle && rot.y < 180 - rotationAngle) rot.y = rotationAngle;
            else if (rot.y > 360 - rotationAngle && rot.y < 360) rot.y = rot.y;
            else if (rot.y < 360 - rotationAngle && rot.y > 180) rot.y = 360 - rotationAngle;
            transform.rotation = Quaternion.Euler(rot);
        }


        #endregion

        if (Input.GetKeyDown(KeyCode.R) || Input.GetMouseButton(2))
        {
            SetTransform(initialPos,initialRot);
        }
    }

    void SetTransform(Vector3 pos , Quaternion rot)
    {
        transform.position = pos;
        transform.rotation = rot;
    }

}
