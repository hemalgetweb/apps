<!-- news area start -->
<div class="news-area pt-100 pb-120">
    <div class="container">
        <?php if(!empty($settings['section_title'])) :?>
        <div class="ayaa-fz-section-title-wrapper-6 text-center pb-50">
            <h3 class="ayaa-fz-section-title-6 mb-0"><?php echo cb_core_kses_basic($settings['section_title']); ?></h3>
        </div>
        <?php endif;?>
        <?php if ($wp_query->have_posts()) : ?>
        <div class="ayaa-fz-news-inner-main-wrapper-6">
            <div class="row justify-content-center">
                <?php
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                ?>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                    <div class="ayaa-fz-news-box-6 pb-30">
                        <a class="blog" href="<?php echo esc_url(get_the_permalink()); ?>">
                            <div class="ayaa-fz-blog-news-thumb-6 fz-filter-image-box">
                                <?php echo the_post_thumbnail(); ?>
                                <?php echo the_post_thumbnail(); ?>
                            </div>
                        </a>
                        <div class="ayaa-fz-news-blog-content-6">
                            <div class="ayaa-fz-news-blog-meta-6">
                                <?php echo esc_html__('By', 'cb-core'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author_meta('display_name')); ?></a>  <?php echo esc_html__('/', 'cb-core'); ?>  <?php echo get_the_date(); ?>
                            </div>
                            <h4 class="title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h4>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
<!-- news area end -->