<?php
/**
 * The doodle archive template
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
	 * Start a count of posts
	 */
	$i = 0;

	/**
	 * Set $prev_date to null for tests in loop
	 */
	$prev_date = null;
	
	/**
	 * Set-up first section
	 */
	echo '<section>';

	/**
	 * Start the loop
	 */
	while ( have_posts() ) :
		the_post();
		$i++;
		$date = date( "F j, Y" , strtotime( $post->post_date ) );
		if( $prev_date != $date )
		{
			if( $i > 1 )
			{
				echo "\n</section>\n<section>\n";
			}
			echo '<h1 class="section-title">' . $date . '</h1>';
			$prev_date = $date;
		}
?>

		<article class="h-entry post doodle">

			<h2>
				<a class="p-name u-url" href="<?php the_permalink() ?>">
					<?php the_title() ?>
				</a>
			</h2>
		
			<div class="e-content">
				<?php the_content() ?>
			</div>

			<footer>
				
				<p class="meta"><i class="fa fa-clock-o"></i> <span class="sr-only">Posted @</span> <?php the_time() ?></p>
				<p class="meta"><?php corenominal_the_doodle_media( $post->ID ) ?></p>
			</footer>

		</article>
		
		<?php

		/**
		 * Only show end section if last post
		 */
		if ( $i == sizeof( $posts ) )
		{
			echo "\n</section>\n";
		}
		
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
