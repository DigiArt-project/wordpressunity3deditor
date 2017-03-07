using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class DisplayVideo_Script : MonoBehaviour {

	private MovieTexture movie;
	private AudioSource audio;

	void Start () {
		GameObject go = GameObject.Find (this.gameObject.name + "Video");

		movie = (MovieTexture) go.GetComponent<RawImage>().texture;
		audio = go.gameObject.GetComponent<AudioSource> ();
		audio.clip = movie.audioClip;
	}

	public void onPauseClick(){
		if (movie.isPlaying) {
			movie.Pause ();
			audio.Pause ();
		}
	}

	public void onStopClick(){
		if (movie.isPlaying) {
			movie.Stop();
			audio.Stop ();
		}
	}

	public void onPlayClick(){
		if (!movie.isPlaying) {
			movie.Play ();
			audio.Play ();
		}
	}
}
