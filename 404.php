<?php
/**
 * The default 404 template.
 */

/**
 * Pull in the header
 */
get_header();

?>

<h1>404 Not Found!</h1>

<p>It looks like nothing was found at this location. Try the <a href="<?php echo site_url(); ?>">homepage</a>.</p>

<?php
/**
 * Pull in the footer
 */
get_footer();