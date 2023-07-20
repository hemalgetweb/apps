<?php
namespace APPS_Application_LISTING\POST_TYPES\POST_TYPE_APPLICATION;
use APPS_Application_LISTING\FORM_HANDLER;
use WP_Query;
// Start the session
if (!session_id()) {
  session_start();
}
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
  if ( wp_verify_nonce( $_REQUEST['_wpnonce'], 'add-application-' . $post_id ) ) {
    $job_title = get_the_title($post_id);
    $job_id = $post_id;
  }
}
FORM_HANDLER\updateApplicationFormOptions();
?>




<!-- job-application-form -->
<section class="job-application-form pt-100">
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
      <?php if (isset($_SESSION['submit_application']) && $_SESSION['submit_application'] === 'success') : ?>
      <div class="alert alert-success">Your Appliation Submitted Successfully</div>
      <?php unset($_SESSION['submit_application']); endif; ?>
      <form enctype="multipart/form-data" action="#" method="post" class="application-form">
        <div class="row">
          <div class="col-12">
            <div class="mb-20">
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
              <select class="select2-init form-select text-clr-dark2 fs-14 border-0 py-0 px-2 bg-transparent" required>
                <option value="88">BD (+88)</option>
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
              <input required type="email" class="form-control form-field" id="application_user_email" name="application_user_email" placeholder="Enter your Email">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="application_user_country" class="form-label fs-14 fw-bold text-clr-dark2">Country</label>
              <select required class="select2-init form-select fs-14 text-clr-dark2 form-field mb-4" name="application_user_country" id="application_user_country">
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
                <input required type="file" name="application_upload_file" id="application_upload_file" class="d-none">
                <span class="attach-file d-block p-3 bg-white rounded-4 mt-2 text-center">
                  <span class="attach-text fw-normal">
                    <span class="ni ni-upload text-clr-dark1"></span>
                    Attach your file
                  </span>
                </span>
              </label>
              <p class="fs-12 mb-4 pb-3">
                Allowed formats are .jpg, .jpeg, .png, .gif, .docx, .doc, .pdf, and maximum size is 10MB
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