<?php

/**
 * C3.01
 * Create metabox with Custom Fields for Scene
 *
 * ($wpunity_databox4)
 */

//This imc_prefix will be added before all of our custom fields
$wpunity_prefix = 'wpunity_scene_';

//All information about our meta box
$wpunity_databox4 = array(
    'id' => 'wpunity-scenes-databox',
    'page' => 'wpunity_scene',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Scene Json',
            'desc' => 'Scene Json Input',
            'id' => $wpunity_prefix . 'json_input',
            'type' => 'textarea',
            'std' => file_get_contents( plugins_url()."/WordpressUnity3DEditor/assets/standard_scene.json")
        ),
        array(
            'name' => 'Scene Latitude',
            'desc' => 'Scene\'s Latitude',
            'id' => $wpunity_prefix . 'lat',
            'type' => 'text',
            'std' => ''
        ),array(
            'name' => 'Scene Longitude',
            'desc' => 'Scene\'s Longitude',
            'id' => $wpunity_prefix . 'lng',
            'type' => 'text',
            'std' => ''
        )
    )
);

//==========================================================================================================================================

/**
 * C3.02
 * Add and Show the metabox with Custom Field for Scene
 *
 * ($wpunity_databox4)
 */

function wpunity_scenes_databox_add() {
    global $wpunity_databox4;
    add_meta_box($wpunity_databox4['id'], 'Scene Data', 'wpunity_scenes_databox_show', $wpunity_databox4['page'], $wpunity_databox4['context'], $wpunity_databox4['priority']);
}

add_action('admin_menu', 'wpunity_scenes_databox_add');

function wpunity_scenes_databox_show(){
    global $wpunity_databox4, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="wpunity_scenes_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<label for="scene-vr-editor">VR Web Editor</label>';
    echo '<div name="scene-vr-editor" id="scene-vr-editor" style="margin-bottom:30px;">';
        $meta_json = get_post_meta(get_post()->ID, 'wpunity_scene_json_input', true);

        // do not put esc_attr, crashes the universe in 3D
        $sceneToLoad = $meta_json ? $meta_json : $wpunity_databox4['fields'][0]['std'];

        //Find scene dir string
        $sceneSlug = $post->post_name;
        $parentGameSlug = wp_get_object_terms( $post->ID, 'wpunity_scene_pgame')[0]->slug;

        $scenefolder = $sceneSlug;
        $gamefolder = $parentGameSlug; //


        // vr_editor loads the $sceneToLoad
        require( 'vr_editor.php' );

    echo '</div>';

    echo '<table class="form-table" id="wpunity-custom-fields-table">';

    foreach ($wpunity_databox4['fields'] as $field) {
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
}

//==========================================================================================================================================

/**
 * C3.03
 * Save data from this metabox with Custom Field for Scene
 *
 * ($wpunity_databox4)
 */

function wpunity_scenes_databox_save($post_id) {
    global $wpunity_databox4;
    // verify nonce
    if (!wp_verify_nonce($_POST['wpunity_scenes_databox_nonce'], basename(__FILE__))) {
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
    foreach ($wpunity_databox4['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

add_action('save_post', 'wpunity_scenes_databox_save');

//==========================================================================================================================================

?>