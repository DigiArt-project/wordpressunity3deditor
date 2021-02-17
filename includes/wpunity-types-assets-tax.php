<?php



function wpunity_assets_taxcategory_box() {
    
    remove_meta_box( 'wpunity_asset3d_pgamediv', 'wpunity_asset3d', 'side' ); //Removes the default metabox at side
    remove_meta_box( 'wpunity_asset3d_catdiv', 'wpunity_asset3d', 'side' ); //Removes the default metabox at side
    remove_meta_box( 'wpunity_asset3d_ipr_catdiv', 'wpunity_asset3d', 'side' ); //Removes the default metabox at side

    add_meta_box( 'tagsdiv-wpunity_assetpgame_cat','Asset\'s Game','wpunity_assets_taxpgame_box_content', 'wpunity_asset3d', 'side' , 'high'); //Adds the custom metabox with select box
    add_meta_box( 'tagsdiv-wpunity_asset3d_cat','Asset Category','wpunity_assets_taxcategory_box_content', 'wpunity_asset3d', 'side' , 'high'); //Adds the custom metabox with select box
    add_meta_box( 'tagsdiv-wpunity_asset3d_ipr_cat','Asset IPR Category','wpunity_assets_taxcategory_ipr_box_content', 'wpunity_asset3d', 'side' , 'high'); //Adds the custom metabox with select box
    
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
        
        echo $post->ID;
        
        
        print_r($type_IDs);
        

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


//============ IPR categories ====================

function wpunity_assets_taxcategory_ipr_box_content($post){
    $tax_name = 'wpunity_asset3d_ipr_cat';
    ?>
    <div class="tagsdiv" id="<?php echo $tax_name; ?>">

        <p class="howto"><?php echo 'Select IPR category for current Asset' ?></p>
        
        <?php
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wpunity_asset3d_ipr_cat_noncename' );
       
        $type_IDs = wp_get_object_terms( $post->ID, 'wpunity_asset3d_ipr_cat', array('fields' => 'ids') );
        
        $args = array(
            'show_option_none'   => 'Select IPR Category',
            'orderby'            => 'name',
            'hide_empty'         => 0,
            'selected'           => $type_IDs[0],
            'name'               => 'wpunity_asset3d_ipr_cat',
            'taxonomy'           => 'wpunity_asset3d_ipr_cat',
            'echo'               => 0,
            'option_none_value'  => '-1',
            'id' => 'wpunity-select-asset3d-ipr-cat-dropdown',
        );

        //if (term_exists( 'visible to all', 'wpunity_asset3d_ipr_cat')!=0) {
            wp_insert_term(
                'Private', // the term
                'wpunity_asset3d_ipr_cat', // the taxonomy
                array(
                    'description' => 'Nobody can view or edit the asset',
                    'slug' => 'asset_private',
                )
            );
        //}

            wp_insert_term(
                'Shared Type A', // the term
                'wpunity_asset3d_ipr_cat', // the taxonomy
                array(
                    'description' => 'Others can view only',
                    'slug' => 'asset_shared_type_a',
                )
            );

        wp_insert_term(
            'Shared Type B', // the term
            'wpunity_asset3d_ipr_cat', // the taxonomy
            array(
                'description' => 'Others can view and comment',
                'slug' => 'asset_shared_type_b',
            )
        );

        wp_insert_term(
            'Shared Type C', // the term
            'wpunity_asset3d_ipr_cat', // the taxonomy
            array(
                'description' => 'Others can view, comment, and clone asset with custom descriptions',
                'slug' => 'asset_shared_type_c',
            )
        );

        wp_insert_term(
            'Shared Type D', // the term
            'wpunity_asset3d_ipr_cat', // the taxonomy
            array(
                'description' => 'Others can view, comment, clone and use in experiences',
                'slug' => 'asset_shared_type_d',
            )
        );

        wp_insert_term(
            'Shared Type E', // the term
            'wpunity_asset3d_ipr_cat', // the taxonomy
            array(
                'description' => 'Others can view, comment, clone, use in experiences, and download',
                'slug' => 'asset_shared_type_e',
            )
        );
        
        
        
        $select = wp_dropdown_categories($args);
        
//        $replace = "<select$1 onchange='wpunity_hidecfields_asset3d();' required>";
//        $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );
//
//        $old_option = "<option value='-1'>";
//        $new_option = "<option disabled selected value=''>".'Select IPR category'."</option>";
//        $select = str_replace($old_option, $new_option, $select);


        $replace = "<select$1 required>";
        $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );

        $old_option = "<option value='-1'>";
        $new_option = "<option disabled value=''>".'Select IPR category'."</option>";
        $select = str_replace($old_option, $new_option, $select);
        
        
        echo $select;
        ?>
    </div>
    <?php
}


//================== Parent game ==================

function wpunity_assets_taxpgame_box_content($post){
    $tax_name = 'wpunity_asset3d_pgame';
    ?>
    <div class="tagsdiv" id="<?php echo $tax_name; ?>">

        <p class="howto"><?php echo 'Select category for current Asset' ?></p>

        <?php
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'wpunity_asset3d_pgame_noncename' );
        $type_IDs = wp_get_object_terms( $post->ID, 'wpunity_asset3d_pgame', array('fields' => 'ids') );

        $args = array(
            'show_option_none'   => 'Select Category',
            'orderby'            => 'name',
            'hide_empty'         => 0,
            'selected'           => $type_IDs[0],
            'name'               => 'wpunity_asset3d_pgame',
            'taxonomy'           => 'wpunity_asset3d_pgame',
            'echo'               => 0,
            'option_none_value'  => '-1',
            'id' => 'wpunity-select-category-dropdown'
        );

        $select = wp_dropdown_categories($args);

        $replace = "<select$1 required>";
        $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );

        $old_option = "<option value='-1'>";
        $new_option = "<option disabled selected value=''>".'Select Game'."</option>";
        $select = str_replace($old_option, $new_option, $select);

        echo $select;
        ?>
    </div>
    <?php
}

