jQuery(document).ready(function() {
	"use strict";

	var win = jQuery(window);
	var doc = jQuery(document);

	// Load Foundation
	doc.foundation();

	// Navigation Submenu Icons
	jQuery('.top-bar-section .has-dropdown').append('<i class="fa fa-angle-right"></i>')

	// Fullscreener
	jQuery('.fullscreener img').fullscreener();

	// Home Slider
	jQuery('.slider-home .slide').each(function() {
		var slideHeight = jQuery(this).find('.slide-image img').attr('height');
		jQuery(this).height(slideHeight);
		jQuery(this).find('.slide-body .columns').height(slideHeight);
	});
	jQuery('.slider-home').flexslider({
		animation: 'slide',
		prevText: '<i class="fa fa-angle-left"></i>',
		nextText: '<i class="fa fa-angle-right"></i>',
		pauseOnAction: true,
		pauseOnHover: true,
		//smoothHeight: true,
		controlNav: false,
		start: function(slider) {
			jQuery('.slider-home').removeClass('loading');
		}
	});

	// Wow
	new WOW().init();

	// Post Sliders
	jQuery('.post-slider').flexslider({
		animation: 'slide',
		smoothHeight: true,
		nextText: '<span class="button tiny grey"><i class="fa fa-angle-right"></i></span>',
		prevText: '<span class="button tiny grey"><i class="fa fa-angle-left"></i></span>',
		start: function(slider) {
			jQuery('.post-slider').removeClass('loading');
		}
	});

	// FitVids
	jQuery('.post-video').fitVids();
	
});