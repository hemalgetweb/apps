<!-- tab faq area start -->
<div class="tab-faq-area">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4">
                <div class="apps-tab-faq-left-114">
                    <?php if(!empty($settings['slides'])) : ?>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <?php foreach($settings['slides'] as $index=>$slide) : 
                                $active_class = $index == 0 ? 'active': '';
                                ?>
                                <?php if(!empty($slide['faq_title'])) : ?>
                                <button class="nav-link <?php echo esc_attr($active_class); ?>" id="nav-mytab<?php echo $index; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-mytab<?php echo $index; ?>" type="button" role="tab" aria-controls="nav-mytab<?php echo $index; ?>" aria-selected="true"><?php echo esc_html($slide['faq_title']); ?></button>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </nav>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8">
                <div class="apps-tab-faq-right-114">
                    <?php if(!empty($settings['slides'])) : ?>
                        <?php foreach($settings['slides'] as $index=>$slide) : 
                        $faq_id = $slide['select_el_template_faq'];
                        $template_content = \Elementor\Plugin::$instance->frontend->get_builder_content($faq_id);
                        $active_class = $index == 0 ? 'show active': '';
                        ?>
                        <div class="tab-content" id="nav-tabContent-<?php echo $index; ?>">
                            <div class="tab-pane fade <?php echo esc_attr($active_class); ?>" id="nav-mytab<?php echo $index; ?>" role="tabpanel" aria-labelledby="nav-mytab-1-tab">
                            <?php if(!empty($template_content)) : ?>
                                <?php echo wp_kses_post($template_content); ?>
                            <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tab faq area end -->