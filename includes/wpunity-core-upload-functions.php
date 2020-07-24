<?php
// All functions related to uploading files




// Get the directory for media uploading of a scene or an asset
function wpunity_upload_dir_forScenesOrAssets( $args ) {
    
    if (!isset( $_REQUEST['post_id'] ))
        return $args;
    
    // Get the current post_id
    $post_id =  $_REQUEST['post_id'];
    $args['path'] = str_replace($args['subdir'], '', $args['path']);
    $args['url'] = str_replace($args['subdir'], '', $args['url']);
    
    $newdir = get_post_type($post_id) === 'wpunity_scene' ?
         '/' . get_the_terms($post_id, 'wpunity_scene_pgame')[0]->slug . '/Scenes'  // 'wpunity_scene'
      :  '/' . get_post_meta($post_id, 'wpunity_asset3d_pathData', true) . '/Models'; // 'wpunity_asset3d'
    
    $args['subdir'] = $newdir;
    $args['path'] .= $newdir;
    $args['url'] .= $newdir;
    
    return $args;
}

add_filter( 'upload_dir', 'wpunity_upload_dir_forScenesOrAssets' );


// Disable all auto created thumbnails for Assets3D
function wpunity_disable_imgthumbs_assets( $image_sizes ){
    
    // extra sizes
    $slider_image_sizes = array(  );
    // for ex: $slider_image_sizes = array( 'thumbnail', 'medium' );
    
    // instead of unset sizes, return your custom size (nothing)
    if( isset($_REQUEST['post_id']) && 'wpunity_asset3d' === get_post_type( $_REQUEST['post_id'] ) )
        return $slider_image_sizes;
    
    return $image_sizes;
}

add_filter( 'intermediate_image_sizes', 'wpunity_disable_imgthumbs_assets', 999 );

// Overwrite attachments
function wpunity_overwrite_uploads( $name ){
    
    // Parent id
    $post_parent_id = isset($_REQUEST['post_id']) ? (int)$_REQUEST['post_id'] : 0;

    // Attachment posts that have as file similar to $name
    $attachments_to_remove = get_posts(
            array(
                'numberposts'   => -1,
                'post_type'     => 'attachment',
                'meta_query' => array(
                    array(
                        'key' => '_wp_attached_file',
                        'value' => $name,
                        'compare' => 'LIKE'
                    )
                )
            )
    );
    
    // Delete attachments if they have the same parent
    foreach( $attachments_to_remove as $attachment ){
        
        if($attachment->post_parent == $post_parent_id) {
        
            // Permanently delete attachment
            wp_delete_attachment($attachment->ID, true);
        
        }
    }
    
    return $name;
}

add_filter( 'sanitize_file_name', 'wpunity_overwrite_uploads', 10, 1 );


function wpunity_remove_allthumbs_sizes( $sizes, $metadata ) {
    return [];
}


// Change directory for images and videos to uploads/Models
function wpunity_upload_img_vid_directory( $dir ) {
    return array(
                'path'   => $dir['basedir'] . '/Models',
                'url'    => $dir['baseurl'] . '/Models',
                'subdir' => '/Models',
                ) + $dir;
}

// Change general upload directory to Models
function wpunity_upload_filter( $args  ) {
    
    $newdir =  '/Models';
    
    $args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
    $args['url']     = str_replace( $args['subdir'], '', $args['url'] );
    $args['subdir']  = $newdir;
    $args['path']   .= $newdir;
    $args['url']    .= $newdir;
    
    return $args;
}


// Upload image(s) or video for a certain post_id (asset or scene3D)
function wpunity_upload_img_vid($file = array(), $parent_post_id) {

    $ff  =  fopen ("output_imv.txt","a");
    
//    fwrite($ff, print_r($file, true));
//    fwrite($ff,"\n");
    
    // For Sprites
    if($file['type']==='image/jpeg' || $file['type']==='image/png') {
        if (strpos($file['name'], 'sprite') == false) {
            $file['name'] = str_replace(".jpg", "_sprite.jpg", $file['name']);
            $file['name'] = str_replace(".png", "_sprite.png", $file['name']);
        }
    }

    // Remove thumbs generating all sizes
    add_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );
    
    // We need admin power
    require_once( ABSPATH . 'wp-admin/includes/admin.php' );

    // Add all models to "uploads/Models/" folder
    add_filter( 'upload_dir', 'wpunity_upload_img_vid_directory' );

    // Upload
    $file_return = wp_handle_upload( $file, array('test_form' => false ) );
    
//    fwrite($ff,"\n");
//    fwrite($ff,"file_return=". print_r($file_return,true));
    
    
    // Remove upload filter to "Models" folder
    remove_filter( 'upload_dir', 'wpunity_upload_img_vid_directory' );
    
    // if file has been uploaded succesfully
    if( !isset( $file_return['error'] ) && !isset( $file_return['upload_error_handler'] ) ) {
    
        // Id of attachment post
        $attachment_id = wpunity_insert_attachment_post($file_return, $parent_post_id );
        
//        fwrite($ff, "attachment_id=". print_r($attachment_id,true));

        // Remove filter for not generating various thumbnails sizes
        remove_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );
        
        // Return the attachment id
        if( 0 < intval( $attachment_id, 10 ) ) {
//            fwrite($ff, "good");
//            fclose($ff);
            return $attachment_id;
        }
    }
    
