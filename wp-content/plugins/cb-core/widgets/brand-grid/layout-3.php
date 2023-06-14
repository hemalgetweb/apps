<!-- brand area start -->
<section class="brand-area">
    <div class="container">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="ayaa-fz-brand-active-2 swiper-container has-border-gray-bottom has-border-gray-top pt-50 pb-50">
            <div class="swiper-wrapper">
                <?php foreach($settings['slides'] as $index => $slide) :
                    $image_url = esc_url($slide['product_brand_image']['url']) ? esc_url($slide['product_brand_image']['url']): '';    
                ?>
                <div class="swiper-slide">
                    <div class="ayaa-fz-brand-image-2">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_url), '_wp_attachment_image_alt', true); ?>">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- brand area end -->