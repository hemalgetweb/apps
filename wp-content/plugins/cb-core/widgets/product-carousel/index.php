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
class CB_Core_Product_Carousel extends Widget_Base
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
		return 'cb-product-carousel';
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
		return __('CB Product Carousel', 'cb-core');
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
			'section_product_carousel',
			[
				'label' => __('Product Carousel', 'cb-core'),
			]
		);

		$this->add_control(
			'product_carousel_subtitle',
			[
				'label' => __('Sub Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Featured', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-5']
				]
			]
		);
		$this->add_control(
			'product_carousel_title',
			[
				'label' => __('Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Product Carousel', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5']
				]
			]
		);
		$this->add_control(
			'product_carousel_desc',
			[
				'label' => __('Short Description', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Select Your Wonderful Product in Ayaa', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-3', 'layout-4']
				]
			]
		);
		$this->add_control(
			'show_carousel_arrow',
			[
				'label' => __('Show Carousel Arrow', 'cb-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'cb-core'),
				'label_off' => __('Hide', 'cb-core'),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4']
				]
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => __('Button text', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('MORE PRODUCTS', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
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
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'query_type',
			[
				'label' => __('Query type', 'cb-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'individual',
				'options' => [
					'category' => __('Category', 'cb-core'),
					'individual' => __('Individual', 'cb-core'),
				],
			]
		);
		$this->add_control(
			'cat_query',
			[
				'label' => __('Category', 'cb-core'),
				'type' => Controls_Manager::SELECT2,
				'options' => ayaa_drop_cat('product_cat'),
				'multiple' => true,
				'label_block' => true,
				'condition' => [
					'query_type' => 'category',
				],
			]
		);
		$this->add_control(
			'id_query',
			[
				'label' => __('Posts', 'cb-core'),
				'type' => Controls_Manager::SELECT2,
				'options' => ayaa_drop_posts('product'),
				'multiple' => true,
				'label_block' => true,
				'condition' => [
					'query_type' => 'individual',
				],
			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label' => __('Posts Per Page', 'cb-core'),
				'type' => Controls_Manager::NUMBER,
				'default' => 8,
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

		$settings = $this->get_settings();
		$per_page = $settings['posts_per_page'];
		$cat = $settings['cat_query'];
		$id = $settings['id_query'];
		if ($settings['query_type'] == 'category') {
			$query_args = array(
				'post_type' => 'product',
				'posts_per_page' => $per_page,
				'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field' => 'term_id',
						'terms' => $cat,
					),
				),
			);
		}
		if ($settings['query_type'] == 'individual') {
			$query_args = array(
				'post_type' => 'product',
				'posts_per_page' => $per_page,
				'post__in' => $id,
				'orderby' => 'post__in'
			);
		}
		$wp_query = new \WP_Query($query_args);
		global $product;
?>

        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
	}
}

Plugin::instance()->widgets_manager->register(new CB_Core_Product_Carousel());
