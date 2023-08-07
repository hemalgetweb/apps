<!-- tech stack area start -->
<div class="tech-stack-area">
    <div class="container">
        <div class="tech-stack-box-wrapper-114">
            <div class="row align-items-center">
                <div class="col-xxl-4 col-xl-4 col-lg-4 text-center text-md-left">
                    <?php if(!empty($settings['tech_stack_title'])) : ?>
                        <h5 class="tech-stack-box-left-label-114"><?php echo esc_html($settings['tech_stack_title']); ?></h5>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <?php if(!empty($settings['slides'])) : ?>
                    <div class="tech-stack-box-right-icon-list-114 justify-content-center justify-content-md-start">
                        <?php foreach($settings['slides'] as $slide) :  ?>
                        <div class="tech-stack-box-icon-single-114">
                            <?php if(!empty($slide['stack_image']['url'])) : ?>
                            <div class="icon">
                                <img src="<?php echo $slide['stack_image']['url'] ?>" alt="<?php echo \Elementor\Control_Media::get_image_alt( $slide['stack_image'] ); ?>">
                            </div>
                            <?php endif; ?>
                            <?php if(!empty($slide['stack_label'])) : ?>
                            <span class="label"><?php echo esc_html($slide['stack_label']); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tech stack area end -->