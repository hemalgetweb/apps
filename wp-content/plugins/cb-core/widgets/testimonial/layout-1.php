<?php if(!empty($settings['slides'])) : ?>
<!-- Client-Testimonials -->
<section class="Client-Testimonials">
    <div class="container">
        <div class="client-testimonials-slide apps-has-client-testimonial-slide-arrow-114">
            <div class="swiper_wrap">
                <div class="swiper-container client-testimonial-active">
                    <div class="swiper-wrapper">
                        <?php foreach($settings['slides'] as $index=>$slide) : ?>
                        <div class="swiper-slide client-item-wraps radius-16 position-relative">
                            <span class="client-qoute-icon position-absolute">
                                <img width="50" height="50' src="<?php echo get_template_directory_uri(); ?>/assets/img/client-qoute-icon.svg" alt="icon" class="img-fluid w-auto">
                            </span>
                            <div
                                class="client-testimonials-card d-flex flex-column justify-content-between bg-white radius-16">
                                <div class="ctc-top mb-5">
                                    <?php if(!empty($slide['testimonial_title'])) : ?>
                                    <h3 class="fs-28 fw-normal text-clr-dark2 mb-4">
                                        <?php echo wp_kses_post($slide['testimonial_title']); ?>
                                    </h3>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['testimonial_title'])) : ?>
                                    <div class="client-said fs-5 text-clr-dark2">
                                        <?php echo wpautop($slide['user_review']); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="ctc-bottom d-flex align-items-center gap-2">
                                    <?php if(!empty($slide['user_image']['url'])) : 
                                        $this->add_render_attribute( 'user_image', 'src', $slide['user_image']['url'] );
                                        $this->add_render_attribute( 'user_image', 'alt', \Elementor\Control_Media::get_image_alt( $slide['user_image'] ) );
                                        $this->add_render_attribute( 'user_image', 'title', \Elementor\Control_Media::get_image_title( $slide['user_image'] ) );
                                        $this->add_render_attribute( 'user_image', 'class', 'img-fluid w-auto' );    
                                    ?>
                                        <?php if(!empty($slide['user_image']['url'])) : ?>
                                        <div class="client-img">
                                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'user_image' ); ?>
                                        </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="client-info">
                                        <?php if(!empty($slide['user_name'])) : ?>
                                        <h4 class="client-name fs-18 fw-bold text-clr-dark1 mb-0">
                                            <?php echo wp_kses_post($slide['user_name']); ?>
                                        </h4>
                                        <?php endif; ?>
                                        <?php if(!empty($slide['user_role'])) : ?>
                                        <p class="client-designation fs-6 text-clr-dark3 fw-normal mb-0">
                                            <?php echo wp_kses_post($slide['user_role']); ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if(!empty($settings['show_testimonial_arrow'])) : ?>
                <!-- swiper-control -->
                <div class="swiper-control">
                    <div class="swiper-pagination11"></div>
                    <button type="button" class="swiper-prev swiper-arrow border-0 ni ni-arrow-left"></button>
                    <button type="button"
                        class="swiper-next swiper-arrow border-0 ni ni-arrow-right"></button>
                </div>
                <!--/ swiper-control -->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!--/ Client-Testimonials -->
<?php endif; ?>