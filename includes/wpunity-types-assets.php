<?php

$asset3dClass = new Asset3DClass();

class Asset3DClass{
    public $asset_path = '';
    public $asset_path_url = '';
    public $asset_subdir = '';

    function __construct(){

        add_action('init', array($this, 'wpunity_assets_construct')); //wpunity_asset3d
        add_action('init', array($this, 'wpunity_assets_taxcategory')); //wpunity_asset3d_cat
        add_action('init', array($this, 'wpunity_assets_taxpscene')); //wpunity_asset3d_pscene



        add_action("save_post", array($this, 'save_data_to_db_and_media'), 10, 3);
        add_action('admin_footer', array($this, 'checktoradio'));
        add_filter('get_sample_permalink', array($this, 'disable_permalink'));

        // TODO: use wp_handle_upload() to overwrite uploaded files

        // TODO: Stathis help me. DISABLE UPDATE BUTTON AND DISPLAY ADMIN NOTICES
    }

    /**
     * 2.01
     * Create Assets
     *
     */
    function wpunity_assets_construct(){

        $labels = array(
            'name'               => _x( 'Assets 3D', 'post type general name'),
            'singular_name'      => _x( 'Asset 3D', 'post type singular name'),
            'menu_name'          => _x( 'Assets 3D', 'admin menu'),
            'name_admin_bar'     => _x( 'Asset 3D', 'add new on admin bar'),
            'add_new'            => _x( 'Add New', 'add new on menu'),
            'add_new_item'       => __( 'Add New Asset 3D'),
            'new_item'           => __( 'New Asset 3D'),
            'edit'               => __( 'Edit'),
            'edit_item'          => __( 'Edit Asset 3D'),
            'view'               => __( 'View'),
            'view_item'          => __( 'View Asset 3D'),
            'all_items'          => __( 'All Assets 3D'),
            'search_items'       => __( 'Search Assets 3D'),
            'parent_item_colon'  => __( 'Parent Assets 3D:'),
            'parent'             => __( 'Parent Asset 3D'),
            'not_found'          => __( 'No Assets 3D found.'),
            'not_found_in_trash' => __( 'No Assets 3D found in Trash.')
        );

        $args = array(
            'labels'                => $labels,
            'description'           => 'Displays Assets 3D',
            'public'                => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'show_in_nav_menus'     => false,
            'menu_position'     => 25,
            'menu_icon'         =>'dashicons-visibility',
            'taxonomies'        => array('wpunity_asset3d_cat','wpunity_asset3d_pscene'),
            'supports'          => array('title','editor','thumbnail','custom-fields'),
            'hierarchical'      => false,
            'has_archive'       => false,
            'register_meta_box_cb' => array($this, 'add_asset3d_metaboxes')
        );

        register_post_type('wpunity_asset3d', $args);
    }

    /**
     * 2.02
     * Create Asset Category
     *
     * Category of 3D asset as custom taxonomy
     */
    function wpunity_assets_taxcategory(){

        $labels = array(
            'name'              => _x( 'Asset Category', 'taxonomy general name'),
            'singular_name'     => _x( 'Asset Category', 'taxonomy singular name'),
            'menu_name'         => _x( 'Asset Categories', 'admin menu'),
            'search_items'      => __( 'Search Asset Categories'),
            'all_items'         => __( 'All Asset Categories'),
            'parent_item'       => __( 'Parent Asset Category'),
            'parent_item_colon' => __( 'Parent Asset Category:'),
            'edit_item'         => __( 'Edit Asset Category'),
            'update_item'       => __( 'Update Asset Category'),
            'add_new_item'      => __( 'Add New Asset Category'),
            'new_item_name'     => __( 'New Asset Category')
        );

        $args = array(
            'description' => 'Category of 3D asset',
            'labels'    => $labels,
            'public'    => false,
            'show_ui'   => true,
            'hierarchical' => true,
            'show_admin_column' => true
        );

        register_taxonomy('wpunity_asset3d_cat', 'wpunity_asset3d', $args);

    }

