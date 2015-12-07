<?php

/**
 * Custom post type for links
 */

function corenominal_register_post_type_link()
{
	
	$singular = 'Link';
	$plural = 'Links';
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
	        'menu_position'       => 6,
	        'menu_icon'           => 'dashicons-admin-links',
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
add_action( 'init', 'corenominal_register_post_type_link' );

/**
 * Add custom metabox for entering the link
 */
function corenominal_add_metabox_link()
{
	add_meta_box(
		'corenominal_metabox_link', // id
		'The Link URL', // title
		'corenominal_metabox_link_callback', //callback function
		'link', // post type
		'normal', // context - placement i.e. 'side', 'normal', 'advanced'
		'high' // priority - i.e. 'high', 'core', 'default', 'low'
		);
}
add_action( 'add_meta_boxes', 'corenominal_add_metabox_link' );

/**
 * The metabox callback
 */
function corenominal_metabox_link_callback( $post )
{
	wp_nonce_field( basename( __FILE__ ), 'metabox_nonce' );
	$post_meta = get_post_meta( $post->ID ); 
	?>

	<div>
		<div class="meta-row">
			<input placeholder="http://..." class="code the_link" name="the_link" id="the_link" value="<?php if ( ! empty ( $post_meta['the_link'] ) ) echo esc_attr( $post_meta['the_link'][0] ); ?>" type="text">
		</div>
	</div>

	<?php
}

/**
 * Save the link
 */
function corenominal_metabox_link_save( $post_id )
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['metabox_nonce'] ) && wp_verify_nonce( $_POST['metabox_nonce'], basename( __FILE__ ) ) ) ? 'true' : 'false';

	// Exit script depending on save status
	if ($is_autosave || $is_revision || !$is_valid_nonce)
	{
		return;
	}

	if ( isset( $_POST['the_link'] ) )
	{
		update_post_meta( $post_id, 'the_link', sanitize_text_field( $_POST['the_link'] ) );
	}

}
add_action( 'save_post', 'corenominal_metabox_link_save' );

// Enqueue CSS and JavaScript
function corenominal_metabox_link_enqueue_scripts( $hook )
{
	if( 'post.php' == $hook || 'post-new.php' == $hook )
	{
	
		wp_register_style( 'corenominal_metabox_link_css', get_template_directory_uri() . '/functions/views/css/corenominal_metabox_link.css', array(), '0.0.1', 'all' );
		wp_enqueue_style( 'corenominal_metabox_link_css' );

		wp_register_script( 'corenominal_metabox_link_js', get_template_directory_uri() . '/functions/views/js/corenominal_metabox_link.js', array('jquery'), '0.0.1', true );
		wp_enqueue_script( 'corenominal_metabox_link_js' );
	}
}
add_action( 'admin_enqueue_scripts', 'corenominal_metabox_link_enqueue_scripts' );

/**
 * Return the link in template files
 */
function corenominal_the_link( $postid )
{
	$the_link = get_post_custom_values('the_link', $postid);
	echo $the_link[0];
}