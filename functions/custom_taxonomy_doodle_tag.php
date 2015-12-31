<?php
/**
 * Custom taxonomy for doodle tags
 */
function corenominal_register_taxonomy_doodle_tag()
{

	$singular = 'Tag';
	$plural = 'Tags';
	$slug = 'doodle_tag';

	$labels = array(
		'name'                       => $plural,
        'singular_name'              => $singular,
        'search_items'               => 'Search ' . $plural,
        'popular_items'              => 'Popular ' . $plural,
        'all_items'                  => 'All ' . $plural,
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit ' . $singular,
        'update_item'                => 'Update ' . $singular,
        'add_new_item'               => 'Add New ' . $singular,
        'new_item_name'              => 'New ' . $singular . ' Name',
        'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'        => 'Add or remove ' . $plural,
        'choose_from_most_used'      => 'Choose from the most used ' . $plural,
        'not_found'                  => 'No ' . $plural . ' found.',
        'menu_name'                  => $plural,
	);

	$args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => $slug ),
        );

	register_taxonomy( $slug, 'doodle', $args );
}

add_action( 'init', 'corenominal_register_taxonomy_doodle_tag' );

/**
 * Function to return the tags within template files
 */
function corenominal_the_doodle_tags( $postid )
{
   the_terms( $postid, 'doodle_tag', '<i class="fa fa-tags"></i> <span class="sr-only">Tags: </span>', ', ', ' ' );
}
