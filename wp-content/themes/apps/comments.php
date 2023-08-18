<?php
if (have_comments()) :
    // Display comment list
    ?>
    <h3><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></h3>
    <ol class="comment-list mb-30">
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
    comment_form();
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
    $comment_user_id = get_comment(get_comment_ID())->user_id;
    $comment_user = get_userdata($comment_user_id);

    if ($comment_user) {
        $user_roles = $comment_user->roles;
        $user_designation = ucfirst($user_roles[0]); // Use the first role as the designation
    }
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

        <div class="apps-comment-box-single-blog-114">
            <div class="apps-comment-box-single-blog-image-114">
                <?php echo get_avatar($comment, 73); ?>
            </div>
            <div class="apps-comment-box-single-blog-content-114">
                <div class="apps-comment-meta-top-114">
                    <h5 class="apps-comment-title-114"><?php comment_author_link(); ?></h5>
                    <?php if (!empty($user_designation)) : ?>
                        <span class="apps-comment-subtitle"><?php echo $user_designation; ?></span>
                    <?php endif; ?>
                </div>
                <div class="apps-comment-content-main-114">
                    <?php comment_text(); ?>
                </div>
                <div class="reply">
                <?php
                    comment_reply_link(array_merge($args, array(
                        'reply_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M3.375 14.25V11.325C3.375 10.575 3.61875 9.95625 4.10625 9.46875C4.59375 8.98125 5.2125 8.7375 5.9625 8.7375H13.575L10.5187 11.7938L11.325 12.6L15.75 8.175L11.325 3.75L10.5187 4.55625L13.575 7.6125H5.9625C4.9 7.6125 4.01562 7.96563 3.30937 8.67188C2.60312 9.37813 2.25 10.2625 2.25 11.325V14.25H3.375Z" fill="#1F516D"/> </svg> Reply',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth']
                    )));
                    ?>
                </div>
            </div>
        </div>
    </li>
    <?php
}
?>