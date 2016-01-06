<?php
/**
 *                                             _             _
 *     ___ ___  _ __ ___ _ __   ___  _ __ ___ (_)_ __   __ _| |
 *    / __/ _ \| '__/ _ \ '_ \ / _ \| '_ ` _ \| | '_ \ / _` | |
 *   | (_| (_) | | |  __/ | | | (_) | | | | | | | | | | (_| | |
 *    \___\___/|_|  \___|_| |_|\___/|_| |_| |_|_|_| |_|\__,_|_|
 *
 *   Webmaster: Philip Newborough
 *   Contact: corenominal [at] corenominal.org
 *   Twitter: @corenominal
 *   From: Lincoln, United Kingdom
 *
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 */

/**
 * Pull in the header
 */
get_header();

?>

<div class="the-content">

<?php
// Set-up the loop
$post_types = array( 'post', 'link', 'snippet', 'doodle' );
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type' 		=> $post_types,
	'paged' 			=> $paged,
	'posts_per_page'	=> 10
	);
query_posts( $args );

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

		require get_template_directory() . '/post_type-' . $post->post_type . '.php';

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

<?php get_sidebar( 'homepage' ) ?>

<?php
/**
 * Pull in the footer
 */
get_footer();
