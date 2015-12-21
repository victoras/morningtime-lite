<?php
/**
 * The default template for 404 error page
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
?>

<?php get_header(); ?>
	<div class="main">
		<div class="main-body">
			<div class="row">
				<div class="columns large-12">
					<div class="content">
						<article class="page" itemscope itemtype="https://schema.org/BlogPosting">
							<div class="entry" itemprop="articleBody">
								<h1 class="error-title text-center"><?php _e('404', 'morningtime-lite'); ?></h1>
								<h2 class="error-subtitle text-center"><?php _e('Oops! The page you were looking for could not be found.', 'morningtime-lite'); ?></h2>
								<p class="text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Visit Home Page', 'morningtime-lite'); ?></a></p>
							</div><!-- /.entry -->
						</article><!-- /.post -->
					</div><!-- /.content -->
				</div><!-- /.columns large-8 -->
			</div><!-- /.row -->
		</div><!-- /.main-body -->
	</div><!-- /.main -->
<?php get_footer(); ?>