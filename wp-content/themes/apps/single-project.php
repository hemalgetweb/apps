<?php

// Template Name: Case Studies Details

?>
<?php get_header();
$project_overview = function_exists("get_field") ? get_field("project_overview") : '';
$project_objective = function_exists("get_field") ? get_field("project_objective") : '';
$process_1 = function_exists("get_field") ? get_field("process_1") : '';
$process_01_title = $process_1 ? $process_1['process_01_title'] : '';
$process_01_sub_title = $process_1 ? $process_1['process_01_sub_title'] : '';
$process_01_description = $process_1 ? $process_1['process_01_description'] : '';
$process_01_image = $process_1 ? $process_1['process_01_image'] : '';
$process_2 = function_exists("get_field") ? get_field("process_2") : '';
$process_02_title = $process_2 ? $process_2['process_02_title'] : '';
$process_02_sub_title = $process_2 ? $process_2['process_02_sub_title'] : '';
$process_2_description = $process_2 ? $process_2['process_2_description'] : '';
$process_2_image = $process_2 ? $process_2['process_2_image'] : '';
$process_3 = function_exists("get_field") ? get_field("process_3") : '';
$process_03_title = $process_3 ? $process_3['process_03_title'] : '';
$process_3_subtitle = $process_3 ? $process_3['process_3_subtitle'] : '';
$process_3_description = $process_3 ? $process_3['process_3_description'] : '';
$process_3_image = $process_3 ? $process_3['process_3_image'] : '';
$process_4 = function_exists("get_field") ? get_field("process_4") : '';
$process_4_title = $process_4 ? $process_4['process_4_title'] : '';
$process_4_image = $process_4 ? $process_4['process_4_image'] : '';
$process_4_subtitle = $process_4 ? $process_4['process_4_subtitle'] : '';
$process_4_description = $process_4 ? $process_4['process_4_description'] : '';
$process_5 = function_exists("get_field") ? get_field("process_5") : '';
$process_5_title = $process_5 ? $process_5['process_5_title'] : '';
$process_5_subtitle = $process_5 ? $process_5['process_5_subtitle'] : '';
$process_5_gallery = function_exists("get_field") ? get_field("process_5_gallery") : '';
$process_5_description = $process_5 ? $process_5['process_5_description'] : '';
$process_5_image_1 = $process_5 ? $process_5['process_5_image_1'] : '';
$process_5_image_2 = $process_5 ? $process_5['process_5_image_2'] : '';
$process_6 = function_exists("get_field") ? get_field("process_6") : '';
$process_6_subtitle = $process_6 ? $process_6['process_6_subtitle'] : '';
$process_6_title = $process_6 ? $process_6['process_6_title'] : '';
$process_6_content = $process_6 ? $process_6['process_6_content'] : '';
$process_gallery_images = function_exists("get_field") ? get_field("process_gallery_images") : '';
?>


  <!-- case-studies-sec1 -->
  <section class="case-studies-sec1">
    <div class="container">
      <div class="case-studies-after-header">
        <div class="case-studies-sec1-content text-center">
          <div class="case-studies-sec1-content-wrap">
            <a href="https://wadialbadaitsolutions.ae/case-studies/" class="tagline text-decoration-none fw-bold fs-14 position-relative">
              <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M9 4.5L9.7965 5.2965L6.65625 8.4375H13.5V9.5625H6.65625L9.7965 12.7035L9 13.5L4.5 9L9 4.5Z" fill="#00C7C7" />
              </svg>
              Case studies
            </a>
            <h1 class="fs-48 fw-medium text-white mb-0 mt-2 pb-3">
              <?php echo wp_kses_post(get_the_title()); ?>
            </h1>
            <p class="ah-intro">
              <?php echo get_the_excerpt(); ?>
            </p>
          </div>

          <div class="case-detail-thumb">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ case-studies-sec1 -->

  <!-- case-studies-sec2 -->
  <section class="case-studies-sec2 section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
          <div class="case-studies-sec2-card bg-white radius-6 p-4 h-100">
            <h3 class="mb-3 fs-36">
              Overview
            </h3>
            <?php echo wp_kses_post($project_overview); ?>
          </div>
        </div>
        <div class="col-md-6 mb-4 mb-md-0">
          <div class="case-studies-sec2-card bg-white radius-6 p-4 h-100">
            <h3 class="mb-3 fs-36">
              Objective
            </h3>
            <?php echo wp_kses_post($project_objective); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ case-studies-sec2 -->

  <!-- case-studies-process-01 -->
  <section class="case-studies-process-01 process-bg-dark section-padding">
    <div class="container">
      <div class="text-center pb-4 case-studies-process-content-wrap">
        <?php if (!empty($process_01_sub_title)) : ?>
          <span class="apps-service-section-subtitle-114 text-clr-primary-new">
            <img src="https://wadialbadaitsolutions.ae/wp-content/themes/apps/assets/img/service-spinner.png" alt="service">
            <?php echo esc_html($process_01_sub_title); ?>
          </span>
        <?php endif; ?>
        <?php if (!empty($process_01_title)) : ?>
          <h2 class="apps-service-section-title-114 text-white">
            <?php echo esc_html($process_01_title); ?>
          </h2>
        <?php endif; ?>
        <?php if (!empty($process_01_description)) : ?>
          <div class="intro text-clr-dark-5-new fs-18">
            <?php echo wp_kses_post($process_01_description); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($process_01_image)) : ?>
        <div class="process-img">
          <img src="<?php echo esc_url($process_01_image); ?>" alt="research" class="img-fluid">
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- case-studies-process-01 -->

  <!-- case-studies-process-02 -->
  <section class="case-studies-process-01 section-padding bg-white">
    <div class="container">
      <div class="text-center pb-4 case-studies-process-content-wrap">
        <?php if (!empty($process_02_sub_title)) : ?>
          <span class="apps-service-section-subtitle-114 text-clr-dark-new3">
            <img src="https://wadialbadaitsolutions.ae/wp-content/themes/apps/assets/img/service-spinner.png" alt="service">
            <?php echo wp_kses_post($process_02_sub_title); ?>
          </span>
        <?php endif; ?>
        <?php if (!empty($process_02_title)) : ?>
          <h2 class="apps-service-section-title-114 text-clr-dark-new">
            <?php echo wp_kses_post($process_02_title); ?>
          </h2>
        <?php endif; ?>
        <?php if (!empty($process_2_description)) : ?>
          <div class="intro text-clr-dark-new2 fs-18">
            <?php echo wp_kses_post($process_2_description); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($process_2_image)) : ?>
        <div class="process-img">
          <img src="<?php echo esc_url($process_2_image); ?>" alt="research" class="img-fluid">
        </div>
      <?php endif; ?>
    </div>
    </div>
  </section>
  <!-- case-studies-process-02 -->

  <!-- case-studies-process-03 -->
  <section class="case-studies-process-01 process-bg-light section-padding">
    <div class="container">
      <div class="text-center pb-4 case-studies-process-content-wrap">
        <?php if (!empty($process_3_subtitle)) : ?>
          <span class="apps-service-section-subtitle-114 text-color-dark-3">
            <img src="https://wadialbadaitsolutions.ae/wp-content/themes/apps/assets/img/service-spinner.png" alt="service">
            <?php echo wp_kses_post($process_3_subtitle); ?>
          </span>
        <?php endif; ?>
        <?php if (!empty($process_03_title)) : ?>
          <h2 class="apps-service-section-title-114 text-clr-dark-new">
            <?php echo wp_kses_post($process_03_title); ?>
          </h2>
        <?php endif; ?>
        <?php if (!empty($process_3_description)) : ?>
          <div class="intro text-clr-dark-new2 fs-18">
            <?php echo wp_kses_post($process_3_description); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($process_3_image)) : ?>
        <div class="process-img">
          <img src="<?php echo esc_url($process_3_image); ?>" alt="research" class="img-fluid">
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- case-studies-process-03 -end -->
  <!-- case-studies-process-04 -->
  <section class="case-studies-process-01 section-padding bg-white">
    <div class="container">
      <div class="text-center pb-4 case-studies-process-content-wrap">
        <?php if (!empty($process_4_subtitle)) : ?>
          <span class="apps-service-section-subtitle-114 text-clr-dark-new3">
            <img src="https://wadialbadaitsolutions.ae/wp-content/themes/apps/assets/img/service-spinner.png" alt="service">
            <?php echo wp_kses_post($process_4_subtitle); ?>
          </span>
        <?php endif; ?>
        <?php if (!empty($process_4_title)) : ?>
          <h2 class="apps-service-section-title-114 text-clr-dark-new">
            <?php echo wp_kses_post($process_4_title); ?>
          </h2>
        <?php endif; ?>
        <?php if (!empty($process_4_description)) : ?>
          <div class="intro text-clr-dark-new2 fs-18">
            <?php echo wp_kses_post($process_4_description); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($process_4_image)) : ?>
        <div class="process-img">
          <img src="<?php echo $process_4_image; ?>" alt="research" class="img-fluid">
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- case-studies-process-04 -end -->

  <!-- case-studies-process-05 -->
  <section class="case-studies-process-01 process-bg-light section-padding case-studies-process-style-guide">
    <div class="container">
      <div class="text-center pb-4 case-studies-process-content-wrap">
        <?php if (!empty($process_5_subtitle)) : ?>
          <span class="apps-service-section-subtitle-114 text-color-dark-3">
            <img src="https://wadialbadaitsolutions.ae/wp-content/themes/apps/assets/img/service-spinner.png" alt="service">
            <?php echo wp_kses_post($process_5_subtitle); ?>
          </span>
        <?php endif; ?>
        <?php if (!empty($process_5_title)) : ?>
          <h2 class="apps-service-section-title-114 text-clr-dark-new">
            <?php echo wp_kses_post($process_5_title); ?>
          </h2>
        <?php endif; ?>
        <?php if (!empty($process_5_description)) : ?>
          <div class="intro text-clr-dark-new2 fs-18">
            <?php echo wp_kses_post($process_5_description); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($process_5_gallery)) : ?>
        <div class="row">
          <?php
          $total_post_count = count($process_5_gallery);
          foreach ($process_5_gallery as $index => $gallery) :
            $col_class = $total_post_count == 1 ? 'col-12' : 'col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12';
          ?>
            <div class="<?php echo $col_class; ?>">
              <div class="process-img">
                <img src="<?php echo $gallery['full_image_url']; ?>" alt="research" class="img-fluid">
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- case-studies-process-05 -end -->

  <!--  case-studies-process-06 -->
  <section class="case-studies-project-demo section-padding">
    <div class="apps-project-wrapper-114 p-rel">
      <div class="text-center pb-4 case-studies-process-content-wrap">
        <?php if (!empty($process_6_subtitle)) : ?>
          <span class="apps-service-section-subtitle-114 text-color-dark-3">
            <img src="https://wadialbadaitsolutions.ae/wp-content/themes/apps/assets/img/service-spinner.png" alt="service">
            <?php echo wp_kses_post($process_6_subtitle); ?>
          </span>
        <?php endif; ?>
        <?php if (!empty($process_6_title)) : ?>
          <h2 class="apps-service-section-title-114 text-clr-dark-new">
            <?php echo wp_kses_post($process_6_title); ?>
          </h2>
        <?php endif; ?>
        <?php if (!empty($process_6_content)) : ?>
          <div class="intro  text-clr-dark-new2 fs-18">
            <?php echo wp_kses_post($process_6_content); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($process_gallery_images)) : ?>
        <div class="owl-carousel case-studies-project-slider-active">
            <?php foreach ($process_gallery_images as $index => $image) : ?>
              <div class="owl-slide">
                <!-- project card -->
                <div class="project-owl-slide-item">
                  <img src="<?php echo esc_url($image['full_image_url']); ?>" alt="project image" class="img-fluid">
                </div>
                <!-- project card -end -->
              </div>
            <?php endforeach; ?>
        </div>
        <!-- swiper-control -->
        <!-- <div class="swiper-control">
          <div class="swiper-pagination113 d-none"></div>
          <div class="related-post-arrow">
            <button type="button" class="swiper-prev case-project-next-114 swiper-arrow border-0">
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 10L5.885 9.115L2.39583 5.625H10V4.375H2.39583L5.885 0.885L5 0L0 5L5 10Z" fill="#73A7C3" />
              </svg>
            </button>
            <button type="button" class="swiper-next case-project-prev-114 swiper-arrow border-0">
              <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 0L4.115 0.885L7.60417 4.375L0 4.375L0 5.625L7.60417 5.625L4.115 9.115L5 10L10 5L5 0Z" fill="#73A7C3" />
              </svg>
            </button>
          </div>
        </div> -->
        <!--/ swiper-control -->
      <?php endif; ?>
    </div>
  </section>
  <!--  case-studies-process-06 -->

<!-- case-studies-project-demo end -->
<?php the_content(); ?>
<?php
get_footer();
