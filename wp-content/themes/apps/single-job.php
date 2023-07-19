<?php
get_header();
$post_id = get_the_ID();
$job_duration = get_post_meta($post_id, 'job_duration', true);
$job_type = get_post_meta($post_id, 'onsite', true);
$company_tagline = get_post_meta($post_id, 'company_tagline', true);
$expected_experience = get_post_meta($post_id, 'expected_experience', true);
$position = get_post_meta($post_id, 'position', true);
$categories = get_the_category();
// pass page id to application form
$nonce = wp_create_nonce('add-application-'. $post_id);
$url = '';
$get_selected_page_from_settings = get_option('application_form_page_id');
if($get_selected_page_from_settings) {
  $selected_page_url = get_the_permalink($get_selected_page_from_settings);
  $url = add_query_arg(
    array(
      'post' => $post_id,
      'action' => 'add',
      '_wpnonce' => $nonce
    ),
    $selected_page_url
  );
}
?>

<!-- job banner area start -->
<section class="job-banner-area pt-175 pb-100">
  <div class="container">
    <span class="apps-job-banner-subtitle-114"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/rect.svg" alt="rect"> Jobs</span>
    <h2 class="apps-job-banner-title-114"><?php echo get_the_title(); ?></h2>
    <div class="apps-job-banner-meta-114">
      <?php if(!empty($job_duration)) : ?>
      <span><?php echo esc_html($job_duration); ?></span>
      <?php endif; ?>
      <?php if(!empty($job_type)) : ?>
      <span><?php echo esc_html($job_type); ?></span>
      <?php endif; ?>
    </div>
    <p class="apps-job-excerpt-114"><?php echo get_the_excerpt(); ?></p>
  </div>
</section>
<!-- job banner area end -->
<!-- job_post -->
<section class="job_post section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="apps-job-post-content-114">
          <?php
          echo get_the_content();
          ?>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="job_summary p-4 radius-6">
          <h3 class="fs-4 text-clr-dark1 fw-semi-bold mb-4">
            <?php echo esc_html__('Job Summary', 'apps'); ?>
          </h3>

          <ul class="job_key ps-4 mb-4">
            <li class="fs-18 fw-normal text-clr-dark2 mb-3">
              <?php echo esc_html__('Position --- ', 'apps'); ?>
              <?php if(!empty($position)) : ?>
                <?php echo esc_html($position); ?>
              <?php endif; ?>
            </li>
            <li class="fs-18 fw-normal text-clr-dark2 mb-3">
            <?php echo esc_html__('Employment Type --- ', 'apps'); ?>
              <?php if(!empty($job_duration)) : ?>
                <?php echo esc_html($job_duration); ?>
              <?php endif; ?>
            </li>
            <li class="fs-18 fw-normal text-clr-dark2 mb-3">
            <?php echo esc_html__('Industry ---  ', 'apps'); ?>
            <?php if(!empty($company_tagline)) : ?>
              <?php echo esc_html($company_tagline); ?>
            <?php endif; ?>
            </li>
            <li class="fs-18 fw-normal text-clr-dark2 mb-3">
              <?php echo esc_html__('Experience --- ', 'apps'); ?>
              <?php if(!empty($expected_experience)) : ?>
                <?php echo esc_html($expected_experience); ?>
              <?php endif; ?>
            </li>
            <li class="fs-18 fw-normal text-clr-dark2 mb-3">
              Remote Friendly --- 
              <?php if('Remote Friendly' == $job_type) : ?>
                <?php echo __('Yes', 'apps'); ?>
                <?php else: ?>
                <?php echo __('No', 'apps'); ?>
              <?php endif; ?>
            </li>
          </ul>

          <div class="btn-wrap" data-wow-duration="0.200s" data-wow-delay="400ms">
            <a class="btn rounded bg-btn text-uppercase border-0 bg-clr-extraLight text-clr-dark1 fs-14 fw-bold d-flex gap-2 align-items-center w-100 text-center d-flex justify-content-center"
              href="<?php echo esc_url($url); ?>">
              Apply now
              <svg class="btn-icon" width="10" height="10" viewBox="0 0 10 10" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#003C4F">
                </path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ job_post -->


<?php
get_footer();
?>

<?php
if (class_exists('Elementor\Plugin') && function_exists('get_post_meta')) {
  $elementor_template_id = get_post_meta($post_id, '_elementor_template_id', true);

  if (!empty($elementor_template_id)) {
      $elementor = \Elementor\Plugin::$instance;
      $content = $elementor->frontend->get_builder_content( $elementor_template_id );

      echo '<div class="elementor-wrapper">';
      echo $content; // Render the Elementor content
      echo '</div>';
  }
}