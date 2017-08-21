/*
    *** do not modify the line below, it is updated by the build scripts ***
    goedle.io SDK for Unity version v1.0.0
*/

#if !UNITY_PRO_LICENSE && (UNITY_2_6||UNITY_2_6_1||UNITY_3_0||UNITY_3_0_0||UNITY_3_1||UNITY_3_2||UNITY_3_3||UNITY_3_4||UNITY_3_5||UNITY_4_0||UNITY_4_0_1||UNITY_4_1||UNITY_4_2||UNITY_4_3||UNITY_4_5||UNITY_4_6)
#define DISABLE_GOEDLE
#warning "Your Unity version does not support native plugins - goedle.io disabled"
#endif

#if !(UNITY_STANDALONE_OSX || UNITY_STANDALONE_WIN || UNITY_EDITOR || UNITY_IOS || UNITY_ANDROID)
#define DISABLE_GOEDLE
#warning "Your Unity version does not support native plugins - goedle.io disabled"
#endif

using UnityEngine;
using System;
using System.Text;
using System.Collections.Generic;

namespace goedle_sdk
{

    /// <summary>
    /// Core class for interacting with %goedle.io .
    /// </summary>
    /// <description>
    /// <p>Create a GameObject and attach this %goedle.io component. Then, set the properties in the unity inspector (app_key, api_key)</p>
    /// <p>Use the GoedleAnalytics class to set up your project and track events with %goedle.io . Once you have
    /// a component, you can track events in %goedle.io Engagement using <c>GoedleAnalytics.track(string eventName)</c>.
    /// </description>

    public class GoedleAnalytics : MonoBehaviour
    {
        /*! \cond PRIVATE */
        #region settings
        [Header("Project")]
        [Tooltip("The app_key of the goedle.io project.")]
        public string app_key = "";
        [Tooltip("The api_key of the goedle.io project.")]
        public string api_key = "";
        [Tooltip("The api_key of the goedle.io project.")]
        public string disable = "To enable look at tracking_enabled field";
        #endregion
        /*! \endcond */


		public static bool tracking_enabled = false;

        /// <summary>
        /// Tracks an event.
        /// </summary>
        /// <param name="event">the name of the event to send</param>
        public static void track(string eventName)
        {
            #if !DISABLE_GOEDLE
            if (tracking_enabled)
				instance.track(eventName);
            #endif
        }

		/// <summary>
		/// Tracks an event.
		/// </summary>
		/// <param name="event">the name of the event to send</param>
		/// <param name="event_id">the name of the event to send</param>

		public static void track(string eventName, string eventId)
		{
			#if !DISABLE_GOEDLE
			if (tracking_enabled)
				instance.track(eventName,eventId);
			#endif
		}

		/// <summary>
		/// Tracks an event.
		/// </summary>
		/// <param name="event">the name of the event to send</param>
		/// <param name="event_id">the id of the event to send</param>
		/// <param name="event_value">the value of the event to send</param>

		public static void track(string eventName, string eventId, string event_value)
		{
			#if !DISABLE_GOEDLE
			if (tracking_enabled)
				instance.track(eventName,eventId,event_value);
			#endif
		}


		/// <summary>
		/// Identify function for a user.
		/// </summary>
		/// <param name="trait_key">for now only last_name and first_name is supported</param>
		/// <param name="trait_value">the value of the key</param>

		public static void identify(string traitKey, string traitValue)
		{
			#if !DISABLE_GOEDLE
			if (tracking_enabled)
				instance.track(null, null, null, traitKey, traitValue);
			#endif
		}

		#region internal
		static goedle_sdk.detail.GoedleAnalytics gio_interface;
		private static goedle_sdk.detail.GoedleAnalytics instance
		{
			get
			{
				return gio_interface;
			}
		}

        

        void Awake()
        {
            DontDestroyOnLoad(this);
            #if DISABLE_GOEDLE
            tracking_enabled = false;
            Debug.LogWarning("Your Unity version does not support native plugins. Disabling goedle.io.");
            #endif
			Debug.Log ('GIO SDK initialized');
			System.Guid user_id = System.Guid.NewGuid();

			if (tracking_enabled && gio_interface  == null) {				
				gio_interface = new goedle_sdk.detail.GoedleAnalytics (api_key, app_key, user_id.ToString("D"));
            }
        }

        void OnDestroy()
        {
			if (tracking_enabled)
			{
			// Future Usage
			}
        }

		#endregion

    }

}