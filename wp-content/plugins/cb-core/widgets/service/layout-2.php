<?php $box_min_height = $settings['box_min_height']; ?>
<?php $enable_box_border = $settings['enable_box_border']; ?>
<!-- service area start -->
<section class="service-area">
    <div class="container">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="row">
            <?php foreach($settings['slides'] as $slide) : ?>
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <!-- service box 2 -->
                <div class="apps-service-box-2-114 mb-30 <?php echo $enable_box_border ? esc_attr__('has-enabled-border', 'cb-core'): ''; ?> <?php echo $settings['enable_box_shadow_effect'] ? esc_attr__('has-shadow-on-hover'): ''; ?>" style="min-height: <?php echo $box_min_height ? $box_min_height. 'px' : ''; ?>">
                    <?php if(!empty($slide['service_image']['url'])) : ?>
                    <div class="apps-service-box-icon-2-114">
                        <img width="48" height="48" src="<?php echo esc_url($slide['service_image']['url']); ?>" alt="service">
                    </div>
                    <?php endif; ?>
                    <div class="apps-service-box-content-2-114">
                        <?php if(!empty($slide['service_title'])) :  ?>
                            <h4 class="title text-clr-deepDark"><?php echo wp_kses_post($slide['service_title']);  ?></h4>
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