<?php $box_min_height = $settings['box_min_height']; ?>
<!-- service area start -->
<section class="service-area">
    <div class="container">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="row">
            <?php foreach($settings['slides'] as $slide) : ?>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <!-- service box 2 -->
                <div class="apps-service-box-2-114 mb-30" style="min-height: <?php echo $box_min_height ? $box_min_height. 'px' : ''; ?>">
                    <?php if(!empty($slide['service_image']['url'])) : ?>
                    <div class="apps-service-box-icon-2-114">
                        <img src="<?php echo esc_url($slide['service_image']['url']); ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="apps-service-box-content-2-114">
                        <?php if(!empty($slide['service_title'])) : 
                            if ( ! empty( $slide['service_title_link']['url'] ) ) {
                                $this->add_link_attributes( 'service_title_link', $slide['service_title_link'] );
                            }
                        ?>
                            <h4 class="title"><a <?php echo $this->get_render_attribute_string( 'service_title_link' ); ?>><?php echo wp_kses_post($slide['service_title']);  ?></a></h4>
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