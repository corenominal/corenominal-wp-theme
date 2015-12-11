<?php
/**
 * Register custom settings
 */ 
function corenominal_design_settings()
{
	/**
	 * Register the settings fields
	 */
	register_setting(
		'corenominal_design_group', // option group 
		'corenominal_design_img' // options name
		);
	
	/**
	 * Create the settings section for this group of settings
	 */
	add_settings_section(
		'corenominal-design', // id
		'', // title
		'corenominal_design', // callback
		'corenominal_design' // page
		);
	
	/**
	 * Add the settings fields
	 */
	add_settings_field(
		'corenominal-design-img', // id
		'Tile Image', // title/label
		'corenominal_design_img', // callback
		'corenominal_design', // page
		'corenominal-design' // settings section 
		);
}

/**
 * The callbacks
 */
function corenominal_design()
{
	return;
}

function corenominal_design_img()
{
    $setting = esc_attr( get_option( 'corenominal_design_img', '' ) );
    if($setting == '')
    {
    	$setting = get_template_directory_uri() . '/img/default-tile.png';
    }
    echo '<div id="img-preview" class="img-preview" data-default="' . get_template_directory_uri() . '/img/default-design-image.png"><img src="' . $setting . '"/></div>';
	echo '<button id="upload-img" class="button button-secondary upload-img">Choose Image</button>';
	echo '<input id="img-url" type="text" class="regular-text" name="corenominal_design_img" value="'.$setting.'" placeholder="URL of image ...">';
	echo '<p class="description">Your tile image. Repeat repeat repeat.</p>';
}

/**
 * Enqueue additional JavaScript and CSS
 */
function corenominal_design_enqueue_scripts( $hook )
{
	if( 'corenominal_page_corenominal_design' != $hook )
	{
		return;
	}
	wp_register_style( 'corenominal_design_css', get_template_directory_uri() . '/functions/views/css/corenominal_design.css', array(), '0.0.1', 'all' );
	wp_enqueue_style( 'corenominal_design_css' );

	wp_register_script( 'corenominal_design_js', get_template_directory_uri() . '/functions/views/js/corenominal_design.js', array('jquery'), '0.0.1', true );
	wp_enqueue_script( 'corenominal_design_js' );

	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'corenominal_design_enqueue_scripts' );

/**
 * Social accounts
 */
function corenominal_design_callback()
{
	?>
	<div class="wrap">

		<h1>corenominal Theme &mdash; Design</h1>

		<p>There is only one design option, the tile image.</p>
		<p>The tile image is used throughout the theme to produce a unique repeating pattern, which just happens to be simple, but super-stylish!</p>

		<hr>

		<?php settings_errors(); ?>
		<form method="POST" action="options.php">
			
			<?php settings_fields( 'corenominal_design_group' ); ?>
			<?php do_settings_sections( 'corenominal_design' ); ?>
			<?php submit_button(); ?>

		</form>

	</div>
	<?php
}
?>