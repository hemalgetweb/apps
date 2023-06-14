<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>

<!-- ayaa-best-selling-area-start -->
<div class="ayaa-fz-best-selling-area pt-95">
    <div class="container">
        <div class="ayaa-fz-section-top-wrapp">
            <div class="row align-items-center">
                <div class="col-xxl-12">
                    <div class="ayaa-fz-section-3 mb-45 text-center text-sm-start">
                        <?php if (!empty($settings['product_grid_title'])) : ?>
                            <h3 class="ayaa-fz-section-title-3"><?php echo cb_core_kses_basic($settings['product_grid_title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['product_grid_desc'])) : ?>
                            <p class="ayaa-fz-section-subtitle"><?php echo cb_core_kses_basic($settings['product_grid_desc']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($wp_query->have_posts()) : ?>
            <div class="ayaa-fz-best-selling-product-3-wrapper">
                <div class="row">
                    <?php while ($wp_query->have_posts()) : $wp_query->the_post();
                        global $product;
                        $price_html = $product->get_price_html();
                    ?>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="ayaa-fz-best-selling-product-3-item mb-40">
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
                                        <h6 class="ayaa-fz-best-selling-product-3-title"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 25)); ?></a></h6>
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

                <div class="row">
                    <div class="col-12">
                        <?php if (!empty($settings['btn_text'])) : ?>
                            <div class="ayaa-fz-best-selling-product-3-button text-center mt-15">
                                <a <?php echo $this->get_render_attribute_string('btn_link'); ?> class="ayaa-fz-theme-btn-transparrent ayaa-fz-theme-btn-3 pr-65 pl-65"><span><?php echo cb_core_kses_basic($settings['btn_text']); ?></span><span><?php echo cb_core_kses_basic($settings['btn_text']); ?></span></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- ayaa-best-selling-area-end -->