<?php
/**
 * The single post template for custom post type link.
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

		<div class="h-entry post">

			<h1 class="p-name">
				<a href="<?php corenominal_the_link( $post->ID ) ?>" target="_blank">
				<?php the_title() ?>
				</a>
			</h1>
		
			<div class="e-content">
				<?php the_content() ?>
			</div>

			<footer>
				
				<p class="meta"><a class="u-url" href="<?php the_permalink(); ?>"><?php the_time() ?></a></p>
				
				<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
				<p class="meta"><?php corenominal_the_link_tags( $post->ID ) ?></p>
				<?php endif; ?>

			</footer>
				
		</div>

		<?php comments_template() ?>
	
<?php
	/**
	 * End the loop
	 */
	endwhile;


get_sidebar();

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
