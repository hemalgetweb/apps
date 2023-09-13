<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package apps
 */

/** 
 *
 * apps header
 */

function apps_check_header()
{
    $apps_header_style = function_exists('get_field') ? get_field('header_style') : NULL;
    $apps_default_header_style = get_theme_mod('choose_default_header', 'header-style-1');

    if ($apps_header_style == 'header-style-1' && empty($_GET['s'])) {
        apps_header_style_1();
    } elseif ($apps_header_style == 'header-style-2' && empty($_GET['s'])) {
        apps_header_style_2();
    } else {
        /** default header style **/
        if ($apps_default_header_style == 'header-style-2') {
            apps_header_style_2();
        }  else {
            apps_header_style_1();
        }
    }
}
add_action('apps_header_style', 'apps_check_header', 10);


// Header deafult
function apps_header_style_1()
{
    get_template_part('/inc/templates/header/header', '1'); ?>
    <!-- side info end -->
    <div class="overlay"></div>
    <!-- sidebar area end -->
<?php
}


/**
 * header style 2
 */
function apps_header_style_2()
{ ?>

    <?php get_template_part('/inc/templates/header/header', '2');  ?>
    <!-- side info end -->
    <div class="overlay"></div>
    <!-- sidebar area end -->

<?php
}
/**
 * header style 3
 */
function apps_header_style_3()
{ ?>

    <?php get_template_part('/inc/templates/header/header', '3');  ?>
    <!-- side info end -->
    <div class="overlay"></div>
    <!-- sidebar area end -->

<?php
}
/**
 * header style 4
 */
function apps_header_style_4()
{ ?>

    <?php get_template_part('/inc/templates/header/header', '4');  ?>
    <!-- side info end -->
    <div class="overlay"></div>
    <!-- sidebar area end -->

<?php
}
/**
 * header style 5
 */
function apps_header_style_5()
{ ?>

    <?php get_template_part('/inc/templates/header/header', '5');  ?>
    <!-- side info end -->
    <div class="overlay"></div>
    <!-- sidebar area end -->
<?php } ?>
<?php
/**
 * header style 6
 */
function apps_header_style_6()
{ ?>

    <?php get_template_part('/inc/templates/header/header', '6');  ?>
    <!-- side info end -->
    <div class="overlay"></div>
    <!-- sidebar area end -->

<?php
}
/**
 * Header style 7
 */
function apps_header_style_7() {
    get_template_part('/inc/templates/header/header', '7');?>
    <!-- side info end -->
    <div class="overlay"></div>
    <!-- sidebar area end -->
<?php }

/*
header_logo
*/
function apps_header_logo()
{
?>
    <?php
    $logo_image = get_theme_mod('logo_image', get_template_directory_uri() . '/assets/images/logo/logo.png');
    $logo_text = get_theme_mod('logo_text', __('apps', 'apps'));
    $cbtoolkit_header_main_logoset = get_theme_mod('cbtoolkit_header_main_logoset', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header_main_logoset == 'image') {
            if (!empty($logo_image)) : ?>
                <img src="<?php echo esc_url($logo_image) ?>" alt="<?php echo esc_attr__('Image', 'apps'); ?>">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text)) : ?>
                <span><?php echo esc_html($logo_text); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}
function apps_header2_logo()
{
?>
    <?php
    $logo_image2 = get_theme_mod('logo_image2', get_template_directory_uri() . '/assets/images/logo.png');
    $logo_text2 = get_theme_mod('logo_text2', __('apps', 'apps'));
    $cbtoolkit_header2_main_logoset = get_theme_mod('cbtoolkit_header2_main_logoset', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header2_main_logoset == 'image') {
            if (!empty($logo_image2)) : ?>
                <img src="<?php echo esc_url($logo_image2) ?>" alt="<?php echo esc_attr__('Logo', 'apps'); ?>">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text2)) : ?>
                <span><?php echo esc_html($logo_text2); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}
function apps_header_logo_1()
{
?>
    <?php
    $logo_image1 = get_theme_mod('logo_image1', get_template_directory_uri() . '/assets/img/logo.png');
    $logo_text1 = get_theme_mod('logo_text1', __('apps', 'apps'));
    $cbtoolkit_header_main_logoset_3 = get_theme_mod('cbtoolkit_header_main_logoset_3', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header_main_logoset_3 == 'image') {
            if (!empty($logo_image1)) : ?>
                <img src="<?php echo esc_url($logo_image1) ?>" alt="<?php echo esc_attr__('apps', 'apps'); ?>" class="img-fluid">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text1)) : ?>
                <span><?php echo esc_html($logo_text1); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}

function apps_header_logo_1_updated()
{
?>
    <?php
    $logo_image1 = get_theme_mod('logo_image1', get_template_directory_uri() . '/assets/img/logo.png');
    $logo_text1 = get_theme_mod('logo_text1', __('apps', 'apps'));
    $cbtoolkit_header_main_logoset_3 = get_theme_mod('cbtoolkit_header_main_logoset_3', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header_main_logoset_3 == 'image') {
            if (!empty($logo_image1)) : ?>
                <img src="<?php echo esc_url($logo_image1) ?>" alt="<?php echo esc_attr__('apps', 'apps'); ?>" class="img-fluid">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text1)) : ?>
                <span><?php echo esc_html($logo_text1); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}
function apps_header_logo_2()
{
?>
    <?php
    $logo_image2 = get_theme_mod('logo_image2', get_template_directory_uri() . '/assets/images/update/logo.png');
    $logo_text2 = get_theme_mod('logo_text2', __('apps', 'apps'));
    $cbtoolkit_header_main_logoset_3 = get_theme_mod('cbtoolkit_header_main_logoset_3', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header_main_logoset_3 == 'image') {
            if (!empty($logo_image2)) : ?>
                <img src="<?php echo esc_url($logo_image2) ?>" alt="<?php echo esc_attr__('apps', 'apps'); ?>">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text2)) : ?>
                <span><?php echo esc_html($logo_text2); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}
