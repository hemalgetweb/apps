<?php
$cbtoolkit_blog_date_switch = get_theme_mod('cbtoolkit_blog_date_switch', true);
$cbtoolkit_blog_meta_switch = get_theme_mod('cbtoolkit_blog_meta_switch', true);
$cbtoolkit_blog_author_switch = get_theme_mod('cbtoolkit_blog_author_switch', true);
$cbtoolkit_blog_comments_switch = get_theme_mod('cbtoolkit_blog_comments_switch', true);
$apps_content_padding_top = empty(has_post_thumbnail()) ? '' : '';
$apps_cat  = get_the_category(get_the_ID()) ? (array) get_the_category(get_the_ID())[0]: '';
$first_cat_name = '';
$first_cat_id = '';
$first_cat_url = '';
if(!empty($apps_cat)) {
    $first_cat_name = $apps_cat['name'];
    $first_cat_id = $apps_cat['term_id'];
    $first_cat_url = get_category_link( $first_cat_id );
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-blog content-search mb-40'); ?>>
    <div class="apps-fz-blog-thumbnail-content-wrapper-main-448">
        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
            <div class="apps-fz-blog-thumbnail-content-wrap-448">
                <?php
                $att = get_post_thumbnail_id();
                $image_src = wp_get_attachment_image_src($att, 'full');
                if (!empty($image_src)) {
                    $image_src = $image_src[0];
                }
                ?>
                <div class="apps-fz-blog-thumbnail-448 apps-fz-blog-thumbnail-447">
                    <div class="apps-fz-thumbnail-image"><img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>"></div>
                    <?php if (!empty($cbtoolkit_blog_date_switch)) : ?>
                        <div class="apps-blog-caption-date-447">
                            <span class="day"><?php print esc_html(get_the_date('d', get_the_ID())); ?></span>
                            <span class="month"><?php print esc_html(get_the_date('M', get_the_ID())); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($cbtoolkit_blog_meta_switch)) : ?>
                        <div class="apps-blog-meta-in-box-447 d-none d-sm-flex">
                            <?php if (!empty($cbtoolkit_blog_author_switch)) : ?>
                                <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_avatar(get_the_author_meta('ID')); ?><?php print esc_html(get_the_author()); ?></a>
                            <?php endif; ?>
                            <?php if(!empty($first_cat_name)) : ?>
                                <a href="<?php echo esc_url($first_cat_url) ? esc_url($first_cat_url): ''; ?>"><?php echo esc_html($first_cat_name); ?></a>
                            <?php endif; ?>
                            <?php if (!empty($cbtoolkit_blog_comments_switch)) : ?>
                                <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (!empty(get_the_content())) : ?>
            <div class="apps-fz-blog-details-contant-main-wrap-448 apps-fz-blog-content-447 <?php echo esc_attr($apps_content_padding_top); ?>">
                <?php if (get_the_title()) : ?>
                <h4 class="apps-fz-blog-title-447"><?php the_title(); ?></h4>
            <?php endif; ?>

            <?php if (!empty($cbtoolkit_blog_meta_switch)) : ?>
                <div class="apps-fz-blog-meta-wrap-447 mb-15 d-sm-none">
                    <?php if (!empty($cbtoolkit_blog_author_switch)) : ?>
                        <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fal fa-user"></i><?php print esc_html(get_the_author()); ?></a>
                    <?php endif; ?>
                    <?php if(!empty($first_cat_name)) : ?>
                        <a href="<?php echo esc_url($first_cat_url) ? esc_url($first_cat_url): ''; ?>"><i class="fal fa-tag"></i><?php echo esc_html($first_cat_name); ?></a>
                    <?php endif; ?>
                    <?php if (!empty($cbtoolkit_blog_comments_switch)) : ?>
                        <a href="<?php comments_link(); ?>"><i class="fal fa-comments"></i><?php comments_number(); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
                <?php the_content(); ?>
                <?php
                wp_link_pages([
                    'before'      => '<div class="page-links">' . esc_html__('Pages:', 'apps'),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ]);
                ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="apps-blog-details-tag pt-40">
        <div class="row align-items-center">
            <div class="col-12">
                <?php if(has_category( '', get_the_ID() )) : ?>
                <div class="apps-fz-has-category mb-15">
                    <span class="apps-fz-tagcloud-label-448 mr-25"><?php echo esc_html__('Category:', 'apps'); ?> </span><?php echo get_the_category_list(', ', '', get_the_ID()); ?>
                </div>
                <?php endif; ?>
                <?php if (!empty(apps_get_tag())) : ?>
                <?php print apps_get_tag(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>