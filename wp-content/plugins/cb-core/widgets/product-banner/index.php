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
class CB_Core_Product_Banner extends Widget_Base
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
		return 'cb-product-banner';
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
		return __('CB Product Banner', 'cb-core');
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
			'product_banner_information',
			[
				'label' => __('Banner Box One Information', 'cb-core'),
				'condition' => ['layout' => ['layout-5']]
			]
		);
		$this->add_control(
			'banner_box_title_link',
			[
				'label' => __('Banner Box Title Link', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cb-core'),
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'banner_box_title',
			[
				'label' => __('Banner Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Banner Title', 'cb-core'),
				'placeholder' => __('Banner Title', 'cb-core'),
			]
		);
		$this->add_control(
			'banner_box_image',
			[
				'label' => __('Banner Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'banner_box_bg',
			[
				'label' => __('Background Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'banner_box_price',
			[
				'label' => __('Banner Price', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('$759.99', 'cb-core'),
				'placeholder' => __('Banner Price', 'cb-core'),
			]
		);
		$this->add_control(
			'banner_box_price_old',
			[
				'label' => __('Banner Old Price', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('$645.00', 'cb-core'),
				'placeholder' => __('Banner Old Price', 'cb-core'),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'product_banner_box_information_two',
			[
				'label' => __('Banner Box Two Information', 'cb-core'),
				'condition' => ['layout' => ['layout-5']]
			]
		);
		$this->add_control(
			'banner_box_title_2',
			[
				'label' => __('Banner Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Banner Title', 'cb-core'),
				'placeholder' => __('Banner Title', 'cb-core'),
			]
		);
		$this->add_control(
			'banner_box_title_link_2',
			[
				'label' => __('Title Link', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cb-core'),
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_box_subtitle_2',
			[
				'label' => __('Banner Subtitle', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('ROOM & DECOR', 'cb-core'),
				'placeholder' => __('Banner Subtitle', 'cb-core'),
			]
		);
		$this->add_control(
			'banner_box_subtitle_link_2',
			[
				'label' => __('Subtitle Link', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cb-core'),
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_box_bg_2',
			[
				'label' => __('Background Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'banner_box_image_2',
			[
				'label' => __('Banner Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'product_banner_repeater',
			[
				'label' => __('Banner Repeater', 'cb-core'),
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
				'default' => 'style-1',
			]
		);
		$repeater->add_control(
			'product_banner_image',
			[
				'label' => __('Choose Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-1', 'style-3', 'style-4', 'style-6']
				]
			]
		);
		$repeater->add_control(
			'product_bg_image',
			[
				'label' => __('BG Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-6']
				]
			]
		);
		$repeater->add_control(
			'product_banner_image_link',
			[
				'label' => __('Image Link', 'cb-core'),
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
					'field_condition' => ['style-3']
				]
			]
		);
		$repeater->add_control(
			'title',
			[
				'label' => __('Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Title', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-4', 'style-6']
				]
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label' => __('Subtitle', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Big Offer', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-6']
				]
			]
		);
		$repeater->add_control(
			'content',
			[
				'label' => __('Content', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Shopping On New Year Day', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-6']
				]
			]
		);
		$repeater->add_control(
			'old_price',
			[
				'label' => __('Old Price', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('$0.00', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-4']
				]
			]
		);
		$repeater->add_control(
			'new_price',
			[
				'label' => __('New Price', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('$0.00', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-4']
				]
			]
		);
		$repeater->add_control(
			'btn_text',
			[
				'label' => __('Button Text', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Button Text', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-4', 'style-6']
				]
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label' => __('Button Link', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'cb-core'),
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1', 'style-4', 'style-6']
				]
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => __('Slides', 'cb-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
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

Plugin::instance()->widgets_manager->register(new CB_Core_Product_Banner());
