<?php

/**
 * cbtoolkit customizer
 *
 * @package cbtoolkit
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('Kirki')) {
    return;
}
/**
 * Added Panels & Sections
 */


if (class_exists('WooCommerce')) {
    function farzaa_get_parent_product_category()
    {
        $args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'post_type' => 'product',
            'taxonomy' => 'product_cat',
            'parent' => 0
        );
        $farzaa_product_cat = get_categories($args);
        $farzaa_cat_arr = [];
        $farzaa_cat_id = [];
        $farzaa_cat_name = [];
        foreach ($farzaa_product_cat as $farzaa_cat) {
            $farzaa_cat_id[] = $farzaa_cat->term_id;
            $farzaa_cat_name[] = $farzaa_cat->name;
        }
        $farzaa_cat_arr = array_combine($farzaa_cat_id, $farzaa_cat_name);
        return $farzaa_cat_arr;
    }
    farzaa_get_parent_product_category();
}
if (class_exists('WooCommerce')) {
    function farzaa_get_product_category()
    {
        $args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'post_type' => 'product',
            'taxonomy' => 'product_cat',
        );
        $farzaa_product_cat = get_categories($args);
        $farzaa_cat_arr = [];
        $farzaa_cat_id = [];
        $farzaa_cat_name = [];
        foreach ($farzaa_product_cat as $farzaa_cat) {
            $farzaa_cat_id[] = $farzaa_cat->term_id;
            $farzaa_cat_name[] = $farzaa_cat->name;
        }
        $farzaa_cat_arr = array_combine($farzaa_cat_id, $farzaa_cat_name);
        return $farzaa_cat_arr;
    }
    farzaa_get_product_category();
}
function cbtoolkit_customizer_panels_sections($wp_customize)
{
    /**
     * selective refresh
     */
    /**
     * header 01
     */

    $wp_customize->selective_refresh->add_partial('cbtoolkit_topbar_switch_partial', array(
        'selector' => '.header.header-inner',
        'settings' => 'cbtoolkit_topbar_switch',
        'render_callback' => function () {
            return get_theme_mod('cbtoolkit_topbar_switch');
        }
    ));

    /**
     * Breadcrumb partial
     */
    $wp_customize->selective_refresh->add_partial('breadcrumb_buttonset_partial', array(
        'selector' => '.farzaa-breadcrumb-area.breadcrumb_overlay .breadcrumb-section',
        'settings' => 'breadcrumb_buttonset',
        'render_callback' => function () {
            return get_theme_mod('breadcrumb_buttonset');
        }
    ));
    /**
     * customizer panel
     */
    $wp_customize->add_panel('cbgeneral_widget', [
        'priority'    => 10,
        'title' => __('CB Widgets', 'cb-toolkit'),
        'description' => __('You can customize the CB widgets.', 'cb-toolkit'),
    ]);
    /**
     * Customizer Section
     */
    $sections = array(
        '_social_list_section' => array(
            esc_attr__('Social List', 'cb-toolkit'),
            esc_attr__('You can customize the social list widget description.', 'cb-toolkit')
        )
    );
    foreach ($sections as $section_id => $section) {
        $section_args = array(
            'title' => $section[0],
            'description' => $section[1],
            'panel' => 'cbgeneral_widget',
            'capability'  => 'edit_theme_options'
        );
        if (isset($section[2])) {
            $section_args['type'] = $section[2];
        }
        $wp_customize->add_section(str_replace('-', '_', $section_id), $section_args);
    }
    $wp_customize->add_section('theme_essential_setting', [
        'title'       => __('Essential Setting', 'cb-toolkit'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
    ]);

    $wp_customize->add_section('section_header_settings', [
        'title'       => __('Header Setting', 'cb-toolkit'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => __('Blog Setting', 'cb-toolkit'),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
    ]);

    $wp_customize->add_section('header_side_setting', [
        'title'       => __('Side Info', 'cb-toolkit'),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
    ]);

    $wp_customize->add_section('breadcrumb_setting', [
        'title'       => __('Breadcrumb Setting', 'cb-toolkit'),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
    ]);

    $wp_customize->add_section('footer_setting', [
        'title'       => __('Footer Settings', 'cb-toolkit'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
    ]);

    $wp_customize->add_section('color_setting', [
        'title'       => __('Color Setting', 'cb-toolkit'),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
    ]);

    $wp_customize->add_section('404_page', [
        'title'       => __('404 Page', 'cb-toolkit'),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
    ]);

    $wp_customize->add_section('typo_setting', [
        'title'       => __('Typography Setting', 'cb-toolkit'),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
    ]);

    $wp_customize->add_section('slug_setting', [
        'title'       => __('Slug Settings', 'cb-toolkit'),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
    ]);
}

add_action('customize_register', 'cbtoolkit_customizer_panels_sections');


function _theme_essential_fields($fields)
{
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_preloader',
        'label'    => __('Preloader On/Off', 'cb-toolkit'),
        'section'  => 'theme_essential_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_search',
        'label'    => __('Serach On/Off', 'cb-toolkit'),
        'section'  => 'theme_essential_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_backtotop',
        'label'    => __('Back To Top On/Off', 'cb-toolkit'),
        'section'  => 'theme_essential_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
    ];


    return $fields;
}
add_filter('kirki/fields', '_theme_essential_fields');

/*
Header Settings
 */
function _header_fields($fields)
{


    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => __('Select Header Style', 'cb-toolkit'),
        'section'     => 'section_header_settings',
        'placeholder' => esc_attr__('Select an option...', 'cb-toolkit'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.jpg',
        ],
        'default'     => 'header-style-1',
    ];
    // header 1 main nav
    $fields[] = [
        'type'     => 'Radio_Buttonset',
        'settings' => 'cbtoolkit_header_main_switch_1',
        'label'    => __('Header Customize', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'default'  => 'content',
        'priority' => 10,
        'choices'     => [
            'content'   => __('Content', 'cb-toolkit'),
            'style' => __('Style', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'Radio_Buttonset',
        'settings' => 'cbtoolkit_header_main_logoset_1',
        'label'    => __('Logo Variant', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'default'  => 'image',
        'priority' => 10,
        'choices'     => [
            'image'   => __('Image', 'cb-toolkit'),
            'text' => __('Text', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ]
        ],
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo_image1',
        'description' => __('Upload a Logo.', 'cb-toolkit'),
        'section'     => 'section_header_settings',
        'default'     => get_template_directory_uri() . '/assets/img/logo.png',
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_logoset_1',
                'operator' => '==',
                'value'    => 'image',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ]
        ],
    ];
    $fields[] = [
        'type'        => 'text',
        'settings'    => 'logo_text1',
        'description' => __('Upload logo text', 'cb-toolkit'),
        'section'     => 'section_header_settings',
        'default'     => __('Ayaa', 'cb-toolkit'),
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_logoset_1',
                'operator' => '==',
                'value'    => 'text',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ]
        ],
    ];
    $fields[] = [
        'type'        => 'slider',
        'settings'    => 'logo_size_1',
        'description' => __('Logo Size', 'cb-toolkit'),
        'section'     => 'section_header_settings',
        'choices'     => [
            'min'  => 120,
            'max'  => 200,
            'step' => 6,
        ],
        'default' => 120,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_logoset_1',
                'operator' => '==',
                'value'    => 'image',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'Radio_Buttonset',
        'settings' => 'cbtoolkit_header_right_buttonset_1',
        'label'    => __('Header Right Customize', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'default'  => 'content',
        'priority' => 10,
        'choices'     => [
            'content'   => __('Content', 'cb-toolkit'),
            'style' => __('Style', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side_support_number_text_1',
        'label'    => __('Support Number Text', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'default'  => __('(347) 619-3312', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'content',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side_support_number_link_1',
        'label'    => __('Support Number Link', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'default'  => __('+3476193312', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'content',
            ]
        ],
    ];
    
    $fields[] = [
        'type'     => 'header_btn_text',
        'settings' => 'cbtoolkit_header_btn_text',
        'label'    => __('Header Button Text', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'default'  => __('CONTACT US', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'content',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_header_btn_link',
        'label'    => __('Button Link', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'default'  => esc_attr__('/contact', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'content',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'color',
        'settings' => 'cbtoolkit_header_right_phone_text_color',
        'label'    => __('Phone Text Color', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'color',
        'settings' => 'cbtoolkit_header_right_phone_text_hover_color',
        'label'    => __('Phone Text Hover Color', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'color',
        'settings' => 'cbtoolkit_header_right_button_text_color',
        'label'    => __('Button Text Color', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'color',
        'settings' => 'cbtoolkit_header_right_button_bg_color',
        'label'    => __('Button BG Color', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'color',
        'settings' => 'cbtoolkit_header_right_button_text_hover_color',
        'label'    => __('Button Text Hover Color', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'color',
        'settings' => 'cbtoolkit_header_right_button_bg_hover_color',
        'label'    => __('Button BG Hover Color', 'cb-toolkit'),
        'section'  => 'section_header_settings',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'typography',
        'settings' => 'cbtoolkit_header_right_button_typography',
        'label'    => __('Button Typography', 'cb-toolkit'),
        'transport'   => 'auto',
        'section'  => 'section_header_settings',
        'priority' => 10,
        'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-style'      => '',
			'color'           => '',
			'font-size'       => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
			'text-align'      => '',
		],
        'output'      => [
			[
				'element' => '.apps-header-right-btn-114',
			],
		],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'typography',
        'settings' => 'cbtoolkit_header_right_number_typography',
        'label'    => __('Number Typography', 'cb-toolkit'),
        'transport'   => 'auto',
        'section'  => 'section_header_settings',
        'priority' => 10,
        'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-style'      => '',
			'color'           => '',
			'font-size'       => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
			'text-align'      => '',
		],
        'output'      => [
			[
				'element' => '.apps-header-right-phone-114',
			],
		],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'typography',
        'settings' => 'cbtoolkit_header_menu_item_typography',
        'label'    => __('Menu Item Typography', 'cb-toolkit'),
        'transport'   => 'auto',
        'section'  => 'section_header_settings',
        'priority' => 10,
        'default'     => [
			'font-family'     => '',
			'variant'         => '',
			'font-style'      => '',
			'color'           => '',
			'font-size'       => '',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
			'text-align'      => '',
		],
        'output'      => [
			[
				'element' => '.apps-header-nav-menu-114 ul li a',
			],
		],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_header_main_switch_1',
                'operator' => '==',
                'value'    => 'content',
            ],
            [
                'setting'  => 'cbtoolkit_header_main_right_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ],

            [
                'setting'  => 'cbtoolkit_header_right_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_fields');

function _cbwidget_customize($fields)
{
    $fields[] = array(
        'type' => 'repeater',
        'settings' => 'cbsocial_list_widget',
        'label' => __('Social List Widget', 'cb-toolkit'),
        'description' => __('You can set social icons.', 'cb-toolkit'),
        'section' => '_social_list_section',
        'fields' => array(
            'social_icon' => array(
                'type' => 'text',
                'label' => __('Icon', 'cb-toolkit'),
                'description' => __('You can set an icon. for example from font-awesome; "fab fa-facebook"', 'cb-toolkit'),
            ),

            'social_url' => array(
                'type' => 'url',
                'label' => __('URL', 'cb-toolkit'),
                'description' => __('You can set url for the item.', 'cb-toolkit'),
            )

        ),
    );
    return $fields;
}
add_filter('kirki/fields', '_cbwidget_customize');

/*
Header Side Info
 */
function _header_side_fields($fields)
{

    $fields[] = [
        'type'     => 'Radio_Buttonset',
        'settings' => 'cbtoolkit_side_buttonset',
        'label'    => __('Choose Side Info', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => 'side1',
        'priority' => 10,
        'choices'     => [
            'side1'   => __('Side Info 1', 'cb-toolkit'),
            'side2' => __('Side Info 2', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_topbar_switch_1',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'choose_default_header',
                'operator' => '==',
                'value'    => 'header-style-1',
            ]
        ],
    ];


    // side info settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'cbtoolkit_side_logo',
        'label'       => __('Side Logo', 'cb-toolkit'),
        'section'     => 'header_side_setting',
        'default'     => get_template_directory_uri() . '/assets/assets/img/mobile-logo.svg',
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_side_contact_switcher',
        'label'    => __('Side Contact Switcher', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side_contact_title',
        'label'    => __('Contact Title', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('Contact Info', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side_contact_address',
        'label'    => __('Contact Address', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('12/A, Mirnada City Tower, NYC', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side_contact_phone',
        'label'    => __('Phone Number', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('088889797697', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side_contact_phone_link',
        'label'    => __('Phone Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => esc_attr__('088889797697', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side_mail',
        'label'    => __('Email ID', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('admin@example.com', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side_mail_link',
        'label'    => __('Email Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => esc_attr__('admin@example.com', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_side_social_switcher',
        'label'    => __('Side Social Switcher', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side_social_fb_link',
        'label'    => __('Facebook Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => '#',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_social_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side_social_twitter_link',
        'label'    => __('Twitter Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => '#',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_social_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side_social_linkedin_link',
        'label'    => __('Linkedin Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => '#',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_social_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side_social_youtube_link',
        'label'    => __('Youtube Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => '#',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_social_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_side_cart_switcher',
        'label'    => __('Side Cart On/Off?', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_side_lang_switcher',
        'label'    => __('Side Language On/Off?', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side_btn_text',
        'label'    => __('Side Button Text', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('Contact Us', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side_btn_url',
        'label'    => __('Side Button URL', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => '#',
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_social_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side1',
            ]
        ],
    ];

    //side info 2
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_side2_cart_switcher',
        'label'    => __('Side Cart On/Off?', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_side2_wishlist_switcher',
        'label'    => __('Side Wishlist On/Off?', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_side2_contact_switcher',
        'label'    => __('Side Contact Switcher', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side2_contact_title',
        'label'    => __('Contact Title', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('Get In Touch', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side2_contact_address',
        'label'    => __('Contact Address', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('989 Bel Meadow Drive Los Angeles, CA 90017', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side2_contact_phone1',
        'label'    => __('Phone Number', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('(+1) 909-407-2988', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side2_contact_phone_link1',
        'label'    => __('Phone Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => esc_attr__('(+1)909-407-2988', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side2_contact_phone2',
        'label'    => __('Phone Number', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('(+1) 470-142-2412', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side2_contact_phone_link2',
        'label'    => __('Phone Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => esc_attr__('(+1)470-142-2412', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_side2_office_time',
        'label'    => __('Office Time', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => __('Mon - Sat : 8am - 5pm', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_contact_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_side2_social_switcher',
        'label'    => __('Side Social Switcher', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side2_social_fb_link',
        'label'    => __('Facebook Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => esc_attr__('#', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_social_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side2_social_twitter_link',
        'label'    => __('Twitter Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => esc_attr__('#', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_social_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side2_social_instagram_link',
        'label'    => __('Instagram Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => esc_attr__('#', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_social_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'URL',
        'settings' => 'cbtoolkit_side2_social_youtube_link',
        'label'    => __('Youtube Link', 'cb-toolkit'),
        'section'  => 'header_side_setting',
        'default'  => esc_attr__('#', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_side2_social_switcher',
                'operator' => '==',
                'value'    => true,
            ],
            [
                'setting'  => 'cbtoolkit_side_buttonset',
                'operator' => '==',
                'value'    => 'side2',
            ]
        ],
    ];


    return $fields;
}
add_filter('kirki/fields', '_header_side_fields');

/*
_header_page_title_fields
 */

function _header_page_title_fields($fields)
{

    $fields[] = [
        'type'     => 'Radio_Buttonset',
        'settings' => 'breadcrumb_buttonset',
        'label'    => __('Breadcrumb Customize', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'default'  => 'content',
        'priority' => 10,
        'choices'     => [
            'content'   => __('Content', 'cb-toolkit'),
            'style' => __('Style', 'cb-toolkit'),
        ],
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_title_blog',
        'label'    => __('Blog Title', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'default'  => __('Blog', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'content',
            ]
        ],
    ];

    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'breadcrumb_text_color',
        'label'       => __('Breadcrumb Text Color', 'cb-toolkit'),
        'description' => __('Choose any color for text', 'cb-toolkit'),
        'priority'    => 10,
        'section'     => 'breadcrumb_setting',
        'default'     => '#222222',
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'content',
            ]
        ],
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'breadcrumb_text_hover_color',
        'label'       => __('Breadcrumb Text Hover Color', 'cb-toolkit'),
        'description' => __('Choose any color for hover', 'cb-toolkit'),
        'priority'    => 10,
        'section'     => 'breadcrumb_setting',
        'default'     => '#fe5502',
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'content',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'typography',
        'settings' => 'breadcrumb_title_typography',
        'label'    => __('Breadcrumb Title Typography', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'priority' => 10,
        'default'     => [
            'font-family'    => 'Poppins',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '',
            'text-transform' => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.banner.banner-inner .breadcrumb-txt h1',
            ],
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'content',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'typography',
        'settings' => 'breadcrumb_text_typography',
        'label'    => __('Breadcrumb Text Typography', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'priority' => 10,
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '',
            'text-transform' => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.breadcrumb-trail.breadcrumbs > span a, nav.breadcrumb-trail.breadcrumbs > span',
            ],
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'content',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'Select',
        'settings' => 'breadcrumb_padding_select',
        'label'    => __('Section Padding', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'default'  => '',
        'priority' => 10,
        'choices'     => [
            'padding-top' => __('Padding Top', 'cb-toolkit'),
            'padding-bottom' => __('Padding Bottom', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'number',
        'settings' => 'breadcrumb_padding_top',
        'label'    => __('Padding Top', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'default'  => 62,
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_padding_select',
                'operator' => '==',
                'value'    => 'padding-top',
            ],
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'number',
        'settings' => 'breadcrumb_padding_bottom',
        'label'    => __('Padding Bottom', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'default'  => 65,
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_padding_select',
                'operator' => '==',
                'value'    => 'padding-bottom',
            ],
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'Select',
        'settings' => 'breadcrumb_background_select',
        'label'    => __('Background Options', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'default'  => 'background-image',
        'priority' => 10,
        'choices'     => [
            'background-image' => __('Background Image', 'cb-toolkit'),
            'background-color' => __('Background Color', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => __('Breadcrumb Background Image', 'cb-toolkit'),
        'description' => __('Breadcrumb Background Image', 'cb-toolkit'),
        'priority'    => 10,
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/images/inner-banner-bg.png',
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_background_select',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'breadcrumb_bg_img_ovelay_color',
        'label'       => __('Background Image Overlay', 'cb-toolkit'),
        'description' => __('Choose any color for overlay', 'cb-toolkit'),
        'priority'    => 10,
        'section'     => 'breadcrumb_setting',
        'default'     => '',
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_background_select',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'        => 'text',
        'settings'    => 'breadcrumb_bg_img_ovelay_color_opacity',
        'label'       => __('Background Image Overlay Opacity', 'cb-toolkit'),
        'description' => __('Type value from 0.1 to max value 1', 'cb-toolkit'),
        'priority'    => 10,
        'section'     => 'breadcrumb_setting',
        'default'     => '0',
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_background_select',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'Select',
        'settings' => 'breadcrumb_background_position_select',
        'label'    => __('Background Image Position', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'default'  => 'center center',
        'priority' => 10,
        'choices'     => [
            'center center' => __('Center Center', 'cb-toolkit'),
            'center top' => __('Center Top', 'cb-toolkit'),
            'center bottom' => __('Center Bottom', 'cb-toolkit'),
            'right center' => __('Right Center', 'cb-toolkit'),
            'right top' => __('Right Top', 'cb-toolkit'),
            'right bottom' => __('Right Bottom', 'cb-toolkit'),
            'left center' => __('Left Center', 'cb-toolkit'),
            'left top' => __('Left Top', 'cb-toolkit'),
            'left bottom' => __('Left Bottom', 'cb-toolkit'),
            '100% 100%' => __('100% 100%', 'cb-toolkit'),
            '50% 50%' => __('50% 50%', 'cb-toolkit'),
            'initial' => __('Initial', 'cb-toolkit'),
            'inherit' => __('Inherit', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_background_select',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'Select',
        'settings' => 'breadcrumb_background_size_select',
        'label'    => __('Background Image Size', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'default'  => 'cover',
        'priority' => 10,
        'choices'     => [
            'cover' => __('Cover', 'cb-toolkit'),
            'contain' => __('Contain', 'cb-toolkit'),
            'auto' => __('Auto', 'cb-toolkit'),
            '100% 100%' => __('100% 100%', 'cb-toolkit'),
            '50% 50%' => __('50% 50%', 'cb-toolkit'),
            'initial' => __('Initial', 'cb-toolkit'),
            'inherit' => __('Inherit', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_background_select',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'Select',
        'settings' => 'breadcrumb_background_blendmode_select',
        'label'    => __('Background Image Blendmode', 'cb-toolkit'),
        'section'  => 'breadcrumb_setting',
        'default'  => 'normal',
        'priority' => 10,
        'choices'     => [
            'normal' => __('Normal', 'cb-toolkit'),
            'multiply' => __('Multiply', 'cb-toolkit'),
            'overlay' => __('Overlay', 'cb-toolkit'),
            'darken' => __('Darken', 'cb-toolkit'),
            'lighten' => __('Lighten', 'cb-toolkit'),
            'color-dodge' => __('Color-dodge', 'cb-toolkit'),
            'saturation' => __('Saturation', 'cb-toolkit'),
            'color' => __('Color', 'cb-toolkit'),
            'luminosity' => __('Luminosity', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_background_select',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'breadcrumb_bg_color',
        'label'       => __('Breadcrumb BG Color', 'cb-toolkit'),
        'description' => __('This is a Breadcrumb bg color control.', 'cb-toolkit'),
        'section'     => 'breadcrumb_setting',
        'default'     => '#F8F8F8',
        'priority'    => 10,
        'active_callback' => [
            [
                'setting'  => 'breadcrumb_background_select',
                'operator' => '==',
                'value'    => 'background-color',
            ],
            [
                'setting'  => 'breadcrumb_buttonset',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields)
{
    // Blog Setting

    $fields[] = [
        'type' => 'radio-buttonset',
        'settings' => 'cbblog_layout',
        'label' => __('Layout', 'cb-toolkit'),
        'description' => __('You can choose a layout.', 'cb-toolkit'),
        'section' => 'blog_setting',
        'default' => 'right-sidebar',
        'choices' => array(
            'left-sidebar' => __('Left Sidebar', 'cb-toolkit'),
            'full-width' => __('Full Width', 'cb-toolkit'),
            'right-sidebar' => __('Right Sidebar', 'cb-toolkit'),
        ),
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_blog_btn_switch',
        'label'    => __('Blog BTN On/Off', 'cb-toolkit'),
        'section'  => 'blog_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_blog_meta_switch',
        'label'    => __('Blog Meta On/Off', 'cb-toolkit'),
        'section'  => 'blog_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_blog_author_switch',
        'label'    => __('Blog Author Meta On/Off', 'cb-toolkit'),
        'section'  => 'blog_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_blog_meta_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ]
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_blog_date_switch',
        'label'    => __('Blog Date Meta On/Off', 'cb-toolkit'),
        'section'  => 'blog_setting',
        'default'  => 0,
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_blog_meta_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ]
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'cbtoolkit_blog_comments_switch',
        'label'    => __('Blog Comments Meta On/Off', 'cb-toolkit'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => __('Enable', 'cb-toolkit'),
            'off' => __('Disable', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'cbtoolkit_blog_meta_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ]
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_blog_btn_text',
        'label'    => __('Blog Button text', 'cb-toolkit'),
        'section'  => 'blog_setting',
        'default'  => __('Read More', 'cb-toolkit'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields)
{
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => __('Choose Footer Style', 'cb-toolkit'),
        'section'     => 'footer_setting',
        'default'     => 'footer-style-1',
        'placeholder' => esc_attr__('Select an option...', 'cb-toolkit'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.jpg'
        ],
        'default'     => 'footer-style-1',
    ];
    /*
    cmt_section_footer_1: start section Footer 1
    */
    $fields[] = [
        'type'     => 'Radio_Buttonset',
        'settings' => 'footer_buttonset_1',
        'label'    => __('footer Customize', 'cb-toolkit'),
        'section'  => 'footer_setting',
        'default'  => 'content',
        'priority' => 10,
        'choices'     => [
            'content'   => __('Content', 'cb-toolkit'),
            'style' => __('Style', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '==',
                'value'    => 'footer-style-1',
            ],
        ],
    ];
    $fields[] = [
        'type'     => 'Select',
        'settings' => 'footer_background_select_1',
        'label'    => __('Background Options', 'cb-toolkit'),
        'section'  => 'footer_setting',
        'default'  => 'background-image',
        'priority' => 10,
        'choices'     => [
            'background-image' => __('Background Image', 'cb-toolkit'),
            'background-color' => __('Background Color', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '==',
                'value'    => 'footer-style-1',
            ],
            [
                'setting'  => 'footer_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'footer_bg_image_1',
        'label'       => __('Footer Background Image.', 'cb-toolkit'),
        'description' => __('Footer Background Image.', 'cb-toolkit'),
        'default'     => '',
        'section'     => 'footer_setting',
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '==',
                'value'    => 'footer-style-1',
            ],
            [
                'setting'  => 'footer_background_select_1',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'footer_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ]
        ],
    ];
    $fields[] = [
        'type'     => 'Select',
        'settings' => 'footer_background_size_1',
        'label'    => __('Background Size', 'cb-toolkit'),
        'section'  => 'footer_setting',
        'default'  => 'cover',
        'priority' => 10,
        'choices'     => [
            'cover' => __('Cover', 'cb-toolkit'),
            'auto' => __('Auto', 'cb-toolkit'),
            'contain' => __('Contain', 'cb-toolkit'),
            'inherit' => __('Inherit', 'cb-toolkit'),
            'initial' => __('Initial', 'cb-toolkit'),
            'revert' => __('Revert', 'cb-toolkit'),
            'unset' => __('Unset', 'cb-toolkit'),
            '100% 100%' => __('100% 100%', 'cb-toolkit'),
            '50% 50%' => __('50% 50%', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '==',
                'value'    => 'footer-style-1',
            ],
            [
                'setting'  => 'footer_background_select_1',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'footer_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ],
        ],
    ];
    $fields[] = [
        'type'     => 'Select',
        'settings' => 'footer_background_position_select_1',
        'label'    => __('Background Image Position', 'cb-toolkit'),
        'section'  => 'footer_setting',
        'default'  => 'center center',
        'priority' => 10,
        'choices'     => [
            'center center' => __('Center Center', 'cb-toolkit'),
            'center top' => __('Center Top', 'cb-toolkit'),
            'center bottom' => __('Center Bottom', 'cb-toolkit'),
            'right center' => __('Right Center', 'cb-toolkit'),
            'right top' => __('Right Top', 'cb-toolkit'),
            'right bottom' => __('Right Bottom', 'cb-toolkit'),
            'left center' => __('Left Center', 'cb-toolkit'),
            'left top' => __('Left Top', 'cb-toolkit'),
            'left bottom' => __('Left Bottom', 'cb-toolkit'),
            '100% 100%' => __('100% 100%', 'cb-toolkit'),
            '50% 50%' => __('50% 50%', 'cb-toolkit'),
            'initial' => __('Initial', 'cb-toolkit'),
            'inherit' => __('Inherit', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '==',
                'value'    => 'footer-style-1',
            ],
            [
                'setting'  => 'footer_background_select_1',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'footer_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ],
        ],
    ];
    $fields[] = [
        'type'     => 'Select',
        'settings' => 'footer_background_blendmode_select_1',
        'label'    => __('Background Image Blendmode', 'cb-toolkit'),
        'section'  => 'footer_setting',
        'default'  => 'normal',
        'priority' => 10,
        'choices'     => [
            'normal' => __('Normal', 'cb-toolkit'),
            'multiply' => __('Multiply', 'cb-toolkit'),
            'overlay' => __('Overlay', 'cb-toolkit'),
            'darken' => __('Darken', 'cb-toolkit'),
            'lighten' => __('Lighten', 'cb-toolkit'),
            'color-dodge' => __('Color-dodge', 'cb-toolkit'),
            'saturation' => __('Saturation', 'cb-toolkit'),
            'color' => __('Color', 'cb-toolkit'),
            'luminosity' => __('Luminosity', 'cb-toolkit'),
        ],
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '==',
                'value'    => 'footer-style-1',
            ],
            [
                'setting'  => 'footer_background_select_1',
                'operator' => '==',
                'value'    => 'background-image',
            ],
            [
                'setting'  => 'footer_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ],
        ],
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'cbtoolkit_footer_bg_color_1',
        'label'       => __('Footer BG Color', 'cb-toolkit'),
        'description' => __('This is a Footer bg color control.', 'cb-toolkit'),
        'section'     => 'footer_setting',
        'default'     => __('#003959', 'cb-toolkit'),
        'priority'    => 10,
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '==',
                'value'    => 'footer-style-1',
            ],
            [
                'setting'  => 'footer_background_select_1',
                'operator' => '==',
                'value'    => 'background-color',
            ],
            [
                'setting'  => 'footer_buttonset_1',
                'operator' => '==',
                'value'    => 'style',
            ],
        ],
    ];
    
    $fields[] = [
        'type'     => 'repeater',
        'settings' => 'cbtoolkit_footer_top_repeater',
        'label'    => __('Footer Top Repeater', 'cb-toolkit'),
        'section'  => 'footer_setting',
        'priority' => 10,
        'fields'   => [
			'repeater_image'   => [
				'type'        => 'image',
				'label'       => esc_html__( 'Repeater Image', 'cb-toolkit' ),
				'default'     => '',
			],
			'repeater_label'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Repeater Label', 'cb-toolkit' ),
				'description' => esc_html__( 'please insert repeater label', 'cb-toolkit' ),
				'default'     => '',
			],
			'repeater_url'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Repeater URL', 'cb-toolkit' ),
				'description' => esc_html__( 'Please insert repeater url', 'cb-toolkit' ),
				'default'     => '',
			],
			'repeater_url_target' => [
				'type'        => 'select',
				'label'       => esc_html__( 'Repeater URL Target', 'cb-toolkit' ),
				'description' => esc_html__( 'Repeater URL Target', 'cb-toolkit' ),
				'default'     => '_self',
				'choices'     => [
					'_blank' => esc_html__( 'New Window', 'cb-toolkit' ),
					'_self'  => esc_html__( 'Same Frame', 'cb-toolkit' ),
				],
			],
		],
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '==',
                'value'    => 'footer-style-1',
            ],
            [
                'setting'  => 'footer_buttonset_1',
                'operator' => '==',
                'value'    => 'content',
            ],
        ],
    ];
    
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_copyright_1',
        'label'    => __('Copyright text', 'cb-toolkit'),
        'section'  => 'footer_setting',
        'default'  => __('Copyright © 2023 I Wadi Al Bada I All Rights Reserved', 'cb-toolkit'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'choose_default_footer',
                'operator' => '==',
                'value'    => 'footer-style-1',
            ],
            [
                'setting'  => 'footer_buttonset_1',
                'operator' => '==',
                'value'    => 'content',
            ],
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_footer_fields');

// color
function cbtoolkit_color_fields($fields)
{
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'cbtoolkit_color_option',
        'label'       => __('Theme Color', 'cb-toolkit'),
        'description' => __('This is a Theme color control.', 'cb-toolkit'),
        'section'     => 'color_setting',
        'default'     => '#122E00',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', 'cbtoolkit_color_fields');

// 404
function cbtoolkit_404_fields($fields)
{
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'cbtoolkit_error_404_image',
        'description' => __('Upload Error Image.', 'cb-toolkit'),
        'section'     => '404_page',
        'default'     => get_template_directory_uri() . '/assets/images/error.png',
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_error_title',
        'label'    => __('Page not found', 'cb-toolkit'),
        'section'  => '404_page',
        'default'  => __('Page not found', 'cb-toolkit'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'cbtoolkit_error_desc',
        'label'    => __('404 Description Text', 'cb-toolkit'),
        'section'  => '404_page',
        'default'  => __('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'cb-toolkit'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_error_link_text',
        'label'    => __('404 Link Text', 'cb-toolkit'),
        'section'  => '404_page',
        'default'  => __('Back To Home', 'cb-toolkit'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'cbtoolkit_404_fields');




/**
 * Added Fields
 */
function cbtoolkit_slug_setting($fields)
{
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_portfolio_slug',
        'label'    => __('Portfolio Slug', 'cb-toolkit'),
        'section'  => 'slug_setting',
        'default'  => __('ourportfolio', 'cb-toolkit'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_service_slug',
        'label'    => __('Service Slug', 'cb-toolkit'),
        'section'  => 'slug_setting',
        'default'  => __('ourservice', 'cb-toolkit'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'cbtoolkit_member_slug',
        'label'    => __('Member Slug', 'cb-toolkit'),
        'section'  => 'slug_setting',
        'default'  => __('ourmember', 'cb-toolkit'),
        'priority' => 10,
    ];

    return $fields;
}

add_filter('kirki/fields', 'cbtoolkit_slug_setting');

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function cbtoolkit_THEME_option($name)
{
    $value = '';
    if (class_exists('cb-toolkit')) {
        $value = Kirki::get_option(cbtoolkit_get_theme(), $name);
    }

    return apply_filters('cbtoolkit_THEME_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function cbtoolkit_get_theme()
{
    return 'cbtoolkit';
}
