<?php
    $due_date = $settings['due_date'];
    $date_arr_final = array();
    preg_match_all("/\d+/", $due_date, $date_arr);
    $date_arr_final['year'] = isset($date_arr[0][0]) ? $date_arr[0][0]: '';
    $date_arr_final['month'] = isset($date_arr[0][1]) ? $date_arr[0][1]: '';
    $date_arr_final['day'] = isset($date_arr[0][2]) ? $date_arr[0][2]: '';
?>
<!-- ayaa-product-offer-counting-area-start -->
<div class="ayaa-product-offer-counting-area">
    <div class="container">
        <div class="ayaa-product-offer-counting-wrapper  bg-default pt-35 pt-sm-0 pb-75 pb-md-0" data-background="<?php echo get_template_directory_uri(); ?>/assets/images/update/product3/count_bg.png">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="ayaa-product-offer-counting-img pr-20 pl-20 text-center">
                        <div class="ayaa-product-offer-counting-img-inner">
                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'banner_large_img' ); ?>
                            <?php if(!empty($settings['slides'])) : ?>
                                <?php foreach($settings['slides'] as $index => $slide) : 
                                    $parent_class = $index == 0 ? esc_attr__('ayaa-product-offer-counting-plustext'): esc_attr__('ayaa-product-offer-counting-plustext-another');    
                                ?>
                                    <div class="<?php echo esc_attr($parent_class); ?>">
                                        <span class="ayaa-product-offer-counting-plussign"><i class="fa-thin fa-plus"></i></span>
                                        <div class="ayaa-product-offer-counting-text">
                                            <?php if(!empty($slide['banner_title'])) : ?>
                                                <h5 class="ayaa-prouduct-offer-counting-title"><a href="<?php echo esc_url($slide['banner_title_url']['url']) ? esc_url($slide['banner_title_url']['url']): ''; ?>"><?php echo cb_core_kses_basic($slide['banner_title']); ?></a></h5>
                                            <?php endif; ?>
                                            <?php if(!empty($slide['banner_price'])) :?>
                                                <span class="ayaa-prouduct-offer-counting-price"><?php echo esc_html($slide['banner_price']); ?></span>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 text-center">
                    <div class="ayaa-product-offer-counting-content-wrapp text-center text-center d-inline-block pr-20 pl-20">
                        <?php if(!empty($settings['banner_title_1'])) : ?>
                            <h3 class="ayaa-product-offer-counting-content-title text-white text-start"><?php echo cb_core_kses_basic($settings['banner_title_1']); ?></h3>
                        <?php endif; ?>
                        <div class="ayaa-fz-weekend-countdown ayaa-product-offer-counting-content-count" data-year="<?php echo esc_attr($date_arr_final['year']) ? esc_attr($date_arr_final['year']): ''; ?>" data-month="<?php echo esc_attr($date_arr_final['month']) ? esc_attr($date_arr_final['month']): ''; ?>" data-day="<?php echo esc_attr($date_arr_final['day']) ? esc_attr($date_arr_final['day']): ''; ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ayaa-product-offer-counting-area-end -->