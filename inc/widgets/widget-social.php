<?php
/*
 * Widget Name: Social Widget
 * Description: Social Widget
*/

add_action('widgets_init', create_function('', 'return register_widget("WPlooksocial");'));
class WPlooksocial extends WP_Widget {

	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		parent::__construct(
			'WPlooksocial',
			'WPlook Social',
			array( 'description' => __( 'A widget for displaying Social Networking', 'morningtime-lite' ), )
		);
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the options form on admin
	/*-----------------------------------------------------------------------------------*/

	public function form( $instance ) {
	// outputs the options form on admin
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$twitter = esc_attr( $instance[ 'twitter' ] );
			$facebook = esc_attr( $instance[ 'facebook' ] );
			$rss = esc_attr( $instance[ 'rss' ] );
			$googleplus = esc_attr( $instance[ 'googleplus' ] );
			$youtube = esc_attr( $instance[ 'youtube' ] );
			$vimeo = esc_attr( $instance[ 'vimeo' ] );
			$soundcloud = esc_attr( $instance[ 'soundcloud' ] );
			$lastfm = esc_attr( $instance[ 'lastfm' ] );
			$pinterest = esc_attr( $instance[ 'pinterest' ] );
			$flickr = esc_attr( $instance[ 'flickr' ] );
			$linked = esc_attr( $instance[ 'linked' ] );
			$instagram = esc_attr( $instance[ 'instagram' ] );
		}
		else {
			$title = '';
			$twitter = '';
			$facebook = '';
			$rss = '';
			$googleplus = '';
			$youtube = '';
			$vimeo = '';
			$soundcloud = '';
			$lastfm = '';
			$pinterest = '';
			$flickr = '';
			$linked = '';
			$instagram = '';
		}
		?>
		<!-- Title-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
				<?php _e('Title:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<!-- Twitter-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>">
				<?php _e('Twitter:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Twitter profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- Facebook-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>">
				<?php _e('Facebook:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Facebook profile, page or group.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- RSS-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('rss')); ?>">
				<?php _e('RSS:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="text" value="<?php echo esc_attr($rss); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the Url of your RSS. You may include your RSS from Feedburner.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- Google Plus-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('googleplus')); ?>">
				<?php _e('Google Plus:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('googleplus')); ?>" name="<?php echo esc_attr($this->get_field_name('googleplus')); ?>" type="text" value="<?php echo esc_attr($googleplus); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Google Plus profile', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- You Tube-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>">
				<?php _e('You Tube:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your YouTube profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- vimeo-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>">
				<?php _e('Vimeo:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your vimeo profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- lastfm-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('lastfm')); ?>">
				<?php _e('Lastfm:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('lastfm')); ?>" name="<?php echo esc_attr($this->get_field_name('lastfm')); ?>" type="text" value="<?php echo esc_attr($lastfm); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your lastfm profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- soundcloud -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>">
				<?php _e('Soundcloud:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>" name="<?php echo esc_attr($this->get_field_name('soundcloud')); ?>" type="text" value="<?php echo esc_attr($soundcloud); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your soundcloud profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!--Pinterest-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>">
				<?php _e('Pinterest:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Pinterest profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!--Flickr-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>">
				<?php _e('Flickr:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Flickr profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!--Linkedin-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('linked')); ?>">
				<?php _e('Linkedin:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linked')); ?>" name="<?php echo esc_attr($this->get_field_name('linked')); ?>" type="text" value="<?php echo esc_attr($linked); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Linkedin profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!--Instagram-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>">
				<?php _e('Instagram:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Instagram profile.', 'morningtime-lite'); ?>
			</p>
		</p>

<?php

	}

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['twitter'] = sanitize_text_field($new_instance['twitter']);
		$instance['facebook'] = $new_instance['facebook'];
		$instance['rss'] = $new_instance['rss'];
		$instance['googleplus'] = $new_instance['googleplus'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['vimeo'] = $new_instance['vimeo'];
		$instance['lastfm'] = $new_instance['lastfm'];
		$instance['soundcloud'] = $new_instance['soundcloud'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['linked'] = $new_instance['linked'];
		$instance['instagram'] = $new_instance['instagram'];

	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		extract( $args );
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$twitter = isset( $instance['twitter'] ) ? esc_attr( $instance['twitter'] ) : '';
		$facebook = isset( $instance['facebook'] ) ? esc_attr( $instance['facebook'] ) : '';
		$rss = isset( $instance['rss'] ) ? esc_attr( $instance['rss'] ) : '';
		$googleplus = isset( $instance['googleplus'] ) ? esc_attr( $instance['googleplus'] ) : '';
		$youtube = isset( $instance['youtube'] ) ? esc_attr( $instance['youtube'] ) : '';
		$vimeo = isset( $instance['vimeo'] ) ? esc_attr( $instance['vimeo'] ) : '';
		$lastfm = isset( $instance['lastfm'] ) ? esc_attr( $instance['lastfm'] ) : '';
		$soundcloud = isset( $instance['soundcloud'] ) ? esc_attr( $instance['soundcloud'] ) : '';
		$pinterest = isset( $instance['pinterest'] ) ? esc_attr( $instance['pinterest'] ) : '';
		$flickr = isset( $instance['flickr'] ) ? esc_attr( $instance['flickr'] ) : '';
		$linked = isset( $instance['linked'] ) ? esc_attr( $instance['linked'] ) : '';
		$instagram = isset( $instance['instagram'] ) ? esc_attr( $instance['instagram'] ) : '';
		?>
<?php if ($title=="") $title = "Social Widget"; ?>
<?php echo $before_widget; ?>
<?php if ( $title )
		echo $before_title . $title . $after_title;
		echo "<div class='social-widget-body'><div class='social-widget-margin'>";
			// Twitter
			if ($twitter != "") {
				echo "<div class='social-item-twitter'>"."<a href='esc_url($twitter)' target='_blank'><i class='fa fa-twitter'></i></a>"."</div>";
			}
			// Facebook
			if ($facebook != "") {
				echo "<div class='social-item-facebook'>"."<a href='esc_url($facebook)' target='_blank'><i class='fa fa-facebook'></i></a>" ."</div>";
			}
			// RSS
			if ($rss != "") {
				echo "<div class='social-item-rss'>"."<a href='esc_url($rss)' target='_blank'><i class='fa fa-rss'></i></a>" ."</div>";
			}
			// Google Plus
			if ($googleplus != "") {
				echo "<div class='social-item-gplus'>"."<a href='esc_url($googleplus)' target='_blank'><i class='fa fa-google-plus'></i></a>" ."</div>";
			}
			// You Tube
			if ($youtube != "") {
				echo "<div class='social-item-youtube'>"."<a href='esc_url($youtube)' target='_blank'><i class='fa fa-youtube'></i></a>" ."</div>";
			}
			// vimeo
			if ($vimeo != "") {
				echo "<div class='social-item-vimeo'>"."<a href='esc_url($vimeo)' target='_blank'><i class='fa fa-vimeo-square'></i></a>" ."</div>";
			}
			// lastfm
			if ($lastfm != "") {
				echo "<div class='social-item-lastfm'>"."<a href='esc_url($lastfm)' target='_blank'><i class='fa fa-lastfm'></i></a>" ."</div>";
			}
			// soundcloud
			if ($soundcloud != "") {
				echo "<div class='social-item-soundcloud'>"."<a href='esc_url($soundcloud)' target='_blank'><i class='fa fa-soundcloud'></i></a>" ."</div>";
			}
			// Pinterest
			if ($pinterest != "") {
				echo "<div class='social-item-pinterest'>"."<a href='esc_url($pinterest)' target='_blank'><i class='fa fa-pinterest'></i></a>" ."</div>";
			}
			// Flickr
			if ($flickr != "") {
				echo "<div class='social-item-flickr'>"."<a href='esc_url($flickr)' target='_blank'><i class='fa fa-flickr'></i></a>" ."</div>";
			}
			// Linkedin
			if ($linked != "") {
				echo "<div class='social-item-linkedin'>"."<a href='esc_url($linked)' target='_blank'><i class='fa fa-linkedin'></i></a>" ."</div>";
			}
			// Instagram
			if ($instagram != "") {
				echo "<div class='social-item-instagram'>"."<a href='esc_url($instagram)' target='_blank'><i class='fa fa-instagram'></i></a>" ."</div>";
			}
		echo "<div class='clearfix'></div></div></div>";
	 	echo $after_widget; ?>
<?php
	}
}
?>