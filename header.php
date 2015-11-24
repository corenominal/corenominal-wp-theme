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
	<?php
		if ( is_single() ) :
			echo '<h1><a href="' . get_bloginfo('url') . '">' . get_bloginfo('name') . '</a></h1>';
		else :
			echo '<h1>' . get_bloginfo('name') . '</h1>';
		endif;
	?>
	
	<p><strong><?php bloginfo('description'); ?></strong></p>

</header>