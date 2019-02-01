<?php
/**
 * The main template file.
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
 ?>

 <?php get_header(); ?>
 	<div class="main">
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

				<?php morning_time_lite_pagination() ?>

			</div><!-- /.columns large-8 -->

			<div class="columns large-4">
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div><!-- /.sidebar -->
			</div><!-- /.columns large-4 -->
		</div><!-- /.row -->
	</div><!-- /.main -->
 <?php get_footer(); ?>
