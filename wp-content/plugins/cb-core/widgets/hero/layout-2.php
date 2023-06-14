
<!-- hero area start -->
<div class="slider-area">
    <div class="ayaa-fz-slider-active-6 swiper-container">
        <?php if(!empty($settings['slides'])) : ?>
            <?php foreach($settings['slides'] as $index => $slide) :
                if ( ! empty( $slide['btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'btn_link', $slide['btn_link'] );
                }
                if ( ! empty( $slide['fb_link']['url'] ) ) {
                    $this->add_link_attributes( 'fb_link', $slide['fb_link'] );
                }
                if ( ! empty( $slide['behance_link']['url'] ) ) {
                    $this->add_link_attributes( 'behance_link', $slide['behance_link'] );
                }
                if ( ! empty( $slide['youtube_link']['url'] ) ) {
                    $this->add_link_attributes( 'youtube_link', $slide['youtube_link'] );
                }
                $this->add_inline_editing_attributes( 'title', 'advanced' );
            ?>
                <div class="swiper-slide">
                    <div class="ayaa-fz-slider-item-6 ayaa-fz-slider-item-6 d-flex align-items-center">
                        <?php if(!empty($slide['shape_switch'])) : ?>
                                <div class="ayaa-fz-slider-shape-wrap-6">
                                    <div class="image-1">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/shape/pata-left-bottom.png" alt="<?php echo esc_attr__('Product', 'cb-core'); ?>">
                                    </div>
                                    <div class="image-2">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/shape/pata-top-right.png" alt="<?php echo esc_attr__('Product', 'cb-core'); ?>">
                                    </div>
                                    <div class="image-3">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/shape/circle.png" alt="<?php echo esc_attr__('Product', 'cb-core'); ?>">
                                    </div>
                                </div>
                        <?php endif; ?>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xxl-8 col-xl-8">
                                    <div class="ayaa-fz-slider-content-6 mb-50 mb-xl-0">
                                        <?php if(!empty($slide['section_subtitle'])) : ?>
                                            <span class="subtitle hero__sm-sub-title"><?php echo cb_core_kses_basic($slide['section_subtitle']); ?></span>
                                        <?php endif; ?>
                                        <?php if(!empty($slide['section_title'])) : ?>
                                            <h2 class="title hero__title" <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo cb_core_kses_basic($slide['section_title']); ?></h2>
                                        <?php endif; ?>
                                        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="ayaa-fz-rounded-btn-6">
                                            <?php if(!empty($slide['btn_text'])) : ?>
                                                <?php echo cb_core_kses_basic($slide['btn_text']); ?>
                                            <?php endif; ?>
                                            <i class="fa-light fa-arrow-up-right"></i>
                                        </a>
                                        <blockquote class="hero__sub-title"><?php if(!empty($slide['section_content'])) : ?>
                                            <?php echo cb_core_kses_basic($slide['section_content']); ?>
                                        <?php endif; ?></blockquote>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4">
                                    <div class="p-rel">
                                        <div class="ayaa-fz-slider-right-img-6 text-xl-end">
                                            <?php echo wp_get_attachment_image( $slide['image']['id'], 'full' ); ?>
                                        </div>
                                        <?php if(!empty($slide['shape_switch'])) : ?>
                                        <div class="ayaa-fz-slider-wine-rounded-animate-pos-6">
                                            <?php if(empty($slide['dark_shape'])) : ?>
                                            <div class="ayaa-fz-slider-wine-rounded-text-animate-shape-6">
                                                <div class="text">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/shape/text.png" alt="<?php echo esc_attr__('Product', 'cb-core'); ?>">
                                                </div>
                                                <div class="wine">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/shape/wine-text.png" alt="<?php echo esc_attr__('Product', 'cb-core'); ?>">
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <div class="ayaa-fz-slider-wine-rounded-text-animate-shape-6">
                                                <div class="text">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/shape/text-white.png" alt="<?php echo esc_attr__('Product', 'cb-core'); ?>">
                                                </div>
                                                <div class="wine">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update/shape/wine-white.png" alt="<?php echo esc_attr__('Product', 'cb-core'); ?>">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ayaa-fz-social-share-6">
                            <span><?php echo esc_html__('Follow Us -', 'cb-core') ?></span> <a <?php echo $this->get_render_attribute_string( 'fb_link' ); ?>><?php echo esc_html__('FB.', 'cb-core') ?></a> <?php echo esc_html__('/', 'cb-core'); ?> <a <?php echo $this->get_render_attribute_string( 'behance_link' ); ?>><?php echo esc_html__('Be.', 'cb-core') ?></a> <?php echo esc_html__('/', 'cb-core'); ?>  <a <?php echo $this->get_render_attribute_string( 'youtube_link' ); ?>><?php echo esc_html__('YT', 'cb-core') ?></a>
                        </div>
                        <?php if(!empty($slide['search_switch'])) : ?>
                        <div class="ayaa-fz-slider-search-6 has-pos">
                            <form action="<?php echo esc_url(home_url('/')); ?>">
                                <button type="submit"><i class="fa-thin fa-search"></i></button>
                                <input type="search"  name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__('Search', 'cb-core'); ?>" />
                                <input type="hidden" name="post_type" value="<?php echo esc_attr__('Product', 'cb-core'); ?>" />
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<!-- hero area end -->