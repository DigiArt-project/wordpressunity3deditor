<?php

function wpunity_add_customroles() {

    add_role( 'adv_game_master', 'Advanced Game Master',
        array(
            'read' => true,
            'level_0' => true,
        )
    );

    add_role( 'teacher', 'Teacher',
        array(
            'read' => true,
            'level_0' => true,
        )
    );
}

add_action( 'init', 'wpunity_add_customroles');


function wpunity_add_capabilities_to_adv_game_master() {
    $role = get_role( 'adv_game_master' );

    //Caps about Games
    $role->add_cap( 'publish_wpunity_game' );
    $role->add_cap( 'edit_wpunity_game' );
    $role->add_cap( 'edit_others_wpunity_game' );
    $role->add_cap( 'delete_wpunity_game' );
    $role->add_cap( 'delete_others_wpunity_game' );
    $role->add_cap( 'read_private_wpunity_game' );
    $role->add_cap( 'edit_wpunity_game' );
    $role->add_cap( 'delete_wpunity_game' );
    $role->add_cap( 'read_wpunity_game' );

    //Caps about Scenes
    $role->add_cap( 'publish_wpunity_scene' );
    $role->add_cap( 'edit_wpunity_scene' );
    $role->add_cap( 'edit_others_wpunity_scene' );
    $role->add_cap( 'delete_wpunity_scene' );
    $role->add_cap( 'delete_others_wpunity_scene' );
    $role->add_cap( 'read_private_wpunity_scene' );
    $role->add_cap( 'edit_wpunity_scene' );
    $role->add_cap( 'delete_wpunity_scene' );
    $role->add_cap( 'read_wpunity_scene' );

    //Caps about Assets
    $role->add_cap( 'publish_wpunity_asset3d' );
    $role->add_cap( 'edit_wpunity_asset3d' );
    $role->add_cap( 'edit_others_wpunity_asset3d' );
    $role->add_cap( 'delete_wpunity_asset3d' );
    $role->add_cap( 'delete_others_wpunity_asset3d' );
    $role->add_cap( 'read_private_wpunity_asset3d' );
    $role->add_cap( 'edit_wpunity_asset3d' );
    $role->add_cap( 'delete_wpunity_asset3d' );
    $role->add_cap( 'read_wpunity_asset3d' );

    //Caps about Taxonomies
    $role->add_cap( 'manage_game_cat' );
    $role->add_cap( 'edit_game_cat' );
    $role->add_cap( 'manage_game_type' );
    $role->add_cap( 'edit_game_type' );
    $role->add_cap( 'manage_taxpgame' );
    $role->add_cap( 'edit_taxpgame' );
    $role->add_cap( 'manage_scene_yaml' );
    $role->add_cap( 'edit_scene_yaml' );
    $role->add_cap( 'manage_asset3d_cat' );
    $role->add_cap( 'edit_asset3d_cat' );
    $role->add_cap( 'manage_asset3d_pgame' );
    $role->add_cap( 'edit_asset3d_pgame' );

    unset( $role );

}

add_action( 'init', 'wpunity_add_capabilities_to_adv_game_master');



function wpunity_add_capabilities_to_admin() {
    $role = get_role( 'administrator' );

    //Caps about Games
    $role->add_cap( 'publish_wpunity_game' );
    $role->add_cap( 'edit_wpunity_game' );
    $role->add_cap( 'edit_others_wpunity_game' );
    $role->add_cap( 'delete_wpunity_game' );
    $role->add_cap( 'delete_others_wpunity_game' );
    $role->add_cap( 'read_private_wpunity_game' );
    $role->add_cap( 'edit_wpunity_game' );
    $role->add_cap( 'delete_wpunity_game' );
    $role->add_cap( 'read_wpunity_game' );

    //Caps about Scenes
    $role->add_cap( 'publish_wpunity_scene' );
    $role->add_cap( 'edit_wpunity_scene' );
    $role->add_cap( 'edit_others_wpunity_scene' );
    $role->add_cap( 'delete_wpunity_scene' );
    $role->add_cap( 'delete_others_wpunity_scene' );
    $role->add_cap( 'read_private_wpunity_scene' );
    $role->add_cap( 'edit_wpunity_scene' );
    $role->add_cap( 'delete_wpunity_scene' );
    $role->add_cap( 'read_wpunity_scene' );

    //Caps about Assets
    $role->add_cap( 'publish_wpunity_asset3d' );
    $role->add_cap( 'edit_wpunity_asset3d' );
    $role->add_cap( 'edit_others_wpunity_asset3d' );
    $role->add_cap( 'delete_wpunity_asset3d' );
    $role->add_cap( 'delete_others_wpunity_asset3d' );
    $role->add_cap( 'read_private_wpunity_asset3d' );
    $role->add_cap( 'edit_wpunity_asset3d' );
    $role->add_cap( 'delete_wpunity_asset3d' );
    $role->add_cap( 'read_wpunity_asset3d' );

    //Caps about Taxonomies
    $role->add_cap( 'manage_game_cat' );
    $role->add_cap( 'edit_game_cat' );
    $role->add_cap( 'manage_game_type' );
    $role->add_cap( 'edit_game_type' );
    $role->add_cap( 'manage_taxpgame' );
    $role->add_cap( 'edit_taxpgame' );
    $role->add_cap( 'manage_scene_yaml' );
    $role->add_cap( 'edit_scene_yaml' );
    $role->add_cap( 'manage_asset3d_cat' );
    $role->add_cap( 'edit_asset3d_cat' );
    $role->add_cap( 'manage_asset3d_pgame' );
    $role->add_cap( 'edit_asset3d_pgame' );

    unset( $role );

}

add_action( 'init', 'wpunity_add_capabilities_to_admin');

?>