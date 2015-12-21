<?php
/**
 * Register widget areas.
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */


/*-----------------------------------------------------------
	Include Widgets
-----------------------------------------------------------*/


// Initiate About Me widget
get_template_part( '/inc/widgets/widget', 'about' );
get_template_part( '/inc/widgets/widget', 'posts' );
get_template_part( '/inc/widgets/widget', 'social' );


function wplook_widgets_init() {


	/*-----------------------------------------------------------
		Posts Widget area
	-----------------------------------------------------------*/

	register_sidebar( array(
		'name' => __( 'Press/Blog Widget area', 'morningtime-lite' ),
		'id' => 'post-1',
		'description' => __('Widgets in this area will be shown on all Posts.','morningtime-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3 class="widgettitle">',
		'after_title' => '</h3></div>'
	) );


	/*-----------------------------------------------------------
		Pages widget area
	-----------------------------------------------------------*/

	register_sidebar( array(
		'name' => __( 'Page Widget area', 'morningtime-lite' ),
		'id' => 'page-1',
		'description' => __('Widgets in this area will be shown on all Pages.','morningtime-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3 class="widgettitle">',
		'after_title' => '</h3></div>'
	) );


	/*-----------------------------------------------------------
		Footer Widget area
	-----------------------------------------------------------*/

	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'morningtime-lite' ),
		'id' => 'f1-widgets',
		'description' => __( 'The first footer widget area', 'morningtime-lite' ),
		'before_widget' => '<section id="%1$s" class="widget footer-section %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<div class="footer-section-head"><h3 class="footer-section-title">',
		'after_title' => '</h3></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'morningtime-lite' ),
		'id' => 'f2-widgets',
		'description' => __( 'The first footer widget area', 'morningtime-lite' ),
		'before_widget' => '<section id="%1$s" class="widget footer-section %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<div class="footer-section-head"><h3 class="footer-section-title">',
		'after_title' => '</h3></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'morningtime-lite' ),
		'id' => 'f3-widgets',
		'description' => __( 'The first footer widget area', 'morningtime-lite' ),
		'before_widget' => '<section id="%1$s" class="widget footer-section %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<div class="footer-section-head"><h3 class="footer-section-title">',
		'after_title' => '</h3></div>'
	) );

}
/** Register sidebars */
add_action( 'widgets_init', 'wplook_widgets_init' );
?>