<?php

/**
 * Custom post type for doodles
 */

function corenominal_register_post_type_doodle()
{
	
	$singular = 'Doodle';
	$plural = 'Doodles';
	$slug = str_replace( ' ', '_', strtolower( $singular ) );

	$labels = array(
		'name' 					=> $plural,
		'singular_name' 		=> $singular,
		'add_new' 				=> 'Add New',
		'add_new_item'  		=> 'Add New ' . $singular,
		'edit'		        	=> 'Edit',
		'edit_item'	        	=> 'Edit ' . $singular,
		'new_item'	        	=> 'New ' . $singular,
		'view' 					=> 'View ' . $singular,
		'view_item' 			=> 'View ' . $singular,
		'search_term'   		=> 'Search ' . $plural,
		'parent' 				=> 'Parent ' . $singular,
		'not_found' 			=> 'No ' . $plural .' found',
		'not_found_in_trash' 	=> 'No ' . $plural .' in Trash'
		);

	$args = array(
			'labels'              => $labels,
	        'public'              => true,
	        'publicly_queryable'  => true,
	        'exclude_from_search' => false,
	        'show_in_nav_menus'   => true,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_admin_bar'   => true,
	        'menu_position'       => 7,
	        'menu_icon'           => 'dashicons-format-image',
	        'can_export'          => true,
	        'delete_with_user'    => false,
	        'hierarchical'        => false,
	        'has_archive'         => true,
	        'query_var'           => true,
	        'capability_type'     => 'post',
	        'map_meta_cap'        => true,
	        'rewrite'             => array( 
	        	'slug' 			=> $slug,
	        	'with_front' 	=> true,
	        	'pages' 		=> true,
	        	'feeds' 		=> true,
	        ),
	        'supports'            => array( 
	        	'title', 
	        	'editor', 
	        	'author', 
	        	'custom-fields',
	        	'thumbnail',
	        	'excerpt',
	        	'comments',
	        	'trackbacks'
	        )
	);
	register_post_type( $slug, $args );
}
add_action( 'init', 'corenominal_register_post_type_doodle' );

/**
 * Add custom metabox for defining a repeating pattern
 */
function corenominal_add_metabox_doodle_pattern()
{
	add_meta_box(
		'corenominal_metabox_doodle_pattern', // id
		'Repeating Pattern?', // title
		'corenominal_metabox_doodle_pattern_callback', //callback function
		'doodle', // post type
		'normal', // context - placement i.e. 'side', 'normal', 'advanced'
		'high' // priority - i.e. 'high', 'core', 'default', 'low'
		);
}
add_action( 'add_meta_boxes', 'corenominal_add_metabox_doodle_pattern' );

/**
 * The metabox callback
 */
function corenominal_metabox_doodle_pattern_callback( $post )
{
	wp_nonce_field( basename( __FILE__ ), 'metabox_nonce' );
	$post_meta = get_post_meta( $post->ID ); 
	$id = 'doodle_pattern';
	$options = array('true','false');
	$selected = 'false';
	if ( ! empty ( $post_meta['doodle_pattern'] ) )
	{
		$selected = $post_meta['doodle_pattern'][0];
	}
	$description = 'If this doodle is a repeating pattern, select "true".';
	?>

	<div>
		<div class="meta-row">
			<?php echo corenominal_metabox_select( $id, $options, $selected, $description); ?>
		</div>
	</div>

	<?php
}

/**
 * Save the metabox value
 */
function corenominal_metabox_doodle_pattern_save( $post_id )
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['metabox_nonce'] ) && wp_verify_nonce( $_POST['metabox_nonce'], basename( __FILE__ ) ) ) ? 'true' : 'false';

	// Exit script depending on save status
	if ($is_autosave || $is_revision || !$is_valid_nonce)
	{
		return;
	}

	if ( isset( $_POST['doodle_pattern'] ) )
	{
		update_post_meta( $post_id, 'doodle_pattern', sanitize_text_field( $_POST['doodle_pattern'] ) );
	}

}
add_action( 'save_post', 'corenominal_metabox_doodle_pattern_save' );
