<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>
<!-- news area start -->
<div class="news-area">
    <div class="container">
        <div class="ayaa-featured-section-top-wrap">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 mb-10 mb-md-0">
                    <?php if (!empty($settings['section_title'])) : ?>
                        <div class="ayaa-section-title-wrapper-1">
                            <h3 class="ayaa-section-title-1"><?php echo cb_core_kses_basic($settings['section_title']); ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <?php if (!empty($settings['btn_text'])) : ?>
                        <div class="text-center text-md-end">
                            <a <?php echo $this->get_render_attribute_string('btn_link'); ?> class="ayaa-rv-theme-text-btn"><?php echo cb_core_kses_basic($settings['btn_text']); ?> <i class="fa-solid fa-long-arrow-right"></i></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ($wp_query->have_posts()) : ?>
            <div class="row pt-50">
                <div class="col-xxl-7 col-xl-12">
                    <div class="ayaa-rv-news-wrapper mb-30 mb-xxl-0">
                        <div class="row">
                            <?php
                            $index = 0;
                            while ($wp_query->have_posts()) : $wp_query->the_post();
                            ?>
                                <?php if ($index < 2) :
                                    $category_id = get_the_category(get_the_ID())[0]->term_id;
                                    $category_url = get_category_link($category_id);
                                ?>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 mb-30 mb-md-0">
                                        <div class="ayaa-rv-news-box">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="ayaa-rv-news-box-image">
                                                    <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                                        <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="ayaa-rv-news-box-content">
                                                <div class="ayaa-rv-news-box-meta pb-10">
                                                    <a href="<?php echo esc_url($category_url); ?>" class="category"><?php echo cb_core_kses_basic(cb_loop_category(get_the_ID())); ?></a>
                                                    <span><?php echo esc_html(get_the_date('', get_the_ID())); ?></span>
                                                </div>
                                                <h5 class="ayaa-rv-news-box-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 11)); ?></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php $index++;
                            endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5">
                    <div class="ayaa-rv-list-news-wrapper">
                        <div class="row justify-content-center">
                            <?php
                            $index = 0;
                            while ($wp_query->have_posts()) : $wp_query->the_post();
                            ?>
                                <?php if ($index >= 2 && $index <= 4) :
                                    $category_id = get_the_category(get_the_ID())[0]->term_id;
                                    $category_url = get_category_link($category_id);
                                ?>
                                    <div class="col-xxl-12 col-xl-6 col-lg-6">
                                        <div class="ayaa-rv-news-box-list mb-30">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="image">
                                                    <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?></a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="content">
                                                <div class="ayaa-rv-news-box-meta pb-10">
                                                    <a href="<?php echo esc_url($category_url); ?>" class="category"><?php echo cb_core_kses_basic(cb_loop_category(get_the_ID())); ?></a>
                                                    <span><?php echo esc_html(get_the_date('', get_the_ID())); ?></span>
                                                </div>
                                                <h5 class="ayaa-rv-news-box-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 14)); ?> </a></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php $index++;
                            endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- news area end -->