<div class="top-brand py-25 has-section-title-center">
    <div class="container">
        <div class="panel">
            <div class="panel-header">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(!empty($settings['section_title'])) : ?>
                            <h2 class="title text-center"><?php echo esc_html($settings['section_title']); ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if(!empty($settings['slides'])) : ?>
            <div class="panel-body">
                <div class="row g-lg-3 g-2">
                    <?php foreach($settings['slides'] as $index => $slide) :
                        $image_url = esc_url($slide['product_brand_image']['url']) ? esc_url($slide['product_brand_image']['url']): '';    
                    ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <?php if(!empty($image_url)) : ?>
                        <div class="logo-box">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($image_url), '_wp_attachment_image_alt', true); ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>