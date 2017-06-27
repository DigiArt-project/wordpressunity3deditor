<?php


//DELETE GAME PROJECT with files
function wpunity_delete_gameproject_frontend($game_id){

    //wp_delete_post( $game_id, false );

}


//DELETE GAME PROJECT with files
function wpunity_delete_asset3d_frontend($asset_id){

    wpunity_delete_asset3d_post_media( $asset_id );
    wp_delete_post( $asset_id, true );

}


function wpunity_delete_asset3d_post_media( $asset_id ) {
    $attachments = get_posts(
        array(
            'post_type'      => 'attachment',
            'posts_per_page' => -1,
            'post_status'    => 'any',
            'post_parent'    => $asset_id,
        )
    );

    foreach ( $attachments as $attachment ) {
        wp_delete_attachment( $attachment->ID );
    }
}


//==========================================================================================================================================
//ABOUT MEDIA HANDLE


function wpunity_upload_dir_forAssets( $args ) {

    // Get the current post_id
    $id = ( isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '' );

    if( $id ) {

        if ( get_post_type( $id ) == 'wpunity_asset3d' ) {

//            global $post;
//            $gameterms = get_the_terms( $post->ID , 'wpunity_asset3d_pgame' );
//            $projectSlug = $gameterms[0]->slug; // wp_get_object_terms( $post->ID, 'wpunity_asset3d_pgame')[0]->slug; //

            $pathofPost = get_post_meta($id,'wpunity_asset3d_pathData',true);

            $newdir =  '/' . $pathofPost . '/Models';

            $args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
            $args['url']     = str_replace( $args['subdir'], '', $args['url'] );
            $args['subdir']  = $newdir;
            $args['path']   .= $newdir;
            $args['url']    .= $newdir;


        }elseif(get_post_type( $id ) == 'wpunity_scene'){

            $gameterms = get_the_terms( $id , 'wpunity_scene_pgame' );
            $projectSlug = $gameterms[0]->slug;
            // Set the new path depends on current post_type
            $newdir = '/' . $projectSlug . '/Scenes';

            $args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
            $args['url']     = str_replace( $args['subdir'], '', $args['url'] );
            $args['subdir']  = $newdir;
            $args['path']   .= $newdir;
            $args['url']    .= $newdir;
        }


    }
    return $args;
}

add_filter( 'upload_dir', 'wpunity_upload_dir_forAssets' );





/**
 * 1.01
 * Overwrite Uploads
 *
 * Upload files with the same namew, without uploading copy with unique filename
 *
 */

function wpunity_overwrite_uploads( $name ){

    if( isset($_REQUEST['post_id']) ) {
        $post_id =  (int)$_REQUEST['post_id'];
    }else{
        $post_id=0;
    }

    $args = array(
        'numberposts'   => -1,
        'post_type'     => 'attachment',
        'meta_query' => array(
            array(
                'key' => '_wp_attached_file',
                'value' => $name,
                'compare' => 'LIKE'
            )
        )
    );
    $attachments_to_remove = get_posts( $args );

    foreach( $attachments_to_remove as $attach ){
        if($attach->post_parent == $post_id) {
            wp_delete_attachment($attach->ID, true);
        }
    }

    return $name;
}

add_filter( 'sanitize_file_name', 'wpunity_overwrite_uploads', 10, 1 );



//DISABLE ALL AUTO-CREATED THUMBS for Assets3D
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

?>