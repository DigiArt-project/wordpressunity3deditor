<?php

/**
 * 5.01
 * Add Box with Lat-Lng-Address-Votes
 *
 */

//This imc_prefix will be added before all of our custom fields
$wpunity_prefix = 'wpunity_asset3d_';

//All information about our meta box
$wpunity_databox = array(
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
        )
    )
);

function wpunity_assets_databox_add() {
    global $wpunity_databox;
    add_meta_box($wpunity_databox['id'], 'Asset Data', 'wpunity_assets_databox_show', $wpunity_databox['page'], $wpunity_databox['context'], $wpunity_databox['priority']);
}

add_action('admin_menu', 'wpunity_assets_databox_add');


/**
 * 5.02
 * Data for Box with Lat-Lng-Address-Votes
 *
 */

function wpunity_assets_databox_show(){
    global $wpunity_databox, $post;

    echo '<input type="hidden" name="wpunity_assets_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<a href="#" class="button insert-media add_media" data-editor="content" title="Add Media">
    <span class="wp-media-buttons-icon"></span> Add Media
    </a>';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, 'my-image-for-post', true);
        echo '<tr>',
        '<th style="width:20%"><label for="', esc_attr($field['id']), '">', esc_html($field['name']), '</label></th>',
        '<td>';

        switch ($field['type']) {
            case 'text':
                $url =get_post_meta($post->ID,'my-image-for-post', true);
                echo '<input type="text" name="', esc_attr($field['id']), '" id="', esc_attr($field['id']), '" value="', esc_attr($meta ? $meta : $field['std']), '" size="30" style="width:97%" />', '<br />', esc_html($field['desc']);
                echo '<input id="my_upl_button" type="button" value="Upload" />
                        <br/><img src="' . $url . ' style="width:200px;" id="picsrc" />';
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

        echo     '</td><td>',
        '</td></tr>';

    }

    echo '</table>';

    ?>
    <script>
        jQuery(document).ready( function( $ ) {
            jQuery('#my_upl_button').click(function() {

                window.send_to_editor = function(html) {
                    imgurl = jQuery(html).attr('src')
                    jQuery('#wpunity_asset3d_mtl').val(imgurl);
                    jQuery('#picsrc').attr("src",imgurl);
                    tb_remove();
                }

                formfield = jQuery('#wpunity_asset3d_mtl').attr('name');
                tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
                return false;
            });

        });
    </script>
    <?php

}




/**
 * 5.03
 * Save Data @ Box with Lat-Lng-Address-Votes
 *
 */


