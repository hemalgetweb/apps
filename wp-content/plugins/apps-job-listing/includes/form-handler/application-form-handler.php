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
    
}