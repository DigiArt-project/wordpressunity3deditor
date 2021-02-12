<?php

//Create Game Category Box @ Game's backend
add_action('add_meta_boxes','wpunity_games_taxcategory_box');

function wpunity_games_taxcategory_box() {

    remove_meta_box( 'wpunity_game_catdiv', 'wpunity_game', 'side' ); //Removes the default metabox at side

    add_meta_box( 'tagsdiv-wpunity_game_cat','Game Category','wpunity_games_taxcategory_box_content', 'wpunity_game', 'side' , 'high'); //Adds the custom metabox with select box

    remove_meta_box( 'wpunity_game_typediv', 'wpunity_game', 'side' ); //Removes the default metabox at side

    add_meta_box( 'tagsdiv-wpunity_game_type','Game Type','wpunity_games_taxtype_box_content', 'wpunity_game', 'side' , 'high'); //Adds the custom metabox with select box

}

function wpunity_games_taxcategory_box_content($post){
    $tax_name = 'wpunity_game_cat';
    ?>
    <div class="tagsdiv" id="<?php echo $tax_name; ?>">

        <p class="howto"><?php echo 'Select category for current Game' ?></p>
        <?php
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wpunity_game_cat_noncename' );
        $type_IDs = wp_get_object_terms( $post->ID, 'wpunity_game_cat', array('fields' => 'ids') );

        $args = array(
            'show_option_none'   => 'Select Category',
            'orderby'            => 'name',
            'hide_empty'         => 0,
            'selected'           => $type_IDs[0],
            'name'               => 'wpunity_game_cat',
            'taxonomy'           => 'wpunity_game_cat',
            'echo'               => 0,
            'option_none_value'  => '-1',
            'id' => 'wpunity-select-category-dropdown'
        );

        $select = wp_dropdown_categories($args);

        $replace = "<select$1 required>";
        $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );

        $old_option = "<option value='-1'>";
        $new_option = "<option disabled selected value=''>".'Select category'."</option>";
        $select = str_replace($old_option, $new_option, $select);

        echo $select;
        ?>
    </div>
    <?php
}

function wpunity_games_taxtype_box_content($post){
    $tax_name = 'wpunity_game_type';
    ?>
    <div class="tagsdiv" id="<?php echo $tax_name; ?>">

        <p class="howto"><?php echo 'Select type for current Game' ?></p>

        <?php
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wpunity_game_type_noncename' );
        
        $type_IDs = wp_get_object_terms( $post->ID, 'wpunity_game_type', array('fields' => 'ids') );
        
        $ff = fopen("output_p1.txt","w");
        fwrite($ff, print_r($type_IDs, true));
        fclose($ff);
        //echo $type_IDs;

        $args = array(
            'show_option_none'   => 'Select Type',
            'orderby'            => 'name',
            'hide_empty'         => 0,
            'selected'           => $type_IDs[0],
            'name'               => 'wpunity_game_type',
            'taxonomy'           => 'wpunity_game_type',
            'echo'               => 0,
            'option_none_value'  => '-1',
            'id' => 'wpunity-select-type-dropdown'
        );

        $select = wp_dropdown_categories($args);

        $replace = "<select$1 required>";
        $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );

        $old_option = "<option value='-1'>";
        $new_option = "<option disabled selected value=''>".'Select type'."</option>";
        $select = str_replace($old_option, $new_option, $select);

        echo $select;
        ?>

    </div>
    <?php
}

//==========================================================================================================================================

// When the post is saved, also saves wpunity_game_cat / wpunity_game_type
function wpunity_games_taxcategory_box_content_save( $post_id ) {

    global $wpdb;
    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    
    if (!isset($_POST['wpunity_game_cat_noncename']))
        return;
    
    if ( !wp_verify_nonce( $_POST['wpunity_game_cat_noncename'], plugin_basename( __FILE__ ) ) )
        return;

    // Check permissions
    if ( 'wpunity_game' == $_POST['post_type'] )
    {
        if ( ! ( current_user_can( 'edit_page', $post_id )  ) )
            return;
    }
    else
    {
        if ( ! ( current_user_can( 'edit_post', $post_id ) ) )
            return;
    }

    // OK, we're authenticated: we need to find and save the data
    $type_ID = intval($_POST['wpunity_game_cat'], 10);

    $type = ( $type_ID > 0 ) ? get_term( $type_ID, 'wpunity_game_cat' )->slug : NULL;

    wp_set_object_terms(  $post_id , $type, 'wpunity_game_cat' );
}

