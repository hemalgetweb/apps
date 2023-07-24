    <!-- contact -->
    <section class="contact bg-clr-dark8 pt-100">
        <div id="contact">
            <div class="contact-wrapper bg-white radius-6 position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="contact-img text-center text-lg-start">
                                <?php echo wp_get_attachment_image( $settings['cf7_image']['id'], 'full' ); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-header mb-4">
                                <?php if(!empty($settings['section_title'])) : ?>
                                <h3 class="fw-semi-bold fs-36 text-clr-dark1">
                                    <?php echo cb_core_kses_basic($settings['section_title']); ?>
                                </h3>
                                <?php endif; ?>
                                <?php if(!empty($settings['section_subtitle'])) : ?>
                                    <p class="fs-6 text-clr-dark2">
                                        <?php echo cb_core_kses_basic($settings['section_subtitle']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="contact-form pb-5 pb-lg-0">
                                <div class="form-wrapper">
                                <?php
                                    if(class_exists('WPCF7')) :
                                        if (!empty($settings['form_id'])) {
                                            echo cb_core_do_shortcode('contact-form-7', [
                                                'id' => $settings['form_id'],
                                                'html_class' => 'cb-cf7-form ' . cb_core_sanitize_html_class_param($settings['html_class']),
                                            ]);
                                        }
                                    endif;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ contact -->
