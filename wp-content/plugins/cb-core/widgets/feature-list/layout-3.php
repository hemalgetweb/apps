<!-- features area start -->
<div class="features-area">
    <div class="container">
        <div class="row justify-content-center">
            <?php if(!empty($settings['slides'])) : ?>
                <?php foreach($settings['slides'] as $slide) : ?>
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="ayaa-rv-features-content-box">
                            <div class="content">
                                <?php if(!empty($slide['feature_content'])) : ?>
                                    <span class="subtitle"><?php echo cb_core_kses_basic($slide['feature_content']); ?></span>
                                <?php endif; ?>
                                <?php if(!empty($slide['feature_title'])) : ?>
                                    <h5 class="title"><?php echo cb_core_kses_basic($slide['feature_title']); ?></h5>
                                <?php endif; ?>
                            </div>
                            <div class="icon">
                                <?php \Elementor\Icons_Manager::render_icon( $slide['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php \Elementor\Icons_Manager::render_icon( $slide['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- features area end -->