<!-- header area start -->
<header class="header-area">
    <div class="container header-container">
        <div class="row align-items-center">
            <div class="col-xxl-3 col-xl-2 col-lg-2 col-md-2 col-6">
                <div class="apps-header-logo-114">
                    <a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="logo"></a>
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
                    <a href="tel:+97142276926" class="apps-header-right-phone-114"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone2.svg" alt="phone"> <span>(971) 42276926</span></a>
                    <a href="#" class="apps-header-right-btn-114 d-none d-lg-inline-block ml-40">
                        Contact Us 
                        <span>
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#003959"/>
                            </svg>
                        </span>
                    </a>
                    <button class="apps-header-bar-btn-114 d-md-none">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9 6.24074H2.1C1.49281 6.24074 0.999998 5.73884 0.999998 5.12037C0.999998 4.5019 1.49281 4 2.1 4H21.9C22.5072 4.00004 23 4.50193 23 5.1204C23 5.73884 22.5072 6.24074 21.9 6.24074ZM11.3105 18.6641H21.9C22.5072 18.6641 23 19.166 23 19.7844C23 20.4029 22.5072 20.9048 21.9 20.9048H11.3105C10.7033 20.9048 10.2105 20.4029 10.2105 19.7844C10.2105 19.166 10.7033 18.6641 11.3105 18.6641ZM21.9 11.3359H2.1C1.49281 11.3359 0.999998 11.8379 0.999998 12.4563C0.999998 13.0748 1.49281 13.5767 2.1 13.5767H21.9C22.5072 13.5767 23 13.0748 23 12.4563C23 11.8379 22.5072 11.3359 21.9 11.3359Z" fill="white"/>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->