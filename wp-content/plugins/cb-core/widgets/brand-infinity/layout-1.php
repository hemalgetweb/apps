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
      <div class="marquee-reverse">
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
    <?php endif; ?>
  </div>


</div>
<!--/ Happy Clients end -->