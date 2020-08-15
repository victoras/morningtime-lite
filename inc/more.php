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
					printf( __( 'Take advandage of our Full Version of %s<strong>Morning Time</strong>%s. Use the coupon code <strong>"morningtime-lite"</strong> in order to get <strong>20 percent off</strong>.', 'morningtime-lite' ), '<a href="https://wplook.com/theme/personal-blog-wordpress-theme/?utm_source=Buy-Full&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' );
				?>
			</p>

			<p>
				<?php printf( __( '<strong>The full Version is coming with:</strong>', 'morningtime-lite' ) ); ?>
			</p>

			<ul>
				<li><?php printf( __( '- Great Support', 'morningtime-lite' ) ); ?></li>
				<li><?php printf( __( '- Child Theme', 'morningtime-lite' ) ); ?></li>
				<li><?php printf( __( '- Demo Content', 'morningtime-lite' ) ); ?></li>
				<li><?php printf( __( '- Custom Post Type Portfolio', 'morningtime-lite' ) ); ?></li>
				<li><?php printf( __( '- Nice Archive Template', 'morningtime-lite' ) ); ?></li>
				<li><?php printf( __( '- Post Formats', 'morningtime-lite' ) ); ?></li>
				<li><?php printf( __( '- WooCommerce Integration', 'morningtime-lite' ) ); ?></li>
				<li><?php printf( __( '- Custom Logo', 'morningtime-lite' ) ); ?></li>
				<li><?php printf( __( '- Advanced Theme Options', 'morningtime-lite' ) ); ?></li>
				<li><?php printf( __( '- %sand much more...%s', 'morningtime-lite' ), '<a href="https://wplook.com/theme/personal-blog-wordpress-theme/?utm_source=view_more&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></li>
			</ul>

			<span class="customize-control-title"><?php _e( 'Looking for Premium themes?', 'morningtime-lite' ); ?></span>

			<p>
				<span class="customize-control-title"><?php printf( __( 'MorningTime WordPress Theme - %sRead More%s', 'morningtime-lite' ) , '<a href="https://wplook.com/product/themes/personal/personal-blog-wordpress-theme/?utm_source=view_morningtime&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/morning-time.jpg" alt="MorningTime">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'FamilyBlog WordPress Theme - %sRead More%s', 'morningtime-lite' ) , '<a href="https://wplook.com/product/themes/personal/create-family-blog-wordpress-theme/?utm_source=view_family_blog&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/family-blog.jpg" alt="FamilyBlog">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Makenzie WordPress Theme - %sRead More%s', 'morningtime-lite' ) , '<a href="https://wplook.com/product/themes/magazines/makenzie-lifestyle-blog-magazine-wordpress-theme/?utm_source=view_makenzie&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/makenzie.jpg" alt="Makenzie">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Studio 8 WordPress Theme - %sRead More%s', 'morningtime-lite' ) , '<a href="https://wplook.com/product/themes/business/studio-8-agency-wordpress-theme/?utm_source=view_studio8&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/studio8.jpg" alt="Studio 8">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Charity WordPress Theme - %sRead More%s', 'morningtime-lite' ) , '<a href="https://wplook.com/product/themes/non-profit/charity-nonprofit-wordpress-theme/?utm_source=view_charity&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/charity.jpg" alt="Charity">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Event WordPress Theme - %sRead More%s', 'morningtime-lite' ) , '<a href="https://wplook.com/product/themes/conference-events/event-wordpress-theme/?utm_source=view_event&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/event.jpg" alt="Event">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'Health & Medical WordPress Theme - %sRead More%s', 'morningtime-lite' ) , '<a href="https://wplook.com/product/themes/business/medical-wordpress-theme/?utm_source=view_medical&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/medical.jpg" alt="Health & Medical ">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'StereoClub WordPress Theme - %sRead More%s', 'morningtime-lite' ) , '<a href="https://wplook.com/product/themes/music-band/stereoclub-nightclub-band-wordpress-theme/?utm_source=view_stereoclub&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/stereoclub.jpg" alt="StereoClub ">
			<br />

			<p>
				<span class="customize-control-title"><?php printf( __( 'The Architect WordPress Theme - %sRead More%s', 'morningtime-lite' ) , '<a href="https://wplook.com/product/themes/business/architect-wordpress-theme/?utm_source=view_the_architect&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' ); ?></span>
			</p>
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thearchitect.jpg" alt="The Architect ">
			<br />

			<p>
				<?php
					printf( __( 'Browse more %sWordPress Theme%s', 'morningtime-lite' ), '<a href="https://wplook.com/wordpress/themes/?utm_source=browse_more&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' );
				?>
			</p>

			<span class="customize-control-title"><?php _e( 'Need Help?', 'morningtime-lite' ); ?></span>
			<p>
				<?php
					printf( __( '%sContact us!%s', 'morningtime-lite' ), '<a href="https://wplook.com/help/?utm_source=contact_us&utm_medium=link&utm_campaign=MorningTime-Lite">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}

?>
