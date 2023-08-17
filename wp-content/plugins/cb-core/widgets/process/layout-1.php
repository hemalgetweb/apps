<section class="cb-process-area my-5">
    <div class="container process">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="row">
            <?php
                foreach($settings['slides'] as $index => $slide) :
                $position_aos_fade = "";
                if($index == 1 || $index == 2 || $index == 3 || $index == 7 || $index == 8 || $index == 9) {
                    $position_aos_fade = "fade-right";
                } elseif($index == 1 || $index == 2 || $index == 3) {
                    $position_aos_fade = "fade-left";
                }
                $ml_class = '';
                $ml_auto_class = '';
                $margin_auto = '';
                if($index == 0 || $index == 2 || $index == 4 || $index == 6 || $index == 8) {
                    $ml_class = 'm-left';
                }
                if($index == 0 || $index == 3 || $index == 6) {
                    $ml_auto_class = 'ml-auto';
                }
                if($index == 1 || $index == 4 || $index == 7) {
                    $margin_auto = 'margin-auto';
                }

            ?>
            <div class="col-xl-4 col-md-6">
                <div class="process-item aos-init aos-animate" data-aos="<?php echo $position_aos_fade; ?>">
                    <div class="process-inner <?php echo esc_attr($ml_class); ?> <?php echo esc_attr($ml_auto_class); ?> <?php echo esc_attr($margin_auto); ?>">
                        <div class="img-wrapper">
                        <?php if(!empty($slide['process_icon_sm']['url'])) : ?>
                            <img src="<?php echo $slide['process_icon_sm']['url']; ?>" class="process-m-icon" alt="<?php echo  \Elementor\Control_Media::get_image_alt( $slide['process_icon_sm'] ); ?>">
                        <?php endif; ?>
                        <?php if(!empty($slide['process_icon']['url'])) : ?>
                            <img src="<?php echo $slide['process_icon']['url']; ?>" class="process-icon" alt="<?php echo  \Elementor\Control_Media::get_image_alt( $slide['process_icon'] ); ?>">
                        <?php endif; ?>
                    </div>
                    <div>
                        <?php if(!empty($slide['process_title'])) : ?>
                            <h4 class="process-title"><?php echo esc_html($slide['process_title']); ?></h4>
                        <?php endif; ?>
                        <?php if(!empty($slide['process_content'])) : ?>
                        <p class="process-desc">
                            <?php echo esc_html($slide['process_content']); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>