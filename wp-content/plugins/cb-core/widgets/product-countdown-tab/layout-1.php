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
<!-- featured product start -->
<div class="featured-product-area">
    <div class="container">
        <div class="ayaa-featured-section-top-wrap ayaa-has-featured-product-title">
            <div class="row align-items-center">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <?php if (!empty($settings['countdown_title'])) : ?>
                        <div class="ayaa-section-title-wrapper-1 pb-20 pb-lg-0">
                            <h3 class="ayaa-section-title-1"><?php echo cb_core_kses_basic($settings['countdown_title']); ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="ayaa-border-tabs-wrapper-1 pb-20 pb-lg-0">
                        <nav>
                            <div class="nav justify-content-center nav-tabs justify-content-center" id="nav-featured-tab" role="tablist">
                                <?php if (!empty($settings['cat_query'])) : ?>
                                    <?php foreach ($settings['cat_query'] as $index => $cat_id) :
                                        $active_class = $index == 0 ? esc_attr__('active', 'cb-core') : '';
                                        $cat_name = '';
                                        if ($term = get_term_by('id', $cat_id, 'product_cat')) {
                                            $cat_name = $term->name;
                                        }
                                    ?>
                                        <button class="nav-link <?php echo esc_attr($active_class); ?>" id="nav-<?php echo esc_attr($index); ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo esc_attr($index); ?>" type="button" role="tab" aria-controls="nav-<?php echo esc_attr($index); ?>" aria-selected="false"><?php echo esc_html($cat_name); ?></button>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                    <div class="ayaa-time-left-countdown text-center text-lg-end">
                        <span class="label pr-10 d-none d-md-inline-block"><?php echo esc_html__('Time Left', 'cb-core'); ?></span>
                        <div class="ayaa-countdown" data-year="<?php echo $year ? $year : ''; ?>" data-month="<?php echo esc_html($month) ? esc_html($month) : ''; ?>" data-day="<?php echo esc_html($day) ? esc_html($day) : ''; ?>"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayaa-featured-section-tab-content">
            <div class="tab-content" id="nav-featured-product-content">
                <?php foreach ($settings['cat_query'] as $index => $cat_id) :
                    $active_class = $index == 0 ? esc_attr__('show active', 'cb-core') : '';
                ?>
                    <div class="tab-pane fade <?php echo esc_attr($active_class); ?>" id="nav-<?php echo esc_attr($index); ?>" role="tabpanel" aria-labelledby="nav-<?php echo esc_attr($index); ?>-tab">
                        <?php if ($wp_query->have_posts()) : ?>
                            <div class="ayaa-featured-section-products-wrap pt-50">
                                <div class="row">
                                    <?php while ($wp_query->have_posts()) :
                                        $wp_query->the_post();
                                        echo get_term_meta(get_the_ID(), 'category_ids', true);
                                        global $product;
                                        $price_html = $product->get_price_html();
                                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                                        $product_cats[] = null;
                                        foreach ($terms as $index => $term) {
                                            $product_cats[] = $term->term_id;
                                        }
                                    ?>
                                        <?php if (in_array($cat_id, $product_cats)) : ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
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
                                        <?php endif; ?>
                                    <?php unset($product_cats);
                                    endwhile;
                                    wp_reset_query(); ?>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <?php if (!empty($settings['btn_title'])) : ?>
                                            <div class="text-center"> <a <?php echo $this->get_render_attribute_string('btn_link'); ?> class="ayaa-theme-border-btn"><span><?php echo cb_core_kses_basic($settings['btn_title']); ?></span><span><?php echo cb_core_kses_basic($settings['btn_title']); ?></span></a></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- featured product end -->