<?php

add_action('add_meta_boxes','wpunity_assets_taxcategory_box');

/**
 * 2.04
 * Create Asset Category Box @ asset's backend
 *
 * (dropdown style)
 */

function wpunity_assets_taxcategory_box() {

    remove_meta_box( 'wpunity_asset3d_catdiv', 'wpunity_asset3d', 'side' ); //Removes the default metabox at side

    add_meta_box( 'tagsdiv-wpunity_asset3d_cat','Asset Category','wpunity_assets_taxcategory_box_content', 'wpunity_asset3d', 'side' , 'high'); //Adds the custom metabox with select box
}


function wpunity_assets_taxcategory_box_content($post){
    $tax_name = 'wpunity_asset3d_cat';

    ?>

    <div class="tagsdiv" id="<?php echo $tax_name; ?>">

        <p class="howto"><?php echo 'Select category for current Asset' ?></p>

        <?php
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wpunity_asset3d_cat_noncename' );
        $type_IDs = wp_get_object_terms( $post->ID, 'wpunity_asset3d_cat', array('fields' => 'ids') );

        $args = array(
            'show_option_none'   => 'Select Category',
            'orderby'            => 'name',
            'hide_empty'         => 0,
            'selected'           => $type_IDs[0],
            'name'               => 'wpunity_asset3d_cat',
            'taxonomy'           => 'wpunity_asset3d_cat',
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
function wpunity_assets_taxcategory_box_content_save( $post_id ) {

    global $wpdb;

    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times

    if ( !wp_verify_nonce( $_POST['wpunity_asset3d_cat_noncename'], plugin_basename( __FILE__ ) ) )
        return;


    // Check permissions
    if ( 'wpunity_asset3d' == $_POST['post_type'] )
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
    $type_ID = intval($_POST['wpunity_asset3d_cat'], 10);

    $type = ( $type_ID > 0 ) ? get_term( $type_ID, 'wpunity_asset3d_cat' )->slug : NULL;

    wp_set_object_terms(  $post_id , $type, 'wpunity_asset3d_cat' );

}

/* Do something with the data entered */
add_action( 'save_post', 'wpunity_assets_taxcategory_box_content_save' );



function wpunity_create_sceneTax( $new_status, $old_status, $post ){
    global $wpdb;

    $post_id = $post->ID;
    $post_title = get_the_title($post_id);
    $post_slug = $post->post_name;
    $post_type = get_post_type($post);

    if ($post_type == 'wpunity_scene') {
        if ( ($new_status == 'publish') && ($old_status != 'publish') ) {
            wp_insert_term($post_title,'wpunity_asset3d_pscene',$post_slug,'Scene of a Game');
        }

    }
}

add_action(  'transition_post_status',  'wpunity_create_sceneTax', 10, 3 );