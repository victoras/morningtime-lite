<?php
/*
 * Widget Name: Social Widget
 * Description: Social Widget
*/

add_action('widgets_init', function(){return register_widget("WPlooksocial");});
class WPlooksocial extends WP_Widget {

	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		parent::__construct(
			'WPlooksocial',
			__( 'WPlook Social', 'morningtime-lite' ),
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
		}

		else {
			$title = __( '', 'morningtime-lite' );
		}

		if ( $instance ) {
			$twitter = esc_attr( $instance[ 'twitter' ] );
		}
		else {
			$twitter = __( '', 'morningtime-lite' );
		}

		if ( $instance ) {
			$facebook = esc_attr( $instance[ 'facebook' ] );
		}
		else {
			$facebook = __( '', 'morningtime-lite' );
		}
		if ( $instance ) {
			$rss = esc_attr( $instance[ 'rss' ] );
		}
		else {
			$rss = __( '', 'morningtime-lite' );
		}
		if ( $instance ) {
			$googleplus = esc_attr( $instance[ 'googleplus' ] );
		}
		else {
			$googleplus = __( '', 'morningtime-lite' );
		}
		if ( $instance ) {
			$youtube = esc_attr( $instance[ 'youtube' ] );
		}
		else {
			$youtube = __( '', 'morningtime-lite' );
		}

		if ( $instance ) {
			$vimeo = esc_attr( $instance[ 'vimeo' ] );
		}
		else {
			$vimeo = __( '', 'morningtime-lite' );
		}
		if ( $instance ) {
			$soundcloud = esc_attr( $instance[ 'soundcloud' ] );
		}
		else {
			$soundcloud = __( '', 'morningtime-lite' );
		}
		if ( $instance ) {
			$lastfm = esc_attr( $instance[ 'lastfm' ] );
		}
		else {
			$lastfm = __( '', 'morningtime-lite' );
		}
		if ( $instance ) {
			$pinterest = esc_attr( $instance[ 'pinterest' ] );
		}
		else {
			$pinterest = __( '', 'morningtime-lite' );
		}
		if ( $instance ) {
			$flickr = esc_attr( $instance[ 'flickr' ] );
		}
		else {
			$flickr = __( '', 'morningtime-lite' );
		}
		if ( $instance ) {
			$linked = esc_attr( $instance[ 'linked' ] );
		}
		else {
			$linked = __( '', 'morningtime-lite' );
		}

		if ( $instance ) {
			$instagram = esc_attr( $instance[ 'instagram' ] );
		}
		else {
			$instagram = __( '', 'morningtime-lite' );
		}

