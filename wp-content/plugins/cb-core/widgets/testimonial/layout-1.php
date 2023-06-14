<div class="testimonial py-25">
    <div class="container">
        <div class="panel panel-2">
            <?php if(!empty($settings['section_title'])) : ?>
            <div class="heading text-center">
                <h2><?php echo esc_html($settings['section_title']); ?></h2>
            </div>
            <?php endif; ?>
            <?php if(!empty($settings['slides'])) : ?>
            <div class="review-slider">
                <?php foreach($settings['slides'] as $slide) : 
                    $user_image = $slide['user_image']['url'];    
                ?>
                <div class="review-card">
                    <div class="user">
                        <?php if(!empty($user_image)) : ?>
                        <div class="part-img">
                            <div class="avatar">
                                <img src="<?php echo esc_url($user_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($user_image), '_wp_attachment_image_alt', true); ?>">
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="txt">
                            <?php if(!empty($slide['user_name'])) : ?>
                            <h4><?php echo cb_core_kses_basic($slide['user_name']); ?></h4>
                            <?php endif; ?>
                            <?php if(!empty($slide['user_role'])) : ?>
                            <span><?php echo cb_core_kses_basic($slide['user_role']); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if(!empty($slide['user_review'])) : ?>
                    <div class="main-txt">
                        <p><?php echo cb_core_kses_basic($slide['user_review']); ?></p>
                    </div>
                    <?php endif; ?>
                    <div class="star-wrap">
                        <?php if(!empty($slide['user_rating'])) : ?>
                            <div class="star">
                                <?php echo  cb_core_elementor_review_star_rating($slide['user_rating']); ?>
                            </div>
                            <span><?php echo esc_html($slide['user_rating']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>