function apps_header_logo_3()
{
?>
    <?php
    $logo_image3 = get_theme_mod('logo_image3', get_template_directory_uri() . '/assets/images/update/logo-3.png');
    $logo_text3 = get_theme_mod('logo_text3', __('apps', 'apps'));
    $cbtoolkit_header_main_logoset_3 = get_theme_mod('cbtoolkit_header_main_logoset_3', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header_main_logoset_3 == 'image') {
            if (!empty($logo_image3)) : ?>
                <img src="<?php echo esc_url($logo_image3) ?>" alt="<?php echo esc_attr__('apps', 'apps'); ?>">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text3)) : ?>
                <span><?php echo esc_html($logo_text3); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}
function apps_header_logo_4()
{
?>
    <?php
    $logo_image4 = get_theme_mod('logo_image4', get_template_directory_uri() . '/assets/images/update/logo-4.png');
    $logo_text4 = get_theme_mod('logo_text4', __('apps', 'apps'));
    $cbtoolkit_header_main_logoset_4 = get_theme_mod('cbtoolkit_header_main_logoset_4', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header_main_logoset_4 == 'image') {
            if (!empty($logo_image4)) : ?>
                <img src="<?php echo esc_url($logo_image4) ?>" alt="<?php echo esc_attr__('apps', 'apps'); ?>">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text4)) : ?>
                <span><?php echo esc_html($logo_text4); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}
function apps_header_logo_5()
{
?>
    <?php
    $logo_image5 = get_theme_mod('logo_image5', get_template_directory_uri() . '/assets/images/update/logo-5.png');
    $logo_text5 = get_theme_mod('logo_text5', __('apps', 'apps'));
    $cbtoolkit_header_main_logoset_5 = get_theme_mod('cbtoolkit_header_main_logoset_5', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header_main_logoset_5 == 'image') {
            if (!empty($logo_image5)) : ?>
                <img src="<?php echo esc_url($logo_image5) ?>" alt="<?php echo esc_attr__('apps', 'apps'); ?>">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text5)) : ?>
                <span><?php echo esc_html($logo_text5); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}
function apps_header_logo_6()
{
?>
    <?php
    $logo_image6 = get_theme_mod('logo_image6', get_template_directory_uri() . '/assets/images/update/logo-2.png');
    $logo_text6 = get_theme_mod('logo_text6', __('apps', 'apps'));
    $cbtoolkit_header_main_logoset_6 = get_theme_mod('cbtoolkit_header_main_logoset_6', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header_main_logoset_6 == 'image') {
            if (!empty($logo_image6)) : ?>
                <img src="<?php echo esc_url($logo_image6) ?>" alt="<?php echo esc_attr__('apps', 'apps'); ?>">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text6)) : ?>
                <span><?php echo esc_html($logo_text6); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}
function apps_header_logo_7()
{
?>
    <?php
    $logo_image7 = get_theme_mod('logo_image7', get_template_directory_uri() . '/assets/images/update/logo-6.png');
    $logo_text7 = get_theme_mod('logo_text7', __('apps', 'apps'));
    $cbtoolkit_header_main_logoset_7 = get_theme_mod('cbtoolkit_header_main_logoset_7', __('image', 'apps'));
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        if ($cbtoolkit_header_main_logoset_7 == 'image') {
            if (!empty($logo_image7)) : ?>
                <img src="<?php echo esc_url($logo_image7) ?>" alt="<?php echo esc_attr__('apps', 'apps'); ?>">
            <?php endif;
        } else { ?>
            <?php if (!empty($logo_text7)) : ?>
                <span><?php echo esc_html($logo_text7); ?></span>
            <?php endif; ?>
    <?php
        }
    }
    ?>
<?php
}

// header logo
function apps_header_sticky_logo()
{ ?>
    <?php
    $apps_logo_black = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
    $apps_secondary_logo = get_theme_mod('seconday_logo', $apps_logo_black);
    ?>
    <a class="sticky-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($apps_secondary_logo); ?>" alt="<?php print esc_attr__('logo', 'apps'); ?>" />
    </a>
<?php
}

function apps_mobile_logo()
{
    // side info
    $apps_mobile_logo_hide = get_theme_mod('apps_mobile_logo_hide', false);

    $apps_site_logo = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo/logo.png');

?>

    <?php if (!empty($apps_mobile_logo_hide)) : ?>
        <div class="side__logo mb-25">
            <a class="sideinfo-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($apps_site_logo); ?>" alt="<?php print esc_attr__('logo', 'apps'); ?>" />
            </a>
        </div>
    <?php endif; ?>



<?php }

