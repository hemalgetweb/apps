<?php if(!empty($settings['slides'])) : ?>
<div class="apps-feature-list-widget-114">
    <div class="container">
        <div class="row">
            <?php foreach($settings['slides'] as $slide) : ?>
            <div class="col-xxl col-xl col-lg-4 col-md-4 col-sm-6">
                <div class="apps-feature-list-box-114 mb-30">
                    <?php if(!empty($slide['feature_count'])) : ?>
                    <h4 class="apps-feature-list-box-count-114">
                        <?php echo wp_kses_post($slide['feature_count']); ?>
                    </h4>
                    <?php endif; ?>
                    <?php if(!empty($slide['feature_title'])) : ?>
                        <h5 class="apps-feature-list-box-title-114"><?php echo wp_kses_post($slide['feature_title']); ?></h5>
                    <?php endif; ?>
                    <?php if(!empty($slide['feature_content'])) : ?>
                        <p><?php echo wp_kses_post($slide['feature_content']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>