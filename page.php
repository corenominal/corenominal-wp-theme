<?php
/**
 * The default page template.
 */

/**
 * Pull in the header
 */
get_header();

/**
 * Sanity check
 */
if ( have_posts() ) :

	/**
	 * Start the loop
	 */
	while ( have_posts() ) :
		the_post();
?>

		<h1>
			<?php the_title() ?>
		</h1>
		
		<?php the_content() ?>
	
<?php
	/**
	 * End the loop
	 */
	endwhile;

/**
 * We may not have any posts. Doh!
 */
else :

	echo 'Oops, it looks like something went horribly wrong.';

endif;

/**
 * Pull in the footer
 */
get_footer();