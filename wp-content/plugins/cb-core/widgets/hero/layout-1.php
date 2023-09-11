<!-- banner -->
<div class="banner bg-clr-deepDark position-relative">
    <div class="container">
        <div class="banner-wrapper d-flex flex-column justify-content-between pb-4">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 col-sm-9">
                    <div class="banner-info mb-5 mb-lg-0">
                        <?php if (!empty($settings['subtitle'])): ?>
                            <span
                                class="section-tag fs-12 fw-bold text-uppercase d-inline-flex gap-2 align-items-center mb-2 ">
                                <img width="10" height="10" src="<?php echo esc_url($settings['subtitle_image']['url']); ?>" alt="icon"
                                    class="img-fluid">
                                <?php echo cb_core_kses_basic($settings['subtitle']); ?>
                            </span>
                        <?php endif; ?>

                        <?php if (!empty($settings['subtitle'])): ?>
                            <h1 class="fs-48 fw-semi-bold text-white mb-4 " data-wow-duration="0.200s"
                                data-wow-delay="200ms">
                                <?php echo cb_core_kses_basic($settings['bannerTitle']); ?>
                            </h1>
                        <?php endif; ?>

                        <div class="section-intro fs-6 fw-normal text-clr-primary2 ">
                            <?php if (!empty($settings['bannerIntro'])): ?>
                                <p>
                                    <?php echo cb_core_kses_basic($settings['bannerIntro']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="navbar-right btn-wrap d-flex flex-wrap gap-3 gap-lg-4 " data-wow-duration="0.200s"
                            data-wow-delay="400ms">
                            <?php if (!empty($settings['btn_text'])):
                                if (!empty($settings['btn_link']['url'])) {
                                    $this->add_link_attributes('btn_link', $settings['btn_link']);
                                }
                                ?>
                                <a class="btn position-relative rounded bg-btn text-uppercase border-0 text-clr-dark1 fs-6 fw-bold d-flex align-items-center"
                                    <?php echo $this->get_render_attribute_string('btn_link'); ?>>
                                    <?php echo cb_core_kses_basic($settings['btn_text']); ?>
                                    <svg class="btn-icon position-absolute" width="10" height="10" viewBox="0 0 10 10"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z"
                                            fill="#003C4F" />
                                    </svg>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($settings['btn_text2'])):
                                if (!empty($settings['btn_link2']['url'])) {
                                    $this->add_link_attributes('btn_link2', $settings['btn_link2']);
                                }
                                ?>
                                <a class="btn position-relative rounded bg-btn btn-secondary text-uppercase border-0 text-clr-dark1 fs-6 fw-bold d-flex align-items-center"
                                <?php echo $this->get_render_attribute_string('btn_link2'); ?>
                                >
                                    <?php echo cb_core_kses_basic($settings['btn_text2']); ?>
                                    <svg class="btn-icon position-absolute " width="10" height="10" viewBox="0 0 10 10"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z"
                                            fill="#003C4F" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="banner-img text-center text-lg-end position-absolute end-0 home-page-banner-bg" data-wow-duration="0.200s"
        data-wow-delay="400ms">
        <?php if (!empty($settings['banner_image']['url'])): ?>
           <?php echo wp_get_attachment_image( $settings['banner_image']['id'], 'full' , false, [
            'loading' => 'async'
           ]); ?>
        <?php endif; ?>
    </div>
</div>
<!--/ banner -->
