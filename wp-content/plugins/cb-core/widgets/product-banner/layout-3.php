<?php
    if(empty($settings['slides'])) {
        return;
    }
?>
<div class="special-offer">
    <div class="container">
        <div class="row g-lg-4 g-md-3 g-4 justify-content-center">
            <?php foreach($settings['slides'] as $index => $slide) : 
                $product_banner_image_link = esc_url($slide['product_banner_image_link']['url']) ? esc_url($slide['product_banner_image_link']['url']): '';   
                $product_banner_image = esc_url($slide['product_banner_image']['url']) ? esc_url($slide['product_banner_image']['url']): '';
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-offer">
                    <a href="<?php echo esc_url($product_banner_image_link); ?>">
                        <img src="<?php echo esc_url($product_banner_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($product_banner_image), '_wp_attachment_image_alt', true); ?>">
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>