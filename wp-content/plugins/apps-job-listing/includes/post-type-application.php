<?php
namespace APPS_JOB_LISTING\POST_TYPES\POST_TYPE_APPLICATION;
use APPS_Application_LISTING\FORM_HANDLER;
class Post_Type_Application {
    public function __construct() {
        add_action("manage_application_posts_custom_column", [$this, "display_custom_column_content"], 10, 2);
        add_action("init", [$this, "create_job_post_type"]);
        add_action("admin_menu", [$this, "add_settings_menu"]);
        add_filter("manage_application_posts_columns", [$this, "add_job_title_on_application"]);
    }
    function add_settings_menu() {
        add_submenu_page(
            'edit.php?post_type=application',    // Parent menu slug
            'Settings',    // Page title
            'Settings',    // Menu title
            'manage_options',   // Capability
            'application-settings',    // Menu slug
            [$this, 'render_settings_page']   // Callback function
        );
    }
    function render_settings_page() {
        $application_form_page_id = get_option('application_form_page_id') ? get_option('application_form_page_id'): '';
        FORM_HANDLER\updateSettingsPageOption();
        // Get all pages
        $pages = get_pages();
        ?>
        <form action="#" method="POST">
            <table class="form-table" role="presentation">
                <tbody>
                    <th>Select Application Form Page: <p>please use: [application_form/] shortcode in selected page</p></th>
                    <td>
                        <?php if(!empty($pages)) : ?>
                        <select name="select_application_page">
                            <?php foreach($pages as $page) :
                                $page_id = $page->ID; // Get the page ID
                                $page_title = $page->post_title; // Get the page title    
                            ?>
                                <option <?php echo $application_form_page_id == $page_id ? 'selected': '';  ?> value="<?php echo esc_attr($page_id); ?>"><?php echo $page_title; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php endif; ?>
                    </td>
                </tbody>
            </table>
            <p class="submit_btn"><input type="submit" name="submit_application_settings" id="submit_application_settings" class="button button-primary" value="Save Changes"></p>
        </form>
    <?php }
    // Display content in custom column
    function display_custom_column_content($column, $post_id) {
        if ($column == 'post_title') {
            $post_title = get_the_title($post_id);
            echo $post_title;
        }
    }
    function add_job_title_on_application($columns) {
        $columns['apps_application_job_title'] = 'Job Title';
        $columns['apps_application_email'] = 'Email';
        $columns['apps_application_thumbnail'] = 'Image';
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
            'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ),
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