<?php
/**
 * The magic WordPress functions.php file. Whoa, functions!
 * ========================================================
 */

/**
 * Register navigation menus.
 */
require get_template_directory() . '/functions/menus.php';

/**
 * Include random stuff that does not fit elsewhere.
 */
require get_template_directory() . '/functions/misc.php';

/**
 * Include random stuff that does not fit elsewhere.
 */
require get_template_directory() . '/functions/metadata.php';

/**
 * Dump and die, a handy function for debugging. Idea pilfered from Laravel.
 */
function dd( $data )
{
	echo '<pre><code>';
	var_dump( $data );
	echo '</code></pre>';
}