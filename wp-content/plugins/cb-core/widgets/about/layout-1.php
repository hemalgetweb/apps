<!-- about area start -->
<section class="about-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-5 text-center">
                <div class="apps-about-left-114 mb-50 mb-lg-0">
                    <?php echo wp_get_attachment_image( $settings['about_image']['id'], 'full' ); ?>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-7">
                <div class="apps-about-right-114">
                    <div class="apps-about-section-title-wrapper-114">
                        <?php if(!empty($settings['about_subtitle'])) : ?>
                        <span class="apps-about-section-subtitle-114"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/rect.svg" alt="about image"> <?php echo esc_html($settings['about_subtitle']); ?></span>
                        <?php endif; ?>
                        <?php if(!empty($settings['about_title'])) : ?>
                        <h3 class="apps-about-section-title-114"><?php echo wp_kses_post($settings['about_title']); ?></h3>
                        <?php endif; ?>
                        <?php if(!empty($settings['about_desc'])) : ?>
                        <p><?php echo wp_kses_post($settings['about_desc']); ?></p>
                        <?php endif; ?>
                        <?php if(!empty($settings['slides'])) : ?>
                        <ul class="apps-about-section-114-list-wrap">
                            <?php foreach($settings['slides'] as $slide) :
                                $this->add_render_attribute( 'list_item_image', 'src', $slide['list_item_image']['url'] );
                                $this->add_render_attribute( 'list_item_image', 'alt', \Elementor\Control_Media::get_image_alt( $slide['list_item_image'] ) );
                                $this->add_render_attribute( 'list_item_image', 'title', \Elementor\Control_Media::get_image_title( $slide['list_item_image'] ) );
                                ?>
                                <?php if(!empty($slide['list_item_text'])) : ?>
                                    <li>
                                        <?php if(!empty($slide['list_item_image']['url'])) : ?>
                                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'list_item_image' ); ?>
                                        <?php  endif;?>
                                         <span><?php echo wp_kses_post($slide['list_item_text']); ?></span></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about area end -->