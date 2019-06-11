<?php

if( is_admin() )
    $my_settings_page = new ImcSettingsPage();

class ImcSettingsPage {

    /*
     * For easier overriding we declared the keys
     * here as well as our tabs array which is populated
     * when registering settings
     */
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
        $this->general_settings = (array) get_option( $this->general_settings_key );

        $this->general_settings = array_merge( array(
            'wpunity_unity_local_or_remote' => 'remote',
            'wpunity_unity_exe_folder' => 'C:\Program Files\Unity',
            'wpunity_remote_api_folder' => 'http://myurl/',
            'wpunity_ftp_address' => '',
            'wpunity_ftp_username' => '',
            'wpunity_ftp_pass' => '',
            'wpunity_server_path' => 'C:/xampp/htdocs/COMPILE_UNITY3D_GAMES/',
        ), $this->general_settings );

    }

    /*
     * Registers the general settings and appends the
     * key to the plugin settings tabs array.
     */
    function register_general_settings() {
        $this->settings_tabs[$this->general_settings_key] = __('General');

        register_setting( $this->general_settings_key, $this->general_settings_key );
        add_settings_section( 'section_general', __('General Settings'), array( &$this, 'section_general_desc' ), $this->general_settings_key );
    
    
        add_settings_field( 'wpunity_unity_local_or_remote', __('Compile in this server or remote server?'),
            array( &$this, 'field_wpunity_unity_local_or_remote' ), $this->general_settings_key, 'section_general' );
        
        add_settings_field( 'wpunity_unity_exe_folder', __('Path of Unity exe file'), array( &$this, 'field_wpunity_unity_exe_folder' ), $this->general_settings_key, 'section_general' );

        add_settings_field( 'wpunity_remote_api_folder', __('Remote Game server API'), array( &$this, 'field_wpunity_remote_api_folder' ), $this->general_settings_key, 'section_general' );

        add_settings_field( 'wpunity_ftp_address', __('FTP Address'), array( &$this, 'field_wpunity_ftp_address' ), $this->general_settings_key, 'section_general' );

        add_settings_field( 'wpunity_ftp_username', __('FTP Username'), array( &$this, 'field_wpunity_ftp_username' ), $this->general_settings_key, 'section_general' );

        add_settings_field( 'wpunity_ftp_pass', __('FTP Password'), array( &$this, 'field_wpunity_ftp_pass' ), $this->general_settings_key, 'section_general' );

        add_settings_field( 'wpunity_server_path', __('Remote Server path'), array( &$this, 'field_wpunity_server_path' ), $this->general_settings_key, 'section_general' );
    }



    /*
     * The following methods provide descriptions
     * for their respective sections, used as callbacks
     * with add_settings_section
     */
    function section_general_desc() { echo __('Settings concerning the functionality of the application'); }


    /*************************** GENERAL TAB FIELDS: ****************************************/
    
    function field_wpunity_unity_local_or_remote(){
        ?>
        <input type="text"  name="<?php echo $this->general_settings_key; ?>[wpunity_unity_local_or_remote]"
               id="<?php echo $this->general_settings_key; ?>[wpunity_unity_local_or_remote]" value="<?php echo esc_attr( $this->general_settings['wpunity_unity_local_or_remote'] ); ?>" /> (Options: 'local' or 'remote' strings)
        <?php
    }
    

    function field_wpunity_unity_exe_folder(){
        ?>
        <input type="text" style="width:70%" name="<?php echo $this->general_settings_key; ?>[wpunity_unity_exe_folder]" id="<?php echo $this->general_settings_key; ?>[wpunity_unity_exe_folder]" value="<?php echo esc_attr( $this->general_settings['wpunity_unity_exe_folder'] ); ?>" />
        <?php
    }


    function field_wpunity_remote_api_folder(){
        ?>
        <input type="text" name="<?php echo $this->general_settings_key; ?>[wpunity_remote_api_folder]" id="<?php echo $this->general_settings_key; ?>[wpunity_remote_api_folder]" value="<?php echo esc_attr( $this->general_settings['wpunity_remote_api_folder'] ); ?>" />
        <?php
    }

    function field_wpunity_ftp_address(){
        ?>
        <input type="text" style="width:70%" name="<?php echo $this->general_settings_key; ?>[wpunity_ftp_address]" id="<?php echo $this->general_settings_key; ?>[wpunity_ftp_address]" value="<?php echo esc_attr( $this->general_settings['wpunity_ftp_address'] ); ?>" />
        <?php
    }

    function field_wpunity_ftp_username(){
        ?>
        <input type="text" name="<?php echo $this->general_settings_key; ?>[wpunity_ftp_username]" id="<?php echo $this->general_settings_key; ?>[wpunity_ftp_username]" value="<?php echo esc_attr( $this->general_settings['wpunity_ftp_username'] ); ?>" />
        <?php
    }

    function field_wpunity_ftp_pass(){
        ?>
        <input type="text" name="<?php echo $this->general_settings_key; ?>[wpunity_ftp_pass]" id="<?php echo $this->general_settings_key; ?>[wpunity_ftp_pass]" value="<?php echo esc_attr( $this->general_settings['wpunity_ftp_pass'] ); ?>" />
        <?php
    }

    function field_wpunity_server_path(){
        ?>
        <input type="text" style="width:70%" name="<?php echo $this->general_settings_key; ?>[wpunity_server_path]" id="<?php echo $this->general_settings_key; ?>[wpunity_server_path]" value="<?php echo esc_attr( $this->general_settings['wpunity_server_path'] ); ?>" />
        <?php
    }

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
        $tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->general_settings_key;

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
        $current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->general_settings_key;

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