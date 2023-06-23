<?php
/**
 * Plugin Name: Apps Job Listing
 * Description: Apps Job Listing Is a job boarding plugin
 * Plugin URI:  https://example.com
 * Version:     1.0.0
 * Author:      getweb
 * Author URI:  https://www.getwebinc.com/portfolios/
 * Text Domain: apps-job-listing
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define("AJL_PLUGINS_VERSION", time());
define("AJL_INCLUDE_DIR", plugin_dir_path(__FILE__) . "includes/");
define("AJL_ADMIN_DIR", plugin_dir_url(__FILE__) . "assets/admin/");
class Apps_Job_Listing {
    private $version;
    public function __construct() {
        $this->version = AJL_PLUGINS_VERSION;
        add_action("plugins_loaded", [$this, 'apl_plugins_loaded']);
        add_action("admin_enqueue_scripts", [$this, "load_admin_assets"]);
        add_action("plugins_loaded", [$this, "include_required_files"]);
    }
    function apl_plugins_loaded() {
        load_plugin_textdomain("apps-job-listing", false, __FILE__."/languages");
    }
    function include_required_files() {
        include_once(AJL_INCLUDE_DIR. 'post-types.php');
        include_once(AJL_INCLUDE_DIR. 'post-type-application.php');
    }
    function load_admin_assets() {
        wp_enqueue_style('datepicker', AJL_ADMIN_DIR. 'css/datepicker.css', array(), $this->version);
        wp_enqueue_script('apps-main', AJL_ADMIN_DIR. 'js/main.js', array('jquery', 'jquery-ui-sortable', 'jquery-ui-datepicker'), $this->version, true);
    }
}
new Apps_Job_Listing();