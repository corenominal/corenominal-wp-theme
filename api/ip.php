<?php
/**
 * API Method for returning the users IP address
 */
if( !isset( $data['apikey'] ) )
{
	die( 'Error: please provide an API key' );
}

if( $data['apikey'] != $apikey )
{
	die( 'Error: invalid API key' );
}

header( 'Content-Type: text/plain' );
echo $_SERVER['REMOTE_ADDR'];

