<?php

// Create Scene's Game Box @ scene's backend

add_action('add_meta_boxes','wpunity_scenes_taxgame_box');

function wpunity_scenes_taxgame_box() {

    remove_meta_box( 'wpunity_scene_pgamediv', 'wpunity_scene', 'side' ); //Removes the default metabox at side
    remove_meta_box( 'wpunity_scene_yamldiv', 'wpunity_scene', 'side' ); //Removes the default metabox at side

    add_meta_box( 'tagsdiv-wpunity_scene_pgame','Scene Game','wpunity_scenes_taxgame_box_content', 'wpunity_scene', 'side' , 'high'); //Adds the custom metabox with select box
    add_meta_box( 'tagsdiv-wpunity_scene_yamldiv','Scene YAML','wpunity_scenes_taxyaml_box_content', 'wpunity_scene', 'side' , 'high'); //Adds the custom metabox with select box
}


function wpunity_scenes_taxgame_box_content($post){
    $tax_name = 'wpunity_scene_pgame';

    ?>

    <div class="tagsdiv" id="<?php echo $tax_name; ?>">

        <p class="howto"><?php echo 'Select Game for current Scene' ?></p>

        <?php
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wpunity_scene_pgame_noncename' );
        $type_IDs = wp_get_object_terms( $post->ID, 'wpunity_scene_pgame', array('fields' => 'ids') );

        $args = array(
            'show_option_none'   => 'Select Game',
            'orderby'            => 'name',
            'hide_empty'         => 0,
            'selected'           => $type_IDs[0],
            'name'               => 'wpunity_scene_pgame',
            'taxonomy'           => 'wpunity_scene_pgame',
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

function wpunity_scenes_taxyaml_box_content($post){
    $tax_name = 'wpunity_scene_yaml';

    ?>

    <div class="tagsdiv" id="<?php echo $tax_name; ?>">

        <p class="howto"><?php echo 'Select YAML for current Scene' ?></p>

        <?php
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wpunity_scene_yaml_noncename' );
        $type_IDs = wp_get_object_terms( $post->ID, 'wpunity_scene_yaml', array('fields' => 'ids') );

        $args = array(
            'show_option_none'   => 'Select YAML',
            'orderby'            => 'name',
            'hide_empty'         => 0,
            'selected'           => $type_IDs[0],
            'name'               => 'wpunity_scene_yaml',
            'taxonomy'           => 'wpunity_scene_yaml',
            'echo'               => 0,
            'option_none_value'  => '-1',
            'id' => 'wpunity-select-category-dropdown'
        );

        $select = wp_dropdown_categories($args);

        $replace = "<select$1 required>";
        $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );

        $old_option = "<option value='-1'>";
        $new_option = "<option disabled selected value=''>".'Select YAML'."</option>";
        $select = str_replace($old_option, $new_option, $select);

        echo $select;
        ?>

    </div>
    <?php
}

//==========================================================================================================================================

/**
 * C2.02
 * When the post is saved, also saves wpunity_game_cat
 *
 *
 */

function wpunity_scenes_taxgame_box_content_save( $post_id ) {

    global $wpdb;

    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;
    
    if (!isset($_POST['wpunity_scene_pgame_noncename']))
        return;
    
    
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['wpunity_scene_pgame_noncename'], plugin_basename( __FILE__ ) ) )
        return;


    // Check permissions
    if ( 'wpunity_scene' == $_POST['post_type'] )
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
    $type_ID = intval($_POST['wpunity_scene_pgame'], 10);

    $type = ( $type_ID > 0 ) ? get_term( $type_ID, 'wpunity_scene_pgame' )->slug : NULL;

    wp_set_object_terms(  $post_id , $type, 'wpunity_scene_pgame' );

}

add_action( 'save_post', 'wpunity_scenes_taxgame_box_content_save' );

function wpunity_scenes_taxyaml_box_content_save( $post_id ) {

    global $wpdb;

    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;
    
    if (!isset($_POST['wpunity_scene_yaml_noncename']))
        return;
    
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['wpunity_scene_yaml_noncename'], plugin_basename( __FILE__ ) ) )
        return;


    // Check permissions
    if ( 'wpunity_scene' == $_POST['post_type'] )
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
    $type_ID = intval($_POST['wpunity_scene_yaml'], 10);

    $type = ( $type_ID > 0 ) ? get_term( $type_ID, 'wpunity_scene_yaml' )->slug : NULL;

    wp_set_object_terms(  $post_id , $type, 'wpunity_scene_yaml' );

}

add_action( 'save_post', 'wpunity_scenes_taxyaml_box_content_save' );

//==========================================================================================================================================

//==========================================================================================================================================


add_filter( 'manage_wpunity_scene_posts_columns', 'wpunity_set_custom_wpunity_scene_columns' );

function wpunity_set_custom_wpunity_scene_columns($columns) {
    $columns['scene_slug'] = 'Scene Slug';

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_wpunity_scene_posts_custom_column' , 'wpunity_set_custom_wpunity_scene_columns_fill', 10, 2 );

function wpunity_set_custom_wpunity_scene_columns_fill( $column, $post_id ) {
    switch ( $column ) {

        case 'scene_slug' :
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
