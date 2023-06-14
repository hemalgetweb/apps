<!-- brand area start -->
<div class="ayaa-fz-brand-area fz-update-brand-4 pb-100 pt-75">
    <div class="container">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="ayaa-fz-brand-active-4 swiper-container">
            <div class="swiper-wrapper">
                <?php foreach($settings['slides'] as $index => $slide) :
                    $image_url = esc_url($slide['product_brand_image']['url']) ? esc_url($slide['product_brand_image']['url']): '';    
                ?>
                <div class="swiper-slide">
                    <div class="ayaa-fz-brand-img-4">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_url), '_wp_attachment_image_alt', true); ?>">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- brand area end -->
