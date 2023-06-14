<?php if(!empty($settings['slides'])) : ?>
<div class="features features-2" id="feature">
    <div class="container">
        <div class="panel panel-shadow px-0">
            <div class="custom-row">
            <?php foreach($settings['slides'] as $index => $slide) : ?>
                <div class="custom-col">
                    <div class="single-feature">
                        <div class="part-icon">
                            <span><?php \Elementor\Icons_Manager::render_icon( $slide['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                        </div>
                        <div class="part-txt">
                            <?php if(!empty($slide['feature_title'])) : ?>
                                <h4><?php echo cb_core_kses_basic($slide['feature_title']); ?></h4>
                            <?php endif; ?>
                            <?php if(!empty($slide['feature_content'])) : ?>
                                <p><?php echo cb_core_kses_basic($slide['feature_content']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>