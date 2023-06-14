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
class CB_Core_Blog extends Widget_Base
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
		return 'cb-blog';
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
		return __('CB Blog', 'cb-core');
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
	private function cb_fetch_all_posts()
	{
	}
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
					'layout-8' => __('Layout 8', 'cb-core'),
				],
				'default' => 'layout-1',
				'toggle' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_blog_control',
			[
				'label' => __('Blog Control', 'cb-core'),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => __('Section Title', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('LATEST BLOG', 'cb-core'),
				'placeholder' => __('Type your blog title here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8']
				]
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label' => __('Section Subtitle', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Blog', 'cb-core'),
				'placeholder' => __('Type your blog subtitle here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-6']
				]
			]
		);
		$this->add_control(
			'section_description',
			[
				'label' => __('Section Description', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __('Type your section description here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-5', 'layout-7']
				]
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => __('Button Text', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('More News', 'cb-core'),
				'placeholder' => __('Type your button text here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-3', 'layout-4', 'layout-5', 'layout-7']
				]
			]
		);
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
					'layout' => ['layout-3', 'layout-4', 'layout-5', 'layout-7']
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
				'options' => cb_drop_posts('category'),
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
				'options' => cb_drop_posts('post'),
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
				'default' => 5,
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
			'blog_wrapper_border_color',
			[
				'label' => __('Blog Wrapper Border Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-news-inner-main-wrapper-6' => 'border-color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'section_title_color',
			[
				'label' => __('Theme Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-section-title-6' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'meta_color',
			[
				'label' => __('Meta Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-news-blog-meta-6, {{WRAPPER}}  .ayaa-fz-news-blog-meta-6 a' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'meta_hover_color',
			[
				'label' => __('Meta Hover Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-news-blog-meta-6:hover, {{WRAPPER}}  .ayaa-fz-news-blog-meta-6 a:hover' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'blog_title_color',
			[
				'label' => __('Blog Title Color', 'cb-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ayaa-fz-news-blog-content-6 .title' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => ['layout-8']
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
				'post_type' => 'post',
				'posts_per_page' => $per_page,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $cat,
					),
				),
			);
		}

		if ($settings['query_type'] == 'individual') {
			$query_args = array(
				'post_type' => 'post',
				'posts_per_page' => $per_page,
				'post__in' => $id,
				'orderby' => 'post__in'
			);
		}

		$wp_query = new \WP_Query($query_args);
		$myname = 'hemal';
?>

        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
	}
}

Plugin::instance()->widgets_manager->register(new CB_Core_Blog());
