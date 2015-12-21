<?php
/**
 * The template for displaying Author bios
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
?>

<div class="post-author-box">
	<div class="post-author-box-image">
		<?php echo get_avatar(get_the_author_meta( 'user_email' ), 120); ?>
	</div><!-- /.post-author-box-image -->

	<div class="post-author-box-content">
		<h4><?php echo get_the_author(); ?></h4>

		<p><?php the_author_meta('description') ?>
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php printf( __( 'View all posts by %s', 'morningtime-lite' ), get_the_author() ); ?>
		</a>
		</p>
	</div><!-- /.post-author-box-content -->
</div><!-- /.post-author-box -->