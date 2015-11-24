<?php
/**
 * Remove emoji support from head. I don't have anything against
 * smiley people, but emoji, eww!
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 