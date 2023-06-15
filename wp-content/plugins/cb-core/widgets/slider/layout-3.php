<?php
    $_product_id = $settings['section_weekend_product_select'];
    global $product;
    $product = wc_get_product( $_product_id );
    $rating_count = '';
    $_product_regular_price = '';
    $product_sale_price = '';
    if(!empty($product)) {
        $_product_regular_price = $product->get_regular_price($_product_id);
        $rating_count  = floor($product->get_average_rating());
        $product_sale_price = $product->get_sale_price($_product_id);
    }
    $percentage = 0;
    
    $product_price = $product_sale_price ? $product_sale_price: $_product_regular_price;
    $_product_regular_price = $product_sale_price ? $_product_regular_price: '';
    $date_control_input = $settings['section_weekend_product_due_date'];
    $date_arr_final = array();
    preg_match_all("/\d+/", $date_control_input, $date_arr);
    $date_arr_final['year'] = isset($date_arr[0][0]) ? $date_arr[0][0]: '';
    $date_arr_final['month'] = isset($date_arr[0][1]) ? $date_arr[0][1]: '';
    $date_arr_final['day'] = isset($date_arr[0][2]) ? $date_arr[0][2]: '';
    if($product_sale_price) {
        $percentage = round( ( ( $_product_regular_price - $product_sale_price ) / $_product_regular_price ) * 100 );
    }
