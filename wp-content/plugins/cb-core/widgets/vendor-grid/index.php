<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use ELementor\Repeater;

if (!defined('ABSPATH') && !class_exists('WooCommerce')) exit; // Exit if accessed directly or not have woocommerece

/**
 * CB Core Demo
 *
 * CB Core widget for Demo.
 *
 * @since 1.0.0
 */
class CB_Core_Vendor_List extends Widget_Base
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
		return 'cb-vendor-list';
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
		return __('CB Vendor List', 'cb-core');
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
				],
				'default' => 'layout-1',
				'toggle' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_vendor_repeater',
			[
				'label' => __('Vendor Repeater', 'cb-core'),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => __('Section title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Best Sellers', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1']
				],
				'placeholder' => __('Type your section title here', 'cb-core'),
			]
		);
		$this->add_control(
			'section_btn_text',
			[
				'label' => __('Section Button Text', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Visit Store', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1']
				],
				'placeholder' => __('Type button text here', 'cb-core'),
			]
		);
		$this->add_control(
			'section_btn_url',
			[
				'label' => __('Section Button URL', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cb-core'),
				'options' => ['url', 'is_external', 'nofollow'],
				'condition' => [
					'layout' => ['layout-1']
				],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'field_condition',
			[
				'label' => __('Field Condition', 'cb-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => __('Style 1', 'cb-core'),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'vendor_image',
			[
				'label' => __('Vendor Image', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-1']
				],
			]
		);
		$repeater->add_control(
			'vendor_name',
			[
				'label' => __('Vendor Name', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Vendor Name', 'cb-core'),
				'condition' => [
					'field_condition' => ['style-1']
				],
				'placeholder' => __('Type your vendor name here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'vendor_url',
			[
				'label' => __('Vendor URL', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cb-core'),
				'options' => ['url', 'is_external', 'nofollow'],
				'condition' => [
					'field_condition' => ['style-1']
				],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'rating_count',
			[
				'label' => __('Rating Count', 'cb-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'label_block' => true,
				'max' => 5,
				'step' => 1,
				'condition' => [
					'field_condition' => ['style-1']
				],
				'default' => 5,
			]
		);
		$repeater->add_control(
			'rating_user_count',
			[
				'label' => __('Rating User Count', 'cb-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'label_block' => true,
				'step' => 1,
				'condition' => [
					'field_condition' => ['style-1']
				],
				'default' => 0,
			]
		);
		$repeater->add_control(
			'btn_text',
			[
				'label' => __('Button Text', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Visit Store', 'cb-core'),
				'condition' => [
					'field_condition' => ['style-1']
				],
				'placeholder' => __('Type button text here', 'cb-core'),
			]
		);
		$this->add_control(
			'slides',
			[
				'label' => __('Vendor Lists', 'cb-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ vendor_name }}}',
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

Plugin::instance()->widgets_manager->register(new CB_Core_Vendor_List());
