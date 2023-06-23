<?php

namespace Elementor;

use Elementor\Controls_Manager;
use ELementor\Repeater;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * CB Core Demo
 *
 * CB Core widget for Demo.
 *
 * @since 1.0.0
 */
class CB_Core_Case_Study extends Widget_Base
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
		return 'cb-case-study';
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
		return __('CB Case Study', 'cb-core');
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
		 '_section_card_topbar',
			 [
			   'label' => esc_html__( 'Card topbar', 'cb-core' ),
			   'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			   'condition' => [
				'layout' => ['layout-1']
			   ]
			 ]
		);
		$this->add_control(
		 'card_img',
		 [
		   'label'   => esc_html__( 'Card Image', 'cb-core' ),
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
		'card_subtitle',
		 [
			'label'       => esc_html__( 'Card Subtitle', 'cb-core' ),
			'type'        => \Elementor\Controls_Manager::TEXT,
			'label_block' => true,
			'placeholder' => esc_html__( 'Card Subtitle', 'cb-core' ),
			'condition' => [
				'layout' => ['layout-1']
			]
		 ]
		);
		$this->add_control(
		'card_title',
		 [
			'label'       => esc_html__( 'Card Title', 'cb-core' ),
			'type'        => \Elementor\Controls_Manager::TEXT,
			'label_block' => true,
			'placeholder' => esc_html__( 'Card Title', 'cb-core' ),
			'condition' => [
				'layout' => ['layout-1']
			]
		 ]
		);
		
		
		$this->end_controls_section();
		$this->start_controls_section(
			'_case_study_content',
			[
				'label' => __('Case Study Content', 'cb-core'),
			]
		);
		$this->add_control(
			'card_label_left',
			 [
				'label'       => esc_html__( 'Card Label Left', 'cb-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Card Label Left', 'cb-core' ),
				'condition' => [
					'layout' => ['layout-1']
				]
			 ]
		);
		$this->add_control(
			'card_label_right',
			 [
				'label'       => esc_html__( 'Card Label Right', 'cb-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Card Label Right', 'cb-core' ),
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
		 'list_count',
		   [
			 'label'   => esc_html__( 'List Count', 'cb-core' ),
			 'type'        => \Elementor\Controls_Manager::NUMBER,
			 'default'     => esc_html__( 1, 'cb-core' ),
			 'label_block' => true,
			 'condition' => [
				'field_condition' => ['style-1']
			 ]
		   ]
		 );
		 
		 $this->add_control(
		   'slides',
		   [
			 'label'       => esc_html__( 'Section Label', 'cb-core' ),
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
			'section_title_border_color',
			[
				'label' => __('Title Border Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .panel .panel-header:after' => 'background: {{VALUE}}',
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

Plugin::instance()->widgets_manager->register(new CB_Core_Case_Study());