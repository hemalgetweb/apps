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
class CB_Core_Slider extends Widget_Base
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
		return 'cb-slider';
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
		return __('CB slider', 'cb-core');
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
			'section_weekend_product',
			[
				'label' => __('Weekend Product', 'cb-core'),
			]
		);
		$this->add_control(
			'section_weekend_product_select',
			[
				'label' => __('Select Product', 'cb-core'),
				'type' => Controls_Manager::SELECT2,
				'options' => apps_drop_posts('product'),
				'multiple' => false,
				'label_block' => true,
				'condition' => [
					'layout' => 'layout-3',
				],
			]
		);
		$this->add_control(
			'section_weekend_product_due_date',
			[
				'label' => __('Due Date', 'cb-core'),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
				'condition' => [
					'layout' => 'layout-3',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_slider_repeater',
			[
				'label' => __('Slider Repeater', 'cb-core'),
			]
		);
		$this->add_control(
			'facebook_url',
			[
				'label' => __('Facebook Link', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'condition' => [
					'layout' => ['layout-5'],
				],
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
			'twitter_url',
			[
				'label' => __('Twitter Link', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'condition' => [
					'layout' => ['layout-5'],
				],
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
			'instagram_url',
			[
				'label' => __('Instagram Link', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'condition' => [
					'layout' => ['layout-5'],
				],
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
			'bg_image',
			[
				'label' => __('Background Image', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout' => ['layout-2']
				],
			]
		);
		$this->add_control(
			'section_bg_image',
			[
				'label' => __('Background Image', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout' => ['layout-5']
				],
			]
		);
		$repeater = new Repeater();
		$repeater->start_controls_tabs('slide_tabs');
		// Content Tab
		$repeater->start_controls_tab('slide_content_tab', [
			'label' => __('Content', 'cb-core'),
		]);
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
			'bg_image',
			[
				'label' => __('Background Image', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-1']
				],
			]
		);
		$repeater->add_control(
			'slider_image',
			[
				'label' => __('Slider Image', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition' => ['style-2', 'style-3', 'style-4', 'style-5']
				],
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label' => __('Subtitle', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Sub title', 'cb-core'),
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3'],
				],
				'placeholder' => __('Type subtitle here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'title',
			[
				'label' => __('Title', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Title', 'cb-core'),
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5'],
				],
				'placeholder' => __('Type title here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'content',
			[
				'label' => __('Content', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'condition' => [
					'field_condition' => ['style-2', 'style-4', 'style-5']
				],
				'placeholder' => __('Type content here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'old_price',
			[
				'label' => __('Old Price', 'cb-core'),
				'label_block' => true,
				'default' => __('$0.00', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'field_condition' => ['style-1']
				],
				'placeholder' => __('Type your old price here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'new_price',
			[
				'label' => __('New Price', 'cb-core'),
				'label_block' => true,
				'default' => __('$0.00', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'field_condition' => ['style-1', 'style-3']
				],
				'placeholder' => __('Type your new price here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'btn_text',
			[
				'label' => __('Button Text', 'cb-core'),
				'label_block' => true,
				'default' => __('BUY NOW', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5'],
				],
				'placeholder' => __('Type your button text here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label' => __('Button Link', 'cb-core'),
				'type' => \Elementor\Controls_Manager::URL,
				'condition' => [
					'field_condition' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5'],
				],
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
		$repeater->end_controls_tab();
		// Style Tab
		$repeater->start_controls_tab('slide_style_tab', [
			'label' => __('Style', 'cb-core'),
		]);
		$repeater->add_control('custom_style', [
			'label'       => __('Custom', 'cb-core'),
			'type'        => Controls_Manager::SWITCHER,
			'description' => __('Set custom style that will only affect this specific slide.', 'cb-core'),
		]);
		// Title Style
		$repeater->add_control('content_style_wrapper', [
			'label'     => __('Wrapper', 'cb-core'),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'custom_style' => 'yes',
			],
		]);

		$repeater->add_responsive_control('text_align', [
			'label'                => __('Text Align', 'cb-core'),
			'label_block'          => true,
			'type'                 => Controls_Manager::CHOOSE,
			'options'              => \Widget_Utils::get_control_options_text_align(),
			'default'              => '',
			'selectors'            => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .apps-rv-slider-content' => 'text-align: {{VALUE}};',
			],
			'condition'            => [
				'custom_style' => 'yes',
			],
			'selectors_dictionary' => [
				'left'  => 'start',
				'right' => 'end',
			],
		]);
		// Title Style
		$repeater->add_control('content_style_heading', [
			'label'     => __('Content', 'cb-core'),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'custom_style' => 'yes',
			],
		]);
		$repeater->add_responsive_control('slide_wrapper_max_width', [
			'label'      => __('Max Width', 'cb-core'),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [
				'unit' => 'px',
			],
			'size_units' => ['px', '%'],
			'range'      => [
				'%'  => [
					'min' => 1,
					'max' => 100,
				],
				'px' => [
					'min' => 1,
					'max' => 1600,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .apps-rv-slider-content' => 'width: {{SIZE}}{{UNIT}};',
			],
			'condition'  => [
				'custom_style' => 'yes',
			],
		]);
		$repeater->add_responsive_control('slide_wrapper_padding', [
			'label'      => __('Padding', 'cb-core'),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => ['px', '%'],
			'selectors'  => [
				'body:not(.rtl) {{WRAPPER}} {{CURRENT_ITEM}} .apps-rv-slider-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'body.rtl {{WRAPPER}} {{CURRENT_ITEM}} .apps-rv-slider-content'       => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
			],
			'condition'  => [
				'custom_style' => 'yes',
			],
		]);
		// Title Style
		$repeater->add_control('title_style_heading', [
			'label'     => __('Title', 'cb-core'),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'custom_style' => 'yes',
			],
		]);
		$repeater->add_responsive_control('title_margin', [
			'label'      => __('Margin', 'cb-core'),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => ['px', '%'],
			'selectors'  => [
				'body:not(.rtl) {{WRAPPER}} {{CURRENT_ITEM}} .apps-rv-slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'body.rtl {{WRAPPER}} {{CURRENT_ITEM}} .apps-rv-slider-title'       => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
			],
			'condition'  => [
				'custom_style' => 'yes',
			],
		]);

		$repeater->add_group_control(Group_Control_Typography::get_type(), [
			'name'      => 'title_typography',
			'label'     => __('Typography', 'cb-core'),
			'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .apps-rv-slider-title',
			'condition' => [
				'custom_style' => 'yes',
			],
		]);

		$repeater->add_control('title_color', [
			'label'     => __('Color', 'cb-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .apps-rv-slider-title' => 'color: {{VALUE}};',
			],
			'condition' => [
				'custom_style' => 'yes',
			],
		]);
		$repeater->end_controls_tab();
		$this->add_control(
			'slides',
			[
				'label' => __('slider Lists', 'cb-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_side_products_repeater',
			[
				'label' => __('Right Side Repeater', 'cb-core'),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'field_condition_2',
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
		$repeater->add_control('box_bg_color', [
			'label'     => __('Box BG Color', 'cb-core'),
			'type'      => Controls_Manager::COLOR,
			'default'	=> '#FFF9F9',
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .apps-fz-hero-product-box-3' => 'background-color: {{VALUE}};',
			],
			'condition' => [
				'field_condition_2' => ['style-4'],
			]
		]);
		$repeater->add_control(
			'side_product_bg_image',
			[
				'label' => __('Product BG Image', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition_2' => ['style-3'],
				]
			]
		);
		$repeater->add_control(
			'side_product_image',
			[
				'label' => __('Product Image', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'field_condition_2' => ['style-3', 'style-4'],
				]
			]
		);
		$repeater->add_control(
			'discount_count',
			[
				'label' => __('Discount Count', 'cb-core'),
				'label_block' => true,
				'default' => __('30% Off', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'field_condition_2' => ['style-3', 'style-4'],
				],
				'placeholder' => __('Type your discount text here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'side_product_title',
			[
				'label' => __('Product Title', 'cb-core'),
				'label_block' => true,
				'default' => __('Watch The<br>Gains Add Up', 'cb-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'field_condition_2' => ['style-3', 'style-4'],
				],
				'placeholder' => __('Type your product title here', 'cb-core'),
			]
		);
		$repeater->add_control(
			'side_product_title_link',
			[
				'label' => __('Product URL', 'cb-core'),
				'label_block' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'type' => \Elementor\Controls_Manager::URL,
				'condition' => [
					'field_condition_2' => ['style-3', 'style-4'],
				],
				'placeholder' => __('Type your product link here', 'cb-core'),
			]
		);
		$this->add_control(
			'slides_2',
			[
				'label' => __('slider Lists', 'cb-core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ side_product_title }}}',
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

Plugin::instance()->widgets_manager->register(new CB_Core_Slider());
