<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

if ( post_password_required() ) {
	return;
}

?>

<div class="vlt-page-comments vlt-page-comments--style-1" id="comments">

	<div class="vlt-page-comments__list">

		<div class="container">

			<div class="row">

				<div class="col-lg-8 offset-lg-2">

					<h3 class="vlt-page-comments__title">

						<?php comments_number( esc_html__( 'No comments', 'merge' ) , esc_html__( 'One Comment', 'merge' ) , esc_html__( '% Comments', 'merge' ) ); ?>

					</h3>

					<?php if ( ! have_comments() ) : ?>

						<p><?php esc_html_e( 'Be the first to comment.', 'merge' ); ?></p>

					<?php else: ?>

						<ul class="vlt-comments">

							<?php

								wp_list_comments( array(
									'avatar_size' => 70,
									'style' => 'ul',
									'max_depth' => '3',
									'short_ping' => true,
									'reply_text' => '<span class="vlt-btn__text">' . esc_html__( 'Reply', 'merge' ) . '</span>',
									'callback' => 'merge_callback_custom_comment',
								) );

							?>

						</ul>

						<?php echo merge_get_comment_navigation(); ?>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</div>

	<?php if ( comments_open() ) : ?>

		<div class="vlt-page-comments__form">

			<div class="container">

				<div class="row">

					<div class="col-lg-8 offset-lg-2">

						<?php

							$commenter = wp_get_current_commenter();
							$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

							$args = array(
								'title_reply' => esc_html__( 'Leave a comment:', 'merge' ),
								'title_reply_before' => '<h3 class="vlt-page-comments__title">',
								'title_reply_after' => '</h3>',
								'cancel_reply_before' => '',
								'cancel_reply_after' => '',
								'comment_notes_before' => '',
								'comment_notes_after' => '',
								'title_reply_to' => esc_html__( 'Leave a Reply', 'merge' ),
								'cancel_reply_link' => esc_html__( 'Cancel Reply', 'merge' ),
								'submit_button' => '<button type="submit" id="%2$s" class="%3$s"><span class="vlt-btn__text">%4$s</span></button>',
								'class_submit' => 'vlt-btn vlt-btn--effect vlt-btn--primary vlt-btn--rounded',
								'comment_field' => '<div class="vlt-form-group"><textarea id="comment" name="comment" rows="5" class="vlt-form-control style-2" placeholder="' . esc_attr__( 'Comment', 'merge' ) . '"></textarea></div>',
								'fields' => array(
									'cookies' => false,
									'author' => '<div class="vlt-form-row two-col"><div class="vlt-form-group"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="vlt-form-control style-2" placeholder="' . esc_attr__( 'Your Name*', 'merge' ) . '"></div>',
									'email' => '<div class="vlt-form-group"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" class="vlt-form-control style-2" placeholder="' . esc_attr__( 'Email Address*', 'merge' ) . '"></div></div>',
									'url' => false,
									'cookies' => '<div class="vlt-form-group"><label class="vlt-checkbox" for="wp-comment-cookies-consent">' . sprintf( '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" class="d-none" value="yes"%s />', $consent ) .'<span class="vlt-checkbox__checkmark"></span>' . esc_attr__( 'Save my name &amp; email in this browser for next time I comment.', 'merge' ) . '</label></div>',
								),
							);

							comment_form( $args );

						?>

					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

</div>
<!-- /.vlt-page-comments -->