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
class CB_Core_Testimonial extends Widget_Base
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
		return 'cb-testimonial';
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
		return __('CB Testimonial', 'cb-core');
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
				],
				'default' => 'layout-1',
				'toggle' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_testimonial_repeater',
			[
				'label' => __('Testimonial Repeater', 'cb-core'),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => __('Section title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('REVIEWS', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5'],
				],
				'placeholder' => __('Type your section title here', 'cb-core'),
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label' => __('Section Subtitle', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Testimonials', 'cb-core'),
				'condition' => [
					'layout' => ['layout-4'],
				],
				'placeholder' => __('Type your section subtitle here', 'cb-core'),
			]
		);
		$this->add_control(
			'show_testimonial_arrow',
			[
				'label' => __('Show Testimonial Arrow', 'cb-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cb-core'),
				'label_off' => __('Hide', 'cb-core'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'layout' => ['layout-3', 'layout-4', 'layout-5'],

				],
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
					'style-2' => __('Style 2', 'cb-core'),
					'style-3' => __('Style 3', 'cb-core'),
					'style-4' => __('Style 4', 'cb-core'),
					'style-5' => __('Style 5', 'cb-core'),
				],
			]
		);
		$repeater->add_control(
			'user_image',
			[
				'label' => __('User Image', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5']
				],
			]
		);
		$repeater->add_control(
			'user_name',
			[
				'label' => __('User Name', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Kvin Smith', 'cb-core'),
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5']
				],
				'placeholder' => __('Type your username here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'user_role',
			[
				'label' => __('User Role', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Customer', 'cb-core'),
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5']
				],
				'placeholder' => __('Type your user role here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'user_review',
			[
				'label' => __('User Review', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5']
				],
				'placeholder' => __('Type your user review here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'user_rating',
			[
				'label' => __('User Rating', 'cb-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 5,
				'label_block' => true,
				'step' => 1,
				'default' => 5,
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5']
				],
			]
		);
		$this->add_control(
			'slides',
			[
				'label' => __('Testimonial Lists', 'cb-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ user_name }}}',
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
			'section_title_color',
			[
				'label' => __('Section Title Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-section-title-6' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-5']
				]
			]
		);
		$this->add_control(
			'quote_color',
			[
				'label' => __('Quote Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-testimonial-single-6 .arrow i' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-5']
				]
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __('Content Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-testimonial-single-6 .desc' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-5']
				]
			]
		);
		$this->add_control(
			'rating_color',
			[
				'label' => __('Rating Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-testimonial-author-rating-6 i' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-5']
				]
			]
		);
		$this->add_control(
			'author_name_color',
			[
				'label' => __('Author Name Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-testimonial-author-box-6 .name' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-5']
				]
			]
		);
		$this->add_control(
			'author_designation_color',
			[
				'label' => __('Author Designation Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-testimonial-author-box-6 .designation' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => ['layout-5']
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

		$settings = $this->get_settings(); ?>

        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
	}
}

Plugin::instance()->widgets_manager->register(new CB_Core_Testimonial());
