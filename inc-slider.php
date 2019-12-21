<?php
/**
 * The default template for displaying Home page Slider
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
?>


<?php
	$headers = get_uploaded_header_images();
?>

<?php
	if ( get_theme_mod('wplook_rev_slider') !='' && function_exists( 'putRevSlider' ) ) {
		putRevSlider( get_theme_mod('wplook_rev_slider') );
	} else { ?>
		<section class="section-slider">
			<div class="slider-home loading no-js">
				<div class="slider-clip">
					<ul class="slides">

						<?php foreach($headers as $header) { ?>

							<li class="slide">

								<?php $attachment_meta = morning_time_lite_get_attachment($header['attachment_id']); ?>

								<div class="slide-image fullscreener">
									<img src="<?php echo esc_url($header['url']); ?>" height="<?php echo esc_attr($header['height']); ?>" width="<?php echo $header['width']; ?>" alt="<?php echo $attachment_meta['title']; ?>">
								</div><!-- /.slide-image fullscreener -->

								<div class="slide-body row">
									<?php if( $attachment_meta['title'] ) { ?>
										<h2 class="slide-title"><span><?php echo esc_html($attachment_meta['title']); ?></span></h2><!-- /.slide-title -->
									<?php } ?>

									<?php if( $attachment_meta['caption'] ) { ?>
										<h3 class="slide-caption"><span><?php echo esc_html($attachment_meta['caption']); ?></span></h3><!-- /.slide-title -->
									<?php } ?>


									<?php if( $attachment_meta['alt'] && $attachment_meta['description'] ) { ?>
										<div class="slide-actions">
											<a href="<?php echo esc_attr($attachment_meta['description']); ?>" class="button tiny orange"><?php echo esc_html($attachment_meta['alt']); ?></a>
										</div><!-- /.slide-actions -->
									<?php } ?>
								</div><!-- /.slide-body -->
							</li><!-- /.slide -->

						<?php } ?>

					</ul><!-- /.slides -->
				</div><!-- /.slider-clip -->
			</div><!-- /.slider-home -->
		</section><!-- /.section-slider -->
	<?php } ?>
