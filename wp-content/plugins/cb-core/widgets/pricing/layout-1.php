<!-- pricing start -->
<section class="pricing <?php echo $settings['active_price_box'] ? esc_attr__('active'): ''; ?>">
    <div class="pricing-wrapper">
        <div class="single-price">
            <div class="pricing-item radius-6 h-100">
                <div class="pricing-heading">
                    <?php if(!empty($settings['pricing_image']['url'])) :
                        $this->add_render_attribute( 'pricing_image', 'src', $settings['pricing_image']['url'] );
                        $this->add_render_attribute( 'pricing_image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['pricing_image'] ) );
                        $this->add_render_attribute( 'pricing_image', 'title', \Elementor\Control_Media::get_image_title( $settings['pricing_image'] ) );    
                    ?>
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'pricing_image' ); ?>
                    <?php endif; ?>
                    <?php if(!empty($settings['pricing_title'])) : ?>
                        <h4 class="fs-4 text-clr-primary"><?php echo esc_html($settings['pricing_title']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['pricing_desc'])) : ?>
                        <p class="fs-6 text-clr-dark2"><?php echo wp_kses_post($settings['pricing_desc']); ?></p>
                    <?php endif; ?>
                </div>
                <div class="pricing-count">
                    <h5 class="fs-2 fw-semi-bold text-clr-dark1 mb-3">
                        <?php if(!empty($settings['pricing_price_count'])) : ?>
                            <?php echo wp_kses_post($settings['pricing_price_count']); ?> 
                        <?php endif; ?>
                        <?php if(!empty($settings['pricing_price_label'])) : ?>
                            <span class="fs-6 text-clr-dark4">/<?php echo wp_kses_post($settings['pricing_price_label']); ?> </span>
                        <?php endif; ?>
                    </h5>
                    <?php if(!empty($settings['pricing_btn_text'])) : ?>
                    <a href="<?php echo $settings['pricing_btn_url']['url'] ? esc_url($settings['pricing_btn_url']['url']): ''; ?>" class="price-btn d-block w-100 fs-14 fw-bold text-clr-dark1 text-uppercase" type="a"><?php echo wp_kses_post($settings['pricing_btn_text']); ?> <span class="ps-2"><svg class="mb-1" width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 10L4.615 9.115L8.10417 5.625H0.5V4.375H8.10417L4.615 0.885L5.5 0L10.5 5L5.5 10Z" />
                            </svg>
                        </span>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="pricing-feature">
                    <?php if(!empty($settings['repeater_label'])) : ?>
                        <h5 class="fs-6 text-clr-dark1 price-feature-title"><?php echo wp_kses_post($settings['repeater_label']); ?> </h5>
                    <?php endif; ?>
                    <?php if(!empty($settings['slides'])) : ?>
                    <ul class="list-unstyled">
                        <?php foreach($settings['slides'] as $slide) : ?>
                        <li class="d-flex align-items-center gap-3 mb-3">
                            <?php if(!empty($slide['active_feature'])) : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/feature-inclue.svg" class="img-fluid" alt="feature">
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/not-include.svg" class="img-fluid" alt="feature">
                            <?php endif; ?>
                            <?php if(!empty($slide['list_title'])) : ?>
                                <p class="fs-6 text-clr-dark3 fw-normal mb-0"><?php echo wp_kses_post($slide['list_title']); ?></p>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ pricing end -->