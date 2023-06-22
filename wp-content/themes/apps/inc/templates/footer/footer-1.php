<?php
$apps_footer_logo_2 = get_theme_mod('apps_footer_logo_2');
$cbtoolkit_copyright_1 = get_theme_mod('cbtoolkit_copyright_1', __('Copyright © 2023 I Wadi Al Bada I All Rights Reserved', 'apps'));
$cbtoolkit_footer_top_repeater = get_theme_mod('cbtoolkit_footer_top_repeater', array());
/*
cmt_section_footer_2: start section Footer 1
*/
$footer_class_2[1] = 'col-sm-6 col-md-6 col-xxl-4 mb-3'; 
$footer_class_2[2] = 'col-sm-6 col-md-6 col-xxl-6 mb-3';
$footer_class_2[3] = 'col-sm-6 col-md-6 col-xxl-2 mb-3';
?>

    <!-- footer -->
    <footer class="footer bg-clr-deepDark">
        <div class="container">
            <div
                class="footer-top pb-5 d-flex justify-content-md-center justify-content-xl-between flex-wrap gap-4 align-items-center">
                <div class="footer-logo">
                    <a href="index.html">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="footer-top-right d-flex justify-content-md-center justify-content-xl-start flex-wrap gap-4 align-items-center">
                    <?php foreach($cbtoolkit_footer_top_repeater as $index => $repeater) : ?>
                        <?php if($index == 0) : ?>
                        <div class="contact-element d-flex gap-4 align-items-center">
                            <?php if(!empty($repeater['repeater_image'])) : ?>
                            <img src="<?php echo esc_url($repeater['repeater_image']); ?>" alt="icon" class="img-fluid">
                            <?php endif; ?>
                            <?php if(!empty($repeater['repeater_label'])) : ?>
                            <a href="mailto:<?php echo $repeater['repeater_url'] ? $repeater['repeater_url']: ''; ?>"
                                class="fs-14 fw-bold text-clr-dark5 text-decoration-none text-uppercase" target="<?php echo $repeater['repeater_url_target'] ? $repeater['repeater_url_target']: ''; ?>">
                                <?php echo esc_html($repeater['repeater_label']); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="divider d-none d-lg-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/divider.svg" alt="divider" class="img-fluid">
                        </div>
                        <?php endif; ?>
                        <?php if($index == 1) : ?>
                        <div class="contact-element d-flex gap-4 align-items-center">
                            <?php if(!empty($repeater['repeater_image'])) : ?>
                            <img src="<?php echo esc_url($repeater['repeater_image']); ?>" alt="icon" class="img-fluid">
                            <?php endif; ?>
                            <?php if(!empty($repeater['repeater_label'])) : ?>
                            <a href="tel::<?php echo $repeater['repeater_url'] ? $repeater['repeater_url']: ''; ?>"
                                class="fs-14 fw-bold text-clr-dark5 text-decoration-none text-uppercase" target="<?php echo $repeater['repeater_url_target'] ? $repeater['repeater_url_target']: ''; ?>">
                                <?php echo esc_html($repeater['repeater_label']); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="divider d-none d-lg-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/divider.svg" alt="divider" class="img-fluid">
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if($index == 2) : ?>
                    <div class="contact-element d-flex gap-4 align-items-center">
                        <?php if(!empty($repeater['repeater_image'])) : ?>
                            <img src="<?php echo esc_url($repeater['repeater_image']); ?>" alt="icon" class="img-fluid">
                        <?php endif; ?>
                        <?php if(!empty($repeater['repeater_label'])) : ?>
                        <p class="fs-14 fw-bold text-clr-dark5 text-uppercase mb-0">
                            <?php echo esc_html($repeater['repeater_label']); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
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
            <div class="copyright d-flex flex-column flex-sm-row justify-content-center py-3">
                <p class="m-0 text-clr-dark5 fw-normal fs-6">
                    Copyright © 2023 I Wadi Al Bada I All Rights Reserved
                </p>
            </div>
        </div>
    </footer>
    <!-- / footer -->



















<!-- footer -->
<footer class="footer bg-clr-deepDark d-none">
        <div class="container">
            <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
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
            <?php endif; ?>
            <?php if(!empty($cbtoolkit_copyright_1)) : ?>
            <div class="d-flex flex-column flex-sm-row justify-content-center footer-border py-2 mt-3">
                <p class="m-0 text-clr-dark10 fw-normal fs-6"><?php echo esc_html($cbtoolkit_copyright_1); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </footer>
    <!-- / footer -->