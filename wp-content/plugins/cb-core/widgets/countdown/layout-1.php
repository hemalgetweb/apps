<?php if(!empty($settings['slides'])) : ?>
<!-- overview -->
<section class="overview">
    <div class="container">
        <div class="our-strategy row">
            <?php foreach($settings['slides'] as $slide) : ?>
            <div class="col-xl-4 col-sm-6 mb-4 mb-xl-0">
                <div class="strategy-item bg-white">
                    
                    <div class="countdown-number-wrap">
                        <?php if(!empty($slide['coutdown_number'])) : ?>
                            <h4 class="number"> <span class="counter"><?php echo esc_html($slide['coutdown_number']); ?></span></h4>
                        <?php endif; ?>
                        <?php if(!empty($slide['coutdown_label'])) : ?>
                            <p class="fs-18 fw-normal text-clr-dark2 mb-0"><?php echo esc_html($slide['coutdown_label']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- overview -->
<?php endif; ?>