<?php
/**
 * Comments List for page/post/image
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
*/

if ( ! function_exists( 'morning_time_lite_comment' ) ) {
function morning_time_lite_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	?>
		<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
			<?php if ( 'div' != $args['style'] ) : ?>
				<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<?php endif; ?>
		<article>

			<header class="entry-header comment-author">

						<div class="comment-image">
							<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
						</div>

						<?php printf( '<div class="comment-author-name fn">%s</div>', get_comment_author_link() ); ?>

						<div class="posted-on">
							<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
								<?php printf( __('%1$s at %2$s', 'morningtime-lite'), get_comment_date(),  get_comment_time() ); ?>
							</a>
						</div>
			</header>

			<div class="comment-text">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'morningtime-lite' ); ?></em>
					<br />
				<?php endif; ?>
					<?php comment_text(); ?>
			</div>

			<footer class="entry-footer comment-meta commentmetadata">
				<div class="reply-link">
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
			</footer>
		</article>
		<?php if ( 'div' != $args['style'] ) : ?>
			</div>
		<?php endif; ?>
	<?php
	}
}


function morning_time_lite_comment_form( $args = array(), $post_id = null ) {
	global $user_identity, $id;
	if ( null === $post_id ) {
		$post_id = $id;
	} else {
		$id = $post_id;
	}
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(

		'author' => '<p class="comment-form-author columns medium-4">' . '<label for="author">' . __( 'Name', 'morningtime-lite' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email columns medium-4"><label for="email">' . __( 'Email', 'morningtime-lite' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url columns medium-4"><label for="url">' . __( 'Website', 'morningtime-lite' ) . '</label>' .
		'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);
	$required_text = sprintf( ' ' . __('Required fields are marked %s', 'morningtime-lite' ), '<span class="required"><a>*</a></span>' );
	$defaults = array(
		'fields'		=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'		=> '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'morningtime-lite' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in'		=> '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'morningtime-lite' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'		=> '<p class="logged-in-as columns medium-12">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'morningtime-lite' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes columns medium-12">' . __( 'Your email address will not be published.', 'morningtime-lite' ) . ( $req ? $required_text : '' ) . '</p>',
		'id_form'						=> 'commentform',
		'id_submit'					=> 'submit',
		'title_reply'				=> __( 'Leave a Comment', 'morningtime-lite' ),
		'title_reply_to'		=> __( 'Leave a Reply to %s', 'morningtime-lite' ),
		'cancel_reply_link'	=> __( 'or Cancel reply', 'morningtime-lite' ),
		'label_submit'			=> __( 'Send Comment', 'morningtime-lite' ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );	?>
		<?php if ( comments_open() ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			<div id="respond" class="respond">
				<header class="page-header"><h3 class="comment-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?>   <?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></h3></header>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
						<div class="row">
							<?php do_action( 'comment_form_top' ); ?>
							<?php if ( is_user_logged_in() ) : ?>
								<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
								<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
							<?php else : ?>
								<?php echo $args['comment_notes_before']; ?>
								<?php
								do_action( 'comment_form_before_fields' );
								foreach ( (array) $args['fields'] as $name => $field ) {
									echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
								}
							do_action( 'comment_form_after_fields' );
							?>
							<?php endif; ?>

							<?php do_action( 'comment_form', $post_id ); ?>
						</div>

						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
							<?php //echo $args['comment_notes_after']; ?>
							<p class="form-submit">
								<input class="button tiny grey" name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
								<?php comment_id_fields(); ?>
							</p>
					</form>
				<?php endif; ?>
			</div><!-- #respond -->
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}
