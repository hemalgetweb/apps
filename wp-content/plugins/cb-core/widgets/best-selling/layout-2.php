    <!-- best sellings area start -->
    <div class="best-sellings-area pt-105 pb-120">
        <div class="container">
            <div class="ayaa-fz-best-sellings-section-title-wrapper-6 text-center text-sm-start pb-50">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 col-sm-8">
                    <?php if(!empty($settings['best_selling_title'])) : ?>
                        <div class="ayaa-fz-section-title-wrapper-6 mb-20 mb-sm-0">
                            <h3 class="ayaa-fz-section-title-6 mb-0" <?php echo $this->get_render_attribute_string( 'heading' ); ?>><?php echo cb_core_kses_basic($settings['best_selling_title']); ?></h3>
                        </div>
                    <?php endif; ?>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-4 col-sm-4">
                        <div class="ayaa-fz-swiper-arrow-6 text-sm-end">
                            <button class="prev"><i class="fa-light fa-angle-left"></i><i class="fa-light fa-angle-left"></i></button>
                            <button class="next ml-7"><i class="fa-light fa-angle-right"></i><i class="fa-light fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($wp_query->have_posts()) : ?>
            <div class="ayaa-fz-best-selling-carousel-active-6 swiper-container">
                <div class="swiper-wrapper">
                    <?php while($wp_query->have_posts()): $wp_query->the_post();
                    global $product;
                    $price_html = $product->get_price_html();
                    $rating_count = '';
                    if(!empty($product)) {
                        $rating_count  = floor($product->get_average_rating());
                    }
                    ?>
                    <div class="swiper-slide">
                        <div class="ayaa-fz-product-box-6">
                            <div class="ayaa-fz-product-box-thumbnail-6">
                                <?php if(!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                    <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                        <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                    </a>
                                <?php endif; ?>
                                <?php cb_core_product_wraps_active_layout_2(); ?>
                            </div>
                            <div class="ayaa-fz-product-box-content-6 text-center">
                                <?php if(!empty($rating_count)) : ?>
                                    <?php echo cb_core_elementor_vendor_star_rating_6($rating_count); ?>
                                <?php endif; ?>
                                <?php if(!empty(get_the_title())) : ?>
                                <h5 class="ayaa-fz-product-title-6"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 4)); ?></a></h5>
                                <?php endif; ?>
                                <div class="ayaa-fz-product-price-cart-hover-wrap-6">
                                    <div class="ayaa-fz-product-price-regular-6"><?php echo $price_html; ?></div>
                                    <?php woocommerce_template_loop_add_to_cart_text3(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;wp_reset_postdata(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- best sellings area end -->