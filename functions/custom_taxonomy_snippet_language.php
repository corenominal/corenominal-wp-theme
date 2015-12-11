<?php
/**
 * Custom taxonomy for snippet languages
 */
function corenominal_register_taxonomy_snippet_language()
{

	$singular = 'Language';
	$plural = 'Languages';
	$slug = 'snippet_language';

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

	register_taxonomy( $slug, 'snippet', $args );
}

add_action( 'init', 'corenominal_register_taxonomy_snippet_language' );

/**
 * Function to return the tags within template files
 */
function corenominal_the_snippet_languages( $postid )
{
   the_terms( $postid, 'snippet_language', '<i class="fa fa-code"></i> <span class="sr-only">Languages: </span>', ', ', ' ' );
}
