<?php
/**
 * The archive template for the custom doodle_media taxonomy.
 */

/**
 * Pull in the header
 */
get_header();
?>

<div class="the-content">

<?php
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

		<article class="h-entry post post-summary doodle">

			<h2>
				<a class="p-name u-url" href="<?php the_permalink() ?>">
					<?php the_title() ?>
				</a>
			</h2>
		
			<div class="p-description">
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
				
				<p class="meta"><i class="fa fa-clock-o"></i> <span class="sr-only">Posted @</span> <?php the_time() ?></p>
				<p class="meta"><?php corenominal_the_doodle_media( $post->ID ) ?></p>
				<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
				<p class="meta"><?php corenominal_the_doodle_tags( $post->ID ) ?></p>
				<?php endif; ?>

			</footer>

		</article>
		
		<?php
		
	/**
	 * End the loop
	 */
	endwhile;
?>

<?php if( get_next_posts_link() || get_previous_posts_link() ): ?>
<div class="pager">
	<div class="next_posts_link">
		<?php next_posts_link( '<i class="fa fa-chevron-left"></i> Older Posts' ) ?>
	</div>
	<div class="previous_posts_link">
		<?php previous_posts_link( 'Newer Posts <i class="fa fa-chevron-right"></i>' ) ?>
	</div>
</div>
<?php endif; ?>

<?php
/**
 * We may not have any posts. Doh!
 */
else :

	?>
		
		<div class="post">
			<h2>There Is Nothing Here!</h2>
			<p>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ohnoes.png" alt="Oh Noes!">
			</p>
		</div>

	<?php

endif;
?>

</div> <!-- the_content -->

<?php get_sidebar( 'doodle' ) ?>

<?php
/**
 * Pull in the footer
 */
get_footer();
