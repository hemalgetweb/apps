<!-- scrollable question area start -->
<section class="scrollable-question-area">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4">
                <?php if(!empty($settings['slides'])) : ?>
                <div class="apps-scrollable-content-sections-nav-114 mb-50 mb-md-0">
                    <nav>
                        <ul>
                            <?php foreach($settings['slides'] as $index=>$slide) : 
                                $active_class = $index == 0 ? 'active': '';
                                ?>
                                <?php if(!empty($slide['tab_heading'])) : ?>
                                    <li><a class="<?php echo $active_class; ?>" href="#apps_panel_<?php echo esc_attr($index); ?>"><?php echo esc_html($slide['tab_heading']); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-xxl-9 col-xl-8 col-lg-8 col-md-8">
                <?php if(!empty($settings['slides'])) : ?>
                <div class="apps-scrollable-content-content-114 wb-scrollable-faq-wrap">
                    <?php foreach($settings['slides'] as $index=>$slide) : ?>
                    <section class="apps-panel" id="apps_panel_<?php echo esc_attr($index); ?>">
                        <?php echo wp_kses_post($slide['tab_content']); ?>
                    </section>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- scrollable question area end -->

