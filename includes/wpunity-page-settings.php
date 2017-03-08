<?php

if( is_admin() )
    $my_settings_page = new ImcSettingsPage();

class ImcSettingsPage {

    /*
     * For easier overriding we declared the keys
     * here as well as our tabs array which is populated
     * when registering settings
     */
    private $yaml_settings_key = 'yaml_settings';
    private $general_settings_key = 'general_settings';
    private $options_key = 'wpunity_options';
    private $settings_tabs = array();



    /*
     * Fired during plugins_loaded (very very early),
     * so don't miss-use this, only actions and filters,
     * current ones speak for themselves.
     */
    function __construct() {
        add_action( 'init', array( &$this, 'load_settings' ) );
        add_action( 'admin_init', array( &$this, 'register_yaml_settings' ) );
        add_action( 'admin_init', array( &$this, 'register_general_settings' ) );
        add_action( 'admin_menu', array( &$this, 'render_setting') );
    }

    /*
     * Loads both the gmap and notifications settings from
     * the database into their respective arrays. Uses
     * array_merge to merge with default values if they're
     * missing.
     */
    function load_settings() {
        //TODO
        $ini_scene_unity_meta_pattern = array('fileFormatVersion: 2
        guid: ___[scene_unity_guid]___
        timeCreated: ___[unx_time_created]___
        licenseType: Free
        DefaultImporter:
          userData:
          assetBundleName:
          assetBundleVariant:
        ');
        $ini_scene_fdp = array('fileFormatVersion: 2
        guid: ___[folder_guid]___
        folderAsset: yes
        timeCreated: ___[unx_time_created]___
        licenseType: Free
        DefaultImporter:
          userData:
          assetBundleName:
          assetBundleVariant:
        ');

        $this->yaml_settings = (array) get_option( $this->yaml_settings_key );
        $this->general_settings = (array) get_option( $this->general_settings_key );

        $this->yaml_settings = array_merge( array(
            'wpunity_scene_meta_pat' => $ini_scene_unity_meta_pattern[0],
            'wpunity_folder_meta_pat' => $ini_scene_fdp[0],
        ), $this->yaml_settings );

        $this->general_settings = array_merge( array(

        ), $this->general_settings );

    }

    /*
     * Registers the Yaml settings and appends the
     * key to the plugin settings tabs array.
     */
    function register_yaml_settings() {
        $this->settings_tabs[$this->yaml_settings_key] = __('YAML');

        register_setting( $this->yaml_settings_key, $this->yaml_settings_key );

        add_settings_section( 'section_yaml', __('YAML Settings'), array( &$this, 'section_yaml_desc' ), $this->yaml_settings_key );

        add_settings_field( 'wpunity_scene_meta_pat', __('each_scene.unity meta pattern'), array( &$this, 'field_wpunity_scene_meta_pat' ), $this->yaml_settings_key, 'section_yaml' );

        add_settings_field( 'wpunity_folder_meta_pat', __('Folder.meta Pattern'), array( &$this, 'field_wpunity_folder_meta_pat' ), $this->yaml_settings_key, 'section_yaml' );
    }


    /*
     * Registers the general settings and appends the
     * key to the plugin settings tabs array.
     */
    function register_general_settings() {
        $this->settings_tabs[$this->general_settings_key] = __('General');

        register_setting( $this->general_settings_key, $this->general_settings_key );
        add_settings_section( 'section_general', __('General Settings'), array( &$this, 'section_general_desc' ), $this->general_settings_key );

    }



    /*
     * The following methods provide descriptions
     * for their respective sections, used as callbacks
     * with add_settings_section
     */
    function section_yaml_desc() { echo __('Settings about YAML Template'); }
    function section_general_desc() { echo __('Settings concerning the functionality of the application'); }
    /*
     * field_gmap_api_key_option field callback, renders a
     * text input, note the name and value.
     */



    /*************************** YAML TAB FIELDS: ****************************************/

    function field_wpunity_scene_meta_pat(){
        ?>
        <textarea name="<?php echo $this->yaml_settings_key; ?>[wpunity_scene_meta_pat]" id="<?php echo $this->yaml_settings_key; ?>[wpunity_scene_meta_pat]"><?php echo esc_attr( $this->yaml_settings['wpunity_scene_meta_pat'] ); ?></textarea>
        <?php
    }

    function field_wpunity_folder_meta_pat(){
        ?>
        <textarea name="<?php echo $this->yaml_settings_key; ?>[wpunity_folder_meta_pat]" id="<?php echo $this->yaml_settings_key; ?>[wpunity_folder_meta_pat]"><?php echo esc_attr( $this->yaml_settings['wpunity_folder_meta_pat'] ); ?></textarea>
        <?php
    }

    /*************************** GENERAL TAB FIELDS: ****************************************/




    /***************************************************************************************/

    /*
     * Called during admin_menu, adds an options
     * page under Settings called WPUnity Settings, rendered
     * using the plugin_options_page method.
     */
    function render_setting() {
        add_options_page( __('WPUnity Plugin Settings'), __('WPUnity Settings'), 'manage_options', $this->options_key, array( &$this, 'render_options' ) );
    }

    /*
     * Plugin Options page rendering goes here, checks
     * for active tab and replaces key with the related
     * settings key. Uses the render_tabs method
     * to render the tabs.
     */
    function render_options() {
        $tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->yaml_settings_key;

        ?>
            <div class="wrap">
                <?php $this->render_tabs(); ?>
                <form method="post" action="options.php">
                    <?php
                    wp_nonce_field( 'update-options' );
                    settings_fields( $tab );
                    do_settings_sections( $tab );
                    submit_button();
                    ?>
                </form>
            </div>

        <?php
    }


    /*
     * Renders our tabs in the plugin options page,
     * walks through the object's tabs array and prints
     * them one by one. Provides the heading for the
     * render_options method.
     */
    function render_tabs() {
        $current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->yaml_settings_key;

        screen_icon();
        echo '<h2 class="nav-tab-wrapper">';
        foreach ($this->settings_tabs as $tab_key => $tab_caption ) {
            $active = $current_tab == $tab_key ? 'nav-tab-active' : '';
            echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->options_key . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';
        }
        echo '</h2>';
    }
};


?>