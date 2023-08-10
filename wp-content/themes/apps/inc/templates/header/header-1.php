<?php
/*
    cmt_section_header_topbar_1: start section topbar 1
    */


?>
<?php apps_sidebar_mobile_menu_1(); 
    $cbtoolkit_header_main_right_switch_1 = get_theme_mod('cbtoolkit_header_main_right_switch_1', false);
    $cbtoolkit_side_support_number_text_1 = get_theme_mod('cbtoolkit_side_support_number_text_1', __('Client Login', 'apps'));
    $cbtoolkit_side_support_number_link_1 = get_theme_mod('cbtoolkit_side_support_number_link_1', __('https://wadialbada.spp.io/login', 'apps'));
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
                <div class="navbar-right btn-wrap align-items-center d-flex flex-wrap gap-3 gap-lg-4">
                    <a class="apps-header-call-number-114" href="tel:+97142276916"><?php echo esc_html__('+97142276916', 'apps'); ?></a>
                    <?php if(!empty($cbtoolkit_side_support_number_text_1)) : ?>
                    <a class="apps-has-client-login-dubai-114" target="_blank" class="link-text ms-4 text-decoration-none pe-4 text-white fw-semi-bold d-flex gap-2 align-items-center"
                        href="<?php echo esc_url($cbtoolkit_side_support_number_link_1) ? esc_url($cbtoolkit_side_support_number_link_1): ''; ?>">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.99998 9.97917C9.05554 9.97917 8.26387 9.65972 7.62498 9.02083C6.98609 8.38194 6.66665 7.59028 6.66665 6.64583C6.66665 5.70139 6.98609 4.90972 7.62498 4.27083C8.26387 3.63194 9.05554 3.3125 9.99998 3.3125C10.9444 3.3125 11.7361 3.63194 12.375 4.27083C13.0139 4.90972 13.3333 5.70139 13.3333 6.64583C13.3333 7.59028 13.0139 8.38194 12.375 9.02083C11.7361 9.65972 10.9444 9.97917 9.99998 9.97917ZM5.02081 16.6667C4.5347 16.6667 4.12151 16.4965 3.78123 16.1562C3.44095 15.816 3.27081 15.4028 3.27081 14.9167V14.2708C3.27081 13.7847 3.39581 13.3472 3.64581 12.9583C3.89581 12.5694 4.2222 12.2778 4.62498 12.0833C5.4722 11.6806 6.35067 11.3715 7.2604 11.1562C8.17012 10.941 9.08331 10.8333 9.99998 10.8333C10.9166 10.8333 11.8333 10.941 12.75 11.1562C13.6666 11.3715 14.5416 11.6806 15.375 12.0833C15.7778 12.2778 16.1041 12.5694 16.3541 12.9583C16.6041 13.3472 16.7291 13.7847 16.7291 14.2708V14.9167C16.7291 15.4028 16.559 15.816 16.2187 16.1562C15.8785 16.4965 15.4653 16.6667 14.9791 16.6667H5.02081Z" fill="#50FF81"/>
                        </svg> 
                        <?php echo esc_html($cbtoolkit_side_support_number_text_1); ?>
                    </a>
                    <?php endif; ?>
                    <?php if(!empty($cbtoolkit_header_btn_text)) : ?>
                    <a class="apps-has-number-text-dubai-114"
                        href="<?php echo $cbtoolkit_header_btn_link ? esc_url($cbtoolkit_header_btn_link): ''; ?>">
                         <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.25 9.979C16.0555 9.979 15.8785 9.90609 15.7187 9.76025C15.559 9.61442 15.4653 9.43734 15.4375 9.229C15.2708 8.00678 14.75 6.96164 13.875 6.09359C13 5.22553 11.9514 4.70817 10.7292 4.5415C10.5208 4.51373 10.3437 4.42345 10.1979 4.27067C10.0521 4.11789 9.97915 3.93734 9.97915 3.729C9.97915 3.53456 10.0555 3.36095 10.2083 3.20817C10.3611 3.05539 10.5347 2.99289 10.7292 3.02067C12.368 3.20123 13.7708 3.87137 14.9375 5.03109C16.1042 6.19081 16.7778 7.59012 16.9583 9.229C16.9861 9.42345 16.9305 9.59706 16.7917 9.74984C16.6528 9.90262 16.4722 9.979 16.25 9.979ZM12.9792 9.979C12.8125 9.979 12.6632 9.92345 12.5312 9.81234C12.3993 9.70123 12.3055 9.54845 12.25 9.354C12.1389 8.96512 11.934 8.62484 11.6354 8.33317C11.3368 8.0415 10.993 7.84012 10.6042 7.729C10.4097 7.67345 10.2569 7.5797 10.1458 7.44775C10.0347 7.31581 9.97915 7.1665 9.97915 6.99984C9.97915 6.74984 10.066 6.54498 10.2396 6.38525C10.4132 6.22553 10.6111 6.17345 10.8333 6.229C11.5555 6.39567 12.1805 6.74289 12.7083 7.27067C13.2361 7.79845 13.5833 8.42345 13.75 9.14567C13.8055 9.354 13.7535 9.54498 13.5937 9.71859C13.434 9.8922 13.2292 9.979 12.9792 9.979ZM15.8958 16.979C14.2153 16.854 12.6215 16.4408 11.1146 15.7394C9.60762 15.038 8.25693 14.0901 7.06248 12.8957C5.86804 11.7012 4.9236 10.3505 4.22915 8.84359C3.53471 7.33664 3.12498 5.74289 2.99998 4.06234C2.97221 3.77067 3.05901 3.5172 3.2604 3.30192C3.46179 3.08664 3.70832 2.979 3.99998 2.979H6.83332C7.06943 2.979 7.27429 3.05192 7.4479 3.19775C7.62151 3.34359 7.7361 3.52762 7.79165 3.74984L8.29165 5.979C8.31943 6.15956 8.30901 6.33317 8.2604 6.49984C8.21179 6.6665 8.13193 6.80539 8.02082 6.9165L5.99998 8.95817C6.27776 9.48595 6.59721 9.99289 6.95832 10.479C7.31943 10.9651 7.72221 11.4234 8.16665 11.854C8.58332 12.2707 9.02776 12.6561 9.49998 13.0103C9.97221 13.3644 10.4722 13.6804 11 13.9582L13.0625 11.9582C13.1736 11.8471 13.3125 11.7672 13.4792 11.7186C13.6458 11.67 13.8194 11.6596 14 11.6873L16.2292 12.1665C16.4653 12.2359 16.6528 12.3575 16.7917 12.5311C16.9305 12.7047 17 12.9096 17 13.1457V15.979C17 16.2707 16.8889 16.5172 16.6667 16.7186C16.4444 16.92 16.1875 17.0068 15.8958 16.979Z" fill="#003959"/></svg> 
                        <?php echo esc_html($cbtoolkit_header_btn_text); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<!--/ header -->