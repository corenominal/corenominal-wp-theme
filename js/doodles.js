/**
 * Doodletastic.
 * JavaScript for the doodle archives and single post templates
 */
jQuery( document ).ready( function( $ )
{

	// Give doodles a lightbox class
	$('.doodle a img').each(function()
	{
		$( this ).parent('a').addClass( 'magnificPopup' );
	});
 

	// Do the lightbox
	$('.magnificPopup').magnificPopup(
	{
		type: 'image',
		mainClass: 'mfp-with-zoom',
		zoom: 
		{
			enabled: true,
			duration: 300,
			easing: 'ease-in-out',
			opener: function(openerElement)
			{
				return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		}

	});

});