<?php

/**
 * D2.01
 * Create Asset Taxonomy Boxes (Category & Scene) @ asset's backend
 *
 * (dropdown style)
 */

add_action('add_meta_boxes','wpunity_assets_taxcategory_box');

function wpunity_assets_taxcategory_box() {
    remove_meta_box( 'wpunity_asset3d_pscenediv', 'wpunity_asset3d', 'side' ); //Removes the default metabox at side
    remove_meta_box( 'wpunity_asset3d_catdiv', 'wpunity_asset3d', 'side' ); //Removes the default metabox at side

    add_meta_box( 'tagsdiv-wpunity_assetpscene_cat','Asset\'s Scene','wpunity_assets_taxpscene_box_content', 'wpunity_asset3d', 'side' , 'high'); //Adds the custom metabox with select box
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
            'id' => 'wpunity-select-asset3d-cat-dropdown',
        );

        $select = wp_dropdown_categories($args);

        $replace = "<select$1 onchange='wpunity_hidecfields_asset3d();' required>";
        $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );

        $old_option = "<option value='-1'>";
        $new_option = "<option disabled selected value=''>".'Select category'."</option>";
        $select = str_replace($old_option, $new_option, $select);

        echo $select;
        ?>

    </div>
    <?php
}

function wpunity_assets_taxpscene_box_content($post){
    $tax_name = 'wpunity_asset3d_pscene';

    ?>

    <div class="tagsdiv" id="<?php echo $tax_name; ?>">

        <p class="howto"><?php echo 'Select category for current Asset' ?></p>

        <?php
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wpunity_asset3d_pscene_noncename' );
        $type_IDs = wp_get_object_terms( $post->ID, 'wpunity_asset3d_pscene', array('fields' => 'ids') );

        $args = array(
            'show_option_none'   => 'Select Category',
            'orderby'            => 'name',
            'hide_empty'         => 0,
            'selected'           => $type_IDs[0],
            'name'               => 'wpunity_asset3d_pscene',
            'taxonomy'           => 'wpunity_asset3d_pscene',
            'echo'               => 0,
            'option_none_value'  => '-1',
            'id' => 'wpunity-select-category-dropdown'
        );

        $select = wp_dropdown_categories($args);

        $replace = "<select$1 required>";
        $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );

        $old_option = "<option value='-1'>";
        $new_option = "<option disabled selected value=''>".'Select Scene'."</option>";
        $select = str_replace($old_option, $new_option, $select);

        echo $select;
        ?>

    </div>
    <?php
}

//==========================================================================================================================================

/**
 * D2.02
 * When the post is saved, also saves wpunity_asset3d_cat & wpunity_asset3d_pscene
 *
 *
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

add_action( 'save_post', 'wpunity_assets_taxcategory_box_content_save' );

function wpunity_assets_taxpscence_box_content_save( $post_id ) {

    global $wpdb;

    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times

    if ( !wp_verify_nonce( $_POST['wpunity_asset3d_pscene_noncename'], plugin_basename( __FILE__ ) ) )
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
    $type_ID = intval($_POST['wpunity_asset3d_pscene'], 10);

    $type = ( $type_ID > 0 ) ? get_term( $type_ID, 'wpunity_asset3d_pscene' )->slug : NULL;

    wp_set_object_terms(  $post_id , $type, 'wpunity_asset3d_pscene' );

}

add_action( 'save_post', 'wpunity_assets_taxpscence_box_content_save' );

//==========================================================================================================================================

/**
 * D2.03
 * Create Initial wpunity_asset3d_cat (Asset3D Category) terms
 *
 *
 */

function wpunity_assets_taxcategory_fill(){
    wp_insert_term(
        'Dynamic 3D models', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Dynamic 3D models are those that can be clicked or moved, e.g. artifacts.',
            'slug' => 'dynamic3dmodels',
        )
    );
    wp_insert_term(
        'Points of Interest', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Points of interest (POIs) are spots at the game where information pops up.',
            'slug' => 'pois',
        )
    );
    wp_insert_term(
        'Static 3D models', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Static 3D models are those that can not be clicked and can not be moved (e.g. ground, wall, cave, house)',
            'slug' => 'static3dmodels',
        )
    );
    wp_insert_term(
        'Doors', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Doors are 3D model where avatar pass through and thus going from one Scene to another Scene.',
            'slug' => 'doors',
        )
    );
}

add_action( 'init', 'wpunity_assets_taxcategory_fill' );

//==========================================================================================================================================

?>