/* Do something with the data entered */
add_action( 'save_post', 'wpunity_games_taxcategory_box_content_save' );

function wpunity_games_taxtype_box_content_save( $post_id ) {

    global $wpdb;

    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;
    
    if (!isset($_POST['wpunity_game_cat_noncename']))
        return;
    
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['wpunity_game_type_noncename'], plugin_basename( __FILE__ ) ) )
        return;

    // Check permissions
    if ( 'wpunity_game' == $_POST['post_type'] )
    {
        if ( ! ( current_user_can( 'edit_page', $post_id )  ) )
            return;
    }
    else
    {
        if ( ! ( current_user_can( 'edit_post', $post_id ) ) )
            return;
    }

    // OK, we're authenticated: we need to find and save the data
    $type_ID = intval($_POST['wpunity_game_type'], 10);

    $type = ( $type_ID > 0 ) ? get_term( $type_ID, 'wpunity_game_type' )->slug : NULL;

    wp_set_object_terms(  $post_id , $type, 'wpunity_game_type' );
}

/* Do something with the data entered */
add_action( 'save_post', 'wpunity_games_taxtype_box_content_save' );

//==========================================================================================================================================

//16 Settings for each Game Type as term_meta

// A callback function to add a custom field to our taxonomy
function wpunity_games_projectSettings_fields($tag) {
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td><h2>Project Settings</h2></td>
    </tr>

    <?php $term_audio_manager = get_term_meta( $tag->term_id, 'wpunity_audio_manager_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-audio_manager">
        <th scope="row" valign="top">
            <label for="wpunity_audio_manager_term">Audio Manager</label>
        </th>
        <td>
            <textarea name="wpunity_audio_manager_term" id="wpunity_audio_manager_term"><?php echo $term_audio_manager ? $term_audio_manager : ''; ?></textarea>
            <p class="description">AudioManager.asset (wpunity_audio_manager_term)</p>
        </td>
    </tr>

    <?php $term_cluster_input_manager = get_term_meta( $tag->term_id, 'wpunity_cluster_input_manager_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-cluster_input_manager">
        <th scope="row" valign="top">
            <label for="wpunity_cluster_input_manager_term">Cluster Input Manager</label>
        </th>
        <td>
            <textarea name="wpunity_cluster_input_manager_term" id="wpunity_cluster_input_manager_term"><?php echo $term_cluster_input_manager ? $term_cluster_input_manager : ''; ?></textarea>
            <p class="description">ClusterInputManager.asset (wpunity_cluster_input_manager_term)</p>
        </td>
    </tr>

    <?php $term_dynamics_manager = get_term_meta( $tag->term_id, 'wpunity_dynamics_manager_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-dynamics_manager">
        <th scope="row" valign="top">
            <label for="wpunity_dynamics_manager_term">Dynamics Manager</label>
        </th>
        <td>
            <textarea name="wpunity_dynamics_manager_term" id="wpunity_dynamics_manager_term"><?php echo $term_dynamics_manager ? $term_dynamics_manager : ''; ?></textarea>
            <p class="description">DynamicsManager.asset (wpunity_dynamics_manager_term)</p>
        </td>
    </tr>

    <?php $term_editor_build_settings = get_term_meta( $tag->term_id, 'wpunity_editor_build_settings_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-editor_build_settings">
        <th scope="row" valign="top">
            <label for="wpunity_editor_build_settings_term">Editor Build Settings</label>
        </th>
        <td>
            <textarea name="wpunity_editor_build_settings_term" id="wpunity_editor_build_settings_term"><?php echo $term_editor_build_settings ? $term_editor_build_settings : ''; ?></textarea>
            <p class="description">EditorBuildSettings.asset (wpunity_editor_build_settings_term)</p>
        </td>
    </tr>

    <?php $term_editor_settings = get_term_meta( $tag->term_id, 'wpunity_editor_settings_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-editor_settings">
        <th scope="row" valign="top">
            <label for="wpunity_editor_settings_term">Editor Settings</label>
        </th>
        <td>
            <textarea name="wpunity_editor_settings_term" id="wpunity_editor_settings_term"><?php echo $term_editor_settings ? $term_editor_settings : ''; ?></textarea>
            <p class="description">EditorSettings.asset (wpunity_editor_settings_term)</p>
        </td>
    </tr>

    <?php $term_graphics_settings = get_term_meta( $tag->term_id, 'wpunity_graphics_settings_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-graphics_settings">
        <th scope="row" valign="top">
            <label for="wpunity_graphics_settings_term">Graphics Settings</label>
        </th>
        <td>
            <textarea name="wpunity_graphics_settings_term" id="wpunity_graphics_settings_term"><?php echo $term_graphics_settings ? $term_graphics_settings : ''; ?></textarea>
            <p class="description">GraphicsSettings.asset (wpunity_graphics_settings_term)</p>
        </td>
    </tr>

    <?php $term_input_manager = get_term_meta( $tag->term_id, 'wpunity_input_manager_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-input_manager">
        <th scope="row" valign="top">
            <label for="wpunity_input_manager_term">Input Manager</label>
        </th>
        <td>
            <textarea name="wpunity_input_manager_term" id="wpunity_input_manager_term"><?php echo $term_input_manager ? $term_input_manager : ''; ?></textarea>
            <p class="description">InputManager.asset (wpunity_input_manager_term)</p>
        </td>
    </tr>

    <?php $term_nav_mesh_areas = get_term_meta( $tag->term_id, 'wpunity_nav_mesh_areas_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-nav_mesh_areas">
        <th scope="row" valign="top">
            <label for="wpunity_nav_mesh_areas_term">Nav Mesh Areas</label>
        </th>
        <td>
            <textarea name="wpunity_nav_mesh_areas_term" id="wpunity_nav_mesh_areas_term"><?php echo $term_nav_mesh_areas ? $term_nav_mesh_areas : ''; ?></textarea>
            <p class="description">NavMeshAreas.asset (wpunity_nav_mesh_areas_term)</p>
        </td>
    </tr>

    <?php $term_network_manager = get_term_meta( $tag->term_id, 'wpunity_network_manager_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-network_manager">
        <th scope="row" valign="top">
            <label for="wpunity_network_manager_term">Network Manager</label>
        </th>
        <td>
            <textarea name="wpunity_network_manager_term" id="wpunity_network_manager_term"><?php echo $term_network_manager ? $term_network_manager : ''; ?></textarea>
            <p class="description">NetworkManager.asset (wpunity_network_manager_term)</p>
        </td>
    </tr>

    <?php $term_physics2d_settings = get_term_meta( $tag->term_id, 'wpunity_physics2d_settings_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-physics2d_settings">
        <th scope="row" valign="top">
            <label for="wpunity_physics2d_settings_term">Physics2D Settings</label>
        </th>
        <td>
            <textarea name="wpunity_physics2d_settings_term" id="wpunity_physics2d_settings_term"><?php echo $term_physics2d_settings ? $term_physics2d_settings : ''; ?></textarea>
            <p class="description">Physics2DSettings.asset (wpunity_physics2d_settings_term)</p>
        </td>
    </tr>

    <?php $project_settings = get_term_meta( $tag->term_id, 'wpunity_project_settings_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-project_settings">
        <th scope="row" valign="top">
            <label for="wpunity_project_settings_term">Project Settings</label>
        </th>
        <td>
            <textarea name="wpunity_project_settings_term" id="wpunity_project_settings_term"><?php echo $project_settings ? $project_settings : ''; ?></textarea>
            <p class="description">ProjectSettings.asset (wpunity_project_settings_term)</p>
        </td>
    </tr>

    <?php $project_version = get_term_meta( $tag->term_id, 'wpunity_project_version_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-project_version">
        <th scope="row" valign="top">
            <label for="wpunity_project_version_term">Project Version</label>
        </th>
        <td>
            <textarea name="wpunity_project_version_term" id="wpunity_project_version_term"><?php echo $project_version ? $project_version : ''; ?></textarea>
            <p class="description">ProjectVersion.asset (wpunity_project_version_term)</p>
        </td>
    </tr>

    <?php $quality_settings = get_term_meta( $tag->term_id, 'wpunity_quality_settings_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-quality_settings">
        <th scope="row" valign="top">
            <label for="wpunity_quality_settings_term">Quality Settings</label>
        </th>
        <td>
            <textarea name="wpunity_quality_settings_term" id="wpunity_quality_settings_term"><?php echo $quality_settings ? $quality_settings : ''; ?></textarea>
            <p class="description">QualitySettings.asset (wpunity_quality_settings_term)</p>
        </td>
    </tr>

    <?php $term_tag_manager = get_term_meta( $tag->term_id, 'wpunity_tag_manager_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-tag_manager">
        <th scope="row" valign="top">
            <label for="wpunity_tag_manager_term">Tag Manager</label>
        </th>
        <td>
            <textarea name="wpunity_tag_manager_term" id="wpunity_tag_manager_term"><?php echo $term_tag_manager ? $term_tag_manager : ''; ?></textarea>
            <p class="description">TagManager.asset (wpunity_tag_manager_term)</p>
        </td>
    </tr>

    <?php $term_time_manager = get_term_meta( $tag->term_id, 'wpunity_time_manager_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-time_manager">
        <th scope="row" valign="top">
            <label for="wpunity_time_manager_term">Time Manager</label>
        </th>
        <td>
            <textarea name="wpunity_time_manager_term" id="wpunity_time_manager_term"><?php echo $term_time_manager ? $term_time_manager : ''; ?></textarea>
            <p class="description">TimeManager.asset (wpunity_time_manager_term)</p>
        </td>
    </tr>

    <?php $unity_connect_settings = get_term_meta( $tag->term_id, 'wpunity_unity_connect_settings_term', true );// Check for existing taxonomy meta for the term you're editing ?>

    <tr class="form-field term-unity_connect_settings">
        <th scope="row" valign="top">
            <label for="wpunity_unity_connect_settings_term">Unity Connect Settings</label>
        </th>
        <td>
            <textarea name="wpunity_unity_connect_settings_term" id="wpunity_unity_connect_settings_term"><?php echo $unity_connect_settings ? $unity_connect_settings : ''; ?></textarea>
            <p class="description">UnityConnectSettings.asset (wpunity_unity_connect_settings_term)</p>
        </td>
    </tr>

    <?php
}

//==========================================================================================================================================

// Save our extra taxonomy fields
function wpunity_games_projectSettings_fields_save( $term_id ) {

    if ( isset( $_POST['wpunity_audio_manager_term'] ) ) {
        $term_audio_manager = $_POST['wpunity_audio_manager_term'];
        update_term_meta($term_id, 'wpunity_audio_manager_term', $term_audio_manager);
    }

    if ( isset( $_POST['wpunity_cluster_input_manager_term'] ) ) {
        $term_cluster_input_manager = $_POST['wpunity_cluster_input_manager_term'];
        update_term_meta($term_id, 'wpunity_cluster_input_manager_term', $term_cluster_input_manager);
    }

    if ( isset( $_POST['wpunity_dynamics_manager_term'] ) ) {
        $term_dynamics_manager = $_POST['wpunity_dynamics_manager_term'];
        update_term_meta($term_id, 'wpunity_dynamics_manager_term', $term_dynamics_manager);
    }

    if ( isset( $_POST['wpunity_editor_build_settings_term'] ) ) {
        $term_editor_build_settings = $_POST['wpunity_editor_build_settings_term'];
        update_term_meta($term_id, 'wpunity_editor_build_settings_term', $term_editor_build_settings);
    }

    if ( isset( $_POST['wpunity_editor_settings_term'] ) ) {
        $term_editor_settings = $_POST['wpunity_editor_settings_term'];
        update_term_meta($term_id, 'wpunity_editor_settings_term', $term_editor_settings);
    }

    if ( isset( $_POST['wpunity_graphics_settings_term'] ) ) {
        $term_graphics_settings = $_POST['wpunity_graphics_settings_term'];
        update_term_meta($term_id, 'wpunity_graphics_settings_term', $term_graphics_settings);
    }

    if ( isset( $_POST['wpunity_input_manager_term'] ) ) {
        $term_input_manager = $_POST['wpunity_input_manager_term'];
        update_term_meta($term_id, 'wpunity_input_manager_term', $term_input_manager);
    }

    if ( isset( $_POST['wpunity_nav_mesh_areas_term'] ) ) {
        $term_nav_mesh_areas = $_POST['wpunity_nav_mesh_areas_term'];
        update_term_meta($term_id, 'wpunity_nav_mesh_areas_term', $term_nav_mesh_areas);
    }

    if ( isset( $_POST['wpunity_network_manager_term'] ) ) {
        $term_network_manager = $_POST['wpunity_network_manager_term'];
        update_term_meta($term_id, 'wpunity_network_manager_term', $term_network_manager);
    }

    if ( isset( $_POST['wpunity_physics2d_settings_term'] ) ) {
        $term_physics2d_settings = $_POST['wpunity_physics2d_settings_term'];
        update_term_meta($term_id, 'wpunity_physics2d_settings_term', $term_physics2d_settings);
    }

    if ( isset( $_POST['wpunity_project_settings_term'] ) ) {
        $term_project_settings = $_POST['wpunity_project_settings_term'];
        update_term_meta($term_id, 'wpunity_project_settings_term', $term_project_settings);
    }

    if ( isset( $_POST['wpunity_project_version_term'] ) ) {
        $term_project_version = $_POST['wpunity_project_version_term'];
        update_term_meta($term_id, 'wpunity_project_version_term', $term_project_version);
    }

    if ( isset( $_POST['wpunity_quality_settings_term'] ) ) {
        $term_quality_settings = $_POST['wpunity_quality_settings_term'];
        update_term_meta($term_id, 'wpunity_quality_settings_term', $term_quality_settings);
    }

    if ( isset( $_POST['wpunity_tag_manager_term'] ) ) {
        $term_tag_manager = $_POST['wpunity_tag_manager_term'];
        update_term_meta($term_id, 'wpunity_tag_manager_term', $term_tag_manager);
    }

    if ( isset( $_POST['wpunity_time_manager_term'] ) ) {
        $term_time_manager = $_POST['wpunity_time_manager_term'];
        update_term_meta($term_id, 'wpunity_time_manager_term', $term_time_manager);
    }

    if ( isset( $_POST['wpunity_unity_connect_settings_term'] ) ) {
        $term_unity_connect_settings = $_POST['wpunity_unity_connect_settings_term'];
        update_term_meta($term_id, 'wpunity_unity_connect_settings_term', $term_unity_connect_settings);
    }
}

//add_action( 'wpunity_game_type_edit_form_fields', 'wpunity_games_projectSettings_fields', 10, 2 );

//add_action( 'edited_wpunity_game_type', 'wpunity_games_projectSettings_fields_save', 10, 2 );

//==========================================================================================================================================


function wpunity_games_taxcategory_fill(){
    wp_insert_term(
        'Real Place', // the term
        'wpunity_game_cat', // the taxonomy
        array(
            'description'=> 'Real places are places that exist in reality and were 3D scanned.',
            'slug' => 'real_place',
        )
    );

    wp_insert_term(
        'Virtual Place', // the term
        'wpunity_game_cat', // the taxonomy
        array(
            'description'=> 'Virtual places do not exist in reality and they are a sort of iconic places to expose 3D scanned artifacts.',
            'slug' => 'virtual_place',
        )
    );

}

add_action( 'init', 'wpunity_games_taxcategory_fill' );

//==========================================================================================================================================


add_filter( 'manage_wpunity_game_posts_columns', 'wpunity_set_custom_wpunity_game_columns' );

function wpunity_set_custom_wpunity_game_columns($columns) {
    $columns['game_slug'] = 'Game Slug';

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_wpunity_game_posts_custom_column' , 'wpunity_set_custom_wpunity_game_columns_fill', 10, 2 );

function wpunity_set_custom_wpunity_game_columns_fill( $column, $post_id ) {
    switch ( $column ) {

        case 'game_slug' :
            $mypost = get_post($post_id);
            $theSlug = $mypost->post_name;
            if ( is_string( $theSlug ) )
                echo $theSlug;
            else
                echo 'no slug found';
            break;
    }
}
?>
