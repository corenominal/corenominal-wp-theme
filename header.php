<?php
/**
 * The default header template for displaying the, erm, header.
 */

/**
 * Include the meta.
 */
require get_template_directory() . '/inc/meta.php';
?>
<div class="page-wrapper">

<header class="masthead">
	
	<h1><a href="<?php bloginfo('url') ?>" title="<?php bloginfo('description') ?>"><?php bloginfo('name') ?></a></h1>
	
	<p><strong><?php bloginfo('description'); ?></strong></p>

	<nav class="main-menu">
		<div class="container">
			<?php
			/**
			 * The header menu
			 */
			wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
			?>
		</div>
	</nav>

</header>

<div class="container content-wrapper">

	<div class="bio-wrapper">
		<div class="bio">
			
			<?php
			$displayname = get_option( 'corenominal_bio_displayname', 'Joe Bloggs' );
			$bioimg = get_option( 'corenominal_bio_img', '' );
			if( $bioimg == '' ):
				$bioimg = get_template_directory_uri() . '/img/default-bio-image.png';
			endif;
			echo '<div class="bio-img"><img src="' . $bioimg . '" alt="' . $displayname . '"></div>';
			
			echo '<h2>' . $displayname . '</h2>';
			?>

			<?php
			$twitter = get_option( 'corenominal_twitter_username', '' );
			if( $twitter != '' ):
			?>
			<h3>@<a target="_blank" href="https://twitter.com/<?php echo $twitter; ?>"><?php echo $twitter; ?></a></h3>
			<?php endif; ?>
			
			<?php
			$description = get_option( 'corenominal_bio_description', '' );
			if( $description == '' ):
				$description = 'Just another WordPress user, nothing to say here, please move along.';
			endif;
			echo '<p>' . $description . '</p>';
			?>

			<?php
			$location = get_option( 'corenominal_bio_location', '' );
			if( $location == '' ):
				$location = 'Planet Earth';
			endif;
			echo '<p class="location"><i class="fa fa-map-marker"></i> ' . $location . '</p>';
			?>			

			<ul class="social-media-accounts">
				
				<?php
				$twitter = get_option( 'corenominal_twitter_username', '' );
				if( $twitter != '' ):
				?>
					<li><i class="fa fa-twitter"></i> <a target="_blank" href="https://twitter.com/<?php echo $twitter; ?>">Follow me on Twitter</a></li>
				<?php endif; ?>
				
				<?php
				$github = get_option( 'corenominal_github_username', '' );
				if( $github != '' ):
				?>
					<li><i class="fa fa-github"></i> <a target="_blank" href="https://github.com/<?php echo $github; ?>">Follow me on GitHub</a></li>
				<?php endif; ?>

				<?php
				$facebook = get_option( 'corenominal_facebook_username', '' );
				if( $facebook != '' ):
				?>
					<li><i class="fa fa-facebook"></i> <a target="_blank" href="https://facebook.com/<?php echo $facebook; ?>">Follow me on GitHub</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>