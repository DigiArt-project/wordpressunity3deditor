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
    global $wpunity_databox,$post;
    $post_title = $post->post_title;
    echo '<input type="hidden" name="wpunity_assets_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    echo '<tr><th style="width:20%"><label for="">', 'Asset 3D Preview', '</label></th>';

//    $url_mtl_arr = get_post_meta($post->ID, "wpunity_asset3d_mtl", true);
//    $url_mtl = $url_mtl_arr;
//    $curr_path = 'http://localhost/wp-digiart/wp-content/uploads/2016/12/';
//    $textmtl = 'floor.mtl';
//    $url_obj_arr = get_post_meta($post->ID, "wpunity_asset3d_obj", true);
//    $url_obj = $url_obj_arr;

    //echo '<td><div name="wpunity_asset3d_preview" id="asset3d-preview">' ;
    //    wpunity_asset_viewer($curr_path,$textmtl,$url_obj,$post_title);
    //echo '</div></td></tr>';
    foreach ($wpunity_databox['fields'] as $field) {
        echo '<tr>',
        '<th style="width:20%"><label for="', esc_attr($field['id']), '">', esc_html($field['name']), '</label></th>',
        '<td>';
            $meta = get_post_meta($post->ID, $field['id'], true); ?>
            <input type="text" name="<?php echo esc_attr($field['id']); ?>" id="<?php echo esc_attr($field['id']); ?>" value="<?php echo esc_attr($meta ? $meta : $field['std']); ?>" size="30" style="width:65%" />
            <input id="<?php echo esc_attr($field['id']); ?>_btn" type="button" value="Upload <?php echo esc_html($field['name']); ?>"  />

            <?php if ($field['id']=='wpunity_asset3d_mtl') { ?>
                <textarea id="wpunity_asset3d_mtl_preview" readonly style="width:100%;height:200px;"><?php readfile($meta); ?></textarea>
            <?php
            }elseif ($field['id']=='wpunity_asset3d_obj') { ?>
                <textarea id="wpunity_asset3d_obj_preview" readonly style="width:100%;height:200px;"><?php readfile($meta); ?></textarea>
            <?php
            }elseif ($field['id']=='wpunity_asset3d_diffimage') { ?>
                <img id="wpunity_asset3d_diffimage_preview" style="width:50%;height:auto" src="<?php echo $meta;?>"/>
            <?php
            }elseif ($field['id']=='wpunity_asset3d_screenimage') { ?>
                <img id="wpunity_asset3d_screenimage_preview" style="width:50%;height:auto" src="<?php echo $meta;?>"/>
            <?php
            }

        echo     '</td><td>',
        '</td></tr>';
    }
    echo '</table>';
    ?>
    <script>
        jQuery(document).ready(function ($) {
            jQuery('#wpunity_asset3d_mtl_btn').click(function () {
                window.send_to_editor = function (html) {
                    imgurl = jQuery(html).attr('src')
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
                    imgurl = jQuery(html).attr('src')
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
                    imgurl = jQuery(html).attr('src')
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
                    imgurl = jQuery(html).attr('src')
                    jQuery('#wpunity_asset3d_screenimage').val(imgurl);
                    jQuery('#wpunity_asset3d_screenimage_preview').attr("src",imgurl);
                    tb_remove();
                }
                formfield = jQuery('#wpunity_asset3d_screenimage').attr('name');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
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


?>