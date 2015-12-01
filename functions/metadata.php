<?php
/**
 * Add Opengraph and Twitter cards meta.
 * Uses priority '1' to execute as early as possible.
 */
function corenominal_meta()
{
	
	if( is_home() )
	{
		echo "<!-- homepage metadata inserted here -->\n";
	}
	elseif( is_single() )
	{
		echo "<!-- single post metadata inserted here -->\n";
	}
	elseif( is_page() )
	{
		echo "<!-- page metadata inserted here -->\n";
	}
	else
	{
		return;
	}
	
}
add_action( 'wp_head', 'corenominal_meta', 1 );