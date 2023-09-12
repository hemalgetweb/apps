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
        <div class="dynamic-service-wrapper-114 dynamic-service-wrapper-114-layout-2">
            <div class="row">
                <?php foreach($settings['slides'] as $slide) : ?>
                <!-- single slide -->
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="service-box-card-wrap d-block">
                        <div class="dynamic-service-box-114" style="min-height: <?php echo $card_height ? $card_height. ';': ' ;'; ?> <?php echo $card_hide_border ? 'border: 0; box-shadow: 0px 20px 40px 0px rgba(0, 57, 89, 0.10);': ' ;'; ?>">
                            <div class="dynamic-service-box-img-114">
                                <?php echo wp_get_attachment_image( $slide['service_image']['id'], 'full' ); ?>
                            </div>
                            <div class="dynamic-service-box-content-114">
                                <?php if(!empty($slide['service_title'])) : ?>
                                    <h5 class="title"><?php echo wp_kses_post($slide['service_title']); ?></h5>
                                <?php endif; ?>
                                <?php if(!empty($slide['service_excerpt'])) : ?>
                                    <p><?php echo wp_kses_post($slide['service_excerpt']); ?></p>
                                <?php endif; ?>
                                <?php if(!empty($slide['service_title_link']['url'])) : ?>
                                    <span class="dynamic-service-read-more-btn-114">Read more 
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#00C7C7"/></svg>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- dynamic service area end -->