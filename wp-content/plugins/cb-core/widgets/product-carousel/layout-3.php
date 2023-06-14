<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>

<!-- ayaa-new-arrival-area-start -->
<div class="ayaa-fz-new-arrival-area pt-100">
    <div class="container">
        <div class="ayaa-fz-section-top-wrapp mb-25">
            <div class="row align-items-center">
                <div class="col-xxl-8 col-md-8 col-sm-8">
                    <div class="ayaa-fz-section-3 text-center text-sm-start">
                        <?php if (!empty($settings['product_carousel_title'])) : ?>
                            <h3 class="ayaa-fz-section-title-3"><?php echo esc_html($settings['product_carousel_title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['product_carousel_desc'])) : ?>
                            <p class="ayaa-fz-section-subtitle "><?php echo esc_html($settings['product_carousel_desc']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4 col-sm-4">
                    <?php if (!empty($settings['show_carousel_arrow'])) : ?>
                        <div class="ayaa-fz-arrival-arrow-navigation mb-15 text-center text-sm-end">
                            <span class="ayaa-fz-arrival-arrow-prev"><i class="fa-thin fa-angle-left"></i></span>
                            <span class="ayaa-fz-arrival-arrow-next"><i class="fa-thin fa-angle-right"></i></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="ayaa-fz-new-arrival-wrapper">
            <?php if ($wp_query->have_posts()) : ?>
                <div class="ayaa-fz-new-arrival-active swiper-container swiper">
                    <div class="swiper-wrapper">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post();
                            global $product;
                            $price_html = $product->get_price_html();
                        ?>
                            <div class="swiper-slide">
                                <div class="ayaa-fz-best-selling-product-3-item">
                                    <div class="ayaa-fz-best-selling-product-3-img mb-25">
                                        <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                            <a class="img" data-bgcolor="#f8f8f8" href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty(sale_badge_percentage())) : ?>
                                            <div class="ayaa-fz-best-selling-product-3-discount-box has-pos">
                                                <span class="ayaa-fz-best-selling-product-3-discount-amount"><?php echo esc_html__('-', 'cb-core'); ?><?php echo sale_badge_percentage(); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php cb_core_product_wraps_active_layout_3(); ?>
                                        <div class="ayaa-fz-best-selling-product-3-addtocart-action">
                                            <?php woocommerce_template_loop_add_to_cart_text(); ?>
                                        </div>
                                    </div>
                                    <div class="ayaa-fz-best-selling-product-3-content">
                                        <?php if (!empty(get_the_title())) : ?>
                                            <h6 class="ayaa-fz-best-selling-product-3-title"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 15)); ?></a></h6>
                                        <?php endif; ?>
                                        <div class="price-wrap-3">
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
</div>
<!-- ayaa-new-arrival-area-end -->