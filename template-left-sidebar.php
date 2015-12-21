<?php
/**
 * Template Name: Left Sidebar
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
			<div class="columns large-8 right">
				<div class="content">
					<?php get_template_part('content', 'page' ); ?>
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
					<?php get_sidebar('page'); ?>
				</div><!-- /.sidebar -->
			</div><!-- /.columns large-4 -->

		</div><!-- /.row -->
	</div><!-- /.main-body -->
</div><!-- /.main -->
<?php get_footer(); ?>