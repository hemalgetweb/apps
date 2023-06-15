<?php
    $product_id = $settings['section_product_select'];
    global $product;
    $product = wc_get_product( $product_id );
    if(!empty($product_id)) {
        $percentage = 0;
        $product_regular_price = $product->get_regular_price($product_id) ;
        $product_sale_price = $product->get_sale_price($product_id);
        $product_price = $product_sale_price ? $product_sale_price: $product_regular_price;
        if($product_sale_price) {
            $percentage = round( ( ( $product_regular_price - $product_sale_price ) / $product_regular_price ) * 100 );
        }
    }
?>
<!-- weekend offer area start -->
<div class="weekend-offer-area fix">
    <div class="container">
        <div class="apps-fz-weekend-offer-inner-wrapper-4">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-4 mb-30 mb-lg-0">
                    <div class="apps-fz-weekend-offer-inner-left-4 pr-135">
                        <div class="apps-fz-section-title-wrapper-4 mb-17">
                            <?php if(!empty($settings['section_subtitle'])) : ?>
                                <span class="apps-fz-subtitle-4"><?php echo cb_core_kses_basic($settings['section_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if(!empty($settings['section_title'])) : ?>
                                <h4 class="apps-fz-title-4 fz-responsive"><?php echo cb_core_kses_basic($settings['section_title']); ?></h4>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($settings['section_description'])) : ?>
                            <p class="content"><?php echo cb_core_kses_basic($settings['section_description']); ?></p>
                        <?php endif; ?>
                        <?php
                            if (!empty($settings['form_id'])) {
                                echo cb_core_do_shortcode('contact-form-7', [
                                    'id' => $settings['form_id'],
                                    'html_class' => 'cb-cf7-form ' . cb_core_sanitize_html_class_param($settings['html_class']),
                                ]);
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 mb-30 mb-md-0">
                    <?php if(!empty($product_id)) : ?>
                    <div class="apps-fz-offer-product-box-4 pt-30">
                        <?php if(has_post_thumbnail($product_id)) : ?>
                        <div class="image">
                            <a href="<?php echo esc_url(get_the_permalink($product_id)); ?>"><img src="<?php echo get_the_post_thumbnail_url($product_id, 'full'); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid(get_the_post_thumbnail_url($product_id)), '_wp_attachment_image_alt', true); ?>"></a>   
                        </div>
                        <?php endif; ?>
                        <div class="content">
                            <h6 class="title"><a href="<?php echo esc_url(get_the_permalink($product_id)); ?>"><?php echo esc_html(get_the_title($product_id)); ?></a></h6>
                            <?php if(!empty($product_price)) : ?>
                            <h6 class="price"><?php echo get_woocommerce_currency_symbol(); echo cb_core_kses_basic($product_price); ?></h6>
                            <?php endif;?>
                        </div>
                        <?php if(!empty($percentage)) : ?>
                        <div class="apps-fz-offer-badge-4 has-pos">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/banner/offer-badge.png" alt="<?php echo esc_attr__('badge image', 'cb-core'); ?>">
                            <span class="count"><?php echo esc_html($percentage); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif;?>
                </div>
                <div class="col-xxl-3 col-xl-4 offset-xxl-1 col-lg-4 col-md-6">
                    <div class="apps-fz-banner-video-image-box-4">
                        <?php echo wp_get_attachment_image( $settings['cf7_font_image']['id'], 'full' ); ?>
                        <?php if(!empty($settings['cta_video_id'])) : ?>
                        <div class="video-intro">
                            <div class="video-wrapper">
                                    <a href="#" class="js-modal-btn apps-fz-video-play-btn-4" data-video-id="<?php echo esc_attr($settings['cta_video_id']); ?>"><i class="fa-solid fa-play"></i></a>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- weekend offer area end -->