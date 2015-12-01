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
		<p>&copy; <?php echo date('Y'); ?> Philip Newborough.</p>
		<?php if( get_option( 'corenominal_show_powered', 'true' ) == 'true' ): ?>
		<p>Proudly powered by <a href="http://wordpress.org/">WordPress</a>.</p>
		<?php endif; ?>
	</footer>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/root.js"></script>
	</body>
</html>