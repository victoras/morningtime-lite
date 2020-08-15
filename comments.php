<?php
/**
 * The template for displaying Comments.
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
?>

<a name="comments"></a>
<div class="comments">
	<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'morningtime-lite' ); ?></p>
</div>
<!-- #comments -->

<?php return; endif; ?>
<?php if ( have_comments() ) : ?>

	<header class="comment-header">
		<h3 class="comment-title"><?php	printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'morningtime-lite' ),	number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );	?>, <a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Comments RSS', 'morningtime-lite'); ?>"><?php _e('RSS', 'morningtime-lite'); ?></a></h3>
	</header>

	<ol class="commentlist">
		<?php	wp_list_comments(
			array(
				'callback' => 'morning_time_lite_comment',
				'avatar_size' => 60,
			)
		); ?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="nav-below">
			<div class="nav-previous fleft"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'morningtime-lite' ) ); ?></div>
			<div class="nav-next fright"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'morningtime-lite' ) ); ?></div>
			<div class="clear"></div>
		</nav> <!-- .navigation -->
	<?php endif; // check for comment navigation ?>

<?php endif; // end have_comments() ?>

<?php  // or, if we don't have comments:
	if ( ! comments_open()  && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'morningtime-lite' ); ?></p>

<?php endif; // end ! comments_open() ?>
<?php morning_time_lite_comment_form(); ?>
</div>
<!-- end #comments -->
