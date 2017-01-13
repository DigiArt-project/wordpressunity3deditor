<?php

$sceneTemplateClass = new SceneYamlTemplateClass();

class SceneYamlTemplateClass{
    function __construct(){
        add_action('init', array($this, 'wpunity_yamltemp_construct'));//wpunity_yamltemp
        add_action('init', array($this, 'wpunity_yamltemp_taxcategory'));//wpunity_yamltemp_cat
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
            'taxonomies'        => array(),
            'supports'          => array('title','editor','custom-fields'),
            'hierarchical'      => false,
            'has_archive'       => false,
            'taxonomies'        => array('wpunity_yamltemp_cat'),
        );

        register_post_type('wpunity_yamltemp', $args);

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

}
?>