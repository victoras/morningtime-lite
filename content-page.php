<?php
/**
 * The default template for displaying page content
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */

?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class("post post-single"); ?> itemscope itemtype="https://schema.org/BlogPosting">
			<header class="page-head">
				<h3 class="widget-title">
					<?php the_title(); ?>
				</h3>
			</header><!-- /.post-head -->

			<div class="entry clearfix" itemprop="articleBody">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'morningtime-lite' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div><!-- /.entry -->
		</article><!-- /.post -->
	<?php endwhile; endif; ?>
