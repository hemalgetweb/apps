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
class CB_Core_Best_Selling extends Widget_Base
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
		return 'cb-best-selling';
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
		return __('CB Best Selling Product', 'cb-core');
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
				],
				'default' => 'layout-1',
				'toggle' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_best_selling',
			[
				'label' => __('Best Selling', 'cb-core'),
			]
		);
		$this->add_control(
			'best_selling_title',
			[
				'label' => __('Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Best Selling', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3']
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
				'options' => apps_drop_cat('product_cat'),
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
				'options' => apps_drop_posts('product'),
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
			'best_selling_hero_slider',
			[
				'label' => __('Hero Slider', 'cb-core'),
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
				],
				'default' => 'style-1',
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'best_selling_image',
			[
				'label' => __('Choose Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-1']
				]
			]
		);
		$repeater->add_control(
			'best_selling_large_large',
			[
				'label' => __('Choose Image ( for large device )', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'field_condition' => ['style-1']
				]
			]
		);
		$repeater->add_control(
			'best_selling_image_mid',
			[
				'label' => __('Choose Image ( for medium device )', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'field_condition' => ['style-1']
				]
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label' => __('Sub Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Sub Title', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1']
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
					'field_condition' => ['style-1']
				]
			]
		);
		$repeater->add_control(
			'description',
			[
				'label' => __('Description', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Slider Description', 'cb-core'),
				'label_block' => true,
				'condition' => [
					'field_condition' => ['style-1']
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
					'field_condition' => ['style-1']
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
					'field_condition' => ['style-1']
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
					'field_condition' => ['style-1']
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
					'field_condition' => ['style-1']
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
			'section_title_color',
			[
				'label' => __('Product title Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apps-fz-section-title-6' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-2', 'layout-3']
				]
			]
		);
		$this->add_control(
			'nav_color',
			[
				'label' => __('Nav Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apps-fz-swiper-arrow-6 button i' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-2', 'layout-3']
				]
			]
		);
		$this->add_control(
			'nav_border_color',
			[
				'label' => __('Nav Border Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apps-fz-swiper-arrow-6 button' => 'border-color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-2', 'layout-3']
				]
			]
		);
		$this->add_control(
			'product_title_color',
			[
				'label' => __('Product title Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apps-fz-product-box-content-6 .apps-fz-product-title-6, {{WRAPPER}} .apps-fz-product-box-content-6 .apps-fz-product-title-6 a:hover' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-2', 'layout-3']
				]
			]
		);
		$this->add_control(
			'rating_color',
			[
				'label' => __('Rating Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apps-fz-product-rating-6 i' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-2', 'layout-3']
				]
			]
		);
		$this->add_control(
			'price_cart_color',
			[
				'label' => __('Price & Cart Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apps-fz-product-cart-btn-6, {{WRAPPER}} .apps-fz-product-price-regular-6' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-2', 'layout-3']
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
		$per_page = $settings['posts_per_page'];
		$cat = $settings['cat_query'];
		$id = $settings['id_query'];

		if ($settings['query_type'] == 'category') {
			$query_args = array(
				'post_type' => 'product',
				'posts_per_page' => $per_page,
				'hide_empty' => true,
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
		$this->add_inline_editing_attributes( 'heading', 'advanced' );
?>

        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
	}
}

Plugin::instance()->widgets_manager->register(new CB_Core_Best_Selling());
