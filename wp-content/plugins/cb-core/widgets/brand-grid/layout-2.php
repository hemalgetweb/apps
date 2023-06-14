<!-- brand area start -->
<div class="brand-area">
    <div class="container">
        <div class="ayaa-featured-section-top-wrap">
            <div class="row align-items-center">
                <div class="col-xxl-12">
                    <div class="ayaa-section-title-wrapper-1">
                        <?php if(!empty($settings['section_title'])) : ?>
                            <h3 class="ayaa-section-title-1"><?php echo esc_html($settings['section_title']); ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="ayaa-rv-brand-wrapper pt-50">
            <div class="ayaa-rv-brand-active-backward swiper-container mb-10">
                <?php if(!empty($settings['slides'])) : ?>
                <div class="swiper-wrapper roll__wrapper">
                    <?php foreach($settings['slides'] as $index => $slide) :
                        $image_url = esc_url($slide['product_brand_image']['url']) ? esc_url($slide['product_brand_image']['url']): '';    
                    ?>
                    <div class="swiper-slide">
                        <div class="ayaa-rv-brand-item">
                            <?php if(!empty($image_url)) : ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_url), '_wp_attachment_image_alt', true); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="pl-145 pr-145 ayaa-rv-brand-forward-wrapper">
                <?php if(!empty($settings['slides_2'])) : ?>
                <div class="ayaa-rv-brand-active-forward swiper-container"  dir="rtl">
                    <div class="swiper-wrapper roll__wrapper">
                        <?php foreach($settings['slides_2'] as $index => $slide_2) :
                            $image_url_2 = esc_url($slide_2['product_brand_image_2']['url']) ? esc_url($slide_2['product_brand_image_2']['url']): '';    
                        ?>
                        <div class="swiper-slide">
                            <div class="ayaa-rv-brand-item">
                                <img src="<?php echo esc_url($image_url_2); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_url_2), '_wp_attachment_image_alt', true); ?>">
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- brand area end -->