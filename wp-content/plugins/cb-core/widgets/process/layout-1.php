<section class="cb-process-area">
    <div class="container process">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="row">
            <?php
                foreach($settings['slides'] as $index => $slide) :
                $position_aos_fade = "";
                if($index <= 2 ) {
                    $position_aos_fade = "fade-right";
                } elseif($index >= 3 && $index<= 5) {
                    $position_aos_fade = "fade-left";
                } elseif($index >= 6 && $index <= 8) {
                    $position_aos_fade = "fade-left";
                }
            ?>
            <div class="col-xl-4">
                <div class="process-item aos-init aos-animate" data-aos="<?php echo $position_aos_fade; ?>">
                    <div class="process-inner ml-auto">
                    <div class="img-wrapper">
                        <?php echo wp_get_attachment_image( $slide['process_icon']['id'], 'thumbnail', [
                            'class' => 'process-m-icon'
                        ] ); ?>
                        <?php echo wp_get_attachment_image( $slide['process_icon_sm']['id'], 'thumbnail', [
                            'class' => 'process-icon'
                        ] ); ?>
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