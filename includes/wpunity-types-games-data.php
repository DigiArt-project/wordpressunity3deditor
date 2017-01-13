<?php


//This imc_prefix will be added before all of our custom fields
$wpunity_prefix = 'wpunity_game_';

//All information about our meta box
$wpunity_databox3 = array(
    'id' => 'wpunity-games-databox',
    'page' => 'wpunity_game',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Latitude',
            'desc' => 'Latitude',
            'id' => $wpunity_prefix . 'lat',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Longitude',
            'desc' => 'Longitude',
            'id' => $wpunity_prefix . 'lng',
            'type' => 'text',
            'std' => ''
        )
    )
);

function wpunity_games_databox_add() {
    global $wpunity_databox3;
    add_meta_box($wpunity_databox3['id'], 'Game Data', 'wpunity_games_databox_show', $wpunity_databox3['page'], $wpunity_databox3['context'], $wpunity_databox3['priority']);
}

add_action('admin_menu', 'wpunity_games_databox_add');


function wpunity_games_databox_show(){
    global $wpunity_databox3, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="wpunity_games_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox3['fields'] as $field) {
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


/**
 * 5.03
 * Save Data @ Box with Lat-Lng-Address-Votes
 *
 */


function wpunity_games_databox_save($post_id) {
    global $wpunity_databox3;
    // verify nonce
    if (!wp_verify_nonce($_POST['wpunity_games_databox_nonce'], basename(__FILE__))) {
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
    foreach ($wpunity_databox3['fields'] as $field) {
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
add_action('save_post', 'wpunity_games_databox_save');



?>