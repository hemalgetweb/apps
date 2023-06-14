<?php
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
    if ( ! empty( $settings['btn_link_2']['url'] ) ) {
        $this->add_link_attributes( 'btn_link_2', $settings['btn_link_2'] );
    }
?>
<div class="ayaa-fz-about-store-area pt-100 pb-60">
    <div class="container">
        <div class="row align-items-center pb-20">
            <div class="col-xl-6 col-lg-6">
                <div class="ayaa-fz-about-store-img mb-40">
                    <?php echo wp_get_attachment_image( $settings['image_1']['id'], 'full' ); ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="ayaa-fz-about-store-content ml-30 mb-40">
                    <?php if(!empty($settings['about_content_title'])) : ?>
                        <h4 class="ayaa-fz-about-page-right-title mb-25"><?php echo cb_core_kses_basic($settings['about_content_title']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['about_content_desc'])) : ?>
                        <p><?php echo cb_core_kses_basic($settings['about_content_desc']); ?></p>
                    <?php endif; ?>
                    <?php if(!empty($settings['slides'])) : ?>
                    <div class="ayaa-fz-about-page-right-list mt-20">
                        <ul>
                            <?php foreach($settings['slides'] as $index => $slide) : ?>
                                <?php if(!empty($slide['repeater_list_item'])) : ?>
                                    <li><?php echo cb_core_kses_basic($slide['repeater_list_item']); ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($settings['btn_text'])) : ?>
                    <div class="ayaa-fz-about-store-button mt-40">
                        <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="ayaa-fz-about-store-btn"><span><?php echo cb_core_kses_basic($settings['btn_text']); ?></span><span><?php echo cb_core_kses_basic($settings['btn_text']); ?></span></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 order-1 order-lg-0">
                <div class="ayaa-fz-about-store-content mr-30 mb-40">
                    <?php if(!empty($settings['about_2_title'])) : ?>
                        <h4 class="ayaa-fz-about-page-right-title mb-25"><?php echo cb_core_kses_basic($settings['about_2_title']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['about_2_content'])) : ?>
                        <p><?php echo cb_core_kses_basic($settings['about_2_content']); ?></p>
                    <?php endif; ?>
                    <?php if(!empty($settings['slides_2'])) : ?>
                    <div class="ayaa-fz-about-page-right-list mt-20">
                        <ul>
                            <?php foreach($settings['slides_2'] as $index => $slide) : ?>
                                <?php if(!empty($slide['about_2_list_item'])) : ?>
                                    <li><?php echo cb_core_kses_basic($slide['about_2_list_item']); ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($settings['btn_text_2'])) : ?>
                        <div class="ayaa-fz-about-store-button mt-40">
                            <a <?php echo $this->get_render_attribute_string( 'btn_link_2' ); ?> class="ayaa-fz-about-store-btn"><span><?php echo cb_core_kses_basic($settings['btn_text_2']); ?></span><span><?php echo cb_core_kses_basic($settings['btn_text_2']); ?></span></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 order-0 order-lg-1">
                <div class="ayaa-fz-about-store-img mb-40">
                    <?php echo wp_get_attachment_image( $settings['about_content_image_2']['id'], 'full' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ayaa-fz-about-store-area-end -->