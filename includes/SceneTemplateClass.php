<style type="text/css">
    .yaml_label{
        width:12%;
        display:inline-block;
        vertical-align: top;
    }
    .yaml_input_large {
        width:80%;
        height:50em;
        font-family: monospace;
    }
    .yaml_input_small {
        width:80%;
        height:4em;
        font-family: monospace;
    }
</style>


<?php
/**
Description: Create a Scene, and its taxonomies
Version: 1.0
Author: Dimitrios Ververidis
License: AGPL
 */
class SceneTemplateClass
{
    function __construct()
    {
        register_activation_hook(__FILE__, array($this, 'activate'));
        add_action('init', array($this, 'init_cpt_scene_template'));
        add_action('init', array($this, 'create_taxonomies_scene_template'));
        add_action('init', array($this, 'register_new_taxonomy_terms_scene_template'));
        add_action("save_post", array($this, 'save_scene_template_data_to_db_and_media'), 10, 3);
    }

    function activate()
    {
//        $this->init_cpt_scene();
//        $this->create_taxonomies_scene();
//        $this->register_new_taxonomy_terms_scene();
    }

    function init_cpt_scene_template(){

        $labels = array(
            'name' => _x('Scene Templates', 'A Scene inherits properties of the Scene Template'),
            'singular_name' => _x('Scene Template', 'Scene Template singular name'),
            'add_new' => _x('Add New', 'Scene Template'),
            'add_new_item' => __('Add New Scene Template'),
            'edit_item' => __('Edit Scene Template'),
            'new_item' => __('New Scene Template'),
            'all_items' => __('All Scene Templates'),
            'view_item' => __('View Scene Template'),
            'search_items' => __('Search Scene Templates'),
            'not_found' => __('No Scene Template found'),
            'not_found_in_trash' => __('No Scene Template found in the Trash'),
            'parent_item_colon' => '',
            'menu_name' => 'Scene Templates'
        );

        // args array
        $args = array(
            'labels' => $labels,
            'description' => 'Displays Scene Templates',
            'public' => true,
            'menu_position' => 25,
            'menu_icon' =>'dashicons-visibility',
            'supports' => array('title', 'editor', 'thumbnail' ),
            'has_archive' => true,
            'register_meta_box_cb' => array($this, 'add_scene_template_metaboxes')
        );

        register_post_type('scene_template', $args);
    }


    function add_scene_template_metaboxes() {
        add_meta_box("scene_template_prefab_custom_fields_metabox", "Scene template prefab custom fields",
            array($this, "scene_template_prefab_custom_fields"), "scene_template", "normal", "default", null);


        add_meta_box("scene_template_fixed_custom_fields_metabox", "Scene template fixed custom fields",
            array($this, "scene_template_fixed_custom_fields"), "scene_template", "normal", "default", null);




    }


    function scene_template_fixed_custom_fields($object)
    {
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");
        ?>

        <div style="margin-bottom:30px ">Write the fixed things of the Scene such as
            Occlussion, Render, LightMap and NavMesh settings</div>

        <div>
            <label for="scene-OCS-input" class="yaml_label">Occlusion Culling Settings</label>
            <textarea name="scene-OCS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-OCS", true); ?></textarea>
        </div>


