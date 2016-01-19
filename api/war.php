<?php
/**
 * API Method for War
 */

if( !isset($data['action']) )
{
	die( 'Error: invalid action' );
}

switch ( $data['action'] )
{
	case 'stats':
		stats();
		break;

	case 'insert':
		insert();
		break;

	case 'foo':
		foo( $data );
		break;
	
	default:
		die( 'Error: invalid action' );
		break;
}

/**
 * Return the current stats
 */ 
function stats()
{
	global $wpdb;
	$data = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM demo_war WHERE id = %d", 1 ) , ARRAY_A );
	$data['date_h'] = date( 'F j, Y, g:i a', $data['last_battle_date'] );
	echo_json( $data );
}

/**
 * Insert the results of a battle
 */ 
function insert()
{
	//TODO - needs some sort of sanity check here
	global $wpdb;
	$wpdb->insert( 
		'demo_war_log', 
		array( 
			'date' => time(), 
			'circles_to_battle'		=> 123,
			'squares_to_battle'		=> 123,
			'winners'				=> 'squares',
			'losers'				=> 'circles',
			'circles_casualties'	=> 123,
			'squares_casualties'	=> 120
		), 
		array( 
			'%d', 
			'%d',
			'%s',
			'%s',
			'%d',
			'%d',
		) 
	);

}

function foo( $data )
{
	echo_json( $data );
}