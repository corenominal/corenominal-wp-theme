<?php
/**
 * The single post template for custom post type snippet.
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

		<div class="h-entry post">

			<h1 class="p-name">
				<?php the_title() ?>
			</h1>
		
			<div class="e-content">
				<?php the_content() ?>
			</div>

			<footer>
				
				<p class="meta"><a class="u-url" href="<?php the_permalink(); ?>"><i class="fa fa-calendar"></i>  <?php the_date() ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time() ?></a></p>
				<p class="meta"><?php corenominal_the_snippet_languages( $post->ID ) ?></p>
				<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
				<p class="meta"><?php corenominal_the_snippet_tags( $post->ID ) ?></p>
				<?php endif; ?>

			</footer>
				
		</div>

		<?php comments_template() ?>
	
<?php
	/**
	 * End the loop
	 */
	endwhile;
?>

</div> <!-- the_content -->

<?php
get_sidebar('snippet');

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