    /**
     * 2.03
     * Create Asset Scene
     *
     * Select To Which Scenes it belongs to (as custom taxonomy)
     */
    function wpunity_assets_taxpscene(){

        // 2. Select To Which Scenes it belongs to
        $labels = array(
            'name'              => _x( 'Asset Scene', 'taxonomy general name'),
            'singular_name'     => _x( 'Asset Scene', 'taxonomy singular name'),
            'menu_name'         => _x( 'Asset Scenes', 'admin menu'),
            'search_items'      => __( 'Search Asset Scenes'),
            'all_items'         => __( 'All Asset Scenes'),
            'parent_item'       => __( 'Parent Asset Scene'),
            'parent_item_colon' => __( 'Parent Asset Scene:'),
            'edit_item'         => __( 'Edit Asset Scene'),
            'update_item'       => __( 'Update Asset Scene'),
            'add_new_item'      => __( 'Add New Asset Scene'),
            'new_item_name'     => __( 'New Asset Scene')
        );

        $args = array(
            'description' => 'Scene assignment of Asset 3D',
            'labels'    => $labels,
            'public'    => false,
            'show_ui'   => true,
            'hierarchical' => true,
            'show_admin_column' => true
        );

        register_taxonomy('wpunity_asset3d_pscene', 'wpunity_asset3d', $args);
    }






    /*********************************************************************************************************************/


    function add_asset3d_metaboxes($object){

        // General 3D fields
        add_meta_box("asset3d_custom_fields_metabox_3d_web", "3D fields Web", array($this, "asset3d_customfields_3d_web"), "wpunity_asset3d", "normal", "default", null);
//
//        if (get_the_terms($object, 'asset3d_category')) {
//
//            // POIs and dynamic3dmodels
//            if (in_array(get_the_terms($object, 'asset3d_category')[0]->slug, array('pois', 'dynamic3dmodels'))) {
//
//                add_meta_box("asset3d_custom_fields_metabox_info", "Information fields", array($this, "asset3d_customfields_info"), "asset3d", "normal", "default", null);
//
//            }
//
//            // Doors
//            if (get_the_terms($object, 'asset3d_category')[0]->slug == 'doors') {
//
//                add_meta_box("asset3d_custom_fields_metabox_fncs", "Functionality fields", array($this, "asset3d_customfields_fncs"), "asset3d", "normal", "default", null);
//
//            }
//        }
    }


