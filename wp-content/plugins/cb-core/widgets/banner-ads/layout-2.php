<?php
if ( ! empty( $settings['btn_link_1']['url'] ) ) {
    $this->add_link_attributes( 'btn_link_1', $settings['btn_link_1'] );
}
if ( ! empty( $settings['btn_link_2']['url'] ) ) {
    $this->add_link_attributes( 'btn_link_2', $settings['btn_link_2'] );
}
if ( ! empty( $settings['btn_link_3']['url'] ) ) {
    $this->add_link_attributes( 'btn_link_3', $settings['btn_link_3'] );
}
// define image 1
$this->add_render_attribute( 'banner_imag_1', 'src', $settings['banner_imag_1']['url'] );
$this->add_render_attribute( 'banner_imag_1', 'alt', \Elementor\Control_Media::get_image_alt( $settings['banner_imag_1'] ) );
$this->add_render_attribute( 'banner_imag_1', 'title', \Elementor\Control_Media::get_image_title( $settings['banner_imag_1'] ) );
$this->add_render_attribute( 'banner_imag_1', 'class', '' );
// define image 3
$this->add_render_attribute( 'banner_imag_3', 'src', $settings['banner_imag_3']['url'] );
$this->add_render_attribute( 'banner_imag_3', 'alt', \Elementor\Control_Media::get_image_alt( $settings['banner_imag_3'] ) );
$this->add_render_attribute( 'banner_imag_3', 'title', \Elementor\Control_Media::get_image_title( $settings['banner_imag_3'] ) );
$this->add_render_attribute( 'banner_imag_3', 'class', '' );
?>
<div class="season-sale season-sale-2 py-25">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4 col-sm-6 mb-30 mb-md-0">
                <div class="panel pb-0">
                    <div class="season-sale-box">
                        <div class="part-txt">
                            <?php if(!empty($settings['banner_subtitle_1'])) : ?>
                                <p><?php echo cb_core_kses_basic($settings['banner_subtitle_1']); ?></p>
                            <?php endif; ?>
                            <?php if(!empty($settings['banner_title_1'])) : ?>
                                <h3><?php echo cb_core_kses_basic($settings['banner_title_1']); ?></h3>
                            <?php endif; ?>
                            <?php if(!empty($settings['btn_text_1'])) : ?>
                                <a <?php echo $this->get_render_attribute_string( 'btn_link_1' ); ?>><?php echo cb_core_kses_basic($settings['btn_text_1']); ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="part-img">
                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'banner_imag_1' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-4">
                <div class="season-sale-box season-sale-box-2">
                    <div class="part-txt">
                        <?php if(!empty($settings['banner_subtitle_2'])) : ?>
                            <p><?php echo cb_core_kses_basic($settings['banner_subtitle_2']); ?></p>
                        <?php endif; ?>
                        <?php if(!empty($settings['banner_title_2'])) : ?>
                            <h3><?php echo cb_core_kses_basic($settings['banner_title_2']); ?></h3>
                        <?php endif; ?>
                        <?php if(!empty($settings['btn_text_2'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'btn_link_2' ); ?> class="outline"><?php echo cb_core_kses_basic($settings['btn_text_2']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 col-sm-6 mb-30 mb-md-0 order-first order-md-last">
                <div class="panel pt-0">
                    <div class="season-sale-box">
                        <div class="part-img">
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'banner_imag_3' ); ?>
                        </div>
                        <div class="part-txt">
                            <?php if(!empty($settings['banner_subtitle_3'])) : ?>
                                <p><?php echo cb_core_kses_basic($settings['banner_subtitle_3']); ?></p>
                            <?php endif; ?>
                            <?php if(!empty($settings['banner_title_3'])) : ?>
                                <h3><?php echo cb_core_kses_basic($settings['banner_title_3']); ?></h3>
                            <?php endif; ?>
                            <?php if(!empty($settings['btn_text_3'])) : ?>
                                <a <?php echo $this->get_render_attribute_string( 'btn_link_3' ); ?> class="outline"><?php echo cb_core_kses_basic($settings['btn_text_3']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
