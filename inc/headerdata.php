<?php
/**
 * Headerdata
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*	Include CSS
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'wplook_css_include' ) ) {

	function wplook_css_include () {

		/*-----------------------------------------------------------
			Loads our main stylesheet.
		-----------------------------------------------------------*/
		wp_enqueue_style( 'morning-style', get_stylesheet_uri(), array(), '2015-0404' );
		wp_enqueue_style( 'morning-fonts', '//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic%7CRaleway:400,300,200,100,900,800,700,600,500', array('morning-style'), '2015-09-07', 'all' );

	}
	add_action( 'wp_enqueue_scripts', 'wplook_css_include' );
}

/*-----------------------------------------------------------------------------------*/
/*	Include Java Scripts
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'wplook_scripts_include' ) ) {

	function wplook_scripts_include() {

		/*-----------------------------------------------------------
			Include jQuery
		-----------------------------------------------------------*/

		wp_enqueue_script('jquery');


		/*-----------------------------------------------------------
			Vendors
		-----------------------------------------------------------*/

		/*-----------------------------------------------------------
			Fastclick
		-----------------------------------------------------------*/
		wp_enqueue_script( 'Fastclick', get_template_directory_uri().'/assets/javascripts/vendors/fastclick.js', '', '', 'footer' );

		/*-----------------------------------------------------------
			Placeholder
		-----------------------------------------------------------*/
		wp_enqueue_script( 'placeholder', get_template_directory_uri().'/assets/javascripts/vendors/jquery.placeholder.js', '', '', 'footer' );


		/*-----------------------------------------------------------
			Cookie
		-----------------------------------------------------------*/
		wp_enqueue_script( 'cookie', get_template_directory_uri().'/assets/javascripts/vendors/jquery.cookie.js', '', '', 'footer' );


		/*-----------------------------------------------------------
			Modernizr
		-----------------------------------------------------------*/
		wp_enqueue_script( 'modernizr', get_template_directory_uri().'/assets/javascripts/vendors/modernizr.js', '', '', 'footer' );


		/*-----------------------------------------------------------
			Foundation
		-----------------------------------------------------------*/
		wp_enqueue_script( 'foundation', get_template_directory_uri().'/assets/javascripts/vendors/foundation.min.js', '', '', 'footer' );


		/*-----------------------------------------------------------
			Fullscreen
		-----------------------------------------------------------*/
		wp_enqueue_script( 'Fullscreen', get_template_directory_uri().'/assets/javascripts/vendors/jquery.fullscreener.min.js', '', '', 'footer' );


		/*-----------------------------------------------------------
			flexslider
		-----------------------------------------------------------*/
		wp_enqueue_script( 'flexslider', get_template_directory_uri().'/assets/javascripts/vendors/jquery.flexslider-min.js', '', '', 'footer' );

		/*-----------------------------------------------------------
			fitvids
		-----------------------------------------------------------*/
		wp_enqueue_script( 'fitvids', get_template_directory_uri().'/assets/javascripts/vendors/jquery.fitvids.js', '', '', 'footer' );
		
		/*-----------------------------------------------------------
			wow
		-----------------------------------------------------------*/
		wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/javascripts/vendors/wow.min.js', '', '', 'footer' );


		/*-----------------------------------------------------------
			Comment Reply
		-----------------------------------------------------------*/

		if (!is_admin()){
			if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script( 'comment-reply' );
		}


		/*-----------------------------------------------------------
	    	Base custom scripts
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'base', get_template_directory_uri().'/assets/javascripts/app.js', '', '', 'footer' );

	}
	add_action('wp_enqueue_scripts', 'wplook_scripts_include');
}