    function asset3d_customfields_3d_web($object){
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");

        // Get the fields values
        $url_mtl_arr = get_post_meta($object->ID, "mtl-file", true);
        $url_mtl = empty($url_mtl_arr)?'':$url_mtl_arr['url'];

        $curr_path = empty(pathinfo($url_mtl)['dirname'])?'': pathinfo($url_mtl)['dirname'].'/';

        $textmtl = empty($curr_path)? '': file_get_contents($url_mtl);

        $url_obj_arr = get_post_meta($object->ID, "obj-file", true);
        $url_obj = empty($url_obj_arr)?'':$url_obj_arr['url'];

        $url_screenshot_img_arr = get_post_meta($object->ID, "screenshot-file", true);
        $url_screenshot_img = empty($url_screenshot_img_arr)?'':$url_screenshot_img_arr['url'];
        ?>

        <div style="margin-bottom:20px">
            <label for="asset3d-preview" style="margin-right:30px;">Asset 3D preview</label>
            <div name="asset3d-preview" id="asset3d-preview"><?php require_once("asset3d_viewer.php");?></div>
        </div>

        <!-- MTL field and text preview -->
        <div style="margin-bottom:20px">
            <label for="mtl-file-input" style="margin-right:30px; vertical-align: top">MTL file</label>
            <input type="file" name="mtl-file-input" id="mtl-file-input" accept=".mtl,.MTL">
            <br />
            <div style="margin-left:100px">Current file:<?php echo $url_mtl; ?></div>
            <br />

            <textarea name="mtl-file-preview" readonly style="margin-left:100px;width:70%;height:200px;"><?php readfile($url_mtl); ?></textarea>
        </div>

        <!-- OBJ field and text preview -->
        <div style="margin-bottom:20px">
            <label for="obj-file-input" style="margin-right:30px; vertical-align: top">Obj file</label>
            <input type="file" name="obj-file-input" id="obj-file-input" accept=".obj,.OBJ">
            <br />
            <div style="margin-left:100px">Current file:<?php echo $url_obj; ?></div>
            <br />

            <textarea name="obj-file-preview" readonly style="margin-left:100px;width:70%;height:200px;"><?php readfile($url_obj); ?></textarea>
        </div>

        <!-- Diffusion map (jpg or png)-->
        <?php
        $url_diff_img_arr = get_post_meta($object->ID, "diffusion-file", true);
        $url_diff_img = empty($url_diff_img_arr)?'':$url_diff_img_arr['url'];
        ?>

        <div style="margin-bottom:20px">
            <label for="diffusion-file-input" style="margin-right:30px; vertical-align: top">Diffusion image</label>
            <input type="file" name="diffusion-file-input" accept="image/jpeg, image/jpg, image/png">
            <br /><div style="margin-left:100px">Current file:<?php echo $url_diff_img; ?></div>

            <br />
            <img name="diffusion-file-preview" style="margin-left:100px;width:256px;height:256px;"
                 src="<?php echo $url_diff_img;?>"/>
        </div>

        <!-- Screenshot image (jpg or png)-->
        <div style="margin-bottom:20px">
            <label for="screenshot-file-input" style="margin-right:30px; vertical-align: top">Screenshot image</label>
            <input type="file" name="screenshot-file-input" accept="image/jpeg, image/jpg, image/png">
            <div style="margin-left:100px">Current file:<?php echo $url_screenshot_img; ?></div>

            <br />
            <img name="screenshot-file-preview" style="margin-left:100px;width:256px;height:256px;"
                 src="<?php echo $url_screenshot_img;?>"/>
        </div>

        <?php
        // end of custom fields
    }


    /**
     * This Metabox has the information fields for a POI or a dynamic model
     *
     * @param $object
     */
    function asset3d_customfields_info($object){
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");

        // Info image1 (jpg or png)
        $url_inf_img1_arr = get_post_meta($object->ID, "infoimage1-file", true);
        $url_inf_img1 = empty($url_inf_img1_arr) ? '' : $url_inf_img1_arr['url'];
        ?>

        <div style="margin-top:2em">
            <label for="infoimage1-file-input" style="margin-right:30px; vertical-align: top">Information image
                1</label>
            <input type="file" name="infoimage1-file-input" accept="image/jpeg, image/jpg, image/png">
            <div style="margin-left:100px">Current file:<?php echo $url_inf_img1; ?></div>
            <br/>
            <img name="infoimage1-file-preview" style="margin-left:100px;width:256px;height:256px;"
                 src="<?php echo $url_inf_img1; ?>"/>
        </div>

        <!-- Info image2 (jpg or png)-->
        <?php
        $url_inf_img2_arr = get_post_meta($object->ID, "infoimage2-file", true);
        $url_inf_img2 = empty($url_inf_img2_arr) ? '' : $url_inf_img2_arr['url'];
        ?>

        <div style="margin-top:2em">
            <label for="infoimage2-file-input" style="margin-right:30px; vertical-align: top">Information image
                2</label>
            <input type="file" name="infoimage2-file-input" accept="image/jpeg, image/jpg, image/png">
            <div style="margin-left:100px">Current file:<?php echo $url_inf_img2; ?></div>
            <br/>
            <img name="infoimage2-file-preview" style="margin-left:100px;width:256px;height:256px;"
                 src="<?php echo $url_inf_img2; ?>"/>
        </div>

        <!-- Info image3 (jpg or png)-->
        <?php
        $url_inf_img3_arr = get_post_meta($object->ID, "infoimage3-file", true);
        $url_inf_img3 = empty($url_inf_img3_arr) ? '' : $url_inf_img3_arr['url'];
        ?>

        <div style="margin-top:2em">
            <label for="infoimage3-file-input" style="margin-right:30px; vertical-align: top">Information image
                3</label>
            <input type="file" name="infoimage3-file-input" accept="image/jpeg, image/jpg, image/png">
            <div style="margin-left:100px">Current file:<?php echo $url_inf_img3; ?></div>
            <br/>

            <img name="infoimage3-file-preview" style="margin-left:100px;width:256px;height:256px;"
                 src="<?php echo $url_inf_img3; ?>"/>
        </div>

        <!-- Info video (mp4)-->
        <?php
        $url_inf_vid_arr = get_post_meta($object->ID, "infovideo-file", true);
        $url_inf_vid = empty($url_inf_vid_arr) ? '' : $url_inf_vid_arr['url'];
        ?>

        <div style="margin-top:2em">
            <label for="infovideo-file-input" style="margin-right:30px; vertical-align: top">Information Video
                (mp4)</label>
            <input type="file" name="infovideo-file-input" accept="video/mp4">
            <div style="margin-left:100px">Current file:<?php echo $url_inf_vid ?></div>
            <br/>
            <video name="infovideo-file-preview" style="margin-left:100px;height:256px;border:2px solid black" controls type="video/mp4" src="<?php echo $url_inf_vid; ?>"></video>
        </div>

        <?php

    }

