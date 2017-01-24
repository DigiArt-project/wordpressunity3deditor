<?php

// load css/wpunity_backend.css
wp_enqueue_style('wpunity_backend');

// load script from js_libs
wp_enqueue_script( 'wpunity_content_interlinking_request');

// Some parameters to pass in the request_game.js  ajax
wp_localize_script('wpunity_content_interlinking_request', 'phpvars',
    array('lang' => 'en',
          'externalSource' => 'Wikipedia',
          'titles' => 'Scladina'  //'Albert%20Einstein'
    )
);


add_action('add_meta_boxes','wpunity_assets_fetchDescription_box');

function wpunity_assets_fetchDescription_box() {


    add_meta_box( 'autofnc-wpunity_asset3d_fetch_description','Fetch description','wpunity_assets_fetch_description_box_content', 'wpunity_asset3d', 'side' , 'low');
    add_meta_box( 'autofnc-wpunity_asset3d_fetch_image','Fetch image','wpunity_assets_fetch_image_box_content', 'wpunity_asset3d', 'side' , 'low');
    add_meta_box( 'autofnc-wpunity_asset3d_fetch_video','Fetch video','wpunity_assets_fetch_video_box_content', 'wpunity_asset3d', 'side' , 'low');
}




function wpunity_assets_fetch_description_box_content($post){

    echo '<div id="wpunity_fetchDescription_bt" class="wpunity_fetchContentButton" onclick="wpunity_fetchDescriptionAjax()">Fetch Description</div>';
    ?>

    <br /><br />

    Source:<br />
    <select name="fetch_source" id="fetch_source">
        <option value="Wikipedia">Wikipedia</option>
        <option value="Europeana">Europeana</option>
    </select>

    <br />
    <br />

    Language<br />
        <select name="fetch_lang" id="fetch_lang">
            <option value="en">English</option>
            <option value="el">Greek</option>
            <option value="fr">French</option>
            <option value="de">German</option>
        </select>

    <br />
    <br />
    Terms to search:<input type="text" size="30" name="wpunity_titles_search" id="wpunity_titles_search" value="<?php echo $post->post_title?>">

    <br />
    <br />

    Full text:<input type="checkbox" name="wpunity_fulltext_chkbox" id="wpunity_fulltext_chkbox" value="">


      <?php
}


function wpunity_assets_fetch_image_box_content($post){

    echo '<div id="wpunity_fetchImage_bt" class="wpunity_fetchContentButton" onclick="wpunity_fetchImageAjax()">Fetch Image</div>';
    ?>

    <br /><br />

    Source:<br />
    <select name="fetch_source_image" id="fetch_source_image">
        <option value="Wikipedia">Wikipedia</option>
        <option value="Europeana">Europeana</option>
    </select>

    <br />
    <br />

    Language<br />
    <select name="fetch_lang_image" id="fetch_lang_image">
        <option value="en">English</option>
        <option value="el">Greek</option>
        <option value="fr">French</option>
        <option value="de">German</option>
    </select>

    <br />
    <br />
    Terms to search:<input type="text" size="30" name="wpunity_titles_image_search_image" id="wpunity_titles_image_search_image" value="<?php echo $post->post_title?>">

    <br />
    <br />



    <div id="image_find_results">
        <img id="image_res_1" class="image_fetch_img"/><br /><div id="image_res_1_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_1_title" class="img_res_title_f" target="_blank"></a><br />
        <img id="image_res_2" class="image_fetch_img"/><br /><div id="image_res_2_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_2_title" class="img_res_title_f" target="_blank"></a><br />
        <img id="image_res_3" class="image_fetch_img"/><br /><div id="image_res_3_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_3_title" class="img_res_title_f" target="_blank"></a><br />
        <img id="image_res_4" class="image_fetch_img"/><br /><div id="image_res_4_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_4_title" class="img_res_title_f" target="_blank"></a><br />
        <img id="image_res_5" class="image_fetch_img"/><br /><div id="image_res_5_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_5_title" class="img_res_title_f" target="_blank"></a><br />
        <img id="image_res_6" class="image_fetch_img"/><br /><div id="image_res_6_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_6_title" class="img_res_title_f" target="_blank"></a><br />
        <img id="image_res_7" class="image_fetch_img"/><br /><div id="image_res_7_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_7_title" class="img_res_title_f" target="_blank"></a><br />
        <img id="image_res_8" class="image_fetch_img"/><br /><div id="image_res_8_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_8_title" class="img_res_title_f" target="_blank"></a><br />
        <img id="image_res_9" class="image_fetch_img"/><br /><div id="image_res_9_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_9_title" class="img_res_title_f" target="_blank"></a><br />
        <img id="image_res_10" class="image_fetch_img"/><br /><div id="image_res_10_url" class="image_fetch_div_url"></div><br /><a href="" id="image_res_10_title" class="img_res_title_f" target="_blank"></a><br />
    </div>


    <?php
}


