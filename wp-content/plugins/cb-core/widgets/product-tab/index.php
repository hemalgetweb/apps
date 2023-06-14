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
class CB_Core_Woo_Product_Tab extends Widget_Base
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
		return 'cb-woo-product-tab';
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
		return __('CB Woo Product Tab', 'cb-core');
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
		$this->start_controls_section('section_tab_content', [
			'label' => __('Tab Content', 'cb-core')
		]);
		$this->add_control(
			'section_title',
			[
				'label' => __('Section Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Products', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
		'btn_text',
		 [
			'label'       => esc_html__( 'Button Text', 'cb-core' ),
			'type'        => \Elementor\Controls_Manager::TEXT,
			'default'     => esc_html__( 'All Products', 'cb-core' ),
			'placeholder' => esc_html__( 'Button Text', 'cb-core' ),
			'label_block' => true,
			'condition' => [
				'layout' => ['layout-1']
			]
		 ]
		);
		$this->add_control(
			'btn_link',
			[
			'label'   => esc_html__( 'Button Link', 'cb-core' ),
			'type'        => \Elementor\Controls_Manager::URL,
			'default'     => [
				'url'               => '#',
				'is_external'       => true,
				'nofollow'          => true,
				'custom_attributes' => '',
				],
				'placeholder' => esc_html__( 'Button Link', 'cb-core' ),
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-1']
				]
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
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'cb-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'theme_color',
			[
				'label' => __('Theme Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .panel .nav button.active, {{WRAPPER}} .single-product-card .cart-option ul li a:hover,
					{{WRAPPER}} .single-product-card .part-txt .product-name a:hover,
					{{WRAPPER}} .cart-option.cart-option-bottom .ayaa-action-wishlist-btn button.woosw-btn:hover::after,
					{{WRAPPER}} .cart-option.cart-option-bottom .ayaa-action-compare-btn .woosc-btn:hover::after
					' => 'color: {{VALUE}}',
					'{{WRAPPER}} .panel .panel-header::after,
					{{WRAPPER}} .single-product-card .part-img .off-tag
					' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .single-product-card .cart-option.cart-option-bottom button.woosq-btn:hover::after' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' => __('Section Title Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .featured-product-area .ayaa-fz-section-title-6' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'menu_item_color',
			[
				'label' => __('Menu Item Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-featured-product-tab-nav-6 .nav-tabs .nav-link' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'menu_item_color_active',
			[
				'label' => __('Menu Item Color Active', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-featured-product-tab-nav-6 .nav-tabs .nav-link.active' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'product_title_color',
			[
				'label' => __('Product title Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-product-box-content-6 .ayaa-fz-product-title-6, {{WRAPPER}} .ayaa-fz-product-box-content-6 .ayaa-fz-product-title-6 a:hover' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'rating_color',
			[
				'label' => __('Rating Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-product-rating-6 i' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'price_cart_color',
			[
				'label' => __('Price & Cart Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-product-cart-btn-6, {{WRAPPER}} .ayaa-fz-product-price-regular-6' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'shop_more_btn_color',
			[
				'label' => __('Show More Button Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-rect-transparent-btn-6' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __('Button BG Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-rect-transparent-btn-6' => 'background-color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'btn_border_color',
			[
				'label' => __('Button Border Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-rect-transparent-btn-6' => 'border-color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'btn_hover_color',
			[
				'label' => __('Button Hover Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-rect-transparent-btn-6:hover' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'btn_hover_border_color',
			[
				'label' => __('Button Hover Border Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-rect-transparent-btn-6:hover' => 'border-color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'btn_hover_bg_color',
			[
				'label' => __('Button Hover BG Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-rect-transparent-btn-6:hover' => 'background-color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-1']
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
	protected function render() {
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

Plugin::instance()->widgets_manager->register(new CB_Core_Woo_Product_Tab());