		?>
		<!-- Title-->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<!-- Twitter-->
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>">
				<?php _e('Twitter:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Twitter profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- Facebook-->
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>">
				<?php _e('Facebook:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Facebook profile, page or group.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- RSS-->
		<p>
			<label for="<?php echo $this->get_field_id('rss'); ?>">
				<?php _e('RSS:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the Url of your RSS. You may include your RSS from Feedburner.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- Google Plus-->
		<p>
			<label for="<?php echo $this->get_field_id('googleplus'); ?>">
				<?php _e('Google Plus:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo $googleplus; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Google Plus profile', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- You Tube-->
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>">
				<?php _e('You Tube:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your YouTube profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- vimeo-->
		<p>
			<label for="<?php echo $this->get_field_id('vimeo'); ?>">
				<?php _e('Vimeo:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo $vimeo; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your vimeo profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- lastfm-->
		<p>
			<label for="<?php echo $this->get_field_id('lastfm'); ?>">
				<?php _e('Lastfm:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('lastfm'); ?>" name="<?php echo $this->get_field_name('lastfm'); ?>" type="text" value="<?php echo $lastfm; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your lastfm profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!-- soundcloud -->
		<p>
			<label for="<?php echo $this->get_field_id('soundcloud'); ?>">
				<?php _e('Soundcloud:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('soundcloud'); ?>" name="<?php echo $this->get_field_name('soundcloud'); ?>" type="text" value="<?php echo $soundcloud; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your soundcloud profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!--Pinterest-->
		<p>
			<label for="<?php echo $this->get_field_id('pinterest'); ?>">
				<?php _e('Pinterest:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo $pinterest; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Pinterest profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!--Flickr-->
		<p>
			<label for="<?php echo $this->get_field_id('flickr'); ?>">
				<?php _e('Flickr:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo $flickr; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Flickr profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!--Linkedin-->
		<p>
			<label for="<?php echo $this->get_field_id('linked'); ?>">
				<?php _e('Linkedin:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('linked'); ?>" name="<?php echo $this->get_field_name('linked'); ?>" type="text" value="<?php echo $linked; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Linkedin profile.', 'morningtime-lite'); ?>
			</p>
		</p>

		<!--Instagram-->
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>">
				<?php _e('Instagram:', 'morningtime-lite'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instagram; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Instagram profile.', 'morningtime-lite'); ?>
			</p>
		</p>

<?php

	}

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['twitter'] = esc_url( $new_instance['twitter'] );
		$instance['facebook'] = esc_url( $new_instance['facebook'] );
		$instance['rss'] = esc_url( $new_instance['rss'] );
		$instance['googleplus'] = esc_url( $new_instance['googleplus'] );
		$instance['youtube'] = esc_url( $new_instance['youtube'] );
		$instance['vimeo'] = esc_url( $new_instance['vimeo'] );
		$instance['lastfm'] = esc_url( $new_instance['lastfm'] );
		$instance['soundcloud'] = esc_url( $new_instance['soundcloud'] );
		$instance['pinterest'] = esc_url( $new_instance['pinterest'] );
		$instance['flickr'] = esc_url( $new_instance['flickr'] );
		$instance['linked'] = esc_url( $new_instance['linked'] );
		$instance['instagram'] = esc_url( $new_instance['instagram'] );

	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		extract( $args );
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$twitter = isset( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '';
		$facebook = isset( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '';
		$rss = isset( $instance['rss'] ) ? esc_url( $instance['rss'] ) : '';
		$googleplus = isset( $instance['googleplus'] ) ? esc_url( $instance['googleplus'] ) : '';
		$youtube = isset( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '';
		$vimeo = isset( $instance['vimeo'] ) ? esc_url( $instance['vimeo'] ) : '';
		$lastfm = isset( $instance['lastfm'] ) ? esc_url( $instance['lastfm'] ) : '';
		$soundcloud = isset( $instance['soundcloud'] ) ? esc_url( $instance['soundcloud'] ) : '';
		$pinterest = isset( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '';
		$flickr = isset( $instance['flickr'] ) ? esc_url( $instance['flickr'] ) : '';
		$linked = isset( $instance['linked'] ) ? esc_url( $instance['linked'] ) : '';
		$instagram = isset( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '';
		?>
<?php if ($title=="") $title = "Social Widget"; ?>
<?php echo $before_widget; ?>
<?php if ( $title )
		echo $before_title . $title . $after_title;
		echo "<div class='social-widget-body'><div class='social-widget-margin'>";
			// Twitter
			if ($twitter != "") {
				echo "<div class='social-item-twitter'>"."<a href='$twitter' target='_blank'><i class='fab fa-twitter'></i></a>"."</div>";
			}
			// Facebook
			if ($facebook != "") {
				echo "<div class='social-item-facebook'>"."<a href='$facebook' target='_blank'><i class='fab fa-facebook'></i></a>" ."</div>";
			}
			// RSS
			if ($rss != "") {
				echo "<div class='social-item-rss'>"."<a href='$rss' target='_blank'><i class='fab fa-rss'></i></a>" ."</div>";
			}
			// Google Plus
			if ($googleplus != "") {
				echo "<div class='social-item-gplus'>"."<a href='$googleplus' target='_blank'><i class='fab fa-google-plus-g'></i></a>" ."</div>";
			}
			// You Tube
			if ($youtube != "") {
				echo "<div class='social-item-youtube'>"."<a href='$youtube' target='_blank'><i class='fab fa-youtube'></i></a>" ."</div>";
			}
			// vimeo
			if ($vimeo != "") {
				echo "<div class='social-item-vimeo'>"."<a href='$vimeo' target='_blank'><i class='fab fa-vimeo-square'></i></a>" ."</div>";
			}
			// lastfm
			if ($lastfm != "") {
				echo "<div class='social-item-lastfm'>"."<a href='$lastfm' target='_blank'><i class='fab fa-lastfm'></i></a>" ."</div>";
			}
			// soundcloud
			if ($soundcloud != "") {
				echo "<div class='social-item-soundcloud'>"."<a href='$soundcloud' target='_blank'><i class='fab fa-soundcloud'></i></a>" ."</div>";
			}
			// Pinterest
			if ($pinterest != "") {
				echo "<div class='social-item-pinterest'>"."<a href='$pinterest' target='_blank'><i class='fab fa-pinterest'></i></a>" ."</div>";
			}
			// Flickr
			if ($flickr != "") {
				echo "<div class='social-item-flickr'>"."<a href='$flickr' target='_blank'><i class='fab fa-flickr'></i></a>" ."</div>";
			}
			// Linkedin
			if ($linked != "") {
				echo "<div class='social-item-linkedin'>"."<a href='$linked' target='_blank'><i class='fab fa-linkedin'></i></a>" ."</div>";
			}
			// Instagram
			if ($instagram != "") {
				echo "<div class='social-item-instagram'>"."<a href='$instagram' target='_blank'><i class='fab fa-instagram'></i></a>" ."</div>";
			}
		echo "<div class='clearfix'></div></div></div>";
	 	echo $after_widget; ?>
<?php
	}
}
?>
