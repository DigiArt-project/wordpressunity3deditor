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
        ');//each_scene.unity meta pattern
        $ini_scene_fdp = array('fileFormatVersion: 2
        guid: ___[folder_guid]___
        folderAsset: yes
        timeCreated: ___[unx_time_created]___
        licenseType: Free
        DefaultImporter:
          userData:
          assetBundleName:
          assetBundleVariant:
        ');//Folder.meta Pattern

        $ini_obj_meta_pat = array('fileFormatVersion: 2
guid: ___[obj_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
');//obj.meta Pattern
        $ini_jpg_meta_pat = array('fileFormatVersion: 2
guid: ___[jpg_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
TextureImporter:
  fileIDToRecycleName: {}
  serializedVersion: 4
  mipmaps:
    mipMapMode: 0
    enableMipMap: 1
    sRGBTexture: 1
    linearTexture: 0
    fadeOut: 0
    borderMipMap: 0
    mipMapFadeDistanceStart: 1
    mipMapFadeDistanceEnd: 3
  bumpmap:
    convertToNormalMap: 0
    externalNormalMap: 0
    heightScale: 0.25
    normalMapFilter: 0
  isReadable: 0
  grayScaleToAlpha: 0
  generateCubemap: 6
  cubemapConvolution: 0
  seamlessCubemap: 0
  textureFormat: 1
  maxTextureSize: 2048
  textureSettings:
    filterMode: -1
    aniso: -1
    mipBias: -1
    wrapMode: -1
  nPOTScale: 1
  lightmap: 0
  compressionQuality: 50
  spriteMode: 0
  spriteExtrude: 1
  spriteMeshType: 1
  alignment: 0
  spritePivot: {x: 0.5, y: 0.5}
  spriteBorder: {x: 0, y: 0, z: 0, w: 0}
  spritePixelsToUnits: 100
  alphaUsage: 1
  alphaIsTransparency: 0
  spriteTessellationDetail: -1
  textureType: 0
  textureShape: 1
  maxTextureSizeSet: 0
  compressionQualitySet: 0
  textureFormatSet: 0
  platformSettings:
  - buildTarget: DefaultTexturePlatform
    maxTextureSize: 2048
    textureFormat: -1
    textureCompression: 1
    compressionQuality: 50
    crunchedCompression: 0
    allowsAlphaSplitting: 0
    overridden: 0
  spriteSheet:
    serializedVersion: 2
    sprites: []
    outline: []
  spritePackingTag:
  userData:
  assetBundleName:
  assetBundleVariant:
');//jpg.meta Pattern
        $ini_jpgsprite_meta_pat = array('fileFormatVersion: 2
guid: ___[jpg_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
TextureImporter:
  fileIDToRecycleName: {}
  serializedVersion: 4
  mipmaps:
    mipMapMode: 0
    enableMipMap: 0
    sRGBTexture: 1
    linearTexture: 0
    fadeOut: 0
    borderMipMap: 0
    mipMapFadeDistanceStart: 1
    mipMapFadeDistanceEnd: 3
  bumpmap:
    convertToNormalMap: 0
    externalNormalMap: 0
    heightScale: 0.25
    normalMapFilter: 0
  isReadable: 0
  grayScaleToAlpha: 0
  generateCubemap: 6
  cubemapConvolution: 0
  seamlessCubemap: 0
  textureFormat: 1
  maxTextureSize: 2048
  textureSettings:
    filterMode: -1
    aniso: -1
    mipBias: -1
    wrapMode: 1
  nPOTScale: 0
  lightmap: 0
  compressionQuality: 50
  spriteMode: 1
  spriteExtrude: 1
  spriteMeshType: 1
  alignment: 0
  spritePivot: {x: 0.5, y: 0.5}
  spriteBorder: {x: 0, y: 0, z: 0, w: 0}
  spritePixelsToUnits: 100
  alphaUsage: 1
  alphaIsTransparency: 1
  spriteTessellationDetail: -1
  textureType: 8
  textureShape: 1
  maxTextureSizeSet: 0
  compressionQualitySet: 0
  textureFormatSet: 0
  platformSettings:
  - buildTarget: DefaultTexturePlatform
    maxTextureSize: 2048
    textureFormat: -1
    textureCompression: 1
    compressionQuality: 50
    crunchedCompression: 0
    allowsAlphaSplitting: 0
    overridden: 0
  - buildTarget: Standalone
    maxTextureSize: 2048
    textureFormat: -1
    textureCompression: 1
    compressionQuality: 50
    crunchedCompression: 0
    allowsAlphaSplitting: 0
    overridden: 0
  spriteSheet:
    serializedVersion: 2
    sprites: []
    outline: []
  spritePackingTag:
  userData:
  assetBundleName:
  assetBundleVariant:
');//The jpg sprite meta pattern
        $ini_wpunity_mat_pat = array('%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!21 &2100000
Material:
  serializedVersion: 6
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_Name: ___[material_name]___
  m_Shader: {fileID: 46, guid: 0000000000000000f000000000000000, type: 0}
  m_ShaderKeywords:
  m_LightmapFlags: 5
  m_CustomRenderQueue: -1
  stringTagMap: {}
  m_SavedProperties:
    serializedVersion: 2
    m_TexEnvs:
    - first:
        name: _BumpMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _DetailAlbedoMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _DetailMask
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _DetailNormalMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _EmissionMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _MainTex
      second:
        m_Texture: {fileID: 0___[jpg_texture_guid]___}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _MetallicGlossMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _OcclusionMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - first:
        name: _ParallaxMap
      second:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    m_Floats:
    - first:
        name: _BumpScale
      second: 1
    - first:
        name: _Cutoff
      second: 0.5
    - first:
        name: _DetailNormalMapScale
      second: 1
    - first:
        name: _DstBlend
      second: 0
    - first:
        name: _GlossMapScale
      second: 1
    - first:
        name: _Glossiness
      second: 0.5
    - first:
        name: _GlossyReflections
      second: 1
    - first:
        name: _Metallic
      second: 0
    - first:
        name: _Mode
      second: 0
    - first:
        name: _OcclusionStrength
      second: 1
    - first:
        name: _Parallax
      second: 0.02
    - first:
        name: _SmoothnessTextureChannel
      second: 0
    - first:
        name: _SpecularHighlights
      second: 1
    - first:
        name: _SrcBlend
      second: 1
    - first:
        name: _UVSec
      second: 0
    - first:
        name: _ZWrite
      second: 1
    m_Colors:
    - first:
        name: _Color
      second: {r: ___[color_r]___, g: ___[color_g]___, b: ___[color_b]___, a: ___[color_a]___}
    - first:
        name: _EmissionColor
      second: {r: 0, g: 0, b: 0, a: 1}
');//Material (.mat) Pattern
        $ini_mat_meta_pat = array('fileFormatVersion: 2
guid: ___[mat_guid]___
timeCreated: ___[unx_time_created]___
licenseType: Free
NativeFormatImporter:
  userData:
  assetBundleName:
  assetBundleVariant:
');//mat.meta Pattern

        $this->yaml_settings = (array) get_option( $this->yaml_settings_key );
        $this->general_settings = (array) get_option( $this->general_settings_key );

        $this->yaml_settings = array_merge( array(
            'wpunity_scene_meta_pat' => $ini_scene_unity_meta_pattern[0],
            'wpunity_folder_meta_pat' => $ini_scene_fdp[0],
            'wpunity_obj_meta_pat' => $ini_obj_meta_pat[0],//wpunity_yamlmeta_scene_odp
            'wpunity_jpg_meta_pat' => $ini_jpg_meta_pat[0],//wpunity_yamlmeta_scene_jdp
            'wpunity_jpgsprite_meta_pat' => $ini_jpgsprite_meta_pat[0],//wpunity_yamlmeta_scene_jspritep
            'wpunity_mat_pat' => $ini_wpunity_mat_pat[0],//wpunity_yamlmeta_scene_matp
            'wpunity_mat_meta_pat' => $ini_mat_meta_pat[0],//wpunity_yamlmeta_scene_mdp
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

        add_settings_field( 'wpunity_obj_meta_pat', __('obj.meta Pattern'), array( &$this, 'field_wpunity_obj_meta_pat' ), $this->yaml_settings_key, 'section_yaml' );

        add_settings_field( 'wpunity_jpg_meta_pat', __('jpg.meta Pattern'), array( &$this, 'field_wpunity_jpg_meta_pat' ), $this->yaml_settings_key, 'section_yaml' );

        add_settings_field( 'wpunity_jpgsprite_meta_pat', __('The jpg sprite meta pattern'), array( &$this, 'field_wpunity_jpgsprite_meta_pat' ), $this->yaml_settings_key, 'section_yaml' );

        add_settings_field( 'wpunity_mat_pat', __('Material (.mat) Pattern'), array( &$this, 'field_wpunity_mat_pat' ), $this->yaml_settings_key, 'section_yaml' );

        add_settings_field( 'wpunity_mat_meta_pat', __('mat.meta Pattern'), array( &$this, 'field_wpunity_mat_meta_pat' ), $this->yaml_settings_key, 'section_yaml' );
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

    function field_wpunity_obj_meta_pat(){
        ?>
        <textarea name="<?php echo $this->yaml_settings_key; ?>[wpunity_obj_meta_pat]" id="<?php echo $this->yaml_settings_key; ?>[wpunity_obj_meta_pat]"><?php echo esc_attr( $this->yaml_settings['wpunity_obj_meta_pat'] ); ?></textarea>
        <?php
    }

    function field_wpunity_jpg_meta_pat(){
        ?>
        <textarea name="<?php echo $this->yaml_settings_key; ?>[wpunity_jpg_meta_pat]" id="<?php echo $this->yaml_settings_key; ?>[wpunity_jpg_meta_pat]"><?php echo esc_attr( $this->yaml_settings['wpunity_jpg_meta_pat'] ); ?></textarea>
        <?php
    }

    function field_wpunity_jpgsprite_meta_pat(){
        ?>
        <textarea name="<?php echo $this->yaml_settings_key; ?>[wpunity_jpgsprite_meta_pat]" id="<?php echo $this->yaml_settings_key; ?>[wpunity_jpgsprite_meta_pat]"><?php echo esc_attr( $this->yaml_settings['wpunity_jpgsprite_meta_pat'] ); ?></textarea>
        <?php
    }

    function field_wpunity_mat_pat(){
        ?>
        <textarea name="<?php echo $this->yaml_settings_key; ?>[wpunity_mat_pat]" id="<?php echo $this->yaml_settings_key; ?>[wpunity_mat_pat]"><?php echo esc_attr( $this->yaml_settings['wpunity_mat_pat'] ); ?></textarea>
        <?php
    }

    function field_wpunity_mat_meta_pat(){
        ?>
        <textarea name="<?php echo $this->yaml_settings_key; ?>[wpunity_mat_meta_pat]" id="<?php echo $this->yaml_settings_key; ?>[wpunity_mat_meta_pat]"><?php echo esc_attr( $this->yaml_settings['wpunity_mat_meta_pat'] ); ?></textarea>
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