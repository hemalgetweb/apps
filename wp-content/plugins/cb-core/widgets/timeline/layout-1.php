<!-- timeline area start -->
<section class="timeline-area">
    <div class="container">
        <div class="apps-timeline-section-wrapper-main-114">
            <?php if('ltr' == $settings['timeline_direction']) : ?>
            <div class="apps-timeline-item-wrapper-114">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="apps-timeline-item-left-img-114 mb-50 mb-md-0">
                            <?php echo wp_get_attachment_image( $settings['timeline_image']['id'], 'full' ); ?>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="apps-timeline-item-right-content-114 pl-30">
                            <?php if(!empty($settings['timeline_count'])) : ?>
                                <span class="apps-count"><?php echo esc_html($settings['timeline_count']); ?></span>
                            <?php endif; ?>
                            <?php if(!empty($settings['timeline_title'])) : ?>
                                <h5 class="apps-title"><?php echo esc_html($settings['timeline_title']); ?></h5>
                            <?php endif; ?>
                            <?php if(!empty($settings['timeline_description'])) : ?>
                            <p><?php echo wp_kses_post($settings['timeline_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. single timeline item -->
            <?php endif; ?>
            <?php if('rtl' == $settings['timeline_direction']) : ?>
            <div class="apps-timeline-item-wrapper-114">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="apps-timeline-item-right-content-114 pr-30">
                            <?php if(!empty($settings['timeline_count'])) : ?>
                                <span class="apps-count"><?php echo esc_html($settings['timeline_count']); ?></span>
                            <?php endif; ?>
                            <?php if(!empty($settings['timeline_title'])) : ?>
                                <h5 class="apps-title"><?php echo esc_html($settings['timeline_title']); ?></h5>
                            <?php endif; ?>
                            <?php if(!empty($settings['timeline_description'])) : ?>
                            <p><?php echo wp_kses_post($settings['timeline_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="apps-timeline-item-left-img-114 mb-50 mb-md-0">
                            <?php echo wp_get_attachment_image( $settings['timeline_image']['id'], 'full' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. single timeline item -->
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- timeline area end -->