<?php
/**
 * The magic WordPress functions.php file. Whoa, functions!
 * ========================================================
 */

/**
 * Theme setup on activation
 */
require get_template_directory() . '/functions/theme-activation.php';

/**
 * Register navigation menus.
 */
require get_template_directory() . '/functions/menus.php';

/**
 * Include random stuff that does not fit elsewhere.
 */
require get_template_directory() . '/functions/misc.php';

/**
 * Include custom shortcodes.
 */
require get_template_directory() . '/functions/shortcodes.php';

/**
 * Theme admin stuff.
 */
require get_template_directory() . '/functions/admin.php';

/**
 * Widgets FTW!
 */
require get_template_directory() . '/functions/widgets.php';
