<?php

if ( ! empty( $settings['fb_link']['url'] ) ) {
    $this->add_link_attributes( 'fb_link', $settings['fb_link'] );
}
if ( ! empty( $settings['twitter_link']['url'] ) ) {
    $this->add_link_attributes( 'twitter_link', $settings['twitter_link'] );
}
if ( ! empty( $settings['instagram_link']['url'] ) ) {
    $this->add_link_attributes( 'instagram_link', $settings['instagram_link'] );
}
if ( ! empty( $settings['youtube_link']['url'] ) ) {
    $this->add_link_attributes( 'youtube_link', $settings['youtube_link'] );
}
?>
<!-- apps-fz-contact-page-area-start -->
<div class="farza-fz-contact-area pt-100 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="apps-fz-contact-message-wrapper mb-40">
                    <?php if(!empty($settings['section_title'])) : ?>
                        <h4 class="apps-fz-contact-message-title mb-30"><?php echo cb_core_kses_basic($settings['section_title']); ?></h4>
                    <?php endif; ?>
                    <?php
                        if (!empty($settings['form_id'])) {
                            echo cb_core_do_shortcode('contact-form-7', [
                                'id' => $settings['form_id'],
                                'html_class' => 'cb-cf7-form ' . cb_core_sanitize_html_class_param($settings['html_class']),
                            ]);
                        }
                    ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="apps-fz-contact-info-wrapper mb-40 ml-50" data-bgcolor="#F5F5F5">
                    <?php if(!empty($settings['_touch_title'])) : ?>
                        <h4 class="apps-fz-contact-info-title mb-30"><?php echo cb_core_kses_basic($settings['_touch_title']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['_touch_address'])) : ?>
                    <div class="apps-fz-contact-info-single">
                        <span class="apps-fz-contact-info-single-icon"><i class="fa-thin fa-location-dot"></i></span>
                        <div class="apps-fz-contact-info-single-text"><?php echo cb_core_kses_basic($settings['_touch_address']); ?></div>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($settings['_touch_number_text_1']) || !empty('_touch_number_text_2')) : ?>
                    <div class="apps-fz-contact-info-single"> 
                        <span class="apps-fz-contact-info-single-icon"><i class="fa-thin fa-phone-flip"></i></span>
                        <div class="apps-fz-contact-info-single-text">
                            <?php if(!empty($settings['_touch_number_text_1'])) : ?>
                                <a href="<?php echo $settings['_touch_number_link']['url'] ? esc_url('tel:'.$settings['_touch_number_link']['url']): ''; ?>"><?php echo cb_core_kses_basic($settings['_touch_number_text_1']); ?></a>
                            <?php endif; ?>
                            <?php if(!empty($settings['_touch_number_text_2'])) : ?>
                                <a href="<?php echo $settings['_touch_number_link_2']['url'] ? esc_url('tel:'. $settings['_touch_number_link_2']['url']): ''; ?>"><?php echo cb_core_kses_basic($settings['_touch_number_text_2']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php if(!empty($settings['_office_hourse_value'])) : ?>
                        <div class="apps-fz-contact-info-single"> 
                            <span class="apps-fz-contact-info-single-icon"><i class="fa-thin fa-clock"></i></span>
                            <div class="apps-fz-contact-info-single-text">
                                <?php if(!empty($settings['_office_hourse_label'])) : ?>
                                    <span class="apps-fz-contact-info-single-text-label"><?php echo cb_core_kses_basic($settings['_office_hourse_label']); ?></span>
                                <?php endif; ?>
                                    <span><?php echo cb_core_kses_basic($settings['_office_hourse_value']); ?></span>
                                </div>
                        </div>
                    <?php endif; ?>
                    <div class="apps-fz-contact-social-wrapper mt-30">
                        <span class="apps-fz-contact-social-label"><?php echo esc_html__('Follow Us:', 'cb-core'); ?></span>
                        <?php if(!empty($settings['fb_link'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'fb_link' ); ?>><i class="fa-brands fa-facebook-f"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($settings['twitter_link'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'twitter_link' ); ?>><i class="fa-brands fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($settings['instagram_link'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'instagram_link' ); ?>><i class="fa-brands fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($settings['youtube_link'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'youtube_link' ); ?>><i class="fa-brands fa-youtube"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- apps-fz-contact-page-area-end -->