//    fwrite($ff, "error");
//    fclose($ff);
    return false;
}


// Upload images for only for 2D scenes
function wpunity_upload_img($file = array(), $parent_post_id) {
    
    // Require admin power
    require_once( ABSPATH . 'wp-admin/includes/admin.php' );
    
    // Upload file
    $file_return = wp_handle_upload( $file, array('test_form' => false ) );
    
    if( !isset( $file_return['error'] ) && !isset( $file_return['upload_error_handler'] ) ) {
        
        // Id of attachment post
        $attachment_id = wpunity_insert_attachment_post($file_return, $parent_post_id );
        
        if( 0 < intval( $attachment_id, 10 ) ) {
            return $attachment_id;
        }
        
    }
    return false;
}

// Insert attachment post
function wpunity_insert_attachment_post($file_return, $parent_post_id ){
    
    // Get the filename
    $filename = $file_return['file'];
    
    // Create an attachement post for main post (scene or asset)
    $attachment = array(
        'post_mime_type' => $file_return['type'],
        'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
        'post_content' => '',
        'post_status' => 'inherit',
        'guid' => $file_return['url']
    );
    
    // Insert the attachment post to database
    $attachment_id = wp_insert_attachment( $attachment, $file_return['url'], $parent_post_id );
    
    // Image library needed to create thumbnail
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    
    // Generate thumbnail for media library
    $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
    
    // Update attachment post with the thumbnail
    wp_update_attachment_metadata( $attachment_id, $attachment_data );
    
    return $attachment_id;
}


