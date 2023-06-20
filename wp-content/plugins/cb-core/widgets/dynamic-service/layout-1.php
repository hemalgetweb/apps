<!-- dynamic service area start -->
<section class="dynamic-service-area">
    <div class="container">
        <div class="dynamic-service-wrapper-114">
            <?php if($wp_query->have_posts()) : ?>
            <div class="dynamic-service-active swiper-container">
                <div class="swiper-wrapper">
                    <?php
                        while($wp_query->have_posts()) :
                        $wp_query->the_post();
                    ?>
                    <div class="swiper-slide">
                        <div class="dynamic-service-box-114">
                            <?php if(has_post_thumbnail(get_the_ID())) : ?>
                            <div class="dynamic-service-box-img-114">
                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="dynamic-service-box-content-114">
                                <h5 class="title"><a href="<?php echo get_the_permalink(get_the_ID()); ?>"><?php echo get_the_title(get_the_ID()); ?></a></h5>
                                <p><?php echo get_the_excerpt(); ?></p>
                                <a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="dynamic-service-read-more-btn-114"><?php echo esc_html__('Read more', 'cb-core'); ?> <i class="fal fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="dynamic-slider-paginations">
                <div class="dynamic-prev"><i class="fal fa-arrow-left"></i></div>
                <div class="dynamic-next"><i class="fal fa-arrow-right"></i></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- dynamic service area end -->