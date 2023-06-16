<!-- about -->
<section class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-img mb-5 mb-lg-0 " >
                    <?php echo wp_get_attachment_image( $settings['about_image']['id'], 'full' ); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-header">
                    <?php if(!empty($settings['about_subtitle'])) : ?>
                    <div class="title-hints d-flex align-items-center gap-2 "
                        >
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-process-icon.svg" class="img-fluid" alt="icon">
                        <h6 class="fs-12 fw-bold ls-1 text-clr-dark2 text-uppercase m-0">
                            <?php echo wp_kses_post($settings['about_subtitle']); ?>
                        </h6>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($settings['about_title'])) : ?>
                        <h2 class="text-clr-dark1 fw-semi-bold fs-36 mb-3 " >
                            <?php echo wp_kses_post($settings['about_title']); ?>
                        </h2>
                    <?php endif; ?>
                    <div class="" >
                        <?php if(!empty($settings['about_desc'])) : ?>
                            <?php echo wp_kses_post($settings['about_desc']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ about -->