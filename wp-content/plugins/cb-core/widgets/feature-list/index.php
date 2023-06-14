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
class CB_Core_Feature_List extends Widget_Base
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
		return 'cb-feature-list';
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
		return __('CB Feature List', 'cb-core');
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
			'section_feature_list',
			[
				'label' => __('Feature List', 'cb-core'),
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
				],
				'default' => 'style-1'
			]
		);
		$repeater->add_control(
			'feature_title',
			[
				'label' => __('Feature Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Free Delivery', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-6']
				],
				'placeholder' => __('Type your title here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'feature_content',
			[
				'label' => __('Feature Content', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Free Delivery', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-6']
				],
				'placeholder' => __('Type your Content here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'feature_icon',
			[
				'label' => __('Feature Icon', 'cb-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'flaticon-money-saving',
				],
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-6']
				],
			]
		);
		$repeater->add_control(
			'feature_image',
			[
				'label' => __('Featured Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-4', 'style-5']
				],
			]
		);
		$this->add_control(
			'slides',
			[
				'label' => __('Feature Lists', 'cb-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ feature_title }}}',
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
			'icon_color',
			[
				'label' => __('Icon Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-featured-box-6 .icon i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __('Title Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-featured-box-6 .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => __('Subtitle Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-featured-box-6 .label' => 'color: {{VALUE}}',
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

Plugin::instance()->widgets_manager->register(new CB_Core_Feature_List());
