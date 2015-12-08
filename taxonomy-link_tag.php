<?php
/**
 * The archive template for the custom link_tag taxonomy.
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

		<article class="h-entry post post-summary">

			<h2>
				<a class="p-name u-url" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
			</h2>
		
			<div class="p-description">
				<?php the_excerpt() ?>
			</div>

			<footer>
				
				<p class="meta"><?php echo '<i class="fa fa-calendar"></i> ' . $date . '&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i> '; the_time() ?></p>
				
				<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
				<p class="meta"><?php corenominal_the_link_tags( $post->ID ) ?></p>
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

</div> <!-- the_content -->

<?php get_sidebar() ?>

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
