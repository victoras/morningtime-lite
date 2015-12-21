<?php

/*-----------------------------------------------------------------------------------*/
/*  Add More Option for Customizer
/*-----------------------------------------------------------------------------------*/

class Wplook_Customize_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<p>
				<?php
					printf( __( 'Take advandage of our Full Version of %sMorning Time%s.', 'morningtime-lite' ), '<a href="https://wplook.com/theme/personal-blog-wordpress-theme/">', '</a>' );
				?>
			</p>

			<span class="customize-control-title"><?php _e( 'Looking for more themes?', 'morningtime-lite' ); ?></span>
			<p>
				<?php
					printf( __( 'Browse our %sWordPress Theme Collection%s', 'morningtime-lite' ), '<a href="https://wplook.com/wordpress/themes/">', '</a>' );
				?>
			</p>

			<span class="customize-control-title"><?php _e( 'Need Help?', 'morningtime-lite' ); ?></span>
			<p>
				<?php
					printf( __( '%sContact us!%s', 'morningtime-lite' ), '<a href="https://wplook.com/help/">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}

?>