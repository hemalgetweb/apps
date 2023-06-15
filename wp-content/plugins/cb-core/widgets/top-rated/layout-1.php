<div class="top-rated-n-best-seller py-25 apps-top-rated-section-2">
    <div class="container">
        <div class="row g-4">
            <div class="col-xxl-5 col-xl-6 col-lg-12">
                <div class="top-rated">
                    <div class="panel panel-shadow">
                        <div class="panel-header">
                            <div class="row align-items-center">
                                <div class="col-lg-10 col-8">
                                    <?php if(!empty($settings['top_rated_title'])) : ?>
                                        <h2 class="title"><?php echo esc_html($settings['top_rated_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-2 col-4">
                                    <div class="top-rated-slider-nav"></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row g-xxl-4 g-xl-3 g-4">
                                <div class="col-sm-6">
                                    <?php if($wp_query->have_posts()) : ?>
                                    <div class="left-slider">
                                        <?php while($wp_query->have_posts()) : $wp_query->the_post(); 
                                            global $product;
                                            $product_id = get_the_ID();
                                            $product_sale_price = $product->get_price() ? esc_attr__('$', 'cb-core').$product->get_price(): '';
                                            $product_regular_price = $product->get_regular_price() ? esc_attr__('$', 'cb-core').$product->get_regular_price(): '';

                                        ?>
                                        <div class="top-product-card">
                                            <div class="part-img">
                                                <a href="<?php echo esc_url(get_the_permalink($product_id)); ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($product_id, 'full')); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid(get_the_post_thumbnail_url($product_id)), '_wp_attachment_image_alt', true); ?>"></a>
                                            </div>
                                            <div class="part-txt">
                                                <div class="star">
                                                    <?php if(!empty(cb_core_wc_get_review())) : ?>
                                                        <?php echo cb_core_wc_get_review(); ?>
                                                    <?php endif; ?>
                                                </div>
                                                <a href="<?php echo esc_url(get_the_permalink($product_id)); ?>" class="title"><?php echo esc_html(wp_trim_words(get_the_title(), 3)); ?></a>
                                                <p class="price"><?php echo esc_html($product_sale_price); ?> <span><?php echo esc_html($product_regular_price); ?></span></p>
                                            </div>
                                        </div>
                                        <?php endwhile; wp_reset_query(); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6 d-sm-block d-none">
                                    <?php if($wp_query_2->have_posts()) : ?>
                                    <div class="right-slider">
                                        <?php while($wp_query_2->have_posts()) : $wp_query_2->the_post(); 
                                            global $product;
                                            $product_id_2 = get_the_ID();
                                            $product_sale_price_2 = $product->get_price() ? esc_attr__('$', 'cb-core').$product->get_price(): '';
                                            $product_regular_price_2 = $product->get_regular_price() ? esc_attr__('$', 'cb-core').$product->get_regular_price(): '';

                                        ?>
                                         <div class="top-product-card">
                                            <div class="part-img">
                                                <a href="<?php echo esc_url(get_the_permalink($product_id_2)); ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($product_id_2, 'full')); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid(get_the_post_thumbnail_url($product_id_2)), '_wp_attachment_image_alt', true); ?>"></a>
                                            </div>
                                            <div class="part-txt">
                                                <div class="star">
                                                    <?php if(!empty(cb_core_wc_get_review())) : ?>
                                                        <?php echo cb_core_wc_get_review(); ?>
                                                    <?php endif; ?>
                                                </div>
                                                <a href="<?php echo esc_url(get_the_permalink($product_id_2)); ?>" class="title"><?php echo esc_html(wp_trim_words(get_the_title(), 3)); ?></a>
                                                <p class="price"><?php echo esc_html($product_sale_price_2); ?> <span><?php echo esc_html($product_regular_price_2); ?></span></p>
                                            </div>
                                        </div>
                                        <?php endwhile; wp_reset_query(); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 col-xl-6 col-lg-12">
                <div class="best-seller has-section-title-center">
                    <div class="panel panel-shadow">
                        <div class="panel-header">
                            <div class="row">
                                <div class="col-12">
                                    <?php if(!empty($settings['best_sellar_section_title'])) : ?>
                                        <h2 class="title text-center"><?php echo esc_html($settings['best_sellar_section_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php if($wp_query_3->have_posts()) : ?>
                        <div class="panel-body">
                            <div class="row g-20 gx-xxl-4 gx-xl-3 gx-lg-4 gx-2">
                                <?php while($wp_query_3->have_posts()) : $wp_query_3->the_post(); 
                                    global $product;
                                    $product_id_3 = get_the_ID();
                                    $product_sale_price_3 = $product->get_price() ? esc_attr__('$', 'cb-core').$product->get_price(): '';
                                    $product_regular_price_3 = $product->get_regular_price() ? esc_attr__('$', 'cb-core').$product->get_regular_price(): '';
                                ?>
                                <div class="col-sm-6 col-12">
                                    <div class="top-product-card">
                                        <div class="part-img">
                                            <a href="<?php echo esc_url(get_the_permalink($product_id_3)); ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($product_id_3, 'full')); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid(get_the_post_thumbnail_url($product_id_3)), '_wp_attachment_image_alt', true); ?>"></a>
                                        </div>
                                        <div class="part-txt">
                                            <div class="star">
                                            <?php if(!empty(cb_core_wc_get_review())) : ?>
                                                <?php echo cb_core_wc_get_review(); ?>
                                            <?php endif; ?>
                                            </div>
                                            <a href="<?php echo esc_url(get_the_permalink($product_id_3)); ?>" class="title"><?php echo esc_html(wp_trim_words(get_the_title(), 3)); ?></a>
                                            <p class="price"><?php echo esc_html($product_sale_price_3); ?> <span><?php echo esc_html($product_regular_price_3); ?></span></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; wp_reset_query(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>