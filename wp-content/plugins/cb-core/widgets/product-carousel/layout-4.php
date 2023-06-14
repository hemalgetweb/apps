<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>

<!-- ayaa-new-arrival-area-start -->
<div class="ayaa-fz-new-arrival-area pt-110 pb-75">
    <div class="container">
        <div class="ayaa-fz-section-top-wrapp mb-35">
            <div class="row align-items-end">
                <div class="col-xxl-8 col-md-8 col-sm-8">
                    <div class="ayaa-fz-section-5 text-center text-sm-start">
                        <?php if (!empty($settings['product_carousel_title'])) : ?>
                            <h3 class="ayaa-fz-section-title-5"><?php echo esc_html($settings['product_carousel_title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['product_carousel_desc'])) : ?>
                            <p class="ayaa-fz-section-subtitle-5 mb-10"><?php echo esc_html($settings['product_carousel_desc']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4 col-sm-4">
                    <?php if (!empty($settings['show_carousel_arrow'])) : ?>
                        <div class="ayaa-fz-arrival-arrow-navigation fz-nav-hov-black mb-15 text-center text-sm-end pt-15 pt-sm-0">
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
                                <div class="ayaa-fz-product-box-4 ayaa-fz-product-box-5 mb-40">
                                    <div class="ayaa-fz-product-image-wrap-4 ayaa-fz-product-image-wrap-5 fz-responsive">
                                        <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                            <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                                <?php the_post_thumbnail(get_the_ID(), 'full', ['class' => 'fz-thumbnail-img']); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty(sale_badge_percentage())) : ?>
                                            <div class="ayaa-fz-product-box-5-discount-percent-style">
                                                <span class="ayaa-fz-product-box-5-discount-percent-style-text"><?php echo esc_html__('-', 'cb-core'); ?><?php echo sale_badge_percentage(); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php cb_core_product_wraps_active_layout_5(); ?>
                                    </div>
                                    <div class="ayaa-fz-product-content-wrap-4 pt-20">
                                        <?php if (!empty(get_the_title())) : ?>
                                            <h6 class="ayaa-fz-product-title-5"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 25)); ?></a></h6>
                                        <?php endif; ?>
                                        <div class="ayaa-fz-product-price-color-wrapper-4">
                                            <div class="ayaa-fz-has-slide-price-cart-5 d-inline-block">
                                                <div class="price-wrap">
                                                    <?php echo wp_kses_post($price_html); ?>
                                                </div>
                                            </div>
                                            <div class="d-inline-block">
                                                <div class="ayaa-fz-product-color-wrapper-4">
                                                    <span data-bgcolor="#000000" data-fztabimage="<?php echo get_template_directory_uri(); ?>/assets/images/update/product3/watch1.png"></span>
                                                    <span data-bgcolor="#DBDBDB" data-fztabimage="<?php echo get_template_directory_uri(); ?>/assets/images/update/product3/watch2.png"></span>
                                                    <span data-bgcolor="#747D6A" data-fztabimage="<?php echo get_template_directory_uri(); ?>/assets/images/update/product3/watch3.png"></span>
                                                </div>
                                            </div>
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