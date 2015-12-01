<?php
/**
 * The default tag template.
 */

/**
 * Pull in the header
 */
get_header();

/**
 * Show which tag we are dealing with
 */
echo '<h1 class="tag-title">Tags: ' . single_tag_title( '', false ) . '</h1>';

/**
 * Sanity check
 */
if ( have_posts() ) :

	/**
	 * Start the loop
	 */
	while ( have_posts() ) :
		the_post();
		$date = date( "F j, Y" , strtotime( $post->post_date ) );
?>

		<article class="h-entry post-summary">

			<h2>
				<a class="p-name u-url" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
			</h2>
		
			<div class="p-description">
				<?php the_excerpt() ?>
			</div>

			<footer>
				<p class="meta"><?php echo $date . ' '; the_time() ?></p>
				<p class="meta"><?php the_tags() ?></p>
			</footer>

		</article>
		
		<?php
		
	/**
	 * End the loop
	 */
	endwhile;
?>

<?php next_posts_link( '< Older posts' ) ?><br><?php previous_posts_link( 'Newer posts >' ) ?>

<?php

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