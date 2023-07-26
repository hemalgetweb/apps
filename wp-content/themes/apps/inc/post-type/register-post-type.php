<?php
// Register Custom Post Type for Project
function apps_custom_post_type_for_project() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'apps' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'apps' ),
		'menu_name'             => __( 'Project', 'apps' ),
		'name_admin_bar'        => __( 'Project', 'apps' ),
		'archives'              => __( 'Item Archives', 'apps' ),
		'attributes'            => __( 'Item Attributes', 'apps' ),
		'parent_item_colon'     => __( 'Parent Item:', 'apps' ),
		'all_items'             => __( 'All Items', 'apps' ),
		'add_new_item'          => __( 'Add New Item', 'apps' ),
		'add_new'               => __( 'Add New', 'apps' ),
		'new_item'              => __( 'New Project', 'apps' ),
		'edit_item'             => __( 'Edit Item', 'apps' ),
		'update_item'           => __( 'Update Item', 'apps' ),
		'view_item'             => __( 'View Item', 'apps' ),
		'view_items'            => __( 'View Items', 'apps' ),
		'search_items'          => __( 'Search Item', 'apps' ),
		'not_found'             => __( 'Not found', 'apps' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'apps' ),
		'featured_image'        => __( 'Featured Image', 'apps' ),
		'set_featured_image'    => __( 'Set featured image', 'apps' ),
		'remove_featured_image' => __( 'Remove featured image', 'apps' ),
		'use_featured_image'    => __( 'Use as featured image', 'apps' ),
		'insert_into_item'      => __( 'Insert into item', 'apps' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'apps' ),
		'items_list'            => __( 'Items list', 'apps' ),
		'items_list_navigation' => __( 'Items list navigation', 'apps' ),
		'filter_items_list'     => __( 'Filter items list', 'apps' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'apps' ),
		'description'           => __( 'Add your project', 'apps' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'page-attributes', 'post-formats', 'excerpt' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'apps_custom_post_type_for_project', 0 );




// Register Custom Post Type for Service
function apps_custom_post_type_for_service() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'apps' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'apps' ),
		'menu_name'             => __( 'Service', 'apps' ),
		'name_admin_bar'        => __( 'Service', 'apps' ),
		'archives'              => __( 'Item Archives', 'apps' ),
		'attributes'            => __( 'Item Attributes', 'apps' ),
		'parent_item_colon'     => __( 'Parent Service:', 'apps' ),
		'all_items'             => __( 'All Services', 'apps' ),
		'add_new_item'          => __( 'Add New Service', 'apps' ),
		'add_new'               => __( 'Add New', 'apps' ),
		'new_item'              => __( 'New Service', 'apps' ),
		'edit_item'             => __( 'Edit Item', 'apps' ),
		'update_item'           => __( 'Update Item', 'apps' ),
		'view_item'             => __( 'View Item', 'apps' ),
		'view_items'            => __( 'View Items', 'apps' ),
		'search_items'          => __( 'Search Item', 'apps' ),
		'not_found'             => __( 'Not found', 'apps' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'apps' ),
		'featured_image'        => __( 'Featured Image', 'apps' ),
		'set_featured_image'    => __( 'Set featured image', 'apps' ),
		'remove_featured_image' => __( 'Remove featured image', 'apps' ),
		'use_featured_image'    => __( 'Use as featured image', 'apps' ),
		'insert_into_item'      => __( 'Insert into item', 'apps' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'apps' ),
		'items_list'            => __( 'Items list', 'apps' ),
		'items_list_navigation' => __( 'Items list navigation', 'apps' ),
		'filter_items_list'     => __( 'Filter items list', 'apps' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'apps' ),
		'description'           => __( 'Add your service', 'apps' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'page-attributes', 'post-formats', 'excerpt' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'service', $args );

}
// add_action( 'init', 'apps_custom_post_type_for_service', 0 );