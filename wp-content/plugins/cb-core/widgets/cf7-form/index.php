<?php

namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use ELementor\Repeater;

if (!defined('ABSPATH')) exit; // Exit if accessed directly and CF7 Not install

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
					'layout-2' => __('Layout 2', 'cb-core')
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
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->add_control(
			'section_subtitle',
			[
				'label' => __('Section Sub Title', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('We are excited to get to know more about you, your business, and your needs! ', 'cb-core'),
				'placeholder' => __('Type your subtitle here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' => __('Section Content', 'cb-core'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __('Type your content here', 'cb-core'),
				'condition' => [
					'layout' => ['layout-2']
				]
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
		 'field_condition',
		 [
		   'label'   => esc_html__( 'Field Condition', 'cb-core' ),
		   'type' => \Elementor\Controls_Manager::SELECT,
		   'options' => [
			 'style-1'  => esc_html__( 'Style 1', 'cb-core' ),
			 'style-2'  => esc_html__( 'Style 2', 'cb-core' ),
		   ],
		   'default' => 'style-1',
		 ]
		);
		 $repeater->add_control(
		 'address_repeater_title',
		   [
			 'label'   => esc_html__( 'Repeater title', 'cb-core' ),
			 'type'        => \Elementor\Controls_Manager::TEXT,
			 'label_block' => true,
			 'condition' => [
				'field_condition' => ['style-2']
			 ]
		   ]
		 );
		 $repeater->add_control(
		 'address_repeater_content',
		   [
			 'label'   => esc_html__( 'Repeater Content', 'cb-core' ),
			 'type'        => \Elementor\Controls_Manager::TEXTAREA,
			 'label_block' => true,
			 'condition' => [
				'field_condition' => ['style-2']
			 ]
		   ]
		 );
		 
		 $this->add_control(
		   'slides',
		   [
			 'label'       => esc_html__( 'Address Repeater', 'cb-core' ),
			 'type'        => \Elementor\Controls_Manager::REPEATER,
			 'fields'      => $repeater->get_controls(),
			 'title_field' => '{{{ address_repeater_title }}}',
		   ]
		 );
		 $this->add_control(
		 'email_text',
		  [
			 'label'       => esc_html__( 'Email Text', 'cb-core' ),
			 'type'        => \Elementor\Controls_Manager::TEXT,
			 'default'     => esc_html__( 'hello@wadialbada.com', 'cb-core' ),
			 'placeholder' => esc_html__( 'Email Text', 'cb-core' ),
			 'condition' => [
				'layout' => ['layout-2']
			 ]
		  ]
		 );
		 $this->add_control(
		 'email_link',
		  [
			 'label'       => esc_html__( 'Email Link', 'cb-core' ),
			 'type'        => \Elementor\Controls_Manager::TEXT,
			 'default'     => esc_html__( 'hello@wadialbada.com', 'cb-core' ),
			 'placeholder' => esc_html__( 'Email Link', 'cb-core' ),
			 'condition' => [
				'layout' => ['layout-2']
			 ]
		  ]
		 );
		 $this->add_control(
			'number_text',
			 [
				'label'       => esc_html__( 'Number Text', 'cb-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( '(307) 555-0133', 'cb-core' ),
				'placeholder' => esc_html__( 'Number Text', 'cb-core' ),
				'condition' => [
				   'layout' => ['layout-2']
				]
			 ]
		);
		$this->add_control(
			'number_link',
			 [
				'label'       => esc_html__( 'Number Link', 'cb-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( '307555-0133', 'cb-core' ),
				'placeholder' => esc_html__( 'Number Link', 'cb-core' ),
				'condition' => [
				   'layout' => ['layout-2']
				]
			 ]
		);

		
		$this->add_control(
			'number_text2',
			 [
				'label'       => esc_html__( 'Number Text 2', 'cb-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( '(307) 555-0133', 'cb-core' ),
				'placeholder' => esc_html__( 'Number Text', 'cb-core' ),
				'condition' => [
				   'layout' => ['layout-2']
				]
			 ]
		);
		$this->add_control(
			'number_link2',
			 [
				'label'       => esc_html__( 'Number Link 2', 'cb-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( '307555-0133', 'cb-core' ),
				'placeholder' => esc_html__( 'Number Link', 'cb-core' ),
				'condition' => [
				   'layout' => ['layout-2']
				]
			 ]
		);

		$this->add_control(
			'cf7_image',
			[
				'label' => __('Image', 'cb-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'layout' => ['layout-1']
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
		'cf7_section_title',
		 [
			'label'       => esc_html__( 'Form Title', 'cb-core' ),
			'type'        => \Elementor\Controls_Manager::TEXT,
			'placeholder' => esc_html__( 'Form Title', 'cb-core' ),
			'label_block' => true,
			'condition' => [
				'layout' => ['layout-2']
			]
		 ]
		);
		$this->add_control(
		'cf7_section_content',
		 [
			'label'       => esc_html__( 'Form Content', 'cb-core' ),
			'type'        => \Elementor\Controls_Manager::TEXTAREA,
			'placeholder' => esc_html__( 'Form Content', 'cb-core' ),
			'condition' => [
				'layout' => ['layout-2']
			]
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