function wpunity_assets_databox_save($post_id) {
    global $wpunity_databox;
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
    foreach ($wpunity_databox['fields'] as $field) {
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





/*********************************************************************************************************************/




add_action('add_meta_boxes', function(){  add_meta_box('my-metaboxx1', 'my-metaboxx1-title','func99999', get_post_types(),'normal'); }, 9);
function func99999($post){
    $url =get_post_meta($post->ID,'my-image-for-post', true);   ?>
    <input id="my_image_URL" name="my_image_URL" type="text" value="<?php echo $url;?>"  style="width:400px;" />
    <input id="my_upl_button" type="button" value="Upload Image" /><br/><img src="<?php echo $url;?>" style="width:200px;" id="picsrc" />
    <script>
        jQuery(document).ready( function( $ ) {
            jQuery('#my_upl_button').click(function() {

                window.send_to_editor = function(html) {
                    imgurl = jQuery(html).attr('src')
                    jQuery('#my_image_URL').val(imgurl);
                    jQuery('#picsrc').attr("src",imgurl);
                    tb_remove();
                }

                formfield = jQuery('#my_image_URL').attr('name');
                tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
                return false;
            });

        });
    </script>
    <?php
}


add_action( 'save_post', function ($post_id) {
    if (isset($_POST['my_image_URL'])){
        update_post_meta($post_id, 'my-image-for-post',$_POST['my_image_URL']);
    }
});










/**
 * Display the image meta box
 */
function wpunity_assets_databox_show2() {
    global $post;

    $image_src = '';

    $image_id = get_post_meta( $post->ID, '_image_id', true );
    $image_src = wp_get_attachment_url( $image_id );

    ?>
    Hello
    <img id="book_image" src="<?php echo $image_src ?>" style="max-width:100%;" />
    <input type="hidden" name="upload_image_id" id="upload_image_id" value="<?php echo $image_id; ?>" />
    <p>
        <a title="<?php esc_attr_e( 'Set book image' ) ?>" href="#" id="set-book-image"><?php _e( 'Set book image' ) ?></a>
        <a title="<?php esc_attr_e( 'Remove book image' ) ?>" href="#" id="remove-book-image" style="<?php echo ( ! $image_id ? 'display:none;' : '' ); ?>"><?php _e( 'Remove book image' ) ?></a>
    </p>

    <script type="text/javascript">
        jQuery(document).ready(function($) {

            // save the send_to_editor handler function
            window.send_to_editor_default = window.send_to_editor;

            $('#set-book-image').click(function(){

                // replace the default send_to_editor handler function with our own
                window.send_to_editor = window.attach_image;
                tb_show('', 'media-upload.php?post_id=<?php echo $post->ID ?>&amp;type=image&amp;TB_iframe=true');

                return false;
            });

            $('#remove-book-image').click(function() {

                $('#upload_image_id').val('');
                $('img').attr('src', '');
                $(this).hide();

                return false;
            });

            // handler function which is invoked after the user selects an image from the gallery popup.
            // this function displays the image and sets the id so it can be persisted to the post meta
            window.attach_image = function(html) {

                // turn the returned image html into a hidden image element so we can easily pull the relevant attributes we need
                $('body').append('<div id="temp_image">' + html + '</div>');

                var img = $('#temp_image').find('img');

                imgurl   = img.attr('src');
                imgclass = img.attr('class');
                imgid    = parseInt(imgclass.replace(/\D/g, ''), 10);

                $('#upload_image_id').val(imgid);
                $('#remove-book-image').show();

                $('img#book_image').attr('src', imgurl);
                try{tb_remove();}catch(e){};
                $('#temp_image').remove();

                // restore the send_to_editor handler function
                window.send_to_editor = window.send_to_editor_default;

            }

        });
    </script>
    <?php
}











// Callback function to show fields in infobox
function imcplus_issues_infobox_show() {
    global $imc_infobox, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="imc-custom-fields-table">';
    foreach ($imc_infobox['fields'] as $field) {
        // get current post meta data
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
        echo     '</td><td>',
        '</td></tr>';
    }
    echo '</table>';

    ?>

    <input placeholder="<?php echo __('Enter an address','imc-translation'); ?>" type="text" id="map_input_id" class="IMCBackendInputLargeStyle" />

    <button type="button" onclick="imcFindAddress('map_input_id', true);" class="IMCBackendButtonStyle">
        <span class="dashicons dashicons-admin-site"></span>
        <?php echo _e('Locate address','imc-translation'); ?>

    </button>

    <div id="map-canvas" class="IMCBackendIssueMapStyle"></div>

    <script>
        /*Google Maps API*/
        google.maps.event.addDomListener(window, 'load', loadDefaultMapValues);

        function loadDefaultMapValues() {
            "use strict";

            <?php $map_options = get_option('gmap_settings'); ?>

            var mapId = "map-canvas";
            var inputId = "map_input_id";

            // Checking the saved latlng on custom fields
            var lat = document.getElementById("imc_lat").value;
            var lng = document.getElementById("imc_lng").value;

            if (lat === '' || lng === '' ) {
                lat = parseFloat('<?php echo floatval($map_options["gmap_initial_lat"]); ?>');
                lng = parseFloat('<?php echo floatval($map_options["gmap_initial_lng"]); ?>');
                if (lat === '' || lng === '' ) { lat = 40.1349854; lng = 22.0264538; }
            }

            // Options casting if empty
            var zoom = parseInt("<?php echo intval($map_options["gmap_initial_zoom"], 10); ?>", 10);
            if(!zoom){ zoom = 7; }

            var allowScroll;
            "<?php echo intval($map_options["gmap_mscroll"], 10); ?>" === '1' ? allowScroll = true : allowScroll = false;

            var boundaries = <?php echo json_encode($map_options["gmap_boundaries"]);?> ?
                <?php echo json_encode($map_options["gmap_boundaries"]);?>: null;

            document.getElementById('map_input_id').value = "<?php echo esc_html($map_options['gmap_initial_address']); ?>";

            imcInitializeMap(lat, lng, mapId, inputId, true, zoom, allowScroll, JSON.parse(boundaries));

            imcFindAddress('map_input_id', false, lat, lng);

        }

    </script>

    <?php
}

?>