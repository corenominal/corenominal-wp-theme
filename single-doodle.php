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

				<?php
				// Openclipart link?
				$url = corenominal_openclipart_link( $post->ID );
				if( $url != '' )
				{
				?>
				<div class="doodle-openclipart-link" data-url="<?php echo $url; ?>">
					<a class="notmagnific" href="<?php echo $url; ?>" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/img/openclipart-link.svg' ?>" alt="Openclipart">
						<div class="doodle-openclipart-copy">
							<h4>Openclipart Doodle</h4>
							<p>This doodle is available in various formats on Openclipart. Click here to visit the Openclipart page.</p>
						</div>
					</a>
				</div>
				<?php
				}
				?>
			</div>

			<footer>
				
				<p class="meta"><a class="u-url" href="<?php the_permalink(); ?>"><i class="fa fa-calendar"></i>  <?php the_date() ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time() ?></a></p>
				<p class="meta"><?php corenominal_the_doodle_media( $post->ID ) ?></p>
				<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
				<p class="meta"><?php corenominal_the_doodle_tags( $post->ID ) ?></p>
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
