<?php
if(empty($settings['slides'])) {
    return;
}
?>
<!-- banner area start -->
<div class="banner-area">
    <div class="container">
        <div class="row">
        <?php foreach($settings['slides'] as $index => $slide) : 
            $product_bg_image = esc_url($slide['product_bg_image']['url']) ? esc_url($slide['product_bg_image']['url']): '';
        ?>
            <?php if($index == 0) : ?>
                <div class="col-xxl-6 col-xl-6 col-lg-6 mb-30 mb-lg-0">
                    <div class="ayaa-fz-banner-item-6 bg-default banner-1" data-background="<?php echo esc_url($product_bg_image); ?>">
                        <div class="row align-items-md-center align-items-xxl-start">
                            <div class="col-xxl-8 col-xl-8 col-md-8 mb-30 mb-xl-0">
                                <div class="content pt-20">
                                    <?php if(!empty($slide['subtitle'])) : ?>
                                        <span class="subtitle"><?php echo cb_core_kses_basic($slide['subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['title'])) : ?>
                                        <h3 class="title"><?php echo cb_core_kses_basic($slide['title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['content'])) : ?>
                                        <p class="desc"><?php echo cb_core_kses_basic($slide['content']); ?></p>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['btn_text'])) : ?>
                                    <a href="<?php echo esc_url($slide['btn_link']['url'] ? $slide['btn_link']['url'] : ''); ?>" class="ayaa-fz-sm-rounded-transparent-btn-6"><?php echo cb_core_kses_basic($slide['btn_text']); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-md-4">
                                <div class="ayaa-fz-banner-wine-img-6-1">
                                    <?php echo wp_get_attachment_image( $slide['product_banner_image']['id'], 'full' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="ayaa-fz-banner-item-6 style-2 bg-default banner-2" data-background="<?php echo esc_url($product_bg_image); ?>">
                        <div class="row align-items-lg-end align-items-xxl-start">
                            <div class="col-xxl-8 col-xl-8 col-md-8 mb-30 mb-lg-0">
                                <div class="content">
                                    <?php if(!empty($slide['subtitle'])) : ?>
                                        <span class="subtitle"><?php echo cb_core_kses_basic($slide['subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['title'])) : ?>
                                        <h3 class="title"><?php echo cb_core_kses_basic($slide['title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['content'])) : ?>
                                        <p class="desc"><?php echo cb_core_kses_basic($slide['content']); ?></p>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['btn_text'])) : ?>
                                    <a href="<?php echo esc_url($slide['btn_link']['url'] ? $slide['btn_link']['url'] : ''); ?>" class="ayaa-fz-sm-rounded-transparent-btn-6"><?php echo cb_core_kses_basic($slide['btn_text']); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-md-4">
                                <div class="ayaa-fz-banner-wine-img-6-2"><?php echo wp_get_attachment_image( $slide['product_banner_image']['id'], 'full' ); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- banner area end -->