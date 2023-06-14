<!-- testimonial area start -->
<div class="testimonial-area pt-103">
    <div class="container">
        <div class="ayaa-fz-testimonial-wrapper-main-6 p-rel">
            <?php if(!empty($settings['section_title'])) : ?>
                <div class="ayaa-fz-section-title-wrapper-6 text-center pb-25">
                    <h3 class="ayaa-fz-section-title-6 mb-0"><?php echo cb_core_kses_basic($settings['section_title']); ?></h3>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-9">
                    <?php if(!empty($settings['slides'])) : ?>
                    <div class="ayaa-fz-testimonial-review-wrapper-6 p-rel">
                        <div class="ayaa-fz-testimonial-review-active-6 swiper-container pb-70">
                            <div class="swiper-wrapper">
                                <?php foreach($settings['slides'] as $slide) : 
                                    $user_image = $slide['user_image']['url'];    
                                ?>
                                <div class="swiper-slide">
                                    <div class="ayaa-fz-testimonial-single-6 text-center">
                                        <div class="arrow">
                                            <i class="fa-solid fa-quote-right"></i>
                                        </div>
                                        <?php if(!empty($slide['user_review'])) : ?>
                                            <p class="desc"><?php echo cb_core_kses_basic($slide['user_review']); ?></p>
                                        <?php endif; ?>
                                        <div class="ayaa-fz-testimonial-author-box-6">
                                            <?php if(!empty($slide['user_rating'])) : ?>
                                            <div class="ayaa-fz-testimonial-author-rating-6">
                                                <?php echo  cb_core_elementor_review_star_rating_4($slide['user_rating']); ?>
                                            </div>
                                            <?php endif; ?>
                                            <?php if(!empty($user_image)) : ?>
                                            <div class="thumb">
                                                <img src="<?php echo esc_url($user_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($slide['user_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                            </div>
                                            <?php endif; ?>
                                            <?php if(!empty($slide['user_name'])) : ?>
                                            <h4 class="name"><?php echo cb_core_kses_basic($slide['user_name']); ?></h4>
                                            <?php endif; ?>
                                            <?php if(!empty($slide['user_role'])) : ?>
                                            <span class="designation"><?php echo cb_core_kses_basic($slide['user_role']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="ayaa-fz-testimonial-bg-shape-6">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/shape/angur.png" alt="<?php echo esc_attr__('Line', 'cb-core'); ?>">
                        </div>
                        <?php if(!empty($settings['show_testimonial_arrow'])) : ?>
                        <div class="ayaa-fz-testimonial-arrow-6">
                            <button class="prev"><i class="fa-light fa-angle-left"></i><i class="fa-light fa-angle-left"></i></button>
                            <button class="next"><i class="fa-light fa-angle-right"></i><i class="fa-light fa-angle-right"></i></button>
                        </div>
                        <?php endif; ?>
                        <div class="ayaa-fz-testimonial-paginate-6"></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="ayaa-fz-restimonial-line-bottom-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/shape/line.png" alt="<?php echo esc_attr__('Line', 'cb-core'); ?>">
            </div>
        </div>
    </div>
</div>
<!-- testimonial area end -->