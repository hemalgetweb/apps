<?php
$card_height = '';
$card_hide_border = $settings['card_hide_border'];
if($settings['card_height']) {
    $card_height = $settings['card_height'] . 'px';
}
?>
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
                        <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
                            <div class="dynamic-service-box-114" style="min-height: <?php echo $card_height ? $card_height. ';': ' ;'; ?> <?php echo $card_hide_border ? 'border: 0; box-shadow: 0px 20px 40px 0px rgba(0, 57, 89, 0.10);': ' ;'; ?>">
                                <?php if(has_post_thumbnail(get_the_ID())) : ?>
                                <div class="dynamic-service-box-img-114">
                                    <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                </div>
                                <?php endif; ?>
                                <div class="dynamic-service-box-content-114 dynamic-service-box-content-129">
                                    <div class="">
                                        <h5 class="title"><?php echo get_the_title(get_the_ID()); ?></h5>
                                        <p><?php echo get_the_excerpt(); ?></p>
                                    </div>
                                    <div class="">
                                        <span class="dynamic-service-read-more-btn-114"><?php echo esc_html__('Read more', 'cb-core'); ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#00C7C7"/></svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="dynamic-slider-paginations">
                <div class="dynamic-prev"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 10L5.885 9.115L2.39583 5.625H10V4.375H2.39583L5.885 0.885L5 0L0 5L5 10Z" fill="#73A7C3"/>
</svg>
</div>
                <div class="dynamic-next"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#73A7C3"/>
</svg>
</div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- dynamic service area end -->