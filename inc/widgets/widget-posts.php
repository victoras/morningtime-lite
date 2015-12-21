<?php
/*
 * Widget Name: Posts Widget
 * Description: Add Posts to home page
*/

add_action('widgets_init', create_function('', 'return register_widget("wplook_posts_widget");'));
class wplook_posts_widget extends WP_Widget {


	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		parent::__construct(
	 		'wplook_posts_widget',
			'WPlook Posts',
			array( 'description' => __( 'A widget for displaying latest posts', 'morningtime-lite' ), )
		);
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the options form on admin
	/*-----------------------------------------------------------------------------------*/

	public function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$categories = esc_attr( $instance[ 'categories' ] );
			$nr_posts = esc_attr( $instance[ 'nr_posts' ] );
		}
		else {
			$title = __( 'Posts', 'morningtime-lite' );
			$categories = __( 'All', 'morningtime-lite' );
			$nr_posts = 4;
		}
		?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"> <?php _e('Title:', 'morningtime-lite'); ?> </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>">
					<?php _e('Category:', 'morningtime-lite'); ?>
					<br />
				</label>

				<?php wp_dropdown_categories(
					array(
						'name'	=> $this->get_field_name("categories"),
						'show_option_all'    => __('All', 'morningtime-lite'),
						'show_count'	=> 1,
						'selected' => $categories,
						'taxonomy'  => 'category'
					)
				); ?>

			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('nr_posts')); ?>"> <?php _e('Number of Posts:', 'morningtime-lite'); ?> </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('nr_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('nr_posts')); ?>" type="text" value="<?php echo esc_attr($nr_posts); ?>" />
				<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;"> <?php _e('Number of posts you want to display', 'morningtime-lite'); ?></p>
			</p>

		<?php
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Processes widget options to be saved
	/*-----------------------------------------------------------------------------------*/

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['categories'] = sanitize_text_field($new_instance['categories']);
		$instance['nr_posts'] = sanitize_text_field($new_instance['nr_posts']);
		return $instance;
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the content of the widget
	/*-----------------------------------------------------------------------------------*/

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$categories = isset( $instance['categories'] ) ? esc_attr( $instance['categories'] ) : '';
		$nr_posts = isset( $instance['nr_posts'] ) ? esc_attr( $instance['nr_posts'] ) : '';

			if ( $categories < '1' ) {
				$args = array(
					'ignore_sticky_posts'=> 1,
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => $nr_posts,
				);
			} else {
				$args = array(
					'ignore_sticky_posts'=> 1,
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => $nr_posts,
					'cat' => $categories
				);
			}

			$posts = null;
			$posts = new WP_Query( $args ); ?>

			<?php if( $posts->have_posts() ) : ?>

				<!-- Latest Posts -->

				<aside class="widget widget_posts">
					<?php if ( $title ) { ?>
						<h2 class="widget-title"><?php echo esc_html($title); ?></h2><!-- /.widget-title -->
					<?php } ?>

					<?php while( $posts->have_posts() ) : $posts->the_post(); ?>

						<article class="post-small">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="post-small-image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('morning-time-lite-post-thumb'); ?>
									</a>
								</div><!-- /.post-small-image -->
							<?php } ?>

							<div class="post-small-content">
								<h4 class="post-small-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h4><!-- /.post-small-title -->

								<div class="post-small-entry">
									<p><?php echo esc_html(morning_time_lite_short_excerpt('25'));?></p>
								</div><!-- /.post-small-entry -->
							</div><!-- /.post-small-content -->
						</article><!-- /.post-small -->

					<?php endwhile; wp_reset_postdata(); ?>

				</aside><!-- /.widget widget_posts -->

			<?php endif; ?>
		<?php
	}
}
?>