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
                    'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
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
                'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
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
                'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
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
                'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6']
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
                ],
                'default' => 'style-1'
            ]
        );
        $repeater->add_control(
            'list_item_image',
            [
            'label'   => esc_html__( 'List Item Image', 'cb-core' ),
            'type'    => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                  'url' => \Elementor\Utils::get_placeholder_image_src(),
              ],
              'condition' => [
                    'field_condition' => ['style-1', 'style-6']
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
                    'field_condition' => ['style-1', 'style-3', 'style-5', 'style-6']
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
                'field_condition' => ['style-6']
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
       
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'cb-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'panel_bg_color',
            [
                'label' => __('Panel Background Color', 'cb-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .season-sale.py-25 .panel' => 'background-color: {{VALUE}}',
                ],
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

Plugin::instance()->widgets_manager->register(new CB_Core_About());
