<?php
    $due_date = $settings['due_date'];
    $date_arr_final = array();
    preg_match_all("/\d+/", $due_date, $date_arr);
    $date_arr_final['year'] = isset($date_arr[0][0]) ? $date_arr[0][0]: '';
    $date_arr_final['month'] = isset($date_arr[0][1]) ? $date_arr[0][1]: '';
    $date_arr_final['day'] = isset($date_arr[0][2]) ? $date_arr[0][2]: '';
?>
<!-- countdown banner area start -->
<div class="countdown-banner-area">
    <div class="container">
        <div class="ayaa-fz-countdown-banner-content-inner-6 bg-attc-fixed bg-default" data-background="<?php echo esc_url($settings['countdown_bgimage']['url'] ? $settings['countdown_bgimage']['url']: ''); ?>">
            <div class="ayaa-fz-countdown-banner-content-inner-deeper-6">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 mb-30 mb-lg-0">
                        <div class="ayaa-fz-countdown-banner-img-left-6">
                            <?php echo wp_get_attachment_image( $settings['countdown_image']['id'], 'full' ); ?>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="ayaa-fz-countdown-banner-right-content-6">
                            <?php if(!empty($settings['countdown_subtitle'])) : ?>
                                <span class="subtitle"><?php echo cb_core_kses_basic($settings['countdown_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if(!empty($settings['countdown_title'])) : ?>
                                <h3 class="title"><?php echo cb_core_kses_basic($settings['countdown_title']); ?></h3>
                            <?php endif; ?>
                            <div class="ayaa-countdown-6" data-year="<?php echo esc_attr($date_arr_final['year']) ? esc_attr($date_arr_final['year']): ''; ?>" data-month="<?php echo esc_attr($date_arr_final['month']) ? esc_attr($date_arr_final['month']): ''; ?>" data-day="<?php echo esc_attr($date_arr_final['day']) ? esc_attr($date_arr_final['day']): ''; ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- countdown banner area end -->