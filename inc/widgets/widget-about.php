<?php
/*
 * Widget Name: About Me
 * Description: Add About Me Widget
*/

add_action('widgets_init', create_function('', 'return register_widget("wplook_about_me_widget");'));
class wplook_about_me_widget extends WP_Widget {


	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		parent::__construct(
	 		'wplook_about_me_widget',
			'WPlook About Me',
			array( 'description' => __( 'About Me widget.', 'morningtime-lite' ), )
		);
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the options form on admin
	/*-----------------------------------------------------------------------------------*/

	public function form( $instance ) {

		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$about = esc_attr( $instance[ 'about' ] );
			$avatarimg = esc_attr( $instance[ 'avatarimg' ] );
		}
		else {
			$title = '';
			$about = '';
			$avatarimg = '';
		}
		?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"> <?php _e('Title:', 'morningtime-lite'); ?> </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('about')); ?>">
					<?php _e('About me:', 'morningtime-lite'); ?>
				</label>
				<textarea cols="25" rows="10" class="widefat" id="<?php echo esc_attr($this->get_field_id('about')); ?>" name="<?php echo esc_attr($this->get_field_name('about')); ?>" type="text"><?php echo esc_attr($about); ?></textarea>
			</p>


			<p>
				<label for="<?php echo esc_attr($this->get_field_id('$avatarimg')); ?>"><?php _e('300x300px Avatar Image:', 'morningtime-lite'); ?></label><br />
				<input type="text" class="img" name="<?php echo esc_attr($this->get_field_name('avatarimg')); ?>" id="<?php echo esc_attr(esc_url($this->get_field_id('avatarimg'))); ?>" value="<?php echo esc_attr($avatarimg); ?>" />
				<input type="button" class="select-img button" value="<?php _e('Select Image', 'morningtime-lite');?>" />
			</p>

			<?php if ($avatarimg) { ?>
				<img src="<?php echo esc_url($avatarimg); ?>" alt="<?php _e('This is a demo image', 'morningtime-lite'); ?>" style="width: 50%; height: auto; margin-bottom: 20px;">
			<?php } ?>

		<?php
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Processes widget options to be saved
	/*-----------------------------------------------------------------------------------*/

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['avatarimg'] = sanitize_text_field($new_instance['avatarimg']);

		if ( current_user_can('unfiltered_html') )
			$instance['about'] =  $new_instance['about'];
		else
			$instance['about'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['about']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the content of the widget
	/*-----------------------------------------------------------------------------------*/

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$about = apply_filters( 'widget_text', empty( $instance['about'] ) ? '' : $instance['about'], $instance );
		$avatar = apply_filters( 'widget_text', empty( $instance['avatarimg'] ) ? '' : $instance['avatarimg'], $instance );
		?>

		<aside class="widget widget_about">
			<?php if ( $avatar ) { ?>
				<div class="about-image">
					<img src="<?php echo esc_url($avatar); ?>" alt="<?php _e('About the Author', 'morningtime-lite'); ?>" height="282" width="282">
				</div><!-- /.about-image -->
			<?php } ?>


			<?php
				if ($title) { ?>
					<h2 class="widget-title"><?php echo esc_html($title); ?></h2><!-- /.widget-title -->
				<?php }
			?>

			<?php if ($about) { ?>
				<div class="textwidget">
					<p><?php echo esc_html($about); ?></p>
				</div><!-- /.textwidget -->
			<?php } ?>

		</aside><!-- /.widget widget_about -->

	<?php }

}

	/*-----------------------------------------------------------------------------------*/
	/*	JS
	/*-----------------------------------------------------------------------------------*/

	function wplook_js_screepts($hook) {
		if ( 'widgets.php' == $hook || 'customize.php' == $hook ) {
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_enqueue_script('upload_media_widget', get_template_directory_uri().'/assets/javascripts/upload-media.js', '', '', 'footer' );
		}
	}
	add_action( 'admin_enqueue_scripts', 'wplook_js_screepts' );
?>