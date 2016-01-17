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
 * A StripyWipy Header
 */
function doTheStripyWipy()
{
	// Cross-browser support for requestAnimationFrame
	var requestAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || window.mozRequestAnimationFrame;
	// Setup the canvas
	var stripywipy = document.getElementById( 'stripywipy' );
	var w = stripywipy.offsetWidth;
	var h = stripywipy.offsetHeight;
	stripywipy.innerHTML = '<canvas id="stripywipycanvas" width="'+w+'" height="'+h+'"></canvas>';
	var canvas = document.getElementById( 'stripywipycanvas' );
	var c = canvas.getContext('2d');
	// Initial fill
	c.fillStyle = 'rgba( 255, 255, 255, 1 )';
	c.fillRect(0,0,w,h);
	// Vars
	var x = 0;
	var y = 0;
	var stripes = [];
	var completed = 0;

	function setupStripes()
	{
		// While x is less than the width of the canvas, add an item to the stripes array
		while ( x < w )
		{
			var stripe_w = Math.floor((Math.random() * 4) + 1);
			var stripe_v = Math.floor((Math.random() * 6) + 3);
			x += Math.floor((Math.random() * 8) + 1);
			stripes[stripes.length] = { 'w': stripe_w , 'x': x, 'y': 0, 'v': stripe_v };
		}
	}

	function updateStripes()
	{
		for ( i = 0; i < stripes.length; i++ )
		{
			if( stripes[ i ].y < h )
			{
				stripes[ i ].y += stripes[ i ].v;
			}
			else
			{
				completed++;
			}
		}
	}

	function drawStripes()
	{
		
		for ( i = 0; i < stripes.length; i++ )
		{
			c.strokeStyle = 'rgba( 17, 17, 17, 1 )';
			c.lineWidth = stripes[i].w;
			c.beginPath();
			c.moveTo(stripes[i].x, 0);
			c.lineTo(stripes[i].x, stripes[i].y);
			c.stroke();
		}
		if( completed < stripes.length )
		{
			return;
		}
	}

	function main()
	{
		updateStripes();
		drawStripes();
		requestAnimationFrame(main);
	}

	setupStripes();
	main();

}

/**
 * Foo logo
 */
function foologo()
{
	var wrapper = document.getElementById('foo-logo-wrapper');
	wrapper.innerHTML += '<canvas id="foo-logo" width="200" height="200"></canvas>';
	var canvas = document.getElementById('foo-logo');
	var c = canvas.getContext('2d');
	var interval = 1;

	c.fillStyle = 'rgba(255, 255, 255, 1)';
	c.fillRect(0,0,200,200);

	var render = function()
	{
		
		c.fillStyle = 'rgba(255, 255, 255, 1)';
		c.fillRect(0,0,200,200);
		for(y = 20; y <= 160; y = y + 20)
		{
			for(x = 20; x <= 160; x = x + 20)
			{
				r = Math.floor((Math.random() * 3) + 1);
				switch(r)
				{
					case 1:
						c.fillStyle = 'rgba(17, 17, 17, 1)';
						break;
					case 2:
						c.fillStyle = 'rgba(255, 255, 255, 1)';
						break;
					default:
						c.fillStyle = 'rgba(255, 255, 255, 1)';
						break;
				}
				c.fillRect(x,y,20,20);
			}
		}
	}

	var main = function()
	{
		render();
		
		if(interval < 50)
		{
			interval = interval + 1;
		}
		else if(interval < 100)
		{
			interval = interval + 10;
		}
		else if(interval < 150)
		{
			interval = interval + 20;
		}
		else
		{
			interval = interval + 100;
		}

		if(interval < 400)
		{
			setTimeout(function()
			{
				main();
			}, interval);
		}
	}

	main();
}

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

	/**
	 * Call the StripyWipy Header
	 */
	doTheStripyWipy();

	var rtime;
	var timeout = false;
	var delta = 200;
	$(window).resize(function()
	{
	    rtime = new Date();
	    if (timeout === false)
	    {
	        timeout = true;
	        setTimeout(resizeend, delta);
	    }
	});

	function resizeend() {
	    if (new Date() - rtime < delta)
	    {
	        setTimeout(resizeend, delta);
	    }
	    else
	    {
	        timeout = false;
	        doTheStripyWipy();
	    }               
	}

	/**
	 * Call the foologo function
	 */
	foologo();
});
