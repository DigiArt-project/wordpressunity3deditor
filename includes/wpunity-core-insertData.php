<?php
/**
 * B2.03
 * Create Initial wpunity_game_cat (Game Category) terms
 *
 *
 */

function wpunity_games_taxcategory_fill(){
    wp_insert_term(
        'Real Place', // the term
        'wpunity_game_cat', // the taxonomy
        array(
            'description'=> 'Real places are places that exist in reality and were 3D scanned.',
            'slug' => 'real_place',
        )
    );

    wp_insert_term(
        'Virtual Place', // the term
        'wpunity_game_cat', // the taxonomy
        array(
            'description'=> 'Virtual places do not exist in reality and they are a sort of iconic places to expose 3D scanned artifacts.',
            'slug' => 'virtual_place',
        )
    );

}

add_action( 'init', 'wpunity_games_taxcategory_fill' );

//==========================================================================================================================================

/**
 * D2.03
 * Create Initial wpunity_asset3d_cat (Asset3D Category) terms
 *
 *
 */

function wpunity_assets_taxcategory_fill(){
    wp_insert_term(
        'Dynamic 3D models', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Dynamic 3D models are those that can be clicked or moved, e.g. artifacts.',
            'slug' => 'dynamic3dmodels',
        )
    );
    wp_insert_term(
        'Points of Interest (Image-Text)', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Points of interest (POIs) are spots at the game where information pops up as Image with Text',
            'slug' => 'pois_ImageText',
        )
    );
    wp_insert_term(
        'Points of Interest (Video)', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Points of interest (POIs) are spots at the game where information pops up as Video',
            'slug' => 'pois_Video',
        )
    );
    wp_insert_term(
        'Static 3D models', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Static 3D models are those that can not be clicked and can not be moved (e.g. ground, wall, cave, house)',
            'slug' => 'static3dmodels',
        )
    );
    wp_insert_term(
        'Doors', // the term
        'wpunity_asset3d_cat', // the taxonomy
        array(
            'description'=> 'Doors are 3D model where avatar pass through and thus going from one Scene to another Scene.',
            'slug' => 'doors',
        )
    );
}

add_action( 'init', 'wpunity_assets_taxcategory_fill' );

//==========================================================================================================================================


?>