//offcanvas menu
function offcanvas_menu_fullwidth()
{
    $cbtoolkit_side2_cart_switcher = get_theme_mod('cbtoolkit_side2_cart_switcher', true);
    $cbtoolkit_side2_wishlist_switcher = get_theme_mod('cbtoolkit_side2_wishlist_switcher', true);
    $cbtoolkit_side2_contact_switcher = get_theme_mod('cbtoolkit_side2_contact_switcher', true);
    $cbtoolkit_side2_contact_title = get_theme_mod('cbtoolkit_side2_contact_title',  __('Get In Touch', 'apps'));
    $cbtoolkit_side2_contact_address = get_theme_mod('cbtoolkit_side2_contact_address',  __('989 Bel Meadow Drive Los Angeles, CA 90017', 'apps'));
    $cbtoolkit_side2_contact_phone1 = get_theme_mod('cbtoolkit_side2_contact_phone1',  __('(+1) 909-407-2988', 'apps'));
    $cbtoolkit_side2_contact_phone_link1 = get_theme_mod('cbtoolkit_side2_contact_phone_link1',  __('(+1)909-407-2988', 'apps'));
    $cbtoolkit_side2_contact_phone2 = get_theme_mod('cbtoolkit_side2_contact_phone2',  __('(+1) 470-142-2412', 'apps'));
    $cbtoolkit_side2_contact_phone_link2 = get_theme_mod('cbtoolkit_side2_contact_phone_link2',  __('(+1)470-142-2412', 'apps'));
    $cbtoolkit_side2_office_time = get_theme_mod('cbtoolkit_side2_office_time',  __('Mon - Sat : 8am - 5pm', 'apps'));
    $cbtoolkit_side2_social_switcher = get_theme_mod('cbtoolkit_side2_social_switcher', true);
    $cbtoolkit_side2_social_fb_link = get_theme_mod('cbtoolkit_side2_social_fb_link',  __('#', 'apps'));
    $cbtoolkit_side2_social_twitter_link = get_theme_mod('cbtoolkit_side2_social_twitter_link',  __('#', 'apps'));
    $cbtoolkit_side2_social_instagram_link = get_theme_mod('cbtoolkit_side2_social_instagram_link',  __('#', 'apps'));
    $cbtoolkit_side2_social_youtube_link = get_theme_mod('cbtoolkit_side2_social_youtube_link',  __('#', 'apps'));


?>

    <!-- apps-fz-offcanvas-main-nav-wrapper start -->
    <div class="apps-fz-offcanvas-main-nav-wrapper">
        <button class="fz-button-close"><span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_4003_25524)">
<path d="M24 1.414L22.586 0L12 10.586L1.414 0L0 1.414L10.586 12L0 22.586L1.414 24L12 13.414L22.586 24L24 22.586L13.414 12L24 1.414Z" fill="#374957"/>
</g>
<defs>
<clipPath id="clip0_4003_25524">
<rect width="24" height="24" fill="white"/>
</clipPath>
</defs>
</svg>
</span></button>
        <div class="apps-fz-offcanvas-main-nav-wrapper-sections">
            <div class="apps-fz-offcanvas-main-nav-section">
                <div class="mobile-menu-updated"></div>
            </div>
            <div class="apps-fz-offcanvas-main-sideinfo-section">

                <div class="apps-fz-offcanvas-main-sideinfo">
                    <?php if (class_exists('WooCommerce')) : ?>
                        <div class="apps-fz-offcanvas-main-search mb-45">
                            <form action="<?php print esc_url(home_url('/')); ?>" method="get">
                                <input type="search" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('Search Product', 'apps'); ?>" id="search-input">
                                <input type="hidden" name="post_type" value="product" />
                                <button type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php if (class_exists('WooCommerce')) : ?>
                        <div class="apps-fz-offcanvas-main-actions mb-15">
                            <?php if (!empty($cbtoolkit_side2_cart_switcher)) : ?>
                                <a href="<?php print wc_get_cart_url(); ?>"><span class="fz-off-actions-icon"><i class="fa-thin fa-bag-shopping"></i>
                                <?php if(class_exists('WooCommerce')) : ?>
                                    <?php if(!empty(WC()->cart->get_cart_contents_total())) : ?>    
                                        <span class="fz-off-actions-count"><span id="mini-cart-count-2341"></span></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </span> <span class="fz-off-actions-text"><span><?php print esc_html__('View Cart', 'apps'); ?></span><span><?php print esc_html__('View Cart', 'apps'); ?></span></span></a>
                            <?php endif; ?>
                            <?php if (!empty($cbtoolkit_side2_wishlist_switcher)) : ?>
                                <a href="<?php print esc_url(home_url('/wishlist')); ?>"><i class="fa-thin fa-heart"></i> <span class="fz-off-actions-text"><span><?php print esc_html__('View Wishlist', 'apps'); ?></span><span><?php print esc_html__('View Wishlist', 'apps'); ?></span></span></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($cbtoolkit_side2_contact_switcher)) : ?>
                        <div class="apps-fz-offcanvas-main-contacts">
                            <?php if (!empty($cbtoolkit_side2_contact_title)) : ?>
                                <h4 class="apps-fz-offcanvas-main-contacts-title mb-30"><?php print esc_html($cbtoolkit_side2_contact_title); ?></h4>
                            <?php endif; ?>

                            <ul class="apps-fz-offcanvas-main-contacts-list">
                                <?php if (!empty($cbtoolkit_side2_contact_address)) : ?>
                                    <li>
                                        <i class="fa-thin fa-location-dot"></i>
                                        <span class="apps-fz-offcanvas-main-contact-text"><?php print esc_html($cbtoolkit_side2_contact_address); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if (!empty($cbtoolkit_side2_contact_phone1 || $cbtoolkit_side2_contact_phone2)) : ?>
                                    <li>
                                        <i class="fa-thin fa-phone-flip"></i>
                                        <span class="apps-fz-offcanvas-main-contact-text">
                                            <?php if (!empty($cbtoolkit_side2_contact_phone1)) : ?>
                                                <a href="<?php echo esc_url($cbtoolkit_side2_contact_phone_link1) ? esc_url('tel:' . $cbtoolkit_side2_contact_phone_link1) : ''; ?>"><?php print esc_html($cbtoolkit_side2_contact_phone1); ?></a> <br>
                                            <?php endif; ?>
                                            <?php if (!empty($cbtoolkit_side2_contact_phone2)) : ?>
                                                <a href="<?php echo esc_url($cbtoolkit_side2_contact_phone_link2) ? esc_url('tel:' . $cbtoolkit_side2_contact_phone_link2) : ''; ?>"><?php print esc_html($cbtoolkit_side2_contact_phone2); ?></a>
                                            <?php endif; ?>
                                        </span>
                                    </li>
                                <?php endif; ?>

                                <?php if (!empty($cbtoolkit_side2_office_time)) : ?>
                                    <li>
                                        <i class="fa-thin fa-clock"></i>
                                        <span class="apps-fz-offcanvas-main-contact-text"><?php print esc_html__('Store Hours:', 'apps'); ?><br><span class="apps-fz-opentime"><?php print esc_html($cbtoolkit_side2_office_time); ?></span></span>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($cbtoolkit_side2_social_switcher)) : ?>
                        <div class="apps-fz-offcanvas-main-socials mt-45">
                            <?php if (!empty($cbtoolkit_side2_social_fb_link)) : ?>
                                <a href="<?php print esc_url($cbtoolkit_side2_social_fb_link); ?>"><i class="fa-brands fa-facebook-f"></i><i class="fa-brands fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if (!empty($cbtoolkit_side2_social_twitter_link)) : ?>
                                <a href="<?php print esc_url($cbtoolkit_side2_social_twitter_link); ?>"><i class="fa-brands fa-twitter"></i><i class="fa-brands fa-twitter"></i></a>
                            <?php endif; ?>
                            <?php if (!empty($cbtoolkit_side2_social_instagram_link)) : ?>
                                <a href="<?php print esc_url($cbtoolkit_side2_social_instagram_link); ?>"><i class="fa-brands fa-instagram"></i><i class="fa-brands fa-instagram"></i></a>
                            <?php endif; ?>
                            <?php if (!empty($cbtoolkit_side2_social_youtube_link)) : ?>
                                <a href="<?php print esc_url($cbtoolkit_side2_social_youtube_link); ?>"><i class="fa-brands fa-youtube"></i><i class="fa-brands fa-youtube"></i></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- apps-fz-offcanvas-main-nav-wrapper end-->

