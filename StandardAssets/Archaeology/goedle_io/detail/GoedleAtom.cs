using System;
using System.Collections.Generic;

namespace goedle_sdk.detail
{
	public class GoedleAtom
	{
		/* NOT YET IMPLEMENTED
		 *
		private string dev_version;
		private string app_version = null;
		private string screen = null;
		private string uuid = null;
		private string device_type = null;
		*/

		private string app_key;
		private string user_id;
		private int ts;
		private string event_name = null;
		private string event_value = null;
		private int timezone;
		private string event_id = null;
		private int build_nr;
		private string trait_key= null;
		private string trait_value = null;

		public GoedleAtom(string app_key, 
			string user_id, 
			int ts,
			string event_name,
			string event_id, 
			string event_value,
			int timezone, 
			int build_nr) {
			//ALWAYS

			this.app_key = app_key;
			this.user_id = user_id;
			if (this.user_id == null) {
				Console.Write("Maybe the GoedleAPI.init(); isn`t called in the Application class. Or you don't have set the GoedleAPI.setUserId(userId)?");
			}
			this.ts = ts;

			this.event_name = event_name;

			//ONLAUNCH
			// The Timzone is in seconds and with -1, so we have to transform it
			this.timezone = timezone;
			this.build_nr = build_nr;
			if (!string.IsNullOrEmpty(event_id))
				this.event_id = event_id;
			if (!string.IsNullOrEmpty(event_value))
				this.event_value = event_value;

		}

		public GoedleAtom(string app_key, 
			string user_id, int ts, 
			string event_name, 
			string event_id, 
			string event_value, 
			string trait_key, 
			string trait_value) {

		
			this.app_key = app_key;
			this.user_id = user_id; 
			this.ts = ts;
			this.event_name = event_name;
			if (!string.IsNullOrEmpty(event_id))
				this.event_id = event_id;
			if (!string.IsNullOrEmpty(event_value))
				this.event_value = event_value;
			if (!string.IsNullOrEmpty(trait_key))
				this.trait_key = trait_key;
				if (!string.IsNullOrEmpty(trait_value))
					this.trait_value = trait_value;
			
			// This is true if event_value is NaN
			this.timezone = Int32.MaxValue;
		}

		public Dictionary<string, object> getGoedleAtomDictionary(){
			
			Dictionary<string, object> goedleAtom = 
            new Dictionary<string, object>();
			goedleAtom.Add("app_key",this.app_key);
			goedleAtom.Add("user_id",this.user_id);
			goedleAtom.Add("ts",this.ts);
			goedleAtom.Add("event",this.event_name);
			goedleAtom.Add("build_nr",this.build_nr);

			if (this.timezone != Int32.MaxValue)
				goedleAtom.Add("timezone",this.timezone);
			if (!string.IsNullOrEmpty(event_id))
				goedleAtom.Add("event_id",this.event_id);
			if (!string.IsNullOrEmpty(event_value))
				goedleAtom.Add("event_value",this.event_value);
	
			if (!string.IsNullOrEmpty(trait_key) && !string.IsNullOrEmpty(trait_value))
				goedleAtom.Add(this.trait_key,this.trait_value);
			return goedleAtom;
		}
	}
}
