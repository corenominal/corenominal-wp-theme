<?php
/**
 * The default header template for displaying the, erm, header.
 */

/**
 * Include the meta.
 */
require get_template_directory() . '/inc/meta.php';
?>

<header>
	
	<h1><a href="<?php bloginfo('url') ?>" title="<?php bloginfo('description') ?>"><?php bloginfo('name') ?></a></h1>
	
	<p><strong><?php bloginfo('description'); ?></strong></p>

	<?php
	/**
	 * The header menu
	 */
	wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
	?>

</header>