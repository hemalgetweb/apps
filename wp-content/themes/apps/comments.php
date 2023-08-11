<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apps
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
?>
	<div id="comments" class="comments-area">
		<div class="comments-title-wrap mb-35">
			<h5 class="comments-title">
				<?php
				$apps_comment_count = get_comments_number();
				if ( '1' === $apps_comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__('1 Comment', 'apps')
					);
				} else {
					printf( 
						esc_html($apps_comment_count.' Comments')
					);
				}
				?>
			</h5><!-- .comments-title -->
		</div>
		<?php the_comments_navigation(); ?>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'walker'      => new Farzaa_Walker_Comment(),
					'style'      => 'ol',
					'avatar_size' => 100,
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		

	</div><!-- #comments -->
<?php