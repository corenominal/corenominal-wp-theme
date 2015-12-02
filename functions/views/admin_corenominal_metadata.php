<?php
/**
 * The default theme admin page
 */

/**
 * Register custom settings
 */ 
function corenominal_metadata_settings()
{
	/**
	 * Register the settings fields
	 */
	register_setting(
		'corenominal_metadata_group', // option group
		'corenominal_enable_twitter_cards' // option name
		);

	register_setting(
		'corenominal_metadata_group', // option group
		'corenominal_enable_open_graph' // option name
		);

	register_setting(
		'corenominal_metadata_group', // option group
		'corenominal_default_open_graph_img' // option name
		);
	
	/**
	 * Create the settings section for this group of settings
	 */
	add_settings_section(
		'corenominal-metadata', // id
		'Metadata Theme Options', // title
		'corenominal_metadata', // callback
		'corenominal_metadata' // page
		);
	
	/**
	 * Add the settings fields
	 */
	add_settings_field(
		'corenominal-enable-twitter-cards', // id
		'Enable Twitter Cards', // title/label
		'corenominal_enable_twitter_cards', // callback
		'corenominal_metadata', // page
		'corenominal-metadata' // settings section 
		);

	add_settings_field(
		'corenominal-enable-open-graph', // id
		'Enable Open Graph', // title/label
		'corenominal_enable_open_graph', // callback
		'corenominal_metadata', // page
		'corenominal-metadata' // settings section 
		);

	add_settings_field(
		'corenominal-default-open-graph-img', // id
		'Default Open Graph Image', // title/label
		'corenominal_default_open_graph_img', // callback
		'corenominal_metadata', // page
		'corenominal-metadata' // settings section 
		);

}

/**
 * The callbacks
 */
function corenominal_metadata()
{
	return;
}

function corenominal_enable_twitter_cards()
{
    $id = 'corenominal_enable_twitter_cards';
	$options = array('true','false');
	$default = 'false';
	$description = 'Insert Twitter Cards metadata into <code>&lt;HEAD&gt;</code> element.';
	echo corenominal_options_select( $id, $options, $default, $description);
}

function corenominal_enable_open_graph()
{
    $id = 'corenominal_enable_open_graph';
	$options = array('true','false');
	$default = 'false';
	$description = 'Insert Open Graph metadata into <code>&lt;HEAD&gt;</code> element.';
	echo corenominal_options_select( $id, $options, $default, $description);
}

function corenominal_default_open_graph_img()
{
	$setting = esc_attr( get_option( 'corenominal_default_open_graph_img' ) );
	echo '<button id="upload-img" class="button button-secondary upload-img">Choose Image</button>';
	echo '<input id="img-url" type="text" class="regular-text" name="corenominal_default_open_graph_img" value="'.$setting.'" placeholder="Image URL ...">';
	echo '<p class="description">Your default Open Graph image. Minimum <a target="_blank" href="https://developers.facebook.com/docs/sharing/best-practices">recommended</a> size is 1200px x 630px.</p>';
	echo '<div id="img-preview" class="img-preview" data-default="' . get_template_directory_uri() . '/img/open-graph-default.png"></div>';
}

/**
 * Enqueue additional JavaScript and CSS
 */
function corenominal_metadata_enqueue_scripts( $hook )
{
	if( 'corenominal_page_corenominal_metadata' != $hook )
	{
		return;
	}
	wp_register_style( 'corenominal_metadata_css', get_template_directory_uri() . '/functions/views/css/corenominal_metadata.css', array(), '0.0.1', 'all' );
	wp_enqueue_style( 'corenominal_metadata_css' );

	wp_register_script( 'corenominal_metadata_js', get_template_directory_uri() . '/functions/views/js/corenominal_metadata.js', array('jquery'), '0.0.1', true );
	wp_enqueue_script( 'corenominal_metadata_js' );

	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'corenominal_metadata_enqueue_scripts' );

/**
 * Output the page
 */
function corenominal_metadata_callback()
{
	?>
	<div class="wrap">

		<h1>corenominal Theme &mdash; Metadata Options</h1>

		<p>Enable/disable support for various metadata tags.</p>
		<p><strong>Note:</strong> these features are disabled by default, so as not to conflict with any existing metadata plugins you may have installed.</p>

		<hr>

		<?php settings_errors(); ?>
		<form method="POST" action="options.php">
			
			<?php settings_fields( 'corenominal_metadata_group' ); ?>
			<?php do_settings_sections( 'corenominal_metadata' ); ?>
			<?php submit_button(); ?>

		</form>

	</div>
	<?php
}
?>

