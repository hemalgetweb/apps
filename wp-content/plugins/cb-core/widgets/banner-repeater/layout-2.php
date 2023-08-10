<?php
    $due_date = $settings['due_date'];
    $date_arr_final = array();
    preg_match_all("/\d+/", $due_date, $date_arr);
    $date_arr_final['year'] = isset($date_arr[0][0]) ? $date_arr[0][0]: '';
    $date_arr_final['month'] = isset($date_arr[0][1]) ? $date_arr[0][1]: '';
    $date_arr_final['day'] = isset($date_arr[0][2]) ? $date_arr[0][2]: '';
?>
<!-- apps-product-offer-counting-area-start -->
<div class="apps-product-offer-counting-area">
    <div class="container">
        <div class="apps-product-offer-counting-wrapper  bg-default pt-35 pt-sm-0 pb-75 pb-md-0" data-background="<?php echo get_template_directory_uri(); ?>/assets/images/update/product3/count_bg.png">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="apps-product-offer-counting-img pr-20 pl-20 text-center">
                        <div class="apps-product-offer-counting-img-inner">
                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'banner_large_img' ); ?>
                            <?php if(!empty($settings['slides'])) : ?>
                                <?php foreach($settings['slides'] as $index => $slide) : 
                                    $parent_class = $index == 0 ? esc_attr__('apps-product-offer-counting-plustext'): esc_attr__('apps-product-offer-counting-plustext-another');    
                                ?>
                                    <div class="<?php echo esc_attr($parent_class); ?>">
                                        <span class="apps-product-offer-counting-plussign"><span>
                                            <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 13V8H11V13H6V15H11V20H13V15H18V13H13Z" fill="#6A96A4"/>
                                            </svg>
                                        </span></span>
                                        <div class="apps-product-offer-counting-text">
                                            <?php if(!empty($slide['banner_title'])) : ?>
                                                <h5 class="apps-prouduct-offer-counting-title"><a href="<?php echo esc_url($slide['banner_title_url']['url']) ? esc_url($slide['banner_title_url']['url']): ''; ?>"><?php echo cb_core_kses_basic($slide['banner_title']); ?></a></h5>
                                            <?php endif; ?>
                                            <?php if(!empty($slide['banner_price'])) :?>
                                                <span class="apps-prouduct-offer-counting-price"><?php echo esc_html($slide['banner_price']); ?></span>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 text-center">
                    <div class="apps-product-offer-counting-content-wrapp text-center text-center d-inline-block pr-20 pl-20">
                        <?php if(!empty($settings['banner_title_1'])) : ?>
                            <h3 class="apps-product-offer-counting-content-title text-white text-start"><?php echo cb_core_kses_basic($settings['banner_title_1']); ?></h3>
                        <?php endif; ?>
                        <div class="apps-fz-weekend-countdown apps-product-offer-counting-content-count" data-year="<?php echo esc_attr($date_arr_final['year']) ? esc_attr($date_arr_final['year']): ''; ?>" data-month="<?php echo esc_attr($date_arr_final['month']) ? esc_attr($date_arr_final['month']): ''; ?>" data-day="<?php echo esc_attr($date_arr_final['day']) ? esc_attr($date_arr_final['day']): ''; ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- apps-product-offer-counting-area-end -->