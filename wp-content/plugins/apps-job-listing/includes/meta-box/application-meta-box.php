<?php
namespace APPS_Application_LISTING\META_BOX\META_BOX_APPLICATION;

class Meta_Box_Application {
    public function __construct() {
        add_action("add_meta_boxes", [$this, "add_application_meta_box"], 0);
        add_action('save_post', [$this, '_application_job_holder_image_save']);
    }
    function add_application_meta_box($post_type) {
        $post_types = array("application");
        if (in_array($post_type, $post_types)) {
            /**
             * Add Application Meta Box
             */
            add_meta_box(
                '_application_job_title', // Unique ID
                'Job Title', // Meta Box title
                [$this, 'render_application_job_title'], // Callback function
                $post_type, // Post type
                'normal', // Context (normal, side, advanced)
                'high' // Priority (high, core, default, low)
            );
            add_meta_box(
                '_application_job_firstname', // Unique ID
                'First Name', // Meta Box title
                [$this, 'render_application_job_firstname'], // Callback function
                $post_type, // Post type
                'normal', // Context (normal, side, advanced)
                'high' // Priority (high, core, default, low)
            );
            add_meta_box(
                '_application_job_lastname', // Unique ID
                'Last Name', // Meta Box title
                [$this, 'render_application_job_lastname'], // Callback function
                $post_type, // Post type
                'normal', // Context (normal, side, advanced)
                'high' // Priority (high, core, default, low)
            );
            add_meta_box(
                '_application_job_contact_number', // Unique ID
                'Contact Number', // Meta Box title
                [$this, 'render_application_job_contact_number'], // Callback function
                $post_type, // Post type
                'normal', // Context (normal, side, advanced)
                'high' // Priority (high, core, default, low)
            );
            add_meta_box(
                '_application_job_email', // Unique ID
                'Email', // Meta Box title
                [$this, 'render_application_job_email'], // Callback function
                $post_type, // Post type
                'normal', // Context (normal, side, advanced)
                'high' // Priority (high, core, default, low)
            );
            add_meta_box(
                '_application_job_country', // Unique ID
                'country', // Meta Box title
                [$this, 'render_application_job_country'], // Callback function
                $post_type, // Post type
                'normal', // Context (normal, side, advanced)
                'high' // Priority (high, core, default, low)
            );
            add_meta_box(
                '_application_job_holder_image', // Unique ID
                'Job  Holder Image', // Meta Box title
                [$this, 'render_application_job_holder_image'], // Callback function
                $post_type, // Post type
                'normal', // Context (normal, side, advanced)
                'high' // Priority (high, core, default, low)
            );
        }
    }
    /**
     * Render All Callbacks
     */
    function render_application_job_holder_image($post) {
        $apps_application_job_holder_image = get_post_meta($post->ID, 'apps_application_job_holder_image', true);
        ?>
         <label for="image_upload">Upload Image:</label>
            <input type="text" name="apps_application_job_holder_image" id="image_upload" value="<?php echo esc_attr($apps_application_job_holder_image); ?>" readonly>
            <input type="button" name="upload_button" id="upload_button" class="button" value="Upload Image">
            <div id="image_preview">
                <?php if (!empty($apps_application_job_holder_image)) : ?>
                    <img src="<?php echo esc_attr($apps_application_job_holder_image); ?>" alt="Image Preview" style="max-width: 200px;">
                <?php endif; ?>
            </div>
    <?php }
    function render_application_job_country($post) {
        $apps_application_select_country = get_post_meta($post->ID, 'apps_application_select_country', true);
        global $apps_country_list;
        echo '<label for="apps_application_country" style="display: block;">country</label>';
        echo '<select name="apps_application_select_country" class="apps-has-simple-select" style="width: 100%">';
        foreach ($apps_country_list as $country) {
            $country_name_official = $country['name'];
            $country_code = $country['code'];
            $selected = ($apps_application_select_country === $country_code) ? 'selected' : '';
            ?>
            <option <?php echo $selected ?> value="<?php echo $country_code; ?>"><?php echo $country_name_official; ?></option>
        <?php }
        echo '</select>';
    }
    function render_application_job_email($post) {
        $apps_application_email = get_post_meta($post->ID, 'apps_application_email', true);
        echo '<label for="apps_application_email" style="display: block;">Email</label>';
        echo '<input type="email" value="'.$apps_application_email.'" name="apps_application_email" placeholder="Email" style="width: 100%;" id="apps_application_email" />';
    }
    function render_application_job_contact_number($post) {
        $apps_application_contact_number = get_post_meta($post->ID, 'apps_application_contact_number', true);
        echo '<label for="apps_application_contact_number" style="display: block;">Contact Number</label>';
        echo '<input type="text" value="'.$apps_application_contact_number.'" name="apps_application_contact_number" placeholder="Contact Number" style="width: 100%;" id="apps_application_contact_number" />';
    }
    function render_application_job_lastname($post) {
        $apps_application_lastname = get_post_meta($post->ID, 'apps_application_lastname', true);
        echo '<label for="apps_application_lastname" style="display: block;">Last Name</label>';
        echo '<input value="'.$apps_application_lastname.'" type="text" name="apps_application_lastname" placeholder="Last Name" style="width: 100%;" id="apps_application_lastname" />';
    }
    function render_application_job_firstname($post) {
        $apps_application_firstname = get_post_meta($post->ID, 'apps_application_firstname', true);
        echo '<label for="apps_application_firstname" style="display: block;">First Name</label>';
        echo '<input value="'.$apps_application_firstname.'" type="text" name="apps_application_firstname" placeholder="First Name" style="width: 100%;" id="apps_application_firstname" />';
    }
    function render_application_job_title($post) {
        $apps_application_single_post = get_post_meta($post->ID, 'apps_application_single_post', true);
        $args = array(
            'post_type' => 'post', // Retrieve posts
            'posts_per_page' => -1, // Retrieve all posts
        );
        echo $apps_application_single_post;
        $posts = get_posts($args);
        echo '<select style="width: 100%;" name="apps_application_single_post">';
        foreach ($posts as $post) {
                $post_title = $post->post_title;
                $post_id = $post->ID;
            ?>
            <option value="<?php echo $post_id; ?>"><?php echo esc_html($post_title); ?></option>
        <?php }
        echo '</select>';
    }

