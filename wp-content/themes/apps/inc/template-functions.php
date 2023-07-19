<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package apps
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function apps_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = __('hfeed', 'apps');
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = __('no-sidebar', 'apps');
    }

    return $classes;
}
add_filter('body_class', 'apps_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function apps_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'apps_pingback_header');

// apps_classes_sidebar
function apps_classes_sidebar_func()
{
    if (is_active_sidebar('classes-sidebar')) {

        dynamic_sidebar('classes-sidebar');
    }
}
add_action('apps_classes_sidebar', 'apps_classes_sidebar_func', 20);

function apps_get_tag()
{
    $html = '';
    if (has_tag()) {
        $html .= '<span class="apps-fz-tagcloud-label-448 mr-25">' . esc_html__('Tags:', 'apps') . '</span><div class="tagcloud d-inline-block">';
        $html .= get_the_tag_list('', ' ', '');
        $html .= '</div>';
    }
    return $html;
}
function reveral_is_elementor_editor()
{

    if (did_action('admin_action_elementor')) {
        return \Elementor\Plugin::$instance->editor->is_edit_mode();
    }
    return is_admin() && isset($_REQUEST['action']) && in_array(sanitize_text_field(wp_unslash($_REQUEST['action'])), array('elementor', 'elementor_ajax'), true);
}
function reverel_cart_items()
{
    if (!reveral_is_elementor_editor() && class_exists('WooCommerce')) {
        echo '<div class="header-mini-cart">';
        woocommerce_mini_cart();
        echo '</div>';
    }
}
/**
 * Get ID From youtube link
 */
function apps_getYoutubeIdFromUrl($url)
{
    $parts = parse_url($url);
    if (isset($parts['query'])) {
        parse_str($parts['query'], $qs);
        if (isset($qs['v'])) {
            return $qs['v'];
        } else if (isset($qs['vi'])) {
            return $qs['vi'];
        }
    }
    if (isset($parts['path'])) {
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path) - 1];
    }
    return false;
}


