<?php
/**
 * Custom comment walker for this theme.
 *
 * @package WordPress
 * @subpackage apps
 * @since Apps 1.0
 */

if ( ! class_exists( 'Farzaa_Walker_Comment' ) ) {
	class Farzaa_Walker_Comment extends Walker_Comment {
		protected function html5_comment( $comment, $depth, $args ) {
			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
			?>
			<<?php echo esc_attr($tag);?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
				<div id="div-comment-<?php comment_ID(); ?>" class="comment-list-item d-flex">
					<?php
					$comment_author_url = get_comment_author_url( $comment );
					$comment_author     = get_comment_author( $comment );
					$avatar             = get_avatar( $comment, $args['avatar_size'] );

					echo "<div class='comment-list-img mr-20'><div class='comment-avater-img'>";
					if ( 0 !== $args['avatar_size'] ) {
						if ( empty( $comment_author_url ) ) {
							echo wp_kses_post( $avatar );
						} else {
							printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url );
							echo wp_kses_post( $avatar );
							echo "</a>";
						}
					}
					echo "</div></div>";

					echo "<div class='comment-list-content'>";
					echo "<div class='comment-contenet'>";
					echo '<div class="apps-fz-comment-top-head-778">';
					echo "<h6 class='comment-title'>";
					printf(
						'<span class="fn">%1$s</span>',
						esc_html( $comment_author ),
						__( 'says:', 'apps' )
					);
					echo "</h6>";
					echo '</div>';
					echo '<p class="comment-text">';
					echo get_comment_text();
					if ( '0' === $comment->comment_approved ) {
						?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'apps' ); ?></p>
						<?php
					}
					echo '</p>';
					$comment_reply_link = get_comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'    => '<div class="apps-fz-comment-replay-btn-448">',
								'after'     => '</div>',
							)
						)
					);
					echo $comment_reply_link; // Echo the reply form link
					echo "</div>";
					echo "</div>";
					?>
				</div><!-- .comment-body -->
			<?php
		}
	}
}