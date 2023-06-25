<?php

// Add a shortcode to display the content without header and footer
function apps_handle_application_form() {
    require_once AJL_INCLUDE_DIR. 'templates/application-form.php';
}
add_shortcode('application_form', 'apps_handle_application_form');