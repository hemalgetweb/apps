<div class="wb-app-feature-123-box">
<div class="apps-feature-list-box-4-114 mb-30">
    <div class="apps-feature-list-content-top-wrapper-4-114"
        style="min-height: <?php echo $settings['content_min_height'] ? $settings['content_min_height'] . 'px' : ''; ?>">
        <?php if (!empty($settings['feature_box_title'])): ?>
            <h5 class="apps-feature-list-box-title-114"><?php echo wp_kses_post($settings['feature_box_title']); ?></h5>
        <?php endif; ?>
        <?php if (!empty($settings['feature_box_content'])): ?>
            <p><?php echo wp_kses_post($settings['feature_box_content']); ?></p>
        <?php endif; ?>
        <?php if (!empty($settings['feature_box_list'])):
            $list_arr = explode("\n", $settings['feature_box_list']);
            ?>
            <ul>
                <?php foreach ($list_arr as $list): ?>
                    <li><img src="https://wadialbadaitsolutions.ae/wp-content/uploads/2023/08/bullet-icon.svg" alt="image" />
                        <?php echo esc_html($list); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php if (!empty($settings['slides'])): ?>
        <div class="apps-feature-list-content-bottom-wrapper-4-114">
            <ul>
                <?php foreach ($settings['slides'] as $slide): ?>
                    <li><?php echo wp_get_attachment_image($slide['feature_lang_img']['id'], 'full'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
</div>