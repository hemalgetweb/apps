<?php
/*
    cmt_section_header_topbar_1: start section topbar 1
    */


?>
<?php apps_sidebar_mobile_menu_1(); 
    $cbtoolkit_header_main_right_switch_1 = get_theme_mod('cbtoolkit_header_main_right_switch_1', false);
    $cbtoolkit_side_support_number_text_1 = get_theme_mod('cbtoolkit_side_support_number_text_1', __('(347) 619-3312', 'apps'));
    $cbtoolkit_side_support_number_link_1 = get_theme_mod('cbtoolkit_side_support_number_link_1', __('+3476193312', 'apps'));
    $cbtoolkit_header_btn_text = get_theme_mod('cbtoolkit_header_btn_text', __('CONTACT US', 'apps'));
    $cbtoolkit_header_btn_link = get_theme_mod('cbtoolkit_header_btn_link', __('#', 'apps'));
?>

<!-- header -->
<header id="header" class="m-auto  apps-header-style-1 top-0 start-0 end-0 d-xl-block d-none">
    <nav class="navbar navbar-expand-xl py-3">
        <div class="container-fluid align-items-center">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
                <?php apps_header_logo_1(); ?>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php apps_header_menu_1(); ?>
                <div class="navbar-right btn-wrap d-flex flex-wrap gap-3 gap-lg-4">
                    <?php if(!empty($cbtoolkit_side_support_number_text_1)) : ?>
                    <a class="link-text ms-4 text-decoration-none pe-4 fs-18 text-white fw-semi-bold d-flex gap-2 align-items-center"
                        href="tel:<?php echo esc_attr($cbtoolkit_side_support_number_link_1) ? esc_attr($cbtoolkit_side_support_number_link_1): ''; ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone.png" alt="icon" class="img-fluid">
                        <?php echo esc_html($cbtoolkit_side_support_number_text_1); ?>
                    </a>
                    <?php endif; ?>
                    <?php if(!empty($cbtoolkit_header_btn_text)) : ?>
                    <a class="btn position-relative rounded bg-btn text-uppercase py-2 ps-4 border-0 bg-clr-extraLight text-clr-dark1 fs-14 fw-bold d-flex gap-2 align-items-center"
                        href="<?php echo $cbtoolkit_header_btn_link ? esc_url($cbtoolkit_header_btn_link): ''; ?>">
                        <?php echo esc_html($cbtoolkit_header_btn_text); ?>
                        <svg class="btn-icon position-absolute" width="10" height="10" viewBox="0 0 10 10"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z"
                                fill="#003C4F" />
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<!--/ header -->