<?php }

//header search 
function header_search_fullwidth()
{ ?>
    <!-- header-search -->
    <div class="cbsearchbar cb-sidebar-area">
        <button class="cbsearchbar__close"><i class="fa-light fa-xmark"></i></button>
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 pt-100 pb-100">
                        <h2 class="cbsearchbar__title"><?php print esc_html__('What Product Are You Looking For?', 'apps'); ?></h2>
                        <div class="cbsearchbar__form">
                            <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                                <input type="search" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('Search Product', 'apps'); ?>">
                                <input type="hidden" name="post_type" value="product" />
                                <button class="cbsearchbar__search-btn" type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-body-overlay"></div>
    <!-- header-search-end -->
<?php }


/**
 * [apps_header_menu description]
 * @return [type] [description]
 */
function apps_header_menu()
{
?>
    <?php
    $apps_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
        'container'      => '',
        'menu_id'       => '',
        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
        'walker'         => new WP_Bootstrap_Navwalker,
        'echo'           => false
    ]);
    echo str_replace('menu-item-has-children', 'menu-item-has-children has-dropdown-menu', $apps_menu);
    ?>
<?php
}
function apps_header_menu_1()
{
?>
    <?php
    $apps_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0 py-3 py-xl-0',
        'container'      => '',
        'menu_id'       => '',
        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
        'walker'         => new WP_Bootstrap_Navwalker,
        'echo'           => false
    ]);
    echo str_replace('menu-item-has-children', 'menu-item-has-children has-dropdown-menu', $apps_menu);
    ?>
<?php
}
function apps_header_menu_3()
{
?>
    <?php
    $apps_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'       => '',
        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
        'walker'         => new WP_Bootstrap_Navwalker,
        'echo'           => false
    ]);
    echo str_replace('menu-item-has-children', 'menu-item-has-children apps-fz-has-dropdown-menu-2-update', $apps_menu);
    ?>
<?php
}
function apps_header_menu_4()
{
?>
    <?php
    $apps_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'       => '',
        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
        'walker'         => new WP_Bootstrap_Navwalker,
        'echo'           => false
    ]);
    echo str_replace('menu-item-has-children', 'menu-item-has-children', $apps_menu);
    ?>
<?php
}
function apps_header_menu_5()
{
?>
    <?php
    $apps_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'       => '',
        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
        'walker'         => new WP_Bootstrap_Navwalker,
        'echo'           => false
    ]);
    echo str_replace('menu-item-has-children', 'menu-item-has-children', $apps_menu);
    ?>
<?php
}
function apps_header_menu_6()
{
?>
<?php
    $apps_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'       => '',
        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
        'walker'         => new WP_Bootstrap_Navwalker,
        'echo'           => false
    ]);
    echo str_replace('menu-item-has-children', 'menu-item-has-children', $apps_menu);
    ?>
<?php
}
function apps_header_menu_7()
{
?>
<?php
    $apps_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'       => '',
        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
        'walker'         => new WP_Bootstrap_Navwalker,
        'echo'           => false
    ]);
    echo str_replace('menu-item-has-children', 'menu-item-has-children', $apps_menu);
    ?>
<?php
}
$apps_all_categories = '';
function apps_get_woo_product_categories()
{
    global $apps_all_categories;
    if (class_exists('WooCommerce')) {
        $taxonomy     = 'product_cat';
        $orderby      = 'post__in';
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no  
        $title        = '';
        $empty        = 0;
        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty,
        );
        $apps_all_categories = get_categories($args);
    }
}
add_action('init', 'apps_get_woo_product_categories');
/**
 * Add menu class into link
 */
