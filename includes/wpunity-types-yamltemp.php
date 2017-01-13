<style type="text/css">
    .yaml_label{
        width:12%;
        display:inline-block;
        vertical-align: top;
    }
    .yaml_input_large {
        width:80%;
        height:12em;
        font-family: monospace;
    }
    .yaml_input_small {
        width:80%;
        height:4em;
        font-family: monospace;
    }
    .div_yaml_input {
        margin-bottom:30px;
    }
</style>


<?php


$sceneTemplateClass = new YamlTemplateClass();

class YamlTemplateClass{
    function __construct(){
        add_action('init', array($this, 'wpunity_yamltemp_construct'));
//        add_action('init', array($this, 'create_taxonomies_scene_template'));
//        add_action('init', array($this, 'register_new_taxonomy_terms_scene_template'));
//        add_action("save_post", array($this, 'save_scene_template_data_to_db_and_media'), 10, 3);
    }


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
            'menu_icon'         =>'dashicons-visibility',
            'taxonomies'        => array(),
            'supports'          => array('title','editor','custom-fields'),
            'hierarchical'      => false,
            'has_archive'       => false,
        );

        register_post_type('wpunity_yamltemp', $args);

    }


    function add_scene_template_metaboxes() {
        add_meta_box("scene_template_prefab_custom_fields_metabox", "Scene template prefab custom fields",
            array($this, "scene_template_prefab_custom_fields"), "scene_template", "normal", "default", null);


        add_meta_box("scene_template_fixed_custom_fields_metabox", "Scene template fixed custom fields",
            array($this, "scene_template_fixed_custom_fields"), "scene_template", "normal", "default", null);


        add_meta_box("scene_template_dotmeta_custom_fields_metabox", "Scene template .meta pattern",
            array($this, "scene_template_dotmeta_custom_fields"), "scene_template", "normal", "default", null);


        add_meta_box("scene_template_mat_custom_fields_metabox", "Scene template material .mat pattern",
            array($this, "scene_template_mat_custom_fields"), "scene_template", "normal", "default", null);

        add_meta_box("scene_template_doorscript_custom_fields_metabox", "Scene template doors javascript js pattern",
            array($this, "scene_template_doorjs_custom_fields"), "scene_template", "normal", "default", null);

    }


    function scene_template_fixed_custom_fields($object)
    {
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");
        ?>

        <div style="margin-bottom:30px ">Write the fixed things of the Scene such as
            Occlussion, Render, LightMap and NavMesh settings</div>

        <div class="div_yaml_input">
            <label for="scene-OCS-input" class="yaml_label">Occlusion Culling Settings</label>
            <textarea name="scene-OCS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-OCS", true); ?></textarea>
        </div>


        <div class="div_yaml_input">
            <label for="scene-RS-input" class="yaml_label">Render Settings</label>
            <textarea name="scene-RS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-RS", true); ?></textarea>
        </div>


        <div class="div_yaml_input">
            <label for="scene-LMS-input" class="yaml_label">LightMap Settings</label>
            <textarea name="scene-LMS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-LMS", true); ?></textarea>
        </div>


        <div class="div_yaml_input">
            <label for="scene-NMS-input" class="yaml_label">NavMesh Settings</label>
            <textarea name="scene-NMS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-NMS", true); ?></textarea>
        </div>


        <div class="div_yaml_input">
            <label for="scene-FPS-input" class="yaml_label">First Person Prefab</label>
            <textarea name="scene-FPS-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-FPS", true); ?></textarea>
        </div>

        <div class="div_yaml_input">
            <label for="scene-light-input" class="yaml_label">Light pattern</label>
            <textarea name="scene-light-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-light", true); ?></textarea>
        </div>

        <div style="margin-top:30px">The guid of the FPS Fab can be found in:<br />
            "Standard Assets\Characters\FirstPersonCharacter\Prefabs\FPSController.prefab.mat"</div>


        <div style="margin-top:30px">fids up to 7 are used. First available fid is 8.</div>




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

        <div class="div_yaml_input">
            <label for="scene-static-object-pattern-input" class="yaml_label">Static object pattern</label>
            <textarea name="scene-static-object-pattern-input" class="yaml_input_large"
            ><?php echo get_post_meta($object->ID, "scene-static-object-pattern", true);?></textarea>
        </div>

        <div class="div_yaml_input">
            <label for="scene-dynamic-object-pattern-input" class="yaml_label">Dynamic object pattern</label>
            <textarea name="scene-dynamic-object-pattern-input" class="yaml_input_large"
              ><?php echo get_post_meta($object->ID, "scene-dynamic-object-pattern", true);?></textarea>
        </div>

        <div class="div_yaml_input">
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
     * Prefabricated objects in the scene
     *
     * @param $object
     */
    function scene_template_dotmeta_custom_fields($object)
    {
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");

        ?>

        <div style="margin-bottom:30px">Write the pattern for the .meta files.</div>

        <div class="div_yaml_input">
            <label for="scene-folder-dotmeta-pattern-input" class="yaml_label">Folder.meta pattern</label>
            <textarea name="scene-folder-dotmeta-pattern-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-folder-dotmeta-pattern", true);?></textarea>
        </div>


        <div class="div_yaml_input">
            <label for="scene-obj-dotmeta-pattern-input" class="yaml_label">obj.meta pattern</label>
            <textarea name="scene-obj-dotmeta-pattern-input" class="yaml_input_large"
            ><?php echo get_post_meta($object->ID, "scene-obj-dotmeta-pattern", true);?></textarea>
        </div>


        <div class="div_yaml_input">
            <label for="scene-mat-dotmeta-pattern-input" class="yaml_label">mat.meta pattern</label>
            <textarea name="scene-mat-dotmeta-pattern-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-mat-dotmeta-pattern", true);?></textarea>
        </div>

        <div class="div_yaml_input">
            <label for="scene-jpg-dotmeta-pattern-input" class="yaml_label">jpg.meta pattern</label>
            <textarea name="scene-jpg-dotmeta-pattern-input" class="yaml_input_large"
            ><?php echo get_post_meta($object->ID, "scene-jpg-dotmeta-pattern", true);?></textarea>
        </div>


        <div class="div_yaml_input">
            <label for="scene-js-dotmeta-pattern-input" class="yaml_label">js.meta pattern</label>
            <textarea name="scene-js-dotmeta-pattern-input" class="yaml_input_small"
            ><?php echo get_post_meta($object->ID, "scene-js-dotmeta-pattern", true);?></textarea>
        </div>


        <?php
        // end of prefab custom fields
    }


    /**
     * Prefabricated objects in the scene
     *
     * @param $object
     */
    function scene_template_mat_custom_fields($object)
    {
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");

        ?>

        <div style="margin-bottom:30px">Write the pattern for the .mat files.<br />- HINT 1: The .mat should take info from .mtl.<br />
            - HINT 2: the name of the .mat should be "myobjname-defaultMat.mat"</div>

        <div class="div_yaml_input">
            <label for="scene-mat-pattern-input" class="yaml_label">Material (.mat) pattern</label>
            <textarea name="scene-mat-pattern-input" class="yaml_input_large"
            ><?php echo get_post_meta($object->ID, "scene-mat-pattern", true);?></textarea>
        </div>

        <?php
        // end of prefab custom fields
    }


    /**
     * Prefabricated objects in the scene
     *
     * @param $object
     */
    function scene_template_doorjs_custom_fields($object)
    {
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");

        ?>

        <div style="margin-bottom:30px">Write the pattern for the .js files for the doors.</div>

        <div class="div_yaml_input">
            <label for="scene-doorjs-pattern-input" class="yaml_label">Door javascript (.js) pattern</label>
            <textarea name="scene-doorjs-pattern-input" class="yaml_input_large"
            ><?php echo get_post_meta($object->ID, "scene-doorjs-pattern", true);?></textarea>
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
        if($post->post_type != 'wpunity_yamltemp' )
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

        $this->updateFieldWrapper($post_id, "scene-folder-dotmeta-pattern-input", "scene-folder-dotmeta-pattern");
        $this->updateFieldWrapper($post_id, "scene-obj-dotmeta-pattern-input", "scene-obj-dotmeta-pattern");
        $this->updateFieldWrapper($post_id, "scene-mat-dotmeta-pattern-input", "scene-mat-dotmeta-pattern");
        $this->updateFieldWrapper($post_id, "scene-jpg-dotmeta-pattern-input", "scene-jpg-dotmeta-pattern");
        $this->updateFieldWrapper($post_id, "scene-js-dotmeta-pattern-input", "scene-js-dotmeta-pattern");

        $this->updateFieldWrapper($post_id, "scene-mat-pattern-input", "scene-mat-pattern");

        $this->updateFieldWrapper($post_id, "scene-doorjs-pattern-input", "scene-doorjs-pattern");
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