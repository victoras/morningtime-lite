<?php
/**
 * The default template for displaying status content
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */

?>

<!-- Article -->
<?php $postclass = is_single() ? 'post-single' : ''; ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class($postclass.' post wow fadeIn'); ?> itemscope itemtype="https://schema.org/BlogPosting" data-wow-duration="0.35s" data-wow-delay="0.15s">

	<div class="post-body">
		<header class="post-head">
			<a href="<?php the_permalink(); ?>">
				<time class="post-date" datetime="<?php echo get_the_date( 'c' ) ?>" itemprop="datePublished"><?php morning_time_lite_get_date(); ?></time><!-- /.post-date -->
			</a>

		</header><!-- /.post-head -->

		<div class="entry" itemprop="articleBody">
			<blockquote>
				<?php
					the_content( sprintf(
						__( 'Continue reading %s', 'morningtime-lite' ), the_title( '<span class="screen-reader-text">', '</span>', false )
					) );
				?>
			</blockquote>
			<?php

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'morningtime-lite' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'morningtime-lite' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div><!-- /.entry -->
	</div><!-- /.post-body -->

	<?php if( is_single()) { ?>
		<div class="post-foot">
		</div><!-- /.post-foot -->

		<?php // Author bio.
			if ( get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>

		<?php echo morning_time_lite_content_navigation('postnav'); ?>
	<?php } ?>

</article><!-- /.post -->
