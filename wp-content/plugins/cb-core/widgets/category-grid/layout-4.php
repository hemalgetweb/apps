<!-- featured category area start -->
<div class="apps-fz-featured-catgory-area">
    <div class="container">
        <div class="apps-fz-section-top-wrapp">
            <div class="row align-items-center">
                <div class="col-xxl-12">
                    <div class="apps-fz-section-3 mb-45 text-center text-sm-start">
                        <?php if(!empty($settings['section_title'])) : ?>
                            <h3 class="apps-fz-section-title-3"><?php echo esc_html($settings['section_title']); ?></h3>
                        <?php endif;?>
                        <?php if(!empty($settings['section_subtitle'])) : ?>
                            <p class="apps-fz-section-subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($cat_lists)) : ?>
        <div class="apps-featured-category-main-wrap">
            <div class="apps-fz-categories-active-backward-3 swiper-container swiper">
                <div class="swiper-wrapper roll__wrapper">
                    <?php foreach($cat_lists as $index => $cat_id) : ?>
                        <?php if( $term = get_term_by( 'id', $cat_id, 'product_cat' ) ) :
                            $category_name = $term->name;
                            $product_count = $term->count;
                            $cat_id = $term->term_id;
                            $thumbnail_id = get_term_meta( $cat_id, 'thumbnail_id', true );
                            $cat_link = get_term_link( $cat_id, 'product_cat' );
                            $cat_image_url = wp_get_attachment_url( $thumbnail_id );
                            $placeholder_image = $settings['placeholder_image']['url'];
                            if(empty($cat_image_url)) {
                                if(!empty($placeholder_image)) {
                                    $cat_image_url = esc_url($placeholder_image);
                                } else {
                                    $cat_image_url = esc_url('https://via.placeholder.com/167x138');
                                }
                            }
                        ?>
                        <div class="swiper-slide">
                            <div class="apps-rv-categories-item text-center">
                                <div class="apps-rv-cat-box-1 d-inline-block text-center">
                                    <?php if(!empty($cat_image_url)) : ?>
                                    <div class="apps-rv-hover-slide-cat-box-1">
                                        <a href="<?php echo esc_url($cat_link); ?>" class="apps-rv-cat-box-img fz-dimension216"><img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>"><img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>"></a>
                                    </div>
                                    <?php endif; ?>
                                    <h6 class="apps-fz-catagories-3-title mb-0"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($category_name); ?></a></h6>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
<!-- featured category area end -->