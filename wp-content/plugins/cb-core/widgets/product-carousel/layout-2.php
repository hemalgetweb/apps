<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>
<!-- trending product area start -->
<section class="trending-product-area pt-80 pb-40">
    <div class="container">
        <div class="ayaa-fz-trending-product-top-2  pb-15 has-border-gray-bottom">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 mb-20 mb-md-0">
                    <?php if (!empty($settings['product_carousel_title'])) : ?>
                        <div class="ayaa-fz-seciton-title-wrapper-2">
                            <h4 class="ayaa-fz-section-title-2 text-center text-md-start"><?php echo esc_html($settings['product_carousel_title']); ?></h4>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <?php if (!empty($settings['show_carousel_arrow'])) : ?>
                        <div class="ayaa-fz-trending-product-arrow-wrapper-2">
                            <button class="ayaa-fz-nav-arrow-2 ayaa-trending-prev"><i class="fa-light fa-angle-left"></i><i class="fa-light fa-angle-left"></i></button>
                            <button class="ayaa-fz-nav-arrow-2 ayaa-trending-next"><i class="fa-light fa-angle-right"></i><i class="fa-light fa-angle-right"></i></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="ayaa-fz-trending-product-content-wrapper-2 pt-50">
            <?php if ($wp_query->have_posts()) : ?>
                <div class="ayaa-fz-trending-product-active-2 swiper-container">
                    <div class="swiper-wrapper">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post();
                            global $product;
                            $price_html = $product->get_price_html();
                        ?>
                            <div class="swiper-slide">
                                <div class="ayaa-fz-product-box-2 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="image">
                                        <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                            <a class="img" data-bgcolor="#f8f8f8" href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <div class="ayaa-fz-product-badge-wrapper-2 has-pos">
                                            <?php if (!empty(sale_badge_percentage())) : ?>
                                                <span class="ayaa-fz-product-discount-percent-box-2"><?php echo esc_html__('-', 'cb-core'); ?><?php echo sale_badge_percentage(); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                                            <?php endif; ?>
                                            <?php if ($product->is_on_sale()) : ?>
                                                <span class="ayaa-fz-product-discount-percent-box-2 style-2" data-bgcolor="#00274c"><?php echo esc_html__('Sale', 'cb-core'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php cb_core_product_wraps_active_layout(); ?>
                                    </div>
                                    <div class="content">
                                        <?php if (!empty(cb_core_wc_get_review_layout())) : ?>
                                            <?php echo cb_core_wc_get_review_layout(); ?>
                                        <?php endif; ?>
                                        <?php if (!empty(get_the_title())) : ?>
                                            <h6 class="title"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 30)); ?></a></h6>
                                        <?php endif; ?>
                                        <div class="price-wrap">
                                            <?php echo wp_kses_post($price_html); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- trending product area end -->