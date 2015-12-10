<?php
/**
 * The magic WordPress functions.php file. Whoa, functions!
 * ========================================================
 */

/**
 * Register navigation menus.
 */
require get_template_directory() . '/functions/menus.php';

/**
 * Include random stuff that does not fit elsewhere.
 */
require get_template_directory() . '/functions/misc.php';

/**
 * Metadata function, twitter cards, open graph etc.
 */
require get_template_directory() . '/functions/metadata.php';

/**
 * Theme admin stuff.
 */
require get_template_directory() . '/functions/admin.php';

/**
 * Widgets FTW!
 */
require get_template_directory() . '/functions/widgets.php';