function wpunity_assets_fetch_video_box_content($post){

    echo '<div id="wpunity_fetchVideo_bt" class="wpunity_fetchContentButton" onclick="wpunity_fetchVideoAjax()">Fetch Video</div>';
    ?>

    <br /><br />

    Source:<br />
    <select name="fetch_source_video" id="fetch_source_video">
        <option value="Wikipedia">Wikipedia</option>
        <option value="Europeana">Europeana</option>
    </select>

    <br />
    <br />

    Language<br />
    <select name="fetch_lang_video" id="fetch_lang_video">
        <option value="en">English</option>
        <option value="el">Greek</option>
        <option value="fr">French</option>
        <option value="de">German</option>
    </select>

    <br />
    <br />
    Terms to search:<input type="text" size="30" name="wpunity_titles_video_search_video" id="wpunity_titles_video_search_video" value="<?php echo $post->post_title?>">
    Wikipedia example:<br /> "Sarmientosaurus 3D skull"
    <br />
    <br />

    <div id="video_find_results">

        <video id="videoplayer1" width="240" height="160" autoplay controls>
            <source id="video_res_1" src="" type="video/ogg">
        </video>
        <div id="video_res_1_url" class="video_fetch_div_url"></div><br />
        <div id="video_res_1_title" class="video_res_title_f"></div><br />

    </div>

    <?php
}


/**
 * D3.01
 * Create metabox with Custom Fields for Asset3D
 *
 * ($wpunity_databox1)
 */

//This imc_prefix will be added before all of our custom fields
$wpunity_prefix = 'wpunity_asset3d_';

//All information about our meta box
$wpunity_databox1 = array(
    'id' => 'wpunity-assets-databox',
    'page' => 'wpunity_asset3d',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'MTL File',
            'desc' => 'MTL File',
            'id' => $wpunity_prefix . 'mtl',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Obj File',
            'desc' => 'Obj File',
            'id' => $wpunity_prefix . 'obj',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Diffusion Image',
            'desc' => 'Diffusion Image',
            'id' => $wpunity_prefix . 'diffimage',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Screenshot Image',
            'desc' => 'Screenshot Image',
            'id' => $wpunity_prefix . 'screenimage',
            'type' => 'text',
            'std' => ''
        ),array(
            'name' => 'Next Scene',
            'desc' => 'Next Scene',
            'id' => $wpunity_prefix . 'next_scene',
            'type' => 'text',
            'std' => ''
        ),array(
            'name' => 'Video',
            'desc' => 'Video',
            'id' => $wpunity_prefix . 'video',
            'type' => 'text',
            'std' => ''
        ),array(
            'name' => 'Image 1',
            'desc' => 'Image 1',
            'id' => $wpunity_prefix . 'image1',
            'type' => 'text',
            'std' => ''
        ),array(
            'name' => 'Image 2',
            'desc' => 'Image 2',
            'id' => $wpunity_prefix . 'image2',
            'type' => 'text',
            'std' => ''
        ),array(
            'name' => 'Image 3',
            'desc' => 'Image 3',
            'id' => $wpunity_prefix . 'image3',
            'type' => 'text',
            'std' => ''
        ),
    )
);

//==========================================================================================================================================

/**
 * D3.02
 * Add and Show the metabox with Custom Field for Game
 *
 * ($wpunity_databox1)
 */

function wpunity_assets_databox_add() {
    global $wpunity_databox1;
    add_meta_box($wpunity_databox1['id'], 'Asset Data', 'wpunity_assets_databox_show', $wpunity_databox1['page'], $wpunity_databox1['context'], $wpunity_databox1['priority']);
}

add_action('admin_menu', 'wpunity_assets_databox_add');

