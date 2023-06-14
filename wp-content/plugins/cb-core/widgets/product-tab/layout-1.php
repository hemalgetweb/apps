<!-- featured product area start -->
<div class="featured-product-area pt-45 pb-120">
    <div class="container">
        <?php if(!empty($settings['section_title'])) : ?>
            <div class="ayaa-fz-section-title-wrapper-6 pb-35 text-center">
                <h3 class="ayaa-fz-section-title-6 mb-0"><?php echo esc_html($settings['section_title']); ?></h3>
            </div>
        <?php endif; ?>
        <div class="ayaa-fz-featured-product-tab-nav-6 pb-30">
            <?php if(!empty($settings['cat_query'])) : ?>
            <nav>
                <div class="nav nav-tabs" id="ayaa-fz-nav-tab-6-1" role="tablist">
                    <?php 
                    foreach($settings['cat_query'] as $index=>$cat_id) :
                        $cat_name = ''; 
                        $product_count = 0; 
                        if( $term = get_term_by( 'id', $cat_id, 'product_cat' ) ){
                            $cat_name = $term->name;
                            $product_count = $term->count;
                        }
                        $active_class = $index == 0 ? esc_attr__('active', 'cb-core'): '';
                    ?>
                    <button class="nav-link <?php echo esc_attr($active_class); ?>" id="nav-<?php echo esc_attr($index); ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo esc_attr($index); ?>" type="button" role="tab" aria-controls="nav-<?php echo esc_attr($index); ?>" aria-selected="true"><span class="count"><?php echo esc_html($product_count); ?></span><span class="text"><?php echo esc_html($cat_name); ?></span></button>
                    <?php endforeach; ?>
                </div>
            </nav>
            <?php endif; ?>
        </div>
        <?php if(!empty($settings['cat_query'])) : ?>
        <div class="tab-content" id="ayaa-fz-nav-tabContent-6-1">
            <?php foreach($settings['cat_query'] as $index=>$cat_id) :
                $active_class = $index == 0 ? esc_attr__('show active', 'cb-core'): '';    
            ?>
            <div class="tab-pane fade <?php echo esc_attr($active_class); ?>" id="nav-<?php echo esc_attr($index); ?>" role="tabpanel" aria-labelledby="nav-<?php echo esc_attr($index); ?>-tab">
                <?php if($wp_query->have_posts()) : ?>
                <div class="ayaa-fz-featured-product-tab-content-6">
                    <div class="row">
                        <?php while($wp_query->have_posts()) : 
                            $wp_query->the_post();
                            echo get_term_meta(get_the_ID(), 'category_ids', true);
                            global $product;
                            $price_html = $product->get_price_html();
                            $terms = get_the_terms ( get_the_ID(), 'product_cat' );
                            $product_cats[] = null;
                            $rating_count = '';
                            foreach($terms as $index => $term) {
                                $product_cats[] = $term->term_id;
                            }
                            if(!empty($product)) {
                                $rating_count  = floor($product->get_average_rating());
                            }
                        ?>
                        <?php if(in_array($cat_id, $product_cats)) : ?>
                            <div class="col-xxl-3  col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="ayaa-fz-product-box-6 pb-35">
                                    <div class="ayaa-fz-product-box-thumbnail-6">
                                        <?php if(!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                            <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php cb_core_product_wraps_active_layout_2(); ?>
                                    </div>
                                    <div class="ayaa-fz-product-box-content-6 text-center">
                                        <?php if(!empty($rating_count)) : ?>
                                            <?php echo cb_core_elementor_vendor_star_rating_6($rating_count); ?>
                                        <?php endif; ?>
                                        <?php if(!empty(get_the_title())) : ?>
                                        <h5 class="ayaa-fz-product-title-6"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 4)); ?></a></h5>
                                        <?php endif; ?>
                                        <div class="ayaa-fz-product-price-cart-hover-wrap-6">
                                            <div class="ayaa-fz-product-price-regular-6"><?php echo $price_html; ?></div>
                                           <?php woocommerce_template_loop_add_to_cart_text3(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php unset($product_cats); endwhile; wp_reset_query(); ?>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12">
                            <?php if(!empty($settings['btn_text'])) : ?>
                                <div class="text-center pt-20"><a href="<?php echo esc_url($settings['btn_link']['url']) ? esc_url($settings['btn_link']['url']): ''; ?>" class="ayaa-fz-rect-transparent-btn-6"><?php echo cb_core_kses_basic($settings['btn_text']); ?></a></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- featured product area end -->