<?php

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
            jQuery('#wpunity_asset3d_mtl_btn').click(function () {

                window.send_to_editor = function (html) {
                    imgurl = jQuery(html).attr('src');
                    jQuery('#wpunity_asset3d_mtl').val(imgurl);
                    //jQuery('#picsrc').attr("src",imgurl);
                    tb_remove();
                }

                formfield = jQuery('#wpunity_asset3d_mtl').attr('name');

                tb_show('', 'media-upload.php?type=file&amp;TB_iframe=true');


                return false;
            });

            jQuery('#wpunity_asset3d_obj_btn').click(function () {
                window.send_to_editor = function (html) {
                    imgurl = jQuery(html).attr('src');
                    jQuery('#wpunity_asset3d_obj').val(imgurl);
                    //jQuery('#picsrc').attr("src",imgurl);
                    tb_remove();
                }
                formfield = jQuery('#wpunity_asset3d_obj').attr('name');
                tb_show('', 'media-upload.php?type=file&amp;TB_iframe=true');
                return false;
            });

            jQuery('#wpunity_asset3d_diffimage_btn').click(function () {
                window.send_to_editor = function (html) {
                    imgurl = jQuery(html).attr('src');
                    jQuery('#wpunity_asset3d_diffimage').val(imgurl);
                    jQuery('#wpunity_asset3d_diffimage_preview').attr("src",imgurl);
                    tb_remove();
                }
                formfield = jQuery('#wpunity_asset3d_diffimage').attr('name');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });

            jQuery('#wpunity_asset3d_screenimage_btn').click(function () {
                window.send_to_editor = function (html) {
                    imgurl = jQuery(html).attr('src');
                    jQuery('#wpunity_asset3d_screenimage').val(imgurl);
                    jQuery('#wpunity_asset3d_screenimage_preview').attr("src",imgurl);
                    tb_remove();
                }
                formfield = jQuery('#wpunity_asset3d_screenimage').attr('name');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });

            jQuery('#wpunity_asset3d_image1_btn').click(function () {
                window.send_to_editor = function (html) {
                    imgurl = jQuery(html).attr('src');
                    jQuery('#wpunity_asset3d_image1').val(imgurl);
                    jQuery('#wpunity_asset3d_image1_preview').attr("src",imgurl);
                    tb_remove();
                }
                formfield = jQuery('#wpunity_asset3d_image1').attr('name');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });

            jQuery('#wpunity_asset3d_image2_btn').click(function () {
                window.send_to_editor = function (html) {
                    imgurl = jQuery(html).attr('src');
                    jQuery('#wpunity_asset3d_image2').val(imgurl);
                    jQuery('#wpunity_asset3d_image2_preview').attr("src",imgurl);
                    tb_remove();
                }
                formfield = jQuery('#wpunity_asset3d_image2').attr('name');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });

            jQuery('#wpunity_asset3d_image3_btn').click(function () {
                window.send_to_editor = function (html) {
                    imgurl = jQuery(html).attr('src');
                    jQuery('#wpunity_asset3d_image3').val(imgurl);
                    jQuery('#wpunity_asset3d_image3_preview').attr("src",imgurl);
                    tb_remove();
                }
                formfield = jQuery('#wpunity_asset3d_image3').attr('name');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });

            jQuery('#wpunity_asset3d_video_btn').click(function () {
                window.send_to_editor = function (html) {
                    imgurl = jQuery(html).attr('src')
                    jQuery('#wpunity_asset3d_video').val(imgurl);
                    //jQuery('#wpunity_asset3d_image3_preview').attr("src",imgurl);
                    tb_remove();
                }
                formfield = jQuery('#wpunity_asset3d_video').attr('name');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
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


//==========================================================================================================================================

?>