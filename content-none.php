<?php
/**
 * The default template for displaying no content
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */

?>

<article <?php post_class("post post-single"); ?> itemscope itemtype="https://schema.org/BlogPosting">
	<header class="page-head">
		<h3 class="widget-title">
			<?php _e( 'Nothing Found', 'morningtime-lite' ); ?>
		</h3>
	</header><!-- /.post-head -->

	<div class="entry clearfix" itemprop="articleBody">

		<?php if ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'morningtime-lite' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'morningtime-lite' ); ?></p>

		<?php endif; ?>
	</div><!-- /.entry -->
</article><!-- /.post -->
