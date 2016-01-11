<?php
/**
 * Theme activation/setup functions
 * Notes:
 *  - after_switch_theme is triggered on the request immediately following a theme switch.
 *  - switch_theme is triggered when the blog's theme is changed. Specifically, it fires after the theme has been switched but before the next request. Theme developers should use this hook to do things when their theme is deactivated. 
 */

function corenominal_set_theme_options()
{
	update_option( 'use_smilies', false );
}
add_action( 'after_switch_theme', 'corenominal_set_theme_options' );

/**
 * Set-up war demo database tables
 */
function corenominal_create_war_tables()
{
	global $wpdb;
	
	$query = $wpdb->query( 'SHOW TABLES LIKE "demo_war"' );
	if( !$query )
	{
		$sql = "CREATE TABLE `demo_war` (
				  `id` bigint(20) NOT NULL AUTO_INCREMENT,
				  `battles` bigint(20) DEFAULT '0',
				  `circles_won` bigint(20) DEFAULT '0',
				  `squares_won` bigint(20) DEFAULT '0',
				  `circles_lost` bigint(20) DEFAULT '0',
				  `squares_lost` bigint(20) DEFAULT '0',
				  `circles_casualties` bigint(20) DEFAULT '0',
				  `squares_casualties` bigint(20) DEFAULT '0',
				  `circles_to_battle` bigint(20) DEFAULT '0',
				  `squares_to_battle` bigint(20) DEFAULT '0',
				  `stalemates` bigint(20) DEFAULT '0',
				  `last_battle_date` int(11) DEFAULT '0',
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

		$query = $wpdb->query( $sql );

		$wpdb->insert('demo_war', 
					  array( 'battles' => 0 ), 
					  array( '%d' )
					 );
	}

	$query = $wpdb->query( 'SHOW TABLES LIKE "demo_war_log"' );
	if( !$query )
	{
		$sql = "CREATE TABLE `demo_war_log` (
				  `id` bigint(20) NOT NULL AUTO_INCREMENT,
				  `date` int(11) DEFAULT NULL,
				  `circles_to_battle` tinyint(20) DEFAULT '0',
				  `squares_to_battle` tinyint(20) DEFAULT '0',
				  `winners` varchar(10) DEFAULT NULL,
				  `losers` varchar(10) DEFAULT NULL,
				  `circles_casualties` tinytext,
				  `squares_casualties` tinyint(4) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

		$query = $wpdb->query( $sql );
	}
}
add_action( 'after_switch_theme', 'corenominal_create_war_tables' );
