<!-- apps-fz-slider-5-area-start -->
<section class="apps-fz-slider-5-area bg-rightcenter fix" data-bgcolor="#000000">
    <div class="fz-line-wrapp">
        <div class="fz-line-item"></div>
    </div>
    <div class="container"> 
        <div class="apps-fz-slider-5-wrapper">
        <div class="apps-fz-slider-5-star">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/slider/star.png" alt="<?php echo esc_attr__('star icon', 'cb-core'); ?>">
        </div>
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <div class="apps-fz-slider-5-content-wrapper">
                        <?php if(!empty($settings['section_bg_image']['url'])) : ?>
                        <div class="apps-fz-slider-5-makrosha-jal"><?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'section_bg_image' ); ?></div>
                        <?php endif;?>
                        <?php if(!empty($settings['slides'])) : ?>
                        <div class="apps-fz-slider-5-content-active swiper-container swiper">
                            <div class="swiper-wrapper">
                                <?php foreach($settings['slides'] as $slide) : ?>
                                    <div class="swiper-slide h-870">
                                        <div class="apps-fz-slider-5-content-wrapper">
                                            <?php if(!empty($slide['slider_image']['url'])) : ?>
                                            <div class="apps-fz-slider-5-watch-img">
                                                <img src="<?php echo esc_url($slide['slider_image']['url']) ?>" alt="<?php echo \Elementor\Control_Media::get_image_alt( $slide['slider_image'] ); ?>">
                                            </div>
                                            <?php endif;?>
                                            <div class="apps-slider-5-content">
                                                <?php if(!empty($slide['title'])) : ?>
                                                <h2 class="apps-fz-slider-5-title "><?php echo cb_core_kses_basic($slide['title']); ?></h2>
                                                <?php endif;?>
                                                <?php if(!empty($slide['content'])) : ?>
                                                <div class="apps-fz-slide5-text-wrap mt-50 pl-365">
                                                    <p class="apps-slide5-text mb-0"><?php echo cb_core_kses_basic($slide['content']); ?></p>
                                                </div>
                                                <?php endif;?>
                                                <?php if(!empty($slide['btn_text'])) : ?>
                                                    <div class="fz_btn_wrapper apps-fz-slider-5-btn mtm-25">
                                                        <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']): ''; ?>" class="apps-fz-slider-round-link-4 fz-btn-hover fz-btn-item"><span></span><?php echo esc_html($slide['btn_text']); ?> <i class="fa-light fa-arrow-up-right"></i></a>
                                                    </div>
                                                <?php endif;?>
                                            </div> 
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="apps-fz-slider5-pagination"></div>
            </div>
        </div>
    </div>
    <div class="slider__mouse-scroll slider__mouse-scroll-4 smooth d-flex align-items-center">
        <a href="#scroll-featured" class="mouse-scroll-icon mouse-scroll-icon-4"></a>
        <div class="slider__mouse-social d-none d-sm-inline-block">
            <?php if(!empty($settings['facebook_url']['url'])) : ?>
                <a href="<?php echo esc_url($settings['facebook_url']['url']) ? esc_url($settings['facebook_url']['url']): ''; ?>"><?php echo esc_html__('Facebook', 'cb-core'); ?></a>
            <?php endif;?>
            <?php if(!empty($settings['twitter_url']['url'])) : ?>
                <a href="<?php echo esc_url($settings['twitter_url']['url']) ? esc_url($settings['twitter_url']['url']): ''; ?>"><?php echo esc_html__('Twitter', 'cb-core'); ?></a>
            <?php endif;?>
            <?php if(!empty($settings['instagram_url']['url'])) : ?>
                <a href="<?php echo esc_url($settings['instagram_url']['url']) ? esc_url($settings['instagram_url']['url']): ''; ?>"><?php echo esc_html__('Instagram', 'cb-core'); ?></a>
            <?php endif;?>
        </div>
    </div>
</section>
<!-- apps-fz-slider-5-area-end -->