<!-- ayaa-fz-about-page-area-start -->
<div class="ayaa-fz-about-page-area pt-100 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="ayaa-fz-about-page-left-images mb-40">
                    <div class="row g-0">
                        <div class="col-sm-8">
                            <div class="ayaa-fz-about-page-left-images-left-wrapp">
                                <?php if(!empty($settings['image_1']['url'])) : ?>
                                <div class="ayaa-fz-about-page-left-images-left-img">
                                    <img class='w-100 h-505' src='<?php echo esc_url( $settings['image_1']['url'] ); ?>' alt='<?php echo \Elementor\Control_Media::get_image_alt( $settings['image_1'] ); ?>'>
                                </div>
                                <?php endif; ?>
                                <div class="ayaa-fz-about-page-left-images-left-content mt-20">
                                    <div class="ayaa-fz-about-page-left-images-left-content-member">
                                        <?php if(!empty($settings['customer_box_title'])) : ?>
                                            <span class="ayaa-fz-about-page-left-images-left-content-member-active"><?php echo cb_core_kses_basic($settings['customer_box_title']); ?></span>
                                        <?php endif; ?>
                                        <?php if(!empty($settings['customer_box_subtitle'])) : ?>
                                            <span class="ayaa-fz-about-page-left-images-left-content-member-designation"><?php echo cb_core_kses_basic($settings['customer_box_subtitle']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="ayaa-fz-about-page-left-images-left-content-member-img">
                                        <?php echo wp_get_attachment_image( $settings['image_3']['id'], 'full' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="ayaa-fz-about-page-left-images-right-wrapp mt-65">
                                <?php if(!empty($settings['image_2']['url'])) : ?>
                                <div class="ayaa-fz-about-page-left-images-right-img">
                                    <img class='w-100 h-515' src='<?php echo esc_url( $settings['image_2']['url'] ); ?>' alt='<?php echo \Elementor\Control_Media::get_image_alt( $settings['image_2'] ); ?>'>
                                </div>
                                <?php endif;?>
                                <div class="ayaa-fz-about-page-left-images-right-abs">
                                    <div class="ayaa-fz-about-page-left-images-right-abs-wrapp">
                                        <div class="ayaa-fz-about-page-left-images-right-abs-inner">
                                            <?php if(!empty($settings['year_box_subtitle'])) : ?>
                                                <span class="ayaa-fz-about-page-left-images-right-abs-text"><?php echo cb_core_kses_basic($settings['year_box_subtitle']); ?></span>
                                            <?php endif; ?> 
                                            <?php if(!empty($settings['year_box_title'])) : ?>
                                                <span class="ayaa-fz-about-page-left-images-right-abs-year"><?php echo cb_core_kses_basic($settings['year_box_title']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="ayaa-fz-about-page-right-content ml-35 mb-40">
                    <?php if(!empty($settings['about_content_title'])) : ?>
                        <h4 class="ayaa-fz-about-page-right-title mb-25"><?php echo cb_core_kses_basic($settings['about_content_title']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['about_content_desc'])) : ?>
                        <p><?php echo cb_core_kses_basic($settings['about_content_desc']); ?></p>
                    <?php endif; ?>
                    <div class="row mt-35 pb-10">
                        <div class="col-sm-5 col-md-4 col-xl-5">
                            <div class="ayaa-fz-about-page-right-img mb-25">
                                <?php echo wp_get_attachment_image( $settings['about_content_image']['id'], 'full' ); ?>
                            </div>
                        </div>
                        <div class="col-sm-7 col-md-8 col-xl-7">
                            <div class="ayaa-fz-about-page-right-list mb-25">
                                <?php if(!empty($settings['slides'])) : ?>
                                    <ul>
                                        <?php foreach($settings['slides'] as $index => $slide) : ?>
                                            <?php if(!empty($slide['repeater_list_item'])) : ?>
                                                <li><?php echo cb_core_kses_basic($slide['repeater_list_item']); ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php if(!empty($settings['about_list_content_2'])) : ?>
                                    <p class="mb-0"><?php echo cb_core_kses_basic($settings['about_list_content_2']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="ayaa-fz-about-page-author-sign">
                        <span class="ayaa-fz-about-page-author-sign-img">
                            <?php echo wp_get_attachment_image( $settings['author_signature']['id'], 'full' ); ?>
                        </span>
                        <div class="ayaa-fz-about-page-author-sign-content">
                            <span class="ayaa-fz-about-page-author-sign-conent-author"><?php echo wp_get_attachment_image( $settings['author_img']['id'], 'full' ); ?></span>
                            <div class="ayaa-fz-about-page-author-sign-content-text">
                                <?php if(!empty($settings['author_name'])) : ?>
                                    <h5 class="ayaa-fz-about-page-author-sign-content-text-name"><?php echo cb_core_kses_basic($settings['author_name']); ?></h5>
                                <?php endif; ?>
                                <?php if(!empty($settings['author_designation'])) : ?>
                                    <span class="ayaa-fz-about-page-author-sign-content-text-designation"><?php echo cb_core_kses_basic($settings['author_designation']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ayaa-fz-about-page-area-end -->