<?php

namespace Elementor;

use Elementor\Widget_Base;

if (!defined('ABSPATH'))
  exit; // Exit if accessed directly

/**
 * CB Core Demo
 *
 * CB Core widget for Demo.
 *
 * @since 1.0.0
 */
class CB_Core_Statement extends Widget_Base
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
    return 'cb-statement';
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
    return __('CB Statement', 'cb-core');
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
    $this->start_controls_section(
      '_section_about_content',
      [
        'label' => __('About Content', 'cb_core'),
      ]
    );
    $this->add_control(
      'about_image',
      [
        'label' => __('About Image', 'cb-core'),
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
      'about_subtitle',
      [
        'label' => esc_html__('About Subtitle', 'cb-core'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Why Us', 'cb-core'),
        'placeholder' => esc_html__('About Subtitle', 'cb-core'),
        'label_block' => true,
        'condition' => [
          'layout' => ['layout-1']
        ]
      ]
    );
    $this->add_control(
      'statement_title',
      [
        'label' => esc_html__('Statement Title', 'cb-core'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('CEO’s Statement', 'cb-core'),
        'placeholder' => esc_html__('CEO’s Statement', 'cb-core'),
        'label_block' => true,
        'condition' => [
          'layout' => ['layout-1']
        ]
      ]
    );

    $this->add_control(
      'statement_inner_title',
      [
        'label' => esc_html__('Statement Inner Title', 'cb-core'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Assalamu Alaikum', 'cb-core'),
        'placeholder' => esc_html__('Statement Inner Title', 'cb-core'),
        'label_block' => true,
        'condition' => [
          'layout' => ['layout-1']
        ]
      ]
    );

    $this->add_control(
      'statement_image',
      [
        'label' => __('Statement Image', 'cb-core'),
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
      'statement_description',
      [
        'label' => esc_html__('Statement Description', 'cb-core'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => esc_html__('Statement description', 'cb-core'),
        'placeholder' => esc_html__('Type your Statement Description', 'cb-core'),
        'condition' => [
          'layout' => ['layout-1']
        ]
      ]
    );

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

Plugin::instance()->widgets_manager->register(new CB_Core_Statement());