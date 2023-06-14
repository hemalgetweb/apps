<!-- shop category area start -->
<section class="shop-category-area">
    <div class="container">
        <?php if(!empty($cat_lists)) : ?>
        <div class="row">
        <?php foreach($cat_lists as $index => $cat_id) : ?>
        <?php if( $term = get_term_by( 'id', $cat_id, 'product_cat' ) ) :
            $category_name = $term->name;
            $product_count = $term->count;
            $cat_id = $term->term_id;
            $cat_desc = $term->description;
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
                <div class="col-xxl-7 col-xl-7 col-lg-7 order-md-1 order-lg-0 order-sm-1 mb-xs-0 mb-sm-3 mb-md-0">
                    <div class="ayaa-fz-shop-category-box-4 pt-43">
                        <div class="row">
                            <?php if(!empty($cat_image_url)) : ?>
                            <div class="col-xxl-7 col-xl-6 col-lg-6 col-sm-6 order-md-1 order-lg-0 order-sm-1">
                                <div class="image">
                                    <div class="fz-filter-image-box ayaa-fz-shop-cat-filter-image-box-item-1-4">
                                        <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>">
                                        <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>">
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                            <div class="col-xxl-5 col-xl-6 col-lg-6 col-sm-6 align-self-end order-md-0 order-lg-1 order-sm-0">
                                <div class="ayaa-fz-shop-category-box-content-4 pb-40">
                                    <h5 class="title fz-responsive"><a href="<?php echo esc_url($cat_link); ?>" class="title-anim"><?php echo cb_core_kses_basic($category_name); ?></a></h5>
                                    <?php if(!empty($cat_desc)) : ?>
                                        <p class="title-anim"><?php echo esc_html($cat_desc); ?></p>
                                    <?php endif;?>
                                    <div class="fz_btn_wrapper">
                                        <a href="<?php echo esc_url($cat_link); ?>" class="ayaa-fz-black-border-btn-4 fz-responsive"><span><?php echo esc_html__('Shop Category', 'cb-core'); ?></span> <span><?php echo esc_html__('Shop Category', 'cb-core'); ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if($index == 1) : ?>
                <div class="col-xxl-5 col-xl-5 col-lg-5 order-md-0 order-lg-1 order-sm-0 mb-xs-0 mb-sm-3 mb-md-0">
                    <div class="ayaa-fz-shop-category-box-4">
                        <div class="row">
                            <?php if(!empty($cat_image_url)) : ?>
                            <div class="col-xxl-7 col-xl-6 col-lg-6 col-sm-6">
                                <div class="image">
                                    <div class="fz-filter-image-box ayaa-fz-shop-cat-filter-image-box-item-2-4">
                                        <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>">
                                        <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>">
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                            <div class="col-xxl-5 col-xl-6 col-lg-6 col-sm-6 align-self-start">
                                <div class="ayaa-fz-shop-category-box-content-4 pt-40">
                                    <h5 class="title fz-responsive"><a href="<?php echo esc_url($cat_link); ?>" class="title-anim"><?php echo cb_core_kses_basic($category_name); ?></a></h5>
                                    <?php if(!empty($cat_desc)) : ?>
                                        <p class="title-anim"><?php echo cb_core_kses_basic($cat_desc); ?></p>
                                    <?php endif;?>
                                    <div class="fz_btn_wrapper">
                                        <a href="<?php echo esc_url($cat_link); ?>" class="ayaa-fz-black-border-btn-4 fz-responsive"><span><?php echo esc_html__('Shop Category', 'cb-core'); ?></span> <span><?php echo esc_html__('Shop Category', 'cb-core'); ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if($index == 2) : ?>
                <div class="col-xxl-5 col-xl-6 col-lg-6 mb-xs-0 mb-sm-3 mb-md-0 order-lg-2">
                    <div class="ayaa-fz-shop-category-box-4 pt-80">
                        <div class="row">
                            <?php if(!empty($cat_image_url)) : ?>
                            <div class="col-xxl-7 col-xl-6 col-lg-6 col-sm-6 order-md-1 order-lg-0 order-sm-1">
                                <div class="image">
                                    <div class="fz-filter-image-box ayaa-fz-shop-cat-item-4-1">
                                        <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>">
                                        <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>">
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                            <div class="col-xxl-5 col-xl-6 col-lg-6 col-sm-6 align-self-end order-md-0 order-lg-1 order-sm-0">
                                <div class="ayaa-fz-shop-category-box-content-4 pb-45">
                                    <h5 class="title fz-responsive"><a href="<?php echo esc_url($cat_link); ?>" class="title-anim"><?php echo cb_core_kses_basic($category_name); ?></a></h5>
                                    <?php if(!empty($cat_desc)) : ?>
                                        <p class="title-anim"><?php echo cb_core_kses_basic($cat_desc); ?></p>
                                    <?php endif;?>
                                    <div class="fz_btn_wrapper">
                                        <a href="<?php echo esc_url($cat_link); ?>" class="ayaa-fz-black-border-btn-4 fz-responsive"><span><?php echo esc_html__('Shop Category', 'cb-core'); ?></span> <span><?php echo esc_html__('Shop Category', 'cb-core'); ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if($index == 3) : ?>
                <div class="col-xxl-7 col-xl-6 col-lg-6 order-lg-3">
                    <div class="ayaa-fz-shop-category-box-4 pt-120">
                        <div class="row">
                            <?php if(!empty($cat_image_url)) : ?>
                            <div class="col-xxl-6 col-xl-5 col-lg-6 col-sm-6">
                                <div class="image">
                                    <div class="fz-filter-image-box ayaa-fz-shop-cat-item-4-2">
                                        <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>">
                                        <img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>">
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                            <div class="col-xxl-6 col-xl-7 col-lg-6 col-sm-6 align-self-start">
                                <div class="ayaa-fz-shop-category-box-content-4 pt-40">
                                    <h5 class="title fz-responsive"><a href="<?php echo esc_url($cat_link); ?>" class="title-anim"><?php echo cb_core_kses_basic($category_name); ?></a></h5>
                                    <?php if(!empty($cat_desc)) : ?>
                                        <p class="title-anim"><?php echo cb_core_kses_basic($cat_desc); ?></p>
                                    <?php endif;?>
                                    <div class="fz_btn_wrapper">
                                        <a href="<?php echo esc_url($cat_link); ?>" class="ayaa-fz-black-border-btn-4 fz-responsive"><span><?php echo esc_html__('Shop Category', 'cb-core'); ?></span> <span><?php echo esc_html__('Shop Category', 'cb-core'); ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- shop category area end -->