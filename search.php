<?php
/**
 * The default search template.
 */

/**
 * Pull in the header
 */
get_header();

?>

<div class="the-content">

<?php
/**
 * Show the search term we are dealing with
 */
?>

<h1 class="taxonomy-title"><i class="fa fa-search"></i> Search for: <?php the_search_query() ?></h1>

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
		$date = date( "F j, Y" , strtotime( $post->post_date ) );
?>

		<article class="h-entry post post-summary">

			<?php if( $post->post_type == 'link' ): ?>
				<h2>
					<a class="p-name" href="<?php corenominal_the_link( $post->ID ) ?>" target="_blank">
						<?php the_title() ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-external-link"></i>
					</a>
				</h2>
			<?php else: ?>
				<h2>
					<a class="p-name u-url" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
				</h2>
			<?php endif; ?>
		
			<?php if( $post->post_type == 'doodle' ): ?>
				
				<div class="p-description doodle-result">
					<?php
					$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
					$thumbnail = $thumbnail[0];
					?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail; ?>" alt="<?php the_title() ?>"></a>
					<div class="doodle-result-excerpt">
						<?php the_excerpt() ?>
					</div>
				</div>
			
			<?php else: ?>

				<div class="p-description">
					<?php the_excerpt() ?>
				</div>

			<?php endif; ?>
			
			<footer>
				
				<p class="meta"><?php echo '<i class="fa fa-calendar"></i> ' . $date . '&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i> '; the_time() ?></p>
				
				<?php if( get_option( 'corenominal_show_cats', 'false' ) == 'true' ): ?>
				<p class="meta"><i class="fa fa-files-o"></i> <span class="sr-only">Filed under: </span> <?php the_category( ' ' ) ?></p>
				<?php endif; ?>
				
				<?php if( $post->post_type == 'post' ): ?>
					<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
					<p class="meta"><?php the_tags( '<i class="fa fa-tags"></i> <span class="sr-only">Tags: </span>' ) ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if( $post->post_type == 'link' ): ?>
					<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
					<p class="meta"><?php corenominal_the_link_tags( $post->ID ) ?></p>
					<?php endif; ?>
				<?php endif; ?>
				
				<?php if( $post->post_type == 'snippet' ): ?>
					<p class="meta"><?php corenominal_the_snippet_languages( $post->ID ) ?></p>
					<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
					<p class="meta"><?php corenominal_the_snippet_tags( $post->ID ) ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if( $post->post_type == 'doodle' ): ?>
					<p class="meta"><?php corenominal_the_doodle_media( $post->ID ) ?></p>
					<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
						<p class="meta"><?php corenominal_the_doodle_tags( $post->ID ) ?></p>
					<?php endif; ?>
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
			<h2>No results for "<?php the_search_query() ?>"</h2>
			<p>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ohnoes.png" alt="Oh Noes!">
			</p>
		</div>

	<?php

endif;
?>

</div> <!-- the_content -->

<?php get_sidebar() ?>

<?php
/**
 * Pull in the footer
 */
get_footer();
