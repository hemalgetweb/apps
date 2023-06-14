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
class CB_Core_Faq extends Widget_Base
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
        return 'cb-faq';
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
        return __('CB Faq', 'cb-core');
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
            '_section_faq_content',
            [
                'label' => __('Faq Content', 'cb-core'),
            ]
        );
        $this->add_control(
            '_seciton_faq_title',
            [
                'label'       => __('Faq 1', 'cb-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );
        $this->add_control(
            'faq_sec_title',
            [
                'label'       => __('Section Title', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Customer Questions', 'cb-core'),
                'placeholder' => __('Section Title', 'cb-core'),
                'condition' => [
                    'layout' => ['layout-2']
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
                ],
                'default' => 'style-1'
            ]
        );
        $repeater->add_control(
            'question_label',
            [
                'label'       => __('Question Label', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('How To Make Website Easy Edit?', 'cb-core'),
                'placeholder' => __('Placeholder Text', 'cb-core'),
                'condition' => [
                    'field_condition' => ['style-1', 'style-2']
                ]
            ]
        );
        $repeater->add_control(
            'question',
            [
                'label'       => __('Question', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Placeholder Text', 'cb-core'),
                'condition' => [
                    'field_condition' => ['style-1', 'style-2']
                ]
            ]
        );
        $this->add_control(
            'slides',
            [
                'label'       => __('Faq Repeater', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'question_label'   => __('How To Make Website Easy Edit?', 'cb-core'),
                        'question'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                    [
                        'question_label'   => __('Can I Make A Direct Call For Support?', 'cb-core'),
                        'question'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                    [
                        'question_label'   => __('How Many Month Update you website?', 'cb-core'),
                        'question'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                    [
                        'question_label'   => __('How To Check your Shopping Cart?', 'cb-core'),
                        'question'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                    [
                        'question_label'   => __('Where To Get Your Contact Support?', 'cb-core'),
                        'question'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                ],
                'title_field' => '{{{ question_label }}}',
            ]
        );
        $repeater->end_controls_section();
        $this->add_control(
            '_seciton_faq_title_2',
            [
                'label'       => __('Faq 2', 'cb-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'layout' => ['layout-1', 'style-2']
                ]
            ]
        );
        $this->add_control(
            'faq_sec_title_2',
            [
                'label'       => __('Section Title', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Customer Questions', 'cb-core'),
                'placeholder' => __('Section Title', 'cb-core'),
                'condition' => [
                    'layout' => ['layout-2']
                ]
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'field_condition_2',
            [
                'label' => __('Field Condition', 'cb-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'style-1'  => __('Style 1', 'cb-core'),
                    'style-2'  => __('Style 2', 'cb-core'),
                ],
                'default' => 'style-1'
            ]
        );
        $repeater->add_control(
            'question_label_2',
            [
                'label'       => __('Question Label', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('How To Make Website Easy Edit?', 'cb-core'),
                'placeholder' => __('Placeholder Text', 'cb-core'),
                'condition' => [
                    'field_condition_2' => ['style-1', 'style-2']
                ]
            ]
        );
        $repeater->add_control(
            'question_2',
            [
                'label'       => __('Question', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Placeholder Text', 'cb-core'),
                'condition' => [
                    'field_condition_2' => ['style-1', 'style-2']
                ]
            ]
        );
        $this->add_control(
            'slides_2',
            [
                'label'       => __('Faq Repeater', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'question_label_2'   => __('What is first look at ecommerce?', 'cb-core'),
                        'question_2'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                    [
                        'question_label_2'   => __('Why do you need wanted ecommerce?', 'cb-core'),
                        'question_2'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                    [
                        'question_label_2'   => __('what will happen with office workers?', 'cb-core'),
                        'question_2'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                    [
                        'question_label_2'   => __('How To introducing ecommerce in light?', 'cb-core'),
                        'question_2'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                    [
                        'question_label_2'   => __('Where To Get Your Contact Support?', 'cb-core'),
                        'question_2'   => __('write your professional text here and you can styling and custom form style or advanced ta or check documentation for more details write your professional text here and you can styling.', 'cb-core'),
                    ],
                ],
                'title_field' => '{{{ question_label_2 }}}',
            ]
        );
        $repeater->end_controls_section();
        $this->end_controls_section();
        $this->start_controls_section(
            '_section_sidebar_widget',
            [
                'label' => __('Sidebar Widget', 'cb-core'),
            ]
        );
        $this->add_control(
            'section_widget_title',
            [
                'label'       => __('Section Widget Title', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('Section Widget Title', 'cb-core'),
                'condition' => [
                    'layout' => ['layout-2']
                ]
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'field_condition_sidebar',
            [
                'label' => __('Field Condition', 'cb-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'style-1'  => __('Style 1', 'cb-core'),
                    'style-2'  => __('Style 2', 'cb-core'),
                ],
                'default' => 'style-2'
            ]
        );
        $repeater->add_control(
           'widget_icon',
            [
                'label' => esc_html__( 'Widget Icon', 'cb-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'field_condition_sidebar' => ['style-2']
                ]
            ]
        );
        $repeater->add_control(
            'widget_title',
            [
                'label'       => __('Widget Title', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('Widget Title', 'cb-core'),
                'condition' => [
                    'field_condition_sidebar' => ['style-2']
                ]
            ]
        );
        $repeater->add_control(
            'widget_link',
            [
              'label'   => esc_html__( 'Widget Title Link', 'cb-core' ),
              'type'        => \Elementor\Controls_Manager::URL,
              'default'     => [
                   'url'               => '#',
                   'is_external'       => true,
                   'nofollow'          => true,
                   'custom_attributes' => '',
               ],
               'placeholder' => esc_html__( '#', 'cb-core' ),
               'label_block' => true,
               'condition' => [
                    'field_condition_sidebar' => ['style-2']
                ]
            ]
        );
        $repeater->add_control(
            'widget_desc',
            [
                'label'       => __('Widget Description', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __('Widget Description', 'cb-core'),
                'condition' => [
                    'field_condition_sidebar' => ['style-2']
                ]
            ]
        );
        
        $this->add_control(
            'slides_sidebar',
            [
                'label'       => __('Sidebar Repeater', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ widget_title }}}',
            ]
        );
        $repeater->end_controls_section();
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'cb-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'text_transform',
            [
                'label' => __('Text Transform', 'cb-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'cb-core'),
                    'uppercase' => __('UPPERCASE', 'cb-core'),
                    'lowercase' => __('lowercase', 'cb-core'),
                    'capitalize' => __('Capitalize', 'cb-core'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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

Plugin::instance()->widgets_manager->register(new CB_Core_Faq());
