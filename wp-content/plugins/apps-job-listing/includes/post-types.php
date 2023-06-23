<?php
namespace APPS_JOB_LISTING\POST_TYPES;
class CREATE_JOB_POST_TYPE_CLASS {
    public function __construct() {
        add_action("init", [$this, "create_job_post_type"]);
        add_action("init", [$this, "create_jobs_category_taxonomy"], 10, 1);
        add_action("init", [$this, "enable_tags_for_custom_post_type"], 10, 1);
        add_action("add_meta_boxes", [$this, "add_job_meta_box"], 0 );
        add_action("add_meta_boxes", [$this, "add_company_logo_meta_box"], 0 );
        add_action("save_post", [$this, "save_job_post_type_meta_box"], 10, 1);
        add_action("save_post", [$this, "save_job_data_box_meta_box"], 10, 1);
        add_action("save_post", [$this, "save_company_logo_meta_box"], 10, 1);
        add_action("save_post", [$this, "save_job_meta_meta_box"], 10, 1);
    }
    function save_company_logo_meta_box($post_id) {
        // Check if the nonce is set
        if (!isset($_POST['company_logo_meta_box_nonce'])) {
            return;
        }
    
        // Verify the nonce
        if (!wp_verify_nonce($_POST['company_logo_meta_box_nonce'], 'company_logo_meta_box')) {
            return;
        }
    
        // Check if the current user has permission to edit the post
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    
        // Save the company logo URL
        if (isset($_POST['company_logo'])) {
            update_post_meta($post_id, 'company_logo', sanitize_text_field($_POST['company_logo']));
        }
    }
    function save_job_meta_meta_box($post_id) {
        // Check if the nonce is set
        if (!isset($_POST['job__type_meta_box_nonce'])) {
            return;
        }
    
        // Verify the nonce
        if (!wp_verify_nonce($_POST['job__type_meta_box_nonce'], 'job__type_meta_box')) {
            return;
        }
    
        // Check if the current user has permission to edit the post
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    
        // Save the meta
        if (isset($_POST['onsite'])) {
            update_post_meta($post_id, 'onsite', sanitize_text_field($_POST['onsite']));
        }
    }
    
