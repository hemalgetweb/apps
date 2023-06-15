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
class CB_Core_Top_Rated extends Widget_Base
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
        return 'cb-top-rated';
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
        return __('CB Top Rated Product', 'cb-core');
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
            'section_top_rated_left_selling',
            [
                'label' => __('Left Products', 'cb-core'),
            ]
        );
        $this->add_control(
            'top_rated_title',
            [
                'label' => __('Top Rated', 'cb-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Flash Sale Today!', 'cb-core'),
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
            'section_top_rated_right_selling',
            [
                'label' => __('Right Products', 'cb-core'),
            ]
        );
        $this->add_control(
            'query_type_2',
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
            'cat_query_2',
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
            'id_query_2',
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
            'posts_per_page_2',
            [
                'label' => __('Posts Per Page', 'cb-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_top_best_sellar_3',
            [
                'label' => __('Best Seller', 'cb-core'),
            ]
        );
        $this->add_control(
            'best_sellar_section_title',
            [
                'label' => __('Best Sellar Title', 'cb-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Best Seller', 'cb-core'),
                'label_block' => true,
                'condition' => [
                    'layout' => ['layout-1']
                ]
            ]
        );
        $this->add_control(
            'query_type_3',
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
            'cat_query_3',
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
            'id_query_3',
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
            'posts_per_page_3',
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
            'border_color',
            [
                'label' => __('Border Color', 'cb-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .panel .panel-header:after' => 'background: {{VALUE}}',
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
        // property 1
        $settings = $this->get_settings();
        $per_page = $settings['posts_per_page'];
        $cat = $settings['cat_query'];
        $id = $settings['id_query'];
        // property 2
        $per_page_2 = $settings['posts_per_page_2'];
        $cat_2 = $settings['cat_query_2'];
        $id_2 = $settings['id_query_2'];
        // property 3
        $per_page_3 = $settings['posts_per_page_3'];
        $cat_3 = $settings['cat_query_3'];
        $id_3 = $settings['id_query_3'];
        // query 1
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
        // query 2
        if ($settings['query_type_2'] == 'category') {
            $query_args_2 = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page_2,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $cat_2,
                    ),
                ),
            );
        }

        if ($settings['query_type_2'] == 'individual') {
            $query_args_2 = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page_2,
                'post__in' => $id_2,
                'orderby' => 'post__in'
            );
        }
        // query 3
        if ($settings['query_type_3'] == 'category') {
            $query_args_3 = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page_3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $cat_3,
                    ),
                ),
            );
        }

        if ($settings['query_type_3'] == 'individual') {
            $query_args_3 = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page_3,
                'post__in' => $id_3,
                'orderby' => 'post__in'
            );
        }

        $wp_query = new \WP_Query($query_args);
        $wp_query_2 = new \WP_Query($query_args_2);
        $wp_query_3 = new \WP_Query($query_args_3);
?>

        <?php include dirname(__FILE__) . '/' . $settings['layout'] . '.php';
    }
}

Plugin::instance()->widgets_manager->register(new CB_Core_Top_Rated());
