<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>
<!-- news area start -->
<section class="news-area">
    <div class="container">
        <div class="ayaa-fz-news-top-wrapper-2 pb-20 mb-50 has-border-gray-bottom">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <?php if(!empty($settings['section_title'])) : ?>
                    <div class="ayaa-fz-seciton-title-wrapper-2 mb-15">
                        <h4 class="ayaa-fz-section-title-2 text-center text-md-start"><?php echo cb_core_kses_basic($settings['section_title']); ?></h4>
                    </div>
                    <?php endif;?>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <?php if(!empty($settings['btn_text'])) : ?>
                    <div class="text-center text-md-end">
                        <a href="<?php echo esc_url($settings['btn_link']['url']) ? esc_url($settings['btn_link']['url']): ''; ?>" class="ayaa-fz-hero-product-shop-btn-2"><?php echo esc_html($settings['btn_text']); ?> <i class="fa-light fa-long-arrow-right"></i></a>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php if ($wp_query->have_posts()) : ?>
            <div class="ayaa-fz-news-main-wrapper-2">
                <div class="row">
                    <?php
                        $index = 0;
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                    ?>
                    <div class="col-xxl-4 col-xl-6 col-lg-6">
                        <div class="ayaa-fz-news-box-2 wow fadeInUp mb-30">
                            <?php if(has_post_thumbnail()) : ?>
                            <div class="image">
                                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a>
                            </div>
                            <?php endif;?>
                            <div class="content">
                                <div class="ayaa-fz-news-box-meta-2">
                                    <span><?php echo cb_core_kses_basic(cb_loop_category(get_the_ID())); ?></span>
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                                <h5 class="ayaa-fz-news-box-title-2"><a href="<?php echo get_the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 6); ?></a></h5>
                            </div>
                        </div>
                    </div>
                    <?php $index++;endwhile;?>
                </div>
            </div>

        <?php endif;?>
    </div>
</section>
<!-- news area end -->