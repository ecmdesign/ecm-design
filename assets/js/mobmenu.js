/**
 * mobile.js
 *
 * Sets up the site's mobile menu
 */
jQuery(window).ready(function($) {
	// first clone the main navigation (hidden in CSS)
	$('.main-menu').clone().appendTo('#mobile-menu');
	// add close button for menu
	$('#mobile-menu').append("<span class='mobile-close icon-cancel'></span>");
	// make 'menu-toggle' toggle menu open class
	$('.menu-toggle').click(function() {
		$("#mobile-menu").toggleClass('open');
	});
	// make 'mobile-close' toggle menu open class
	$('.mobile-close').click(function() {
		$("#mobile-menu").toggleClass('open');
	});
});
