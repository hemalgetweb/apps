<div class="strategy-wrapper py-3 py-lg-4">
  <div class="container">
    <?php if (!empty($settings['slides'])): ?>
      <div
        class="our-strategy position-relative d-flex gap-sm-4 gap-2 gap-md-3 align-items-center justify-content-lg-between mt-lg-0 wow fadeInUp flex-wrap flex-xl-nowrap"
        data-wow-duration="0.200s" data-wow-delay="600ms">
        <?php foreach ($settings['slides'] as $slide): ?>
          <div class="strategy-item d-flex align-items-center has-strategy-gap-114">
            <div class="icon flex-shrink-0">
              <?php if (!empty($slide['strategy_icon'])): ?>
                <?php echo wp_get_attachment_image( $slide['strategy_icon']['id'], 'thumbnail' ); ?>
              <?php endif; ?>
            </div>
            <div class="strategy-info">
              <?php if (!empty($slide['strategy_title'])): ?>
                <h5 class="text-white fs-6 mb-0 lh-base fw-light">
                  <?php echo cb_core_kses_basic($slide['strategy_title']); ?>
                </h5>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>


