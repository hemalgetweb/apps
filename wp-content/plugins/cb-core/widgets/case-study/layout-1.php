<?php
$card_min_height = $settings['card_min_height'] ? $settings['card_min_height']: '';
?>
    <!-- seo-feature -->
    <section class="seo-feature">
        <div class="row border-bottom1">
            <div class="12">
                <div class="wb-seo-feature-item-123">
                <div class="seo-feature-item" style="min-height: <?php echo esc_attr($card_min_height); ?>px;">
                    <div class="seo-feature-top border-bottom1 d-flex gap-3 align-items-center pb-4">
                        <?php if(!empty($settings['card_img']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['card_img']['url']); ?>" alt="icon" class="img-fluid">
                        <?php endif; ?>
                        <div class="">
                            <?php if(!empty($settings['card_subtitle'])) : ?>
                            <p class="fs-12 fw-normal mb-2">
                                <?php echo esc_html($settings['card_subtitle']); ?>
                            </p>
                            <?php endif; ?>
                            <?php if(!empty($settings['card_title'])) : ?>
                            <h5 class="fs-4 fw-semi-bold mb-0">
                                <?php echo esc_html($settings['card_title']); ?>
                            </h5>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="seo-feature-body">
                        <div class="pt-3 d-flex justify-content-between">
                            <?php if(!empty($settings['card_label_left'])) : ?>
                            <h5 class="fs-18 fw-medium text-clr-secondary">
                                <?php echo esc_html($settings['card_label_left']); ?>
                            </h5>
                            <?php endif; ?>
                            <?php if(!empty($settings['card_label_right'])) : ?>
                            <h5 class="fs-18 fw-medium text-clr-secondary">
                                <?php echo esc_html($settings['card_label_right']); ?>
                            </h5>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($settings['slides'])) : ?>
                        <ul class="keyword-list list-unstyled mb-0">
                            <?php foreach($settings['slides'] as $index=>$slide) : ?>
                            <li class="d-flex justify-content-between align-items-center mb-2">
                                <?php if(!empty($slide['list_title'])) : ?>
                                <span class="fs-6 fw-normal text-clr-primary2">
                                    <?php echo esc_html($slide['list_title']); ?>
                                </span>
                                <?php endif; ?>
                                <?php if(!empty($slide['list_count'])) : ?>
                                <span class="fs-6 fw-bold text-clr-primary2">
                                    <?php echo esc_html($slide['list_count']); ?>
                                </span>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
             
            </div>
        </div>
    </section>
    <!--/ seo-feature -->
