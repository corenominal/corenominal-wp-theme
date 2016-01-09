<?php
/**
 * Add Opengraph and Twitter cards meta.
 * Uses priority '1' to execute as early as possible.
 */


/**
 * A function to truncate the description
 */
function corenominal_metadata_truncate( $text, $chars = 190 )
{
    $text = $text . ' ';
    $text = substr( $text, 0, $chars );
    $text = substr( $text, 0, strrpos( $text,' ') );
    $text = $text . '...';
    return $text;
}

/**
 * Produce excerpt for meta description tag
 */
function corenominal_metadata_excerpt( $text, $excerpt )
{
    if ( $excerpt ) return $excerpt;

    $text = strip_shortcodes( $text );
    $text = apply_filters( 'the_content', $text );
    $text = str_replace( ']]>', ']]&gt;', $text );
    $text = strip_tags( $text );
    $excerpt_length = apply_filters( 'excerpt_length', 100 );
    $words = preg_split( "/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );
    if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
    } else {
            $text = implode(' ', $words);
    }

    if( strlen( $text) > 200 )
    {
    	$text = corenominal_metadata_truncate( $text );
    }

    return apply_filters( 'wp_trim_excerpt', $text );
}

/**
 * Insert the meta into <HEAD>
 */
function corenominal_metadata()
{
	$twitter_handle = get_option( 'corenominal_twitter_username', '' );
	$twitter = get_option( 'corenominal_enable_twitter_cards', 'false' );
	$opengraph = get_option( 'corenominal_enable_open_graph', 'false' );
	$opengraph_image = get_option( 'corenominal_default_open_graph_img', '' );

	if($opengraph_image == '')
	{
		$opengraph_image = get_template_directory_uri() . '/img/open-graph-default.png';
	}

	if( is_home() || is_archive() )
	{	
		if( $twitter == 'true' )
		{
			if( $twitter_handle != '' )
			{
				echo '<meta name="twitter:card" content="summary">' . PHP_EOL;
				echo '<meta name="twitter:site" content="@' . $twitter_handle . '">' . PHP_EOL;
			}
			echo '<meta name="twitter:url" content="' . get_bloginfo('url') . '">' . PHP_EOL;
			echo '<meta name="twitter:title" content="' . get_bloginfo('name') . '">' . PHP_EOL;
			echo '<meta name="twitter:description" content="' . get_bloginfo('description') . '">' . PHP_EOL;
			echo '<meta name="twitter:image" content="' . $opengraph_image . '">' . PHP_EOL;
		}

		if( $opengraph == 'true' )
		{
			echo '<meta property="og:url" content="' . get_bloginfo('url') . '">' . PHP_EOL;
			echo '<meta property="og:title" content="' . get_bloginfo('name') . '">' . PHP_EOL;
			echo '<meta property="og:description" content="' . get_bloginfo('description') . '">' . PHP_EOL;
			echo '<meta property="og:image" content="' . $opengraph_image . '">' . PHP_EOL;
		}

	}
	elseif( is_single() || is_page() )
	{
		global $post;

		if( has_post_thumbnail() )
		{
			$opengraph_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			$opengraph_image = $opengraph_image[0];
		}


		if( $twitter == 'true' )
		{
			if( $twitter_handle != '' )
			{
				echo '<meta name="twitter:card" content="summary">' . PHP_EOL;
				echo '<meta name="twitter:site" content="@' . $twitter_handle . '">' . PHP_EOL;
			}
			echo '<meta name="twitter:url" content="' . get_the_permalink() . '">' . PHP_EOL;
			echo '<meta name="twitter:title" content="' . get_the_title() . ' | ' . get_bloginfo('name') . '">' . PHP_EOL;
			echo '<meta name="twitter:description" content="' . corenominal_metadata_excerpt( $post->post_content, get_the_excerpt() ) . '">' . PHP_EOL;
			echo '<meta name="twitter:image" content="' . $opengraph_image . '">' . PHP_EOL;
		}

		if( $opengraph == 'true' )
		{
			echo '<meta property="og:url" content="' . get_the_permalink() . '">' . PHP_EOL;
			echo '<meta property="og:title" content="' . get_the_title() . ' | ' . get_bloginfo('name') . '">' . PHP_EOL;
			echo '<meta property="og:description" content="' . corenominal_metadata_excerpt( $post->post_content, get_the_excerpt() ) . '">' . PHP_EOL;
			echo '<meta property="og:image" content="' . $opengraph_image . '">' . PHP_EOL;
		}
	}
	else
	{
		return;
	}
	
}
add_action( 'wp_head', 'corenominal_metadata', 1 );
