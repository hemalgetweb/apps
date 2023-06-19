<!-- project area start -->
<section class="project-area">
    <div class="container">
        <div class="apps-project-wrapper-114 p-rel">
            <div class="swiper-container apps-project-active-114">
                <?php if($wp_query->have_posts()) : ?>
                <div class="swiper-wrapper">
                    <?php while($wp_query->have_posts()) : $wp_query->the_post();
                    $categories = get_the_category();
                    $cat_name = $categories[0]->name;
                    $cat_id = $categories[0]->term_id;
                    $cat_link = get_category_link( $cat_id );
                    ?>
                    <div class="swiper-slide">
                        <!-- project card -->
                        <div class="apps-project-card-114">
                            <?php if(has_post_thumbnail(get_the_ID())) : ?>
                            <div class="apps-project-card-image-114">
                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="apps-project-card-description-wrapper-114">
                                <div class="row">
                                    <div class="col-xxl-10 col-xl-10 mb-30 mb-xl-0">
                                        <h5 class="apps-project-card-title-114"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a></h5>
                                        <?php if(!empty($cat_name)) : ?>
                                            <a href="<?php echo $cat_link ? esc_url($cat_link): ''; ?>" class="apps-project-card-category-114"><?php echo esc_html($cat_name) ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-xxl-2 col-xl-2">
                                        <div class="apps-project-card-action-icon-114 text-xl-end">
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-top-right.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="apps-project-pagination-wrapper-114">
                <div class="apps-project-next-114"><i class="fa-thin fa-arrow-right"></i></div>
                <div class="apps-project-prev-114"><i class="fa-thin fa-arrow-left"></i></div>
            </div>
        </div>
    </div>
</section>
<!-- project area end -->