<?php
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
    }
    $product_banner_bg = esc_url($settings['product_banner_bg']['url']) ? esc_url($settings['product_banner_bg']['url']): '';
?>
<div class="hot-deal-banner">
    <div class="container">
        <div class="bg" data-background="<?php echo esc_url($product_banner_bg); ?>">
            <div class="row">
                <div class="col-lg-7">
                    <div class="banner-txt">
                        <?php if(!empty($settings['banner_title'])) : ?>
                            <h2><?php echo cb_core_kses_basic($settings['banner_title']);?></h2>
                        <?php endif; ?>
                        <?php if(!empty($settings['banner_subtitle'])) : ?>
                            <p><?php echo cb_core_kses_basic($settings['banner_subtitle']);?></p>
                        <?php endif; ?>
                        <div id="hotDealCountdown" class="countdown"></div>
                        <?php if(!empty($settings['btn_text'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="def-btn"><?php echo cb_core_kses_basic($settings['btn_text']);?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>