<?php

namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * CB Core Demo
 *
 * CB Core widget for Demo.
 *
 * @since 1.0.0
 */
class CB_Core_Heading extends Widget_Base
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
        return 'cb-heading';
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
        return __('CB Heading', 'cb-core');
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
                ],
                'default' => 'layout-1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_section_heading_content',
            [
                'label' => __('Heading Content', 'cb-core'),
            ]
        );
        $this->add_control(
            'heading_subtitle',
            [
                'label' => esc_html__('Heading Subtitle', 'cb-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Heading Subtitle', 'cb-core'),
                'placeholder' => esc_html__('', 'cb-core'),
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-1', 'layout-2']
                ]
            ]
        );
        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__('Heading Title', 'cb-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Heading Title', 'cb-core'),
                'placeholder' => esc_html__('', 'cb-core'),
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cb-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Description', 'cb-core'),
                'placeholder' => esc_html__('Description', 'cb-core'),
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );
        $this->add_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'textdomain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'condition' => [
                    'layout' => ['layout-1']
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-class' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'cb-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            '_subtitle_heading',
            [
                'label' => esc_html__('Subtitle', 'cb-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );
        $this->add_control(
            '_subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'Text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .apps-service-section-subtitle-114' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_color',
                'label' => esc_html__('Typography', 'cb-core'),
                'selector' => '{{WRAPPER}} .apps-service-section-subtitle-114',
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'label' => esc_html__('heading_title Color', 'Text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .apps-service-section-title-114' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_title',
                'label' => esc_html__('Typography', 'cb-core'),
                'selector' => '{{WRAPPER}} .apps-service-section-title-114',
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );

        $this->add_control(
            '_description',
            [
                'label' => esc_html__('description Color', 'Text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'label' => esc_html__('Typography', 'cb-core'),
                'selector' => '{{WRAPPER}} .intro',
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );


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

Plugin::instance()->widgets_manager->register(new CB_Core_Heading());