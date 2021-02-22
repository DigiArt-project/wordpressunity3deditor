<?php

//
////echo print("<pre>".print_r(array_keys(get_role( 'adv_project_master' )->capabilities), true)."</pre>");
//
//$role = get_role( 'adv_project_master5' );
//
//
//
//

//$role->add_cap('read');

//$role->remove_cap('read');


//$role->remove_cap('edit_wpunity_game');
//$role->remove_cap('read_wpunity_game');
//$role->remove_cap('read_private_wpunity_game ');
//$role->remove_cap('delete_others_wpunity_game');
//$role->remove_cap('delete_wpunity_game');
//$role->remove_cap('edit_others_wpunity_game');
//
//$role->remove_cap('manage_game_type');
//$role->remove_cap('edit_game_type');
//$role->remove_cap('read_private_wpunity_game');
//$role->remove_cap('manage_game_cat');
//$role->remove_cap('edit_game_cat');
//$role->remove_cap('manage_game_type');
//$role->remove_cap('edit_game_type');
//
//echo "<br />";
//foreach ( $role->capabilities as $key => $value ) {
//    echo "{$key} => {$value} "."<br />";
//}





function wpunity_add_customroles() {
    
    add_role( 'adv_project_master5', 'Advanced Project Master 5');
    
    $role = get_role( 'adv_project_master5' );
    
    
    
    
    $role = get_role( 'adv_project_master5' );
    
    //$role->add_cap('read');
    //$role->add_cap('level_0');
    
//    //Caps about Games
    $role->add_cap( 'publish_wpunity_project' );
    $role->add_cap( 'edit_wpunity_project' );
    $role->add_cap( 'delete_wpunity_project' );
    $role->add_cap( 'edit_wpunity_project' );
    $role->add_cap( 'delete_wpunity_project' );
    $role->add_cap( 'read_wpunity_project' );
//
//    //Caps about Scenes
    $role->add_cap( 'publish_wpunity_scene' );
    $role->add_cap( 'edit_wpunity_scene' );
    $role->add_cap( 'delete_wpunity_scene' );
    $role->add_cap( 'edit_wpunity_scene' );
    $role->add_cap( 'delete_wpunity_scene' );
    $role->add_cap( 'read_wpunity_scene' );
//
//    //Caps about Assets
    $role->add_cap( 'publish_wpunity_asset3d' );
    $role->add_cap( 'edit_wpunity_asset3d' );
    $role->add_cap( 'delete_wpunity_asset3d' );
    $role->add_cap( 'edit_wpunity_asset3d' );
    $role->add_cap( 'delete_wpunity_asset3d' );
    $role->add_cap( 'read_wpunity_asset3d' );
    
    //Caps about Taxonomies

    $role->add_cap( 'manage_project_type' );
    $role->add_cap( 'edit_project_type' );
    $role->add_cap( 'manage_taxpgame' );
    $role->add_cap( 'edit_taxpgame' );
    $role->add_cap( 'manage_scene_yaml' );
    $role->add_cap( 'edit_scene_yaml' );
    
    $role->add_cap( 'manage_asset3d_cat' );
    $role->add_cap( 'manage_asset3d_iprcat' );
    
    $role->add_cap( 'edit_asset3d_cat' );
    $role->add_cap( 'edit_asset3d_iprcat' );
    
    $role->add_cap( 'manage_asset3d_pgame' );
    $role->add_cap( 'edit_asset3d_pgame' );
    
    unset( $role );
}



function wpunity_add_capabilities_to_admin() {
    $role = get_role( 'administrator' );

    //Caps about Games
    $role->add_cap( 'publish_wpunity_project' );
    $role->add_cap( 'edit_wpunity_project' );
    $role->add_cap( 'edit_others_wpunity_project' );
    $role->add_cap( 'delete_wpunity_project' );
    $role->add_cap( 'delete_others_wpunity_project' );
    $role->add_cap( 'read_private_wpunity_project' );
    $role->add_cap( 'edit_wpunity_project' );
    $role->add_cap( 'delete_wpunity_project' );
    $role->add_cap( 'read_wpunity_project' );

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
    $role->add_cap( 'manage_project_type' );
    $role->add_cap( 'edit_project_type' );
    $role->add_cap( 'manage_taxpgame' );
    $role->add_cap( 'edit_taxpgame' );
    $role->add_cap( 'manage_scene_yaml' );
    $role->add_cap( 'edit_scene_yaml' );
    
    $role->add_cap( 'manage_asset3d_cat' );
    $role->add_cap( 'manage_asset3d_iprcat' );
    
    $role->add_cap( 'edit_asset3d_cat' );
    $role->add_cap( 'edit_asset3d_iprcat' );
    
    $role->add_cap( 'manage_asset3d_pgame' );
    $role->add_cap( 'edit_asset3d_pgame' );

    unset( $role );

}



?>
