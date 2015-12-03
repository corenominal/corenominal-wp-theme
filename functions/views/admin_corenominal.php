<?php
/**
 * The default theme admin page
 */

/**
 * Register custom settings
 */ 
function corenominal_general_settings()
{
	/**
	 * Register the settings fields
	 */
	register_setting(
		'corenominal_general_group', // option group
		'corenominal_show_cats' // option name
		);
	
	register_setting(
		'corenominal_general_group', // option group 
		'corenominal_show_tags' // options name
		);

	register_setting(
		'corenominal_general_group', // option group 
		'corenominal_copyright_holder' // options name
		);

	register_setting(
		'corenominal_general_group', // option group 
		'corenominal_show_powered' // options name
		);
	
	/**
	 * Create the settings section for this group of settings
	 */
	add_settings_section(
		'corenominal-general', // id
		'General Theme Options', // title
		'corenominal_general', // callback
		'corenominal' // page
		);
	
	/**
	 * Add the settings fields
	 */
	add_settings_field(
		'corenominal-show-cats', // id
		'Show categories', // title/label
		'corenominal_show_cats', // callback
		'corenominal', // page
		'corenominal-general' // settings section 
		);

	add_settings_field(
		'corenominal-show-tags', // id
		'Show tags', // title/label
		'corenominal_show_tags', // callback
		'corenominal', // page
		'corenominal-general' // settings section 
		);

	add_settings_field(
		'corenominal-copyright-holder', // id
		'Copyright Holder', // title/label
		'corenominal_copyright_holder', // callback
		'corenominal', // page
		'corenominal-general' // settings section 
		);

	add_settings_field(
		'corenominal-show-powered', // id
		'Powered by WordPress', // title/label
		'corenominal_show_powered', // callback
		'corenominal', // page
		'corenominal-general' // settings section 
		);
}

/**
 * The callbacks
 */
function corenominal_general()
{
	return;
}

function corenominal_show_cats()
{
    $id = 'corenominal_show_cats';
	$options = array('true','false');
	$default = 'false';
	$description = 'Show categories for posts, defaults to false.';
	echo corenominal_options_select( $id, $options, $default, $description);
}

function corenominal_show_tags()
{
	$id = 'corenominal_show_tags';
	$options = array('true','false');
	$default = 'true';
	$description = 'Show tags for posts, defaults to true.';
	echo corenominal_options_select( $id, $options, $default, $description);
}

function corenominal_copyright_holder()
{
	$setting = esc_attr( get_option( 'corenominal_copyright_holder' ) );
	echo '<input type="text" class="regular-text" name="corenominal_copyright_holder" value="'.$setting.'" placeholder="Joe Bloggs">';
	echo '<p class="description">As appears in the site\'s footer. E.g. &copy; ' . date('Y') . ' Joe Bloggs.</p>';
}

function corenominal_show_powered()
{
	$id = 'corenominal_show_powered';
	$options = array('true','false');
	$default = 'true';
	$description = 'Show the "Proudly powered by WordPress" link in footer. Defaults to true.';
	echo corenominal_options_select( $id, $options, $default, $description);
}

/**
 * Output the page
 */
function corenominal_admin_callback()
{
	?>
	<div class="wrap">

		<h1>corenominal Theme &mdash; General Options</h1>

		<p>Various options that effect how the theme works.</p>

		<hr>

		<?php settings_errors(); ?>
		<form method="POST" action="options.php">
			
			<?php settings_fields( 'corenominal_general_group' ); ?>
			<?php do_settings_sections( 'corenominal' ); ?>
			<?php submit_button(); ?>

		</form>

	</div>
	<?php
}
