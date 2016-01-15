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
	 * Prevent Link titles from wrapper on the external link icon alone
	 */
	$('.post h1 a, .post h2 a').html(function(){	
	    var icon = '<i class="fa fa-external-link"></i>';
	    if( $( this ).html().indexOf( icon ) > -1 )
	    {	    
	      var text = $( this ).html().replace( icon, '' );
	      text = text.trim().split(' ');
	      var last = text.pop();
	      return text.join(" ") + (text.length > 0 ? ' <span class="nowrap">' + last + ' ' + icon + '</span>' : last);
	    }
	});

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
	//var tile = $( '#tiled-top' ).attr( 'data-tile' );
	//$( '.tiled' ).css( 'background-image', 'url("' + tile + '")' );

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
	 * Social stuff
	 */
	$( '.post' ).each(function( i )
	{
		// Skip single pages
		if( $( this).hasClass( 'page' ) )
		{
			return;
		}
		var url = $( this ).find('.u-url' ).attr( 'href' );
		var text = $( this ).find('h1' ).text().trim();
		if( text == '' )
		{
			var text = $( this ).find('h2' ).text().trim();
		}
		var image = $( 'meta[property="og:image"]' ).attr("content");

		var btn_share = '<div class="btn-share">' +
						'<i id="fa-share-alt-' + i + '" data-text="' + text + '" data-url="' + url + '" data-image="' + image + '" data-id="' + i + '" class="fa fa-share-alt fa-fw"></i><br>' +
						'<div id="btn-social-group-' + i + '" class="btn-social-group">' +
						'<i data-id="' + i + '" class="fa fa-twitter fa-fw shareon-twitter"></i><br>' +
						'<i data-id="' + i + '" class="fa fa-facebook fa-fw shareon-facebook"></i>' +
						'</div>' +
						'</div>';
		$( this ).append( btn_share );
	});

	$( document ).on( 'click', '.fa-share-alt', function()
	{
		var id = $( this ).attr( 'data-id' );
		$( '#btn-social-group-' + id ).slideToggle( 'fast' );
	});

	$( document ).on( 'click', '.shareon-twitter', function()
	{
		var id = $( this ).attr( 'data-id' );
		var text = $( '#fa-share-alt-' + id ).attr( 'data-text' );
		var url = $( '#fa-share-alt-' + id ).attr( 'data-url' );
		shareTwitter( url, text );
		$( '#btn-social-group-' + id ).slideToggle( 'fast' );
	});

	$( document ).on( 'click', '.shareon-facebook', function()
	{
		var id = $( this ).attr( 'data-id' );
		var text = $( '#fa-share-alt-' + id ).attr( 'data-text' );
		var url = $( '#fa-share-alt-' + id ).attr( 'data-url' );
		var image = $( '#fa-share-alt-' + id ).attr( 'data-image' );
		shareFacebook( url, text, image );
		$( '#btn-social-group-' + id ).slideToggle( 'fast' );
	});

	function shareTwitter( url, text )
	{
		open('http://twitter.com/share?url=' + url + '&text=' + text, 'tshare', 'height=400,width=550,resizable=1,toolbar=0,menubar=0,status=0,location=0');  
	}

	function shareFacebook( url, text, image )
	{
		open('http://facebook.com/sharer.php?s=100&p[url]=' + url + '&p[images][0]=' + image + '&p[title]=' + text, 'fbshare', 'height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
	}

});