        <div>
            <label for="scene-RS-input" class="yaml_label">Render Settings</label>
            <textarea name="scene-RS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-RS", true); ?></textarea>
        </div>


        <div>
            <label for="scene-LMS-input" class="yaml_label">LightMap Settings</label>
            <textarea name="scene-LMS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-LMS", true); ?></textarea>
        </div>


        <div>
            <label for="scene-NMS-input" class="yaml_label">NavMesh Settings</label>
            <textarea name="scene-NMS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-NMS", true); ?></textarea>
        </div>


        <div>
            <label for="scene-FPS-input" class="yaml_label">First Person Prefab</label>
            <textarea name="scene-FPS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-FPS", true); ?></textarea>
        </div>

        <div>
            <label for="scene-light-input" class="yaml_label">Light pattern</label>
            <textarea name="scene-light-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-light", true); ?></textarea>
        </div>

        <div style="margin-top:30px">The guid of the FPS Fab can be found in:<br />
            "Standard Assets\Characters\FirstPersonCharacter\Prefabs\FPSController.prefab.mat"</div>




        <?php
        // end of fixed custom fields
    }

    /**
     * Prefabricated objects in the scene
     *
     * @param $object
     */
    function scene_template_prefab_custom_fields($object)
    {
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");

        ?>

        <div style="margin-bottom:30px">Write the patterns for the prefabricated objects, staticObjects (floor), dynamic objects, doors, and POIs</div>

        <div>
            <label for="scene-static-object-pattern-input" class="yaml_label">Static object pattern</label>
            <textarea name="scene-static-object-pattern-input" class="yaml_input_large"
            ><?php echo get_post_meta($object->ID, "scene-static-object-pattern", true);?></textarea>
        </div>

        <div>
            <label for="scene-dynamic-object-pattern-input" class="yaml_label">Dynamic object pattern</label>
            <textarea name="scene-dynamic-object-pattern-input" class="yaml_input_large"
              ><?php echo get_post_meta($object->ID, "scene-dynamic-object-pattern", true);?></textarea>
        </div>

        <div>
            <label for="scene-door-pattern-input" class="yaml_label">Door pattern</label>
            <textarea name="scene-door-pattern-input" class="yaml_input_large"
                ><?php echo get_post_meta($object->ID, "scene-door-pattern", true); ?></textarea>
        </div>

        <div>
            <label for="scene-POI-pattern-input" class="yaml_label">POI pattern</label>
            <textarea name="scene-POI-pattern-input" class="yaml_input_large"
                ><?php echo get_post_meta($object->ID, "scene-POI-pattern", true);?></textarea>
        </div>




        <?php

        // end of prefab custom fields
    }

    /**
     * Now Save everything to db
     *
     * @param $post_id
     * @param $post
     * @param $update
     * @return mixed
     */
    function save_scene_template_data_to_db_and_media($post_id, $post, $update)
    {
        // Safety check for intruders
        if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
            return $post_id;

        // check permissions for current user
        if(!current_user_can("edit_post", $post_id))
            return $post_id;

        // check for autosave
        if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
            return $post_id;

        // Avoid changing other custom types
        if($post->post_type != 'scene_template' )
            return $post_id;

        // ============ Start of custom fields =============================================
        // $scene_category_slug = get_the_terms($post, 'scene_category')[0]->slug;
        $post_slug = $post->post_name;

        $this->updateFieldWrapper($post_id, "scene-OCS-input", "scene-OCS");
        $this->updateFieldWrapper($post_id, "scene-RS-input", "scene-RS");
        $this->updateFieldWrapper($post_id, "scene-LMS-input", "scene-LMS");
        $this->updateFieldWrapper($post_id, "scene-NMS-input", "scene-NMS");
        $this->updateFieldWrapper($post_id, "scene-FPS-input", "scene-FPS");


        $this->updateFieldWrapper($post_id, "scene-static-object-pattern-input", "scene-static-object-pattern");
        $this->updateFieldWrapper($post_id, "scene-dynamic-object-pattern-input", "scene-dynamic-object-pattern");
        $this->updateFieldWrapper($post_id, "scene-door-pattern-input", "scene-door-pattern");
        $this->updateFieldWrapper($post_id, "scene-POI-pattern-input", "scene-POI-pattern");

        $this->updateFieldWrapper($post_id, "scene-light-input", "scene-light");
    }

    function updateFieldWrapper($post_id, $fieldinput, $postmetaname){

        $val = "";

        if(isset($_POST[$fieldinput]))
            $val = $_POST[$fieldinput];

        update_post_meta($post_id, $postmetaname, $val);
    }


    /**
     *    Create custom taxonomies for the scene templates
     */
    function create_taxonomies_scene_template(){

        $labels = array(
            'name' => _x('Scene Template Categories', 'taxonomy general name'),
            'singular_name' => _x('Scene Category', 'taxonomy singular name'),
            'search_items' => __('Search Scene Template Categories'),
            'all_items' => __('All Scene Template Categories'),
            'parent_item' => __('Parent Scene Template Category'),
            'parent_item_colon' => __('Parent Scene Template Category:'),
            'edit_item' => __('Edit Scene Template Category'),
            'update_item' => __('Update Scene Template Category'),
            'add_new_item' => __('Add New Scene Template Category'),
            'new_item_name' => __('New Scene Template Category'),
            'menu_name' => __('Scene Template Categories'),
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'capabilities' => array(
                'manage_terms' => '',
                'edit_terms' => '',
                'delete_terms' => '',
                'assign_terms' => 'edit_posts'
            )
        );

        register_taxonomy('scene_template_category', 'scene_template', $args);
    }

    /*
     *     This category is the type of the Scene Template.
     *
     */
    function register_new_taxonomy_terms_scene_template(){

        $this->taxonomy = 'scene_template_category';

        $this->terms = array(
            '0' => array(
                'name' => 'Wonder around',
                'slug' => 'wonderaround',
                'description' => 'Explore a virtual place from a first person\'s view.',
            )
        );

        // now create the categories
        foreach ($this->terms as $term_key => $term) {

            if (get_term($term)->slug == 'uncategorized') {
                wp_insert_term(
                    $term['name'],
                    $this->taxonomy,
                    array(
                        'description' => $term['description'],
                        'slug' => $term['slug'],
                    )
                );
                unset($term);
            }
        }
    }

}
?>