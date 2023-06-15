<!-- subscribe area start -->
<section class="subscribe-area fz-has-subscribe-anim-img-bg-4 bg-default pt-120 pb-120 p-rel fix">
    <div class="fz-subscribe-bg-img-4 fz-img-anim">
        <img data-speed="1" data-lag="0.5" src="<?php echo  esc_url($settings['cf7_bg_image']['url']) ? esc_url($settings['cf7_bg_image']['url']): '' ?>" alt="<?php echo \Elementor\Control_Media::get_image_alt( $settings['cf7_bg_image'] ); ?>">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-8 col-lg-8 col-md-10">
                <div class="apps-fz-subscribe-inner-4 fz-responsive">
                    <?php if(!empty($settings['section_title'])) : ?>
                        <h4 class="title"><?php echo cb_core_kses_basic($settings['section_title']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['section_subtitle'])) : ?>
                        <p><?php echo cb_core_kses_basic($settings['section_subtitle']); ?></p>
                    <?php endif; ?>
                    <div class="apps-fz-subscribe-form-4">
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
</section>
<!-- subscribe area end -->