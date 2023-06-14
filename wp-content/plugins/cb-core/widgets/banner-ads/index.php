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
class CB_Core_Banner_Ads extends Widget_Base
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
		return 'cb-banner-ads';
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
		return __('CB Banner Ad', 'cb-core');
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
					'layout-4' => __('Layout 4', 'cb-core')
				],
				'default' => 'layout-1',
				'toggle' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_select_banner_1',
			[
				'label' => __('Banner 1', 'cb-core'),
			]
		);
		$this->add_control(
			'banner_subtitle_1',
			[
				'label' => __('Banner Subtitle', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Season Sale!', 'cb-core'),
				'label_block' => true,
				'placeholder' => __('Type your subtitle here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-4']
				]
			]
		);
		$this->add_control(
			'banner_title_1',
			[
				'label' => __('Banner Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('New Arrivals', 'cb-core'),
				'placeholder' => __('Type your title here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4']
				]
			]
		);
		$this->add_control(
			'banner_description_1',
			[
				'label' => __('Banner Description', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Get Double Ayaa Points for each paid order during VIP DAY', 'cb-core'),
				'placeholder' => __('Type your description here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-4']
				]
			]
		);
		$this->add_control(
			'banner_imag_1',
			[
				'label' => __('Banner Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4']
				]
			]
		);
		$this->add_control(
			'banner_bg_imag_1',
			[
				'label' => __('Banner BG Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout' => ['layout-3', 'layout-4'],
				]
			]
		);
		$this->add_control(
			'btn_text_1',
			[
				'label' => __('Button Text', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('SHOP NOW', 'cb-core'),
				'placeholder' => __('Type your button text here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4']
				]
			]
		);

		$this->add_control(
			'btn_link_1',
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
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4']
				]
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_select_banner_2',
			[
				'label' => __('Banner 2', 'cb-core'),
			]
		);
		$this->add_control(
			'banner_subtitle_2',
			[
				'label' => __('Banner Subtitle', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Season Sale!', 'cb-core'),
				'label_block' => true,
				'placeholder' => __('Type your subtitle here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->add_control(
			'banner_title_2',
			[
				'label' => __('Banner Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('New Arrivals', 'cb-core'),
				'placeholder' => __('Type your title here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->add_control(
			'banner_imag_2',
			[
				'label' => __('Banner Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
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
					'layout' => ['layout-1', 'layout-2']
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
					// 'custom_attributes' => '',
				],
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_select_banner_3',
			[
				'label' => __('Banner 3', 'cb-core'),
			]
		);
		$this->add_control(
			'banner_subtitle_3',
			[
				'label' => __('Banner Subtitle', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Season Sale!', 'cb-core'),
				'label_block' => true,
				'placeholder' => __('Type your subtitle here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->add_control(
			'banner_title_3',
			[
				'label' => __('Banner Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('New Arrivals', 'cb-core'),
				'placeholder' => __('Type your title here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->add_control(
			'banner_imag_3',
			[
				'label' => __('Banner Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->add_control(
			'btn_text_3',
			[
				'label' => __('Button Text', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('SHOP NOW', 'cb-core'),
				'placeholder' => __('Type your button text here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->add_control(
			'btn_link_3',
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
					// 'custom_attributes' => '',
				],
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
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

Plugin::instance()->widgets_manager->register(new CB_Core_Banner_Ads());
