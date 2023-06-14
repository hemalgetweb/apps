<?php
 $banner_box_bg_2 = esc_url($settings['banner_box_bg_2']['url']) ? esc_url($settings['banner_box_bg_2']['url']): '';
 $banner_box_bg = esc_url($settings['banner_box_bg']['url']) ? esc_url($settings['banner_box_bg']['url']): '';
 $banner_box_title_link = esc_url($settings['banner_box_title_link']['url']) ? esc_url($settings['banner_box_title_link']['url']): '';
?>
<!-- banner area start -->
<div class="ayaa-rv-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 mb-30 mb-lg-0">
                <div class="ayaa-rv-banner-box-1 bg-default" data-background="<?php echo esc_url($banner_box_bg); ?>">
                    <div class="ayaa-rv-banner-box-wrapper-1">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="ayaa-rv-banner-content-1 pt-25">
                                    <div class="ayaa-rv-banner-price-1 pb-10">
                                        <?php if(!empty($settings['banner_box_price'])) : ?>
                                            <span class="price-active"><?php echo esc_html($settings['banner_box_price']); ?></span>
                                        <?php endif; ?>
                                        <?php if(!empty($settings['banner_box_price_old'])) : ?>
                                            <span class="price-old"><?php echo esc_html($settings['banner_box_price_old']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(!empty($settings['banner_box_title'])) : ?>
                                        <h3 class="ayaa-rv-banner-title-1"><a href="<?php echo esc_url($settings['banner_box_title_link']['url']) ? esc_url($settings['banner_box_title_link']['url']): ''; ?>"><?php echo cb_core_kses_basic($settings['banner_box_title']); ?></a></h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="ayaa-rv-banner-image text-md-end">
                                    <?php echo wp_get_attachment_image( $settings['banner_box_image']['id'], 'full' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="ayaa-rv-banner-box-2 bg-default" data-background="<?php echo esc_url($banner_box_bg_2); ?>">
                    <div class="ayaa-rv-banner-flex-item-wrapper">
                        <div class="ayaa-rv-banner-flex-item-1">
                            <div class="ayaa-rv-banner-box-content-2 pt-15">
                                <?php if(!empty($settings['banner_box_subtitle_2'])) : ?>
                                    <a href="<?php echo esc_url($settings['banner_box_subtitle_link_2']['url']) ? esc_url($settings['banner_box_subtitle_link_2']['url']): ''; ?>" class="subtitle"><?php echo esc_html($settings['banner_box_subtitle_2']); ?></a>
                                <?php endif; ?>
                                <?php if(!empty($settings['banner_box_title_2'])) : ?>
                                    <h3 class="title"><a href="<?php echo esc_url($settings['banner_box_title_link_2']['url']) ? esc_url($settings['banner_box_title_link_2']['url']): ''; ?>"><?php echo esc_html($settings['banner_box_title_2']); ?></a></h3>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="ayaa-rv-banner-flex-item-2">
                            <div class="text-md-end">
                                <div class="ayaa-img-w-inherit ayaa-rv-has-decore-pos-img-1">
                                <?php echo wp_get_attachment_image( $settings['banner_box_image_2']['id'], 'full' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner area end -->