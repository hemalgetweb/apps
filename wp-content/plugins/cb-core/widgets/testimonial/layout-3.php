<!-- user feedback area start -->
<div class="user-feedback-area">
    <div class="container">
        <div class="apps-featured-section-top-wrap apps-rv-has-featured-bottom-space">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <?php if(!empty($settings['section_title'])) : ?>
                    <div class="apps-section-title-wrapper-1">
                        <h3 class="apps-section-title-1"><?php echo esc_html($settings['section_title']); ?></h3>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <?php if(!empty($settings['show_testimonial_arrow'])) : ?>
                    <div class="apps-rv-hand-picked-product-arrow">
                        <button class="apps-rv-arrow apps-rv-arrow-fedback-left"><i class="fa-light fa-long-arrow-left"></i><i class="fa-light fa-long-arrow-left"></i></button>
                        <button class="apps-rv-arrow apps-rv-arrow-fedback-right"><i class="fa-light fa-long-arrow-right"></i><i class="fa-light fa-long-arrow-right"></i></button>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="apps-feedback-testimonial-main-wrap">
            <?php if(!empty($settings['slides'])) : ?>
            <div class="apps-feedback-testimonial-main-active swiper-container pt-50 pb-50">
                <div class="swiper-wrapper">
                    <?php foreach($settings['slides'] as $slide) : 
                        $user_image = $slide['user_image']['url'];    
                    ?>
                    <div class="swiper-slide">
                        <div class="apps-feedback-testimonial-box">
                            <?php if(!empty($slide['user_rating'])) : ?>
                                <?php echo  cb_core_elementor_review_star_rating_2($slide['user_rating']); ?>
                            <?php endif; ?>
                            <?php if(!empty($slide['user_review'])) : ?>
                                <p><?php echo cb_core_kses_basic($slide['user_review']); ?></p>
                            <?php endif; ?>
                            <div class="quote">
                                <i class="flaticon flaticon-quotation"></i>
                            </div>
                            <div class="apps-feedback-author-box">
                                <?php if(!empty($user_image)) : ?>
                                <div class="image">
                                    <img src="<?php echo esc_url($user_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($slide['user_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if(!empty($slide['user_name'])) : ?>
                                        <h5 class="author-title"><?php echo cb_core_kses_basic($slide['user_name']); ?></h5>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['user_role'])) : ?>
                                        <span class="author-designation"><?php echo cb_core_kses_basic($slide['user_role']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- user feedback area end -->