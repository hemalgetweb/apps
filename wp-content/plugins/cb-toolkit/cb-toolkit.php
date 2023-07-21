<?php 
if ( !defined('ABSPATH') ) { 
    exit;
}

/*
Plugin Name: CB Toolkit
Plugin URI: https://farzaawp.codebasket.net/wp-content/plugins/cb-toolkit.zip
Description: CB Toolkit Plugin
Version: 1.0.0
Author: CodeBasket
Author URI: https://themeforest.net/user/codebasket/portfolio
*/

// declare constructors
define( 'CB_TOOLKIT_VER', '1.0.0' );
define( 'CB_TOOLKIT_DIR', plugin_dir_path( __FILE__ ) );
define( 'CB_TOOLKIT_URL', plugin_dir_url( __FILE__ ) );
define("PLUGIN_URL", plugins_url());

final class CB_toolkit {
	private static $instance;
	function __construct() {
		add_action('plugins_loaded', [$this, 'init']);
		add_action( 'init', [$this, 'cb_load_plugin_textdomain'] );
		add_action('admin_enqueue_scripts', [$this, 'toolkit_admin_scripts']);
	}
	public function init() {
		require_once CB_TOOLKIT_DIR . '/inc/one-click-demo-importer/one_click_demo_importer.php';
		require_once CB_TOOLKIT_DIR . '/inc/class-cb-kirki.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-service-cat-list.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-post-cat-list.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-contact.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-banner.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-subscribe.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-subscribe-2.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-question.php';
		require_once CB_TOOLKIT_DIR . '/inc/cb-toolkit-functions.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-latest-post-sidebar.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-post-tag-list.php';
		require_once CB_TOOLKIT_DIR . '/widgets/widget-social.php';
		if(function_exists( 'Kirki' )) {
			require_once CB_TOOLKIT_DIR . '/inc/kirki-customizer.php';
		}
	}
	// Load textdomain
	function cb_load_plugin_textdomain() {
		load_plugin_textdomain( 'cb-toolkit', false, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
	function toolkit_admin_scripts() {
		wp_enqueue_style('thickbox');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_style( 'cb-toolkit-admin', plugins_url('assets/css/cb-admin.css', __FILE__) );
		wp_enqueue_script('cb-toolkit-admin', plugins_url('assets/js/cb-admin.js', __FILE__), array('jquery'), time(), true	);
		if(is_customize_preview()) {
			wp_enqueue_script('cb-toolkit-customizer-ajax', plugins_url('inc/customizer/ajax/js/customizer-ajax.js', __FILE__), array('jquery'), time(), false	);
			wp_localize_script( 'cb-toolkit-customizer-ajax', 'cb_toolkit_customizer_params',[
				'ajaxUrl' => admin_url('admin-ajax.php'),
			]);
		}
	}
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof CB_toolkit ) ) {
			self::$instance = new CB_toolkit;
		}
		return self::$instance;
	}
	
}
CB_toolkit::instance();