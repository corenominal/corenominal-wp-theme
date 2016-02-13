<?php
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
 * Echo array as json
 */
function echo_json($data){
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-Type: application/json');
    echo json_encode($data);
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

/**
 * Produces select for metaboxes
 */
function corenominal_metabox_select( $id, $options, $sellected, $description = '' )
{
    $select = $sellected;
    $html = '<select name="'.$id.'">';
        foreach ( $options as $option )
        {
            $selected = '';
            if ( $option == $select )
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