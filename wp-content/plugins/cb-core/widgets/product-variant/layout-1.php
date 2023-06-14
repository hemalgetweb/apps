<div class="ayaa-fz-featured-product-wrapper-2 mb-30 mb-xl-0">
    <?php if (!empty($settings['feature_title'])) : ?>
        <h3 class="ayaa-fz-list-sm-product-border-title-2 mb-70 wow fadeInUp"><?php echo cb_core_kses_basic($settings['feature_title']); ?></h3>
    <?php endif; ?>

    <div class="ayaa-fz-list-sm-multiple-product-wrapper-2">
        <div class="ayaa-fz-list-sm-multiple-list-carousel-2 swiper-container">
            <div class="swiper-wrapper">
                <?php if (count($wp_query) > 0) :
                    $total_post_count = count($wp_query);
                    $num_of_loop = floor($total_post_count / 3);
                    for ($i = 0; $i < $num_of_loop; $i++) {
                        $_count = isset($_count) ? $_count : 3; ?>
                        <div class="swiper-slide">
                            <div class="revel-rv-fz-list-slide-wrap-2">
                                <?php do {
                                    $_count_inner = isset($_count_inner) ? $_count_inner : 0;
                                    $_product_id = $wp_query[$_count_inner]->ID;
                                    $product = wc_get_product($_product_id);
                                ?>
                                    <div class="ayaa-fz-list-sm-product-wrapper-2 mb-30 wow fadeInUp" data-wow-delay=".1s">
                                        <div class="image">
                                            <a href="<?php echo esc_url(get_the_permalink($_product_id)); ?>"><?php echo get_the_post_thumbnail($_product_id); ?></a>
                                        </div>
                                        <div class="ayaa-fz-list-sm-content-2">
                                            <h6 class="title"><a href="<?php echo esc_url(get_the_permalink($_product_id)); ?>"><?php echo esc_html(get_the_title($_product_id)); ?></a></h6>
                                            <div class="ayaa-fz-list-sm-price-wrap-2">
                                                <?php echo wp_kses_post($product->get_price_html()); ?>
                                            </div>
                                            <div class="ayaa-fz-rating-2">
                                                <?php echo cb_core_wc_get_review_woo_product(intval($product->get_average_rating())); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php $_count_inner += 1;
                                } while ($_count_inner < $_count);
                                $_count += 3; ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>