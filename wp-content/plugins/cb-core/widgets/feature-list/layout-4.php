<!-- feature list area start -->
<section class="feature-list-area">
    <div class="container">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="row">
            <?php foreach($settings['slides'] as $slide) : ?>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                <div class="ayaa-fz-feature-list-box-2 wow fadeInUp mb-30">
                    <?php if(!empty($slide['feature_image']['url'])) : ?>
                    <div class="image">
                        <img src="<?php echo $slide['feature_image']['url'];?>" alt="<?php echo get_post_meta(attachment_url_to_postid($slide['feature_image']['url']), '_wp_attachment_image_alt', true); ?>">
                    </div>
                    <?php endif; ?>
                    <div class="content">
                        <?php if(!empty($slide['feature_title'])) : ?>
                            <h5 class="title"><span><?php echo cb_core_kses_basic($slide['feature_title']); ?></span></h5>
                        <?php endif; ?>
                        <?php if(!empty($slide['feature_content'])) : ?>
                            <p><?php echo cb_core_kses_basic($slide['feature_content']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif;?>
    </div>
</section>
<!-- feature list area end -->