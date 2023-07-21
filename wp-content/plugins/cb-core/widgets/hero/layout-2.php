<!-- hero area start -->
<div class="apps-hero-area-114">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="apps-hero-content-wrapper-114 mb-50 mb-lg-0">
                    <?php if(!empty($settings['subtitle'])) : ?>
                    <span class="subtitle"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-spinner.png" alt="subtitle image"> <?php echo esc_html($settings['subtitle']); ?></span>
                    <?php endif; ?>
                    <?php if(!empty($settings['bannerTitle'])) : ?>
                    <h2 class="title"><?php echo esc_html($settings['bannerTitle']); ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($settings['_description'])) : ?>
                    <p class="content"><?php echo wp_kses_post($settings['_description']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="apps-hero-svg-114">
                    <?php
                        $this->add_render_attribute( 'banner_image', 'src', $settings['banner_image']['url'] );
                        $this->add_render_attribute( 'banner_image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['banner_image'] ) );
                        $this->add_render_attribute( 'banner_image', 'title', \Elementor\Control_Media::get_image_title( $settings['banner_image'] ) );
                    ?>
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'banner_image' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero area end -->