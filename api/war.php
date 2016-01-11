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

function foo( $data )
{
	echo_json( $data );
}