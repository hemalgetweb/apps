<?php
/**
 * Plugin Name: CB Core
 * Description: CB Core Elementor Plugin.
 * Plugin URI:  https://farzaawp.codebasket.net/wp-content/plugins/cb-core.zip
 * Version:     1.0.0
 * Author:      CodeBasket
 * Author URI:  https://themeforest.net/user/codebasket/portfolio
 * Text Domain: cb-core
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'CB_VERSION', '1.0.0' );
define( 'CB__FILE__', __FILE__ );
define( 'CB_DIR_PATH', plugin_dir_path( CB__FILE__ ) );
define( 'CB_DIR_URL', plugin_dir_url( CB__FILE__ ) );
define( 'CB_ASSETS', trailingslashit( CB_DIR_URL . 'assets' ) );
/**
 * Main CB Core Class
 *
 * The init class that runs the Hello World plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match your plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 * @since 1.2.0
 */
final class CBCore {

	/**
	 * Plugin Version
	 *
	 * @since 1.2.1
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.2.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.2.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.4';
	private static $instance;
	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
		add_action( 'plugins_loaded', array( $this, 'apps_register_addons' ) );
	}

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}
		add_action( 'elementor/elements/categories_registered', [ $this, 'cb_add_widget_category' ] );
		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'plugin.php' );
		require_once CB_DIR_PATH . 'includes/helper-function.php';
		require_once CB_DIR_PATH . 'includes/class-widget-utils.php'; 
		\CBCore\CB_Core_Icon::init();
	}
	public static function instance() {

		if (!isset(self::$instance) && !(self::$instance instanceof CBCore)) {

			self::$instance = new CBCore;

			self::$instance->setup_constants();
			self::$instance->hooks();

		}
		return self::$instance;
	}
	public function hooks() {
		add_action('elementor/widgets/register', array($this, 'include_widgets'));
		add_action('elementor/frontend/after_register_scripts', array($this, 'register_frontend_scripts'), 10);
	}
	/**
		* Load Frontend Scripts
		*
	*/
        public function register_frontend_scripts() {
            foreach( glob( CB_CORE_PLUGIN_DIR. 'assets/js/*.js' ) as $file ) {
                $filename = substr($file, strrpos($file, '/') + 1);
                wp_enqueue_script( $filename, CB_CORE_PLUGIN_URL . 'assets/js/'.$filename, array('jquery'), CB_VERSION, true);
            }
        }
	private function setup_constants() {

		// Plugin Folder Path
		if (!defined('CB_CORE_PLUGIN_DIR')) {
			define('CB_CORE_PLUGIN_DIR', plugin_dir_path(__FILE__));
		}

		// Plugin Folder URL
		if (!defined('CB_CORE_PLUGIN_URL')) {
			define('CB_CORE_PLUGIN_URL', plugin_dir_url(__FILE__));
		}

		// Plugin Folder Path
		if (!defined('CB_CORE_ADDONS_DIR')) {
			define('CB_CORE_ADDONS_DIR', plugin_dir_path(__FILE__) . 'widgets/');
		}

		// Plugin Folder Path
		if (!defined('CB_CORE_ADDONS_URL')) {
			define('CB_CORE_ADDONS_URL', plugin_dir_url(__FILE__) . 'widgets/');
		}

	}
	public function apps_register_addons() {
		return CBCore::instance();
	}
	/***
	 * Include elementor widgets
	 */
	public function include_widgets($widgets_manager) {
		$widgets[] = '';
		foreach( glob( CB_CORE_PLUGIN_DIR. 'widgets/*' ) as $file ) {
			$widgets[] = substr($file, strrpos($file, '/') + 1);
		}
		if (is_array($widgets)){
			$widgets = array_filter($widgets);
			foreach ($widgets as $key => $value){
				
				if (!empty($value)) {
					if($value != 'index.php') {
						if(strpos($value, 'woo') !== false) {
							if(class_exists('WooCommerce')) {
								require_once CB_CORE_ADDONS_DIR .$value.'/index.php';
							}
						} else {
							require_once CB_CORE_ADDONS_DIR .$value.'/index.php';
						}
					}
				}
			}
		}
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'cb-core' ),
			'<strong>' . esc_html__( 'CB Core', 'cb-core' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'cb-core' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cb-core' ),
			'<strong>' . esc_html__( 'CB Core', 'cb-core' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'cb-core' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cb-core' ),
			'<strong>' . esc_html__( 'CB Core', 'cb-core' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'cb-core' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Add Category
	 */
	public function cb_add_widget_category( $elements_manager )
    {
        $elements_manager->add_category( 'cb-cat', ['title' => esc_html__( 'CB Core', 'cb-core' )]);
	}
}

// Instantiate CBCore.
new CBCore();
