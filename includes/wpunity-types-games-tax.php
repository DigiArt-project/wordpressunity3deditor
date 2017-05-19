<?php
/**
 * B2.01
 * Create Game Category Box @ Game's backend
 *
 * (dropdown style)
 */

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

/**
 * A2.02
 * When the post is saved, also saves wpunity_game_cat / wpunity_game_type
 *
 *
 */

function wpunity_games_taxcategory_box_content_save( $post_id ) {

    global $wpdb;

    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times

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

?>