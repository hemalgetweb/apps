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
            '_section_about_image_heading',
            [
                'label'       => __('About Images', 'cb-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            'image_1',
            [
                'label'   => __('Image 1', 'cb-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => ['layout-1', 'layout-2']
                ]
            ]
        );
        $this->add_control(
            'image_2',
            [
                'label'   => __('Image 2', 'cb-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => 'layout-1',
                ],
            ]
        );
        $this->add_control(
            'year_box_heading',
            [
                'label'       => __('Year Box', 'cb-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            'year_box_subtitle',
            [
                'label'       => __('Box Subtitle', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Since From', 'cb-core'),
                'placeholder' => __('Box subtitle', 'cb-core'),
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            'year_box_title',
            [
                'label'       => __('Box Title', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('2010', 'cb-core'),
                'placeholder' => __('Box title', 'cb-core'),
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            'customer_box_heading',
            [
                'label'       => __('Customer Box', 'cb-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            'customer_box_subtitle',
            [
                'label'       => __('Box Subtitle', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Active Customer', 'cb-core'),
                'placeholder' => __('Box subtitle', 'cb-core'),
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            'customer_box_title',
            [
                'label'       => __('Box Title', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('30K+', 'cb-core'),
                'placeholder' => __('Box title', 'cb-core'),
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            'image_3',
            [
                'label'   => __('Image 3', 'cb-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => 'layout-1',
                ],
            ]
        );
        $this->add_control(
            '_section_about_content_heading',
            [
                'label'       => __('About Content', 'cb-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'layout' => ['layout-1', 'layout-2']
                ]
            ]
        );
        $this->add_control(
            'about_content_title',
            [
                'label'       => __('About Content Title', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('About Our Story', 'cb-core'),
                'placeholder' => __('Box subtitle', 'cb-core'),
                'condition' => [
                    'layout' => ['layout-1', 'layout-2']
                ]
            ]
        );
        $this->add_control(
            'about_content_desc',
            [
                'label'       => __('About Content Description', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('Established fact that a reader will, taken possession of my entire soul, like these sweet mornings of spring which I enjoy with the theory of ethics. Posuere eat a ante venanatin diapaus posuere aliquot. Staging at the middle of 2010 seem malasada magna moles eulimid. Present commode cursus magna, vela scelerisque Nissl consented et. Integer posuere era a ante venanatin dipygus posuere valet aliquot.', 'cb-core'),
                'placeholder' => __('Box subtitle', 'cb-core'),
                'condition' => [
                    'layout' => ['layout-1', 'layout-2']
                ]
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => __('Button Text', 'cb-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('SHOP NOW', 'cb-core'),
                'placeholder' => __('Type your button text here', 'cb-core'),
                'condition' => [
                    'layout' => ['layout-2']
                ]
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' => __('Button Link', 'cb-core'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cb-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-2']
                ]
            ]
        );
        $this->add_control(
            'about_content_image',
            [
                'label'   => __('About Content Image', 'cb-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => 'layout-1',
                ],
            ]
        );
        $this->add_control(
            '_section_about_list_repeater_heading',
            [
                'label'       => __('List Repeater', 'cb-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'layout' => 'layout-1',
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
            'repeater_list_item',
            [
                'label'   => __('List Item Text', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Orders go right to your restaurant', 'cb-core'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style -2']
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
        $this->add_control(
            'about_list_content_2',
            [
                'label'       => __('Repeater List Content', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('Established fact that a reader will, taken your ssion I enjoy with the theory of ethics.', 'cb-core'),
                'placeholder' => __('Repeater List Content', 'cb-core'),
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            '_section_about_author_box_heading',
            [
                'label'       => __('Author Box', 'cb-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            'author_signature',
            [
                'label'   => __('Author Signature', 'cb-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => 'layout-1',
                ],
            ]
        );
        $this->add_control(
            'author_img',
            [
                'label'   => __('Author Image', 'cb-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => 'layout-1',
                ],
            ]
        );
        $this->add_control(
            'author_name',
            [
                'label'       => __('Author Name', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Arjuna Alisha', 'cb-core'),
                'placeholder' => __('Author Name', 'cb-core'),
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->add_control(
            'author_designation',
            [
                'label'       => __('Author Designation', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Author', 'cb-core'),
                'placeholder' => __('Author Designation', 'cb-core'),
                'condition' => [
                    'layout' => 'layout-1',
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_section_about_content_2',
            [
                'label' => __('About Content 2', 'cb_core'),
            ]
        );
        $this->add_control(
            'about_content_image_2',
            [
                'label'   => __('Image', 'cb-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => ['layout-2']
                ]
            ]
        );
        $this->add_control(
            'about_2_title',
            [
                'label'       => __('About Title', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Our Store (2)', 'cb-core'),
                'placeholder' => __('Box title', 'cb-core'),
                'condition' => [
                    'layout' => ['layout-2'],
                ]
            ]
        );
        $this->add_control(
            'about_2_content',
            [
                'label'       => __('About Content', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Established fact that a reader will, taken possession of my entire soul, like these sweet mornings of spring which I enjoy with the theory of ethics. Posuere eat a ante venanatin diapaus posuere aliquot. Staging at the middle of 2016 porta seem malasada.', 'cb-core'),
                'placeholder' => __('About content', 'cb-core'),
                'condition' => [
                    'layout' => ['layout-2'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();
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
            'about_2_list_item',
            [
                'label'   => __('List Item', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('It can be difficult to know when shopping online', 'cb-core'),
                'label_block' => true,
                'condition' => [
                    'field_condition_2' => ['style-2']
                ]
            ]
        );
        $this->add_control(
            'slides_2',
            [
                'label'       => __('List 2', 'cb-core'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'about_2_list_item'   => __('It can be difficult to know when shopping online', 'cb-core'),
                    ],
                    [
                        'about_2_list_item'   => __('Customer reviews can be fit and quality', 'cb-core'),
                    ],
                    [
                        'about_2_list_item'   => __('Clothes made from natural fibers or wool, tend', 'cb-core'),
                    ],
                ],
                'title_field' => '{{{ about_2_list_item }}}',
            ]
        );
        $this->add_control(
            'btn_text_2',
            [
                'label' => __('Button Text', 'cb-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('SHOP NOW', 'cb-core'),
                'placeholder' => __('Type your button text here', 'cb-core'),
                'condition' => [
                    'layout' => ['layout-2']
                ]
            ]
        );
        $this->add_control(
            'btn_link_2',
            [
                'label' => __('Button Link', 'cb-core'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cb-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-2']
                ]
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
