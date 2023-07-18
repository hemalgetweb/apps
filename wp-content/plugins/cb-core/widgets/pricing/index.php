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
class CB_Core_Pricing extends Widget_Base
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
        return 'cb-pricing';
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
        return __('CB Pricing', 'cb-core');
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
                    'layout-1' => __('Layout 1', 'cb-core')
                ],
                'default' => 'layout-1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_section_pricing_content',
            [
                'label' => __('Pricing Content', 'cb_core'),
            ]
        );
        $this->add_control(
         'active_price_box',
         [
           'label'        => esc_html__( 'Active Price Box?', 'cb-core' ),
           'type'         => \Elementor\Controls_Manager::SWITCHER,
           'label_on'     => esc_html__( 'Yes', 'cb-core' ),
           'label_off'    => esc_html__( 'No', 'cb-core' ),
           'return_value' => 'yes',
           'default'      => '',
           'condition' => [
            'layout' => ['layout-1']
           ]
         ]
        );
        // controls here
       $this->add_control(
        'pricing_image',
        [
          'label'   => esc_html__( 'Pricing Image', 'cb-core' ),
          'type'    => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
            'condition' => [
                'layout' => ['layout-1']
            ]
        ]
       );
        $this->add_control(
        'pricing_title',
          [
            'label'   => esc_html__( 'Pricing Title', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( 'Basic', 'cb-core' ),
            'label_block' => true,
            'condition' => [
                'layout' => ['layout-1']
            ]
          ]
        );
        $this->add_control(
        'pricing_desc',
          [
            'label'   => esc_html__( 'Pricing Description', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'default'     => esc_html__( 'Natoque leo faucibus quam cursus enim tincidunt.', 'cb-core' ),
            'label_block' => true,
            'condition' => [
                'layout' => ['layout-1']
            ]
          ]
        );
        $this->add_control(
        'pricing_price_count',
          [
            'label'   => esc_html__( 'Price', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__( '$995', 'cb-core' ),
            'label_block' => true,
            'condition' => [
                'layout' => ['layout-1']
            ]
          ]
        );
        $this->add_control(
            'pricing_price_label',
              [
                'label'   => esc_html__( 'Price Label (monthly/yearly)', 'cb-core' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Monthly.', 'cb-core' ),
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-1']
                ]
              ]
        );
        $this->add_control(
            'pricing_btn_text',
              [
                'label'   => esc_html__( 'Price Button Text', 'cb-core' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Get Started', 'cb-core' ),
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-1']
                ]
              ]
        );
        $this->add_control(
         'pricing_btn_url',
         [
           'label'   => esc_html__( 'Pricing URL', 'cb-core' ),
           'type'        => \Elementor\Controls_Manager::URL,
           'default'     => [
               'url'               => '#',
               'is_external'       => true,
               'nofollow'          => true,
               'custom_attributes' => '',
             ],
             'placeholder' => esc_html__( 'Pricing URL', 'cb-core' ),
             'label_block' => true,
             'condition' => [
                'layout' => ['layout-1']
            ]
           ]
         );
         $this->add_control(
            'repeater_label',
              [
                'label'   => esc_html__( 'Repeater Label', 'cb-core' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Feature Included', 'cb-core' ),
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-1']
                ]
              ]
        );
        
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
         'field_condition',
         [
           'label'   => esc_html__( 'Field Condition', 'cb-core' ),
           'type' => \Elementor\Controls_Manager::SELECT,
           'options' => [
             'style-1'  => esc_html__( 'Style 1', 'cb-core' ),
           ],
           'default' => 'style-1',
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
                'field_condition' => ['style-1']
             ]
           ]
         );
         $repeater->add_control(
          'active_feature',
          [
            'label'        => esc_html__( 'Active Feature? ', 'cb-core' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Active', 'cb-core' ),
            'label_off'    => esc_html__( 'Deactive', 'cb-core' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'condition' => [
                'field_condition' => ['style-1']
            ]
          ]
         );
         $this->add_control(
           'slides',
           [
             'label'       => esc_html__( 'Slides', 'cb-core' ),
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
        // styles here
        $this->add_control(
         'pricing_box_height',
         [
           'label'   => esc_html__( 'Pricing Box Height', 'cb-core' ),
           'type'    => \Elementor\Controls_Manager::NUMBER,
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

Plugin::instance()->widgets_manager->register(new CB_Core_Pricing());
