<?php
namespace APPS_Application_LISTING\FORM_HANDLER;
function updateSettingsPageOption() {
    // Check if the form is submitted and the user has the necessary capability
    if (isset($_POST['submit_application_settings']) && current_user_can('manage_options')) {
        // Sanitize and save the selected application form page ID
        $selected_page_id = isset($_POST['select_application_page']) ? intval($_POST['select_application_page']) : 0;
        update_option('application_form_page_id', $selected_page_id);
        // Display a success message
        echo '<div class="notice notice-success"><p>Settings saved successfully.</p></div>';
    }
}

function updateApplicationFormOptions() {
    if(isset($_POST['submit_application'])) {
        /**
         * move submited image into wp-content/uploads/apps-job-listing/
         */
        $upload_dir = wp_upload_dir();
        $plugin_directory = $upload_dir['basedir']. '/apps-job-listing/';
        // Create the plugin directory if it doesn't exist
        if (!is_dir($plugin_directory)) {
          mkdir($plugin_directory, 0755, true);
        }
        $fileInputName = 'application_upload_file';
        $application_upload_file = $_FILES[$fileInputName];
        $application_upload_file_filtered = filter_input(INPUT_POST, $fileInputName, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        $application_upload_file_name = $application_upload_file['name'];
        $application_upload_file_tmp_path = $application_upload_file['tmp_name'];
        $unique_file_name = wp_unique_filename($plugin_directory, $application_upload_file_name);
        // Move the uploaded file to the plugin directory
        if (!move_uploaded_file($application_upload_file_tmp_path, $plugin_directory . $unique_file_name)) {
          echo 'Failed to move the uploaded file.';
        }
        $image_saved_base_path = $upload_dir['baseurl'];
        $sanitized_image_url = $image_saved_base_path . '/apps-job-listing/' . $unique_file_name;
        $application_job_id = filter_input(INPUT_POST, 'application_job_id', FILTER_SANITIZE_STRING);
        $application_job_title = get_the_title($application_job_id);
        $application_user_firstname = filter_input(INPUT_POST, 'application_user_firstname', FILTER_SANITIZE_STRING);
        $application_user_lastname = filter_input(INPUT_POST, 'application_user_lastname', FILTER_SANITIZE_STRING);
        $application_user_contact = filter_input(INPUT_POST, 'application_user_contact', FILTER_SANITIZE_STRING);
        $application_user_email = filter_input(INPUT_POST, 'application_user_email', FILTER_SANITIZE_STRING);
        $application_user_country = filter_input(INPUT_POST, 'application_user_country', FILTER_SANITIZE_STRING);
        $application_username = "";
        if(!empty($application_user_firstname) && !empty($application_user_lastname)) {
          $application_username = $application_user_firstname.' '.$application_user_lastname;
        } else if(!empty($application_user_firstname)) {
          $application_username = $application_user_firstname;
        } else {
          echo "Please insert First Name & Last Name";
          return;
        }
        // Prepare post data
        $post_data = array(
          'post_title'   => $application_username,
          'post_content' => '',
          'post_status'  => 'draft',
          'post_type'    => 'application'
        );
        $post_id = wp_insert_post($post_data);
        if ($post_id) {
          // Insert custom meta data
          if ($post_id) {
            update_post_meta($post_id, '_application_job_id', $application_job_id);
            update_post_meta($post_id, 'apps_application_firstname', $application_user_firstname);
            update_post_meta($post_id, 'apps_application_lastname', $application_user_lastname);
            update_post_meta($post_id, 'apps_application_contact_number', $application_user_contact);
            update_post_meta($post_id, 'apps_application_email', $application_user_email);
            update_post_meta($post_id, 'apps_application_select_country', $application_user_country);
            update_post_meta($post_id, 'apps_application_job_holder_image', $sanitized_image_url);
            // Add more meta keys and values as needed
          }
          $_SESSION['submit_application'] = 'success';
        } else {
            // Failed to insert the post
            echo 'Failed to insert the application post.';
        }
      }
}