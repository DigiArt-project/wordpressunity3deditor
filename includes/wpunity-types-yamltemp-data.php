<?php

//This imc_prefix will be added before all of our custom fields
$wpunity_prefix = 'wpunity_yamltemp_';

//All information about our meta box
$wpunity_databox2a = array(
    'id' => 'wpunity-yamltemp2a-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Occlusion Culling Settings',
            'desc' => 'scene-OCS',
            'id' => $wpunity_prefix . 'scene_ocs',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'Render Settings',
            'desc' => 'scene-RS',
            'id' => $wpunity_prefix . 'scene_rs',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'LightMap Settings',
            'desc' => 'scene-LMS',
            'id' => $wpunity_prefix . 'scene_lms',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'NavMesh Settings',
            'desc' => 'scene-NMS',
            'id' => $wpunity_prefix . 'scene_nms',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'First Person Prefab',
            'desc' => 'scene-FPS',
            'id' => $wpunity_prefix . 'scene_fps',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'Light pattern',
            'desc' => 'scene-light',
            'id' => $wpunity_prefix . 'scene_light',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'NavMesh Settings',
            'desc' => 'scene-NMS',
            'id' => $wpunity_prefix . 'scene_nms',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);


//All information about our meta box
$wpunity_databox2b = array(
    'id' => 'wpunity-yamltemp2b-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Static object pattern',
            'desc' => 'scene-static-object-pattern',
            'id' => $wpunity_prefix . 'scene_sop',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'Dynamic object pattern',
            'desc' => 'scene-dynamic-object-pattern',
            'id' => $wpunity_prefix . 'scene_dop',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'Door pattern',
            'desc' => 'scene-door-pattern',
            'id' => $wpunity_prefix . 'scene_doorp',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'POI pattern',
            'desc' => 'scene-POI-pattern',
            'id' => $wpunity_prefix . 'scene_poip',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);

//All information about our meta box
$wpunity_databox2c = array(
    'id' => 'wpunity-yamltemp2c-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Folder.meta pattern',
            'desc' => 'scene-folder-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_fdp',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'obj.meta pattern',
            'desc' => 'scene-obj-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_odp',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'mat.meta pattern',
            'desc' => 'scene-mat-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_mdp',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'jpg.meta pattern',
            'desc' => 'scene-jpg-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_jdp',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'js.meta pattern',
            'desc' => 'scene-js-dotmeta-pattern',
            'id' => $wpunity_prefix . 'scene_jsdp',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);

//All information about our meta box
$wpunity_databox2d = array(
    'id' => 'wpunity-yamltemp2d-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Material (.mat) pattern',
            'desc' => 'scene-mat-pattern',
            'id' => $wpunity_prefix . 'scene_matp',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);

//All information about our meta box
$wpunity_databox2e = array(
    'id' => 'wpunity-yamltemp2e-databox',
    'page' => 'wpunity_yamltemp',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Door javascript (.js) pattern',
            'desc' => 'scene-doorjs-pattern',
            'id' => $wpunity_prefix . 'scene_doorjsp',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);

function wpunity_yamltemp_databoxes_add() {
    global $wpunity_databox2a;
    global $wpunity_databox2b;
    global $wpunity_databox2c;
    global $wpunity_databox2d;
    global $wpunity_databox2e;
    add_meta_box($wpunity_databox2a['id'], 'Fixed things of the Scene', 'wpunity_yamltemp_databox2a_show', $wpunity_databox2a['page'], $wpunity_databox2a['context'], $wpunity_databox2a['priority']);
    add_meta_box($wpunity_databox2b['id'], 'Prefabricated objects in the scene', 'wpunity_yamltemp_databox2b_show', $wpunity_databox2b['page'], $wpunity_databox2b['context'], $wpunity_databox2b['priority']);
    add_meta_box($wpunity_databox2c['id'], 'Pattern for the .meta files', 'wpunity_yamltemp_databox2c_show', $wpunity_databox2c['page'], $wpunity_databox2c['context'], $wpunity_databox2c['priority']);
    add_meta_box($wpunity_databox2d['id'], 'Pattern for the .mat files', 'wpunity_yamltemp_databox2d_show', $wpunity_databox2d['page'], $wpunity_databox2d['context'], $wpunity_databox2d['priority']);
    add_meta_box($wpunity_databox2e['id'], 'Pattern for the .js files for the doors', 'wpunity_yamltemp_databox2e_show', $wpunity_databox2e['page'], $wpunity_databox2e['context'], $wpunity_databox2e['priority']);
}

add_action('admin_menu', 'wpunity_yamltemp_databoxes_add');


function wpunity_yamltemp_databox2a_show(){
    global $wpunity_databox2a, $post;
    // Use nonce for verification

    echo '<div>Write the fixed things of the Scene such as Occlussion, Render, LightMap and NavMesh settings</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2a['fields'] as $field) {
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

    echo '<div style="margin-top:30px">The guid of the FPS Fab can be found in:<br />
            "Standard Assets\Characters\FirstPersonCharacter\Prefabs\FPSController.prefab.mat"</div>


        <div style="margin-top:30px">fids up to 7 are used. First available fid is 8.</div>';

}


function wpunity_yamltemp_databox2b_show(){
    global $wpunity_databox2b, $post;
    // Use nonce for verification

    echo '<div>Write the patterns for the prefabricated objects, staticObjects (floor), dynamic objects, doors, and POIs</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2b['fields'] as $field) {
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

function wpunity_yamltemp_databox2c_show(){
    global $wpunity_databox2c, $post;
    // Use nonce for verification

    echo '<div>Write the pattern for the .meta files</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2c['fields'] as $field) {
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

function wpunity_yamltemp_databox2d_show(){
    global $wpunity_databox2d, $post;
    // Use nonce for verification

    echo '<div>Write the pattern for the .mat files.<br />- HINT 1: The .mat should take info from .mtl.<br />
            - HINT 2: the name of the .mat should be "myobjname-defaultMat.mat</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2d['fields'] as $field) {
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

function wpunity_yamltemp_databox2e_show(){
    global $wpunity_databox2e, $post;
    // Use nonce for verification

    echo '<div>Write the pattern for the .js files for the doors.</div>';
    echo '<input type="hidden" name="wpunity_yamltemp_databox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table" id="wpunity-custom-fields-table">';
    foreach ($wpunity_databox2e['fields'] as $field) {
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


function wpunity_yamltemp_databox_save($post_id) {
    global $wpunity_databox2a;
    global $wpunity_databox2b;
    global $wpunity_databox2c;
    global $wpunity_databox2d;
    global $wpunity_databox2e;
    // verify nonce
    if (!wp_verify_nonce($_POST['wpunity_yamltemp_databox_nonce'], basename(__FILE__))) {
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
    foreach ($wpunity_databox2a['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
    foreach ($wpunity_databox2b['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
    foreach ($wpunity_databox2c['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
    foreach ($wpunity_databox2d['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
    foreach ($wpunity_databox2e['fields'] as $field) {
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
add_action('save_post', 'wpunity_yamltemp_databox_save');






?>