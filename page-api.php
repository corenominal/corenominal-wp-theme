<?php
/**
 * A custom single use page template for providing an API.
 */

/**
 * Capture all requests
 */
$data = $_REQUEST;

/**
 * Get the API key
 */
$apikey = get_option( 'corenominal_apikey', '' );

/**
 * Sanity checks
 */
if( !sizeof( $data ) || !isset( $data['method'] ) )
{
	die( 'Error: no method defined' );
}

if( preg_match( '/[^a-z_\-0-9]/i', $data['method'] ) )
{
	die( 'Error: invalid method' );
}

/**
 * Test if file exists for supplied method
 */
$method = get_template_directory() . '/api/' . $data['method'] . '.php';
if( file_exists( $method ) )
{
	require $method;
}
else
{
	die( 'Error: method not found' );
}
