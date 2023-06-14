<?php
if (!empty($settings['btn_link_1']['url'])) {
    $this->add_link_attributes('btn_link_1', $settings['btn_link_1']);
}
// define image 1
$this->add_render_attribute('banner_imag_1', 'src', $settings['banner_imag_1']['url']);
$this->add_render_attribute('banner_imag_1', 'alt', \Elementor\Control_Media::get_image_alt($settings['banner_imag_1']));
$this->add_render_attribute('banner_imag_1', 'title', \Elementor\Control_Media::get_image_title($settings['banner_imag_1']));
$this->add_render_attribute('banner_imag_1', 'class', '');


$this->add_render_attribute('banner_bg_1', 'src', $settings['banner_bg_1']['url']);
$this->add_render_attribute('banner_bg_1', 'alt', \Elementor\Control_Media::get_image_alt($settings['banner_bg_1']));
$this->add_render_attribute('banner_bg_1', 'title', \Elementor\Control_Media::get_image_title($settings['banner_bg_1']));
$this->add_render_attribute('banner_bg_1', 'class', '');

?>

<div class="ayaa-fz-varient-banner-2 bg-default" data-background="<?php echo esc_url($settings['banner_bg_1']['url']) ? esc_url($settings['banner_bg_1']['url']) : ''; ?>">
    <div class="ayaa-fz-varient-banner-content-2 pb-30">
        <?php if (!empty($settings['banner_subtitle_1'])) : ?>
            <span class="subtitle wow fadeInUp"><?php echo cb_core_kses_basic($settings['banner_subtitle_1']); ?></span>
        <?php endif; ?>
        <?php if (!empty($settings['banner_title_1'])) : ?>
            <h4 class="title wow fadeInUp" data-wow-delay=".1s"><?php echo cb_core_kses_basic($settings['banner_title_1']); ?></h4>
        <?php endif; ?>
        <?php if (!empty($settings['banner_price_text_1'])) : ?>
            <span class="price wow fadeInUp" data-wow-delay=".2s"><?php echo cb_core_kses_basic($settings['banner_price_text_1']); ?></span>
        <?php endif; ?>
        <?php if (!empty($settings['btn_text_1'])) : ?>
            <a <?php echo $this->get_render_attribute_string('btn_link_1'); ?> class="ayaa-fz-white-border-btn-2 wow fadeInUp" data-wow-delay=".3s"><?php echo cb_core_kses_basic($settings['btn_text_1']); ?></a>
        <?php endif; ?>
    </div>
    <div class="image">
        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'banner_imag_1'); ?>
    </div>
</div>