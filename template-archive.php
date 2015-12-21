<?php
/**
 * Template Name: Archive
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
				<div class="columns large-8 left">
					<div class="content">
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

										<!-- Archive -->
										<?php foreach(morning_time_lite_posts_by_year() as $year => $posts) : ?>
											<div class="row">
												<div class="large-12 columns archive-year">
													<?php echo esc_html( $year ); ?>
												</div>
											</div>

											<?php foreach($posts as $post) : setup_postdata($post); ?>
												<div class="row rowtest">
													<div class="small-4 medium-2 columns"><div class="archive-date"><?php morning_time_lite_get_dates() ?><sup><?php the_time( 'S') ?></sup></div></div>
													<div class="small-8 medium-10 columns archive-links"><a href="<?php the_permalink(); ?>"><?php if ( get_the_title() ) { the_title(); } else { echo esc_html(get_the_date() ); } ?></a></div>
												</div>
											<?php endforeach; ?>

										<?php endforeach; ?>
									</div><!-- /.entry -->
								</article><!-- /.post -->
							<?php endwhile; endif; ?>
							<?php wp_reset_postdata(); ?>
					</div><!-- /.content -->

				</div><!-- /.columns large-8 -->

				<div class="columns large-4 right">
					<div class="sidebar">
						<?php get_sidebar('page'); ?>
					</div><!-- /.sidebar -->
				</div><!-- /.columns large-4 -->



			</div><!-- /.row -->
		</div><!-- /.main-body -->
	</div><!-- /.main -->
<?php get_footer(); ?>