<!-- brand area start -->
<div class="brand-area">
    <div class="container">
        <div class="ayaa-rv-brand-wrapper">
            <?php if(!empty($settings['slides'])) : ?>
            <div class="ayaa-fz-brand-active-backward swiper-container mb-30">
                <div class="swiper-wrapper roll__wrapper">
                    <?php foreach($settings['slides'] as $index => $slide) :
                        $image_url = esc_url($slide['product_brand_image']['url']) ? esc_url($slide['product_brand_image']['url']): '';    
                    ?>
                    <div class="swiper-slide">
                        <div class="ayaa-fz-brand-item">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_url), '_wp_attachment_image_alt', true); ?>">
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <div class="ayaa-rv-brand-forward-wrapper">
                        <?php if(!empty($settings['slides_2'])) : ?>
                        <div class="ayaa-fz-brand-active-forward swiper-container"  dir="rtl">
                            <div class="swiper-wrapper roll__wrapper">
                                <?php foreach($settings['slides_2'] as $index => $slide_2) :
                                    $image_url_2 = esc_url($slide_2['product_brand_image_2']['url']) ? esc_url($slide_2['product_brand_image_2']['url']): '';    
                                ?>
                                <div class="swiper-slide">
                                    <div class="ayaa-fz-brand-item">
                                        <img src="<?php echo esc_url($image_url_2); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_url_2), '_wp_attachment_image_alt', true); ?>">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand area end -->