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
class CB_Core_Woo_Category_Grid extends Widget_Base
{

	public function apps_get_all_product_cat_list()
	{
		$product_cat_lists = get_terms('product_cat', array(
			'hide_empty' => true,
		));
		$product_cat_list_arr[] = '';
		if ($product_cat_lists) {
			foreach ($product_cat_lists as $index => $list) {
				$product_cat_list_arr[] .= $list->term_id;
			}
		}
		return $product_cat_list_arr;
	}

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
		return 'cb-woo-category-grid';
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
		return __('CB Category Grid', 'cb-core');
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
		$this->add_control(
			'banner_title',
			[
				'label' => __('Banner Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Banner Title', 'cb-core'),
				'placeholder' => __('Type your banner title here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->add_control(
			'banner_subtitle',
			[
				'label' => __('Banner Subtitle', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Banner Subtitle', 'cb-core'),
				'placeholder' => __('Type your banner subtitle here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1']
				]
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_select_category_grid',
			[
				'label' => __('Category Control')
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => __('Section Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Default title', 'cb-core'),
				'placeholder' => __('Explore Popular Categories', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4']
				]
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label' => __('Section Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Default title', 'cb-core'),
				'placeholder' => __('Explore Popular Categories', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4']
				]
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => __('Button Text', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('View more', 'cb-core'),
				'placeholder' => __('Type Button Text Here...', 'cb-core'),
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
			'placeholder_image',
			[
				'label' => __('Choose Placeholder Image ( optional )', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
				'options' => apps_drop_cat('product_cat'),
				'multiple' => true,
				'label_block' => true,
			]
		);
		$this->add_control(
			'cat_query_2',
			[
				'label' => __('Category 2', 'cb-core'),
				'type' => Controls_Manager::SELECT2,
				'options' => apps_drop_cat('product_cat'),
				'multiple' => true,
				'label_block' => true,
				'condition' => ['layout' => 'layout-3']
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
			'text_border_color',
			[
				'label' => __('Border Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .panel .panel-header:after' => 'background-color: {{VALUE}}',
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
		$cat_lists = $settings['cat_query'];
		$cat_lists_2 = $settings['cat_query_2'];
		if (!empty($cat_lists)) {
			$cat_lists = $cat_lists;
		} else {
			$cat_lists = $this->apps_get_all_product_cat_list();
		}
		if (!empty($cat_lists_2)) {
			$cat_lists_2 = $cat_lists_2;
		} else {
			$cat_lists_2 = $this->apps_get_all_product_cat_list();
		}
?>

        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
	}
}

Plugin::instance()->widgets_manager->register(new CB_Core_Woo_Category_Grid());
