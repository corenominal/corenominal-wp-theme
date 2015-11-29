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

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<small><?php the_date(); ?> - <?php the_time(); ?></small>
		
		<?php

		the_content();
		
		comments_template();

		?>
	
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