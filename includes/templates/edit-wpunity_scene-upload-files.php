<?php
/**
 * Created by PhpStorm.
 * User: tpapazoglou
 * Date: 24/5/2017
 * Time: 3:47 μμ
 */


  if($_POST['submitted'] == 1): // Form has been upploaded

	  $upload_dir = wp_upload_dir();
	  $upload_path = $upload_dir['path'] . DIRECTORY_SEPARATOR;
	  $num_files = count($_FILES['file']['tmp_name']);

	  echo "Uploading files to $upload_path...<br/>";

	  if (!empty($_FILES)) {

		  $tempFile = $_FILES['file']['tmp_name'];

		  $targetPath = $upload_path;

		  $targetFile = $targetPath . $_FILES['file']['name'];

		  //I've commented this to prevent people from uploading malicious things to my site.
		  // You'll want to uncomment it before you use it.
		  //move_uploaded_file($tempFile, $targetFile);

	  }

	  echo "All done! We'll review your files momentarily.";

  endif;