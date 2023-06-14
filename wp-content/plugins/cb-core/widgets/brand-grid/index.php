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
class CB_Core_Brand_Grid extends Widget_Base
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
		return 'cb-brand-grid';
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
		return __('CB Brand Grid', 'cb-core');
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
					'layout-7' => __('Layout 7', 'cb-core'),
				],
				'default' => 'layout-1',
				'toggle' => true,
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'product_brand_repeater',
			[
				'label' => __('Brand Repeater', 'cb-core'),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => __('Section Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Top Brands', 'cb-core'),
				'placeholder' => __('Type your title here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
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
					'style-5'  => __('Style 5', 'cb-core'),
					'style-6'  => __('Style 6', 'cb-core'),
					'style-7'  => __('Style 7', 'cb-core'),
				],
				'default' => 'style-1',
			]
		);
		$repeater->add_control(
			'product_brand_image',
			[
				'label' => __('Brand Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-6', 'style-7']
				]
			]
		);
		$this->add_control(
			'slides',
			[
				'label' => __('Slides', 'cb-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ product_brand_image.url }}}',
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
					'style-3'  => __('Style 3', 'cb-core'),
					'style-4'  => __('Style 4', 'cb-core'),
					'style-5'  => __('Style 5', 'cb-core'),
					'style-6'  => __('Style 6', 'cb-core'),
				],
				'default' => 'style-2',
			]
		);
		$repeater->add_control(
			'product_brand_image_2',
			[
				'label' => __('Brand Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition_2' => ['style-2', 'style-4', 'style-6']
				]
			]
		);
		$this->add_control(
			'slides_2',
			[
				'label' => __('Slides 2', 'cb-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ product_brand_image_2.url }}}',
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

Plugin::instance()->widgets_manager->register(new CB_Core_Brand_Grid());
