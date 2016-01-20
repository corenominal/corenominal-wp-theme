<?php
/**
 * A custom single use page template for War.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="apple-touch-icon" href="<?php echo site_url(); ?>/apple-touch-icon.png">
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="alternate" type="application/rss+xml" title="RSS Feed | <?php bloginfo('name'); ?>" href="<?php bloginfo( 'rss2_url' ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome-4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/war.css">
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
<?php wp_head(); ?>
</head>
<body>
<!--
War. Seriously, what is it good for?
====================================
No, but seriously, for a normal dude like me, there is not much
that I can do to prevent or stop wars from happening; it's sad
and frustrating. That said, there is something I can do. I can
support War Child, a small charity that protects children living
in the world's most dangerous war zones.

                                   ~~~~~~~~~~~~~~~~~~~~~~~~~~~
                                   +++++++++++++++++++++++++++
                                   @@@@@@@@@@@@@@@@@@@@@@@@@@@
Please support War Child too, see: https://www.warchild.org.uk
                                   @@@@@@@@@@@@@@@@@@@@@@@@@@@
                                   +++++++++++++++++++++++++++
                                   ~~~~~~~~~~~~~~~~~~~~~~~~~~~
-->

<input id="security" type="hidden" value="<?php echo wp_create_nonce( "war--what-is-it-good-for" );?>">

<?php wp_footer() ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/war.js"></script>
</body>
</html>