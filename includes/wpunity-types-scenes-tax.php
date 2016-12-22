<?php

add_action('add_meta_boxes','wpunity_scenes_taxgame_box');

/**
 * 2.04
 * Create Scene's Game Box @ scene's backend
 *
 * (dropdown style)
 */

function wpunity_scenes_taxgame_box() {

    remove_meta_box( 'wpunity_scene_pgamediv', 'wpunity_scene', 'side' ); //Removes the default metabox at side

    add_meta_box( 'tagsdiv-wpunity_scene_pgame','Scene Game','wpunity_scenes_taxgame_box_content', 'wpunity_scene', 'side' , 'high'); //Adds the custom metabox with select box
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
        $new_option = "<option disabled selected value='-1'>".'Select category'."</option>";
        $select = str_replace($old_option, $new_option, $select);

        echo $select;
        ?>

    </div>
    <?php
}


/**
 * When the post is saved, also saves wpunity_asset3d_cat
 * @param $post_id
 */
function wpunity_scenes_taxgame_box_content_save( $post_id ) {

    global $wpdb;

    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
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

/* Do something with the data entered */
add_action( 'save_post', 'wpunity_scenes_taxgame_box_content_save' );