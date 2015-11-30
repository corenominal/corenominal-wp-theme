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
			echo '<h1>' . $date . '</h1>';
			$prev_date = $date;
		}
?>

		<article>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
			<footer>
				<small><?php the_time(); ?></small>
			<footer>
		</article>
		
		<?php

		the_content();
		
		/**
		 * Only show end section if last post
		 */
		if ( $i != sizeof( $posts ) )
		{
	     	echo '<p>&sect;</p>';

		}
		else
		{
			echo "\n</section>\n";
		}
		
	/**
	 * End the loop
	 */
	endwhile;
?>

<?php next_posts_link( '< Older posts' ); ?><br><?php previous_posts_link( 'Newer posts >' ); ?>

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