    /***
     * Save All Metaboxes
     */
    function _application_job_holder_image_save($post_id) {
        if (isset($_POST['apps_application_job_holder_image'])) {
            $apps_application_job_holder_image = sanitize_text_field($_POST['apps_application_job_holder_image']);
            update_post_meta($post_id, 'apps_application_job_holder_image', $apps_application_job_holder_image);
        }
        if (isset($_POST['apps_application_select_country'])) {
            $apps_application_select_country = sanitize_text_field($_POST['apps_application_select_country']);
            update_post_meta($post_id, 'apps_application_select_country', $apps_application_select_country);
        }
        if (isset($_POST['apps_application_email'])) {
            $apps_application_email = sanitize_text_field($_POST['apps_application_email']);
            update_post_meta($post_id, 'apps_application_email', $apps_application_email);
        }
        if (isset($_POST['apps_application_contact_number'])) {
            $apps_application_contact_number = sanitize_text_field($_POST['apps_application_contact_number']);
            update_post_meta($post_id, 'apps_application_contact_number', $apps_application_contact_number);
        }
        if (isset($_POST['apps_application_lastname'])) {
            $apps_application_lastname = sanitize_text_field($_POST['apps_application_lastname']);
            update_post_meta($post_id, 'apps_application_lastname', $apps_application_lastname);
        }
        if (isset($_POST['apps_application_firstname'])) {
            $apps_application_firstname = sanitize_text_field($_POST['apps_application_firstname']);
            update_post_meta($post_id, 'apps_application_firstname', $apps_application_firstname);
        }
        if (isset($_POST['apps_application_single_post'])) {
            $apps_application_single_post = sanitize_text_field($_POST['apps_application_single_post']);
            update_post_meta($post_id, 'apps_application_single_post', $apps_application_single_post);
        }
    }
}

new Meta_Box_Application();