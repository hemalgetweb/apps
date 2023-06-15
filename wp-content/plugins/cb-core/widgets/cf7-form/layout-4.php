<!-- subscribe area start -->
<section class="subscribe-area">
    <div class="container">
        <div class="apps-fz-subscribe-box-2 pl-60 pr-60 pt-40 pb-40" data-bgcolor="#00274C">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-12 mb-30 mb-xl-0">
                    <div class="apps-fz-subscribe-left-2">
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['cta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <div class="content">
                            <?php if(!empty($settings['section_title'])) : ?>
                                <h5 class="title"><?php echo cb_core_kses_basic($settings['section_title']); ?></h5>
                            <?php endif; ?>
                            <?php if(!empty($settings['section_subtitle'])) : ?>
                                <p><?php echo cb_core_kses_basic($settings['section_subtitle']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-12">
                    <div class="apps-fz-subscribe-right-2">
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