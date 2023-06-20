<?php
    if(!empty($settings['slides'])) :
?>
<!-- Focus Industries start -->
    <div class="apps-focus-industries-area-1-114">
        <div class="container">
            <div class="overflow-hidden">
                <div class="instruction-wrap row position-relative g-0">
                    <?php foreach($settings['slides'] as $slide) : ?>
                    <div class="col-4 col-sm-3 col-lg-2 text-end instruction-item">
                        <div class="icon px-3 py-4 text-center">
                        <?php if(!empty($slide['category_image']['url'])) : ?>
                        <div class="wrapper-img  d-flex align-items-center justify-content-center">
                            <?php echo wp_get_attachment_image( $slide['category_image']['id'], 'thumbnail' ); ?>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($slide['category_label'])) : ?>
                            <p class=" fs-14 text-white fw-bold mt-3 mb-0"><?php echo esc_html($slide['category_label']); ?></p>
                        <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!--/  Focus Industries end  -->
<?php endif; ?>