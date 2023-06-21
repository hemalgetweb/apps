<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use ELementor\Repeater;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * CB Core Demo
 *
 * CB Core widget for Demo.
 *
 * @since 1.0.0
 */
class CB_Core_About extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'cb-about';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('CB About', 'cb-core');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-post-list';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['cb-cat'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['cb-core'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_select_layout',
            [
                'label' => __('Layout', 'cb-core'),
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __('Layout', 'cb-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => __('Layout 1', 'cb-core'),
                    'layout-2' => __('Layout 2', 'cb-core'),
                    'layout-3' => __('Layout 3', 'cb-core'),
                    'layout-4' => __('Layout 4', 'cb-core'),
                    'layout-5' => __('Layout 5', 'cb-core'),
                    'layout-6' => __('Layout 6', 'cb-core'),
                    'layout-7' => __('Layout 7', 'cb-core'),
                ],
                'default' => 'layout-1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_section_about_content',
            [
                'label' => __('About Content', 'cb_core'),
            ]
        );
        $this->add_control(
            'about_image',
            [
                'label'   => __('About Image', 'cb-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7']
                ]
            ]
        );
        $this->add_control(
        'about_subtitle',
         [
            'label'       => esc_html__( 'About Subtitle', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( 'Why Us', 'cb-core' ),
            'placeholder' => esc_html__( 'About Subtitle', 'cb-core' ),
            'label_block' => true,
            'condition' => [
                'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7']
            ]
         ]
        );
        $this->add_control(
        'about_title',
         [
            'label'       => esc_html__( 'About Title', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( 'Dubai’s Top Custom eCommerce Web Development Agency', 'cb-core' ),
            'placeholder' => esc_html__( 'About Title', 'cb-core' ),
            'label_block' => true,
            'condition' => [
                'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7']
            ]
         ]
        );
        $this->add_control(
            'about_title_secondary',
             [
                'label'       => esc_html__( 'About Title 2', 'cb-core' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'How do we do it for you?', 'cb-core' ),
                'placeholder' => esc_html__( 'About Title 2', 'cb-core' ),
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-5']
                ]
             ]
            );
        $this->add_control(
        'about_desc',
         [
            'label'       => esc_html__( 'About Description', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'placeholder' => esc_html__( 'About Description', 'cb-core' ),
            'label_block' => true,
            'condition' => [
                'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7']
            ]
         ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field Condition', 'cb-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'style-1'  => __('Style 1', 'cb-core'),
                    'style-2'  => __('Style 2', 'cb-core'),
                    'style-3'  => __('Style 3', 'cb-core'),
                    'style-4'  => __('Style 4', 'cb-core'),
                    'style-5'  => __('Style 5', 'cb-core'),
                    'style-6'  => __('Style 6', 'cb-core'),
                    'style-7'  => __('Style 7', 'cb-core'),
                ],
                'default' => 'style-1'
            ]
        );
        /**
         * Repeater title style
         */
        $repeater->add_control(
			'repeater_color_control',
			[
				'label' => esc_html__( 'Title Styles', 'cb-core' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => esc_html__( 'Default', 'cb-core' ),
				'label_on' => esc_html__( 'Custom', 'cb-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition' => [
                    'field_condition' => ['style-7']
                ]
			]
		);
		$repeater->start_popover();
        $repeater->add_control(
         '_repeater_title_color',
         [
           'label'       => esc_html__( 'Title Color', 'cb-core' ),
           'type'     => \Elementor\Controls_Manager::COLOR,
           'selectors' => [
            '{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-title' => 'color: {{VALUE}}',
           ],
           'condition' => [
                'field_condition' => ['style-7']
            ]
         ]
        );
       
        $repeater->add_responsive_control(
			'_repeater_title_control_padding',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Title Padding', 'cb-core' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' => [
                    'field_condition' => ['style-7']
                ]
			]
		);
        $repeater->add_responsive_control(
			'_repeater_title_control_margin',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Title Margin', 'cb-core' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' => [
                    'field_condition' => ['style-7']
                ]
			]
		);
        $repeater->add_control(
			'_repeater_title_control_alignment',
			[
				'label' => esc_html__( 'Title Alignment', 'cb-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'cb-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'cb-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'cb-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
                'condition' => [
                    'field_condition' => ['style-7']
                ],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-title' => 'text-align: {{VALUE}};',
				],
			]
		);
        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
              'name' => '_repeater_title_control_typo',
              'label'   => esc_html__( 'Title Typography', 'cb-core' ),
              'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-title',
              'condition' => [
                    'field_condition' => ['style-7']
                ],
            ]
          );
		$repeater->end_popover();



        /**
         * Repeater content style
         */
        $repeater->add_control(
			'repeater_content_color_control',
			[
				'label' => esc_html__( 'Content Styles', 'cb-core' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => esc_html__( 'Default', 'cb-core' ),
				'label_on' => esc_html__( 'Custom', 'cb-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition' => [
                    'field_condition' => ['style-7']
                ]
			]
		);
		$repeater->start_popover();
        $repeater->add_control(
         '_repeater_content_color',
         [
           'label'       => esc_html__( 'Content Color', 'cb-core' ),
           'type'     => \Elementor\Controls_Manager::COLOR,
           'selectors' => [
            '{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-content p' => 'color: {{VALUE}}',
           ],
           'condition' => [
                'field_condition' => ['style-7']
            ]
         ]
        );
       
        $repeater->add_responsive_control(
			'_repeater_content_control_padding',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Content Padding', 'cb-core' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' => [
                    'field_condition' => ['style-7']
                ]
			]
		);
        $repeater->add_responsive_control(
			'_repeater_content_control_margin',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Content Margin', 'cb-core' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' => [
                    'field_condition' => ['style-7']
                ]
			]
		);
        $repeater->add_control(
			'_repeater_content_control_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'cb-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'cb-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'cb-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'cb-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
                'condition' => [
                    'field_condition' => ['style-7']
                ],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-content p' => 'text-align: {{VALUE}};',
				],
			]
		);
        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
              'name' => '_repeater_content_control_typo',
              'label'   => esc_html__( 'Content Typography', 'cb-core' ),
              'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .cb-core-repeater-content p',
              'condition' => [
                    'field_condition' => ['style-7']
                ],
            ]
          );
		$repeater->end_popover();
        
        $repeater->add_control(
            'list_item_image',
            [
            'label'   => esc_html__( 'List Item Image', 'cb-core' ),
            'type'    => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                  'url' => \Elementor\Utils::get_placeholder_image_src(),
              ],
              'condition' => [
                    'field_condition' => ['style-1', 'style-6', 'style-7']
                ]
            ]
        );
        $repeater->add_control(
            'list_item_text',
            [
                'label'   => __('List Item Text', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Custom Design & Development', 'cb-core'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style-1', 'style-3', 'style-5', 'style-6', 'style-7']
                ]
            ]
        );
        $repeater->add_control(
         'list_item_desc',
         [
           'label'       => esc_html__( 'List Item Description', 'cb-core' ),
           'type'        => \Elementor\Controls_Manager::TEXTAREA,
           'rows'        => 10,
           'placeholder' => esc_html__( 'List Item Description', 'cb-core' ),
           'condition' => [
                'field_condition' => ['style-6', 'style-7']
            ]
         ]
        );
        $this->add_control(
            'slides',
            [
                'label'       => __('List Repeater', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'repeater_list_item'   => __('Orders go right to your restaurant', 'cb-core'),
                    ],
                    [
                        'repeater_list_item'   => __('Provide in-person pickup, & delivery', 'cb-core'),
                    ],
                    [
                        'repeater_list_item'   => __('Offer in-person diners self serve', 'cb-core'),
                    ],
                ],
                'title_field' => '{{{ repeater_list_item }}}',
            ]
        );
       
       $repeater = new \Elementor\Repeater();
       $repeater->add_control(
        'field_condition_2',
        [
          'label'   => esc_html__( 'Field Condition', 'cb-core' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'options' => [
            'style-1'  => esc_html__( 'Style 1', 'cb-core' ),
            'style-2'  => esc_html__( 'Style 2', 'cb-core' ),
            'style-3'  => esc_html__( 'Style 3', 'cb-core' ),
            'style-4'  => esc_html__( 'Style 4', 'cb-core' ),
            'style-5'  => esc_html__( 'Style 5', 'cb-core' ),
            'style-6'  => esc_html__( 'Style 6', 'cb-core' )
          ],
          'default' => 'style-3',
        ]
       );
        $repeater->add_control(
        'list_title',
          [
            'label'   => esc_html__( 'List Title', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( 'Default-value', 'cb-core' ),
            'label_block' => true,
            'condition' => [
                'field_condition_2' => ['style-3', 'style-6']
            ]
          ]
        );
        $repeater->add_control(
        'list_count',
          [
            'label'   => esc_html__( 'List Count', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::NUMBER,
            'label_block' => true,
            'default' => 30,
            'condition' => [
                'field_condition_2' => ['style-6']
            ]
          ]
        );
        
        $this->add_control(
          'slides_2',
          [
            'label'       => esc_html__( 'List 2', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ list_title }}}',
          ]
        );
        $this->end_controls_section();
       /**
        * Section Title
        */
        $this->start_controls_section(
            '_section_title_area',
            [
                'label' => esc_html__( 'Section Title', 'cb-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'_title_control_heading',
			[
				'label' => esc_html__( 'Title', 'cb-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
                'condition' => [
                    'layout' => ['layout-7']
                ]
			]
		);
        $this->add_control(
         '_title_control_color',
         [
           'label'       => esc_html__( 'Title Color', 'cb-core' ),
           'type'     => \Elementor\Controls_Manager::COLOR,
           'selectors' => [
           '{{WRAPPER}} .cb-core-title' => 'color: {{VALUE}}',
           ],
           'condition' => [
                'layout' => ['layout-7']
            ]
         ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
              'name' => '_title_control_typo',
              'label'   => esc_html__( 'Title Typography', 'cb-core' ),
              'selector' => '{{WRAPPER}} .cb-core-title',
              'condition' => [
                    'layout' => ['layout-7']
                ]
            ]
        );
        $this->add_responsive_control(
			'_title_control_padding',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Title Padding', 'cb-core' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .cb-core-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' => [
                    'layout' => ['layout-7']
                ]
			]
		);
        $this->add_responsive_control(
			'_title_control_margin',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Title Margin', 'cb-core' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .cb-core-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' => [
                    'layout' => ['layout-7']
                ]
			]
		);
        $this->add_control(
			'_title_control_alignment',
			[
				'label' => esc_html__( 'Title Alignment', 'cb-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'cb-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'cb-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'cb-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
                'condition' => [
                    'layout' => ['layout-7']
                ],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .cb-core-title' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_control(
            '_section_heading_transform_controls',
            [
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label' => esc_html__( 'Title Filter', 'cb-core' ),
                'label_off' => esc_html__( 'Default', 'cb-core' ),
                'label_on' => esc_html__( 'Custom', 'cb-core' ),
                'return_value' => 'yes',
            ]
        );
        $this->start_popover();
        $this->add_control(
			'_seection_heading_rotate',
			[
				'label' => esc_html__( 'Rotate', 'cb-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
                'condition' => [
                    'layout' => ['layout-7']
                ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .cb-core-title' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);
        $this->end_popover();
        $this->end_controls_section();
        /**
        * Section Sub Title
        */
        $this->start_controls_section(
            '_section_subtitle_area',
            [
                'label' => esc_html__( 'Section Subtitle', 'cb-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            '_subtitle_control_heading',
            [
                'label' => esc_html__( 'Sub Title', 'cb-core' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'layout' => ['layout-7']
                ]
            ]
        );
        $this->add_control(
            '_subtitle_control_color',
            [
            'label'       => esc_html__( 'SubTitle Color', 'cb-core' ),
            'type'     => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            '{{WRAPPER}} .cb-core-subtitle' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'layout' => ['layout-7']
            ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => '_subtitle_control_typo',
                'label'   => esc_html__( 'SubTitle Typography', 'cb-core' ),
                'selector' => '{{WRAPPER}} .cb-core-subtitle',
                'condition' => [
                    'layout' => ['layout-7']
                ]
            ]
        );
        $this->add_responsive_control(
            '_subtitle_control_padding',
            [
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'SubTitle Padding', 'cb-core' ),
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .cb-core-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'layout' => ['layout-7']
                ]
            ]
        );
        $this->add_responsive_control(
            '_subtitle_control_margin',
            [
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'SubTitle Margin', 'cb-core' ),
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .cb-core-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'layout' => ['layout-7']
                ]
            ]
        );
        $this->add_control(
            '_subtitle_control_alignment',
            [
                'label' => esc_html__( 'SubTitle Alignment', 'cb-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'cb-core' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'cb-core' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'cb-core' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'condition' => [
                    'layout' => ['layout-7']
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .cb-core-subtitle' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            '_section_subtitle_transform_controls',
            [
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label' => esc_html__( 'SubTitle Filter', 'cb-core' ),
                'label_off' => esc_html__( 'Default', 'cb-core' ),
                'label_on' => esc_html__( 'Custom', 'cb-core' ),
                'return_value' => 'yes',
            ]
        );
        $this->start_popover();
        $this->add_control(
            '_seection_subtitle_rotate',
            [
                'label' => esc_html__( 'Rotate', 'cb-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'condition' => [
                    'layout' => ['layout-7']
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'deg',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cb-core-subtitle' => 'transform: rotate({{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->end_popover();
        $this->end_controls_section();
        /**
        * Section Content
        */
        $this->start_controls_section(
            '_section_content_area',
            [
                'label' => esc_html__( 'Section content', 'cb-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            '_content_control_heading',
            [
                'label' => esc_html__( 'Content', 'cb-core' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'layout' => ['layout-7']
                ]
            ]
        );
        $this->add_control(
            '_content_control_color',
            [
            'label'       => esc_html__( 'Content Color', 'cb-core' ),
            'type'     => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            '{{WRAPPER}} .cb-core-content > p' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'layout' => ['layout-7']
            ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => '_content_control_typo',
                'label'   => esc_html__( 'Content Typography', 'cb-core' ),
                'selector' => '{{WRAPPER}} .cb-core-content > p',
                'condition' => [
                    'layout' => ['layout-7']
                ]
            ]
        );
        $this->add_responsive_control(
            '_content_control_padding',
            [
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Content Padding', 'cb-core' ),
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .cb-core-content > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'layout' => ['layout-7']
                ]
            ]
        );
        $this->add_responsive_control(
            '_content_control_margin',
            [
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Content Margin', 'cb-core' ),
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .cb-core-content > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'layout' => ['layout-7']
                ]
            ]
        );
        $this->add_control(
            '_content_control_alignment',
            [
                'label' => esc_html__( 'Content Alignment', 'cb-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'cb-core' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'cb-core' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'cb-core' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'condition' => [
                    'layout' => ['layout-7']
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .cb-core-content > p' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            '_section_content_transform_controls',
            [
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label' => esc_html__( 'Content Filter', 'cb-core' ),
                'label_off' => esc_html__( 'Default', 'cb-core' ),
                'label_on' => esc_html__( 'Custom', 'cb-core' ),
                'return_value' => 'yes',
            ]
        );
        $this->start_popover();
        $this->add_control(
            '_seection_content_rotate',
            [
                'label' => esc_html__( 'Rotate', 'cb-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'condition' => [
                    'layout' => ['layout-7']
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'deg',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cb-core-content > p' => 'transform: rotate({{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->end_popover();
        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings(); ?>

        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
    }
}

Plugin::instance()->widgets_manager->register(new CB_Core_About());
