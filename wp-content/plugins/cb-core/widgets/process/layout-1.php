<section class="cb-process-area mt-3 pt-1">
    <div class="container process">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="row">
            <?php
                foreach($settings['slides'] as $index => $slide) :
                $position_aos_fade = "";
                $inner_classes = '';
                $process_icon_none = '';
                switch($index) {
                    case 0:
                        $position_aos_fade = "fade-right";
                        $inner_classes = "ml-auto m-left";
                        $process_icon_none = "";
                        break;
                    case 1:
                        $position_aos_fade = "fade-right";
                        $inner_classes = "margin-auto m-right";
                        $process_icon_none = "";
                        break;
                    case 2:
                        $position_aos_fade = "fade-right";
                        $inner_classes = "mr-auto m-left";
                        $process_icon_none = "process-icon-none";
                        break;
                    case 3:
                        $position_aos_fade = "fade-left";
                        $inner_classes = "ml-auto m-right";
                        $process_icon_none = "";
                        break;
                    case 4:
                        $position_aos_fade = "fade-left";
                        $inner_classes = "margin-auto m-left";
                        $process_icon_none = "process-icon-none";
                        break;
                    case 5:
                        $position_aos_fade = "fade-left";
                        $inner_classes = "mr-auto m-right";
                        $process_icon_none = "process-icon-none";
                        break;
                    case 6:
                        $position_aos_fade = "fade-right";
                        $inner_classes = "ml-auto m-left";
                        $process_icon_none = "process-icon-none";
                        break;
                    case 7:
                        $position_aos_fade = "fade-right";
                        $inner_classes = "margin-auto m-right";
                        $process_icon_none = "process-icon-none";
                        break;
                    case 8:
                        $position_aos_fade = "fade-right";
                        $inner_classes = "mr-auto m-left";
                        $process_icon_none = "";
                        break;
                }
            ?>
            <div class="col-xl-4 col-md-6">
                <div class="process-item" data-aos="<?php echo $position_aos_fade; ?>">
                    <div class="process-inner <?php echo esc_attr($inner_classes); ?>">
                        <div class="img-wrapper">
                            <?php if(!empty($slide['process_icon_sm']['url'])) : ?>
                                <img src="<?php echo $slide['process_icon_sm']['url']; ?>" class="process-m-icon" alt="<?php echo  \Elementor\Control_Media::get_image_alt( $slide['process_icon_sm'] ); ?>">
                            <?php endif; ?>
                            <?php if(!empty($slide['process_icon_tab']['url'])) : ?>
                                <img src="<?php echo $slide['process_icon_tab']['url']; ?>" class="process-tab-icon" alt="<?php echo  \Elementor\Control_Media::get_image_alt( $slide['process_icon_tab'] ); ?>">
                            <?php endif; ?>
                            <?php if(!empty($slide['process_icon']['url'])) : ?>
                                <img src="<?php echo $slide['process_icon']['url']; ?>" class="process-icon <?php echo $process_icon_none; ?>" alt="<?php echo  \Elementor\Control_Media::get_image_alt( $slide['process_icon'] ); ?>">
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