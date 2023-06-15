<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use ELementor\Repeater;

if (!defined('ABSPATH') && !function_exists('wpcf7_init')) exit; // Exit if accessed directly and CF7 Not install

/**
 * CB Core Demo
 *
 * CB Core widget for Demo.
 *
 * @since 1.0.0
 */
class CB_Core_CF7_Form extends Widget_Base
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
		return 'cb-cf7-form';
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
		return __('CB CF7 Form', 'cb-core');
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
					'layout-7' => __('Layout 7', 'cb-core'),
					'layout-8' => __('Layout 8', 'cb-core'),
				],
				'default' => 'layout-1',
				'toggle' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'_section_cf7',
			[
				'label' => cb_core_is_cf7_activated() ? __('Contact Form 7', 'cb-core') : __('Missing Notice', 'cb-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => __('Section Title', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Get Weeky & Offer Daily News', 'cb-core'),
				'placeholder' => __('Type your title here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8']
				]
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label' => __('Section Subtitle', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Ecommerce websites are built to connect shoppers to products or services
				for trading online service.', 'cb-core'),
				'placeholder' => __('Type your subtitle here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7']
				]
			]
		);
		$this->add_control(
			'section_description',
			[
				'label' => __('Section Description', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Type your description here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-7']
				]
			]
		);
		$this->add_control(
			'section_product_select',
			[
				'label' => __('Select Product', 'cb-core'),
				'type' => Controls_Manager::SELECT2,
				'options' => apps_drop_posts('product'),
				'multiple' => false,
				'label_block' => true,
				'condition' => [
					'layout' => 'layout-7',
				],
			]
		);
		$this->add_control(
			'cta_icon',
			[
				'label' => __('Icon', 'cb-core'),
				'label' => __('Please select an icon', 'cb-core'),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-3', 'layout-4']
				]
			]
		);
		$this->add_control(
			'cf7_bg_image',
			[
				'label' => __('Background Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-1', 'layout-2', 'layout-3', 'layout-5', 'layout-6']
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'cf7_font_image',
			[
				'label' => __('Front Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-3', 'layout-7']
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'cta_video_id',
			[
				'label' => __('Video ID ( youtube )', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('SwZynNzqBys', 'cb-core'),
				'placeholder' => __('Type your subtitle here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7']
				]
			]
		);
		if (!cb_core_is_cf7_activated()) {
			$this->add_control(
				'_cf7_missing_notice',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => sprintf(
						__('Hello %2$s, looks like %1$s is missing in your site. Please click on the link below and install/activate %1$s. Make sure to refresh this page after installation or activation.', 'cb-core'),
						'<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term'))
							. '" target="_blank" rel="noopener">Contact Form 7</a>',
						cb_core_get_current_user_display_name()
					),
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
				]
			);

			$this->add_control(
				'_cf7_install',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term')) . '" target="_blank" rel="noopener">Click to install or activate Contact Form 7</a>',
				]
			);
			$this->end_controls_section();
			return;
		}

		$this->add_control(
			'form_id',
			[
				'label' => __('Select Your Form', 'cb-core'),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => ['' => __('', 'cb-core')] + \cb_core_get_cf7_forms(),
			]
		);
		$this->add_control(
			'html_class',
			[
				'label' => __('HTML Class', 'cb-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'description' => __('Add CSS custom class to the form.', 'cb-core'),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'_section_contact_touch_widget',
			[
				'label' => __('Touch Widget', 'cb-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'_touch_title',
			[
				'label'       => __('Title', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __('Get in Touch', 'cb-core'),
				'placeholder' => __('Title here', 'cb-core'),
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'_touch_address',
			[
				'label'       => __('Address', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __('989 Bel Meadow Drive Los Angeles, CA 90017, USA', 'cb-core'),
				'placeholder' => __('Title here', 'cb-core'),
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'_touch_number_text_1',
			[
				'label'       => __('Number', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __('(+1) 909-407-2988', 'cb-core'),
				'placeholder' => __('Number here', 'cb-core'),
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'_touch_number_link',
			[
				'label'   => __('Number Link', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::URL,
				'default'     => [
					'url'               => '#',
					'is_external'       => true,
					'nofollow'          => true,
					'custom_attributes' => '',
				],
				'placeholder' => __('Number Link', 'cb-core'),
				'label_block' => true,
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'_touch_number_text_2',
			[
				'label'       => __('Number 2', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __('(+1) 909-407-2988', 'cb-core'),
				'placeholder' => __('Number here', 'cb-core'),
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'_touch_number_link_2',
			[
				'label'   => __('Number Link 2', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::URL,
				'default'     => [
					'url'               => '#',
					'is_external'       => true,
					'nofollow'          => true,
					'custom_attributes' => '',
				],
				'placeholder' => __('Number Link', 'cb-core'),
				'label_block' => true,
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'_office_hourse_label',
			[
				'label'       => __('Office Hours Label', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __('Stor Hours:', 'cb-core'),
				'placeholder' => __('Office Hours Label', 'cb-core'),
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'_office_hourse_value',
			[
				'value'       => __('Office Hours Value', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __('Mon - Sat : 8:00am - 5:00pm', 'cb-core'),
				'placeholder' => __('Office Hourse Value', 'cb-core'),
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'fb_link',
			[
				'label'   => __('Facebook Link', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::URL,
				'default'     => [
					'url'               => '#',
					'is_external'       => true,
					'nofollow'          => true,
					'custom_attributes' => '',
				],
				'placeholder' => __('Facebook Link', 'cb-core'),
				'label_block' => true,
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'twitter_link',
			[
				'label'   => __('Twitter Link', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::URL,
				'default'     => [
					'url'               => '#',
					'is_external'       => true,
					'nofollow'          => true,
					'custom_attributes' => '',
				],
				'placeholder' => __('Twitter Link', 'cb-core'),
				'label_block' => true,
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'instagram_link',
			[
				'label'   => __('Instagram Link', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::URL,
				'default'     => [
					'url'               => '#',
					'is_external'       => true,
					'nofollow'          => true,
					'custom_attributes' => '',
				],
				'placeholder' => __('Instagram Link', 'cb-core'),
				'label_block' => true,
				'condition'   => [
					'layout' => ['layout-8']
				]
			]
		);
		$this->add_control(
			'youtube_link',
			[
				'label'   => __('Youtube Link', 'cb-core'),
				'type'        => \Elementor\Controls_Manager::URL,
				'default'     => [
					'url'               => '#',
					'is_external'       => true,
					'nofollow'          => true,
					'custom_attributes' => '',
				],
				'placeholder' => __('Youtube Link', 'cb-core'),
				'label_block' => true,
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render the widget oucbut on the frontend.
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

Plugin::instance()->widgets_manager->register(new CB_Core_Cf7_Form());
