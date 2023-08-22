<?php if (!empty($settings['slides'])) :
?>
    <div class="wb-process">
        <div class="container">
            <div class="wb-process-bg">
                <div class="wb-process-wrap">
                    <?php
                    $position_aos_fade = "";
                    foreach ($settings['slides'] as $index => $slide) :
                        switch ($index) {
                            case 0:
                                $position_aos_fade = "fade-right";
                                break;
                            case 1:
                                $position_aos_fade = "fade-right";
                                break;
                            case 2:
                                $position_aos_fade = "fade-right";
                                break;
                            case 3:
                                $position_aos_fade = "fade-left";
                                break;
                            case 4:
                                $position_aos_fade = "fade-left";
                                break;
                            case 5:
                                $position_aos_fade = "fade-left";
                                break;
                        }
                    ?>
                        <div class="wb-process-item" data-aos="<?php echo esc_attr($position_aos_fade); ?>">

                            <?php if (!empty($slide['process_icon']['url'])) : ?>
                                <img src="<?php echo $slide['process_icon']['url']; ?>" alt="<?php echo  \Elementor\Control_Media::get_image_alt($slide['process_icon']); ?>" class="img-fluid d-none d-md-block mx-auto <?php echo $process_icon_none; ?>">
                            <?php endif; ?>
                            
                            <?php if(!empty($slide['process_icon_tab']['url'])) : ?>
                                <img src="<?php echo $slide['process_icon_tab']['url']; ?>" class="img-fluid d-md-inline-flex d-lg-none d-none" alt="<?php echo  \Elementor\Control_Media::get_image_alt( $slide['process_icon_tab'] ); ?>">
                            <?php endif; ?>

                            <?php if (!empty($slide['process_icon_sm']['url'])) : ?>
                                <img src="<?php echo $slide['process_icon_sm']['url']; ?>" alt="<?php echo  \Elementor\Control_Media::get_image_alt($slide['process_icon_sm']); ?>" class="img-fluid d-md-none d-inline-flex">
                            <?php endif; ?>

                            <div>
                                <?php if (!empty($slide['process_title'])) : ?>
                                    <h4 class="process-title fw-bold text-clr-dark1 mt-3 mb-2"><?php echo esc_html($slide['process_title']); ?></h4>
                                <?php endif; ?>

                                <?php if (!empty($slide['process_content'])) : ?>
                                    <p class=" text-clr-dark2 process-pra">
                                        <?php echo esc_html($slide['process_content']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    
                        <div class="wb-process-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/process1.svg" alt="bar icon"
                                class="img-fluid d-none d-md-block mx-auto">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/process-mobile-1.svg"
                                alt="bar icon" class="img-fluid d-md-none d-inline-flex">

                            <div>
                                <h3 class="process-title fw-bold text-clr-dark1 mt-3 mb-2">Strategy Planning</h3>
                                <p class=" text-clr-dark2 process-pra">Once we know more about your business, audience,
                                    industry,
                                    competition,
                                    and your current social presence and performance, we create a strategy unique to your
                                    marketing goal
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

