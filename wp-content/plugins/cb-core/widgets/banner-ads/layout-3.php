<?php
if ( ! empty( $settings['btn_link_1']['url'] ) ) {
    $this->add_link_attributes( 'btn_link_1', $settings['btn_link_1'] );
}
?>
<!-- banner area start -->
<section class="banner-area">
    <div class="container">
        <div class="apps-fz-black-banner-2 pl-100 pr-100 bg-default" data-bgcolor="#1a1a1a" data-background="<?php echo esc_url($settings['banner_bg_imag_1']['url']) ? esc_url($settings['banner_bg_imag_1']['url']): ''; ?>">
            <div class="row align-items-center">
                <div class="col-xxl-7 col-xl-6 col-lg-6">
                    <div class="apps-fz-black-banner-left-wrapper-2 mb-30 mb-lg-0">
                        <?php if(!empty($settings['banner_title_1'])) : ?>
                            <h4 class="apps-fz-black-banner-title-2"><?php echo cb_core_kses_basic($settings['banner_title_1']); ?></h4>
                        <?php endif; ?>
                        <?php if(!empty($settings['btn_text_1'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'btn_link_1' ); ?> class="apps-fz-black-banner-btn-2"><?php echo cb_core_kses_basic($settings['btn_text_1']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-6 col-lg-6 align-self-end">
                    <div class="apps-fz-black-banner-right-img-2 text-center text-lg-end pt-25 fix">
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'banner_imag_1' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner area end -->