using System;
using System.Text;
using System.Collections.Generic;
using System.Net;
using UnityEngine;
using System.Collections;

namespace goedle_sdk.detail
{
	public class GoedleHttpClient
	{


	
		public GoedleHttpClient ()
		{
		}
			
		//public async void send(string[] pass)
		public void send(string[] pass)
				{
				Dictionary<string, string> headers = 
				new Dictionary<string, string>();
				headers.Add("Content-Type", "application/json");
				headers.Add("Authorization", pass[1]);
				UnitySystemConsoleRedirector.Redirect();
				// To Check Content before it is send
				byte[] pData = Encoding.UTF8.GetBytes(pass[0].ToCharArray());

				new WWW(GoedleConstants.TRACK_URL, pData, headers);
		}
}
}