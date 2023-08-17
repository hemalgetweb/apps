<!-- hero area start -->
<div class="apps-hero-area-114">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="apps-hero-content-wrapper-114 mb-50 mb-lg-0">
                    <?php if (!empty($settings['subtitle'])): ?>
                        <span class="subtitle"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/service-spinner.png"
                                alt="subtitle image"> <?php echo esc_html($settings['subtitle']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($settings['bannerTitle'])): ?>
                        <h2 class="title"><?php echo esc_html($settings['bannerTitle']); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['_description'])): ?>
                        <p class="content"><?php echo wp_kses_post($settings['_description']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 text-center">
                <div class="apps-hero-svg-114">
                    <?php
                    $this->add_render_attribute('banner_image', 'src', $settings['banner_image']['url']);
                    $this->add_render_attribute('banner_image', 'alt', \Elementor\Control_Media::get_image_alt($settings['banner_image']));
                    $this->add_render_attribute('banner_image', 'title', \Elementor\Control_Media::get_image_title($settings['banner_image']));
                    ?>
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'banner_image'); ?>
                </div>
            </div>

            <div class="navbar-right btn-wrap d-flex flex-wrap gap-3 gap-lg-4 " data-wow-duration="0.200s"
                data-wow-delay="400ms">
                <?php if (!empty($settings['see_pricing_btn_text'])):
                    if (!empty($settings['see_pricing_btn_link2']['url'])) {
                        $this->add_link_attributes('see_pricing_btn_link2', $settings['see_pricing_btn_link2']);
                    }
                    ?>
                    <a class="btn position-relative rounded bg-btn text-uppercase border-0 text-clr-dark1 fs-14 fw-bold d-flex align-items-center"
                        <?php echo $this->get_render_attribute_string('see_pricing_btn_link2'); ?>>
                        <?php echo cb_core_kses_basic($settings['see_pricing_btn_text']); ?>
                        <svg class="btn-icon position-absolute" width="10" height="10" viewBox="0 0 10 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z"
                                fill="#003C4F" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<!-- hero area end -->