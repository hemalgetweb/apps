<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>
<div class="flash-deal">
    <div class="container">
        <div class="panel">
            <div class="panel-header">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-6">
                        <?php if (!empty($settings['section_title'])) : ?>
                            <h2 class="title"><?php echo esc_html($settings['section_title']); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-8 col-md-7 countdown-col mt-10 mt-md-0">
                        <div class="countdown-wrap d-flex ayaa-countdown-wrap-flex">
                            <?php if (!empty($settings['countdown_label'])) : ?>
                                <h3 class="ayaa-countdown-ending-heading"><?php echo esc_html($settings['countdown_label']); ?></h3>
                            <?php endif; ?>
                            <div id="flashDealCountdown" class="countdown"></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6">
                        <?php if (!empty($settings['btn_text'])) : ?>
                            <div class="text-end">
                                <a <?php echo $this->get_render_attribute_string('btn_link'); ?> class="explore-section"><?php echo esc_html($settings['btn_text']); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <?php if ($wp_query->have_posts()) : ?>
                    <div class="product-custom-row">
                        <?php
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            global $product;
                            $price_html = $product->get_price_html();
                        ?>
                            <div class="custom-col">
                                <div class="single-product-card">
                                    <div class="part-img">
                                        <?php if (!empty(sale_badge_percentage())) : ?>
                                            <span class="off-tag"><?php echo sale_badge_percentage(); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                            <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php cb_core_product_wraps_active(); ?>
                                    </div>
                                    <div class="part-txt">
                                        <?php if (!empty(get_the_title())) : ?>
                                            <h4 class="product-name"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 4)); ?></a></h4>
                                        <?php endif; ?>
                                        <p class="price"><?php echo wp_kses_post($price_html); ?></p>
                                        <?php if (!empty(cb_core_wc_get_review())) : ?>
                                            <?php echo cb_core_wc_get_review(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>