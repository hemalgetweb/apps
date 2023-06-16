<?php if(!empty($settings['slides'])) : ?>
<!-- steps area start -->
<section class="steps-area">
    <div class="container">
        <div class="row row-cols-xxl-5 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
            <?php foreach($settings['slides'] as $slide) : ?>
            <div class="col">
                <div class="apps-steps-box-114 mb-30">
                    <?php if(!empty($slide['step_count'])) : ?>
                        <h3 class="apps-steps-box-count-114"><?php echo esc_html($slide['step_count']); ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($slide['step_title'])) : ?>
                        <h5 class="apps-steps-box-title-114"><?php echo esc_html($slide['step_title']); ?><h5>
                    <?php endif; ?>
                    <?php if(!empty($slide['step_desc'])) : ?>
                    <p class="apps-steps-box-content-114">
                        <?php echo wp_kses_post($slide['step_desc']); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- steps area end -->
<?php endif; ?>