function wpunity_assets_databox_show(){
    global $wpunity_databox1,$post;
    $post_title = $post->post_title;
    echo '<input type="hidden" name="wpunity_assets_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table"><tbody>';

    echo '<tr><th style="width:20%">Asset 3D Preview</label></th>';

//    $url_mtl_arr = get_post_meta($post->ID, "wpunity_asset3d_mtl", true);
//    $url_mtl = $url_mtl_arr;
//    $curr_path = 'http://localhost/wp-digiart/wp-content/uploads/2016/12/';
//    $textmtl = 'floor.mtl';
//    $url_obj_arr = get_post_meta($post->ID, "wpunity_asset3d_obj", true);
//    $url_obj = $url_obj_arr;

    //echo '<td><div name="wpunity_asset3d_preview" id="asset3d-preview">' ;

    $curr_path = "http://127.0.0.1:8080/digiart-project_Jan17/wp-content/uploads/game1/scene3/static3dmodels/asset2/";
    $textmtl = file_get_contents($curr_path."floor.mtl");
    $url_obj = $curr_path."floor.obj";

    echo '<td><div name="vr-preview" id="vr-preview" style="width:95%; border: 1px solid #aaa; margin-left:5px">';
        wpunity_asset_viewer($curr_path,$textmtl,$url_obj,$post_title);
    echo '</div></td></tr>';

    foreach ($wpunity_databox1['fields'] as $field) {
        if ($field['id']!='wpunity_asset3d_next_scene') {
            echo '<tr>',
            '<th style="width:20%"><label for="', esc_attr($field['id']), '">', esc_html($field['name']), '</label></th>',
            '<td>';
            $meta = get_post_meta($post->ID, $field['id'], true); ?>
            <input type="text" name="<?php echo esc_attr($field['id']); ?>" id="<?php echo esc_attr($field['id']); ?>"
                   value="<?php echo esc_attr($meta ? $meta : $field['std']); ?>" size="30" style="width:65%"/>
            <input id="<?php echo esc_attr($field['id']); ?>_btn" type="button"
                   value="Upload <?php echo esc_html($field['name']); ?>"/>

            <?php if ($field['id'] == 'wpunity_asset3d_mtl') { ?>
                <textarea id="wpunity_asset3d_mtl_preview" readonly
                          style="width:100%;height:200px;"><?php readfile($meta); ?></textarea>
                <?php
            } elseif ($field['id'] == 'wpunity_asset3d_obj') { ?>
                <textarea id="wpunity_asset3d_obj_preview" readonly
                          style="width:100%;height:200px;"><?php readfile($meta); ?></textarea>
                <?php
            } elseif ($field['id'] == 'wpunity_asset3d_diffimage') { ?>
                <img id="wpunity_asset3d_diffimage_preview" style="width:50%;height:auto" src="<?php echo $meta; ?>"/>
                <?php
            } elseif ($field['id'] == 'wpunity_asset3d_screenimage') { ?>
                <img id="wpunity_asset3d_screenimage_preview" style="width:50%;height:auto" src="<?php echo $meta; ?>"/>
                <?php
            } elseif ($field['id'] == 'wpunity_asset3d_image1') { ?>
                <img id="wpunity_asset3d_image1_preview" style="width:50%;height:auto" src="<?php echo $meta; ?>"/>
                <?php
            } elseif ($field['id'] == 'wpunity_asset3d_image2') { ?>
                <img id="wpunity_asset3d_image2_preview" style="width:50%;height:auto" src="<?php echo $meta; ?>"/>
                <?php
            } elseif ($field['id'] == 'wpunity_asset3d_image3') { ?>
                <img id="wpunity_asset3d_image3_preview" style="width:50%;height:auto" src="<?php echo $meta; ?>"/>
                <?php
            } elseif ($field['id'] == 'wpunity_asset3d_video') {
                //preview of the video

            }

            echo '</td></tr>';
        }else{
            $meta = get_post_meta($post->ID, $field['id'], true);
            echo '<tr>',
            '<th style="width:20%"><label for="', esc_attr($field['id']), '">', esc_html($field['name']), '</label></th>',
            '<td>';


            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                    break;
                case 'numeric':
                    echo '<input type="number" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                    break;
                case 'textarea':
                    echo '<textarea name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" cols="60" rows="4" style="width:97%">', esc_attr($meta ? $meta : $field['std']), '</textarea>', '<br />', esc_html($field['desc']);
                    break;
                case 'select':
                    echo '<select name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '">';
                    foreach ($field['options'] as $option) {
                        echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', esc_html($option), '</option>';
                    }
                    echo '</select>';
                    break;
                case 'checkbox':
                    echo '<input type="checkbox" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '"', $meta ? ' checked="checked"' : '', ' />';
                    break;

            }
            echo     '</td></tr>';

        }
    }
    echo '</tbody></table>';
    ?>

    <script>
        jQuery(document).ready(function ($) {

            // Uploading files
            var file_frame;
            var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
            var set_to_post_id = <?php echo $post->ID; ?>; // Set this

            jQuery('#wpunity_asset3d_mtl_btn').on('click', function( event ){

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select MTL file to upload',
                    button: {
                        text: 'Use this file',
                    },
                    multiple: false	// Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function(html) {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    jQuery('#wpunity_asset3d_mtl').val(attachment.url);
                    //jQuery('#wpunity_asset3d_mtl_preview').

                    // Restore the main post ID
                    wp.media.model.settings.post.id = wp_media_post_id;
                });

                // Finally, open the modal
                file_frame.open();
            });

            jQuery('#wpunity_asset3d_obj_btn').on('click', function( event ){

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select OBJ file to upload',
                    button: {
                        text: 'Use this file',
                    },
                    multiple: false	// Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function(html) {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    jQuery('#wpunity_asset3d_obj').val(attachment.url);
                    //jQuery('#wpunity_asset3d_mtl_preview').

                    // Restore the main post ID
                    wp.media.model.settings.post.id = wp_media_post_id;
                });

                // Finally, open the modal
                file_frame.open();
            });

            jQuery('#wpunity_asset3d_diffimage_btn').on('click', function( event ){

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select photo to upload',
                    button: {
                        text: 'Use this photo',
                    },
                    multiple: false	// Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function(html) {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    jQuery('#wpunity_asset3d_diffimage').val(attachment.url);
                    jQuery('#wpunity_asset3d_diffimage_preview').attr( 'src', attachment.url );

                    // Restore the main post ID
                    wp.media.model.settings.post.id = wp_media_post_id;
                });

                // Finally, open the modal
                file_frame.open();
            });

            jQuery('#wpunity_asset3d_screenimage_btn').on('click', function( event ){

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select photo to upload',
                    button: {
                        text: 'Use this photo',
                    },
                    multiple: false	// Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function(html) {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    jQuery('#wpunity_asset3d_screenimage').val(attachment.url);
                    jQuery('#wpunity_asset3d_screenimage_preview').attr( 'src', attachment.url );

                    // Restore the main post ID
                    wp.media.model.settings.post.id = wp_media_post_id;
                });

                // Finally, open the modal
                file_frame.open();
            });

            jQuery('#wpunity_asset3d_image1_btn').on('click', function( event ){

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select photo to upload',
                    button: {
                        text: 'Use this photo',
                    },
                    multiple: false	// Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function(html) {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    jQuery('#wpunity_asset3d_image1').val(attachment.url);
                    jQuery('#wpunity_asset3d_image1_preview').attr( 'src', attachment.url );

                    // Restore the main post ID
                    wp.media.model.settings.post.id = wp_media_post_id;
                });

                // Finally, open the modal
                file_frame.open();
            });


            jQuery('#wpunity_asset3d_image2_btn').on('click', function( event ){

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select photo to upload',
                    button: {
                        text: 'Use this photo',
                    },
                    multiple: false	// Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function(html) {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    jQuery('#wpunity_asset3d_image2').val(attachment.url);
                    jQuery('#wpunity_asset3d_image2_preview').attr( 'src', attachment.url );

                    // Restore the main post ID
                    wp.media.model.settings.post.id = wp_media_post_id;
                });

                // Finally, open the modal
                file_frame.open();
            });

            jQuery('#wpunity_asset3d_image3_btn').on('click', function( event ){

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select photo to upload',
                    button: {
                        text: 'Use this photo',
                    },
                    multiple: false,	// Set to true to allow multiple files to be selected
                    library: {
                        type: 'image',
                    }
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function(html) {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    jQuery('#wpunity_asset3d_image3').val(attachment.url);
                    jQuery('#wpunity_asset3d_image3_preview').attr( 'src', attachment.url );

                    // Restore the main post ID
                    wp.media.model.settings.post.id = wp_media_post_id;
                });

                // Finally, open the modal
                file_frame.open();
            });

            jQuery('#wpunity_asset3d_video_btn').on('click', function( event ){

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select video to upload',
                    button: {
                        text: 'Use this video',
                    },
                    multiple: false	// Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function(html) {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    jQuery('#wpunity_asset3d_video').val(attachment.url);
                    //jQuery('#wpunity_asset3d_image3_preview').attr( 'src', attachment.url );

                    // Restore the main post ID
                    wp.media.model.settings.post.id = wp_media_post_id;
                });

                // Finally, open the modal
                file_frame.open();
            });


            // Restore the main ID when the add media button is pressed
            jQuery( 'a.add_media' ).on( 'click', function() {
                wp.media.model.settings.post.id = wp_media_post_id;
            });


        });
    </script>
    <?php
}

//==========================================================================================================================================

/**
 * D3.03
 * Save data from this metabox with Custom Field for Asset3D
 *
 * ($wpunity_databox)
 */

function wpunity_assets_databox_save($post_id) {
    global $wpunity_databox1;
    // verify nonce
    if (!wp_verify_nonce($_POST['wpunity_assets_databox_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($wpunity_databox1['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

// Save data from infobox
add_action('save_post', 'wpunity_assets_databox_save');


// AJAXES for content interlinking
add_action( 'wp_ajax_wpunity_fetch_description_action', 'wpunity_fetch_description_action_callback' );
add_action( 'wp_ajax_wpunity_fetch_image_action', 'wpunity_fetch_image_action_callback' );
add_action( 'wp_ajax_wpunity_fetch_video_action', 'wpunity_fetch_video_action_callback' );

//==========================================================================================================================================

?>