<?php
    use Elementor\Icons_Manager;
?>
<!-- apps rv subscribe area start -->
<div class="apps-rv-subscribe-area bg-default pt-164 pb-165">
    <div class="container">
        <div class="p-rel">
            <div class="apps-rv-subscribe-tab-front-img d-none d-md-block">
                <?php echo wp_get_attachment_image( $settings['cf7_font_image']['id'], 'full' ); ?>
            </div>
            <div class="apps-rv-subscribe-inner apps-rv-theme-overlay pt-95 pb-100" data-background="<?php echo esc_url($settings['cf7_bg_image']['url']) ? esc_url($settings['cf7_bg_image']['url']): ''; ?>">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-10">
                        <div class="apps-rv-subscribe-inner-child text-center">
                            <div class="apps-rv-subscribe-icon">
                                <?php Icons_Manager::render_icon( $settings['cta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <div class="apps-rv-subscribe-content">
                                <?php if(!empty($settings['section_title'])) : ?>
                                    <h3 class="apps-rv-subscribe-title"><?php echo cb_core_kses_basic($settings['section_title']); ?></h3>
                                <?php endif; ?>
                                <?php if(!empty($settings['section_subtitle'])) : ?>
                                <div class="apps-rv-subscribe-content white-text"><p><?php echo cb_core_kses_basic($settings['section_subtitle']); ?></p></div>
                                <?php endif; ?>
                                <div class="pt-45">
                                    <div class="apps-rv-subscribe-form text-start">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- apps rv subscribe area end -->