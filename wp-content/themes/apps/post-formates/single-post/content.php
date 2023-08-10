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
<article id="post-<?php the_ID(); ?>" <?php post_class('single-blog mb-40'); ?>>
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
                        <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_4003_25100)">
<path d="M21 24.0006H18V19.0006C18 18.4702 17.7893 17.9615 17.4142 17.5864C17.0391 17.2113 16.5304 17.0006 16 17.0006H8C7.46957 17.0006 6.96086 17.2113 6.58579 17.5864C6.21071 17.9615 6 18.4702 6 19.0006V24.0006H3V19.0006C3.00159 17.675 3.52888 16.4042 4.46622 15.4668C5.40356 14.5295 6.67441 14.0022 8 14.0006H16C17.3256 14.0022 18.5964 14.5295 19.5338 15.4668C20.4711 16.4042 20.9984 17.675 21 19.0006V24.0006Z" fill="#374957"/>
<path d="M12 11.9999C10.8133 11.9999 9.65328 11.648 8.66658 10.9887C7.67989 10.3294 6.91085 9.39234 6.45673 8.29598C6.0026 7.19963 5.88378 5.99323 6.11529 4.82934C6.3468 3.66545 6.91825 2.59635 7.75736 1.75724C8.59648 0.918125 9.66557 0.34668 10.8295 0.115169C11.9933 -0.116342 13.1997 0.00247765 14.2961 0.456603C15.3925 0.910729 16.3295 1.67976 16.9888 2.66646C17.6481 3.65315 18 4.81319 18 5.99988C17.9984 7.59069 17.3658 9.11589 16.2409 10.2408C15.116 11.3656 13.5908 11.9983 12 11.9999ZM12 2.99988C11.4067 2.99988 10.8266 3.17583 10.3333 3.50547C9.83994 3.83512 9.45543 4.30365 9.22836 4.85183C9.0013 5.40001 8.94189 6.00321 9.05765 6.58515C9.1734 7.16709 9.45912 7.70164 9.87868 8.1212C10.2982 8.54076 10.8328 8.82648 11.4147 8.94224C11.9967 9.05799 12.5999 8.99858 13.1481 8.77152C13.6962 8.54446 14.1648 8.15994 14.4944 7.66659C14.8241 7.17324 15 6.59322 15 5.99988C15 5.20423 14.6839 4.44117 14.1213 3.87856C13.5587 3.31595 12.7957 2.99988 12 2.99988Z" fill="#374957"/>
</g>
<defs>
<clipPath id="clip0_4003_25100">
<rect width="24" height="24" fill="white"/>
</clipPath>
</defs>
</svg>
<?php print esc_html(get_the_author()); ?></a>
                    <?php endif; ?>
                    <?php if(!empty($first_cat_name)) : ?>
                        <a href="<?php echo esc_url($first_cat_url) ? esc_url($first_cat_url): ''; ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_4003_24456)">
<path d="M18.317 9H23.647L24 6H18.677L19.4 0H16.379L15.659 6H9.783L10.503 0H7.485L6.764 6H0.353L0 9H6.4L5.679 15H0.353L0 18H5.323L4.6 24H7.621L8.341 18H14.217L13.497 24H16.515L17.236 18H23.647L24 15H17.6L18.317 9ZM8.7 15L9.42 9H15.3L14.58 15H8.7Z" fill="#374957"/>
</g>
<defs>
<clipPath id="clip0_4003_24456">
<rect width="24" height="24" fill="white"/>
</clipPath>
</defs>
</svg>
<?php echo esc_html($first_cat_name); ?></a>
                    <?php endif; ?>
                    <?php if (!empty($cbtoolkit_blog_comments_switch)) : ?>
                        <a href="<?php comments_link(); ?>"><span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_4003_22673)">
<path d="M21 0H3C2.20435 0 1.44129 0.31607 0.87868 0.87868C0.31607 1.44129 0 2.20435 0 3L0 20H6.9L10.708 23.218C11.069 23.5231 11.5264 23.6905 11.999 23.6905C12.4716 23.6905 12.929 23.5231 13.29 23.218L17.1 20H24V3C24 2.20435 23.6839 1.44129 23.1213 0.87868C22.5587 0.31607 21.7956 0 21 0V0ZM22 18H16.366L12 21.69L7.634 18H2V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H21C21.2652 2 21.5196 2.10536 21.7071 2.29289C21.8946 2.48043 22 2.73478 22 3V18Z" fill="#374957"/>
<path d="M12 5.00012H6V7.00012H12V5.00012Z" fill="#374957"/>
<path d="M18 9H6V11H18V9Z" fill="#374957"/>
<path d="M18 12.9999H6V14.9999H18V12.9999Z" fill="#374957"/>
</g>
<defs>
<clipPath id="clip0_4003_22673">
<rect width="24" height="24" fill="white"/>
</clipPath>
</defs>
</svg>
</span><?php comments_number(); ?></a>
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