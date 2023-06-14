<!-- ayaa-fz-faq-area-start -->
<div class="ayaa-fz-faq-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if(!empty($settings['slides'])) : ?>
                <div class="ayaa-fz-faq-wrapper mb-30 pr-25">
                    <div class="ayaa-fz-accordion-wrapper" id="fz-faz-example">
                        <?php foreach($settings['slides'] as $index => $slide) : 
                            $collapse_class = $index == 0 ? esc_attr__('show'): ''; 
                            $collapse_boolean = $index == 0 ? esc_attr__('true'): '';   
                        ?>
                        <div class="ayaa-fz-accordion-item">
                            <?php if(!empty($slide['question_label'])) : ?>
                                <h2 class="ayaa-fz-accordion-header mb-0" id="fzone_<?php echo esc_attr($index); ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#fzcollapse_<?php echo esc_attr($index); ?>" aria-expanded="<?php echo esc_attr($collapse_boolean); ?>" aria-controls="fzcollapse_<?php echo esc_attr($index); ?>">
                                        <?php echo cb_core_kses_basic($slide['question_label']); ?>
                                    </button>
                                </h2>
                            <?php endif; ?>
                            <div id="fzcollapse_<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr($collapse_class); ?>" aria-labelledby="fzone_<?php echo esc_attr($index); ?>" data-bs-parent="#fz-faz-example">
                                <?php if(!empty($slide['question'])) : ?>
                                    <div class="accordion-body"><?php echo cb_core_kses_basic($slide['question']); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <?php if(!empty($settings['slides_2'])) : ?>
                <div class="ayaa-fz-faq-wrapper mb-30 pl-25">
                    <div class="ayaa-fz-accordion-wrapper" id="fz-faz-example-2">
                        <?php foreach($settings['slides_2'] as $index => $slide) : 
                            $collapse_class = $index == 0 ? esc_attr__('show'): '';    
                            $collapse_boolean = $index == 0 ? esc_attr__('true'): '';
                        ?>
                        <div class="ayaa-fz-accordion-item">
                            <?php if(!empty($slide['question_label_2'])) : ?>
                                <h2 class="ayaa-fz-accordion-header mb-0" id="fzone2_<?php echo esc_attr($index); ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#fzcollapseone-<?php echo esc_attr($index); ?>" aria-expanded="<?php echo esc_attr($collapse_boolean); ?>" aria-controls="fzcollapseone-<?php echo esc_attr($index); ?>"><?php echo cb_core_kses_basic($slide['question_label_2']); ?></button>
                                </h2>
                            <?php endif; ?>
                            <div id="fzcollapseone-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr($collapse_class); ?>" aria-labelledby="fzone2_<?php echo esc_attr($index); ?>" data-bs-parent="#fz-faz-example-2">
                                <?php if(!empty($slide['question_2'])) : ?>
                                    <div class="accordion-body"><?php echo cb_core_kses_basic($slide['question_2']); ?></div>
                                <?php endif;?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- ayaa-fz-faq-area-end -->