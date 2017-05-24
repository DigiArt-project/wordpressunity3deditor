<?php
/**
 * Created by PhpStorm.
 * User: tpapazoglou
 * Date: 24/5/2017
 * Time: 12:44 μμ
 */


add_action( 'wp_ajax_handle_dropped_media', 'BMP_handle_dropped_media' );

// if you want to allow your visitors of your website to upload files, be cautious.
add_action( 'wp_ajax_nopriv_handle_dropped_media', 'BMP_handle_dropped_media' );



function BMP_handle_dropped_media() {
	status_header(200);

	$upload_dir = wp_upload_dir();
	$upload_path = $upload_dir['path'] . DIRECTORY_SEPARATOR;
	$num_files = count($_FILES['file']['tmp_name']);

	$newupload = 0;

	if ( !empty($_FILES) ) {
		$files = $_FILES;
		foreach($files as $file) {
			$newfile = array (
				'name' => $file['name'],
				'type' => $file['type'],
				'tmp_name' => $file['tmp_name'],
				'error' => $file['error'],
				'size' => $file['size']
			);

			$_FILES = array('upload'=>$newfile);
			foreach($_FILES as $file => $array) {
				$newupload = media_handle_upload( $file, 0 );
			}
		}
	}

	echo $newupload;
	die();
}

function BMP_handle_delete_media(){

	if( isset($_REQUEST['media_id']) ){
		$post_id = absint( $_REQUEST['media_id'] );

		$status = wp_delete_attachment($post_id, true);

		if( $status )
			echo json_encode(array('status' => 'OK'));
		else
			echo json_encode(array('status' => 'FAILED'));
	}

	die();
}