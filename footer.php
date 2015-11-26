<?php
/**
 * The default footer template for displaying the, erm, footer.
 *
 * Displays closing elements and javascript includes.
 */

wp_footer();

?>
	<footer>
		&mdash;&mdash;
		<p><small>&copy; <?php echo date('Y'); ?> Philip Newborough. Proudly powered by <a href="http://wordpress.org/">WordPress</a>.</small></p>
	</footer>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/root.js"></script>
	</body>
</html>