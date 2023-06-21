<!-- header area start -->
<header class="header-area">
    <div class="container header-container">
        <div class="row align-items-center">
            <div class="col-xxl-3 col-xl-2 col-lg-2 col-md-2 col-6">
                <div class="apps-header-logo-114">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt=""></a>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 apps-menu-item-has-last-114">
                <div class="apps-header-nav-menu-114 text-end text-md-start">
                    <?php if(!empty($settings['slides'])) : ?>
                    <nav>
                        <ul>
                            <?php foreach($settings['slides'] as $slide) : 
                                $menu_id = $slide['select_el_select_nav_menu'];    
                                $mega_menu_id = $slide['select_el_template_mega_menu'];
                                $template_content = \Elementor\Plugin::$instance->frontend->get_builder_content($mega_menu_id);
                                if($template_content) {
                                    $menu_class = 'has-menu';
                                } else {
                                    $menu_class = '';
                                }
                            ?>
                                <li class="<?php echo esc_attr($menu_class); ?>"><a href="<?php echo get_the_permalink($menu_id); ?>"><?php echo get_the_title($menu_id); ?></a>
                                    <?php if(!empty($template_content)) : ?>
                                        <?php echo wp_kses_post($template_content); ?>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-6">
                <div class="apps-header-right-114  text-end">
                    <a href="#" class="apps-header-right-phone-114"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone2.svg" alt=""> <span>(347) 619-3312</span></a>
                    <a href="#" class="apps-header-right-btn-114 d-none d-lg-inline-block ml-40">Contact Us <i class="fal fa-arrow-right"></i></a>
                    <button class="apps-header-bar-btn-114">
                        <i class="fal fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->