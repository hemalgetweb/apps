<!-- testimonial area start -->
<div class="testimonial-area">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="apps-fz-section-title-wrapper-4 pb-50 text-center">
                    <?php if(!empty($settings['section_subtitle'])) : ?>
                        <span class="apps-fz-subtitle-4"><?php echo esc_html($settings['section_subtitle']); ?></span>
                    <?php endif; ?>
                    <?php if(!empty($settings['section_title'])) : ?>
                        <h4 class="apps-fz-title-4 fz-responsive"><?php echo esc_html($settings['section_title']); ?></h4>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php if(!empty($settings['slides'])) : ?>
        <div class="p-rel apps-fz-testimonial-slider-content-arrow-pos-rel">
            <?php if(!empty($settings['show_testimonial_arrow'])) : ?>
                <div class="apps-fz-slider-arrow-wrap-sm-4">
                    <button class="apps-fz-arrow-item-sm-4 apps-fz-arrow-testimonial-left-4 fz-responsive"><i class="fa-solid fa-angle-left"></i><i class="fa-solid fa-angle-left"></i></button>
                    <button class="apps-fz-arrow-item-sm-4 apps-fz-arrow-testimonial-right-4 fz-responsive"><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></button>
                </div>
            <?php endif; ?>
            <div class="apps-fz-testimonial-active-4 swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach($settings['slides'] as $slide) : 
                        $user_image = $slide['user_image']['url'];    
                    ?>
                    <div class="swiper-slide">
                        <div class="apps-fz-testimonial-box-4" data-bgcolor="#f9f9f9">
                            <div class="apps-fz-testimonial-box-top-wrapper-4 mb-25">
                                <?php if(!empty($user_image)) : ?>
                                <div class="image">
                                    <img src="<?php echo esc_url($user_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($slide['user_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if(!empty($slide['user_name'])) : ?>
                                        <h6 class="title"><?php echo cb_core_kses_basic($slide['user_name']); ?></h6>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['user_role'])) : ?>
                                        <p class="designation"><?php echo cb_core_kses_basic($slide['user_role']); ?></p>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['user_rating'])) : ?>
                                        <?php echo  cb_core_elementor_review_star_rating_3($slide['user_rating']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="apps-fz-testimonial-box-bottom-wrapper-4">
                                <?php if(!empty($slide['user_review'])) : ?>
                                    <p><?php echo cb_core_kses_basic($slide['user_review']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="apps-fz-testimonial-paginate-4 mt-45 text-center apps-fz-generic-paginate"></div>
        </div>
        <?php endif;?>
    </div>
</div>
<!-- testimonial area end -->