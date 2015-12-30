<?php
/**
 * The single post template for custom post type doodle.
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

		<div class="h-entry post doodle">

			<h1 class="p-name">
				<?php the_title() ?>
			</h1>
		
			<div class="e-content">
				<?php the_content() ?>

				<?php
				// Repeating pattern?
				if( corenominal_doodle_pattern( $post->ID ) == 'true' )
				{
					$tile = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					$tile = $tile[0];
				?>
				<div class="doodle-tile-link" data-tile="<?php echo $tile; ?>">
					<img src="<?php echo get_template_directory_uri() . '/img/tile-link.svg' ?>" alt="Tile the doodle">
					<div class="doodle-tile-copy">
						<h4>Tile Preview</h4>
						<p>This doodle is a repeating pattern. Click here to see a preview.</p>
					</div>
				</div>
				<?php
				}
				?>
			</div>

			<footer>
				
				<p class="meta"><a class="u-url" href="<?php the_permalink(); ?>"><i class="fa fa-calendar"></i>  <?php the_date() ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time() ?></a></p>
				<p class="meta"><?php corenominal_the_doodle_media( $post->ID ) ?></p>
				
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
get_sidebar( 'doodle' );

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
