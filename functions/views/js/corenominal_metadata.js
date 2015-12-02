jQuery(document).ready(function($){

	/**
	 * Preview default open graph image
	 */
	function img_preview()
	{
		var img = $('#img-url').val();
		if( img == '' )
		{
			img = $('#img-preview').attr( 'data-default' );
		}
		$('#img-preview').html( '<img src="' + img + '">' );
	}
	img_preview();

	/**
	 * Upload/Choose default open graph image
	 */
	var mediaUploader;
	$('#upload-img').on('click',function(e)
	{
		
		e.preventDefault();

		if ( mediaUploader )
		{
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media(
		{
			title: 'Choose an image...',
			button: { text: 'Choose image' },
			multiple: false
		});

		mediaUploader.on('select',function()
		{
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#img-url').val(attachment.url);
			img_preview();
		});

		mediaUploader.open();
	
	});

});