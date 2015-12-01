<?php
/**
 * Remove emoji support from head. I don't have anything against
 * smiley people, but emoji, eww!
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Add thumbnail/featued image support
 */
add_theme_support( 'post-thumbnails' );

/**
 * A nicer excerpt?
 */
function corenominal_excerpt_continue_reading( $more )
{
	return ' &mdash; <a class="continue-reading" href="' . get_the_permalink() . '">continue reading&hellip;</a>';
}
add_filter('excerpt_more', 'corenominal_excerpt_continue_reading');

/**
 * Dump and die, a handy function for debugging. Idea pilfered from Laravel.
 */
function dd( $data )
{
	echo '<pre><code>';
	var_dump( $data );
	echo '</code></pre>';
}