function apps_add_specific_menu_location_atts($atts, $item, $args)
{
    // check if the item is in the primary menu
    if ($args->theme_location == 'main-menu') {
        // add the desired attributes:
        $atts['class'] = 'nav-link nav-link fs-14 fw-bold text-uppercase nav-menu-single-item';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'apps_add_specific_menu_location_atts', 10, 3);
/**
 * Check if wp menu has submenu
 */
function apps_check_has_menu_in_link($atts, $item, $args)
{
    if (in_array('menu-item-has-children', $item->classes)) {
        if (key_exists('class', $atts)) {
            $atts['class'] .= ' dropdown-toggle';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'apps_check_has_menu_in_link', 10, 3);
/**
 * Add class into submenu link
 */
function apps_nav_menu_link_class($atts, $item)
{
    if (!$item->has_children && $item->menu_item_parent > 0) {
        $class         = 'dropdown-item';
        $atts['class'] = $class;
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'apps_nav_menu_link_class', 10, 2);
function apps_copyright_menu()
{
?>
    <?php
    $apps_copyright_menu = wp_nav_menu([
        'theme_location' => 'copyright_menu',
    ]);
    ?>
<?php
}
function apps_header_menu_2()
{
?>
    <?php
    $apps_menu_2 = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
        'walker'         => new WP_Bootstrap_Navwalker,
        'echo'           => false
    ]);
    echo str_replace('menu-item-has-children', 'menu-item-has-children dropdown', $apps_menu_2);
    ?>
<?php
}

/**
 * [apps_footer_menu description]
 * @return [type] [description]
 */
function apps_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
        'walker'         => new WP_Bootstrap_Navwalker,
    ]);
}
function apps_footer_social()
{
    $cbsocial_list_widget = get_theme_mod('cbsocial_list_widget');
?>
    <?php if (!empty($cbsocial_list_widget)) : ?>
        <?php foreach ($cbsocial_list_widget as $apps_social) : ?>
            <?php if (!empty($apps_social['social_label'])) : ?>
                <a href="<?php echo esc_url($apps_social['social_url']) ? esc_url($apps_social['social_url']) : ''; ?>" target="_blank" class="bottom-footer-social mr-30"><span data-bg-color="<?php echo esc_attr($apps_social['social_color']); ?>" class="footer-social-icon mr-10"><i class="icofont-<?php echo esc_attr($apps_social['social_icon']) ? esc_attr($apps_social['social_icon']) : ''; ?>"></i></span><?php echo esc_html($apps_social['social_label']); ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php }

/**
 *
 * apps footer
 */

function apps_check_footer()
{
    $apps_footer_style = function_exists('get_field') ? get_field('footer_style') : null;
    $apps_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1');
    if ($apps_footer_style == 'footer-style-1') {
        apps_footer_style_1();
    } elseif ($apps_footer_style == 'footer-style-2') {
        apps_footer_style_2();
    } elseif ($apps_footer_style == 'footer-style-3') {
        apps_footer_style_3();
    } elseif ($apps_footer_style == 'footer-style-4') {
        apps_footer_style_4();
    } elseif ($apps_footer_style == 'footer-style-5') {
        apps_footer_style_5();
    } elseif ($apps_footer_style == 'footer-style-6') {
        apps_footer_style_6();
    } else {
        /** default footer style **/
        if ($apps_default_footer_style == 'footer-style-1') {
            apps_footer_style_1();
        } elseif ($apps_default_footer_style == 'footer-style-2') {
            apps_footer_style_2();
        } elseif ($apps_default_footer_style == 'footer-style-3') {
            apps_footer_style_3();
        } elseif ($apps_default_footer_style == 'footer-style-4') {
            apps_footer_style_4();
        } elseif ($apps_default_footer_style == 'footer-style-5') {
            apps_footer_style_5();
        } elseif ($apps_default_footer_style == 'footer-style-6') {
            apps_footer_style_6();
        } else {
            apps_footer_style_1();
        }
    }
}
add_action('apps_footer_style', 'apps_check_footer', 10);

/**
 * footer  style_defaut
 */
function apps_footer_style_1()
{ ?>
    <?php get_template_part('/inc/templates/footer/footer', '1');
    ?>

<?php
}
/**
 * footer  style 2
 */
function apps_footer_style_2()
{ ?>
    <?php get_template_part('/inc/templates/footer/footer', '2');
    ?>

<?php
}
/**
 * footer  style 3
 */
function apps_footer_style_3()
{ ?>
    <?php get_template_part('/inc/templates/footer/footer', '3');
    ?>
<?php
}
/**
 * footer  style 4
 */
function apps_footer_style_4()
{ ?>
    <?php get_template_part('/inc/templates/footer/footer', '4'); ?>
<?php
}
/**
 * footer  style 5
 */
function apps_footer_style_5()
{ ?>
    <?php get_template_part('/inc/templates/footer/footer', '5'); ?>
<?php
}
/**
 * footer  style 6
 */
function apps_footer_style_6()
{ ?>
    <?php get_template_part('/inc/templates/footer/footer', '6'); ?>
<?php
}

// apps_copyright
function apps_copyright_text()
{
    $apps_copyright = get_theme_mod('apps_copyright', __('© 2023 apps Designed by CodeBasket', 'apps'));
?>
    <?php if (!empty($apps_copyright)) : ?>
        <p><?php print esc_html($apps_copyright); ?></p>
    <?php endif; ?>
<?php }
function apps_copyright_2_text()
{
    $apps_copyright_2 = get_theme_mod('apps_copyright_2', __('© 2023 apps Designed by CodeBasket', 'apps'));
?>
    <?php if (!empty($apps_copyright_2)) : ?>
        <p class="mb-0"><?php print esc_html($apps_copyright_2); ?></p>
    <?php endif; ?>
    <?php }

/**
 * [apps_breadcrumb_func description]
 * @return [type] [description]
 */
