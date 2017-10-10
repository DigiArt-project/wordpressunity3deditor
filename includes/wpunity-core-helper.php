<?php
/**
 * Created by PhpStorm.
 * User: tpapazoglou
 * Date: 22/5/2017
 * Time: 3:40 μμ
 */

function wpunity_return_game_type($id) {

	$all_game_category = get_the_terms( $id, 'wpunity_game_type' );
	$game_category     = $all_game_category[0]->name;

	// Default is Archaeology
	$game_type_icon = "account_balance"; // Archaeology
	/*if ( $game_category === 'Archaeology' )
		$game_type_icon = "account_balance";*/

	// Set game type icon
	if ( $game_category === 'Energy' )
		$game_type_icon = "blur_on";


    if ( $game_category === 'Chemistry' )
        $game_type_icon = "bubble_chart";


	$obj = new stdClass();
	$obj->string = $game_category;
	$obj->icon = $game_type_icon;

	return $obj;
}
