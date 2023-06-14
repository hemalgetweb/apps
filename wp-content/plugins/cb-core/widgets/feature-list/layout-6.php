<!-- feature area start -->
<div class="feature-area pt-60 pb-60">
    <div class="container container-1790">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="ayaa-fz-featured-box-inner-wrapper-6">
            <div class="row g-0 justify-content-center">
                <?php foreach($settings['slides'] as $slide) : ?>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="ayaa-fz-featured-box-6">
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon( $slide['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php \Elementor\Icons_Manager::render_icon( $slide['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <div class="content">
                            <?php if(!empty($slide['feature_title'])) : ?>
                                <h5 class="title"><span><?php echo cb_core_kses_basic($slide['feature_title']); ?></span></h5>
                            <?php endif; ?>
                            <?php if(!empty($slide['feature_content'])) : ?>
                                <span class="label"><?php echo cb_core_kses_basic($slide['feature_content']); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- feature area end -->