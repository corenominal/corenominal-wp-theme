<?php
/**
 * Meta to be pulled in by all header templates.
 *
 * Displays all of the head element and opening body element.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<?php if( is_home() ): ?>
<title><?php bloginfo('name')?> | <?php bloginfo('description'); ?></title>
<?php else: ?>
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="alternate" type="application/rss+xml" title="RSS Feed | <?php bloginfo('name'); ?>" href="<?php bloginfo( 'rss2_url' ); ?>">
<?php if ( is_user_logged_in() ): ?>
<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome-4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/root.css">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body>
