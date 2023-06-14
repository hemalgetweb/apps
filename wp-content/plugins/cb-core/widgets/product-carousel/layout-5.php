<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>

<!-- featured shop area start -->
<section class="featured-shop-area ayaa-fz-featured-shop-4 pt-110 pb-50">
    <div class="container">
        <div class="row pb-58">
            <div class="col-xxl-12">
                <div class="ayaa-fz-section-title-wrapper-4 text-center">
                    <?php if (!empty($settings['product_carousel_subtitle'])) : ?>
                        <h6 class="ayaa-fz-section-subtitle-4"><?php echo cb_core_kses_basic($settings['product_carousel_subtitle']); ?></h6>
                    <?php endif; ?>
                    <?php if (!empty($settings['product_carousel_title'])) : ?>
                        <h3 class="ayaa-fz-section-title-4"><?php echo cb_core_kses_basic($settings['product_carousel_title']); ?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ($wp_query->have_posts()) : ?>
            <div class="row">
                <?php while ($wp_query->have_posts()) : $wp_query->the_post();
                    global $product;
                    $price_html = $product->get_price_html();

                ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="ayaa-fz-product-box-4  ayaa-fz-product-box-skew mb-65">
                            <div class="ayaa-fz-product-image-wrap-4 fz-responsive">
                                <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                    <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                        <?php the_post_thumbnail(get_the_ID(), 'full', ['class' => 'fz-thumbnail-img']); ?>
                                    </a>
                                <?php endif; ?>
                                <?php cb_core_product_wraps_active_layout_6(); ?>
                                <div class="ayaa-fz-product-box-action-btn-pos-4">
                                    <?php woocommerce_template_loop_add_to_cart_text2(); ?>
                                </div>
                                <?php if (!empty(sale_badge_percentage())) : ?>
                                    <div class="ayaa-fz-product-box-discount-wrapper-4">
                                        <span class="ayaa-fz-product-box-discount-item-4"><?php echo esc_html__('-', 'cb-core'); ?><?php echo sale_badge_percentage(); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="ayaa-fz-product-content-wrap-4">
                                <?php $name_cats = get_terms('product_cat');
                                $cat_first_index = isset($name_cats) ? array_key_first($name_cats) : ''; ?>

                                <?php if (!empty($cat_first_index)) : ?>
                                    <a href="<?php echo esc_url(get_term_link($name_cats[$cat_first_index])); ?>" class="ayaa-fz-product-category-4"><?php echo $name_cats[$cat_first_index]->name; ?></a>
                                <?php endif; ?>
                                <?php if (!empty(get_the_title())) : ?>
                                    <h6 class="ayaa-fz-product-title-4"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 25)); ?></a></h6>
                                <?php endif; ?>
                                <div class="ayaa-fz-product-price-color-wrapper-4">
                                    <div class="price-wrap">
                                        <?php echo wp_kses_post($price_html); ?>
                                    </div>
                                    <div class="d-inline-block">
                                        <div class="ayaa-fz-product-color-wrapper-4">
                                            <span data-bgcolor="#b85929" data-fztabimage="<?php echo get_template_directory_uri(); ?>/assets/images/update/product/featured-product-3.png"></span>
                                            <span data-bgcolor="#060606" data-fztabimage="<?php echo get_template_directory_uri(); ?>/assets/images/update/product/featured-product-4.png"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- featured shop area end -->