<?php
if (have_comments()) :
    // Display comment list
    ?>
    <h3><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></h3>
    <ol class="comment-list">
        <?php wp_list_comments('callback=custom_comment'); ?>
    </ol>

    <?php
    // Pagination for comments
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
        <nav class="comment-navigation" role="navigation">
            <div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
            <div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
        </nav>
        <?php
    endif;

else : // If there are no comments yet
    if (comments_open()) :
        // Comment form
        comment_form();
    else :
        // Comments are closed
        echo '<p class="alert">Comments are closed.</p>';
    endif;
endif;

// Custom comment display function
function custom_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-author vcard">
            <?php echo get_avatar($comment, 48); ?>
            <cite class="fn"><?php comment_author_link(); ?></cite>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>
        <?php endif; ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                <?php printf('%1$s at %2$s', get_comment_date(), get_comment_time()); ?>
            </a>
            <?php edit_comment_link('Edit', '  ', ''); ?>
        </div>
        <div class="comment-text">
            <?php comment_text(); ?>
        </div>
        <div class="reply">
            <?php
            comment_reply_link(array_merge($args, array(
                'reply_text' => 'Reply',
                'depth' => $depth,
                'max_depth' => $args['max_depth']
            )));
            ?>
        </div>
    </li>
    <?php
}
?>