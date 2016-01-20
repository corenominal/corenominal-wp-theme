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

jQuery( document ).ready( function( $ ){

	console.log( 'WAR, huh, what is it good for?' );

	// Test payload
	var payload = {
		'security': $( '#security' ).val(),
		'method' : 'war',
		'action' : 'insert',
		'circles_to_battle' : 777,
		'squares_to_battle' : 777,
		'losers' : 'squares',
		'winners' : 'circles',
		'circles_casualties' : 333,
		'squares_casualties' : 666
		};
		console.log(payload);
		//var endpoint = $('.war').attr('data-endpoint');
		var endpoint = 'https://corenominal.org/api/'
		$.ajax({
		url: endpoint,
		method: "POST",
		data: payload,
		dataType: "json",
		success:function(data)
		{
		  console.log(data);
		}
	});

});
