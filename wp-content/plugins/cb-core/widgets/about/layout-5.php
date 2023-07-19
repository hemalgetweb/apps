<!-- about area start -->
<section class="about-area">
    <div class="container">
        <div class="about-content-wrapper-main-5-114">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about-content-left-5-114">
                        <div class="about-section-title-5-114 pb-40">
                            <?php if(!empty($settings['about_subtitle'])) : ?>
                            <span class="subtitle"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/rect.svg" alt=""> <?php echo wp_kses_post($settings['about_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if(!empty($settings['about_title'])) : ?>
                                <h3 class="title"><?php echo wp_kses_post($settings['about_title']); ?></h3>
                            <?php endif; ?>
                            <?php if(!empty($settings['about_desc'])) : ?>
                                <p><?php echo wp_kses_post($settings['about_desc']); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="about-section-content-5-114">
                            <?php if(!empty($settings['about_title_secondary'])) : ?>
                                <h5 class="title"><?php echo esc_html($settings['about_title_secondary']); ?></h5>
                            <?php endif; ?>
                            <?php if(!empty($settings['slides'])) : ?>
                            <ul>
                                <?php foreach($settings['slides'] as $slide) : ?>
                                    <?php if(!empty($slide['list_item_text'])) : ?>
                                        <li> <?php echo esc_html($slide['list_item_text']); ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about-content-right-5-114 text-lg-end">
                        <?php echo wp_get_attachment_image( $settings['about_image']['id'], 'full' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about area end -->