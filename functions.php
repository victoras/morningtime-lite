<?php
/**
 * Morning Time functions and definitions
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*	Content Width
/*-----------------------------------------------------------------------------------*/

function morning_time_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'morning_time_lite_content_width', 762 );
}
add_action( 'after_setup_theme', 'morning_time_lite_content_width', 0 );

/*-----------------------------------------------------------------------------------*/
/*	Theme setup
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_setup' ) ) {

	function morning_time_lite_setup() {

		/*-----------------------------------------------------------
			Enable support for Title Tag
		-----------------------------------------------------------*/

		add_theme_support( "title-tag" );

		/*-----------------------------------------------------------
			Make theme available for translation
		-----------------------------------------------------------*/

		load_theme_textdomain( 'morningtime-lite', get_template_directory() . '/languages' );


		/*-----------------------------------------------------------
			Theme style for the visual editor
		-----------------------------------------------------------*/

		add_editor_style( 'assets/styles/custom-editor-style.css' );

		/*-----------------------------------------------------------
			Add default posts and comments RSS feed links to head
		-----------------------------------------------------------*/

		add_theme_support( 'automatic-feed-links' );


		/*-----------------------------------------------------------
			Add supported post formats
		-----------------------------------------------------------*/

		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
		) );


		/*-----------------------------------------------------------
			Enable support for Post Thumbnails on posts and pages
		-----------------------------------------------------------*/

		add_theme_support( 'post-thumbnails' );
		add_image_size( 'morning-time-lite-featured-image', 1280, 800, true );
		add_image_size( 'morning-time-lite-post-thumb', 400, 250, true );
		add_image_size( 'morning-time-lite-gallery-thumb', 984, 615, true );


		/*-----------------------------------------------------------
			Register menu
		-----------------------------------------------------------*/

		function morning_time_lite_register_menus() {
			register_nav_menus(
				array(
					'primary' => __( 'Main Menu', 'morningtime-lite' ),
					'social' => __( 'Social Menu', 'morningtime-lite' ),
					'footernav' => __( 'Footer Menu', 'morningtime-lite' ),
				)
			);
		}

		add_action( 'init', 'morning_time_lite_register_menus' );

		/*-----------------------------------------------------------
			Add theme Support Custom Background
		-----------------------------------------------------------*/

		add_theme_support( 'custom-background' );


		/*-----------------------------------------------------------
			Add theme Support  Custom Header
		-----------------------------------------------------------*/

		add_theme_support( 'custom-header' );

	}
} // morning_time_lite_setup
add_action( 'after_setup_theme', 'morning_time_lite_setup' );


/*-----------------------------------------------------------------------------------*/
/*	Include Theme specific functionality
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_initiate_files' ) ) {

	function morning_time_lite_initiate_files() {

		// Initiate all widgets
		include_once( get_template_directory() . '/inc/widgets/widget-init.php' );

		// Include header data
		include_once( get_template_directory() . '/inc/headerdata.php' );

		// Include Customizer
		include_once( get_template_directory() . '/inc/customize.php' );
		include_once( get_template_directory() . '/inc/pro/class-customize.php' );

		// Include other functions
		include_once( get_template_directory() . '/inc/library.php' );

		// Include Comments
		require_once (get_template_directory() . '/inc/comment.php');

	}
	add_action( 'after_setup_theme', 'morning_time_lite_initiate_files' );
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Background
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'custom-background',
	apply_filters( 'morning_time_lite_custom_background_args',
		array(
			'default-color'          => 'f7f7f7',
			'default-image'          => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	)
);


/*-----------------------------------------------------------
	Custom Header
-----------------------------------------------------------*/

$morning_time_lite_custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => '1920',
	'height'                 => '800',
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '000000',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'		=> 'morning_time_lite_header_style',
	'admin-head-callback'	=> 'morning_time_lite_admin_header_style',
	'admin-preview-callback'=> 'morning_time_lite_admin_header_image',
);
add_theme_support( 'custom-header', $morning_time_lite_custom_header );


/*-----------------------------------------------------------*/
/*	Styles the header image and text displayed on the blog
/*-----------------------------------------------------------*/



if ( ! function_exists( 'morning_time_lite_header_style' ) ) {

	function morning_time_lite_header_style() {

		// If no custom options for text are set, let's bail
		// get_header_textcolor() options: $header_text_color is default, hide text (returns 'blank') or any hex value

		if ( $header_text_color == get_header_textcolor() )
			return;
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php // Has the text been hidden?
				if ( 'blank' == get_header_textcolor() ) { ?>
					#site-title{ position: absolute !important; clip: rect(1px 1px 1px 1px); /* IE6, IE7 */ clip: rect(1px, 1px, 1px, 1px); }
				<?php // If the user has set a custom color for the text use that
				} else { ?>
					#site-title a, #site-description { color: #<?php echo get_header_textcolor(); ?> !important; }
			<?php } ?>
		</style>
		<?php
	}
} // morning_time_lite_header_style

/*-----------------------------------------------------------*/
/*	Styles the header image displayed on the Appearance > Header admin panel.
/*	Referenced via add_custom_image_header() in morning_time_lite_setup().
/*-----------------------------------------------------------*/


if ( ! function_exists( 'morning_time_lite_admin_header_style' ) ) {

	function morning_time_lite_admin_header_style() { ?>
		<style type="text/css">

			#site-title a { font-size: 32px; line-height: 36px; text-decoration: none; }
			#site-description { font-size: 14px; line-height: 23px; padding: 0 0 3em; }

			<?php // If the user has set a custom color for the text use that
			if ( get_header_textcolor() != $header_text_color ) { ?>
				#site-title a, #site-description { color: #<?php echo get_header_textcolor(); ?>; }
			<?php } ?>
			#headimg img { max-width: 1000px; height: auto; width: 100%; }
		</style>
		<?php
	}

} // morning_time_lite_admin_header_style



/*-----------------------------------------------------------*/
/*	Custom header image markup displayed on the Appearance > Header admin panel.
/*	Referenced via add_custom_image_header() in morning_time_lite_setup().
/*-----------------------------------------------------------*/


if ( ! function_exists( 'morning_time_lite_admin_header_image' ) ) {

	function morning_time_lite_admin_header_image() { ?>
		<div id="headimg">
			<?php
			if ( 'blank' == get_theme_mod( 'header_textcolor', $header_text_color ) || '' == get_theme_mod( 'header_textcolor', $header_text_color ) )
				$style = ' style="display:none;"';
			else
				$style = ' style="color:#' . get_theme_mod( 'header_textcolor', $header_text_color ) . ';"';
			?>
			<h1><a id="name"<?php echo esc_html($style); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div id="desc"<?php echo esc_html($style); ?>><?php bloginfo( 'description' ); ?></div>
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
			<?php endif; ?>
		</div>
	<?php
	}

} // morning_time_lite_admin_header_image
?>
