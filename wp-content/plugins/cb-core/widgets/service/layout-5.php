<?php $box_min_height = $settings['box_min_height']; ?>
<?php $enable_box_shadow_effect = $settings['enable_box_shadow_effect']; ?>
<!-- service area start -->
<section class="service-area <?php echo $enable_box_shadow_effect ? __('apps-has-shadow-effect-114') : ''; ?>">
    <div class="container">
        <?php if (!empty($settings['slides'])) : ?>
            <div class="row justify-content-center">
                <?php foreach ($settings['slides'] as $slide) : ?>
                    <div class="col-xxl-4 col-xl-4 col-md-6 col-sm-6">
                     
                            <a class="social-media-services-box" href="<?php echo $slide['service_title_link']['url'] ? esc_url($slide['service_title_link']['url']) : ''; ?>">
                            <div class="apps-service-box-2-114">
                                <div class=" mb-30" style="min-height: <?php echo $box_min_height ? $box_min_height . 'px' : ''; ?>">
                                    <?php if (!empty($slide['service_image']['url'])) : ?>
                                        <div class="apps-service-box-icon-114">
                                            <img src="<?php echo esc_url($slide['service_image']['url']); ?>" alt="service">
                                        </div>
                                    <?php endif; ?>
                                    <div class="apps-service-box-content-wrap-114">
                                        <?php if (!empty($slide['service_title'])) : ?>
                                            <h5 class="apps-service-box-title-114">
                                                <span><?php echo wp_kses_post($slide['service_title']);  ?></span>
                                            </h5>
                                        <?php endif; ?>
                                        <?php if (!empty($slide['service_content'])) : ?>
                                            <p><?php echo wp_kses_post($slide['service_content']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        </div>
                            </a>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- service area end -->