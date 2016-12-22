<?php
/**
 * 3.01
 * Create Initial Asset Categories
 *
 */

function wpunity_assets_taxcategory_fill(){
    wp_insert_term('Dynamic 3D models','asset3d_category','dynamic3dmodels','Dynamic 3D models are those that can be clicked or moved, e.g. artifacts.');
    wp_insert_term('Points of Interest','asset3d_category','pois','Points of interest (POIs) are spots at the game where information pops up.');
    wp_insert_term('Static 3D models','asset3d_category','static3dmodels','Static 3D models are those that can not be clicked and can not be moved (e.g. ground, wall, cave, house)');
    wp_insert_term('Doors','asset3d_category','doors','Doors are 3D model where avatar pass through and thus going from one Scene to another Scene');
}




?>