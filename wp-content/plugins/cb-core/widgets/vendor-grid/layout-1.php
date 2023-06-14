<?php
if ( ! empty( $settings['section_btn_url']['url'] ) ) {
    $this->add_link_attributes( 'section_btn_url', $settings['section_btn_url'] );
}
?>
<div class="best-seller py-25">
    <div class="container">
        <div class="panel">
            <div class="panel-header">
                <div class="row">
                    <div class="col-sm-8">
                        <?php if(!empty($settings['section_title'])) : ?>
                            <h2 class="title text-center text-sm-start"><?php echo esc_html($settings['section_title']); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center text-sm-end">
                            <?php if(!empty($settings['section_btn_text'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'section_btn_url' ); ?> class="explore-section"><?php echo esc_html($settings['section_btn_text']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(!empty($settings['slides'])):  ?>
            <div class="panel-body">
                <div class="row g-3">
                    <?php foreach($settings['slides'] as $index => $slide) : ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="single-box">
                            <?php if(!empty($slide['vendor_image']['url'])) : ?>
                            <div class="part-img">
                                <a href="<?php echo esc_url($slide['vendor_url']['url']) ? esc_url($slide['vendor_url']['url']): ''; ?>"><img src="<?php echo esc_url($slide['vendor_image']['url']) ? esc_url($slide['vendor_image']['url']): '';?>" alt="<?php echo get_post_meta(attachment_url_to_postid($slide['vendor_image']['url']), '_wp_attachment_image_alt', true); ?>"></a>
                            </div>
                            <?php endif; ?>
                            <div class="part-txt">
                                <?php if(!empty($slide['vendor_name'])) : ?>
                                    <a href="<?php echo esc_url($slide['vendor_url']['url']) ? esc_url($slide['vendor_url']['url']): ''; ?>" class="title"><?php echo esc_html($slide['vendor_name']); ?></a>
                                <?php endif; ?>
                                <?php if(!empty($slide['rating_count'])) : ?>
                                <div class="star">
                                    <?php echo  cb_core_elementor_vendor_star_rating($slide['rating_count']); ?>
                                    <?php if(!empty($slide['rating_user_count'])) : ?>
                                        <span>(<?php echo esc_html($slide['rating_user_count']); ?>)</span>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <?php if(!empty($slide['btn_text'])) : ?>
                                <a href="<?php echo esc_url($slide['vendor_url']['url']) ? esc_url($slide['vendor_url']['url']): ''; ?>" class="part-btn"><?php echo esc_html($slide['btn_text']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>