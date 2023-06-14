<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>

<!-- ayaa-fz-produc-tab-area-start -->
<div class="ayaa-fz-product-tab-area pb-65">
    <div class="container">
        <div class="row align-items-center mb-25">
            <div class="col-xl-6 col-lg-6">
                <div class="ayaa-fz-section-3 mb-15 text-center text-sm-start">
                    <?php if (!empty($settings['section_title'])) : ?>
                        <h3 class="ayaa-fz-section-title-3"><?php echo cb_core_kses_basic($settings['section_title']); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($settings['section_short_desc'])) : ?>
                        <p class="ayaa-fz-section-subtitle "><?php echo cb_core_kses_basic($settings['section_short_desc']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="ayaa-fz-product-tab-menu-wrapper mb-15 pt-15 pt-lg-0">
                    <nav>

                        <div class="nav ayaa-fz-product-tab-menu-buttons" id="ayaa-fz-product-tab2" role="tablist">
                            <?php if (!empty($settings['cat_query'])) : ?>
                                <?php foreach ($settings['cat_query'] as $index => $cat_id) :
                                    $active_class = $index == 0 ? esc_attr__('active', 'cb-core') : '';
                                    $cat_name = '';
                                    if ($term = get_term_by('id', $cat_id, 'product_cat')) {
                                        $cat_name = $term->name;
                                    }
                                ?>
                                    <button class="<?php echo esc_attr($active_class); ?>" id="navtext-<?php echo esc_attr($index); ?>-tab" data-bs-toggle="tab" data-bs-target="#navtext-<?php echo esc_attr($index); ?>" type="button" role="tab" aria-controls="navtext-<?php echo esc_attr($index); ?>" aria-selected="false"><?php echo esc_html($cat_name); ?></button>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-ProductTabContent">
            <?php foreach ($settings['cat_query'] as $index => $cat_id) :
                $active_class = $index == 0 ? esc_attr__('show active', 'cb-core') : '';
            ?>
                <div class="tab-pane fade <?php echo esc_attr($active_class); ?>" id="navtext-<?php echo esc_attr($index); ?>" role="tabpanel" aria-labelledby="navtext-<?php echo esc_attr($index); ?>-tab">
                    <?php if ($wp_query->have_posts()) : ?>
                        <div class="ayaa-fz-product-tab-content-wrapper-3">
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
                                            <div class="ayaa-fz-best-selling-product-3-item mb-40">
                                                <div class="ayaa-fz-best-selling-product-3-img mb-25">
                                                    <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                                        <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>" class="img" data-bgcolor="#f8f8f8">
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
                                    <?php endif; ?>
                                <?php unset($product_cats);
                                endwhile;
                                wp_reset_query(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
<!-- ayaa-fz-produc-tab-area-end -->