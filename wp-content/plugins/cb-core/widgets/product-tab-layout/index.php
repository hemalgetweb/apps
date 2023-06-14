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
class CB_Core_Woo_Product_Tab_Layout extends Widget_Base
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
		return 'cb-woo-product-tab-layout';
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
		return __('CB Product Tab Layout', 'cb-core');
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
		$this->cb_core_select_layout();
		$this->add_countdown_section();
		$this->cb_core_section_style();
	}

	private function add_countdown_section()
	{
		$this->start_controls_section('countdown_section', [
			'label' => __('Product Tab', 'cb-core'),
		]);
		$this->add_control('section_title', [
			'label'   => __('Title', 'cb-core'),
			'type'    => Controls_Manager::TEXT,
			'dynamic' => [
				'active' => true,
			],
			'default' => __('Featured Product', 'cb-core'),
		]);
		$this->add_control('section_short_desc', [
			'label'   => __('Short Description', 'cb-core'),
			'type'    => Controls_Manager::TEXT,
			'dynamic' => [
				'active' => true,
			],
			'default' => __('Select Your Wonderful Product in Ayaa', 'cb-core'),
			'condition' => ['layout' => ['layout-2', 'layout-3']]
		]);
		$this->add_control(
			'cat_query',
			[
				'label' => __('Category', 'cb-core'),
				'type' => Controls_Manager::SELECT2,
				'options' => ayaa_drop_cat('product_cat'),
				'multiple' => true,
				'label_block' => true,
			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label' => __('Posts Per Page', 'cb-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => -1,
			]
		);
		$this->add_control('btn_title', [
			'label'   => __('Button Title', 'cb-core'),
			'type'    => Controls_Manager::TEXT,
			'dynamic' => [
				'active' => true,
			],
			'default' => __('Shop Now', 'cb-core'),
			'condition' => ['layout' => 'layout-1']
		]);
		$this->add_control(
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
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->end_controls_section();
	}
	private function cb_core_section_style()
	{
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
	private function cb_core_select_layout()
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
				],
				'default' => 'layout-1',
				'toggle' => true,
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
		$cat = $settings['cat_query'];
		$query_args = array(
			'post_type' => 'product',
			'posts_per_page' => $settings['posts_per_page'],
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'term_id',
					'terms' => $cat,
				),
			),
		);
		$wp_query = new \WP_Query($query_args);
		global $product;
?>

        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
	}
}

Plugin::instance()->widgets_manager->register(new CB_Core_Woo_Product_Tab_Layout());
