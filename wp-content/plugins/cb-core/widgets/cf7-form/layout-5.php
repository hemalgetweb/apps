<!-- apps-fz-subscribe-area-start -->
<div class="apps-fz-subscribe-area pt-120 pb-130" data-background="<?php echo  esc_url($settings['cf7_bg_image']['url']) ? esc_url($settings['cf7_bg_image']['url']): ''; ?>">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="apps-fz-subscribe-3-content">
                    <?php if(!empty($settings['section_title'])) : ?>
                        <h4 class="apps-fz-subscribe-3-content-title"><?php echo cb_core_kses_basic($settings['section_title']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['section_subtitle'])) : ?>
                        <p><?php echo cb_core_kses_basic($settings['section_subtitle']); ?></p>
                    <?php endif; ?>
                    <div class="apps-fz-subscribe-3-input-wrapper mt-40">
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
<!-- apps-fz-subscribe-area-end -->