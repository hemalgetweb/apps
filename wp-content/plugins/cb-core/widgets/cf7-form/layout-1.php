<div class="subscribe apps-el-subscribe py-25">
    <div class="container">
        <div class="bg" data-background="<?php echo esc_url($settings['cf7_bg_image']['url']) ? esc_url($settings['cf7_bg_image']['url']): ''; ?>">
            <?php if(!empty($settings['section_title'])) : ?>
            <div class="heading text-center">
                <h2><?php echo esc_html($settings['section_title']); ?></h2>
            </div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
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