function apps_breadcrumb_func()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;
    $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image') : '';
    $search_queried_result = get_search_query();
    $args = array(
        'posts_per_page' => -1,
        'post_type'      => 'page',
        'post_status' => 'publish'
    );
    $query = new WP_Query($args);
    $post_ids = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            array_push($post_ids, get_the_ID());
        }
        wp_reset_query();
    }
    $title_from_customizer = get_the_title();
    if (!is_home() && !is_archive() && !is_single() && !is_404() && !is_search() && !is_privacy_policy()) {
        $title_from_customizer = wp_kses_post(get_the_title());
    } else if (is_single()) {
        $title_from_customizer = wp_kses_post(get_the_title());
    } else {

        $title_from_customizer_blog = get_theme_mod('breadcrumb_title_blog', __('Blog', 'apps'));
        $title_from_customizer = __('Blog', 'apps');
        $title_from_customizer = $title_from_customizer_blog ? $title_from_customizer_blog : $title_from_customizer;
    }
    if (is_archive()) {
        $title_from_customizer = get_the_archive_title();
    }
    $searched_query = array();
    if (is_404()) {
        $searched_query = __('404', 'apps');
        $title_from_customizer = esc_html__('Search Results for :', 'apps') . $searched_query;
    }
    if (is_search()) {
        $searched_query = get_search_query();
        if (empty($searched_query)) {
            $searched_query = esc_html__('All', 'apps');
        }
        $title_from_customizer = esc_html__('Search Results for :', 'apps') . $searched_query;
    }



    $_id = get_the_ID();
    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }
    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';

        // get_theme_mod
        $breadcrumb_bg_color = get_theme_mod('breadcrumb_bg_color', __('#F8F8F8', 'apps'));
        $bg_img_url = get_template_directory_uri() . '/assets/images/inner-banner-bg.png';
        $breadcrumb_bg_img = get_theme_mod('breadcrumb_bg_img', get_template_directory_uri() . '/assets/images/inner-banner-bg.png');

        $breadcrumb_padding_top_field = function_exists('get_field') ? get_field('apps_breadcrumb_padding_top') : '';
        $breadcrumb_padding_bottom_field = function_exists('get_field') ? get_field('apps_breadcrumb_padding_bottom') : '';

        $breadcrumb_padding_top_customizer = get_theme_mod('breadcrumb_padding_top', 62);
        $breadcrumb_padding_bottom_customizer = get_theme_mod('breadcrumb_padding_bottom', 65);

        if ($breadcrumb_padding_top_field) {
            $breadcrumb_padding_top = $breadcrumb_padding_top_field;
        } else {
            $breadcrumb_padding_top = $breadcrumb_padding_top_customizer;
        }

        if ($breadcrumb_padding_bottom_field) {
            $breadcrumb_padding_bottom = $breadcrumb_padding_bottom_field;
        } else {
            $breadcrumb_padding_bottom = $breadcrumb_padding_bottom_customizer;
        }
        $breadcrumb_overlay_class = '';
        if ($hide_bg_img && empty($_GET['s'])) {
            $breadcrumb_bg_img = '';
        } else {
            $breadcrumb_bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $breadcrumb_bg_img;
            $breadcrumb_overlay_class = 'breadcrumb_overlay';
        }
        $breadcrumb_bg_img_ovelay_color_opacity = get_theme_mod('breadcrumb_bg_img_ovelay_color_opacity', __('0', 'apps'));
        $breadcrumb_bg_img_ovelay_color = get_theme_mod('breadcrumb_bg_img_ovelay_color', '');
    ?>
        <div class="banner banner-inner <?php print esc_attr($breadcrumb_overlay_class); ?>" data-bg-color="<?php print esc_attr($breadcrumb_bg_color); ?>" data-background="<?php print esc_url($breadcrumb_bg_img); ?>" data-top-space="<?php print esc_attr($breadcrumb_padding_top); ?>px" data-bottom-space="<?php print esc_attr($breadcrumb_padding_bottom); ?>px" data-background-opacity="<?php echo esc_attr($breadcrumb_bg_img_ovelay_color_opacity) ? esc_attr($breadcrumb_bg_img_ovelay_color_opacity) : '0'; ?>" data-overlay-color="<?php echo esc_attr($breadcrumb_bg_img_ovelay_color); ?>">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-txt">
                            <h1>
                                <?php
                                if (str_contains($title_from_customizer, '<em>')) {
                                    echo wp_kses_post($title_from_customizer, array('<em>' => array()));
                                } else {
                                    echo wp_strip_all_tags($title_from_customizer);
                                }
                                ?>
                            </h1>
                            <nav class="breadcrumb-txt p-0 breadcrumb-trail breadcrumbs">
                                <?php
                                if (function_exists('bcn_display')) {
                                    $display_text = bcn_display(true);
                                    if ($searched_query == 'All') {
                                        $display_text .= $searched_query . '"';
                                    }
                                    echo wp_kses_post($display_text);
                                    unset($display_text);
                                }
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}

// add_action('apps_before_main_content', 'apps_breadcrumb_func');


/**
 *
 * pagination
 */
if (!function_exists('apps_pagination')) {

    function _apps_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function apps_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }
        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<div class="blog-pagination mb-40">';
            foreach ($paginations as $key => $pg) {
                $pagi .= $pg;
            }
            $pagi .= '</div>';
        }

        print _apps_pagi_callback($pagi);
    }
}



function apps_header_cart()
{ ?>
    <div class="header-cart-wrap" id="headerCartWrap">
        <div class="cart-list">
            <div class="title">
                <h3><?php echo esc_html__('Shopping Cart', 'apps'); ?></h3>
                <button class="cart-close"><i class="fa-regular fa-xmark"></i></button>
            </div>
            <?php reverel_cart_items(); ?>
            <div class="btn-box">
                <a href="<?php echo class_exists('WooCommerce') ? esc_url(wc_get_cart_url()) : ''; ?>" class="def-btn"><?php echo esc_html__('View Cart', 'apps'); ?></a>
                <a href="<?php echo class_exists('WooCommerce') ? esc_url(wc_get_checkout_url()) : ''; ?>" class="def-btn"><?php echo esc_html__('Checkout', 'apps'); ?></a>
            </div>
        </div>
    </div>
<?php }



