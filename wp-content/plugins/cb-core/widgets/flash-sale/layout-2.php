<?php
if ( ! empty( $settings['banner_btn_link']['url'] ) ) {
    $this->add_link_attributes( 'banner_btn_link', $settings['banner_btn_link'] );
}
$this->add_render_attribute( 'banner_image', 'src', $settings['banner_image']['url'] );
$this->add_render_attribute( 'banner_image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['banner_image'] ) );
$this->add_render_attribute( 'banner_image', 'title', \Elementor\Control_Media::get_image_title( $settings['banner_image'] ) );
$this->add_render_attribute( 'banner_image', 'class', 'my-custom-class' );
?>
<div class="featured-product py-25">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-xl-7">
                <div class="panel panel-3">
                    <div class="panel-header">
                        <div class="row">
                            <div class="col-12">
                                <?php if(!empty($settings['fast_selling_title'])) : ?>
                                    <h2 class="title"><?php echo esc_html($settings['fast_selling_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if($wp_query->have_posts()) : ?>
                    <div class="panel-body">
                        <div class="row g-xxl-4 g-xl-3 g-lg-4 g-3">
                            <?php while($wp_query->have_posts()) : $wp_query->the_post();
                                global $product;
                                $price_html = $product->get_price_html();
                            ?>
                            <div class="col-md-4 col-6">
                                <div class="single-product-card">
                                    <div class="part-img">
                                        <?php if(!empty(sale_badge_percentage())) : ?>
                                            <span class="off-tag"><?php echo sale_badge_percentage(); ?><?php echo esc_html__('%', 'cb-core'); ?></span>
                                        <?php endif; ?>
                                        <?php if(!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                        <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                            <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                        </a>
                                        <?php endif; ?>
                                        <?php cb_core_product_wraps_active(); ?>
                                    </div>
                                    <div class="part-txt">
                                        <?php if(!empty(get_the_title())) : ?>
                                        <h4 class="product-name"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 4)); ?></a></h4>
                                        <?php endif; ?>
                                        <p class="price"><?php echo wp_kses_post($price_html); ?></p>
                                        <?php if(!empty(cb_core_wc_get_review())) : ?>
                                            <?php echo cb_core_wc_get_review(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-5 col-lg-12 col-md-12">
                <div class="new-arrival new-arrival-2 apps-new-arrival-wrapper-box-2">
                    <div class="part-txt">
                        <div class="countdown-wrap">
                            <?php if(!empty($settings['banner_subtitle'])) : ?>
                                <p><?php echo cb_core_kses_basic($settings['banner_subtitle']); ?></p>
                            <?php endif; ?>
                            <?php if(!empty($settings['banner_title'])) : ?>
                                <h3><?php echo cb_core_kses_basic($settings['banner_title']); ?></h3>
                            <?php endif; ?>
                            <?php if(!empty($settings['banner_btn_text'])) : ?>
                                <a <?php echo $this->get_render_attribute_string( 'banner_btn_link' ); ?> class="def-btn apps-def-btn-2"><?php echo cb_core_kses_basic($settings['banner_btn_text']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="part-img">
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'banner_image' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>