    /**
     * Fields for the special case of DOOR teleport from scene to scene
     *
     * @param $object
     *
     */
    function asset3d_customfields_fncs($object){
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");

        ?>

        <div style="margin-top:2em">
            <label for="destination-scene-input" style="margin-right:30px; vertical-align: top">Destination scene</label>
            <textarea name="destination-scene-input" style="width:70%;height:200px;"
            ><?php echo get_post_meta($object->ID, "destination-scene", true); ?></textarea>
        </div>

        <?php

    }



    function admin_notice__error_no_category_terms_set() {
        $class = 'notice notice-error';
        $message = __( 'Not Saved! Missing taxonomy.', 'You have not set any category terms.' );

        printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
    }

    function admin_notice__error_no_scene_assignment_terms_set() {
        $class = 'notice notice-error';
        $message = __( 'Not Saved! Missing taxonomy.', 'You have not set any Scene Assignment terms. The 3d asset should belong to a scene.' );

        printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
    }


    /**
     * Now Save everything to db
     *
     * @param $post_id
     * @param $post
     * @param $update
     * @return mixed
     */
    function save_data_to_db_and_media($post_id, $post, $update){
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
        if($post->post_type != 'asset3d' )
            return $post_id;


        // ============ Start of custom fields =============================================
        $asset3d_category_slug = get_the_terms($post, 'asset3d_category')[0]->slug;
        $post_slug = $post->post_name;

        // Generate folder and set temporary uploading path to it
        $this->generate_asset3d_folder($asset3d_category_slug, $post_slug);

        // upload files
        $this->uploader_wrapper($post_id, $asset3d_category_slug, $post_slug, $_FILES['mtl-file-input'], array('text/plain', 'application/mtl') , 'mtl-file');
        $this->uploader_wrapper($post_id, $asset3d_category_slug, $post_slug, $_FILES['obj-file-input'], array('text/plain', 'application/obj') , 'obj-file');
        $this->uploader_wrapper($post_id, $asset3d_category_slug, $post_slug, $_FILES['diffusion-file-input'], array('image/jpg','image/jpeg','image/png') , 'diffusion-file');
        $this->uploader_wrapper($post_id, $asset3d_category_slug, $post_slug, $_FILES['screenshot-file-input'], array('image/jpg','image/jpeg','image/png') , 'screenshot-file');

        // Information images and video
        if ($asset3d_category_slug == "pois" || $asset3d_category_slug == "dynamic3dmodels"){
            $this->uploader_wrapper($post_id, $asset3d_category_slug, $post_slug, $_FILES['infoimage1-file-input'], array('image/jpg','image/png') , 'infoimage1-file');
            $this->uploader_wrapper($post_id, $asset3d_category_slug, $post_slug, $_FILES['infoimage2-file-input'], array('image/jpg','image/png') , 'infoimage2-file');
            $this->uploader_wrapper($post_id, $asset3d_category_slug, $post_slug, $_FILES['infoimage3-file-input'], array('image/jpg','image/png') , 'infoimage3-file');
            $this->uploader_wrapper($post_id, $asset3d_category_slug, $post_slug, $_FILES['infovideo-file-input'], array('video/mp4') , 'infovideo-file');
        }



        if ($asset3d_category_slug == "doors"){
            $destination_scene = "";
            if(isset($_POST["destination-scene-input"]))
                $destination_scene = $_POST["destination-scene-input"];
            update_post_meta($post_id, "destination-scene", $destination_scene);
        }

    }


