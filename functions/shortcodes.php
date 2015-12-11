<?php
/**
 * Some custom shortcodes
 */

/**
 * Github Gists
 * Usage: [gist url="https://gist.github.com/corenominal/0efedf14eca28453a58e"]
 */
function corenominal_shortcode_gist( $atts, $content = null)
{
	$atts = shortcode_atts(
				array(
						'url' => 'https://gist.github.com/corenominal/0efedf14eca28453a58e'
				), $atts
			);

	return '<script src="' . $atts['url'] . '.js"></script>';

}
add_shortcode( 'gist', 'corenominal_shortcode_gist' );