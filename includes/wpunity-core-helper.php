<?php
/**
 * Created by PhpStorm.
 * User: tpapazoglou
 * Date: 22/5/2017
 * Time: 3:40 μμ
 */

function wpunity_return_project_type($id) {

	$all_project_category = get_the_terms( $id, 'wpunity_game_type' );
	$project_category     = $all_project_category[0]->name;

	// Default is Archaeology
	$project_type_icon = "account_balance";

	// Set game type icon
	if ( $project_category === 'Energy' )
		$project_type_icon = "blur_on";

    if ( $project_category === 'Chemistry' )
        $project_type_icon = "bubble_chart";


	$obj = new stdClass();
	$obj->string = $project_category;
	$obj->icon = $project_type_icon;

	return $obj;
}
