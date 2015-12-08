<?php
/**
 * Register custom settings
 */ 
function corenominal_bio_settings()
{
	/**
	 * Register the settings fields
	 */
	register_setting(
		'corenominal_bio_group', // option group 
		'corenominal_bio_img' // options name
		);

	register_setting(
		'corenominal_bio_group', // option group 
		'corenominal_bio_displayname' // options name
		);

	register_setting(
		'corenominal_bio_group', // option group 
		'corenominal_bio_description' // options name
		);

	register_setting(
		'corenominal_bio_group', // option group 
		'corenominal_bio_location' // options name
		);
	
	/**
	 * Create the settings section for this group of settings
	 */
	add_settings_section(
		'corenominal-bio', // id
		'Bio Options', // title
		'corenominal_bio', // callback
		'corenominal_bio' // page
		);
	
	/**
	 * Add the settings fields
	 */
	add_settings_field(
		'corenominal-bio-img', // id
		'Bio Image', // title/label
		'corenominal_bio_img', // callback
		'corenominal_bio', // page
		'corenominal-bio' // settings section 
		);

	add_settings_field(
		'corenominal-bio-displayname', // id
		'Display Name', // title/label
		'corenominal_bio_displayname', // callback
		'corenominal_bio', // page
		'corenominal-bio' // settings section 
		);

	add_settings_field(
		'corenominal-bio-description', // id
		'Description', // title/label
		'corenominal_bio_description', // callback
		'corenominal_bio', // page
		'corenominal-bio' // settings section 
		);

	add_settings_field(
		'corenominal-bio-location', // id
		'Location', // title/label
		'corenominal_bio_location', // callback
		'corenominal_bio', // page
		'corenominal-bio' // settings section 
		);
}

/**
 * The callbacks
 */
function corenominal_bio()
{
	return;
}

function corenominal_bio_img()
{
    $setting = esc_attr( get_option( 'corenominal_bio_img', '' ) );
    if($setting == '')
    {
    	$setting = get_template_directory_uri() . '/img/default-bio-image.png';
    }
    echo '<div id="img-preview" class="img-preview" data-default="' . get_template_directory_uri() . '/img/default-bio-image.png"><img src="' . $setting . '"/></div>';
	echo '<button id="upload-img" class="button button-secondary upload-img">Choose Image</button>';
	echo '<input id="img-url" type="text" class="regular-text" name="corenominal_bio_img" value="'.$setting.'" placeholder="URL of image ...">';
	echo '<p class="description">Your bio image. An image of 180px x 180px works best.</p>';
}

function corenominal_bio_displayname()
{
    $setting = esc_attr( get_option( 'corenominal_bio_displayname' ) );
	echo '<input type="text" class="regular-text" name="corenominal_bio_displayname" value="'.$setting.'" placeholder="Joe Bloggs ...">';
	echo '<p class="description">The name you would like displayed.</p>';
}

function corenominal_bio_description()
{
    $setting = esc_attr( get_option( 'corenominal_bio_description' ) );
	echo '<input type="text" class="regular-text" name="corenominal_bio_description" value="'.$setting.'" placeholder="Just another WordPress user, nothing to say here, please move along.">';
	echo '<p class="description">A short description of yourself.</p>';
}

function corenominal_bio_location()
{
    $setting = esc_attr( get_option( 'corenominal_bio_location' ) );
	echo '<input type="text" class="regular-text" name="corenominal_bio_location" value="'.$setting.'" placeholder="Your location on planet earth ...">';
	echo '<p class="description">Your location on planet earth.</p>';
}

/**
 * Enqueue additional JavaScript and CSS
 */
function corenominal_bio_enqueue_scripts( $hook )
{
	if( 'corenominal_page_corenominal_bio' != $hook )
	{
		return;
	}
	wp_register_style( 'corenominal_bio_css', get_template_directory_uri() . '/functions/views/css/corenominal_bio.css', array(), '0.0.1', 'all' );
	wp_enqueue_style( 'corenominal_bio_css' );

	wp_register_script( 'corenominal_bio_js', get_template_directory_uri() . '/functions/views/js/corenominal_bio.js', array('jquery'), '0.0.1', true );
	wp_enqueue_script( 'corenominal_bio_js' );

	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'corenominal_bio_enqueue_scripts' );

/**
 * Social accounts
 */
function corenominal_bio_callback()
{
	?>
	<div class="wrap">

		<h1>corenominal Theme &mdash; Bio</h1>

		<p>These options are used to populate the "bio" area of your theme. Adjust to suit.</p>

		<hr>

		<?php settings_errors(); ?>
		<form method="POST" action="options.php">
			
			<?php settings_fields( 'corenominal_bio_group' ); ?>
			<?php do_settings_sections( 'corenominal_bio' ); ?>
			<?php submit_button(); ?>

		</form>

	</div>
	<?php
}
?>