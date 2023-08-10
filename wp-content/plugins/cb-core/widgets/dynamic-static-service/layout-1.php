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
        <?php if(!empty($settings['slides'])) : ?>
        <div class="dynamic-service-wrapper-114">
            <div class="dynamic-service-active swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach($settings['slides'] as $slide) : ?>
                    <!-- single slide -->
                    <div class="swiper-slide">
                        <div class="dynamic-service-box-114" style="min-height: <?php echo $card_height ? $card_height. ';': ' ;'; ?> <?php echo $card_hide_border ? 'border: 0; box-shadow: 0px 20px 40px 0px rgba(0, 57, 89, 0.10);': ' ;'; ?>">
                            <div class="dynamic-service-box-img-114">
                                <?php echo wp_get_attachment_image( $slide['service_image']['id'], 'full' ); ?>
                            </div>
                            <div class="dynamic-service-box-content-114">
                                <?php if(!empty($slide['service_title'])) : ?>
                                    <h5 class="title"><a href="<?php echo $slide['service_title_link']['url'] ? esc_url($slide['service_title_link']['url']): ''; ?>"><?php echo wp_kses_post($slide['service_title']); ?></a></h5>
                                <?php endif; ?>
                                <?php if(!empty($slide['service_excerpt'])) : ?>
                                    <p><?php echo wp_kses_post($slide['service_excerpt']); ?></p>
                                <?php endif; ?>
                                <?php if(!empty($slide['service_title_link']['url'])) : ?>
                                    <a href="<?php echo esc_url($slide['service_title_link']['url']); ?>" class="dynamic-service-read-more-btn-114">Read more <span>
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#003959"/>
</svg>

                                    </span></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- dynamic service area end -->