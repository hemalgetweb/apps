<?php if(!empty($settings['slides'])) : ?>
<!-- brand area start -->
<section class="brand-area">
    <div class="container">
        <div class="apps-brand-grid-wrapper-114">
            <?php foreach($settings['slides'] as $slide):
                $this->add_render_attribute( 'product_brand_image', 'src', $slide['product_brand_image']['url'] );
                $this->add_render_attribute( 'product_brand_image', 'alt', \Elementor\Control_Media::get_image_alt( $slide['product_brand_image'] ) );
                $this->add_render_attribute( 'product_brand_image', 'title', \Elementor\Control_Media::get_image_title( $slide['product_brand_image'] ) );
            ?>
            <div class="apps-brand-grid-item-114 text-center">
                <?php ?>
                <div class="thumb">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'product_brand_image' ); ?>
                </div>
                <?php if(!empty($slide['brand_label'])) : ?>
                <span class="apps-brand-grid-item-label"><?php  echo esc_html($slide['brand_label']);?></span>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- brand area end -->
<?php endif; ?>