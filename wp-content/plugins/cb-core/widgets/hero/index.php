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
class CB_Core_Hero extends Widget_Base
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
		return 'cb-hero';
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
		return __('CB Hero', 'cb-core');
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
			'hero_content',
			[
				'label' => __('Hero Content', 'cb-core'),
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
			'border_color',
			[
				'label' => __('Border Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-slider-content-6 .subtitle::before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ayaa-fz-slider-content-6 blockquote' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __('Title Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-slider-content-6 .title' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-1','layout-2']
				]
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => __('Sub Title Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-slider-content-6 .subtitle' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-2']
				]
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => __('Description Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-slider-content-6 blockquote' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-2']
				]
			]
		);
		$this->add_control(
			'btn_theme_color',
			[
				'label' => __('Button Theme Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-slider-item-6 .ayaa-fz-rounded-btn-6' => 'border-color: {{VALUE}}; color: {{VALUE}}',
					'{{WRAPPER}} .ayaa-fz-slider-item-6 .ayaa-fz-rounded-btn-6:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'layout' => ['layout-2']
				]
			]
		);
		$this->add_control(
			'other_component_color',
			[
				'label' => __('Other Component Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-slider-search-6::after' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ayaa-fz-slider-search-6 button[type=submit] i, {{WRAPPER}} .ayaa-fz-social-share-6, {{WRAPPER}} .ayaa-fz-social-share-6 a:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-2']
				]
			]
		);
		$this->add_control(
			'btn_theme_hover_color',
			[
				'label' => __('Button Hover Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-slider-item-6 .ayaa-fz-rounded-btn-6:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout' => ['layout-2']
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

		$settings = $this->get_settings();
		global $product;
?>
        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
	}
}

Plugin::instance()->widgets_manager->register(new CB_Core_Hero());
