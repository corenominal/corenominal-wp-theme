<?php
/**
 * Theme's admin menu
 */

function corenominal_admin_menu()
{
	/**
	 * Top level menu item
	 */
	add_menu_page(
		'corenominal Theme Options', // page title
		'corenominal', // menu title
		'manage_options', // capability
		'corenominal', // slug
		'corenominal_admin_callback', // callback
		'dashicons-admin-generic', // icon 
		60 //position
		);

	/**
	 * As above, for first submenu item
	 */
	add_submenu_page( 
		'corenominal', // parent slug
		'corenominal Theme Options', // page title
		'General', // menu title
		'manage_options', // capability
		'corenominal', // slug
		'corenominal_admin_callback' // callback function
	 	);

	/**
	 * Activate general options 
	 */
	add_action( 'admin_init', 'corenominal_general_settings' );

	/**
	 * Social media accounts submenu item
	 */
	add_submenu_page( 
		'corenominal', // parent slug
		'Social Accounts', // page title
		'Social', // menu title
		'manage_options', // capability
		'corenominal_social', // slug
		'corenominal_social_callback' // callback function
	 	);

	/**
	 * Activate social options 
	 */
	add_action( 'admin_init', 'corenominal_social_settings' );

	/**
	 * Metadata settings submenu item
	 */
	add_submenu_page( 
		'corenominal', // parent slug
		'Metadata', // page title
		'Metadata', // menu title
		'manage_options', // capability
		'corenominal_metadata', // slug
		'corenominal_metadata_callback' // callback function
	 	);

	/**
	 * Activate metadata options 
	 */
	add_action( 'admin_init', 'corenominal_metadata_settings' );

	/**
	 * API key submenu item
	 */
	add_submenu_page( 
		'corenominal', // parent slug
		'API Key', // page title
		'API Key', // menu title
		'manage_options', // capability
		'corenominal_apikey', // slug
		'corenominal_apikey_callback' // callback function
	 	);

	/**
	 * Activate apikey options 
	 */
	add_action( 'admin_init', 'corenominal_apikey_settings' );

}
add_action( 'admin_menu', 'corenominal_admin_menu' );

/**
 * corenominal_admin_callback()
 */
require get_template_directory() . '/functions/views/admin_corenominal.php';

/**
 * corenominal_social_callback()
 */
require get_template_directory() . '/functions/views/admin_corenominal_social.php';

/**
 * corenominal_metadata_callback()
 */
require get_template_directory() . '/functions/views/admin_corenominal_metadata.php';

/**
 * corenominal_apikey_callback()
 */
require get_template_directory() . '/functions/views/admin_corenominal_apikey.php';