?>
<!-- hero area start -->
<section class="hero-area pt-30">
    <div class="container">
        <div class="apps-fz-hero-offer-wrapper-main-2">
            <div class="row">
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6">
                    <div class="apps-fz-weekend-offer-box-2">
                        <div class="image">
                            <a href="<?php echo esc_url(get_the_permalink($_product_id)); ?>"><img src="<?php echo get_the_post_thumbnail_url($_product_id, 'full'); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid(get_the_post_thumbnail_url($_product_id)), '_wp_attachment_image_alt', true); ?>"></a>
                            <?php if(!empty($percentage)) : ?>
                                <span class="apps-fz-product-discount-percent-box-2 has-pos"><?php echo esc_attr__('-', 'cb-core'); ?><?php echo esc_htmL($percentage); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                            <?php endif; ?>
                            <?php if(!empty($_product_id)) : ?>
                            <?php cb_core_product_wraps_active_3($_product_id); ?>
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <?php if($rating_count) : ?>
                                <?php echo cb_core_elementor_vendor_star_rating_3($rating_count); ?>
                            <?php endif; ?>
                            <h6 class="apps-fz-weekend-offer-product-title-2 wow fadeInUp" data-wow-delay=".1s">
                                <a href="<?php echo esc_url(get_the_permalink($_product_id)); ?>"><?php echo esc_html(get_the_title($_product_id)); ?></a>
                            </h6>
                            <div class="apps-fz-weekend-offer-product-price-2 wow fadeInUp" data-wow-delay=".2s">
                                <?php if(!empty($product_price)) : ?>
                                    <span class="apps-fz-weekend-offer-product-price-regular-2"><?php echo get_woocommerce_currency_symbol(); echo wp_kses_post($product_price); ?></span>
                                <?php endif; ?>
                                <?php if(!empty($_product_regular_price)) : ?>
                                    <del class="apps-fz-weekend-offer-product-price-old-2"><?php  echo get_woocommerce_currency_symbol(); echo esc_html($_product_regular_price); ?></del>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($date_arr_final)) : ?>
                            <div class="pl-20 pr-20">
                                <div class="apps-fz-weekend-offer-countdown-wrapper-main-2 apps-fz-has-border-top pt-30 mt-30">
                                    <div class="apps-fz-weekend-countdown has-flex wow fadeInUp" data-wow-delay=".3s" data-year="<?php echo esc_attr($date_arr_final['year']) ? esc_attr($date_arr_final['year']): ''; ?>" data-month="<?php echo esc_attr($date_arr_final['month']) ? esc_attr($date_arr_final['month']): ''; ?>" data-day="<?php echo esc_attr($date_arr_final['day']) ? esc_attr($date_arr_final['day']): ''; ?>"></div>
                                    <p class="apps-fz-weekend-remains-offer-text-2 wow fadeInUp" data-wow-delay=".4s"><?php echo esc_html__('Remains the end of the offer', 'cb-core'); ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-8 col-lg-8 col-md-12">
                    <?php if(!empty($settings['slides'])) : ?>
                        <div class="apps-fz-slider-active-2 mt-30 mt-lg-0 swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach($settings['slides'] as $index => $slide) : ?>
                                <div class="swiper-slide">
                                    <div class="apps-fz-slider-item-2 pt-155 pl-45 pr-45" data-bgcolor="#F8F8F8">
                                        <div class="row g-0">
                                            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 mb-50 mb-md-0">
                                                <div class="apps-fz-slider-content-left-2">
                                                    <?php if(!empty($slide['subtitle'])) : ?>
                                                        <span class="apps-fz-slider-small-tertiary-btn-2 mb-10" data-animation="fadeInUp" data-duration="1s"><?php echo esc_html($slide['subtitle']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if(!empty($slide['title'])) : ?>
                                                    <h2 class="apps-fz-slider-title-2" data-animation="fadeInUp" data-duration="1s" data-delay=".4s"><?php echo cb_core_kses_basic($slide['title']); ?></h2>
                                                    <?php endif; ?>
                                                    <?php if(!empty($slide['new_price'])) :?>
                                                    <span class="apps-fz-slider-price-2 mb-25" data-animation="fadeInUp" data-duration="1s" data-delay=".5s"><?php echo esc_attr__('Starting To', 'cb-core'); ?> <?php echo esc_html($slide['new_price']); ?></span>
                                                    <?php endif;?>
                                                    <?php if(!empty($slide['btn_text'])) : ?>
                                                    <div data-animation="fadeInUp" data-duration="1s" data-delay=".6s">
                                                        <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']): ''; ?>" class="apps-fz-theme-btn-2"><span><?php echo esc_html($slide['btn_text']); ?></span><span><?php echo esc_html($slide['btn_text']); ?></span></a>
                                                    </div>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                                                <?php if(!empty($slide['slider_image']['id'])) : ?>
                                                <div class="apps-fz-slider-content-right-2 pt-10 text-end" data-animation="fadeInUpBig" data-duration="1s">
                                                    <?php echo wp_get_attachment_image( $slide['slider_image']['id'], 'full' ); ?>
                                                </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-6">
                    <div class="apps-fz-hero-sidebar-carousel-active-2 mt-30 mt-xxl-0">
                        <div class="row justify-content-center">
                            <?php foreach($settings['slides_2'] as $index => $slide) : ?>
                                <div class="col-xxl-12 col-xl-4 col-lg-6 col-sm-12">
                                    <div class="apps-fz-hero-sidebar-carousel-item-2 mb-20 wow fadeInUp"  data-wow-duration=".4s" data-wow-delay=".1s">
                                        <div class="apps-fz-hero-product-box-2 bg-default" data-background="<?php echo esc_url($slide['side_product_bg_image']['url']) ? esc_url($slide['side_product_bg_image']['url']): ''; ?>">
                                            <div class="row align-items-center">
                                                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 mb-30 mb-md-0">
                                                    <div class="content">
                                                        <?php if(!empty($slide['discount_count'])) : ?>
                                                            <span class="apps-fz-product-discount-percent-box-2"><?php echo esc_html($slide['discount_count']); ?></span>
                                                        <?php endif;?>
                                                        <?php if(!empty($slide['side_product_title'])): ?>
                                                            <h5 class="apps-fz-hero-product-title-2"><a href="<?php echo esc_url($slide['side_product_title_link']['url']) ? esc_url($slide['side_product_title_link']['url']): ''; ?>"><?php echo cb_core_kses_basic($slide['side_product_title']); ?></a></h5>
                                                        <?php endif; ?>
                                                        <?php if(!empty($slide['side_product_title_link'])):?>
                                                        <a href="<?php echo esc_url($slide['side_product_title_link']['url']) ? esc_url($slide['side_product_title_link']['url']): ''; ?>" class="apps-fz-hero-product-shop-btn-2"><?php echo esc_html__('Shop  Now', 'cb-core'); ?> <i class="fa-light fa-long-arrow-right"></i></a>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
                                                    <?php if(!empty($slide['side_product_image']['id'])) : ?>
                                                    <div class="image text-md-end">
                                                        <a href="<?php echo esc_url($slide['side_product_title_link']['url']) ? esc_url($slide['side_product_title_link']['url']): ''; ?>"><?php echo wp_get_attachment_image( $slide['side_product_image']['id'], 'full' ); ?></a>
                                                    </div>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero area end -->