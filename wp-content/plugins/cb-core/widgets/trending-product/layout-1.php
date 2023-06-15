<?php
if (!empty($settings['banner_btn_link']['url'])) {
    $this->add_link_attributes('banner_btn_link', $settings['banner_btn_link']);
}
if (!empty($settings['product_link']['url'])) {
    $this->add_link_attributes('product_link', $settings['product_link']);
}
if (!empty($settings['product_link2']['url'])) {
    $this->add_link_attributes('product_link2', $settings['product_link2']);
}


if (!empty($settings['banner_image']['url'])) {
    $banner_image = $settings['banner_image']['url'];
} else {
    $banner_image = "http://via.placeholder.com/336x330";
}
if (!empty($settings['display_big_image']['url'])) {
    $display_big_image = $settings['display_big_image']['url'];
} else {
    $display_big_image = "http://via.placeholder.com/397x466";
}
if (!empty($settings['product_image1']['url'])) {
    $product_image1 = $settings['product_image1']['url'];
} else {
    $product_image1 = "";
}
if (!empty($settings['product_image2']['url'])) {
    $product_image2 = $settings['product_image2']['url'];
} else {
    $product_image2 = "";
}

?>

<!-- apps-fz-trending-product-area-start -->
<div class="apps-fz-trending-product-area pb-80 ">
    <div class="container">
        <div class="row">
            <div class="apps-fz-section-5 mb-25 text-center">
                <?php if (!empty($settings['section_title'])) : ?>
                    <h3 class="apps-fz-section-title-5"><?php echo cb_core_kses_basic($settings['section_title']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($settings['section_desc'])) : ?>
                    <p class="apps-fz-section-subtitle-5 "><?php echo cb_core_kses_basic($settings['section_desc']); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-5 col-sm-8">
                <div class="apps-fz-trending-banner-5-wrapper mb-40" data-bgcolor="#F8F8F8">
                    <div class="row">
                        <div class="col-12">
                            <div class="apps-fz-trending-banner-5-content">
                                <?php if (!empty($settings['banner_title'])) : ?>
                                    <h4 class="apps-fz-trending-banner-5-title"><?php echo cb_core_kses_basic($settings['banner_title']); ?></h4>
                                <?php endif; ?>
                                <div class="price-wrap">
                                    <?php if (!empty($settings['active_price'])) : ?>
                                        <span class="current"><?php echo cb_core_kses_basic($settings['active_price']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['previous_price'])) : ?>
                                        <del><?php echo cb_core_kses_basic($settings['previous_price']); ?></del>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['banner_btn_text'])) : ?>
                                    <div class="apps-fz-trending-banner-5-button mt-30">
                                        <a <?php echo $this->get_render_attribute_string('banner_btn_link'); ?> class="apps-fz-trending-banner-5-btn"><span><?php echo cb_core_kses_basic($settings['banner_btn_text']); ?></span><span><?php echo cb_core_kses_basic($settings['banner_btn_text']); ?></span></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="apps-fz-trending-banner-5-img">
                                <img src="<?php echo esc_url($banner_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($banner_image), '_wp_attachment_image_alt', true); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-8 col-lg-8 col-md-7">
                <?php if ($wp_query->have_posts()) : ?>
                    <div class="apps-fz-trending-product-list-wrapper mb-40" data-bgcolor="#f8f8f8">
                        <?php while ($wp_query->have_posts()) :
                            $wp_query->the_post();
                            echo get_term_meta(get_the_ID(), 'category_ids', true);
                            global $product;
                            $price_html = $product->get_price_html();
                            $terms = get_the_terms(get_the_ID(), 'product_cat');
                            $product_cats[] = null;
                            foreach ($terms as $index => $term) {
                                $product_cats[] = $term->term_id;
                            }
                        ?>
                            <div class="apps-fz-trending-product-list-item">
                                <?php if (!empty(get_the_post_thumbnail(get_the_ID(), 'full'))) : ?>
                                    <a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>">
                                        <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="apps-fz-trending-product-list-content">
                                    <?php if (!empty(get_the_title())) : ?>
                                        <h4 class="apps-fz-trending-product-list-content-title"><a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 30)); ?></a></h4>
                                    <?php endif; ?>
                                    <div class="price-wrap">
                                        <?php echo wp_kses_post($price_html); ?>
                                    </div>
                                    <?php if (!empty(cb_core_wc_get_trending_banner_review())) : ?>
                                        <?php echo cb_core_wc_get_trending_banner_review(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php unset($product_cats);
                        endwhile;
                        wp_reset_query(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-xxl-5 col-xl-12">
                <div class="apps-fz-trending-banner-5-display-wrapper text-center mb-40" data-bgcolor="#f8f8f8">
                    <div class="apps-product-offer-counting-img-inner apps-fz-trending-banner-5-display-inner">

                        <img src="<?php echo esc_url($display_big_image); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($display_big_image), '_wp_attachment_image_alt', true); ?>">

                        <div class="apps-product-offer-counting-plustext">
                            <span class="apps-product-offer-counting-plussign"><i class="fa-thin fa-plus"></i></span>
                            <div class="apps-product-offer-counting-text">
                                <a <?php echo $this->get_render_attribute_string('product_link'); ?>><img src="<?php echo esc_url($product_image1); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($product_image1), '_wp_attachment_image_alt', true); ?>"></a>
                                <?php if (!empty($settings['product_title'])) : ?>
                                    <h5 class="apps-prouduct-offer-counting-title"><a <?php echo $this->get_render_attribute_string('product_link'); ?>><?php echo cb_core_kses_basic($settings['product_title']); ?></a></h5>
                                <?php endif; ?>
                                <?php if (!empty($settings['product_active_price'])) : ?>
                                    <span class="apps-prouduct-offer-counting-price"><?php echo cb_core_kses_basic($settings['product_active_price']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="apps-product-offer-counting-plustext-another">
                            <span class="apps-product-offer-counting-plussign"><i class="fa-thin fa-plus"></i></span>
                            <div class="apps-product-offer-counting-text">
                                <a <?php echo $this->get_render_attribute_string('product_link2'); ?>><img src="<?php echo esc_url($product_image2); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($product_image2), '_wp_attachment_image_alt', true); ?>"></a>
                                <?php if (!empty($settings['product_title2'])) : ?>
                                    <h5 class="apps-prouduct-offer-counting-title"><a <?php echo $this->get_render_attribute_string('product_link2'); ?>><?php echo cb_core_kses_basic($settings['product_title2']); ?></a></h5>
                                <?php endif; ?>
                                <?php if (!empty($settings['product_active_price2'])) : ?>
                                    <span class="apps-prouduct-offer-counting-price"><?php echo cb_core_kses_basic($settings['product_active_price2']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- apps-fz-trending-product-area-end -->