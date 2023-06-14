<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>
<!-- hand picked product start -->
<div class="hand-picked-product-area">
    <div class="container">
        <div class="ayaa-featured-section-top-wrap has-ayaa-hand-picked-space-top">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 mb-10 mb-md-0">
                    <?php if (!empty($settings['product_carousel_title'])) : ?>
                        <div class="ayaa-section-title-wrapper-1">
                            <h3 class="ayaa-section-title-1"><?php echo esc_html($settings['product_carousel_title']); ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-3">
                    <?php if (!empty($settings['show_carousel_arrow'])) : ?>
                        <div class="ayaa-rv-hand-picked-product-arrow">
                            <button class="ayaa-rv-arrow ayaa-rv-arrow-left"><i class="fa-light fa-long-arrow-left"></i><i class="fa-light fa-long-arrow-left"></i></button>
                            <button class="ayaa-rv-arrow ayaa-rv-arrow-right"><i class="fa-light fa-long-arrow-right"></i><i class="fa-light fa-long-arrow-right"></i></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="ayaa-rv-hand-picked-product-carousel-wrapper pt-50">
            <?php if ($wp_query->have_posts()) : ?>
                <div class="ayaa-rv-hand-picked-product-carousel-active swiper-container">
                    <div class="swiper-wrapper">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post();
                            global $product;
                            $price_html = $product->get_price_html();
                        ?>
                            <div class="swiper-slide">
                                <div class="ayaa-woo-product-box-1">
                                    <div class="ayaa-woo-product-box-image-1">
                                        <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                            <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <div class="ayaa-woo-product-badge-wrap has-pos">
                                            <?php if (!empty(sale_badge_percentage())) : ?>
                                                <span class="badge-offer"><?php echo sale_badge_percentage(); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                                            <?php endif; ?>
                                            <?php if ($product->is_on_sale()) : ?>
                                                <span class="badge-onsale"><?php echo esc_html__('Sale', 'cb-core'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php cb_core_product_wraps_active_2(); ?>
                                    </div>
                                    <div class="ayaa-woo-product-box-content-1 text-center">
                                        <?php if (!empty(cb_core_wc_get_review_2())) : ?>
                                            <?php echo cb_core_wc_get_review_2(); ?>
                                        <?php endif; ?>
                                        <?php if (!empty(get_the_title())) : ?>
                                            <h6 class="ayaa-title"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 11)); ?></a></h6>
                                        <?php endif; ?>
                                        <div class="ayaa-woo-productg-price-wrap">
                                            <span class="ayaa-price"><?php echo wp_kses_post($price_html); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row pt-10">
                <div class="col-xxl-12">
                    <div class="text-center">
                        <?php if (!empty($settings['btn_text'])) : ?>
                            <a <?php echo $this->get_render_attribute_string('btn_link'); ?> class="ayaa-rv-theme-btn"><span><?php echo cb_core_kses_basic($settings['btn_text']); ?></span><span><?php echo cb_core_kses_basic($settings['btn_text']); ?></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hand picked product end -->