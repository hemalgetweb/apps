<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * CB Core Demo
 *
 * CB Core widget for Demo.
 *
 * @since 1.0.0
 */
class CB_Core_Banner_Repeater extends Widget_Base
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
		return 'cb-banner-repeater';
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
		return __('CB Banner Repeater', 'cb-core');
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
				],
				'default' => 'layout-1',
				'toggle' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_banner_repeater',
			[
				'label' => __('Banner Repeater', 'cb-core'),
			]
		);
		$this->add_control(
			'banner_title_1',
			[
				'label' => __('Banner Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Limited time offer <br>The deal will expires', 'cb-core'),
				'placeholder' => __('Type your title here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-2',]
				]
			]
		);
		$this->add_control(
			'banner_large_img',
			[
				'label' => __('Banner Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'layout' => ['layout-2']
				]
			]
		);
		$this->add_control('due_date', [
			'label'       => __('Due Date', 'cb-core'),
			'type'        => Controls_Manager::DATE_TIME,
			'default'     => gmdate('Y-m-d H:i', strtotime('+1 month') + (get_option('gmt_offset') * HOUR_IN_SECONDS)),
			'description' => sprintf(__('Date set according to your timezone: %s.', 'cb-core'), Utils::get_timezone_string()),
			'condition' => [
				'layout' => ['layout-2']
			]
		]);
		$repeater = new Repeater();
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
				],
				'default' => 'style-1'
			]
		);
		$repeater->add_control(
			'banner_img',
			[
				'label' => __('Banner Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-1', 'style-3', 'style-4'],
				]
			]
		);
		$repeater->add_control(
			'banner_bg_img',
			[
				'label' => __('Banner BG Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-3', 'style-4'],
				]
			]
		);
		$repeater->add_control(
			'banner_subtitle',
			[
				'label' => __('Banner Subtitle', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Hot Deals', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-3', 'style-4']
				],
				'placeholder' => __('Type your banner title here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'banner_title',
			[
				'label' => __('Banner title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Enjoy up to $70.00<br> off for Drone', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4']
				],
				'placeholder' => __('Type your banner title here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'banner_title_url',
			[
				'label' => __('Banner Title URL', 'cb-core'),
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
				'condition' => ['field_condition' => 'style-2']
			]
		);
		$repeater->add_control(
			'banner_price',
			[
				'label' => __('Banner Price', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('$149.00', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-2']
				],
				'placeholder' => __('Type your banner price here', 'cb-core'),
			]
		);
		$repeater->add_control('btn_title', [
			'label'   => __('Button Title', 'cb-core'),
			'type'    => Controls_Manager::TEXT,
			'dynamic' => [
				'active' => true,
			],
			'default' => __('Shop Now', 'cb-core'),
			'condition' => ['field_condition' => ['style-1', 'style-3', 'style-4']]
		]);
		$repeater->add_control(
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
				'condition' => ['field_condition' => ['style-1', 'style-3', 'style-4']]
			]
		);
		$this->add_control(
			'slides',
			[
				'label' => __('Feature Lists', 'cb-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ banner_title }}}',
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

Plugin::instance()->widgets_manager->register(new CB_Core_Banner_Repeater());
