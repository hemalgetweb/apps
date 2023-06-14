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
class CB_Core_Team extends Widget_Base
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
    return 'cb-team';
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
    return __('CB Team', 'cb-core');
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
      '_section_team_content',
      [
        'label' => __('Team Content', 'cb-core'),
      ]
    );
    $this->add_control(
      'testimonial_heading',
      [
        'label'       => __('Testimonial Heading', 'cb-core'),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'default'     => __('Our Team Member', 'cb-core'),
        'placeholder' => __('Heading', 'cb-core'),
        'condition' => [
          'layout' => ['layout-1']
        ]
      ]
    );
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
      'field_condition',
      [
        'label' => __('Field Condition', 'cb-core'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'solid',
        'options' => [
          'style-1'  => __('Style 1', 'cb-core'),
        ],
        'default' => 'style-1'
      ]
    );

    $repeater->add_control(
      'member_img',
      [
        'label'   => __('Member Image', 'cb-core'),
        'type'    => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'condition' => [
          'field_condition' => ['style-1']
        ]
      ]
    );

    $repeater->add_control(
      'member_name',
      [
        'label'       => __('Member Name', 'cb-core'),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'default'     => __('Marlic Alisa', 'cb-core'),
        'placeholder' => __('Placeholder Text', 'cb-core'),
        'condition' => [
          'field_condition' => ['style-1']
        ]
      ]
    );
    $repeater->add_control(
      'member_designation',
      [
        'label'       => __('Member Designation', 'cb-core'),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'default'     => __('Founder', 'cb-core'),
        'placeholder' => __('Placeholder Text', 'cb-core'),
        'condition' => [
          'field_condition' => ['style-1']
        ]
      ]
    );
    $repeater->add_control(
      'fb_url',
      [
        'label'   => __('Facebook URL', 'cb-core'),
        'type'        => \Elementor\Controls_Manager::URL,
        'default'     => [
          'url'               => '#',
          'is_external'       => true,
          'nofollow'          => true,
          'custom_attributes' => '',
        ],
        'placeholder' => __('Facebook URL', 'cb-core'),
        'label_block' => true,
        'condition' => [
          'field_condition' => ['style-1']
        ]
      ]
    );
    $repeater->add_control(
      'twitter_url',
      [
        'label'   => __('Twitter URL', 'cb-core'),
        'type'        => \Elementor\Controls_Manager::URL,
        'default'     => [
          'url'               => '#',
          'is_external'       => true,
          'nofollow'          => true,
          'custom_attributes' => '',
        ],
        'placeholder' => __('Twitter URL', 'cb-core'),
        'label_block' => true,
        'condition' => [
          'field_condition' => ['style-1']
        ]
      ]
    );
    $repeater->add_control(
      'linkedin_url',
      [
        'label'   => __('LinkedIn URL', 'cb-core'),
        'type'        => \Elementor\Controls_Manager::URL,
        'default'     => [
          'url'               => '#',
          'is_external'       => true,
          'nofollow'          => true,
          'custom_attributes' => '',
        ],
        'placeholder' => __('LinkedIn URL', 'cb-core'),
        'label_block' => true,
        'condition' => [
          'field_condition' => ['style-1']
        ]
      ]
    );
    $repeater->add_control(
      'insta_url',
      [
        'label'   => __('Instagram URL', 'cb-core'),
        'type'        => \Elementor\Controls_Manager::URL,
        'default'     => [
          'url'               => '#',
          'is_external'       => true,
          'nofollow'          => true,
          'custom_attributes' => '',
        ],
        'placeholder' => __('Instagram URL', 'cb-core'),
        'label_block' => true,
        'condition' => [
          'field_condition' => ['style-1']
        ]
      ]
    );
    $this->add_control(
      'slides',
      [
        'label'       => __('Section Label', 'Text-domain'),
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'fields'      => $repeater->get_controls(),
        'title_field' => '{{{ member_name }}}',
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
      'section_title_border',
      [
        'label' => __('Section Title Border Color', 'cb-core'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .heading h2:after' => 'background: {{VALUE}}',
        ],
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

    Plugin::instance()->widgets_manager->register(new CB_Core_Team());
