<!-- service area start -->
<section class="service-area">
    <div class="container">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="apps-service-grid-3-114">
            <?php foreach($settings['slides'] as $slide) : ?>
            <div class="apps-service-grid-item-114">
                <div class="apps-service-box-3-114">
                    <div class="apps-service-box-icon-3-114">
                        <?php echo wp_get_attachment_image( $slide['service_image']['id'], 'full' ); ?>
                    </div>
                    <div class="apps-service-box-content-3-114">
                        <?php if(!empty($slide['service_title'])) : ?>
                            <h5 class="title"><a href="<?php echo $slide['service_title_link']['url'] ? esc_url($slide['service_title_link']['url']): ''; ?>"><?php echo esc_html($slide['service_title']); ?></a></h5>
                        <?php endif; ?>
                        <?php if(!empty($slide['service_content'])) : ?>
                        <p><?php echo wp_kses_post($slide['service_content']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- service area end -->