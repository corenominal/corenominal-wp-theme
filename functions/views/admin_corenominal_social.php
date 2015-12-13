<?php
/**
 * Register custom settings
 */ 
function corenominal_social_settings()
{
	/**
	 * Register the settings fields
	 */
	register_setting(
		'corenominal_social_group', // option group
		'corenominal_twitter_username', // option name
		'corenominal_twitter_sanitize' // sanitize function
		);
	
	register_setting(
		'corenominal_social_group', // option group 
		'corenominal_github_username' // options name
		);

	register_setting(
		'corenominal_social_group', // option group 
		'corenominal_codepen_username' // options name
		);

	register_setting(
		'corenominal_social_group', // option group 
		'corenominal_facebook_username' // options name
		);
	
	/**
	 * Create the settings section for this group of settings
	 */
	add_settings_section(
		'corenominal-social', // id
		'Social Media Accounts', // title
		'corenominal_social', // callback
		'corenominal_social' // page
		);
	
	/**
	 * Add the settings fields
	 */
	add_settings_field(
		'corenominal-twitter-username', // id
		'Twitter Username', // title/label
		'corenominal_twitter_username', // callback
		'corenominal_social', // page
		'corenominal-social' // settings section 
		);

	add_settings_field(
		'corenominal-github-username', // id
		'GitHub Username', // title/label
		'corenominal_github_username', // callback
		'corenominal_social', // page
		'corenominal-social' // settings section 
		);

	add_settings_field(
		'corenominal-codepen-username', // id
		'CodePen Username', // title/label
		'corenominal_codepen_username', // callback
		'corenominal_social', // page
		'corenominal-social' // settings section 
		);

	add_settings_field(
		'corenominal-facebook-username', // id
		'Facebook Username', // title/label
		'corenominal_facebook_username', // callback
		'corenominal_social', // page
		'corenominal-social' // settings section 
		);
}

/**
 * The callbacks
 */
function corenominal_social()
{
	return;
}

function corenominal_twitter_username()
{
    $setting = esc_attr( get_option( 'corenominal_twitter_username' ) );
	echo '<input type="text" class="regular-text" name="corenominal_twitter_username" value="'.$setting.'" placeholder="handle">';
	echo '<p class="description">Your Twitter username without the @ symbol.</p>';
}

function corenominal_twitter_sanitize( $input )
{
	$output = ltrim( $input, '@' );
	return $output;
}

function corenominal_github_username()
{
    $setting = esc_attr( get_option( 'corenominal_github_username' ) );
	echo '<input type="text" class="regular-text" name="corenominal_github_username" value="'.$setting.'" placeholder="handle">';
	echo '<p class="description">Your GitHub username.</p>';
}

function corenominal_codepen_username()
{
    $setting = esc_attr( get_option( 'corenominal_codepen_username' ) );
	echo '<input type="text" class="regular-text" name="corenominal_codepen_username" value="'.$setting.'" placeholder="handle">';
	echo '<p class="description">Your CodePen username.</p>';
}

function corenominal_facebook_username()
{
    $setting = esc_attr( get_option( 'corenominal_facebook_username' ) );
	echo '<input type="text" class="regular-text" name="corenominal_facebook_username" value="'.$setting.'" placeholder="handle">';
	echo '<p class="description">Your Facebook username.</p>';
}

/**
 * Social accounts
 */
function corenominal_social_callback()
{
	?>
	<div class="wrap">

		<h1>corenominal Theme &mdash; Social Media Accounts</h1>

		<p>List your social media accounts. These accounts will be linked to in various parts of the theme.</p>

		<hr>

		<?php settings_errors(); ?>
		<form method="POST" action="options.php">
			
			<?php settings_fields( 'corenominal_social_group' ); ?>
			<?php do_settings_sections( 'corenominal_social' ); ?>
			<?php submit_button(); ?>

		</form>

	</div>
	<?php
}
?>