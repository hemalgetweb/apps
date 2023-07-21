<?php
$cbtoolkit_blog_btn_switch = get_theme_mod('cbtoolkit_blog_btn_switch', true);
$cbtoolkit_blog_meta_switch = get_theme_mod('cbtoolkit_blog_meta_switch', true);
$cbtoolkit_blog_author_switch = get_theme_mod('cbtoolkit_blog_author_switch', true);
$cbtoolkit_blog_date_switch = get_theme_mod('cbtoolkit_blog_date_switch', true);
$cbtoolkit_blog_comments_switch = get_theme_mod('cbtoolkit_blog_comments_switch', true);
$cbtoolkit_blog_btn_text = get_theme_mod('cbtoolkit_blog_btn_text', __('Read More', 'apps'));

?>
<div class="col-xl-4 col-sm-6 col-sm-6 mb-4">
    <div id="post-<?php the_ID(); ?>" <?php post_class('single-blog bg-white p-3 p-xl-4 radius-6 box-shadow2'); ?>>
        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) :
        $att = get_post_thumbnail_id();
            $image_src = wp_get_attachment_image_src($att, 'full');
            if (!empty($image_src)) {
                $image_src = $image_src[0];
            }
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
        <div class="blog-img mb-2 radius-6 overflow-hidden">
            <img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
        </div>
        <?php endif; ?>
        <div class="blog-info ">
            <div class="feature-top">
                <?php if(!empty($first_cat_name)) : ?>
                <a href="<?php echo esc_url($first_cat_url); ?>">
                    <span
                        class="section-tag fs-12 fw-bold text-uppercase text-clr-dark4 d-inline-flex gap-2 align-items-center mb-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-process-icon.svg" alt="icon"
                            class="img-fluid">
                        <?php echo $first_cat_name; ?>
                    </span>
                </a>
                <?php endif; ?>
                <h3 class="blog-title fs-18 lh-base fw-medium">
                    <a href="<?php echo get_the_permalink(); ?>" class="text-decoration-none text-clr-dark1">
                        <?php echo wp_trim_words( get_the_title(), 7 ); ?>
                    </a>
                </h3>
                <div class="blog-intro fs-14 text-clr-dark2 mb-0">
                    <p class="">
                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                    </p>
                </div>
            </div>
            <a href="<?php echo get_the_permalink(); ?>"
                class="text-decoration-none fs-12 fw-bold text-clr-primary text-uppercase d-flex gap-2 align-items-center">
                <?php echo esc_html__('Read more', 'apps'); ?>
                <span class="ni fs-6 ni-arrow-right"></span>
            </a>
        </div>
    </div>
</div>