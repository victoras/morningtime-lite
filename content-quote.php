<?php
/**
 * The default template for displaying quote content
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */

?>
<?php if( is_single()) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("post post-single"); ?> itemscope itemtype="https://schema.org/BlogPosting">
		<header class="post-head">
			<time class="post-date" datetime="<?php echo get_the_date( 'c' ) ?>" itemprop="datePublished"><?php morning_time_lite_get_date(); ?></time><!-- /.post-date -->

			<h3 class="post-title">
				<?php the_title(); ?>
			</h3>

			<ul class="post-category"><li><?php the_category('</li><li>'); ?></li></ul>
		</header><!-- /.post-head -->

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-image">
				<?php the_post_thumbnail('morning-time-lite-featured-image'); ?>
			</div><!-- /.post-image -->
		<?php } ?>

		<div class="post-meta">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>" class="post-author wow bounceIn" data-wow-duration="1s" data-wow-delay="0.5s">
				<?php echo get_avatar(get_the_author_meta( 'ID' ), 120); ?>
			</a>
		</div><!-- /.post-meta -->

		<div class="post-body">
			<div class="entry" itemprop="articleBody">
				<?php  the_content( sprintf(
						__( 'Continue reading %s', 'morningtime-lite' ), the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

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

		<div class="post-foot">
			<div class="post-tags">
				<?php // Tags ?>
				<?php if ( get_the_tag_list( '', ', ' ) ) { ?>
					<div class="tags"><i class="fas fa-tags"></i> <?php echo get_the_tag_list('',', ',''); ?></div>
				<?php } ?>
			</div><!-- /.post-tags -->

		</div><!-- /.post-foot -->


		<?php // Author bio.
			if ( get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>

		<?php echo morning_time_lite_content_navigation('postnav'); ?>
	</article><!-- /.post -->

<?php } else { ?>

	<!-- Article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('post wow fadeIn'); ?> itemscope itemtype="https://schema.org/BlogPosting" data-wow-duration="0.35s" data-wow-delay="0.15s">
		<header class="post-head">
			<a href="<?php the_permalink(); ?>">
				<time class="post-date" datetime="<?php echo get_the_date( 'c' ) ?>" itemprop="datePublished"><?php morning_time_lite_get_date(); ?></time><!-- /.post-date -->
			</a>
		</header><!-- /.post-head -->

		<div class="post-body">
			<div class="entry" itemprop="articleBody">
				<?php
					the_content( sprintf(
						__( 'Continue reading %s', 'morningtime-lite' ), the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

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
	</article><!-- /.post -->
<?php } ?>
