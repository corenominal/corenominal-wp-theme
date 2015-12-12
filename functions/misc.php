<?php
/**
 * Kill all emojis
 * ===============
 * See: http://wordpress.stackexchange.com/a/185578
 */
function disable_emojis()
{
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins )
{
    if ( is_array( $plugins ) )
    {
        return array_diff( $plugins, array( 'wpemoji' ) );
    }
    else
    {
        return array();
    }
}

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
    exit;
}

/**
 * Produces select for options
 */
function corenominal_options_select( $id, $options, $default, $description = '' )
{
	$setting = get_option( $id, $default );
	$html = '<select name="'.$id.'">';
        foreach ( $options as $option )
        {
        	$selected = '';
        	if ( $option == $setting )
        	{
        		$selected = ' selected="selected"';
        	}
        	$html .= '<option value="'.$option.'"'.$selected.'>'.$option.'</option>';
        }
	$html .= '</select>';
	if($description != '')
	{
    	$html .= '<p class="description">' . $description . '</p>';
    }
    return $html;
}