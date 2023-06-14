<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>

<!-- ayaa-fz-product-tab-area-start -->
<div class="ayaa-fz-product-tab-area pb-75 pt-110">
    <div class="container">
        <div class="row align-items-end mb-35">
            <div class="col-xl-6 col-lg-6 col-md-7">
                <div class="ayaa-fz-section-5 mb-15 text-center text-sm-start">
                    <?php if (!empty($settings['section_title'])) : ?>
                        <h3 class="ayaa-fz-section-title-5"><?php echo cb_core_kses_basic($settings['section_title']); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($settings['section_short_desc'])) : ?>
                        <p class="ayaa-fz-section-subtitle-5 "><?php echo cb_core_kses_basic($settings['section_short_desc']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-5">
                <div class="ayaa-fz-product5-tab-menu pt-15 pt-lg-0">
                    <nav>

                        <div class="nav ayaa-fz-product5-tab-menu-buttons" id="ayaa-fz-product-tab" role="tablist">
                            <?php if (!empty($settings['cat_query'])) : ?>
                                <?php foreach ($settings['cat_query'] as $index => $cat_id) :
                                    $active_class = $index == 0 ? esc_attr__('active', 'cb-core') : '';
                                    $cat_name = '';
                                    if ($term = get_term_by('id', $cat_id, 'product_cat')) {
                                        $cat_name = $term->name;
                                    }
                                ?>
                                    <button class="<?php echo esc_attr($active_class); ?>" id="navpro-<?php echo esc_attr($index); ?>-tab" data-bs-toggle="tab" data-bs-target="#navpro-<?php echo esc_attr($index); ?>" type="button" role="tab" aria-controls="navpro-<?php echo esc_attr($index); ?>" aria-selected="false"><?php echo esc_html($cat_name); ?></button>
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
                <div class="tab-pane fade <?php echo esc_attr($active_class); ?>" id="navpro-<?php echo esc_attr($index); ?>" role="tabpanel" aria-labelledby="navpro-<?php echo esc_attr($index); ?>-tab">
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
                                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
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
                                                        <h6 class="ayaa-fz-product-title-5"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 22)); ?></a></h6>
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
<!-- ayaa-fz-product-tab-area-end -->