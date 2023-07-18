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

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
define("AJL_PLUGINS_VERSION", time());
define("AJL_INCLUDE_DIR", plugin_dir_path(__FILE__) . "includes/");
define("AJL_DATA_DIR", plugin_dir_path(__FILE__) . "data/");
define("AJL_ADMIN_DIR", plugin_dir_url(__FILE__) . "assets/admin/");

class Apps_Job_Listing
{
    private $version;

    public function __construct()
    {
        $this->version = AJL_PLUGINS_VERSION;
        add_action("plugins_loaded", [$this, 'apl_plugins_loaded']);
        add_action("admin_enqueue_scripts", [$this, "load_admin_assets"]);
        add_action("plugins_loaded", [$this, "include_required_files"]);
        add_action("plugins_loaded", [$this, "get_all_country_list"]);
        register_activation_hook(__FILE__, [$this, 'increase_max_allowed_packet']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_image_meta_box_scripts']);
        add_filter('comments_open', [$this, 'remove_comment_field_for_page'], 10, 2);
    }
    function remove_comment_field_for_page($open, $post_id)
    {
        $page_id = get_option('application_form_page_id');
        if ($post_id === $page_id) {
            // Disable comments for the specified page
            $open = false;
        }

        return $open;
    }
    function enqueue_image_meta_box_scripts($hook)
    {
        if ($hook === 'post.php' || $hook === 'post-new.php') {
            wp_enqueue_media();
            wp_enqueue_script('image-meta-box', AJL_ADMIN_DIR . 'js/application-meta-box.js', array('jquery'), '1.0.0', true);
        }
    }
    function increase_max_allowed_packet()
    {
        global $wpdb;

        // Set the new value for max_allowed_packet
        $new_value = '64M'; // Adjust the value as per your requirement

        // Execute the SQL query to update the max_allowed_packet value
        $query = $wpdb->prepare("SET GLOBAL max_allowed_packet=%s", $new_value);
        $wpdb->query($query);
    }
    function get_all_country_list()
    {
        global $apps_country_list; // Declare the global variable
        $jsonData = file_get_contents(AJL_DATA_DIR . 'all_countries.json');
        // Check if the data was retrieved successfully
        if ($jsonData !== false) {
            // Decode the JSON data into an associative array
            $countries = json_decode($jsonData, true);

            $apps_country_list = $countries;
        } else {
            // Handle the case where the JSON data retrieval failed
            echo "Failed to retrieve JSON data.";
        }
    }
    function apl_plugins_loaded()
    {
        load_plugin_textdomain("apps-job-listing", false, __FILE__ . "/languages");
    }

    function include_required_files()
    {
        include_once(AJL_INCLUDE_DIR . 'post-types.php');
        include_once(AJL_INCLUDE_DIR . 'post-type-application.php');
        include_once(AJL_INCLUDE_DIR . 'form-handler/application-form-handler.php');
        include_once(AJL_INCLUDE_DIR . 'shortcodes/application_form.php');
        include_once(AJL_INCLUDE_DIR . 'meta-box/application-meta-box.php');
    }

    function load_admin_assets()
    {
        wp_enqueue_style('datepicker', AJL_ADMIN_DIR . 'css/datepicker.css', array(), '1.0.0');
        wp_enqueue_style('apps-main', AJL_ADMIN_DIR . 'css/apps-main.css', array(), $this->version);
        wp_enqueue_style('select2', AJL_ADMIN_DIR . 'css/select2.min.css', array(), '1.0.0');
        wp_enqueue_script('select2', AJL_ADMIN_DIR . 'js/select2.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('apps-main', AJL_ADMIN_DIR . 'js/main.js', array('jquery', 'jquery-ui-sortable', 'jquery-ui-datepicker'), $this->version, true);
    }
}

new Apps_Job_Listing();