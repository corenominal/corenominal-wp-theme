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
echo '<h1 class="taxonomy-title">Tag: ' . single_tag_title( '', false ) . '</h1>';

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
				
				<?php if( get_option( 'corenominal_show_cats', 'false' ) == 'true' ): ?>
				<p class="meta">Filed under: <?php the_category( ' ' ) ?></p>
				<?php endif; ?>
				
				<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
				<p class="meta"><?php the_tags() ?></p>
				<?php endif; ?>

			</footer>

		</article>
		
		<?php
		
	/**
	 * End the loop
	 */
	endwhile;
?>


<?php get_sidebar() ?>

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
