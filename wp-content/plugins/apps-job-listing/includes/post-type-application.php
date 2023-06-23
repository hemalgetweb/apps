<?php
namespace APPS_Application_LISTING\POST_TYPES\POST_TYPE_APPLICATION;

class Post_Type_Application {
    public function __construct() {
        add_action("init", [$this, "create_job_post_type"]);
        add_filter("manage_application_posts_columns", [$this, "add_job_title_on_application"]);
        add_filter("manage_application_posts_columns", [$this, "add_job_id_on_application"]);
    }
    function add_job_title_on_application($columns) {
        $columns['post_title'] = 'Post Title';
        return $columns;
    }
    function add_job_id_on_application($columns) {
        $columns['post_id'] = 'Post ID';
        return $columns;
    }
    function create_job_post_type() {
        $labels = array(
            'name'                  => 'Application',
            'singular_name'         => 'Application',
            'menu_name'             => 'Application',
            'name_admin_bar'        => 'Application',
            'archives'              => 'Application Archives',
            'attributes'            => 'Application Attributes',
            'parent_item_colon'     => 'Parent Application:',
            'all_items'             => 'All Applications',
            'add_new_item'          => 'Add New Application',
            'add_new'               => 'Add New',
            'new_item'              => 'New Application',
            'edit_item'             => 'Edit Application',
            'update_item'           => 'Update Application',
            'view_item'             => 'View Application',
            'view_items'            => 'View Applications',
            'search_items'          => 'Search Application',
            'not_found'             => 'Application Not found',
            'not_found_in_trash'    => 'Application Not found in Trash',
            'featured_image'        => 'Featured Image',
            'set_featured_image'    => 'Set featured image',
            'remove_featured_image' => 'Remove featured image',
            'use_featured_image'    => 'Use as featured image',
            'insert_into_item'      => 'Insert into Application',
            'uploaded_to_this_item' => 'Uploaded to this Application',
            'items_list'            => 'Applications list',
            'items_list_navigation' => 'Applications list navigation',
            'filter_items_list'     => 'Filter Applications list',
        );
        $args = array(
            'label'               => 'Application',
            'description'         => 'Post type for Applications',
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
            'taxonomies'          => array( 'Application-types', 'Application-applications' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-database',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'rewrite'             => array( 'slug' => 'application-list' ), // Add this line to modify the slug
        );
        register_post_type( 'application', $args );
    }
}
new Post_Type_Application();