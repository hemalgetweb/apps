    <!-- contact -->
    <div style="background: var(--dark-dark-1, #003959);" id="contact">
        <div class="container">
            <div class="section-padding">
                <div class="row align-items-center gx-xl-5">
                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <div class="contact-left">
                            <div class="mb-5">
                                <?php if(!empty($settings['section_subtitle'])) : ?>
                                <span
                                    class="section-tag fs-12 fw-bold text-uppercase text-clr-primary2 d-inline-flex gap-2 align-items-center mb-2">
                                    <img src="http://wadialbadaitsolutions.ae/wp-content/uploads/2023/07/tag.svg" alt="icon" class="img-fluid">
                                    <?php echo wp_kses_post($settings['section_subtitle']); ?>
                                </span>
                                <?php endif; ?>
                                <?php if(!empty($settings['section_title'])) : ?>
                                <h2 class="fw-regular text-white fs-48">
                                    <?php echo wp_kses_post($settings['section_title']); ?>
                                </h2>
                                <?php endif; ?>
                                <?php if(!empty($settings['section_content'])) : ?>
                                <p class="fs-6 text-clr-primary2">
                                    <?php echo wp_kses_post($settings['section_content']); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($settings['slides'])) : ?>
                            <div class="apps-contact-form-left-114">
                                <?php foreach($settings['slides'] as $index => $slide) : ?>
                                    <?php if(!empty($slide['address_repeater_title'])) : ?>
                                        <h6 class="apps-contact-form-left-title-116"><?php echo wp_kses_post( $slide['address_repeater_title'] ); ?></h6>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['address_repeater_content'])) : ?>
                                        <p><?php echo wp_kses_post( $slide['address_repeater_content'] ); ?></p>
                                    <?php endif; ?>
                                    <?php if($index == 0) : ?>
                                    <hr/>
                                    <hr class="mb-15-i"/>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <div class="apps-contact-form-contact-list-wap-114">
                                <?php if(!empty($settings['email_text'])) : ?>
                                <a href="mailto:<?php echo $settings['email_link'] ?? esc_attr($settings['email_link']); ?>"><img src="http://wadialbadaitsolutions.ae/wp-content/uploads/2023/07/e-1.svg" alt="email"> <?php echo esc_html($settings['email_text']); ?></a>
                                <?php endif; ?>
                                <?php if(!empty($settings['number_text'])) : ?>
                                <a href="tel:<?php echo $settings['number_link'] ?? $settings['number_link']; ?>"><img src="http://wadialbadaitsolutions.ae/wp-content/uploads/2023/07/p-1.svg" alt="tel"><?php echo esc_html($settings['number_text']); ?></a>
                                <?php endif;  ?>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-us-form">
                            <div class="contact-header">
                                <?php if(!empty($settings['cf7_section_title'])) : ?>
                                <h3 class="fw-semi-bold fs-36 text-clr-dark1">
                                    <?php echo wp_kses_post($settings['cf7_section_title']); ?>
                                </h3>
                                <?php endif; ?>
                                <?php if(!empty($settings['cf7_section_content'])) : ?>
                                <p class="fs-6 text-clr-dark2">
                                    <?php echo wp_kses_post( ($settings['cf7_section_content'])); ?> 
                                </p>
                                <?php endif; ?>
                            </div>
                            <div class="contact-form">
                                <div class="form-wrappers">
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
    </div>
    <!--/ contact -->