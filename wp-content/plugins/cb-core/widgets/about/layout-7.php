<!-- about area start -->
<section class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-5">
                <div class="apps-about-content-left-7-114 mb-50 m b-lg-0 text-center">
                    <?php echo wp_get_attachment_image( $settings['about_image']['id'], 'full' ); ?>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-7">
                <div class="apps-about-content-right-7-114 cb-core-content">
                    <div class="apps-about-section-title-wrapper-7-114">
                        <?php if(!empty($settings['about_subtitle'])) : ?>
                            <span class="subtitle cb-el-subtitle"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/rect.svg" alt="rect"> <?php echo wp_kses_post($settings['about_subtitle']); ?></span>
                        <?php endif; ?>
                        <?php if(!empty($settings['about_title'])) : ?>
                            <h5 class="title cb-core-title"><?php echo wp_kses_post($settings['about_title']); ?></h5>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($settings['about_desc'])) : ?>
                        <?php echo wp_kses_post($settings['about_desc']); ?>
                    <?php endif; ?>
                    <?php if(!empty($settings['slides'])) : ?>
                    <div class="apps-about-list-wrapper-7-114">
                        <div class="row">
                            <?php foreach($settings['slides'] as $slide) : ?>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 elementor-repeater-item-<?php echo esc_attr( $slide['_id'] )?>">
                                <div class="apps-about-list-box-wrapper-7-114 cb-core-repeater-content mb-30">
                                    <div class="icon">
                                        <?php echo wp_get_attachment_image( $slide['list_item_image']['id'], 'thumbnail' ); ?>
                                    </div>
                                    <div class="content">
                                        <?php if(!empty($slide['list_item_text'])) : ?>
                                            <h5 class="title cb-core-repeater-title"><?php echo wp_kses_post($slide['list_item_text']); ?></h5>
                                        <?php endif; ?>
                                        <?php if(!empty($slide['list_item_desc'])) : ?>
                                            <p><?php echo wp_kses_post($slide['list_item_desc']); ?></p>
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
        </div>
    </div>
</section>
<!-- about area end -->