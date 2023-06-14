<div class="ayaa-fz-faq-area-inner-2">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-12 mb-30 mb-xl-0">
                <div class="ayaa-fz-faq-box-wrapper-main-inner-2 mb-50">
                    <?php if(!empty($settings['faq_sec_title'])) : ?>
                        <h4 class="ayaa-fz-faq-title-inner-2"><?php echo cb_core_kses_basic($settings['faq_sec_title']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['slides'])) : ?>
                    <div class="ayaa-fz-faq-box-inner-2">
                        <div class="accordion" id="ayaa-fz-inner-faq-2">
                            <?php foreach($settings['slides'] as $index => $slide) : 
                                $collapse_class = $index == 0 ? esc_attr__('show', 'cb-core'): esc_attr__('false', 'cb-core'); 
                                $collapse_boolean = $index == 0 ? esc_attr__('true', 'cb-core'): esc_attr__('false', 'cb-core');   
                            ?>
                            <div class="accordion-item">
                                <?php if(!empty($slide['question_label'])) : ?>
                                    <h2 class="accordion-header" id="faqInner_<?php echo esc_attr($index); ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo esc_attr($index); ?>" aria-expanded="<?php echo esc_attr($collapse_boolean); ?>" aria-controls="collapse_<?php echo esc_attr($index); ?>">
                                            <i class="fa-light fa-circle-question"></i> <?php echo cb_core_kses_basic($slide['question_label']); ?>
                                        </button>
                                    </h2>
                                <?php endif; ?>
                                <div id="collapse_<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr($collapse_class); ?>" aria-labelledby="faqInner_<?php echo esc_attr($index); ?>" data-bs-parent="#ayaa-fz-inner-faq-2">
                                    <div class="accordion-body">
                                        <?php if(!empty($slide['question'])) : ?>
                                        <p class="content">
                                            <?php echo cb_core_kses_basic($slide['question']); ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="ayaa-fz-faq-box-wrapper-main-inner-2">
                    <?php if(!empty($settings['faq_sec_title_2'])) : ?>
                        <h4 class="ayaa-fz-faq-title-inner-2"><?php echo cb_core_kses_basic($settings['faq_sec_title_2']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['slides_2'])) : ?>
                    <div class="ayaa-fz-faq-box-inner-2">
                        <div class="accordion" id="ayaa-fz-inner-faq-22">
                            <?php foreach($settings['slides_2'] as $index => $slide) : 
                                $collapse_class = $index == 0 ? esc_attr__('show', 'cb-core'): esc_attr__('false', 'cb-core'); 
                                $collapse_boolean = $index == 0 ? esc_attr__('true', 'cb-core'): esc_attr__('false', 'cb-core');
                            ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqInner_<?php echo esc_attr($index); ?>_2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo esc_attr($index); ?>_2" aria-expanded="<?php echo esc_attr($collapse_boolean); ?>" aria-controls="collapse_<?php echo esc_attr($index); ?>_2">
                                    <i class="fa-light fa-circle-question"></i> <?php echo cb_core_kses_basic($slide['question_label_2']); ?>
                                    </button>
                                </h2>
                                <div id="collapse_<?php echo esc_attr($index); ?>_2" class="accordion-collapse collapse <?php echo esc_attr($collapse_class); ?>" aria-labelledby="faqInner_<?php echo esc_attr($index); ?>_2" data-bs-parent="#ayaa-fz-inner-faq-22">
                                    <div class="accordion-body">
                                        <p class="content">
                                            <?php echo cb_core_kses_basic($slide['question_2']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-12">
                <div class="ayaa-fz-find-sidebar-inner-2 ml-50">
                    <?php if(!empty($settings['section_widget_title'])) : ?>
                        <h4 class="ayaa-fz-faq-title-inner-2"><?php echo cb_core_kses_basic($settings['section_widget_title']); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($settings['slides_sidebar'])) : ?>
                    <div class="row justify-content-center">
                        <?php foreach($settings['slides_sidebar'] as $index => $slide) : ?>
                        <div class="col-xxl-12 col-xl-12 col-lg-4 col-md-6 mb-30">
                            <div class="ayaa-fz-faq-contact-box-inner-2">
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon( $slide['widget_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </div>
                                <?php if(!empty($slide['widget_title'])) : ?>
                                    <h5 class="title"><a href="tel:<?php echo esc_url($slide['widget_link']['url']) ? esc_url($slide['widget_link']['url']): ''; ?>"><?php echo cb_core_kses_basic($slide['widget_title']); ?></a></h5>
                                <?php endif; ?>
                                <?php if(!empty($slide['widget_desc'])) : ?>
                                    <p class="content"><?php echo cb_core_kses_basic($slide['widget_desc']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>