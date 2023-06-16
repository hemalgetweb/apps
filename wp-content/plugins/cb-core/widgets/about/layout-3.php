<!-- about area start -->
<section class="about-area">
<div class="container">
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-5">
            <div class="apps-about-left-3-114 mb-30 mb-lg-0">
                <?php echo wp_get_attachment_image( $settings['about_image']['id'], 'full' ); ?>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-7">
            <div class="section-header apps-about-right-3-114">
                <?php if(!empty($settings['about_subtitle'])) : ?>
                <div class="title-hints d-flex align-items-center gap-2 ">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-process-icon.svg" class="img-fluid" alt="icon">
                    <h6 class="fs-12 fw-bold ls-1 text-clr-dark2 text-uppercase m-2">
                    <?php echo esc_html($settings['about_subtitle']); ?>
                    </h6>
                </div>
                <?php endif; ?>
                <?php if(!empty($settings['about_title'])) : ?>
                    <h2 class="text-clr-dark1 fw-semi-bold fs-36 mb-3 ">
                        <?php echo esc_html($settings['about_title']); ?>
                    </h2>
                <?php endif; ?>
                <?php if(!empty($settings['about_desc'])) : ?>
                <div class="mb-4 ">
                    <p class="fs-18 text-clr-dark2">
                        <?php echo wp_kses_post($settings['about_desc']); ?>
                    </p>
                </div>
                <?php endif; ?>
                <div class="row ">
                    <?php if(!empty($settings['slides'])) : ?>
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-3 align-items-start pb-4">
                            <?php foreach($settings['slides'] as $slide) : ?>
                            <?php if(!empty($slide['list_item_text'])) : ?>
                                <li class="expect-point d-flex align-items-center gap-2">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-icon.svg" class="img-fluid " alt="check icon">
                                    <p class="text-clr-dark2 fs-6 mb-0">
                                        <?php echo esc_html($slide['list_item_text']); ?>
                                    </p>
                                </li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($settings['slides_2'])) : ?>
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-3 align-items-start pb-4">
                            <?php foreach($settings['slides_2'] as $slide) : ?>
                                <?php if(!empty($slide['list_title'])) : ?>
                                    <li class="expect-point d-flex align-items-center gap-2">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/check-icon.svg" class="img-fluid " alt="check icon">
                                        <p class="text-clr-dark2 fs-6 mb-0">
                                            <?php echo esc_html($slide['list_title']); ?>
                                        </p>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- about area end -->