<?php

$sceneTemplateClass = new SceneYamlTemplateClass();

class SceneYamlTemplateClass{
    function __construct(){
        add_action('init', array($this, 'wpunity_yamltemp_construct') , 10);//wpunity_yamltemp
        add_action('init', array($this, 'wpunity_yamltemp_taxcategory') , 9);//wpunity_yamltemp_cat
        add_action('init', array($this, 'wpunity_yamltemp_default_items') , 8);//wpunity_yamltemp_cat
    }

    /**
     * A1.01
     * Create Scene YAML Template
     *
     * Template for YAML as custom type 'wpunity_yamltemp'
     */
    function wpunity_yamltemp_construct(){

        $labels = array(
            'name'               => _x( 'Scene YAML templates', 'post type general name'),
            'singular_name'      => _x( 'Scene YAML template', 'post type singular name'),
            'menu_name'          => _x( 'Scene YAML templates', 'admin menu'),
            'name_admin_bar'     => _x( 'Scene YAML template', 'add new on admin bar'),
            'add_new'            => _x( 'Add New', 'add new on menu'),
            'add_new_item'       => __( 'Add New Scene YAML template'),
            'new_item'           => __( 'New Scene YAML template'),
            'edit'               => __( 'Edit'),
            'edit_item'          => __( 'Edit Scene YAML template'),
            'view'               => __( 'View'),
            'view_item'          => __( 'View Scene YAML template'),
            'all_items'          => __( 'All Scene YAML templates'),
            'search_items'       => __( 'Search Scene YAML templates'),
            'parent_item_colon'  => __( 'Parent Scene YAML templates:'),
            'parent'             => __( 'Parent Scene YAML template'),
            'not_found'          => __( 'No Scene YAML templates found.'),
            'not_found_in_trash' => __( 'No Scene YAML templates found in Trash.')
        );

        $args = array(
            'labels'                => $labels,
            'description'           => 'Displays Scene YAML templates',
            'public'                => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'show_in_nav_menus'     => false,
            'menu_position'     => 25,
            'menu_icon'         =>'dashicons-welcome-widgets-menus',
            'supports'          => array('title','editor','custom-fields'),
            'hierarchical'      => false,
            'has_archive'       => false,
            'taxonomies'        => array('wpunity_yamltemp_cat'),
        );

        register_post_type('wpunity_yamltemp', $args);


        if( !term_exists( 'Main Menu', 'wpunity_yamltemp_cat' ) ) {
            wp_insert_term(
                'Main Menu', // the term
                'wpunity_yamltemp_cat', // the taxonomy
                array(
                    'description' => 'YAML Template for Main Menu scenes',
                    'slug' => 'mainmenu-yaml',
                )
            );
        }

        if( !term_exists( 'Credentials', 'wpunity_yamltemp_cat' ) ) {
            wp_insert_term(
                'Credentials', // the term
                'wpunity_yamltemp_cat', // the taxonomy
                array(
                    'description' => 'YAML Template for Credentials scenes',
                    'slug' => 'credentials-yaml',
                )
            );
        }

        if( !term_exists( 'Wonder Around', 'wpunity_yamltemp_cat' ) ) {
            wp_insert_term(
                'Wonder Around', // the term
                'wpunity_yamltemp_cat', // the taxonomy
                array(
                    'description' => 'YAML Template for Wonder Around scenes',
                    'slug' => 'wonderaround-yaml',
                )
            );
        }

    }

    //==========================================================================================================================================