    function custom_modify_upload_dir( $param ){
        $param['path'] = $this->asset_path; // $param['path'] . $mydir;
        $param['url']  = $this->asset_path_url; //$param['url'] . $mydir;
        $param['subdir'] = $this->asset_subdir;
//        error_log("path={$param['path']}");
//        error_log("url={$param['url']}");
//        error_log("subdir={$param['subdir']}");
//        error_log("basedir={$param['basedir']}");
//        error_log("baseurl={$param['baseurl']}");
//        error_log("error={$param['error']}");
        return $param;
    }

    /**
     * Upload each file internal code
     *
     * @param $post_id
     * @param $file
     * @param $supported_types
     * @param $meta_name
     */
    function uploader_wrapper($post_id, $asset3d_category_slug, $post_slug, $file, $supported_types, $meta_name){

        // Start uploading
        if(!empty($file['name'])) {

            // extension of the file
            $ext = basename($file['name']);

            // Get the file type of the upload
            $arr_file_type = wp_check_filetype($ext);

            //print_r($arr_file_type);
            $uploaded_type = $arr_file_type['type'];

            // Check if the type is supported. If not, throw an error.
            if(in_array($uploaded_type, $supported_types) || empty($uploaded_type)) {

                // set directory
                add_filter('upload_dir', array(&$this,'custom_modify_upload_dir'));


                //add_filter('upload_dir', array(&$this,'awesome_wallpaper_dir'));

                // Use the WordPress API to upload the file
                $upload = wp_upload_bits($file['name'], null, file_get_contents($file['tmp_name']));

                if(isset($upload['error']) && $upload['error'] != 0) {
                    wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
                } else {
                    add_post_meta($post_id, $meta_name, $upload);
                    update_post_meta($post_id, $meta_name, $upload);
                } // end if/else

            } else {
                wp_die("The file type that you've uploaded is: ". $file['name'] . " " .$uploaded_type);
            } // end if/else

        } // end if

    }




    /**
     * in cpt asset3d allow only one selection in custom taxonomy asset3d_category, i.e. the asset3d belongs to one place only
     */
    function checktoradio(){
        echo '<script type="text/javascript">jQuery("#asset3d_categorychecklist-pop input, #asset3d_categorychecklist input, .asset3d_categorychecklist input").each(function(){this.type="radio"});</script>';
    }

    function disable_permalink(){
        return null;
    }

    function generate_asset3d_folder($asset3d_category_Folder,$asset3d_Folder){
        global $post;

        // Get the scene that this asset3d belongs to
        $scene_Folder = get_the_terms($post, 'asset3d_scene_assignment')[0]->slug;

        // Get the game that the scene of the above scene
        $post_scene = get_posts( array('post_type' => 'scene', 'post_slug' => $scene_Folder) )[0];
        $game_Folder = get_the_terms($post_scene, 'scene_category')[0]->slug;

        // Generate new folder for the new asset
        $new_item_subfolder_path = $game_Folder.'/'.$scene_Folder.'/'.$asset3d_category_Folder.'/'.$asset3d_Folder;

        $upload = wp_upload_dir();
        $upload_dir = $upload['basedir'];
        $upload_dir = str_replace('\\','/',$upload_dir) . "/" . $new_item_subfolder_path;

        // Create dir
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        // Set uploading dir (for temporary use)
        $this->asset_path = $upload_dir;
        $this->asset_path_url = get_site_url().'/wp-content/uploads/'.$new_item_subfolder_path;
        $this->asset_subdir = '/'.$new_item_subfolder_path;
    }
}
?>