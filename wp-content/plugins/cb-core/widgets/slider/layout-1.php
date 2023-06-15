<?php if(!empty($settings['slides'])) : ?>
<div class="banner banner-2">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 category-col">
                
            </div>
            <div class="col-xl-9 col-lg-12">
                <div class="banner-slider cb-banner-slider-space">
                    <?php foreach($settings['slides'] as $index => $slide) : ?>
                    <div class="slide apps-slider-height-2 d-flex align-items-center slide-<?php echo esc_attr($index); ?>" data-background="<?php echo esc_url($slide['bg_image']['url']) ? esc_url($slide['bg_image']['url']): ''; ?>">
                        <div class="apps-slider-content-inner-2 w-100">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-9 col-lg-9">
                                    <div class="part-txt">
                                        <?php if(!empty($slide['subtitle'])) : ?>
                                        <h4><?php echo esc_html($slide['subtitle']); ?></h4>
                                        <?php endif; ?>
                                        <?php if(!empty($slide['title'])) : ?>
                                        <h1><?php echo esc_html($slide['title']); ?></h1>
                                        <?php endif; ?>
                                        <?php if(!empty($slide['old_price'] || $slide['new_price'])) : ?>
                                        <p class="price">
                                            <?php if(!empty($slide['old_price'])) : ?>
                                                <span><?php echo esc_html($slide['old_price']); ?></span> 
                                            <?php endif; ?>
                                            <?php if(!empty($slide['new_price'])) : ?>
                                                <?php echo esc_html($slide['new_price']); ?>
                                            <?php endif; ?>
                                        </p>
                                        <?php endif; ?>
                                        <?php if(!empty($slide['btn_text'])) : ?>
                                            <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']): ''; ?>" class="def-btn-3"><?php echo esc_html($slide['btn_text']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>