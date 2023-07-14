<?php
$enable_small_box_class = $settings['enable_small_box'] ? 'has-enable-small-box-class': '';
?>
<!--  Happy Clients start -->
<div class="section-padding p-0">
  <div class="brand-carousel-area <?php echo esc_attr($enable_small_box_class); ?>">
    <?php if (empty($settings['reverce_direction'])): ?>
      <div class="marquee-vertical">
        <?php if (!empty($settings['slides'])): ?>
          <div class="top-slide-wrap d-flex align-items-center">
            <?php foreach ($settings['slides'] as $slide): ?>
              <div class="slide-item radius-6 d-flex align-items-center justify-content-center">
                <?php if (!empty($slide['product_brand_image'])): ?>
                  <img src="<?php echo esc_url($slide['product_brand_image']['url']); ?>" class="img-fluid" alt="icon">
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php else: ?>
      <div class="marquee-reverse mt-lg-4 mt-3">
        <?php if (!empty($settings['slides'])): ?>
          <div class="top-slide-wrap d-flex align-items-center">
            <?php foreach ($settings['slides'] as $slide): ?>
              <div class="slide-item radius-6 d-flex align-items-center justify-content-center">
                <?php if (!empty($slide['product_brand_image'])): ?>
                  <?php echo wp_get_attachment_image($slide['product_brand_image']['id'], 'full'); ?>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="text-center mt-5">
        <div class="d-inline-block">
          <a class="btn position-relative rounded bg-btn text-uppercase border-0 bg-clr-extraLight text-clr-dark1 fs-14 fw-bold d-flex gap-2 align-items-center "
            href="client.html">
            View all Clients
            <svg class="btn-icon position-absolute" width="10" height="10" viewBox="0 0 10 10" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#003C4F" />
            </svg>
          </a>
        </div>
      </div>
    <?php endif; ?>
  </div>


</div>
<!--/ Happy Clients end -->