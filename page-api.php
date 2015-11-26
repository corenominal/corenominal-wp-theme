<?php
/**
 * A custom single use page template for providing an API.
 */


/**
 * Everything below is temporary, I'll flesh it out later.
 */

$data = $_REQUEST;

/**
 * Sanity check
 */
if( !sizeof( $data ) || !isset( $data['method'] ) )
{
	die( 'Error: no method defined' );
}

/**
 * Switch for API methods
 */
switch ( $data['method'] )
{
	case 'ip':
		header( 'Content-Type: text/plain' );
		echo $_SERVER['REMOTE_ADDR'];
		break;
	
	default:
		die( 'Error: provided method could not be found' );
		break;
}
