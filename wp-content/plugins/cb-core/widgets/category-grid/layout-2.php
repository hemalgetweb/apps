<div class="popular-categories-2 has-section-title-center">
    <div class="container">
        <div class="panel panel-3">
            <div class="panel-header">
                <div class="row">
                    <div class="col-12">
                        <?php if(!empty($settings['section_title'])) : ?>
                            <h2 class="title text-center"><?php echo cb_core_kses_basic($settings['section_title']); ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <?php if(!empty($cat_lists)) : ?>
                <div class="custom-row">
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
                            <div class="custom-col">
                                <div class="category-card">
                                    <a href="<?php echo esc_url($cat_link); ?>">
                                        <?php if(!empty($cat_image_url)) : ?>
                                        <div class="part-icon">
                                            <span>
                                                <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>">
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                        <div class="part-txt">
                                            <span><?php echo esc_html($category_name); ?></span>
                                            <span class="quantity-box">(<?php echo esc_html($product_count); ?>)</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>