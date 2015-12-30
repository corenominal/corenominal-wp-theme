/**
 * Doodletastic.
 * JavaScript for the doodle archives and single post templates
 */
jQuery( document ).ready( function( $ )
{

	// Give doodles a lightbox class
	$('.doodle a img').each(function()
	{
		$( this ).parent('a:not(.notmagnific)').addClass( 'magnificPopup' );
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

	// Pattern Preview
	$(document).on('click','.doodle-tile-link',function()
	{
		var tile = $(this).attr('data-tile');
		var overlay = '<div class="doodle-overlay">' +
					  'foo' +
					  '</div>';
		$('body').append(overlay);
		$( '.doodle-overlay' ).css( 'background-image', 'url("' + tile + '")' );
		$('.doodle-overlay').fadeIn();
		$('body').addClass('stop-scrolling');
	});

	$(document).on('click','.doodle-overlay',function()
	{
		$(this).fadeOut('slow', function()
    	{
    		$(this).remove();
    		$('body').removeClass('stop-scrolling');
    	});
	});

	$('body').keypress(function(e)
	{
	    key = e.keyCode || e.which;
	    if( key == 27 && $('.doodle-overlay').length )
	    {
	        $('.doodle-overlay').fadeOut('slow', function()
        	{
        		$(this).remove();
        		$('body').removeClass('stop-scrolling');
        	});
	    }
	});

});