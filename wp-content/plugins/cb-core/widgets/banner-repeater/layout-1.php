<!-- banner area start -->
<section class="banner-area">
    <div class="container">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="row">
            <?php foreach($settings['slides'] as $index => $slide) : ?>
                <?php if($index == 0) : ?>
                <div class="col-xxl-6 col-xl-6 col-lg-6 mb-30 mb-lg-0">
                    <div class="ayaa-fz-banner-box-2" data-bgcolor="#fef9ff">
                        <div class="ayaa-fz-banner-box-wrapper-2 fz-banner-box-wrapper-content-inner-2">
                            <div class="content">
                                <?php if(!empty($slide['banner_subtitle'])) : ?>
                                    <span class="subtitle wow fadeInUp"><?php echo cb_core_kses_basic($slide['banner_subtitle']); ?></span>
                                <?php endif;?>
                                <?php if(!empty($slide['banner_title'])) : ?>
                                    <h4 class="title wow fadeInUp" data-wow-delay=".1s"><?php echo cb_core_kses_basic($slide['banner_title']); ?></h4>
                                <?php endif;?>
                                <?php if(!empty($slide['btn_title'])) : ?>
                                    <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']): ''; ?>" class="ayaa-fz-shop-btn-sm wow fadeInUp" data-wow-delay=".2s"><?php echo cb_core_kses_basic($slide['btn_title']); ?></a>
                                <?php endif;?>
                            </div>
                            <?php if(!empty($slide['banner_img']['url'])) : ?>
                            <div class="image wow fadeInUp" data-wow-delay=".3s">
                                <img src="<?php echo esc_url($slide['banner_img']['url']); ?>" alt="<?php echo \Elementor\Control_Media::get_image_alt( $slide['banner_img'] ); ?>">
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <?php if($index == 1) : ?>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="ayaa-fz-banner-box-3" data-bgcolor="#f8f8f8">
                            <div class="ayaa-fz-banner-box-wrapper-3">
                                <div class="fz-banner-box-wrapper-content-inner-2">
                                    <div class="content">
                                        <?php if(!empty($slide['banner_subtitle'])) : ?>
                                            <span class="subtitle wow fadeInUp"><?php echo cb_core_kses_basic($slide['banner_subtitle']); ?></span>
                                        <?php endif;?>
                                        <?php if(!empty($slide['banner_title'])) : ?>
                                            <h4 class="title wow fadeInUp" data-wow-delay=".1s"><?php echo cb_core_kses_basic($slide['banner_title']); ?></h4>
                                        <?php endif;?>
                                        <?php if(!empty($slide['btn_title'])) : ?>
                                            <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']): ''; ?>" class="ayaa-fz-shop-btn-sm wow fadeInUp" data-wow-delay=".2s"><?php echo cb_core_kses_basic($slide['btn_title']); ?></a>
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
                <?php endif; ?>
            <?php endforeach;?>
        </div>
        <?php endif;?>
    </div>
</section>
<!-- banner area end -->