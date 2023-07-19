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
            <div class="dynamic-service-active swiper-container">
                <div class="swiper-wrapper">
                    <!-- single slide -->
                    <div class="swiper-slide">
                        <div class="dynamic-service-box-114" style="min-height: <?php echo $card_height ? $card_height. ';': ' ;'; ?> <?php echo $card_hide_border ? 'border: 0; box-shadow: 0px 20px 40px 0px rgba(0, 57, 89, 0.10);': ' ;'; ?>">
                            <div class="dynamic-service-box-img-114">
                                <img src="http://wadialbadaitsolutions.ae/wp-content/uploads/2023/07/search-engine-optimization.svg" alt="Service image">
                            </div>
                            <div class="dynamic-service-box-content-114">
                                <h5 class="title"><a href="#">Service title</a></h5>
                                <p>excerpt here content</p>
                                <a href="#" class="dynamic-service-read-more-btn-114">Read more<i class="fal fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dynamic-slider-paginations">
                <div class="dynamic-prev"><i class="fal fa-arrow-left"></i></div>
                <div class="dynamic-next"><i class="fal fa-arrow-right"></i></div>
            </div>
        </div>
    </div>
</section>
<!-- dynamic service area end -->