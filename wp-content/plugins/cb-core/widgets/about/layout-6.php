    <!-- PPC-Results -->
    <section class="PPC-Results section-padding bg-clr-deepDark">
        <div class="container">
            <div class="row border-bottom1 pb-5">
                <div class="col-lg-6">
                    <div class="section-header">
                        <?php if(!empty($settings['about_subtitle'])) : ?>
                        <div class="title-hints d-flex align-items-center gap-2">
                            <img src="https://wadialbadaitsolutions.ae/wp-content/themes/apps/assets/img/service-spinner.png" class="img-fluid" alt="icon">
                            <h6 class="fs-12 fw-bold ls-1 text-clr-primary text-uppercase m-0"><?php echo wp_kses_post($settings['about_subtitle']); ?></h6>
                         </div>
                        <?php endif; ?>
                        <?php if(!empty($settings['about_title'])) : ?>
                            <h2 class="text-white fw-semi-bold fs-36"><?php echo wp_kses_post($settings['about_title']); ?></h2>
                        <?php endif; ?>
                        <?php if(!empty($settings['about_desc'])) : ?>
                            <p class="fs-6 text-clr-primary2"><?php echo wp_kses_post($settings['about_desc']); ?></p>
                        <?php endif; ?>
                        <?php if(!empty($settings['slides'])) : ?>
                        <ul class="list-unstyled mb-0">
                            <?php foreach($settings['slides'] as $slide) : ?>
                            <li class="d-flex gap-4 align-items-start mb-3 apps-about-layout-6-list-114">
                               <?php echo wp_get_attachment_image( $slide['list_item_image']['id'], 'thumbnail' ); ?>
                                <div class="apps-content">
                                    <?php if(!empty($slide['list_item_text'])) : ?>
                                    <h4 class="fs-18 fw-medium text-white">
                                        <?php echo wp_kses_post($slide['list_item_text']); ?>
                                    </h4>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['list_item_desc'])) : ?>
                                    <p class="fs-6 text-clr-primary2">
                                    <?php echo wp_kses_post($slide['list_item_desc']); ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-img mb-5 mb-lg-0">
                        <?php echo wp_get_attachment_image( $settings['about_image']['id'], 'full' ); ?>
                    </div>
                </div>
            </div>
            <?php if(!empty($settings['slides_2'])) : ?>
            <div class="our-strategy pt-5 d-flex justify-content-between gap-5 px-5 flex-wrap">
                <?php foreach($settings['slides_2'] as $slide) : ?>
                <div class="text-center">
                    <?php if(!empty($slide['list_title'])) : ?>
                        <p class="fs-18 fw-normal text-white mb-2"><?php echo esc_html($slide['list_title']); ?></p>
                    <?php endif; ?>
                    <?php if(!empty($slide['list_count'])) : ?>
                        <h4 class="total-done"> <span class="counter"><?php echo esc_html($slide['list_count']); ?></span>%</h4>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!--/ PPC-Results -->