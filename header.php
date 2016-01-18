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
<?php
$tile = get_option( 'corenominal_design_img', '' );
if($tile == '')
{
	$tile = get_template_directory_uri() . '/img/default-tile.png';
}
?>

<h1 class="site-title"><a href="<?php bloginfo('url') ?>" title="<?php bloginfo('description') ?>"><?php bloginfo('name') ?></a></h1>
<p class="site-description"><strong><?php bloginfo('description'); ?></strong></p>

<div class="main-menu">
	<div class="container menu-collapse">
		<?php
		/**
		 * The header menu
		 */
		wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
		?>

		<form class="search-masthead" action="<?php echo site_url(); ?>" method="get">
			<input id="search-masthead-query" autocomplete="off" type="text" name="s" placeholder="Search ..." value="<?php the_search_query(); ?>">
			<i class="fa fa-search"></i>
		</form>

	</div>
</div>	

<div id="stripywipy" class="stripywipy"></div>

<nav id="content-menu" class="content-menu">
	<div class="container">
		<ul>
			<?php
				$count_posts = wp_count_posts( 'post' );
				$published_posts = $count_posts->publish;
				$count_posts = wp_count_posts( 'link' );
				$published_links = $count_posts->publish;
				$count_posts = wp_count_posts( 'snippet' );
				$published_snippets = $count_posts->publish;
				$count_posts = wp_count_posts( 'doodle' );
				$published_doodles = $count_posts->publish;

				$published_all = $published_posts + $published_links + $published_snippets + $published_doodles;
			?>
			<li><a <?php if( is_home() ) echo 'class="active"'; ?> href="<?php echo site_url(); ?>">All<br><span class="count"><?php echo $published_all ?></span></a></li>
			<li><a <?php if( is_page_template( 'blog.php' ) ) echo 'class="active"'; ?> href="<?php echo site_url( 'blog' ); ?>">Posts<br><span class="count"><?php echo $published_posts ?></span></a></li>
			<li><a <?php if( is_post_type_archive( 'link' ) ) echo 'class="active"'; ?> href="<?php echo site_url('link'); ?>">Links<br><span class="count"><?php echo $published_links ?></span></a></li>
			<li><a <?php if( is_post_type_archive( 'snippet' ) ) echo 'class="active"'; ?> href="<?php echo site_url('snippet'); ?>">Snippets<br><span class="count"><?php echo $published_snippets ?></span></a></li>
			<li><a <?php if( is_post_type_archive( 'doodle' ) ) echo 'class="active"'; ?> href="<?php echo site_url('doodle'); ?>">Doodles<br><span class="count"><?php echo $published_doodles ?></span></a></li>
		</ul>
	</div>
</nav>

<div class="container content-wrapper">

	<div class="bio-wrapper">
		<div class="bio <?php if( is_page( 'About' ) ) echo 'about' ?>">
			
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
			echo '<p class="location"><i class="fa fa-map-marker fa-fw"></i> ' . $location . '</p>';
			?>			

			<ul class="social-media-accounts">
				
				<?php
				$twitter = get_option( 'corenominal_twitter_username', '' );
				if( $twitter != '' ):
				?>
					<li><i class="fa fa-twitter fa-fw"></i> <a target="_blank" href="https://twitter.com/<?php echo $twitter; ?>">Follow me on Twitter</a></li>
				<?php endif; ?>
				
				<?php
				$github = get_option( 'corenominal_github_username', '' );
				if( $github != '' ):
				?>
					<li><i class="fa fa-github fa-fw"></i> <a target="_blank" href="https://github.com/<?php echo $github; ?>">Follow me on GitHub</a></li>
				<?php endif; ?>

				<?php
				$codepen = get_option( 'corenominal_codepen_username', '' );
				if( $codepen != '' ):
				?>
					<li><i class="fa fa-codepen fa-fw"></i> <a target="_blank" href="https://codepen.io/<?php echo $codepen; ?>">Follow me on CodePen</a></li>
				<?php endif; ?>

				<?php
				$facebook = get_option( 'corenominal_facebook_username', '' );
				if( $facebook != '' ):
				?>
					<li><i class="fa fa-facebook fa-fw"></i> <a target="_blank" href="https://facebook.com/<?php echo $facebook; ?>">Friend me on Facebook</a></li>
				<?php endif; ?>
				<?php if( is_user_logged_in() ): ?>
					<li><i class="fa fa-wordpress fa-fw"></i> <a target="_blank" href="<?php echo site_url('wp-admin'); ?>">WordPress Admin</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>