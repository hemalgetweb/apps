<?php
if (!empty($settings['btn_link']['url'])) {
    $this->add_link_attributes('btn_link', $settings['btn_link']);
}
?>

<!-- featured product area start -->
<section class="featured-product-area pt-90 pb-40">
    <div class="container">
        <div class="ayaa-fz-featured-product-top-wrapper-main-2 mb-50">
            <div class="row align-items-center">
                <?php if (!empty($settings['section_title'])) : ?>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 mb-15 mb-md-0">
                        <div class="ayaa-fz-seciton-title-wrapper-2">
                            <h4 class="ayaa-fz-section-title-2 text-center text-md-start"><?php echo cb_core_kses_basic($settings['section_title']); ?></h4>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                    <div class="ayaa-fz-featured-tab-wrapper-2">
                        <nav>
                            <div class="nav" id="ayaa-fz-fatured-tab" role="tablist">
                                <?php if (!empty($settings['cat_query'])) : ?>
                                    <?php foreach ($settings['cat_query'] as $index => $cat_id) :
                                        $active_class = $index == 0 ? esc_attr__('active', 'cb-core') : '';
                                        $cat_name = '';
                                        if ($term = get_term_by('id', $cat_id, 'product_cat')) {
                                            $cat_name = $term->name;
                                        }
                                    ?>
                                        <button class="nav-link <?php echo esc_attr($active_class); ?>" id="navlayout-<?php echo esc_attr($index); ?>-tab" data-bs-toggle="tab" data-bs-target="#navlayout-<?php echo esc_attr($index); ?>" type="button" role="tab" aria-controls="navlayout-<?php echo esc_attr($index); ?>" aria-selected="false"><?php echo esc_html($cat_name); ?></button>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </nav>
                    </div>
                </div>
                <?php if (!empty($settings['btn_title'])) : ?>
                    <div class="col-xxl-4 col-xl-4 col-lg-2 col-md-12 mt-20 mt-lg-0">
                        <div class="text-center text-lg-end">
                            <a <?php echo $this->get_render_attribute_string('btn_link'); ?> class="ayaa-fz-hero-product-shop-btn-2"><?php echo cb_core_kses_basic($settings['btn_title']); ?> <i class="fa-light fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="ayaa-fz-featured-product-content-wrapper-main-2 p-rel">
            <div class="tab-content" id="nav-featuredProductNavContent">
                <?php foreach ($settings['cat_query'] as $index => $cat_id) :
                    $active_class = $index == 0 ? esc_attr__('show active', 'cb-core') : '';
                ?>
                    <div class="tab-pane fade <?php echo esc_attr($active_class); ?>" id="navlayout-<?php echo esc_attr($index); ?>" role="tabpanel" aria-labelledby="navlayout-<?php echo esc_attr($index); ?>-tab">
                        <?php if ($wp_query->have_posts()) : ?>
                            <div class="ayaa-fz-featured-product-content-wrap-2">
                                <div class="ayaa-fz-featured-product-content-active-2 swiper-container">
                                    <div class="swiper-wrapper">
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
                                                <div class="swiper-slide">
                                                    <div class="ayaa-fz-product-box-2">
                                                        <div class="image">
                                                            <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                                                <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>" class="img" data-bgcolor="#f8f8f8">
                                                                    <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                                                </a>
                                                            <?php endif; ?>
                                                            <div class="ayaa-fz-product-badge-wrapper-2 has-pos">
                                                                <?php if (!empty(sale_badge_percentage())) : ?>
                                                                    <span class="ayaa-fz-product-discount-percent-box-2"><?php echo esc_html__('-', 'cb-core'); ?><?php echo sale_badge_percentage(); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                                                                <?php endif; ?>
                                                                <?php if ($product->is_on_sale()) : ?>
                                                                    <span class="ayaa-fz-product-discount-percent-box-2" data-bgcolor="#00274c"><?php echo esc_html__('Sale', 'cb-core'); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php cb_core_product_wraps_active_layout(); ?>
                                                        </div>
                                                        <div class="content">
                                                            <?php if (!empty(cb_core_wc_get_review_layout())) : ?>
                                                                <?php echo cb_core_wc_get_review_layout(); ?>
                                                            <?php endif; ?>
                                                            <?php if (!empty(get_the_title())) : ?>
                                                                <h6 class="title"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 25)); ?></a></h6>
                                                            <?php endif; ?>
                                                            <div class="price-wrap">
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
                                <div class="ayaa-fz-featured-product-arrow-wrapper-2">
                                    <button class="ayaa-fz-nav-arrow-2 ayaa-fz-arrow-prev"><i class="fa-light fa-angle-left"></i><i class="fa-light fa-angle-left"></i></button>
                                    <button class="ayaa-fz-nav-arrow-2 ayaa-fz-arrow-next"><i class="fa-light fa-angle-right"></i><i class="fa-light fa-angle-right"></i></button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- featured product area end -->