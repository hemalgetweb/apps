<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use ELementor\Repeater;

if (!defined('ABSPATH')) exit; // Exit if accessed directly and CF7 Not install

/**
 * CB Core Demo
 *
 * CB Core widget for Demo.
 *
 * @since 1.0.0
 */
class CB_Core_Dynamic_Static_Service extends Widget_Base
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
		return 'cb-dynamic-static-service';
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
		return __('CB Dynamic Static Service', 'cb-core');
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
					'layout-2' => __('Layout 2', 'cb-core')
				],
				'default' => 'layout-1',
				'toggle' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'_section_dynamic_static_service',
			[
				'label' => __('Dynamic Static Service Content', 'cb-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
		 'card_hide_border',
		 [
		   'label'        => esc_html__( 'Hide Card Border?', 'cb-core' ),
		   'type'         => \Elementor\Controls_Manager::SWITCHER,
		   'label_on'     => esc_html__( 'Show', 'cb-core' ),
		   'label_off'    => esc_html__( 'Hide', 'cb-core' ),
		   'return_value' => 'yes',
		 ]
		);
		$this->add_control(
		 'card_height',
		 [
		   'label'   => esc_html__( 'Card Height', 'cb-core' ),
		   'type'    => \Elementor\Controls_Manager::NUMBER,
		   'condition' => [
			'layout' => ['layout-1', 'layout-2']
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
                'style-2'  => esc_html__( 'Style 2', 'cb-core' ),
            ],
            'default' => 'style-1',
            ]
        );

        $repeater->add_control(
         'service_image',
         [
           'label'   => esc_html__( 'Service Image', 'cb-core' ),
           'type'    => \Elementor\Controls_Manager::MEDIA,
             'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
           ],
           'condition' => [
            'field_condition' => ['style-1', 'style-2']
           ]
         ]
        );
        $repeater->add_control(
        'service_title',
         [
            'label'       => esc_html__( 'Service Title', 'cb-core' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html__( 'Service Title', 'cb-core' ),
            'condition' => [
                'field_condition' => ['style-1', 'style-2']
            ]
         ]
        );
        $repeater->add_control(
         'service_title_link',
         [
           'label'   => esc_html__( 'Service Title Link', 'cb-core' ),
           'type'        => \Elementor\Controls_Manager::URL,
           'default'     => [
               'url'               => '#',
               'is_external'       => true,
               'nofollow'          => true,
               'custom_attributes' => '',
             ],
             'placeholder' => esc_html__( 'Service Title Link', 'cb-core' ),
             'label_block' => true,
             'condition' => [
                'field_condition' => ['style-1', 'style-2']
            ]
           ]
         );
         $repeater->add_control(
          'service_excerpt',
          [
            'label'       => esc_html__( 'Service Excerpt', 'Text-domain' ),
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'rows'        => 10,
            'placeholder' => esc_html__( 'Service Excerpt', 'Text-domain' ),
          ]
         );
        $this->add_control(
           'slides',
           [
             'label'       => esc_html__( 'Section Label', 'cb-core' ),
             'type'        => \Elementor\Controls_Manager::REPEATER,
             'fields'      => $repeater->get_controls(),
             'title_field' => '{{{ service_title }}}',
           ]
         );
		$this->end_controls_section();
	}

	/**
	 * Render the widget oucbut on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render()
	{

		$settings = $this->get_settings();
		?>

        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
	}
}

Plugin::instance()->widgets_manager->register(new CB_Core_Dynamic_Static_Service());