function apps_sidebar_mobile_menu_1()
{
    $cbtoolkit_side_logo = get_theme_mod('cbtoolkit_side_logo', get_template_directory_uri() . '/assets/images/update/logo-white.png');
    $cbtoolkit_side_btn_text = get_theme_mod('cbtoolkit_side_btn_text',  __('Contact Us', 'apps'));
    $cbtoolkit_side_btn_url = get_theme_mod('cbtoolkit_side_btn_url',  __('#', 'apps'));
    $cbtoolkit_header_top_email_text_1 = get_theme_mod('cbtoolkit_header_top_email_text_1',  __('info@webmail.com', 'apps'));
    $cbtoolkit_header_top_email_link_1 = get_theme_mod('cbtoolkit_header_top_email_link_1',  __('info@webmail.com', 'apps'));
    $cbtoolkit_side_support_number_link_1 = get_theme_mod('cbtoolkit_side_support_number_link_1',  __('https://wadialbada.spp.io/login', 'apps'));
    $cbtoolkit_side_support_number_text_1 = get_theme_mod('cbtoolkit_side_support_number_text_1',  __('Client Login', 'apps'));
    $cbtoolkit_side_contact_address_link_1 = get_theme_mod('cbtoolkit_side_contact_address_link_1',  __('https://goo.gl/maps/ZNyPLyPfoLkFYpiS7', 'apps'));
    $cbtoolkit_side_contact_address_text_1 = get_theme_mod('cbtoolkit_side_contact_address_text_1',  __('Ave 14th Street, Mirpur 210, San Franciso, USA 3296.', 'apps'));
    $cbtoolkit_header_btn_text = get_theme_mod('cbtoolkit_header_btn_text', __('CONTACT US', 'apps'));
    $cbtoolkit_header_btn_link = get_theme_mod('cbtoolkit_header_btn_link', __('#', 'apps'));
?>


    <!-- mobile menu -->
    <div class="mobileMenu d-block d-xl-none" id="mobileHeader">
        <nav class="navbar p-0">
            <div class="mobileMenu-container">
                <div class="mobileMenu-header d-flex align-items-center gap-4 justify-content-between">
                    <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
                        <img width="70" height="30" src="https://wadialbadaitsolutions.ae/wp-content/uploads/2023/08/new-logo-wadi-al-bada-mob.svg" alt="logo" class="img-fluid">
                    </a>
                    <div class="navbarToggler  border-0 text-decoration-none">
                        <div class="menuAction">
                            <a href="#" class="navbar-toggler-icons openMenu">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu.svg" alt="bar icon" class="img-fluid">
                            </a>
                            <a href="#" class="navbar-toggler-icons closeMenu">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close.svg" alt="bar icon" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mobileMenu-wrapper d-flex align-items-center justify-content-between flex-column">
                <?php apps_header_menu_1(); ?>
                    <div
                        class="navbar-right btn-wrap d-flex flex-wrap justify-content-between align-content-center w-100 gap-3 gap-lg-4">
                        <a class="apps-header-call-number-114 mr-15" href="tel:+97142276926">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.4504 20.45C17.5004 20.45 15.5714 19.9917 13.6634 19.075C11.7547 18.1583 10.0504 16.95 8.55039 15.45C7.05039 13.95 5.83806 12.2457 4.91339 10.337C3.98806 8.429 3.52539 6.5 3.52539 4.55V4.025C3.52539 3.84167 3.54206 3.66667 3.57539 3.5H8.70039L9.57539 8.05L6.80039 10.75C7.60039 12.0833 8.54606 13.2917 9.63739 14.375C10.7294 15.4583 11.9671 16.4 13.3504 17.2L16.1254 14.4L20.4754 15.275V20.375C20.3254 20.4083 20.1544 20.4293 19.9624 20.438C19.7711 20.446 19.6004 20.45 19.4504 20.45ZM6.10039 9.325L7.97539 7.55L7.45039 5H5.05039C5.06706 5.73333 5.17139 6.46667 5.36339 7.2C5.55472 7.93333 5.80039 8.64167 6.10039 9.325ZM14.7504 17.9C15.3837 18.2 16.0797 18.4417 16.8384 18.625C17.5964 18.8083 18.3087 18.9 18.9754 18.9V16.5L16.6004 16.025L14.7504 17.9Z" fill="#00C7C7"/>
                        </svg>
                            <?php echo esc_html__('+971 4 227 6926', 'apps'); ?>
                        </a>
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
                        <a class="apps-has-number-text-dubai-114"  target="_blank"
                            href="<?php echo $cbtoolkit_header_btn_link ? esc_url($cbtoolkit_header_btn_link): ''; ?>">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.00004 6.97917C6.0556 6.97917 5.26393 6.65972 4.62504 6.02083C3.98615 5.38194 3.66671 4.59028 3.66671 3.64583C3.66671 2.70139 3.98615 1.90972 4.62504 1.27083C5.26393 0.631944 6.0556 0.3125 7.00004 0.3125C7.94449 0.3125 8.73615 0.631944 9.37504 1.27083C10.0139 1.90972 10.3334 2.70139 10.3334 3.64583C10.3334 4.59028 10.0139 5.38194 9.37504 6.02083C8.73615 6.65972 7.94449 6.97917 7.00004 6.97917ZM2.02087 13.6667C1.53476 13.6667 1.12157 13.4965 0.781291 13.1562C0.441013 12.816 0.270874 12.4028 0.270874 11.9167V11.2708C0.270874 10.7847 0.395874 10.3472 0.645874 9.95833C0.895874 9.56944 1.22226 9.27778 1.62504 9.08333C2.47226 8.68056 3.35074 8.37153 4.26046 8.15625C5.17018 7.94097 6.08337 7.83333 7.00004 7.83333C7.91671 7.83333 8.83337 7.94097 9.75004 8.15625C10.6667 8.37153 11.5417 8.68056 12.375 9.08333C12.7778 9.27778 13.1042 9.56944 13.3542 9.95833C13.6042 10.3472 13.7292 10.7847 13.7292 11.2708V11.9167C13.7292 12.4028 13.5591 12.816 13.2188 13.1562C12.8785 13.4965 12.4653 13.6667 11.9792 13.6667H2.02087Z" fill="#50FF81"/>
</svg>
 
                            <?php echo esc_html($cbtoolkit_header_btn_text); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- / Mobile menu -->













    <div class="apps-mobile-sidebar-main d-none">
        <div class="apps-mobile-sidebar-inner">
            <div class="apps-mobile-sidebar-tabs">
                <nav>
                    <div class="nav nav-tabs" id="nav-menu-info" role="tablist">
                        <button class="nav-link active" id="nav-menu-tab" data-bs-toggle="tab" data-bs-target="#nav-menu" type="button" role="tab" aria-controls="nav-menu" aria-selected="true"><?php echo esc_html__('MENU', 'apps'); ?></button>
                        <button class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" type="button" role="tab" aria-controls="nav-info" aria-selected="false"><?php echo esc_html__('INFO', 'apps'); ?></button>
                    </div>
                </nav>
            </div>
            <div class="apps-mobile-sidebar-inner-content">
                <div class="apps-mobile-sidebar-content-top pb-25">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <?php if (!empty($cbtoolkit_side_logo)) : ?>
                                <div class="apps-mobile-sidebar-logo">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($cbtoolkit_side_logo); ?>" alt="<?php echo esc_attr__('logo', 'apps'); ?>"></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <button class="apps-mobile-sidebar-close-btn"><i class="fa-thin fa-xmark"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="nav-mobile-sidebar-tab">
                    <div class="tab-pane fade show active" id="nav-menu" role="tabpanel" aria-labelledby="nav-menu-tab">
                        <div class="apps-mobile-sidebar-content-main">
                            <div class="mobile-menu-updated-2"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                        <div class="apps-mobile-sidebar-content-main-right">
                            <div class="apps-mobile-sidebar-content-main apps-rv-has-category-mobile-1 mb-30 mb-md-0">
                                <div class="apps-rv-cat-menu"></div>
                            </div>
                            <div class="pb-25">
                                <div class="apps-mobile-sidebar-search-form">
                                    <form action="<?php print esc_url(home_url('/')); ?>" method="get">
                                        <button type="submit"><i class="fa-thin fa-search"></i></button>
                                        <input type="search" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('Search Product', 'apps'); ?>" id="search-input" />
                                        <input type="hidden" name="post_type" value="product" />
                                    </form>
                                </div>
                            </div>
                            <?php if (class_exists('WooCommerce')) : ?>
                                <div class="pb-25">
                                    <button class="apps-header-cart-count-btn">
                                        <span class="left">
                                            <i class="fa-solid fa-basket-shopping"></i>
                                            <span class="price"><?php echo get_woocommerce_currency_symbol(); ?><span id="mini-cart-subtotal-price-234243"></span></span>
                                        </span>
                                        <span class="right">
                                            <span class="count"><span id="mini-cart-count"></span></span>
                                        </span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php if (class_exists('WooCommerce')) : ?>
                                <div class="apps-fz-mobile-sidebar-btn-wrapper-main-2">
                                    <a href="<?php print wc_get_cart_url(); ?>"><i class="fa-thin fa-cart-shopping"></i></a>
                                    <a href="<?php echo esc_url(home_url('/wishlist')); ?>"><i class="fa-light fa-heart"></i></a>
                                    <a href="<?php the_permalink(get_option('woocommerce_myaccount_page_id'));  ?>"><i class="fa-thin fa-user"></i></a>
                                    <a href="<?php echo esc_url(home_url('/contact')); ?>"><i class="fa-thin fa-headphones"></i></a>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($cbtoolkit_side_btn_text)) : ?>
                                <div class="pb-25">
                                    <a href="<?php echo esc_url($cbtoolkit_side_btn_url) ? esc_url_raw($cbtoolkit_side_btn_url) : ''; ?>" class="apps-white-btn"><?php echo esc_html($cbtoolkit_side_btn_text); ?></a>
                                </div>
                            <?php endif; ?>
                            <div class="apps-mobile-sidebar-contact-list">
                                <ul>
                                    <?php if (!empty($cbtoolkit_side_contact_address_text_1)) : ?>
                                        <li><a href="<?php echo esc_url($cbtoolkit_side_contact_address_link_1) ? esc_url($cbtoolkit_side_contact_address_link_1) : ''; ?>"><i class="fa-thin fa-location-dot"></i> <span><?php echo esc_html($cbtoolkit_side_contact_address_text_1); ?></span></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($cbtoolkit_header_top_email_text_1)) : ?>
                                        <li><a href="<?php echo esc_url($cbtoolkit_header_top_email_link_1) ? esc_url('mailto:' . $cbtoolkit_header_top_email_link_1) : ''; ?>"><i class="fa-thin fa-envelope-open"></i> <span><?php echo esc_html($cbtoolkit_header_top_email_text_1); ?></span></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($cbtoolkit_side_support_number_text_1)) : ?>
                                        <li><a href="<?php echo esc_url($cbtoolkit_side_support_number_link_1) ? esc_url('tel:' . $cbtoolkit_side_support_number_link_1) : ''; ?>"><i class="fa-thin fa-phone"></i> <span><?php echo esc_html($cbtoolkit_side_support_number_text_1); ?></span></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }
