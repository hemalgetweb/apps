<!-- slider area start -->
<div class="slider-area">
    <div class="container">
        <div class="ayaa-rv-slider">
            <div class="row justify-content-end">
                <div class="col-xxl-10">
                    <div class="pl-45 ayaa-rv-slider-space-left">
                        <div class="ayaa-rv-slider-wrapper p-rel pt-70 pl-100 pr-215" data-background="<?php echo esc_url($settings['bg_image']['url']) ? esc_url($settings['bg_image']['url']): ''; ?>">
                            <div class="ayaa-rv-slider-single">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <?php if(!empty($settings['slides'])) : ?>
                                        <div class="ayaa-rv-slider-content-activation mb-50 mb-xl-0">
                                            <?php foreach($settings['slides'] as $index => $slide) : ?>
                                            <div class="ayaa-rv-single-slide slick-slide elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
                                                <div class="ayaa-rv-slider-content pt-60">
                                                    <?php if(!empty($slide['subtitle'])) : ?>
                                                        <span class="ayaa-rv-slider-subtitle"><?php echo esc_html($slide['subtitle']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if(!empty($slide['title'])) : ?>
                                                        <h2 class="ayaa-rv-slider-title"><?php echo cb_core_kses_basic($slide['title']); ?></h2>
                                                    <?php endif; ?>
                                                    <?php if(!empty($slide['content'])) : ?>
                                                        <p><?php echo cb_core_kses_basic($slide['content']); ?></p>
                                                    <?php endif; ?>
                                                    <?php if(!empty($slide['btn_text'])) : ?>
                                                        <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']) : ''; ?>" class="ayaa-theme-border-btn"><span><?php echo esc_html($slide['btn_text']); ?></span><span><?php echo esc_html($slide['btn_text']); ?></span></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!-- /. single slider -->
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <?php if(!empty($settings['slides'])) : ?>
                                        <div class="ayaa-rv-slider-image-activation">
                                            <?php foreach($settings['slides'] as $index => $slide) : ?>
                                            <div class="rvel-rv-thumb-slide slick-slide slide-<?php echo esc_attr($index + 1); ?>">
                                                <?php if(!empty($slide['slider_image']['id'])) : ?>
                                                <div class="ayaa-rv-slider-image text-center text-md-end">
                                                    <?php echo wp_get_attachment_image( $slide['slider_image']['id'], 'full' ); ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider area end -->