    function add_company_logo_meta_box() {
        add_meta_box(
            'company_logo_meta_box',
            'Company Logo',
            [$this, 'render_company_logo_meta_box'],
            'job',
            'side',
            'high'
        );
    }
    // Render the content of the company logo meta box
    function render_company_logo_meta_box($post) {
        // Get the current company logo URL
        $company_logo_url = get_post_meta($post->ID, 'company_logo', true);
        wp_nonce_field('company_logo_meta_box', 'company_logo_meta_box_nonce'); // Add the nonce field
        ?>
        <p>
            <label for="company_logo_upload"><?php __('Upload Company Logo:', 'apps-job-listing'); ?></label><br />
            <input type="text" id="company_logo_url" name="company_logo" value="<?php echo $company_logo_url; ?>" style="width: 100%;" />
            <input type="button" id="company_logo_upload" class="button" value="Upload" />
        </p>
        <script>
            jQuery(document).ready(function($){
                // Media uploader
                var mediaUploader;

                $('#company_logo_upload').on('click', function(e) {
                    e.preventDefault();

                    // If the media uploader already exists, open it
                    if (mediaUploader) {
                        mediaUploader.open();
                        return;
                    }

                    // Create the media uploader
                    mediaUploader = wp.media.frames.file_frame = wp.media({
                        title: 'Upload Company Logo',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });

                    // When a file is selected, grab the URL and populate the text input
                    mediaUploader.on('select', function() {
                        var attachment = mediaUploader.state().get('selection').first().toJSON();
                        $('#company_logo_url').val(attachment.url);
                    });

                    // Open the media uploader
                    mediaUploader.open();
                });
            });
        </script>
        <?php
    }
    function enable_tags_for_custom_post_type() {
        $post_type = 'job'; // Replace 'job' with the slug of your custom post type

        $labels = array(
            'name'              => _x('Tags', 'taxonomy general name'),
            'singular_name'     => _x('Tag', 'taxonomy singular name'),
            'search_items'      => __('Search Tags'),
            'all_items'         => __('All Tags'),
            'parent_item'       => __('Parent Tag'),
            'parent_item_colon' => __('Parent Tag:'),
            'edit_item'         => __('Edit Tag'),
            'update_item'       => __('Update Tag'),
            'add_new_item'      => __('Add New Tag'),
            'new_item_name'     => __('New Tag Name'),
            'menu_name'         => __('Tags')
        );
    
        $args = array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'jobs-tag'),
        );
    
        register_taxonomy('jobs_tag', $post_type, $args);
    }
    // Register Custom Post Type
    function create_job_post_type() {
        $labels = array(
            'name'                  => 'Job',
            'singular_name'         => 'Job',
            'menu_name'             => 'Job',
            'name_admin_bar'        => 'Job',
            'archives'              => 'Job Archives',
            'attributes'            => 'Job Attributes',
            'parent_item_colon'     => 'Parent Job:',
            'all_items'             => 'All Jobs',
            'add_new_item'          => 'Add New Job',
            'add_new'               => 'Add New',
            'new_item'              => 'New Job',
            'edit_item'             => 'Edit Job',
            'update_item'           => 'Update Job',
            'view_item'             => 'View Job',
            'view_items'            => 'View Jobs',
            'search_items'          => 'Search Job',
            'not_found'             => 'Job Not found',
            'not_found_in_trash'    => 'Job Not found in Trash',
            'featured_image'        => 'Featured Image',
            'set_featured_image'    => 'Set featured image',
            'remove_featured_image' => 'Remove featured image',
            'use_featured_image'    => 'Use as featured image',
            'insert_into_item'      => 'Insert into Job',
            'uploaded_to_this_item' => 'Uploaded to this Job',
            'items_list'            => 'Jobs list',
            'items_list_navigation' => 'Jobs list navigation',
            'filter_items_list'     => 'Filter Jobs list',
        );

        $args = array(
            'label'               => 'Job',
            'description'         => 'Post type for Jobs',
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
            'taxonomies'          => array( 'job-types', 'job-applications' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-businessman',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'rewrite'             => array( 'slug' => 'job-list' ), // Add this line to modify the slug
        );

        register_post_type( 'job', $args );
    }
    function create_jobs_category_taxonomy() {
        $labels = array(
            'name'              => _x('Jobs Categories', 'taxonomy general name'),
            'singular_name'     => _x('Jobs Category', 'taxonomy singular name'),
            'search_items'      => __('Search Jobs Categories'),
            'all_items'         => __('All Jobs Categories'),
            'parent_item'       => __('Parent Jobs Category'),
            'parent_item_colon' => __('Parent Jobs Category:'),
            'edit_item'         => __('Edit Jobs Category'),
            'update_item'       => __('Update Jobs Category'),
            'add_new_item'      => __('Add New Jobs Category'),
            'new_item_name'     => __('New Jobs Category Name'),
            'menu_name'         => __('Jobs Categories')
        );
    
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'jobs-category'),
        );
    
        register_taxonomy('jobs_category', 'job', $args);
    }
    /**
     * Add Meta Box
     */
    function add_job_meta_box($post_type) {
        $post_types = array('job'); // Specify the post type(s) where you want to add the meta box
        if (in_array($post_type, $post_types)) {
            /**
             * Add Job Duration Meta Box
             */
            add_meta_box(
                'select_job_duration', // Unique ID
                'Job Duration', // Meta Box title
                [$this, 'render_job_meta_box'], // Callback function
                $post_type, // Post type
                'side', // Context (normal, side, advanced)
                'default' // Priority (high, core, default, low)
            );
            /**
             * Add Job Data Meta Box
             */
            add_meta_box(
                '_job_data_box', //unique id
                'Job Data Box', // Meta box title
                [$this, 'render_job_data_info'], // callback
                $post_type, // Post Type
                'normal',
                'high' // Priority
            );
            /**
             * Add Job Type Meta Box
             */
            add_meta_box(
                '_job_type_meta_box', //unique id
                'Job Type', // Meta box title
                [$this, 'render_job_type_meta_info'], // callback
                $post_type, // Post Type
                'side',
                'high' // Priority
            );
        }
    }
    function render_job_type_meta_info($post) {
         // Retrieve saved meta value, if any
         $onsite = get_post_meta($post->ID, 'onsite', true);
         
         // Output the fields
         wp_nonce_field('job__type_meta_box', 'job__type_meta_box_nonce'); // Add the nonce field
         ?>
         <label for="onsite">
            <input type="radio" id="onsite" name="onsite" value="On Site" <?php checked($onsite, 'On Site'); ?>>
            <?php echo __('On Site', 'apps-job-listing'); ?>
        </label>
        <br>
        <label for="hybrid">
            <input type="radio" id="hybrid" name="onsite" value="Hybrid" <?php checked($onsite, 'Hybrid'); ?>>
            <?php echo  __('Hybrid', 'apps-job-listing'); ?>
        </label>
        <br>
        <label for="remote">
            <input type="radio" id="remote" name="onsite" value="Remote Friendly" <?php checked($onsite, 'Remote Friendly'); ?>>
            <?php echo  __('Remote Friendly', 'apps-job-listing'); ?>
        </label>
        
    <?php }
    /**
     * @Function: render_job_meta_box
     * @Description: For Job Duration
     */
    function render_job_meta_box($post) {
        // Retrieve saved meta value, if any
        $job_duration = get_post_meta($post->ID, 'job_duration', true);

        // Output the fields
        wp_nonce_field('job_meta_box', 'job_meta_box_nonce'); // Add the nonce field
        ?>
        <label for="part_time">
            <input type="radio" id="part_time" name="job_duration" value="Part Time" <?php checked($job_duration, 'Part Time'); ?>>
            <?php echo __('Part Time', 'apps-job-listing'); ?>
        </label>
        <br>
        <label for="full_time">
            <input type="radio" id="full_time" name="job_duration" value="Full Time" <?php checked($job_duration, 'Full Time'); ?>>
            <?php echo  __('Full Time', 'apps-job-listing'); ?>
        </label>
        <br>
        <label for="internship">
            <input type="radio" id="internship" name="job_duration" value="Internship" <?php checked($job_duration, 'Internship'); ?>>
            <?php echo  __('Internship', 'apps-job-listing'); ?>
        </label>
        <?php
    }
    /**
     * @Function: render_job_data_info
     * @Description: For Data Info Output
     */
    function render_job_data_info($post) {
        // Retrieve saved meta value, if any
        $company_location = get_post_meta($post->ID, 'company_location', true);
        $company_email = get_post_meta($post->ID, 'company_email', true);
        $company_name = get_post_meta($post->ID, 'company_name', true);
        $application_website = get_post_meta($post->ID, 'application_website', true);
        $company_tagline = get_post_meta($post->ID, 'company_tagline', true);
        $company_twitter = get_post_meta($post->ID, 'company_twitter', true);
        $company_video = get_post_meta($post->ID, 'company_video', true);
        $listing_expire = get_post_meta($post->ID, 'listing_expire', true);
        $expected_experience = get_post_meta($post->ID, 'expected_experience', true);
        $post_id = $post->ID;
        $author_id = get_post_field('post_author', $post_id);
        $author_name = get_the_author_meta('display_name', $author_id);
        $author_url = get_edit_user_link($author_id);
        // Output the fields
        wp_nonce_field('job_data_box', 'job_data_box_nonce'); // Add the nonce field
        ?>
        <table class="table" id="apps_ui_sortable" style="width: 100%;border-collapse: collapse;">
            <tr>
                <td style="padding: 5px;width: 50%;">
                    <h3>Posted By</h3>
                    <a href="<?php echo esc_url($author_url); ?>"><?php echo $author_name; ?></a>
                </td>
                <td style="padding: 5px;width: 50%;">
                    <h3>Company Location</h3>
                    <input type="text" name="company_location" id="company_location" value="<?php echo $company_location; ?>" placeholder="Company Location" style="width: 100%;border-color; #ddd;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;width: 50%;">
                    <h3>Application Email</h3>
                    <input type="email" name="company_email" id="company_email" value="<?php echo $company_email; ?>" placeholder="Company Email" style="width: 100%;border-color; #ddd;">
                </td>
                <td style="padding: 5px;width: 50%;">
                    <h3>Application Name</h3>
                    <input type="name" name="company_name" id="company_name" value="<?php echo $company_name; ?>" placeholder="Company name" style="width: 100%;border-color; #ddd;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;width: 50%;">
                    <h3>Application Website</h3>
                    <input type="url" name="application_website" id="application_website"  value="<?php echo $application_website; ?>" placeholder="Company Website" style="width: 100%;border-color; #ddd;">
                </td>
                <td style="padding: 5px;width: 50%;">
                    <h3>Application Tagline</h3>
                    <input type="text" name="company_tagline" id="company_tagline" value="<?php echo $company_tagline; ?>" placeholder="Company tagline" style="width: 100%;border-color; #ddd;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;width: 50%;">
                    <h3>Application Twitter</h3>
                    <input type="url" name="company_twitter" id="company_twitter" value="<?php echo $company_twitter; ?>" placeholder="Company Twitter" style="width: 100%;border-color; #ddd;">
                </td>
                <td style="padding: 5px;width: 50%;">
                    <h3>Application Video</h3>
                    <input type="url" name="company_video" id="company_video" value="<?php echo $company_video; ?>" placeholder="Company video" style="width: 100%;border-color; #ddd;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;width: 50%;">
                    <h3>Application Twitter</h3>
                    <input type="date" name="listing_expire" id="datepicker" value="<?php echo $listing_expire; ?>" placeholder="Listing Expiry Date" style="width: 100%;border-color; #ddd;">
                </td>
                <td style="padding: 5px;width: 50%;">
                    <h3>Application Video</h3>
                    <input type="text" name="company_video" id="company_video" value="<?php echo $company_video; ?>" placeholder="Company video" style="width: 100%;border-color; #ddd;">
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;width: 50%;">
                    <h3>Experience</h3>
                    <input type="text" name="expected_experience" id="expected_experience" value="<?php echo $expected_experience; ?>" placeholder="Expected Experience" style="width: 100%;border-color; #ddd;">
                </td>
            </tr>
        </table>
    <?php }
    /**
     * Save job post type meta box
     */
    function save_job_post_type_meta_box($post_id) {
        // Check if the nonce is set
        if (!isset($_POST['job_meta_box_nonce'])) {
            return;
        }
    
        // Verify the nonce
        if (!wp_verify_nonce($_POST['job_meta_box_nonce'], 'job_meta_box')) {
            return;
        }
    
        // Check if the current user has permission to edit the post
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    
        // Save the job location value
        if (isset($_POST['job_duration'])) {
            update_post_meta($post_id, 'job_duration', sanitize_text_field($_POST['job_duration']));
        }
    }
    /**
     * Save job data box
     */
    function save_job_data_box_meta_box($post_id) {
        // Check if the nonce is set
        if (!isset($_POST['job_data_box_nonce'])) {
            return;
        }
    
        // Verify the nonce
        if (!wp_verify_nonce($_POST['job_data_box_nonce'], 'job_data_box')) {
            return;
        }
    
        // Check if the current user has permission to edit the post
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    
        // Save the job location value
        if (isset($_POST['company_location'])) {
            update_post_meta($post_id, 'company_location', sanitize_text_field($_POST['company_location']));
        }
        // Save the company email value
        if (isset($_POST['company_email'])) {
            update_post_meta($post_id, 'company_email', sanitize_text_field($_POST['company_email']));
        }
        // Save the company name value
        if (isset($_POST['company_name'])) {
            update_post_meta($post_id, 'company_name', sanitize_text_field($_POST['company_name']));
        }
        // Save the Application webstie value
        if (isset($_POST['application_website'])) {
            update_post_meta($post_id, 'application_website', sanitize_text_field($_POST['application_website']));
        }
        // Save the company tagline value
        if (isset($_POST['company_tagline'])) {
            update_post_meta($post_id, 'company_tagline', sanitize_text_field($_POST['company_tagline']));
        }
        // Save the company tagline value
        if (isset($_POST['company_twitter'])) {
            update_post_meta($post_id, 'company_twitter', sanitize_text_field($_POST['company_twitter']));
        }
        // Save the company video value
        if (isset($_POST['company_video'])) {
            update_post_meta($post_id, 'company_video', sanitize_text_field($_POST['company_video']));
        }
        // Save the listing expire value
        if (isset($_POST['listing_expire'])) {
            update_post_meta($post_id, 'listing_expire', sanitize_text_field($_POST['listing_expire']));
        }
        // Save the listing expire value
        if (isset($_POST['expected_experience'])) {
            update_post_meta($post_id, 'expected_experience', sanitize_text_field($_POST['expected_experience']));
        }
    }
    
}
new CREATE_JOB_POST_TYPE_CLASS();