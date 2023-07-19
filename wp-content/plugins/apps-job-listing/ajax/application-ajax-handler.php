<?php
namespace APPS_Application_LISTING\AJAX;
use APPS_Application_LISTING\MAIL\SendMailForApplication;

if (!is_admin()) {
    return;
}

class APPLICATION_AJAX_HANDLER {
    public function __construct() {
        add_action('wp_ajax_update_approval_status', [$this, 'apps_application_update_approval_status']);
        add_action('wp_ajax_noprev_update_approval_status', [$this, 'apps_application_update_approval_status']);
        add_action('admin_enqueue_scripts', [$this, 'apps_required_assets_for_ajax']);
    }

    function apps_required_assets_for_ajax() {
        wp_enqueue_script('apps-ajax', AJL_ADMIN_DIR . 'js/apps-ajax-handler.js', array('jquery'), AJL_PLUGINS_VERSION, true);
        wp_localize_script('apps-ajax', 'custom_ajax_obj', array(
            'ajax_url' => admin_url('admin-ajax.php'),
        ));
    }

    function apps_application_update_approval_status() {
        if (isset($_POST['post_id']) && isset($_POST['status'])) {
            $post_id = intval($_POST['post_id']);
            $job_id = get_post_meta($post_id, '_application_job_id', true);
            $company_logo_url = get_post_meta($job_id, 'company_logo', true);
            $job_title = get_the_title($job_id);
            // Specify the post ID, post type, and taxonomy
            $post_type = 'job'; // Replace with the desired post type
            $taxonomy = 'jobs_category'; // Replace with the custom taxonomy slug

            // Get the terms from the specified taxonomy for the post
            $terms = wp_get_post_terms($job_id, $taxonomy);
            $job_cat_name = '';
            // Check if terms were found
            if (!empty($terms) && !is_wp_error($terms)) {
                // Get the first term
                $first_term = reset($terms);
                // Output the category name
                $job_cat_name = $first_term->name;
            }
            $application_user_name = get_the_title($post_id);
            $status = sanitize_text_field($_POST['status']);
            $approveStatus = '';
            $statusText = '';
            
            if ('draft' == $status) {
                $approveStatus = "Rejected";
                $statusText = '<p>We regret to inform you that your application for the position of ' . $job_title . ' has been rejected. Thank you for your interest in our company and taking the time to apply. We appreciate your effort and wish you the best in your future endeavors.</p>';
            } else {
                $approveStatus = "Approved";
                $statusText = '<b>Congratulations!</b> We are delighted to inform you that your application for the position of ' . $job_title . ' has been approved. We were impressed with your qualifications and experience, and we believe you will be a valuable addition to our team. We look forward to welcoming you to [Your Company] and working together to achieve great things. Please let us know your availability for further discussions and next steps. Once again, congratulations on your successful application!';
            }
            
            $post_data = array(
                'ID' => $post_id,
                'post_status' => $status
            );
    
            wp_update_post($post_data);
            
            /**
             * Now let's send an email
             */
            $mailer = new SendMailForApplication();
            $mailer->send_email($approveStatus, $application_user_name, $job_title, $post_id, $statusText, $job_cat_name, $company_logo_url);
            
            wp_send_json_success();
        }
    
        wp_send_json_error();
    }
}

new APPLICATION_AJAX_HANDLER();