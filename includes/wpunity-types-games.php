<?php

$gameClass = new GameClass();

class GameClass{

    function __construct(){
        //register_activation_hook(__FILE__, array($this, 'activate'));
        add_action('init', array($this, 'wpunity_games_construct')); //wpunity_game
        add_action('init', array($this, 'wpunity_games_taxcategory')); //wpunity_game_cat
        //add_action('init', array($this, 'register_new_taxonomy_terms_game'));
        //add_action("save_post", array($this, 'save_data_to_db_and_media'), 10, 3);
        //add_action('admin_footer', array($this, 'checktoradio'));
        //add_filter('get_sample_permalink', array($this, 'disable_permalink'));
        //add_action('edit_form_after_title', array($this, 'generate_media_folder_game'));
    }


    function wpunity_games_construct(){

        $labels = array(
            'name'               => _x( 'Games', 'post type general name'),
            'singular_name'      => _x( 'Game', 'post type singular name'),
            'menu_name'          => _x( 'Games', 'admin menu'),
            'name_admin_bar'     => _x( 'Game', 'add new on admin bar'),
            'add_new'            => _x( 'Add New', 'add new on menu'),
            'add_new_item'       => __( 'Add New Game'),
            'new_item'           => __( 'New Game'),
            'edit'               => __( 'Edit'),
            'edit_item'          => __( 'Edit Game'),
            'view'               => __( 'View'),
            'view_item'          => __( 'View Game'),
            'all_items'          => __( 'All Games'),
            'search_items'       => __( 'Search Games'),
            'parent_item_colon'  => __( 'Parent Games:'),
            'parent'             => __( 'Parent Game'),
            'not_found'          => __( 'No Games found.'),
            'not_found_in_trash' => __( 'No Games found in Trash.')
        );

        $args = array(
            'labels'                => $labels,
            'description'           => 'A Game consists of several scenes',
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

        register_post_type('wpunity_game', $args);

    }



    function wpunity_games_taxcategory(){

        $labels = array(
            'name'              => _x( 'Game Category', 'taxonomy general name'),
            'singular_name'     => _x( 'Game Category', 'taxonomy singular name'),
            'menu_name'         => _x( 'Game Categories', 'admin menu'),
            'search_items'      => __( 'Search Game Categories'),
            'all_items'         => __( 'All Game Categories'),
            'parent_item'       => __( 'Parent Game Category'),
            'parent_item_colon' => __( 'Parent Game Category:'),
            'edit_item'         => __( 'Edit Game Category'),
            'update_item'       => __( 'Update Game Category'),
            'add_new_item'      => __( 'Add New Game Category'),
            'new_item_name'     => __( 'New Game Category')
        );

        $args = array(
            'description' => 'Category of Game',
            'labels'    => $labels,
            'public'    => false,
            'show_ui'   => true,
            'hierarchical' => true,
            'show_admin_column' => true
        );

        register_taxonomy('wpunity_game_cat', 'wpunity_game', $args);

    }


    /****************************************************************************/




    function add_game_metaboxes() {
        add_meta_box("game_custom_fields_metabox", "Game custom fields", array($this, "game_custom_fields"), "game", "normal", "default", null);
    }



    function game_custom_fields($object)
    {
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");

        ?>


        <div>
            <label for="game-latitude-input" style="margin-right:30px; vertical-align: top">Geolocation latitude</label>
            <input type="text" name="game-latitude-input" style="width: 10ch;height:1em"
                   value="<?php echo get_post_meta($object->ID, "game-latitude", true); ?>"</input>
        </div>


        <div>
            <label for="game-longitude-input" style="margin-right:30px; vertical-align: top">Geolocation longitude</label>
            <input type="text" name="game-longitude-input" style="width: 10ch;height:1em"
                   value="<?php echo get_post_meta($object->ID, "game-longitude", true); ?>"</input>
        </div>


        <?php

        // end of custom fields
    }



    /**
     * Now Save everything to db
     *
     * @param $post_id
     * @param $post
     * @param $update
     * @return mixed
     */
    function save_data_to_db_and_media($post_id, $post, $update)
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
        if($post->post_type != 'wpunity_game' )
            return $post_id;

        // ============ Start of custom fields =============================================
        // $game_category_slug = get_the_terms($post, 'game_category')[0]->slug;
        $post_slug = $post->post_name;




        //--------------- Game Lat Long -------------------------
        $game_lat= "";
        $game_lng= "";

        if(isset($_POST["game-latitude-input"]))
            $game_lat = $_POST["game-latitude-input"];

        if(isset($_POST["game-longitude-input"]))
            $game_lng = $_POST["game-longitude-input"];

        update_post_meta($post_id, "game-latitude", $game_lat);
        update_post_meta($post_id, "game-longitude", $game_lng);


        // =========================================================
    }





    function create_taxonomies_games()
    {
        $labels = array(
            'name' => _x('Games Categories', 'taxonomy general name'),
            'singular_name' => _x('Game Category', 'taxonomy singular name'),
            'search_items' => __('Search Games Categories'),
            'all_items' => __('All Games Categories'),
            'parent_item' => __('Parent Game Category'),
            'parent_item_colon' => __('Parent Game Category:'),
            'edit_item' => __('Edit Game Category'),
            'update_item' => __('Update Game Category'),
            'add_new_item' => __('Add New Game Category'),
            'new_item_name' => __('New Games Category'),
            'menu_name' => __('Games Categories'),
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

        register_taxonomy('game_category', 'wpunity_game', $args);
    }


    function register_new_taxonomy_terms_game()
    {
        $this->taxonomy = 'game_category';

        $this->terms = array(
            '0' => array(
                'name' => 'Real place',
                'slug' => 'realplace',
                'description' => 'Real places are places that exist in reality and were 3D scanned.',
            ),
            '1' => array(
                'name' => 'Virtual place',
                'slug' => 'virtualplace',
                'description' => 'Virtual places do not exist in reality and they are a sort of iconic places to expose 3D scanned artifacts.',
            )
        );


        //wp_die(print_r($this->terms));

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



    /**
     * in cpt Scene allow only one selection in custom taxonomy scene_category, i.e. the Scene belongs to one Game only
     */
    function checktoradio(){
        echo '<script type="text/javascript">jQuery("#wpunity_game_categorychecklist-pop input, #wpunity_game_categorychecklist input, .wpunity_game_categorychecklist input").each(function(){this.type="radio"});</script>';
    }


    function disable_permalink(){
        return null;
    }


    /**
     *   Generate a folder in media to store assets named as the permalink of the game
     */
    function generate_media_folder_game(){
        global $post;

        if (get_post_type()=='wpunity_game') {
            $post_slug = $post->post_name;

            $media_subfolder_to_generate = $post_slug;
            $upload = wp_upload_dir();
            $upload_dir = $upload['basedir'];
            $upload_dir = $upload_dir . "/" . $media_subfolder_to_generate;

            $upload_dir = str_replace('\\','/',$upload_dir);



            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755);
            }
        }
    }


}
?>