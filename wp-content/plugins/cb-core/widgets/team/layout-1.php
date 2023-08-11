<!-- apps-fz-about-team-area-start -->
<div class="apps-fz-about-team-area pt-95 pb-60" data-bgcolor="#F5F5F5">
    <div class="container">
        <?php if(!empty($settings['testimonial_heading'])) : ?>
            <h4 class="apps-fz-about-team-title mb-40"><?php echo cb_core_kses_basic($settings['testimonial_heading']); ?></h4>
        <?php endif; ?>
        <?php if(!empty($settings['slides'])) : ?>
            <div class="row">
            <?php foreach($settings['slides'] as $index => $slide) : ?>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="apps-fz-about-team-single mb-40">
                        <div class="apps-fz-about-team-single-img">
                            <?php if(!empty($slide['member_img']['url'])) : ?>
                                <img class='w-100' src='<?php echo esc_url( $slide['member_img']['url'] ); ?>' alt='<?php echo \Elementor\Control_Media::get_image_alt( $slide['member_img'] ); ?>'>
                            <?php endif; ?>
                        </div>
                        <div class="apps-fz-about-team-single-content-wrapper">
                            <div class="apps-fz-about-team-single-content">
                                <div class="apps-fz-about-team-single-content-text mb-15">
                                    <?php if(!empty($slide['member_name'])) : ?>
                                        <h4 class="apps-fz-about-team-single-content-title"><?php echo cb_core_kses_basic($slide['member_name']); ?></h4>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['member_designation'])) : ?>
                                        <span class="apps-fz-about-team-single-content-designation"><?php echo cb_core_kses_basic($slide['member_designation']); ?></span>
                                    <?php endif; ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
            
        
    </div>
</div>
<!-- apps-fz-about-team-area-end -->