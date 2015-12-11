<?php
/**
 * The default 404 template.
 */

/**
 * Pull in the header
 */
get_header();

?>
<div class="the-content">
	<div class="post">
		<h1>404 Not Found!</h1>
		<p>
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ohnoes.png" alt="Oh Noes!">
		</p>
	</div>
</div> <!-- the_content -->

<?php get_sidebar() ?>

<?php
/**
 * Pull in the footer
 */
get_footer();