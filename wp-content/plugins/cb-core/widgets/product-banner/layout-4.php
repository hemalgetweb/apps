<?php
    if(empty($settings['slides'])) {
        return;
    }
?>
<div class="top-product top-product-2">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <?php foreach($settings['slides'] as $index => $slide) : 
                $product_banner_image_link = esc_url($slide['product_banner_image_link']['url']) ? esc_url($slide['product_banner_image_link']['url']): '';   
                $product_banner_image = esc_url($slide['product_banner_image']['url']) ? esc_url($slide['product_banner_image']['url']): '';
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="product-card ayaa-top-product-card-2">
                    <div class="part-txt">
                        <h4 class="price">
                            <?php if(!empty($slide['new_price'])) : ?>
                                <?php echo esc_html($slide['new_price']); ?>
                            <?php endif; ?>
                            <?php if(!empty($slide['old_price'])) : ?> 
                                <span><?php echo esc_html($slide['old_price']); ?></span>
                            <?php endif; ?>
                        </h4>
                        <?php if(!empty($slide['title'])) : ?>
                            <h3 class="product-name"><?php echo cb_core_kses_basic($slide['title']); ?></h3>
                        <?php endif; ?>
                        <?php if(!empty($slide['btn_text'])) : ?>
                            <a href="<?php echo esc_url($slide['btn_link']['url'] ? $slide['btn_link']['url'] : ''); ?>" class="def-btn-2 ayaa-def-btn-border-2"><?php echo cb_core_kses_basic($slide['btn_text']); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="part-img">
                    <img src="<?php echo esc_url($product_banner_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($product_banner_image), '_wp_attachment_image_alt', true); ?>">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>