// Immitation of $_FILE through $_POST . This works only for jpgs and pngs
function wpunity_upload_Assetimg64($imagefile, $imgTitle, $parent_post_id, $parentGameSlug, $type) {
    
    //    $fp = fopen('output_thumb.txt','w');
    //    fwrite($fp, '0'.chr(10));
    
    $DS = DIRECTORY_SEPARATOR;

    // Generate a hashed filename in order to avoid overwrites for the same names
    $hashed_filename = md5($imgTitle . microtime()) . '_' . $imgTitle . '.' . $type;
    
    // Remove all sizes of thumbnails creation procedure
    add_filter('intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2);
    
    // Get admin power
    require_once(ABSPATH . 'wp-admin/includes/admin.php');

    // Get upload directory and do some sanitization
    $upload_dir = wp_upload_dir();
    $upload_path = str_replace('/', $DS, $upload_dir['path']) . $DS;
    
    //fwrite($fp, '02'.chr(10));
    
    // Write file string to a file in server
    $image_upload = file_put_contents($upload_path . $hashed_filename,
        base64_decode(substr($imagefile, strpos($imagefile, ",") + 1)));

    // HANDLE UPLOADED FILE
    if (!function_exists('wp_handle_sideload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    // Without that I'm getting a debug error!?
    if (!function_exists('wp_get_current_user')) {
        require_once(ABSPATH . 'wp-includes/pluggable.php');
    }
    
    //fwrite($fp, '03'.chr(10));
    
    $file = array(
        'name' => $hashed_filename,
        'type' => 'image/png',
        'tmp_name' => $upload_path . $hashed_filename,
        'error' => 0,
        'size' => filesize($upload_path . $hashed_filename),
    );
    
    // Change directory to models
    add_filter('upload_dir', 'wpunity_upload_filter');
    
    // upload file to server
    // @new use $file instead of $image_upload
    $file_return = wp_handle_sideload($file, array('test_form' => false));
    
    // Remove filter for /Models folder upload
    remove_filter('upload_dir', 'wpunity_upload_filter');
    
    $new_filename = $file_return['file'];
    
    //--- End of upload ---

    // See  if has already a thumbnail
    $thumbnails_ids = get_post_meta($parent_post_id,'_thumbnail_id');
    
    //    fwrite($fp, $parent_post_id.chr(10));
    //    fwrite($fp, '1'.chr(10));
    //    fwrite($fp, print_r($thumbnails_ids, true));
    
    
    if (count($thumbnails_ids) > 0){
    
        // fwrite($fp, chr(10).'2');
        
        $thumbnail_post_id = $thumbnails_ids[0];

        // Remove previous file from file system
        $prevfile = get_post_meta($thumbnail_post_id, '_wp_attached_file', true);
        
        //fwrite($fp, chr(10).'20');
        
        $del_prev_file_res = unlink($prevfile);
        
        //fwrite($fp, chr(10).'21'. $prevfile);
        //fwrite($fp, chr(10).'22'. $del_prev_file_res);

        // Update the thumbnail post title into the database
        $my_post = array(
            'ID' => $thumbnail_post_id,
            'post_title'   => $hashed_filename
        );
        wp_update_post( $my_post );

        // Update thumbnail meta _wp_attached_file
        $res_thumb_upd = update_post_meta($thumbnail_post_id, '_wp_attached_file', $new_filename);
        
        //fwrite($fp, chr(10).'23'. $res_thumb_upd);

        // update also _attachment_meta
        $data = wp_get_attachment_metadata( $thumbnail_post_id);
        
        //fwrite($fp, chr(10).'24'. print_r($data,true));
        //fwrite($fp, chr(10).basename($prevfile));
        //fwrite($fp, chr(10).basename($new_filename));
        
        $data['file'] = '/Models/'.basename($new_filename);
        
        //fwrite($fp, chr(10).'25'. print_r($data,true));
        
        wp_update_attachment_metadata( $thumbnail_post_id, $data );
        
    } else {

        // Add new
        //        $upload = wp_upload_dir();
        //        $upload_dir = $upload['basedir'];
        //        $upload_dir .= "/" . $parentGameSlug;
        //        $upload_dir .= "/" . 'Models';
        //        $upload_dir = str_replace('\\', '/', $upload_dir);
        
        $attachment = array(
            'post_mime_type' => $file_return['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($new_filename)),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => $file_return['url']
        );

        // Attach to
        $attachment_id = wp_insert_attachment($attachment, $file_return['url'], $parent_post_id);
        
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        
        $attachment_data = wp_generate_attachment_metadata($attachment_id, $new_filename);
        
        wp_update_attachment_metadata($attachment_id, $attachment_data);
        
        remove_filter('intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2);
        
        if (0 < intval($attachment_id, 10)) {
            return $attachment_id;
        }
        
    }
    //fclose($fp);
    return false;
}

// Immitation of $_FILE through $_POST . This is for objs and mtls
function wpunity_upload_AssetText($textContent, $textTitle, $parent_post_id, $parentGameSlug) {

    $fp = fopen("output_fbx_upload.txt","w");
    fwrite($fp, "1");
    
    // Filters the image sizes automatically generated when uploading an image.
    add_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );
    
    require_once( ABSPATH . 'wp-admin/includes/admin.php' );

    // Upload dir
    $upload_dir = wp_upload_dir();
    $upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;
    
    $hashed_filename = md5( $textTitle . microtime() ) . '_' . $textTitle.'.txt';
    fwrite($fp, chr(13));
    fwrite($fp, "2:".$hashed_filename);
    
    $image_upload = file_put_contents($upload_path.$hashed_filename, $textContent);
    //base64_decode(substr($textContent, strpos($textContent, ",")+1)));
    fwrite($fp, chr(13));
    fwrite($fp, "3:".print_r($image_upload,true));
    
    // HANDLE UPLOADED FILE
    if( !function_exists( 'wp_handle_sideload' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }
    
    
    
    // Without that I'm getting a debug error!?
    if( !function_exists( 'wp_get_current_user' ) ) {
        require_once( ABSPATH . 'wp-includes/pluggable.php' );
    }
    
    $file = array (
        'name'     => $hashed_filename,
        'type'     => 'text/plain',
        'tmp_name' => $upload_path.$hashed_filename,
        'error'    => 0,
        'size'     => filesize( $upload_path.$hashed_filename ),
    );
    
    fwrite($fp, chr(13));
    fwrite($fp, "4:".print_r($image_upload,true));
    
    add_filter( 'upload_dir', 'wpunity_upload_filter');
    // upload file to server
    // @new use $file instead of $image_upload
    $file_return = wp_handle_sideload( $file, array( 'test_form' => false ) );
    
    fwrite($fp, chr(13));
    fwrite($fp, "5:".print_r($file_return,true));
    
    // Remove filter
    remove_filter( 'upload_dir', 'wpunity_upload_filter' );
    
    $filename = $file_return['file'];
    
    $upload = wp_upload_dir();
    $upload_dir = $upload['basedir'];
    $upload_dir .= "/" . $parentGameSlug;
    $upload_dir .= "/" . 'Models';
    $upload_dir = str_replace('\\','/',$upload_dir);
    
    $attachment = array(
        'post_mime_type' => $file_return['type'],
        'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
        'post_content' => '',
        'post_status' => 'inherit',
        'guid' => $file_return['url']
    );
    
    $attachment_id = wp_insert_attachment( $attachment, $file_return['url'], $parent_post_id );
    
    fwrite($fp, chr(13));
    fwrite($fp, "6:".print_r($attachment_id,true));
    
    
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
    wp_update_attachment_metadata( $attachment_id, $attachment_data );
    
    fwrite($fp, chr(13));
    fwrite($fp, "7:".print_r($attachment_data,true));
    
    remove_filter( 'intermediate_image_sizes_advanced', 'wpunity_remove_allthumbs_sizes', 10, 2 );
    
    if( 0 < intval( $attachment_id, 10 ) ) {
        return $attachment_id;
    }
    
    return false;
}
