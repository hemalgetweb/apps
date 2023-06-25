<?php
namespace APPS_Application_LISTING\POST_TYPES\POST_TYPE_APPLICATION;
use APPS_Application_LISTING\FORM_HANDLER;
use WP_Query;
?>
<?php
FORM_HANDLER\updateSettingsPageOption();
$args = array(
  'post_type' => 'job',
  'post_per_page' => -1,
  'order' => 'ASC'
);
$pages = new WP_Query($args);
$post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : 0;
// Verify user capabilities and nonce
$job_title = '';
$job_id = '';
if(isset( $_GET['_wpnonce'] )) {
  if ( current_user_can( 'edit_post', $post_id ) && wp_verify_nonce( $_REQUEST['_wpnonce'], 'add-application-' . $post_id ) ) {
    $job_title = get_the_title($post_id);
    $job_id = $post_id;
  }
}

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
  $image_saved_path = $plugin_directory. $unique_file_name;
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
    'post_status'  => 'publish',
    'post_type'    => 'application'
  );
  $post_id = wp_insert_post($post_data);
  if ($post_id) {
    // Insert custom meta data
    if ($post_id) {
      update_post_meta($post_id, 'apps_application_single_post', $application_job_title);
      update_post_meta($post_id, 'apps_application_firstname', $application_user_firstname);
      update_post_meta($post_id, 'apps_application_lastname', $application_user_lastname);
      update_post_meta($post_id, 'apps_application_contact_number', $application_user_contact);
      update_post_meta($post_id, 'apps_application_email', $application_user_email);
      update_post_meta($post_id, 'apps_application_select_country', $application_user_country);
      update_post_meta($post_id, 'apps_application_job_holder_image', $image_saved_path);
      // Add more meta keys and values as needed
    }
  } else {
      // Failed to insert the post
      echo 'Failed to insert the application post.';
  }
}
?>




<!-- job-application-form -->
<section class="job-application-form section-padding">
  <div class="container">
    <div class="form-wrapper">
      <div class="form-header text-center mb-5">
        <h2 class="text-clr-dark1 fs-48 mb-3">
          Job application form
        </h2>
        <p class="text-clr-dark2">
          Working with our clients’ point of contact to build low and high-fidelity website wireframes that utilize the
          most effective strategies and remain within the goals of our client.
        </p>
      </div>
      <form enctype="multipart/form-data" action="#" method="post" class="application-form">
        <div class="row">
          <div class="col-12">
            <label for="application_job_id" class="form-label fs-14 fw-bold text-clr-dark2">Job Title *</label>
            <?php if($pages->have_posts()) : ?>
              <select class="select2-init form-select fs-14 text-clr-dark2 form-field mb-4" id="application_job_id" name="application_job_id">
                  <?php while($pages->have_posts()) :
                  $pages->the_post(); 
                  $page_id = get_the_ID();
                  $page_title = get_the_title($page_id);
                  $selected = $job_id == $page_id ? 'selected':'';
                  ?>
                      <option <?php echo $selected; ?> value="<?php echo $page_id; ?>"><?php echo $page_title; ?></option>
                  <?php endwhile; ?>
              </select>
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="application_user_firstname" class="form-label fs-14 fw-bold text-clr-dark2">First Name *</label>
              <input type="text" class="form-control form-field" name="application_user_firstname" id="application_user_firstname" placeholder="Enter your first name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4 pb-2">
              <label for="application_user_lastname" class="form-label fs-14 fw-bold text-clr-dark2">Last Name</label>
              <input type="text" class="form-control form-field" name="application_user_lastname" id="application_user_lastname" placeholder="Enter your last name">
            </div>
          </div>
          <div class="col-12">
            <div class="country-code mb-4">
              <label for="application_user_contact" class="form-label fs-14 fw-bold text-clr-dark2">
                Contact Number
              </label>
              <div class="phone-wrap border d-flex align-items-center overflow-hidden bg-white">
                <select class="select2-init form-select text-clr-dark2 fs-14 border-0 py-0 px-2 bg-transparent">
                  <option selected>BD(+88)</option>
                  <option value="213">DZ (+213)</option>
                  <option value="376">AD (+376)</option>
                  <option value="1268">AG (+1268)</option>
                  <option value="374">AM (+374)</option>
                  <option value="297">AW (+297)</option>
                  <option value="20">EG (+20)</option>
                  <option value="503">SV (+503)</option>
                </select>
                <input type="text" class="form-control border-0 rounded-0 border-start px-3 fs-14 text-clr-dark2"
                  id="application_user_contact" placeholder="Enter your number">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="application_user_email" class="form-label fs-14 fw-bold text-clr-dark2">Email</label>
              <input type="text" class="form-control form-field" id="application_user_email" name="application_user_email" placeholder="Enter your first name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="application_user_country" class="form-label fs-14 fw-bold text-clr-dark2">Country</label>
              <select class="select2-init form-select fs-14 text-clr-dark2 form-field mb-4" name="application_user_country" id="application_user_country">
                <option selected>Bangladesh</option>
                <option value=" 1">Pakistan</option>
                <option value="2">India</option>
                <option value="3">USA</option>
                <option value="3">UK</option>
                <option value="3">Dubai</option>
              </select>
            </div>
          </div>
          <div class="col-12">
            <div class="file-uploads">
              <label for="application_upload_file" class="form-label fs-14 fw-bold text-clr-dark2 d-block">
                File upload
                <input type="file" name="application_upload_file" id="application_upload_file" class="d-none">
                <span class="attach-file d-block p-3 bg-white rounded-4 mt-2 text-center">
                  <span class="attach-text fw-normal">
                    <span class="ni ni-upload text-clr-dark1"></span>
                    Attach your file
                  </span>
                </span>
              </label>
              <p class="fs-12 mb-4 pb-3">
                Allowed formates are .jpg, .jpeg, .png, .gif, .docx, .doc, .pdf and maximum size 10MB
              </p>
              <div class="btn-wrap">
                <button type="submit" name="submit_application" class="bg-btn btn bg-clr-primary text-clr-dark1 px-4 fw-bold">
                  Submit Application
                </button>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
</section>
<!--/ job-application-form -->