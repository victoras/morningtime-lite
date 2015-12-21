<?php
/**
 * The template for displaying all single posts and attachments
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
			<div class="columns large-8">
				<div class="content">
					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>

						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>
				</div><!-- /.content -->

					<section class="section-comments">
						<div class="row">
							<div class="columns small-12">

								<?php comments_template( '', true ); ?>

							</div><!-- /.columns small-12 -->
						</div><!-- /.row -->
					</section><!-- /.section-comments -->

			</div><!-- /.columns large-8 -->

			<div class="columns large-4">
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div><!-- /.sidebar -->
			</div><!-- /.columns large-4 -->
		</div><!-- /.row -->
	</div><!-- /.main-body -->
</div><!-- /.main -->
<?php get_footer(); ?>