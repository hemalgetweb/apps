<?php if(!empty($settings['slides'])) : ?>
<!-- ayaa-fz-banner-area-start -->
<div class="ayaa-fz-banner-area">
    <div class="container">
        <div class="row">
            <?php foreach($settings['slides'] as $index => $slide) :  ?>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="ayaa-fz-banner-box-3 mb-40 bg-default" data-bgcolor="#000000" data-background="<?php echo esc_url($slide['banner_bg_img']['url']) ? esc_url($slide['banner_bg_img']['url']): ''; ?>">
                    <div class="ayaa-fz-banner-box-wrapper-3">
                        <div class="fz-banner-box-wrapper-content-inner-2 fz-banner-box-wrapper-content-inner-5">
                            <div class="content">
                                <?php if(!empty($slide['banner_subtitle'])) : ?>
                                    <span class="subtitle wow fadeInUp"><?php echo cb_core_kses_basic($slide['banner_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if(!empty($slide['banner_title'])) : ?>
                                    <h4 class="title wow fadeInUp" data-wow-delay=".1s"><?php echo cb_core_kses_basic($slide['banner_title']); ?></h4>
                                <?php endif; ?>
                                <?php if(!empty($slide['btn_title'])) : ?>
                                <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']): ''; ?>" class="ayaa-fz-shop-btn-sm mt-15 wow fadeInUp" data-wow-delay=".2s"><span><?php echo cb_core_kses_basic($slide['btn_title']); ?></span><span><?php echo cb_core_kses_basic($slide['btn_title']); ?></span></a>
                                <?php endif;?>
                            </div>
                            <?php if(!empty($slide['banner_img']['url'])) : ?>
                            <div class="image wow fadeInDown" data-wow-delay=".3s">
                                <img src="<?php echo esc_url($slide['banner_img']['url']); ?>" alt="<?php echo \Elementor\Control_Media::get_image_alt( $slide['banner_img'] ); ?>">
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- ayaa-fz-banner-area-end -->
<?php endif; ?>