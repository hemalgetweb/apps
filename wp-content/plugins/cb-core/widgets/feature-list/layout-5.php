<!-- feature list area start -->
<section class="feature-list">
    <div class="container">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="ayaa-fz-feature-list-box-wrapper-4 fz-responsive">
            <div class="row align-items-center justify-content-center">
                <?php foreach($settings['slides'] as $slide) : ?>
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="ayaa-fz-feature-list-box-4 fz-responsive">
                        <?php if(!empty($slide['feature_image']['url'])) : ?>
                        <div class="icon">
                            <img src="<?php echo $slide['feature_image']['url'];?>" alt="<?php echo get_post_meta(attachment_url_to_postid($slide['feature_image']['url']), '_wp_attachment_image_alt', true); ?>">
                        </div>
                        <?php endif; ?>
                        <div class="content">
                            <?php if(!empty($slide['feature_title'])) : ?>
                                <h6 class="title"><span><?php echo cb_core_kses_basic($slide['feature_title']); ?></span></h6>
                            <?php endif; ?>
                            <?php if(!empty($slide['feature_content'])) : ?>
                                <span class="subtitle"><?php echo cb_core_kses_basic($slide['feature_content']); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- feature list area end -->