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

	// fugly
	$( window ).resize(function() {
		var width = $( window ).width();
		// if( width > 940 )
		// {
		// 	$( '.menu-collapse' ).show();
		// }
		// else
		// {
		// 	$( '.menu-collapse' ).hide();
		// }		
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
	var tile = $( '#tile' ).attr( 'data-tile' );
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
	$( document ).scroll( function()
	{
    	var top = $( document ).scrollTop();
    	var width = $( window ).innerWidth();
		if( width > 940 && top > 200 )
		{
			$( '.masthead' ).addClass('masthead-fixed');
			$( '.content-menu' ).addClass('content-menu-fixed');
			$( '.bio' ).addClass('bio-fixed');
			$( '.the-content' ).addClass('the-content-fixed');
			$( '.sidebar' ).addClass('sidebar-fixed');
		}
		else
		{
			$( '.masthead' ).removeClass('masthead-fixed');
			$( '.content-menu' ).removeClass('content-menu-fixed');
			$( '.bio' ).removeClass('bio-fixed');
			$( '.the-content' ).removeClass('the-content-fixed');
			$( '.sidebar' ).removeClass('sidebar-fixed');
		}
	} );

});
