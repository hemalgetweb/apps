<?php
$min_box_height = $settings['min_box_height'];
$enable_box_hover_shadow = $settings['enable_box_hover_shadow'];
?>

<!-- feature list 3 area start -->
<div class="feature-list-area <?php echo $enable_box_hover_shadow ? esc_attr__('apps-has-box-hover-shadow') : ''; ?>">
    <?php if (!empty($settings['slides'])) : ?>
        <div class="container">
            <div class="row justify-content-center">
                <?php foreach ($settings['slides'] as $slide) :
                    $feature_lists = $slide['feature_lists'] ? $slide['feature_lists'] : '';
                    $feature_arr = array();
                    if ($feature_lists) {
                        $feature_arr = explode("\n", $feature_lists);
                    }
                    if ($slide['feature_list_link']['url']) {
                        $feature_list_link = $slide['feature_list_link']['url'];
                        $feature_start_class = '<a class="new-box-shadow-wrapper d-block text-decoration-none" href=' . $slide['feature_list_link']['url'] . '>';
                        $feature_end_class = '</a>';
                    } else {
                        $feature_start_class = '<div class="new-box-shadow-wrapper d-block">';
                        $feature_end_class = '</div>';
                    }
                ?>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <?php echo wp_kses_post($feature_start_class); ?>
                        <div class="apps-feature-list-box-3-114 new-box-shadow-inner" style="min-height: <?php echo $min_box_height ? $min_box_height . 'px' : ''; ?>">
                            <?php if (!empty($slide['feature_title'])) : ?>
                                <h5 class="apps-feature-list-box-3-title-114">
                                    <?php echo cb_core_kses_basic($slide['feature_title']); ?></h5>
                            <?php endif; ?>
                            <?php if (!empty($slide['feature_content'])) : ?>
                                <p><?php echo wp_kses_post($slide['feature_content']); ?></p>
                            <?php endif; ?>
                            <?php if ($feature_arr) : ?>
                                <ul>
                                    <?php foreach ($feature_arr as $feature) : ?>
                                        <li><img decoding="async" src="https://wadialbadaitsolutions.ae/wp-content/uploads/2023/08/bullet-icon.svg" alt="image" class="app-icon-margin-top me-2">
                                            <?php echo cb_core_kses_basic($feature); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <?php echo wp_kses_post($feature_end_class); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- feature list 3 area end -->