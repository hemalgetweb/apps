<?php
/**
 * Plugin Name:       Getweb Gutenberg Block
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       getweb-gutenberg-block
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_getweb_gutenberg_block_block_init() {
	register_block_type( __DIR__ . '/build/faq' );
	register_block_type( __DIR__ . '/build/service-card' );
}
add_action( 'init', 'create_block_getweb_gutenberg_block_block_init' );

function getweb_create_block_category( $categories ) {

    // Adding a new category.
	$categories[] = array(
		'slug'  => 'getweb-blocks',
		'title' => 'Getweb Blocks'
	);

	return $categories;
}
add_filter( 'block_categories_all' , 'getweb_create_block_category' );

function getweb_enqueue_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', null, time(), false );
	wp_enqueue_style('apps-core', get_template_directory_uri() . '/assets/css/apps-core.css', null, time());
	wp_enqueue_style('apps-custom', get_template_directory_uri() . '/assets/css/apps-custom.css', null, time());
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), time(), true );
}
add_action("admin_enqueue_scripts", "getweb_enqueue_scripts");