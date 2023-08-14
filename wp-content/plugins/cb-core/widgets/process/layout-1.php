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
                        <?php if(!empty($slide['process_icon_sm']['url'])) : ?>
                            <img src="<?php echo $slide['process_icon_sm']['url']; ?>" class="process-m-icon" alt="<?php echo  \Elementor\Control_Media::get_image_alt( $slide['process_icon_sm'] ); ?>">
                        <?php endif; ?>
                        <?php if(!empty($slide['process_icon']['url'])) : ?>
                            <img src="<?php echo $slide['process_icon']['url']; ?>" class="process-icon" alt="<?php echo  \Elementor\Control_Media::get_image_alt( $slide['process_icon'] ); ?>">
                        <?php endif; ?>
                        <?php
                        $process_icon_sm = $slide['process_icon_sm'];
                        $image_url_sm = wp_get_attachment_image_url($process_icon_sm, 'thumbnail');
                        $image_alt_sm = get_post_meta($process_icon_sm, '_wp_attachment_image_alt', true);
                        $image_class_sm = 'process-icon';
                        
                        if ($image_url_sm) {
                            echo '<img src="' . esc_url($image_url_sm) . '" alt="' . esc_attr($image_alt_sm) . '" class="' . esc_attr($image_class_sm) . '">';
                        }
                        ?>
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