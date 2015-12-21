<?php
/**
 * Morning Time Customizer functionality
 *
 */

/**
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function wplook_customize_register( $wp_customize ) {

	/*------------------------------------------------------------
		Add Colors options
	============================================================*/
	/*------------------------------------------------------------
		Add custom Link Color.
	============================================================*/
	$wp_customize->add_setting(
		'wplook_link_color',
		array(
			'default'           => '#117dbf',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wplook_link_color',
			array(
				'label'       => __( 'Link Color', 'morningtime-lite' ),
				'description' => __( 'Default Link Color', 'morningtime-lite' ),
				'section'     => 'colors',
			)
		)
	);

	/*------------------------------------------------------------
		Add Hover Link Color
	============================================================*/
	$wp_customize->add_setting(
		'wplook_hover_link_color',
		array(
			'default'           => '#0078a0',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wplook_hover_link_color',
			array(
				'label'       => __( 'Hover Link Color', 'morningtime-lite' ),
				'description' => __( 'Hover Link Color', 'morningtime-lite' ),
				'section'     => 'colors',
			)
		)
	);

	/*------------------------------------------------------------
		Add Accent Color
	============================================================*/
	$wp_customize->add_setting(
		'wplook_accent_color',
		array(
			'default'           => '#d95204',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wplook_accent_color',
			array(
				'label'       => __( 'Accent Color', 'morningtime-lite' ),
				'description' => __( 'Chose the Accent Color', 'morningtime-lite' ),
				'section'     => 'colors',
			)
		)
	);


	/*------------------------------------------------------------
		Add Morning Time Theme Setings
	============================================================*/
	$wp_customize->add_section(
		'wplook_themes_settings' ,
		array(
			'title'      => __( 'Morning Time Settings', 'morningtime-lite' ),
			'description'=> '',
			'priority'   => 30,
		)
	);

	/*------------------------------------------------------------
		Upload a logo
	============================================================*/
	$wp_customize->add_setting(
		'wplook_logo',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	 );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wplook_logo',
			array(
				'label'		=>  __( 'Logo', 'morningtime-lite' ),
				'description' => __('Upload (190px x 50px) image size.', 'morningtime-lite' ),
				'section' 	=> 'title_tagline',
				'settings' 	=> 'wplook_logo'
			)
		)
	);

	/*------------------------------------------------------------
		Add Revolution Slider
	============================================================*/
	$wp_customize->add_setting(
		'wplook_rev_slider',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'wplook_rev_slider',
		array(
			'label' 		=> __( 'Revolution Slider', 'morningtime-lite'),
			'description'	=> __( 'Revolution Slider Alias. If you have installed the revolution slider Plugin, add the Slider Alias here. From this example [rev_slider test] you need to add only the word test.', 'morningtime-lite'),
			'section' 		=> 'header_image',
		)
	);


	/*------------------------------------------------------------
		Add Copyright
	============================================================*/
	$wp_customize->add_setting(
		'wplook_copy',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'wplook_copy',
		array(
			'label' 		=> __( 'Copyright', 'morningtime-lite'),
			'description'	=> __( 'Add Footer Copyright', 'morningtime-lite'),
			'section' 		=> 'wplook_themes_settings',
		)
	);

	if ( apply_filters( 'wplook_customizer_more', true ) ) {
		require_once dirname( __FILE__ ) . '/more.php';
	}


	/*------------------------------------------------------------
		More Info
	============================================================*/
	$wp_customize->add_section( 'wplook_more_settings',  array(
			'title'      => __( 'More', 'morningtime-lite' ),
			'priority'   => 999,
		)
	);

	/*------------------------------------------------------------
		More info Details
	============================================================*/
	if ( apply_filters( 'wplook_customizer_more', true ) ) {
		$wp_customize->add_setting( 'wplook_more_settings', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

		$wp_customize->add_control(
			new Wplook_Customize_Control( $wp_customize, 'wplook_more_settings', array(
					'label'		=>  __( 'Looking for more options?', 'morningtime-lite' ),
					'description' => __('Use .png image type.', 'morningtime-lite' ),
					'section' 	=> 'wplook_more_settings',
					'settings' 	=> 'wplook_more_settings'
				)
			)
		);
	}


}
add_action( 'customize_register', 'wplook_customize_register', 11 );

/**
* Convert HEX to RGB.
*
*
* @param string $color The original color, in 3- or 6-digit hexadecimal form.
* @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function wplook_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) == 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) == 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Enqueues front-end CSS for color scheme.
 *
 */
function wplook_color_scheme_css() {
	/*echo "<pre>";
	var_dump(get_option('wplook_accent_color'));
	echo "</pre>";*/

	$wplook_link_color 				= get_theme_mod( 'wplook_link_color', '#117dbf' );
	$wplook_hover_link_color			= get_theme_mod( 'wplook_hover_link_color', '#0078a0' );
	$wplook_accent_color				= get_theme_mod( 'wplook_accent_color', '#d95204' );


	$colors = array(
		'wplook_link_color'				=> $wplook_link_color,
		'wplook_hover_link_color'			=> $wplook_hover_link_color,
		'wplook_accent_color'				=> $wplook_accent_color,
	);

	$color_scheme_css = wplook_get_color_scheme_css( $colors );

	wp_add_inline_style( 'morning-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'wplook_color_scheme_css' );



/**
 * Returns CSS for the color schemes.
 *
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function wplook_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'wplook_link_color'				=> '',
		'wplook_hover_link_color'			=> '',
		'wplook_accent_color'				=> '',

	) );

	$css = <<<CSS
a, .header .top-bar-section li:not(.has-form):hover > a:not(.button), .header .top-bar-section .dropdown li:hover:not(.has-form):not(.active) > a:not(.button) { color:{$colors['wplook_link_color']}; }
a:hover, a:focus,  { color:{$colors['wplook_hover_link_color']}; }
.button.orange, .slider-home .flex-direction-nav a:hover, .sidebar .widget-title::after, .button.grey:hover, .comments h3::after, .footer-section .footer-section-title::after, .tagcloud a { background:{$colors['wplook_accent_color']}; }
.slider-home .flex-direction-nav a, .post-category a, .post-tags a, .socials a { color:{$colors['wplook_accent_color']}; }
.header .top-bar-section > ul > .has-dropdown:hover::after { border-bottom-color:{$colors['wplook_link_color']}; }
CSS;

	return $css;
	}