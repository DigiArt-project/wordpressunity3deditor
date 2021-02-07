<?php

// Load Scripts
function loadAsset3Dfunctions() {
    // Load single asset kernel
    // Three js : for simple rendering
    wp_enqueue_script('wpunity_scripts');
    
    // For fbx binary
    wp_enqueue_script('wpunity_inflate'); // for binary fbx
    
    // 1. Three js library
    wp_enqueue_script('wpunity_load124_threejs');
    wp_enqueue_script('wpunity_load124_statjs');
    
    // 2. Obj loader simple; For loading an uploaded obj
    wp_enqueue_script('wpunity_load87_OBJloader');
    
    // 3. Obj loader 2: For preview loading
    wp_enqueue_script('wpunity_load87_OBJloader2');
    wp_enqueue_script('wpunity_load87_WWOBJloader2');
    
    // 4. Mtl loader
    wp_enqueue_script('wpunity_load87_MTLloader');
    
    // 5. Pdb loader for molecules
    wp_enqueue_script('wpunity_load87_PDBloader');
    
    // 6. Fbx loader
    wp_enqueue_script('wpunity_load119_FBXloader');
    
    // 7. Trackball controls
    wp_enqueue_script('wpunity_load124_TrackballControls');
    wp_enqueue_script('wpunity_load119_OrbitControls');
    
    // 8. GLTF Loader
    wp_enqueue_script('wpunity_load119_GLTFLoader');
    wp_enqueue_script('wpunity_load119_DRACOLoader');
    wp_enqueue_script('wpunity_load119_DDSLoader');
    wp_enqueue_script('wpunity_load119_KTXLoader');
    
    // For the PDB files to annotate molecules in 3D
    wp_enqueue_script('wpunity_load119_CSS2DRenderer');
    
    // Load single asset
    wp_enqueue_script('Asset_viewer_3d_kernel');
}
add_action('wp_enqueue_scripts', 'loadAsset3Dfunctions' );

// Creating the widget
class wpheliosvr_3d_widget extends WP_Widget {
    
    function __construct() {
        parent::__construct(

            // Base ID of your widget
            'wpheliosvr_3d_widget',

            // Widget name will appear in UI
            __('HeliosVR 3D Widget', 'wpheliosvr_3d_widget_domain'),

            // Widget description
            array( 'description' => __( 'A widget to place 3D models', 'wpheliosvr_widget_domain' ), )
        );
    }
    
    
    // Widget Backend
    public function form( $instance ) {
        
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'wpheliosvr_3d_widget_domain' );
        }

        if ( isset( $instance[ 'asset_id' ] ) ) {
            $asset_id = $instance[ 'asset_id' ];
        }
        else {
            $asset_id = __( 'Insert asset id', 'wpheliosvr_3d_widget_domain' );
        }

        
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php _e( 'Title:' ); ?>
            </label>
            
            <input class="widefat"
                   id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>"
                   type="text"
                   value="<?php echo esc_attr( $title ); ?>"
            />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'asset_id' ); ?>">
                <?php _e( 'Asset id:' ); ?>
            </label>
            

            <select
                class="widefat"
                name="<?php echo $this->get_field_name( 'asset_id' ); ?>"
                id="<?php echo $this->get_field_id( 'asset_id' ); ?>"
            >
            
            <?php
                // Get all assets
                $assets = get_assets([]);
                
                // Iterate for the drop down
                for ($i=0;$i<count($assets);$i++){
                    
                    echo '<option value="'.
                        $assets[$i]['assetid'].'" '.
                        (esc_attr( $asset_id )==$assets[$i]['assetid']?'selected':'').
                        '>'.
                        $assets[$i]['assetName'].
                        '</option>';
                    
                }
            ?>
            </select>
        </p>
        
        <?php
    }
    
    
    // Creating widget front-end
    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', $instance['title'] );
        $asset_id = apply_filters( 'widget_asset_id', $instance['asset_id'] );

        
        
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        
        
        // The data
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
    
    
        if ( ! empty( $asset_id ) )
            echo $asset_id;
        
        // -----  Step 2 : Get  urls from id ---------
    
        // Get post
        $asset_post    = get_post($asset_id);
    
        // Get post meta
        $assetpostMeta = get_post_meta($asset_id);
    
        // Background color in canvas
        $back_3d_color = $assetpostMeta['wpunity_asset3d_back_3d_color'][0];
    
        $asset_3d_files = get_3D_model_files($assetpostMeta, $asset_id);
        
        // audio file
        $audioID = get_post_meta($asset_id, 'wpunity_asset3d_audio', true);
        $attachment_audio_file = get_post( $audioID )->guid;
        
        ?>

        <div id="wrapper_3d_inner" class="">
            
            <!--   Progress bar -->
            <div id="previewProgressSlider" class="CenterContents">
                <h6 id="previewProgressLabel" class="mdc-theme--text-primary-on-light mdc-typography--subheading1">
                    </h6>
                <div class="progressSlider">
                    <div id="previewProgressSliderLine" class="progressSliderSubLine" style="width: 0;">...</div>
                </div>
            </div>

            <!-- LabelRenderer of Canvas -->
            <div id="previewCanvasLabels" style=""></div>

            <!-- 3D Canvas -->
            <canvas id="previewCanvas" >3D canvas</canvas>

            <a href="#" class="animationButton" id="animButton1" onclick="asset_viewer_3d_kernel.playStopAnimation();">Animation 1</a>


        </div>
    
        <?php
            if(strpos($attachment_audio_file, "mp3" )!==false ||
               strpos($attachment_audio_file, "wav" )!==false) {
            ?>
            
            <audio controls loop preload="auto" id ='audioFile'>
                <source src="<?php echo $attachment_audio_file;?>" type="audio/mp3">
                <source src="<?php echo $attachment_audio_file;?>" type="audio/wav">
                Your browser does not support the audio tag.
            </audio>
        <?php } ?>

        <script>
            path_url     = "<?php echo $asset_3d_files['path'].'/'; ?>";
            mtl_file_name= "<?php echo $asset_3d_files['mtl']; ?>";
            obj_file_name= "<?php echo $asset_3d_files['obj']; ?>";
            pdb_file_name= "<?php echo $asset_3d_files['pdb']; ?>";
            glb_file_name= "<?php echo $asset_3d_files['glb'];?>";
            fbx_file_name= "<?php echo $asset_3d_files['fbx'];    ?>";
            textures_fbx_string_connected = "<?php echo $asset_3d_files['texturesFbx']; ?>";
            back_3d_color = "<?php echo $back_3d_color; ?>";
            let audio_file = document.getElementById( 'audioFile' );
        
        
            var asset_viewer_3d_kernel = new Asset_viewer_3d_kernel( document.getElementById( 'previewCanvas' ),
                back_3d_color,
                audio_file,
                path_url, // OBJ textures path
                mtl_file_name,
                obj_file_name,
                pdb_file_name,
                fbx_file_name,
                glb_file_name,
                textures_fbx_string_connected, false);
        
        </script>
        
        <?php
        
        
        
        // This is where you run the code and display the output
        //echo __( 'HeliosVR 3D Widget', 'wpheliosvr_3d_widget_domain' );
        echo $args['after_widget'];
    }



    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        
        $instance['asset_id'] = ( ! empty( $new_instance['asset_id'] ) ) ? strip_tags( $new_instance['asset_id'] ) : '';
        
        return $instance;
    }
}


// Register and load the widget
function wpheliosvr_load_widget() {
    register_widget( 'wpheliosvr_3d_widget' );
}
add_action( 'widgets_init', 'wpheliosvr_load_widget' );
