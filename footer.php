<?php
/**
 * The default footer template for displaying the, erm, footer.
 *
 * Displays closing elements and javascript includes.
 */

wp_footer();

?>
	<footer class="footer-main">
		<?php
		$copyright_holder = get_option( 'corenominal_copyright_holder', '' );
		if($copyright_holder == '')
		{
			$copyright_holder = get_bloginfo( 'name' );
		}
		?>
		<p>&copy; <?php echo date('Y') . ' ' . $copyright_holder ?>.</p>
		<?php if( get_option( 'corenominal_show_powered', 'true' ) == 'true' ): ?>
		<p>Proudly powered by <a href="http://wordpress.org/">WordPress</a>.</p>
		<?php endif; ?>
	</footer>
</div> <!-- content-wrapper -->
</div> <!-- page-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/jquery.fitvids.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/root.js"></script>
<?php if ( is_post_type_archive( 'doodle' ) || is_singular( 'doodle' ) || is_tax( 'doodle_tag' ) || is_tax( 'doodle_medium' )): ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/jquery.magnific-popup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/doodles.js"></script>
<?php endif; ?>
</body>
</html>