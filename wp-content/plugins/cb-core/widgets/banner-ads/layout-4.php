<?php
    if ( ! empty( $settings['btn_link_1']['url'] ) ) {
        $this->add_link_attributes( 'btn_link_1', $settings['btn_link_1'] );
    }
?>
<!-- banner area start -->
<section class="banner-area">
    <div class="container">
        <div class="apps-fz-banner-box-4 bg-default pl-160 pr-155 pt-40" data-background="<?php echo esc_url($settings['banner_bg_imag_1']['url']) ? esc_url($settings['banner_bg_imag_1']['url']): ''; ?>">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="apps-fz-banner-box-left-4 mb-30 mb-lg-0">
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'banner_imag_1' ); ?>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="apps-fz-banner-content-right-4 pl-50 pb-40">
                        <?php if(!empty($settings['banner_subtitle_1'])) : ?>
                            <h6 class="subtitle"><?php echo cb_core_kses_basic($settings['banner_subtitle_1']); ?></h6>
                        <?php endif; ?>
                        <?php if(!empty($settings['banner_title_1'])) : ?>
                            <h3 class="title fz-responsive"><?php echo cb_core_kses_basic($settings['banner_title_1']); ?></span></h3>
                        <?php endif; ?>
                        <?php if(!empty($settings['banner_description_1'])) : ?>
                        <p><?php echo cb_core_kses_basic($settings['banner_description_1']); ?></p>
                        <?php endif; ?>
                        <?php if(!empty($settings['btn_text_1'])) : ?>
                        <a <?php echo $this->get_render_attribute_string( 'btn_link_1' ); ?> class="apps-fz-shop-btn-4"><span><?php echo cb_core_kses_basic($settings['btn_text_1']); ?></span><span><?php echo cb_core_kses_basic($settings['btn_text_1']); ?></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner area end -->