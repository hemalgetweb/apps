<?php if(!empty($settings['slides'])) : ?>
<!-- ayaa-fz-bannar-area-start -->
<div class="ayaa-fz-banner-area">
    <div class="container">
        <div class="row">
            <?php foreach($settings['slides'] as $index => $slide) :  ?>
                <div class="col-xl-6 col-lg-12">
                    <div class="ayaa-fz-banner-3-wrapper bg-default mb-40" data-background="<?php echo esc_url($slide['banner_bg_img']['url']) ? esc_url($slide['banner_bg_img']['url']): ''; ?>">
                        <div class="row align-items-end">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 order-1 order-sm-0">
                                <div class="ayaa-fz-banner-3-content pl-60 text-center text-sm-start">
                                    <?php if(!empty($slide['banner_subtitle'])) : ?>
                                        <span class="ayaa-fz-banner-3-subtext"><?php echo cb_core_kses_basic($slide['banner_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['banner_title'])) : ?>
                                        <h4 class="ayaa-fz-banner-3-title"><?php echo cb_core_kses_basic($slide['banner_title']); ?></h4>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['btn_title'])) : ?>
                                        <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']): ''; ?>" class="ayaa-fz-theme-btn-2 theme-clr-3 mt-15"><span><?php echo cb_core_kses_basic($slide['btn_title']); ?></span><span><?php echo cb_core_kses_basic($slide['btn_title']); ?></span></a>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 order-0 order-sm-1">
                                <?php if(!empty($slide['banner_img']['url'])) : ?>
                                <div class="ayaa-fz-banner-3-img pr-50 text-center text-sm-end">
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
<!-- ayaa-fz-bannar-area-end -->
<?php endif; ?>