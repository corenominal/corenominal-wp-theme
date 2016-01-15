<?php
/**
 * The default page template.
 */

/**
 * Pull in the header
 */
get_header();

?>
<div class="the-content">

<?php
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
	<div class="post page">
		<h1><?php the_title() ?></h1>
		
		<div class="e-content">
			<?php the_content() ?>
		</div>

	</div>

<?php
	/**
	 * End the loop
	 */
	endwhile;
?>

</div> <!-- the_content -->

<?php
get_sidebar('link');

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

		