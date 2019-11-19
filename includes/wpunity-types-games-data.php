<?php

function loadWPUnityBackendStyles() {
	wp_enqueue_style('wpunity_backend');
}
add_action('wp_enqueue_scripts', 'loadWPUnityBackendStyles' );

// Add scripts and their localization. All in a hook to get the post id.
add_action('plugins_loaded', 'wpunity_localize_game_scripts');

function wpunity_localize_game_scripts() {}

//==========================================================================================================================================

// Create metabox with Custom Fields for Game ($wpunity_databox3)

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
            'desc' => 'Game\'s Latitude',
            'id' => $wpunity_prefix . 'lat',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Longitude',
            'desc' => 'Game\'s Longitude',
            'id' => $wpunity_prefix . 'lng',
            'type' => 'text',
            'std' => ''
        ),array(
            'name' => 'collaborators_ids',
            'desc' => 'ids of collaborators starting separated and ending by semicolon',
            'id' => $wpunity_prefix . 'collaborators_ids',
            'type' => 'text',
            'std' => ""
        )
    )
);

//==========================================================================================================================================

//Add and Show the metabox with Custom Field for Game and the Compiler Box ($wpunity_databox3)

function wpunity_games_databox_add() {
    global $wpunity_databox3;
    add_meta_box($wpunity_databox3['id'], 'Game Data', 'wpunity_games_databox_show', $wpunity_databox3['page'], $wpunity_databox3['context'], $wpunity_databox3['priority']);
    add_meta_box('wpunity-games-assembler-box', 'Game Assembler', 'wpunity_games_assemblerbox_show', 'wpunity_game', 'side', 'low'); //Compiler Box
    add_meta_box('wpunity-games-compiler-box', 'Game Compiler', 'wpunity_games_compilerbox_show', 'wpunity_game', 'side', 'low'); //Compiler Box
}

add_action('admin_menu', 'wpunity_games_databox_add');

function wpunity_games_databox_show(){

    global $wpunity_databox3, $post;
    $DS = DIRECTORY_SEPARATOR ;

    // load request_game.js script from js_libs
    wp_enqueue_script( 'wpunity_compile_request');

    $slug = $post->post_name;

    // Some parameters to pass in the request_game_compile.js  ajax
    wp_localize_script('wpunity_compile_request', 'phpvarsA',
        array('pluginsUrl' => plugins_url(),
            'PHP_OS'     => PHP_OS,
            'game_dirpath'=> realpath(dirname(__FILE__).'/..').$DS.'games_assemble'.$DS.$slug, //'C:\xampp\htdocs\digiart-project_Jan17\wp-content\plugins\wordpressunity3deditor\test_compiler\game_windows'));
            'game_urlpath'=> plugins_url( 'wordpressunity3deditor' ).'/games_assemble/'.$slug
        ));

    // load request_game.js script from js_libs
    wp_enqueue_script( 'wpunity_assemble_request');

    // Some parameters to pass in the request_game_assemble.js  ajax
    wp_localize_script('wpunity_assemble_request', 'phpvarsB',
        array('pluginsUrl' => plugins_url(),
            'PHP_OS'     => PHP_OS,
            'source'=> realpath(dirname(__FILE__).'/../../..').$DS.'uploads'.$DS.$slug,
            'target'=> realpath(dirname(__FILE__).'/..').$DS.'games_assemble'.$DS.$slug,
            'game_libraries_path'=> realpath(dirname(__FILE__).'/..').$DS.'unity_game_libraries',
            'game_id'=> $post->ID
        ));

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

//==========================================================================================================================================

// Save data from this metabox with Custom Field for Game ($wpunity_databox3)
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

add_action('save_post', 'wpunity_games_databox_save');

//================================= Compiling related =================================================================
function wpunity_games_compilerbox_show(){
    echo '<div id="wpunity_compileButton" onclick="wpunity_compileAjax()">Compile</div>';
    echo '<div id="wpunity_compile_report1"></div>';
    echo '<div id="wpunity_compile_report2"></div>';
    echo '<div id="wpunity_zipgame_report"></div>';

    echo '<br /><br />Analytic report of compile:<br />';
    echo '<div id="wpunity_compile_game_stdoutlog_report" style="font-size: x-small"></div>';

}

//================================= Assemble related ===================================================================
function wpunity_games_assemblerbox_show(){
    echo '<div id="wpunity_assembleButton" onclick="wpunity_assembleAjax()">Assemble</div>';

    echo '<br /><br />Analytic report of assemble:<br />';
    echo '<div id="wpunity_assemble_report1"></div>';
    echo '<div id="wpunity_assemble_report2"></div>';
}
//======================================================================================================================

// the ajax js is in js_lib/request_game.js (see main functions.php for registering js)
// the ajax phps are on wpunity-core-functions.php
add_action( 'wp_ajax_wpunity_compile_action', 'wpunity_compile_action_callback' );
add_action( 'wp_ajax_wpunity_monitor_compiling_action', 'wpunity_monitor_compiling_action_callback' );
add_action( 'wp_ajax_wpunity_killtask_compiling_action', 'wpunity_killtask_compiling_action_callback' );
add_action( 'wp_ajax_wpunity_game_zip_action', 'wpunity_game_zip_action_callback' );

// Assemble php from ajax call
add_action( 'wp_ajax_wpunity_assemble_action', 'wpunity_assemble_action_callback' );
// Add the assepile php
add_action( 'wp_ajax_wpunity_assepile_action', 'wpunity_assepile_action_callback' );

// Callback for Ajax for delete game
add_action('wp_ajax_wpunity_delete_game_action','wpunity_delete_gameproject_frontend_callback');

add_action('wp_ajax_wpunity_create_game_action','wpunity_create_gameproject_frontend_callback');


add_action('wp_ajax_wpunity_fetch_list_projects_action','wpunity_fetch_list_projects_callback');


//======================================================================================================================

?>