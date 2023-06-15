<?php
$apps_footer_logo_2 = get_theme_mod('apps_footer_logo_2');
$cbtoolkit_copyright_1 = get_theme_mod('cbtoolkit_copyright_1', __('Copyright © 2023 I Wadi Al Bada I All Rights Reserved', 'apps'));
/*
cmt_section_footer_2: start section Footer 1
*/
$footer_class_2[1] = 'col-sm-6 col-md-4 col-xl-3 mb-3'; 
$footer_class_2[2] = 'col-sm-6 col-md-4 col-xl-4 mb-3';
$footer_class_2[3] = 'col-sm-6 col-md-4 col-xl-2 mb-3';
$footer_class_2[4] = 'col-sm-6 col-md-4 col-xl-3 mb-3';
?>


<!-- footer -->
<footer class="footer bg-clr-deepDark">
        <div class="container">
            <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
            <div class="row">
                <?php
                for ($num = 1; $num <= 4; $num++) {
                    if (!is_active_sidebar('footer-' . $num)) {
                        continue;
                    }
                    print '<div class="' . esc_attr($footer_class_2[$num]) . '">';
                    dynamic_sidebar('footer-' . $num);
                    print '</div>';
                }
                ?>
            </div>
            <?php endif; ?>
            <?php if(!empty($cbtoolkit_copyright_1)) : ?>
            <div class="d-flex flex-column flex-sm-row justify-content-center footer-border py-2 mt-3">
                <p class="m-0 text-clr-dark10 fw-normal fs-6"><?php echo esc_html($cbtoolkit_copyright_1); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </footer>
    <!-- / footer -->




<div class="d-none">
    <!-- footer area start -->
    <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
        <div class="footer-area apps-fz-footer-2-update" data-background="<?php echo esc_url($footer_bg_image_2); ?>" data-bgcolor="<?php echo esc_attr($cbtoolkit_footer_bg_color_2); ?>">
            <div class="apps-rv-footer-main-wrapper pt-100 pb-55">
                <div class="container">
                    <div class="row">
                        <?php
                        for ($num = 1; $num <= 4; $num++) {
                            if (!is_active_sidebar('footer-' . $num)) {
                                continue;
                            }
                            print '<div class="' . esc_attr($footer_class_2[$num]) . '">';
                            dynamic_sidebar('footer-' . $num);
                            print '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- footer area end -->
        </div>
    <?php endif; ?>
    <?php if (!empty($cbtoolkit_copyright_1)) : ?>
        <div class="apps-rv-copyright-area">
            <div class="container">
                <div class="apps-rv-copyright-inner gray-bg">
                    <div class="row align-items-center">
                        <div class="<?php echo esc_attr($copyright_class); ?>">
                            <div class="apps-rv-copyright-text">
                                <p><?php echo wp_kses_post($cbtoolkit_copyright_1); ?></p>
                            </div>
                        </div>
                        <?php if (!empty($cbtoolkit_footer_copyright_image_2)) : ?>
                            <div class="col-xxl-6 col-xl-6 col-md-5">
                                <div class="apps-rv-copyright-img text-end">
                                    <img src="<?php echo esc_url_raw($cbtoolkit_footer_copyright_image_2); ?>" alt="<?php echo esc_attr__('payment gateway', 'apps'); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>