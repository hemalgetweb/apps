    <!-- hero area start -->
    <section class="hero-area">
        <div class="container fz-header-container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8">
                    <?php if(!empty($settings['slides'])) : ?>
                    <div class="ayaa-fz-slider-active-2 swiper-container mb-30">
                        <div class="swiper-wrapper">
                            <?php foreach($settings['slides'] as $slide) : ?>
                            <div class="swiper-slide">
                                <div class="ayaa-fz-slider-item-3 pt-50 pb-50" data-bgcolor="#F8F8F8">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-7 order-1 order-sm-0">
                                            <div class="ayaa-fz-slider-content-left-3 text-center text-sm-start">
                                                <?php if(!empty($slide['title'])) : ?>
                                                    <h2 class="ayaa-fz-slider-title-3" data-animation="fadeInUp" data-duration="1s" data-delay=".4s"><?php echo cb_core_kses_basic($slide['title']); ?></h2>
                                                <?php endif; ?>
                                                <?php if(!empty($slide['content'])) : ?>
                                                <span class="ayaa-fz-slider-price-3" data-animation="fadeInUp" data-duration="1s" data-delay=".5s"><?php echo cb_core_kses_basic($slide['content']); ?></span>
                                                <?php endif; ?>
                                                <?php if(!empty($slide['btn_text'])) : ?>
                                                <div class="mt-40" data-animation="fadeInUp" data-duration="1s" data-delay=".6s">
                                                    <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']): ''; ?>" class="ayaa-fz-theme-btn-3 fz-size-18"><span><?php echo esc_html($slide['btn_text']); ?></span><span><?php echo esc_html($slide['btn_text']); ?></span></a>
                                                </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5 text-center order-0 order-sm-1 mb-40 mb-sm-0">
                                            <?php if(!empty($slide['slider_image']['id'])) : ?>
                                            <div class="ayaa-fz-slider-content-right-3" data-animation="fadeInUpBig" data-duration="1s">
                                             <?php echo wp_get_attachment_image( $slide['slider_image']['id'], 'full' ); ?>
                                            </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                <div class="col-xxl-4 col-xl-4">

                    <?php if(!empty($settings['slides_2'])) : ?>
                    <div class="ayaa-fz-hero-sidebar-wrapper-3">
                        <div class="ayaa-fz-hero-sidebar-wrapper-item">
                            <div class="row">
                                <?php foreach($settings['slides_2'] as $index => $slide) : 
                                    $slide_class = $index == 2 ? '': 'mb-30';
                                    $align_center = $index == 0 ? 'align-items-center': '';
                                    ?>
                                <div class="col-xl-12 col-lg-6 col-md-6 elementor-repeater-item-<?php echo $slide['_id']; ?>">
                                    <div class="ayaa-fz-hero-product-box-3 fix <?php echo esc_attr($slide_class); ?> wow fadeInUp" data-wow-duration=".2s" data-wow-delay=".1s">
                                        <div class="row <?php echo esc_attr($align_center); ?>">
                                            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-7 order-1 order-sm-0">
                                                <div class="content text-center text-sm-start">
                                                    <div class="content-inner">
                                                        <?php if(!empty($slide['discount_count'])) : ?>
                                                            <span class="ayaa-fz-product-discount-percent-box-3"><?php echo cb_core_kses_basic($slide['discount_count']); ?></span>
                                                        <?php endif;?>
                                                        <?php if(!empty($slide['side_product_title'])): ?>
                                                        <h5 class="ayaa-fz-hero-product-title-3"><a href="<?php echo esc_url($slide['side_product_title_link']['url']) ? esc_url($slide['side_product_title_link']['url']): ''; ?>"><?php echo cb_core_kses_basic($slide['side_product_title']); ?></a></h5>
                                                        <?php endif;?>
                                                        <?php if(!empty($slide['side_product_title_link'])):?>
                                                        <a href="<?php echo esc_url($slide['side_product_title_link']['url']) ? esc_url($slide['side_product_title_link']['url']): ''; ?>" class="ayaa-fz-theme-btn-2 theme-clr-3 mt-15 fz-font-16"><span><?php echo esc_html__('Shop  Now', 'cb-core'); ?></span><span><?php echo esc_html__('Shop  Now', 'cb-core'); ?></span></a>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5 order-0 order-sm-1 mb-30 mb-sm-0">
                                                <?php if(!empty($slide['side_product_image']['id'])) : ?>
                                                <div class="ayaa-fz-hero-product-img-3 pr-35 text-center text-sm-end">
                                                    <a href="<?php echo esc_url($slide['side_product_title_link']['url']) ? esc_url($slide['side_product_title_link']['url']): ''; ?>"><?php echo wp_get_attachment_image( $slide['side_product_image']['id'], 'full' ); ?></a>
                                                </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>

                        </div>
                    </div>
                    <?php endif;  ?>
                </div>
            </div>
        </div>
    </section>
    <!-- hero area end -->