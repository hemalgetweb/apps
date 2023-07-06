<?php
    $author_firstname = '';
    $author_lastname = '';
    $author_name = '';
    $user_role = '';
    $author_biography = '';
    if(!empty(get_user_meta(get_the_author_meta('ID')))) {
        $author_firstname = esc_html(get_user_meta(get_the_author_meta('ID'), 'first_name')[0]) ? esc_html(get_user_meta(get_the_author_meta('ID'), 'first_name')[0]): '';
        $author_lastname = esc_html(get_user_meta(get_the_author_meta('ID'), 'last_name')[0]) ? esc_html(get_user_meta(get_the_author_meta('ID'), 'last_name')[0]): '';
        $author_name = empty($author_name) ?  esc_html(get_user_meta(get_the_author_meta('ID'), 'nickname')[0]): $author_name;
        $author_biography = get_user_meta(get_the_author_meta('ID'), 'description')[0];
        $user_role = esc_html(get_userdata(get_the_author_meta('ID'))->roles[0]) ? esc_html(get_userdata(get_the_author_meta('ID'))->roles[0]): '';
    }
    if(!empty($author_firstname)) {
        $author_name = $author_firstname.' '.$author_lastname;
    }
    $author_image = get_avatar(get_the_author_meta('ID'));
    $content_bottom_margin = empty(comments_open(get_the_ID()) && is_single()) ? 'mb-0' : '';
?>
<div class="blog-bottom-box radius-12 p-4 ">
    <div
        class="authors text-decoration-none d-flex justify-content-center flex-wrap flex-xl-nowrap gap-4 align-items-center">
        <?php if(!empty($author_image)) : ?>
            <?php echo wp_kses_post($author_image); ?>
        <?php endif; ?>
        <div class="text-center text-xl-start">
        <?php if(!empty($author_name)) : ?>
            <h5 class="authure-name fs-5 fw-bold text-clr-dark1 mb-2"><?php echo esc_html($author_name); ?></h5>
        <?php endif; ?>
        
            <?php if(!empty($author_biography)) : ?>
                <p class="authure-name fs-5 text-clr-dark2 fw-normal mb-0"><?php echo $author_biography; ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>