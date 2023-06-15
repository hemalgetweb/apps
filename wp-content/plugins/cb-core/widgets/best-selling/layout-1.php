<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-2 category-col">
                
            </div>
            <div class="col-xl-6 col-lg-8">
                <?php if(!empty($settings['slides'])) : ?>
                <div class="slider-area">
                    <?php foreach($settings['slides'] as $index => $slide ) : ?>
                    <div class="apps-slider-height d-flex align-items-center bg-default"  data-lgbackground="<?php echo esc_url($slide['best_selling_large_large']['url']); ?>" data-smbackground="<?php echo esc_url($slide['best_selling_image_mid']['url']); ?>" data-background="<?php echo esc_url($slide['best_selling_image']['url']); ?>">
                        <div class="slide-<?php echo esc_attr($index); ?>">
                            <div class="banner-txt">
                                <?php if(!empty($slide['subtitle'])) : ?>
                                    <h6><?php echo cb_core_kses_basic($slide['subtitle']); ?></h6>
                                <?php endif; ?>
                                <?php if(!empty($slide['title'])) : ?>
                                <h1><?php echo cb_core_kses_basic($slide['title']); ?></h1>
                                <?php endif; ?>
                                <?php if(!empty($slide['description'])) : ?>
                                    <p><?php echo cb_core_kses_basic($slide['description']); ?></p>
                                <?php endif; ?>
                                <?php if(!empty($slide['old_price'] || $slide['new_price'])) : ?>
                                <div class="price">
                                    <?php if(!empty($slide['old_price'])) : ?>
                                        <span><?php echo cb_core_kses_basic($slide['old_price']); ?></span> 
                                    <?php endif; ?>
                                    <?php if(!empty($slide['new_price'])) : ?>
                                        <span><?php echo cb_core_kses_basic($slide['new_price']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <?php if(!empty($slide['btn_text'])) : ?>
                                    <a href="<?php echo esc_url($slide['btn_link']['url']) ? esc_url($slide['btn_link']['url']): ''; ?>" class="def-btn"><?php echo cb_core_kses_basic($slide['btn_text']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar-area">
                    <div class="best-selling-panel">
                        <?php if(!empty($settings['best_selling_title'])) : ?>
                        <div class="panel-header">
                            <h4><?php echo cb_core_kses_basic($settings['best_selling_title']); ?></h4>
                        </div>
                        <?php endif; ?>
                        <?php if($wp_query->have_posts()) : ?>
                        <div class="panel-body">
                            <div class="product-slider-1">
                                <?php while($wp_query->have_posts()): $wp_query->the_post();
                                global $product;
                                $price_html = $product->get_price_html();
                                ?>
                                <div class="slick-slide">
                                    <div class="single-product-slider">
                                        <?php if(has_post_thumbnail()) : ?>
                                        <div class="part-img">
                                            <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                        <div class="part-txt">
                                            <?php if(!empty(cb_core_wc_get_review())) : ?>
                                                <?php echo cb_core_wc_get_review(); ?>
                                            <?php endif; ?>
                                            <h4 class="product-name"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 5)); ?></a></h4>
                                            <p class="price"><?php echo wp_kses_post($price_html); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile;wp_reset_postdata(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    