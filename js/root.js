/**
 *                                             _             _
 *     ___ ___  _ __ ___ _ __   ___  _ __ ___ (_)_ __   __ _| |
 *    / __/ _ \| '__/ _ \ '_ \ / _ \| '_ ` _ \| | '_ \ / _` | |
 *   | (_| (_) | | |  __/ | | | (_) | | | | | | | | | | (_| | |
 *    \___\___/|_|  \___|_| |_|\___/|_| |_| |_|_|_| |_|\__,_|_|
 *
 *   Webmaster: Philip Newborough
 *   Contact: corenominal [at] corenominal.org
 *   Twitter: @corenominal
 *   From: Lincoln, United Kingdom
 */

/**
 * For Search UX, sets character position in given element
 */
$.fn.selectRange = function(start, end) {
    if(typeof end === 'undefined') {
        end = start;
    }
    return this.each(function() {
        if('selectionStart' in this) {
            this.selectionStart = start;
            this.selectionEnd = end;
        } else if(this.setSelectionRange) {
            this.setSelectionRange(start, end);
        } else if(this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};

jQuery( document ).ready( function( $ ){

	/**
	 * For debugging responsive design
	 */
	// $( window ).resize(function() {
	// 	var len = $( window ).innerWidth();
	// 	console.clear();
	// 	console.log( len );
	// });

	/**
	 * Hamburger... mmm...
	 */
	$('.main-menu').prepend('<a class="burger" href="#"><i class="fa fa-bars"></i></a>');

	$( '.burger' ).on( 'click', function(e)
	{
		$( '.menu-collapse' ).slideToggle();
	} );

	// Fugly responsive fix
	$( window ).resize(function() {
		var width = $( window ).width();
		if( width > 940 )
		{
			$( '.menu-collapse' ).show();
		}
	});

	/**
	 * FitVids
	 */
	$( '.post' ).fitVids();

	/**
	 * Add a nice icon to "Post Comment" button.
	 * Note: there is probably an easier way to do this.
	 */
	$( '.form-submit #submit' ).remove();
	var str = '<button class="comment-submit" id="submit" name="submit">';
	str += '<i class="fa fa-share"></i> Post Comment';
	str += '</button>';
	$( '.form-submit' ).append( str );

	/**
	 * Do the tile! Go tiles! :)
	 */
	var tile = $( '#masthead' ).attr( 'data-tile' );
	$( '.tiled' ).css( 'background-image', 'url("' + tile + '")' );

	/**
	 * Search UX
	 */
	
	var s = $( '#search-masthead-query' ).val().trim();
	if( s != '' )
	{
		var sl = s.length;
		$( '#search-masthead-query' ).focus();
		$( '#search-masthead-query' ).selectRange(sl);
	}

	$( '.search-masthead .fa-search' ).on( 'click',function()
	{
		var s = $( '#search-masthead-query' ).val().trim();
		if( s != '' )
		{
			$( '.search-masthead' ).submit();
		}
		else
		{
			$( '#search-masthead-query' ).val('');
			$( '#search-masthead-query' ).focus();
		}
	});

	$( '.search-masthead' ).on( 'submit',function(e)
	{
		var s = $( '#search-masthead-query' ).val().trim();
		if( s === '' )
		{
			$( '#search-masthead-query' ).val('');
			$( '#search-masthead-query' ).focus();
			e.preventDefault();
		}
	});

	/**
	 * Scrolly stuff
	 */
	//width = width = $( window ).innerWidth();
	var waypoint = new Waypoint({
		element: $( '#content-menu' ),
		handler: function(direction)
		{
			if ( direction == 'down' && $( window ).innerWidth() > 940 )
			{
				console.log( 'I am 20px from the top of the window' );
				console.log( direction );
				$( '#masthead' ).addClass('masthead-fixed');
	 			$( '#masthead' ).removeClass('masthead');
	 			$( '#content-menu' ).addClass('content-menu-fixed');
	 			$( '#content-menu' ).removeClass('content-menu');
			}
			else if( direction == 'up' && $( window ).innerWidth() > 940 )
			{
				console.log( 'Going up!' );
				$( '#masthead' ).removeClass('masthead-fixed');
	 			$( '#masthead' ).addClass('masthead');
	 			$( '#content-menu' ).removeClass('content-menu-fixed');
	 			$( '#content-menu' ).addClass('content-menu');
			}
		},
		offset: 65 
	});


	// $( document ).scroll( function()
	// {
 //    	var top = $( document ).scrollTop();
 //    	var width = $( window ).innerWidth();
	// 	if( width > 940 && top > 200 )
	// 	{
	// 		$( '#masthead' ).addClass('masthead-fixed');
	// 		$( '#masthead' ).removeClass('masthead');
	// 		$( '.content-menu' ).addClass('content-menu-fixed');
	// 		$( '.bio' ).addClass('bio-fixed');
	// 		$( '.the-content' ).addClass('the-content-fixed');
	// 		$( '.sidebar' ).addClass('sidebar-fixed');
	// 	}
	// 	else
	// 	{
	// 		$( '#masthead' ).removeClass('masthead-fixed');
	// 		$( '#masthead' ).addClass('masthead');
	// 		$( '.content-menu' ).removeClass('content-menu-fixed');
	// 		$( '.bio' ).removeClass('bio-fixed');
	// 		$( '.the-content' ).removeClass('the-content-fixed');
	// 		$( '.sidebar' ).removeClass('sidebar-fixed');
	// 	}
	// } );

	/**
	 * Social stuff
	 */
	function shareTwitter(url, text)
	{
		open('http://twitter.com/share?url=' + url + '&text=' + text, 'tshare', 'height=400,width=550,resizable=1,toolbar=0,menubar=0,status=0,location=0');  
	}

	function shareFacebook(url, text, image)
	{
		open('http://facebook.com/sharer.php?s=100&p[url]=' + url + '&p[images][0]=' + image + '&p[title]=' + text, 'fbshare', 'height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
	}

});
