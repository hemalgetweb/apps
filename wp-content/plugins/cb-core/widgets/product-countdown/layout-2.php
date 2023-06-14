<?php
$due_date = explode('-', $settings['due_date'], 3);
$year = '';
$month = '';
$day = '';
foreach ($due_date as $index => $date) {
    switch ($index) {
        case 0:
            $year = $date;
            break;
        case 1:
            $month = $date;
            break;
        case 2:
            $day = substr($date, 0, 2);
            break;
    }
}

if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>

<!-- hot deals area start -->
<section class="hot-deals-area pt-70 pb-95">
    <div class="container">
        <div class="ayaa-fz-hot-deals-top-wrapper-2 pb-10 has-border-gray-bottom">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-4">
                    <?php if (!empty($settings['section_title'])) : ?>
                        <div class="ayaa-fz-seciton-title-wrapper-2 mb-15 mb-md-0">
                            <h4 class="ayaa-fz-section-title-2 text-center text-md-start"><?php echo esc_html($settings['section_title']); ?></h4>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8">
                    <div class="ayaa-fz-hot-deals-top-right-content-2">
                        <?php if (!empty($settings['countdown_label'])) : ?>
                            <span><?php echo esc_html($settings['countdown_label']); ?></span>
                        <?php endif; ?>
                        <div class="ayaa-fz-weekend-countdown style-2 has-flex" data-year="<?php echo $year ? $year : ''; ?>" data-month="<?php echo esc_html($month) ? esc_html($month) : ''; ?>" data-day="<?php echo esc_html($day) ? esc_html($day) : ''; ?>"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayaa-fz-hot-deals-content-wrapper-2 pt-50">
            <?php if ($wp_query->have_posts()) : ?>
                <div class="row pb-30">
                    <?php
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        global $product;
                        $price_html = $product->get_price_html();
                    ?>
                        <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="ayaa-fz-product-box-2 ayaa-fz-product-box-sm-2 wow fadeInUp">
                                <div class="image">
                                    <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                        <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>" class="img" data-bgcolor="#f8f8f8">
                                            <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty(sale_badge_percentage())) : ?>
                                        <div class="ayaa-fz-product-badge-wrapper-2 has-pos">
                                            <span class="ayaa-fz-product-discount-percent-box-2"><?php echo esc_html__('-', 'cb-core'); ?><?php echo sale_badge_percentage(); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php cb_core_product_wraps_active_layout(); ?>
                                </div>
                                <div class="content">
                                    <?php if (!empty(cb_core_wc_get_review_layout())) : ?>
                                        <?php echo cb_core_wc_get_review_layout(); ?>
                                    <?php endif; ?>
                                    <?php if (!empty(get_the_title())) : ?>
                                        <h6 class="title"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 25)); ?></a></h6>
                                    <?php endif; ?>
                                    <div class="ayaa-fz-has-slide-price-cart-2">
                                        <div class="price-wrap">
                                            <?php echo wp_kses_post($price_html); ?>
                                        </div>
                                        <a href="?add-to-cart=<?php echo get_the_ID(); ?>" data-product_id="<?php echo get_the_ID(); ?>" class="ayaa-fz-price-slide-cart-btn-2 add_to_cart_button ajax_add_to_cart cart"><?php echo esc_html__('Add To Cart', 'cb-core'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
            <?php endif; ?>
            <div class="ayaa-fz-hot-deals-content-bottom-wrap-2">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="text-center">
                            <?php if (!empty($settings['btn_text'])) : ?>
                                <a <?php echo $this->get_render_attribute_string('btn_link'); ?> class="ayaa-fz-black-border-btn-2 wow fadeInUp" data-wow-delay=".6s"><span><?php echo esc_html($settings['btn_text']); ?></span><span><?php echo esc_html($settings['btn_text']); ?></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hot deals area end -->