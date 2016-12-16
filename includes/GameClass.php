<?php
/**
Description: Create a Game and its taxonomies
Version: 1.0
Author: Dimitrios Ververidis
License: AGPL
 */
class GameClass
{

    function __construct()
    {
        register_activation_hook(__FILE__, array($this, 'activate'));
        add_action('init', array($this, 'init_cpt_game'));
        add_action('init', array($this, 'create_taxonomies_games'));
        add_action('init', array($this, 'register_new_taxonomy_terms_game'));
        add_action("save_post", array($this, 'save_data_to_db_and_media'), 10, 3);
        add_action('admin_footer', array($this, 'checktoradio'));
        add_filter('get_sample_permalink', array($this, 'disable_permalink'));
        add_action('edit_form_after_title', array($this, 'generate_media_folder_game'));
    }

    function activate()
    {
        //$this->init_cpt_game();
        //$this->create_taxonomies_games();
        //$this->register_new_taxonomy_terms_game();
    }


    function init_cpt_game(){

        $labels = array(
            'name' => _x('Games', 'A game consists of several scenes'),
            'singular_name' => _x('Game', 'Game singular name'),
            'add_new' => _x('Add New', 'Game'),
            'add_new_item' => __('Add New Game'),
            'edit_item' => __('Edit Game'),
            'new_item' => __('New Game'),
            'all_items' => __('All Games'),
            'view_item' => __('View Game'),
            'search_items' => __('Search Games'),
            'not_found' => __('No Game found'),
            'not_found_in_trash' => __('No Game found in the Trash'),
            'parent_item_colon' => '',
            'menu_name' => 'Games'
        );

        // args array
        $args = array(
            'labels' => $labels,
            'description' => 'Displays Games',
            'public' => true,
            'menu_position' => 25,
            'menu_icon' =>'dashicons-visibility',
            'supports' => array('title', 'editor', 'thumbnail' ),
            'has_archive' => true,
            'register_meta_box_cb' => array($this, 'add_game_metaboxes')
        );

        register_post_type('game', $args);
    }



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
        if($post->post_type != 'game' )
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

        register_taxonomy('game_category', 'game', $args);
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
        echo '<script type="text/javascript">jQuery("#game_categorychecklist-pop input, #game_categorychecklist input, .game_categorychecklist input").each(function(){this.type="radio"});</script>';
    }


    function disable_permalink(){
        return null;
    }


    /**
     *   Generate a folder in media to store assets named as the permalink of the game
     */
    function generate_media_folder_game(){
        global $post;

        if (get_post_type()=='game') {
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