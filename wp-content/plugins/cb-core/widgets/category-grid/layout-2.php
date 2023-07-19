<?php
$box_height = $settings['box_height'] ?? $settings['box_height'];
?>
<!-- category area start -->
<section class="apps-category-area">
    <div class="container">
        <div class="apps-category-grid-category-wrapper">
            <div class="row row-cols-xxl-5 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-12">
                <?php foreach($settings['slides'] as $slide) : ?>
                <div class="col-12">
                    <div class="apps-category-grid-item-single-114 mb-20" style="min-height: <?php echo $box_height ?>px;">
                        <div class="icon">
                            <?php echo wp_get_attachment_image( $slide['category_image']['id'], 'thumbnail' );; ?>
                        </div>
                        <?php if(!empty($slide['category_label'])) : ?>
                        <div class="content">
                            <h5 class="title"><?php echo esc_html($slide['category_label']); ?></h5>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- category area end -->