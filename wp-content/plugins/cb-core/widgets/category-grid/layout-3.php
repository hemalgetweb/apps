<!-- featured category area start -->
<div class="featured-catgory-area">
    <div class="container">
        <div class="apps-featured-section-top-wrap">
            <div class="row align-items-center">
                <div class="col-xxl-12">
                    <?php if(!empty($settings['section_title'])) : ?>
                        <div class="apps-section-title-wrapper-1">
                            <h3 class="apps-section-title-1"><?php echo cb_core_kses_basic($settings['section_title']); ?> 
                            <?php if(!empty($settings['section_subtitle'])) : ?>
                            <span class="apps-section-subtitle-1"><?php echo cb_core_kses_basic($settings['section_subtitle']); ?></span></h3>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
        <div class="apps-featured-category-main-wrap pt-50">
            <?php if(!empty($cat_lists)) : ?>
            <div class="apps-rv-categories-active-backward swiper-container pb-50">
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
                                <div class="apps-rv-hover-slide-cat-box-1">
                                    <a href="<?php echo esc_url($cat_link); ?>" class="apps-rv-cat-box-img">
                                        <?php if(!empty($cat_image_url)) : ?>
                                            <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>"><img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>" />
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <h6 class="apps-rv-cat-box-title"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($category_name); ?></a></h6>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($cat_lists_2)) : ?>
            <div class="pl-90 pr-90 apps-rv-categories-lr-space">
                <div class="apps-rv-categories-active-forward swiper-container" dir="rtl">
                    <div class="swiper-wrapper roll__wrapper">
                    <?php foreach($cat_lists_2 as $index => $cat_id) : ?>
                        <?php if( $term = get_term_by( 'id', $cat_id, 'product_cat' ) ) :
                            $category_name = $term->name;
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
                                    <div class="apps-rv-hover-slide-cat-box-1">
                                        <a href="<?php echo esc_url($cat_link); ?>" class="apps-rv-cat-box-img">
                                        <?php if(!empty($cat_image_url)) : ?>
                                            <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>"><img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>" />
                                        <?php endif; ?>
                                    </a>
                                    </div>
                                    <h6 class="apps-rv-cat-box-title"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($category_name); ?></a></h6>
                                </div>
                            </div>
                        </div>

                            <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- featured category area end -->