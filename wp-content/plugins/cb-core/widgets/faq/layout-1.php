<?php $unique_key = $settings['faq_unique_key']; ?>
<!-- faq area start -->
<div class="faq-area">
    <div class="container">
        <?php if(!empty($settings['slides'])) : ?>
        <div class="apps-accordion-wrapper-main-114">
            <div class="accordion accordion-flush" id="questionAccordion-<?php echo $unique_key; ?>">
                <?php foreach($settings['slides'] as $index => $slide) : ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="<?php echo $unique_key; ?>_heading_<?php echo esc_attr($index); ?>">
                    <?php if(!empty($slide['faq_title'])) : ?>
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo esc_attr($unique_key); ?>-<?php echo esc_attr($index); ?>" aria-expanded="false" aria-controls="collapse_<?php echo esc_attr($unique_key); ?>-<?php echo esc_attr($index); ?>">
                            <span class="apps-question-q-114">Q</span> <?php echo wp_kses_post($slide['faq_title']); ?>
                        </button>
                    <?php endif; ?>
                    </h2>
                    <div id="collapse_<?php echo esc_attr($unique_key); ?>-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $unique_key; ?>_heading_<?php echo esc_attr($index); ?>" data-bs-parent="#questionAccordion-<?php echo $unique_key; ?>">
                        <?php if(!empty($slide['faq_content'])) : ?>
                        <div class="apps-faq-accordion-body-wrapper">
                            <span class="apps-answere-a-114">A</span>
                            <div class="apps-content">
                                <?php echo wp_kses_post($slide['faq_content']); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- faq area end -->