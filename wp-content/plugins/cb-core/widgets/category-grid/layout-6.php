<!-- apps-fz-featured-category-area-start -->
<div id="scroll-featured" class="apps-fz-featured-category-area">
    <div class="container">
        <?php if(!empty($cat_lists)) : ?>
        <div class="row">
            <?php foreach($cat_lists as $index => $cat_id) : ?>
            <?php if( $term = get_term_by( 'id', $cat_id, 'product_cat' ) ) :
                $category_name = $term->name;
                $product_count = $term->count;
                $cat_id = $term->term_id;
                $cat_desc = $term->description;
                $cat_count = $term->count;
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
            <?php if($index == 0) : ?>
            <div class="col-xl-4 col-lg-5">
                <div class="apps-fz-featured-category-single featured-cat-drag-5 apps-fz-featured-shop-4 mb-40">
                    <div class="apps-fz-featured-category-single-img">
                        <a href="<?php echo esc_url($cat_link); ?>" class="apps-fz-featured-category-single-img-link"><img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>"></a>
                        <a href="<?php echo esc_url($cat_link); ?>" class="apps-fz-featured-category-text mlm-30"><?php echo cb_core_kses_basic($category_name); ?> <span class="apps-fz-featured-category-count">(<?php echo esc_html($cat_count) ? esc_html($cat_count): '0'; ?>)</span></a>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <?php if($index == 1) : ?>
            <div class="col-xl-8 col-lg-7">
                <div class="apps-fz-featured-category-single featured-cat-drag-5 apps-fz-featured-shop-4 mt-50 mb-40">
                    <div class="apps-fz-featured-category-single-img">
                        <a href="<?php echo esc_url($cat_link); ?>" class="apps-fz-featured-category-single-img-link"><img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>"></a>
                        <a href="<?php echo esc_url($cat_link); ?>" class="apps-fz-featured-category-text mrm-30"><?php echo cb_core_kses_basic($category_name); ?> <span class="apps-fz-featured-category-count">(<?php echo esc_html($cat_count) ? esc_html($cat_count): '0'; ?>)</span></a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- apps-fz-featured-category-area-end -->