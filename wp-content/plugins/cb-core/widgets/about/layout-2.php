<!-- about area 2 start -->
<section class="about-area-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5">
                <div class="apps-about-left-2-144 mb-50 mb-md-0">
                    <?php echo wp_get_attachment_image( $settings['about_image']['id'], 'full' ); ?>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-7">
                <div class="apps-about-right-114">
                <div class="apps-about-section-title-wrapper-114">
                    <?php if(!empty($settings['about_subtitle'])) : ?>
                        <span class="apps-about-section-subtitle-114"><img decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/img/rect.svg" alt="about subtitle image"> <?php echo esc_html($settings['about_subtitle']); ?></span>
                    <?php endif; ?>
                    <?php if(!empty($settings['about_title'])) : ?>
                        <h3 class="apps-about-section-title-114"><?php echo wp_kses_post($settings['about_title']); ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($settings['about_desc'])) : ?>
                    <p><?php echo wp_kses_post($settings['about_desc']); ?></p>
                    <?php endif; ?>
                    <?php if(!empty($settings['btn_text'])) : ?>
                        <a href="<?php echo $settings['btn_link']['url'] ?? esc_url($settings['btn_link']['url']); ?>" class="apps-el-btn-114 button-arrow-left-icon"><?php echo esc_html($settings['btn_text']); ?> <i class="fal fa-arrow-right"></i></a>
                    <?php endif; ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about area 2 end -->