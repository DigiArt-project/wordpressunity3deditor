<?php
/**
 * A2.01
 * Create YAML Template Category Box @ YAML Template's backend
 *
 * (dropdown style)
 */

add_action('add_meta_boxes','wpunity_yamltemp_taxcategory_box');

function wpunity_yamltemp_taxcategory_box() {

    remove_meta_box( 'wpunity_yamltemp_catdiv', 'wpunity_yamltemp', 'side' ); //Removes the default metabox at side

    add_meta_box( 'tagsdiv-wpunity_yamltemp_cat','YAML Template Category','wpunity_yamltemp_taxcategory_box_content', 'wpunity_yamltemp', 'side' , 'high'); //Adds the custom metabox with select box
}

function wpunity_yamltemp_taxcategory_box_content($post){
    $tax_name = 'wpunity_yamltemp_cat';

    ?>

    <div class="tagsdiv" id="<?php echo $tax_name; ?>">

        <p class="howto"><?php echo 'Select category for current YAML Template' ?></p>

        <?php
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wpunity_yamltemp_cat_noncename' );
        $type_IDs = wp_get_object_terms( $post->ID, 'wpunity_yamltemp_cat', array('fields' => 'ids') );

        $args = array(
            'show_option_none'   => 'Select Category',
            'orderby'            => 'name',
            'hide_empty'         => 0,
            'selected'           => $type_IDs[0],
            'name'               => 'wpunity_yamltemp_cat',
            'taxonomy'           => 'wpunity_yamltemp_cat',
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

//==========================================================================================================================================

/**
 * A2.02
 * When the post is saved, also saves wpunity_yamltemp_cat
 *
 *
 */

function wpunity_yamltemp_taxcategory_box_content_save( $post_id ) {

    global $wpdb;

    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times

    if ( !wp_verify_nonce( $_POST['wpunity_yamltemp_cat_noncename'], plugin_basename( __FILE__ ) ) )
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
    $type_ID = intval($_POST['wpunity_yamltemp_cat'], 10);

    $type = ( $type_ID > 0 ) ? get_term( $type_ID, 'wpunity_yamltemp_cat' )->slug : NULL;

    wp_set_object_terms(  $post_id , $type, 'wpunity_yamltemp_cat' );

}

/* Do something with the data entered */
add_action( 'save_post', 'wpunity_yamltemp_taxcategory_box_content_save' );

//==========================================================================================================================================

/**
 * A2.03
 * Create Initial wpunity_yamltemp_cat (YAML Template Category) terms
 *
 *
 */

function wpunity_yamltemp_taxcategory_fill(){
    wp_insert_term(
        'Wonder Around', // the term
        'wpunity_yamltemp_cat', // the taxonomy
        array(
            'description'=> 'Explore a virtual place from a first person\'s view.',
            'slug' => 'wonderaround',
        )
    );
}

add_action( 'init', 'wpunity_games_taxcategory_fill' );

//==========================================================================================================================================

?>