    /**
     * A1.02
     * Create Scene YAML Template Category
     *
     * Category of Scene YAML Template as custom taxonomy 'wpunity_yamltemp_cat'
     */
    function wpunity_yamltemp_taxcategory(){

        $labels = array(
            'name'              => _x( 'YAML Template Category', 'taxonomy general name'),
            'singular_name'     => _x( 'YAML Template Category', 'taxonomy singular name'),
            'menu_name'         => _x( 'YAML Template Categories', 'admin menu'),
            'search_items'      => __( 'Search YAML Template Categories'),
            'all_items'         => __( 'All YAML Template Categories'),
            'parent_item'       => __( 'Parent YAML Template Category'),
            'parent_item_colon' => __( 'Parent YAML Template Category:'),
            'edit_item'         => __( 'Edit YAML Template Category'),
            'update_item'       => __( 'Update YAML Template Category'),
            'add_new_item'      => __( 'Add New YAML Template Category'),
            'new_item_name'     => __( 'New YAML Template Category')
        );

        $args = array(
            'description' => 'Category of Scene YAML Template',
            'labels'    => $labels,
            'public'    => false,
            'show_ui'   => true,
            'hierarchical' => true,
            'show_admin_column' => true
        );

        register_taxonomy('wpunity_yamltemp_cat', 'wpunity_yamltemp', $args);

    }

    function wpunity_yamltemp_default_items(){

        //get categories IDs
        $mmenuCat = get_term_by('slug', 'mainmenu-yaml', 'wpunity_yamltemp_cat');
        $mmenuCatID = $mmenuCat->term_id;
        $credeCat = get_term_by('slug', 'credentials-yaml', 'wpunity_yamltemp_cat');
        $credeCatID = $credeCat->term_id;
        $waroundCat = get_term_by('slug', 'wonderaround-yaml', 'wpunity_yamltemp_cat');
        $waroundCatID = $waroundCat->term_id;

        $defMainMenuTitle = 'Default Main Menu YAML';
        if (!get_page_by_title($defMainMenuTitle, 'OBJECT', 'wpunity_yamltemp')){
            $defMainMenu = array(
                'post_title'    => $defMainMenuTitle,
                'post_name' => 'default-mainmenu-yaml',
                'post_status'   => 'publish',
                'post_type'     => 'wpunity_yamltemp',
                'tax_input'    => array(
                    'wpunity_yamltemp_cat'     => array( $mmenuCatID ),
                ),
            );
            wp_insert_post($defMainMenu);
        }

        $defCredentialsTitle = 'Default Credentials YAML';
        if (!get_page_by_title($defCredentialsTitle, 'OBJECT', 'wpunity_yamltemp')) {
            $defCredentials = array(
                'post_title' => $defCredentialsTitle,
                'post_name' => 'default-credentials-yaml',
                'post_status' => 'publish',
                'post_type' => 'wpunity_yamltemp',
                'tax_input' => array(
                    'wpunity_yamltemp_cat' => array($credeCatID),
                ),
            );
            wp_insert_post($defCredentials);
        }

        $defWAroundTitle = 'Default Wonder Around YAML';
        if (!get_page_by_title($defWAroundTitle, 'OBJECT', 'wpunity_yamltemp')) {
            $defWAround = array(
                'post_title' => $defWAroundTitle,
                'post_name' => 'default-wonderaround-yaml',
                'post_status' => 'publish',
                'post_type' => 'wpunity_yamltemp',
            );
            $defWAroundPost = wp_insert_post($defWAround);
            wp_set_object_terms( $defWAroundPost, $waroundCatID, 'wpunity_yamltemp_cat' );
        }

    }
}

//==========================================================================================================================================

/**
 * A1.03
 * Generate Taxonomy (for Games) with Template's slug/name
 *
 *
 * Generate taxonomy for Game usage (wpunity_game_cat)
 */

function wpunity_create_tax_forgames( $new_status, $old_status, $post ){

    $post_type = get_post_type($post);

    if ($post_type == 'wpunity_yamltemp') {
        if ( ($new_status == 'publish') ) {

            //slug Template
            $tempSlug = $post->post_name;
            $tempTitle = $post->post_title;

            //Create a tax yamlscene for the scenes
            wp_insert_term($tempTitle,'wpunity_scene_yaml',$tempSlug,'Template of Scene');

        }else{
            //TODO It's not a new Game so DELETE everything (folder & taxonomy)
        }

    }
}

add_action('transition_post_status','wpunity_create_tax_forgames',10,3);
?>