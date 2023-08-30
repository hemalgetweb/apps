<?php
$apps_footer_logo_2 = get_theme_mod('apps_footer_logo_2');
$footer_bg_image_1 = get_theme_mod('footer_bg_image_1', '');
$footer_background_size_1 = get_theme_mod("footer_background_size_1", "cover");
$cbtoolkit_footer_bg_color_1 = get_theme_mod('cbtoolkit_footer_bg_color_1', '#003959');
$footer_background_position_select_1 = get_theme_mod('footer_background_position_select_1', 'center center');
$footer_background_blendmode_select_1 = get_theme_mod('footer_background_blendmode_select_1', 'normal');
$cbtoolkit_copyright_1 = get_theme_mod('cbtoolkit_copyright_1', __('Copyright © 2023 I Wadi Al Bada I All Rights Reserved', 'apps'));
$cbtoolkit_footer_top_repeater = get_theme_mod('cbtoolkit_footer_top_repeater', array());
$contact_page_id = '1802';
$current_page_id = get_the_ID();
$contact_space_top = $contact_page_id == $current_page_id ? 'pt-100' : 'pt-300';
if (is_singular('project')) {
    $contact_space_top = "pt-100";
}
/*
cmt_section_footer_2: start section Footer 1
*/
$footer_class_2[1] = 'col-sm-6 col-md-3 col-xl-3 col-lg-3 col-xxl-3 mb-3';
$footer_class_2[2] = 'col-sm-6 col-md-4 col-xl-3 col-lg-3 col-xxl-3 mb-3';
$footer_class_2[3] = 'col-sm-12 col-md-5 col-xl-6 col-lg-6 col-xxl-6 mb-3';
$bg_properties = <<<EOD
background-size: {$footer_background_size_1};
background-image: url('{$footer_bg_image_1}');
background-color: {$cbtoolkit_footer_bg_color_1};
background-position: {$footer_background_position_select_1};
background-blend-mode: {$footer_background_blendmode_select_1};

EOD;
?>
<div class="apps-insta-logo fixed-bottom-right">
    <a target="_blank" href="https://wa.me/+971586130632"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/whatsapp.svg" alt="instagram"></a>
</div>
<!-- footer -->
<footer class="footer bg-clr-deepDark <?php echo esc_attr($contact_space_top); ?>" style="<?PHP echo $bg_properties; ?>">
    <div class="container">
        <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
            <div class="footer-widget-area">
                <div class="row">
                    <?php
                    for ($num = 1; $num <= 3; $num++) {
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
        <?php endif; ?>
        <?php if (!empty($cbtoolkit_copyright_1)) : ?>
            <div class="copyright d-flex flex-column flex-sm-row justify-content-center py-3">
                <p class="m-0 text-clr-dark5 fw-normal fs-14 text-center">
                    <?php echo esc_html($cbtoolkit_copyright_1); ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
</footer>
<!-- / footer -->