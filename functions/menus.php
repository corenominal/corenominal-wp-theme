<?php
/**
 * Register navigation menu
 * ========================
 * Call this inside header templates with:
 * wp_nav_menu( array( 'theme_location' => 'header-menu' ) )
 */

function corenominal_header_menu()
{
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'corenominal_header_menu' );
