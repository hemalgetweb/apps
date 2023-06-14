<div class="strategy-wrapper py-4">
  <div class="container">
    <div
      class="our-strategy position-relative d-flex gap-sm-4 gap-3 align-items-center justify-content-lg-between justify-content-center mt-5 mt-lg-0 wow fadeInUp"
      data-wow-duration="0.200s" data-wow-delay="600ms">
      <div class="strategy-item d-flex align-items-center flex-wrap flex-lg-nowrap gap-3">
        <div class="icon">
          <?php if (!empty($settings['strategy_icon'])): ?>
            <img src="<?php echo esc_url($settings['strategy_icon']['url']); ?>" alt="icon" class="img-fluid">
          <?php endif; ?>
        </div>
        <div class="strategy-info">
          <?php if (!empty($settings['strategy_title'])): ?>
            <h5 class="text-clr-primary2 fs-6 mb-0 lh-base">
              <?php echo cb_core_kses_basic($settings['strategy_title']); ?>
            </h5>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>