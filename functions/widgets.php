<?php
/**
 * Register widgets areas for the Theme
 */

if ( function_exists( 'register_sidebar' ) ) {

	register_sidebar( array(
		'name' => 'Blog Sidebar - Homepage',
		'id'   => 'corenominal-homepage-sidebar-widget',
		'description'   => 'The sidebar which appears when viewing the homepage.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Blog Sidebar - Archives',
		'id'   => 'corenominal-blog-sidebar-archives-widget',
		'description'   => 'The sidebar which appears when viewing blog archive templates.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Blog Sidebar - Single',
		'id'   => 'corenominal-blog-sidebar-single-widget',
		'description'   => 'The sidebar which appears when viewing a single blog post.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Links Sidebar - Archives',
		'id'   => 'corenominal-link-sidebar-archives-widget',
		'description'   => 'The sidebar which appears when viewing link archive templates.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Link Sidebar - Single',
		'id'   => 'corenominal-link-sidebar-single-widget',
		'description'   => 'The sidebar which appears when viewing a single link post.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Snippet Sidebar - Archives',
		'id'   => 'corenominal-snippet-sidebar-archives-widget',
		'description'   => 'The sidebar which appears when viewing snippet archive templates.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name' => 'Snippet Sidebar - Single',
		'id'   => 'corenominal-snippet-sidebar-single-widget',
		'description'   => 'The sidebar which appears when viewing a single snippet post.',
		'before_widget' => '<div id="%1$s" class="aside widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

}
