<?php
/**
 * The default single post template.
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
				<?php the_title() ?>
			</h1>
		
			<div class="e-content">
				<?php the_content() ?>
			</div>

			<footer>
				
				<p class="meta"><a class="u-url" href="<?php the_permalink(); ?>"><?php the_time() ?></a></p>
					
				<?php if( get_option( 'corenominal_show_cats', 'true' ) == 'true' ): ?>
				<p class="meta">Filed under: <?php the_category( ' ' ) ?></p>
				<?php endif; ?>
				
				<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
				<p class="meta"><?php the_tags() ?></p>
				<?php endif; ?>

			</footer>
				
		</div>

		<?php comments_template() ?>
	
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