//==========================================================================================================================================

// Saves wpunity_asset3d_cat
function wpunity_assets_taxcategory_box_content_save( $post_id ) {
    global $wpdb;

    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;
    
    
    if (!isset($_POST['wpunity_asset3d_cat_noncename']))
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




// Save IPR category
function wpunity_assets_taxcategory_ipr_box_content_save( $post_id ) {
    global $wpdb;
    
    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;
    
    if (!isset($_POST['wpunity_asset3d_ipr_cat_noncename']))
        return;
    
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    
    if ( !wp_verify_nonce( $_POST['wpunity_asset3d_ipr_cat_noncename'], plugin_basename( __FILE__ ) ) )
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
    $type_ID = intval($_POST['wpunity_asset3d_ipr_cat'], 10);
    
    $type = ( $type_ID > 0 ) ? get_term( $type_ID, 'wpunity_asset3d_ipr_cat' )->slug : NULL;
    
    wp_set_object_terms(  $post_id , $type, 'wpunity_asset3d_ipr_cat' );
}







// Save wpunity_asset3d_pgame
function wpunity_assets_taxpgame_box_content_save( $post_id ) {

    global $wpdb;
    
    //$fg = fopen("output_gg.txt","w");
    
   
    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) )
        return;
    
    if (!isset($_POST['wpunity_asset3d_pgame_noncename']))
        return;
    
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times

    if ( !wp_verify_nonce( $_POST['wpunity_asset3d_pgame_noncename'], plugin_basename( __FILE__ ) ) )
        return;
    
    //fwrite( $fg ,  "-------------------->EE3".$_POST['post_type'].current_user_can( 'edit_page', $post_id ));
    
    // Check permissions
    if ( 'wpunity_asset3d' == $_POST['post_type'] )
    {
        if ( ! ( current_user_can( 'edit_post', $post_id )  ) )
            return;
    }
//    else
//    {
//        if ( ! ( current_user_can( 'edit_post', $post_id ) ) )
//            return;
//    }
    
    //fwrite( $fg ,  "-------------------->EE4");
    
    // OK, we're authenticated: we need to find and save the data
    $type_ID = intval($_POST['wpunity_asset3d_pgame'], 10);

    $type = ( $type_ID > 0 ) ? get_term( $type_ID, 'wpunity_asset3d_pgame' )->slug : NULL;

    
//    fwrite( $fg ,  "-------------------->EE".$post_id." ".$type );
//    fclose($fg);
    
    wp_set_object_terms(  $post_id , $type, 'wpunity_asset3d_pgame' );

}



//==========================================================================================================================================

//Yaml for each category

// A callback function to add a custom field to our taxonomy
function wpunity_assets_category_yamlFields($tag) {
    // Check for existing taxonomy meta for the term you're editing
    //$term_meta_yaml_assetcat = get_term_meta( $tag->term_id, 'wpunity_yamlmeta_assetcat_pat', true );
    ?>

<!--    <tr class="form-field term-assetcat_pat">-->
<!--        <th scope="row" valign="top">-->
<!--            <label for="wpunity_yamlmeta_wonderaround_pat">Asset's YAML</label>-->
<!--        </th>-->
<!--        <td>-->
<!--            <textarea name="wpunity_yamlmeta_assetcat_pat" id="wpunity_yamlmeta_assetcat_pat">--><?php //echo $term_meta_yaml_assetcat ? $term_meta_yaml_assetcat : ''; ?><!--</textarea>-->
<!--            <p class="description">wpunity_yamlmeta_assetcat_pat</p>-->
<!--        </td>-->
<!--    </tr>-->

    <tr class="form-field term-assetcat_pat">
        <th scope="row" valign="top">
            <label for="wpunity_assetcat_gamecat">Asset's Game</label>
        </th>
        <td>
            <textarea name="wpunity_assetcat_gamecat" id="wpunity_assetcat_gamecat" readonly><?php echo get_term_meta( $tag->term_id, 'wpunity_assetcat_gamecat', true ); ?></textarea>
            <p class="description">1=Archaeology - 2=Energy - 3=Chemistry</p>
        </td>
    </tr>

    <?php
}

// A callback function to save our extra taxonomy field(s)
function wpunity_assets_category_yamlFields_save( $term_id ) {

//    if ( isset( $_POST['wpunity_yamlmeta_assetcat_pat'] ) ) {
//        $term_meta_wonderaround_pat = $_POST['wpunity_yamlmeta_assetcat_pat'];
//        update_term_meta($term_id, 'wpunity_yamlmeta_assetcat_pat', $term_meta_wonderaround_pat);
//    }

}




//==========================================================================================================================================




function wpunity_set_custom_wpunity_asset3d_columns($columns) {
    $columns['asset_slug'] = 'Asset Slug';

    return $columns;
}



function wpunity_set_custom_wpunity_asset3d_columns_fill( $column, $post_id ) {
    switch ( $column ) {

        case 'asset_slug' :
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
